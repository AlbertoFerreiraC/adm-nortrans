$(document).ready(function () {

    cargarDatosTabla();

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


function cargarDatosTabla() {
    const tbody = $("#tablaDocumentos tbody");
    tbody.empty();
    $.ajax({
        url: "../api_adm_nortrans/deMaquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response && response.length > 0) {
                response.forEach((r) => {
                    const fila = `
                        <tr>
                            <td>${r.patente ?? ''}</td>
                            <td>${r.numero_interno_maquina ?? ''}</td>
                            <td>${r.tipo_documento_maquina_nombre ?? r.tipo_documento_maquina ?? ''}</td>
                            <td>${r.clase_bus_nombre ?? r.clase_bus ?? ''}</td>
                            <td>${r.modelo_chasis_nombre ?? r.modelo_chasis ?? ''}</td>
                            <td>${r.centro_costo_nombre ?? r.centro_de_costo ?? ''}</td>
                            <td>${r.estado ?? ''}</td>

                        </tr>`;
                    tbody.append(fila);
                });
            } else {
                tbody.append(`
                    <tr>
                        <td colspan="8" class="text-center">No hay resultados</td>
                    </tr>
                `);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar datos:", error);
            swal({
                type: "error",
                title: "Error al cargar el listado",
                text: error,
                confirmButtonText: "Aceptar"
            });
        }
    });
}

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

    const datos = {
        patente: $("#idpatente").val(),
        numero_interno_maquina: $("#numInterno").val(),
        tipo_maquina: $("#tipoMaquina").val(),
        anho_maquina: $("#añoMaquina").val(),
        capacidad_estanque: $("#capacidadTanque").val(),
        secuencia_mantenimiento: $("#secuenciaMantencion").val(),
        numero_asientos: $("#asientosmaquina").val(),
        numero_puertas: $("#numPuertas").val(),
        centro_de_costo: $("#centroCosto").val(),
        padron: $("#idPatron").val()
    };

    $.ajax({
        url: "../api_adm_nortrans/deMaquina/funAgregar.php",
        method: "POST",
        data: datos,
        dataType: "json",

        success: function (response) {

            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Registro cargado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            }

            if (response.mensaje === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la carga",
                    confirmButtonText: "Aceptar"
                });
            }

            if (response.mensaje === "registro_existente") {
                swal({
                    type: "error",
                    title: "El registro ya existe",
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error",
            confirmButtonText: "Aceptar"
        });
    });
}
