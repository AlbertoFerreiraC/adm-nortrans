<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Maquinas

        </h1>
        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Mantencion</a></li>

            <li class="active">Administrar Maquinas</li>

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
                                    <center> Descripción</center>
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
                        <div class="form-group col-md-6 col-xs-6">
                            <label for="centroCostoAgregar">Centro de costo:</label>
                            <select class="form-control" id="centroCostoAgregar" name="centroCostoAgregar" required>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="tipoMaquinaAgregar">Tipo Maquina:</label>
                            <select class="form-control" id="tipoMaquinaAgregar" name="tipoMaquinaAgregar" required>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <label for="nuevoNombre">Descripción:</label>
                            <input type="text" class="form-control input-md" name="descripcionAgregar" id="descripcionAgregar" required>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="kmNuevoAgregar">Km nuevo:</label>
                            <input type="text" class="form-control input-md" name="kmNuevoAgregar" id="kmNuevoAgregar" value="0" required>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="fechaKmAgregar">Fecha KM:</label>
                            <input
                                type="date"
                                class="form-control input-md"
                                name="fechaKmAgregar"
                                id="fechaKmAgregar"
                                required>
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
MODAL EDITAR MAQUINA
======================================-->
<div id="modalModificar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="post" id="formulario_para_modificar">

                <!-- CABEZA -->
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Registro de Máquina</h4>
                </div>

                <!-- CUERPO -->
                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="centroCostoModificar">Centro de costo:</label>
                            <select class="form-control" id="centroCostoModificar" name="centroCostoModificar" required></select>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="tipoMaquinaModificar">Tipo Máquina:</label>
                            <select class="form-control" id="tipoMaquinaModificar" name="tipoMaquinaModificar" required></select>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <label for="descripcionModificar">Descripción:</label>
                            <input type="text" class="form-control" id="descripcionModificar" name="descripcionModificar" required>
                            <input type="hidden" id="idModificar" name="idModificar">
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="kmModificar">Kilometraje actual:</label>
                            <input type="number" class="form-control" id="kmModificar" name="kmModificar" required>
                        </div>

                        <div class="form-group col-md-6 col-xs-6">
                            <label for="fechaKmModificar">Fecha KM:</label>
                            <input type="date" class="form-control" id="fechaKmModificar" name="fechaKmModificar" required>
                        </div>

                    </div>
                </div>

                <!-- PIE -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" id="btnModificar">
                        <i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar Cambios
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>


<script src="vistas/js/mantencion/maquina.js"></script>


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

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Cuando se abre el modal de "Agregar Registro"
        $('#modalAgregar').on('show.bs.modal', function() {
            const hoy = new Date();
            const año = hoy.getFullYear();
            const mes = String(hoy.getMonth() + 1).padStart(2, '0');
            const dia = String(hoy.getDate()).padStart(2, '0');
            const fechaActual = `${año}-${mes}-${dia}`;
            document.getElementById('fechaKmAgregar').value = fechaActual;
        });

    });
</script>