$(document).ready(function () {

    listarTareasAsignadas();

    // ============================
    // 🔹 FUNCION PRINCIPAL: LISTAR
    // ============================
    function listarTareasAsignadas() {
        $.ajax({
            url: "../api_adm_nortrans/asignarTareas/funListarCabeceraOT.php",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTablaTareas(response.data);
                } else if (response.status === "no_data") {
                    mensajeInfo("No hay tareas asignadas registradas.");
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

    // ============================
    // 🔹 LLENAR TABLA
    // ============================
    function llenarTablaTareas(data) {
        let filas = "";

        data.forEach((item, i) => {
            filas += `
            <tr>
                <td>${i + 1}</td>
                <td>${formatearFecha(item.fecha_asignacion)}</td>
                <td>${item.numero_ot}</td>
                <td>${item.maquina}</td>
                <td>${item.centro_de_costo}</td>
                <td>${item.tecnico_asignado}</td>
                <td>${item.tipo_ot}</td>
                <td>${item.observacion_asignacion ?? ''}</td>
                <td>${formatearFecha(item.fecha_finalizacion)}</td>
                <td>
                    <button class="btn btn-info btn-sm btnVerDetalle" data-id="${item.numero_ot}">
                        <i class="fa fa-eye"></i> Ver Detalle
                    </button>
                </td>
            </tr>`;
        });

        $("#tablaTareasAsignadas tbody").html(filas);
    }

    // ============================
    // 🔹 LIMPIAR TABLA
    // ============================
    function limpiarTabla() {
        $("#tablaTareasAsignadas tbody").html(
            `<tr><td colspan="10" class="text-center">Ningún registro disponible</td></tr>`
        );
    }

    // ============================
    // 🔹 FORMATEAR FECHA
    // ============================
    function formatearFecha(fechaISO) {
        if (!fechaISO) return "";
        const fecha = new Date(fechaISO);
        const dia = String(fecha.getDate()).padStart(2, "0");
        const mes = String(fecha.getMonth() + 1).padStart(2, "0");
        const anio = fecha.getFullYear();
        return `${dia}/${mes}/${anio}`;
    }

    // ============================
    // 🔹 VER DETALLE EN MODAL
    // ============================
    $(document).on("click", ".btnVerDetalle", function () {
        const idOT = $(this).data("id");

        $.ajax({
            url: "../api_adm_nortrans/asignarTareas/funVerDetalleOT.php",
            type: "POST",
            dataType: "json",
            data: { idOT: idOT },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDetalleOT(res.data);
                    $("#modalVerDetalleOT").modal("show");
                } else {
                    mensajeInfo("No se encontraron detalles para esta OT.");
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                mensajeError("Error al obtener los datos de la OT.");
            }
        });
    });

    // ============================
    // 🔹 MOSTRAR DETALLE EN MODAL
    // ============================
    function mostrarDetalleOT(data) {
        // Datos cabecera
        $("#verNumOT").text(data.cabecera.idot_interna);
        $("#verMaquina").text(data.cabecera.maquina);
        $("#verCentro").text(data.cabecera.centro_de_costo);
        $("#verUsuario").text(data.cabecera.usuario);
        $("#verFecha").text(formatearFecha(data.cabecera.fecha));
        $("#verKm").text(data.cabecera.km_actual);
        $("#verEstado").text(data.cabecera.estado);
        $("#verTipo").text(data.cabecera.asignacion);

        // Detalle de tareas
        let filas = "";
        if (data.detalle && data.detalle.length > 0) {
            data.detalle.forEach((t, i) => {
                filas += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${formatearFecha(t.fecha)}</td>
                    <td>${t.personal_tecnico ?? ''}</td>
                    <td>${t.tipo_tarea_mantencion}</td>
                    <td>${t.sistema_maquina}</td>
                    <td>${t.sub_sistema_maquina}</td>
                    <td>${t.observacion ?? ''}</td>
                    <td>${t.estado}</td>
                </tr>`;
            });
        } else {
            filas = `<tr><td colspan="8" class="text-center">No hay tareas registradas.</td></tr>`;
        }
        $("#tablaDetalleTareas tbody").html(filas);
    }

    function mensajeError(msj) {
        if (typeof Swal !== "undefined") {
            Swal.fire({ icon: "error", title: "Error", text: msj, confirmButtonColor: "#d33" });
        } else {
            alert("Error: " + msj);
        }
    }

    function mensajeInfo(msj) {
        if (typeof Swal !== "undefined") {
            Swal.fire({ icon: "info", title: "Aviso", text: msj, confirmButtonColor: "#3085d6" });
        } else {
            alert(msj);
        }
    }

});
