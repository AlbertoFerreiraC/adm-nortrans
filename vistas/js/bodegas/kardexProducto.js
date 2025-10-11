let filtros = [];

// Datos simulados
const movimientosSimulados = [
    {
        id: 1,
        tipoMov: "Entrada",
        tipoDoc: "Factura",
        nroDoc: "FAC-2025-001",
        item: 1,
        fecha: "2025-10-01",
        idProd: "600510618",
        prod: "BOMBA DE AGUA",
        costo: 85000,
        cantidad: 2,
        bodegaOrigen: "Proveedor",
        bodegaDestino: "Bodega Industrial",
        centro: "CC001"
    },
    {
        id: 2,
        tipoMov: "Salida",
        tipoDoc: "Traspaso",
        nroDoc: "TR-2025-009",
        item: 1,
        fecha: "2025-10-08",
        idProd: "I002",
        prod: "GRASA INDUSTRIAL",
        costo: 20000,
        cantidad: 1,
        bodegaOrigen: "Bodega Industrial",
        bodegaDestino: "Bodega Comercial",
        centro: "CC002"
    },
    {
        id: 3,
        tipoMov: "Traspaso",
        tipoDoc: "Nota",
        nroDoc: "NT-2025-011",
        item: 1,
        fecha: "2025-10-10",
        idProd: "I005",
        prod: "ACEITE HIDRÁULICO",
        costo: 25000,
        cantidad: 3,
        bodegaOrigen: "Bodega Industrial",
        bodegaDestino: "Bodega Servicio",
        centro: "CC003"
    }
];

// === Mostrar campo dinámico según tipo ===
$("#tipoFiltro").change(function () {
    const tipo = $(this).val();
    const contenedor = $("#contenedorFiltro");
    contenedor.empty();

    if (tipo === "Repuesto" || tipo === "Insumo") {
        contenedor.append(`
        <label>${tipo}</label>
        <input type="text" id="valorFiltro" class="form-control input-sm" placeholder="Código o nombre del ${tipo}">
      `);
    } else if (tipo === "CentroCosto") {
        contenedor.append(`
        <label>Centro de costo</label>
        <select id="valorFiltro" class="form-control input-sm">
          <option value="">Seleccione...</option>
          <option value="CC001">CC001 - Mantenimiento</option>
          <option value="CC002">CC002 - Producción</option>
          <option value="CC003">CC003 - Administración</option>
        </select>
      `);
    } else if (tipo === "Fecha") {
        contenedor.append(`
        <label>Rango de fechas</label>
        <div class="input-group">
          <input type="date" id="fechaInicio" class="form-control input-sm">
          <span class="input-group-addon">a</span>
          <input type="date" id="fechaFin" class="form-control input-sm">
        </div>
      `);
    } else if (tipo === "Movimiento") {
        contenedor.append(`
        <label>Tipo de movimiento</label>
        <select id="valorFiltro" class="form-control input-sm">
          <option value="">Seleccione...</option>
          <option value="Entrada">Entrada</option>
          <option value="Salida">Salida</option>
          <option value="Traspaso">Traspaso</option>
        </select>
      `);
    }
});

// === Agregar filtro ===
$("#btnAgregarFiltro").click(function () {
    const tipo = $("#tipoFiltro").val();
    if (!tipo) return alert("Seleccione un tipo de filtro.");

    let valor = "";
    if (tipo === "Fecha") {
        const ini = $("#fechaInicio").val();
        const fin = $("#fechaFin").val();
        if (!ini || !fin) return alert("Debe seleccionar ambas fechas.");
        valor = `${ini} a ${fin}`;
    } else {
        valor = $("#valorFiltro").val();
        if (!valor) return alert("Debe ingresar un valor para el filtro.");
    }

    filtros.push({ tipo, valor });
    renderFiltros();
});

// === Render filtros activos ===
function renderFiltros() {
    const div = $("#filtrosActivos");
    div.empty();

    filtros.forEach((f, i) => {
        div.append(`
        <span class="badge-filtro">
          ${f.tipo}: ${f.valor}
          <button class="btnEliminarFiltro" data-index="${i}"><i class="fa fa-times"></i></button>
        </span>
      `);
    });
}

$(document).on("click", ".btnEliminarFiltro", function () {
    const index = $(this).data("index");
    filtros.splice(index, 1);
    renderFiltros();
});

// === Buscar ===
$("#btnBuscar").click(function () {
    let resultados = movimientosSimulados;

    filtros.forEach(f => {
        if (f.tipo === "Repuesto" || f.tipo === "Insumo") {
            resultados = resultados.filter(r =>
                r.prod.toUpperCase().includes(f.valor.toUpperCase()) || r.idProd.includes(f.valor)
            );
        } else if (f.tipo === "CentroCosto") {
            resultados = resultados.filter(r => r.centro === f.valor);
        } else if (f.tipo === "Movimiento") {
            resultados = resultados.filter(r => r.tipoMov === f.valor);
        } else if (f.tipo === "Fecha") {
            const [ini, fin] = f.valor.split(" a ");
            resultados = resultados.filter(r => r.fecha >= ini && r.fecha <= fin);
        }
    });

    cargarTabla(resultados);
});

// === Cargar tabla ===
function cargarTabla(lista) {
    const tbody = $("#tablaMovimientos tbody");
    tbody.empty();

    if (lista.length === 0) {
        tbody.append('<tr><td colspan="13" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
        return;
    }

    lista.forEach(item => {
        tbody.append(`
        <tr>
          <td>${item.id}</td>
          <td>${item.tipoMov}</td>
          <td>${item.tipoDoc}</td>
          <td>${item.nroDoc}</td>
          <td>${item.item}</td>
          <td>${item.fecha}</td>
          <td>${item.idProd}</td>
          <td>${item.prod}</td>
          <td>${item.costo.toLocaleString()}</td>
          <td>${item.cantidad}</td>
          <td>${item.bodegaOrigen}</td>
          <td>${item.bodegaDestino}</td>
          <td>${item.centro}</td>
        </tr>
      `);
    });
}

// === Exportar (simulado) ===
$("#btnExcel").click(() => alert("Exportando resultados a Excel..."));
$("#btnPDF").click(() => alert("Generando PDF con los resultados..."));