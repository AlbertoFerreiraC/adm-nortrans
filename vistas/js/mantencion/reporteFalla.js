$(document).ready(function () {

    listarDatos();

    $('#filtradoDinamico').keyup(function () {

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

    });


    $('#nuevoReporte').click(function () {
        cargarMaquina();
        listarSistema();
        listarSubSistema();
        listarConductor();
        $("#observacionAgregar").val();
        $("#kmActualAgregar").val();
    });

    $('#btnAgregarDetalleAgregar').click(function () {
        if ($("#sistemaAgregar").val() != "-" &&
            $("#subSistemaAgregar").val() != "-" &&
            $("#observacionAgregar").val() != "") {
            agregarFalla();
        } else {
            swal({
                type: "error",
                title: "Debe seleccionar y cargar todos los campos obligatorios.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    $('#btnAgregarReporte').click(function () {
        if ($("#maquinaAgregar").val() != "-" &&
            $("#conductorAgregar").val() != "-" &&
            $("#kmActualAgregar").val() != "" &&
            contadorDeFilasFalla() > 0) {
            procesarCabecera();
        } else {
            swal({
                type: "error",
                title: "Debe seleccionar y cargar todos los campos obligatorios.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    $('#btnAgregarDetalleModificar').click(function () {
        if ($("#sistemaModificar").val() != "-" &&
            $("#subSistemaModificar").val() != "-" &&
            $("#observacionModificar").val() != "") {
            agregarFallaModificar();
        } else {
            swal({
                type: "error",
                title: "Debe seleccionar y cargar todos los campos obligatorios.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    $('#btnModificarReporte').click(function () {
        if ($("#maquinaModificar").val() != "-" &&
            $("#conductorModificar").val() != "-" &&
            $("#kmActualModificar").val() != "") {
            modificarCabecera();
        } else {
            swal({
                type: "error",
                title: "Debe seleccionar y cargar todos los campos obligatorios.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

});


// PARA AGREGAR

function cargarMaquina() {
    $('#maquinaAgregar').empty();
    $('#maquinaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarMaquinas.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#maquinaAgregar').append(listaEmpresa);
        }
    });
}

function listarSistema() {
    $('#sistemaAgregar').empty();
    $('#sistemaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarSistema.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#sistemaAgregar').append(listaEmpresa);
        }
    });
}

function listarSubSistema() {
    $('#subSistemaAgregar').empty();
    $('#subSistemaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarSubSistema.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#subSistemaAgregar').append(listaEmpresa);
        }
    });
}

function listarConductor() {
    $('#conductorAgregar').empty();
    $('#conductorAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funListarConductores.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#conductorAgregar').append(listaEmpresa);
        }
    });
}

function agregarFalla() {
    var fila = "";
    fila = '<tr id ="filaFalla_' + contadorDeFilasFalla() + '">' +
        '<td>' + $("#sistemaAgregar option:selected").text() + '</td>' +
        '<td>' + $("#subSistemaAgregar option:selected").text() + '</td>' +
        '<td>' + $("#observacionAgregar").val() + '</td>' +
        '<td>' +
        '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarAgregar" id="' + contadorDeFilasFalla() + '"><i class="fa fa-times"></i></button>' +
        '</td>' +
        '<td style="display: none;" >' + $("#sistemaAgregar").val() + '</td>' +
        '<td style="display: none;" >' + $("#subSistemaAgregar").val() + '</td>' +
        +'</tr>';
    $('#tablaDetalleAgergar').append(fila);
    listarSistema();
    listarSubSistema();
    $("#observacionAgregar").val('');

    $('.btnEliminarAgregar').click(function () {
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
                $("#filaFalla_" + id_registro).remove();
            }
        });
    });
}

function contadorDeFilasFalla() {
    var cont = 0;
    $('#tablaDetalleAgergar tbody tr').each(function () {
        cont++;
    });
    return (cont + 1);
}

function procesarCabecera() {
    var params = {
        "idUsuario": $("#idUsuario").val(),
        "maquina": $("#maquinaAgregar").val(),
        "kmActual": $("#kmActualAgregar").val(),
        "conductor": $("#conductorAgregar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funProcesarCabecera.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] != "nok") {
                procesarFallas(response['mensaje']);
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la carga",
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

function procesarFallas(id) {
    var datos = '{"idFalla":"' + id + '", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
    $('#tablaDetalleAgergar tbody tr').each(function () {
        datos_tabla = datos_tabla +
            '{"sistema":"' + $(this).find("td").eq(4).html() +
            '","subSistema":"' + $(this).find("td").eq(5).html() +
            '","observacion":"' + $(this).find("td").eq(2).html() + '"},';
    });
    datos_tabla = datos_tabla.substr(0, datos_tabla.length - 1);
    datos_tabla = datos_tabla + ']';
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funProcesarDetalle.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] == "ok") {
                swal({
                    type: "success",
                    title: "Reporte de falla cargada con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga de tareas.");
            }
        }
    });

}

// LISTADO

function listarDatos() {
    $("#tablaReportes tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funListaReporteFalla.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>';
                fila += '<td>' + response[i].id + '</td>';
                fila += '<td>' + response[i].maquina + '</td>';
                fila += '<td>' + response[i].conductor + '</td>';
                fila += '<td>' + response[i].kmReportado + '</td>';
                fila += '<td>' + response[i].fecha + '</td>';
                fila += '<td>';
                fila += '<center>';
                fila += '<div class="btn-group">';
                fila += '<button title="MOdificar" class="btn btn-warning btnModificarFalla" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificarReporte"><i class="fa fa-pencil"></i></button>';
                fila += '</div>';
                fila += '<div class="btn-group">';
                fila += '<button title="Eliminar" class="btn btn-danger btnEliminarFalla" id="' + response[i].id + '"><i class="fa fa-times"></i></button>';
                fila += '</div>';
                fila += '</center>';
                fila += '</td>';
                fila += '</tr>';
            }

            $('#tablaReportes tbody').append(fila);

            $('.btnModificarFalla').click(function () {
                var id_registro = this.id;
                obtenerDatosParaModificar(id_registro);
            });

            $('.btnEliminarFalla').click(function () {
                var id_registro = this.id;
                swal({
                    title: '¿Está seguro de anular el registro?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, anular registro'
                }).then(function (result) {
                    if (result.value) {
                        eliminarFalla(id_registro);
                    }
                });
            });
        }
    }).fail(function () {
        swal({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            button: "Aceptar"
        });
    });
}

function eliminarFalla(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funEliminarFalla.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                location.reload();
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

function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idModificar").val(response[i].id);
                $("#kmActualModificar").val(response[i].kmReportado);
                cargarMaquinaModificar(response[i].maquina);
                listarConductorModificar(response[i].conductor);
                listarDetalleFalla(response[i].id);
                //----------------------------------------------------
                listarSistemaModificar();
                listarSubSistemaModificar();
                $("#observacionAgregar").val('');
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function cargarMaquinaModificar(id) {
    $('#maquinaModificar').empty();
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarMaquinas.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#maquinaModificar').append(listaEmpresa);
            $("#maquinaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function listarConductorModificar(id) {
    $('#conductorModificar').empty();
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funListarConductores.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#conductorModificar').append(listaEmpresa);
            $("#conductorModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function listarSistemaModificar() {
    $('#sistemaModificar').empty();
    $('#sistemaModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarSistema.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#sistemaModificar').append(listaEmpresa);
        }
    });
}

function listarSubSistemaModificar() {
    $('#subSistemaModificar').empty();
    $('#subSistemaModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarSubSistema.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#subSistemaModificar').append(listaEmpresa);
        }
    });
}

function listarDetalleFalla(id) {
    $("#tablaDetalleModificar tbody").empty();
    var params = {
        "id": id
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/dunDatosDetalleFalla.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>';
                fila += '<td>' + response[i].sistema + '</td>';
                fila += '<td>' + response[i].sub_sistema + '</td>';
                fila += '<td>' + response[i].observacion + '</td>';
                fila += '<td>';
                fila += '<center>';
                fila += '<div class="btn-group">';
                fila += '<button title="Eliminar" class="btn btn-danger btnEliminarFallaModificar" id="' + response[i].id + '"><i class="fa fa-times"></i></button>';
                fila += '</div>';
                fila += '</center>';
                fila += '</td>';
                fila += '</tr>';
            }

            $('#tablaDetalleModificar tbody').append(fila);

            $('.btnEliminarFallaModificar').click(function () {
                var id_registro = this.id;
                swal({
                    title: '¿Está seguro de anular el registro?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, anular registro'
                }).then(function (result) {
                    if (result.value) {
                        eliminarFallaTarea(id_registro);
                    }
                });
            });


        }
    }).fail(function () {
        swal({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            button: "Aceptar"
        });
    });
}

function agregarFallaModificar() {

    var datos = '{"idFalla":"' + $("#idModificar").val() + '", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
    datos_tabla = datos_tabla +
        '{"sistema":"' + $("#sistemaModificar").val() +
        '","subSistema":"' + $("#subSistemaModificar").val() +
        '","observacion":"' + $("#observacionModificar").val() + '"},';
    datos_tabla = datos_tabla.substr(0, datos_tabla.length - 1);
    datos_tabla = datos_tabla + ']';
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funProcesarDetalle.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] == "ok") {
                listarSistema();
                listarSubSistema();
                $("#observacionAgregar").val('');
                listarDetalleFalla($("#idModificar").val());
            }

            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga de fallas.");
            }
        }
    });
}

function eliminarFallaTarea(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funEliminarFallaTarea.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                listarDetalleFalla($("#idModificar").val());
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

function modificarCabecera() {
    var params = {
        "idFalla": $("#idModificar").val(),
        "maquina": $("#maquinaModificar").val(),
        "kmActual": $("#kmActualModificar").val(),
        "conductor": $("#conductorModificar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarReporteFalla/funModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] != "nok") {
                swal({
                    type: "success",
                    title: "Operación realizada con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
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
