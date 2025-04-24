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

        <section class="content">
          <div class="box">
            <!-- Navegación por pestañas -->
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
              <li class="nav-item active">
                <a class="nav-link active" id="datosLaboralesModificar" data-toggle="tab" href="#datosLaboralesModificar-content" role="tab">
                  Datos Laborales
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="asignacionLaboralModificar" data-toggle="tab" href="#asignacionLaboralModificar-content" role="tab">
                  Asignacion Laboral
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="documentoLaboralModificar" data-toggle="tab" href="#documentoLaboralModificar-content" role="tab">
                  Documentos Laboral
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="datosEstudiosModificar" data-toggle="tab" href="#datosEstudiosModificar-content" role="tab">
                  Datos Estudios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="medidasEppModificar" data-toggle="tab" href="#medidasEppModificar-content" role="tab">
                  Medidas de EPP
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contactoEmergenciaModificar" data-toggle="tab" href="#contactoEmergenciaModificar-content" role="tab">
                  Contacto de Emergencia
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="antecedenteMedicosModificar" data-toggle="tab" href="#antecedenteMedicosModificar-content" role="tab">
                  Antecedente Medicos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="solicitudContratacionModificar" data-toggle="tab" href="#solicitudDeContratacionModificar-content" role="tab">
                  Solicitud Asociada
                </a>
              </li>
            </ul>

            <!-- Contenido de las pestañas -->
            <div class="tab-content" id="myTabContent">
              <!-- Pestaña de Datos Laborales-->
              <div class="tab-pane fade in active" id="datosLaboralesModificar-content" role="tabpanel">
                <div class="panel-group" id="iddatosLaboralesModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
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
                </div>
              </div>

              <!-- Pestaña de Asignacion Laboral -->
              <div class="tab-pane fade" id="asignacionLaboralModificar-content" role="tabpanel">
                <div class="panel-group" id="idasignacionLaboralModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="asignacionDivisionModificar">Division:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="asignacionDivisionModificar" id="asignacionDivisionModificar">
                              <option value="-">Seleccionar...</option>
                              <option value="Industrial">Industrial</option>
                              <option value="Interurbano">Interurbano</option>
                            </select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="asignacionEmpresaModificar">Empresa:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="asignacionEmpresaModificar" id="asignacionEmpresaModificar"></select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="asignacionCostoModificar">Centro Costo:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="asignacionCostoModificar" id="asignacionCostoModificar"></select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="btnAgregarAsignacion"></label>
                            <button type="button" class="btn btn-block btn-primary" id="btnAgregarAsignacion">
                              <i class="fa fa-plus" aria-hidden="true"></i> Agregar Asignación
                            </button>
                          </div>

                          <table class="table table-bordes" id="tablaAsignacionesLaborales">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>División</th>
                                </center>
                                <center>
                                  <th>Empresa</th>
                                </center>
                                <center>
                                  <th>Centro de Costo</th>
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

              <!-- Pestaña de Documentos Laborales -->
              <div class="tab-pane fade" id="documentoLaboralModificar-content" role="tabpanel">
                <div class="panel-group" id="iddocumentoLaboralModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="tipoDocumentoLaboralAsignacionModificar">Documento Laboral:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="tipoDocumentoLaboralAsignacionModificar" id="tipoDocumentoLaboralAsignacionModificar"></select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="idDocumentoAsignacionModificar">Id Documento:</label>
                            <input type="text" class="form-control input-md cajatexto" name="idDocumentoAsignacionModificar" id="idDocumentoAsignacionModificar">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="fechaExpiracionAsignacionModificar">Fecha Expiración:</label>
                            <input type="date" class="form-control input-md cajatexto" name="fechaExpiracionAsignacionModificar" id="fechaExpiracionAsignacionModificar">
                          </div>

                          <div class="form-group col-sm-9 col-xs-12">
                            <label for="documentoAsignacionModificar">Adjunto:</label><span style="font-size: 11px; color: #DC3139;"> (Admitido: jpeg, png, txt, xls, xlsx, csv, pdf, doc, docx)</span>
                            <input type="file" class="form-control input-md cajatexto" name="documentoAsignacionModificar" id="documentoAsignacionModificar" accept="*" data-show-upload="false" data-show-caption="false">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnAsinacionDocumentolaboral">
                              <i class="fa fa-upload" aria-hidden="true"></i> Cargar Documento
                            </button>
                          </div>

                          <table class="table table-bordes" id="tablaDocumentolaboral">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>Tipo</th>
                                </center>
                                <center>
                                  <th>Fecha Expiración</th>
                                </center>
                                <center>
                                  <th>ID Documento</th>
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

              <!-- Pestaña de Datos de Estudio-->
              <div class="tab-pane fade" id="datosEstudiosModificar-content" role="tabpanel">
                <div class="panel-group" id="iddatosEstudiosModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="tipoEstudioModificar">Tipo Estudio:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="tipoEstudioModificar" id="tipoEstudioModificar"></select>
                          </div>

                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="estadoEstudioModificar">Estado Estudio:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="estadoEstudioModificar" id="estadoEstudioModificar">
                              <option value="-">Seleccionar...</option>
                              <option value="Completos">Completos</option>
                              <option value="Cursando">Cursando</option>
                              <option value="Imcompletos">Imcompletos</option>
                            </select>
                          </div>

                          <div class="form-group col-sm-9 col-xs-12">
                            <label for="documentoEstudioModificar">Adjunto:</label><span style="font-size: 11px; color: #DC3139;"> (Admitido: jpeg, png, txt, xls, xlsx, csv, pdf, doc, docx)</span>
                            <input type="file" class="form-control input-md cajatexto" name="documentoEstudioModificar" id="documentoEstudioModificar" accept="*" data-show-upload="false" data-show-caption="false">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnCargarEstudio">
                              <i class="fa fa-upload" aria-hidden="true"></i> Cargar Estudio
                            </button>
                          </div>

                          <table class="table table-bordes" id="tablaEstudios">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>Tipo</th>
                                </center>
                                <center>
                                  <th>Estado</th>
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

              <!-- Pestaña de Medidas de EPP-->
              <div class="tab-pane fade" id="medidasEppModificar-content" role="tabpanel">
                <div class="panel-group" id="idmedidasEppModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="tipoEppModificar">Tipo EPP:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="tipoEppModificar" id="tipoEppModificar"></select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="numTallaModificar">N° Talla:</label>
                            <input type="text" class="form-control input-md cajatexto" name="numTallaModificar" id="numTallaModificar">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnCargarTalla">
                              <i class="fa fa-upload" aria-hidden="true"></i> Cargar Talla
                            </button>
                          </div>

                          <table class="table table-bordes" id="tablaTalla">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>Tipo</th>
                                </center>
                                <center>
                                  <th>Estado</th>
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

              <!-- Pestaña de Contacto de Emergencia-->
              <div class="tab-pane fade" id="contactoEmergenciaModificar-content" role="tabpanel">
                <div class="panel-group" id="idcontactoEmergenciaModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="nombreEmergenciaModificar">Nombre:</label>
                            <input type="text" class="form-control input-md cajatexto" name="nombreEmergenciaModificar" id="nombreEmergenciaModificar">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="parentescoEmergenciaModificar">Parentesco:</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="parentescoEmergenciaModificar" id="parentescoEmergenciaModificar">
                              <option value="-">Seleccionar...</option>
                              <option value="Esposo/a">Esposo/a</option>
                              <option value="Padre/Madre">Padre/Madre</option>
                              <option value="Hermano/a">Hermano/a</option>
                            </select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="fonoEmergenciaModificar">Contacto:</label>
                            <input type="text" class="form-control input-md cajatexto" name="fonoEmergenciaModificar" id="fonoEmergenciaModificar">
                          </div>

                          <div class="form-group col-sm-12 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnCargarContactoEmergencia">
                              <i class="fa fa-upload" aria-hidden="true"></i> Cargar Contacto
                            </button>
                          </div>

                          <table class="table table-bordes" id="tablaContactoEmergencia">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>Nombre</th>
                                </center>
                                <center>
                                  <th>Parentezco</th>
                                </center>
                                <center>
                                  <th>Contacto</th>
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

              <!-- Pestaña de Antecedente Medico-->
              <div class="tab-pane fade" id="antecedenteMedicosModificar-content" role="tabpanel">
                <div class="panel-group" id="idantecedenteMedicosModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="tipoAntecedenteModificar">Tipo Antecedente</label>
                            <select class="form-control input-md cajatexto solo-ruc" name="tipoAntecedenteModificar" id="tipoAntecedenteModificar"></select>
                          </div>

                          <div class="form-group col-sm-6 col-xs-12">
                            <label for="detalleAntecedenteModificar">Detalle Antecedente:</label>
                            <textarea class="form-control input-md cajatexto" name="detalleAntecedenteModificar" id="detalleAntecedenteModificar" rows="1"></textarea>
                          </div>

                          <div class="form-group col-sm-12 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnCargarAntecedente">
                              <i class="fa fa-upload" aria-hidden="true"></i> Cargar Antecedente Médico
                            </button>
                          </div>

                          <table class="table table-bordes" id="tablaAntecedentesMedicos">
                            <thead class="thead-dark">
                              <tr>
                                <center>
                                  <th>Tipo de Antecedente</th>
                                </center>
                                <center>
                                  <th>Descripción</th>
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

              <div class="tab-pane fade in active" id="solicitudDeContratacionModificar-content" role="tabpanel">
                <div class="panel-group" id="solicitudContratacionModificar">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-sm-9 col-xs-12">
                            <label for="solicitudContratacion">Solicitud De Contratación Asociada:</label>
                            <select class="form-control input-md cajatexto" id="solicitudContratacion" name="solicitudContratacion"></select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="nuevoNombre"></label>
                            <button type="button" class="btn btn-primary btn-block" id="btnVicularSolicitudDeContratacion">
                              <i class="fa fa-retweet" aria-hidden="true"></i> Vicular Solicitud
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

</div>

<!--=====================================
MODAL VER MAS TAREA
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

          <section class="content">
            <div class="box">
              <!-- Navegación por pestañas -->
              <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link active" id="datosLaboralesVer" data-toggle="tab" href="#datosLaboralesVer-content" role="tab">
                    Datos Laborales
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="asignacionLaboralVer" data-toggle="tab" href="#asignacionLaboralVer-content" role="tab">
                    Asignacion Laboral
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="documentoLaboralVer" data-toggle="tab" href="#documentoLaboralVer-content" role="tab">
                    Documentos Laboral
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="datosEstudiosVer" data-toggle="tab" href="#datosEstudiosVer-content" role="tab">
                    Datos Estudios
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="medidasEppVer" data-toggle="tab" href="#medidasEppVer-content" role="tab">
                    Medidas de EPP
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contactoEmergenciaVer" data-toggle="tab" href="#contactoEmergenciaVer-content" role="tab">
                    Contacto de Emergencia
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="antecedenteMedicosVer" data-toggle="tab" href="#antecedenteMedicosVer-content" role="tab">
                    Antecedente Medicos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="fotosVer" data-toggle="tab" href="#fotosVer-content" role="tab">
                    Fotos
                  </a>
                </li>
              </ul>

              <!-- Contenido de las pestañas -->
              <div class="tab-content" id="myTabContent">
                <!-- Pestaña de Datos Laborales-->
                <div class="tab-pane fade in active" id="datosLaboralesVer-content" role="tabpanel">
                  <div class="panel-group" id="iddatosLaboralesVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
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
                  </div>
                </div>

                <!-- Pestaña de Asignacion Laboral -->
                <div class="tab-pane fade" id="asignacionLaboralVer-content" role="tabpanel">
                  <div class="panel-group" id="idasignacionLaboralVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionDivisionVerr">Division</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionDivisionVerr" id="asignacionDivisionVerr" disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionEmpresaVer">Empresa</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionEmpresaVer" id="asignacionEmpresaVer" disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionCostoVer">Centro Costo</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionCostoVer" id="asignacionCostoVer" disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <button type="button" class="btn btn-primary" id="btnVer" style="margin-right: 10px; margin-bottom: 10px;">
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
                <div class="tab-pane fade" id="documentoLaboralVer-content" role="tabpanel">
                  <div class="panel-group" id="iddocumentoLaboralVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="documenLaboralVer">Documento Laboral</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="documenLaboralVer" id="documenLaboralVer"disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="nombreDocuemtoVer">Id Documento</label>
                              <input type="text" class="form-control input-md cajatexto" name="nombreDocuemtoVer" id="nombreDocuemtoVer"disabled>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="asignacionCostoVer">Centro Costo</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="asignacionCostoVer" id="asignacionCostoVer"disabled></select>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label>Fecha Expiracion</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" disabled>
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
                <div class="tab-pane fade" id="datosEstudiosVer-content" role="tabpanel">
                  <div class="panel-group" id="iddatosEstudiosVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="tipoEstudioVer">Tipo Estudio</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="tipoEstudioVer" id="tipoEstudioVer"disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="estadoEstudioVer">Estado Estudio</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="estadoEstudioVer" id="estadoEstudioVer"disabled></select>
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
                <div class="tab-pane fade" id="medidasEppVer-content" role="tabpanel">
                  <div class="panel-group" id="idmedidasEppVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="tipoEppVer">Tipo EPP</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="tipoEppVer" id="tipoEppVer"disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="numTallaVer">N° Talla</label>
                              <input type="text" class="form-control input-md cajatexto" name="numTallaVer" id="numTallaVer"disabled>
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
                <div class="tab-pane fade" id="contactoEmergenciaVer-content" role="tabpanel">
                  <div class="panel-group" id="idcontactoEmergenciaVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="nombreEmergenciaVer">Nombre</label>
                              <input type="text" class="form-control input-md cajatexto" name="nombreEmergenciaVer" id="nombreEmergenciaVer"disabled>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="parentescoEmergenciaVer">Parentesco</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="parentescoEmergenciaVer" id="parentescoEmergenciaVer"disabled></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="fonoEmergenciaVer">Fono</label>
                              <input type="number" class="form-control input-md cajatexto" name="fonoEmergenciaVer" id="fonoEmergenciaVer"disabled>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="direccionEmergenciaVer">Direccion</label>
                              <input type="text" class="form-control input-md cajatexto" name="direccionEmergenciaVer" id="direccionEmergenciaVer"disabled>
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
                <div class="tab-pane fade" id="antecedenteMedicosVer-content" role="tabpanel">
                  <div class="panel-group" id="idantecedenteMedicosVer">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="tipoAntecedenteVer">Tipo Antecedente</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="tipoAntecedenteVer" id="tipoAntecedenteVer"disabled></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                              <label for="detalleAntecedenteVer">Detalle Antecedente:</label>
                              <textarea class="form-control input-md cajatexto" name="detalleAntecedenteVer" id="detalleAntecedenteVer" rows="1" disabled></textarea>
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
                <div class="tab-pane fade" id="fotosVer-content" role="tabpanel">
                  <div class="panel-group" id="idfotosVer">
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
        </div>

      </form>

    </div>

  </div>

</div>

<script src="vistas/js/recursosHumanos/fichaEmpleado.js"></script>

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