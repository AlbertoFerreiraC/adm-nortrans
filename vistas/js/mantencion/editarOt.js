$(document).ready(function () {
    /*cargaCentroDeCosto();
    cargarMaquina();*/
    cargarOtsGeneradas();
    //--------------------
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
       $("#fechaHoraTarea").val() != "" && 
       $("#nroOts").val() != "-") {
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

$('#btnBuscarOt').click(function () {
    if($("#nroOts").val() != "-") {
        obtenerDatosParaModificar( $("#nroOts").val()  );
    }else{
        swal({
            type: "error",
            title: "Debe seleccionar una orden de trabajo válida.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }
});



$('#btnEditarOT').click(function () {
    if($("#fechaOT").val() != "" && 
       $("#kmActual").val() != "" && 
       $("#maquina").val() != "-" && 
       $("#centroCosto").val() != "-") {
        procesarCabecera();
    }else{
        swal({
            type: "error",
            title: "Debe seleccionar y cargar todos los campos obligatorios",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    }
});

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



function contadorDeFilasTarea(){
  var cont = 0;
  $('#tablaTareas tbody tr').each(function(){ 
     cont++;      
 });
  return (cont+1);
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
        "idOt": $("#nroOts").val(),
        "fecha": $("#fechaOT").val(),
        "kmActual": $("#kmActual").val(),
        "maquina": $("#maquina").val(),
        "centroCosto": $("#centroCosto").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funEditarCabecera.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] == "ok") {
                swal({
                    type: "success",
                    title: "Actualización Realizada con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la actualización",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la actualización",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function cargarOtsGeneradas(){
    $('#nroOts').empty();
    $('#nroOts').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/generarOtInterna/funListarOtGeneradas.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#nroOts').append(listaEmpresa);
        }        
    });
}

function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funDatosCabeceraOt.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#fechaOT").val(response[i].fecha);
                $("#kmActual").val(response[i].km_actual);
                cargaCentroDeCosto(response[i].centro_de_costo);
                cargarMaquina(response[i].maquina);
                cargarTareasOt(valor);
                cargarRepuestosOt(valor);
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function cargaCentroDeCosto(id){
    $('#centroCosto').empty();
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
            $("#centroCosto option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function cargarMaquina(id){
    $('#maquina').empty();
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
            $("#maquina option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function cargarTareasOt(id) {
    $("#tablaTareas tbody").empty();
    var params = {
        "id": id
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarTareasDeOt.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                    fila += '<tr>';
                    fila += '<td>' + response[i].tipo_nombre + '</td>';
                    fila += '<td>' + response[i].sistema_nombre + '</td>';
                    fila += '<td>' + response[i].sub_nombre + '</td>';
                    fila += '<td>' + response[i].personal_nombre + '</td>';
                    fila += '<td>' + response[i].observacion + '</td>';
                    fila += '<td>' + response[i].fecha + '</td>';
                    fila += '<td>';
                    fila += '<center>';
                    fila += '<div class="btn-group">';
                    fila += '<button title="Eliminar" class="btn btn-danger btnEliminarTareaOt" id="' + response[i].idtareas_ot + '"><i class="fa fa-times"></i></button>';
                    fila += '</div>';
                    fila += '</center>';
                    fila += '</td>';
                    fila += '</tr>';
            }

            $('#tablaTareas tbody').append(fila);

            $('.btnEliminarTareaOt').click(function () {
                var id_registro = this.id;
                swal({
                    title: '¿Está seguro de anular el registro?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, anular registro'
                }).then(function (result) {
                    if (result.value) {
                        eliminarTarea(id_registro);
                    }
                });
            });


        }
    }).fail(function () {
        swal({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            button: "Aceptar"
        });
    });
}

function agregarTarea(){

    var datos = '{"idOt":"'+$("#nroOts").val()+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
    datos_tabla = datos_tabla + 
    '{"tipoTarea":"'+$("#tipoTarea").val()+
    '","sistema":"'+$("#sistema").val()+
    '","subSistema":"'+$("#subSistema").val()+
    '","tecnico":"'+$("#tecnico").val()+
    '","observacion":"'+$("#observacion").val()+
    '","fechaHoraTarea":"'+$("#fechaHoraTarea").val()+'"},';
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
                cargarTipoTarea();
                listarSistema();
                listarSubSistema();
                listarTecnico();
                $("#observacion").val('');
                $("#fechaHoraTarea").val('');  
                cargarTareasOt($("#nroOts").val());                 
            } 
            
            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga de tareas.");
            }                
        }
    });    
}

function eliminarTarea(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funEliminarTarea.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                cargarTareasOt($("#nroOts").val()); 
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la eliminación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la eliminación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function cargarRepuestosOt(id) {
    $("#tablaRepuestos tbody").empty();
    var params = {
        "id": id
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funListarRepuestosDeOt.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                    fila += '<tr>';
                    fila += '<td>' + response[i].idrepuestos_solicitados + '</td>';
                    fila += '<td>' + response[i].descripcion_repuesto + '</td>';
                    fila += '<td>' + response[i].cantidad + '</td>';
                        fila += '<td>';
                        fila += '<center>';
                        fila += '<div class="btn-group">';
                        fila += '<button title="Eliminar" class="btn btn-danger btnEliminarRepuestosOt" id="' + response[i].idrepuestos_solicitados + '"><i class="fa fa-times"></i></button>';
                        fila += '</div>';
                        fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
            }

            $('#tablaRepuestos tbody').append(fila);

            $('.btnEliminarRepuestosOt').click(function () {
                var id_registro = this.id;
                swal({
                    title: '¿Está seguro de anular el registro?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, anular registro'
                }).then(function (result) {
                    if (result.value) {
                        eliminarRepuesto(id_registro);
                    }
                });
            });


        }
    }).fail(function () {
        swal({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            button: "Aceptar"
        });
    });
}

function agregarRepuesto(){

    var datos = '{"idOt":"'+$("#nroOts").val()+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
    datos_tabla = datos_tabla + 
    '{"repuesto":"'+$("#repuesto").val()+
    '","cantidadRepuesto":"'+$("#cantidadRepuesto").val()+'"},';
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
                listarRepuestos();
                $("#cantidadRepuesto").val('');  
                cargarRepuestosOt($("#nroOts").val());                 
            } 
            
            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga de repuestos.");
            }                
        }
    });    
}

function eliminarRepuesto(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOtInterna/funEliminarRepuesto.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                cargarRepuestosOt($("#nroOts").val()); 
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la eliminación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la eliminación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}