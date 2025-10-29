<div class="content-wrapper">

    <!-- ENCABEZADO -->
    <section class="content-header">
        <h1>Consulta General de Órdenes de Trabajo</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Órdenes de Trabajo</li>
        </ol>
    </section>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="content">
        <div class="box">

            <!-- CABECERA -->
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Órdenes de Trabajo</h3>
            </div>

            <!-- TABLA PRINCIPAL -->
            <div class="box-body">
                <div id="divTablaOT">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOT" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
                                </th>
                                <th>
                                    <center>N° OT</center>
                                </th>
                                <th>
                                    <center>Máquina</center>
                                </th>
                                <th>
                                    <center>Centro de Costo</center>
                                </th>
                                <th>
                                    <center>Usuario</center>
                                </th>
                                <th>
                                    <center>Km Actual</center>
                                </th>
                                <th>
                                    <center>Estado</center>
                                </th>
                                <th>
                                    <center>Acción</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" class="text-center">Cargando datos...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL VER DETALLE DE LA OT
======================================-->
<div id="modalVerOT" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- CABECERA -->
            <div class="modal-header" style="background:#007B9E; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle de la Orden de Trabajo</h4>
            </div>

            <!-- CUERPO -->
            <div class="modal-body">
                <div class="box-body">

                    <h4><strong>Datos Generales</strong></h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-3"><b>N° OT:</b> <span id="verNumOT"></span></div>
                        <div class="col-md-3"><b>Fecha:</b> <span id="verFecha"></span></div>
                        <div class="col-md-3"><b>Máquina:</b> <span id="verMaquina"></span></div>
                        <div class="col-md-3"><b>Centro Costo:</b> <span id="verCentro"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Usuario Creador:</b> <span id="verUsuario"></span></div>
                        <div class="col-md-4"><b>Km Actual:</b> <span id="verKm"></span></div>
                        <div class="col-md-4"><b>Estado:</b> <span id="verEstado"></span></div>
                    </div>

                    <br>
                    <h4><strong>Detalle de Tareas</strong></h4>
                    <hr>

                    <div id="divTablaDetalleOT">
                        <table class="table table-bordered table-striped" id="tablaDetalleOT">
                            <thead>
                                <tr>
                                    <th>
                                        <center>#</center>
                                    </th>
                                    <th>
                                        <center>Fecha</center>
                                    </th>
                                    <th>
                                        <center>Tipo Tarea</center>
                                    </th>
                                    <th>
                                        <center>Sistema</center>
                                    </th>
                                    <th>
                                        <center>Sub Sistema</center>
                                    </th>
                                    <th>
                                        <center>Observación</center>
                                    </th>
                                    <th>
                                        <center>Estado</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-center">Sin tareas registradas</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- PIE -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<script src="vistas/js/mantencion/listaOT.js"></script>
<!--=====================================
ESTILOS
======================================-->
<style>
    #divTablaOT {
        overflow: auto;
        width: 100%;
    }

    #tablaOT th,
    #tablaOT td {
        text-align: center;
        vertical-align: middle;
        font-size: 13px;
    }

    #tablaDetalleOT th,
    #tablaDetalleOT td {
        text-align: center;
        vertical-align: middle;
        font-size: 12.5px;
    }

    .modal-body span {
        font-weight: 500;
        color: #333;
    }

    .modal-header h4 {
        font-weight: bold;
    }

    .estado-activo {
        color: #28a745;
        font-weight: bold;
    }

    .estado-finalizado {
        color: #007bff;
        font-weight: bold;
    }

    .estado-cancelado {
        color: #dc3545;
        font-weight: bold;
    }
</style>
