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
        url: "../api_adm_nortrans/sms/funListar.php", // endpoint de aprobar
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: "application/json",
        processData: false,
        dataType: "json",
        success: (response) => {
            if (response && response.length > 0) {
                const filas = response.map((r, i) => {
                    return `
                    <tr>
                      <td>${i + 1}</td>
                      <td>${r.id ?? ''}</td>
                      <td>${r.maquina ?? ''}</td>
                      <td>${r.tipo ?? ''}</td>
                      <td>${r.idproducto ?? ''}</td>
                      <td>${r.producto ?? ''}</td>
                      <td>${r.um ?? ''}</td>
                      <td>${r.cantidad ?? ''}</td>
                      <td>${r.usuario ?? ''}</td>
                      <td>${r.centro_costo ?? ''}</td>
                      <td>${r.estado ?? ''}</td>
                      <td>
                        <center>
                          <button class="btn btn-primary btn-xs btn-seleccionar" data-id="${r.id}">
                            SELECCIONAR
                          </button>
                        </center>
                      </td>
                    </tr>`;
                }).join('');
                $("#tablaOC tbody").append(filas);

            } else {
                $("#tablaOC tbody").append(
                    '<tr><td colspan="12" class="text-center">No hay solicitudes pendientes</td></tr>'
                );
            }
        },
        error: () => {
            swal({
                type: "error",
                title: "Error al cargar la tabla",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });
}

// Evento seleccionar → abre modal
$(document).on("click", ".btn-seleccionar", function () {
    const id = $(this).data("id");
    const fila = $(this).closest("tr").children("td");

    $("#smsId").val(id);
    $("#smsProducto").val(fila.eq(5).text());
    $("#smsCantidad").val(fila.eq(7).text());
    $("#smsUsuario").val(fila.eq(8).text());
    $("#smsCentroCosto").val(fila.eq(9).text());
    $("#smsComentario").val("");

    $("#modalSeleccionar").modal("show");
});

// Botón Aprobar
// Botón Aprobar
$("#btnAprobar").on("click", function (e) {
    e.preventDefault();
    const id = $("#smsId").val();
    const comentario = $("#smsComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un comentario para aprobar",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    aprobar(id, comentario);
});

// Botón Rechazar
$("#btnRechazar").on("click", function (e) {
    e.preventDefault();
    const id = $("#smsId").val();
    const comentario = $("#smsComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un motivo para rechazar",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    rechazar(id, comentario);
});


// --- APROBAR ---
function aprobar(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funAprobar.php", // endpoint de aprobar
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
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                swal({
                    type: "error",
                    title: "Error al aprobar",
                    text: (response && response.detalle) ? response.detalle : "No se pudo completar la acción.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (jqXHR, textStatus) {
            $("#modalSeleccionar").modal("hide");
            swal({
                type: "error",
                title: "Error de conexión",
                text: "Detalles: " + textStatus,
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        });
}

// --- RECHAZAR ---
function rechazar(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funRechazar.php", // mismo endpoint que en preAprobar
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
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                swal({
                    type: "error",
                    title: "Error al rechazar",
                    text: (response && response.detalle) ? response.detalle : "No se pudo completar la acción.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (jqXHR, textStatus) {
            $("#modalSeleccionar").modal("hide");
            swal({
                type: "error",
                title: "Error de conexión",
                text: "Detalles: " + textStatus,
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        });
}
