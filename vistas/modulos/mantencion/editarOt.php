<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

    <section class="content-header">
        <h1>Editar Orden de Trabajo (OT)</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Mantenimiento</a></li>
            <li class="active">Editar OT</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <!-- ===================== DATOS OT ===================== -->
            <div class="box-header with-border" style="background:#E1E1E1; color:black;">
                <h4>Datos</h4>
            </div>

            <div class="box-body">

                <div class="row">

                    <div class="form-group col-sm-3">
                        <label>Orden de Trabajo</label>
                        <select class="form-control input-sm" id="nroOts"> </select>
                    </div>

                    <div class="form-group col-sm-12 col-sm-3">
                        <label></label>
                        <button class="btn btn-info btn-block" id="btnBuscarOt"><i class="fa fa-search"></i> Buscar OT</button>
                    </div>

                </div>
                <div class="form-group col-sm-3">
                    <label>Fecha OT</label>
                    <input type="date" class="form-control input-sm" id="fechaOT">
                </div>

                <div class="form-group col-sm-3">
                    <label>Km actual</label>
                    <input type="number" class="form-control input-sm" id="kmActual" placeholder="0">
                </div>

                <div class="form-group col-sm-3">
                    <label>Máquina</label>
                    <select class="form-control input-sm" id="maquina">
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Centro costo</label>
                    <select class="form-control input-sm" id="centroCosto">
                    </select>
                </div>

                <!-- ===================== BOTÓN FINAL ===================== -->
                <div class="box-footer text-right">
                    <button class="btn btn-warning btn-md " id="btnEditarOT"><i class="fa fa-check"></i> Editar Cabecera OT</button>
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
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Sistema</label>
                    <select class="form-control input-sm" id="sistema">
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Sub Sistema</label>
                    <select class="form-control input-sm" id="subSistema">
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label>Fecha y Hora Tarea</label>
                    <input type="datetime-local" class="form-control input-sm" id="fechaHoraTarea">
                </div>

                <div class="form-group col-sm-6">
                    <label>Observación técnica (máx. 350)</label>
                    <textarea class="form-control input-sm" id="observacion" maxlength="350"></textarea>
                </div>

                <div class="form-group col-sm-3">
                    <label>Personal técnico</label>
                    <select class="form-control input-sm" id="tecnico">
                    </select>
                </div>

                <div class="form-group col-sm-12 col-sm-3">
                    <label></label>
                    <button class="btn btn-primary btn-block" id="btnAgregarTarea"><i class="fa fa-plus"></i> Agregar Tarea</button>
                </div>

                <!-- ===================== LISTA DE TAREAS ===================== -->
                    <div class="box-body" style="margin-top:10px;">
                        <table class="table table-bordered table-striped dt-responsive" id="tablaTareas" width="100%" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th><center>Tipo tarea</center></th>
                                    <th><center>Sistema</center></th>
                                    <th><center>Sub Sistema</center></th>
                                    <th><center>Técnico</center></th>
                                    <th><center>Observación</center></th>
                                    <th><center>Fecha y Hora</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
            </div>

            <!-- ===================== REPUESTOS ===================== -->
            <div class="box-header with-border" style="background:#D9EDF7; color:black;">
                <h4>Repuestos para la Orden de Trabajo</h4>
            </div>

            <div class="box-body">
                <div class="form-group col-sm-7">
                    <label>Repuesto</label>
                    <select class="form-control input-sm" id="repuesto">
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    <label>Cantidad</label>
                    <input type="number" class="form-control input-sm" id="cantidadRepuesto">
                </div>

                <div class="form-group col-sm-3" style="margin-top:25px;">
                    <button class="btn btn-info btn-block" id="btnAgregarRepuesto"><i class="fa fa-plus"></i> Agregar Repuesto</button>
                </div>

                <div class="col-sm-12" style="margin-top:10px;">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaRepuestos" width="100%" style="text-align: center;">
                        <thead>
                            <tr>
                                <th><center>ID</center></th>
                                <th><center>Descripción</center></th>
                                <th><center>Cantidad</center></th>
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

<script src="vistas/js/mantencion/editarOt.js"></script>