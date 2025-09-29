<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Gestionar Rendiciones

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Contabilidad/Gestión</a></li>

            <li class="active">Gestionar Rendiciones</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <div class="form-group col-sm-3 col-xs-12 ">
                    <select class="form-control input-md cajatexto" name="estadoBusqueda" id="estadoBusqueda">
                        <option value="pendiente">PENDIENTE</option>
                        <option value="en revision">EN REVISIÓN</option>
                        <option value="procesado">PROCESADO</option>
                        <option value="rechazado">RECHAZADO</option>
                        <option value="todos">TODOS</option>
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
                                <th><center>Nro. Rendición</center></th>
                                <th><center>Realizado Por...</center></th> 
                                <th><center>Fecha</center></th>
                                <th><center>Saldo Inicial</center></th>
                                <th><center>Monto Rendido</center></th>
                                <th><center>Saldo</center></th>
                                <th><center>Dependencia</center></th>
                                <th><center>Comentario</center></th>
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

                    <h4 class="modal-title">Visuallización de la Rendición</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">
                    <input type="hidden" id="idRendicion">
                    <div class="box-body">
                        <div class="form-group col-md-4 col-xs-12">
                            <label for="fechaVer">Fecha:</label>
                            <input type="text" class="form-control input-md cajatexto" name="fechaVer" id="fechaVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="usuarioVer">Usuario:</label>
                            <input type="text" class="form-control input-md cajatexto" name="usuarioVer" id="usuarioVer" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="dependenciaVer">Dependencia:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <input type="text" class="form-control input-md cajatexto" name="dependenciaVer" id="dependenciaVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoInicialVer">Saldo Incial:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                            <input type="text" class="form-control input-md cajatexto solo-numero puntos_de_mil" name="saldoInicialVer" id="saldoInicialVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="montoRendidoVer">Monto Rendido</label>
                            <input type="text" class="form-control input-md cajatexto" name="montoRendidoVer" id="montoRendidoVer" readonly>
                        </div>

                        <div class="form-group col-md-4 col-xs-12">
                            <label for="saldoVer">Saldo:</label>
                            <input type="text" class="form-control input-md cajatexto" name="saldoVer" id="saldoVer" readonly>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioVer">Comentario Adicional:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioVer" id="comentarioVer" rows="2" readonly></textarea>
                        </div>   
                        
                        <div class="form-group col-sm-12 col-xs-12">
                            <a title="Descargar" type="button" id = "descargarDocumentoVer" class="btn btn-success btn-block" target="_blank" href="" ><i class="fa fa-download"></i> Descargar Adjunto</a>
                        </div>

                        <div class="form-group col-md-12 col-xs-12" id= "div3">
                                    <table class="table table-bordered table-striped dt-responsive" id="tablaRendicionVer" width="100%" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th><center>Fecha</center></th>
                                                <th><center>Tipo</center></th>
                                                <th><center>Nro. Documento</center></th>
                                                <th><center>Monto</center></th>
                                                <th><center>Detalle</center></th>
                                                <th><center>Destino/Máquina</center></th>
                                                <th><center>Centro de Costo</center></th>
                                                <th><center>Proveedor</center></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="comentarioRevisionVer">Comentario Por Revisión:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioRevisionVer" id="comentarioRevisionVer" rows="2" ></textarea>
                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <div class="form-group col-md-4 col-xs-12">
                        <input type="text" class="form-control input-md cajatexto" style="text-align: center; font-weight: bold; font-size: 16px;" name="estadoVer" id="estadoVer" readonly>
                    </div>

                    <div class="form-group col-md-2 col-xs-12">
                        <button class="btn btn btn-block btn-success" type="button" id="btnAprobar"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Aprobar</button>
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                        <button class="btn btn btn-block btn-warning" type="button" id="btnEnRevision"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Enviar a Revisión</button>
                    </div>
                    <div class="form-group col-md-2 col-xs-12">
                        <button class="btn btn btn-block btn-danger" type="button" id="btnRechazar"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Rechazar</button>
                    </div>
                </div>
                </div>

            </form>

        </div>

    </div>

</div>



<script src="vistas/js/contabilidad/gestionRendicion.js"></script>


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