<div class="content-wrapper">    
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">        
        <h1 style="color: white; font-weight: bold;">Mantenedor: Maestro de Repuesto</h1>    
    </section>    
    
    <section class="content" style="padding-top: 15px;">        
        <div class="box">            
            <div class="panel-group" id="panelDatos">                
                <div class="panel panel-default">                    
                    <div class="panel-body" style="padding: 15px;">                        
                        <div class="form-group col-sm-5 col-xs-12" style="margin-bottom: 0;">                                
                            <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="modal" data-target="#modalAgregar">                                    
                                <i class="fa fa-plus" aria-hidden="true"></i> Crear Repuesto                                
                            </button>                            
                        </div>                        
                    </div>                
                </div>            
            </div>        
        </div>    
    </section>    
    
    <section class="content" style="padding-top: 0; margin-top: -150px;">        
        <div class="box">            
            <div class="panel-group" id="frm:j_idt110">                
                <div class="panel panel-default">                    
                    <div class="panel-heading" style="padding: 10px 15px;">                        
                        <h4 class="panel-opcion" style="margin: 0;">                            
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">                                
                                Lista de Repuesto                            
                            </a>                        
                        </h4>                    
                    </div>                                       
                    <!-- Controles de tabla -->                    
                    <div class="table-controls" style="margin-top: 30px;">                        
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
                        <div class="panel-body" style="padding-top: 0;">                            
                            <div class="table-container">                                
                                <div class="table-responsive">                                    
                                    <div class="box-body" style="padding-top: 0;">                                        
                                        <div id="lista">                                            
                                            <table id="tablaDocumentos" class="table table-bordered table-striped dt-responsive" width="100%">                                                
                                                <thead>                                                    
                                                    <tr>                                                        
                                                        <th onclick="sortTable(0, this)">Id Repuesto</th>                                                        
                                                        <th onclick="sortTable(1, this)">Repuesto</th>                                                        
                                                        <th onclick="sortTable(2, this)">Id Familia</th>                                                        
                                                        <th onclick="sortTable(3, this)">Id SubFamilia</th>                                                        
                                                        <th onclick="sortTable(4, this)">Costo pmp</th>                                                        
                                                        <th onclick="sortTable(5, this)">U.M</th>                                                        
                                                        <th onclick="sortTable(6, this)">Codigo Lectura</th>                                                        
                                                        <th onclick="sortTable(7, this)">Estado</th>                                                        
                                                        <th onclick="sortTable(8, this)">Editar</th>                                                    
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
    MODAL AGREGAR REPUESTO    
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
                        <h4 class="modal-title">Repuesto</h4>                    
                    </div>                                       
                    <!--=====================================                            
                    CUERPO DEL MODAL                            
                    ======================================-->                    
                    <div class="modal-body">                        
                        <div class="box-body">                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="idRepuesto">Id Repuesto:</label>                                
                                <input type="text" class="form-control input-md cajatexto" name="idRepuesto" id="idRepuesto">                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="selecFamilia">Seleccionar Familia:</label>                                
                                <select class="form-control input-md cajatexto" id="selecFamilia" name="selecFamilia"></select>                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="selecSubFamilia">Seleccionar SubFamilia:</label>                                
                                <select class="form-control input-md cajatexto" id="selecSubFamilia" name="selecSubFamilia"></select>                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="codigoLectura">Codigo Lectura:</label>                                
                                <input type="text" class="form-control input-md cajatexto" name="codigoLectura" id="codigoLectura">                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="descripcion">Descripcion:</label>                                
                                <input type="text" class="form-control input-md cajatexto" name="descripcion" id="descripcion">                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="unidadMedida">Unidad Medida:</label>                                
                                <select class="form-control input-md cajatexto" id="unidadMedida" name="unidadMedida"></select>                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="sistemaMaquina">Sistema Maquina:</label>                                
                                <select class="form-control input-md cajatexto" id="sistemaMaquina" name="sistemaMaquina"></select>                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="subSistemaMaquina">Sub Sistema Maquina:</label>                                
                                <select class="form-control input-md cajatexto" id="subSistemaMaquina" name="subSistemaMaquina"></select>                            
                            </div>                            
                            <div class="form-group col-sm-4 col-xs-12">                                
                                <label for="tieneAplicacion">Tiene Aplicacion:</label>                                
                                <select class="form-control input-md cajatexto" id="tieneAplicacion" name="tieneAplicacion"></select>                            
                            </div>                        
                        </div>                    
                    </div>                    
                    
                    <section class="content">                        
                        <div class="box">                            
                            <!-- Navegación por pestañas -->                            
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">                                
                                <li class="nav-item active">                                    
                                    <a class="nav-link active" id="codigoProveedor" data-toggle="tab" href="#codigoProveedor-content" role="tab">                                        
                                        Codigo Proveedor                                    
                                    </a>                                
                                </li>                                
                                <li class="nav-item">                                    
                                    <a class="nav-link" id="stockLayout" data-toggle="tab" href="#stockLayout-content" role="tab">                                        
                                        Stock y Layout                                    
                                    </a>                                
                                </li>                                
                                <li class="nav-item">                                    
                                    <a class="nav-link" id="aplicacion" data-toggle="tab" href="#aplicacion-content" role="tab">                                        
                                        Aplicacion                                    
                                    </a>                                
                                </li>                                
                                <li class="nav-item">                                    
                                    <a class="nav-link" id="imagenes" data-toggle="tab" href="#imagenes-content" role="tab">                                        
                                        Imagenes                                    
                                    </a>                                
                                </li>                            
                            </ul>                                                       
                            <!-- Contenido de las pestañas -->                            
                            <div class="tab-content" id="myTabContent">                                
                                <!-- Pestaña de codigo proveedor -->                                
                                <div class="tab-pane fade in active" id="codigoProveedor-content" role="tabpanel">                                    
                                    <div class="panel-group" id="idCodigoProveedor">                                        
                                        <div class="panel panel-default">                                            
                                            <div class="panel-body">                                                
                                                <div class="box-body">                                                    
                                                    <div class="row">                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="rutProveedor">RUT Proveedor</label>                                                            
                                                            <select class="form-control input-md cajatexto" id="rutProveedor" name="rutProveedor"></select>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="nombreProveedor">Nombre Proveedor</label>                                                            
                                                            <select class="form-control input-md cajatexto" id="nombreProveedor" name="nombreProveedor"></select>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="codigoProveedor">Codigo Proveedor:</label>                                                            
                                                            <input type="text" class="form-control input-md cajatexto" name="codigoProveedor" id="codigoProveedor" />                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="descripcionProveedor">Descripcion del Proveedor:</label>                                                            
                                                            <input type="text" class="form-control input-md cajatexto" name="descripcionProveedor" id="descripcionProveedor">                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <button type="button" class="btn btn-primary btn-block" id="agregarCodigoProvedor">                                                                
                                                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar Codigo Proveedor                                                            
                                                            </button>                                                        
                                                        </div>                                                        
                                                        <div class="table-container2">                                                            
                                                            <div class="table-responsive2">                                                                
                                                                <table id="tablaCodigoProveedor" class="table table-bordered table-striped dt-responsive" width="100%">                                                                    
                                                                    <thead class="thead-dark">                                                                        
                                                                        <tr>                                                                            
                                                                            <th>Rut Proveedor</th>                                                                            
                                                                            <th>Codigo Proveedor</th>                                                                            
                                                                            <th>Descripcion del Proveedor</th>                                                                            
                                                                            <th>Estado</th>                                                                            
                                                                            <th>Eliminar</th>                                                                        
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
                                <!-- Pestaña de stockLayout -->                                
                                <div class="tab-pane fade" id="stockLayout-content" role="tabpanel">                                    
                                    <div class="panel-group" id="stockLayout">                                        
                                        <div class="panel panel-default">                                            
                                            <div class="panel-body">                                                
                                                <div class="box-body">                                                    
                                                    <div class="row">                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="stockMinimo">Stock Mínimo</label>                                                            
                                                            <input type="number" class="form-control input-md cajatexto" name="stockMinimo" id="stockMinimo" min="0" value="0" step="1" required>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="stockMaximo">Stock Maximo</label>                                                            
                                                            <input type="number" class="form-control input-md cajatexto" name="stockMaximo" id="stockMaximo" min="0" value="0" step="1" required>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="stockReposicion">Stock Reposicion</label>                                                            
                                                            <input type="number" class="form-control input-md cajatexto" name="stockReposicion" id="stockReposicion" min="0" step="1" required>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="ubicacionX">Ubicacion X:</label>                                                            
                                                            <input type="text" class="form-control input-md cajatexto" name="ubicacionX" id="ubicacionX">                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="ubicacionY">Ubicacion Y:</label>                                                            
                                                            <input type="text" class="form-control input-md cajatexto" name="ubicacionY" id="ubicacionY">                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="ubicacionZ">Ubicacion Z:</label>                                                            
                                                            <input type="text" class="form-control input-md cajatexto" name="ubicacionZ" id="ubicacionZ">                                                        
                                                        </div>                                                    
                                                    </div>                                                
                                                </div>                                            
                                            </div>                                        
                                        </div>                                    
                                    </div>                                
                                </div>                                                               
                                <!-- Pestaña de Aplicacion -->                                
                                <div class="tab-pane fade" id="aplicacion-content" role="tabpanel">                                    
                                    <div class="panel-group" id="idAplicacion">                                        
                                        <div class="panel panel-default">                                            
                                            <div class="panel-body">                                                
                                                <div class="box-body">                                                    
                                                    <div class="row">                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="marca">Marca</label>                                                            
                                                            <select class="form-control input-md cajatexto solo-ruc" name="marca" id="marca"></select>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-4 col-xs-12">                                                            
                                                            <label for="modeloAplicacion">Modelo</label>                                                            
                                                            <select class="form-control input-md cajatexto solo-ruc" name="modeloAplicacion" id="modeloAplicacion"></select>                                                        
                                                        </div>                                                        
                                                        <div class="col-md-4">                                                            
                                                            <div class="form-group">                                                                
                                                                <label for="fechaDesde">Fecha Desde</label>                                                                
                                                                <div class="input-group">                                                                    
                                                                    <input type="date" class="form-control" id="fechaDesde" name="fechaDesde">                                                                    
                                                                    <span class="input-group-addon">                                                                        
                                                                        <i class="fa fa-calendar"></i>                                                                    
                                                                    </span>                                                                
                                                                </div>                                                            
                                                            </div>                                                        
                                                        </div>                                                        
                                                        <div class="col-md-4">                                                            
                                                            <div class="form-group">                                                                
                                                                <label for="fechaHasta">Fecha Hasta</label>                                                                
                                                                <div class="input-group">                                                                    
                                                                    <input type="date" class="form-control" id="fechaHasta" name="fechaHasta">                                                                    
                                                                    <span class="input-group-addon">                                                                        
                                                                        <i class="fa fa-calendar"></i>                                                                    
                                                                    </span>                                                                
                                                                </div>                                                            
                                                            </div>                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-3 col-xs-12">                                                            
                                                            <button type="button" class="btn btn-primary btn-block" id="AgregarAplicacion">                                                                
                                                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar Aplicación                                                            
                                                            </button>                                                        
                                                        </div>                                                        
                                                        <div class="table-container2">                                                            
                                                            <div class="table-responsive2">                                                                
                                                                <table id="tablaAplicacion" class="table table-bordered table-striped dt-responsive" width="100%">                                                                    
                                                                    <thead class="thead-dark">                                                                        
                                                                        <tr>                                                                            
                                                                            <th>Id Marca</th>                                                                            
                                                                            <th>Id Modelo</th>                                                                            
                                                                            <th>Año Desde</th>                                                                            
                                                                            <th>Año Hasta</th>                                                                            
                                                                            <th>Estado</th>                                                                            
                                                                            <th>Eliminar</th>                                                                        
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
                                <!-- Pestaña de Imagenes -->                                
                                <div class="tab-pane fade" id="imagenes-content" role="tabpanel">                                    
                                    <div class="panel-group" id="idImagenes">                                        
                                        <div class="panel panel-default">                                            
                                            <div class="panel-body">                                                
                                                <div class="box-body">                                                    
                                                    <div class="row">                                                        
                                                        <div class="form-group col-sm-6 col-xs-12">                                                            
                                                            <label for="imagen">Seleccionar Imagen:</label>                                                            
                                                            <input type="file" class="form-control input-md cajatexto" name="imagen" id="imagen" accept="image/*" data-show-upload="false" data-show-caption="false">                                                        
                                                        </div>                                                        
                                                        <div class="form-group col-sm-3 col-xs-12">                                                            
                                                            <label for="ordenAparicion">Orden de Aparicion</label>                                                            
                                                            <select class="form-control input-md cajatexto solo-ruc" name="ordenAparicion" id="ordenAparicion"></select>                                                        
                                                        </div>                                                        
                                                        <div class="table-container2">                                                            
                                                            <div class="table-responsive2">                                                                
                                                                <table id="tablaImagenes" class="table table-bordered table-striped dt-responsive" width="100%">                                                                    
                                                                    <thead class="thead-dark">                                                                        
                                                                        <tr>                                                                            
                                                                            <th>Imagen</th>                                                                            
                                                                            <th>Orden</th>                                                                            
                                                                            <th>Eliminar</th>                                                                        
                                                                        </tr>                                                                    
                                                                    </thead>                                                                    
                                                                    <tbody>                                                                        
                                                                        <tr>                                                                            
                                                                            <td colspan="3" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>                                                                        
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
                            </div>                        
                        </div>                    
                    </section>                                      
                    <!--=====================================                            
                    PIE DEL MODAL                                
                    ======================================-->                    
                    <div class="button-container">                        
                        <button type="button" class="btn btn-primary" id="btnGrabarRespuesto">                            
                            <i class="fa fa-save" aria-hidden="true"></i> Grabar Respuesto                        
                        </button>                        
                        <button type="button" class="btn btn-primary" id="btnListadoFicha" data-dismiss="modal">                            
                            <i class="fa fa-bars" aria-hidden="true"></i> Ver Listado                        
                        </button>                    
                    </div>                
                </form>            
            </div>        
        </div>    
    </div>    

    <style>        
        .content {
            padding: 0;
        }
        
        .box {
            margin-bottom: 10px;
            box-shadow: 0 1px 1px rgba(0,0,0,.1);
        }
        
        .panel-body {
            padding: 15px;
        }       
        .form-group {
            margin-bottom: 15px;
        }
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
            text-align: center;        
        }                
        #lista th {            
            font-size: 13px;            
            background-color: #f4f4f4;            
            border: 1px solid #ddd !important;            
            cursor: pointer;            
            position: relative;            
            user-select: none;            
            padding-right: 20px;        
        }        
        #lista th.asc::after {            
            content: "▲";            
            position: absolute;            
            right: 5px;            
            top: 50%;            
            transform: translateY(-50%);            
            font-size: 12px;            
            color: #555;        
        }               
        #lista th.desc::after {            
            content: "▼";            
            position: absolute;            
            right: 5px;            
            top: 50%;            
            transform: translateY(-50%);            
            font-size: 12px;            
            color: #555;        
        }                
        #lista td {            
            font-size: 15px;            
            border: 1px solid #ddd !important;        
        }                
        .panel-opcion-link:focus,        
        .panel-opcion-link:active {            
            text-decoration: underline;        
        }        
        .table-container {            
            margin: 0 15px 15px 15px;        
        }               
        .table-responsive {            
            overflow-x: auto;        
        }               
        .table {            
            margin-bottom: 0;        
        }               
        .table-striped>tbody>tr:nth-of-type(odd) {            
            background-color: #f9f9f9;        
        }               
        .table-bordered {            
            border: 1px solid #ddd !important;        
        }               
        .table-controls {            
            display: flex;            
            justify-content: space-between;            
            align-items: center;            
            margin: 0 15px 10px 15px;            
            flex-wrap: wrap;        
        }               
        .control-left,        
        .control-right {            
            margin: 5px;        
        }               
        .control-right input {            
            max-width: 200px;        
        }               
        #agregarCodigoProvedor {            
            margin-top: 25px;        
        }               
        #AgregarAplicacion {            
            margin-top: 27px;        
        }               
        .table-responsive2 {            
            width: 100%;            
            overflow-x: auto;        
        }               
        .table th,        
        .table td {            
            border: 1px solid #ddd !important;            
            padding: 8px;            
            white-space: nowrap;        
        }               
        .thead-dark th {            
            background-color: #f4f4f4;            
            color: #333333;        
        }        
        .table-footer {            
            margin-top: 10px;            
            font-size: 10px;            
            color: #666;            
            text-align: left;        
        }    
    </style>
    <script>                
        let sortDirection = [];
        
        function sortTable(columnIndex, thElement) {                        
            const table = document.getElementById("tablaDocumentos");            
            if (!table || !table.tBodies[0]) return;                        
            
            const rows = Array.from(table.tBodies[0].rows);                        
            const dir = sortDirection[columnIndex] === "asc" ? "desc" : "asc";                        
            sortDirection[columnIndex] = dir;                                    
            
            // Limpiar clases de flechas en todos los th                        
            const headers = table.querySelectorAll("th");                        
            headers.forEach((th, i) => {                                
                th.classList.remove("asc", "desc");                                
                if (i === columnIndex) th.classList.add(dir);                        
            });                                    
            
            rows.sort((a, b) => {                                
                let aText = a.cells[columnIndex].innerText.trim();                                
                let bText = b.cells[columnIndex].innerText.trim();                                
                const datePattern = /^\d{4}-\d{2}-\d{2}$/;                                
                const isDate = datePattern.test(aText) && datePattern.test(bText);                                                
                
                if (isDate) {                                        
                    return dir === "asc" ?                                                
                        new Date(aText) - new Date(bText) :                                                
                        new Date(bText) - new Date(aText);                                
                }                                
                return dir === "asc" ?                                        
                    aText.localeCompare(bText, 'es', { numeric: true }) :                                        
                    bText.localeCompare(aText, 'es', { numeric: true });                        
            });                                    
            
            const tbody = table.tBodies[0];                        
            tbody.innerHTML = "";                        
            rows.forEach(row => tbody.appendChild(row));                
        }                        
        
        function filterTable() {                        
            const input = document.getElementById("searchInput");            
            if (!input) return;                        
            
            const inputValue = input.value.toLowerCase();                        
            const table = document.querySelector("#lista table");                        
            if (!table || !table.tBodies[0]) return;                        
            
            const rows = table.tBodies[0].rows;                        
            Array.from(rows).forEach(row => {                                
                const cells = Array.from(row.cells);                                
                const match = cells.some(cell => cell.textContent.toLowerCase().includes(inputValue));                                
                row.style.display = match ? "" : "none";                        
            });                
        }                        
        
        function updateVisibleRows() {                        
            const entriesSelect = document.getElementById("entriesSelect");            
            if (!entriesSelect) return;                        
            
            const limit = parseInt(entriesSelect.value);                        
            const table = document.querySelector("#lista table");                        
            if (!table || !table.tBodies[0]) return;                        
            
            const rows = Array.from(table.tBodies[0].rows);                        
            let visibleCount = 0;                        
            rows.forEach(row => {                                
                if (row.style.display !== "none") {                                        
                    visibleCount++;                                        
                    row.style.display = visibleCount <= limit ? "" : "none";                                
                }                        
            });                
        }                        
                // Event listeners para elementos que SÍ existen        
        document.addEventListener("DOMContentLoaded", function() {            
            // Vincular búsqueda con límite dinámicamente            
            const searchInput = document.getElementById("searchInput");            
            if (searchInput) {                
                searchInput.addEventListener("input", () => {                                
                    filterTable();                                
                    updateVisibleRows();                        
                });            
            }                                   
            // Asegurar que el panel esté abierto por defecto                        
            const panel = document.getElementById('frm_j_idt110_content');                        
            if (panel) {                                
                panel.classList.add('in');                        
            }                                               
            // Event listener para el botón de listado            
            const btnListadoFicha = document.getElementById('btnListadoFicha');                        
            if (btnListadoFicha) {                
                btnListadoFicha.addEventListener('click', function() {                                    
                    if (typeof $ !== 'undefined') {                        
                        $('#modalAgregar').modal('hide');                    
                    }                                
                });            
            }                                  
            // Event listener para el botón de grabar            
            const btnGrabarRespuesto = document.getElementById('btnGrabarRespuesto');            
            if (btnGrabarRespuesto) {                
                btnGrabarRespuesto.addEventListener('click', function() {                    
                    console.log('Grabar repuesto - Funcionalidad a implementar');                
                });            
            }                                  
            // Event listener para agregar código proveedor            
            const btnAgregarCodigoProvedor = document.getElementById('agregarCodigoProvedor');            
            if (btnAgregarCodigoProvedor) {                
                btnAgregarCodigoProvedor.addEventListener('click', function() {                    
                    console.log('Agregar código proveedor - Funcionalidad a implementar');                
                });            
            }                        
                     
            const btnAgregarAplicacion = document.getElementById('AgregarAplicacion');            
            if (btnAgregarAplicacion) {                
                btnAgregarAplicacion.addEventListener('click', function() {                    
                    console.log('Agregar aplicación - Funcionalidad a implementar');                
                });            
            }        
        });        
    </script>

    <script src=""></script>
</div>
