<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Servicio OT: OT desde un reporte de falla</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Lista Reportes de Fallas Pendientes
                            </a>
                        </h4>
                    </div>

                    <div id="frm_j_idt110_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <div class="box-body">
                                        <div id="lista">
                                            <table id="tablaDocumentos" class="table table-bordered table-striped nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nº RF</th>
                                                        <th>Nº Detalle</th>
                                                        <th>Fecha Detalle</th>
                                                        <th>Máquina</th>
                                                        <th>Sistema</th>
                                                        <th>Sub-Sistema</th>
                                                        <th>Observación</th>
                                                        <th>Km Reportado</th>
                                                        <th>Km Actual</th>
                                                        <th>Asignar OT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Se llenará dinámicamente -->
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
            text-align: center;
        }

        #lista th {
            font-size: 13px;
            background-color: #f4f4f4;
            border: 1px solid #ddd !important;
            padding: 8px;
            cursor: pointer;
        }

        #lista td {
            font-size: 13px;
            border: 1px solid #ddd !important;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 180px;
        }

        .table-container {
            margin: 0 15px 15px 15px;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table-bordered {
            border: 1px solid #ddd !important;
        }

        .dt-buttons .btn {
            margin-right: 5px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#tablaDocumentos').DataTable({
                dom: '<"d-flex justify-content-between mb-2"fB>rt<"d-flex justify-content-between"ip>',
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Excel',
                        className: 'btn btn-success btn-sm'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        className: 'btn btn-danger btn-sm',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    }
                ],
                paging: true,
                lengthMenu: [5, 10, 25, 50, 100],
                pageLength: 10,
                scrollX: true,
                language: {
                    lengthMenu: "Mostrar _MENU_ registros",
                    search: "Buscar:",
                    paginate: {
                        previous: "Anterior",
                        next: "Siguiente"
                    },
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                    emptyTable: "No hay datos disponibles en la tabla",
                    zeroRecords: "No se encontraron resultados"
                }
            });
        });
    </script>
</div>