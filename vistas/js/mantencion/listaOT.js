$(document).ready(function () {

    listarOT();

    function listarOT() {
        $.ajax({
            url: "../api_adm_nortrans/consultaOT/funListarOT.php",
            type: "GET",
            dataType: "json",
            cache: false,
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTabla(response.data);
                } else {
                    $("#tablaOT tbody").html('<tr><td colspan="9" class="text-center">No hay órdenes registradas.</td></tr>');
                }
            },
            error: function (xhr) {
                console.error("Error AJAX:", xhr.responseText);
                swal("Error", "No se pudo cargar la información.", "error");
            }
        });
    }

    function llenarTabla(data) {
        let filas = "";
        data.forEach((ot, i) => {
            filas += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${formatearFecha(ot.fecha)}</td>
                    <td>${ot.idot_interna}</td>
                    <td>${ot.maquina}</td>
                    <td>${ot.centro_de_costo}</td>
                    <td>${ot.usuario}</td>
                    <td>${ot.km_actual}</td>
                    <td><span class="${claseEstado(ot.estado)}">${ot.estado}</span></td>
                    <td>
                        <button class="btn btn-info btn-sm btnVerOT" data-id="${ot.idot_interna}">
                            <i class="fa fa-eye"></i> Ver
                        </button>
                    </td>
                </tr>
            `;
        });
        $("#tablaOT tbody").html(filas);
    }

    // Ver detalle de OT
    $(document).on("click", ".btnVerOT", function () {
        const idOT = $(this).data("id");
        $.ajax({
            url: "../api_adm_nortrans/consultaOT/funVerOT.php",
            type: "POST",
            dataType: "json",
            data: { idOT: idOT },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDetalle(res.data);
                    $("#modalVerOT").modal("show");
                } else {
                    swal("Aviso", "No se encontraron tareas para esta OT.", "info");
                }
            },
            error: function (xhr) {
                console.error("Error AJAX:", xhr.responseText);
                swal("Error", "No se pudo obtener el detalle de la OT.", "error");
            }
        });
    });

    function mostrarDetalle(data) {
        const cab = data.cabecera;

        $("#verNumOT").text(cab.idot_interna);
        $("#verFecha").text(formatearFecha(cab.fecha));
        $("#verMaquina").text(cab.maquina);
        $("#verCentro").text(cab.centro_de_costo);
        $("#verUsuario").text(cab.usuario);
        $("#verKm").text(cab.km_actual);
        $("#verEstado").text(cab.estado);

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
                        <td>${t.observacion ?? '-'}</td>
                        <td>${t.estado}</td>
                    </tr>`;
            });
        } else {
            filas = `<tr><td colspan="7" class="text-center">Sin tareas registradas.</td></tr>`;
        }

        $("#tablaDetalleOT tbody").html(filas);
    }

    function claseEstado(estado) {
        switch (estado.toLowerCase()) {
            case "activo": return "estado-activo";
            case "finalizado": return "estado-finalizado";
            case "cancelado": return "estado-cancelado";
            default: return "";
        }
    }

    function formatearFecha(fechaISO) {
        if (!fechaISO) return "";
        const fecha = new Date(fechaISO);
        const dia = String(fecha.getDate()).padStart(2, "0");
        const mes = String(fecha.getMonth() + 1).padStart(2, "0");
        const anio = fecha.getFullYear();
        return `${dia}/${mes}/${anio}`;
    }
});