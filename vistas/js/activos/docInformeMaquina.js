$(document).ready(function () {

    CentroDeCostoBuscar();

    TipoDocumento();

    TipoBus();

});

function CentroDeCostoBuscar() {
    $('#centroCostoBuscar').empty();
    $('#centroCostoBuscar').append('<option value ="-">Seleccionar...</opction>');
    var fila = "";

    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroCostoBuscar').append(fila);
        }
    });
}

function TipoDocumento() {
    $('#tipoDocumentoBuscar').empty();
    $('#tipoDocumentoBuscar').append('<option value ="-">Seleccionar...</option>');
    var listarDocumento = "";

    $.ajax({
        url: "../api_adm_nortrans/documento/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarDocumento += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoDocumentoBuscar').append(listarDocumento);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function TipoBus() {
    $('#maquinaBuscar').empty();
    $('#maquinaBuscar').append('<option value ="-">Seleccionar...</option>');
    var listarBus = "";

    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarBus += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#maquinaBuscar').append(listarBus);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}
