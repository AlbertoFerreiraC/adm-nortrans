<div class="content-wrapper">

  <section class="content-header">
    <h1>Creación de Servicio Externo</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Mantenimiento</a></li>
      <li class="active">Servicio Externo</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

      <!-- ===================== CREACIÓN SERVICIO EXTERNO ===================== -->
      <div class="box-header with-border" style="background:#E1E1E1; color:black;">
        <h4>Creación servicio externo</h4>
      </div>

      <div class="box-body">

        <div class="form-group col-sm-2">
          <label>Fecha OT</label>
          <input type="date" id="fechaOT" class="form-control input-sm" value="2025-10-09">
        </div>

        <div class="form-group col-sm-3">
          <label>Tipo tarea</label>
          <select class="form-control input-sm" id="tipoTarea">
            <option value="">Seleccione...</option>
            <option value="Inspección">Inspección</option>
            <option value="Correctiva">Correctiva</option>
            <option value="Preventiva">Preventiva</option>
          </select>
        </div>

        <div class="form-group col-sm-3">
          <label>Máquina</label>
          <select class="form-control input-sm" id="maquina">
            <option value="">Seleccione...</option>
            <option value="219 / DSSF-23">219 / DSSF-23</option>
            <option value="102 / CARG-15">102 / CARG-15</option>
          </select>
        </div>

        <div class="form-group col-sm-3">
          <label>Proveedor</label>
          <select class="form-control input-sm" id="proveedor">
            <option value="">Seleccione...</option>
            <option value="SISTEMA INFORMATICOS P2P">SISTEMA INFORMATICOS P2P</option>
            <option value="SERVITRANS SRL">SERVITRANS SRL</option>
            <option value="MECANICOS ASOCIADOS">MECANICOS ASOCIADOS</option>
          </select>
        </div>

        <div class="form-group col-sm-1" style="margin-top:25px;">
          <button class="btn btn-primary btn-block" id="btnValidar"><i class="fa fa-check"></i> Validar tipo tarea</button>
        </div>
      </div>

      <!-- ===================== SECCIÓN CORRECTIVA ===================== -->
      <div class="box-header with-border" style="background:#E8E8E8; color:black;">
        <h4>Correctiva</h4>
      </div>

      <div class="box-body">

        <div class="form-group col-sm-3">
          <label>Sistema</label>
          <select class="form-control input-sm" id="sistema">
            <option value="">Seleccione...</option>
            <option value="Motor">Motor</option>
            <option value="Frenos">Frenos</option>
            <option value="Transmisión">Transmisión</option>
          </select>
        </div>

        <div class="form-group col-sm-3">
          <label>Sub Sistema</label>
          <select class="form-control input-sm" id="subSistema">
            <option value="">Seleccione...</option>
            <option value="Lubricación">Lubricación</option>
            <option value="Refrigeración">Refrigeración</option>
            <option value="Combustión">Combustión</option>
          </select>
        </div>

        <div class="form-group col-sm-6">
          <label>Observación (max. 350)</label>
          <textarea class="form-control input-sm" id="observacion" maxlength="350"></textarea>
        </div>

        <div class="form-group col-sm-12 text-right">
          <button class="btn btn-primary" id="btnAgregarTarea"><i class="fa fa-plus"></i> Agregar tarea</button>
        </div>

        <div class="col-sm-12">
          <table class="table table-bordered table-striped dt-responsive" id="tablaTareas" width="100%">
            <thead>
              <tr>
                <th><center>Sistema</center></th>
                <th><center>Sub Sistema</center></th>
                <th><center>Observación</center></th>
                <th><center>Eliminar</center></th>
              </tr>
            </thead>
            <tbody>
              <tr><td colspan="4" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- ===================== DATOS FINALES ===================== -->
      <div class="box-body">
        <div class="form-group col-sm-2">
          <label>Km actual</label>
          <input type="number" class="form-control input-sm" id="kmActual" placeholder="0">
        </div>

        <div class="form-group col-sm-3">
          <label>Fecha hora</label>
          <input type="datetime-local" class="form-control input-sm" id="fechaHora" value="2025-10-11T12:41">
        </div>

        <div class="form-group col-sm-3" style="margin-top:25px;">
          <button class="btn btn-success btn-block" id="btnGenerarServicio"><i class="fa fa-cogs"></i> Generar Servicio Externo</button>
        </div>
      </div>

    </div>

  </section>
</div>

<style>
  #div1 {
    overflow: scroll;
    width: 100%;
  }
  #div1 table {
    width: 100%;
    background-color: #f4f4f4;
  }
</style>

<script>
  let tareas = [];

  // === VALIDAR TIPO DE TAREA ===
  $("#btnValidar").click(function () {
    const tipo = $("#tipoTarea").val();
    const maquina = $("#maquina").val();
    const proveedor = $("#proveedor").val();

    if (!tipo || !maquina || !proveedor) {
      return alert("Complete todos los campos antes de validar.");
    }

    alert(`✅ Tipo de tarea "${tipo}" validado correctamente para la máquina ${maquina} y proveedor ${proveedor}.`);
  });

  // === AGREGAR TAREA ===
  $("#btnAgregarTarea").click(function () {
    const sistema = $("#sistema").val();
    const subSistema = $("#subSistema").val();
    const observacion = $("#observacion").val();

    if (!sistema || !subSistema || !observacion) {
      return alert("Complete los campos de sistema, sub sistema y observación.");
    }

    tareas.push({ sistema, subSistema, observacion });
    actualizarTabla();
    limpiarCampos();
  });

  function limpiarCampos() {
    $("#sistema").val("");
    $("#subSistema").val("");
    $("#observacion").val("");
  }

  function actualizarTabla() {
    const tbody = $("#tablaTareas tbody");
    tbody.empty();

    if (tareas.length === 0) {
      tbody.append('<tr><td colspan="4" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
      return;
    }

    tareas.forEach((t, i) => {
      tbody.append(`
        <tr>
          <td>${t.sistema}</td>
          <td>${t.subSistema}</td>
          <td>${t.observacion}</td>
          <td><center><button class="btn btn-danger btn-sm btnEliminar" data-index="${i}"><i class="fa fa-trash"></i></button></center></td>
        </tr>
      `);
    });
  }

  $(document).on("click", ".btnEliminar", function () {
    const index = $(this).data("index");
    tareas.splice(index, 1);
    actualizarTabla();
  });

  // === GENERAR SERVICIO EXTERNO ===
  $("#btnGenerarServicio").click(function () {
    const datos = {
      fechaOT: $("#fechaOT").val(),
      tipoTarea: $("#tipoTarea").val(),
      maquina: $("#maquina").val(),
      proveedor: $("#proveedor").val(),
      kmActual: $("#kmActual").val(),
      fechaHora: $("#fechaHora").val(),
      tareas
    };

    if (!datos.maquina || !datos.proveedor || tareas.length === 0) {
      return alert("Debe completar los datos y agregar al menos una tarea antes de generar el servicio.");
    }

    alert("✅ Servicio externo generado correctamente.\n\n" + JSON.stringify(datos, null, 2));

    tareas = [];
    actualizarTabla();
  });
</script>
