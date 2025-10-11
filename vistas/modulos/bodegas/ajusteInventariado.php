<div class="content-wrapper">

  <section class="content-header">
    <h1>Ajuste de Inventario</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
      <li class="active">Ajuste de Inventario</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <!-- ===================== DATOS DE CABECERA ===================== -->
      <div class="box-body">

        <div class="form-group col-sm-3 col-xs-12">
          <label>Motivo</label>
          <select class="form-control input-sm" id="motivo">
            <option value="">Seleccione...</option>
            <option value="Error de ingreso">Error de ingreso</option>
            <option value="Pérdida">Pérdida</option>
            <option value="Recuento físico">Recuento físico</option>
            <option value="Devolución">Devolución</option>
          </select>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Bodega</label>
          <select class="form-control input-sm" id="bodega">
            <option value="">Seleccione...</option>
            <option value="Bodega Industrial">Bodega Industrial</option>
            <option value="Bodega Comercial">Bodega Comercial</option>
          </select>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Tipo ajuste</label>
          <select class="form-control input-sm" id="tipoAjuste">
            <option value="">Seleccione...</option>
            <option value="Aumento">Aumento</option>
            <option value="Disminución">Disminución</option>
          </select>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Tipo Documento</label>
          <select class="form-control input-sm" id="tipoDoc">
            <option value="">Seleccione...</option>
            <option value="Factura">Factura</option>
            <option value="Nota de crédito">Nota de crédito</option>
            <option value="Nota de débito">Nota de débito</option>
          </select>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>N° Documento</label>
          <input type="text" class="form-control input-sm" id="nroDoc" placeholder="Ingrese número de documento">
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Seleccionar archivo</label>
          <input type="file" class="form-control input-sm" id="archivoAdjunto">
        </div>

        <div class="form-group col-sm-6 col-xs-12">
          <label>Observación</label>
          <textarea class="form-control input-sm" id="observacion" rows="2" placeholder="Observaciones adicionales..."></textarea>
        </div>

      </div>

      <!-- ===================== LISTA DE PRODUCTOS ===================== -->
      <div class="box-header with-border" style="background:#3C8DBC; color:white;">
        <h4>Lista de Productos</h4>
      </div>

      <div class="box-body">

        <div class="form-group col-sm-3 col-xs-12">
          <label>Tipo Producto</label>
          <select class="form-control input-sm" id="tipoProducto">
            <option value="">Seleccione...</option>
            <option value="Repuesto">Repuesto</option>
            <option value="Insumo">Insumo</option>
          </select>
        </div>

        <div class="form-group col-sm-3 col-xs-12">
          <label>Producto</label>
          <select class="form-control input-sm" id="producto">
            <option value="">Seleccione producto...</option>
          </select>
        </div>

        <div class="form-group col-sm-2 col-xs-12">
          <label>Costo actual</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" id="costoActual" class="form-control input-sm" value="0" readonly>
          </div>
        </div>

        <div class="form-group col-sm-2 col-xs-12">
          <label>Costo unitario neto</label>
          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" id="costoUnitario" class="form-control input-sm" placeholder="Nuevo costo">
          </div>
        </div>

        <div class="form-group col-sm-1 col-xs-12">
          <label>Cant. Actual</label>
          <input type="text" class="form-control input-sm" id="cantidadActual" value="0" readonly>
        </div>

        <div class="form-group col-sm-1 col-xs-12">
          <label>Cant. Ajuste</label>
          <input type="number" class="form-control input-sm" id="cantidadAjuste" placeholder="+ / -">
        </div>

        <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
          <button class="btn btn-primary btn-block" id="btnAgregar"><i class="fa fa-plus"></i> Agregar Producto</button>
        </div>

        <div class="col-sm-12" style="margin-top:15px;">
          <table class="table table-bordered table-striped dt-responsive" id="tablaProductos" width="100%">
            <thead>
              <tr>
                <th><center>Tipo producto</center></th>
                <th><center>ID producto</center></th>
                <th><center>Producto</center></th>
                <th><center>Saldo Actual</center></th>
                <th><center>Costo Unitario</center></th>
                <th><center>Cantidad Ajuste</center></th>
                <th><center>Saldo Final</center></th>
                <th><center>Eliminar</center></th>
              </tr>
            </thead>
            <tbody>
              <tr><td colspan="8" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>
            </tbody>
          </table>
        </div>

        <div class="col-sm-12 text-right" style="margin-top:15px;">
          <button class="btn btn-success btn-lg" id="btnAjuste"><i class="fa fa-check"></i> Realizar ajuste</button>
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


<script src="vistas/js/bodegas/ajusteInventariado.js"></script>