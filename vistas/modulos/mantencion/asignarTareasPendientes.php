<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">
    <!-- ENCABEZADO -->
    <section class="content-header">
        <h1>Asignar Tareas Pendientes</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Tareas Pendientes</li>
        </ol>
    </section>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="content">
        <div class="box">

            <!-- TABLA DE RESULTADOS -->
            <div class="box-body">
                <div id="divTablaTareasPendientes">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaTareasPendientes" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
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
                                <th>
                                    <center>Acción</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="11" class="text-center">Cargando datos...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL ASIGNAR TAREA
======================================-->
<div id="modalAsignarTarea" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- ENCABEZADO -->
            <div class="modal-header" style="background:#007B9E; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Asignar Tarea</h4>
            </div>

            <!-- CUERPO -->
            <div class="modal-body">
                <div class="box-body">

                    <h4><strong>Datos de la Tarea</strong></h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-3"><b>N° OT:</b> <span id="verNumOT"></span></div>
                        <div class="col-md-3"><b>Máquina:</b> <span id="verMaquina"></span></div>
                        <div class="col-md-3"><b>Centro Costo:</b> <span id="verCentro"></span></div>
                        <div class="col-md-3"><b>Tipo Tarea:</b> <span id="verTipoTarea"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Sistema:</b> <span id="verSistema"></span></div>
                        <div class="col-md-4"><b>Sub Sistema:</b> <span id="verSubSistema"></span></div>
                        <div class="col-md-4"><b>Estado:</b> <span id="verEstado"></span></div>
                    </div>

                    <br>
                    <h4><strong>Asignación</strong></h4>
                    <hr>

                    <div class="form-group">
                        <label for="tipoAsignacion">Seleccione tipo de asignación:</label>
                        <select id="tipoAsignacion" class="form-control">
                            <option value="">-- Seleccione --</option>
                            <option value="detencion_programada">Derivar a Detención Programada</option>
                            <option value="servicio_externo">Derivar a Servicio Externo</option>
                            <option value="asignar_tecnico">Asignar a Personal Técnico</option>
                        </select>
                    </div>

                    <div class="form-group" id="campoTecnico" style="display:none;">
                        <label for="selectTecnico">Seleccione Técnico:</label>
                        <select id="selectTecnico" class="form-control">
                            <option value="">-- Seleccione Técnico --</option>
                            <!-- Se llenará dinámicamente -->
                        </select>
                    </div>

                </div>
            </div>

            <!-- PIE -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnConfirmarAsignacion">
                    <i class="fa fa-check"></i> Confirmar Asignación
                </button>
            </div>

        </div>
    </div>
</div>

<!-- ESTILOS -->
<style>
    #divTablaTareasPendientes {
        overflow: auto;
        width: 100%;
    }

    #tablaTareasPendientes th,
    #tablaTareasPendientes td {
        text-align: center;
        vertical-align: middle;
    }

    .modal-body span {
        font-weight: 500;
    }
</style>

<script src="vistas/js/mantencion/asignarTareasPendientes.js"></script>