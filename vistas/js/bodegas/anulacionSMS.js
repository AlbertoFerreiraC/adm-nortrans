
// Simulación de datos de entrega
const entregas = {
    1001: {
        fecha: "10/10/2025",
        bodega: "Bodega Industrial",
        productos: [
            { item: 1, tipo: "Repuesto", id: "600510618", nombre: "BOMBA DE AGUA", cantidad: 2, um: "UND", centro: "CC001" },
            { item: 2, tipo: "Insumo", id: "I002", nombre: "GRASA INDUSTRIAL", cantidad: 1, um: "KG", centro: "CC002" }
        ]
    },
    1002: {
        fecha: "09/10/2025",
        bodega: "Bodega Comercial",
        productos: [
            { item: 1, tipo: "Insumo", id: "I005", nombre: "LUBRICANTE", cantidad: 5, um: "L", centro: "CC003" }
        ]
    }
};

// Buscar entrega
$("#btnBuscar").click(function () {
    const nro = $("#nroEntrega").val();
    const entrega = entregas[nro];

    if (!entrega) {
        alert("No se encontraron registros para el número ingresado.");
        limpiarCampos();
        return;
    }

    $("#fechaEntrega").val(entrega.fecha);
    $("#bodegaEntrega").val(entrega.bodega);

    const tbody = $("#tablaProductos tbody");
    tbody.empty();

    entrega.productos.forEach(p => {
        tbody.append(`
        <tr>
          <td>${p.item}</td>
          <td>${p.tipo}</td>
          <td>${p.id}</td>
          <td>${p.nombre}</td>
          <td>${p.cantidad}</td>
          <td>${p.um}</td>
          <td>${p.centro}</td>
        </tr>
      `);
    });
});

function limpiarCampos() {
    $("#fechaEntrega").val("");
    $("#bodegaEntrega").val("");
    $("#tablaProductos tbody").html('<tr><td colspan="7" style="text-align:center;">No se encontraron registros.</td></tr>');
}

// Contador de caracteres
$("#comentario").on("input", function () {
    const max = 200;
    const len = $(this).val().length;
    $("#contadorCaracteres").text(`${max - len} caracteres restantes`);
});

// Solicitar anulación
$("#btnSolicitar").click(function () {
    const nro = $("#nroEntrega").val();
    const comentario = $("#comentario").val().trim();

    if (!nro || !entregas[nro]) {
        alert("Debe buscar una entrega válida antes de solicitar la anulación.");
        return;
    }

    if (comentario === "") {
        alert("Debe ingresar un comentario.");
        return;
    }

    $("#entregaModal").text(nro);
    $("#modalConfirmar").modal("show");
});

// Confirmar anulación
$("#btnConfirmarAnulacion").click(function () {
    $("#modalConfirmar").modal("hide");
    alert("La solicitud de anulación fue enviada correctamente.");
    limpiarCampos();
    $("#comentario").val("");
    $("#contadorCaracteres").text("200 caracteres restantes");
});
