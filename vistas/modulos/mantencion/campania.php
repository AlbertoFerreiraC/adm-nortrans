<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Campañas

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Mantencion</a></li>

      <li class="active">Administrar Campañas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="form-group col-sm-3 col-xs-12 ">
          <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar">
            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Registro
          </button>
        </div>

        <div class="form-group col-sm-9 col-xs-12 ">
          <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
        </div>


      </div>

      <div class="box-body">

        <div id="div1">
          <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%">
            <thead>
              <tr>
                <th style="width:10px">
                  <center>#</center>
                </th>
                <th>
                  <center> Fecha de Creacion</center>
                </th>
                <th>
                  <center> Tipo Campaña</center>
                </th>
                <th>
                  <center> Tipo frecuencia</center>
                </th>
                <th>
                  <center> Frecuencia</center>
                </th>
                <th>
                  <center> Comentario</center>
                </th>
                <th>
                  <center> Fecha Desde</center>
                </th>
                <th>
                  <center> Fecha Hasta</center>
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
MODAL AGREGAR TAREA
======================================-->

<div id="modalAgregar" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="formulario_para_agregar">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <input
              type="hidden"
              name="creacionAgregar"
              id="creacionAgregar">


            <div class="form-group col-md-6 col-xs-6">
              <label for="tipoCampañaAgregar">Tipo Campaña:</label>
              <select class="form-control" id="tipoCampañaAgregar" name="tipoCampañaAgregar" required>
                <option value="">Seleccionar..</option>
                <option value="Puntual">Puntual</option>
                <option value="Permanente">Permanente</option>
              </select>
            </div>

            <div class="form-group col-md-6 col-xs-">
              <label for="descripcionAgregar">Descripcion:</label>
              <input type="text" class="form-control input-md" name="descripcionAgregar" id="descripcionAgregar"
                placeholder="Escriba una descripcion..." required>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="tipoFrecuenciaAgregar">Tipo Frecuencia:</label>
              <select class="form-control" id="tipoFrecuenciaAgregar" name="tipoFrecuenciaAgregar" required>
                <option value="">Seleccionar..</option>
                <option value="Km">Km</option>
                <option value="Accion">Accion</option>
              </select>
            </div>

            <div class="form-group col-md-6 col-xs-">
              <label for="frecuenciaAgregar">Frecuencia:</label>
              <input type="text" class="form-control input-md" name="frecuenciaAgregar" id="frecuenciaAgregar"
                placeholder="Escriba una descripcion..." required>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="comentarioAgregar">Comentario:</label>
              <textarea
                class="form-control"
                name="comentarioAgregar"
                id="comentarioAgregar"
                rows="1"
                placeholder="Escriba un comentario..."
                required></textarea>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="desdeAgregar">Fecha Desde:</label>
              <input
                type="date"
                class="form-control input-md"
                name="desdeAgregar"
                id="desdeAgregar"
                required>
            </div>

            <div class="form-group col-md-6 col-xs-6">
              <label for="hastaAgregar">Fecha Hasta:</label>
              <input
                type="date"
                class="form-control input-md"
                name="hastaAgregar"
                id="hastaAgregar"
                disabled>
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
MODAL EDITAR REGISTRO
======================================-->
<div id="modalModificar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="post" id="formulario_para_modificar">

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

            <!-- ID oculto -->
            <input type="hidden" name="idModificar" id="idModificar" required>

            <!-- Fecha de creación (oculta) -->
            <input type="hidden" name="creacionModificar" id="creacionModificar">

            <!-- Tipo Campaña -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="tipoCampañaModificar">Tipo Campaña:</label>
              <select class="form-control" id="tipoCampañaModificar" name="tipoCampañaModificar" required>
                <option value="">Seleccionar..</option>
                <option value="Puntual">Puntual</option>
                <option value="Permanente">Permanente</option>
              </select>
            </div>

            <!-- Descripción -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="descripcionModificar">Descripción:</label>
              <input
                type="text"
                class="form-control input-md"
                name="descripcionModificar"
                id="descripcionModificar"
                placeholder="Escriba una descripción..."
                required>
            </div>

            <!-- Tipo Frecuencia -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="tipoFrecuenciaModificar">Tipo Frecuencia:</label>
              <select class="form-control" id="tipoFrecuenciaModificar" name="tipoFrecuenciaModificar" required>
                <option value="">Seleccionar..</option>
                <option value="Km">Km</option>
                <option value="Accion">Accion</option>
              </select>
            </div>

            <!-- Frecuencia -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="frecuenciaModificar">Frecuencia:</label>
              <input
                type="text"
                class="form-control input-md"
                name="frecuenciaModificar"
                id="frecuenciaModificar"
                placeholder="Ingrese frecuencia..."
                required>
            </div>

            <!-- Comentario -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="comentarioModificar">Comentario:</label>
              <textarea
                class="form-control"
                name="comentarioModificar"
                id="comentarioModificar"
                rows="1"
                placeholder="Escriba un comentario..."
                required></textarea>
            </div>

            <!-- Fecha Desde -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="desdeModificar">Fecha Desde:</label>
              <input
                type="date"
                class="form-control input-md"
                name="desdeModificar"
                id="desdeModificar"
                required>
            </div>

            <!-- Fecha Hasta -->
            <div class="form-group col-md-6 col-xs-6">
              <label for="hastaModificar">Fecha Hasta:</label>
              <input
                type="date"
                class="form-control input-md"
                name="hastaModificar"
                id="hastaModificar">
            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary"
            style="background-color: #adaf9c; border-color: #f46717;"
            id="btnModificar">
            <i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar Cambios
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<script src="vistas/js/mantencion/campania.js"></script>

<script>
  //fecha desde
  const hoy = new Date().toISOString().split('T')[0];
  document.getElementById('desdeAgregar').value = hoy;
</script>

<script>
  const creacion = new Date().toISOString().split('T')[0];
  document.getElementById('creacionAgregar').value = creacion;

  const dia = new Date();
  const dd = String(dia.getDate()).padStart(2, '0');
  const mm = String(dia.getMonth() + 1).padStart(2, '0');
  const yyyy = dia.getFullYear();
  const fechaFormateada = `${dd}/${mm}/${yyyy}`;
  document.getElementById('creacionAgregar').value = fechaFormateada;
</script>

<script>
  //Fecha hasta  
  const inputDesde = document.getElementById('desdeAgregar');
  const inputHasta = document.getElementById('hastaAgregar');

  const day = new Date();
  const formatoISO = day.toISOString().split('T')[0];
  inputDesde.value = formatoISO;
  inputDesde.min = formatoISO;

  function calcularFechaHasta() {
    const fechaDesde = new Date(inputDesde.value);
    if (isNaN(fechaDesde)) return;

    const fechaHasta = new Date(fechaDesde);
    fechaHasta.setDate(fechaHasta.getDate() + 30);

    const fechaHastaISO = fechaHasta.toISOString().split('T')[0];
    inputHasta.value = fechaHastaISO;
  }

  calcularFechaHasta();

  inputDesde.addEventListener('change', calcularFechaHasta);

  inputHasta.disabled = false;
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const tipoFrecuencia = document.getElementById("tipoFrecuenciaAgregar");
    const campoFrecuencia = document.getElementById("frecuenciaAgregar").closest(".form-group");
    const campoFechaHasta = document.getElementById("hastaAgregar").closest(".form-group");

    campoFrecuencia.style.display = "none";
    campoFechaHasta.style.display = "none";

    tipoFrecuencia.addEventListener("change", function() {
      const valor = this.value;

      if (valor === "Km") {
        campoFrecuencia.style.display = "block";
        campoFechaHasta.style.display = "none";
      } else if (valor === "Accion") {
        campoFrecuencia.style.display = "none";
        campoFechaHasta.style.display = "block";
      } else {
        campoFrecuencia.style.display = "none";
        campoFechaHasta.style.display = "none";
      }
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const tipoFrecuenciaMod = document.getElementById("tipoFrecuenciaModificar");
    const campoFrecuenciaMod = document.getElementById("frecuenciaModificar").closest(".form-group");
    const campoFechaHastaMod = document.getElementById("hastaModificar").closest(".form-group");

    campoFrecuenciaMod.style.display = "none";
    campoFechaHastaMod.style.display = "none";

    tipoFrecuenciaMod.addEventListener("change", function() {
      const valor = this.value;

      if (valor === "Km") {
        campoFrecuenciaMod.style.display = "block";
        campoFechaHastaMod.style.display = "none";
      } else if (valor === "Accion") {
        campoFrecuenciaMod.style.display = "none";
        campoFechaHastaMod.style.display = "block";
      } else {
        campoFrecuenciaMod.style.display = "none";
        campoFechaHastaMod.style.display = "none";
      }
    });

    $('#modalModificar').on('shown.bs.modal', function() {
      const valorActual = tipoFrecuenciaMod.value;
      if (valorActual === "Km") {
        campoFrecuenciaMod.style.display = "block";
        campoFechaHastaMod.style.display = "none";
      } else if (valorActual === "Accion") {
        campoFrecuenciaMod.style.display = "none";
        campoFechaHastaMod.style.display = "block";
      } else {
        campoFrecuenciaMod.style.display = "none";
        campoFechaHastaMod.style.display = "none";
      }
    });
  });
</script>

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