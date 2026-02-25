<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">
    <section class="content-header">
        <h1>Operación: Pre Aprobar SMS</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Operación: Pre Aprobar SMS</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <!-- SIN botón "Nuevo" -->
                <div class="form-group col-sm-12 col-xs-12">
                    <input type="text"
                        style="text-align:center; font-size:17px;"
                        class="form-control input-sm"
                        id="filtradoDinamico"
                        autocomplete="off"
                        placeholder="Filtrado General ...">
                </div>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOC" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <div style="text-align:left;">N° SMS</div>
                                </th>
                                <th>
                                   <div style="text-align:left;">Empresa</div>
                                </th>
                                <th>
                                    <div style="text-align:left;">Fecha</div>
                                </th>
                                <th>
                                    <div style="text-align:left;">Tipo Solicitud</div>
                                </th>
                                <th>
                                    <div style="text-align:left;">Solicitante</div>
                                </th>
                                <th style="width:120px;">
                                    <div style="text-align:left;">Seleccionar</div>                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Selección -->
    <div class="modal fade" id="modalSeleccionar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Detalle SMS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formSeleccionar">
                        <input type="hidden" id="smsId">

                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" id="smsEmpresa" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="text" id="smsFecha" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tipo Solicitud</label>
                            <input type="text" id="smsTipo" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Solicitante</label>
                            <input type="text" id="smsUsuario" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Comentario</label>
                            <textarea id="smsComentario" class="form-control" rows="3"
                                placeholder="Escribí un comentario..." required></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnAprobar">Aprobar</button>
                    <button type="button" class="btn btn-danger" id="btnRechazar">Rechazar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="vistas/js/compras/preAprobarSMS.js"></script>
