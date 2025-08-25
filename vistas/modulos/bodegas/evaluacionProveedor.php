<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Evaluacion de Proveedor</h1>
    </section>

    <section class="content">
        <div class="panel-group" id="panelFiltros">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 1px; background-color: #e9ecef;">
                    <h4 class="panel-opcion">
                        <a data-toggle="collapse" href="#filtros_content" class="panel-opcion-link" aria-expanded="true">
                            Filtros
                        </a>
                    </h4>
                </div>
                <div id="filtros_content" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <select class="form-control" id="idEmpresa" name="idEmpresa">
                                        <option value="">Seleccionar empresa...</option>
                                        <option value="1">Empresa Alpha S.A.</option>
                                        <option value="2">Empresa Beta Ltda.</option>
                                        <option value="3">Empresa Gamma Corp.</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha desde</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fechaDesde" value="2025-02-09">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha hasta</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fechaHasta" value="2025-03-11">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="d-flex gap-3 align-items-center">
                                    <button type="button" class="btn btn-primary" id="btnBuscar" style="margin-top: 25px;">
                                        <i class="fa fa-search" aria-hidden="true"></i> Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-group" id="frm:j_idt110">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 1px;">
                    <h4 class="panel-opcion">
                        <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                            Lista
                        </a>
                    </h4>
                </div>

                <div id="frm_j_idt110_content" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- Controles de tabla y exportación -->
                        <div class="table-controls-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length">
                                        <label>Mostrar 
                                            <select id="entriesSelect" class="form-control input-sm" style="display: inline-block; width: auto;">
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> registros
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="dataTables_filter text-right">
                                        <label>Buscar:
                                            <input type="search" class="form-control input-sm" id="searchInput" placeholder="Filtrado general..." style="display: inline-block; width: 200px;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-container">
                            <div class="table-responsive">
                                <div class="box-body">
                                    <div id="lista">
                                        <table id="tablaEvaluacion" class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th style="width:120px; cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(0, this)">
                                                        <center>Rut <i class="fa fa-sort" style="margin-left: 5px;"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(1, this)">
                                                        <center>Proveedor <i class="fa fa-sort" style="margin-left: 5px;"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(2, this)">
                                                        <center># OC <i class="fa fa-sort" style="margin-left: 5px;"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(3, this)">
                                                        <center>% Cumple Plazo <i class="fa fa-sort" style="margin-left: 5px;"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(4, this)">
                                                        <center># Cumple Especificaciones <i class="fa fa-sort" style="margin-left: 5px;"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(5, this)">
                                                        <center>% Cumple Especificación <i class="fa fa-sort" style="margin-left: 5px;"></i></center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaBody">
                                                <!-- Los datos se cargarán aquí dinámicamente -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Información de paginación y botón Excel -->
                        <div class="table-footer">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="tablaInfo">
                                        Mostrando registros del 0 al 0 de un total de 0 registros
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers text-right">
                                        <ul class="pagination" style="margin: 0;">
                                            <li class="paginate_button previous disabled">
                                                <a href="#" onclick="previousPage()">‹</a>
                                            </li>
                                            <li class="paginate_button active">
                                                <a href="#">1</a>
                                            </li>
                                            <li class="paginate_button next disabled">
                                                <a href="#" onclick="nextPage()">›</a>
                                            </li>
                                        </ul>
                                        <!-- Botón Excel -->
                                        <button type="button" class="btn btn-success btn-excel" id="btnExportExcel" onclick="exportToExcel()" title="Exportar a Excel">
                                            <i class="fa fa-file-excel-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f5f5f5;
    }

    .toggle-container {
        display: flex;
        align-items: center;
    }

    .toggle-row {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .toggle-column {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 46px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .3s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: .3s;
        border-radius: 50%;
        transform: translateX(0);
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(22px);
    }

    .date-field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    #lista table {
        font-size: 10px;
        border-collapse: separate !important;
        border-spacing: 0;
    }

    #lista th {
        font-size: 13px;
        background-color: #f4f4f4;
        border: 1px solid #ddd !important;
        font-weight: bold;
    }

    #lista td {
        font-size: 15px;
        border: 1px solid #ddd !important;
    }

    /* Estilos para las flechitas de ordenamiento */
    #tablaEvaluacion th.asc::after {
        content: "▲";
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #555;
    }

    #tablaEvaluacion th.desc::after {
        content: "▼";
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #555;
    }

    #tablaEvaluacion th:hover {
        background-color: #e8e8e8;
        transition: background-color 0.3s ease;
    }

    .panel-opcion-link:focus,
    .panel-opcion-link:active {
        text-decoration: underline;
    }

    .table-container {
        margin: 15px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;
    }

    .table>thead>tr>th {
        background-color: #f4f4f4;
        border-bottom: 2px solid #ddd;
        border: 1px solid #ddd !important;
    }

    .table-bordered {
        border: 1px solid #ddd !important;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>td {
        border: 1px solid #ddd !important;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .panel-group {
        margin-bottom: 15px;
    }

    /* Estilos para controles de tabla */
    .table-controls-header {
        margin-bottom: 15px;
        padding: 0 15px;
    }

    .dataTables_length label,
    .dataTables_filter label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
    }

    .dataTables_length select,
    .dataTables_filter input {
        margin: 0 5px;
    }

    .table-footer {
        margin-top: 15px;
        padding: 0 15px;
    }

    .dataTables_info {
        padding-top: 8px;
        font-size: 12px;
        color: #666;
    }

    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 0 10px 0 0;
        border-radius: 4px;
    }

    .pagination > li {
        display: inline;
    }

    .pagination > li > a {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .pagination > li.active > a {
        background-color: #337ab7;
        border-color: #337ab7;
        color: #fff;
    }

    .pagination > li.disabled > a {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }

    /* Botón Excel */
    .btn-excel {
        background-color: #1f7244;
        border-color: #1f7244;
        color: white;
        padding: 6px 12px;
        margin-left: 10px;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn-excel:hover {
        background-color: #155724;
        border-color: #155724;
        color: white;
    }

    .btn-excel:focus {
        box-shadow: 0 0 0 0.2rem rgba(31, 114, 68, 0.5);
    }

    /* Mensaje cuando no hay datos */
    .no-data-message {
        text-align: center;
        padding: 20px;
        color: #666;
        font-style: italic;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    // Variables globales
    let currentData = [];
    let filteredData = [];
    let currentPage = 1;
    let recordsPerPage = 10;
    let sortDirection = [];

    // Datos de ejemplo
    const exampleData = [
        ['12345678-9', 'Proveedor Alpha S.A.', 'OC001', '85%', '12', '90%'],
        ['98765432-1', 'Proveedor Beta Ltda.', 'OC002', '92%', '8', '95%'],
        ['11223344-5', 'Proveedor Gamma Corp.', 'OC003', '78%', '15', '82%'],
        ['55667788-0', 'Proveedor Delta Inc.', 'OC004', '88%', '10', '87%'],
        ['99887766-4', 'Proveedor Epsilon S.A.', 'OC005', '95%', '5', '98%'],
        ['33445566-7', 'Proveedor Zeta Ltda.', 'OC006', '73%', '18', '75%'],
        ['77889900-2', 'Proveedor Eta Corp.', 'OC007', '91%', '7', '93%'],
        ['22334455-8', 'Proveedor Theta Inc.', 'OC008', '86%', '11', '89%'],
        ['66778899-3', 'Proveedor Iota S.A.', 'OC009', '79%', '16', '81%'],
        ['44556677-1', 'Proveedor Kappa Ltda.', 'OC010', '94%', '6', '96%'],
        ['88990011-6', 'Proveedor Lambda Corp.', 'OC011', '82%', '13', '84%'],
        ['11223344-9', 'Proveedor Mu Inc.', 'OC012', '89%', '9', '91%']
    ];

    // Función para cargar datos
    function loadData(data = exampleData) {
        currentData = data;
        filteredData = [...currentData];
        updateTable();
        updatePagination();
    }

    // Función para actualizar la tabla
    function updateTable() {
        const tbody = document.getElementById('tablaBody');
        const startIndex = (currentPage - 1) * recordsPerPage;
        const endIndex = startIndex + recordsPerPage;
        const pageData = filteredData.slice(startIndex, endIndex);

        tbody.innerHTML = '';

        if (pageData.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="no-data-message">
                        No se encontraron registros.
                    </td>
                </tr>
            `;
        } else {
            pageData.forEach(row => {
                const tr = document.createElement('tr');
                row.forEach(cell => {
                    const td = document.createElement('td');
                    td.textContent = cell;
                    tr.appendChild(td);
                });
                tbody.appendChild(tr);
            });
        }

        updateInfo();
    }

    // Función para actualizar información de paginación
    function updateInfo() {
        const info = document.getElementById('tablaInfo');
        const startIndex = (currentPage - 1) * recordsPerPage + 1;
        const endIndex = Math.min(currentPage * recordsPerPage, filteredData.length);
        const total = filteredData.length;

        if (total === 0) {
            info.textContent = 'Mostrando registros del 0 al 0 de un total de 0 registros';
        } else {
            info.textContent = `Mostrando registros del ${startIndex} al ${endIndex} de un total de ${total} registros`;
        }
    }

    // Función para actualizar paginación
    function updatePagination() {
        // Aquí puedes implementar la lógica de paginación más compleja si es necesario
        updateInfo();
    }

    // Función de ordenamiento
    function sortTable(columnIndex, thElement) {
        const dir = sortDirection[columnIndex] === "asc" ? "desc" : "asc";
        sortDirection[columnIndex] = dir;

        // Limpiar clases de flechas en todos los th
        const headers = document.querySelectorAll("#tablaEvaluacion th");
        headers.forEach((th, i) => {
            th.classList.remove("asc", "desc");
            if (i === columnIndex) th.classList.add(dir);
        });

        filteredData.sort((a, b) => {
            let aText = a[columnIndex];
            let bText = b[columnIndex];

            // Detectar si es un porcentaje
            if (typeof aText === 'string' && aText.includes('%')) {
                aText = parseFloat(aText.replace('%', ''));
                bText = parseFloat(bText.replace('%', ''));
            }

            // Detectar si es un número
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

        currentPage = 1;
        updateTable();
    }

    // Función de filtrado
    function filterTable() {
        const searchValue = document.getElementById('searchInput').value.toLowerCase();
        
        if (searchValue === '') {
            filteredData = [...currentData];
        } else {
            filteredData = currentData.filter(row => 
                row.some(cell => 
                    cell.toString().toLowerCase().includes(searchValue)
                )
            );
        }
        
        currentPage = 1;
        updateTable();
        updatePagination();
    }

    // Función para cambiar registros por página
    function updateVisibleRows() {
        recordsPerPage = parseInt(document.getElementById('entriesSelect').value);
        currentPage = 1;
        updateTable();
        updatePagination();
    }

    // Función para exportar a Excel
    function exportToExcel() {
        // Crear un nuevo libro de trabajo
        const wb = XLSX.utils.book_new();
        
        // Preparar los datos para Excel
        const headers = ['Rut', 'Proveedor', '# OC', '% Cumple Plazo', '# Cumple Especificaciones', '% Cumple Especificación'];
        const excelData = [headers, ...filteredData];
        
        // Crear la hoja de trabajo
        const ws = XLSX.utils.aoa_to_sheet(excelData);
        
        // Configurar el ancho de las columnas
        const colWidths = [
            { wch: 15 }, // Rut
            { wch: 30 }, // Proveedor
            { wch: 10 }, // # OC
            { wch: 15 }, // % Cumple Plazo
            { wch: 20 }, // # Cumple Especificaciones
            { wch: 20 }  // % Cumple Especificación
        ];
        ws['!cols'] = colWidths;
        
        // Aplicar estilos a los headers
        const headerStyle = {
            font: { bold: true, color: { rgb: "FFFFFF" } },
            fill: { fgColor: { rgb: "366092" } },
            alignment: { horizontal: "center", vertical: "center" }
        };
        
        // Aplicar estilo a la primera fila (headers)
        for (let col = 0; col < headers.length; col++) {
            const cellAddress = XLSX.utils.encode_cell({ r: 0, c: col });
            if (!ws[cellAddress]) ws[cellAddress] = {};
            ws[cellAddress].s = headerStyle;
        }
        
        // Agregar la hoja al libro
        XLSX.utils.book_append_sheet(wb, ws, "Evaluacion Proveedores");
        
        // Generar el nombre del archivo con fecha actual
        const now = new Date();
        const dateStr = now.toISOString().split('T')[0];
        const fileName = `Evaluacion_Proveedores_${dateStr}.xlsx`;
        
        // Descargar el archivo
        XLSX.writeFile(wb, fileName);
        
    }

    // Funciones de navegación
    function previousPage() {
        if (currentPage > 1) {
            currentPage--;
            updateTable();
        }
    }

    function nextPage() {
        const totalPages = Math.ceil(filteredData.length / recordsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updateTable();
        }
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Asegurar que el panel esté abierto por defecto
        const panel = document.getElementById('frm_j_idt110_content');
        if (panel) {
            panel.classList.add('in');
        }

        // Cargar datos iniciales
        loadData();

        // Event listeners para controles
        document.getElementById('searchInput').addEventListener('input', filterTable);
        document.getElementById('entriesSelect').addEventListener('change', updateVisibleRows);
        
        // Event listener para el botón buscar
        document.getElementById('btnBuscar').addEventListener('click', function() {
            // Aquí puedes agregar lógica para filtrar por los campos del formulario
            console.log('Buscando con filtros...');
            // Por ahora solo recarga los datos
            loadData();
        });

        console.log('Sistema de Evaluación de Proveedores cargado correctamente');
    });
</script>
