<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Plazo de entrega orden de compra</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Compras</a></li>
            <li class="active">Administrar Plazo de entrega orden de compra</li>
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
                                    <center>Empresa</center>
                                </th>
                                <th>
                                    <center>N° OC</center>
                                </th>
                                <th>
                                    <center>Fecha creación</center>
                                </th>
                                <th>
                                    <center>Rut proveedor</center>
                                </th>
                                <th>
                                    <center>Proveedor</center>
                                </th>
                                <th>
                                    <center>Monto</center>
                                </th>
                                <th>
                                    <center>Pre Aprobado por</center>
                                </th>
                                <th style="width:120px;">
                                    <center>Seleccionar</center>
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

<script src="vistas/js/compras/aprobarOC.js"></script>