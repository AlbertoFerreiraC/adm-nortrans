<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Documentos laborales por vencer</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Lista
                            </a>
                        </h4>
                    </div>

                    <div class="table-controls">
                        <div class="control-left">
                            <label for="entriesSelect">Mostrar
                                <select id="entriesSelect" onchange="updateVisibleRows()">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> registros
                            </label>
                        </div>

                        <div class="control-right">
                            <label for="searchInput">Buscar:
                                <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Escriba para buscar...">
                            </label>
                        </div>
                    </div>

                    <div id="frm_j_idt110_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <div class="box-body">
                                        <div id="lista">
                                            <table id="tablaDocumentos" class="table table-bordered table-striped dt-responsive" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th onclick="sortTable(0, this)">Rut</th>
                                                        <th onclick="sortTable(1, this)">Personal</th>
                                                        <th onclick="sortTable(2, this)">Id Centro Costo</th>
                                                        <th onclick="sortTable(3, this)">Tipo de Documento</th>
                                                        <th onclick="sortTable(4, this)">Fecha Expiración</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <style>
        #lista table {
            font-size: 10px;
            border-collapse: separate !important;
            border-spacing: 0;
            text-align: center;
        }

        #lista th {
            font-size: 13px;
            background-color: #f4f4f4;
            border: 1px solid #ddd !important;
            cursor: pointer;
            position: relative;
            user-select: none;
            padding-right: 20px;
            /* Espacio para la flecha */
        }

        #lista th.asc::after {
            content: "▲";
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #555;
        }

        #lista th.desc::after {
            content: "▼";
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #555;
        }

        #lista td {
            font-size: 15px;
            border: 1px solid #ddd !important;
        }

        .panel-opcion-link:focus,
        .panel-opcion-link:active {
            text-decoration: underline;
        }

        .table-container {
            margin: 0 15px 15px 15px;
            /* sin margen superior */
        }


        .table-responsive {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table-bordered {
            border: 1px solid #ddd !important;
        }

        .records-control {
            top: 80px;
            right: 100px;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 15px 5px 15px;
            /* menos espacio debajo */
            flex-wrap: wrap;
        }


        .control-left,
        .control-right {
            margin: 5px;
        }

        .control-right input {
            max-width: 200px;
        }

        #btnMostarListado {
            margin-top: 22px !important;
            position: relative;
            left: 30px;
        }
    </style>

    <script>
        let sortDirection = [];

        function sortTable(columnIndex, thElement) {
            const table = document.getElementById("tablaDocumentos");
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

                const datePattern = /^\d{4}-\d{2}-\d{2}$/;
                const isDate = datePattern.test(aText) && datePattern.test(bText);

                if (isDate) {
                    return dir === "asc" ?
                        new Date(aText) - new Date(bText) :
                        new Date(bText) - new Date(aText);
                }

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
            const input = document.getElementById("searchInput").value.toLowerCase();
            const table = document.querySelector("#lista table");
            const rows = table.tBodies[0].rows;

            Array.from(rows).forEach(row => {
                const cells = Array.from(row.cells);
                const match = cells.some(cell => cell.textContent.toLowerCase().includes(input));
                row.style.display = match ? "" : "none";
            });
        }

        function updateVisibleRows() {
            const limit = parseInt(document.getElementById("entriesSelect").value);
            const table = document.querySelector("#lista table");
            const rows = Array.from(table.tBodies[0].rows);

            let visibleCount = 0;
            rows.forEach(row => {
                if (row.style.display !== "none") {
                    visibleCount++;
                    row.style.display = visibleCount <= limit ? "" : "none";
                }
            });
        }

        // Vincular búsqueda con límite dinámicamente
        document.getElementById("searchInput").addEventListener("input", () => {
            filterTable();
            updateVisibleRows();
        });
    </script>
    <script src="vistas/js/recursosHumanos/docLaboralesPorVencer.js"></script>
</div>