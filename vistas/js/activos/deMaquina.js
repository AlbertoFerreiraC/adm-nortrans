$(document).ready(function () {

    // cargarDatosTabla(); nuevoEquipo

    $('#btnNuevo').click(function () {
        TipoBus();
        CentroCosto();
        asientos();
        modeloChasis();
        tipoDocumento();
        marcaChasis();
        marcaCarroceria();
        modeloCarroceria();
    });

    $('#nuevoEquipo').click(function () {
        proveedores();
    });
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

function asientos() {
    $('#asientosmaquina').empty();
    $('#asientosmaquina').append('<option value ="-">Seleccionar...</option>');
    var listarBus = "";

    $.ajax({
        url: "../api_adm_nortrans/claseMaquina/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarBus += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#asientosmaquina').append(listarBus);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function modeloChasis() {
    $('#modeloChasis').empty();
    $('#modeloChasis').append('<option value ="-">Seleccionar...</option>');
    var listarBus = "";

    $.ajax({
        url: "../api_adm_nortrans/modeloChasis/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarBus += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#modeloChasis').append(listarBus);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function tipoDocumento() {
    $('#tipoDocumento').empty();
    $('#tipoDocumento').append('<option value ="-">Seleccionar...</option>');
    var listarDocumento = "";

    $.ajax({
        url: "../api_adm_nortrans/tipoDocumentoMaquina/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarDocumento += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoDocumento').append(listarDocumento);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function marcaChasis() {
    $('#marcaChasis').empty();
    $('#marcaChasis').append('<option value ="-">Seleccionar...</option>');
    var listarDocumento = "";

    $.ajax({
        url: "../api_adm_nortrans/marcaChasis/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarDocumento += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#marcaChasis').append(listarDocumento);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function marcaCarroceria() {
    $('#marcaCarroceria').empty();
    $('#marcaCarroceria').append('<option value ="-">Seleccionar...</option>');
    var listarDocumento = "";

    $.ajax({
        url: "../api_adm_nortrans/marcaCarroceria/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarDocumento += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#marcaCarroceria').append(listarDocumento);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function modeloCarroceria() {
    $('#modeloCarroceria').empty();
    $('#modeloCarroceria').append('<option value ="-">Seleccionar...</option>');
    var listarDocumento = "";

    $.ajax({
        url: "../api_adm_nortrans/marcaCarroceria/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarDocumento += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#modeloCarroceria').append(listarDocumento);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function proveedores() {
    $('#proveedorEquipamiento').empty();
    $('#proveedorEquipamiento').append('<option value ="-">Seleccionar...</option>');
    var listarProveedor = "";

    $.ajax({
        url: "../api_adm_nortrans/proveedor/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarProveedor += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#proveedorEquipamiento').append(listarProveedor);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}