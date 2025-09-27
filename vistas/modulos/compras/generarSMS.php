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
                    <table class="table table-bordered table-striped dt-responsive" id="tablaSMS" width="100%">
                        <thead>
                            <tr>
                                <th>Nº SMS</th>
                                <th>Empresa</th>
                                <th>Centro Costo</th>
                                <th>Tipo Solicitud</th>
                                <th>Fecha Emisión</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                        <label for="centroDeCostoAgregar">Centro de Costo:</label>
                                        <select class="form-control input-md" name="centroDeCostoAgregar" id="centroDeCostoAgregar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="tipoSolicitudAgregar">Tipo Solicitud:</label>
                                        <select class="form-control input-md" name="tipoSolicitudAgregar" id="tipoSolicitudAgregar">
                                            <option value="">Selecionar...</option>
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
                                            <option value="Servicio">Servicio</option>
                                            <option value="Insumo">Insumo</option>
                                            <option value="EPP">EPP</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="centroCostoAgrega">Centro Costo</label>
                                        <select class="form-control" name="centroCostoAgrega" id="centroCostoAgrega"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="repuestoAgrega">Repuesto</label>
                                        <select class="form-control" name="repuestoAgrega" id="repuestoAgrega"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cantidadXumAgrega">Cantidad x u.m.</label>
                                        <input type="number" step="0.01" min="0" class="form-control" id="cantidadXumAgrega" name="cantidadXumAgrega">
                                    </div>
                                </div>

                                <!-- Fila 2 -->
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="unidadMedidaAgrega">Unidad medida</label>
                                        <input type="text" class="form-control" id="unidadMedidaAgrega" name="unidadMedidaAgrega">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="stockBodegaAgrega">Cantidad en bodega</label>
                                        <input type="number" class="form-control" id="stockBodegaAgrega" name="stockBodegaAgrega" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cantidadAgrega">Cantidad</label>
                                        <input type="number" step="0.01" min="0" class="form-control" id="cantidadAgrega" name="cantidadAgrega">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="aplicacionAgrega">Aplicación</label>
                                        <input type="text" class="form-control" id="aplicacionAgrega" name="aplicacionAgrega">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-block" id="btnAgregarItemSMS">
                                            <i class="fa fa-plus"></i> Agregar
                                        </button>
                                    </div>
                                </div>

                                <!-- Tabla de ítems -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tablaDetalleSMS">
                                        <thead>
                                            <tr>
                                                <th>Centro Costo</th>
                                                <th>U.M.</th>
                                                <th>Código</th>
                                                <th>Cantidad</th>
                                                <th>Descripción</th>
                                                <th>Aplicación</th>
                                                <th>Observación (max. 200)</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="row-placeholder">
                                                <td colspan="8" class="text-center">Ningún dato disponible en esta tabla</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pie del bloque (como en la captura) -->
                                <div class="row" style="margin-top:10px">
                                    <div class="col-sm-6 col-xs-12">
                                        <label for="preapruebaSMS">¿Quién pre aprueba?</label>
                                        <select class="form-control" id="preapruebaSMS" name="preapruebaSMS"></select>
                                    </div>
                                    <div class="col-sm-6 col-xs-12" style="margin-top:24px">
                                        <button type="submit" class="btn btn-success" id="btnGenerarSMS"><i class="fa fa-check"></i> Generar Solicitud</button>
                                        <button type="button" class="btn btn-primary" id="btnListaSMS">ver lista de Solicitud</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- BOTONES EXTRA -->
                        <div class="row">
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary" id="btnAgregarItemSMS">
                                    <i class="fa fa-plus"></i> Agregar Item
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-success" id="btnGenerarSMS">
                        <i class="fa fa-check"></i> Generar SMS
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ===================== MODAL: VER MÁS SMS ===================== -->
<div id="modalVerMasSMS" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ver Detalles de SMS</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Encabezado</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4"><label>Empresa</label><input type="text" class="form-control" id="verEmpresaSMS" readonly></div>
                                <div class="form-group col-md-4"><label>Centro Costo</label><input type="text" class="form-control" id="verCentroCostoSMS" readonly></div>
                                <div class="form-group col-md-4"><label>Tipo Solicitud</label><input type="text" class="form-control" id="verTipoSolicitudSMS" readonly></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6"><label>Máquina</label><input type="text" class="form-control" id="verMaquinaSMS" readonly></div>
                                <div class="form-group col-md-6"><label>Observación</label><input type="text" class="form-control" id="verObservacionSMS" readonly></div>
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

<script src="vistas/js/compras/generarSMS.js"></script>

<style>
    #divSMS {
        overflow: auto;
        width: 100%;
    }

    /* bordes naranjas iguales */
    #modalAgregarSMS .form-control,
    #modalAgregarSMS select,
    #modalAgregarSMS textarea {
        border: 2px solid #ff7a00 !important;
        border-radius: 4px;
        box-shadow: none;
    }

    #modalAgregarSMS .form-control:focus {
        border-color: #ff7a00 !important;
        box-shadow: 0 0 0 3px rgba(255, 122, 0, .2);
    }

    #modalAgregarSMS .form-control[readonly],
    #modalAgregarSMS .form-control:disabled {
        background-color: #f6f6f6;
        border-color: #ff7a00;
        opacity: 1;
    }

    #modalAgregarSMS select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url("data:image/svg+xml;utf8,<svg fill='%23ff7a00' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M7 10l5 5 5-5z'/></svg>");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px 16px;
        padding-right: 34px;
    }

    #modalAgregarSMS .form-group {
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