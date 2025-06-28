$(document).ready(function () {

    cargarDatosTabla();

    $('#btncrearCargo').click(function () {
        areaNegocio();
        areaDependencia();
    });

    $('#btnGrabarFicha').click(function () {
        if ($("#nuevoNombre").val() != "" &&
            $("#divisionModificar").val() != "" &&
            $("#areaNegocio").val() != "" &&
            $("#areaDependencia").val() != "" &&
            $("#SolicitudPersonal").val() != "-" &&
            $("#autorizaSolicitudMs").val() != "-" &&
            $("#autorizaOc").val() != "" &&
            $("#aprobarSoliPersonal").val() != "-") {
            agregarCargo();
        } else {
            swal({
                type: "error",
                title: "Favor completar debidamente los campos requeridos.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    $('#btnModificarFicha').click(function () {
        if ($("#nuevoNombreMod").val() != "" &&
            $("#divisionModificarMod").val() != "" &&
            $("#areaNegocioMod").val() != "" &&
            $("#areaDependenciaMod").val() != "" &&
            $("#SolicitudPersonalMod").val() != "-" &&
            $("#autorizaSolicitudMsMod").val() != "-" &&
            $("#autorizaOcMod").val() != "" &&
            $("#aprobarSoliPersonalMod").val() != "-") {
            modificarDatos();
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
    $("#lista tbody").empty();
    var fila = "";

    $.ajax({
        url: "../api_adm_nortrans/cargoOrganizacional/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>' +
                    '<td>' + response[i].idcargo_organizacional + '</td>' +
                    '<td>' + response[i].nombre + '</td>' +
                    '<td>' + response[i].estado + '</td>' +
                    '<td>' +
                    '<center>' +
                    '<div class="btn-group" style="align-items: center; justify-content: center; display: flex;">' +
                    '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].idcargo_organizacional + '" data-toggle="modal" data-target="#modalEditar">' +
                    '<i class="fa fa-pencil"></i>' +
                    '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].idcargo_organizacional + '" data-toggle="modal" data-target="#modalModificar">' +
                    '<i class="fa fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +
                    '</tr>';
            }

            $('#lista tbody').append(fila);

            $('.btnModificar').click(function () {
                obtenerDatosParaModificarCargo(this.id);
            });

            $('.btnEliminar').click(function () {
                var id_registro = this.id;
                swal({
                    title: '¿Está seguro de eliminar el registro?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, eliminar registro!'
                }).then(function (result) {
                    if (result.value) {
                        eliminarCargo(id_registro);
                    }
                });
            });
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}

/*AREA PARA AGREGAR*/

function areaNegocio() {
    $('#areaNegocio').empty();
    $('#areaNegocio').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#areaNegocio').append(listaEmpresa);
        }
    });
}

function areaDependencia() {
    $('#areaDependencia').empty();
    $('#areaDependencia').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#areaDependencia').append(listaEmpresa);
        }
    });
}

function agregarCargo() {
    var params = {
        "nombre": $("#nuevoNombre").val(),
        "division": $("#divisionModificar").val(),
        "area_negocio": $("#areaNegocio").val(),
        "area_dependencia": $("#areaDependencia").val(),
        "solicitud_personal": $("#SolicitudPersonal").val(),
        "autoriza_ms": $("#autorizaSolicitudMs").val(),
        "autoriza_oc": $("#autorizaOc").val(),
        "aprueba_solicitud": $("#aprobarSoliPersonal").val()
    };

    $.ajax({
    url: "../api_adm_nortrans/cargoOrganizacional/funAgregar.php",
    method: "POST",
    contentType: "application/x-www-form-urlencoded",
    data: JSON.stringify(params),
    dataType: "json", // 🔥 Esta línea es clave
    success: function (response) {
        console.log(response); // Agregá esto para verificar
        if (response['mensaje'] === "ok") {
            swal({
                type: "success",
                title: "Registro cargado con exito",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            }).then(() => {
                location.reload();
            });
        } else if (response['mensaje'] === "nok") {
            swal({
                icon: "error",
                title: "Error al procesar la carga",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        } else if (response['mensaje'] === "registro_existente") {
            swal({
                icon: "error",
                title: "El registro ya existe en la base de datos",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    },
    error: function () {
        swal({
            icon: "error",
            title: "Error en la petición al servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }
});

}

function eliminarCargo(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/cargoOrganizacional/funEliminar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro eliminado con exito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la eliminación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la eliminación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

/*AREA PARA MODIFICACION*/

function obtenerDatosParaModificarCargo(valor) {

    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/cargoOrganizacional/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idModificar").val(response[i].idcargo_organizacional);
                $("#idcargo_organizacional").val(response[i].idcargo_organizacional);

                areaDependenciaModificar(response[i].cargo);
                areaNegocioModificar(response[i].cargo);

                $("#nuevoNombreMod").val(response[i].nombre);
                $('#divisionModificarMod option[value="' + response[i].division + '"]').attr("selected", true);
                $('#SolicitudPersonalMod option[value="' + response[i].solicitud_personal + '"]').attr("selected", true);
                $('#autorizaSolicitudMsMOd option[value="' + response[i].autoriza_ms + '"]').attr("selected", true);
                $('#autorizaOcMod option[value="' + response[i].autoriza_oc + '"]').attr("selected", true);
                $('#aprobarSoliPersonalMod option[value="' + response[i].aprueba_solicitud + '"]').attr("selected", true);

            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function modificarDatos() {
    var datos = new FormData();
    datos.append("idcargo_organizacional", $("#idcargo_organizacional").val());
    datos.append("area_negocio", $("#areaNegocioMod").val());
    datos.append("area_dependencia", $("#areaDependenciaMod").val());
    datos.append("nombre", $("#nuevoNombreMod").val());
    datos.append("division", $("#divisionModificarMod").val());
    datos.append("solicitud_personal", $("#autorizaSolicitudMsMod").val());
    datos.append("autoriza_ms", $("#autorizaSolicitudMsMod").val());
    datos.append("autoriza_oc", $("#autorizaOcMod").val());
    datos.append("aprueba_solicitud", $("#aprobarSoliPersonalMod").val());

    $.ajax({
        url: "../api_adm_nortrans/cargoOrganizacional/funModificar.php",
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
                    title: "Registro modificado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            } else if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la modificación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            } else if (response['mensaje'] === "repetido") {
                swal({
                    type: "error",
                    title: "El registro que quiere modificar ya existe en otro registro en la base de datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}


function areaDependenciaModificar(id) {
    $('#areaDependenciaMod').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#areaDependenciaMod').append(fila);
            $("#areaDependenciaMod option[value='" + id + "']").attr("selected", true);
        }
    });
}

function areaNegocioModificar(id) {
    $('#areaNegocioMod').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#areaNegocioMod').append(fila);
            $("#areaNegocioMod option[value='" + id + "']").attr("selected", true);
        }
    });
}

