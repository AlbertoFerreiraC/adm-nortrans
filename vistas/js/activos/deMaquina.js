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
        tipoEquipamiento();
    });

    $('#btnGrabarFicha').click(function () {
        if ($("#motivoAgregar").val() != "" &&
            $("#divisionAgregar").val() != "" &&
            $("#cargoAgregar").val() != "" &&
            $("#razonAgregar").val() != "" &&
            $("#centroDecostoAgregar").val() != "-" &&
            $("#cantidadAgregar").val() != "-" &&
            $("#equipoAgregar").val() != "" &&
            $("#licenciaAgregar").val() != "-" &&
            $("#tipoturnoAgregar").val() != "-" &&
            $("#tipocontratoAgregar").val() != "-" &&
            $("#fecharequeridaAgregar").val() != "-" &&
            $("#remuneracionAgregar").val() != "-" &&
            $("#observacionAgregar").val() != "-" &&
            $("#preapruebaAgregar").val() != "-" &&
            $("#apruebaAgregar").val() != "-" &&
            $("#observacionEntrevistaPsicolaboral").val() != "-" &&
            $("#observacionEntrevistaTecnica").val() != "-" &&
            $("#observacionPruebaConduccion").val() != "-" &&
            $("#comentarioAgregar").val() != "-") {
            agregarDatos();
        } else {
            swal({
                type: "error",
                title: "Favor completar debidamente los campos requeridos.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
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

function tipoEquipamiento() {
    $('#tipoEquipamiento').empty();
    $('#tipoEquipamiento').append('<option value ="-">Seleccionar...</option>');
    var listarTipoEquipamiento = "";

    $.ajax({
        url: "../api_adm_nortrans/tipoEquipoMaquina/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarTipoEquipamiento += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoEquipamiento').append(listarTipoEquipamiento);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function agregarDatos() {
    var datos = '{"motivo":"' + $("#motivoAgregar").val() +
        '","division":"' + $("#divisionAgregar").val() +
        '","usuario":"' + $("#idUsuario").val() +
        '","cargo":"' + $("#cargoAgregar").val() +
        '","empresa":"' + $("#empresaAgregar").val() +
        '","centroDeCosto":"' + $("#centroDecostoAgregar").val() +
        '","cantidadSolicitada":"' + $("#cantidadAgregar").val() +
        '","tipoBus":"' + $("#equipoAgregar").val() +
        '","licenciaDeConducir":"' + $("#licenciaAgregar").val() +
        '","turnosLaborales":"' + $("#tipoturnoAgregar").val() +
        '","tipo_contrato":"' + $("#tipocontratoAgregar").val() +
        '","fechaRequerida":"' + $("#fecharequeridaAgregar").val() +
        '","fechaTermino":"' + $("#fechaterminoAgregar").val() +
        '","remuneracion":"' + $("#remuneracionAgregar").val() +
        '","comentario_general":"' + $("#comentarioAgregar").val() +
        '","preAprueba":"' + $("#preapruebaAgregar").val() +
        '","aprueba":"' + $("#apruebaAgregar").val();

    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funAgregar.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro cargado con exito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la carga",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

            if (response['mensaje'] === "registro_existente") {
                swal({
                    type: "error",
                    title: "El registro que quiere cargar ya existe en la base de datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}
