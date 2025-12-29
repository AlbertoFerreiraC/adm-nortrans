<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Consulta: Consulta OC Pendiente
        </h1>
        <ol class="breadcrumb">
            <li class="active">Consulta OC Pendiente</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="form-group col-sm-12 col-xs-12">
                        <input
                            type="text"
                            id="filtradoDinamico"
                            class="form-control input-sm filtro-general"
                            autocomplete="off"
                            placeholder="Filtrado General ...">
                    </div>
                </div>
            </div>


            <div class="row table-controls">
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="entriesSelect">
                        Mostrar
                        <select id="entriesSelect" onchange="updateVisibleRows()"
                            class="form-control input-sm"
                            style="display:inline-block; width:auto;">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> registros
                    </label>
                </div>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%">
                        <thead>
                            <tr>
                                <!-- Added proper ARIA labels and improved accessibility -->
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(0, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Empresa">
                                    <center>Empresa</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(1, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por N° OC">
                                    <center>N° OC</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(2, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Fecha">
                                    <center>Fecha</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(3, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Fecha Recepción">
                                    <center>Fecha Recepcion</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(4, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Tipo OC">
                                    <center>Tipo OC</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(5, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Rut Proveedor">
                                    <center>Rut Proveedor</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(6, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Proveedor">
                                    <center>Proveedor</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(7, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Tipo Documento Compra">
                                    <center>Tipo Documento Compra</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(8, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Monto Total">
                                    <center>Monto Total</center>
                                </th>
                                <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;"
                                    onclick="sortTable(9, this)"
                                    role="button"
                                    tabindex="0"
                                    aria-label="Ordenar por Monto Compra">
                                    <center>Monto Compra</center>
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
    @media (max-width: 767px) {
        .control-right {
            text-align: left !important;
            margin-top: 15px;
        }

        .control-right input {
            width: 100% !important;
        }
    }

    .filtro-general {
        text-align: center;
        font-size: 17px;
        height: 40px;
    }

    .control-right {
        float: right;
        text-align: right;
    }

    #div1 {
        overflow-x: auto;
        width: 100%;
    }

    #div1 table {
        width: 100%;
        background-color: lightgray;
        min-width: 800px;
    }

    #tabla th {
        background-color: #f4f4f4;
        border: 1px solid #ddd !important;
        font-weight: bold;
        white-space: nowrap;
        outline: none;
    }

    #tabla th:focus {
        background-color: #e8e8e8;
        box-shadow: 0 0 0 2px #007bff;
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
        white-space: nowrap;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 3px;
    }

    #tabla td:nth-child(9),
    #tabla td:nth-child(10) {
        text-align: right;
        font-weight: bold;
        color: #2c5aa0;
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

            const datePattern = /^\d{4}-\d{2}-\d{2}$|^\d{2}\/\d{2}\/\d{4}$|^\d{2}-\d{2}-\d{4}$/;
            const isDate = datePattern.test(aText) && datePattern.test(bText);

            if (isDate) {
                const parseDate = (dateStr) => {
                    if (dateStr.includes('/')) {
                        const [day, month, year] = dateStr.split('/');
                        return new Date(year, month - 1, day);
                    } else if (dateStr.includes('-')) {
                        if (dateStr.length === 10 && dateStr.indexOf('-') === 4) {
                            return new Date(dateStr); // YYYY-MM-DD format
                        } else {
                            const [day, month, year] = dateStr.split('-');
                            return new Date(year, month - 1, day);
                        }
                    }
                    return new Date(dateStr);
                };

                return dir === "asc" ?
                    parseDate(aText) - parseDate(bText) :
                    parseDate(bText) - parseDate(aText);
            }

            const moneyPattern = /^\$?[\d,]+\.?\d*$|^[\d,]+\.?\d*\s*\$?$/;
            if (moneyPattern.test(aText) && moneyPattern.test(bText)) {
                const aNum = parseFloat(aText.replace(/[$,\s]/g, ''));
                const bNum = parseFloat(bText.replace(/[$,\s]/g, ''));
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
                aText.localeCompare(bText, 'es', {
                    numeric: true
                }) :
                bText.localeCompare(aText, 'es', {
                    numeric: true
                });
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

    function handleKeyPress(event, columnIndex, thElement) {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            sortTable(columnIndex, thElement);
        }
    }

    // Event listeners
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("filtradoDinamico");
        if (searchInput) {
            searchInput.addEventListener("input", filterTable);
        }

        const headers = document.querySelectorAll("#tabla th");
        headers.forEach((header, index) => {
            header.addEventListener("keydown", (event) => {
                handleKeyPress(event, index, header);
            });
        });

        updateVisibleRows();
    });
</script>

<script src="vistas/js/compras/ocPendienteRecepcion.js"></script>