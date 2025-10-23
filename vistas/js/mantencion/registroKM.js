$(document).ready(function () {

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

    // ======== INICIO DE CARGA ======== //
    cargarDatosTabla();
    maquinaAgregar();

    // ======== FECHA AUTOMÁTICA ======== //
    $('#modalAgregarKilometraje').on('show.bs.modal', function () {
        const hoy = new Date();
        const año = hoy.getFullYear();
        const mes = String(hoy.getMonth() + 1).padStart(2, '0');
        const dia = String(hoy.getDate()).padStart(2, '0');
        const fechaActual = `${año}-${mes}-${dia}`;
        $("#fechaKm").val(fechaActual);
    });

    // ======== FILTRO GENERAL ======== //
    $("#filtradoDinamico").on("keyup", function () {
        const texto = this.value.toLowerCase();
        $("#tablaKilometraje tbody tr").each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(texto));
        });
    });

    // ======== GRABAR NUEVO KILOMETRAJE ======== //
    $('#btnGrabarKilometraje').click(function () {
        const maquina = $("#maquina").val();
        const tipo_bus = $("#tipoMaquina").val();
        const centro_de_costo = $("#centroCosto").val();
        const descripcion = $("#maquina option:selected").text();
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

        if (parseInt(kmActual) < parseInt(kmAnterior)) {
            mensajeError("El kilometraje actual no puede ser menor que el anterior.");
            return;
        }

        const datos = {
            centro_de_costo: centro_de_costo,
            tipo_bus: tipo_bus,
            maquina: parseInt(maquina),
            descripcion: descripcion,
            km_anterior: kmAnterior,
            fecha_km: fechaKm,
            km_actual: kmActual
        };

        agregarKilometraje(datos);
    });


});


// ================================ //
// ======== FUNCIONES AJAX ======== //
// ================================ //

function cargarDatosTabla() {
    $("#tablaKilometraje tbody").empty();
    $.ajax({
        url: "../api_adm_nortrans/registroKm/funListar.php",
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
                        <td>
                            <center>
                                <button type="button" title="Eliminar" class="btn btn-danger btnEliminar" id="${response[i].idregistro_km}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </center>
                        </td>
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


function maquinaAgregar() {
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
                        ${response[i].descripcion}
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


function agregarKilometraje(datos) {
    $.ajax({
        url: "../api_adm_nortrans/registroKm/funAgregar.php",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify(datos),
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Kilometraje registrado y actualizado con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else if (response.mensaje === "menor_o_igual") {
                mensajeError("El kilometraje actual debe ser mayor al último registrado.");
            } else if (response.mensaje === "duplicado") {
                mensajeError("Ya existe un registro de kilometraje para esta fecha.");
            } else {
                mensajeError("Error al grabar el kilometraje.");
            }
        },

        error: function () {
            mensajeError("Error de conexión con el servidor.");
        }
    });
}


function eliminarKilometraje(idregistro_km) {
    $.ajax({
        url: "../api_adm_nortrans/registroKm/funEliminar.php",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ idregistro_km: idregistro_km }),
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Registro eliminado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else {
                mensajeError("No se pudo eliminar el registro.");
            }
        },
        error: function () {
            mensajeError("Error de conexión al eliminar el registro.");
        }
    });
}


// ================================ //
// ======== UTILIDADES ============ //
// ================================ //

function mensajeError(mensaje) {
    swal({
        type: "error",
        title: mensaje,
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
    });
}
