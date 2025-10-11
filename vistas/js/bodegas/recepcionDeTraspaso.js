
// === DATOS SIMULADOS ===
const traspasos = {
    1001: {
        numero: 1001,
        origen: "Bodega Industrial",
        destino: "Bodega Comercial",
        fecha: "10/10/2025",
        usuario: "Oscar Vega",
        estado: "Entregado",
        productos: [
            { tipo: "Repuesto", id: "600510618", nombre: "BOMBA DE AGUA", cantidad: 2, costo: 85000 },
            { tipo: "Insumo", id: "I002", nombre: "GRASA INDUSTRIAL", cantidad: 1, costo: 20000 }
        ]
    },
    1002: {
        numero: 1002,
        origen: "Bodega Principal",
        destino: "Bodega Servicio",
        fecha: "09/10/2025",
        usuario: "Pedro González",
        estado: "Pendiente",
        productos: [
            { tipo: "Insumo", id: "I004", nombre: "ACEITE HIDRÁULICO", cantidad: 3, costo: 25000 }
        ]
    }
};

// === BUSCAR TRASPASO ===
$("#btnBuscar").click(function () {
    const nro = $("#nroTraspaso").val();
    if (!nro) {
        alert("Ingrese un número de traspaso.");
        return;
    }

    const datos = traspasos[nro];
    if (!datos) {
        alert("No se encontraron registros para el número ingresado.");
        limpiarCampos();
        return;
    }

    // Cargar cabecera
    $("#numTraspaso").text(datos.numero);
    $("#bodegaOrigenTxt").text(datos.origen);
    $("#bodegaDestinoTxt").text(datos.destino);
    $("#fechaSalida").text(datos.fecha);
    $("#usuarioSalida").text(datos.usuario);
    $("#estadoTraspaso").text(datos.estado);

    // Cargar productos
    const tbody = $("#tablaProductos tbody");
    tbody.empty();

    datos.productos.forEach((p) => {
        tbody.append(`
        <tr>
          <td>${p.tipo}</td>
          <td>${p.id}</td>
          <td>${p.nombre}</td>
          <td>${p.cantidad}</td>
          <td>${p.costo.toLocaleString()}</td>
        </tr>
      `);
    });
});

function limpiarCampos() {
    $("#numTraspaso").text("0");
    $("#bodegaOrigenTxt, #bodegaDestinoTxt, #fechaSalida, #usuarioSalida, #estadoTraspaso").text("-");
    $("#tablaProductos tbody").html('<tr><td colspan="5" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
}
