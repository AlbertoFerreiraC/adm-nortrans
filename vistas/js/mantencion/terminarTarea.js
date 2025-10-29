$(document).ready(function () {

    let idAsignacionActual = null;
    let idOtActual = null;

    listarTareasAsignadas();

    // ============================================================
    // 🔹 1. Cargar lista principal
    // ============================================================
    function listarTareasAsignadas() {
        $.ajax({
            url: "../api_adm_nortrans/terminarTarea/funListarTareasAsignadas.php",
            type: "GET",
            dataType: "json",
            cache: false,
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTablaAsignaciones(response.data);
                } else if (response.status === "no_data") {
                    mensajeInfo("No hay órdenes de trabajo asignadas.");
                    limpiarTabla();
                } else {
                    mensajeError("Error al procesar la solicitud.");
                }
            },
            error: function (xhr) {
                console.error("Error AJAX:", xhr.responseText);
                mensajeError("Error de conexión con el servidor.");
            }
        });
    }

    // ============================================================
    // 🔹 2. Llenar tabla principal
    // ============================================================
    function llenarTablaAsignaciones(data) {
        let filas = "";

        data.forEach((item, i) => {
            filas += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${formatearFecha(item.fecha_ot)}</td>
                    <td>${item.numero_ot}</td>
                    <td>${item.maquina}</td>
                    <td>${item.centro_de_costo}</td>
                    <td>${item.tipo_ot ?? "-"}</td>
                    <td>${item.tecnico_asignado ?? "Sin asignar"}</td>
                    <td>${item.estado_ot ?? "-"}</td>
                    <td>
                        <button class="btn btn-primary btn-sm btnSeleccionarAsignacion" 
                                data-id="${item.idasignaciones_ot}" 
                                data-ot="${item.numero_ot}">
                            <i class="fa fa-eye"></i> Ver
                        </button>
                    </td>
                </tr>`;
        });

        $("#tablaTareasAsignadas tbody").html(filas);
    }

    function limpiarTabla() {
        $("#tablaTareasAsignadas tbody").html(
            `<tr><td colspan="9" class="text-center">Ningún registro disponible</td></tr>`
        );
    }

    function formatearFecha(fechaISO) {
        if (!fechaISO) return "";
        const fecha = new Date(fechaISO);
        const dia = String(fecha.getDate()).padStart(2, "0");
        const mes = String(fecha.getMonth() + 1).padStart(2, "0");
        const anio = fecha.getFullYear();
        const hora = String(fecha.getHours()).padStart(2, "0");
        const minuto = String(fecha.getMinutes()).padStart(2, "0");
        const segundo = String(fecha.getSeconds()).padStart(2, "0");
        return `${dia}/${mes}/${anio} ${hora}:${minuto}:${segundo}`;
    }

    // ============================================================
    // 🔹 3. Ver detalle al presionar botón
    // ============================================================
    $(document).on("click", ".btnSeleccionarAsignacion", function () {
        idAsignacionActual = $(this).data("id");
        idOtActual = $(this).data("ot");

        $.ajax({
            url: "../api_adm_nortrans/terminarTarea/funVerDetalleOT.php",
            type: "POST",
            dataType: "json",
            data: { idOT: idOtActual },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDetalleOT(res.data);
                    $("#modalVerAsignacion").modal("show");

                    // Asignar fecha del sistema automáticamente
                    const ahora = new Date();
                    const fechaLocal = ahora.toISOString().slice(0, 19).replace("T", " ");
                    $("#fechaFinalSistema").val(fechaLocal);
                } else {
                    mensajeInfo("No se encontraron detalles para esta orden.");
                }
            },
            error: function (xhr) {
                console.error("Error AJAX:", xhr.responseText);
                mensajeError("Error al obtener los datos del detalle.");
            }
        });
    });

    // ============================================================
    // 🔹 4. Mostrar datos en el modal
    // ============================================================
    function mostrarDetalleOT(data) {
        const cab = data.cabecera;

        $("#verNumOT").text(cab.idot_interna);
        $("#verMaquina").text(cab.maquina);
        $("#verCentro").text(cab.centro_de_costo);
        $("#verFechaOT").text(formatearFecha(cab.fecha));
        $("#verKm").text(cab.km_actual);
        $("#verTipo").text(cab.asignacion);
        $("#verEstado").text(cab.estado);
        $("#verTecnico").text(cab.tecnico_asignado ?? "No asignado");
        $("#verFechaAsignacion").text(formatearFecha(cab.fecha_asignacion));
        $("#verFechaFinalizacion").text(formatearFecha(cab.fecha_finalizacion));
        $("#verObsAsignacion").text(cab.observacion_asignacion ?? "-");

        // 🔹 Llenar tabla detalle de tareas
        let filas = "";
        if (data.detalle && data.detalle.length > 0) {
            data.detalle.forEach((t, i) => {
                filas += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${formatearFecha(t.fecha)}</td>
                        <td>${t.tipo_tarea_mantencion}</td>
                        <td>${t.sistema_maquina}</td>
                        <td>${t.sub_sistema_maquina}</td>
                        <td>${t.observacion ?? "-"}</td>
                        <td>${t.estado ?? "-"}</td>
                    </tr>`;
            });
        } else {
            filas = `<tr><td colspan="7" class="text-center">No hay tareas registradas.</td></tr>`;
        }
        $("#tablaDetalleOT tbody").html(filas);
    }

    // ============================================================
    // 🔹 5. Finalizar Tarea
    // ============================================================
    $(document).on("click", "#btnFinalizarTarea", function () {
        const observacion = $("#observacionFinal").val().trim();

        if (!idAsignacionActual) {
            mensajeError("No se ha identificado la asignación.");
            return;
        }

        swal({
            title: "¿Confirmar finalización?",
            text: "La tarea se marcará como finalizada.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, finalizar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../api_adm_nortrans/terminarTarea/funFinalizarTarea.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        idAsignacion: idAsignacionActual,
                        observacion: observacion
                    },
                    success: function (res) {
                        if (res.status === "ok") {
                            swal({
                                type: "success",
                                title: "Finalizado",
                                text: res.message,
                                showConfirmButton: true
                            }).then(() => {
                                $("#modalVerAsignacion").modal("hide");
                                listarTareasAsignadas();
                            });
                        } else {
                            mensajeError(res.message);
                        }
                    },
                    error: function (xhr) {
                        console.error("Error AJAX:", xhr.responseText);
                        mensajeError("Error al finalizar la tarea.");
                    }
                });
            }
        });
    });

    // ============================================================
    // 🔹 6. Funciones de mensajes
    // ============================================================
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
