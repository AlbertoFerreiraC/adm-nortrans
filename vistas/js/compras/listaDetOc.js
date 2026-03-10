$(document).ready(function () {
    cargarDetalleOC();
});

function cargarDetalleOC() {

    $("#tablaDocumentos tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funListaDetalleOC.php",
        method: "POST",
        contentType: "application/json",
        dataType: "json",

        success: function (response) {

            if (response && response.length > 0) {

                const filas = response.map(r => {

                    return `
                    <tr>
                        <td>${r.generar_oc}</td>
                        <td>${r.nro_item}</td>
                        <td>${r.aplicacion}</td>
                        <td>${r.tipo_producto}</td>
                        <td>${r.producto}</td>
                        <td>${r.unidad_de_medida}</td>
                        <td>${r.cantidad}</td>
                        <td>${r.costo_unitario}</td>
                        <td>${r.sub_total}</td>
                        <td>${r.estado}</td>
                    </tr>
                    `;

                }).join("");

                $("#tablaDocumentos tbody").append(filas);

                updateVisibleRows();

            } else {

                $("#tablaDocumentos tbody").append(`
                    <tr>
                        <td colspan="10" class="text-center">
                            No existen detalles de OC
                        </td>
                    </tr>
                `);

            }

        },

        error: function () {

            $("#tablaDocumentos tbody").append(`
                <tr>
                    <td colspan="10" class="text-danger text-center">
                        Error al cargar los datos
                    </td>
                </tr>
            `);

        }

    });

}