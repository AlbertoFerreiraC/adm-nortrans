<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">
    <!-- ENCABEZADO -->
    <section class="content-header">
        <h1>Tareas Asignadas</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Tareas Asignadas</li>
        </ol>
    </section>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="content">
        <div class="box">

            <!-- TABLA -->
            <div class="box-body">
                <div id="divTablaTareasAsignadas">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaTareasAsignadas" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Fecha Asignación</center>
                                </th>
                                <th>
                                    <center>N° OT</center>
                                </th>
                                <th>
                                    <center>Máquina</center>
                                </th>
                                <th>
                                    <center>Centro de Costo</center>
                                </th>
                                <th>
                                    <center>Técnico</center>
                                </th>
                                <th>
                                    <center>Tipo Asignación</center>
                                </th>
                                <th>
                                    <center>Observación</center>
                                </th>
                                <th>
                                    <center>Fecha Finalización</center>
                                </th>
                                <th>
                                    <center>Acción</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10" class="text-center">Cargando datos...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL VER DETALLE
======================================-->
<div id="modalVerDetalleOT" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- ENCABEZADO -->
            <div class="modal-header" style="background:#007B9E; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle de la Orden de Trabajo</h4>
            </div>

            <!-- CUERPO -->
            <div class="modal-body">
                <div class="box-body">

                    <h4><strong>Datos de la Orden</strong></h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-3"><b>N° OT:</b> <span id="verNumOT"></span></div>
                        <div class="col-md-3"><b>Máquina:</b> <span id="verMaquina"></span></div>
                        <div class="col-md-3"><b>Centro Costo:</b> <span id="verCentro"></span></div>
                        <div class="col-md-3"><b>Creado por:</b> <span id="verUsuario"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"><b>Fecha:</b> <span id="verFecha"></span></div>
                        <div class="col-md-3"><b>Km Actual:</b> <span id="verKm"></span></div>
                        <div class="col-md-3"><b>Estado:</b> <span id="verEstado"></span></div>
                        <div class="col-md-3"><b>Tipo Asignación:</b> <span id="verTipo"></span></div>
                    </div>

                    <br>
                    <h4><strong>Lista de Tareas</strong></h4>
                    <hr>

                    <div id="divTablaDetalleTareas">
                        <table class="table table-bordered table-striped dt-responsive" id="tablaDetalleTareas" width="100%">
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
                                    <td colspan="8" class="text-center">Cargando tareas...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- PIE -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-print"></i> Imprimir OT
                </button>
            </div>

        </div>
    </div>
</div>

<!--=====================================
ESTILOS
======================================-->
<style>
    #divTablaTareasAsignadas {
        overflow: auto;
        width: 100%;
    }

    #tablaTareasAsignadas th,
    #tablaTareasAsignadas td,
    #tablaDetalleTareas th,
    #tablaDetalleTareas td {
        text-align: center;
        vertical-align: middle;
    }

    .modal-body span {
        font-weight: 500;
    }

    .modal-header {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    .table>thead>tr>th {
        background-color: #f4f4f4;
    }
</style>

<!-- JS -->
<script src="vistas/js/mantencion/tareasAsignadas.js"></script>