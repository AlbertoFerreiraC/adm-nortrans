<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Mantenedor: Parametros Estandar</h1>
    </section>



    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Parametros
                            </a>
                        </h4>
                    </div>

                    <div class="box-body">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="concepto">Concepto:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <select class="form-control input-md cajatexto solo-ruc" name="id_concepto" id="id_concepto">
                                <option value=""></option>
                                <option value="TipoMaquina">Tipo Maquina</option>
                                <option value="TipoDocumentoMaquina">Tipo Documento Maquina</option>
                                <option value="TipoEquipamientoMaquina">Tipo Equipamiento Maquina</option>
                                <option value="TipoPolizaSeguro">Tipo Poliza de seguro </option>
                            </select>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12 d-flex flex-column align-items-center justify-content-center">
                            <label for="idConcepto" class="text-center mb-2">Id Concepto</label>
                            <input class="form-control input-md cajatexto solo-ruc" name="idConcepto" id="idConcepto">
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="Descripcion">Descripcion:</label><span style="font-size: 11px; color: #DC3139; padding-left: 15px;"> (Obligatorio)</span>
                            <textarea class="form-control input-md cajatexto" name="idDescripcion" id="idDescripcion" rows="1"></textarea>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12 d-flex flex-column align-items-center justify-content-center">
                            <label for="Orden" class="text-center mb-2">Orden</label>
                            <input class="form-control input-md cajatexto solo-ruc" name="idOrden" id="idOrden">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="Estado">Estado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <select class="form-control input-md cajatexto solo-ruc" name="IdEstado" id="IdEstado">
                                <option value=""></option>
                                <option value="Activo">Activo</option>
                                <option value="Bloqueo">Bloqueo</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <div class="button-container">
                                <button type="button" class="btn btn-primary" id="btnGrabarFicha">
                                    <i class="fa fa-save" aria-hidden="true"></i> Grabar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Controles de tabla -->
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
                                            <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:120px">
                                                            <center>Id </center>
                                                        </th>
                                                        <th>
                                                            <center>Descrpcion</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado</center>
                                                        </th>
                                                        <th>
                                                            <center>Orden</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado</center>
                                                        </th>
                                                        <th>
                                                            <center>Editar</center>
                                                        </th>
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
    .button-container {
        width: 100%;
        padding: 5px;
        margin-top: 20px;
        font-size: 16px;
    }

    .table-controls {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding: 10px;
    }
    .table-container {
    margin-top: -20px; 
}
    .control-left,
    .control-right {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }

    /* Inputs y selects responsive */
    .control-left select,
    .control-right input {
        padding: 4px 6px;
        font-size: 14px;
        max-width: 400px;
    }

    /* Comportamiento en pantallas pequeñas */
    @media (max-width: 600px) {
        .table-controls {
            flex-direction: column;
            align-items: flex-start;
        }

        .control-left,
        .control-right {
            width: 80%;
            justify-content: space-between;
        }
    }
</style>

<script src="vistas/js/activos/"></script>