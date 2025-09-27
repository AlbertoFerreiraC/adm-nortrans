<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">
    <section class="content-header">
        <h1>Anular SMS</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Anular SMS</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <!-- SIN botón "Nuevo" -->
                <div class="form-group col-sm-12 col-xs-12">
                    <input type="text"
                        style="text-align:center; font-size:17px;"
                        class="form-control input-sm"
                        id="filtradoDinamico"
                        autocomplete="off"
                        placeholder="Filtrado General ...">
                </div>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaOC" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>N° item</center>
                                </th>
                                <th>
                                    <center>Aplicacion</center>
                                </th>
                                <th>
                                    <center>Centro Costo</center>
                                </th>
                                <th>
                                    <center>Tipo Item</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>
                                    <center>N° OC</center>
                                </th>
                                <th>
                                    <center>Detalle OC</center>
                                </th>
                                <th>
                                    <center>Estado Item</center>
                                </th>
                                <th style="width:120px;">
                                    <center>Anular</center>
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

<script src="vistas/js/compras/anularSMS.js"></script>