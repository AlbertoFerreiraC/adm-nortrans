<div class="content-wrapper">
  <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
    <h1 style="color: white; font-weight: bold;">Servicio OT: Editar OT</h1>
  </section>

  <section class="content">
    <div class="box">

      <!-- PANEL: DATOS DE LA OT -->
      <div class="panel-group" id="frm:j_idt110">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-opcion">
              <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                Datos de la OT
              </a>
            </h4>
          </div>

          <div id="frm_j_idt110_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="row">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="numeroOt">N° OT</label>
                  <input class="form-control input-md cajatexto solo-ruc" name="numeroOt" id="numeroOt">
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <button type="button" class="btn btn-primary btn-block" id="btnBuscarOt"
                    style="background-color: #FF6600; margin-top: 25px;">
                    <i class="fa fa-search" aria-hidden="true"></i> Buscar
                  </button>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-3 col-xs-12">
                  <label for="fechaOt">Fecha</label>
                  <input type="text" class="form-control input-md cajatexto" name="fechaOt" id="fechaOt" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="maquinaOt">Maquina</label>
                  <input type="text" class="form-control input-md cajatexto" name="maquinaOt" id="maquinaOt" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="kmIngresado">Km ingresado</label>
                  <input type="text" class="form-control input-md cajatexto" name="kmIngresado" id="kmIngresado" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="tipoOt">Tipo OT</label>
                  <input type="text" class="form-control input-md cajatexto" name="tipoOt" id="tipoOt" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="creadoPor">Creado por:</label>
                  <input type="text" class="form-control input-md cajatexto" name="creadoPor" id="creadoPor" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="tipoMaquina">Tipo de Maquina</label>
                  <input type="text" class="form-control input-md cajatexto" name="tipoMaquina" id="tipoMaquina" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="idAño">Año</label>
                  <input type="text" class="form-control input-md cajatexto" name="idAño" id="idAño" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="marcaChasis">Marca Chasis</label>
                  <input type="text" class="form-control input-md cajatexto" name="marcaChasis" id="marcaChasis" disabled>
                </div>

                <div class="form-group col-sm-3 col-xs-12">
                  <label for="modeloChasis">Modelo Chasis</label>
                  <input type="text" class="form-control input-md cajatexto" name="modeloChasis" id="modeloChasis" disabled>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- PANEL: LISTA DE TAREAS -->
      <div class="panel-group" id="panelListaSolicitudActivas">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-opcion">
              <a data-toggle="collapse" href="#listaSolicitudActivas_content"
                class="panel-opcion-link" aria-expanded="true">Lista de las Tareas</a>
            </h4>
          </div>

          <!-- ID CORREGIDO -->
          <div id="listaSolicitudActivas_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="table-container">
                <div class="table-responsive">
                  <div class="box-body">
                    <div id="ficha">

                      <!-- CONTROLES: Mostrar registros y Buscar -->
                      <div class="table-controls">
                        <div class="control-left">
                          <label for="entriesSelect"><strong>Mostrar</strong>
                            <select id="entriesSelect" onchange="updateVisibleRows()">
                              <option value="5">5</option>
                              <option value="10" selected>10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                            </select>
                            <strong>registros</strong>
                          </label>
                        </div>

                        <div class="control-right">
                          <label for="searchInput"><strong>Buscar:</strong>
                            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Escriba para buscar...">
                          </label>
                        </div>
                      </div>

                      <!-- TABLA -->
                      <table class="table table-bordered table-striped dt-responsive" id="fichaContrato"
                        width="100%" style="text-align: center;">
                        <thead>
                          <tr>
                            <th><center>Nº Tarea</center></th>
                            <th><center>Fecha</center></th>
                            <th><center>Tipo Tarea</center></th>
                            <th><center>Técnico</center></th>
                            <th><center>Sistema</center></th>
                            <th><center>Sub sistema</center></th>
                            <th><center>Observación</center></th>
                            <th><center>Estado</center></th>
                            <th><center>Nº Tarea Origen</center></th>
                            <th><center>Selección</center></th>
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

      <!-- BOTÓN AGREGAR TAREA -->
      <div class="form-group col-sm-4 col-xs-12">
        <button type="button" class="btn btn-primary btn-block" id="aggTarea"
          style="background-color: #FF6600; margin-top: 25px;">
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar Tarea
        </button>
      </div>

    </div>
  </section>
</div>

<!-- === ESTILOS === -->
<style>
  .table-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 10px;
    padding: 5px 10px;
  }

  .table-controls label {
    font-weight: 500;
  }

  .table-controls select {
    margin: 0 5px;
    padding: 3px 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
  }

  .table-controls input {
    margin-left: 5px;
    padding: 3px 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
</style>

<!-- === SCRIPTS === -->
<script>
  // FILTRO Y PAGINACIÓN BÁSICA
  function filterTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const table = document.getElementById("fichaContrato");
    const rows = table.tBodies[0].rows;

    Array.from(rows).forEach(row => {
      const cells = Array.from(row.cells);
      const match = cells.some(cell => cell.textContent.toLowerCase().includes(input));
      row.style.display = match ? "" : "none";
    });
  }

  function updateVisibleRows() {
    const limit = parseInt(document.getElementById("entriesSelect").value);
    const table = document.getElementById("fichaContrato");
    const rows = Array.from(table.tBodies[0].rows);

    let visibleCount = 0;
    rows.forEach(row => {
      if (row.style.display !== "none") {
        visibleCount++;
        row.style.display = visibleCount <= limit ? "" : "none";
      }
    });
  }
</script>
