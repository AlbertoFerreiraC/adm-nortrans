<div class="content-wrapper">

    <!-- ENCABEZADO -->
    <section class="content-header">
        <h1>Consulta de Repuestos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Depósito</a></li>
            <li class="active">Repuestos</li>
        </ol>
    </section>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="content">
        <div class="box">

            <!-- CABECERA -->
            <div class="box-header with-border">
                <h3 class="box-title">Listado General de Repuestos</h3>
            </div>

            <!-- TABLA PRINCIPAL -->
            <div class="box-body">
                <div id="divTablaRepuestos">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaRepuestos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Familia</center>
                                </th>
                                <th>
                                    <center>Subfamilia</center>
                                </th>
                                <th>
                                    <center>Marca</center>
                                </th>
                                <th>
                                    <center>Modelo</center>
                                </th>
                                <th>
                                    <center>Descripción</center>
                                </th>
                                <th>
                                    <center>Aplicación</center>
                                </th>
                                <th>
                                    <center>Stock Mínimo</center>
                                </th>
                                <th>
                                    <center>Stock Máximo</center>
                                </th>
                                <th>
                                    <center>Ubicación</center>
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
                                <td colspan="12" class="text-center">Cargando datos...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<!--=====================================
MODAL VER DETALLE REPUESTO
======================================-->
<div id="modalVerRepuesto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- CABECERA -->
            <div class="modal-header" style="background:#007B9E; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle del Repuesto</h4>
            </div>

            <!-- CUERPO -->
            <div class="modal-body">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-4"><b>Familia:</b> <span id="verFamilia"></span></div>
                        <div class="col-md-4"><b>Subfamilia:</b> <span id="verSubFamilia"></span></div>
                        <div class="col-md-4"><b>Marca:</b> <span id="verMarca"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Modelo:</b> <span id="verModelo"></span></div>
                        <div class="col-md-4"><b>Sistema de Aplicación:</b> <span id="verSistema"></span></div>
                        <div class="col-md-4"><b>Código de Lectura:</b> <span id="verCodigo"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><b>Descripción:</b> <span id="verDescripcion"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Aplicación:</b> <span id="verAplicacion"></span></div>
                        <div class="col-md-4"><b>Año Desde:</b> <span id="verAnhoDesde"></span></div>
                        <div class="col-md-4"><b>Año Hasta:</b> <span id="verAnhoHasta"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Stock Mínimo:</b> <span id="verStockMinimo"></span></div>
                        <div class="col-md-4"><b>Stock Máximo:</b> <span id="verStockMaximo"></span></div>
                        <div class="col-md-4"><b>Stock Reposición:</b> <span id="verStockReposicion"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"><b>Ubicación X:</b> <span id="verUbicacionX"></span></div>
                        <div class="col-md-6"><b>Ubicación Y:</b> <span id="verUbicacionY"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"><b>Estado:</b> <span id="verEstado"></span></div>
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

<script src="vistas/js/mantencion/repuestosOt.js"></script>

<!--=====================================
ESTILOS
======================================-->
<style>
    #divTablaRepuestos {
        overflow: auto;
        width: 100%;
    }

    #tablaRepuestos th,
    #tablaRepuestos td {
        text-align: center;
        vertical-align: middle;
        font-size: 13px;
    }

    .modal-body span {
        font-weight: 500;
        color: #333;
    }

    .modal-header h4 {
        font-weight: bold;
    }

    #tablaRepuestos th {
        background: #f4f4f4;
    }

    .estado-activo {
        color: #28a745;
        font-weight: bold;
    }

    .estado-inactivo {
        color: #dc3545;
        font-weight: bold;
    }
</style>