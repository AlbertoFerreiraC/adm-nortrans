<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Conductores

        </h1>
        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Mantencion</a></li>

            <li class="active">Administrar Conductores</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <div class="form-group col-sm-3 col-xs-12 ">
                    <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Registro
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
                                    <center> RUT</center>
                                </th>
                                <th>
                                    <center> Nombre</center>
                                </th>
                                <th>
                                    <center> Telefono</center>
                                </th>
                                <th>
                                    <center> Correo</center>
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

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" id="formulario_para_agregar">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Registro</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL DESCRIPCION DE LA TAREA -->

                        <div class="form-group">
                            <label for="rutAgregar">Rut:</label>
                            <input type="text" class="form-control input-md" name="rutAgregar" id="rutAgregar" required>
                        </div>

                        <div class="form-group">
                            <label for="nuevoNombre">Nombre:</label>
                            <input type="text" class="form-control input-md" name="nuevoNombre" id="nuevoNombre" required>
                        </div>

                        <div class="form-group">
                            <label for="telefonoAgregar">Telefono:</label>
                            <input type="text" class="form-control input-md" name="telefonoAgregar" id="telefonoAgregar" required>
                        </div>

                        <div class="form-group">
                            <label for="correoAgregar">Correo:</label>
                            <input type="text" class="form-control input-md" name="correoAgregar" id="correoAgregar" required>
                        </div>

                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>

                </div>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR TAREA
======================================-->
<div id="modalEditar" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" id="formulario_para_editar">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Modificar Registro</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">

                    <div class="box-body">

                        <!-- ID oculto (clave primaria o identificador) -->
                        <input type="hidden" name="idModificar" id="idModificar">

                        <!-- ENTRADA PARA EL RUT -->
                        <div class="form-group">
                            <label for="rutEditar">Rut:</label>
                            <input type="text" class="form-control input-md" name="rutEditar" id="rutEditar" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <label for="nombreEditar">Nombre:</label>
                            <input type="text" class="form-control input-md" name="nombreEditar" id="nombreEditar" required>
                        </div>

                        <!-- ENTRADA PARA EL TELÉFONO -->
                        <div class="form-group">
                            <label for="telefonoEditar">Teléfono:</label>
                            <input type="text" class="form-control input-md" name="telefonoEditar" id="telefonoEditar" required>
                        </div>

                        <!-- ENTRADA PARA EL CORREO -->
                        <div class="form-group">
                            <label for="correoEditar">Correo:</label>
                            <input type="email" class="form-control input-md" name="correoEditar" id="correoEditar" required>
                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>

                    <button type="button" class="btn btn-warning"
                        style="background-color: #f6a117; border-color: #c77b0a;"
                        id="btnActualizar">
                        <i class="fa fa-refresh" aria-hidden="true"></i> Actualizar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script src="vistas/js/mantencion/conductor.js"></script>


<style>
    #div1 {
        overflow: scroll;
        width: 100%;
    }

    #div1 table {
        width: 100%;
        background-color: lightgray;
    }
</style>