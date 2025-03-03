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
                  <select class="form-control input-md" name="empresaAgregar" id="empresaAgregar">
                    <option value=" " selected>Seleccionar...</option>
                    <option value="SOCIEDAD DE TRANSPORTE NORTRANS SPA">SOCIEDAD DE TRANSPORTE NORTRANS SPA</option>
                    <option value="TRANSPORTE TRANSMAT LDTA">TRANSPORTE TRANSMAT LDTA</option>
                  </select>
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

                <button type="button" class="btn btn-primary" id="btnListaFichaContrato" style="background-color: #76D7C4;">
                  <i class="fa fa-list" aria-hidden="true"></i> Lista de Ficha Contrato
                </button>

                <button type="button" class="btn btn-primary" id="btnListaSolicitudes">
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
                              <center>Rut Empresa</center>
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
                              <center>Rut</center>
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

<script src="vistas/js/recursosHumanos/solicitudContratacion.js"></script>

  <!--Campo para ocultar y aparecer el sector ficha contrato y solicitudes activas-->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const btnListaFichaContrato = document.getElementById("btnListaFichaContrato")
    const btnListaSolicitudes = document.getElementById("btnListaSolicitudes")
    const panelFichaContrato = document.getElementById("panelFichaContrato")
    const panelListaSolicitudActivas = document.getElementById("panelListaSolicitudActivas")
    panelFichaContrato.style.display = "none"
    panelListaSolicitudActivas.style.display = "block"
    btnListaFichaContrato.addEventListener("click", () => {
      panelFichaContrato.style.display = "block"
      panelListaSolicitudActivas.style.display = "none"
    })
    btnListaSolicitudes.addEventListener("click", () => {
      panelListaSolicitudActivas.style.display = "block"
      panelFichaContrato.style.display = "none"
    })
  })
</script>