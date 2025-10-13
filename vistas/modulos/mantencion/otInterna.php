<div class="content-wrapper">

    <section class="content-header">
        <h1>Crear Orden de Trabajo (OT)</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Mantenimiento</a></li>
            <li class="active">Crear OT</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <!-- ===================== DATOS OT ===================== -->
            <div class="box-header with-border" style="background:#E1E1E1; color:black;">
                <h4>Datos</h4>
            </div>

            <div class="box-body">
                <div class="form-group col-sm-2">
                    <label>Fecha OT</label>
                    <input type="date" class="form-control input-sm" id="fechaOT" value="2025-10-11">
                </div>

                <div class="form-group col-sm-2">
                    <label>Km actual</label>
                    <input type="number" class="form-control input-sm" id="kmActual" placeholder="0">
                </div>

                <div class="form-group col-sm-3">
                    <label>Máquina</label>
                    <select class="form-control input-sm" id="maquina">
                        <option value="">Seleccione...</option>
                        <option value="EXC-01">EXC-01 / Excavadora</option>
                        <option value="CAM-07">CAM-07 / Camión Volquete</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Centro costo</label>
                    <select class="form-control input-sm" id="centroCosto">
                        <option value="">Seleccione...</option>
                        <option value="CC001">CC001 - Mantenimiento</option>
                        <option value="CC002">CC002 - Producción</option>
                    </select>
                </div>

                <div class="form-group col-sm-2 text-center" style="margin-top:25px;">
                    <button class="btn btn-warning btn-block" disabled><i class="fa fa-bell"></i> 0</button>
                </div>
            </div>

            <!-- ===================== TAREAS ===================== -->
            <div class="box-header with-border" style="background:#E1E1E1; color:black;">
                <h4>Tareas</h4>
            </div>

            <div class="box-body">
                <div class="form-group col-sm-3">
                    <label>Tipo tarea</label>
                    <select class="form-control input-sm" id="tipoTarea">
                        <option value="">Seleccione...</option>
                        <option value="Preventivo">Mantenimiento Preventivo</option>
                        <option value="Correctivo">Mantenimiento Correctivo</option>
                        <option value="Inspección">Inspección Técnica</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Sistema</label>
                    <select class="form-control input-sm" id="sistema">
                        <option value="">Seleccione...</option>
                        <option value="Motor">Motor</option>
                        <option value="Transmisión">Transmisión</option>
                        <option value="Frenos">Frenos</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Sub Sistema</label>
                    <select class="form-control input-sm" id="subSistema">
                        <option value="">Seleccione...</option>
                        <option value="Lubricación">Lubricación</option>
                        <option value="Refrigeración">Refrigeración</option>
                        <option value="Combustión">Combustión</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Fecha hora tarea</label>
                    <input type="datetime-local" class="form-control input-sm" id="fechaHoraTarea" value="2025-10-11T11:00">
                </div>

                <div class="form-group col-sm-6">
                    <label>Observación técnica (máx. 350)</label>
                    <textarea class="form-control input-sm" id="observacion" maxlength="350"></textarea>
                </div>

                <div class="form-group col-sm-3">
                    <label>Personal técnico</label>
                    <select class="form-control input-sm" id="tecnico">
                        <option value="">Seleccione...</option>
                        <option value="Oscar Vega">Oscar Vega</option>
                        <option value="Pedro González">Pedro González</option>
                        <option value="María Duarte">María Duarte</option>
                    </select>
                </div>

                <div class="form-group col-sm-12 text-right">
                    <button class="btn btn-primary" id="btnAgregarTarea"><i class="fa fa-plus"></i> Agregar tarea</button>
                </div>
            </div>

            <!-- ===================== REPUESTOS ===================== -->
            <div class="box-header with-border" style="background:#D9EDF7; color:black;">
                <h4>Repuestos para la nueva tarea</h4>
            </div>

            <div class="box-body">
                <div class="form-group col-sm-4">
                    <label>Repuesto</label>
                    <select class="form-control input-sm" id="repuesto">
                        <option value="">Seleccione...</option>
                        <option value="600510618">600510618 - BOMBA DE AGUA</option>
                        <option value="I002">I002 - GRASA INDUSTRIAL</option>
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    <label>Cantidad</label>
                    <input type="number" class="form-control input-sm" id="cantidadRepuesto" placeholder="0">
                </div>

                <div class="form-group col-sm-2" style="margin-top:25px;">
                    <button class="btn btn-info btn-block" id="btnAgregarRepuesto"><i class="fa fa-plus"></i> Agregar repuesto</button>
                </div>

                <div class="col-sm-12" style="margin-top:10px;">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaRepuestos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>Tipo Producto</center>
                                </th>
                                <th>
                                    <center>ID Producto</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>U.M.</center>
                                </th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>
                                    <center>Eliminar</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" style="text-align:center;">Ningún dato disponible en esta tabla</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ===================== LISTA DE TAREAS ===================== -->
            <div class="box-body" style="margin-top:10px;">
                <table class="table table-bordered table-striped dt-responsive" id="tablaTareas" width="100%">
                    <thead>
                        <tr>
                            <th>
                                <center>Tipo tarea</center>
                            </th>
                            <th>
                                <center>Sistema</center>
                            </th>
                            <th>
                                <center>Sub Sistema</center>
                            </th>
                            <th>
                                <center>Técnico</center>
                            </th>
                            <th>
                                <center>Detalle</center>
                            </th>
                            <th>
                                <center>Total repuestos</center>
                            </th>
                            <th>
                                <center>Eliminar</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align:center;">Ningún dato disponible en esta tabla</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- ===================== BOTÓN FINAL ===================== -->
            <div class="box-footer text-right">
                <button class="btn btn-success btn-lg" id="btnCrearOT"><i class="fa fa-check"></i> Crear OT</button>
            </div>
        </div>

    </section>
</div>

<style>
    #div1 {
        overflow: scroll;
        width: 100%;
    }

    #div1 table {
        width: 100%;
        background-color: #f4f4f4;
    }
</style>

<script src="vistas/js/mantencion/otInterna.js"></script>