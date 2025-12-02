$(document).ready(function () {

    cargarEmpresas();

    $("#btnConsultar").click(function () {

        const empresa = $("#empresaConsultar").val();
        const nroOC = $("#numeroOC").val().trim();

        if (!empresa) {
            swal("Atención", "Debe seleccionar una empresa.", "warning");
            return;
        }

        if (!nroOC) {
            swal("Atención", "Debe ingresar un número de OC.", "warning");
            return;
        }

        consultarCabecera(empresa, nroOC);
    });

});

function consultarCabecera(empresa, nroOC) {

    $.ajax({
        url: "../api_adm_nortrans/consultaOC/getCabecera.php",
        method: "POST",
        data: JSON.stringify({ empresa, nroOC }),
        contentType: "application/json",
        dataType: "json",

        success: function (resp) {

            if (!resp || !resp.success) {
                swal("Atención", resp.message || "No se encontró la OC.", "info");
                return;
            }

            const c = resp.data;

            // rellenar campos del formulario
            $("#vistaNumerOC").val(c.id);
            $("#tipoOC").val(c.tipo_oc);
            $("#fechaVer").val(c.fecha_creacion);
            $("#rutEmpresaVer").val(c.empresa);
            $("#empresaVer").val(c.proveedor);
            $("#estadoActualVer").val(c.estado);
            $("#tipoDocumentoVer").val(c.tipo_documento_compra);
            $("#formaPagoVer").val(c.pago_oc);
            $("#numDocumentoVer").val(c.num_doc_proveedor);
            $("#tipoProveedorVer").val(c.tipo_proveedor);
            $("#rutProveedorVer").val(c.doc_proveedor);
            $("#ProveedorVer").val(c.proveedor);
            $("#preAprovadoVer").val(c.pre_aprueba);
            $("#aprovadoVer").val(c.pre_aprueba2);

            consultarDetalle(nroOC);
        },

        error: function (xhr) {
            swal("Error", "No se pudo consultar la cabecera.", "error");
        }
    });
}

function consultarDetalle(nroOC) {

    $.ajax({
        url: "../api_adm_nortrans/consultaOC/getDetalle.php",
        method: "POST",
        data: JSON.stringify({ nroOC }),
        contentType: "application/json",
        dataType: "json",

        success: function (resp) {

            const tbody = $("#lista tbody");
            tbody.empty();

            if (!resp || !resp.success || resp.data.length === 0) {
                tbody.append(`<tr><td colspan="15">No hay detalles disponibles.</td></tr>`);
                return;
            }

            resp.data.forEach((d, index) => {

                const totalCosto = (parseFloat(d.costo_unitario) - parseFloat(d.valor_descuento));

                tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${d.tipo_producto}</td>
                        <td>${d.unidad_de_medida}</td>
                        <td>${d.glosa}</td>
                        <td>${formatNumber(d.costo_unitario)}</td>
                        <td>${formatNumber(d.valor_descuento)}</td>
                        <td>${formatNumber(totalCosto)}</td>
                        <td>${d.cantidad}</td>
                        <td>${d.cantidad_entregada ?? 0}</td>
                        <td>${formatNumber(d.sub_total)}</td>
                        <td>${d.sms}</td>
                        <td>${d.tipo_descuento}</td>
                    </tr>
                `);
            });

        },

        error: function () {
            swal("Error", "No se pudo consultar el detalle.", "error");
        }
    });
}

function formatNumber(num) {
    if (!num || isNaN(num)) return "0";
    return parseFloat(num).toLocaleString("es-ES");
}


function cargarEmpresas() {
    $.ajax({
        url: "../api_adm_nortrans/consultaOC/listarEmpresas.php",
        method: "GET",
        dataType: "json",

        success: function (resp) {
            console.log("RESPUESTA BACKEND:", resp);

            const select = $("#empresaConsultar");
            select.empty();
            select.append(`<option value="">Seleccionar...</option>`);

            if (!resp || !resp.success) {
                console.log("No se pudieron cargar empresas");
                return;
            }

            resp.data.forEach(emp => {
                select.append(`
        <option value="${emp.id}">${emp.nombre}</option>
    `);
            });
        },

        error: function (xhr, status, error) {
            console.log("ERROR AJAX:", xhr.responseText);
            console.log("STATUS:", status);
            console.log("ERROR:", error);
        }
    });
}
