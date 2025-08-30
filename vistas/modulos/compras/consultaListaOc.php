<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Consulta Lista Oc</h1>
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
                            <div class="form-group col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="idEmpresa">Empresa</label>
                                    <select class="form-control" id="idEmpresa" name="idEmpresa" aria-label="Seleccionar empresa">
                                        <option value="">Seleccione una empresa</option>
                                        <option value="1">Empresa A</option>
                                        <option value="2">Empresa B</option>
                                        <option value="3">Empresa C</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="fechaDesde">Fecha desde</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fechaDesde" value="2025-02-09" aria-label="Fecha desde">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="fechaHasta">Fecha hasta</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="fechaHasta" value="2025-03-11" aria-label="Fecha hasta">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="idEstado">Estado</label>
                                    <select class="form-control" id="idEstado" name="idEstado" aria-label="Seleccionar estado">
                                        <option value="">Seleccione un estado</option>
                                        <option value="1">Pendiente</option>
                                        <option value="2">Aprobado</option>
                                        <option value="3">Rechazado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12" style="margin-top:25px;">
                                    <button type="button" class="btn btn-primary" id="btnConsultar">
                                        <i class="fa fa-search" aria-hidden="true"></i> Consultar
                                    </button>
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
                                            <select id="entriesSelect" class="form-control input-sm" style="display: inline-block; width: auto;" aria-label="Número de registros por página">
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
                                            <input type="search" class="form-control input-sm" id="searchInput" placeholder="Filtrado general..." style="display: inline-block; width: 200px;" aria-label="Buscar en la tabla">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-container">
                            <div class="table-responsive">
                                <div class="box-body">
                                    <div id="lista">
                                        <table id="tablaEvaluacion" class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;" role="table" aria-label="Tabla de órdenes de compra">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width:120px; cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(0, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 0, this)">
                                                        <center>N° OC <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(1, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 1, this)">
                                                        <center>Empresa <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(2, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 2, this)">
                                                        <center>Tipo OC <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(3, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 3, this)">
                                                        <center>Fecha <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(4, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 4, this)">
                                                        <center>Rut Proveedor <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(5, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 5, this)">
                                                        <center>Proveedor <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(6, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 6, this)">
                                                        <center>Plaza de Pago <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(7, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 7, this)">
                                                        <center>Forma de Pago <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(8, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 8, this)">
                                                        <center>Tipo Documento Proveedor <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(9, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 9, this)">
                                                        <center>Numero Documento <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
                                                    </th>
                                                    <th style="cursor: pointer; position: relative; user-select: none; padding-right: 20px;" onclick="sortTable(10, this)" tabindex="0" role="columnheader" aria-sort="none" onkeydown="handleKeyPress(event, 10, this)">
                                                        <center>Monto Total <i class="fa fa-sort" style="margin-left: 5px;" aria-hidden="true"></i></center>
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
                                    <div class="dataTables_info" id="tablaInfo" role="status" aria-live="polite">
                                        Mostrando registros del 0 al 0 de un total de 0 registros
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers text-right">
                                        <ul class="pagination" style="margin: 0;" role="navigation" aria-label="Paginación de tabla">
                                            <li class="paginate_button previous disabled">
                                                <a href="#" onclick="previousPage()" aria-label="Página anterior">‹</a>
                                            </li>
                                            <li class="paginate_button active">
                                                <a href="#" aria-label="Página 1, página actual" aria-current="page">1</a>
                                            </li>
                                            <li class="paginate_button next disabled">
                                                <a href="#" onclick="nextPage()" aria-label="Página siguiente">›</a>
                                            </li>
                                        </ul>
                                        <!-- Botón Excel -->
                                        <button type="button" class="btn btn-success btn-excel" id="btnExportExcel" onclick="exportToExcel()" title="Exportar a Excel" aria-label="Exportar tabla a Excel">
                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
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
        position: absolute;
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

    const exampleData = [
        ['OC001', 'Empresa Alpha', 'Servicio', '2025-01-15', '12345678-9', 'Proveedor Alpha S.A.', 'Santiago', 'Contado', 'Factura', 'F001', '$1.250.000'],
        ['OC002', 'Empresa Beta', 'Producto', '2025-01-20', '98765432-1', 'Proveedor Beta Ltda.', 'Valparaíso', '30 días', 'Boleta', 'B002', '$850.000'],
        ['OC003', 'Empresa Gamma', 'Servicio', '2025-01-25', '11223344-5', 'Proveedor Gamma Corp.', 'Concepción', '60 días', 'Factura', 'F003', '$2.100.000'],
        ['OC004', 'Empresa Delta', 'Producto', '2025-02-01', '55667788-0', 'Proveedor Delta Inc.', 'Santiago', 'Contado', 'Factura', 'F004', '$750.000'],
        ['OC005', 'Empresa Epsilon', 'Servicio', '2025-02-05', '99887766-4', 'Proveedor Epsilon S.A.', 'Antofagasta', '45 días', 'Boleta', 'B005', '$1.800.000'],
        ['OC006', 'Empresa Zeta', 'Producto', '2025-02-10', '33445566-7', 'Proveedor Zeta Ltda.', 'Temuco', '30 días', 'Factura', 'F006', '$950.000'],
        ['OC007', 'Empresa Eta', 'Servicio', '2025-02-15', '77889900-2', 'Proveedor Eta Corp.', 'Santiago', 'Contado', 'Factura', 'F007', '$1.650.000'],
        ['OC008', 'Empresa Theta', 'Producto', '2025-02-20', '22334455-8', 'Proveedor Theta Inc.', 'Valparaíso', '60 días', 'Boleta', 'B008', '$1.200.000'],
        ['OC009', 'Empresa Iota', 'Servicio', '2025-02-25', '66778899-3', 'Proveedor Iota S.A.', 'La Serena', '30 días', 'Factura', 'F009', '$2.250.000'],
        ['OC010', 'Empresa Kappa', 'Producto', '2025-03-01', '44556677-1', 'Proveedor Kappa Ltda.', 'Santiago', 'Contado', 'Factura', 'F010', '$680.000'],
        ['OC011', 'Empresa Lambda', 'Servicio', '2025-03-05', '88990011-6', 'Proveedor Lambda Corp.', 'Rancagua', '45 días', 'Boleta', 'B011', '$1.450.000'],
        ['OC012', 'Empresa Mu', 'Producto', '2025-03-10', '11223344-9', 'Proveedor Mu Inc.', 'Iquique', '30 días', 'Factura', 'F012', '$1.100.000']
    ];

    // Función para cargar datos
    function loadData(data = exampleData) {
        try {
            currentData = data;
            filteredData = [...currentData];
            updateTable();
            updatePagination();
        } catch (error) {
            console.error('Error al cargar datos:', error);
            showErrorMessage('Error al cargar los datos');
        }
    }

    function updateTable() {
        try {
            const tbody = document.getElementById('tablaBody');
            if (!tbody) {
                console.error('No se encontró el elemento tbody');
                return;
            }

            const startIndex = (currentPage - 1) * recordsPerPage;
            const endIndex = startIndex + recordsPerPage;
            const pageData = filteredData.slice(startIndex, endIndex);

            tbody.innerHTML = '';

            if (pageData.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="11" class="no-data-message">
                            No se encontraron registros.
                        </td>
                    </tr>
                `;
            } else {
                pageData.forEach((row, index) => {
                    const tr = document.createElement('tr');
                    tr.setAttribute('role', 'row');
                    row.forEach((cell, cellIndex) => {
                        const td = document.createElement('td');
                        td.textContent = cell;
                        td.setAttribute('role', 'cell');
                        tr.appendChild(td);
                    });
                    tbody.appendChild(tr);
                });
            }

            updateInfo();
        } catch (error) {
            console.error('Error al actualizar tabla:', error);
            showErrorMessage('Error al actualizar la tabla');
        }
    }

    function updateInfo() {
        try {
            const info = document.getElementById('tablaInfo');
            if (!info) return;

            const startIndex = (currentPage - 1) * recordsPerPage + 1;
            const endIndex = Math.min(currentPage * recordsPerPage, filteredData.length);
            const total = filteredData.length;

            if (total === 0) {
                info.textContent = 'Mostrando registros del 0 al 0 de un total de 0 registros';
            } else {
                info.textContent = `Mostrando registros del ${startIndex} al ${endIndex} de un total de ${total} registros`;
            }
        } catch (error) {
            console.error('Error al actualizar información:', error);
        }
    }

    function sortTable(columnIndex, thElement) {
        try {
            const dir = sortDirection[columnIndex] === "asc" ? "desc" : "asc";
            sortDirection[columnIndex] = dir;

            // Limpiar clases de flechas en todos los th
            const headers = document.querySelectorAll("#tablaEvaluacion th");
            headers.forEach((th, i) => {
                th.classList.remove("asc", "desc");
                th.setAttribute('aria-sort', 'none');
                if (i === columnIndex) {
                    th.classList.add(dir);
                    th.setAttribute('aria-sort', dir === 'asc' ? 'ascending' : 'descending');
                }
            });

            filteredData.sort((a, b) => {
                let aText = a[columnIndex];
                let bText = b[columnIndex];

                // Detectar si es una fecha (formato YYYY-MM-DD)
                if (typeof aText === 'string' && aText.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    const aDate = new Date(aText);
                    const bDate = new Date(bText);
                    return dir === "asc" ? aDate - bDate : bDate - aDate;
                }

                // Detectar si es un monto (formato $X.XXX.XXX)
                if (typeof aText === 'string' && aText.startsWith('$')) {
                    const aNum = parseFloat(aText.replace(/[$.,]/g, ''));
                    const bNum = parseFloat(bText.replace(/[$.,]/g, ''));
                    return dir === "asc" ? aNum - bNum : bNum - aNum;
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
        } catch (error) {
            console.error('Error al ordenar tabla:', error);
            showErrorMessage('Error al ordenar los datos');
        }
    }

    function handleKeyPress(event, columnIndex, thElement) {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            sortTable(columnIndex, thElement);
        }
    }

    function filterTable() {
        try {
            const searchValue = document.getElementById('searchInput').value.toLowerCase().trim();
            
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
        } catch (error) {
            console.error('Error al filtrar tabla:', error);
            showErrorMessage('Error al filtrar los datos');
        }
    }

    function updateVisibleRows() {
        try {
            const selectElement = document.getElementById('entriesSelect');
            if (!selectElement) return;

            recordsPerPage = parseInt(selectElement.value);
            currentPage = 1;
            updateTable();
            updatePagination();
        } catch (error) {
            console.error('Error al actualizar filas visibles:', error);
        }
    }

    function exportToExcel() {
        try {
            // Crear un nuevo libro de trabajo
            const wb = XLSX.utils.book_new();
            
            // Preparar los datos para Excel con headers correctos
            const headers = ['N° OC', 'Empresa', 'Tipo OC', 'Fecha', 'Rut Proveedor', 'Proveedor', 'Plaza de Pago', 'Forma de Pago', 'Tipo Documento Proveedor', 'Numero Documento', 'Monto Total'];
            const excelData = [headers, ...filteredData];
            
            // Crear la hoja de trabajo
            const ws = XLSX.utils.aoa_to_sheet(excelData);
            
            // Configurar el ancho de las columnas
            const colWidths = [
                { wch: 12 }, // N° OC
                { wch: 15 }, // Empresa
                { wch: 12 }, // Tipo OC
                { wch: 12 }, // Fecha
                { wch: 15 }, // Rut Proveedor
                { wch: 25 }, // Proveedor
                { wch: 15 }, // Plaza de Pago
                { wch: 15 }, // Forma de Pago
                { wch: 20 }, // Tipo Documento Proveedor
                { wch: 15 }, // Numero Documento
                { wch: 15 }  // Monto Total
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
            XLSX.utils.book_append_sheet(wb, ws, "Lista OC");
            
            // Generar el nombre del archivo con fecha actual
            const now = new Date();
            const dateStr = now.toISOString().split('T')[0];
            const fileName = `Lista_OC_${dateStr}.xlsx`;
            
            // Descargar el archivo
            XLSX.writeFile(wb, fileName);
            
            console.log('Archivo Excel exportado exitosamente');
        } catch (error) {
            console.error('Error al exportar a Excel:', error);
            showErrorMessage('Error al exportar a Excel');
        }
    }

    function showErrorMessage(message) {
        const tbody = document.getElementById('tablaBody');
        if (tbody) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="11" class="no-data-message" style="color: #dc3545;">
                        ${message}
                    </td>
                </tr>
            `;
        }
    }

    function previousPage() {
        try {
            if (currentPage > 1) {
                currentPage--;
                updateTable();
                updatePaginationButtons();
            }
        } catch (error) {
            console.error('Error al navegar a página anterior:', error);
        }
    }

    function nextPage() {
        try {
            const totalPages = Math.ceil(filteredData.length / recordsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                updateTable();
                updatePaginationButtons();
            }
        } catch (error) {
            console.error('Error al navegar a página siguiente:', error);
        }
    }

    function updatePaginationButtons() {
        try {
            const totalPages = Math.ceil(filteredData.length / recordsPerPage);
            const prevButton = document.querySelector('.paginate_button.previous');
            const nextButton = document.querySelector('.paginate_button.next');
            
            if (prevButton) {
                if (currentPage <= 1) {
                    prevButton.classList.add('disabled');
                } else {
                    prevButton.classList.remove('disabled');
                }
            }
            
            if (nextButton) {
                if (currentPage >= totalPages) {
                    nextButton.classList.add('disabled');
                } else {
                    nextButton.classList.remove('disabled');
                }
            }
        } catch (error) {
            console.error('Error al actualizar botones de paginación:', error);
        }
    }

    function updatePagination() {
        updateInfo();
        updatePaginationButtons();
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Asegurar que el panel esté abierto por defecto
            const panel = document.getElementById('frm_j_idt110_content');
            if (panel) {
                panel.classList.add('in');
            }

            // Cargar datos iniciales
            loadData();

            // Event listeners para controles
            const searchInput = document.getElementById('searchInput');
            const entriesSelect = document.getElementById('entriesSelect');
            const btnBuscar = document.getElementById('btnBuscar');

            if (searchInput) {
                searchInput.addEventListener('input', filterTable);
            }
            
            if (entriesSelect) {
                entriesSelect.addEventListener('change', updateVisibleRows);
            }
            
            // Event listener para el botón buscar
            if (btnBuscar) {
                btnBuscar.addEventListener('click', function() {
                    console.log('Buscando con filtros...');
                    // Aquí puedes agregar lógica para filtrar por los campos del formulario
                    loadData();
                });
            }

            console.log('Sistema de Lista OC cargado correctamente');
        } catch (error) {
            console.error('Error al inicializar la aplicación:', error);
            showErrorMessage('Error al inicializar la aplicación');
        }
    });
</script>
