// Datos simulados
const productos = {
    Repuesto: [
        { id: "600510618", nombre: "BOMBA DE AGUA", stock: 1, costo: 85000 },
        { id: "600510620", nombre: "FILTRO ACEITE", stock: 3, costo: 50000 }
    ],
    Insumo: [
        { id: "I001", nombre: "LUBRICANTE", stock: 20, costo: 15000 },
        { id: "I002", nombre: "GRASA INDUSTRIAL", stock: 10, costo: 20000 }
    ]
};

let traspasos = [];

// Mostrar campo de producto según tipo
$("#tipoProducto").change(function () {
    const tipo = $(this).val();
    $("#productoSelect").empty().append('<option value="">Seleccione producto</option>');
    $("#divProducto").hide();
    $("#cantidadActual").val("0");

    if (tipo && productos[tipo]) {
        productos[tipo].forEach(p => {
            $("#productoSelect").append(`<option value="${p.id}" data-stock="${p.stock}" data-costo="${p.costo}">${p.id} / ${p.nombre}</option>`);
        });
        $("#divProducto").show();
    }
});

// Actualizar stock actual cuando cambia producto
$("#productoSelect").change(function () {
    const stock = $(this).find(':selected').data('stock') || 0;
    $("#cantidadActual").val(stock);
});

// Agregar producto a la tabla
$("#btnAgregar").click(function () {
    const tipo = $("#tipoProducto").val();
    const productoId = $("#productoSelect").val();
    const productoTexto = $("#productoSelect option:selected").text();
    const cantidad = parseInt($("#cantidad").val());
    const stock = parseInt($("#cantidadActual").val());
    const costo = $("#productoSelect option:selected").data('costo');

    if (!tipo || !productoId || !cantidad || cantidad <= 0) {
        alert("Complete todos los campos correctamente.");
        return;
    }

    if (cantidad > stock) {
        alert("La cantidad a transferir no puede superar el stock actual.");
        return;
    }

    traspasos.push({
        tipo: tipo,
        id: productoId,
        producto: productoTexto,
        cantidad: cantidad,
        costo: costo
    });

    actualizarTabla();
});

function actualizarTabla() {
    const tbody = $("#tablaTraspaso tbody");
    tbody.empty();
    traspasos.forEach((t, i) => {
        tbody.append(`
        <tr>
          <td>${t.tipo}</td>
          <td>${t.id}</td>
          <td>${t.producto}</td>
          <td>${t.cantidad}</td>
          <td>${t.costo}</td>
          <td><center><button class="btn btn-danger btn-sm btnEliminar" data-index="${i}"><i class="fa fa-trash"></i></button></center></td>
        </tr>
      `);
    });
}

// Eliminar producto
$(document).on("click", ".btnEliminar", function () {
    const index = $(this).data("index");
    traspasos.splice(index, 1);
    actualizarTabla();
});

// Generar traspaso
$("#btnGenerarTraspaso").click(function () {
    if (traspasos.length === 0) {
        alert("Debe agregar al menos un producto al traspaso.");
        return;
    }
    $("#modalConfirmar").modal("show");
});

// Confirmar traspaso
$("#btnConfirmarTraspaso").click(function () {
    $("#modalConfirmar").modal("hide");
    alert("Traspaso generado correctamente.");
    traspasos = [];
    actualizarTabla();
});