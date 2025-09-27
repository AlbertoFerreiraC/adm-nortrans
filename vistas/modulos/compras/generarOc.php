<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Órdenes de Compra
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Administrar Órdenes de Compra</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12 ">
                    <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarOC" id="btnNuevo">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Orden de Compra
                    </button>
                </div>

                <div class="form-group col-sm-9 col-xs-12 ">
                    <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
                </div>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOrdenesCompra" width="100%">
                        <thead>
                            <tr>
                                <th>Nº OC</th>
                                <th>Proveedor</th>
                                <th>Fecha Emisión</th>
                                <th>Monto Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalAgregarOC" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formularioAgregarOC" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00a65a; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nueva Orden de Compra</h4>
                </div>


                <div class="modal-body">
                    <div class="box-body">

                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Encabezado</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="nuevaEmpresa">Empresa:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevaEmpresa" id="nuevaEmpresa"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="nuevoProveedor">Proveedor:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevoProveedor" id="nuevoProveedor"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="nuevotipoOC">Tipo OC:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevotipoOC" id="nuevotipoOC"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nuevotipoDocProv">Tipo documento proveedor:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevotipoDocProv" id="nuevotipoDocProv"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Nº documento proveedor</label>
                                        <input type="text" class="form-control" name="nuevoNumDocProveedor" id="nuevoNumDocProveedor">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Seleccionar archivo</label>
                                        <input type="file" class="form-control" name="nuevoArchivo" id="nuevoArchivo">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nuevoPlazoPago">Plazo pago:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevoPlazoPago" id="nuevoPlazoPago"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="nuevaFormaPago">Forma pago:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevaFormaPago" id="nuevaFormaPago"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Plazo entrega</label>
                                        <select class="form-control" name="nuevoPlazoEntrega" id="nuevoPlazoEntrega">
                                            <option value=" ">Seleccionar...</option>
                                            <option value="7 DIAS">7 DIAS</option>
                                            <option value="INMEDIATA">INMEDIATA</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Tipo documento compra</label>
                                        <select class="form-control" name="nuevoTipoDocCompra" id="nuevoTipoDocCompra">
                                            <option value=" ">Seleccionar...</option>
                                            <option value="Factura Afecta">Factura Afecta</option>
                                            <option value="Factura Excenta">Factura Excenta</option>
                                            <option value="Boleta de Honorario">Boleta de Honorario</option>
                                            <option value="Vale por">Vale por</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="preapruebaAgregar">Pre aprueba:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="preapruebaAgregar" id="preapruebaAgregar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Nº Solicitud MI</label>
                                        <input type="text" class="form-control cajatexto" name="nuevaSolicitudMI" id="nuevaSolicitudMI">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary btn-block" type="button" id="btnAsociarSolicitud">Asociar Solicitud MI</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detalle orden de compra</h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tablaDetalleOC">
                                        <thead>
                                            <tr>
                                                <th>Anular</th>
                                                <th>Nº SMS</th>
                                                <th>Item SMS</th>
                                                <th>Aplicación</th>
                                                <th>Tipo producto</th>
                                                <th>Id producto</th>
                                                <th>Glosa</th>
                                                <th>U.M.</th>
                                                <th>Cantidad</th>
                                                <th>Costo unitario</th>
                                                <th>Tipo de descuento</th>
                                                <th>Valor descuento</th>
                                                <th>Sub total</th>
                                                <th>Selección</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="14" class="text-center">No se encontraron registros.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary" id="btnCalcularTotales">Calcular</button>
                            </div>
                            <div class="col-xs-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Sub total:</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Descuento:</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Exento:</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Neto:</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>IVA:</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Retención:</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>$0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-success" id="btnGenerarOC">
                        <i class="fa fa-check"></i> Generar OC
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalModificarOC" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formularioModificarOC" enctype="multipart/form-data">
                <div class="modal-header" style="background:#f39c12; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Orden de Compra</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <input type="hidden" id="idOCModificar" name="idOCModificar">

                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Encabezado</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-4"><label>Empresa</label><select class="form-control" name="modificarEmpresa" required></select></div>
                                    <div class="form-group col-md-4"><label>Proveedor</label><select class="form-control" name="modificarProveedor" required></select></div>
                                    <div class="form-group col-md-4"><label>Tipo OC</label><select class="form-control" name="modificarTipoOC" required></select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3"><label>Tipo documento proveedor</label><select class="form-control" name="modificarTipoDocProveedor"></select></div>
                                    <div class="form-group col-md-3"><label>Nº documento proveedor</label><input type="text" class="form-control" name="modificarNumDocProveedor"></div>
                                    <div class="form-group col-md-6"><label>Cambiar archivo (opcional)</label><input type="file" class="form-control" name="modificarArchivo"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3"><label>Plazo pago</label><select class="form-control" name="modificarPlazoPago"></select></div>
                                    <div class="form-group col-md-3"><label>Forma pago</label><select class="form-control" name="modificarFormaPago"></select></div>
                                    <div class="form-group col-md-3"><label>Plazo entrega</label><select class="form-control" name="modificarPlazoEntrega"></select></div>
                                    <div class="form-group col-md-3"><label>Tipo documento compra</label><select class="form-control" name="modificarTipoDocCompra"></select></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3"><label>Pre aprueba</label><select class="form-control" name="modificarPreAprueba"></select></div>
                                    <div class="form-group col-md-5">
                                        <label>Nº Solicitud MI</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="modificarSolicitudMI" readonly>
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="btnAsociarSolicitudModificar">Asociar Solicitud MI</button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalVerMasOC" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ver Detalles de Orden de Compra</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Encabezado</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4"><label>Empresa</label><input type="text" class="form-control" id="verEmpresa" readonly></div>
                                <div class="form-group col-md-4"><label>Proveedor</label><input type="text" class="form-control" id="verProveedor" readonly></div>
                                <div class="form-group col-md-4"><label>Tipo OC</label><input type="text" class="form-control" id="verTipoOC" readonly></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3"><label>Tipo documento proveedor</label><input type="text" class="form-control" id="verTipoDocProveedor" readonly></div>
                                <div class="form-group col-md-3"><label>Nº documento proveedor</label><input type="text" class="form-control" id="verNumDocProveedor" readonly></div>
                                <div class="form-group col-md-6"><label>Archivo Adjunto</label>
                                    <p id="verArchivo" class="form-control-static"><a href="#" target="_blank"></a></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3"><label>Plazo pago</label><input type="text" class="form-control" id="verPlazoPago" readonly></div>
                                <div class="form-group col-md-3"><label>Forma pago</label><input type="text" class="form-control" id="verFormaPago" readonly></div>
                                <div class="form-group col-md-3"><label>Plazo entrega</label><input type="text" class="form-control" id="verPlazoEntrega" readonly></div>
                                <div class="form-group col-md-3"><label>Tipo documento compra</label><input type="text" class="form-control" id="verTipoDocCompra" readonly></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3"><label>Pre aprueba</label><input type="text" class="form-control" id="verPreAprueba" readonly></div>
                                <div class="form-group col-md-5"><label>Nº Solicitud MI</label><input type="text" class="form-control" id="verSolicitudMI" readonly></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="vistas/js/compras/generarOC.js"></script>

<style>
    #div1 {
        overflow: auto;
        width: 100%;
    }

    .form-control-static a {
        word-break: break-all;
    }

    /* === Borde naranja para TODOS los campos del modal === */
    #modalAgregarOC .form-control,
    #modalAgregarOC select,
    #modalAgregarOC textarea,
    #modalAgregarOC input[type="file"] {
        border: 2px solid #ff7a00 !important;
        /* naranja */
        border-radius: 4px;
        box-shadow: none;
    }

    /* Enfocado */
    #modalAgregarOC .form-control:focus,
    #modalAgregarOC select:focus,
    #modalAgregarOC textarea:focus,
    #modalAgregarOC input[type="file"]:focus {
        border-color: #ff7a00 !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 122, 0, .2);
    }

    /* Readonly / Disabled con mismo borde */
    #modalAgregarOC .form-control[readonly],
    #modalAgregarOC .form-control:disabled {
        background-color: #f6f6f6;
        border-color: #ff7a00;
        opacity: 1;
    }

    /* Select con caret naranja */
    #modalAgregarOC select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml;utf8,<svg fill='%23ff7a00' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M7 10l5 5 5-5z'/></svg>");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px 16px;
        padding-right: 34px;
        /* espacio para la flecha */
    }

    /* Espaciado compacto */
    #modalAgregarOC .form-group {
        margin-bottom: 12px;
    }

    /* Marco de secciones (opcional, discreto) */
    .box-naranja {
        border: 2px solid #ff7a00;
        border-radius: 6px;
        margin-bottom: 18px;
    }

    .box-naranja .box-header {
        background: #fff;
        border-bottom: 1px solid #e9e9e9;
        padding: 10px 12px;
    }

    .box-naranja .box-title {
        font-weight: 600;
        color: #444;
    }
</style>