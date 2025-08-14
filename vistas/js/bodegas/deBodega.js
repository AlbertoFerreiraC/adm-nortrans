/* =============================================================================
MANEJO DEL MODAL DE UBICACIONES
=============================================================================
*/

$('#tabla tbody').on('click', '.btnUbicacion', function () {
    var idBodega = $(this).data('id');
    var nombreBodega = $(this).data('nombre');
    var tipoBodega = $(this).data('tipo');

    $("#modalUbicacion_idBodega").text(idBodega);
    $("#modalUbicacion_nombreBodega").text(nombreBodega);
    $("#modalUbicacion_tipoBodega").text(tipoBodega);

    // --- LÍNEA MODIFICADA ---
    // Guardamos el ID de la bodega en el input oculto del nuevo formulario
    $("#idBodegaParaUbicacion").val(idBodega);

    // Ocultamos el formulario de creación cada vez que se abre el modal
    $('#divCrearUbicacion').hide();

    cargarUbicaciones(idBodega);
});


function cargarUbicaciones(idBodega) {
    $('#ubicacionesTbody').empty();
    // ... Aquí va tu código AJAX para cargar la tabla de ubicaciones ...
    $('#ubicacionesTbody').html('<tr><td colspan="4" style="text-align:center;">Ningún dato disponible en esta tabla</td></tr>');
}

/* =============================================================================
NUEVO CÓDIGO: LÓGICA DEL FORMULARIO DE CREACIÓN DE UBICACIÓN
=============================================================================
*/

// 1. Al hacer clic en "+ Crear ubicación", mostramos u ocultamos el formulario
$('#btnMostrarFormularioUbicacion').on('click', function () {
    $('#divCrearUbicacion').slideToggle(); // slideToggle crea un efecto animado
});


// 2. Al hacer clic en "Grabar ubicación"
$('#btnGrabarUbicacion').on('click', function () {

    // Obtenemos todos los datos del formulario
    var datosUbicacion = {
        idBodega: $("#idBodegaParaUbicacion").val(),
        x: $("#ubicacionX").val(),
        y: $("#ubicacionY").val(),
        z: $("#ubicacionZ").val(),
        descX: $("#descripcionX").val(),
        descY: $("#descripcionY").val(),
        descZ: $("#descripcionZ").val()
    };

    // Validación simple (puedes hacerla más compleja)
    if (!datosUbicacion.x || !datosUbicacion.y || !datosUbicacion.z) {
        // Reemplaza este alert con una librería más elegante como SweetAlert si la usas
        alert("Los campos X, Y y Z son obligatorios.");
        return;
    }

    console.log("Datos a enviar:", datosUbicacion);

    // ---- INICIO DE LLAMADA AJAX PARA GUARDAR (EJEMPLO) ----
    // Deberás crear un archivo PHP que reciba estos datos y los inserte en la BD
    /*
    $.ajax({
        url: 'ruta/a/tu/api/crearUbicacion.php',
        method: 'POST',
        data: datosUbicacion,
        dataType: 'json',
        success: function(respuesta) {
            if (respuesta.status === 'ok') {
                alert("Ubicación guardada con éxito.");

                // Limpiamos el formulario
                $('#divCrearUbicacion').find('input[type="text"]').val('');
                
                // Ocultamos el formulario
                $('#divCrearUbicacion').slideUp();
                
                // ¡IMPORTANTE! Recargamos la lista de ubicaciones para ver la nueva
                cargarUbicaciones(datosUbicacion.idBodega);

            } else {
                alert("Error al guardar: " + respuesta.mensaje);
            }
        },
        error: function() {
            alert("Error de comunicación al intentar guardar la ubicación.");
        }
    });
    */
    // ---- FIN DE LLAMADA AJAX (EJEMPLO) ----

});