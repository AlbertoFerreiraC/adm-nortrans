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
                                    <center> Comuna</center>
                                </th>
                                <th>
                                    <center> Condicion de Pago</center>
                                </th>
                                <th>
                                    <center> Tipo de Proveedor</center>
                                </th>
                                <th>
                                    <center> Descripción</center>
                                </th>
                                <th>
                                    <center> RUT</center>
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
                                <th>
                                    <center> Criticidad</center>
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

                        <div class="form-group col-md-6">
                            <label for="comunaAgregar">Comuna:</label>
                            <select class="form-control input-md cajatexto" name="comunaAgregar" id="comunaAgregar"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="condiciondepagoAgregar">Condicion de Pago:</label>
                            <select class="form-control input-md cajatexto" name="condiciondepagoAgregar" id="condiciondepagoAgregar"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tipoProveedorAgregar">Tipo Proveedor:</label>
                            <select class="form-control input-md cajatexto" name="tipoProveedorAgregar" id="tipoProveedorAgregar"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nuevoNombre">Descripción:</label>
                            <input type="text" class="form-control input-md" name="descripcionAgregar" id="descripcionAgregar" placeholder="Ingresar Descripción" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="rutAgregar">RUT:</label>
                            <input type="text" class="form-control input-md" name="rutAgregar" id="rutAgregar" placeholder="Ingresar Rut" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telefonoAgregar">Telefono:</label>
                            <input type="text" class="form-control input-md" name="telefonoAgregar" id="telefonoAgregar" placeholder="Ingresar Telefono de Contacto" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="correoAgregar">Correo:</label>
                            <input type="text" class="form-control input-md" name="correoAgregar" id="correoAgregar" placeholder="Ingresar Correo de Contacto" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="direccionAgregar">Dirección:</label>
                            <input type="text" class="form-control input-md" name="direccionAgregar" id="direccionAgregar" placeholder="Ingresar Dirección" required>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="criticidadAgregar">Criticidad:</label>
                            <input type="text" class="form-control input-md" name="criticidadAgregar" id="criticidadAgregar" placeholder="Ingresar la Criticidad" required>
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
                            <label for="comunaModificar">Comuna:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="comunaModificar" id="comunaModificar"></select>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="condiciondepagoModificar">Condicion de Pago:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="condiciondepagoModificar" id="condiciondepagoModificar"></select>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tipoProveedorModificar">Tipo Proveedor:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="tipoProveedorModificar" id="tipoProveedorModificar"></select>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nuevoNombre">Descripción:</label>
                            <input type="text" class="form-control input-md" name="descripcionModificar" id="descripcionModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="rutModificar">RUT:</label>
                            <input type="text" class="form-control input-md" name="rutModificar" id="rutModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telefonoModificar">Telefono:</label>
                            <input type="text" class="form-control input-md" name="telefonoModificar" id="telefonoModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="correoModificar">Correo:</label>
                            <input type="text" class="form-control input-md" name="correoModificar" id="correoModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="direccionModificar">Dirección:</label>
                            <input type="text" class="form-control input-md" name="direccionModificar" id="direccionModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="criticidadModificar">Criticidad:</label>
                            <input type="text" class="form-control input-md" name="criticidadModificar" id="criticidadModificar" required>
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

<script src="vistas/js/contabilidad/maestroProveedor.js"></script>


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