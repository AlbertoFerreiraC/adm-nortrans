<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Consulta: Lista de Recepcion OC
        </h1>
        <ol class="breadcrumb">
            <li class="active">Lista de Recepcion OC</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="box">
            <div class="row table-controls">
                <!-- Mostrar registros -->
                <div class="col-sm-6 col-xs-12 control-left">
                    <label for="entriesSelect">Mostrar
                        <select id="entriesSelect" onchange="updateVisibleRows()" class="form-control input-sm" style="display: inline-block; width: auto;">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> registros
                    </label>
                </div>
                <!-- Buscar -->
                <div class="col-sm-6 col-xs-12 control-right text-right">
                    <label for="filtradoDinamico">Buscar:
                        <input type="text" class="form-control input-sm" id="filtradoDinamico" placeholder="Filtrado general..." autocomplete="off"
                            style="display: inline-block; width: 250px; text-align: center; font-size: 17px;" onkeyup="filterTable()">
                    </label>
                </div>
            </div>
            
            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%">
                        <thead>
                            <tr>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(0, this)">
                                    <center>N° Recepcion</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(1, this)">
                                    <center>N° OC</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(2, this)">
                                    <center>Bodega</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(3, this)">
                                    <center>Fecha Recepcion</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(4, this)">
                                    <center>Tipo Documento</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(5, this)">
                                    <center>N° Documento</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(6, this)">
                                    <center>Monto Total</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(7, this)">
                                    <center>Imprimir</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.table-controls {
    margin-bottom: 20px;
    margin-top: 10px;
    align-items: center;
}

@media (max-width: 767px) {
    .control-right {
        text-align: left !important;
        margin-top: 15px;
    }
    .control-right input {
        width: 100% !important;
    }
}

#div1 {
    overflow-x: auto;
    width: 100%;
}

#div1 table {
    width: 100%;
    background-color: lightgray;
    min-width: 800px; /* Asegurar ancho mínimo para scroll horizontal */
}

/* Estilos para las flechitas de ordenamiento */
#tabla th {
    background-color: #f4f4f4;
    border: 1px solid #ddd !important;
    font-weight: bold;
    white-space: nowrap; /* Evitar que el texto se corte */
}

#tabla th.asc::after {
    content: "▲";
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    color: #555;
}

#tabla th.desc::after {
    content: "▼";
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 12px;
    color: #555;
}

#tabla th:hover {
    background-color: #e8e8e8;
    transition: background-color 0.2s ease;
}

#tabla td {
    border: 1px solid #ddd !important;
    text-align: center;
    padding: 8px;
    white-space: nowrap; /* Evitar que el contenido se corte */
}

.btn-sm {
    padding: 4px 8px;
    font-size: 12px;
    border-radius: 3px;
}

/* Mejorar el formato de montos */
#tabla td:nth-child(7) {
    text-align: right;
    font-weight: bold;
    color: #2c5aa0;
}

/* Estilo para la columna de botones */
#tabla td:nth-child(8) {
    text-align: center;
    white-space: nowrap;
}
</style>

<script>
let sortDirection = [];

function sortTable(columnIndex, thElement) {
    const table = document.getElementById("tabla");
    if (!table || !table.tBodies[0]) return;
    
    const rows = Array.from(table.tBodies[0].rows);
    const dir = sortDirection[columnIndex] === "asc" ? "desc" : "asc";
    sortDirection[columnIndex] = dir;
    
    // Limpiar clases de flechas en todos los th
    const headers = table.querySelectorAll("th");
    headers.forEach((th, i) => {
        th.classList.remove("asc", "desc");
        if (i === columnIndex) th.classList.add(dir);
    });
    
    rows.sort((a, b) => {
        let aText = a.cells[columnIndex].innerText.trim();
        let bText = b.cells[columnIndex].innerText.trim();
        
        // Detectar si es una fecha (formato YYYY-MM-DD)
        const datePattern = /^\d{4}-\d{2}-\d{2}$/;
        const isDate = datePattern.test(aText) && datePattern.test(bText);
        
        if (isDate) {
            return dir === "asc" ?
                new Date(aText) - new Date(bText) :
                new Date(bText) - new Date(aText);
        }
        
        // Detectar si es un monto (contiene $ y números)
        const moneyPattern = /^\$[\d,]+$/;
        if (moneyPattern.test(aText) && moneyPattern.test(bText)) {
            const aNum = parseFloat(aText.replace(/[$,]/g, ''));
            const bNum = parseFloat(bText.replace(/[$,]/g, ''));
            return dir === "asc" ? aNum - bNum : bNum - aNum;
        }
        
        // Detectar si es un número puro
        const aNum = parseFloat(aText);
        const bNum = parseFloat(bText);
        if (!isNaN(aNum) && !isNaN(bNum)) {
            return dir === "asc" ? aNum - bNum : bNum - aNum;
        }
        
        // Ordenamiento alfabético
        return dir === "asc" ?
            aText.localeCompare(bText, 'es', { numeric: true }) :
            bText.localeCompare(aText, 'es', { numeric: true });
    });
    
    const tbody = table.tBodies[0];
    tbody.innerHTML = "";
    rows.forEach(row => tbody.appendChild(row));
}

function filterTable() {
    const input = document.getElementById("filtradoDinamico");
    if (!input) return;
    
    const searchValue = input.value.toLowerCase();
    const table = document.getElementById("tabla");
    if (!table || !table.tBodies[0]) return;
    
    const rows = table.tBodies[0].rows;
    Array.from(rows).forEach(row => {
        const cells = Array.from(row.cells);
        const match = cells.some(cell => cell.textContent.toLowerCase().includes(searchValue));
        row.style.display = match ? "" : "none";
    });
    
    // Actualizar filas visibles después del filtrado
    updateVisibleRows();
}

function updateVisibleRows() {
    const entriesSelect = document.getElementById("entriesSelect");
    if (!entriesSelect) return;
    
    const limit = parseInt(entriesSelect.value);
    const table = document.getElementById("tabla");
    if (!table || !table.tBodies[0]) return;
    
    const rows = Array.from(table.tBodies[0].rows);
    let visibleCount = 0;
    
    rows.forEach(row => {
        if (row.style.display !== "none") {
            visibleCount++;
            row.style.display = visibleCount <= limit ? "" : "none";
        }
    });
}

// Event listeners
document.addEventListener("DOMContentLoaded", function() {
    // Vincular búsqueda con límite dinámicamente
    const searchInput = document.getElementById("filtradoDinamico");
    if (searchInput) {
        searchInput.addEventListener("input", () => {
            filterTable();
        });
    }
    
    // Inicializar con 10 registros visibles
    updateVisibleRows();
});
</script>
