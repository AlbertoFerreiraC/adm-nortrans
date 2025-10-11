<div class="content-wrapper">

    <section class="content-header">
        <h1>Consulta de movimientos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
            <li class="active">Consulta de movimientos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <!-- ===================== FILTROS ===================== -->
            <div class="box-header with-border" style="background:#D3D3D3; color:black;">
                <h4>Filtros</h4>
            </div>

            <div class="box-body">

                <div class="form-group col-sm-3 col-xs-12">
                    <label>Seleccionar Filtro</label>
                    <select class="form-control input-sm" id="tipoFiltro">
                        <option value="">Seleccione...</option>
                        <option value="Repuesto">Repuesto</option>
                        <option value="Insumo">Insumo</option>
                        <option value="CentroCosto">Centro de costo</option>
                        <option value="Fecha">Rango de fechas</option>
                        <option value="Movimiento">Tipo de movimiento</option>
                    </select>
                </div>

                <!-- Campo dinámico que cambia según filtro -->
                <div class="form-group col-sm-4 col-xs-12" id="contenedorFiltro"></div>

                <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
                    <button class="btn btn-info btn-block" id="btnAgregarFiltro"><i class="fa fa-plus"></i> Agregar Filtro</button>
                </div>

                <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
                    <button class="btn btn-primary btn-block" id="btnBuscar"><i class="fa fa-search"></i> Buscar</button>
                </div>

                <!-- Filtros activos -->
                <div class="col-sm-12" style="margin-top:15px;" id="filtrosActivos"></div>
            </div>

            <!-- ===================== LISTA ===================== -->
            <div class="box-header with-border" style="background:#E8E8E8; color:black;">
                <h4>Lista de movimientos</h4>
            </div>

            <div class="box-body">
                <div id="div1">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaMovimientos" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <center>ID Mov.</center>
                                </th>
                                <th>
                                    <center>Tipo Mov.</center>
                                </th>
                                <th>
                                    <center>Tipo Documento</center>
                                </th>
                                <th>
                                    <center>N° Documento</center>
                                </th>
                                <th>
                                    <center>N° Ítem</center>
                                </th>
                                <th>
                                    <center>Fecha Mov.</center>
                                </th>
                                <th>
                                    <center>ID Producto</center>
                                </th>
                                <th>
                                    <center>Producto</center>
                                </th>
                                <th>
                                    <center>Costo Unitario</center>
                                </th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>
                                    <center>Bodega Origen</center>
                                </th>
                                <th>
                                    <center>Bodega Destino</center>
                                </th>
                                <th>
                                    <center>Centro Costo</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="13" style="text-align:center;">Ningún dato disponible en esta tabla</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Botones de exportación -->
                <div class="col-sm-12 text-right" style="margin-top:15px;">
                    <button class="btn btn-success" id="btnExcel"><i class="fa fa-file-excel-o"></i> Excel</button>
                    <button class="btn btn-danger" id="btnPDF"><i class="fa fa-file-pdf-o"></i> PDF</button>
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

    .badge-filtro {
        display: inline-block;
        margin: 3px;
        padding: 6px 10px;
        background: #5bc0de;
        color: white;
        border-radius: 4px;
    }

    .badge-filtro button {
        background: transparent;
        border: none;
        color: white;
        margin-left: 5px;
    }
</style>