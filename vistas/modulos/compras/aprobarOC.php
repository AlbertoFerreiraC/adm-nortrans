<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Plazo de entrega orden de compra</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Administrar Plazo de entrega orden de compra</li>
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
                                    <center>Empresa</center>
                                </th>
                                <th>
                                    <center>N° OC</center>
                                </th>
                                <th>
                                    <center>Fecha creación</center>
                                </th>
                                <th>
                                    <center>Rut proveedor</center>
                                </th>
                                <th>
                                    <center>Proveedor</center>
                                </th>
                                <th>
                                    <center>Monto Neto</center>
                                </th>
                                <th>
                                    <center>Pre Aprobado por</center>
                                </th>
                                <th style="width:120px;">
                                    <center>Seleccionar</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalSeleccionarOC" tabindex="-1" role="dialog" aria-labelledby="modalOCLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modalOCLabel">Detalle Orden de Compra</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal">
                    <input type="hidden" id="ocId">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Empresa</label>
                        <div class="col-sm-9">
                            <input type="text" id="ocEmpresa" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">N° OC</label>
                        <div class="col-sm-9">
                            <input type="text" id="ocNumero" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha creación</label>
                        <div class="col-sm-9">
                            <input type="text" id="ocFecha" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Proveedor</label>
                        <div class="col-sm-9">
                            <input type="text" id="ocProveedor" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Monto</label>
                        <div class="col-sm-9">
                            <input type="text" id="ocMonto" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Comentario</label>
                        <div class="col-sm-9">
                            <textarea id="ocComentario" class="form-control" rows="3" placeholder="Escriba un comentario..."></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnAprobarOC"><i class="fa fa-check"></i> Aprobar</button>
                <button type="button" class="btn btn-danger" id="btnRechazarOC"><i class="fa fa-times"></i> Rechazar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<script src="vistas/js/compras/aprobarOC.js"></script>