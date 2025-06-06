<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Estructura: Cargo Organizacional</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-5 col-xs-12">
                                <button type="button" class="btn btn-primary" id="btncrearCargo" data-toggle="modal" data-target="#modalAgregar">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Crear Cargo
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
                                Lista de Cargo
                            </a>
                        </h4>
                    </div>

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
                                                            <center>Id Cargo</center>
                                                        </th>
                                                        <th>
                                                            <center>Cargo</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado</center>
                                                        </th>
                                                        <th>
                                                            <center>Accion</center>
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

    <!--=====================================
        MODAL AGREGAR
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

                        <h4 class="modal-title">Cargo</h4>

                    </div>

                    <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="nuevoNombre">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <input type="text" class="form-control input-md cajatexto" name="nuevoNombre" id="nuevoNombre">
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="divisionModificar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="divisionModificar" id="divisionModificar">
                                    <option value="" selected>Seleccionar...</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Interurbano">Interurbano</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="areaNegocio">Area de Negocio:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="areaNegocio" id="areaNegocio"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="areaDependencia">Area Dependecia:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="areaDependencia" id="areaDependencia"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="SolicitudPersonal">¿Solicita Personal?:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="SolicitudPersonal" id="SolicitudPersonal">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="autorizaSolicitudMs">¿Autoriza Solicitud MS?:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="autorizaSolicitudMs" id="autorizaSolicitudMs">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="autorizaOc">¿Autoriza OC?:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="autorizaOc" id="autorizaOc">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="aprobarSoliPersonal">¿Aprobar Solicitud personal?:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                <select class="form-control input-md cajatexto solo-ruc" name="aprobarSoliPersonal" id="aprobarSoliPersonal">
                                    <option value="Si">Si</option>
                                    <option value="Si" selected>No</option>
                                </select>
                            </div>

                            <div class="button-container">
                                <button type="button" class="btn btn-primary" id="btnGrabarFicha">
                                    <i class="fa fa-save" aria-hidden="true"></i> Grabar Ficha
                                </button>

                                <button type="button" class="btn btn-primary" id="btnMostarListado"" style=" background-color: #FF6600;">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Mostrar Listado
                                </button>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!--=====================================
        MODAL EDITAR
    ======================================-->

    <div id="modalEditar" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form role="form" method="post" id="formulario_para_editar">

                    <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                    <div class="modal-header" style="background:#A9A9A9; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Cargo</h4>

                    </div>

                    <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                    <div class="modal-body">

                        <div class="box-body">

                            <input type="hidden" name="idcargo_organizacional" id="idcargo_organizacional" required>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="nuevoNombreMod">Nombre:</label>
                                <input type="text" class="form-control input-md cajatexto" name="nuevoNombreMod" id="nuevoNombreMod">
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="divisionModificarMod">División:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="divisionModificarMod" id="divisionModificarMod">
                                    <option value="" selected>Seleccionar...</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Interurbano">Interurbano</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="areaNegocioMod">Area de Negocio:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="areaNegocioMod" id="areaNegocioMod"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="areaDependenciaMod">Area Dependecia:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="areaDependenciaMod" id="areaDependenciaMod"></select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="SolicitudPersonalMod">¿Solicita Personal?:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="SolicitudPersonalMod" id="SolicitudPersonalMod">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="autorizaSolicitudMsMod">¿Autoriza Solicitud MS?:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="autorizaSolicitudMsMod" id="autorizaSolicitudMsMod">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="autorizaOcMod">¿Autoriza OC?:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="autorizaOcMod" id="autorizaOcMod">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="aprobarSoliPersonalMod">¿Aprobar Solicitud personal?:</label>
                                <select class="form-control input-md cajatexto solo-ruc" name="aprobarSoliPersonalMod" id="aprobarSoliPersonalMod">
                                    <option value="Si">Si</option>
                                    <option value="Si" selected>No</option>
                                </select>
                            </div>

                            <div class="button-container">
                                <button type="button" class="btn btn-primary" id="btnModificarFicha">
                                    <i class="fa fa-save" aria-hidden="true"></i> Modificar Ficha
                                </button>

                                <button type="button" class="btn btn-primary" id="btnMostarListado" style="background-color: #FF6600;">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Mostrar Listado
                                </button>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>

<style>
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
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        flex-wrap: wrap;
    }

    .control-left,
    .control-right {
        margin: 5px;
    }

    .control-right input {
        max-width: 200px;
    }

    #btnGrabarFicha {
        margin-top: 22px !important;
        position: relative;
        left: 20px;
    }

    #btnMostarListado {
        margin-top: 22px !important;
        position: relative;
        left: 30px;
    }
</style>

<!--CIERRO EL MODAL Y MUESTRO EL LISTADO-->
<script>
    $(document).ready(function() {
        $("#btnMostarListado").on("click", function() {
            $("#modalAgregar").modal("hide");

            const panelLista = $("#frm_j_idt110_content");
            if (!panelLista.hasClass("in")) {
                panelLista.collapse("show");
            }

            $('html, body').animate({
                scrollTop: $("#lista").offset().top - 100
            }, 500);
        });
    });
</script>

<script>
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
</script>

<!--FILTRO DINAMICO-->
<script>
    function filterTable() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const table = document.querySelector("#lista table");
        const rows = table.tBodies[0].rows;

        Array.from(rows).forEach(row => {
            const cells = Array.from(row.cells);
            const match = cells.some(cell => cell.textContent.toLowerCase().includes(input));
            row.style.display = match ? "" : "none";
        });
    }

    function updateVisibleRows() {
        const limit = parseInt(document.getElementById("entriesSelect").value);
        const table = document.querySelector("#lista table");
        const rows = Array.from(table.tBodies[0].rows);

        let visibleCount = 0;
        rows.forEach(row => {
            if (row.style.display !== "none") {
                visibleCount++;
                row.style.display = visibleCount <= limit ? "" : "none";
            }
        });
    }

    // Vincular búsqueda con límite dinámicamente
    document.getElementById("searchInput").addEventListener("input", () => {
        filterTable();
        updateVisibleRows();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnMostarListado = document.getElementById('btnMostarListado');
        if (btnMostarListado) {
            const icon = btnMostarListado.querySelector('i');
            if (icon) {
                icon.className = 'fa fa-save';
            }
            btnMostarListado.style.cssText = `
                background-color: #FF6600;
                border-color:rgb(248, 137, 64);
                padding: 8px 16px;
                border-radius: 6px;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            `;
            btnMostarListado.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
            });
            btnMostarListado.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputBusqueda = document.getElementById('busquedaCargo');
        const tabla = document.querySelector('#lista table');

        if (inputBusqueda && tabla) {
            inputBusqueda.addEventListener('keyup', function() {
                const texto = inputBusqueda.value.toLowerCase();
                const filas = tabla.querySelectorAll('tbody tr');

                filas.forEach(fila => {
                    const textoFila = fila.textContent.toLowerCase();
                    fila.style.display = textoFila.includes(texto) ? '' : 'none';
                });
            });
        }
    });
</script>

<script src="vistas/js/recursosHumanos/cargoOrganizacional.js"></script>