<div class="content-wrapper">
    <!-- ENCABEZADO -->
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Consulta Orden de Compra</h1>
    </section>

    <!-- FORMULARIO DE CONSULTA -->
    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
                        <div class="box-body">
                            <!-- PRIMERA FILA -->
                            <div class="row">
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="empresa">Empresa:</label>
                                    <select class="form-control input-md cajatexto solo-ruc" name="empresaConsultar" id="empresaConsultar"></select>
                                </div>

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="numeroOC">N° OC:</label>
                                    <input type="text" class="form-control input-md cajatexto" name="numeroOC" id="numeroOC">
                                </div>

                                <div class="form-group col-sm-4 col-xs-12" style="margin-top:25px;">
                                    <button type="button" class="btn btn-primary" id="btnConsultar">
                                        <i class="fa fa-search" aria-hidden="true"></i> Consultar
                                    </button>
                                </div>
                            </div>

                            <!-- SEGUNDA FILA -->
                            <div class="row">

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="tipoOC">Tipo OC</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="tipoOC" id="tipoOC" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-12">
                                    <label for="fechaVer">Fecha :</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="fechaVer" id="fechaVer" disabled>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="rutEmpresaVer">Rut Empresa</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutEmpresaVer" id="rutEmpresaVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="empresaVer"> Empresa</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="empresaVer" id="empresaVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="estadoActualVer"> Estado Actual</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="estadoActualVer" id="estadoActualVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="tipoDocumentoVer"> Tipo Docuemento </label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="tipoDocumentoVer" id="tipoDocumentoVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="formaPagoVer"> Forma de Pago </label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="formaPagoVer" id="formaPagoVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="numDocumentoVer"> N° Documento </label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="numDocumentoVer" id="numDocumentoVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="rutProveedorVer"> Rut Proveedor</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutProveedorVer" id="rutProveedorVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="ProveedorVer"> Proveedor</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="ProveedorVer" id="ProveedorVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="preAprovadoVer"> Pre Aprovado</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="preAprovadoVer" id="preAprovadoVer" disabled></select>
                                </div>

                                <div class="form-group col-sm-2 col-xs-2">
                                    <label for="aprovadoVer"> Aprovado</label>
                                    <input type="text" class="form-control input-md cajatexto solo-ruc" name="aprovadoVer" id="aprovadoVer" disabled></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LISTADO -->
    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Lista
                            </a>
                        </h4>
                    </div>

                    <!-- CONTROLES DE TABLA -->
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

                    <!-- TABLA -->
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
                                                            <center>Item</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo Producto</center>
                                                        </th>
                                                        <th>
                                                            <center>U.M</center>
                                                        </th>
                                                        <th>
                                                            <center>Producto</center>
                                                        </th>
                                                        <th>
                                                            <center>Costo Unitario</center>
                                                        </th>
                                                        <th>
                                                            <center>Monto Descuento</center>
                                                        </th>
                                                        <th>
                                                            <center>Total Costo Unitario</center>
                                                        </th>
                                                        <th>
                                                            <center>Cantidad Solicitud</center>
                                                        </th>
                                                        <th>
                                                            <center>Cantidad Entregada</center>
                                                        </th>
                                                        <th>
                                                            <center>Sub Total</center>
                                                        </th>
                                                        <th>
                                                            <center>MSM</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo Aplicacion</center>
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
</div>

<script src="vistas/js/compras/consultaOrdenCompra.js"></script>

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