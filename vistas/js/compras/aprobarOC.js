$(document).ready(function () {
    cargarDatosTabla();

    $('#filtradoDinamico').on('keyup change', function () {
        const q = (this.value || '').toLowerCase();
        $('#tabla tbody tr').each(function () {
            const hay = $(this).text().toLowerCase().indexOf(q) > -1;
            $(this).toggle(hay);
        });
    });

    $('#tabla').on('click', '.btn-aprobar', async function () {
        const id = $(this).data('id');
        if (!id) return;

        const { isConfirmed, value: comentario } = await Swal.fire({
            title: '¿Aprobar OC?',
            input: 'textarea',
            inputLabel: 'Comentario (opcional)',
            inputPlaceholder: 'Escribí un comentario si lo necesitás…',
            inputAttributes: { 'aria-label': 'Comentario (opcional)' },
            showCancelButton: true,
            confirmButtonText: 'Aprobar',
            cancelButtonText: 'Cancelar'
        });
        if (!isConfirmed) return;

        aprobar(id, comentario || '');
    });

    $('#tabla').on('click', '.btn-rechazar', async function () {
        const id = $(this).data('id');
        if (!id) return;

        const { isConfirmed, value: comentario } = await Swal.fire({
            title: '¿Rechazar OC?',
            input: 'textarea',
            inputLabel: 'Motivo / comentario (requerido)',
            inputPlaceholder: 'Indicá el motivo del rechazo…',
            inputAttributes: { 'aria-label': 'Motivo / comentario' },
            inputValidator: (v) => (!v || !v.trim() ? 'El motivo es obligatorio' : undefined),
            showCancelButton: true,
            confirmButtonText: 'Rechazar',
            cancelButtonText: 'Cancelar'
        });
        if (!isConfirmed) return;

        rechazar(id, comentario.trim());
    });
});
function cargarDatosTabla() {
    $("#tabla tbody").empty();

    const idUsuario = $("#idUsuario").val();
    const params = { id: idUsuario };

    $.ajax({
        url: "../api_adm_nortrans/generaOC/funListar.php",
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
              <td>${Number.parseInt(i) + 1}</td>
              <td>
                <div class="btn-group" style="display:flex; gap:6px; justify-content:center;">
                  <button class="btn btn-success btn-xs btn-aprobar"  data-id="${r.idcontratacion}">
                    <i class="fa fa-check"></i> Aprobar
                  </button>
                  <button class="btn btn-danger btn-xs btn-rechazar" data-id="${r.idcontratacion}">
                    <i class="fa fa-times"></i> Rechazar
                  </button>
                </div>
              </td>
              <td>${r.idcontratacion}</td>
              <td>${r.division ?? ''}</td>
              <td>${r.empresa ?? ''}</td>
              <td>${r.cargo ?? ''}</td>
              <td>${r.centro_de_costo ?? ''}</td>
              <td>${r.aprueba ?? ''}</td>
            </tr>`;
                }).join('');
                $("#tabla tbody").append(filas);
            } else {
                $("#tabla tbody").append(
                    '<tr><td colspan="8" class="text-center">No hay solicitudes pendientes</td></tr>'
                );
            }
        },
        error: () => {
            Swal.fire({
                icon: "error",
                title: "Error al cargar la tabla",
                confirmButtonText: "Aceptar"
            });
        }
    });
}

function aprobar(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/generaOC/funAprobar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {
            if (response && response.mensaje === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Registro aprobado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al procesar la aprobación",
                    text: (response && response.detalle) ? response.detalle : '',
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (jqXHR, textStatus) {
            Swal.fire({
                icon: "error",
                title: "Error al procesar la aprobación",
                text: "Detalles: " + textStatus,
                confirmButtonText: "Aceptar"
            });
        });
}

function rechazar(id, comentario) {
    const params = { id: id, comentario: comentario };

    $.ajax({
        url: "../api_adm_nortrans/aprueba/funRechazar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json"
    })
        .done(function (response) {
            if (response && response.mensaje === "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Registro rechazado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => cargarDatosTabla());
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error al procesar el rechazo",
                    text: (response && response.detalle) ? response.detalle : '',
                    confirmButtonText: "Aceptar"
                });
            }
        })
        .fail(function (jqXHR, textStatus) {
            Swal.fire({
                icon: "error",
                title: "Error al procesar el rechazo",
                text: "Detalles: " + textStatus,
                confirmButtonText: "Aceptar"
            });
        });
}
