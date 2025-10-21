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
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOrdenesCompra" width="100%" style="text-align:center;">
                        <thead>
                            <tr>
                                <th><center>Nº OC</center></th>                                
                                <th><center>Fecha Emisión</center></th>
                                <th><center>Proveedor</center></th>
                                <th><center>Empresa</center></th>
                                <th><center>Tipo OC</center></th>
                                <th><center>Plazo de Entrega</center></th>
                                <th><center>Monto Total</center></th>
                                <th><center>Acciones</center></th>
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
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevotipoOC" id="nuevotipoOC">
                                            <option value="-">Seleccionar</option>
                                            <option value="Solicitud Material y Servicio">Solicitud Material y Servicio</option>
                                            <option value="Repuesto por Tarea">Repuesto por Tarea</option>
                                            <option value="Repuesto para Stock">Repuesto para Stock</option>
                                        </select>
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
                                        <select class="form-control input-md cajatexto" name="preapruebaAgregar" id="preapruebaAgregar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="preaprueba2Agregar">Pre aprueba 2:</label>
                                        <select class="form-control input-md cajatexto" name="preaprueba2Agregar" id="preaprueba2Agregar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>N° Solicitud MS</label>
                                        <select class="form-control input-md cajatexto" name="nroSolicitudSms" id="nroSolicitudSms"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary btn-block" type="button" id="btnAsociarSolicitud"><i class="fa fa-plus-square" aria-hidden="true"></i> Asociar Solicitud MS</button>
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
                                    <table class="table table-bordered" id="tablaDetalleOC" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>Nº SMS</th>
                                                <th>Item SMS</th>
                                                <th>Aplicación</th>
                                                <th>Tipo Producto</th>
                                                <th>Glosa</th>
                                                <th>U.M.</th>
                                                <th>Cantidad</th>
                                                <th>Costo Unitario</th>
                                                <th>Tipo Descuento</th>
                                                <th>Valor Descuento</th>
                                                <th>Sub Total</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Sub total($):</label>
                                <input type="text" class="form-control input-md" id="subTotalAgregar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Descuento($):</label>
                                <input type="text" class="form-control input-md" id="descuentoTotalAgregar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Exento($):</label>
                                <input type="text" class="form-control input-md" id="exentoAgregar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Neto($):</label>
                                <input type="text" class="form-control input-md" id="netoAgregar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>IVA($):</label>
                                <input type="text" class="form-control input-md" id="ivaTotal" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Retención($):</label>
                                <input type="text" class="form-control input-md" id="retencionAgregar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Total($):</label>
                                <input type="text" class="form-control input-md" id="totalGeneralAgregar" value="0" readonly>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="button" class="btn btn-success" id="btnGenerarOC">
                        <i class="fa fa-check"></i> Generar OC
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>


<div id="modalEditarRegistro" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DESCRIPCION DE LA TAREA -->
             <input type="hidden" id="idDetalleRegistroEditar">
            
            <div class="form-group col-md-4">
                <label for="costoUnitarioEditar">Costo Unitario:</label>
                <input type="text" class="form-control input-md solo-numero puntos_de_mil" name="costoUnitarioEditar" id="costoUnitarioEditar">
            </div>

            <div class="form-group col-md-4">
                <label>Tipo Descuento</label>
                <select class="form-control" name="tipoDescuentoEditar" id="tipoDescuentoEditar">
                    <option value="Sin Descuento">Sin Descuento</option>
                    <option value="Monto">Monto</option>
                    <option value="Porcentaje">Porcentaje</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="montoDescuentoEditar">Monto Descuento:</label>
                <input type="text" class="form-control input-md solo-numero puntos_de_mil" name="montoDescuentoEditar" id="montoDescuentoEditar"  disabled>
            </div>

            <div class="form-group col-md-3">
                <label for="cantidadRegistroEditar">Cantidad:</label>
                <input type="text" class="form-control input-md solo-numero" name="cantidadRegistroEditar" id="cantidadRegistroEditar">
            </div>

            <div class="form-group col-md-9">
                <label for="glosaEditar">Aplicación:</label>
                <input type="text" class="form-control input-md" name="glosaEditar" id="glosaEditar">
            </div>

            <div class="form-group col-md-4">
                <label>Estado</label>
                <select class="form-control" name="estadoEditar" id="estadoEditar">
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="EXCLUIDO">EXCLUIDO</option>
                </select>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-info" id="btnEditarTabla"><i class="fa fa-hdd-o" aria-hidden="true"></i> Editar Registro</button>

        </div>

      </form>

    </div>

  </div>

</div>

<div id="modalModificarOC" class="modal fade" role="dialog">
    <input type="hidden" class="form-control" name="idOcModificar" id="idOcModificar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" id="formularioModificarOC" enctype="multipart/form-data">

                <div class="modal-header" style="background:#00a65a; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Orden de Compra</h4>
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
                                        <label for="nuevaEmpresaModificar">Empresa:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevaEmpresaModificar" id="nuevaEmpresaModificar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="nuevoProveedorModificar">Proveedor:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevoProveedorModificar" id="nuevoProveedorModificar"></select>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="nuevotipoOCModificar">Tipo OC:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevotipoOCModificar" id="nuevotipoOCModificar">
                                            <option value="-">Seleccionar</option>
                                            <option value="Solicitud Material y Servicio">Solicitud Material y Servicio</option>
                                            <option value="Repuesto por Tarea">Repuesto por Tarea</option>
                                            <option value="Repuesto para Stock">Repuesto para Stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nuevotipoDocProvModificar">Tipo documento proveedor:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevotipoDocProvModificar" id="nuevotipoDocProvModificar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Nº documento proveedor: </label>
                                        <input type="text" class="form-control" name="nuevoNumDocProveedorModificar" id="nuevoNumDocProveedorModificar">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Seleccionar archivo: </label> <small style="color: red;">(Solo para actualizar archivo existente)</small>
                                        <input type="file" class="form-control" name="nuevoArchivoModificar" id="nuevoArchivoModificar">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nuevoPlazoPagoModificar">Plazo pago:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevoPlazoPagoModificar" id="nuevoPlazoPagoModificar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="nuevaFormaPagoModificar">Forma pago:</label>
                                        <select class="form-control input-md cajatexto solo-ruc" name="nuevaFormaPagoModificar" id="nuevaFormaPagoModificar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Plazo entrega</label>
                                        <select class="form-control" name="nuevoPlazoEntregaModificar" id="nuevoPlazoEntregaModificar">
                                            <option value=" ">Seleccionar...</option>
                                            <option value="7 DIAS">7 DIAS</option>
                                            <option value="INMEDIATA">INMEDIATA</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Tipo documento compra</label>
                                        <select class="form-control" name="nuevoTipoDocCompraModificar" id="nuevoTipoDocCompraModificar">
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
                                        <label for="preapruebaModificar">Pre aprueba:</label>
                                        <select class="form-control input-md cajatexto" name="preapruebaModificar" id="preapruebaModificar"></select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="preaprueba2Modificar">Pre aprueba 2:</label>
                                        <select class="form-control input-md cajatexto" name="preaprueba2Modificar" id="preaprueba2Modificar"></select>
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
                                    <table class="table table-bordered" id="tablaDetalleOCModificar" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>Nº SMS</th>
                                                <th>Item SMS</th>
                                                <th>Aplicación</th>
                                                <th>Tipo Producto</th>
                                                <th>Glosa</th>
                                                <th>U.M.</th>
                                                <th>Cantidad</th>
                                                <th>Costo Unitario</th>
                                                <th>Tipo Descuento</th>
                                                <th>Valor Descuento</th>
                                                <th>Sub Total</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Sub total($):</label>
                                <input type="text" class="form-control input-md" name="subTotalModificar" id="subTotalModificar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Descuento($):</label>
                                <input type="text" class="form-control input-md" name="descuentoTotalModificar" id="descuentoTotalModificar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Exento($):</label>
                                <input type="text" class="form-control input-md" name="exentoModificar" id="exentoModificar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Neto($):</label>
                                <input type="text" class="form-control input-md" name="netoModificar" id="netoModificar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>IVA($):</label>
                                <input type="text" class="form-control input-md" name="ivaTotalModificar" id="ivaTotalModificar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Retención($):</label>
                                <input type="text" class="form-control input-md" name="retencionModificar" id="retencionModificar" value="0" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Total($):</label>
                                <input type="text" class="form-control input-md" name="totalGeneralModificar" id="totalGeneralModificar" value="0" readonly>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="button" class="btn btn-success" id="btnModificarOc" name="btnModificarOc">
                        <i class="fa fa-check"></i> Mofificar OC
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalEditarRegistroModificar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DESCRIPCION DE LA TAREA -->
             <input type="hidden" id="idDetalleRegistroEditarParaModificacion">
            
            <div class="form-group col-md-4">
                <label for="costoUnitarioEditar">Costo Unitario:</label>
                <input type="text" class="form-control input-md solo-numero puntos_de_mil" name="costoUnitarioEditarParaModificacion" id="costoUnitarioEditarParaModificacion">
            </div>

            <div class="form-group col-md-4">
                <label>Tipo Descuento</label>
                <select class="form-control" name="tipoDescuentoEditarParaModificacion" id="tipoDescuentoEditarParaModificacion">
                    <option value="Sin Descuento">Sin Descuento</option>
                    <option value="Monto">Monto</option>
                    <option value="Porcentaje">Porcentaje</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="montoDescuentoEditarParaModificacion">Monto Descuento:</label>
                <input type="text" class="form-control input-md solo-numero puntos_de_mil" name="montoDescuentoEditarParaModificacion" id="montoDescuentoEditarParaModificacion"  disabled>
            </div>

            <div class="form-group col-md-3">
                <label for="cantidadRegistroEditarParaModificacion">Cantidad:</label>
                <input type="text" class="form-control input-md solo-numero" name="cantidadRegistroEditarParaModificacion" id="cantidadRegistroEditarParaModificacion">
            </div>

            <div class="form-group col-md-9">
                <label for="glosaEditarParaModificacion">Aplicación:</label>
                <input type="text" class="form-control input-md" name="glosaEditarParaModificacion" id="glosaEditarParaModificacion">
            </div>

            <div class="form-group col-md-4">
                <label for="glosaEditarParaModificacion">Estado</label>
                <select class="form-control" name="estadoEditarParaModificacion" id="estadoEditarParaModificacion">
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="EXCLUIDO">EXCLUIDO</option>
                </select>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-info" id="btnEditarTablaParaModificacion"><i class="fa fa-hdd-o" aria-hidden="true"></i> Editar Registro</button>

        </div>

      </form>

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

    #modalEditarRegistro .form-control,
    #modalEditarRegistro select,
    #modalEditarRegistro textarea,
    #modalEditarRegistro input[type="file"] {
        border: 2px solid #ff7a00 !important;
        /* naranja */
        border-radius: 4px;
        box-shadow: none;
    }

    #modalModificarOC .form-control,
    #modalModificarOC select,
    #modalModificarOC textarea,
    #modalModificarOC input[type="file"] {
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

    #modalEditarRegistro .form-control:focus,
    #modalEditarRegistro select:focus,
    #modalEditarRegistro textarea:focus,
    #modalEditarRegistro input[type="file"]:focus {
        border-color: #ff7a00 !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 122, 0, .2);
    }

    #modalModificarOC .form-control:focus,
    #modalModificarOC select:focus,
    #modalModificarOC textarea:focus,
    #modalModificarOC input[type="file"]:focus {
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

    #modalEditarRegistro .form-control[readonly],
    #modalEditarRegistro .form-control:disabled {
        background-color: #f6f6f6;
        border-color: #ff7a00;
        opacity: 1;
    }

    #modalModificarOC .form-control[readonly],
    #modalModificarOC .form-control:disabled {
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

    #modalEditarRegistro select.form-control {
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

    #modalModificarOC select.form-control {
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

    #modalEditarRegistro .form-group {
        margin-bottom: 12px;
    }

    #modalModificarOC .form-group {
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