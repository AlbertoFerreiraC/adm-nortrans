<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Proveedores

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Contabilidad/Mantenedor</a></li>

            <li class="active">Administrar Proveedores</li>

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
                                    <center> Apellido</center>
                                </th>
                                <th>
                                    <center> Telefono</center>
                                </th>
                                <th>
                                    <center> Correo</center>
                                </th>
                                <th>
                                    <center> Direccion</center>
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

                        <div class="form-group col-md-6">
                            <label for="rutAgregar">Rut:</label>
                            <input type="text" class="form-control input-md cajatexto" name="rutAgregar" id="rutAgregar" placeholder="Ingresar Rut" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombreAgregar">Nombre</label>
                            <input type="text" class="form-control input-md cajatexto" name="nombreAgregar" id="nombreAgregar" placeholder="Ingresar Nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="apellidoAgregar">Apellido:</label>
                            <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar" placeholder="Ingresar Apellido" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telefonoAgregar">Telefono:</label>
                            <input type="text" class="form-control input-md cajatexto" name="telefonoAgregar" id="telefonoAgregar" placeholder="Ingresar Telefono" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="correoAgregar">Correo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="correoAgregar" id="correoAgregar" placeholder="Ingresar Correo" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="direccionAgregar">Direccion:</label>
                            <input type="text" class="form-control input-md cajatexto" name="direccionAgregar" id="direccionAgregar" placeholder="Ingresar Direccion" required>
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

<div id="modalModificar" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Registro</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group col-md-6">
                            <label for="rutModificar">Rut:</label>
                            <input type="text" class="form-control input-md cajatexto" name="rutModificar" id="rutModificar">
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombreModificar">Nombre</label>
                            <input type="text" class="form-control input-md cajatexto" name="nombreModificar" id="nombreModificar">
                            <input type="hidden" name="idModificar" id="idModificar" required>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="apellidoModificar">Apellido:</label>
                            <input type="text" class="form-control input-md cajatexto" name="apellidoModificar" id="apellidoModificar">
                            <input type="hidden" name="idModificar" id="idModificar" required>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="telefonoModificar">Telefono:</label>
                            <input type="text" class="form-control input-md cajatexto" name="telefonoModificar" id="telefonoModificar">
                            <input type="hidden" name="idModificar" id="idModificar" required>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="correoModificar">Correo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="correoModificar" id="correoModificar">
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="direccionModificar">Direccion:</label>
                            <input type="text" class="form-control input-md cajatexto" name="direccionModificar" id="direccionModificar">
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="vistas/js/contabilidad/cliente.js"></script>


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