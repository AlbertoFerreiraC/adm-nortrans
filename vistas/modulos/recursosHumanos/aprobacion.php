<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">

  <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
    <h1 style="color: white; font-weight: bold;">Personal: Aprobacion Solicitud Personal</h1>
  </section>

  <section class="content">
    <div class="box">

      <div class="panel-group" id="solicituAprobar">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-panel-listaAprobar">
              <a data-toggle="collapse" href="#solicituAprobar_content"
                class="panel-listaAprobar-link" aria-expanded="true">Lista de Solicitud por aprobar</a>
            </h4>
          </div>

          <div class="box-body">
            <div id="div1" class="table-responsive">
              <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%" style="text-align: center;">
                <thead>
                  <tr>
                    <th style="width:10px">
                      <center>#</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                    <th style="width:120px">
                      <center>N Solicitud</center>
                    </th>
                    <th>
                      <center> División</center>
                    </th>
                    <th>
                      <center> Empresa</center>
                    </th>
                    <th>
                      <center> Cargo</center>
                    </th>
                    <th>
                      <center> Centro Costo</center>
                    </th>
                    <th>
                      <center> Aprueba</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL VER MAS
======================================-->
<div id="modalVermas" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ver Datos del Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="box-body">

          <div class="form-group col-sm-4 col-xs-12">
            <label for="motivoVer">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="motivoVer" id="motivoVer" disabled>
              <option value="Reemplazo dotación">Reemplazo dotación</option>
              <option value="Aumento dotación">Aumento dotación</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="divisionVer">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="divisionVer" id="divisionVer" disabled>
              <option value="Industrial">Industrial</option>
              <option value="Interurbano">Interurbano</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cargoVer">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="cargoVer" id="cargoVer" disabled></select>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="razonVer">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="razonVer" id="razonVer" disabled></select>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="centrocostoVer">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="centrocostoVer" id="centrocostoVer" disabled></select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cantidadVer">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="number" class="form-control input-md cajatexto" name="cantidadVer" id="cantidadVer" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="equipoVer">Tipo equipo (opcional):</label>
            <select class="form-control input-md cajatexto" id="equipoVer" name="equipoVer" disabled> </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="licenciaVer">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto" id="licenciaVer" name="licenciaVer" disabled>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="form-group col-sm-12 col-xs-12">
            <label for="tipoturnoVer">Tipo Turno:</label>
            <select class="form-control input-md cajatexto" id="tipoturnoVer" name="tipoturnoVer" disabled></select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="tipocontratoVer">Tipo contrato:</label>
            <select class="form-control input-md cajatexto" id="tipocontratoVer" name="tipocontratoVer" disabled>
              <option value="Indefinido">Indefinido</option>
              <option value="Plazo Fijo">Plazo Fijo</option>
              <option value="Por Obra">Por Obra</option>
              <option value="Spot">Spot</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="fecharequeridaVer">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="date" class="form-control input-md cajatexto" name="fecharequeridaVer" id="fecharequeridaVer" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="remuneracionVer">Remuneración líquida:</label>
            <input type="number" class="form-control input-md cajatexto" name="remuneracionVer" id="remuneracionVer" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="observacionEntrevistaPsicolaboral">Entrevista Psicolaboral:</label>
            <textarea class="form-control input-md cajatexto" name="observacionEntrevistaPsicolaboral" id="observacionEntrevistaPsicolaboralVer" rows="1" disabled></textarea>
          </div>


          <div class="form-group col-sm-4 col-xs-12">
            <label for="observacionEntrevistaTecnicaVer">Entrevista Tecnica:</label>
            <textarea class="form-control input-md cajatexto" name="observacionEntrevistaTecnicaVer" id="observacionEntrevistaTecnicaVer" rows="1" disabled></textarea>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="observacionPruebaConduccionVer">Prueba de Conduccion:</label>
            <textarea class="form-control input-md cajatexto" name="observacionPruebaConduccionVer" id="observacionPruebaConduccionVer" rows="1" disabled></textarea>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="comentarioVer">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <textarea class="form-control input-md cajatexto" name="comentarioVer" id="comentarioVer" rows="1" disabled></textarea>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="preapruebaVer">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="preapruebaVer" name="preapruebaVer" disabled></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="apruebaVer">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="apruebaVer" name="apruebaVer" disabled></select>
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
        </div>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalModificar" class="modal fade" role="dialog">

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

            <input type="hidden" name="idModificar" id="idModificar" required>


            <div class="form-group col-sm-4 col-xs-12">
              <label for="motivoModificar">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="motivoModificar" id="motivoModificar">
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionModificar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="divisionModificar" id="divisionModificar">
                <option value="Industrial">Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoModificar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="cargoModificar" id="cargoModificar"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="empresaModificar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="empresaModificar" id="empresaModificar"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centroDecostoModificar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="centroDecostoModificar" id="centroDecostoModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadModificar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="number" class="form-control input-md cajatexto" name="cantidadModificar" id="cantidadModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoModificar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="equipoModificar" name="equipoModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="licenciaModificar">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="licenciaModificar" name="licenciaModificar">
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoModificar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="tipoturnoModificar" name="tipoturnoModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="tipocontratoModificar">Tipo contrato:</label>
              <select class="form-control input-md cajatexto" id="tipocontratoModificar" name="tipocontratoModificar" onchange="mostrarFechaTermino()">
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaModificar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fecharequeridaModificar" id="fecharequeridaModificar" onchange="calcularFechaTermino()">
            </div>

            <div class="form-group col-sm-4 col-xs-12" id="fechaTerminoDiv" style="display: none;">
              <label for="fechaterminoModificar">Fecha Término:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaterminoModificar" id="fechaterminoModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionModificar">Remuneración líquida:</label>
              <input type="number" class="form-control input-md cajatexto" name="remuneracionModificar" id="remuneracionModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionEntrevistaPsicolaboralMod">Entrevista Psicolaboral:</label>
              <textarea class="form-control input-md cajatexto" name="observacionEntrevistaPsicolaboralMod" id="observacionEntrevistaPsicolaboralMod" rows="1"></textarea>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionEntrevistaTecnicaMod">Entrevista Tecnica:</label>
              <textarea class="form-control input-md cajatexto" name="observacionEntrevistaTecnicaMod" id="observacionEntrevistaTecnicaMod" rows="1"></textarea>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionPruebaConduccionMod">Prueba de Conduccion:</label>
              <textarea class="form-control input-md cajatexto" name="observacionPruebaConduccionMod" id="observacionPruebaConduccionMod" rows="1"></textarea>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="box box-success">
                <div class="box-body">
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="comentarioModificar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139; padding-left: 15px;"> (Obligatorio)</span>
                    <textarea class="form-control input-md cajatexto" name="comentarioModificar" id="comentarioModificar" rows="1"></textarea>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="preapruebaModificar">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <select class="form-control input-md cajatexto" id="preapruebaModificar" name="preapruebaModificar"></select>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="apruebaModificar">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <select class="form-control input-md cajatexto" id="apruebaModificar" name="apruebaModificar"></select>
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

            <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>

          </div>

      </form>

    </div>

  </div>

</div>

<script src="vistas/js/recursosHumanos/aprueba.js"></script>