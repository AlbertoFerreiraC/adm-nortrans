// ======================= PRODUCTOS SIMULADOS =======================
const productosSimulados = [
    { tipo: "Repuesto", id: "600510618", nombre: "BOMBA DE AGUA", costo: 85000 },
    { tipo: "Insumo", id: "I002", nombre: "GRASA INDUSTRIAL", costo: 20000 },
    { tipo: "Repuesto", id: "R003", nombre: "FILTRO ACEITE", costo: 45000 },
];

let lista = [];

// ======================= BUSCAR OC (SIMULADO) =======================
$("#btnBuscarOC").click(function () {
    const nro = $("#nroOC").val();
    const empresa = $("#empresa").val();

    if (!nro) {
        swal({
            type: "warning",
            title: "Atención",
            text: "Ingrese un número de OC.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    if (!empresa) {
        swal({
            type: "warning",
            title: "Atención",
            text: "Seleccione una empresa.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    // 🔥 SIMULACIÓN FIJA
    const ocSimulada = {
        success: true,
        rutProveedor: "80012345-9",
        nombreProveedor: "Proveedora S.A.",
        fechaCompra: "09/10/2025",
        productos: [
            { tipo: "Repuesto", id: "600510618", nombre: "BOMBA DE AGUA", costo: 85000, cantidad: 2, total: 170000 },
            { tipo: "Insumo", id: "I002", nombre: "GRASA INDUSTRIAL", costo: 20000, cantidad: 5, total: 100000 }
        ]
    };

    $("#rutProveedor").val(ocSimulada.rutProveedor);
    $("#nombreProveedor").val(ocSimulada.nombreProveedor);
    $("#fechaCompra").val(ocSimulada.fechaCompra);

    lista = ocSimulada.productos;
    actualizarTabla();
});

// ======================= AGREGAR PRODUCTO MANUAL =======================
$("#btnAgregar").click(function () {
    const producto = productosSimulados[Math.floor(Math.random() * productosSimulados.length)];
    const cantidad = Math.floor(Math.random() * 5) + 1;
    const total = producto.costo * cantidad;

    lista.push({ ...producto, cantidad, total });
    actualizarTabla();
});

// ======================= ELIMINAR PRODUCTO =======================
$(document).on("click", ".btnEliminar", function () {
    const index = $(this).data("index");

    swal({
        type: "warning",
        title: "¿Eliminar producto?",
        text: "Esta acción no puede deshacerse.",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar"
    }).then((r) => {
        if (r.value) {
            lista.splice(index, 1);
            actualizarTabla();
        }
    });
});

// ======================= ACTUALIZAR TABLA =======================
function actualizarTabla() {
    const tbody = $("#tablaProductos tbody");
    tbody.empty();

    if (lista.length === 0) {
        tbody.append(`<tr><td colspan="7" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>`);
        return;
    }

    lista.forEach((p, i) => {
        tbody.append(`
            <tr>
                <td>${p.tipo}</td>
                <td>${p.id}</td>
                <td>${p.nombre}</td>
                <td>${p.costo.toLocaleString()}</td>
                <td>${p.cantidad}</td>
                <td>${p.total.toLocaleString()}</td>
                <td><center><button class="btn btn-danger btn-sm btnEliminar" data-index="${i}">
                    <i class="fa fa-trash"></i>
                </button></center></td>
            </tr>
        `);
    });
}

// ======================= CAMBIO TIPO DOCUMENTO =======================
$("#tipoDocumento").on("change", function () {

    const tipoDocumento = $(this).val();

    // Eliminar mensaje previo si existe
    $("#infoRetencion").remove();

    if (tipoDocumento === "Boleta") {

        $("#tablaProductos").after(`
            <div id="infoRetencion" class="alert alert-info" style="margin-top:10px;">
                <b>Boleta de Honorarios:</b> 
                La retención aplicada será considerada para devolución anual según normativa vigente.
            </div>
        `);

    }
});


// ======================= CALCULOS =======================
$("#btnCalcular").click(function () {

    if (lista.length === 0) {
        swal({
            type: "warning",
            title: "Sin productos",
            text: "No hay productos para calcular.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    const tipoDocumento = $("#tipoDocumento").val();
    const fechaDocumento = $("#fechaDocumento").val();

    const subTotal = lista.reduce((acc, p) => acc + p.total, 0);
    let exento = 0;
    let neto = subTotal;
    let iva = 0;
    let retencion = 0;
    let total = 0;

    // ================= BOLETA HONORARIOS =================
    if (tipoDocumento === "Boleta") {

        const porcentajeRetencion = obtenerPorcentajeRetencion(fechaDocumento);
        retencion = neto * porcentajeRetencion;
        total = neto - retencion;

    }
    // ================= FACTURA / OTROS =================
    else {

        iva = neto * 0.19;
        total = neto + iva;

    }

    $("#subTotal").text(`$ ${subTotal.toLocaleString()}`);
    $("#exento").text(`$ ${exento.toLocaleString()}`);
    $("#neto").text(`$ ${neto.toLocaleString()}`);
    $("#iva").text(`$ ${iva.toLocaleString()}`);
    $("#retencion").text(`$ ${retencion.toLocaleString()}`);
    $("#total").text(`$ ${total.toLocaleString()}`);
});


// ======================= VALIDAR DUPLICIDAD DEL DOCUMENTO (SIMULADO) =======================
function validarDuplicidadDocumento(nroDocumento, callback) {
    // 🔥 SIMULACIÓN: duplicado si es "123"
    if (nroDocumento === "123") callback(true);
    else callback(false);
}

// ======================= GRABAR RECEPCIÓN =======================
$("#btnGrabar").click(function () {
    if (lista.length === 0) {
        swal({
            type: "warning",
            title: "Advertencia",
            text: "Debe ingresar al menos un producto.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    if (!$("#nroOC").val()) {
        swal({
            type: "warning",
            title: "Advertencia",
            text: "Debe indicar el número de OC.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    if (!$("#tipoDocumento").val()) {
        swal({
            type: "warning",
            title: "Advertencia",
            text: "Debe seleccionar el tipo de documento.",
            confirmButtonText: "Aceptar"
        });
        return;
    }

    const nroDocumento = $("#nroDocumento").val();

    validarDuplicidadDocumento(nroDocumento, function (existe) {
        if (existe) {
            swal({
                type: "error",
                title: "Documento duplicado",
                text: "Este número de documento ya fue registrado.",
                confirmButtonText: "Aceptar"
            });
            return;
        }

        $("#modalConfirmar").modal("show");
    });
});

// ======================= CONFIRMAR GRABADO =======================
$("#btnConfirmarGrabado").click(function () {
    $("#modalConfirmar").modal("hide");

    swal({
        type: "success",
        title: "Recepción grabada",
        text: "La recepción fue registrada correctamente.",
        confirmButtonText: "Aceptar"
    });

    lista = [];
    actualizarTabla();

    $("#subTotal, #exento, #neto, #iva, #retencion, #total").text("$ 0");
});

// ======================= IMPRIMIR GUÍA =======================
$("#btnImprimirGuia").click(function () {
    window.open("../reportes/guia_entrada.php?nroOC=" + $("#nroOC").val(), "_blank");
});

function obtenerPorcentajeRetencion(fechaDocumento) {
    const fecha = new Date(fechaDocumento);
    const limite = new Date("2025-12-31");

    return fecha > limite ? 0.1525 : 0.145;
}
