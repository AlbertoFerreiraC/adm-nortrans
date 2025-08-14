<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Mantenedor: Tipo Bus

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Activos</a></li>

            <li class="active">Mantenedor: Tipo Bus</li>

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
                    <table class="table table-bordered table-striped dt-responsive" id="tablaDocumentos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Pisos</center>
                                </th>
                                <th>
                                    <center>Clase Piso 1</center>
                                </th>
                                <th>
                                    <center>Asientos Piso 1</center>
                                </th>
                                <th>
                                    <center>Clase Piso 2</center>
                                </th>
                                <th>
                                    <center>Asientos Piso 2</center>
                                </th>
                                <th>
                                    <center>Estado</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
                                </th>
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

<div id="modalAgregar" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" id="formulario_para_agregar">

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Tipo de Bus</h4>

                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="numeroPisoAgregar">N° Pisos:</label>
                            <select class="form-control input-md" name="numeroPisoAgregar" id="numeroPisoAgregar" required>
                                <option value="">Seleccionar...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="clasePiso1Agregar">Clase Piso 1:</label>
                                <select class="form-control input-md" name="clasePiso1Agregar" id="clasePiso1Agregar" required></select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="asientoPisoUnoAgregar">Asientos Piso 1:</label>
                                <input type="number" class="form-control input-md" name="asientoPisoUnoAgregar" id="asientoPisoUnoAgregar" placeholder="Ingresar N° de asientos" required>
                            </div>
                        </div>

                        <div class="piso_dos">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="clasePiso2Agregar">Clase Piso 2:</label>
                                    <select class="form-control input-md" name="clasePiso2Agregar" id="clasePiso2Agregar"></select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="asientoPisoDosAgregar">Asientos Piso 2:</label>
                                    <input type="number" class="form-control input-md" name="asientoPisoDosAgregar" id="asientoPisoDosAgregar" placeholder="Ingresar N° de asientos">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717;" id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>
                </div>

            </form>

        </div>

    </div>

</div>

<div id="modalModificar" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" id="formulario_para_modificar">

                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Tipo de Bus</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <input type="hidden" name="id" id="idModificar" required>

                        <div class="form-group">
                            <label for="numeroPisoModificar">N° Pisos:</label>
                            <select class="form-control input-md" name="nro_piso" id="numeroPisoModificar" required>
                                <option value="">Seleccionar...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="clasePiso1Modificar">Clase Piso 1:</label>
                                <select class="form-control input-md" name="clase_piso" id="clasePiso1Modificar" required></select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="asientoPisoUnoModificar">Asientos Piso 1:</label>
                                <input type="number" class="form-control input-md" name="asiento_1" id="asientoPisoUnoModificar" required>
                            </div>
                        </div>

                        <div class="piso_dos_modificar">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="clasePiso2Modificar">Clase Piso 2:</label>
                                    <select class="form-control input-md" name="clase_piso_2" id="clasePiso2Modificar"></select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="asientoPisoDosModificar">Asientos Piso 2:</label>
                                    <input type="number" class="form-control input-md" name="asiento_2" id="asientoPisoDosModificar">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717;" id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>
                </div>

            </form>

        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        $('#numeroPisoAgregar').on('change', function() {
            if ($(this).val() == '2') {
                $('.piso_dos').slideDown();
                $('#clasePiso2Agregar, #asientoPisoDosAgregar').prop('required', true);
            } else {
                $('.piso_dos').slideUp();
                $('#clasePiso2Agregar, #asientoPisoDosAgregar').val('').prop('required', false);
            }
        });

        $('#numeroPisoModificar').on('change', function() {
            if ($(this).val() == '2') {
                $('.piso_dos_modificar').slideDown();
                $('#clasePiso2Modificar, #asientoPisoDosModificar').prop('required', true);
            } else {
                $('.piso_dos_modificar').slideUp();
                $('#clasePiso2Modificar, #asientoPisoDosModificar').val('').prop('required', false);
            }
        });

        $('.piso_dos, .piso_dos_modificar').hide();
    });
</script>

<style>
    #div1 {
        overflow: scroll;
        width: 100%;
    }

    #div1 table {
        width: 100%;
        background-color: lightgray;
    }

    .piso_dos,
    .piso_dos_modificar {
        display: none;
    }
</style>

<script src="vistas/js/activos/tipoBus.js"></script>