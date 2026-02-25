<div class="content-wrapper">

    <section class="content-header">
        <h1>Recepción de productos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Recepción de productos</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <!-- ===================== DATOS DE RECEPCIÓN ===================== -->
            <div class="box-header with-border" style="background:#2C68A5; color:white;">
                <h4>Datos de recepción</h4>
            </div>

            <div class="box-body">
                <div class="form-group col-sm-3 col-xs-12">
                    <label>Bodega</label>
                    <input type="text" class="form-control input-sm" id="bodega" value="Bodega industrial" readonly>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                    <label>Empresa</label>
                    <select class="form-control input-sm" id="empresa">
                        <option value="">Seleccione</option>
                        <option value="NORTRANS SPA">NORTRANS SPA</option>
                        <option value="LOGISTICA PY">LOGÍSTICA PY</option>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>N° OC</label>
                    <input type="text" id="nroOC" class="form-control input-sm" placeholder="Ej: 2025-001">
                </div>

                <div class="form-group col-sm-1 col-xs-12" style="margin-top:25px;">
                    <button class="btn btn-primary btn-block" id="btnBuscarOC"><i class="fa fa-search"></i></button>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                    <label>RUT proveedor</label>
                    <input type="text" id="rutProveedor" class="form-control input-sm" readonly>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label>Nombre proveedor</label>
                    <input type="text" id="nombreProveedor" class="form-control input-sm" readonly>
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>Fecha compra</label>
                    <input type="text" id="fechaCompra" class="form-control input-sm" readonly>
                </div>
            </div>

            <!-- ===================== DOCUMENTO CONTABLE ===================== -->
            <div class="box-header with-border" style="background:#2C8AA5; color:white;">
                <h4>Documento Contable del proveedor</h4>
            </div>

            <div class="box-body">
                <div class="form-group col-sm-3 col-xs-12">
                    <label>Tipo Documento</label>
                    <select class="form-control input-sm" id="tipoDocumento">
                        <option value="">Seleccione</option>
                        <option value="afecta">Factura Afecta</option>
                        <option value="excenta">Factura Excenta</option>
                        <option value="Boleta">Boleta de honorario</option>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>N° Doc. Proveedor</label>
                    <input type="text" id="nroDocumento" class="form-control input-sm">
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>Fecha Documento</label>
                    <input type="date" id="fechaDocumento" class="form-control input-sm" value="2025-10-11">
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>Monto neto (exento)</label>
                    <input type="number" id="montoNeto" class="form-control input-sm" placeholder="$">
                </div>

                <div class="form-group col-sm-1 col-xs-12">
                    <label>¿Cumple plazo?</label>
                    <select class="form-control input-sm" id="cumplePlazo">
                        <option>No</option>
                        <option>Sí</option>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <label>¿Cumple especificaciones?</label>
                    <select class="form-control input-sm" id="cumpleEspecificaciones">
                        <option>No</option>
                        <option>Sí</option>
                    </select>
                </div>
            </div>

            <!-- ===================== INGRESO DE PRODUCTOS ===================== -->
            <div class="box-header with-border" style="background:#A56E2C; color:white;">
                <h4>Ingreso de producto</h4>
            </div>

            <div class="box-body">

                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaProductos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>Tipo Producto</center>
                                </th>
                                <th>
                                    <center>ID Producto</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>Costo Unitario</center>
                                </th>
                                <th>
                                    <center>Cantidad a recepcionar</center>
                                </th>
                                <th>
                                    <center>Sub Costo total</center>
                                </th>
                                <th>
                                    <center>Eliminar</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" style="text-align:center;">Ningún dato disponible en esta tabla</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-3" style="margin-top:10px;">
                    <button class="btn btn-primary btn-block" id="btnAgregar"><i class="fa fa-plus"></i> Agregar producto</button>
                </div>

                <div class="col-sm-3" style="margin-top:10px;">
                    <button class="btn btn-info btn-block" id="btnCalcular"><i class="fa fa-calculator"></i> Calcular</button>
                </div>

                <div class="col-sm-4 col-sm-offset-2" style="margin-top:10px;">
                    <table class="table table-bordered">
                        <tr>
                            <td>Sub total</td>
                            <td id="subTotal" align="right">$ 0</td>
                        </tr>
                        <tr>
                            <td>Exento</td>
                            <td id="exento" align="right">$ 0</td>
                        </tr>
                        <tr>
                            <td>Neto</td>
                            <td id="neto" align="right">$ 0</td>
                        </tr>
                        <tr>
                            <td>IVA</td>
                            <td id="iva" align="right">$ 0</td>
                        </tr>
                        <tr>
                            <td>Retención</td>
                            <td id="retencion" align="right">$ 0</td>
                        </tr>
                        <tr>
                            <td><b>Total</b></td>
                            <td id="total" align="right"><b>$ 0</b></td>
                        </tr>
                    </table>
                </div>

                <!-- Botón final -->
                <div class="col-sm-12 text-center" style="margin-top:20px;">
                    <button class="btn btn-success btn-lg" id="btnGrabar"><i class="fa fa-save"></i> Grabar Recepción</button>
                </div>

            </div>

        </div>

    </section>
</div>

<!-- MODAL CONFIRMAR GRABAR -->
<div id="modalConfirmar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formConfirmar" method="post">
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar grabación</h4>
                </div>

                <div class="modal-body">
                    <p>¿Desea confirmar la recepción de productos ingresados?</p>
                    <p class="text-danger">Una vez grabado, no podrá modificarse el documento.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="btnConfirmarGrabado"><i class="fa fa-check"></i> Confirmar</button>
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

<script src="vistas/js/bodegas/recepcionOT.js"></script>