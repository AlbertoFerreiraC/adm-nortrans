document.addEventListener("DOMContentLoaded", function () {

    $("#btnBuscarOT").click(function () {
        const nroOT = $("#nroOT").val().trim();

        if (!nroOT) {
            mensajeError("Debe ingresar un número de OT para buscar.");
            return;
        }

        $.ajax({
            url: "../api_adm_nortrans/ordenTrabajo/funBuscarOT.php",
            type: "POST",
            dataType: "json",
            data: { nroOT: nroOT },
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTablaOT(response.data);
                } else if (response.status === "no_data") {
                    mensajeInfo("No se encontró ninguna OT con ese número.");
                    limpiarTablaOT();
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

    function llenarTablaOT(data) {
        let filas = "";

        data.forEach((ot, i) => {
            filas += `
      <tr>
        <td>${i + 1}</td>
        <td>${formatearFecha(ot.fecha)}</td>
        <td>${ot.maquina}</td>
        <td>${ot.centro_de_costo}</td>
        <td>${ot.km_actual}</td>
        <td>${ot.estado}</td>
        <td>
          <button class="btn btn-info btn-sm btnVerOT" data-id="${ot.idot_interna}">
            <i class="fa fa-eye"></i> Ver
          </button>
        </td>
      </tr>`;
        });

        $("#tablaOT tbody").html(filas);
    }

    function limpiarTablaOT() {
        $("#tablaOT tbody").html(
            `<tr><td colspan="7" class="text-center">Ningún registro disponible</td></tr>`
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

    $(document).on("click", ".btnVerOT", function () {
        const idOT = $(this).data("id");

        $.ajax({
            url: "../api_adm_nortrans/ordenTrabajo/funVerOT.php",
            type: "POST",
            dataType: "json",
            data: { idOT: idOT },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDatosOT(res.data);
                    $("#modalVerOT").modal("show");
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

    function mostrarDatosOT(data) {
        $("#verNumOT").text(data.num_ot);
        $("#verFechaOT").text(formatearFecha(data.fecha));
        $("#verEstado").text(data.estado);
        $("#verMaquina").text(data.maquina);
        $("#verCentro").text(data.centro_de_costo);
        $("#verKm").text(data.km);
        $("#verUsuario").text(data.creado_por);
        $("#verTipoOT").text("Interna");

        let filasTareas = "";
        if (data.tareas && data.tareas.length > 0) {
            data.tareas.forEach((t, i) => {
                filasTareas += `
        <tr>
          <td>${i + 1}</td>
          <td>${formatearFecha(t.fecha)}</td>
          <td>${t.tecnico}</td>
          <td>${t.tipo_tarea}</td>
          <td>${t.sistema}</td>
          <td>${t.sub_sistema}</td>
          <td>${t.observacion}</td>
          <td>${t.estado}</td>
        </tr>`;
            });
        } else {
            filasTareas = `<tr><td colspan="8" class="text-center">Sin tareas registradas</td></tr>`;
        }

        $("#tablaTareasOT tbody").html(filasTareas);
    }

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
