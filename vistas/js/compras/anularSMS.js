$(document).ready(function () {
    cargarDatosTabla();

    // Filtro dinámico
    $('#filtradoDinamico').on('keyup change', function () {
        const q = (this.value || '').toLowerCase();
        $('#tablaOC tbody tr').each(function () {
            const hay = $(this).text().toLowerCase().indexOf(q) > -1;
            $(this).toggle(hay);
        });
    });
});

function cargarDatosTabla() {
    $("#tablaOC tbody").empty();

    const idUsuario = $("#idUsuario").val();
    const params = { id: idUsuario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funListarAnular.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: "application/json",
        processData: false,
        dataType: "json",
        success: (response) => {
            if (response && response.length > 0) {
                const filas = response.map((r, i) => {
                    return `
                    <tr>
                      <td>${i + 1}</td> <!-- N° item -->
                      <td>${r.aplicacion ?? ''}</td> <!-- Aplicacion -->
                      <td>${r.centro_costo ?? ''}</td> <!-- Centro Costo -->
                      <td>${r.tipo ?? ''}</td> <!-- Tipo Item -->
                      <td>${r.producto ?? ''}</td> <!-- Producto -->
                      <td>${r.cantidad ?? ''}</td> <!-- Cantidad -->
                      <td>${r.nro_oc ?? ''}</td> <!-- N° OC -->
                      <td>${r.detalle_oc ?? ''}</td> <!-- Detalle OC -->
                      <td>${r.estado ?? ''}</td> <!-- Estado Item -->
                      <td>
                        <center>
                          <button class="btn btn-danger btn-xs btn-anular" data-id="${r.id}">
                            ANULAR
                          </button>
                        </center>
                      </td>
                    </tr>`;
                }).join('');
                $("#tablaOC tbody").append(filas);

            } else {
                $("#tablaOC tbody").append(
                    '<tr><td colspan="10" class="text-center">No hay SMS disponibles para anular</td></tr>'
                );
            }
        },
        error: () => {
            swal({
                type: "error",
                title: "Error al cargar la tabla",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });
}


// Evento anular
$(document).on("click", ".btn-anular", function () {
    const id = $(this).data("id");

    swal({
        title: "¿Estás seguro de anular este SMS?",
        text: "Debes escribir un motivo de anulación",
        input: "text",
        inputPlaceholder: "Motivo de anulación...",
        showCancelButton: true,
        confirmButtonText: "Sí, anular",
        cancelButtonText: "Cancelar",
        inputValidator: function (value) {
            return !value ? "El motivo es obligatorio" : null;
        }
    }).then(function (result) {
        if (result.value) {
            anular(id, result.value);
        }
    });
});

// --- ANULAR ---
function anular(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funAnular.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {
            if (response && response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Anulación exitosa",
                    text: "El SMS fue anulado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                swal({
                    type: "error",
                    title: "Error al anular",
                    text: (response && response.detalle) ? response.detalle : "No se pudo completar la acción.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (jqXHR, textStatus) {
            swal({
                type: "error",
                title: "Error de conexión",
                text: "Detalles: " + textStatus,
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        });
}
