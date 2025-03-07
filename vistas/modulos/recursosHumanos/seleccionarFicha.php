<div class="content-wrapper">
    <section class="content-header" style="background-color: rgb(14, 13, 13); padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Seleccionar Ficha Contrato</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelFicha">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-ficha">
                            <a data-toggle="collapse" href="#panelFicha_content" class="panel-ficha-link" aria-expanded="true">
                                Ficha
                            </a>
                        </h4>
                    </div>

                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="numeroFichaSelec">N° de Ficha</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="numeroFichaSelec" id="numeroFichaSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="idSolicitudSelec">Id Solicitud</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="idSolicitudSelec" id="idSolicitudSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="EmpresaSelec">Empresa</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="EmpresaSelec" id="EmpresaSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="divisionSelec">División:</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="divisionSelec" id="divisionSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="CargoSelec">Cargo:</label>
                                <input class="form-control input-md cajatexto" id="CargoSelec" name="CargoSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="tipocontratoSelec">Tipo Contrato:</label>
                                <input class="form-control input-md cajatexto" id="tipocontratoSelec" name="tipocontratoSelec" onchange="mostrarFechaTermino()">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="tipoTurnoSelec">Tipo Turno:</label>
                                <input class="form-control input-md cajatexto" id="tipoTurnoSelec" name="tipoTurnoSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="tipoturnoModificar">Seleccionar Empresa:</label>
                                <select class="form-control input-md cajatexto" id="selecotorEmpresa" name="selecotorEmpresa"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="fechainicioSelec">Fecha Inicio:</label>
                                <input type="date" class="form-control input-md cajatexto" name="fechainicioSelec" id="fechainicioSelec" onchange="calcularFechaTermino()">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="sueldoLiquidoSelec">Sueldo Líquido:</label>
                                <input class="form-control input-md cajatexto" id="sueldoLiquidoSelec" name="sueldoLiquidoSelec">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal-body" style="margin: -25px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-3 col-xs-12 d-flex flex-column align-items-center justify-content-center">
                                <label for="rutAgregar" class="text-center mb-2">Rut</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
                            </div>

                            <div class="form-group col-sm-5 col-xs-12">
                                <button type="button" class="btn btn-primary" id="selecBuscar" style="margin-top: 25px;">
                                    <i class="fa fa-search" aria-hidden="true"></i> Buscar
                                </button>
                            </div>
                            <div class="form-group col-sm-5 col-xs-12">
                                <label for="nomSelec">Nombre</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="nomSelec" id="nomSelec">
                            </div>

                            <div class="form-group col-sm-5 col-xs-12">
                                <label for="telSelec">Teléfono Propio</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="telSelec" id="telSelec">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -25px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelRequisitos">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-requisitos">
                            <a data-toggle="collapse" href="#panelRequisitos_content" class="panel-requisitos-link" aria-expanded="true">
                                Requisitos Solicitados
                            </a>
                        </h4>
                    </div>

                    <div class="modal-body">
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="requiSelec">Requisito de Selección</label>
                                    <select class="form-control input-md cajatexto solo-ruc" name="requiSelec" id="requiSelec"></select>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="comentarioRequisito">Comentario:</label><span></span>
                                    <textarea class="form-control input-md cajatexto" name="comentarioRequisito" id="comentarioRequisito" rows="1"></textarea>
                                </div>

                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="btnSeleccionar">Seleccionar Archivo</label>
                                    <div>
                                        <button type="button" class="btn btn-primary" id="btnSeleccionar">
                                            <i class="fa fa-search" aria-hidden="true"></i> Seleccionar
                                        </button>
                                    </div>
                                </div>

                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table class="table table-bordes" id="tablaRequisitos">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Id Tipo Requisito</th>
                                                    <th>Documento</th>
                                                    <th>Eliminar</th>
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