<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Gestionar Mis Rendiciones

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Contabilidad/Gestión</a></li>

            <li class="active">Gestionar Mis Rendiciones</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <div class="form-group col-sm-3 col-xs-12 ">
                    <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nueva Rendición
                    </button>
                </div>

                <div class="form-group col-sm-9 col-xs-12 ">
                    <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
                </div>


            </div>

            <div class="box-body">

                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Nro. Rendición</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
                                </th>
                                <th>
                                    <center>Saldo Inicial</center>
                                </th>
                                <th>
                                    <center>Monto Rendido</center>
                                </th>
                                <th>
                                    <center>Saldo</center>
                                </th>
                                <th>
                                    <center>Dependencia</center>
                                </th>
                                <th>
                                    <center>Comentario</center>
                                </th>
                                <th>
                                    <center>Estado</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
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

<!--=====================================
MODAL AGREGAR TAREA
======================================-->

<div id="modalAgregar" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" id="formulario_para_agregar">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Nueva Rendición</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="fechaAgregar">Fecha:</label>
                            <input type="text" class="form-control input-md cajatexto" name="fechaAgregar" id="fechaAgregar" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="usuarioAgregar">Usuario:</label>
                            <input type="text" class="form-control input-md cajatexto" name="usuarioAgregar" id="usuarioAgregar" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="dependenciaAgregar">Dependencia:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <select class="form-control input-md cajatexto" name="dependenciaAgregar" id="dependenciaAgregar"></select>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoInicialAgregar">Saldo Incial:</label>
                            <input type="text" class="form-control input-md cajatexto solo-numero puntos_de_mil" name="saldoInicialAgregar" id="saldoInicialAgregar" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="montoRendidoAgregar">Monto Rendido</label>
                            <input type="text" class="form-control input-md cajatexto" name="montoRendidoAgregar" id="montoRendidoAgregar" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoAgregar">Saldo:</label>
                            <input style="font-weight: bold" type="text" class="form-control input-md cajatexto" name="apellidosaldoAgregarAgregar" id="saldoAgregar" readonly>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioAgregar">Comentario Adicional:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioAgregar" id="comentarioAgregar" rows="2"></textarea>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="documentoRendicionAgregar">Adjunto:</label><span style="font-size: 11px; color: #DC3139;"> (Admitido: jpeg, png, txt, xls, xlsx, csv, pdf, doc, docx)</span>
                            <input type="file" class="form-control input-md cajatexto" name="documentoRendicionAgregar" id="documentoRendicionAgregar" accept="*" data-show-upload="false" data-show-caption="false">
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <div class="box box-warning" style="background-color: #F8F8FF;">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Carga de Registros</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="fechaRegistroAgregar">Fecha:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="date" class="form-control input-md cajatexto" name="fechaRegistroAgregar" id="fechaRegistroAgregar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="tipoAgregar">Tipo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <select class="form-control input-md cajatexto" name="tipoAgregar" id="tipoAgregar">
                                            <option value="-">Seleccionar...</option>
                                            <option value="Tipo 1">Tipo 1</option>
                                            <option value="Tipo 2">Tipo 2</option>
                                            <option value="Tipo 3">Tipo 3</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="nroDocumentoAgregar">Nro. Documento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="text" class="form-control input-md cajatexto" name="nroDocumentoAgregar" id="nroDocumentoAgregar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="montoRegistroAgregar">Monto:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="text" class="form-control input-md cajatexto solo-numero puntos_de_mil" name="montoRegistroAgregar" id="montoRegistroAgregar">
                                    </div>

                                    <div class="form-group col-md-8 col-xs-12">
                                        <label for="detalleRegistroAgregar">Detalle:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="text" class="form-control input-md cajatexto" name="detalleRegistroAgregar" id="detalleRegistroAgregar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="maquinaRegistroAgregar">Máquina:</label>
                                        <input type="text" class="form-control input-md cajatexto" name="maquinaRegistroAgregar" id="maquinaRegistroAgregar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="centroRegistroAgregar">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <select class="form-control input-md cajatexto" name="centroRegistroAgregar" id="centroRegistroAgregar"></select>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="proveedorRegistroAgregar">Proveedor:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <select class="form-control input-md cajatexto" name="proveedorRegistroAgregar" id="proveedorRegistroAgregar"></select>
                                    </div>

                                    <div class="form-group col-md-12 col-xs-12">
                                        <button class="btn btn btn-block btn-info btn-block" id="btnAgregarItem" type="button">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Item
                                        </button>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div> <!-- /Inspeccion -->





                    </div>

                    <div class="form-group col-md-12 col-xs-12" id="div2">
                        <table class="table table-bordered table-striped dt-responsive" id="tablaRendicionAgregar" width="100%" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>
                                        <center>Fecha</center>
                                    </th>
                                    <th>
                                        <center>Tipo</center>
                                    </th>
                                    <th>
                                        <center>Nro. Documento</center>
                                    </th>
                                    <th>
                                        <center>Monto</center>
                                    </th>
                                    <th>
                                        <center>Detalle</center>
                                    </th>
                                    <th>
                                        <center>Destino/Máquina</center>
                                    </th>
                                    <th>
                                        <center>Centro de Costo</center>
                                    </th>
                                    <th>
                                        <center>Proveedor</center>
                                    </th>
                                    <th>
                                        <center>Acciones</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Procesar Rendición</button>

                </div>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalModificar" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Actualizar Rendición</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">
                    <input type="hidden" name="idModificar" id="idModificar">

                    <div class="box-body">
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="fechaModificar">Fecha:</label>
                            <input type="text" class="form-control input-md cajatexto" name="fechaModificar" id="fechaModificar" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="usuarioModificar">Usuario:</label>
                            <input type="text" class="form-control input-md cajatexto" name="usuarioModificar" id="usuarioModificar" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="dependenciaModificar">Dependencia:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <select class="form-control input-md cajatexto" name="dependenciaModificar" id="dependenciaModificar" readonly></select>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoInicialModificar">Saldo Incial:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <input type="text" class="form-control input-md cajatexto solo-numero puntos_de_mil" name="saldoInicialModificar" id="saldoInicialModificar" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="montoRendidoModificar">Monto Rendido</label>
                            <input type="text" class="form-control input-md cajatexto" name="montoRendidoModificar" id="montoRendidoModificar" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoModificar">Saldo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="saldoModificar" id="saldoModificar" readonly>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioModificar">Comentario Adicional:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioModificar" id="comentarioModificar" rows="2" readonly></textarea>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioRevisionModificar">Comentario Por Revisión:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioRevisionModificar" id="comentarioRevisionModificar" rows="2" readonly></textarea>
                        </div>

                        <div class="form-group col-sm-6 col-xs-12">
                            <a title="Descargar" type="button" id="descargarDocumentoModificar" class="btn btn-success btn-block" target="_blank" href=""><i class="fa fa-download"></i> Descargar Adjunto</a>
                        </div>

                        <div class="form-group col-sm-6 col-xs-12">
                            <a title="Descargar" type="button" id="descargarRendicionModificar" class="btn btn-info btn-block" target="_blank" href=""><i class="fa fa-download"></i> Descargar Rendición</a>
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <div class="box box-success" style="background-color: #F8F8FF;">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Carga de Registros</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="fechaRegistroModificar">Fecha:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="date" class="form-control input-md cajatexto" name="fechaRegistroModificar" id="fechaRegistroModificar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="tipoModificar">Tipo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <select class="form-control input-md cajatexto" name="tipoModificar" id="tipoModificar">
                                            <option value="-">Seleccionar...</option>
                                            <option value="Tipo 1">Tipo 1</option>
                                            <option value="Tipo 2">Tipo 2</option>
                                            <option value="Tipo 3">Tipo 3</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="nroDocumentoModificar">Nro. Documento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="text" class="form-control input-md cajatexto" name="nroDocumentoModificar" id="nroDocumentoModificar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="montoRegistroModificar">Monto:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="text" class="form-control input-md cajatexto solo-numero puntos_de_mil" name="montoRegistroModificar" id="montoRegistroModificar">
                                    </div>

                                    <div class="form-group col-md-8 col-xs-12">
                                        <label for="detalleRegistroModificar">Detalle:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <input type="text" class="form-control input-md cajatexto" name="detalleRegistroModificar" id="detalleRegistroModificar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="maquinaRegistroModificar">Máquina:</label>
                                        <input type="text" class="form-control input-md cajatexto" name="maquinaRegistroModificar" id="maquinaRegistroModificar">
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="centroRegistroModificar">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <select class="form-control input-md cajatexto" name="centroRegistroModificar" id="centroRegistroModificar"></select>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="proveedorRegistroModificar">Proveedor:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <select class="form-control input-md cajatexto" name="proveedorRegistroModificar" id="proveedorRegistroModificar"></select>
                                    </div>

                                    <div class="form-group col-md-12 col-xs-12">
                                        <button class="btn btn btn-block btn-info btn-block" id="btnAgregarItemMOdificar" type="button">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Item
                                        </button>
                                    </div>



                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div> <!-- /Inspeccion -->

                        <div class="form-group col-md-12 col-xs-12" id="div3">
                            <table class="table table-bordered table-striped dt-responsive" id="tablaRendicionModificar" width="100%" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Fecha</center>
                                        </th>
                                        <th>
                                            <center>Tipo</center>
                                        </th>
                                        <th>
                                            <center>Nro. Documento</center>
                                        </th>
                                        <th>
                                            <center>Monto</center>
                                        </th>
                                        <th>
                                            <center>Detalle</center>
                                        </th>
                                        <th>
                                            <center>Destino/Máquina</center>
                                        </th>
                                        <th>
                                            <center>Centro de Costo</center>
                                        </th>
                                        <th>
                                            <center>Proveedor</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                </div>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalVerMas" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Visuallizar Rendición</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="fechaVer">Fecha:</label>
                            <input type="text" class="form-control input-md cajatexto" name="fechaVer" id="fechaVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="usuarioVer">Usuario:</label>
                            <input type="text" class="form-control input-md cajatexto" name="usuarioVer" id="usuarioVer" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="dependenciaVer">Dependencia:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <input type="text" class="form-control input-md cajatexto" name="dependenciaVer" id="dependenciaVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoInicialVer">Saldo Incial:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <input type="text" class="form-control input-md cajatexto solo-numero puntos_de_mil" name="saldoInicialVer" id="saldoInicialVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="montoRendidoVer">Monto Rendido</label>
                            <input type="text" class="form-control input-md cajatexto" name="montoRendidoVer" id="montoRendidoVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoVer">Saldo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="saldoVer" id="saldoVer" readonly>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioVer">Comentario Adicional:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioVer" id="comentarioVer" rows="2" readonly></textarea>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioRevisionVer">Comentario Por Revisión:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioRevisionVer" id="comentarioRevisionVer" rows="2" readonly></textarea>
                        </div>

                        <div class="form-group col-sm-6 col-xs-12">
                            <a title="Descargar" type="button" id="descargarDocumentoVer" class="btn btn-success btn-block" target="_blank" href=""><i class="fa fa-download"></i> Descargar Adjunto</a>
                        </div>

                        <div class="form-group col-sm-6 col-xs-12">
                            <a title="Descargar" type="button" id="descargarRendicionVer" class="btn btn-info btn-block" target="_blank" href=""><i class="fa fa-download"></i> Descargar Rendición</a>
                        </div>

                        <div class="form-group col-md-12 col-xs-12" id="div3">
                            <table class="table table-bordered table-striped dt-responsive" id="tablaRendicionVer" width="100%" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Fecha</center>
                                        </th>
                                        <th>
                                            <center>Tipo</center>
                                        </th>
                                        <th>
                                            <center>Nro. Documento</center>
                                        </th>
                                        <th>
                                            <center>Monto</center>
                                        </th>
                                        <th>
                                            <center>Detalle</center>
                                        </th>
                                        <th>
                                            <center>Destino/Máquina</center>
                                        </th>
                                        <th>
                                            <center>Centro de Costo</center>
                                        </th>
                                        <th>
                                            <center>Proveedor</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <div class="form-group col-md-4 col-xs-12">
                        <input type="text" class="form-control input-md cajatexto" style="text-align: center; font-weight: bold; font-size: 16px;" name="estadoVer" id="estadoVer" readonly>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>



<script src="vistas/js/contabilidad/rendicion.js"></script>


<style>
    #div1 table {
        width: 100%;
        background-color: lightgray;
        overflow: scroll;
    }

    #div2,
    #div3 {
        width: 100%;
        overflow: scroll;
    }

    table {
        text-align: center;
    }
</style>