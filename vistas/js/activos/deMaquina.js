$(document).ready(function () {

    // cargarDatosTabla();

    $('#btnNuevo').click(function () {
        TipoBus();
        CentroCosto();
    });



    /*$('#filtradoDinamico').keyup(function () {

        var busqueda = document.getElementById('filtradoDinamico');
        var table = document.getElementById("tabla").tBodies[0];
        buscaTabla = function () {
            texto = busqueda.value.toLowerCase();
            var r = 0;
            while (row = table.rows[r++]) {
                if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                    row.style.display = null;
                else
                    row.style.display = 'none';
            }
        }
        busqueda.addEventListener('keyup', buscaTabla);

    });*/

});

function TipoBus() {
    $('#tipoMaquina').empty();
    $('#tipoMaquina').append('<option value ="-">Seleccionar...</option>');
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
            $('#tipoMaquina').append(listarBus);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function CentroCosto() {
    $('#centroCosto').empty();
    $('#centroCosto').append('<option value ="-">Seleccionar...</opction>');
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
            $('#centroCosto').append(fila);
        }
    });
}