<div class="content-wrapper">

  <section class="content-header">
    <h1>Consulta de stock de productos</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
      <li class="active">Consulta de stock</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <!-- ===================== FILTROS ===================== -->
      <div class="box-header with-border" style="background:#B0B0B0; color:black;">
        <h4>Filtros</h4>
      </div>

      <div class="box-body">
        <div class="form-group col-sm-3 col-xs-12">
          <label>Bodega</label>
          <input type="text" class="form-control input-sm" id="bodega" value="Bodega industrial" readonly>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Tipo de producto</label>
          <select class="form-control input-sm" id="tipoProducto">
            <option value="">Seleccione...</option>
            <option value="Insumo">Insumo</option>
            <option value="Repuesto">Repuesto</option>
          </select>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Validar saldo</label>
          <select class="form-control input-sm" id="validarSaldo">
            <option value="con">Con saldos</option>
            <option value="sin">Sin saldos</option>
          </select>
        </div>

        <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
          <button class="btn btn-primary btn-block" id="btnBuscar"><i class="fa fa-search"></i> Buscar</button>
        </div>
      </div>

      <!-- ===================== LISTA ===================== -->
      <div class="box-header with-border" style="background:#D3D3D3; color:black;">
        <h4>Lista</h4>
      </div>

      <div class="box-body">
        <div id="div1">
          <table class="table table-bordered table-striped dt-responsive" id="tablaStock" width="100%">
            <thead>
              <tr>
                <th><center>Bodega</center></th>
                <th><center>Tipo Producto</center></th>
                <th><center>ID Producto</center></th>
                <th><center>Producto</center></th>
                <th><center>Unidad de medida</center></th>
                <th><center>Costo PMP</center></th>
                <th><center>Cantidad</center></th>
                <th><center>Stock mínimo</center></th>
                <th><center>Stock reorden</center></th>
              </tr>
            </thead>
            <tbody>
              <tr><td colspan="9" style="text-align:center;">No se encontraron registros.</td></tr>
            </tbody>
          </table>
        </div>

        <!-- Botón Excel -->
        <div class="col-sm-12 text-right" style="margin-top:15px;">
          <button class="btn btn-success" id="btnExportar"><i class="fa fa-file-excel-o"></i> Exportar a Excel</button>
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

<script src="vistas/js/bodegas/informeInventario.js"></script>