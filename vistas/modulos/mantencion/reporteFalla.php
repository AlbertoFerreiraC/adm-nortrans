<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

    <section class="content-header">
        <h1>Administrar Reporte de Falla</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Reporte de Falla</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12">
                    <button class="btn btn-success btn-block" id="nuevoReporte" data-toggle="modal" data-target="#modalAgregarReporte">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Reporte
                    </button>
                </div>


                <div class="form-group col-sm-9 col-xs-12 ">
                    <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
                </div>
            </div>

            <div class="box-body">
                <div id="divTabla">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaReportes" width="100%" style="text-align:center;">
                        <thead>
                            <tr>
                                <th style="width:10px">
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Máquina</center>
                                </th>
                                <th>
                                    <center>Conductor</center>
                                </th>
                                <th>
                                    <center>Kilometraje</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
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
MODAL AGREGAR REPORTE
======================================-->
<div id="modalAgregarReporte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <form role="form" method="post" id="formularioAgregarReporte">

                <!-- CABEZA -->
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nuevo Reporte</h4>
                </div>

                <!-- CUERPO -->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- DATOS GENERALES -->
                        <h4><strong>Datos Generales</strong></h4>
                        <hr>
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="maquinaAgregar">Máquina:</label>
                            <select class="form-control" id="maquinaAgregar" name="maquinaAgregar">
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="conductorAgregar">Conductor:</label>
                            <select class="form-control" id="conductorAgregar" name="conductorAgregar">
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="kmActualAgregar">Km actual:</label>
                            <input type="number" class="form-control" id="kmActualAgregar" name="kmActualAgregar" placeholder="Ingrese Km actual">
                        </div>

                        <!-- INGRESO DE DETALLE -->
                        <div class="col-xs-12">
                            <hr>
                            <h4><strong>Ingreso de Detalle</strong></h4>
                            <hr>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="sistemaAgregar">Sistema:</label>
                            <select class="form-control" id="sistemaAgregar" name="sistemaAgregar">
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="subSistemaAgregar">Sub Sistema:</label>
                            <select class="form-control" id="subSistemaAgregar" name="subSistemaAgregar">
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <label for="observacionAgregar">Observación (máx. 200 caracteres):</label>
                            <textarea class="form-control" id="observacionAgregar" name="observacionAgregar" rows="2" maxlength="200"
                                placeholder="Ingrese observaciones..." required></textarea>
                        </div>

                        <div class="col-xs-12 col-md-12  text-center">
                            <button type="button" class="btn btn-primary btn-block" id="btnAgregarDetalleAgregar">
                                <i class="fa fa-plus"></i> Agregar Detalle
                            </button>
                        </div>

                        <!-- LISTA DE DETALLE -->
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <hr>
                            <h4><strong>Lista de detalle</strong></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tablaDetalleAgergar" style="text-align:center;">
                                    <thead style="background:#f4f4f4;">
                                        <tr>
                                            <th>
                                                <center>Sistema</center>
                                            </th>
                                            <th>
                                                <center>Sub Sistema</center>
                                            </th>
                                            <th>
                                                <center>Observación</center>
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
                </div>

                <!-- PIE -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-success" id="btnAgregarReporte">
                        <i class="fa fa-hdd-o"></i> Grabar Reporte
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="modalModificarReporte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <input type="hidden" id="idModificar">
        <div class="modal-content">
            <form role="form" method="post" id="formularioModificarReporte">

                <!-- CABEZA -->
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Reporte</h4>
                </div>

                <!-- CUERPO -->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- DATOS GENERALES -->
                        <h4><strong>Datos Generales</strong></h4>
                        <hr>
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="maquinaModificar">Máquina:</label>
                            <select class="form-control" id="maquinaModificar" name="maquinaModificar">
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="conductorModificar">Conductor:</label>
                            <select class="form-control" id="conductorModificar" name="conductorModificar">
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="kmActualModificar">Km actual:</label>
                            <input type="number" class="form-control" id="kmActualModificar" name="kmActualModificar">
                        </div>

                        <button type="button" class="btn btn-success pull-right" id="btnModificarReporte">
                            <i class="fa fa-hdd-o"></i> Actualizar Cabecera
                        </button>

                        <!-- INGRESO DE DETALLE -->
                        <div class="col-xs-12">
                            <hr>
                            <h4><strong>Ingreso de Detalle</strong></h4>
                            <hr>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="sistemaModificar">Sistema:</label>
                            <select class="form-control" id="sistemaModificar" name="sistemaModificar">
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="subSistemaModificar">Sub Sistema:</label>
                            <select class="form-control" id="subSistemaModificar" name="subSistemaModificar">
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <label for="observacionModificar">Observación (máx. 200 caracteres):</label>
                            <textarea class="form-control" id="observacionModificar" name="observacionModificar" rows="2" maxlength="200"
                                placeholder="Ingrese observaciones..." required></textarea>
                        </div>

                        <div class="col-xs-12 col-md-12  text-center">
                            <button type="button" class="btn btn-primary btn-block" id="btnAgregarDetalleModificar">
                                <i class="fa fa-plus"></i> Agregar Detalle
                            </button>
                        </div>

                        <!-- LISTA DE DETALLE -->
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <hr>
                            <h4><strong>Lista de detalle</strong></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tablaDetalleModificar" style="text-align:center;">
                                    <thead style="background:#f4f4f4;">
                                        <tr>
                                            <th>
                                                <center>Sistema</center>
                                            </th>
                                            <th>
                                                <center>Sub Sistema</center>
                                            </th>
                                            <th>
                                                <center>Observación</center>
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
                </div>

                <!-- PIE -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                </div>

            </form>
        </div>
    </div>
</div>


<style>
    #divTabla {
        overflow: auto;
        width: 100%;
    }

    #divTabla table {
        width: 100%;
        background-color: #f9f9f9;
    }

    #tablaDetalle th,
    #tablaDetalle td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<script src="vistas/js/mantencion/reporteFalla.js"></script>