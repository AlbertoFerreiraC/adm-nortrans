<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Maestro Producto

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega/Mantenedor</a></li>

            <li class="active">Administrar Maestro Producto</li>

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
                                    <center> Tipo Producto</center>
                                </th>
                                <th>
                                    <center> Categoria</center>
                                </th>
                                <th>
                                    <center> Sub Categoria</center>
                                </th>
                                <th>
                                    <center> Id Producto</center>
                                </th>
                                <th>
                                    <center> Producto</center>
                                </th>
                                <th>
                                    <center> Unidad de Medida</center>
                                </th>
                                <th>
                                    <center> # Por Unidad de Medida</center>
                                </th>
                                <th>
                                    <center> Estado</center>
                                </th>
                                <th>
                                    <center> Editar</center>
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
                            <label for="tipoProductoAgregar">Tipo Producto:</label>
                            <select class="form-control input-md cajatexto" name="tipoProductoAgregar" id="tipoProductoAgregar">
                                <option value="" selected>Seleccionar...</option>
                                <option value="Insumos">Insumos</option>
                                <option value="Servicios">Servicios</option>
                                <option value="EPP">EPP</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="categoriaAgregar">Categoria:</label>
                            <select class="form-control input-md cajatexto" name="categoriaAgregar" id="categoriaAgregar"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="subCategoriaAgregar">Sub Categoria:</label>
                            <select class="form-control input-md cajatexto" name="subCategoriaAgregar" id="subCategoriaAgregar"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="unidadMedidaAgregar">Unidad de Medida:</label>
                            <select class="form-control input-md cajatexto" name="unidadMedidaAgregar" id="unidadMedidaAgregar"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="porUnidadAgregar"># Por Unidad De Medida:</label>
                            <input type="text" class="form-control input-md cajatexto" name="porUnidadAgregar" id="porUnidadAgregar">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="stokMinimoAgregar">Stock Minimo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="stokMinimoAgregar" id="stokMinimoAgregar">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="descripcionAgregar">Descripción:</label>
                            <input type="text" class="form-control input-md cajatexto" name="descripcionAgregar" id="descripcionAgregar">
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
                            <label for="tipoProductoModificar">Tipo Producto:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="tipoProductoModificar" id="tipoProductoModificar">
                                <option value="" selected>Seleccionar...</option>
                                <option value="Insumos">Insumos</option>
                                <option value="Servicios">Servicios</option>
                                <option value="EPP">EPP</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="categoriaModificar">Categoria:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="categoriaModificar" id="categoriaModificar"></select>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="subCategoriaModificar">Sub Categoria:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="subCategoriaModificar" id="subCategoriaModificar"></select>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="unidadMedidaModificar">Unidad de Medida:</label>
                            <select class="form-control input-md cajatexto" name="unidadMedidaModificar" id="unidadMedidaModificar"></select>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="porUnidadModificar"># Por Unidad De Medida:</label>
                            <input type="text" class="form-control input-md cajatexto" name="porUnidadModificar" id="porUnidadModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="stokMinimoModificar">Stock Minimo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="stokMinimoModificar" id="stokMinimoModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="descripcionModificar">Descripción:</label>
                            <input type="text" class="form-control input-md cajatexto" name="descripcionModificar" id="descripcionModificar" required>
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

<script src="vistas/js/bodegas/maestroProducto.js"></script>


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