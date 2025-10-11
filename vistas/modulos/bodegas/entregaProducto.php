<div class="content-wrapper">

    <section class="content-header">
        <h1>Entrega de productos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
            <li class="active">Entrega de productos</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">

                <!-- FILTRO -->
                <div class="form-group col-sm-3 col-xs-12">
                    <label for="bodega">Bodega:</label>
                    <select class="form-control input-sm" id="bodega">
                        <option value="industrial">Bodega Industrial</option>
                        <option value="comercial">Bodega Comercial</option>
                    </select>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                    <label for="nroSms">N° SMS:</label>
                    <input type="text" class="form-control input-sm" id="nroSms" placeholder="Ej: 1025">
                </div>

                <div class="form-group col-sm-3 col-xs-12" style="margin-top: 25px;">
                    <button class="btn btn-primary btn-block" id="btnBuscar"><i class="fa fa-search"></i> Buscar</button>
                </div>

            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaProductos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Centro costo</center>
                                </th>
                                <th>
                                    <center>Tipo Aplicación</center>
                                </th>
                                <th>
                                    <center>Aplicación</center>
                                </th>
                                <th>
                                    <center>Tipo producto</center>
                                </th>
                                <th>
                                    <center>Código producto</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>Cant. Solicitada</center>
                                </th>
                                <th>
                                    <center>Cant. Entregada</center>
                                </th>
                                <th>
                                    <center>Stock en bodega</center>
                                </th>
                                <th>
                                    <center>Cant. a entregar</center>
                                </th>
                                <th>
                                    <center>Costo Unitario</center>
                                </th>
                                <th>
                                    <center>Acción</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Datos cargados dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>
</div>

<!-- MODAL ENTREGAR PRODUCTOS -->
<div id="modalEntregar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEntrega" method="post">
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar entrega de productos</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">
                        <input type="hidden" id="idProductoEntrega" name="idProductoEntrega">

                        <div class="form-group">
                            <label>Producto seleccionado:</label>
                            <input type="text" class="form-control" id="productoSeleccionado" readonly>
                        </div>

                        <div class="form-group">
                            <label>¿Quién retira?</label>
                            <select class="form-control" id="quienRetira" required>
                                <option value="">Seleccione...</option>
                                <option value="1">Oscar Vega</option>
                                <option value="2">Pedro González</option>
                                <option value="3">Ana Duarte</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Cantidad a entregar:</label>
                            <input type="number" class="form-control" id="cantidadEntregar" min="1" required>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btnConfirmarEntrega">
                        <i class="fa fa-check"></i> Entregar productos
                    </button>
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

<script src="vistas/js/bodegas/entregaProducto.js"></script>