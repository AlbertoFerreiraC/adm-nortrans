$(document).ready(function () {
    cargarListaSMS();
});

function cargarListaSMS() {

    $("#tablaDocumentos tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/sms/funConsultaSMS.php",
        method: "POST",
        contentType: "application/json",
        dataType: "json",
        success: function (response) {

            if (response && response.length > 0) {

                const filas = response.map((r, index) => {

                    return `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${r.aplicacion ?? ''}</td>
                        <td>${r.centro_de_costo ?? ''}</td>
                        <td>${r.tipo ?? ''}</td>
                        <td>${r.producto ?? ''}</td>
                        <td>${r.cantidad ?? ''}</td>
                        <td>${r.cantidad_entregada ?? '0'}</td>
                        <td>SMS</td>
                        <td>${r.idsms ?? ''}</td>
                        <td>${r.observacion ?? ''}</td>
                        <td>${r.estado ?? ''}</td>
                    </tr>
                    `;

                }).join("");

                $("#tablaDocumentos tbody").append(filas);

                updateVisibleRows();

            } else {

                $("#tablaDocumentos tbody").append(`
                    <tr>
                        <td colspan="13" class="text-center">
                            No existen registros
                        </td>
                    </tr>
                `);

            }

        },
        error: function () {

            $("#tablaDocumentos tbody").append(`
                <tr>
                    <td colspan="13" class="text-center text-danger">
                        Error al cargar los datos
                    </td>
                </tr>
            `);

        }
    });
}