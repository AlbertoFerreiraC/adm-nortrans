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
        url: "../api_adm_nortrans/generarOC/funListar.php",
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
                      <td>${r.empresa ?? ''}</td>
                      <td>${r.id ?? ''}</td>
                      <td>${r.fecha_creacion ?? ''}</td>
                      <td>${r.doc_proveedor ?? ''}</td>
                      <td>${r.proveedor ?? ''}</td>
                      <td>${r.total_general ?? ''}</td>
                      <td>${r.pre_aprueba ?? ''}</td>
                      <td>
                        <center>
                          <button class="btn btn-primary btn-xs btn-seleccionar" 
                                  data-id="${r.id}">
                            SELECCIONAR
                          </button>
                        </center>
                      </td>
                    </tr>`;
                }).join('');
                $("#tablaOC tbody").append(filas);

            } else {
                $("#tablaOC tbody").append(
                    '<tr><td colspan="8" class="text-center">No hay solicitudes pendientes</td></tr>'
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

$(document).on("click", ".btn-seleccionar", function () {
    const id = $(this).data("id");
    const fila = $(this).closest("tr").children("td");

    $("#ocId").val(id);
    $("#ocEmpresa").val(fila.eq(0).text());
    $("#ocNumero").val(fila.eq(1).text());
    $("#ocFecha").val(fila.eq(2).text());
    $("#ocProveedor").val(fila.eq(4).text());
    $("#ocMonto").val(fila.eq(5).text());
    $("#ocComentario").val("");

    $("#modalSeleccionarOC").modal("show");
});


// Botón Aprobar
$("#btnAprobarOC").on("click", function (e) {
    e.preventDefault();
    const id = $("#ocId").val();
    const comentario = $("#ocComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un comentario para aprobar",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    aprobarOC(id, comentario);
});

// Botón Rechazar
$("#btnRechazarOC").on("click", function (e) {
    e.preventDefault();
    const id = $("#ocId").val();
    const comentario = $("#ocComentario").val();

    if (!comentario.trim()) {
        swal({
            type: "warning",
            title: "Debes escribir un motivo para rechazar",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    rechazarOC(id, comentario);
});

// --- APROBAR ---
function aprobarOC(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funAprobar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {
            $("#modalSeleccionarOC").modal("hide");
            if (response && response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Aprobación exitosa",
                    text: "La OC fue aprobada correctamente.",
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
            $("#modalSeleccionarOC").modal("hide");
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
function rechazarOC(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funRechazar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {
            $("#modalSeleccionarOC").modal("hide");
            if (response && response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Rechazo exitoso",
                    text: "La OC fue rechazada correctamente.",
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
            $("#modalSeleccionarOC").modal("hide");
            swal({
                type: "error",
                title: "Error de conexión",
                text: "Detalles: " + textStatus,
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        });
}
