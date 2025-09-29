<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Informe documento por máquina</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <!-- Filtro dinámico -->
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
                    <table class="table table-bordered table-striped dt-responsive" id="tablaMaquinas" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>ID</center>
                                </th>
                                <th>
                                    <center>Patente</center>
                                </th>
                                <th>
                                    <center>Tipo de Documento</center>
                                </th>
                                <th>
                                    <center>Fecha Vencimiento</center>
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

<script src="vistas/js/activos/docInformeMaquina.js"></script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f5f5f5;
    }

    #tablaMaquinas th {
        text-align: center;
        font-size: 13px;
        background-color: #f4f4f4;
        border: 1px solid #ddd !important;
    }

    #tablaMaquinas td {
        text-align: center;
        font-size: 15px;
        border: 1px solid #ddd !important;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-container {
        margin: 15px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .panel-group {
        margin-bottom: 15px;
    }
</style>