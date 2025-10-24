$(document).ready(function () {
    cargarDatosTabla();
    // ======== FORMATEO DE CAMPOS ======== //
    $('.solo-numero').keyup(function () {
        this.value = (this.value + '').replace(/[^.0-9]/g, '');
    });

    $(".puntos_de_mil").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
            $(event.target).val(function (index, value) {
                return value.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            });
        }
    });

    // ======== CARGAR MÁQUINAS ======== //
    cargarMaquinas();

    // ======== FECHA AUTOMÁTICA ======== //
    $('#modalAgregarKilometraje').on('show.bs.modal', function () {
        const hoy = new Date();
        const año = hoy.getFullYear();
        const mes = String(hoy.getMonth() + 1).padStart(2, '0');
        const dia = String(hoy.getDate()).padStart(2, '0');
        $("#fechaKm").val(`${año}-${mes}-${dia}`);
    });

    // ======== ACTUALIZAR KILOMETRAJE ======== //
    $('#btnGrabarKilometraje').click(function () {
        const maquina = $("#maquina").val();
        const tipo_bus = $("#tipoMaquina").val();
        const centro_de_costo = $("#centroCosto").val();
        const descripcion = $("#maquina option:selected").text().trim();
        const kmAnterior = $("#kmAnterior").val().replace(/\./g, '');
        const kmActual = $("#kmActual").val().replace(/\./g, '');
        const fechaKm = $("#fechaKm").val();

        if (!maquina || maquina === "undefined") {
            mensajeError("Debe seleccionar una máquina válida.");
            return;
        }

        if (!kmActual) {
            mensajeError("Debe ingresar el kilometraje actual.");
            return;
        }
        const datos = {
            maquina: parseInt(maquina),
            tipo_bus: tipo_bus,
            centro_de_costo: centro_de_costo,
            descripcion: descripcion,
            km_anterior: kmAnterior,
            fecha_km: fechaKm,
            km_actual: kmActual
        };

        actualizarKilometraje(datos);
    });

});


// ================================ //
// ======== FUNCIONES AJAX ======== //
// ================================ //


function cargarDatosTabla() {
    $("#tablaKilometraje tbody").empty();
    $.ajax({
        url: "../api_adm_nortrans/editarKm/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let fila = "";
            for (let i in response) {
                fila += `
                    <tr>
                        <td>${parseInt(i) + 1}</td>
                        <td>${response[i].descripcion || ''}</td>
                        <td>${response[i].tipo_bus || ''}</td>
                        <td>${response[i].centro_de_costo || ''}</td>
                        <td>${response[i].km_anterior || 0}</td>
                        <td>${response[i].km_actual || 0}</td>
                        <td>${response[i].fecha_km || ''}</td>
                    </tr>`;
            }

            if (fila === "") {
                fila = '<tr><td colspan="8" class="text-center">Ningún dato disponible</td></tr>';
            }

            $("#tablaKilometraje tbody").append(fila);

            $(".btnEliminar").click(function () {
                const idregistro_km = this.id;
                swal({
                    title: "¿Está seguro de eliminar el registro?",
                    text: "Esta acción no se puede deshacer.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, eliminar"
                }).then(function (result) {
                    if (result.value) eliminarKilometraje(idregistro_km);
                });
            });
        },
        error: function () {
            mensajeError("Error al cargar los registros de kilometraje.");
        }
    });
}


function cargarMaquinas() {
    $('#maquina').empty().append('<option value="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/maquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let opciones = "";
            for (let i in response) {
                opciones += `
                    <option value="${response[i].id}" 
                        data-tipo="${response[i].tipo_bus}" 
                        data-centro="${response[i].centro_de_costo}" 
                        data-kmanterior="${response[i].km_actual}" 
                        data-fecha="${response[i].fecha_km}">
                        ${response[i].descripcion.trim()}
                    </option>`;
            }
            $('#maquina').append(opciones);

            $("#maquina").change(function () {
                const tipo = $('option:selected', this).data('tipo');
                const centro = $('option:selected', this).data('centro');
                const kmAnt = $('option:selected', this).data('kmanterior');
                const fecha = $('option:selected', this).data('fecha');

                $("#tipoMaquina").val(tipo || "");
                $("#centroCosto").val(centro || "");
                $("#kmAnterior").val(kmAnt || 0);
                $("#fechaKm").val(fecha || "");
            });
        },
        error: function () {
            mensajeError("Error al cargar las máquinas.");
        }
    });
}


function actualizarKilometraje(datos) {
    $.ajax({
        url: "../api_adm_nortrans/editarKm/funModificar.php",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify(datos),
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Kilometraje actualizado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else {
                mensajeError("Error al actualizar el kilometraje.");
            }
        },
        error: function () {
            mensajeError("Error de conexión con el servidor.");
        }
    });
}


// ================================ //
// ======== UTILIDAD ALERTA ======= //
// ================================ //

function mensajeError(mensaje) {
    swal({
        type: "error",
        title: mensaje,
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
    });
}
