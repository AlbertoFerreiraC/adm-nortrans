
const productosSimulados = [
    { tipo: "Repuesto", id: "600510618", nombre: "BOMBA DE AGUA", costo: 85000 },
    { tipo: "Insumo", id: "I002", nombre: "GRASA INDUSTRIAL", costo: 20000 },
    { tipo: "Repuesto", id: "R003", nombre: "FILTRO ACEITE", costo: 45000 },
];

let lista = [];

$("#btnBuscarOC").click(function () {
    const nro = $("#nroOC").val();
    if (!nro) return alert("Ingrese un número de OC.");

    $("#rutProveedor").val("80012345-9");
    $("#nombreProveedor").val("Proveedora S.A.");
    $("#fechaCompra").val("09/10/2025");

    alert("Orden de compra cargada correctamente.");
});

$("#btnAgregar").click(function () {
    const producto = productosSimulados[Math.floor(Math.random() * productosSimulados.length)];
    const cantidad = Math.floor(Math.random() * 5) + 1;

    const total = producto.costo * cantidad;
    lista.push({ ...producto, cantidad, total });
    actualizarTabla();
});

$(document).on("click", ".btnEliminar", function () {
    const index = $(this).data("index");
    lista.splice(index, 1);
    actualizarTabla();
});

function actualizarTabla() {
    const tbody = $("#tablaProductos tbody");
    tbody.empty();

    lista.forEach((p, i) => {
        tbody.append(`
        <tr>
          <td>${p.tipo}</td>
          <td>${p.id}</td>
          <td>${p.nombre}</td>
          <td>${p.costo.toLocaleString()}</td>
          <td>${p.cantidad}</td>
          <td>${p.total.toLocaleString()}</td>
          <td><center><button class="btn btn-danger btn-sm btnEliminar" data-index="${i}"><i class="fa fa-trash"></i></button></center></td>
        </tr>
      `);
    });
}

$("#btnCalcular").click(function () {
    if (lista.length === 0) return alert("No hay productos para calcular.");

    const subTotal = lista.reduce((acc, p) => acc + p.total, 0);
    const exento = 0;
    const neto = subTotal - exento;
    const iva = neto * 0.1;
    const retencion = iva * 0.3;
    const total = neto + iva - retencion;

    $("#subTotal").text(`$ ${subTotal.toLocaleString()}`);
    $("#exento").text(`$ ${exento.toLocaleString()}`);
    $("#neto").text(`$ ${neto.toLocaleString()}`);
    $("#iva").text(`$ ${iva.toLocaleString()}`);
    $("#retencion").text(`$ ${retencion.toLocaleString()}`);
    $("#total").text(`$ ${total.toLocaleString()}`);
});

// === GRABAR RECEPCIÓN ===
$("#btnGrabar").click(function () {
    if (lista.length === 0) return alert("Debe ingresar al menos un producto antes de grabar.");
    if (!$("#nroOC").val()) return alert("Debe indicar el número de OC.");
    if (!$("#tipoDocumento").val()) return alert("Debe seleccionar el tipo de documento.");

    $("#modalConfirmar").modal("show");
});

$("#btnConfirmarGrabado").click(function () {
    $("#modalConfirmar").modal("hide");
    alert("Recepción grabada correctamente.");
    lista = [];
    actualizarTabla();

    $("#subTotal, #exento, #neto, #iva, #retencion, #total").text("$ 0");
});