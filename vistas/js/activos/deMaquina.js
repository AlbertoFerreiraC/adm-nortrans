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
        aseguradora();
        tipoPoliza();
    });

    $('#nuevoEquipo').click(function () {
        proveedores();
        tipoEquipamiento();
    });

    $('#btnGrabarFicha').click(function () {
        if ($("#idpatente").val() != "" &&
            $("#numInterno").val() != "" &&
            $("#tipoMaquina").val() != "" &&
            $("#añoMaquina").val() != "" &&
            $("#capacidadTanque").val() != "-" &&
            $("#secuenciaMantencion").val() != "-" &&
            $("#asientosmaquina").val() != "" &&
            $("#numPuertas").val() != "-" &&
            $("#centroCosto").val() != "-" &&
            $("#idPatron").val() != "-") {
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

function aseguradora() {
    $('#seguro').empty();
    $('#seguro').append('<option value ="-">Seleccionar...</option>');
    var listarseguro = "";

    $.ajax({
        url: "../api_adm_nortrans/aseguradora/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarseguro += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#seguro').append(listarseguro);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function tipoPoliza() {
    $('#tipoPoliza').empty();
    $('#tipoPoliza').append('<option value ="-">Seleccionar...</option>');
    var listartipoPoliza = "";

    $.ajax({
        url: "../api_adm_nortrans/tipoPolizaSeguro/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listartipoPoliza += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoPoliza').append(listartipoPoliza);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function agregarDatos() {
    var datos = '{"patente":"' + $("#idpatente").val() +
        '","numero_interno_maquina":"' + $("#numInterno").val() +
        '","tipo_maquina":"' + $("#tipoMaquina").val() +
        '","anho_maquina":"' + $("#añoMaquina").val() +
        '","capacidad_estanque":"' + $("#capacidadTanque").val() +
        '","secuencia_mantenimiento":"' + $("#secuenciaMantencion").val() +
        '","numero_asientos":"' + $("#asientosmaquina").val() +
        '","numero_puertas":"' + $("#numPuertas").val() +
        '","centro_de_costo":"' + $("#centroCosto").val() +
        '","padron":"' + $("#idPatron").val();

    $.ajax({
        url: "../api_adm_nortrans/deMaquina/funAgregar.php",
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
