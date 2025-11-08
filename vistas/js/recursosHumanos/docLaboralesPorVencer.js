$(document).ready(function () {
    cargarDatosTablaSoliPendientes();
});

function cargarDatosTablaSoliPendientes() {
    $("#lista tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/docLaboralPorVencer/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            const hoy = new Date(); // fecha actual del sistema

            for (var i in response) {
                const fechaExp = response[i].fecha_expiracion ? new Date(response[i].fecha_expiracion) : null;
                let tiempoRestante = "-";

                if (fechaExp && !isNaN(fechaExp)) {
                    const diferenciaMs = fechaExp - hoy;
                    const diferenciaDias = Math.ceil(diferenciaMs / (1000 * 60 * 60 * 24));

                    if (diferenciaDias > 0) {
                        tiempoRestante = diferenciaDias + " día" + (diferenciaDias !== 1 ? "s" : "");
                    } else if (diferenciaDias === 0) {
                        tiempoRestante = "Vence hoy";
                    } else {
                        tiempoRestante = "Vencido hace " + Math.abs(diferenciaDias) + " día" + (Math.abs(diferenciaDias) !== 1 ? "s" : "");
                    }
                }

                fila += `
                    <tr>
                        <td>${response[i].rut || "-"}</td>
                        <td>${response[i].personal || "-"}</td>
                        <td>${response[i].centro_de_costo || "-"}</td>
                        <td>${response[i].tipo_documento || "-"}</td>
                        <td>${response[i].fecha_expiracion || "-"}</td>
                        <td>${tiempoRestante}</td>
                    </tr>`;
            }

            $('#lista tbody').append(fila);
            updateVisibleRows(); // mantiene el límite activo
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}
