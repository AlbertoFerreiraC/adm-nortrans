<div class="content-wrapper">

  <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
    <h1 style="color: white; font-weight: bold;">Personal: Crear Ficha Contrato</h1>
  </section>

  <section class="content">
    <div class="box">

      <div class="panel-group" id="frm:j_idt110">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-opcion">
              <a data-toggle="collapse" href="#frm_j_idt110_content"
                class="panel-opcion-link" aria-expanded="true">Opciones</a>
            </h4>
          </div>

          <div id="frm_j_idt110_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="form-group col-sm-3">
                  <label for="empresaAgregar">Empresa:</label>
                  <select class="form-control input-md" name="empresaAgregar" id="empresaAgregar"></select>
                </div>

                <div class="form-group col-sm-3">
                  <label for="numeroFicha">N° Ficha:</label>
                  <input type="number" class="form-control input-md" name="numeroFicha" id="numeroFicha" placeholder=" ">
                </div>
              </div>

              <div style="margin-top: 25px;"></div>

              <div class="d-flex gap-3 align-items-center">
                <button type="button" class="btn btn-primary" id="btnBuscar">
                  <i class="fa fa-search" aria-hidden="true"></i> Buscar
                </button>

                <button type="button" class="btn btn-primary" id="btnListaFichaContrato">
                  <i class="fa fa-list" aria-hidden="true"></i> Lista de Ficha Contrato
                </button>

                <button type="button" class="btn btn-primary" id="btnListaSolicitudes"" style=" background-color: #FF6600;">
                  <i class="fa fa-file" aria-hidden="true"></i> Lista de Solicitudes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel-group" id="panelListaSolicitudActivas">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-panel-listaSolicitudActivas-link">
              <a data-toggle="collapse" href="#listaSolicitudActivas_content"
                class="panel-listaSolicitudActivas-link" aria-expanded="true">Listas de Solicitud Activas</a>
            </h4>
          </div>

          <div id="listaSolicitudActivas_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="table-container">
                <div class="table-responsive">
                  <div class="box-body">
                    <div id="lista">
                      <table class="table table-bordered table-striped dt-responsive" id="listaSolicitud" width="100%" style="text-align: center;">
                        <thead>
                          <tr>
                            <th style="width:120px">
                              <center>Id Solicitud</center>
                            </th>
                            <th>
                              <center>Empresa</center>
                            </th>
                            <th>
                              <center>Fecha Solicitud</center>
                            </th>
                            <th>
                              <center>Solicitante</center>
                            </th>
                            <th>
                              <center>Division</center>
                            </th>
                            <th>
                              <center>Cargo</center>
                            </th>
                            <th>
                              <center>Cantidad Solicitada</center>
                            </th>
                            <th>
                              <center>Cantidad Contratada</center>
                            </th>
                            <th>
                              <center>Seleccionar</center>
                            </th>
                            <th>
                              <center>Impresión</center>
                            </th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel-group" id="panelFichaContrato">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-panel-fichaContrato-link">
              <a data-toggle="collapse" href="#fichaContrato_content"
                class="panel-fichaContrato-link" aria-expanded="true">Listas de Ficha Contrato</a>
            </h4>
          </div>

          <div id="fichaContrato_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="table-container">
                <div class="table-responsive">
                  <div class="box-body">
                    <div id="ficha">
                      <table class="table table-bordered table-striped dt-responsive" id="fichaContrato" width="100%" style="text-align: center;">
                        <thead>
                          <tr>
                            <th style="width:120px">
                              <center>N° Ficha</center>
                            </th>
                            <th>
                              <center>Empresa</center>
                            </th>
                            <th>
                              <center>Nombre</center>
                            </th>
                            <th>
                              <center>Fecha Contratación</center>
                            </th>
                            <th>
                              <center>Tipo Contrato</center>
                            </th>
                            <th>
                              <center>Tipo Turno</center>
                            </th>
                            <th>
                              <center>Editar</center>
                            </th>
                            <th>
                              <center>Terminar</center>
                            </th>

                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!--=====================================
MODAL AGREGAR TAREA
======================================-->

  <div id="modalAgregar" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form role="form" method="post" id="formulario_para_agregar">

          <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#A9A9A9; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Ingreso de solicitud</h4>

          </div>

          <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

          <div class="modal-body">

            <div class="box-body">


              <div class="form-group col-sm-4 col-xs-12">
                <label for="equipoAgregar">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto solo-ruc" name="motivoAgregar" id="motivoAgregar">
                  <option value=" ">Seleccionar...</option>
                  <option value="Reemplazo dotación">Reemplazo dotación</option>
                  <option value="Aumento dotación">Aumento dotación</option>
                </select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="divisionAgregar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto solo-ruc" name="divisionAgregar" id="divisionAgregar">
                  <option value=" "></option>
                  <option value=" ">Seleccionar...</option>
                  <option value="Industrial" selected>Industrial</option>
                  <option value="Interurbano">Interurbano</option>
                </select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="cargoAgregar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto solo-ruc" name="cargoAgregar" id="cargoAgregar"></select>
              </div>

              <div class="form-group col-sm-6 col-xs-12">
                <label for="empresaAgregar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto solo-ruc" name="empresaAgregar" id="empresaAgregar"></select>
              </div>

              <div class="form-group col-sm-6 col-xs-12">
                <label for="centroDecostoAgregar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto solo-ruc" name="centroDecostoAgregar" id="centroDecostoAgregar"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="cantidadAgregar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="number" class="form-control input-md cajatexto" name="cantidadAgregar" id="cantidadAgregar">
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="equipoAgregar">Tipo equipo (opcional):</label>
                <select class="form-control input-md cajatexto" id="equipoAgregar" name="equipoAgregar"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="licenciaAgregar">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="licenciaAgregar" name="licenciaAgregar">
                  <option value="Seleccionar...">Seleccionar...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class="form-group col-sm-12 col-xs-12">
                <label for="tipoturnoAgregar">Tipo Turno:</label>
                <select class="form-control input-md cajatexto" id="tipoturnoAgregar" name="tipoturnoAgregar"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="tipocontratoAgregar">Tipo contrato:</label>
                <select class="form-control input-md cajatexto" id="tipocontratoAgregar" name="tipocontratoAgregar" onchange="mostrarFechaTermino()">
                  <option value=" ">Seleccionar...</option>
                  <option value="Indefinido">Indefinido</option>
                  <option value="Plazo Fijo">Plazo Fijo</option>
                  <option value="Por Obra">Por Obra</option>
                  <option value="Spot">Spot</option>
                </select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="fecharequeridaAgregar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="date" class="form-control input-md cajatexto" name="fecharequeridaAgregar" id="fecharequeridaAgregar" onchange="calcularFechaTermino()">
              </div>

              <div class="form-group col-sm-4 col-xs-12" id="fechaTerminoDiv" style="display: none;">
                <label for="fechaterminoAgregar">Fecha Término:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="date" class="form-control input-md cajatexto" name="fechaterminoAgregar" id="fechaterminoAgregar">
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="remuneracionAgregar">Remuneración líquida:</label>
                <input type="number" class="form-control input-md cajatexto" name="remuneracionAgregar" id="remuneracionAgregar">
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="observacionEntrevistaPsicolaboral">Entrevista Psicolaboral:</label>
                <textarea class="form-control input-md cajatexto" name="observacionEntrevistaPsicolaboral" id="observacionEntrevistaPsicolaboral" rows="1"></textarea>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="observacionEntrevistaTecnica">Entrevista Tecnica:</label>
                <textarea class="form-control input-md cajatexto" name="observacionEntrevistaTecnica" id="observacionEntrevistaTecnica" rows="1"></textarea>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="observacionPruebaConduccion">Prueba de Conduccion:</label>
                <textarea class="form-control input-md cajatexto" name="observacionPruebaConduccion" id="observacionPruebaConduccion" rows="1"></textarea>
              </div>

              <div class="col-md-12 col-xs-12">
                <div class="box box-success">
                  <div class="box-body">
                    <div class="form-group col-sm-4 col-xs-12">
                      <label for="comentarioAgregar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139; padding-left: 15px;"> (Obligatorio)</span>
                      <textarea class="form-control input-md cajatexto" name="comentarioAgregar" id="comentarioAgregar" rows="1"></textarea>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                      <label for="preapruebaAgregar">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                      <select class="form-control input-md cajatexto" id="preapruebaAgregar" name="preapruebaAgregar"></select>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                      <label for="apruebaAgregar">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                      <select class="form-control input-md cajatexto" id="apruebaAgregar" name="apruebaAgregar"></select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--=====================================
        PIE DEL MODAL
        ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>

          </div>

        </form>

      </div>

    </div>

  </div>

  <style>
    #lista table {
      font-size: 10px;
    }

    #lista th {
      font-size: 13px;
    }

    #lista td {
      font-size: 15px;
    }

    .panel-listaSolicitudActivas-link:focus,
    .panel-listaSolicitudActivas-link:active {
      text-decoration: underline;
    }

    .panel-opcion-link:focus,
    .panel-opcion-link:active {
      text-decoration: underline;
    }
  </style>

</div>

<script src="vistas/js/recursosHumanos/fichaContrato.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const btnListaFichaContrato = document.getElementById("btnListaFichaContrato");
    const btnListaSolicitudes = document.getElementById("btnListaSolicitudes");
    const panelFichaContrato = document.getElementById("panelFichaContrato");
    const panelListaSolicitudActivas = document.getElementById("panelListaSolicitudActivas");

    const urlParams = new URLSearchParams(window.location.search);
    const view = urlParams.get("view");

    if (view === "listaSolicitudes") {
      panelFichaContrato.style.display = "none";
      panelListaSolicitudActivas.style.display = "block";
    } else {
      panelFichaContrato.style.display = "block";
      panelListaSolicitudActivas.style.display = "none";
    }

    btnListaFichaContrato.addEventListener("click", () => {
      panelFichaContrato.style.display = "block";
      panelListaSolicitudActivas.style.display = "none";
    });

    btnListaSolicitudes.addEventListener("click", () => {
      panelListaSolicitudActivas.style.display = "block";
      panelFichaContrato.style.display = "none";
    });
  });
</script>