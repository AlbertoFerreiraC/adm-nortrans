<div class="content-wrapper">
    <section class="content-header" style="background-color: rgb(14, 13, 13); padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Estructura: Mantenedor Area negocio</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelEstructura">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-estructura">
                            <a data-toggle="collapse" href="#panelEstructura_content" class="panel-estructura-link" aria-expanded="true">
                                Estructura
                            </a>
                        </h4>
                    </div>

                    <div id="panelEstructura_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="divisionSelec">Division:</label>
                                    <select class="form-control input-md cajatexto" id="divisionSelec" name="divisionSelec"></select>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="idAreaNegocio">Id Area Negocio</label>
                                    <input class="form-control input-md cajatexto solo-ruc" name="idAreaNegocio" id="idAreaNegocio">
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="tipoArea">Tipo Area:</label>
                                    <select class="form-control input-md cajatexto" id="tipoArea" name="tipoArea"></select>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="descripcion">Descripcion:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                    <textarea class="form-control input-md cajatexto" name="descripcion" id="descripcion" rows="1"></textarea>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="dependenciaArea">Dependencia de Area</label>
                                    <select class="form-control input-md cajatexto" id="dependenciaArea" name="dependenciaArea"></select>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="nivelOrganizacional">Nivel Organizacional:</label>
                                    <input type="number" class="form-control input-md cajatexto" name="nivelOrganizacional" id="nivelOrganizacional">
                                </div>

                                <div class="button-container">
                                    <button type="button" class="btn btn-primary" id="btnGrabarFicha">
                                        <i class="fa fa-save" aria-hidden="true"></i> Grabar Ficha
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -30px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" id="requisitos-tab" data-toggle="tab" href="#requisitos-content" role="tab">
                        Diagrama
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="datos-tab" data-toggle="tab" href="#datos-content" role="tab">
                        Estructura
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade in active" id="requisitos-content" role="tabpanel">
                    <div class="panel-group" id="panelRequisitos">
                        <div class="panel panel-default">
                            <div class="modal-body">

                                <p>Hablar con Daniel</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="datos-content" role="tabpanel">
                    <div class="panel panel-default">
                        <div class="modal-body">
                            <div class="box-body">
                                <div id="listaEstructura">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>Id Area</th>
                                                    <th>Descripcion</th>
                                                    <th>Tipo Area</th>
                                                    <th>Id Independencia Area</th>
                                                    <th>Descripcion Independencia</th>
                                                    <th>Estado</th>
                                                    <th>Editar</th>
                                                </tr>
                                                <tr class="filters">
                                                    <th><input type="text" class="form-control filter-input" placeholder=""></th>
                                                    <th><input type="text" class="form-control filter-input" placeholder=""></th>
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
    </section>
</div>

<style>
    #btnGrabarFicha { margin-top: 22px !important;
    }

    #listaEstructura table { font-size: 10px; border-collapse: separate !important;border-spacing: 0;
    }
    #listaEstructura th { font-size: 13px;
     }
    #listaEstructura td {font-size: 15px;
    }

    .panel-opcion-link:focus,
    .panel-opcion-link:active {
        text-decoration: underline;
    }

    .table-container {margin: 10px;
    }

    .table-responsive {overflow-x: auto;
    }

    .table {margin-bottom: 10;
    }

    .table>thead>tr>th {background-color: #f4f4f4;border-bottom: 2px solid #ddd;border: 1px solid #ddd !important;
    }

    .table-bordered {border: 1px solid #ddd !important;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>td {border: 1px solid #ddd !important;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {background-color: #f9f9f9;
    }

    .filters th {padding: 4px !important; background-color: #f8f9fa !important;
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
    
    .filter-input:focus {outline: none;border-color: #80bdff;box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
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
            btnGrabarFicha.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
            });
            btnGrabarFicha.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
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

        const tbody = document.querySelector('#listaEstructura tbody');
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
