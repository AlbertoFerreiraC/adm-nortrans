<div class="content-wrapper">

    <section class="content-header">
        <h1>Consulta de traspasos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
            <li class="active">Consulta de traspasos</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <!-- ===================== FILTRO ===================== -->
            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12">
                    <label>Bodega Origen</label>
                    <input type="text" class="form-control input-sm" id="bodegaOrigen" value="Bodega industrial" readonly>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                    <label>N° de traspaso</label>
                    <input type="number" class="form-control input-sm" id="nroTraspaso" placeholder="Ej: 1205">
                </div>

                <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
                    <button class="btn btn-primary btn-block" id="btnBuscar"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>

            <!-- ===================== DETALLES DEL TRASPASO ===================== -->
            <div class="box-body">

                <div class="col-sm-12" style="margin-bottom:10px;">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>N° Traspaso</b></td>
                            <td id="numTraspaso">0</td>
                            <td><b>Bodega Origen</b></td>
                            <td id="bodegaOrigenTxt">-</td>
                            <td><b>Bodega Destino</b></td>
                            <td id="bodegaDestinoTxt">-</td>
                        </tr>
                        <tr>
                            <td><b>Fecha Salida</b></td>
                            <td id="fechaSalida">-</td>
                            <td><b>Usuario salida</b></td>
                            <td id="usuarioSalida">-</td>
                            <td><b>Estado</b></td>
                            <td id="estadoTraspaso">-</td>
                        </tr>
                    </table>
                </div>

                <!-- ===================== TABLA DE PRODUCTOS ===================== -->
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaProductos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>Tipo producto</center>
                                </th>
                                <th>
                                    <center>ID producto</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>
                                    <center>Costo unitario</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;">Ningún dato disponible en esta tabla</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </section>
</div>

<style>
    #div1 {
        overflow: scroll;
        width: 100%;
    }

    #div1 table {
        width: 100%;
        background-color: #f4f4f4;
    }
</style>

<script src="vistas/js/bodegas/consultaDeTraspaso.js"></script> 