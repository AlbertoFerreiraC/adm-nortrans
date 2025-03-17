<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Estructura: Cargo Organizacional</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-5 col-xs-12">
                                <button type="button" class="btn btn-primary" id="crearCargo">
                                    <i class="fa fa-list" aria-hidden="true"></i> Crear Cargo
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -70px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Lista de Cargo
                            </a>
                        </h4>
                    </div>

                    <div class="box-body">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="divisionModificar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <select class="form-control input-md cajatexto solo-ruc" name="divisionModificar" id="divisionModificar">
                                <option value="Industrial">Industrial</option>
                                <option value="Interurbano">Interurbano</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-5 col-xs-12">
                            <button type="button" class="btn btn-primary" id="selecBuscar" style="margin-top: 25px;">
                                <i class="fa fa-search" aria-hidden="true"></i> Buscar
                            </button>
                        </div>
                    </div>

                    <!-- Controles de tabla -->
                    <div class="form-row justify-content-start">
                        <div class="records-control" style="margin-left: 30px;">
                            <span>Mostrar</span>
                            <select id="recordsPerPage" style="width: 70px;">
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>registros</span>
                        </div>
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
                                                            <center>Id Cargo</center>
                                                        </th>
                                                        <th>
                                                            <center>Cargo</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado</center>
                                                        </th>
                                                        <th>
                                                            <center>Editar</center>
                                                        </th>
                                                    </tr>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
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
</div>

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
        position: relative;
        top: -40px;
        margin: 10px;
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
        width: 90%;
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
        text-align: center;
    }

    .filter-input:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    .records-control {
        top: 80px;
        right: 100px;
        display: flex;
        align-items: center;
        gap: 8px;
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

        // Implementar la funcionalidad de filtrado
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
    });
</script>