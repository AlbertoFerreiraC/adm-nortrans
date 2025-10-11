let repuestosTemp = [];
let tareas = [];

// Agregar repuesto
$("#btnAgregarRepuesto").click(function () {
    const id = $("#repuesto").val();
    const cantidad = parseInt($("#cantidadRepuesto").val());
    if (!id || cantidad <= 0) return alert("Seleccione repuesto y cantidad válida.");

    const producto = id === "600510618" ? "BOMBA DE AGUA" : "GRASA INDUSTRIAL";
    repuestosTemp.push({
        tipo: id.startsWith("I") ? "Insumo" : "Repuesto",
        id,
        producto,
        um: "UND",
        cantidad
    });
    actualizarTablaRepuestos();
});

// Eliminar repuesto
$(document).on("click", ".btnEliminarRepuesto", function () {
    const index = $(this).data("index");
    repuestosTemp.splice(index, 1);
    actualizarTablaRepuestos();
});

function actualizarTablaRepuestos() {
    const tbody = $("#tablaRepuestos tbody");
    tbody.empty();

    if (repuestosTemp.length === 0) {
        tbody.append('<tr><td colspan="6" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
        return;
    }

    repuestosTemp.forEach((r, i) => {
        tbody.append(`
        <tr>
          <td>${r.tipo}</td>
          <td>${r.id}</td>
          <td>${r.producto}</td>
          <td>${r.um}</td>
          <td>${r.cantidad}</td>
          <td><center><button class="btn btn-danger btn-sm btnEliminarRepuesto" data-index="${i}"><i class="fa fa-trash"></i></button></center></td>
        </tr>
      `);
    });
}

// Agregar tarea
$("#btnAgregarTarea").click(function () {
    const tipo = $("#tipoTarea").val();
    const sistema = $("#sistema").val();
    const subSistema = $("#subSistema").val();
    const tecnico = $("#tecnico").val();
    const observacion = $("#observacion").val();

    if (!tipo || !sistema || !subSistema || !tecnico) {
        return alert("Complete los campos obligatorios de la tarea.");
    }

    const tarea = {
        tipo, sistema, subSistema, tecnico,
        detalle: observacion || "Sin observación",
        totalRepuestos: repuestosTemp.length,
        repuestos: [...repuestosTemp]
    };

    tareas.push(tarea);
    repuestosTemp = [];
    actualizarTablaRepuestos();
    actualizarTablaTareas();
});

// Eliminar tarea
$(document).on("click", ".btnEliminarTarea", function () {
    const index = $(this).data("index");
    tareas.splice(index, 1);
    actualizarTablaTareas();
});

function actualizarTablaTareas() {
    const tbody = $("#tablaTareas tbody");
    tbody.empty();

    if (tareas.length === 0) {
        tbody.append('<tr><td colspan="7" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
        return;
    }

    tareas.forEach((t, i) => {
        tbody.append(`
        <tr>
          <td>${t.tipo}</td>
          <td>${t.sistema}</td>
          <td>${t.subSistema}</td>
          <td>${t.tecnico}</td>
          <td>${t.detalle}</td>
          <td>${t.totalRepuestos}</td>
          <td><center><button class="btn btn-danger btn-sm btnEliminarTarea" data-index="${i}"><i class="fa fa-trash"></i></button></center></td>
        </tr>
      `);
    });
}

// Crear OT
$("#btnCrearOT").click(function () {
    if (tareas.length === 0) return alert("Debe agregar al menos una tarea.");

    const datosOT = {
        fechaOT: $("#fechaOT").val(),
        kmActual: $("#kmActual").val(),
        maquina: $("#maquina").val(),
        centroCosto: $("#centroCosto").val(),
        tareas
    };

    if (!datosOT.maquina || !datosOT.centroCosto) {
        return alert("Complete los datos generales de la OT.");
    }

    alert("✅ OT creada correctamente.\n\n" + JSON.stringify(datosOT, null, 2));

    // Reiniciar
    tareas = [];
    actualizarTablaTareas();
});