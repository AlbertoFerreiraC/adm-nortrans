document.addEventListener("DOMContentLoaded", function () {

    // 🔍 Buscar OT Preventiva
    $("#btnBuscarPreventiva").click(function () {
        const nroSolicitud = $("#nroSolicitud").val().trim();

        if (!nroSolicitud) {
            mensajeError("Debe ingresar un número de OT para buscar.");
            return;
        }

        $.ajax({
            url: "../api_adm_nortrans/preventivaOT/funBuscarPreventiva.php",
            type: "POST",
            dataType: "json",
            data: { nroSolicitud: nroSolicitud },
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTablaPreventiva(response.data);
                } else if (response.status === "no_data") {
                    mensajeInfo("No se encontraron órdenes preventivas con ese número.");
                    limpiarTablaPreventiva();
                } else {
                    mensajeError("Error al procesar la solicitud.");
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                mensajeError("Error de conexión con el servidor.");
            }
        });
    });

    // 🧾 Cargar tabla principal con todos los campos
    function llenarTablaPreventiva(data) {
        let filas = "";

        data.forEach((ot, i) => {
            filas += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${ot.id_preventiva}</td>
                    <td>${ot.usuario}</td>
                    <td>${ot.maquina}</td>
                    <td>${ot.centro_de_costo}</td>
                    <td>${formatearFecha(ot.fecha)}</td>
                    <td>${ot.km_actual}</td>
                    <td>${ot.estado}</td>
                    <td>
                        <button class="btn btn-info btn-sm btnVerPreventiva" data-id="${ot.id_preventiva}">
                            <i class="fa fa-eye"></i> Ver
                        </button>
                    </td>
                </tr>`;
        });

        $("#tablaPreventiva tbody").html(filas);
    }

    // 🧹 Limpiar tabla cuando no hay resultados
    function limpiarTablaPreventiva() {
        $("#tablaPreventiva tbody").html(
            `<tr><td colspan="9" class="text-center">Ningún registro disponible</td></tr>`
        );
    }

    // 🗓️ Formatear fechas
    function formatearFecha(fechaISO) {
        if (!fechaISO) return "";
        const fecha = new Date(fechaISO);
        const dia = String(fecha.getDate()).padStart(2, "0");
        const mes = String(fecha.getMonth() + 1).padStart(2, "0");
        const anio = fecha.getFullYear();
        return `${dia}/${mes}/${anio}`;
    }

    // 👁️ Ver detalle (abrir modal con cabecera + tareas)
    $(document).on("click", ".btnVerPreventiva", function () {
        const idOT = $(this).data("id");

        $.ajax({
            url: "../api_adm_nortrans/preventivaOT/funVerPreventiva.php",
            type: "POST",
            dataType: "json",
            data: { idPreventiva: idOT },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDatosPreventiva(res.data);
                    $("#modalPreventiva").modal("show");
                } else {
                    mensajeInfo("No se encontraron tareas para esta orden preventiva.");
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                mensajeError("Error al obtener los datos de la orden preventiva.");
            }
        });
    });

    // 🧩 Mostrar datos de la OT (cabecera + tareas)
    function mostrarDatosPreventiva(data) {
        // Cabecera
        $("#verNumOT").text(data.id_preventiva);
        $("#verUsuario").text(data.usuario);
        $("#verMaquinaPrev").text(data.maquina);
        $("#verCentroPrev").text(data.centro_de_costo);
        $("#verFechaPrev").text(formatearFecha(data.fecha));
        $("#verKmPrev").text(data.km_actual);
        $("#verEstadoPrev").text(data.estado);

        // Detalle (tareas)
        let filasTareas = "";
        if (data.tareas && data.tareas.length > 0) {
            data.tareas.forEach((t, i) => {
                filasTareas += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${formatearFecha(t.fecha)}</td>
                        <td>${t.personal_tecnico}</td>
                        <td>${t.tipo_tarea_mantencion}</td>
                        <td>${t.sistema_maquina}</td>
                        <td>${t.sub_sistema_maquina}</td>
                        <td>${t.observacion}</td>
                        <td>${t.estado}</td>
                    </tr>`;
            });
        } else {
            filasTareas = `<tr><td colspan="8" class="text-center">Sin tareas registradas</td></tr>`;
        }

        $("#tablaTareasPrev tbody").html(filasTareas);
    }

    // ⚠️ Alertas con SweetAlert
    function mensajeError(msj) {
        if (typeof Swal !== "undefined" && typeof Swal.fire === "function") {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: msj,
                confirmButtonColor: "#d33",
            });
        } else if (typeof swal !== "undefined") {
            swal({
                type: "error",
                title: "Error",
                text: msj,
                showConfirmButton: true,
                confirmButtonText: "Aceptar",
            });
        } else {
            alert("Error: " + msj);
        }
    }

    function mensajeInfo(msj) {
        if (typeof Swal !== "undefined" && typeof Swal.fire === "function") {
            Swal.fire({
                icon: "info",
                title: "Aviso",
                text: msj,
                confirmButtonColor: "#3085d6",
            });
        } else if (typeof swal !== "undefined") {
            swal({
                type: "info",
                title: "Aviso",
                text: msj,
                showConfirmButton: true,
                confirmButtonText: "Aceptar",
            });
        } else {
            alert(msj);
        }
    }

});
