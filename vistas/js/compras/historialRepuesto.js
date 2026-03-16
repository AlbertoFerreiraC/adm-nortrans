$(document).ready(function () {

    cargarHistorialRepuestos();

});


function cargarHistorialRepuestos() {

    $("#tablaDocumentos tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/compras/funHistorialRepuesto.php",
        method: "POST",
        cache: false,
        dataType: "json",

        success: function (response) {

            if (response && response.length > 0) {

                const filas = response.map((r, i) => {

                    return `
                    <tr>
                        <td>${r.fecha_creacion ?? ''}</td>
                        <td>${r.idgenerar_oc ?? ''}</td>
                        <td>${r.nro_item ?? ''}</td>
                        <td>${formatearMoneda(r.costo_unitario)}</td>
                        <td>${r.cantidad ?? ''}</td>
                    </tr>
                    `;

                }).join('');

                $("#tablaDocumentos tbody").append(filas);

                updateVisibleRows();

            } else {

                $("#tablaDocumentos tbody").append(`
                    <tr>
                        <td colspan="6" class="text-center">
                            No hay historial de compra de repuestos
                        </td>
                    </tr>
                `);

            }

        },

        error: function () {

            swal({
                type: "error",
                title: "Error al cargar el historial",
                text: "No se pudo obtener la información.",
                confirmButtonText: "Aceptar"
            });

        }

    });

}


function formatearMoneda(valor) {

    if (!valor) return "0";

    return parseFloat(valor).toLocaleString("es-PY", {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
    });

}