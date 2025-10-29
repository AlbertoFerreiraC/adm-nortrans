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

            <!-- CABECERA -->
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Órdenes Asignadas</h3>
            </div>

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
                                    <center>Fecha OT</center>
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
                                    <center>Tipo OT</center>
                                </th>
                                <th>
                                    <center>Técnico Asignado</center>
                                </th>
                                <th>
                                    <center>Estado</center>
                                </th>
                                <th>
                                    <center>Acción</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" class="text-center">Cargando datos...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL VER DETALLE DE ASIGNACIÓN
======================================-->
<div id="modalVerAsignacion" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- CABECERA -->
            <div class="modal-header" style="background:#007B9E; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle y Finalización de Tarea</h4>
            </div>

            <!-- CUERPO -->
            <div class="modal-body">
                <div class="box-body">

                    <!-- DATOS CABECERA -->
                    <h4><strong>Datos Generales de la OT</strong></h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-3"><b>N° OT:</b> <span id="verNumOT"></span></div>
                        <div class="col-md-3"><b>Máquina:</b> <span id="verMaquina"></span></div>
                        <div class="col-md-3"><b>Centro de Costo:</b> <span id="verCentro"></span></div>
                        <div class="col-md-3"><b>Fecha:</b> <span id="verFechaOT"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"><b>Km Actual:</b> <span id="verKm"></span></div>
                        <div class="col-md-3"><b>Tipo OT:</b> <span id="verTipo"></span></div>
                        <div class="col-md-3"><b>Estado:</b> <span id="verEstado"></span></div>
                        <div class="col-md-3"><b>Técnico:</b> <span id="verTecnico"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Fecha Asignación:</b> <span id="verFechaAsignacion"></span></div>
                        <div class="col-md-4"><b>Fecha Finalización:</b> <span id="verFechaFinalizacion"></span></div>
                        <div class="col-md-4"><b>Observación:</b> <span id="verObsAsignacion"></span></div>
                    </div>

                    <!-- TABLA DETALLE -->
                    <br>
                    <h4><strong>Detalle de Tareas</strong></h4>
                    <hr>

                    <div id="divTablaDetalleOT">
                        <table class="table table-bordered table-striped" id="tablaDetalleOT">
                            <thead>
                                <tr>
                                    <th>
                                        <center>#</center>
                                    </th>
                                    <th>
                                        <center>Fecha</center>
                                    </th>
                                    <th>
                                        <center>Tipo de Tarea</center>
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
                                    <td colspan="7" class="text-center">Sin tareas registradas</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- SECCIÓN DE FINALIZACIÓN -->
                    <div class="finalizacion-section">
                        <h4><strong>Finalización de Tarea</strong></h4>
                        <hr>

                        <div class="form-group">
                            <label for="observacionFinal">Observación final:</label>
                            <textarea id="observacionFinal" class="form-control" rows="3"
                                placeholder="Ingrese observaciones al finalizar la tarea..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Fecha de finalización (sistema):</label>
                            <input type="text" id="fechaFinalSistema" class="form-control" readonly>
                        </div>
                    </div>

                </div>
            </div>

            <!-- PIE -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnFinalizarTarea">
                    <i class="fa fa-check"></i> Finalizar Tarea
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
    #tablaTareasAsignadas td {
        text-align: center;
        vertical-align: middle;
        font-size: 13px;
    }

    .modal-body span {
        font-weight: 500;
        color: #333;
    }

    .modal-header h4 {
        font-weight: bold;
    }

    #tablaDetalleOT th,
    #tablaDetalleOT td {
        text-align: center;
        vertical-align: middle;
        font-size: 12.5px;
    }

    /* 🔹 Estilo para la sección de finalización */
    .finalizacion-section {
        margin-top: 25px;
        background: #f5f5f5;
        border: 1px solid #ddd;
        border-left: 5px solid #28a745;
        padding: 15px 20px;
        border-radius: 6px;
    }

    .finalizacion-section h4 {
        color: #28a745;
        font-weight: bold;
    }

    textarea {
        resize: none;
    }

    .btn-success i {
        margin-right: 5px;
    }
</style>

<!--=====================================
SCRIPTS
======================================-->
<script src="vistas/js/mantencion/terminarTarea.js"></script>