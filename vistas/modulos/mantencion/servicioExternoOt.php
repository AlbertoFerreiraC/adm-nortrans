<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">
  <section class="content-header">
    <h1>Servicio Externo</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
      <li class="active">Servicio Externo</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <div class="form-group col-sm-3 col-xs-12">
          <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modalServicioExterno">
            <i class="fa fa-plus"></i> Nuevo Servicio
          </button>
        </div>

        <div class="form-group col-sm-9 col-xs-12">
          <input type="text" id="filtradoDinamico" class="form-control input-sm"
            style="text-align:center; font-size:17px;" placeholder="Filtrado general...">
        </div>
      </div>

      <div class="box-body">
        <div id="divTabla">
          <table class="table table-bordered table-striped dt-responsive" id="tablaServicioExterno" width="100%">
            <thead>
              <tr>
                <th style="width:10px">
                  <center>#</center>
                </th>
                <th>
                  <center>Fecha OT</center>
                </th>
                <th>
                  <center>Máquina</center>
                </th>
                <th>
                  <center>Proveedor</center>
                </th>
                <th>
                  <center>Acciones</center>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="6" class="text-center">Ningún registro disponible</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL SERVICIO EXTERNO
======================================-->
<div id="modalServicioExterno" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <form id="formServicioExterno" method="post">

        <div class="modal-header" style="background:#007B9E; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Generar Servicio Externo</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">

            <h4><strong>Datos del Servicio</strong></h4>
            <hr>

            <div class="form-group col-md-6 col-xs-6">
              <label for="fechaOt">Fecha OT:</label>
              <input type="date" id="fechaOt" class="form-control" required>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="tipoTarea">Tipo de Tarea:</label>
              <select id="tipoTarea" class="form-control" required>
                <option value="">Seleccionar...</option>
                <option value="MANTENIMIENTO">Mantenimiento</option>
                <option value="REPARACIÓN">Reparación</option>
                <option value="INSPECCIÓN">Inspección</option>
              </select>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="maquina">Máquina:</label>
              <select id="maquina" class="form-control" required></select>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="proveedor">Proveedor:</label>
              <select id="proveedor" class="form-control" required></select>
            </div>

            <div class="form-group col-md-12">
              <button type="button" class="btn btn-info" id="btnValidarTarea">
                <i class="fa fa-check"></i> Validar Tipo Tarea
              </button>
            </div>

            <!-- SECCIÓN CORRECTIVA (oculta hasta validar tipo tarea) -->
            <div id="seccionCorrectiva" style="display:none; margin-top:20px;">
              <div class="panel panel-default">
                <div class="panel-heading"><strong>Correctiva</strong></div>
                <div class="panel-body">

                  <div class="form-group col-md-6 col-xs-6">
                    <label for="sistema">Sistema:</label>
                    <select id="sistema" class="form-control"></select>
                  </div>

                  <div class="form-group col-md-6 col-xs-6">
                    <label for="subSistema">Sub Sistema:</label>
                    <select id="subSistema" class="form-control"></select>
                  </div>

                  <div class="form-group col-md-12 col-xs-12">
                    <label for="observacion">Observación (max. 350):</label>
                    <textarea id="observacion" class="form-control" rows="1" maxlength="350"></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <button type="button" class="btn btn-primary" id="btnAgregarTarea">
                      <i class="fa fa-plus"></i> Agregar Tarea
                    </button>
                  </div>

                  <div class="form-group col-md-12">
                    <table class="table table-bordered table-striped" id="tablaTareas">
                      <thead>
                        <tr>
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
                            <center>Eliminar</center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="4" class="text-center">Ningún dato disponible en esta tabla</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="kmActual">Km actual:</label>
                    <input type="number" id="kmActual" class="form-control" placeholder="Ingrese km actual">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="fechaHora">Fecha hora:</label>
                    <input type="datetime-local" id="fechaHora" class="form-control">
                  </div>

                  <div class="form-group col-md-12 text-right">
                    <button type="button" class="btn btn-success" id="btnGenerarServicio">
                      <i class="fa fa-cogs"></i> Generar Servicio Externo
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>

      </form>
    </div>
  </div>
</div>

<style>
  #divTabla {
    overflow: auto;
    width: 100%;
  }

  #tablaServicioExterno th,
  #tablaServicioExterno td,
  #tablaTareas th,
  #tablaTareas td {
    text-align: center;
    vertical-align: middle;
  }

  .panel-default {
    border-color: #ccc;
  }

  .panel-heading {
    background: #f1f1f1;
    font-weight: bold;
  }

  textarea {
    resize: none;
  }
</style>

<script src="vistas/js/mantencion/servicioExterno.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {

    $('#modalServicioExterno').on('shown.bs.modal', function() {

      const ahora = new Date();

      const fechaLocal = ahora.toISOString().split("T")[0];
      document.getElementById("fechaOt").value = fechaLocal;

      const zonaOffset = new Date().getTimezoneOffset() * 60000;
      const localISOTime = new Date(Date.now() - zonaOffset).toISOString().slice(0, 16);
      document.getElementById("fechaHora").value = localISOTime;

    });
  });
</script>