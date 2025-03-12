<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Solicitud de contratación</h1>
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
                                    <label>Estado</label>
                                    <select class="form-control">
                                        <option>Todos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha desde</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="2025-02-09">
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
                                        <input type="date" class="form-control" value="2025-03-11">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
                        <div class="table-container">
                            <div class="table-responsive">
                                <div class="box-body">
                                    <div id="lista">
                                        <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th style="width:120px">
                                                        <center>N° Solicitud</center>
                                                    </th>
                                                    <th>
                                                        <center>Fecha solicitud</center>
                                                    </th>
                                                    <th>
                                                        <center>Empresa</center>
                                                    </th>
                                                    <th>
                                                        <center>Cargo</center>
                                                    </th>
                                                    <th>
                                                        <center>Centro costo</center>
                                                    </th>
                                                    <th>
                                                        <center>Solicitante</center>
                                                    </th>
                                                    <th>
                                                        <center>Pre aprobado</center>
                                                    </th>
                                                    <th>
                                                        <center>Aprobadoo</center>
                                                    </th>
                                                    <th>
                                                        <center>Tipo contrato</center>
                                                    </th>
                                                    <th>
                                                        <center>Estado actual</center>
                                                    </th>
                                                    <th>
                                                        <center>Impresión</center>
                                                    </th>
                                                </tr>
                                                <!-- Fila de filtros -->
                                                <tr class="filters">
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                    <th>
                                                        <input type="text" class="form-control filter-input" placeholder="">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
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
    }

    #lista th {
        font-size: 13px;
    }

    #lista td {
        font-size: 15px;
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

    .filters th {
        padding: 4px !important;
        background-color: #f8f9fa !important;
    }

    .filter-input {
        width: 100%;
        padding: 4px 8px;
        font-size: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23999' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolygon points='22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3'%3E%3C/polygon%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 8px center;
        background-size: 12px;
        padding-right: 28px;
    }

    .filter-input:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    #panelFiltros .panel-heading {
        background-color: #e9ecef;
        border-bottom: 1px solid #dee2e6;
    }

    #panelFiltros .panel-body {
        padding: 15px;
        background-color: #fff;
    }

    #panelFiltros .form-control {
        height: 34px;
        padding: 6px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    #panelFiltros .input-group-addon {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-left: none;
    }

    #panelFiltros .btn-primary {
        background-color: #337ab7;
        border-color: #2e6da4;
        padding: 6px 12px;
    }

    #panelFiltros .btn-primary:hover {
        background-color: #286090;
        border-color: #204d74;
    }

    .panel-group {
        margin-bottom: 15px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Asegurarse de que el panel esté abierto por defecto
        const panel = document.getElementById('frm_j_idt110_content');
        if (panel) {
            panel.classList.add('in');
        }
        const filterInputs = document.querySelectorAll('.filter-input');
        filterInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                const searchText = this.value.toLowerCase();
                const table = document.querySelector('.table');
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const cell = row.cells[index];
                    if (cell) {
                        const text = cell.textContent.toLowerCase();
                        row.style.display = text.includes(searchText) ? '' : 'none';
                    }
                });
            });
        });


        exampleData.forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    });
</script>
</div>