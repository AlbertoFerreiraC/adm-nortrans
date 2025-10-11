<div class="content-wrapper">

  <section class="content-header">
    <h1>Solicitud de anulación de entrega</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Bodega</a></li>
      <li class="active">Solicitud de anulación</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">

      <!-- Filtro búsqueda -->
      <div class="box-header with-border">
        <h4>Datos de la solicitud</h4>
        <div class="form-group col-sm-3 col-xs-12">
          <label for="nroEntrega">N° Entrega</label>
          <input type="number" id="nroEntrega" class="form-control input-sm" min="1" placeholder="Ingrese número de entrega">
        </div>

        <div class="form-group col-sm-2 col-xs-12" style="margin-top:25px;">
          <button class="btn btn-primary btn-block" id="btnBuscar"><i class="fa fa-search"></i> Buscar</button>
        </div>
      </div>

      <div class="box-body">

        <!-- Cabecera de la entrega -->
        <div class="row">
          <div class="form-group col-sm-3 col-xs-12">
            <label>Fecha</label>
            <input type="text" id="fechaEntrega" class="form-control input-sm" readonly>
          </div>
          <div class="form-group col-sm-3 col-xs-12">
            <label>Bodega</label>
            <input type="text" id="bodegaEntrega" class="form-control input-sm" readonly>
          </div>
        </div>

        <!-- Tabla de productos -->
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-striped dt-responsive" id="tablaProductos" width="100%">
              <thead>
                <tr>
                  <th><center>Item</center></th>
                  <th><center>Tipo producto</center></th>
                  <th><center>ID producto</center></th>
                  <th><center>Producto</center></th>
                  <th><center>Cantidad</center></th>
                  <th><center>U.M.</center></th>
                  <th><center>Centro costo</center></th>
                </tr>
              </thead>
              <tbody>
                <tr><td colspan="7" style="text-align:center;">No se encontraron registros.</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Comentario -->
        <div class="row" style="margin-top:20px;">
          <div class="form-group col-sm-8 col-xs-12">
            <label>Comentario</label>
            <textarea id="comentario" class="form-control input-sm" maxlength="200" rows="3" placeholder="Ingrese el motivo de la anulación..."></textarea>
            <small id="contadorCaracteres" class="text-muted">200 caracteres restantes</small>
          </div>

          <div class="form-group col-sm-4 col-xs-12 text-center" style="margin-top:30px;">
            <button class="btn btn-success btn-lg" id="btnSolicitar"><i class="fa fa-ban"></i> Solicitar anulación</button>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<!-- MODAL CONFIRMAR ANULACIÓN -->
<div id="modalConfirmar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formConfirmar" method="post">
        <div class="modal-header" style="background:#A9A9A9; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirmar solicitud de anulación</h4>
        </div>

        <div class="modal-body">
          <p>¿Está seguro de solicitar la anulación de la entrega <b id="entregaModal"></b>?</p>
          <p class="text-danger">Esta solicitud será enviada para revisión.</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="btnConfirmarAnulacion"><i class="fa fa-check"></i> Confirmar</button>
        </div>
      </form>
    </div>
  </div>
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

<script src="vistas/js/bodegas/anulacionSMS.js"></script>