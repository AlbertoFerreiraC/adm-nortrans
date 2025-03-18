$(document).ready(function () {
    cargarDatosSolicitudes();

    cargarFichaContrato();

    empresaAgregar();

});

function cargarDatosSolicitudes() {
    $("#listaSolicitud tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListarSolicitudes.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<tr><td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].empresa + '</td>' +
                    '<td>' + response[i].fecha_requerida + '</td>' +
                    '<td>' + response[i].usuario + '</td>' +
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].cantidad_contratada + '</td>' +
                    '<td>' +
                    '<button title="Seleccionar" class="btn btn-success btnSeleccionar" id="' + response[i].seleccionar +
                    '" onclick="window.location.href=\'seleccionarFicha\'">' +
                    '<i class="fa fa-check"></i></button>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Imprimir" class="btn btn-info btnImprimir" data-id="' + response[i].idcontratacion + '">' +
                    '<i class="fa fa-print"></i></button>' +
                    '</td>' +
                    '</tr>';
            }
            $('#listaSolicitud tbody').append(fila);

            $('.btnImprimir').click(function () {
                var id = $(this).data('id');
                funcionImprimir(id);
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

function funcionImprimir(id) {
    var contenido = '';
    var fila = $('button[data-id="' + id + '"]').closest('tr');

    fila.find('td').each(function () {
        contenido += $(this).text() + '\n';
    });

    var ventanaImpresion = window.open('', '', 'height=600,width=800');
    ventanaImpresion.document.write('<pre>' + contenido + '</pre>');
    ventanaImpresion.document.close();
    ventanaImpresion.print();
}

function empresaAgregar() {
    $('#empresaAgregar').empty();
    $('#empresaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#empresaAgregar').append(listaEmpresa);
        }
    });
}

function cargarFichaContrato() {
    $("#fichaContrato tbody").empty();
    var fila = "";

    $('#fichaContrato').off('click', '.btnTerminar');

    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListarContratado.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<tr><td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].empresa + '</td>' +
                    '<td>' + response[i].usuario + '</td>' +
                    '<td>' + response[i].fecha_inicio_laboral + '</td>' +
                    '<td>' + response[i].tipo_contrato + '</td>' +
                    '<td>' + response[i].turnos_laborales + '</td>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Editar" class="btn btn-warning btnEditar" id="' + response[i].idcontratacion +
                    '" onclick="window.location.href=\'seleccionarFicha?id=' + response[i].idcontratacion + '\'">' +
                    'Editar</button>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Terminar" class="btn btn-danger btnTerminar" id="' + response[i].idcontratacion + '">Terminar</button>' +
                    '</td>' +
                    '</tr>';
            }
            $('#fichaContrato tbody').append(fila);

            $('.btnTerminar').click(function () {
                configurarEventoTerminar(this.id);
            });

            $('.btnEditar').click(function () {
                var id = this.id;
                alert(id);
                window.location.href = 'seleccionarFicha?id=' + id;
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

function configurarEventoTerminar(id) {
    $('#fichaContrato').on('click', '.btnTerminar', function () {
        var idContrato = id;
        swal({
            title: "¿Está seguro?",
            text: "¿Desea terminar este contrato? Esta acción cambiará su estado a inactivo.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonColor: '#d33',
            confirmButtonText: "Sí, terminar",
            cancelButtonText: "Cancelar",
        }).then(function (result) {
            if (result.value) {
                inactivarContrato(idContrato);
            }
        });

    });
}

function inactivarContrato(idcontratacion) {
    console.log("Función inactivarContrato ejecutada con ID:", idcontratacion); // Para depuración

    var datos = {
        idcontratacion: idcontratacion,
    };

    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funCambiarEstadoContrato.php",
        method: "POST",
        data: JSON.stringify(datos),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response.status === "success") {
                swal({
                    type: "success",
                    title: "Contrato Finalizado",
                    text: "El contrato ha sido Finalizado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(function () {
                    // Recargar la lista de contratos después de cerrar la alerta
                    cargarFichaContrato();
                });
            } else {
                swal({
                    type: "error",
                    title: "Error",
                    text: "No se pudo finalizar el contrato: " + response.message,
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error AJAX:", textStatus, errorThrown);

        swal({
            type: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con el servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}

// Función para configurar el evento de edición
function configurarEventoEditar(id) {
    var idContrato = id;
    swal({
        title: "Editar contrato",
        text: "¿Desea editar este contrato?",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Sí, editar",
        cancelButtonText: "Cancelar",
    }).then(function (result) {
        if (result.value) {
            // Redirigir a la página de edición con el ID del contrato
            cargarDatosContrato(idContrato);
        }
    });
}

// Función para cargar los datos del contrato para edición
function cargarDatosContrato(idcontratacion) {
    console.log("Cargando datos del contrato con ID:", idcontratacion);

    // Mostrar indicador de carga
    swal({
        title: "Cargando...",
        text: "Obteniendo información del contrato",
        allowOutsideClick: false,
        onBeforeOpen: () => {
            swal.showLoading();
        }
    });

    // Realizar petición AJAX para obtener los datos del contrato
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funObtenerContrato.php",
        method: "POST",
        data: JSON.stringify({ idcontratacion: idcontratacion }),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response.status === "success") {
                swal.close();
                // Redirigir a la página de edición con el ID
                window.location.href = 'seleccionarFicha?id=' + idcontratacion;
            } else {
                swal({
                    type: "error",
                    title: "Error",
                    text: "No se pudieron obtener los datos del contrato: " + response.message,
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error AJAX:", textStatus, errorThrown);

        swal({
            type: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con el servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}

// Función para guardar los cambios del contrato (para usar en la página de edición)
function guardarCambiosContrato(idcontratacion, datosContrato) {
    console.log("Guardando cambios del contrato con ID:", idcontratacion);

    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funActualizarContrato.php",
        method: "POST",
        data: JSON.stringify({
            idcontratacion: idcontratacion,
            datos: datosContrato
        }),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            if (response.status === "success") {
                swal({
                    type: "success",
                    title: "Contrato Actualizado",
                    text: "El contrato ha sido actualizado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(function () {
                    // Redirigir a la lista de contratos
                    window.location.href = 'listaContratos';
                });
            } else {
                swal({
                    type: "error",
                    title: "Error",
                    text: "No se pudo actualizar el contrato: " + response.message,
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error AJAX:", textStatus, errorThrown);

        swal({
            type: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con el servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}