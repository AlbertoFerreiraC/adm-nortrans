document.addEventListener("DOMContentLoaded", function () {

    let idTareaActual = null;
    let idOtActual = null;

    // 🔹 Cargar lista de tareas pendientes al iniciar
    listarTareasPendientes();

    function listarTareasPendientes() {
        $.ajax({
            url: "../api_adm_nortrans/asignarTareas/funListarTareasPendientes.php",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTablaTareas(response.data);
                } else if (response.status === "no_data") {
                    mensajeInfo("No hay tareas pendientes registradas.");
                    limpiarTabla();
                } else {
                    mensajeError("Error al procesar la solicitud.");
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                mensajeError("Error de conexión con el servidor.");
            }
        });
    }

    function llenarTablaTareas(data) {
        let filas = "";

        data.forEach((tarea, i) => {
            filas += `
            <tr>
                <td>${i + 1}</td>
                <td>${formatearFecha(tarea.fecha)}</td>
                <td>${tarea.idot_interna}</td>
                <td>${tarea.maquina}</td>
                <td>${tarea.centro_de_costo}</td>
                <td>${tarea.tipo_tarea_mantencion}</td>
                <td>${tarea.sistema_maquina}</td>
                <td>${tarea.sub_sistema_maquina}</td>
                <td>${tarea.observacion ?? ''}</td>
                <td>${tarea.estado}</td>
                <td>
                    <button class="btn btn-success btn-sm btnVerTarea" data-id="${tarea.idtareas_ot}">
                        <i class="fa fa-tasks"></i> Asignar
                    </button>
                </td>
            </tr>`;
        });

        $("#tablaTareasPendientes tbody").html(filas);
    }

    function limpiarTabla() {
        $("#tablaTareasPendientes tbody").html(
            `<tr><td colspan="11" class="text-center">Ningún registro disponible</td></tr>`
        );
    }

    function formatearFecha(fechaISO) {
        if (!fechaISO) return "";
        const fecha = new Date(fechaISO);
        const dia = String(fecha.getDate()).padStart(2, "0");
        const mes = String(fecha.getMonth() + 1).padStart(2, "0");
        const anio = fecha.getFullYear();
        return `${dia}/${mes}/${anio}`;
    }

    // 🔹 Ver tarea y abrir modal
    $(document).on("click", ".btnVerTarea", function () {
        const idTarea = $(this).data("id");
        idTareaActual = idTarea;

        $.ajax({
            url: "../api_adm_nortrans/asignarTareas/funVerTarea.php",
            type: "POST",
            dataType: "json",
            data: { idTarea: idTarea },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDatosTarea(res.data);
                    idOtActual = res.data.idot_interna; // ✅ Guardar OT actual
                    $("#modalAsignarTarea").modal("show");
                } else {
                    mensajeInfo("No se encontraron detalles para esta tarea.");
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                mensajeError("Error al obtener los datos de la tarea.");
            }
        });
    });

    function mostrarDatosTarea(data) {
        $("#verNumOT").text(data.idot_interna);
        $("#verMaquina").text(data.maquina);
        $("#verCentro").text(data.centro_de_costo);
        $("#verTipoTarea").text(data.tipo_tarea_mantencion);
        $("#verSistema").text(data.sistema_maquina);
        $("#verSubSistema").text(data.sub_sistema_maquina);
        $("#verEstado").text(data.estado);

        // Cargar técnicos
        if (data.tecnicos && data.tecnicos.length > 0) {
            let opciones = `<option value="">-- Seleccione Técnico --</option>`;
            data.tecnicos.forEach(t => {
                opciones += `<option value="${t.id}">${t.nombre}</option>`;
            });
            $("#selectTecnico").html(opciones);
        }
    }

    // 🔹 Mostrar/ocultar campo técnico según tipo de asignación
    $("#tipoAsignacion").change(function () {
        const tipo = $(this).val();
        if (tipo === "asignar_tecnico") {
            $("#campoTecnico").slideDown();
        } else {
            $("#campoTecnico").slideUp();
        }
    });

    // 🔹 Confirmar asignación
    $("#btnConfirmarAsignacion").click(function () {
        const tipoAsignacion = $("#tipoAsignacion").val();
        const tecnico = $("#selectTecnico").val();

        if (!idOtActual) {
            mensajeError("No se ha cargado correctamente la OT.");
            return;
        }

        if (!tipoAsignacion) {
            mensajeError("Debe seleccionar un tipo de asignación.");
            return;
        }

        // Convertir tipo a texto esperado por backend
        let tipoTexto = "";
        switch (tipoAsignacion) {
            case "detencion_programada":
                tipoTexto = "Detención Programada";
                break;
            case "servicio_externo":
                tipoTexto = "Servicio Externo";
                break;
            case "asignar_tecnico":
                tipoTexto = "Interno";
                break;
            default:
                tipoTexto = "Otro";
                break;
        }

        const datos = {
            idTarea: idTareaActual,
            ot_interna: idOtActual,
            asignacion: tipoTexto,
            personal_tecnico: tecnico || null
        };

        $.ajax({
            url: "../api_adm_nortrans/asignarTareas/funAsignarTarea.php",
            type: "POST",
            dataType: "json",
            data: datos,
            success: function (res) {
                if (res.status === "ok") {
                    swal({
                        type: "success",
                        title: "Asignación realizada con éxito",
                        text: res.message,
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    }).then(() => {
                        $("#modalAsignarTarea").modal("hide");
                        listarTareasPendientes();
                    });
                } else {
                    mensajeError(res.message || "No se pudo completar la asignación.");
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                mensajeError("Error al procesar la asignación.");
            }
        });
    });

    // 🔹 Alertas
    function mensajeError(msj) {
        swal({
            type: "error",
            title: "Error",
            text: msj,
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }

    function mensajeInfo(msj) {
        swal({
            type: "info",
            title: "Aviso",
            text: msj,
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }

});
