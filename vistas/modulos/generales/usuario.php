<input type="hidden" name="idModificar" id="idModificar" value="">

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Generales</a></li>
      
      <li class="active">Administrar Usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
      <div class="form-group col-sm-3 col-xs-12 ">
          <button id="cargarVentanaAgregar" class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar">          
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar Usuario
          </button>
      </div>
        
      <div class="form-group col-sm-9 col-xs-12 ">
          <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General...">
      </div>

      </div>

      <div class="box-body">
        
      <div id="div1">
          <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%" style="text-align:center;">
            
            <thead>
            
            <tr>
              
              <th style="width:10px"><center>#</center></th>
              <th><center> RUT</center></th>
              <th><center> Nombre</center></th>
              <th><center> NIC</center></th>
              <th><center> Telefono</center></th>
              <th><center> Correo</center></th>         
              <th><center>Acciones</center></th>

            </tr> 

            </thead>

            <tbody>


            </tbody>

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

        <div class="modal-header modal-info" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DESCRIPCION DE LA TAREA -->      
             
            <div class="form-group col-sm-3 col-xs-12">                 
                <label for="rolAgregar">Rol:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md" id="rolAgregar" name="rolAgregar">
                  </select>
            </div>

            <div class="form-group col-sm-3 col-xs-12">
                <label for="cedulaAgregar">RUT:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md" name="cedulaAgregar" id="cedulaAgregar" required>
            </div>     
            
            <div class="form-group col-sm-6 col-xs-12">
                <label for="nombreAgregar">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md " name="nombreAgregar" id="nombreAgregar" required>
            </div>  

            <div class="form-group col-sm-3 col-xs-12">
                <label for="nicAgregar">Nic:</label>
                <input type="text" class="form-control input-md" name="nicAgregar" id="nicAgregar" required>
            </div> 

            <div class="form-group col-sm-3 col-xs-12">
                <label for="telefonoAgregar">Teléfono:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md solo-numero" name="telefonoAgregar" id="telefonoAgregar" required>
            </div>

            <div class="form-group col-sm-6 col-xs-12"><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <label for="correoAgregar">Correo:</label>
                <input type="text" class="form-control input-md" name="correoAgregar" id="correoAgregar" required>
            </div>  



            <div class="form-group col-sm-12 col-xs-12">
                <label>Módulos y Permisos:</label>
                <div class="row" style="margin-top: 10px;">
                    
                    <!-- Solicitud de Contratación -->
                    <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12 text-left">
                                <strong>Solicitud de Contratación</strong>
                            </div>
                            <div class="col-sm-8 col-xs-12 text-center">
                                <label style="margin-right: 15px; font-weight: normal;">
                                    <input type="checkbox" id="solicitudContratacionAprueba" style="margin-right: 5px;"> Aprueba
                                </label>
                                <label style="font-weight: normal;">
                                    <input type="checkbox" id="solicitudContratacionPreAprueba" style="margin-right: 5px;"> Pre Aprueba
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Asignación de Fondo Fijo -->
                    <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12 text-left">
                                <strong>Asignación de Fondo Fijo</strong>
                            </div>
                            <div class="col-sm-8 col-xs-12 text-center">
                                <label style="margin-right: 15px; font-weight: normal;">
                                    <input type="checkbox" id="fondoFijoAprueba" style="margin-right: 5px;"> Aprueba
                                </label>
                                <label style="font-weight: normal;">
                                    <input type="checkbox" id="fondoFijoPreAprueba" style="margin-right: 5px;"> Pre Aprueba
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Generar OC -->
                    <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12 text-left">
                                <strong>Generar OC</strong>
                            </div>
                            <div class="col-sm-8 col-xs-12 text-center">
                                <label style="margin-right: 15px; font-weight: normal;">
                                    <input type="checkbox" id="generarOCAprueba" style="margin-right: 5px;"> Aprueba
                                </label>
                                <label style="font-weight: normal;">
                                    <input type="checkbox" id="generarOCPreAprueba" style="margin-right: 5px;"> Pre Aprueba
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Generar SMS -->
                    <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; padding-bottom: 10px;">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12 text-left">
                                <strong>Generar SMS</strong>
                            </div>
                            <div class="col-sm-8 col-xs-12 text-center">
                                <label style="margin-right: 15px; font-weight: normal;">
                                    <input type="checkbox" id="generarSMSAprueba" style="margin-right: 5px;"> Aprueba
                                </label>
                                <label style="font-weight: normal;">
                                    <input type="checkbox" id="generarSMSPreAprueba" style="margin-right: 5px;"> Pre Aprueba
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group col-sm-12 col-xs-12" style="margin-top:-10px;">     
              <center>
                <span style="font-size: 13px; color: #DC3139;">La contraseña por defecto al momento de la creación es 12345</span>
              </center>                        
            </div>

            
           
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" style = "background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>

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

        <div class="modal-header modal-info" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Modificar Usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group col-sm-3 col-xs-12">                 
                <label for="rolModificar">Rol:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md" id="rolModificar" name="rolModificar">

                  </select>
            </div>

            <div class="form-group col-sm-3 col-xs-12">
                <label for="cedulaModificar">RUT:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md" name="cedulaModificar" id="cedulaModificar" required>
            </div>     
            
            <div class="form-group col-sm-6 col-xs-12">
                <label for="nombreModificar">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md " name="nombreModificar" id="nombreModificar" required>
            </div>  

            <div class="form-group col-sm-3 col-xs-12">
                <label for="nicModificar">Nic:</label>
                <input type="text" class="form-control input-md" name="nicModificar" id="nicModificar" required>
            </div> 

            <div class="form-group col-sm-3 col-xs-12">
                <label for="telefonoModificar">Teléfono:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md solo-numero" name="telefonoModificar" id="telefonoModificar" required>
            </div>

            <div class="form-group col-sm-6 col-xs-12"><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <label for="correoModificar">Correo:</label>
                <input type="text" class="form-control input-md" name="correoModificar" id="correoModificar" required>
            </div>  

            <div class="form-group col-sm-12 col-xs-12">
                  <label>Módulos y Permisos:</label>
                  <div class="row" style="margin-top: 10px;">
                      
                      <!-- Solicitud de Contratación -->
                      <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                          <div class="row">
                              <div class="col-sm-4 col-xs-12 text-left">
                                  <strong>Solicitud de Contratación</strong>
                              </div>
                              <div class="col-sm-8 col-xs-12 text-center">
                                  <label style="margin-right: 15px; font-weight: normal;">
                                      <input type="checkbox" id="solicitudContratacionApruebaModificar" style="margin-right: 5px;"> Aprueba
                                  </label>
                                  <label style="font-weight: normal;">
                                      <input type="checkbox" id="solicitudContratacionPreApruebaModificar" style="margin-right: 5px;"> Pre Aprueba
                                  </label>
                              </div>
                          </div>
                      </div>

                      <!-- Asignación de Fondo Fijo -->
                      <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                          <div class="row">
                              <div class="col-sm-4 col-xs-12 text-left">
                                  <strong>Asignación de Fondo Fijo</strong>
                              </div>
                              <div class="col-sm-8 col-xs-12 text-center">
                                  <label style="margin-right: 15px; font-weight: normal;">
                                      <input type="checkbox" id="fondoFijoApruebaModificar" style="margin-right: 5px;"> Aprueba
                                  </label>
                                  <label style="font-weight: normal;">
                                      <input type="checkbox" id="fondoFijoPreApruebaModificar" style="margin-right: 5px;"> Pre Aprueba
                                  </label>
                              </div>
                          </div>
                      </div>

                      <!-- Generar OC -->
                      <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                          <div class="row">
                              <div class="col-sm-4 col-xs-12 text-left">
                                  <strong>Generar OC</strong>
                              </div>
                              <div class="col-sm-8 col-xs-12 text-center">
                                  <label style="margin-right: 15px; font-weight: normal;">
                                      <input type="checkbox" id="generarOCApruebaModificar" style="margin-right: 5px;"> Aprueba
                                  </label>
                                  <label style="font-weight: normal;">
                                      <input type="checkbox" id="generarOCPreApruebaModificar" style="margin-right: 5px;"> Pre Aprueba
                                  </label>
                              </div>
                          </div>
                      </div>

                      <!-- Generar SMS -->
                      <div class="col-sm-12 col-xs-12" style="margin-bottom: 15px; padding-bottom: 10px;">
                          <div class="row">
                              <div class="col-sm-4 col-xs-12 text-left">
                                  <strong>Generar SMS</strong>
                              </div>
                              <div class="col-sm-8 col-xs-12 text-center">
                                  <label style="margin-right: 15px; font-weight: normal;">
                                      <input type="checkbox" id="generarSMSApruebaModificar" style="margin-right: 5px;"> Aprueba
                                  </label>
                                  <label style="font-weight: normal;">
                                      <input type="checkbox" id="generarSMSPreApruebaModificar" style="margin-right: 5px;"> Pre Aprueba
                                  </label>
                              </div>
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

          <button type="button" class="btn btn-primary" style = "background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar</button>

        </div>

      </form>

    </div>

  </div>

</div>

<script src="vistas/js/generales/usuario.js"></script>


<style>
  #div1 {
      overflow:scroll;
      width:100%;
  }

  #div1 table {
      width:100%;
      background-color:lightgray;
  }
</style>