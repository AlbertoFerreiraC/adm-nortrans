<input type="hidden" name="idModificar" id="idModificar" value="">

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Roles de Usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Generales</a></li>
      
      <li class="active">Administrar Roles de Usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
      <div class="form-group col-sm-3 col-xs-12 ">
          <button id="cargarVentanaAgregar" class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar">          
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar Rol
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
              <th><center> Descripción</center></th>
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

            <div class="form-group col-sm-12 col-xs-12">
                <label for="descripcionRol">Descripción del Rol:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                <input type="text" class="form-control input-md " name="descripcionRol" id="descripcionRol">
            </div>  

            <div class="form-group col-sm-12 col-xs-12">
                <section class="content">
                  <div class="box">
                    <!-- Navegación por pestañas -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link active" id="datosRecursosHumanosAgregar" data-toggle="tab" href="#datosRecursosHumanosAgregar-content" role="tab">
                          Recursos Humanos
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="datosActivosAgregar" data-toggle="tab" href="#datosActivosAgregar-content" role="tab">
                          Activos
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="datosContabilidadAgregar" data-toggle="tab" href="#datosContabilidadAgregar-content" role="tab">
                          Contabilidad
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="datosBodegaAgregar" data-toggle="tab" href="#datosBodegaAgregar-content" role="tab">
                          Bodegas
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="datosComprasAgregar" data-toggle="tab" href="#datosComprasAgregar-content" role="tab">
                          Compras
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="datosMantencionAgregar" data-toggle="tab" href="#datosMantencionAgregar-content" role="tab">
                          Mantención
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="datosConfiguracionAgregar" data-toggle="tab" href="#datosConfiguracionAgregar-content" role="tab">
                          Configuración
                        </a>
                      </li>

                    </ul>

                    <!-- Contenido de las pestañas -->
                    <div class="tab-content" id="myTabContent">

                      <!-- Recursos Humanos-->
                      <div class="tab-pane fade in active" id="datosRecursosHumanosAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                    <table class="table table-bordes" id="tablaRecursosHumanosAgregar" style="text-align: center;">
                                      <thead class="thead-dark">
                                        <tr>
                                          <th><center>Descripción de Ventana</center></th>
                                          <th><center>Visualización</center></th>
                                        </tr>
                                        
                                      </thead>
                                      <tbody>

                                        <tr>
                                            <td style="color:#F46752; "><strong>Acceso a Módulo RRHH</strong></td>
                                            <td><input type="checkbox" id="accesoRrhhAgregar" name="accesoRrhhAgregar"></td>
                                        </tr>

                                        <tr>
                                            <td>Ficha Empleado</td>
                                            <td><input type="checkbox" id="fichaEmpleado" name="fichaEmpleado"></td>
                                        </tr>
                                        <tr>
                                            <td>Solicitud Contrataciónn</td>
                                            <td><input type="checkbox" id="solicitudContratacion" name="solicitudContratacion"></td>
                                        </tr>
                                        <tr>
                                            <td>Pre Aprobacion de Solicitud</td>
                                            <td><input type="checkbox" id="preAprobacionSolicitud" name="preAprobacionSolicitud"></td>
                                        </tr>
                                        <tr>
                                            <td>Aprobacion de Solicitud</td>
                                            <td><input type="checkbox" id="aprobacionSolicitud" name="aprobacionSolicitud"></td>
                                        </tr>
                                        <tr>
                                            <td>Ficha de Contrato</td>
                                            <td><input type="checkbox" id="fichaContrato" name="fichaContrato"></td>
                                        </tr>
                                        <tr>
                                            <td>Cargo Organizacional</td>
                                            <td><input type="checkbox" id="cargoOrganizacional" name="cargoOrganizacional"></td>
                                        </tr>
                                        <tr>
                                            <td>Mantenedor Area de Negocio</td>
                                            <td><input type="checkbox" id="mantenedorAreaNegocio" name="mantenedorAreaNegocio"></td>
                                        </tr>
                                        <tr>
                                            <td>Datos Laborales Por Vencer</td>
                                            <td><input type="checkbox" id="datosLaboralesVencer" name="datosLaboralesVencer"></td>
                                        </tr>
                                        <tr>
                                            <td>Solicitud Contr. Pendiente</td>
                                            <td><input type="checkbox" id="solicitudContrPendiente" name="solicitudContrPendiente"></td>
                                        </tr>
                                        <tr>
                                            <td>Lista Solicitud Contratacion</td>
                                            <td><input type="checkbox" id="solicitudContratacion2" name="solicitudContratacion2"></td>
                                        </tr>
                                        <tr>
                                            <td>Nacionalidad</td>
                                            <td><input type="checkbox" id="nacionalidad" name="nacionalidad"></td>
                                        </tr>
                                        <tr>
                                            <td>Comuna</td>
                                            <td><input type="checkbox" id="comuna" name="comuna"></td>
                                        </tr>
                                        <tr>
                                            <td>AFP</td>
                                            <td><input type="checkbox" id="afp" name="afp"></td>
                                        </tr>
                                        <tr>
                                            <td>Salud</td>
                                            <td><input type="checkbox" id="salud" name="salud"></td>
                                        </tr>
                                        <tr>
                                            <td>Turnos Laborales</td>
                                            <td><input type="checkbox" id="turnosLaborales" name="turnosLaborales"></td>
                                        </tr>
                                        <tr>
                                            <td>Empresas</td>
                                            <td><input type="checkbox" id="empresas" name="empresas"></td>
                                        </tr>
                                        <tr>
                                            <td>Documento</td>
                                            <td><input type="checkbox" id="documento" name="documento"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo EPP</td>
                                            <td><input type="checkbox" id="tipoEpp" name="tipoEpp"></td>
                                        </tr>
                                        <tr>
                                            <td>Antecedentes Medicos</td>
                                            <td><input type="checkbox" id="antecedentesMedicos" name="antecedentesMedicos"></td>
                                        </tr>
                                        <tr>
                                            <td>Cargos</td>
                                            <td><input type="checkbox" id="cargos" name="cargos"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo Equipo</td>
                                            <td><input type="checkbox" id="tipoEquipo" name="tipoEquipo"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo Anexo</td>
                                            <td><input type="checkbox" id="tipoAnexo" name="tipoAnexo"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo Estudio</td>
                                            <td><input type="checkbox" id="tipoEstudio" name="tipoEstudio"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo Termino de Contrato</td>
                                            <td><input type="checkbox" id="tipoTerminoContrato" name="tipoTerminoContrato"></td>
                                        </tr>
                                        <tr>
                                            <td>Contacto Parentesco</td>
                                            <td><input type="checkbox" id="contactoParentesco" name="contactoParentesco"></td>
                                        </tr>
                                        <tr>
                                            <td>Requisitos de selección</td>
                                            <td><input type="checkbox" id="requisitosSeleccion" name="requisitosSeleccion"></td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Activos -->
                      <div class="tab-pane fade" id="datosActivosAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                  <table class="table table-bordes" id="tabladatosActivosAgregar" style="text-align: center;">
                                    <thead class="thead-dark">
                                      <tr>
                                        <center><th>Descripción de Ventana</th></center>
                                        <center><th>Visualización</th></center>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="color:#F46752; "><strong>Acceso a Módulo Activos</strong></td>
                                        <td><input type="checkbox" id="accesoActivosAgregar" name="accesoActivosAgregar"></td>
                                      </tr>

                                      <tr>
                                        <td>Informe Documento de Máquina</td>
                                        <td><input type="checkbox" id="informeDocumentoMaquina" name="informeDocumentoMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>De Máquina</td>
                                        <td><input type="checkbox" id="deMaquina" name="deMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Clase Máquina</td>
                                        <td><input type="checkbox" id="claseMaquina" name="claseMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Bus</td>
                                        <td><input type="checkbox" id="tipoBus" name="tipoBus"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Máquina</td>
                                        <td><input type="checkbox" id="tipoMaquina" name="tipoMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Documento Máquina</td>
                                        <td><input type="checkbox" id="tipoDocumentoMaquina" name="tipoDocumentoMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Equipamiento Máquina</td>
                                        <td><input type="checkbox" id="tipoEquipamientoMaquina" name="tipoEquipamientoMaquina"></td>
                                      </tr>
                                                            <tr>
                                                              <td>Tipo Poliza de Seguro</td>
                                                              <td><input type="checkbox" id="tipoPolizaSeguro" name="tipoPolizaSeguro"></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Marca Chásis</td>
                                                              <td><input type="checkbox" id="marcaChasis" name="marcaChasis"></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Modelo Chásis</td>
                                                              <td><input type="checkbox" id="modeloChasis" name="modeloChasis"></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Marca Carroceria</td>
                                                              <td><input type="checkbox" id="marcaCarroceria" name="marcaCarroceria"></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Modelo Carroceria</td>
                                                              <td><input type="checkbox" id="modeloCarroceria" name="modeloCarroceria"></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Proveedores</td>
                                                              <td><input type="checkbox" id="proveedores" name="proveedores"></td>
                                                            </tr>
                                                            <tr>
                                                              <td>Aseguradora</td>
                                                              <td><input type="checkbox" id="aseguradora" name="aseguradora"></td>
                                                            </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Contabilidad -->
                      <div class="tab-pane fade" id="datosContabilidadAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                  <table class="table table-bordes" id="tabladatosContabilidadAgregar" style="text-align: center;">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th><center>Descripción de Ventana</center></th>
                                        <th><center>Visualización</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="color:#F46752;"><strong>Acceso a Módulo Contabilidad</strong></td>
                                        <td><input type="checkbox" id="accesoContabilidadAgregar" name="accesoContabilidadAgregar"></td>
                                      </tr>
                                      <tr>
                                        <td>Mis Rendiciones</td>
                                        <td><input type="checkbox" id="misRendiciones" name="misRendiciones"></td>
                                      </tr>
                                      <tr>
                                        <td>Gestionar Rendiciones</td>
                                        <td><input type="checkbox" id="gestionarRendiciones" name="gestionarRendiciones"></td>
                                      </tr>
                                      <tr>
                                        <td>Asignación Fdo. Rendición</td>
                                        <td><input type="checkbox" id="asignacionFdoRendicion" name="asignacionFdoRendicion"></td>
                                      </tr>
                                      <tr>
                                        <td>Pre Aprobación Fdo. Rendición</td>
                                        <td><input type="checkbox" id="preAprobacionFdoRendicion" name="preAprobacionFdoRendicion"></td>
                                      </tr>
                                      <tr>
                                        <td>Aprobación Fdo. Rendición</td>
                                        <td><input type="checkbox" id="aprobacionFdoRendicion" name="aprobacionFdoRendicion"></td>
                                      </tr>
                                      <tr>
                                        <td>Maestro Proveedor</td>
                                        <td><input type="checkbox" id="maestroProveedor" name="maestroProveedor"></td>
                                      </tr>
                                      <tr>
                                        <td>Condición de Pago</td>
                                        <td><input type="checkbox" id="condicionPago" name="condicionPago"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo de proveedor</td>
                                        <td><input type="checkbox" id="tipoProveedor" name="tipoProveedor"></td>
                                      </tr>
                                      <tr>
                                        <td>Comuna</td>
                                        <td><input type="checkbox" id="comunaContabilidad" name="comunaContabilidad"></td>
                                      </tr>
                                      <tr>
                                        <td>Criticidad</td>
                                        <td><input type="checkbox" id="criticidad" name="criticidad"></td>
                                      </tr>
                                      <tr>
                                        <td>Clientes</td>
                                        <td><input type="checkbox" id="clientes" name="clientes"></td>
                                      </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Bodega -->
                      <div class="tab-pane fade" id="datosBodegaAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                  <table class="table table-bordes" id="tabladatosBodegaAgregar" style="text-align: center;">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th><center>Descripción de Ventana</center></th>
                                        <th><center>Visualización</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="color:#F46752;"><strong>Acceso a Módulo Bodegas</strong></td>
                                        <td><input type="checkbox" id="accesoBodegasAgregar" name="accesoBodegasAgregar"></td>
                                      </tr>
                                      <tr>
                                        <td>Entrega Repuesto OT</td>
                                        <td><input type="checkbox" id="entregaRepuestoOt" name="entregaRepuestoOt"></td>
                                      </tr>
                                      <tr>
                                        <td>Entrega de Producto</td>
                                        <td><input type="checkbox" id="entregaProducto" name="entregaProducto"></td>
                                      </tr>
                                      <tr>
                                        <td>Generar Traspaso bodega</td>
                                        <td><input type="checkbox" id="generarTraspasoBodega" name="generarTraspasoBodega"></td>
                                      </tr>
                                      <tr>
                                        <td>Solicitar anulación de entrega sms</td>
                                        <td><input type="checkbox" id="solicitarAnulacionEntregaSms" name="solicitarAnulacionEntregaSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Aprobar Solicitud Anulación entrega sms</td>
                                        <td><input type="checkbox" id="aprobarSolicitudAnulacionEntregaSms" name="aprobarSolicitudAnulacionEntregaSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Recepción Orden de Compra</td>
                                        <td><input type="checkbox" id="recepcionOrdenCompra" name="recepcionOrdenCompra"></td>
                                      </tr>
                                      <tr>
                                        <td>Recepción de Traspaso</td>
                                        <td><input type="checkbox" id="recepcionTraspaso" name="recepcionTraspaso"></td>
                                      </tr>
                                      <tr>
                                        <td>Informe de Inventario</td>
                                        <td><input type="checkbox" id="informeInventario" name="informeInventario"></td>
                                      </tr>
                                      <tr>
                                        <td>Kardex Producto</td>
                                        <td><input type="checkbox" id="kardexProducto" name="kardexProducto"></td>
                                      </tr>
                                      <tr>
                                        <td>Ajuste de Inventario</td>
                                        <td><input type="checkbox" id="ajusteInventario" name="ajusteInventario"></td>
                                      </tr>
                                      <tr>
                                        <td>Stock Bodega - Producto</td>
                                        <td><input type="checkbox" id="stockBodegaProducto" name="stockBodegaProducto"></td>
                                      </tr>
                                      <tr>
                                        <td>Quiebre de Stock</td>
                                        <td><input type="checkbox" id="quiebreStock" name="quiebreStock"></td>
                                      </tr>
                                      <tr>
                                        <td>Lista SMS Pendiente</td>
                                        <td><input type="checkbox" id="listaSmsPendiente" name="listaSmsPendiente"></td>
                                      </tr>
                                      <tr>
                                        <td>Lista de recepción OC</td>
                                        <td><input type="checkbox" id="listaRecepcionOc" name="listaRecepcionOc"></td>
                                      </tr>
                                      <tr>
                                        <td>Lista entrega sms</td>
                                        <td><input type="checkbox" id="listaEntregaSms" name="listaEntregaSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Ajuste Inventario</td>
                                        <td><input type="checkbox" id="consultaAjusteInventario" name="consultaAjusteInventario"></td>
                                      </tr>
                                      <tr>
                                        <td>Informe de entrega SMS</td>
                                        <td><input type="checkbox" id="informeEntregaSms" name="informeEntregaSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Evaluación de Proveedor</td>
                                        <td><input type="checkbox" id="evaluacionProveedor" name="evaluacionProveedor"></td>
                                      </tr>
                                      <tr>
                                        <td>Maestro Producto</td>
                                        <td><input type="checkbox" id="maestroProducto" name="maestroProducto"></td>
                                      </tr>
                                      <tr>
                                        <td>Maestro Repuesto</td>
                                        <td><input type="checkbox" id="maestroRepuesto" name="maestroRepuesto"></td>
                                      </tr>
                                      <tr>
                                        <td>Familia Repuesto</td>
                                        <td><input type="checkbox" id="familiaRepuesto" name="familiaRepuesto"></td>
                                      </tr>
                                      <tr>
                                        <td>Subfamilia Repuesto</td>
                                        <td><input type="checkbox" id="subfamiliaRepuesto" name="subfamiliaRepuesto"></td>
                                      </tr>
                                      <tr>
                                        <td>De Marca</td>
                                        <td><input type="checkbox" id="deMarca" name="deMarca"></td>
                                      </tr>
                                      <tr>
                                        <td>De Modelo</td>
                                        <td><input type="checkbox" id="deModelo" name="deModelo"></td>
                                      </tr>
                                      <tr>
                                        <td>Sistema de Aplicación</td>
                                        <td><input type="checkbox" id="sistemaAplicacion" name="sistemaAplicacion"></td>
                                      </tr>
                                      <tr>
                                        <td>Unidad de Medida</td>
                                        <td><input type="checkbox" id="unidadMedida" name="unidadMedida"></td>
                                      </tr>
                                      <tr>
                                        <td>Motivo Ajuste Inventario</td>
                                        <td><input type="checkbox" id="motivoAjusteInventario" name="motivoAjusteInventario"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Documento de Ajuste Inventario</td>
                                        <td><input type="checkbox" id="tipoDocumentoAjusteInventario" name="tipoDocumentoAjusteInventario"></td>
                                      </tr>
                                      <tr>
                                        <td>Categoría</td>
                                        <td><input type="checkbox" id="categoria" name="categoria"></td>
                                      </tr>
                                      <tr>
                                        <td>Sub Categoría</td>
                                        <td><input type="checkbox" id="subCategoria" name="subCategoria"></td>
                                      </tr>
                                      <tr>
                                        <td>De Bodega</td>
                                        <td><input type="checkbox" id="deBodega" name="deBodega"></td>
                                      </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Compras -->
                      <div class="tab-pane fade" id="datosComprasAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                  <table class="table table-bordes" id="tabladatosComprasAgregar" style="text-align: center;">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th><center>Descripción de Ventana</center></th>
                                        <th><center>Visualización</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="color:#F46752;"><strong>Acceso a Módulo Compras</strong></td>
                                        <td><input type="checkbox" id="accesoComprasAgregar" name="accesoComprasAgregar"></td>
                                      </tr>
                                      <tr>
                                        <td>Generar OC</td>
                                        <td><input type="checkbox" id="generarOc" name="generarOc"></td>
                                      </tr>
                                      <tr>
                                        <td>Aprobar OC</td>
                                        <td><input type="checkbox" id="aprobarOc" name="aprobarOc"></td>
                                      </tr>
                                      <tr>
                                        <td>Genera SMS</td>
                                        <td><input type="checkbox" id="generaSms" name="generaSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Pre Aprobar SMS</td>
                                        <td><input type="checkbox" id="preAprobarSms" name="preAprobarSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Aprobar SMS</td>
                                        <td><input type="checkbox" id="aprobarSms" name="aprobarSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Anular SMS</td>
                                        <td><input type="checkbox" id="anularSms" name="anularSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Orden de compra</td>
                                        <td><input type="checkbox" id="consultaOrdenCompra" name="consultaOrdenCompra"></td>
                                      </tr>
                                      <tr>
                                        <td>OC Pendiente de recepción</td>
                                        <td><input type="checkbox" id="ocPendienteRecepcion" name="ocPendienteRecepcion"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Lista OC</td>
                                        <td><input type="checkbox" id="consultaListaOc" name="consultaListaOc"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Lista detalle Oc</td>
                                        <td><input type="checkbox" id="consultaListaDetalleOc" name="consultaListaDetalleOc"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Solicitud Material y Servicio</td>
                                        <td><input type="checkbox" id="consultaSolicitudMaterialServicio" name="consultaSolicitudMaterialServicio"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Lista SMS</td>
                                        <td><input type="checkbox" id="consultaListaSms" name="consultaListaSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Consulta Lista detalle SMS</td>
                                        <td><input type="checkbox" id="consultaListaDetalleSms" name="consultaListaDetalleSms"></td>
                                      </tr>
                                      <tr>
                                        <td>Historial OC Proveedor</td>
                                        <td><input type="checkbox" id="historialOcProveedor" name="historialOcProveedor"></td>
                                      </tr>
                                      <tr>
                                        <td>Historial OC Repuesto</td>
                                        <td><input type="checkbox" id="historialOcRepuesto" name="historialOcRepuesto"></td>
                                      </tr>
                                      <tr>
                                        <td>Plazo Orden de compra</td>
                                        <td><input type="checkbox" id="plazoOrdenCompra" name="plazoOrdenCompra"></td>
                                      </tr>
                                      <tr>
                                        <td>Forma de pago orden de compra</td>
                                        <td><input type="checkbox" id="formaPagoOrdenCompra" name="formaPagoOrdenCompra"></td>
                                      </tr>
                                      <tr>
                                        <td>Plazo de entrega orden de compra</td>
                                        <td><input type="checkbox" id="plazoEntregaOrdenCompra" name="plazoEntregaOrdenCompra"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo de solicitud Material y servicio</td>
                                        <td><input type="checkbox" id="tipoSolicitudMaterialServicio" name="tipoSolicitudMaterialServicio"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Documento Proveedor</td>
                                        <td><input type="checkbox" id="tipoDocumentoProveedor" name="tipoDocumentoProveedor"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo documento caja chica</td>
                                        <td><input type="checkbox" id="tipoDocumentoCajaChica" name="tipoDocumentoCajaChica"></td>
                                      </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Mantención -->
                      <div class="tab-pane fade" id="datosMantencionAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                  <table class="table table-bordes" id="tabladatosMantencionAgregar" style="text-align: center;">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th><center>Descripción de Ventana</center></th>
                                        <th><center>Visualización</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="color:#F46752;"><strong>Acceso a Módulo Mantención</strong></td>
                                        <td><input type="checkbox" id="accesoMantencionAgregar" name="accesoMantencionAgregar"></td>
                                      </tr>
                                      <tr>
                                        <td>Reporte de falla</td>
                                        <td><input type="checkbox" id="reporteFalla" name="reporteFalla"></td>
                                      </tr>
                                      <tr>
                                        <td>Preventiva OT</td>
                                        <td><input type="checkbox" id="preventivaOt" name="preventivaOt"></td>
                                      </tr>
                                      <tr>
                                        <td>OT Interna</td>
                                        <td><input type="checkbox" id="otInterna" name="otInterna"></td>
                                      </tr>
                                      <tr>
                                        <td>Servicio Externo OT</td>
                                        <td><input type="checkbox" id="servicioExternoOt" name="servicioExternoOt"></td>
                                      </tr>
                                      <tr>
                                        <td>Asignar Tareas Pendientes</td>
                                        <td><input type="checkbox" id="asignarTareasPendientes" name="asignarTareasPendientes"></td>
                                      </tr>
                                      <tr>
                                        <td>Editar OT</td>
                                        <td><input type="checkbox" id="editarOt" name="editarOt"></td>
                                      </tr>
                                      <tr>
                                        <td>Terminar Tarea Ot</td>
                                        <td><input type="checkbox" id="terminarTareaOt" name="terminarTareaOt"></td>
                                      </tr>
                                      <tr>
                                        <td>Registro de KM</td>
                                        <td><input type="checkbox" id="registroKm" name="registroKm"></td>
                                      </tr>
                                      <tr>
                                        <td>Editar KM Maquina</td>
                                        <td><input type="checkbox" id="editarKmMaquina" name="editarKmMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Orden de trabajo</td>
                                        <td><input type="checkbox" id="ordenTrabajo" name="ordenTrabajo"></td>
                                      </tr>
                                      <tr>
                                        <td>Repuestos</td>
                                        <td><input type="checkbox" id="repuestos" name="repuestos"></td>
                                      </tr>
                                      <tr>
                                        <td>Lista de Ots</td>
                                        <td><input type="checkbox" id="listaOts" name="listaOts"></td>
                                      </tr>
                                      <tr>
                                        <td>Tareas Asignadas</td>
                                        <td><input type="checkbox" id="tareasAsignadas" name="tareasAsignadas"></td>
                                      </tr>
                                      <tr>
                                        <td>Campaña</td>
                                        <td><input type="checkbox" id="campana" name="campana"></td>
                                      </tr>
                                      <tr>
                                        <td>Pauta de Mantención</td>
                                        <td><input type="checkbox" id="pautaMantencion" name="pautaMantencion"></td>
                                      </tr>
                                      <tr>
                                        <td>Sistema de maquina</td>
                                        <td><input type="checkbox" id="sistemaMaquina" name="sistemaMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Subsistema de maquina</td>
                                        <td><input type="checkbox" id="subsistemaMaquina" name="subsistemaMaquina"></td>
                                      </tr>
                                      <tr>
                                        <td>Tipo Tarea Mantención</td>
                                        <td><input type="checkbox" id="tipoTareaMantencion" name="tipoTareaMantencion"></td>
                                      </tr>
                                      <tr>
                                        <td>Nivel de Criticidad</td>
                                        <td><input type="checkbox" id="nivelCriticidad" name="nivelCriticidad"></td>
                                      </tr>
                                      <tr>
                                        <td>Secuencia de Pauta</td>
                                        <td><input type="checkbox" id="secuenciaPauta" name="secuenciaPauta"></td>
                                      </tr>
                                      <tr>
                                        <td>Detención Programada</td>
                                        <td><input type="checkbox" id="detencionProgramada" name="detencionProgramada"></td>
                                      </tr>
                                      <tr>
                                        <td>Modificación de detención</td>
                                        <td><input type="checkbox" id="modificacionDetencion" name="modificacionDetencion"></td>
                                      </tr>
                                      <tr>
                                        <td>Categoría Pauta Inspección</td>
                                        <td><input type="checkbox" id="categoriaPautaInspeccion" name="categoriaPautaInspeccion"></td>
                                      </tr>
                                      <tr>
                                        <td>Conductores</td>
                                        <td><input type="checkbox" id="conductores" name="conductores"></td>
                                      </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Configuración -->
                      <div class="tab-pane fade" id="datosConfiguracionAgregar-content" role="tabpanel">
                        <div class="panel-group">
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="box-body">
                                <div class="row">

                                  <table class="table table-bordes" id="tabladatosConfiguracionAgregar" style="text-align: center;">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th><center>Descripción de Ventana</center></th>
                                        <th><center>Visualización</center></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="color:#F46752;"><strong>Acceso a Módulo Configuración</strong></td>
                                        <td><input type="checkbox" id="accesoConfiguracionAgregar" name="accesoConfiguracionAgregar"></td>
                                      </tr>
                                      <tr>
                                        <td>Roles</td>
                                        <td><input type="checkbox" id="roles" name="roles"></td>
                                      </tr>
                                      <tr>
                                        <td>Usuarios</td>
                                        <td><input type="checkbox" id="usuarios" name="usuarios"></td>
                                      </tr>
                                      <tr>
                                        <td>Configuración General</td>
                                        <td><input type="checkbox" id="configuracionGeneral" name="configuracionGeneral"></td>
                                      </tr>
                                      <tr>
                                        <td>Logs del Sistema</td>
                                        <td><input type="checkbox" id="logsSistema" name="logsSistema"></td>
                                      </tr>
                                      <tr>
                                        <td>Backup y Restauración</td>
                                        <td><input type="checkbox" id="backupRestauracion" name="backupRestauracion"></td>
                                      </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </section>
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

              <div class="form-group col-sm-12 col-xs-12">
                  <label for="descripcionRolModificar">Descripción del Rol:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <input type="text" class="form-control input-md " name="descripcionRolModificar" id="descripcionRolModificar">
              </div> 

              <div class="form-group col-sm-12 col-xs-12">
                  <section class="content">
                      <div class="box">
                          <!-- Navegación por pestañas -->
                          <ul class="nav nav-tabs" id="myTabsModificar" role="tablist">
                              <li class="nav-item active">
                                  <a class="nav-link active" id="datosRecursosHumanosModificar" data-toggle="tab" href="#datosRecursosHumanosModificar-content" role="tab">
                                      Recursos Humanos
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" id="datosActivosModificar" data-toggle="tab" href="#datosActivosModificar-content" role="tab">
                                      Activos
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" id="datosContabilidadModificar" data-toggle="tab" href="#datosContabilidadModificar-content" role="tab">
                                      Contabilidad
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" id="datosBodegaModificar" data-toggle="tab" href="#datosBodegaModificar-content" role="tab">
                                      Bodegas
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" id="datosComprasModificar" data-toggle="tab" href="#datosComprasModificar-content" role="tab">
                                      Compras
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" id="datosMantencionModificar" data-toggle="tab" href="#datosMantencionModificar-content" role="tab">
                                      Mantención
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" id="datosConfiguracionModificar" data-toggle="tab" href="#datosConfiguracionModificar-content" role="tab">
                                      Configuración
                                  </a>
                              </li>

                          </ul>

                          <!-- Contenido de las pestañas -->
                          <div class="tab-content" id="myTabContentModificar">

                              <!-- Recursos Humanos-->
                              <div class="tab-pane fade in active" id="datosRecursosHumanosModificar-content" role="tabpanel">
                                  <div class="panel-group">
                                      <div class="panel panel-default">
                                          <div class="panel-body">
                                              <div class="box-body">
                                                  <div class="row">

                                                      <table class="table table-bordes" id="tablaRecursosHumanosModificar" style="text-align: center;">
                                                          <thead class="thead-dark">
                                                              <tr>
                                                                  <th><center>Descripción de Ventana</center></th>
                                                                  <th><center>Visualización</center></th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>

                                                              <tr>
                                                                  <td style="color:#F46752; "><strong>Acceso a Módulo RRHH</strong></td>
                                                                  <td><input type="checkbox" id="accesoRrhhModificar" name="accesoRrhhModificar"></td>
                                                              </tr>

                                                              <tr>
                                                                  <td>Ficha Empleado</td>
                                                                  <td><input type="checkbox" id="fichaEmpleadoModificar" name="fichaEmpleadoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Solicitud Contratación</td>
                                                                  <td><input type="checkbox" id="solicitudContratacionModificar" name="solicitudContratacionModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Pre Aprobacion de Solicitud</td>
                                                                  <td><input type="checkbox" id="preAprobacionSolicitudModificar" name="preAprobacionSolicitudModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Aprobacion de Solicitud</td>
                                                                  <td><input type="checkbox" id="aprobacionSolicitudModificar" name="aprobacionSolicitudModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Ficha de Contrato</td>
                                                                  <td><input type="checkbox" id="fichaContratoModificar" name="fichaContratoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Cargo Organizacional</td>
                                                                  <td><input type="checkbox" id="cargoOrganizacionalModificar" name="cargoOrganizacionalModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Mantenedor Area de Negocio</td>
                                                                  <td><input type="checkbox" id="mantenedorAreaNegocioModificar" name="mantenedorAreaNegocioModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Datos Laborales Por Vencer</td>
                                                                  <td><input type="checkbox" id="datosLaboralesVencerModificar" name="datosLaboralesVencerModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Solicitud Contr. Pendiente</td>
                                                                  <td><input type="checkbox" id="solicitudContrPendienteModificar" name="solicitudContrPendienteModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Lista Solicitud Contratacion</td>
                                                                  <td><input type="checkbox" id="solicitudContratacion2Modificar" name="solicitudContratacion2Modificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Nacionalidad</td>
                                                                  <td><input type="checkbox" id="nacionalidadModificar" name="nacionalidadModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Comuna</td>
                                                                  <td><input type="checkbox" id="comunaModificar" name="comunaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>AFP</td>
                                                                  <td><input type="checkbox" id="afpModificar" name="afpModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Salud</td>
                                                                  <td><input type="checkbox" id="saludModificar" name="saludModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Turnos Laborales</td>
                                                                  <td><input type="checkbox" id="turnosLaboralesModificar" name="turnosLaboralesModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Empresas</td>
                                                                  <td><input type="checkbox" id="empresasModificar" name="empresasModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Documento</td>
                                                                  <td><input type="checkbox" id="documentoModificar" name="documentoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Tipo EPP</td>
                                                                  <td><input type="checkbox" id="tipoEppModificar" name="tipoEppModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Antecedentes Medicos</td>
                                                                  <td><input type="checkbox" id="antecedentesMedicosModificar" name="antecedentesMedicosModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Cargos</td>
                                                                  <td><input type="checkbox" id="cargosModificar" name="cargosModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Tipo Equipo</td>
                                                                  <td><input type="checkbox" id="tipoEquipoModificar" name="tipoEquipoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Tipo Anexo</td>
                                                                  <td><input type="checkbox" id="tipoAnexoModificar" name="tipoAnexoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Tipo Estudio</td>
                                                                  <td><input type="checkbox" id="tipoEstudioModificar" name="tipoEstudioModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Tipo Termino de Contrato</td>
                                                                  <td><input type="checkbox" id="tipoTerminoContratoModificar" name="tipoTerminoContratoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Contacto Parentesco</td>
                                                                  <td><input type="checkbox" id="contactoParentescoModificar" name="contactoParentescoModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Requisitos de selección</td>
                                                                  <td><input type="checkbox" id="requisitosSeleccionModificar" name="requisitosSeleccionModificar"></td>
                                                              </tr>

                                                          </tbody>
                                                      </table>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!-- Activos -->
                              <div class="tab-pane fade" id="datosActivosModificar-content" role="tabpanel">
                                  <div class="panel-group">
                                      <div class="panel panel-default">
                                          <div class="panel-body">
                                              <div class="box-body">
                                                  <div class="row">

                                                      <table class="table table-bordes" id="tabladatosActivosModificar" style="text-align: center;">
                                                          <thead class="thead-dark">
                                                              <tr>
                                                                  <th><center>Descripción de Ventana</center></th>
                                                                  <th><center>Visualización</center></th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>                                                            
                                                              <tr>
                                                                <td style="color:#F46752;"><strong>Acceso a Módulo Activos</strong></td>
                                                                <td><input type="checkbox" id="accesoActivosModificar" name="accesoActivosModificar"></td>
                                                              </tr>

                                                              <tr>
                                                                <td>Informe Documento de Máquina</td>
                                                                <td><input type="checkbox" id="informeDocumentoMaquinaModificar" name="informeDocumentoMaquinaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>De Máquina</td>
                                                                <td><input type="checkbox" id="deMaquinaModificar" name="deMaquinaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Clase Máquina</td>
                                                                <td><input type="checkbox" id="claseMaquinaModificar" name="claseMaquinaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tipo Bus</td>
                                                                <td><input type="checkbox" id="tipoBusModificar" name="tipoBusModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tipo Máquina</td>
                                                                <td><input type="checkbox" id="tipoMaquinaModificar" name="tipoMaquinaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tipo Documento Máquina</td>
                                                                <td><input type="checkbox" id="tipoDocumentoMaquinaModificar" name="tipoDocumentoMaquinaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tipo Equipamiento Máquina</td>
                                                                <td><input type="checkbox" id="tipoEquipamientoMaquinaModificar" name="tipoEquipamientoMaquinaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Tipo Poliza de Seguro</td>
                                                                <td><input type="checkbox" id="tipoPolizaSeguroModificar" name="tipoPolizaSeguroModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Marca Chásis</td>
                                                                <td><input type="checkbox" id="marcaChasisModificar" name="marcaChasisModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Modelo Chásis</td>
                                                                <td><input type="checkbox" id="modeloChasisModificar" name="modeloChasisModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Marca Carroceria</td>
                                                                <td><input type="checkbox" id="marcaCarroceriaModificar" name="marcaCarroceriaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Modelo Carroceria</td>
                                                                <td><input type="checkbox" id="modeloCarroceriaModificar" name="modeloCarroceriaModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Proveedores</td>
                                                                <td><input type="checkbox" id="proveedoresModificar" name="proveedoresModificar"></td>
                                                              </tr>
                                                              <tr>
                                                                <td>Aseguradora</td>
                                                                <td><input type="checkbox" id="aseguradoraModificar" name="aseguradoraModificar"></td>
                                                              </tr>
                                                          </tbody>
                                                      </table>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!-- Contabilidad -->
                              <div class="tab-pane fade" id="datosContabilidadModificar-content" role="tabpanel">
                                <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="box-body">
                                        <div class="row">

                                          <table class="table table-bordes" id="tabladatosContabilidadModificar" style="text-align: center;">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th><center>Descripción de Ventana</center></th>
                                                <th><center>Visualización</center></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td style="color:#F46752;"><strong>Acceso a Módulo Contabilidad</strong></td>
                                                <td><input type="checkbox" id="accesoContabilidadModificar" name="accesoContabilidadModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Mis Rendiciones</td>
                                                <td><input type="checkbox" id="misRendicionesModificar" name="misRendicionesModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Gestionar Rendiciones</td>
                                                <td><input type="checkbox" id="gestionarRendicionesModificar" name="gestionarRendicionesModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Asignación Fdo. Rendición</td>
                                                <td><input type="checkbox" id="asignacionFdoRendicionModificar" name="asignacionFdoRendicionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Pre Aprobación Fdo. Rendición</td>
                                                <td><input type="checkbox" id="preAprobacionFdoRendicionModificar" name="preAprobacionFdoRendicionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Aprobación Fdo. Rendición</td>
                                                <td><input type="checkbox" id="aprobacionFdoRendicionModificar" name="aprobacionFdoRendicionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Maestro Proveedor</td>
                                                <td><input type="checkbox" id="maestroProveedorModificar" name="maestroProveedorModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Condición de Pago</td>
                                                <td><input type="checkbox" id="condicionPagoModificar" name="condicionPagoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tipo de proveedor</td>
                                                <td><input type="checkbox" id="tipoProveedorModificar" name="tipoProveedorModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Comuna</td>
                                                <td><input type="checkbox" id="comunaContabilidadModificar" name="comunaContabilidadModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Criticidad</td>
                                                <td><input type="checkbox" id="criticidadModificar" name="criticidadModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Clientes</td>
                                                <td><input type="checkbox" id="clientesModificar" name="clientesModificar"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Bodega -->
                              <div class="tab-pane fade" id="datosBodegaModificar-content" role="tabpanel">
                                <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="box-body">
                                        <div class="row">

                                          <table class="table table-bordes" id="tabladatosBodegaModificar" style="text-align: center;">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th><center>Descripción de Ventana</center></th>
                                                <th><center>Visualización</center></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td style="color:#F46752;"><strong>Acceso a Módulo Bodegas</strong></td>
                                                <td><input type="checkbox" id="accesoBodegasModificar" name="accesoBodegasModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Entrega Repuesto OT</td>
                                                <td><input type="checkbox" id="entregaRepuestoOtModificar" name="entregaRepuestoOtModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Entrega de Producto</td>
                                                <td><input type="checkbox" id="entregaProductoModificar" name="entregaProductoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Generar Traspaso bodega</td>
                                                <td><input type="checkbox" id="generarTraspasoBodegaModificar" name="generarTraspasoBodegaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Solicitar anulación de entrega sms</td>
                                                <td><input type="checkbox" id="solicitarAnulacionEntregaSmsModificar" name="solicitarAnulacionEntregaSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Aprobar Solicitud Anulación entrega sms</td>
                                                <td><input type="checkbox" id="aprobarSolicitudAnulacionEntregaSmsModificar" name="aprobarSolicitudAnulacionEntregaSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Recepción Orden de Compra</td>
                                                <td><input type="checkbox" id="recepcionOrdenCompraModificar" name="recepcionOrdenCompraModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Recepción de Traspaso</td>
                                                <td><input type="checkbox" id="recepcionTraspasoModificar" name="recepcionTraspasoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Informe de Inventario</td>
                                                <td><input type="checkbox" id="informeInventarioModificar" name="informeInventarioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Kardex Producto</td>
                                                <td><input type="checkbox" id="kardexProductoModificar" name="kardexProductoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Ajuste de Inventario</td>
                                                <td><input type="checkbox" id="ajusteInventarioModificar" name="ajusteInventarioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Stock Bodega - Producto</td>
                                                <td><input type="checkbox" id="stockBodegaProductoModificar" name="stockBodegaProductoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Quiebre de Stock</td>
                                                <td><input type="checkbox" id="quiebreStockModificar" name="quiebreStockModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Lista SMS Pendiente</td>
                                                <td><input type="checkbox" id="listaSmsPendienteModificar" name="listaSmsPendienteModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Lista de recepción OC</td>
                                                <td><input type="checkbox" id="listaRecepcionOcModificar" name="listaRecepcionOcModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Lista entrega sms</td>
                                                <td><input type="checkbox" id="listaEntregaSmsModificar" name="listaEntregaSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Ajuste Inventario</td>
                                                <td><input type="checkbox" id="consultaAjusteInventarioModificar" name="consultaAjusteInventarioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Informe de entrega SMS</td>
                                                <td><input type="checkbox" id="informeEntregaSmsModificar" name="informeEntregaSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Evaluación de Proveedor</td>
                                                <td><input type="checkbox" id="evaluacionProveedorModificar" name="evaluacionProveedorModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Maestro Producto</td>
                                                <td><input type="checkbox" id="maestroProductoModificar" name="maestroProductoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Maestro Repuesto</td>
                                                <td><input type="checkbox" id="maestroRepuestoModificar" name="maestroRepuestoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Familia Repuesto</td>
                                                <td><input type="checkbox" id="familiaRepuestoModificar" name="familiaRepuestoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Subfamilia Repuesto</td>
                                                <td><input type="checkbox" id="subfamiliaRepuestoModificar" name="subfamiliaRepuestoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>De Marca</td>
                                                <td><input type="checkbox" id="deMarcaModificar" name="deMarcaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>De Modelo</td>
                                                <td><input type="checkbox" id="deModeloModificar" name="deModeloModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Sistema de Aplicación</td>
                                                <td><input type="checkbox" id="sistemaAplicacionModificar" name="sistemaAplicacionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Unidad de Medida</td>
                                                <td><input type="checkbox" id="unidadMedidaModificar" name="unidadMedidaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Motivo Ajuste Inventario</td>
                                                <td><input type="checkbox" id="motivoAjusteInventarioModificar" name="motivoAjusteInventarioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tipo Documento de Ajuste Inventario</td>
                                                <td><input type="checkbox" id="tipoDocumentoAjusteInventarioModificar" name="tipoDocumentoAjusteInventarioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Categoría</td>
                                                <td><input type="checkbox" id="categoriaModificar" name="categoriaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Sub Categoría</td>
                                                <td><input type="checkbox" id="subCategoriaModificar" name="subCategoriaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>De Bodega</td>
                                                <td><input type="checkbox" id="deBodegaModificar" name="deBodegaModificar"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Compras -->
                              <div class="tab-pane fade" id="datosComprasModificar-content" role="tabpanel">
                                <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="box-body">
                                        <div class="row">

                                          <table class="table table-bordes" id="tabladatosComprasModificar" style="text-align: center;">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th><center>Descripción de Ventana</center></th>
                                                <th><center>Visualización</center></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td style="color:#F46752;"><strong>Acceso a Módulo Compras</strong></td>
                                                <td><input type="checkbox" id="accesoComprasModificar" name="accesoComprasModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Generar OC</td>
                                                <td><input type="checkbox" id="generarOcModificar" name="generarOcModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Aprobar OC</td>
                                                <td><input type="checkbox" id="aprobarOcModificar" name="aprobarOcModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Genera SMS</td>
                                                <td><input type="checkbox" id="generaSmsModificar" name="generaSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Pre Aprobar SMS</td>
                                                <td><input type="checkbox" id="preAprobarSmsModificar" name="preAprobarSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Aprobar SMS</td>
                                                <td><input type="checkbox" id="aprobarSmsModificar" name="aprobarSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Anular SMS</td>
                                                <td><input type="checkbox" id="anularSmsModificar" name="anularSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Orden de compra</td>
                                                <td><input type="checkbox" id="consultaOrdenCompraModificar" name="consultaOrdenCompraModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>OC Pendiente de recepción</td>
                                                <td><input type="checkbox" id="ocPendienteRecepcionModificar" name="ocPendienteRecepcionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Lista OC</td>
                                                <td><input type="checkbox" id="consultaListaOcModificar" name="consultaListaOcModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Lista detalle Oc</td>
                                                <td><input type="checkbox" id="consultaListaDetalleOcModificar" name="consultaListaDetalleOcModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Solicitud Material y Servicio</td>
                                                <td><input type="checkbox" id="consultaSolicitudMaterialServicioModificar" name="consultaSolicitudMaterialServicioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Lista SMS</td>
                                                <td><input type="checkbox" id="consultaListaSmsModificar" name="consultaListaSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Consulta Lista detalle SMS</td>
                                                <td><input type="checkbox" id="consultaListaDetalleSmsModificar" name="consultaListaDetalleSmsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Historial OC Proveedor</td>
                                                <td><input type="checkbox" id="historialOcProveedorModificar" name="historialOcProveedorModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Historial OC Repuesto</td>
                                                <td><input type="checkbox" id="historialOcRepuestoModificar" name="historialOcRepuestoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Plazo Orden de compra</td>
                                                <td><input type="checkbox" id="plazoOrdenCompraModificar" name="plazoOrdenCompraModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Forma de pago orden de compra</td>
                                                <td><input type="checkbox" id="formaPagoOrdenCompraModificar" name="formaPagoOrdenCompraModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Plazo de entrega orden de compra</td>
                                                <td><input type="checkbox" id="plazoEntregaOrdenCompraModificar" name="plazoEntregaOrdenCompraModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tipo de solicitud Material y servicio</td>
                                                <td><input type="checkbox" id="tipoSolicitudMaterialServicioModificar" name="tipoSolicitudMaterialServicioModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tipo Documento Proveedor</td>
                                                <td><input type="checkbox" id="tipoDocumentoProveedorModificar" name="tipoDocumentoProveedorModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tipo documento caja chica</td>
                                                <td><input type="checkbox" id="tipoDocumentoCajaChicaModificar" name="tipoDocumentoCajaChicaModificar"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Mantención -->
                              <div class="tab-pane fade" id="datosMantencionModificar-content" role="tabpanel">
                                <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="box-body">
                                        <div class="row">

                                          <table class="table table-bordes" id="tabladatosMantencionModificar" style="text-align: center;">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th><center>Descripción de Ventana</center></th>
                                                <th><center>Visualización</center></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td style="color:#F46752;"><strong>Acceso a Módulo Mantención</strong></td>
                                                <td><input type="checkbox" id="accesoMantencionModificar" name="accesoMantencionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Reporte de falla</td>
                                                <td><input type="checkbox" id="reporteFallaModificar" name="reporteFallaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Preventiva OT</td>
                                                <td><input type="checkbox" id="preventivaOtModificar" name="preventivaOtModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>OT Interna</td>
                                                <td><input type="checkbox" id="otInternaModificar" name="otInternaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Servicio Externo OT</td>
                                                <td><input type="checkbox" id="servicioExternoOtModificar" name="servicioExternoOtModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Asignar Tareas Pendientes</td>
                                                <td><input type="checkbox" id="asignarTareasPendientesModificar" name="asignarTareasPendientesModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Editar OT</td>
                                                <td><input type="checkbox" id="editarOtModificar" name="editarOtModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Terminar Tarea Ot</td>
                                                <td><input type="checkbox" id="terminarTareaOtModificar" name="terminarTareaOtModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Registro de KM</td>
                                                <td><input type="checkbox" id="registroKmModificar" name="registroKmModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Editar KM Maquina</td>
                                                <td><input type="checkbox" id="editarKmMaquinaModificar" name="editarKmMaquinaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Orden de trabajo</td>
                                                <td><input type="checkbox" id="ordenTrabajoModificar" name="ordenTrabajoModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Repuestos</td>
                                                <td><input type="checkbox" id="repuestosModificar" name="repuestosModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Lista de Ots</td>
                                                <td><input type="checkbox" id="listaOtsModificar" name="listaOtsModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tareas Asignadas</td>
                                                <td><input type="checkbox" id="tareasAsignadasModificar" name="tareasAsignadasModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Campaña</td>
                                                <td><input type="checkbox" id="campanaModificar" name="campanaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Pauta de Mantención</td>
                                                <td><input type="checkbox" id="pautaMantencionModificar" name="pautaMantencionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Sistema de maquina</td>
                                                <td><input type="checkbox" id="sistemaMaquinaModificar" name="sistemaMaquinaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Subsistema de maquina</td>
                                                <td><input type="checkbox" id="subsistemaMaquinaModificar" name="subsistemaMaquinaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Tipo Tarea Mantención</td>
                                                <td><input type="checkbox" id="tipoTareaMantencionModificar" name="tipoTareaMantencionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Nivel de Criticidad</td>
                                                <td><input type="checkbox" id="nivelCriticidadModificar" name="nivelCriticidadModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Secuencia de Pauta</td>
                                                <td><input type="checkbox" id="secuenciaPautaModificar" name="secuenciaPautaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Detención Programada</td>
                                                <td><input type="checkbox" id="detencionProgramadaModificar" name="detencionProgramadaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Modificación de detención</td>
                                                <td><input type="checkbox" id="modificacionDetencionModificar" name="modificacionDetencionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Categoría Pauta Inspección</td>
                                                <td><input type="checkbox" id="categoriaPautaInspeccionModificar" name="categoriaPautaInspeccionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Conductores</td>
                                                <td><input type="checkbox" id="conductoresModificar" name="conductoresModificar"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Configuración -->
                              <div class="tab-pane fade" id="datosConfiguracionModificar-content" role="tabpanel">
                                <div class="panel-group">
                                  <div class="panel panel-default">
                                    <div class="panel-body">
                                      <div class="box-body">
                                        <div class="row">

                                          <table class="table table-bordes" id="tabladatosConfiguracionModificar" style="text-align: center;">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th><center>Descripción de Ventana</center></th>
                                                <th><center>Visualización</center></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td style="color:#F46752;"><strong>Acceso a Módulo Configuración</strong></td>
                                                <td><input type="checkbox" id="accesoConfiguracionModificar" name="accesoConfiguracionModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Roles</td>
                                                <td><input type="checkbox" id="rolesModificar" name="rolesModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Usuarios</td>
                                                <td><input type="checkbox" id="usuariosModificar" name="usuariosModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Configuración General</td>
                                                <td><input type="checkbox" id="configuracionGeneralModificar" name="configuracionGeneralModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Logs del Sistema</td>
                                                <td><input type="checkbox" id="logsSistemaModificar" name="logsSistemaModificar"></td>
                                              </tr>
                                              <tr>
                                                <td>Backup y Restauración</td>
                                                <td><input type="checkbox" id="backupRestauracionModificar" name="backupRestauracionModificar"></td>
                                              </tr>
                                            </tbody>
                                          </table>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </div>
                      </div>
                  </section>
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

<script src="vistas/js/generales/roles.js"></script>


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