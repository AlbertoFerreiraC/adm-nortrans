<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">
    <section class="content-header">
        <h1>Aprobar detalle SMS de servicio</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Aprobar detalle SMS de servicio</li>
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
                                    <center>N° SMS</center>
                                </th>
                                <th>
                                    <center>Item SMS</center>
                                </th>
                                <th>
                                    <center>Aplicación</center>
                                </th>
                                <th>
                                    <center>Tipo Producto</center>
                                </th>
                                <th>
                                    <center>Id Producto</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>U.M</center>
                                </th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>
                                    <center>Solicitante</center>
                                </th>
                                <th>
                                    <center>Centro de Costo</center>
                                </th>
                                <th>
                                    <center>Estado Item</center>
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
                            <label>Producto</label>
                            <input type="text" id="smsProducto" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="text" id="smsCantidad" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Solicitante</label>
                            <input type="text" id="smsUsuario" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Centro de Costo</label>
                            <input type="text" id="smsCentroCosto" class="form-control" readonly>
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

<script src="vistas/js/compras/aprobarSMS.js"></script>