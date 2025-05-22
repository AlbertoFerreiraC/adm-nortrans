<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Mantenedor: Mantenedor Maquina</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-5 col-xs-12">
                                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="modal" data-target="#modalAgregar">
                                    <i class="fa fa-list" aria-hidden="true"></i> Crear Maquina
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -70px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Lista de Maquina
                            </a>
                        </h4>
                    </div>

                    <div class="box-body">
                        <div class="d-flex align-items-center botones-container"">
                            <button type=" button" class="btn btn-primary " data-toggle="modal" data-target="#modalEditar" id="btnverActivos">
                            <i class="fa fa-search" aria-hidden="true"></i> Ver Activos
                            </button>

                            <button type="button" class="btn btn-primary " id="btnverTodos">
                                <i class="fa fa-list" aria-hidden="true"></i> Ver Todos
                            </button>

                            <button type="button" class="btn btn-primary" id="btnverBloqueados"" style=" background-color: #FF6600;">
                                <i class="fa fa-file" aria-hidden="true"></i> Ver Bloqueados
                            </button>
                        </div>
                    </div>

                    <!-- Controles de tabla -->
                    <div class="table-controls">
                        <div class="control-left">
                            <label for="entriesSelect">Mostrar
                                <select id="entriesSelect" onchange="updateVisibleRows()">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> registros
                            </label>
                        </div>

                        <div class="control-right">
                            <label for="searchInput">Buscar:
                                <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Escriba para buscar...">
                            </label>
                        </div>
                    </div>

                    <div id="frm_j_idt110_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="table-container">
                                <div class="table-responsive">
                                    <div class="box-body">
                                        <div id="lista">
                                            <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:120px">
                                                            <center>Patente</center>
                                                        </th>
                                                        <th>
                                                            <center>N° Interno</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo Maquina</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo Bus</center>
                                                        </th>
                                                        <th>
                                                            <center>Marca/<BR>Modelo chasis</center>
                                                        </th>
                                                        <th>
                                                            <center> Tipo Mantencion</center>
                                                        </th>
                                                        <th>
                                                            <center>Centro Costo</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado </center>
                                                        </th>
                                                        <th>
                                                            <center>Editar</center>
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

    <!--aca debe ir el modal de agregar-->

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
                        <h4 class="modal-title">Maquina</h4>
                    </div>

                    <!--=====================================
                           CUERPO DEL MODAL
                          ======================================-->

                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="idpatente">Patente:</label>
                                <input type="text" class="form-control input-md cajatexto" name="idpatente" id="idpatente">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="numInterno">Numero Interno:</label>
                                <input type="text" class="form-control input-md cajatexto" name="numInterno" id="numInterno">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="tipoMaquina">Tipo Maquina:</label>
                                <select class="form-control input-md cajatexto" id="tipoMaquina" name="tipoMaquina"> </select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="añoMaquina">Año:</label>
                                <input type="number" class="form-control input-md cajatexto" id="añoMaquina" name="añoMaquina" />
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="capacidadTanque">Capacidad Estanque</label>
                                <div class="input-group">
                                    <input type="number" class="form-control input-md cajatexto" id="capacidadTanque" name="capacidadTanque" min="0" max="2100" />
                                    <span class="input-group-addon">lt</span>
                                </div>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="secuenciaMantencion">Secuencia Mantencion</label>
                                <select class="form-control input-md cajatexto" id="secuenciaMantencion" name="secuenciaMantencion">
                                    <option value="">Seleccionar...</option>
                                    <option value="kilometroFijo">Kilometro Fijo</option>
                                    <option value="horaFija">Hora Fija</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="asientosmaquina">Asientos</label>
                                <select class="form-control input-md cajatexto" id="asientosmaquina" name="asientosmaquina"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="numPuertas">N° Puertas</label>
                                <select class="form-control input-md cajatexto" id="numPuertas" name="numPuertas">
                                    <option value="">Seleccionar...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="centroCosto">Costo Centro</label>
                                <select class="form-control input-md cajatexto" id="centroCosto" name="centroCosto"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="idPatron">Padron</label>
                                <input type="text" class="form-control input-md cajatexto" name="idPatron" id="idPatron">
                            </div>
                        </div>
                    </div>

                    <section class="content">
                        <div class="box">
                            <!-- Navegación por pestañas -->
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" id="datosCarroceria" data-toggle="tab" href="#datosCarroceria-content" role="tab">
                                        Datos Carroceria
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="documentos" data-toggle="tab" href="#documentos-content" role="tab">
                                        Documentos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datosCompras" data-toggle="tab" href="#compras-content" role="tab">
                                        Datos de Compras
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="equipoProveedores" data-toggle="tab" href="#equipoProveedores-content" role="tab">
                                        Equipamientos Proveedores
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="seguros" data-toggle="tab" href="#seguros-content" role="tab">
                                        Seguros
                                    </a>
                                </li>
                            </ul>

                            <!-- Contenido de las pestañas -->
                            <div class="tab-content" id="myTabContent">
                                <!-- Pestaña de Datos Carroceria -->
                                <div class="tab-pane fade in active" id="datosCarroceria-content" role="tabpanel">
                                    <div class="panel-group" id="iddatosCarroceria">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numMotor">N° Motor</label>
                                                            <input type="text" class="form-control input-md cajatexto" name="numMotor" id="numMotor" />
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numChasis">N° Chasis:</label><span></span>
                                                            <input type="text" class="form-control input-md cajatexto" name="numChasis" id="numChasis" />
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="marcaChasis">Marca Chasis</label>
                                                            <select class="form-control input-md cajatexto" id="marcaChasis" name="marcaChasis"></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="modeloChasis">Modelo Chasis</label>
                                                            <select class="form-control input-md cajatexto" id="modeloChasis" name="modeloChasis"></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="marcaCarroceria">Marca Carroceria</label>
                                                            <select class="form-control input-md cajatexto" id="marcaCarroceria" name="marcaCarroceria"> </select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="modeloCarroceria">Modelo Carroceria</label>
                                                            <select class="form-control input-md cajatexto" id="modeloCarroceria" name="modeloCarroceria"></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numCarroceria">N° Carroceria</label>
                                                            <input type="text" class="form-control input-md cajatexto" name="numCarroceria" id="numCarroceria" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Pestaña de Documentos -->
                                <div class="tab-pane fade" id="documentos-content" role="tabpanel">
                                    <div class="panel-group" id="idDocumentos">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="tipoDocumento">Tipo Documento</label>
                                                            <select class="form-control input-md cajatexto solo-ruc" name="tipoDocumento" id="tipoDocumento"></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numDocumento">N° Documento </label>
                                                            <input type="text" class="form-control input-md cajatexto" name="numDocumento" id="numDocumento">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha desde</label>
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" value="2025-02-09">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha hasta</label>
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" value="2025-03-11">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="btnSeleccionarAnexo">Seleccionar Archivo</label>
                                                            <div>
                                                                <button type="button" class="btn btn-primary" id="btnSeleccionarAnexo">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i> Selección
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <div class="buttonAggArchivo">
                                                                <button type="button" class="btn btn-primary" id="btnAggArchivo">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i> Agregar Archivo
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="table-container2">
                                                            <div class="table-responsive2">
                                                                <table class="table table-bordes2" id="tablaLaboral">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Tipo de Documento</th>
                                                                            <th>N" Documento</th>
                                                                            <th>Fecha desde</th>
                                                                            <th>Fecha hasta</th>
                                                                            <th>Documento </th>
                                                                            <th>Eliminar </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="6" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
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

                                <!-- Pestaña de Datos Compras -->
                                <div class="tab-pane fade " id="compras-content" role="tabpanel">
                                    <div class="panel-group" id="idDatosCompras">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="tipoCompra">Tipo Compra</label>
                                                            <select class="form-control input-md cajatexto solo-ruc" name="tipoCompra" id="tipoCompra" disabled>
                                                                <option value="">Seleccionar...</option>
                                                                <option value="Leasing" selected>Leasing</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="propietarioCompra">Propietario</label>
                                                            <select class="form-control input-md cajatexto solo-ruc" name="propietarioCompra" id="propietarioCompra" disabled></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="proveedorCompra">Proveedor</label>
                                                            <select class="form-control input-md cajatexto solo-ruc" name="proveedorCompra" id="proveedorCompra" disabled></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numOperacion">N° Operacion:</label>
                                                            <input type="text" class="form-control input-md cajatexto" name="numOperacion" id="numOperacion" disabled />
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha Inicio</label>
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" disabled>
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numCuota">N° Cuota</label>
                                                            <input type="number" class="form-control input-md cajatexto solo-ruc " id="numCuota" name="numCuota" min="0" max="2100" value="0" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pestaña de Equipamiento Proveedores -->
                                <div class="tab-pane fade" id="equipoProveedores-content" role="tabpanel">
                                    <div class="panel-group" id="idEquipoProveedores">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <button type="button" class="btn btn-primary btn-block" id="nuevoEquipo">
                                                                <i class="fa fa" aria-hidden="true"></i> Nuevo Equipo
                                                            </button>
                                                        </div>
                                                        <div class="table-container2">
                                                            <div class="table-responsive2">
                                                                <table class="table table-bordes2" id="tablaLaboral">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Rut Proveedor</th>
                                                                            <th>Tipo Equipo</th>
                                                                            <th>Id Equipo</th>
                                                                            <th>Fecha de Instalacion</th>
                                                                            <th>Eliminar </th>
                                                                            <th>Estado </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="6" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
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

                                    <!-- Pestaña de Oculta de Proveedores -->
                                    <div class="pantalla-oculta-proveedor">
                                        <div class="row">
                                            <div class="form-group col-sm-3 col-xs-12">
                                                <label for="proveedorEquipamiento">Proveedor</label>
                                                <select class="form-control input-md cajatexto solo-ruc" name="proveedorEquipamiento" id="proveedorEquipamiento"></select>
                                            </div>

                                            <div class="form-group col-sm-3 col-xs-12">
                                                <label for="tipoEquipamiento">Tipo Equipamiento</label>
                                                <select class="form-control input-md cajatexto solo-ruc" name="tipoEquipamiento" id="tipoEquipamiento">
                                                    <option value="">Seleccionar...</option>
                                                    <option value="Camara de Seguridad">Camara de Seguridad</option>
                                                    <option value="GPS">GPS</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Fecha instalacion</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" value="2025-03-11">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contenedor-botones">
                                                <div class="form-group col-sm-3 col-xs-12 ">
                                                    <button type="button" class="btn btn-primary btn-block" id="agregarEquipo">
                                                        <i class="fa fa" aria-hidden="true"></i> Agregar Equipo
                                                    </button>
                                                </div>

                                                <div class="form-group col-sm-3 col-xs-12 ">
                                                    <button type="button" class="btn btn-primary btn-block" id="verListado">
                                                        <i class="fa fa" aria-hidden="true"></i> Ver Listado
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pestaña de Seguros -->
                                <div class="tab-pane fade" id="seguros-content" role="tabpanel">
                                    <div class="panel-group" id="idSeguros">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <button type="button" class="btn btn-primary btn-block" id="nuevoSeguro">
                                                                <i class="fa fa" aria-hidden="true"></i> Nuevo Seguro
                                                            </button>
                                                        </div>

                                                        <div class="table-container2">
                                                            <div class="table-responsive2">
                                                                <table class="table table-bordes2" id="tablaLaboral">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Rut Proveedor</th>
                                                                            <th>Proveedor</th>
                                                                            <th>Poliza</th>
                                                                            <th>N° Poliza</th>
                                                                            <th>Fecha Vencimiento </th>
                                                                            <th>Documento</th>
                                                                            <th>Eliminar </th>
                                                                            <th>Estado </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="8" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
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

                                    <!-- Pestaña de Oculta de Seguros -->
                                    <div class="pantalla-oculta-seguros">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="seguro">Seguro</label>
                                                            <select class="form-control input-md cajatexto solo-ruc" name="seguro" id="seguro"></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="tipoPoliza">Tipo Poliza</label>
                                                            <select class="form-control input-md cajatexto solo-ruc" name="tipoPoliza" id="tipoPoliza"></select>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="numPoliza">N° Poliza:</label>
                                                            <input type="text" class="form-control input-md cajatexto" name="numPoliza" id="numPoliza">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha Vencimiento</label>
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" value="2025-03-11">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="montoAsegurado">Monto Asegurado (UF)1:</label>
                                                            <input type="text" class="form-control input-md cajatexto" name="montoAsegurado" id="montoAsegurado">
                                                        </div>

                                                        <div class="form-group col-sm-3 col-xs-12">
                                                            <label for="seleccionarArchivo">Seleccionar Archivo:</label>
                                                            <input type="file" class="form-control input-md cajatexto" name="seleccionarArchivo" id="seleccionarArchivo" accept="*" data-show-upload="false" data-show-caption="false">
                                                        </div>

                                                        <div class="contenedor-botones">
                                                            <div class="form-group col-sm-3 col-xs-12 ">
                                                                <button type="button" class="btn btn-primary btn-block" id="agregarSeguro">
                                                                    <i class="fa fa" aria-hidden="true"></i> Agregar
                                                                </button>
                                                            </div>

                                                            <div class="form-group col-sm-3 col-xs-12 ">
                                                                <button type="button" class="btn btn-primary btn-block" id="verListadoSeguro">
                                                                    <i class="fa fa" aria-hidden="true"></i> Ver Listado
                                                                </button>
                                                            </div>
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
                    <!-- Botones de acción -->
                    <div class="button-container">
                        <button type="button" class="btn btn-primary" id="btnGrabarFicha">
                            <i class="fa fa-search" aria-hidden="true"></i> Grabar Ficha
                        </button>

                        <button type="button" class="btn btn-primary" id="btnListadoFicha">
                            <i class="fa fa-search" aria-hidden="true"></i> Ver Listado
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="vistas/js/activos/deMaquina.js"></script>

    <style>
        .pantalla-oculta-proveedor {
            visibility: hidden;
        }

        .pantalla-oculta-seguros {
            visibility: hidden;
        }
    </style>

    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            padding: 10px 15px;
        }

        @media (max-width: 576px) {
            .button-container {
                flex-direction: column;
            }
        }

        #lista table {
            font-size: 10px;
            border-collapse: separate !important;
            border-spacing: 0;
        }

        #lista th {
            font-size: 13px;
        }

        #lista td {
            font-size: 15px;
        }

        .panel-opcion-link:focus,
        .panel-opcion-link:active {
            text-decoration: underline;
        }

        .table-container {
            position: relative;
            top: -40px;
            margin: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table>thead>tr>th {
            background-color: #f4f4f4;
            border-bottom: 2px solid #ddd;
            border: 1px solid #ddd !important;
        }

        .table-bordered {
            border: 1px solid #ddd !important;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>td {
            border: 1px solid #ddd !important;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }


        .records-control {
            top: 80px;
            right: 100px;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }


        .table-controls {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin: 20px;
        }

        .control-left,
        .control-right {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }

        /* Inputs y selects responsive */
        .control-left select,
        .control-right input {
            padding: 4px 6px;
            font-size: 14px;
            max-width: 400px;
        }

        /* Comportamiento en pantallas pequeñas */
        @media (max-width: 600px) {
            .table-controls {
                flex-direction: column;
                align-items: flex-start;
            }

            .control-left,
            .control-right {
                width: 80%;
                justify-content: space-between;
            }
        }

        .buttonAggArchivo {
            display: flex;
            margin-left: 350px;
            margin-top: 20px;
        }

    
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnVerListado = document.getElementById("verListado");
            const pantallaOculta = document.querySelector(".pantalla-oculta-proveedor");
            const equipoProveedores = document.getElementById("idEquipoProveedores");

            btnVerListado.addEventListener("click", function() {
                // Oculta el formulario (por visibilidad)
                pantallaOculta.style.visibility = "hidden";

                // Asegura que el listado esté visible
                equipoProveedores.style.display = "block";
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el botón y los elementos que queremos mostrar/ocultar
            const btnNuevoEquipo = document.getElementById('nuevoEquipo');
            const pantallaOcultaProveedor = document.querySelector('.pantalla-oculta-proveedor');
            const idEquipoProveedores = document.getElementById('idEquipoProveedores');

            // Agregar evento de clic al botón
            btnNuevoEquipo.addEventListener('click', function() {
                // Mostrar pantalla-oculta-proveedor (cambiar de visibility:hidden a visible)
                pantallaOcultaProveedor.style.visibility = 'visible';

                // Ocultar idEquipoProveedores
                idEquipoProveedores.style.display = 'none';
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Script para el botón "Ver Listado" de seguros
            const btnVerListadoSeguro = document.getElementById("verListadoSeguro");
            const pantallaOcultaSeguros = document.querySelector(".pantalla-oculta-seguros");
            const idSeguros = document.getElementById("idSeguros");

            if (btnVerListadoSeguro) {
                btnVerListadoSeguro.addEventListener("click", function() {
                    // Oculta el formulario
                    pantallaOcultaSeguros.style.visibility = "hidden";

                    // Asegura que el listado esté visible
                    idSeguros.style.display = "block";
                });
            }

            // Script para el botón "Nuevo Seguro"
            const btnNuevoSeguro = document.getElementById('nuevoSeguro');

            if (btnNuevoSeguro) {
                btnNuevoSeguro.addEventListener('click', function() {
                    // Mostrar formulario de seguros
                    pantallaOcultaSeguros.style.visibility = 'visible';

                    // Ocultar listado de seguros
                    idSeguros.style.display = 'none';
                });
            }
        });
    </script>

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Asegurarse de que el panel esté abierto por defecto
            const panel = document.getElementById('frm_j_idt110_content');
            if (panel) {
                panel.classList.add('in');
            }

            // Implementar la funcionalidad de filtrado
            const filterInputs = document.querySelectorAll('.filter-input');
            filterInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    const searchText = this.value.toLowerCase();
                    const table = document.querySelector('.table');
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        const cell = row.cells[index];
                        if (cell) {
                            const text = cell.textContent.toLowerCase();
                            row.style.display = text.includes(searchText) ? '' : 'none';
                        }
                    });
                });
            });


            const btnGrabarFicha = document.getElementById('btnGrabarFicha');
            if (btnGrabarFicha) {
                const icon = btnGrabarFicha.querySelector('i');
                if (icon) {
                    icon.className = 'fa fa-save';
                }
                btnGrabarFicha.style.cssText = `
                background-color: #3c8dbc;
                border-color: #3c8dbc;
                padding: 8px 16px;
                border-radius: 6px;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            `;
                btnGrabarFicha.addEventListener('mouseover', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
                });
                btnGrabarFicha.addEventListener('mouseout', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnverActivos').querySelector('i').className = 'fa fa-save';
            document.getElementById('btnverActivos').style = 'background-color:#3c8dbc; border-color:#3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

            document.getElementById('btnverTodos').querySelector('i').className = 'fa fa-list-alt';
            document.getElementById('btnverTodos').style = 'background-color: #FF6600; border-color: #FF6600; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

            document.getElementById('btnverBloqueados').querySelector('i').className = 'fa fa-file-text';
            document.getElementById('btnverBloqueados').style = 'background-color: #3c8dbc; border-color: #3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseover', function() {
                    if (this.id === 'btnverActivos') this.style.backgroundColor = '#3c8dbc';
                    if (this.id === 'btnverTodos') this.style.backgroundColor = '#FF6600';
                    if (this.id === 'btnverBloqueados') this.style.backgroundColor = '#3c8dbc';
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
                });

                button.addEventListener('mouseout', function() {
                    if (this.id === 'btnverActivos') this.style.backgroundColor = '#3c8dbc';
                    if (this.id === 'btnverTodos') this.style.backgroundColor = '#FF6600';
                    if (this.id === 'btnverBloqueados') this.style.backgroundColor = '#3c8dbc';
                    this.style.transform = '';
                    this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
                });
            });
        });
    </script>