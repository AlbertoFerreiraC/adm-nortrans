<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar Bodegas
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Bodegas</li>
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
                                <th style="text-align: center;">Id Bodega</th>
                                <th style="text-align: center;">Bodega</th>
                                <th style="text-align: center;">Tipo Bodega</th>
                                <th style="text-align: center;">Estado</th>
                                <th style="text-align: center;">Editar ubicación</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td style="text-align: center;">B01</td>
                                <td>Bodega industrial</td>
                                <td style="text-align: center;">central</td>
                                <td style="text-align: center;">ACT</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning btnUbicacion" data-toggle="modal" data-target="#modalUbicacion"
                                        data-id="B01"
                                        data-nombre="Bodega industrial"
                                        data-tipo="central">
                                        Ubicación
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">B02</td>
                                <td>Bodega DINT</td>
                                <td style="text-align: center;">central</td>
                                <td style="text-align: center;">ACT</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning btnUbicacion" data-toggle="modal" data-target="#modalUbicacion"
                                        data-id="B02"
                                        data-nombre="Bodega DINT"
                                        data-tipo="central">
                                        Ubicación
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">B03</td>
                                <td>Bodega Antofagasta</td>
                                <td style="text-align: center;">central</td>
                                <td style="text-align: center;">ACT</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning btnUbicacion" data-toggle="modal" data-target="#modalUbicacion" data-id="B03" data-nombre="Bodega Antofagasta" data-tipo="central">Ubicación</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">B04</td>
                                <td>Bodega Lomas bayas</td>
                                <td style="text-align: center;">central</td>
                                <td style="text-align: center;">ACT</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning btnUbicacion" data-toggle="modal" data-target="#modalUbicacion" data-id="B04" data-nombre="Bodega Lomas bayas" data-tipo="central">Ubicación</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">B05</td>
                                <td>CCMC</td>
                                <td style="text-align: center;">central</td>
                                <td style="text-align: center;">ACT</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning btnUbicacion" data-toggle="modal" data-target="#modalUbicacion" data-id="B05" data-nombre="CCMC" data-tipo="central">Ubicación</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">B06</td>
                                <td>Bodega Spence</td>
                                <td style="text-align: center;">central</td>
                                <td style="text-align: center;">ACT</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-warning btnUbicacion" data-toggle="modal" data-target="#modalUbicacion" data-id="B06" data-nombre="Bodega Spence" data-tipo="central">Ubicación</button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modalAgregar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" id="formulario_para_agregar">
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Registro</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nuevoNombre">Descripción:</label>
                            <input type="text" class="form-control input-md" name="descripcionAgregar" id="descripcionAgregar" placeholder="Ingresar Descripción" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalModificar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Registro</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="nuevoNombre">Descripción:</label>
                            <input type="text" class="form-control input-md" name="descripcionModificar" id="descripcionModificar" required>
                            <input type="hidden" name="idModificar" id="idModificar" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalUbicacion" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bodega Ubicación</h4>
            </div>

            <div class="modal-body">
                <div class="box-body">

                    <div class="row" style="margin-bottom: 20px; font-size: 16px;">
                        <div class="col-md-4">
                            <strong>Id Bodega:</strong> <span id="modalUbicacion_idBodega"></span>
                        </div>
                        <div class="col-md-4">
                            <strong>Bodega:</strong> <span id="modalUbicacion_nombreBodega"></span>
                        </div>
                        <div class="col-md-4">
                            <strong>Tipo:</strong> <span id="modalUbicacion_tipoBodega"></span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">x-y-z</th>
                                    <th style="text-align:center;">Descripción X</th>
                                    <th style="text-align:center;">Descripción Y</th>
                                    <th style="text-align:center;">Descripción Z</th>
                                </tr>
                            </thead>
                            <tbody id="ubicacionesTbody">
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div id="divCrearUbicacion" style="display:none; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; padding: 20px;">

                        <h4 style="margin-top:0;">Nueva Ubicación</h4>

                        <input type="hidden" id="idBodegaParaUbicacion">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>X</label>
                                    <input type="text" class="form-control" id="ubicacionX" placeholder="Valor X">
                                </div>
                                <div class="form-group">
                                    <label>Y</label>
                                    <input type="text" class="form-control" id="ubicacionY" placeholder="Valor Y">
                                </div>
                                <div class="form-group">
                                    <label>Z</label>
                                    <input type="text" class="form-control" id="ubicacionZ" placeholder="Valor Z">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Descripción X</label>
                                    <input type="text" class="form-control" id="descripcionX" placeholder="Descripción para X">
                                </div>
                                <div class="form-group">
                                    <label>Descripción Y</label>
                                    <input type="text" class="form-control" id="descripcionY" placeholder="Descripción para Y">
                                </div>
                                <div class="form-group">
                                    <label>Descripción Z</label>
                                    <input type="text" class="form-control" id="descripcionZ" placeholder="Descripción para Z">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-success" id="btnGrabarUbicacion">
                                    <i class="fa fa-floppy-o"></i> Grabar ubicación
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="btnMostrarFormularioUbicacion">
                    <i class="fa fa-plus"></i> Crear ubicación
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<script src="vistas/js/bodegas/deBodega.js"></script>

<style>
    #div1 {
        overflow-x: auto;
        width: 100%;
    }

    #div1 table {
        width: 100%;
    }

    #tabla td,
    #tabla th {
        vertical-align: middle;
    }
</style>