<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Solicitud de contratación

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Recursos Humanos</a></li>

      <li class="active">Administrar Solicitud de contratación</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="form-group col-sm-3 col-xs-12 ">
          <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar" id="btnNuevo">
            <i class="fa fa-plus" aria-hidden="true"></i> Crear Solicitud
          </button>
        </div>

        <div class="form-group col-sm-9 col-xs-12 ">
          <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
        </div>


      </div>

      <div class="box-body">

        <div id="div1">
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
                  <center>Id Solicitud</center>
                </th>
                <th>
                  <center> Fecha Solicitud</center>
                </th>
                <th>
                  <center> Division</center>
                </th>
                <th>
                  <center> Cargo</center>
                </th>
                <th>
                  <center> Cantidad</center>
                </th>
                <th>
                  <center> Estado</center>
                </th>

              </tr>
            </thead>

            <tbody></tbody>
          </table>
        </div>

      </div>

    </div>

  </section>

</div>

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
                <option value=" "></option>
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionAgregar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="divisionAgregar" id="divisionAgregar">
                <option value=" "></option>
                <option value="Industrial" selected>Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoAgregar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="cargoAgregar" id="cargoAgregar">
                <option value=" "></option>
                <option value=""></option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="razonAgregar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="razonAgregar" id="razonAgregar">
                <option value=" "></option>
                <option value="Sociedad de Transporte Nortrans SPA">Sociedad de Transporte Nortrans SPA</option>
                <option value="Transportes Transmat LTDA ">Transportes Transmat LTDA</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centrocostoAgregar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="centrocostoAgregar" id="centrocostoAgregar">
                <option value=" "></option>
                <option value="76681140-k/Gerencia/9999-001">76681140-k/Gerencia/9999-001</option>
                <option value="76228401-4/Gerencia/9999-001">76228401-4/Gerencia/9999-001</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadAgregar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="number" class="form-control input-md cajatexto" name="cantidadAgregar" id="cantidadAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoAgregar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="equipoAgregar" name="equipoAgregar">
                <option value=" "></option>
                <option value="BUS">BUS</option>
                <option value="MINIBUS">MINIBUS</option>
                <option value="VAN">VAN</option>
                <option value="VITO">VITO</option>
                <option value="TAXI-BUS">TAXI-BUS</option>
                <option value="CAMIONETA">CAMIONETA</option>
                <option value="AUTOMOVIL">AUTOMOVIL</option>
                <option value="TRACTO CAMION">TRACTO CAMION</option>
                <option value="GRAND CARNIVAL LX 2.9">GRAND CARNIVAL LX 2.9</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="licenciaAgregar">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="licenciaAgregar" name="licenciaAgregar">
                <option value=" "></option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoAgregar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="tipoturnoAgregar" name="tipoturnoAgregar">
                <option value=" "></option>
                <option value="5x2">5x2</option>
                <option value="ARTICULO 22">ARTICULO 22</option>
                <option value="4x3 FAENA">4x3 FAENA</option>
                <option value="7x7">7x7</option>
                <option value="6x1">6x1</option>
                <option value="14x14">14x14</option>
                <option value="ART25">ART25</option>
                <option value="10x10">10x10</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="tipocontratoAgregar">Tipo contrato:</label>
              <select class="form-control input-md cajatexto" id="tipocontratoAgregar" name="tipocontratoAgregar" onchange="mostrarFechaTermino()">
                <option value=" "></option>
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
              <label for="requisitoseleccionAgregar">Requisito selección:</label>
              <select class="form-control input-md cajatexto" id="requisitoseleccionAgregar" name="requisitoseleccionAgregar">
                <option value=" "></option>
                <option value="Entrevista Psicolaboral">Entrevista Psicolaboral</option>
                <option value="Entrevista Tecnica">Entrevista Tecnica</option>
                <option value="Prueba de Conduccion">Prueba de Conduccion</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionAgregar">Observación requisito:</label>
              <textarea class="form-control input-md cajatexto" name="observacionAgregar" id="observacionAgregar" style="width: 536px " rows="1"></textarea>
            </div>

            <div class="agregar-boton">
              <button
                class="btn btn-primary mb-3" style="background-color: #adaf9c; border-color: #f46717"
                type="button"
                onclick="agregarRequisito()">
                Agregar Requisito
              </button>
            </div>


            <div class="table-container">
              <div class="table-responsive">
                <table class="table table-bordes" id="tablaRequisitos">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
                      <th>Nombre del Requisito</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>

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

<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalModificar" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group col-sm-4 col-xs-12">
              <label for="motivoModificar">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="motivoModificar" id="motivoModificar">
                <option value=" "></option>
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionModificar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="divisionModificar" id="divisionModificar">
                <option value=" "></option>
                <option value="Industrial" selected>Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoModificar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="cargoModificar" id="cargoModificar">
                <option value=" "></option>
                <option value=""></option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="razonModificar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="razonModificar" id="razonModificar">
                <option value=" "></option>
                <option value="Sociedad de Transporte Nortrans SPA">Sociedad de Transporte Nortrans SPA</option>
                <option value="Transportes Transmat LTDA ">Transportes Transmat LTDA</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centrocostoModificar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="centrocostoModificar" id="centrocostoModificar">
                <option value=" "></option>
                <option value="76681140-k/Gerencia/9999-001">76681140-k/Gerencia/9999-001</option>
                <option value="76228401-4/Gerencia/9999-001">76228401-4/Gerencia/9999-001</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadModificar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="number" class="form-control input-md cajatexto" name="cantidadModificar" id="cantidadModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoModificar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="equipoModificar" name="equipoModificar">
                <option value=" "></option>
                <option value="BUS">BUS</option>
                <option value="MINIBUS">MINIBUS</option>
                <option value="VAN">VAN</option>
                <option value="VITO">VITO</option>
                <option value="TAXI-BUS">TAXI-BUS</option>
                <option value="CAMIONETA">CAMIONETA</option>
                <option value="AUTOMOVIL">AUTOMOVIL</option>
                <option value="TRACTO CAMION">TRACTO CAMION</option>
                <option value="GRAND CARNIVAL LX 2.9">GRAND CARNIVAL LX 2.9</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="licenciaModificar">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="licenciaModificar" name="licenciaModificar">
                <option value=" "></option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoModificar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="tipoturnoModificar" name="tipoturnoModificar">
                <option value=" "></option>
                <option value="5x2">5x2</option>
                <option value="ARTICULO 22">ARTICULO 22</option>
                <option value="4x3 FAENA">4x3 FAENA</option>
                <option value="7x7">7x7</option>
                <option value="6x1">6x1</option>
                <option value="14x14">14x14</option>
                <option value="ART25">ART25</option>
                <option value="10x10">10x10</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="tipocontratoModificar">Tipo contrato:</label>
              <select class="form-control input-md cajatexto" id="tipocontratoModificar" name="tipocontratoModificar">
                <option value=" "></option>
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaModificar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fecharequeridaModificar" id="fecharequeridaModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12" id="fechaTerminoDiv" style="display: none;">
              <label for="fechaterminoModificar">Fecha Término:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaterminoModificarr" id="fechaterminoModificarr">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionModificar">Remuneración líquida:</label>
              <input type="number" class="form-control input-md cajatexto" name="remuneracionModificar" id="remuneracionModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="requisitoseleccionModificar">Requisito selección:</label>
              <select class="form-control input-md cajatexto" id="requisitoseleccionModificar" name="requisitoseleccionModificar">
                <option value=" "></option>
                <option value="Entrevista Psicolaboral">Entrevista Psicolaboral</option>
                <option value="Entrevista Tecnica">Entrevista Tecnica</option>
                <option value="Prueba de Conduccion">Prueba de Conduccion</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionModificar">Observación requisito:</label>
              <textarea class="form-control input-md cajatexto" name="observacionModificar" id="observacionModificar" rows="4"></textarea>
            </div>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="comentarioModificar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <textarea class="form-control input-md cajatexto" name="comentarioModificar" id="comentarioModificar" rows="4"></textarea>
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

      <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>

    </div>

    </form>

  </div>

</div>

</div>

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
            <select class="form-control input-md cajatexto solo-ruc" name="motivoVer" id="motivoVer">
                <option value=" "></option>
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option>
              </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="divisionVer">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="divisionVer" id="divisionVer">
                <option value=" "></option>
                <option value="Industrial" selected>Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cargoVer">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="cargoVer" id="cargoVer">
                <option value=" "></option>
                <option value=""></option>
              </select>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="razonVer">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="razonVer" id="razonVer">
                <option value=" "></option>
                <option value="Sociedad de Transporte Nortrans SPA">Sociedad de Transporte Nortrans SPA</option>
                <option value="Transportes Transmat LTDA ">Transportes Transmat LTDA</option>
              </select>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="centrocostoVer">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="centrocostoVer" id="centrocostoVer">
                <option value=" "></option>
                <option value="76681140-k/Gerencia/9999-001">76681140-k/Gerencia/9999-001</option>
                <option value="76228401-4/Gerencia/9999-001">76228401-4/Gerencia/9999-001</option>
              </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cantidadVer">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="number" class="form-control input-md cajatexto" name="cantidadVer" id="cantidadVer">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="equipoVer">Tipo equipo (opcional):</label>
            <select class="form-control input-md cajatexto" id="equipoVer" name="equipoVer">
              <option value=" "></option>
              <option value="BUS">BUS</option>
              <option value="MINIBUS">MINIBUS</option>
              <option value="VAN">VAN</option>
              <option value="VITO">VITO</option>
              <option value="TAXI-BUS">TAXI-BUS</option>
              <option value="CAMIONETA">CAMIONETA</option>
              <option value="AUTOMOVIL">AUTOMOVIL</option>
              <option value="TRACTO CAMION">TRACTO CAMION</option>
              <option value="GRAND CARNIVAL LX 2.9">GRAND CARNIVAL LX 2.9</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="licenciaVer">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto" id="licenciaVer" name="licenciaVer">
              <option value=" "></option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="form-group col-sm-12 col-xs-12">
            <label for="tipoturnoVer">Tipo Turno:</label>
            <select class="form-control input-md cajatexto" id="tipoturnoVer" name="tipoturnoVer">
              <option value=" "></option>
              <option value="5x2">5x2</option>
              <option value="ARTICULO 22">ARTICULO 22</option>
              <option value="4x3 FAENA">4x3 FAENA</option>
              <option value="7x7">7x7</option>
              <option value="6x1">6x1</option>
              <option value="14x14">14x14</option>
              <option value="ART25">ART25</option>
              <option value="10x10">10x10</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="tipocontratoVer">Tipo contrato:</label>
            <select class="form-control input-md cajatexto" id="tipocontratoVer" name="tipocontratoVer">
              <option value=" "></option>
              <option value="Indefinido">Indefinido</option>
              <option value="Plazo Fijo">Plazo Fijo</option>
              <option value="Por Obra">Por Obra</option>
              <option value="Spot">Spot</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="fecharequeridaVer">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="date" class="form-control input-md cajatexto" name="fecharequeridaVer" id="fecharequeridaVer">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="remuneracionVer">Remuneración líquida:</label>
            <input type="number" class="form-control input-md cajatexto" name="remuneracionVer" id="remuneracionVer">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="requisitoseleccionVer">Requisito selección:</label>
            <select class="form-control input-md cajatexto" id="requisitoseleccionVer" name="requisitoseleccionVer">
              <option value=" "></option>
              <option value="Entrevista Psicolaboral">Entrevista Psicolaboral</option>
              <option value="Entrevista Tecnica">Entrevista Tecnica</option>
              <option value="Prueba de Conduccion">Prueba de Conduccion</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="observacionVer">Observación requisito:</label>
            <textarea class="form-control input-md cajatexto" name="observacionVer" id="observacionVer" rows="4"></textarea>
          </div>
        </div>

        <div class="col-md-12 col-xs-12">
          <div class="box box-success">
            <div class="box-body">
              <div class="form-group col-sm-4 col-xs-12">
                <label for="comentarioVer">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <textarea class="form-control input-md cajatexto" name="comentarioVer" id="comentarioVer" rows="4"></textarea>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="preapruebaVer">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="preapruebaVer" name="preapruebaVer"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="apruebaVer">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="apruebaVer" name="apruebaVer"></select>
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

<script src="vistas/js/recursosHumanos/solicitudContratacion.js"></script>

<script>
  document.getElementById("observacionAgregar").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  document.getElementById("comentarioAgregar").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  function mostrarFechaTermino() {
    var tipoContrato = document.getElementById("tipocontratoAgregar").value;
    var fechaTerminoDiv = document.getElementById("fechaTerminoDiv");
    var observacionTextarea = document.getElementById("observacionAgregar");

    if (tipoContrato.trim() === "Plazo Fijo") {
      fechaTerminoDiv.style.display = "block";
      observacionTextarea.style.width = "255px";
    } else {
      fechaTerminoDiv.style.display = "none";
      document.getElementById("fechaterminoAgregar").value = ""; // Limpiar el campo si no es Plazo Fijo
      observacionTextarea.style.width = "536px";
    }
  }

  function calcularFechaTermino() {
    var tipoContrato = document.getElementById("tipocontratoAgregar").value;
    var fechaRequerida = document.getElementById("fecharequeridaAgregar").value;
    var fechaTerminoInput = document.getElementById("fechaterminoAgregar");

    if (tipoContrato.trim() === "Plazo Fijo" && fechaRequerida) {
      var fecha = new Date(fechaRequerida);
      fecha.setMonth(fecha.getMonth() + 2);
      var fechaFormateada = fecha.toISOString().split("T")[0];
      fechaTerminoInput.value = fechaFormateada;
    }
  }
</script>

<script>
  let contador = 1;

  function agregarRequisito() {
    const requisitoSeleccionado = document.getElementById("requisitoseleccionAgregar").value.trim();
    const observacion = document.getElementById("observacionAgregar").value.trim();

    if (requisitoSeleccionado === "") {
      alert("Por favor, selecciona un requisito.");
      return;
    }

    const tabla = document.querySelector("#tablaRequisitos tbody");
    const fila = document.createElement("tr");

    fila.innerHTML = `
            <td>${contador}</td>
            <td>${requisitoSeleccionado}</td>
            <td>${observacion || "Sin observación"}</td>
            <td><button class="btn btn-danger btn-sm" onclick="eliminarFila(this)">Eliminar</button></td>
        `;

    tabla.appendChild(fila);
    contador++;

    // Limpiar campos después de agregar
    document.getElementById("requisitoseleccionAgregar").value = "";
    document.getElementById("observacionAgregar").value = "";
  }

  function eliminarFila(boton) {
    boton.closest("tr").remove();
    actualizarNumeracion();
  }

  function actualizarNumeracion() {
    const filas = document.querySelectorAll("#tablaRequisitos tbody tr");
    contador = 1;
    filas.forEach(fila => {
      fila.cells[0].textContent = contador++;
    });
  }
</script>

<style>
 .agregar-boton {
   
    border-color: #f46717;
    max-width: 100px;
    margin-top: 100px; /* Alineado con la tabla */
    margin-left: 15px;
}

.table-container {
    float: right;
    width: 60%;
    margin-top: -35px;
    position: static;
}

.table-responsive {
    max-height: 100px;
    overflow-y: auto;
    width: 133%;  /* Cambiado para que use el ancho del contenedor padre */
    margin-left: -180px; 
}

/* Mantener los estilos de la tabla igual */
.table-bordes th,
.table-bordes td,
.table-bordes {
    border: 0.2px solid #111 !important;
    text-align: center;
    padding: 10px;
}

.table-bordes th:nth-child(1),
.table-bordes td:nth-child(1) {
    width: 10%;
    margin-left: 15px;
  }

  .table-bordes th:nth-last-child(2),
  .table-bordes td:nth-child(2) {
    width: 30%;
  }

  .table-bordes th:nth-child(3),
  .table-bordes td:nth-child(3) {
    width: 40%;
  }

  .table-bordes th:nth-child(4),
  .table-bordes td:nth-child(4) {
    width: 20%;
  }
</style>
>>>>>>> 2fce6440e1ada6d72891053028a0e04295abfdf0

.table-bordes th:nth-child(2),
.table-bordes td:nth-child(2) {
    width: 30%;
}

.table-bordes th:nth-child(3),
.table-bordes td:nth-child(3) {
    width: 40%;
}

.table-bordes th:nth-child(4),
.table-bordes td:nth-child(4) {
    width: 20%;
}

/* Clearfix para evitar problemas de float */
.container::after {
    content: "";
    clear: both;
    display: table;
}

/* Mantener los estilos del div1 */
#div1 {
    overflow: scroll;
    width: 100%;
}

#div1 table {
    width: 100%;
    background-color: lightgray;
}