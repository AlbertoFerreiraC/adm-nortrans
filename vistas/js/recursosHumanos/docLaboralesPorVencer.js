$(document).ready(function () {

    cargarDatosTablaSoliPendientes();

});

function cargarDatosTablaSoliPendientes() {
    $("#lista tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/docLaboralPorVencer/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>' +
                    '<td>' + response[i].rut + '</td>' +
                    '<td>' + response[i].personal + '</td>' +
                    '<td>' + response[i].centro_de_costo + '</td>' +
                    '<td>' + response[i].tipo_documento + '</td>' +
                    '<td>' + response[i].fecha_expiracion + '</td>' +
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


