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
},
{
    id: 3,
    centro: 'C003',
    tipoAplicacion: 'Repuesto',
    aplicacion: 'Producción',
    tipoProducto: 'Insumo',
    codigo: 'I-230',
    producto: 'Lubricante',
    solicitada: 10,
    entregada: 2,
    stock: 50,
    costo: 12000
},
{
    id: 4,
    centro: 'C004',
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

// Buscar
$("#btnBuscar").click(function () {
    const nro = $("#nroSms").val();
    if (nro === "") {
        swal({
            type: "warning",
            title: "Atención",
            text: "Ingrese un número de SMS",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    cargarTabla(datos); // simulado
});

// Cargar tabla
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

          <td>
            <center>
              <button 
                class="btn btn-sm btn-success btnEntregar"
                data-id="${item.id}"
                data-producto="${item.producto}"
                data-stock="${item.stock}"
                data-solicitada="${item.solicitada}"
                data-entregada="${item.entregada}">
                <i class="fa fa-truck"></i>
              </button>
            </center>
          </td>
        </tr>
      `);
    });
}

// Abrir modal entregar
$(document).on("click", ".btnEntregar", function () {

    const id = $(this).data("id");
    const producto = $(this).data("producto");
    const stock = $(this).data("stock");
    const solicitada = $(this).data("solicitada");
    const entregada = $(this).data("entregada");
    const pendiente = solicitada - entregada;

    $("#idProductoEntrega").val(id);
    $("#productoSeleccionado").val(producto);
    $("#cantidadEntregar").val("");

    $("#modalEntregar").data("stock", stock);
    $("#modalEntregar").data("pendiente", pendiente);

    $("#modalEntregar").modal("show");
});

// Confirmar entrega
$("#btnConfirmarEntrega").click(function () {

    const producto = $("#productoSeleccionado").val();
    const quien = $("#quienRetira").val();
    const cant = Number($("#cantidadEntregar").val());

    const stock = Number($("#modalEntregar").data("stock"));
    const pendiente = Number($("#modalEntregar").data("pendiente"));

    if (!quien || cant <= 0) {
        swal({
            type: "warning",
            title: "Campos incompletos",
            text: "Debe completar todos los campos.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    if (cant > stock) {
        swal({
            type: "error",
            title: "Stock insuficiente",
            text: `La cantidad solicitada supera el stock disponible (${stock}).`,
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    if (cant > pendiente) {
        swal({
            type: "error",
            title: "Cantidad excedida",
            text: `Solo quedan ${pendiente} unidades pendientes por entregar.`,
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    swal({
        type: "success",
        title: "Entrega registrada",
        text: `Se entregaron ${cant} unidades del producto "${producto}".`,
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
    }).then(() => {

        const id = Number($("#idProductoEntrega").val());
        const productoEncontrado = datos.find(item => item.id === id);

        if (productoEncontrado) {

            productoEncontrado.stock -= cant;

            productoEncontrado.entregada += cant;
        }

        cargarTabla(datos);

        $("#modalEntregar").modal("hide");
    });

});
