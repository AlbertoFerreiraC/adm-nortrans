$(document).ready(function () {

    cargarDatosTabla();

    // Filtro general
    $('#filtradoDinamico').on('input', function () {
        filtrarTabla();
    });

    // Cambio de cantidad de registros visibles
    $('#entriesSelect').on('change', function () {
        updateVisibleRows();
    });

    // Botón entregar
    $(document).on("click", ".btnEntregar", function () {
        const id = $(this).data("id");
        confirmarEntrega(id);
    });

});

function cargarDatosTabla() {

    $("#tabla tbody").empty();
    let fila = "";

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funListarAprobados.php",
        method: "GET",
        dataType: "json",
        success: function (response) {

            if (!response || response.length === 0) {
                fila = `
                    <tr>
                        <td colspan="10" style="text-align:center;">
                            No existen órdenes aprobadas
                        </td>
                    </tr>`;
                $("#tabla tbody").append(fila);
                return;
            }

            for (let i in response) {

                fila += `
                <tr>
                    <td>${response[i].empresa}</td>
                    <td>${response[i].idgenerar_oc}</td>
                    <td>${response[i].fecha_creacion}</td>
                    <td>${response[i].plazo_entrega}</td>
                    <td>${response[i].tipo_oc}</td>
                    <td>${response[i].doc_proveedor}</td>
                    <td>${response[i].proveedor}</td>
                    <td>${response[i].tipo_documento_compra}</td>
                    <td style="text-align:right;">${formatearMonto(response[i].total_general)}</td>
                    <td>
                        <div class="btn-group">
                            <button 
                                class="btn btn-success btn-sm btnEntregar"
                                data-id="${response[i].idgenerar_oc}"
                                title="Marcar como entregado">
                                <i class="fa fa-check"></i> Entregar
                            </button>

                            <a  type = "button"
                                class="btn btn-info btn-sm btnPdf"
                                id="${response[i].idgenerar_oc}"
                                title="Informe (pendiente)">
                                <i class="fa fa-file"></i> Informe
                            </a>
                        </div>
                    </td>
                </tr>`;
            }

            $("#tabla tbody").append(fila);
            updateVisibleRows();

            $('.btnPdf').click(function() {
                 $(".btnPdf")
                  .prop('href', "/nortrans-apps/adm-nortrans/extensiones/tcpdf/pdf/recepcionOrdenDeCompra.php?id=" + this.id)
                  .prop('target', '_blank');
            });
        },
        error: function () {
            swal({
                type: "error",
                title: "Error al cargar órdenes aprobadas",
                confirmButtonText: "Aceptar"
            });
        }
    });
}

function confirmarEntrega(id) {

    swal({
        title: "¿Confirmar entrega?",
        text: "La orden pasará a estado ENTREGADO",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, entregar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.value) {
            marcarEntregado(id);
        }
    });
}

function marcarEntregado(id) {

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funMarcarEntregado.php",
        method: "POST",
        data: JSON.stringify({ id: id }),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {

            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Orden marcada como ENTREGADA",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    window.open(
                        "/nortrans-apps/adm-nortrans/extensiones/tcpdf/pdf/recepcionOrdenDeCompra.php?id=" + id,
                        "_blank"
                    );
                    cargarDatosTabla();
                });
            } else {
                swal("Error", "No se pudo actualizar la orden", "error");
            }
        },
        error: function () {
            swal("Error", "Error de comunicación con el servidor", "error");
        }
    });
}

function filtrarTabla() {

    const texto = $("#filtradoDinamico").val().toLowerCase();
    const rows = $("#tabla tbody tr");

    rows.each(function () {
        const rowText = $(this).text().toLowerCase();
        $(this).toggle(rowText.indexOf(texto) !== -1);
    });

    updateVisibleRows();
}

function updateVisibleRows() {

    const limit = parseInt($("#entriesSelect").val());
    let visibleCount = 0;

    $("#tabla tbody tr").each(function () {
        if ($(this).is(":visible")) {
            visibleCount++;
            $(this).toggle(visibleCount <= limit);
        }
    });
}

function formatearMonto(valor) {
    if (!valor) return "0";
    return parseFloat(valor)
        .toLocaleString("es-PY", { minimumFractionDigits: 0 });
}
