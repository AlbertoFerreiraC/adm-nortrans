<div class="content-wrapper">

    <section class="content-header">
        <h1>Traspaso entre bodegas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
            <li class="active">Traspaso entre bodegas</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12">
                    <label>Bodega Origen</label>
                    <input type="text" class="form-control input-sm" id="bodegaOrigen" value="Bodega Industrial" readonly>
                </div>

                <div class="form-group col-sm-1 col-xs-12" style="text-align:center; margin-top:25px;">
                    <i class="fa fa-arrow-right fa-2x"></i>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                    <label>Bodega Destino</label>
                    <select class="form-control input-sm" id="bodegaDestino">
                        <option value="">Seleccione destino</option>
                        <option value="comercial">Bodega Comercial</option>
                        <option value="principal">Bodega Principal</option>
                    </select>
                </div>
            </div>

            <div class="box-body">

                <!-- FILTRO PRODUCTO -->
                <div class="form-group col-sm-3 col-xs-12">
                    <label>Tipo Producto</label>
                    <select class="form-control input-sm" id="tipoProducto">
                        <option value="">Seleccione...</option>
                        <option value="Insumo">Insumo</option>
                        <option value="Repuesto">Repuesto</option>
                    </select>
                </div>

                <div class="form-group col-sm-3 col-xs-12" id="divProducto" style="display:none;">
                    <label id="lblProducto">Producto</label>
                    <select class="form-control input-sm" id="productoSelect">
                        <option value="">Seleccione producto</option>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>Cantidad actual</label>
                    <input type="text" id="cantidadActual" class="form-control input-sm" readonly value="0">
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>Cantidad</label>
                    <input type="number" id="cantidad" class="form-control input-sm" min="1">
                </div>

                <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
                    <button class="btn btn-primary btn-block" id="btnAgregar"><i class="fa fa-plus"></i> Agregar</button>
                </div>

                <!-- TABLA -->
                <div class="col-sm-12" style="margin-top:20px;">
                    <div id="div1">
                        <table class="table table-bordered table-striped dt-responsive" id="tablaTraspaso" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        <center>Tipo producto</center>
                                    </th>
                                    <th>
                                        <center>ID producto</center>
                                    </th>
                                    <th>
                                        <center>Producto</center>
                                    </th>
                                    <th>
                                        <center>Cantidad</center>
                                    </th>
                                    <th>
                                        <center>Costo Unitario</center>
                                    </th>
                                    <th>
                                        <center>Eliminar</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-12 text-right" style="margin-top:20px;">
                    <button class="btn btn-success btn-lg" id="btnGenerarTraspaso"><i class="fa fa-exchange"></i> Generar Traspaso</button>
                </div>

            </div>

        </div>

    </section>
</div>

<!-- MODAL CONFIRMAR TRASPASO -->
<div id="modalConfirmar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formConfirmar" method="post">
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar Traspaso</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <p>¿Está seguro de generar el traspaso de los productos seleccionados?</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btnConfirmarTraspaso"><i class="fa fa-check"></i> Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    #div1 {
        overflow: scroll;
        width: 100%;
    }

    #div1 table {
        width: 100%;
        background-color: #f4f4f4;
    }
</style>

<script src="vistas/js/bodegas/transpasoBodega.js"></script>