<div class="content-wrapper">

    <section class="content-header">
        <h1>Administrar Reporte de Falla</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio / Mantención</a></li>
            <li class="active">Administrar Reporte de Falla</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <div class="form-group col-sm-3 col-xs-12">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#modalAgregarReporte">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar Reporte
                    </button>
                </div>

                <div class="form-group col-sm-9 col-xs-12">
                    <input type="text"
                        class="form-control input-sm"
                        style="text-align:center; font-size:17px;"
                        id="filtradoDinamico"
                        placeholder="Filtrado general...">
                </div>
            </div>

            <div class="box-body">
                <div id="divTabla">
                    <table class="table table-bordered table-striped dt-responsive" id="tablaReportes" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">
                                    <center>#</center>
                                </th>
                                <th>
                                    <center>Dependencia</center>
                                </th>
                                <th>
                                    <center>Máquina</center>
                                </th>
                                <th>
                                    <center>Conductor</center>
                                </th>
                                <th>
                                    <center>Kilometraje</center>
                                </th>
                                <th>
                                    <center>Fecha</center>
                                </th>
                                <th>
                                    <center>Acciones</center>
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
MODAL AGREGAR REPORTE
======================================-->
<div id="modalAgregarReporte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <form role="form" method="post" id="formularioAgregarReporte">

                <!-- CABEZA -->
                <div class="modal-header" style="background:#A9A9A9; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nuevo Reporte de Mantención</h4>
                </div>

                <!-- CUERPO -->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- DATOS GENERALES -->
                        <h4><strong>Datos Generales</strong></h4>
                        <hr>
                        <div class="form-group col-md-6 col-xs-12">
                            <label for="maquina">Máquina:</label>
                            <select class="form-control" id="maquina" name="maquina" required>
                                <option value="">Seleccionar...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="conductor">Conductor:</label>
                            <select class="form-control" id="conductor" name="conductor" required>
                                <option value="">Seleccionar...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="kmActual">Km actual:</label>
                            <input type="number" class="form-control" id="kmActual" name="kmActual" placeholder="Ingrese Km actual" required>
                        </div>

                        <div class="col-xs-12">
                            <button type="button" class="btn btn-info btn-sm pull-right" id="btnVerListado">
                                <i class="fa fa-list"></i> Ver listado RF Activo
                            </button>
                        </div>

                        <!-- INGRESO DE DETALLE -->
                        <div class="col-xs-12">
                            <hr>
                            <h4><strong>Ingreso de detalle</strong></h4>
                            <hr>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="sistema">Sistema:</label>
                            <select class="form-control" id="sistema" name="sistema" required>
                                <option value="">Seleccionar...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-xs-12">
                            <label for="subSistema">Sub Sistema:</label>
                            <select class="form-control" id="subSistema" name="subSistema">
                                <option value="">Seleccionar...</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <label for="observacion">Observación (máx. 200 caracteres):</label>
                            <textarea class="form-control" id="observacion" name="observacion" rows="2" maxlength="200"
                                placeholder="Ingrese observaciones..." required></textarea>
                        </div>

                        <div class="col-xs-12 text-center">
                            <button type="button" class="btn btn-primary" id="btnAgregarDetalle">
                                <i class="fa fa-plus"></i> Agregar Detalle
                            </button>
                        </div>

                        <!-- LISTA DE DETALLE -->
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <hr>
                            <h4><strong>Lista de detalle</strong></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tablaDetalle">
                                    <thead style="background:#f4f4f4;">
                                        <tr>
                                            <th>
                                                <center>Sistema</center>
                                            </th>
                                            <th>
                                                <center>Sub Sistema</center>
                                            </th>
                                            <th>
                                                <center>Observación</center>
                                            </th>
                                            <th>
                                                <center>Eliminar</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="text-center">Ningún dato disponible en esta tabla</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- PIE -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-success" id="btnGrabarReporte">
                        <i class="fa fa-hdd-o"></i> Grabar reporte
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--=====================================
SCRIPTS
======================================-->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btnAgregar = document.getElementById("btnAgregarDetalle");
        const tablaBody = document.querySelector("#tablaDetalle tbody");
        const sistema = document.getElementById("sistema");
        const subSistema = document.getElementById("subSistema");
        const observacion = document.getElementById("observacion");

        btnAgregar.addEventListener("click", () => {
            if (!sistema.value || !observacion.value.trim()) {
                alert("Complete al menos Sistema y Observación");
                return;
            }

            const fila = document.createElement("tr");
            fila.innerHTML = `
      <td>${sistema.options[sistema.selectedIndex].text}</td>
      <td>${subSistema.options[subSistema.selectedIndex]?.text || "-"}</td>
      <td>${observacion.value}</td>
      <td><button type="button" class="btn btn-danger btn-sm btnEliminar"><i class="fa fa-trash"></i></button></td>
    `;
            tablaBody.appendChild(fila);

            fila.querySelector(".btnEliminar").addEventListener("click", () => fila.remove());

            sistema.value = "";
            subSistema.value = "";
            observacion.value = "";
        });
    });
</script>

<style>
    #divTabla {
        overflow: auto;
        width: 100%;
    }

    #divTabla table {
        width: 100%;
        background-color: #f9f9f9;
    }

    #tablaDetalle th,
    #tablaDetalle td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<script src="vistas/js/mantencion/reporteFalla.js"></script>