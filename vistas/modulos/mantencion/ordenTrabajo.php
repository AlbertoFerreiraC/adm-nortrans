<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">
    <!-- ENCABEZADO -->
    <section class="content-header">
        <h1>Consulta de Orden de Trabajo</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Consulta OT</li>
        </ol>
    </section>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="content">
        <div class="box">

            <!-- BUSCADOR -->
            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12">
                    <input type="text" id="nroOT" class="form-control input-sm" placeholder="Ingrese N° OT">
                </div>

                <div class="form-group col-sm-2 col-xs-12">
                    <button class="btn btn-primary btn-block" id="btnBuscarOT">
                        <i class="fa fa-search"></i> Buscar
                    </button>
                </div>

                <div class="form-group col-sm-7 col-xs-12">
                    <input type="text" id="filtradoDinamico" class="form-control input-sm"
                        style="text-align:center; font-size:17px;" placeholder="Filtrado general...">
                </div>
            </div>

            <!-- TABLA DE RESULTADOS -->
            <div class="box-body">
                <div id="divTabla">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOT" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
                                </th>
                                <th>
                                    <center>Máquina</center>
                                </th>
                                <th>
                                    <center>Centro de Costo</center>
                                </th>
                                <th>
                                    <center>Km Actual</center>
                                </th>
                                <th>
                                    <center>Estado</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center">Ningún registro disponible</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL VER ORDEN DE TRABAJO
======================================-->
<div id="modalVerOT" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- ENCABEZADO -->
            <div class="modal-header" style="background:#007B9E; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle de la Orden de Trabajo</h4>
            </div>

            <!-- CUERPO DEL MODAL -->
            <div class="modal-body">
                <div class="box-body">

                    <h4><strong>Datos de la Orden</strong></h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-3"><b>N° OT:</b> <span id="verNumOT"></span></div>
                        <div class="col-md-3"><b>Fecha:</b> <span id="verFechaOT"></span></div>
                        <div class="col-md-3"><b>Estado:</b> <span id="verEstado"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"><b>Máquina:</b> <span id="verMaquina"></span></div>
                        <div class="col-md-3"><b>Centro de Costo:</b> <span id="verCentro"></span></div>
                        <div class="col-md-3"><b>Km Actual:</b> <span id="verKm"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"><b>Creado por:</b> <span id="verUsuario"></span></div>
                        <div class="col-md-6"><b>Tipo OT:</b> <span id="verTipoOT">Interna</span></div>
                    </div>

                    <br>
                    <h4><strong>Lista de Tareas</strong></h4>
                    <hr>

                    <table class="table table-bordered table-striped" id="tablaTareasOT">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
                                </th>
                                <th>
                                    <center>Técnico</center>
                                </th>
                                <th>
                                    <center>Tipo Tarea</center>
                                </th>
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
                                    <center>Estado</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">Ningún dato disponible</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- PIE -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnImprimirOT">
                    <i class="fa fa-print"></i> Imprimir OT
                </button>
            </div>

        </div>
    </div>
</div>

<!-- ESTILOS -->
<style>
    #divTabla {
        overflow: auto;
        width: 100%;
    }

    #tablaOT th,
    #tablaOT td,
    #tablaTareasOT th,
    #tablaTareasOT td {
        text-align: center;
        vertical-align: middle;
    }

    .modal-body span {
        font-weight: 500;
    }
</style>

<script src="vistas/js/mantencion/ordenTrabajo.js"></script>