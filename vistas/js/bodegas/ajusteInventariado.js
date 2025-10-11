// Simulación de productos por tipo
const productosSimulados = {
    Repuesto: [
        { id: "R001", nombre: "BOMBA DE AGUA", costo: 85000, cantidad: 4 },
        { id: "R002", nombre: "FILTRO ACEITE", costo: 45000, cantidad: 6 }
    ],
    Insumo: [
        { id: "I001", nombre: "GRASA INDUSTRIAL", costo: 20000, cantidad: 10 },
        { id: "I002", nombre: "ACEITE HIDRÁULICO", costo: 25000, cantidad: 8 }
    ]
};

let lista = [];

// Cambiar productos según tipo
$("#tipoProducto").change(function () {
    const tipo = $(this).val();
    const selectProd = $("#producto");
    selectProd.empty().append('<option value="">Seleccione producto...</option>');

    if (!tipo) return;

    productosSimulados[tipo].forEach(p => {
        selectProd.append(`<option value="${p.id}">${p.id} - ${p.nombre}</option>`);
    });
});

// Cargar datos al seleccionar producto
$("#producto").change(function () {
    const tipo = $("#tipoProducto").val();
    const prod = productosSimulados[tipo].find(p => p.id === $(this).val());
    if (prod) {
        $("#costoActual").val(prod.costo);
        $("#cantidadActual").val(prod.cantidad);
    } else {
        $("#costoActual").val(0);
        $("#cantidadActual").val(0);
    }
});

// Agregar producto al ajuste
$("#btnAgregar").click(function () {
    const tipo = $("#tipoProducto").val();
    const idProd = $("#producto").val();
    const costo = parseFloat($("#costoUnitario").val() || 0);
    const cantActual = parseInt($("#cantidadActual").val() || 0);
    const cantAjuste = parseInt($("#cantidadAjuste").val() || 0);
    if (!tipo || !idProd || cantAjuste === 0) return alert("Complete los datos del producto.");

    const prodSel = productosSimulados[tipo].find(p => p.id === idProd);
    const saldoFinal = cantActual + cantAjuste;

    lista.push({
        tipo,
        id: idProd,
        nombre: prodSel.nombre,
        saldoActual: cantActual,
        costo: costo || prodSel.costo,
        ajuste: cantAjuste,
        saldoFinal
    });

    actualizarTabla();
});

// Eliminar producto
$(document).on("click", ".btnEliminar", function () {
    const index = $(this).data("index");
    lista.splice(index, 1);
    actualizarTabla();
});

function actualizarTabla() {
    const tbody = $("#tablaProductos tbody");
    tbody.empty();

    if (lista.length === 0) {
        tbody.append('<tr><td colspan="8" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
        return;
    }

    lista.forEach((p, i) => {
        tbody.append(`
        <tr>
          <td>${p.tipo}</td>
          <td>${p.id}</td>
          <td>${p.nombre}</td>
          <td>${p.saldoActual}</td>
          <td>${p.costo.toLocaleString()}</td>
          <td>${p.ajuste}</td>
          <td>${p.saldoFinal}</td>
          <td><center><button class="btn btn-danger btn-sm btnEliminar" data-index="${i}"><i class="fa fa-trash"></i></button></center></td>
        </tr>
      `);
    });
}

// Realizar ajuste
$("#btnAjuste").click(function () {
    if (lista.length === 0) return alert("Debe agregar al menos un producto al ajuste.");

    const datosCabecera = {
        motivo: $("#motivo").val(),
        bodega: $("#bodega").val(),
        tipoAjuste: $("#tipoAjuste").val(),
        tipoDoc: $("#tipoDoc").val(),
        nroDoc: $("#nroDoc").val(),
        observacion: $("#observacion").val()
    };

    if (!datosCabecera.motivo || !datosCabecera.bodega || !datosCabecera.tipoAjuste) {
        return alert("Complete los datos de cabecera del ajuste.");
    }

    alert("✅ Ajuste realizado correctamente.\n\n" + JSON.stringify({ cabecera: datosCabecera, productos: lista }, null, 2));
    lista = [];
    actualizarTabla();
});