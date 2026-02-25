$(document).ready(function () {
    cargarDatosTabla();

    // Filtro dinámico
    $('#filtradoDinamico').on('keyup change', function () {
        const q = (this.value || '').toLowerCase();
        $('#tablaOC tbody tr').each(function () {
            const hay = $(this).text().toLowerCase().indexOf(q) > -1;
            $(this).toggle(hay);
        });
    });
});

function cargarDatosTabla() {

    $("#tablaOC tbody").empty();

    const idUsuario = $("#idUsuario").val();
    const params = { id: idUsuario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funListar.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: "application/json",
        processData: false,
        dataType: "json",
        success: (response) => {

            if (response && response.length > 0) {

                const filas = response.map((r) => {
                    return `
                        <tr>
                            <td>${r.id ?? ''}</td>
                            <td>${r.empresa ?? ''}</td>
                            <td>${r.bodega ?? ''}</td>
                            <td>${r.maquina ?? ''}</td>
                            <td>${r.tipo ?? ''}</td>
                            <td>${r.usuario ?? ''}</td>
                            <td>${r.fecha_carga ?? ''}</td>
                            <td>${r.estado ?? ''}</td>
                            <td class="text-center">
                                <button
                                    class="btn btn-primary btn-xs btn-seleccionar"
                                    data-id="${r.id}"
                                    data-empresa="${r.empresa}"
                                    data-bodega="${r.bodega}"
                                    data-maquina="${r.maquina}"
                                    data-tipo="${r.tipo}"
                                    data-usuario="${r.usuario}"
                                    data-fecha="${r.fecha_carga}"
                                    data-estado="${r.estado}">
                                    SELECCIONAR
                                </button>
                            </td>
                        </tr>
                    `;
                }).join('');

                $("#tablaOC tbody").append(filas);

            } else {

                $("#tablaOC tbody").append(`
                    <tr>
                        <td colspan="9" class="text-center">
                            No hay solicitudes pendientes
                        </td>
                    </tr>
                `);

            }
        },
        error: () => {
            swal({
                type: "error",
                title: "Error al cargar la tabla",
                confirmButtonText: "Aceptar"
            });
        }
    });
}


// ======================= SELECCIONAR SMS =======================
$(document).on("click", ".btn-seleccionar", function () {

    const btn = $(this);

    $("#smsId").val(btn.data("id"));

    // Estos campos existen a nivel cabecera
    $("#smsProducto").val(btn.data("tipo"));      // Tipo de SMS
    $("#smsUsuario").val(btn.data("usuario"));
    $("#smsCentroCosto").val(btn.data("bodega")); // placeholder hasta detalle real

    $("#smsComentario").val("");

    $("#modalSeleccionar").modal("show");
});


// ======================= BOTÓN APROBAR =======================
$("#btnAprobar").on("click", function (e) {
    e.preventDefault();

    const id = $("#smsId").val();
    const comentario = $("#smsComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un comentario para aprobar",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    aprobar(id, comentario);
});


// ======================= BOTÓN RECHAZAR =======================
$("#btnRechazar").on("click", function (e) {
    e.preventDefault();

    const id = $("#smsId").val();
    const comentario = $("#smsComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un motivo para rechazar",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    rechazar(id, comentario);
});


// ======================= APROBAR =======================
function aprobar(id, comentario) {

    const params = { id, comentario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funAprobar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {

            $("#modalSeleccionar").modal("hide");

            if (response && response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Aprobación exitosa",
                    text: "El SMS fue aprobado correctamente.",
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                swal({
                    type: "error",
                    title: "Error al aprobar",
                    text: response?.detalle || "No se pudo completar la acción.",
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (_, textStatus) {
            $("#modalSeleccionar").modal("hide");
            swal({
                type: "error",
                title: "Error de conexión",
                text: "Detalles: " + textStatus,
                confirmButtonText: "Aceptar"
            });
        });
}


// ======================= RECHAZAR =======================
function rechazar(id, comentario) {

    const params = { id, comentario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funRechazar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {

            $("#modalSeleccionar").modal("hide");

            if (response && response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Rechazo exitoso",
                    text: "El SMS fue rechazado correctamente.",
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                swal({
                    type: "error",
                    title: "Error al rechazar",
                    text: response?.detalle || "No se pudo completar la acción.",
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (_, textStatus) {
            $("#modalSeleccionar").modal("hide");
            swal({
                type: "error",
                title: "Error de conexión",
                text: "Detalles: " + textStatus,
                confirmButtonText: "Aceptar"
            });
        });
}
