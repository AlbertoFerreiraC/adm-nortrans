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
                                                            <center>Rut</center>
                                                        </th>
                                                        <th>
                                                            <center>Personal</center>
                                                        </th>
                                                        <th>
                                                            <center>Id Centro Costo</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo de Documento</center>
                                                        </th>
                                                        <th>
                                                            <center>Fecha Expiración</center>
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

        .table > thead > tr > th {
            background-color: #f4f4f4;
            border-bottom: 2px solid #ddd;
            border: 1px solid #ddd !important;
        }

        .table-bordered {
            border: 1px solid #ddd !important;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > td {
            border: 1px solid #ddd !important;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
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
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
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

