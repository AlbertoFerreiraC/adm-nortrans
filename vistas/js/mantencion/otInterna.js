$(document).ready(function () {
    cargaCentroDeCosto();
    cargarMaquina();
    cargarTipoTarea();
    listarSistema();
    listarSubSistema();
    listarTecnico();
    listarRepuestos();
});


$('#btnAgregarTarea').click(function () {
    if($("#tipoTarea").val() != "-" && 
       $("#sistema").val() != "-" && 
       $("#subSistema").val() != "-" && 
       $("#tecnico").val() != "-" && 
       $("#observacion").val() != "" && 
       $("#fechaHoraTarea").val() != "") {
        agregarTarea();
    }else{
        swal({
            type: "error",
            title: "Debe seleccionar y cargar todos los campos obligatorios.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }
});

$('#btnAgregarRepuesto').click(function () {
    if($("#repuesto").val() != "-" && 
       $("#cantidadRepuesto").val() != "") {
        agregarRepuesto();
    }else{
        swal({
            type: "error",
            title: "Debe seleccionar y cargar todos los campos obligatorios.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }
});

$('#btnCrearOT').click(function () {
    if($("#fechaOT").val() != "" && 
       $("#kmActual").val() != "" && 
       $("#maquina").val() != "-" && 
       $("#centroCosto").val() != "-" && 
       contadorDeFilasTarea() > 0) {
        procesarCabecera();
    }else{
        swal({
            type: "error",
            title: "Debe seleccionar y cargar todos los campos obligatorios y agregar al menos una tarea.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }
});



function cargaCentroDeCosto(){
    $('#centroCosto').empty();
    $('#centroCosto').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarRendicion/funListarCentroDeCosto.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
            }
            $('#centroCosto').append(listaEmpresa);
        }        
    });
}

function cargarMaquina(){
    $('#maquina').empty();
    $('#maquina').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarMaquinas.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#maquina').append(listaEmpresa);
        }        
    });
}

function cargarTipoTarea(){
    $('#tipoTarea').empty();
    $('#tipoTarea').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarTipoTarea.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#tipoTarea').append(listaEmpresa);
        }        
    });
}

function listarSistema(){
    $('#sistema').empty();
    $('#sistema').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarSistema.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#sistema').append(listaEmpresa);
        }        
    });
}

function listarSubSistema(){
    $('#subSistema').empty();
    $('#subSistema').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarSubSistema.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#subSistema').append(listaEmpresa);
        }        
    });
}

function listarTecnico(){
    $('#tecnico').empty();
    $('#tecnico').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarPersonalTecnico.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#tecnico').append(listaEmpresa);
        }        
    });
}

function listarRepuestos(){
    $('#repuesto').empty();
    $('#repuesto').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarRepuestos.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#repuesto').append(listaEmpresa);
        }        
    });
}

function agregarTarea(){
        var fila = "";
        fila = '<tr id ="filaTarea_'+contadorDeFilasTarea()+'">'+
                        '<td>'+ $("#tipoTarea option:selected").text() +'</td>'+
                        '<td>'+ $("#sistema option:selected").text() +'</td>'+
                        '<td>'+ $("#subSistema option:selected").text() +'</td>'+
                        '<td>'+ $("#tecnico option:selected").text() +'</td>'+
                        '<td>'+ $("#observacion").val() +'</td>'+
                        '<td>'+ $("#fechaHoraTarea").val() +'</td>'+

                        '<td>'+
                            '<button title="Eliminar" type="button" class="btn btn-danger btnEliminar" id="'+contadorDeFilasTarea()+'"><i class="fa fa-times"></i></button>'+                      
                        '</td>'+
                        
                        '<td style="display: none;" >'+ $("#tipoTarea").val() +'</td>'+
                        '<td style="display: none;" >'+ $("#sistema").val() +'</td>'+
                        '<td style="display: none;" >'+ $("#subSistema").val() +'</td>'+
                        '<td style="display: none;" >'+ $("#tecnico").val() +'</td>'+                       
                    +'</tr>'; 
        $('#tablaTareas').append(fila);   
        cargarTipoTarea();
        listarSistema();
        listarSubSistema();
        listarTecnico();
        $("#observacion").val('');
        $("#fechaHoraTarea").val('');

            $('.btnEliminar').click(function() {
                var id_registro = this.id;
                swal({
                title: '¿Está seguro de eliminar el registro?',
                text: "¡Si no lo está puede cancelar la accíón!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, eliminar registro!'
                }).then(function(result){
                    if(result.value){
                        $("#filaTarea_"+id_registro).remove();
                    }                        
                }); 
            });        
}

function contadorDeFilasTarea(){
  var cont = 0;
  $('#tablaTareas tbody tr').each(function(){ 
     cont++;      
 });
  return (cont+1);
}

function agregarRepuesto(){
        var fila = "";
        fila = '<tr id ="filaRepuesto_'+contadorDeFilasRepuestos()+'">'+
                        '<td>'+ $("#repuesto").val() +'</td>'+
                        '<td>'+ $("#repuesto option:selected").text() +'</td>'+                        
                        '<td>'+ $("#cantidadRepuesto").val() +'</td>'+
                        '<td>'+
                            '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarRepuesto" id="'+contadorDeFilasRepuestos()+'"><i class="fa fa-times"></i></button>'+                      
                        '</td>'+                   
                    +'</tr>'; 
        $('#tablaRepuestos').append(fila);   
        listarRepuestos();
        $("#cantidadRepuesto").val('');

            $('.btnEliminarRepuesto').click(function() {
                var id_registro = this.id;
                swal({
                title: '¿Está seguro de eliminar el registro?',
                text: "¡Si no lo está puede cancelar la accíón!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, eliminar registro!'
                }).then(function(result){
                    if(result.value){
                        $("#filaRepuesto_"+id_registro).remove();
                    }                        
                }); 
            });        
}

function contadorDeFilasRepuestos(){
  var cont = 0;
  $('#tablaRepuestos tbody tr').each(function(){ 
     cont++;      
 });
  return (cont+1);
}

function procesarCabecera() {
    var params = {
        "idUsuario": $("#idUsuario").val(),
        "fecha": $("#fechaOT").val(),
        "kmActual": $("#kmActual").val(),
        "maquina": $("#maquina").val(),
        "centroCosto": $("#centroCosto").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funProcesarCabecera.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] != "nok") {
                procesarTareas(response['mensaje']);
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la carga",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function procesarTareas(id) {
    var datos = '{"idOt":"'+id+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
      $('#tablaTareas tbody tr').each(function(){ 
    datos_tabla = datos_tabla + 
    '{"tipoTarea":"'+$(this).find("td").eq(7).html()+
    '","sistema":"'+$(this).find("td").eq(8).html()+
    '","subSistema":"'+$(this).find("td").eq(9).html()+
    '","tecnico":"'+$(this).find("td").eq(10).html()+
    '","observacion":"'+$(this).find("td").eq(4).html()+
    '","fechaHoraTarea":"'+$(this).find("td").eq(5).html()+'"},';
      });
    datos_tabla = datos_tabla.substr(0,datos_tabla.length-1);  
    datos_tabla = datos_tabla + ']';  
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funProcesaDetalleTareas.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {     
            if (response['mensaje'] == "ok") {
                if(contadorDeFilasRepuestos() > 0){
                    procesarRepuestos(id);
                }else{
                    swal({
                        type: "success",
                        title: "Orden de trabajo generado con éxito.",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    }).then((value) => {
                        location.reload();
                    });
                }                    
            } 
            
            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga de tareas.");
            }                
        }
    });

}

function procesarRepuestos(id) {
    var datos = '{"idOt":"'+id+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
      $('#tablaRepuestos tbody tr').each(function(){ 
    datos_tabla = datos_tabla + 
    '{"repuesto":"'+$(this).find("td").eq(0).html()+
    '","cantidadRepuesto":"'+$(this).find("td").eq(2).html()+'"},';
      });
    datos_tabla = datos_tabla.substr(0,datos_tabla.length-1);  
    datos_tabla = datos_tabla + ']';  
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funProcesaDetalleRepuestos.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {     
            if (response['mensaje'] == "ok") {
                swal({
                    type: "success",
                    title: "Orden de trabajo generado con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });    
            } 
            
            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga de repuestos.");
            }                
        }
    });

}