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

          <h4 class="modal-title">Agregar Registro Base</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group col-sm-4 col-xs-12">
              <label for="motivoAgregar">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionAgregar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoAgregar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="razonAgregar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreAgregar" id="nombreAgregar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centrocostoAgregar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadAgregar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoAgregar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
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
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value=" "></option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoAgregar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
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
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value=" "></option>
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaAgregar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionAgregar">Remuneración líquida:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioAgregar" id="telefonoPropioAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="requisitoseleccionAgregar">Requisito selección:</label>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value=" "></option>
                <option value="Entrevista Psicolaboral">Entrevista Psicolaboral</option>
                <option value="Entrevista Tecnica">Entrevista Tecnica</option>
                <option value="Prueba de Conduccion">Prueba de Conduccion</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionAgregar">Observación requisito:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
            </div>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="comentarioAgregar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="centroAgregar">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="centroAgregar" name="centroAgregar"></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="turnoAgregar">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="turnoAgregar" name="turnoAgregar"></select>
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
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionModificar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoModificar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="razonModificar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreAgregar" id="nombreAgregar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centrocostoModificar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadModificar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoModificar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
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
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value=" "></option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoModificar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
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
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value=" "></option>
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaModificar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionModificar">Remuneración líquida:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioAgregar" id="telefonoPropioAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="requisitoseleccionModificar">Requisito selección:</label>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value=" "></option>
                <option value="Entrevista Psicolaboral">Entrevista Psicolaboral</option>
                <option value="Entrevista Tecnica">Entrevista Tecnica</option>
                <option value="Prueba de Conduccion">Prueba de Conduccion</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="observacionModificar">Observación requisito:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
            </div>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="comentarioModificar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="centroAgregar">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="centroAgregar" name="centroAgregar"></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="turnoAgregar">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="turnoAgregar" name="turnoAgregar"></select>
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
            <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="divisionVer">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cargoVer">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="razonVer">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="text" class="form-control input-md cajatexto" name="nombreAgregar" id="nombreAgregar">
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="centrocostoVer">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cantidadVer">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="equipoVer">Tipo equipo (opcional):</label>
            <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
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
            <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
              <option value=" "></option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="form-group col-sm-12 col-xs-12">
            <label for="tipoturnoVer">Tipo Turno:</label>
            <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
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
            <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
              <option value=" "></option>
              <option value="Indefinido">Indefinido</option>
              <option value="Plazo Fijo">Plazo Fijo</option>
              <option value="Por Obra">Por Obra</option>
              <option value="Spot">Spot</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="fecharequeridaVer">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="date" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="remuneracionVer">Remuneración líquida:</label>
            <input type="text" class="form-control input-md cajatexto" name="telefonoPropioAgregar" id="telefonoPropioAgregar">
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="requisitoseleccionVer">Requisito selección:</label>
            <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
              <option value=" "></option>
              <option value="Entrevista Psicolaboral">Entrevista Psicolaboral</option>
              <option value="Entrevista Tecnica">Entrevista Tecnica</option>
              <option value="Prueba de Conduccion">Prueba de Conduccion</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="observacionVer">Observación requisito:</label>
            <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
          </div>
        </div>

        <div class="col-md-12 col-xs-12">
          <div class="box box-success">
            <div class="box-body">
              <div class="form-group col-sm-4 col-xs-12">
                <label for="comentarioVer">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="preapruebaVer">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="centroAgregar" name="centroAgregar"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="apruebaVer">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="turnoAgregar" name="turnoAgregar"></select>
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


<style>
  #div1 {
    overflow: scroll;
    width: 100%;
  }

  #div1 table {
    width: 100%;
    background-color: lightgray;
  }
</style>