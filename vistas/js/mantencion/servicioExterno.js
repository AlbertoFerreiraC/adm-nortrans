$(document).ready(function () {

    cargarDatosServicioExterno();
    cargarProveedores();
    cargarMaquinas();
    cargarTipoTarea();
    listarSistema();
    listarSubSistema();

    // VALIDAR TIPO DE TAREA Y MOSTRAR SECCIÓN CORRECTIVA
    $('#btnValidarTarea').click(function () {
        if ($("#fechaOt").val() !== "" &&
            $("#tipoTarea").val() !== "-" &&
            $("#maquina").val() !== "-" &&
            $("#proveedor").val() !== "-") {

            $("#seccionCorrectiva").slideDown("fast");

        } else {
            swal({
                type: "error",
                title: "Debe seleccionar la fecha OT, tipo de tarea, máquina y proveedor antes de validar.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    // AGREGAR TAREA
    $('#btnAgregarTarea').click(function () {
        if ($("#sistema").val() != "-" &&
            $("#subSistema").val() != "-" &&
            $("#observacion").val().trim() != "") {

            agregarTarea();

        } else {
            swal({
                type: "error",
                title: "Debe completar todos los campos para agregar una tarea.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    // GENERAR SERVICIO EXTERNO (CABECERA + DETALLES)
    $('#btnGenerarServicio').click(function () {
        if ($("#fechaOt").val() != "" && $("#fechaHora").val() != "" && $("#maquina").val() != "-" && $("#proveedor").val() != "-") {
            generarServicioExterno();
        } else {
            swal({
                type: "error",
                title: "Debe completar todos los campos principales antes de generar el servicio.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    // =========================== //
    // EVENTO CAMBIO DE MÁQUINA
    // =========================== //
    $("#maquina").on("change", function () {
        const idMaquina = $(this).val();

        if (idMaquina !== "-" && idMaquina !== "") {
            $.ajax({
                url: "../api_adm_nortrans/servicioExterno/funObtenerKmActual.php",
                method: "POST",
                data: JSON.stringify({ idmaquina: idMaquina }),
                contentType: "application/json",
                dataType: "json",
                success: function (response) {
                    if (response.mensaje === "ok") {
                        $("#kmActual").val(response.km_actual);
                    } else {
                        $("#kmActual").val("");
                        swal({
                            type: "warning",
                            title: "No se pudo obtener el kilometraje de la máquina seleccionada.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                    }
                },
                error: function () {
                    $("#kmActual").val("");
                    swal({
                        type: "error",
                        title: "Error al consultar el kilometraje de la máquina.",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    });
                }
            });
        } else {
            $("#kmActual").val("");
        }
    });

});

//===========================//
//  CARGAR TABLA SERVICIO EXTERNO
//===========================//

function cargarDatosServicioExterno() {
    $("#tablaServicioExterno tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/servicioExterno/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let fila = "";

            for (let i in response) {
                fila += `
                    <tr>
                        <td><center>${parseInt(i) + 1}</center></td>
                        <td><center>${response[i].fecha_ot || ''}</center></td>
                        <td><center>${response[i].maquina || ''}</center></td>
                        <td><center>${response[i].proveedor || ''}</center></td>
                        <td><center>
                            <div class="btn-group">
                                <button class="btn btn-danger btn-sm btnEliminar" id="${response[i].idservicio_externo}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </center></td>
                    </tr>`;
            }

            if (fila === "") {
                fila = '<tr><td colspan="6" class="text-center">Ningún registro disponible</td></tr>';
            }

            $("#tablaServicioExterno tbody").append(fila);

            // Acción eliminar
            $(".btnEliminar").click(function () {
                const idservicio_externo = this.id;
                swal({
                    title: "¿Está seguro de eliminar este servicio?",
                    text: "Esta acción no se puede deshacer.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, eliminar"
                }).then(function (result) {
                    if (result.value) eliminarServicioExterno(idservicio_externo);
                });
            });
        },
        error: function () {
            mensajeError("Error al cargar los registros de servicio externo.");
        }
    });
}

//===========================//
//  ELIMINAR SERVICIO EXTERNO
//===========================//
function eliminarServicioExterno(idservicio_externo) {
    $.ajax({
        url: "../api_adm_nortrans/servicioExterno/funEliminar.php",
        method: "POST",
        data: JSON.stringify({ idservicio_externo }),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Servicio eliminado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosServicioExterno());
            } else {
                mensajeError("Error al eliminar el servicio externo.");
            }
        },
        error: function () {
            mensajeError("Error al conectar con el servidor.");
        }
    });
}

//===========================//
//      FUNCIONES AJAX       //
//===========================//

function cargarProveedores() {
    $('#proveedor').empty().append('<option value ="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/proveedor/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += '<option value="' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#proveedor').append(lista);
        }
    });
}

function cargarMaquinas() {
    $('#maquina').empty().append('<option value ="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/maquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += '<option value="' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#maquina').append(lista);
        }
    });
}


function cargarTipoTarea() {
    $('#tipoTarea').empty().append('<option value ="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/tipoTareaMantencion/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += '<option value="' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#tipoTarea').append(lista);
        }
    });
}

function listarSistema() {
    $('#sistema').empty().append('<option value ="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/sistemaMaquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += '<option value="' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#sistema').append(lista);
        }
    });
}

function listarSubSistema() {
    $('#subSistema').empty().append('<option value ="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/subsistemaMaquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += '<option value="' + response[i].id + '">' + response[i].descripcion.toUpperCase() + '</option>';
            }
            $('#subSistema').append(lista);
        }
    });
}

//===========================//
//      FUNCIONES LÓGICA     //
//===========================//

function agregarTarea() {
    const sistemaTxt = $("#sistema option:selected").text();
    const subSistemaTxt = $("#subSistema option:selected").text();
    const obs = $("#observacion").val();

    const fila = `
        <tr>
            <td data-id="${$("#sistema").val()}">${sistemaTxt}</td>
            <td data-id="${$("#subSistema").val()}">${subSistemaTxt}</td>
            <td>${obs}</td>
            <td><button type="button" class="btn btn-danger btn-sm btnEliminarTarea"><i class="fa fa-trash"></i></button></td>
        </tr>
    `;

    $("#tablaTareas tbody tr td").filter(function () {
        return $(this).text().trim() === "Ningún dato disponible en esta tabla";
    }).closest("tr").remove();

    $("#tablaTareas tbody").append(fila);
    $("#observacion").val("");

    $(".btnEliminarTarea").click(function () {
        $(this).closest("tr").remove();
        if ($("#tablaTareas tbody tr").length === 0) {
            $("#tablaTareas tbody").html('<tr><td colspan="4" class="text-center">Ningún dato disponible en esta tabla</td></tr>');
        }
    });
}

function generarServicioExterno() {
    // Obtener las tareas de la tabla
    const tareas = [];
    $("#tablaTareas tbody tr").each(function () {
        const tds = $(this).find("td");
        if (tds.length > 1) {
            tareas.push({
                sistema_maquina: $(tds[0]).attr("data-id"),
                sub_sistema_maquina: $(tds[1]).attr("data-id"),
                observacion: $(tds[2]).text().trim()
            });
        }
    });

    if (tareas.length === 0) {
        swal({
            type: "error",
            title: "Debe agregar al menos una tarea antes de generar el servicio externo.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    const dataCabecera = {
        usuario: $("#idUsuario").val(),
        maquina: $("#maquina").val(),
        proveedor: $("#proveedor").val(),
        fecha_ot: $("#fechaOt").val(),
        fecha_hora: $("#fechaHora").val(),
        estado: "activo",
        tareas: tareas
    };

    $.ajax({
        url: "../api_adm_nortrans/servicioExterno/funGenerarServicio.php",
        method: "POST",
        data: JSON.stringify(dataCabecera),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Servicio externo generado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else {
                mensajeError("Error al generar el servicio externo.");
            }
        },
        error: function () {
            mensajeError("Error al conectar con el servidor.");
        }
    });
}

function mensajeError(mensaje) {
    swal({
        type: "error",
        title: mensaje,
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
    });
}
