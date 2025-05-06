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
                    <div class="control-right">
                      <label for="searchInput">Buscar:
                        <input type="text" id="searchInput" onkeyup="filterTableSolicitud()" placeholder="Escriba para buscar...">
                      </label>
                    </div>
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
                            <center>Cantidad a Contratar</center>
                          </th>
                          <th>
                            <center>Seleccionar</center>
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
                    <div class="control-right">
                      <label for="searchInput">Buscar:
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Escriba para buscar...">
                      </label>
                    </div>
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

</div>
</section>

<!--=====================================
      MODAL EDITAR TAREA
      ======================================-->

<div id="modalVerMas" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#A9A9A9; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Registro de solicitud</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">


          <div class="form-group col-sm-4 col-xs-12">
            <label for="motivoModificar">Motivo:</label>
            <input type="text" class="form-control input-md cajatexto" name="motivoModificar" id="motivoModificar" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="divisionModificar">División:</label>
            <input type="text" class="form-control input-md cajatexto" name="divisionModificar" id="divisionModificar" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cargoModificar">Cargo solicitado:</label>
            <input type="text" class="form-control input-md cajatexto" name="cargoModificar" id="cargoModificar" disabled>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="empresaModificar">Razon social:</label>
            <input type="text" class="form-control input-md cajatexto" name="empresaModificar" id="empresaModificar" disabled>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="centroDecostoModificar">Centro costo:</label>
            <input type="text" class="form-control input-md cajatexto" name="centroDecostoModificar" id="centroDecostoModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="cantidadModificar">Cantidad solicitada:</label>
            <input type="text" class="form-control input-md cajatexto" name="cantidadModificar" id="cantidadModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="equipoModificar">Tipo equipo (opcional):</label>
            <input type="text" class="form-control input-md cajatexto" name="equipoModificar" id="equipoModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="licenciaModificar">Licencia conducir:</label>
            <input type="text" class="form-control input-md cajatexto" name="licenciaModificar" id="licenciaModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="tipoturnoModificar">Tipo Turno:</label>
            <input type="text" class="form-control input-md cajatexto" name="tipoturnoModificar" id="tipoturnoModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12" id="fechaTerminoDiv">
            <label for="estadoContratacion">Estado Contratación:</label>
            <input type="text" class="form-control input-md cajatexto" name="estadoContratacion" id="estadoContratacion" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="tipocontratoModificar">Tipo contrato:</label>
            <input type="text" class="form-control input-md cajatexto" name="tipocontratoModificar" id="tipocontratoModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="fecharequeridaModificar">Fecha requerida:</label>
            <input type="text" class="form-control input-md cajatexto" name="fecharequeridaModificar" id="fecharequeridaModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12" id="fechaTerminoDiv">
            <label for="fechaterminoModificar">Fecha Término:</label>
            <input type="text" class="form-control input-md cajatexto" name="fechaterminoModificar" id="fechaterminoModificar" disabled>
          </div>

          <div class="form-group col-sm-3 col-xs-12">
            <label for="remuneracionModificar">Remuneración líquida:</label>
            <input type="text" class="form-control input-md cajatexto" name="remuneracionModificar" id="remuneracionModificar" disabled>
          </div>


          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="preapruebaComentarioMod">Comentario Preaprueba:</label>
                  <textarea class="form-control input-md cajatexto" id="preapruebaComentarioMod" name="preapruebaComentarioMod" rows="3" disabled></textarea>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="apruebaComentarioMod">Comentario Aprueba:</label>
                  <textarea class="form-control input-md cajatexto" id="apruebaComentarioMod" name="apruebaComentarioMod" rows="3" disabled></textarea>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="comentarioGeneral">Comentario General:</label>
                  <textarea class="form-control input-md cajatexto" id="comentarioGeneral" name="comentarioGeneral" rows="3" disabled></textarea>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--=====================================
MODAL AGREGAR TAREA
======================================-->

<div id="modalEditar" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="formulario_para_editar">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificación de la Ficha Contrato</h4>
        </div>

        <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

        <div class="modal-body">
          <div class="box-body">
            <section class="content">
              <div class="box">
                <div class="panel-group" id="panelFicha">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                      <h4 class="panel-ficha">
                        <a data-toggle="collapse" href="#panelFicha_content" class="panel-ficha-link" aria-expanded="true">
                          Ficha
                        </a>
                      </h4>
                    </div>

                    <div id="panelFicha_content" class="panel-collapse collapse in">
                      <div class="panel-body">

                        <div class="form-group col-sm-3 col-xs-12 d-flex flex-column align-items-center justify-content-center">
                          <label for="rutAgregar" class="text-center mb-2">Rut</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar" disabled>
                        </div>

                        <div class="form-group col-sm-6 col-xs-12">
                          <label for="nomSelec">Nombre:</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="nomSelec" id="nomSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="telSelec">Teléfono:</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="telSelec" id="telSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="numeroFichaSelec">N° de Ficha:</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="numeroFichaSelec" id="numeroFichaSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="idSolicitudSelec">Id Solicitud:</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="idSolicitudSelec" id="idSolicitudSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="EmpresaSelec">Empresa: (Definida)</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="EmpresaSelec" id="EmpresaSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="divisionSelec">División:</label>
                          <input class="form-control input-md cajatexto solo-ruc" name="divisionSelec" id="divisionSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="CargoSelec">Cargo:</label>
                          <input class="form-control input-md cajatexto" id="CargoSelec" name="CargoSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="tipocontratoSelec">Tipo Contrato:</label>
                          <input class="form-control input-md cajatexto" id="tipocontratoSelec" name="tipocontratoSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="tipoTurnoSelec">Tipo Turno:</label>
                          <input class="form-control input-md cajatexto" id="tipoTurnoSelec" name="tipoTurnoSelec" disabled>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="empresaModSelec">Empresa:</label>
                          <select class="form-control input-md cajatexto" id="empresaModSelec" name="empresaModSelec"></select>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="fechainicioSelec">Fecha Inicio:</label>
                          <input type="date" class="form-control input-md cajatexto" name="fechainicioSelec" id="fechainicioSelec" onchange="calcularFechaTermino()">
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="sueldoLiquidoSelec">Sueldo Líquido:</label>
                          <input class="form-control input-md cajatexto puntos_de_mil" id="sueldoLiquidoSelec" name="sueldoLiquidoSelec">
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="sueldoLiquidoSelec"></label>
                          <button type="button" class=" form-control btn btn-primary" id="btnGrabarFicha">
                            <i class="fa fa-search" aria-hidden="true"></i> Actualizar Ficha
                          </button>
                        </div>
                      </div> <!-- Cierre correcto de panel-body -->
                    </div> <!-- Cierre correcto de panel-collapse -->
                  </div> <!-- Cierre correcto de panel-default -->
                </div> <!-- Cierre correcto de panel-group -->
              </div>
            </section>
          </div>
        </div>

        <section class="content">
          <div class="box">
            <!-- Navegación por pestañas -->
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
              <li class="nav-item active">
                <a class="nav-link active" id="requisitos-tab" data-toggle="tab" href="#requisitos-content" role="tab">
                  Requisitos solicitados
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="datos-tab" data-toggle="tab" href="#datos-content" role="tab">
                  Datos contractuales
                </a>
              </li>
            </ul>

            <!-- Contenido de las pestañas -->
            <div class="tab-content" id="myTabContent">
              <!-- Pestaña de Requisitos Solicitados -->
              <div class="tab-pane fade in active" id="requisitos-content" role="tabpanel">
                <div class="panel-group" id="panelRequisitos">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="seleccionRequisito">Requisito de Selección</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="seleccionRequisito" id="seleccionRequisito"></select>
                          </div>

                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="comentarioRequisito">Comentario:</label><span></span>
                            <textarea class="form-control input-md cajatexto" name="comentarioRequisito" id="comentarioRequisito" rows="1"></textarea>
                          </div>

                          <div class="form-group col-sm-9 col-xs-12">
                            <label for="documentoRequisito">Adjunto:</label><span style="font-size: 11px; color: #DC3139;"> (Admitido: jpeg, png, txt, xls, xlsx, csv, pdf, doc, docx)</span>
                            <input type="file" class="form-control input-md cajatexto" name="documentoRequisito" id="documentoRequisito" accept="*" data-show-upload="false" data-show-caption="false">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnCargarRequisito">
                              <i class="fa fa-upload" aria-hidden="true"></i> Cargar Requisito
                            </button>
                          </div>
                          <table class="table table-bordes" id="tablaRequisitos">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>Requisito</th>
                                </center>
                                <center>
                                  <th>Comentario</th>
                                </center>
                                <center>
                                  <th>Acciones</th>
                                </center>
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

              <!-- Pestaña de Datos contractuales -->
              <div class="tab-pane fade" id="datos-content" role="tabpanel">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                      <h4 class="panel-title">Contrato de Trabajo</h4>
                    </div>
                    <div class="panel-body" style="padding: 15px;">
                      <div class="form-group col-sm-6 col-xs-12">
                        <label for="documentoContrato">Contrato:</label><span style="font-size: 11px; color: #DC3139;"> (Admitido: jpeg, png, txt, xls, xlsx, csv, pdf, doc, docx)</span>
                        <input type="file" class="form-control input-md cajatexto" name="documentoContrato" id="documentoContrato" accept="*" data-show-upload="false" data-show-caption="false">
                      </div>

                      <div class="form-group col-sm-3 col-xs-12">
                        <label for="nuevoNombre"></label>
                        <button type="button" class="btn btn-primary btn-block" id="btnActualizarDocumentoContrato">
                          <i class="fa fa-refresh" aria-hidden="true"></i> Actualizar Archivo
                        </button>
                      </div>

                      <div class="form-group col-sm-3 col-xs-12">
                        <label for="nuevoNombre"></label>
                        <a type="button" class="btn btn-success btn-block" href="#" target="_blank" id="bntDescargarArchivo">
                          <i class="fa fa-download" aria-hidden="true"></i> Descargar Archivo
                        </a>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                    <h4 class="panel-title">Anexos</h4>
                  </div>
                  <div class="panel-body" style="padding: 15px;">

                    <div class="form-group col-sm-3 col-xs-12">
                      <label for="seleccionAnexo">Tipo Anexo:</label>
                      <select class="form-control input-md cajatexto solo-ruc" name="seleccionAnexo" id="seleccionAnexo"></select>
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                      <label for="fechaAnexo">Fecha Anexo</label>
                      <input type="date" class="form-control input-md cajatexto" id="fechaAnexo" name="fechaAnexo">
                    </div>

                    <div class="form-group col-sm-6 col-xs-12">
                      <label for="comentarioAnexo">Comentario:</label><span style="font-size: 11px; color: #DC3139;"> (Opcional)</span>
                      <textarea class="form-control input-md cajatexto" name="comentarioAnexo" id="comentarioAnexo" rows="1"></textarea>
                    </div>

                    <div class="form-group col-sm-9 col-xs-12">
                      <label for="documentoAnexo">Adjunto:</label><span style="font-size: 11px; color: #DC3139;"> (Admitido: jpeg, png, txt, xls, xlsx, csv, pdf, doc, docx)</span>
                      <input type="file" class="form-control input-md cajatexto" name="documentoAnexo" id="documentoAnexo" accept="*" data-show-upload="false" data-show-caption="false">
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                      <label for="nuevoNombre"></label>
                      <button type="button" class="btn btn-primary btn-block" id="btnCargarRAnexo">
                        <i class="fa fa-upload" aria-hidden="true"></i> Cargar Anexo
                      </button>
                    </div>

                    <table class="table table-bordes" id="tablaAnexos">
                      <thead class="thead-dark">
                        <tr>
                          <center>
                            <th>Tipo</th>
                          </center>
                          <center>
                            <th>Fecha</th>
                          </center>
                          <center>
                            <th>Comentario</th>
                          </center>
                          <center>
                            <th>Acciones</th>
                          </center>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>

            <!-- Botones de acción -->
            <div class="button-container">


              <button type="button" class="btn btn-primary" id="btnListadoSolicitud">
                <i class="fa fa-search" aria-hidden="true"></i> Listado de Solicitudes
              </button>

              <button type="button" class="btn btn-primary" id="btnListadoFicha">
                <i class="fa fa-search" aria-hidden="true"></i> Listado Ficha
              </button>
            </div>
          </div>
        </section>


        <script>
          document.getElementById("btnSeleccionContrato").addEventListener("click", function() {
            document.getElementById("inputArchivo").click();
          });

          document.getElementById("inputArchivo").addEventListener("change", function() {
            if (this.files.length > 0) {
              alert("Archivo seleccionado: " + this.files[0].name);
            }
          });
        </script>

        <script>
          $(document).ready(function() {
            $('#btnSeleccionContrato').click(function() {
              $('#inputArchivo').click();
            });

            $('#inputArchivo').on('change', function() {
              var file = this.files[0];

              if (file) {
                var ext = file.name.split('.').pop().toLowerCase();

                if ($.inArray(ext, ['docx', 'pdf', 'jpg']) === -1) {
                  alert('Solo se permiten archivos DOCX, PDF o JPG.');
                  $(this).val('');
                  $('#nombreArchivo').text(''); // Limpiar el texto mostrado
                }
              }
            });
          });
        </script>

        <script>
          document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnGrabarFicha').querySelector('i').className = 'fa fa-save';
            document.getElementById('btnGrabarFicha').style = 'background-color:#3c8dbc; border-color:#3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

            document.getElementById('btnListadoSolicitud').querySelector('i').className = 'fa fa-list-alt';
            document.getElementById('btnListadoSolicitud').style = 'background-color: #FF6600; border-color: #FF6600; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

            document.getElementById('btnListadoFicha').querySelector('i').className = 'fa fa-file-text';
            document.getElementById('btnListadoFicha').style = 'background-color: #3c8dbc; border-color: #3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
              button.addEventListener('mouseover', function() {
                if (this.id === 'btnGrabarFicha') this.style.backgroundColor = '#3c8dbc';
                if (this.id === 'btnListadoSolicitud') this.style.backgroundColor = '#FF6600';
                if (this.id === 'btnListadoFicha') this.style.backgroundColor = '#3c8dbc';
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
              });

              button.addEventListener('mouseout', function() {
                if (this.id === 'btnGrabarFicha') this.style.backgroundColor = '#3c8dbc';
                if (this.id === 'btnListadoSolicitud') this.style.backgroundColor = '#FF6600';
                if (this.id === 'btnListadoFicha') this.style.backgroundColor = '#3c8dbc';
                this.style.transform = '';
                this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
              });
            });
          });
        </script>

        <script>
          document.getElementById("btnListadoSolicitud").addEventListener("click", function() {
            window.location.href = "fichaContrato?view=listaSolicitudes";
          });
        </script>

        <script>
          document.getElementById("btnListadoFicha").addEventListener("click", function() {
            window.location.href = "fichaContrato";
          });
        </script>

        <script>
          button.addEventListener('mouseout', function() {
            if (this.id === 'btnGrabarFicha') this.style.backgroundColor = '#3c8dbc';
            if (this.id === 'btnListadoSolicitud') this.style.backgroundColor = '#FF6600';
            if (this.id === 'btnListadoFicha') this.style.backgroundColor = '#3c8dbc';
            this.style.transform = '';
            this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
          });
        </script>

        <script>
          document.getElementById("btnListadoSolicitud").addEventListener("click", function() {
            window.location.href = "fichaContrato?view=listaSolicitudes";
          });
        </script>

        <script>
          document.getElementById("btnListadoFicha").addEventListener("click", function() {
            window.location.href = "fichaContrato";
          });
        </script>

    </div>

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

  <style>
    .table-requisitos {
      position: relative;
      padding-top: 10px;

    }

    .table-responsive1 {
      top: 50px;
    }

    /* Ajustar modal a sus contenedores */
    .modal-dialog {
      width: auto !important;
      max-width: 70% !important;
      margin: 10px auto !important;
    }

    .modal-content {
      width: 100% !important;
    }

    .modal-body {
      padding: 5px !important;
      overflow-x: hidden !important;
    }

    .modal-body .content {
      padding: 0 !important;
      margin: 0 !important;
    }

    .modal-body .box {
      margin-bottom: 10px !important;
      padding: 0 !important;
      border: none !important;
      box-shadow: none !important;
    }

    .modal-body .panel-group {
      margin-bottom: 5px !important;
    }

    .modal-body .panel-body {
      padding: 5px !important;
    }

    .modal-body .form-group {
      margin-bottom: 5px !important;
    }

    /* Ajustar contenido dentro del modal */
    .modal-body section.content {
      padding: 0 !important;
      margin: 0 !important;
    }

    /* Separar los botones de acción */
    .button-container {
      display: flex;
      justify-content: center;
      margin: 10px;
      padding: 10px;
    }

    .button-container .btn {
      margin-right: 25px;
      margin-left: 25px;
    }
  </style>

  <script>
    function filterTable() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const table = document.querySelector("#fichaContrato");
      const rows = table.tBodies[0].rows;

      Array.from(rows).forEach(row => {
        const cells = Array.from(row.cells);
        const match = cells.some(cell => cell.textContent.toLowerCase().includes(input));
        row.style.display = match ? "" : "none";
      });
    }

    function updateVisibleRows() {
      const limit = parseInt(document.getElementById("entriesSelect").value);
      const table = document.querySelector("#fichaContrato");
      const rows = Array.from(table.tBodies[0].rows);

      let visibleCount = 0;
      rows.forEach(row => {
        if (row.style.display !== "none") {
          visibleCount++;
          row.style.display = visibleCount <= limit ? "" : "none";
        }
      });
    }

    // Vincular búsqueda con límite dinámicamente
    document.getElementById("searchInput").addEventListener("input", () => {
      filterTable();
      updateVisibleRows();
    });
  </script>

  <script>
    function filterTableSolicitud() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const table = document.querySelector("#listaSolicitud");
      const rows = table.tBodies[0].rows;

      Array.from(rows).forEach(row => {
        const cells = Array.from(row.cells);
        const match = cells.some(cell => cell.textContent.toLowerCase().includes(input));
        row.style.display = match ? "" : "none";
      });
    }

    function updateVisibleRows() {
      const limit = parseInt(document.getElementById("entriesSelect").value);
      const table = document.querySelector("#listaSolicitud");
      const rows = Array.from(table.tBodies[0].rows);

      let visibleCount = 0;
      rows.forEach(row => {
        if (row.style.display !== "none") {
          visibleCount++;
          row.style.display = visibleCount <= limit ? "" : "none";
        }
      });
    }

    // Vincular búsqueda con límite dinámicamente
    document.getElementById("searchInput").addEventListener("input", () => {
      filterTableSolicitud();
      updateVisibleRows();
    });
  </script>