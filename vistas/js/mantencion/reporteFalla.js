$(document).ready(function () {
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

    cargarDatosTabla();
    maquinaAgregar();
    conductorAgregar();
    sistemaAgregar();
    subSistemaAgregar();

    $("#filtradoDinamico").on("keyup", function () {
        const texto = this.value.toLowerCase();
        const rows = $("#tablaReportes tbody tr");
        rows.each(function () {
            const ok = $(this).text().toLowerCase().indexOf(texto) !== -1;
            $(this).toggle(ok);
        });
    });

    $('#btnGrabarReporte').click(function () {
        const filasValidas = $("#tablaDetalle tbody tr").filter(function () {
            return !$(this).find("td").first().hasClass("text-center");
        }).length;

        if ($("#maquina").val() && $("#conductor").val() && $("#kmActual").val()) {
            if (filasValidas === 0) {
                mensajeError("Debe agregar al menos un detalle antes de guardar el reporte.");
                return;
            }
            agregarReporte();
        } else {
            mensajeError("Debe completar los campos obligatorios.");
        }
    });

    $("#btnAgregarDetalle").click(function () {
        const sistema = $("#sistema").val();
        const sistemaTexto = $("#sistema option:selected").text();
        const subSistema = $("#subSistema").val();
        const subSistemaTexto = $("#subSistema option:selected").text();
        const observacion = $("#observacion").val().trim();

        if (sistema === "" || sistema === null || sistema === " " || sistema === "Seleccionar...") {
            mensajeError("Debe seleccionar un sistema.");
            return;
        }

        if (!observacion) {
            mensajeError("El campo observación no puede estar vacío.");
            return;
        }

        // Evitar duplicar filas con el mismo sistema y observación
        let existe = false;
        $("#tablaDetalle tbody tr").each(function () {
            const sis = $(this).find("td").eq(0).attr("data-id");
            const obs = $(this).find("td").eq(2).text().trim();
            if (sis === sistema && obs === observacion) {
                existe = true;
            }
        });

        if (existe) {
            mensajeError("Este detalle ya fue agregado.");
            return;
        }

        $("#tablaDetalle tbody tr td.text-center").closest("tr").remove();

        const fila = `
        <tr>
            <td data-id="${sistema}">${sistemaTexto}</td>
            <td data-id="${subSistema || ''}">${subSistemaTexto || '-'}</td>
            <td>${observacion}</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm btnEliminar">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    `;

        $("#tablaDetalle tbody").append(fila);

        $(".btnEliminar").off("click").on("click", function () {
            $(this).closest("tr").remove();
            if ($("#tablaDetalle tbody tr").length === 0) {
                $("#tablaDetalle tbody").append('<tr><td colspan="4" class="text-center">Ningún dato disponible en esta tabla</td></tr>');
            }
        });

        // Limpiar campos y mantener foco en Sistema
        $("#sistema").val("");
        $("#subSistema").val("");
        $("#observacion").val("");
        $("#sistema").focus();
    });

});

function cargarDatosTabla() {
    $("#tablaReportes tbody").empty();
    $.ajax({
        url: "../api_adm_nortrans/reporteFalla/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var fila = "";
            for (var i in response) {
                fila += '<tr>';
                fila += '<td>' + (parseInt(i) + 1) + '</td>';
                fila += '<td>' + (response[i].dependencia || '') + '</td>';
                fila += '<td>' + (response[i].maquina || '') + '</td>';
                fila += '<td>' + (response[i].conductor || '') + '</td>';
                fila += '<td>' + (response[i].km_reportado || '') + '</td>';
                fila += '<td>' + (response[i].fecha || '') + '</td>';
                fila += '<td>';
                fila += '<center><div class="btn-group">';
                fila += '<button type="button" title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].idreporte_falla + '"><i class="fa fa-trash"></i></button>';
                fila += '</div></center>';
                fila += '</td>';
                fila += '</tr>';
            }
            $("#tablaReportes tbody").append(fila);
            $(".btnEliminar").click(function () {
                var id = this.id;
                swal({
                    title: "¿Está seguro de eliminar el reporte?",
                    text: "¡Esto eliminará también los detalles asociados!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, eliminar"
                }).then(function (result) {
                    if (result.value) {
                        eliminarReporte(id);
                    }
                });
            });
        },
        error: function () {
            mensajeError("Error al cargar los reportes.");
        }
    });
}

function agregarReporte() {
    const maquina = $("#maquina").val();
    const conductor = $("#conductor").val();
    const km = $("#kmActual").val().replace(/\./g, '');
    const usuario = $("#idUsuario").val();

    if (!maquina || !conductor || !km) {
        mensajeError("Debe completar máquina, conductor y kilometraje.");
        return;
    }

    const cabecera = {
        usuario: usuario,
        maquina: maquina,
        conductor: conductor,
        km_reportado: km,
        dependencia: 1
    };

    $.ajax({
        url: "../api_adm_nortrans/reporteFalla/funAgregar.php",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify(cabecera),
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok" && response.idreporte_falla) {
                const idreporte = response.idreporte_falla;
                const detalle = [];
                $("#tablaDetalle tbody tr").each(function () {
                    if ($(this).find("td").first().hasClass("text-center")) return;
                    const sistemaID = $(this).find("td").eq(0).attr("data-id");
                    const subSistemaID = $(this).find("td").eq(1).attr("data-id");
                    const observacion = $(this).find("td").eq(2).text().trim();
                    if (sistemaID && observacion) {
                        detalle.push({
                            sistema: sistemaID,
                            sub_sistema: subSistemaID || null,
                            observacion: observacion
                        });
                    }
                });

                if (detalle.length === 0) {
                    mensajeError("Debe agregar al menos un detalle válido.");
                    return;
                }

                $.ajax({
                    url: "../api_adm_nortrans/reporteFalla/funAgregarDetalle.php",
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        idreporte_falla: idreporte,
                        detalle: detalle
                    }),
                    dataType: "json",
                    success: function (respDet) {
                        if (respDet.mensaje === "ok") {
                            swal({
                                type: "success",
                                title: "Reporte guardado con éxito.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            }).then(() => location.reload());
                        } else {
                            mensajeError("Ocurrió un error al guardar el detalle.");
                        }
                    },
                    error: function () {
                        mensajeError("Error en la comunicación al guardar el detalle.");
                    }
                });
            } else {
                mensajeError("Error al guardar la cabecera del reporte.");
            }
        },
        error: function () {
            mensajeError("Error de conexión con el servidor.");
        }
    });
}

function eliminarReporte(id) {
    var params = { "id": id };
    $.ajax({
        url: "../api_adm_nortrans/reporteFalla/funEliminar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] == "ok") {
                swal({
                    type: "success",
                    title: "Reporte eliminado correctamente.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => { location.reload(); });
            } else {
                mensajeError("Error al eliminar el reporte.");
            }
        }
    }).fail(function () {
        mensajeError("Error de conexión al eliminar el registro.");
    });
}

function mensajeError(mensaje) {
    swal({
        type: "error",
        title: mensaje,
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
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
                opciones += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#maquina').append(opciones);
        }
    });
}

function conductorAgregar() {
    $('#conductor').empty().append('<option value="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/conductor/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].id + '">' + response[i].nombre + '</option>';
            }
            $('#conductor').append(opciones);
        }
    });
}

function sistemaAgregar() {
    $('#sistema').empty().append('<option value ="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/sistemaMaquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#sistema').append(lista);
        }
    });
}

function subSistemaAgregar() {
    $('#subSistema').empty().append('<option value ="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/subsistemaMaquina/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#subSistema').append(lista);
        }
    });
}
