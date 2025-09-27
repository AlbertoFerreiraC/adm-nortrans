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
        url: "../api_adm_nortrans/sms/funListarPreAprueba.php",
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
                      <td>${i + 1}</td> <!-- N° SMS -->
                      <td>${r.empresa ?? ''}</td> <!-- Empresa -->
                      <td>${r.fecha_carga ?? ''}</td> <!-- Fecha -->
                      <td>${r.tipo ?? ''}</td> <!-- Tipo Solicitud -->
                      <td>${r.usuario ?? ''}</td> <!-- Solicitante -->
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
                    '<tr><td colspan="6" class="text-center">No hay solicitudes pendientes</td></tr>'
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

// Evento seleccionar
$(document).on("click", ".btn-seleccionar", function () {
    const id = $(this).data("id");
    const fila = $(this).closest("tr").children("td");

    $("#smsId").val(id);
    $("#smsEmpresa").val(fila.eq(1).text());
    $("#smsFecha").val(fila.eq(2).text());
    $("#smsTipo").val(fila.eq(3).text());
    $("#smsUsuario").val(fila.eq(4).text());
    $("#smsComentario").val("");

    $("#modalSeleccionar").modal("show");
});

// Botón Aprobar
$("#btnAprobar").on("click", function (e) {
    e.preventDefault();
    const id = $("#smsId").val();
    const comentario = $("#smsComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un comentario para pre aprobar",
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


function aprobar(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/sms/funPreAprobar.php",
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
                    title: "Pre-aprobación exitosa",
                    text: "El SMS fue pre-aprobado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                swal({
                    type: "error",
                    title: "Error al pre-aprobar",
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

function rechazar(id, comentario) {
    const params = { id: id, comentario: comentario };

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
