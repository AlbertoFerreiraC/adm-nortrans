<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">

    <section class="content-header">
        <h1>Editar Registro de Kilometraje</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Editar Kilometraje</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modalAgregarKilometraje">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro
                    </button>
                </div>

                <div class="form-group col-sm-9 col-xs-12">
                    <input type="text"
                        class="form-control input-sm"
                        style="text-align:center; font-size:17px;"
                        id="filtradoDinamico"
                        placeholder="Filtrado general...">
                </div>
            </div>

            <div class="box-body">
                <div id="divTabla">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaKilometraje" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Máquina</center>
                                </th>
                                <th>
                                    <center>Tipo Máquina</center>
                                </th>
                                <th>
                                    <center>Centro Costo</center>
                                </th>
                                <th>
                                    <center>Kilometraje Anterior</center>
                                </th>
                                <th>
                                    <center>Kilometraje Actual</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">Ningún registro disponible</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR KILOMETRAJE
======================================-->
<div id="modalAgregarKilometraje" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <form role="form" method="post" id="formularioAgregarKilometraje">

                <!-- CABEZA -->
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nueva Edicion de Kilometraje</h4>
                </div>

                <!-- CUERPO -->
                <div class="modal-body">
                    <div class="box-body">

                        <h4><strong>Datos de la edicion</strong></h4>
                        <hr>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="maquina">Máquina:</label>
                            <select class="form-control" id="maquina" name="maquina" required>
                                <option value="">Seleccionar...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="tipoMaquina">Tipo máquina:</label>
                            <input type="text" class="form-control" id="tipoMaquina" name="tipoMaquina" readonly>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="centroCosto">Centro Costo:</label>
                            <input type="text" class="form-control" id="centroCosto" name="centroCosto" readonly>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="kmAnterior">Km anterior:</label>
                            <input type="number" class="form-control" id="kmAnterior" name="kmAnterior" value="0" readonly>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="fechaKm">Fecha Km:</label>
                            <input type="text" class="form-control" id="fechaKm" name="fechaKm" readonly>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="kmActual">Km actual:</label>
                            <input type="number" class="form-control" id="kmActual" name="kmActual" placeholder="Ingrese km actual" required>
                        </div>

                    </div>
                </div>

                <!-- PIE -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-success" id="btnGrabarKilometraje">
                        <i class="fa fa-hdd-o"></i> Grabar km
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<!--=====================================
ESTILOS
======================================-->
<style>
    #divTabla {
        overflow: auto;
        width: 100%;
    }

    #divTabla table {
        width: 100%;
        background-color: #f9f9f9;
    }

    #tablaKilometraje th,
    #tablaKilometraje td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<!-- SCRIPT EXTERNO -->
<script src="vistas/js/mantencion/editarKM.js"></script>