$(document).ready(function () {
    cargarListaOC();
});

function cargarListaOC() {

    $("#tablaDocumentos tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funListaOC.php",
        method: "POST",
        contentType: "application/json",
        dataType: "json",

        success: function (response) {

            if (response && response.length > 0) {

                const filas = response.map(r => {

                    return `
                    <tr>
                        <td>${r.idgenerar_oc}</td>
                        <td>${r.empresa}</td>
                        <td>${r.tipo_oc}</td>
                        <td>${r.fecha_creacion}</td>
                        <td>${r.doc_proveedor}</td>
                        <td>${r.proveedor}</td>
                        <td>${r.plazo_oc}</td>
                        <td>${r.pago_oc}</td>
                        <td>${r.tipo_documento_compra}</td>
                        <td>${r.num_doc_proveedor}</td>
                        <td>${r.total_general}</td>
                    </tr>
                    `;

                }).join("");

                $("#tablaDocumentos tbody").append(filas);

                updateVisibleRows();

            } else {

                $("#tablaDocumentos tbody").append(`
                    <tr>
                        <td colspan="11" class="text-center">
                            No existen órdenes de compra
                        </td>
                    </tr>
                `);

            }

        },

        error: function () {

            $("#tablaDocumentos tbody").append(`
                <tr>
                    <td colspan="11" class="text-danger text-center">
                        Error al cargar la lista de OC
                    </td>
                </tr>
            `);

        }

    });

}