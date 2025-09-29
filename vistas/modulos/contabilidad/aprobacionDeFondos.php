<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Gestionar Aprobación de Fondo para Rendición

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Contabilidad/Gestión</a></li>

            <li class="active">Gestionar Aprobación de Fondo para Rendición</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <div class="form-group col-md-3 col-xs-12">
                    <select class="form-control input-md cajatexto" name="filtroBusqueda" id="filtroBusqueda">
                        <option value="pre aprobado">Pendiente</option>
                        <option value="aprobado">Aprobado</option>
                        <option value="anulado">Dado de Baja</option>
                    </select>
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
                                <th style="width:10px"> <center>#</center></th>
                                 <th><center>Nro. Solicitud</center></th>
                                <th><center>Fecha</center></th>
                                <th><center>Monto</center></th>
                                <th><center>Solicitado Para...</center></th>
                                <th><center>Pre Aprueba</center></th>
                                <th><center>Aprueba</center></th>
                                <th><center>Motivo</center></th>
                                <th><center>Estado</center></th>
                                <th><center>Acciones</center></th>
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
MODAL EDITAR TAREA
======================================-->

<div id="modalVerMas" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#A9A9A9; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Visualizar Asigación</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">
                    <input type="hidden" name="idModificar" id="idModificar" >

                    <div class="box-body">
                        
                           <div class="form-group col-md-4 col-xs-12">
                                <label for="fechaCargaModificar">Fecha Carga:</label>
                                <input type="text" class="form-control input-md cajatexto" name="fechaCargaModificar" id="fechaCargaModificar" readonly>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="solicitadoPorModificar">Solicitado Por:</label>
                                <input type="text" class="form-control input-md cajatexto" name="solicitadoPorModificar" id="solicitadoPorModificar"  readonly>
                            </div>        

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="otorgarModificar">Otorgar A:</label>
                                <input type="text" class="form-control input-md cajatexto" name="otorgarModificar" id="otorgarModificar"  readonly>
                            </div>  

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="montoSolicitadoModificar">Monto Solicitado:</label>
                                <input type="text" class="form-control input-md cajatexto" name="montoSolicitadoModificar" id="montoSolicitadoModificar" readonly>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="preApruebaModificar">Pre Aprueba:</label>
                                <input type="text" class="form-control input-md cajatexto" name="preApruebaModificar" id="preApruebaModificar"  readonly>
                            </div>  

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="apruebaModificar">Aprueba:</label>
                                <input type="text" class="form-control input-md cajatexto" name="apruebaModificar" id="apruebaModificar" readonly>
                            </div>  

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="fechaPreApruebaModificar">Fecha Pre Aprobación:</label>
                                <input type="text" class="form-control input-md cajatexto" name="fechaPreApruebaModificar" id="fechaPreApruebaModificar" readonly>
                            </div> 

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="fechaApruebaModificar">Fecha Aprobación:</label>
                                <input type="text" class="form-control input-md cajatexto" name="fechaApruebaModificar" id="fechaApruebaModificar" readonly>
                            </div> 

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="estadoSolicitudModificar">Estado Solicitud:</label>
                                <input type="text" class="form-control input-md cajatexto" name="estadoSolicitudModificar" id="estadoSolicitudModificar" readonly>
                            </div> 

                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="motivoAsignacionModificar">Motivo de la Asignación:</label>
                                <textarea class="form-control input-md cajatexto" name="motivoAsignacionModificar" id="motivoAsignacionModificar" rows="2" readonly></textarea>
                            </div>

                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="observacionPreAprobacion">Observación Pre Aprobación:</label>
                                <textarea class="form-control input-md cajatexto" name="observacionPreAprobacion" id="observacionPreAprobacion" rows="2" readonly></textarea>
                            </div>

                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="observacionAprobacion">Observación Aprobación:</label>
                                <textarea class="form-control input-md cajatexto" name="observacionAprobacion" id="observacionAprobacion" rows="2"></textarea>
                            </div>

                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="observacionPorAnulacion">Observación por Baja:</label>
                                <textarea class="form-control input-md cajatexto" name="observacionPorAnulacion" id="observacionPorAnulacion" rows="2"></textarea>
                            </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-success  pull-rigth" id="btnAprobarSolicitud"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Aprobar Asignación</button>
                    <button type="button" class="btn btn-danger  pull-rigth" id="btnAnularSolicitud"><i class="fa fa-trash-o" aria-hidden="true"></i> Anular Asignación</button>
                </div>

            </form>

        </div>

    </div>

</div>




<script src="vistas/js/contabilidad/aprobacionDeFondos.js"></script>


<style>

    #div1 table {
        width: 100%;
        background-color: lightgray;
        overflow:scroll;
    }

    #div2,#div3 {
        width: 100%;
        overflow:scroll;
    }
    table{
        text-align: center;
    }
</style>