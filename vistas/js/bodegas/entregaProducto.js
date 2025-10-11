// adm-nortrans/vistas/js/bodegas/entregaProducto.js
// Simulación de datos
const datos = [{
    id: 1,
    centro: 'C001',
    tipoAplicacion: 'Insumo',
    aplicacion: 'Mantenimiento',
    tipoProducto: 'Repuesto',
    codigo: 'R-100',
    producto: 'Filtro de aceite',
    solicitada: 5,
    entregada: 0,
    stock: 20,
    costo: 15000
},
{
    id: 2,
    centro: 'C002',
    tipoAplicacion: 'Repuesto',
    aplicacion: 'Producción',
    tipoProducto: 'Insumo',
    codigo: 'I-230',
    producto: 'Lubricante',
    solicitada: 10,
    entregada: 2,
    stock: 50,
    costo: 12000
}
];

$("#btnBuscar").click(function () {
    const nro = $("#nroSms").val();
    if (nro === "") {
        alert("Ingrese un número de SMS");
        return;
    }

    cargarTabla(datos); // simulado
});

function cargarTabla(lista) {
    const tbody = $("#tablaProductos tbody");
    tbody.empty();
    lista.forEach((item, i) => {
        tbody.append(`
        <tr>
          <td>${i + 1}</td>
          <td>${item.centro}</td>
          <td>${item.tipoAplicacion}</td>
          <td>${item.aplicacion}</td>
          <td>${item.tipoProducto}</td>
          <td>${item.codigo}</td>
          <td>${item.producto}</td>
          <td>${item.solicitada}</td>
          <td>${item.entregada}</td>
          <td>${item.stock}</td>
          <td>${item.solicitada - item.entregada}</td>
          <td>${item.costo}</td>
          <td><center><button class="btn btn-sm btn-success btnEntregar" data-id="${item.id}" data-producto="${item.producto}"><i class="fa fa-truck"></i></button></center></td>
        </tr>
      `);
    });
}

// Evento abrir modal
$(document).on("click", ".btnEntregar", function () {
    const id = $(this).data("id");
    const producto = $(this).data("producto");
    $("#idProductoEntrega").val(id);
    $("#productoSeleccionado").val(producto);
    $("#modalEntregar").modal("show");
});

// Confirmar entrega
$("#btnConfirmarEntrega").click(function () {
    const producto = $("#productoSeleccionado").val();
    const quien = $("#quienRetira").val();
    const cant = $("#cantidadEntregar").val();

    if (!quien || cant <= 0) {
        alert("Complete todos los campos");
        return;
    }

    alert(`Se registró la entrega de ${cant} unidades del producto "${producto}" a la persona seleccionada.`);
    $("#modalEntregar").modal("hide");
});