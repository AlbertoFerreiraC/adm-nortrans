$(document).ready(function () {
    // cargar la tabla al inicio
    cargarDatosTabla();

    // Filtro dinámico
    $('#filtradoDinamico').on('keyup change', function () {
        const q = (this.value || '').toLowerCase();
        $('#tablaMaquinas tbody tr').each(function () {
            const hay = $(this).text().toLowerCase().indexOf(q) > -1;
            $(this).toggle(hay);
        });
    });
});

function cargarDatosTabla() {
    // limpiar cuerpo de tabla
    const tbody = $("#tablaMaquinas tbody");
    tbody.empty();

    $.ajax({
        url: "../api_adm_nortrans/deMaquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response && response.length > 0) {
                response.forEach((r) => {
                    const fila = `
                        <tr>
                            <td>${r.idmaquina ?? ''}</td>
                            <td>${r.patente ?? ''}</td>
                            <td>${r.tipo_documento_maquina ?? ''}</td>
                            <td>${r.fecha_vencimiento ?? ''}</td>
                        </tr>
                    `;
                    tbody.append(fila);
                });
            } else {
                tbody.append('<tr><td colspan="4" class="text-center">No hay resultados</td></tr>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar datos:", error);
            swal({
                type: "error",
                title: "Error al cargar la lista",
                text: error,
                confirmButtonText: "Aceptar"
            });
        }
    });
}
