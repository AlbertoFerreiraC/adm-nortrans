<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">

    <!-- CABEZOTE -->
    <section class="content-header">
        <h1>
            Administrar SMS
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Administrar SMS</li>
        </ol>
    </section>

    <!-- CONTENIDO -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12 ">
                    <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregarSMS" id="btnNuevoSMS">
                        <i class="fa fa-plus" aria-hidden="true"></i> Generar SMS
                    </button>
                </div>

                <div class="form-group col-sm-9 col-xs-12 ">
                    <input type="text" style=" text-align: center; font-size: 17px;"
                        class="form-control input-sm" name="filtradoSMS" id="filtradoSMS"
                        autocomplete="off" placeholder="Filtrado General ...">
                </div>
            </div>

            <div class="box-body">
                <div id="divSMS">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaSMS" width="100%" style = "text-align: center;">
                        <thead>
                            <tr >
                                <th style = "text-align: center;">Nº SMS</th>
                                <th style = "text-align: center;">Empresa</th>
                                <th style = "text-align: center;">Bodega</th>
                                <th style = "text-align: center;">Tipo Solicitud</th>
                                <th style = "text-align: center;">Pre Aprueba</th>
                                <th style = "text-align: center;">Fecha Emisión</th>
                                <th style = "text-align: center;">Observación</th>
                                <th style = "text-align: center;">Realizado Por</th>
                                <th style = "text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se llenan los registros -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- ===================== MODAL: AGREGAR SMS ===================== -->
<div id="modalAgregarSMS" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formularioAgregarSMS" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00a65a; color:white">
                    <button type="button" class="close" data-dismiss="modal" id="btnNuevo">&times;</button>
                    <h4 class="modal-title">Nuevo SMS</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENCABEZADO -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Encabezado</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="bodegaAgregar">Bodega:</label>
                                        <select class="form-control input-md" name="bodegaAgregar" id="bodegaAgregar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="empresaAgregar">Empresa:</label>
                                        <select class="form-control input-md" name="empresaAgregar" id="empresaAgregar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="tipoSolicitudAgregar">Tipo Solicitud:</label>
                                        <select class="form-control input-md" name="tipoSolicitudAgregar" id="tipoSolicitudAgregar">
                                            <option value="-">Selecionar...</option>
                                            <option value="Stock">Stock</option>
                                            <option value="Servicio">Servicio</option>
                                            <option value="Repuesto">Repuesto</option>
                                            <option value="Insumo">Insumo</option>
                                            <option value="Adquisicion de Vehiculos">Adquisicion de Vehiculos</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="maquinaAgregar">Máquina (opcional):</label>
                                        <select class="form-control" name="maquinaAgregar" id="maquinaAgregar"></select>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="preapruebaSMS">¿Quién pre aprueba?</label>
                                        <select class="form-control" id="preapruebaSMS" name="preapruebaSMS"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="observacionAgregar">Observación inicial (max. 200)</label>
                                        <textarea class="form-control" name="observacionAgregar" id="observacionAgregar" maxlength="200"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DETALLE -->
                        <!-- DETALLE -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detalle</h3>
                            </div>

                            <div class="box-body">
                                <!-- Fila 1 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="tipoProductoAgrega">Tipo Producto</label>
                                        <select class="form-control" name="tipoProductoAgrega" id="tipoProductoAgrega">
                                            <option value="">Seleccionar...</option>
                                            <option value="Repuesto">Repuesto</option>
                                            <option value="Servicios">Servicio</option>
                                            <option value="Insumos">Insumo</option>
                                            <option value="EPP">EPP</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="centroCostoAgregar">Centro Costo</label>
                                        <select class="form-control" name="centroCostoAgregar" id="centroCostoAgregar"></select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="productoAgregar" id="tituloRepuesto">Repuesto</label>
                                        <select class="form-control" name="productoAgregar" id="productoAgregar"></select>
                                    </div>

                                    
                                </div>

                                <!-- Fila 2 -->
                                <div class="row">
                                    <input type="hidden"  id="idProducto" name="idProducto">
                                    <div class="form-group col-md-3">
                                        <label for="cantidadXumAgregar">Cantidad x u.m.</label>
                                        <input type="text"  class="form-control" id="cantidadXumAgregar" name="cantidadXumAgregar" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="unidadMedidaAgregar">Unidad medida</label>
                                        <input type="text" class="form-control" id="unidadMedidaAgregar" name="unidadMedidaAgregar" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="stockBodegaAgregar">Cantidad en bodega</label>
                                        <input type="text" class="form-control" id="stockBodegaAgregar" name="stockBodegaAgregar" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cantidadAgregar">Cantidad</label>
                                        <input type="text" class="form-control solo-numero" id="cantidadAgregar" name="cantidadAgregar">
                                    </div>

                                    <div class="form-group col-md-10">
                                        <label for="aplicacionAgregar">Aplicación</label>
                                        <input type="text" class="form-control" id="aplicacionAgregar" name="aplicacionAgregar">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-block" id="btnAgregarItemSMS">
                                            <i class="fa fa-plus"></i> Agregar Item
                                        </button>
                                    </div>
                                </div>

                                <!-- Tabla de ítems -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tablaDetalleSMS" style = "text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Tipo</th>
                                                <th>Unidad de Medida</th>
                                                <th>Centro de Costo</th>
                                                <th>Cantidad</th>
                                                <th>Aplicación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="button" class="btn btn-success" id="btnGenerarSMS">
                        <i class="fa fa-check"></i> Generar SMS
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="modalModificarSMS" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formularioModificarSMS" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00a65a; color:white">
                    <button type="button" class="close" data-dismiss="modal" id="btnEditar">&times;</button>
                    <h4 class="modal-title">Modificar SMS</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENCABEZADO -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Encabezado</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <input type="hidden"  id="idSmsModificar" name="idSmsModificar">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="bodegaModificar">Bodega:</label>
                                        <select class="form-control input-md" name="bodegaModificar" id="bodegaModificar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="empresaModificar">Empresa:</label>
                                        <select class="form-control input-md" name="empresaModificar" id="empresaModificar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="tipoSolicitudModificar">Tipo Solicitud:</label>
                                        <select class="form-control input-md" name="tipoSolicitudModificar" id="tipoSolicitudModificar">
                                            <option value="Stock">Stock</option>
                                            <option value="Servicio">Servicio</option>
                                            <option value="Repuesto">Repuesto</option>
                                            <option value="Insumo">Insumo</option>
                                            <option value="Adquisicion de Vehiculos">Adquisicion de Vehiculos</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="maquinaModificar">Máquina (opcional):</label>
                                        <select class="form-control" name="maquinaModificar" id="maquinaModificar"></select>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="preapruebaSMSModificar">¿Quién pre aprueba?</label>
                                        <select class="form-control" id="preapruebaSMSModificar" name="preapruebaSMSModificar"></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="observacionModificar">Observación inicial (max. 200)</label>
                                        <textarea class="form-control" name="observacionModificar" id="observacionModificar" maxlength="200"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success" id="btnModificarSMS" style="float: right;">
                                    <i class="fa fa-check"></i> Modificar Cabecera SMS
                                </button>
                            </div>
                            
                        </div>

                        <!-- DETALLE -->
                        <!-- DETALLE -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Detalle</h3>
                            </div>

                            <div class="box-body">
                                <!-- Fila 1 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="tipoProductoModificar">Tipo Producto</label>
                                        <select class="form-control" name="tipoProductoModificar" id="tipoProductoModificar">
                                            <option value="-">Seleccionar...</option>
                                            <option value="Repuesto">Repuesto</option>
                                            <option value="Servicios">Servicio</option>
                                            <option value="Insumos">Insumo</option>
                                            <option value="EPP">EPP</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="centroCostoModificar">Centro Costo</label>
                                        <select class="form-control" name="centroCostoModificar" id="centroCostoModificar"></select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="productoModificar" id="tituloRepuestoModificar">Repuesto</label>
                                        <select class="form-control" name="productoModificar" id="productoModificar"></select>
                                    </div>

                                    
                                </div>

                                <!-- Fila 2 -->
                                <div class="row">
                                    <input type="hidden"  id="idProductoModificar" name="idProductoModificar">
                                    <div class="form-group col-md-3">
                                        <label for="cantidadXumModificar">Cantidad x u.m.</label>
                                        <input type="text"  class="form-control" id="cantidadXumModificar" name="cantidadXumModificar" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="unidadMedidaModificar">Unidad medida</label>
                                        <input type="text" class="form-control" id="unidadMedidaModificar" name="unidadMedidaModificar" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="stockBodegaModificar">Cantidad en bodega</label>
                                        <input type="text" class="form-control" id="stockBodegaModificar" name="stockBodegaModificar" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cantidadModificar">Cantidad</label>
                                        <input type="text" class="form-control solo-numero" id="cantidadModificar" name="cantidadModificar">
                                    </div>

                                    <div class="form-group col-md-10">
                                        <label for="aplicacionModificar">Aplicación</label>
                                        <input type="text" class="form-control" id="aplicacionModificar" name="aplicacionModificar">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-block" id="btnAgregarItemSMSModificar">
                                            <i class="fa fa-plus"></i> Agregar Item
                                        </button>
                                    </div>
                                </div>

                                <!-- Tabla de ítems -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tablaDetalleSMSModificar" style = "text-align: center;">
                                        <thead>
                                            <tr>
                                                <th style = "text-align: center;">Descripción</th>
                                                <th style = "text-align: center;">Tipo</th>
                                                <th style = "text-align: center;">Unidad de Medida</th>
                                                <th style = "text-align: center;">Centro de Costo</th>
                                                <th style = "text-align: center;">Cantidad</th>
                                                <th style = "text-align: center;">Aplicación</th>
                                                <th style = "text-align: center;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>                   
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vistas/js/compras/generarSMS.js"></script>

<style>
    #divSMS {
        overflow: auto;
        width: 100%;
    }

    /* bordes naranjas iguales */
    #modalAgregarSMS .form-control,
    #modalAgregarSMS select,
    #modalAgregarSMS textarea,
    #modalModificarSMS .form-control,
    #modalModificarSMS select,
    #modalModificarSMS textarea {
        border: 2px solid #ff7a00 !important;
        border-radius: 4px;
        box-shadow: none;
    }

    #modalAgregarSMS .form-control:focus,
    #modalModificarSMS .form-control:focus  {
        border-color: #ff7a00 !important;
        box-shadow: 0 0 0 3px rgba(255, 122, 0, .2);
    }

    #modalAgregarSMS .form-control[readonly],
    #modalAgregarSMS .form-control:disabled,
    #modalModificarSMS .form-control[readonly],
    #modalModificarSMS .form-control:disabled  {
        background-color: #f6f6f6;
        border-color: #ff7a00;
        opacity: 1;
    }

    #modalAgregarSMS select.form-control,
    #modalModificarSMS select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml;utf8,<svg fill='%23ff7a00' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M7 10l5 5 5-5z'/></svg>");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px 16px;
        padding-right: 34px;
    }

    #modalAgregarSMS .form-group,
    #modalModificarSMS .form-group  {
        margin-bottom: 12px;
    }

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