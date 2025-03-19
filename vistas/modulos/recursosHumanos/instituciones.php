<div class="content-wrapper">

    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Mantenedor: Mantendor Instituciones</h1>
    </section>

    <section class="content">
        <div class="box">

            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-datos">
                            <a data-toggle="collapse" href="#frm_j_idt110_content"
                                class="panel-opcion-link" aria-expanded="true">Datos</a>
                        </h4>
                    </div>

                    <div id="frm_j_idt110_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="tipoInstitucion">Tipo de Institución:</label>
                                    <select class="form-control input-md cajatexto solo-ruc" name="tipoInstitucion" id="tipoInstitucion">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Reemplazo dotación">APF</option>
                                        <option value="Aumento dotación">Fonasa-Isapre</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control input-md cajatexto" name="descripcion" id="descripcion" rows="1"></textarea>
                                </div>

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="codigoExterno">Código Externo:</label>
                                    <textarea class="form-control input-md cajatexto" name="codigoExterno" id="codigoExterno" rows="1"></textarea>
                                </div>

                                <div class="button-container">
                                    <button type="button" class="btn btn-primary" id="btnGrabarFicha">
                                        <i class="fa fa-search" aria-hidden="true"></i> Grabar Ficha
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Se cerró este div antes de la nueva sección -->

        </div> <!-- Se cerró este div antes de la nueva sección -->
    </section>

    <div class="modal-body" style="margin: -35px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110_lista">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_lista_content" class="panel-opcion-link" aria-expanded="true">
                                Lista
                            </a>
                        </h4>
                    </div>

                    <div id="frm_j_idt110_lista_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <div class="box-body">
                                        <div id="lista">
                                            <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:120px">
                                                            <center>Tipo Institución</center>
                                                        </th>
                                                        <th>
                                                            <center>Id Institución</center>
                                                        </th>
                                                        <th>
                                                            <center>Descripción</center>
                                                        </th>
                                                        <th>
                                                            <center>Código Externo</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado</center>
                                                        </th>
                                                        <th>
                                                            <center>Editar</center>
                                                        </th>
                                                    </tr>
                                                    <!-- Fila de filtros -->
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                        <th><input type="text" class="form-control filter-input" placeholder=""></th>
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
        #btnGrabarFicha {
            margin-left: 15px;
        }

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
            margin: -10px;
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
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnGrabarFicha = document.getElementById('btnGrabarFicha');
            if (btnGrabarFicha) {
                const icon = btnGrabarFicha.querySelector('i');
                if (icon) {
                    icon.className = 'fa fa-save';
                }
                btnGrabarFicha.style.cssText = `
                background-color: #3c8dbc;
                border-color: #3c8dbc;
                padding: 8px 16px;
                border-radius: 6px;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            `;
                // Eventos de hover para efecto visual
                btnGrabarFicha.addEventListener('mouseover', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
                });
                btnGrabarFicha.addEventListener('mouseout', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
                });
            }
        });
    </script>

    <script src="vistas/js/recursosHumanos/instituciones.js"></script>