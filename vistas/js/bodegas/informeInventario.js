// === Datos simulados ===
const stock = [
    {
        bodega: "Bodega industrial",
        tipo: "Repuesto",
        id: "600510618",
        producto: "BOMBA DE AGUA",
        unidad: "UND",
        costo: 85000,
        cantidad: 2,
        minimo: 1,
        reorden: 5,
        fecha: "2024-06-10"
    },
    {
        bodega: "Bodega industrial",
        tipo: "Insumo",
        id: "I002",
        producto: "GRASA INDUSTRIAL",
        unidad: "KG",
        costo: 20000,
        cantidad: 10,
        minimo: 5,
        reorden: 5,
        fecha: "2024-06-08"
    },
    {
        bodega: "Bodega industrial",
        tipo: "Insumo",
        id: "I005",
        producto: "ACEITE HIDRÁULICO",
        unidad: "LT",
        costo: 25000,
        cantidad: 0,
        minimo: 3,
        reorden: 5,
        fecha: "2024-06-05"
    }
];

// === Buscar registros (delegado para vistas dinámicas) ===
$(document).on("click", "#btnBuscar", function () {

    const tipo = $("#tipoProducto").val();
    const validar = $("#validarSaldo").val();
    let resultados = stock;

    if (tipo) {
        resultados = resultados.filter(r => r.tipo === tipo);
    }

    if (validar === "con") {
        resultados = resultados.filter(r => r.cantidad > 0);
    } else if (validar === "sin") {
        resultados = resultados.filter(r => r.cantidad === 0);
    }

    cargarTabla(resultados);
});

function cargarTabla(lista) {

    const tbody = $("#tablaStock tbody");
    tbody.empty();

    if (lista.length === 0) {
        tbody.append('<tr><td colspan="10" style="text-align:center;">No se encontraron registros.</td></tr>');
        return;
    }

    lista.forEach(item => {
        tbody.append(`
            <tr>
              <td>${item.bodega}</td>
              <td>${item.tipo}</td>
              <td>${item.id}</td>
              <td>${item.producto}</td>
              <td>${item.unidad}</td>
              <td>${item.costo.toLocaleString()}</td>
              <td>${item.cantidad}</td>
              <td>${item.minimo}</td>
              <td>${item.reorden}</td>
              <td>${item.fecha}</td>
            </tr>
        `);
    });
}

// === Exportar tabla HTML a Excel (sin backend) ===
$(document).on("click", "#btnExportar", function () {

    let tabla = document.getElementById("tablaStock").outerHTML;

    let archivo = new Blob(
        ['\ufeff' + tabla],
        { type: 'application/vnd.ms-excel' }
    );

    let url = URL.createObjectURL(archivo);

    let link = document.createElement("a");
    link.href = url;
    link.download = "Inventario.xls";
    document.body.appendChild(link);
    link.click();

    document.body.removeChild(link);
    URL.revokeObjectURL(url);

});