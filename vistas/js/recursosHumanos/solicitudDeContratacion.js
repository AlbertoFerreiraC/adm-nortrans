$(document).ready(function () {
    cargarDatosTablaSoliPendientes();
});

function cargarDatosTablaSoliPendientes() {
    $("#lista tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/solicitudDeContratacion/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>' +
                    '<td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].empresa + '</td>' +
                    '<td>' + response[i].fecha_requerida + '</td>' +
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].estado + '</td>' +
                    '<td>' + response[i].pre_aprueba + '</td>' +
                    '<td>' + response[i].aprueba + '</td>' +
                    '<td style="text-align: center;">' +
                        '<button class="btn btn-primary" style="padding: 6px 12px; font-size: 14px; border-radius: 5px; cursor: pointer;">' +
                            'Imprimir' +
                        '</button>' +
                    '</td>' +
                '</tr>';
            }
            $('#lista tbody').append(fila);
        }
    }).fail(function () {
        swal({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}
