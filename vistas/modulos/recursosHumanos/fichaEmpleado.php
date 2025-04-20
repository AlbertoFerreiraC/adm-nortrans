<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Ficha de Empleado

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Recursos Humanos</a></li>

      <li class="active">Administrar Ficha de Empleado</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="form-group col-sm-3 col-xs-12 ">
          <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar" id="btnNuevo">
            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Registro Base
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
                  <center>Perfil</center>
                </th>
                <th>
                  <center> Rut</center>
                </th>
                <th>
                  <center> Nombre y Apellido</center>
                </th>
                <th>
                  <center> Teléfono Empresa</center>
                </th>
                <th>
                  <center> Email Empresa</center>
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
              <label for="rutAgregar">Rut:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fechaNacimientoAgregar">Fecha Nacimiento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaNacimientoAgregar" id="fechaNacimientoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="generoAgregar">Género:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="generoAgregar" name="generoAgregar">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Sin Especificar">Sin Especificar</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="nombreAgregar">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreAgregar" id="nombreAgregar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="apellidoAgregar">Apellido:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="nacionalidadAgregar">Nacionalidad:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="nacionalidadAgregar" name="nacionalidadAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="estadoCivilAgregar">Estado Civil:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Sepearado/a">Sepearado/a</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="comunaAgregar">Comuna:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="comunaAgregar" name="comunaAgregar"></select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="direccionAgregar">Dirección:</label>
              <input type="text" class="form-control input-md cajatexto" name="direccionAgregar" id="direccionAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoEmpresaAgregar">Teléfono Empresa:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoEmpresaAgregar" id="telefonoEmpresaAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailEmpresaAgregar">Email Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoPropioAgregar">Teléfono Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioAgregar" id="telefonoPropioAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailPersonalAgregar">Email Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailPersonalAgregar" id="emailPersonalAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="afpAgregar">AFP:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="afpAgregar" name="afpAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="saludAgregar">Salud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="saludAgregar" name="saludAgregar"></select>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
              <label for="nuevoNombre">Foto de Perfil:</label>
              <input type="file" class="form-control input-md cajatexto" name="imagenAgregar" id="imagenAgregar" accept="*" data-show-upload="false" data-show-caption="false">
            </div>
          </div>


          <section class="content">
            <div class="box">
              <!-- Navegación por pestañas -->
              <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link active" id="datosLaborales" data-toggle="tab" href="#datosLaborales-content" role="tab">
                    Datos Laborales
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="asignacionLaboral" data-toggle="tab" href="#asignacionLaboral-content" role="tab">
                    Asignacion Laboral
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="documentoLaboral" data-toggle="tab" href="#documentoLaboral-content" role="tab">
                    Documentos Laboral
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="datosEstudios" data-toggle="tab" href="#datosEstudios-content" role="tab">
                    Datos Estudios
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="medidasEpp" data-toggle="tab" href="#medidasEpp-content" role="tab">
                    Medidas de EPP
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contactoEmergencia" data-toggle="tab" href="#contactoEmergencia-content" role="tab">
                    Contacto de Emergencia
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="antecedenteMedicos" data-toggle="tab" href="#antecedenteMedicos-content" role="tab">
                    Antecedente Medicos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="fotos" data-toggle="tab" href="#fotos-content" role="tab">
                    Fotos
                  </a>
                </li>
              </ul>

              <!-- Contenido de las pestañas -->
              <div class="tab-content" id="myTabContent">
                <!-- Pestaña de Datos Laborales-->
                <div class="tab-pane fade in active" id="datosLaborales-content" role="tabpanel">
                  <div class="panel-group" id="iddatosLaborales">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="empresaAgregar">Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                              <select class="form-control input-md cajatexto" id="empresaAgregar" name="empresaAgregar"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="centroAgregar">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                              <select class="form-control input-md cajatexto" id="centroAgregar" name="centroAgregar"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="turnoAgregar">Turno o Jornada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                              <select class="form-control input-md cajatexto" id="turnoAgregar" name="turnoAgregar"></select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Pestaña de Asignacion Laboral -->
                <div class="tab-pane fade" id="asignacionLaboral-content" role="tabpanel">
                  <div class="panel-group" id="idasignacionLaboral">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionDivision">Division</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionDivision" id="asignacionDivision"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionEmpresa">Empresa</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionEmpresa" id="asignacionEmpresa"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionCcosto">Centro Costo</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionCcosto" id="asignacionCcosto"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnAgregar" style="margin-right: 10px; margin-bottom: 10px;">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Agregar
                              </button>

                              <button type="button" class="btn btn-primary" id="btnVerCcosto" style="margin-bottom: 10px;">
                                <i class="fa fa-list-alt" aria-hidden="true"></i> Todos Los Centros Costo
                              </button>
                            </div>


                            <div class="table-container2">
                              <div class="table-responsive2">
                                <table class="table table-bordes2" id="tablaAsignacion">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Id Division</th>
                                      <th>Division</th>
                                      <th>Empresa</th>
                                      <th>Id Centro Costo</th>
                                      <th>Centro Costo</th>
                                      <th>Eliminar </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Documentos Laborales -->
                <div class="tab-pane fade" id="documentoLaboral-content" role="tabpanel">
                  <div class="panel-group" id="iddocumentoLaboral">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="documenLaboral">Documento Laboral</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="documenLaboral" id="documenLaboral"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="nombreDocuemto">Id Documento</label>
                              <input type="text" class="form-control input-md cajatexto" name="nombreDocuemto" id="nombreDocuemto">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionCcosto">Centro Costo</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionCcosto" id="asignacionCcosto"></select>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Fecha Expiracion</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" value="2025-03-11">
                                  <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnSeleccion" style="margin-right: 10px; margin-bottom: 10px;">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Seleccion
                              </button>
                            </div>

                            <div class="table-container2">
                              <div class="table-responsive2">
                                <table class="table table-bordes2" id="tablaLaboral">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Id Documento</th>
                                      <th>Id Tipo Documento</th>
                                      <th>Fecha Expiracion</th>
                                      <th>Documento</th>
                                      <th>Eliminar </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Datos de Estudio-->
                <div class="tab-pane fade" id="datosEstudios-content" role="tabpanel">
                  <div class="panel-group" id="iddatosEstudios">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="tipoEstudio">Tipo Estudio</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="tipoEstudio" id="tipoEstudio"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="estadoEstudio">Estado Estudio</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="estadoEstudio" id="estadoEstudio"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnSeleccion"
                                style="margin-right: 10px; margin-bottom: 10px; margin-top: 23px;">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Selección
                              </button>
                            </div>

                            <div class="table-container2">
                              <div class="table-responsive2">
                                <table class="table table-bordes2" id="tablaLaboral">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Tipo Estudio</th>
                                      <th>Estado Estudio</th>
                                      <th>Documento</th>
                                      <th>Eliminar </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Medidas de EPP-->
                <div class="tab-pane fade" id="medidasEpp-content" role="tabpanel">
                  <div class="panel-group" id="idmedidasEpp">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="tipoEpp">Tipo EPP</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="tipoEpp" id="tipoEpp"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="numTalla">N° Talla</label>
                              <input type="text" class="form-control input-md cajatexto" name="numTalla" id="numTalla">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnAgregar"
                                style="margin-right: 10px; margin-bottom: 10px; margin-top: 23px;">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                            </div>

                            <div class="table-container2">
                              <div class="table-responsive2">
                                <table class="table table-bordes2" id="tablaLaboral">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Tipo Equipo</th>
                                      <th>Talla</th>
                                      <th>Eliminar</th>
                                      <th>Estado</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Contacto de Emergencia-->
                <div class="tab-pane fade" id="contactoEmergencia-content" role="tabpanel">
                  <div class="panel-group" id="idcontactoEmergencia">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="nombreEmergencia">Nombre</label>
                              <input type="text" class="form-control input-md cajatexto" name="nombreEmergencia" id="nombreEmergencia">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="parentescoEmergencia">Parentesco</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="parentescoEmergencia" id="parentescoEmergencia"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="fonoEmergencia">Fono</label>
                              <input type="number" class="form-control input-md cajatexto" name="fonoEmergencia" id="fonoEmergencia" min="0">
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="direccionEmergencia">Direccion</label>
                              <input type="text" class="form-control input-md cajatexto" name="direccionEmergencia" id="direccionEmergencia">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnAgregar"
                                style="margin-right: 10px; margin-bottom: 10px; margin-top: 23px;">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                            </div>

                            <div class="table-container2">
                              <div class="table-responsive2">
                                <table class="table table-bordes2" id="tablaLaboral">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Parentesco</th>
                                      <th>Nombre</th>
                                      <th>Fono</th>
                                      <th>Direccion</th>
                                      <th>Eliminar</th>
                                      <th>Estado</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Antecedente Medico-->
                <div class="tab-pane fade" id="antecedenteMedicos-content" role="tabpanel">
                  <div class="panel-group" id="idantecedenteMedicos">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="tipoAntecedente">Tipo Antecedente</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="tipoAntecedente" id="tipoAntecedente"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="detalleAntecedente">Detalle Antecedente:</label>
                              <textarea class="form-control input-md cajatexto" name="detalleAntecedente" id="detalleAntecedente" rows="1" ></textarea>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnAgregar"
                                style="margin-right: 10px; margin-bottom: 10px; margin-top: 23px;">
                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                            </div>

                            <div class="table-container2">
                              <div class="table-responsive2">
                                <table class="table table-bordes2" id="tablaLaboral">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Tipo Antecedente</th>
                                      <th>Detalle</th>
                                      <th>Eliminar</th>
                                      <th>Estado</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Foto-->
                <div class="tab-pane fade" id="fotos-content" role="tabpanel">
                  <div class="panel-group" id="idfotos">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                          <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnSeleccion"
                                style="margin-right: 10px; margin-bottom: 10px; margin-top: 23px;">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Selección
                              </button>
                            </div>                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>














                <!-- Cerrás otras pestañas acá si tenés más -->
              </div>
            </div>
          </section>



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

            <input type="hidden" name="idModificar" id="idModificar" required>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="rutModificar">Rut:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutModificar" id="rutModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fechaNacimientoModificar">Fecha Nacimiento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaNacimientoModificar" id="fechaNacimientoModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="generoModificar">Género:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="generoModificar" name="generoModificar">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Sin Especificar">Sin Especificar</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="nombreModificar">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreModificar" id="nombreModificar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="apellidoModificar">Apellido:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoModificar" id="apellidoModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="nacionalidadModificar">Nacionalidad:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="nacionalidadModificar" name="nacionalidadModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="estadoCivilModificar">Estado Civil:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="estadoCivilModificar" name="estadoCivilModificar">
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Sepearado/a">Sepearado/a</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="comunaModificar">Comuna:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="comunaModificar" name="comunaModificar"></select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="direccionModificar">Dirección:</label>
              <input type="text" class="form-control input-md cajatexto" name="direccionModificar" id="direccionModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoEmpresaModificar">Teléfono Empresa:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoEmpresaModificar" id="telefonoEmpresaModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailEmpresaModificar">Email Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaModificar" id="emailEmpresaModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoPropioModificar">Teléfono Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioModificar" id="telefonoPropioModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailPersonalModificar">Email Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailPersonalModificar" id="emailPersonalModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="afpModificar">AFP:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="afpModificar" name="afpModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="saludModificar">Salud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="saludModificar" name="saludModificar"></select>
            </div>
            <div class="form-group col-sm-8 col-xs-12">
              <label for="nuevoNombre">Foto de Perfil:</label>
              <input type="file" class="form-control input-md cajatexto" name="imagenModificar" id="imagenModificar" accept="*" data-show-upload="false" data-show-caption="false">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <div id="nuevaImagenModificar" class="form-group col-sm-12 col-xs-12" style="text-align:center;"></div>
              <div class="col-sm-12 col-xs-12">
                <div id="mapVistaPrevia"></div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-12 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Datos Laborales</h3>
            </div>
            <div class="box-body">
              <div class="form-group col-sm-4 col-xs-12">
                <label for="empresaModificar">Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="empresaModificar" name="empresaModificar"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="centroModificar">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="centroModificar" name="centroModificar"></select>
              </div>

              <div class="form-group col-sm-4 col-xs-12">
                <label for="turnoModificar">Turno o Jornada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <select class="form-control input-md cajatexto" id="turnoModificar" name="turnoModificar"></select>
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

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group col-sm-12 col-xs-12">
              <div id="nuevaImagenVer" class="form-group col-sm-12 col-xs-12" style="text-align:center;"></div>
              <div class="col-sm-12 col-xs-12">
                <div id="mapVistaPrevia2"></div>
              </div>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="rutVer">Rut:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutVer" id="rutVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fechaNacimientoVer">Fecha Nacimiento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaNacimientoVer" id="fechaNacimientoVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="generoVer">Género:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="generoVer" name="generoVer" disabled>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Sin Especificar">Sin Especificar</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="nombreVer">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreVer" id="nombreVer" disabled>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="apellidoVer">Apellido:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoVer" id="apellidoVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="nacionalidadVer">Nacionalidad:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="nacionalidadVer" name="nacionalidadVer" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="estadoCivilVer">Estado Civil:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="estadoCivilVer" name="estadoCivilVer" disabled>
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Sepearado/a">Sepearado/a</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="comunaVer">Comuna:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="comunaVer" name="comunaVer" disabled></select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="direccionVer">Dirección:</label>
              <input type="text" class="form-control input-md cajatexto" name="direccionVer" id="direccionVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoEmpresaVer">Teléfono Empresa:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoEmpresaVer" id="telefonoEmpresaVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailEmpresaVer">Email Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaVer" id="emailEmpresaVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoPropioVer">Teléfono Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioVer" id="telefonoPropioVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailPersonalVer">Email Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailPersonalVer" id="emailPersonalVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="afpVer">AFP:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="afpVer" name="afpVer" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="saludVer">Salud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="saludVer" name="saludVer" disabled></select>
            </div>


          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Datos Laborales</h3>
              </div>
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="empresaVer">Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="empresaVer" name="empresaVer" disabled></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="centroVer">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="centroVer" name="centroVer" disabled></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="turnoVer">Turno o Jornada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="turnoVer" name="turnoVer" disabled></select>
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

<script>

</script>



<script src="vistas/js/recursosHumanos/fichaEmpleado.js"></script>