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
        reorden: 3
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
        reorden: 8
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
        reorden: 5
    }
];

// === Buscar registros ===
$("#btnBuscar").click(function () {
    const tipo = $("#tipoProducto").val();
    const validar = $("#validarSaldo").val();
    let resultados = stock;

    // Filtros
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
        tbody.append('<tr><td colspan="9" style="text-align:center;">No se encontraron registros.</td></tr>');
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
        </tr>
      `);
    });
}

// === Exportar a Excel (simulado) ===
$("#btnExportar").click(function () {
    alert("Generando archivo Excel con los resultados filtrados...");
    // Aquí podrías usar window.open('../reportes/exportarExcelStock.php?...');
});