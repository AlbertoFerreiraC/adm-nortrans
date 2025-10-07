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
        url: "../api_adm_nortrans/entregaOT/funListarOT.php",
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
                      <td>${i + 1}</td> <!-- N° OT -->
                      <td>${i + 1}</td> <!-- N° Tarea -->
                      <td>${r.idsms ?? ''}</td> <!-- N° Item SMS -->
                      <td>${r.tipo ?? ''}</td> <!-- Tipo Producto -->
                      <td>${r.idproducto ?? ''}</td> <!-- Id Producto -->
                      <td>${r.cantidad ?? ''}</td> <!-- Cantidad Solicitada -->
                    </tr>`;
                }).join('');
                $("#tablaOC tbody").append(filas);

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
