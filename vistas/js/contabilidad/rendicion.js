//var ip = "127.0.0.1";
var ip = "186.16.32.139";
$(document).ready(function () {

    $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^.0-9]/g, '');
    });

    $(".puntos_de_mil").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
            $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            });
        }
    });

    // Para Agregar
    cargarFechaActual();
    cargaDependenciaAgregar();
    cargaCentroDeCostoAgregar();
    cargaProveedorAgregar();
    obtenerMontoRendicion();
    //-------------------------

    cargarDatosTabla();

    

    $('#btnAgregarItem').click(function () {
       if( $("#saldoInicialAgregar").val() != "" && $("#saldoInicialAgregar").val() != "0" ){
        if( $("#fechaRegistroAgregar").val() != "" ){
            if( $("#tipoAgregar").val() != "-" ){
                if( $("#nroDocumentoAgregar").val() != "" ){
                    if( $("#montoRegistroAgregar").val() != "" && $("#montoRegistroAgregar").val() != "0" ){
                        if( $("#detalleRegistroAgregar").val() != "" ){
                            if( $("#centroRegistroAgregar").val() != "-" ){
                                if( $("#proveedorRegistroAgregar").val() != "-" ){
                                    agregarItem();    
                                }else{
                                    mensajeError("Debe ingresar un proveedor válido.");
                                }
                            }else{
                                mensajeError("Debe ingresar un centro de costo válido.");
                            }
                        }else{
                            mensajeError("Debe ingresar un detalle válido.");
                        }
                    }else{
                         mensajeError("Debe ingresar un monto válido.");
                    }
                }else{
                        mensajeError("Debe ingresar un número de documento válido.");
                }
            }else{
                    mensajeError("Debe ingresar un tipo válido.");
            }
        }else{
                mensajeError("Debe ingresar una fecha válida.");
        }
       }else{
            mensajeError("Antes de agregar un registro debe ingresar un saldo inicial.");
       }
    });

    $('#btnAgregarItemMOdificar').click(function () {
       if( $("#saldoInicialModificar").val() != "" && $("#saldoInicialModificar").val() != "0" ){
        if( $("#fechaRegistroModificar").val() != "" ){
            if( $("#tipoModificar").val() != "-" ){
                if( $("#nroDocumentoModificar").val() != "" ){
                    if( $("#montoRegistroModificar").val() != "" && $("#montoRegistroModificar").val() != "0" ){
                        if( $("#detalleRegistroModificar").val() != "" ){
                            if( $("#centroRegistroModificar").val() != "-" ){
                                if( $("#proveedorRegistroModificar").val() != "-" ){
                                    agregarItemModificar();    
                                }else{
                                    mensajeError("Debe ingresar un proveedor válido.");
                                }
                            }else{
                                mensajeError("Debe ingresar un centro de costo válido.");
                            }
                        }else{
                            mensajeError("Debe ingresar un detalle válido.");
                        }
                    }else{
                         mensajeError("Debe ingresar un monto válido.");
                    }
                }else{
                        mensajeError("Debe ingresar un número de documento válido.");
                }
            }else{
                    mensajeError("Debe ingresar un tipo válido.");
            }
        }else{
                mensajeError("Debe ingresar una fecha válida.");
        }
       }else{
            mensajeError("Antes de agregar un registro debe ingresar un saldo inicial.");
       }
    });

    $('#btnGuardar').click(function () {

        if( $("#dependenciaAgregar").val() != "-" ){
            if( $("#saldoInicialAgregar").val() != "0" && $("#saldoInicialAgregar").val() != "" ){
                if(  $("#montoRendidoAgregar").val() != "" ){
                    if(  $("#documentoRendicionAgregar").val() != "" ){
                        agregarDatos();    
                    }else{
                        mensajeError("Debe adjuntar el o los comprobantes de su factura.");
                    }   
                }else{
                    mensajeError("Debe ingresar registros para su rendición.");
                }  
            }else{
                mensajeError("Debe asignar un saldo inicial válido.");
            }   
        }else{
            mensajeError("Debe asignar una dependencia válida.");
        }
        
    });

    $('#btnModificar').click(function () {
        modificarDatos();
    });


    $('#filtradoDinamico').keyup(function () {

        var busqueda = document.getElementById('filtradoDinamico');
        var table = document.getElementById("tabla").tBodies[0];
        buscaTabla = function () {
            texto = busqueda.value.toLowerCase();
            var r = 0;
            while (row = table.rows[r++]) {
                if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                    row.style.display = null;
                else
                    row.style.display = 'none';
            }
        }
        busqueda.addEventListener('keyup', buscaTabla);

    });

});


function cargarDatosTabla() {
    $("#tabla tbody").empty();
    var fila = "";
    var params = {
        "id": $("#idUsuario").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarMisResndiciones.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length === 0) {
                fila = '<tr><td colspan="8" class="text-center">No hay datos disponibles</td></tr>';
            } else {
                for (var i in response) {
                    var desahilitar = "";
                        if(response[i].estado != 'EN REVISION' && response[i].estado != 'PENDIENTE'){
                            desahilitar = 'disabled';
                        }
                    fila += '<tr>';
                        fila += '<td>' + (parseInt(i) + 1) + '</td>';
                        fila += '<td>' + response[i].id + '</td>';
                        fila += '<td>' + response[i].fecha + '</td>';
                        fila += '<td>' + number_format(response[i].saldo_inicial,0) + '</td>';
                        fila += '<td>' + number_format(response[i].monto_rendido,0) + '</td>';
                        fila += '<td>' + response[i].saldo + '</td>';
                        fila += '<td>' + response[i].dependendia + '</td>';
                        fila += '<td>' + response[i].comentario_adicional + '</td>';
                        fila += '<td>' + response[i].estado + '</td>';
                        fila += '<td>';
                            fila += '<center>';
                                fila += '<div class="btn-group">';
                                    fila += '<button title="Actualizar" '+desahilitar+' class="btn btn-warning btnModificar" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>';
                                    fila += '<button title="Ver Mas..." class="btn btn-info btnVerMas" id="' + response[i].id + '" data-toggle="modal" data-target="#modalVerMas"><i class="fa fa-eye"></i></button>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
                }
            }

            $('#tabla tbody').append(fila);

            $('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnVerMas').click(function () {
                obtenerDatosParaVerMas(this.id);
            });

            
        }
    });
}

function agregarDatos() {
    var datos = '{"usuario":"'+$("#idUsuario").val()+
    '","cargo":"'+$("#dependenciaAgregar").val()+
    '","saldo_inicial":"'+parseInt($("#saldoInicialAgregar").val().replace(/\./g,''))+
    '", "monto_rendido":"'+parseInt($("#montoRendidoAgregar").val().replace(/\./g,''))+
    '", "saldo":"'+parseInt($("#saldoAgregar").val().replace(/\./g,''))+
    '", "comentario_adicional": "'+$("#comentarioAgregar").val()+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
      $('#tablaRendicionAgregar tbody tr').each(function(){ 
    datos_tabla = datos_tabla + 
    '{"fecha":"'+$(this).find("td").eq(0).html()+
    '","tipo":"'+$(this).find("td").eq(1).html()+
    '","nroDocumento":"'+$(this).find("td").eq(2).html()+
    '","monto":"'+$(this).find("td").eq(3).html().replace(/\./g,'')+
    '","detalle":"'+$(this).find("td").eq(4).html()+
    '","maquina":"'+$(this).find("td").eq(5).html()+
    '","centroDeCosto":"'+$(this).find("td").eq(6).html()+
    '","proveedor":"'+$(this).find("td").eq(7).html()+'"},';
      });
    datos_tabla = datos_tabla.substr(0,datos_tabla.length-1);  
    datos_tabla = datos_tabla + ']';  
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funAgregarRendicion.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] != "nok") {
                    var id = response['mensaje'];
                    var datosImagen = new FormData();
                    datosImagen.append("idRendicion", response['mensaje']);
                    datosImagen.append("documento", $("#documentoRendicionAgregar")[0].files[0] );  
                    $.ajax({
                        url:"../api_adm_nortrans/gestionarRendicion/funCargarDocumentoRendicion.php",
                        method:"POST",
                        cache: false,
                        data: datosImagen,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(response) {
                            if(response['mensaje'] === "ok"){
                                swal({
                                    type: "success",
                                    title: "Registro cargado con exito",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                }).then((value) => {
                                     window.open('extensiones/tcpdf/pdf/rendicion.php?id='+id,'_blank');
                                    location.reload();
                                });
                            }

                            if(response['mensaje'] === "nok"){
                                swal({
                                type: "error",
                                title: "Ha ocurrido un error al procesar la el documento.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                                });
                            }

                            if(response['mensaje'] === "vacio"){
                                swal({
                                    type: "error",
                                    title: "No hay documento para procesar.",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                });
                            }

                            if(response['mensaje'] === "invalido"){
                                swal({
                                    type: "error",
                                    title: "El archivo seleccionado no es posible cargar al sistema.",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                });
                            }
                        }        
                    });                
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

function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarCabeceraRendicion.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#fechaModificar").val(response[i].fecha);
                $("#saldoInicialModificar").val(number_format(response[i].saldo_inicial,0));
                $("#montoRendidoModificar").val(number_format(response[i].monto_rendido,0));
                $("#saldoModificar").val(response[i].saldo);
                $("#comentarioModificar").val(response[i].comentario_adicional);
                $("#comentarioRevisionModificar").val(response[i].comentario_revision);
                $("#idModificar").val(response[i].id);
                if(response[i].contiene_adjunto == 'si'){
                    $('#descargarDocumentoModificar').prop('href',"http://"+ip+"/nortrans-apps/adm-nortrans/vistas/img/general/"+response[i].id+"__documentoRendicion"+response[i].tipo_adjunto);
                    $("#descargarDocumentoModificar").attr("disabled", false);
                }else{
                    $('#descargarDocumentoModificar').prop('href',"");
                    $("#descargarDocumentoModificar").attr("disabled", true);
                }
                $('#descargarRendicionModificar').prop('href','extensiones/tcpdf/pdf/rendicion.php?id='+response[i].id);
                //-------------------
                cargarDatosTablaParaModificar(response[i].id);
                cargaDependenciaModificar(response[i].iddependencia);
                cargaCentroDeCostoModificar();
                cargaProveedorModificar();
                $("#fechaRegistroModificar").val(''); 
                $("#nroDocumentoModificar").val('');
                $("#montoRegistroModificar").val('');
                $("#detalleRegistroModificar").val(''); 
                $("#maquinaRegistroModificar").val('');
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

function obtenerDatosParaVerMas(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarCabeceraRendicion.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#fechaVer").val(response[i].fecha);
                $("#dependenciaVer").val(response[i].dependendia);
                $("#saldoInicialVer").val(number_format(response[i].saldo_inicial,0));
                $("#montoRendidoVer").val(number_format(response[i].monto_rendido,0));
                $("#saldoVer").val(number_format(response[i].saldo,0));
                $("#comentarioVer").val(response[i].comentario_adicional);
                $("#comentarioRevisionVer").val(response[i].comentario_revision);
                $("#estadoVer").val("Estado: "+response[i].estado);
                if(response[i].contiene_adjunto == 'si'){
                    $('#descargarDocumentoVer').prop('href',"http://"+ip+"/nortrans-apps/adm-nortrans/vistas/img/general/"+response[i].id+"__documentoRendicion"+response[i].tipo_adjunto);
                    $("#descargarDocumentoVer").attr("disabled", false);
                }else{
                    $('#descargarDocumentoVer').prop('href',"");
                    $("#descargarDocumentoVer").attr("disabled", true);
                }
                 $('#descargarRendicionVer').prop('href','extensiones/tcpdf/pdf/rendicion.php?id='+response[i].id);
                //-------------------
                cargarDatosTablaParaVerMas(response[i].id);
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

//--------Para agregar
function cargarFechaActual() {
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarFecha.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) { $("#fechaAgregar").val(response[i].fecha); }

        }
    });

}

function cargaDependenciaAgregar(){
    $('#dependenciaAgregar').empty();
    $('#dependenciaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/usuario/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].idusuario+'">'+response[i].nombre.toUpperCase()+'</option>';                
            }
            $('#dependenciaAgregar').append(listaEmpresa);
        }        
    });
}

function cargaCentroDeCostoAgregar(){
    $('#centroRegistroAgregar').empty();
    $('#centroRegistroAgregar').append('<option value ="-">Seleccionar...</opction>');
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
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].descripcion+'">'+response[i].descripcion+'</option>';                
            }
            $('#centroRegistroAgregar').append(listaEmpresa);
        }        
    });
}

function cargaProveedorAgregar(){
    $('#proveedorRegistroAgregar').empty();
    $('#proveedorRegistroAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/proveedor/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].descripcion+'">'+response[i].descripcion+'</option>';                
            }
            $('#proveedorRegistroAgregar').append(listaEmpresa);
        }        
    });
}


function agregarItem(){
        var fila = "";
        fila = '<tr id ="fila_'+contadorDeFilas()+'">'+
                        '<td>'+ $("#fechaRegistroAgregar").val() +'</td>'+
                        '<td>'+ $("#tipoAgregar").val() +'</td>'+
                        '<td>'+ $("#nroDocumentoAgregar").val() +'</td>'+
                        '<td>'+ $("#montoRegistroAgregar").val() +'</td>'+
                        '<td>'+ $("#detalleRegistroAgregar").val() +'</td>'+
                        '<td>'+ $("#maquinaRegistroAgregar").val() +'</td>'+
                        '<td>'+ $("#centroRegistroAgregar").val() +'</td>'+
                        '<td>'+ $("#proveedorRegistroAgregar").val() +'</td>'+
                        '<td>'+
                            '<button title="Eliminar" type="button" class="btn btn-danger btnEliminar" id="'+contadorDeFilas()+'"><i class="fa fa-times"></i></button>'+                      
                        '</td>'+
                    +'</tr>'; 
        $('#tablaRendicionAgregar').append(fila);   
        cargar_total();
        cargaCentroDeCostoAgregar();
        cargaProveedorAgregar();
        $("#fechaRegistroAgregar").val(''); 
        $("#nroDocumentoAgregar").val('');
        $("#montoRegistroAgregar").val('');
        $("#detalleRegistroAgregar").val(''); 
        $("#maquinaRegistroAgregar").val('');

            $('.btnEliminar').click(function() {
                var id_registro = this.id;
                swal({
                title: '¿Está seguro de anular el registro?',
                text: "¡Si no lo está puede cancelar la accíón!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, anular registro!'
                }).then(function(result){
                    if(result.value){
                        $("#fila_"+id_registro).remove();
                        cargar_total(); 
                    }                        
                }); 
            });        
}

function contadorDeFilas(){
  var cont = 0;
  $('#tablaRendicionAgregar tbody tr').each(function(){ 
     cont++;      
 });
  return (cont+1);
}

function cargar_total(){
  var cont = 0;
  var total = 0;
  $('#tablaRendicionAgregar tr').each(function(){ 
      if(cont > 0){
        var valor = $(this).find("td").eq(3).html().replace(/\./g,''); 
        total = total + parseInt(valor);
      }
      cont++;   
  });
  var saldoInicial = parseInt($("#saldoInicialAgregar").val().replace(/\./g,''));
  var saldoFinal = saldoInicial - total;
  if(total > saldoInicial){
        $("#saldoAgregar").val("-"+number_format(saldoFinal,0)); 
        $("#saldoAgregar").css("background-color", "red"); $("#saldoAgregar").css("color", "white");
  }else{
        $("#saldoAgregar").val(number_format(saldoFinal,0)); 
        $("#saldoAgregar").css("background-color", "green"); $("#saldoAgregar").css("color", "white");
        if(total == saldoInicial){ $("#saldoAgregar").css("background-color", "yellow"); $("#saldoAgregar").css("color", "black"); }

  }
  $("#montoRendidoAgregar").val(number_format(total,0)); 
  
}

function controlCargaPrevia(){
  var cont = 0;
  var total = 0;
  $('#tablaRendicionAgregar tr').each(function(){ 
      if(cont > 0){
        var valor = $(this).find("td").eq(3).html().replace(/\./g,''); 
        total = total + parseInt(valor);
      }
      cont++;   
  });
  
  var saldoInicial = parseInt($("#saldoInicialAgregar").val().replace(/\./g,''));
  var saldoFinal = parseInt($("#montoRegistroAgregar").val().replace(/\./g,'')) + total;
  if(saldoFinal > saldoInicial){
    return false;
  }else{
    return true;
  }
}
//******Fin Para Agregar */

function cargaDependenciaModificar(id){
    $('#dependenciaModificar').empty();
    $('#dependenciaModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/usuario/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].idusuario+'">'+response[i].nombre.toUpperCase()+'</option>';                
            }
            $('#dependenciaModificar').append(listaEmpresa);
            $("#dependenciaModificar option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function cargaCentroDeCostoModificar(){
    $('#centroRegistroModificar').empty();
    $('#centroRegistroModificar').append('<option value ="-">Seleccionar...</opction>');
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
            $('#centroRegistroModificar').append(listaEmpresa);
        }        
    });
}

function cargaProveedorModificar(){
    $('#proveedorRegistroModificar').empty();
    $('#proveedorRegistroModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/proveedor/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
            }
            $('#proveedorRegistroModificar').append(listaEmpresa);
        }        
    });
}

//********************************
function mensajeError(mensaje){
    swal({
      type: "error",
      title: mensaje,
      showConfirmButton: true,
      confirmButtonText: "Aceptar"
    });
}

function number_format(amount, decimals) {
      amount += '';
      amount = parseFloat(amount.replace(/[^0-9\.]/g, ''));
      decimals = decimals || 0;
      if (isNaN(amount) || amount === 0) 
          return parseFloat(0).toFixed(decimals);
      amount = '' + amount.toFixed(decimals);
      var amount_parts = amount.split('.'),
          regexp = /(\d+)(\d{3})/;
      while (regexp.test(amount_parts[0]))
          amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');
      return amount_parts.join(',');
}

function cargarDatosTablaParaModificar(id) {
    $("#tablaRendicionModificar tbody").empty();
    var fila = "";
    var params = {
        "id": id
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarDetalleRendicion.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length === 0) {
                fila = '<tr><td colspan="8" class="text-center">No hay datos disponibles</td></tr>';
            } else {
                for (var i in response) {
                    fila += '<tr>';
                        fila += '<td>' + response[i].fecha + '</td>';
                        fila += '<td>' + response[i].tipo + '</td>';
                        fila += '<td>' + response[i].nro_documento + '</td>';
                        fila += '<td>' + number_format(response[i].monto,0) + '</td>';
                        fila += '<td>' + response[i].detalle + '</td>';
                        fila += '<td>' + response[i].maquina + '</td>';
                        fila += '<td>' + response[i].centro_de_costo + '</td>';
                        fila += '<td>' + response[i].proveedor + '</td>';
                        fila += '<td>';
                            fila += '<center>';
                                fila += '<div class="btn-group">';
                                    fila += '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarItem" id="' + response[i].id + '"><i class="fa fa-times"></i></button>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
                }
            }

            $('#tablaRendicionModificar tbody').append(fila);

            $('.btnEliminarItem').click(function() {
                var id_registro = this.id;
                swal({
                title: '¿Está seguro de anular el registro?',
                text: "¡Si no lo está puede cancelar la accíón!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, anular registro!'
                }).then(function(result){
                    if(result.value){
                            eliminarItem(id_registro);
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

function cargarDatosTablaParaVerMas(id) {
    $("#tablaRendicionVer tbody").empty();
    var fila = "";
    var params = {
        "id": id
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarDetalleRendicion.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length === 0) {
                fila = '<tr><td colspan="8" class="text-center">No hay datos disponibles</td></tr>';
            } else {
                for (var i in response) {
                    fila += '<tr>';
                        fila += '<td>' + response[i].fecha + '</td>';
                        fila += '<td>' + response[i].tipo + '</td>';
                        fila += '<td>' + response[i].nro_documento + '</td>';
                        fila += '<td>' + number_format(response[i].monto,0) + '</td>';
                        fila += '<td>' + response[i].detalle + '</td>';
                        fila += '<td>' + response[i].maquina + '</td>';
                        fila += '<td>' + response[i].centro_de_costo + '</td>';
                        fila += '<td>' + response[i].proveedor + '</td>';
                    fila += '</tr>';
                }
            }

            $('#tablaRendicionVer tbody').append(fila);

        }
    }).fail(function () {
        swal({
            icon: "error",
            title: "Ha ocurrido un error al cargar la lista",
            button: "Aceptar"
        });
    });
}

function agregarItemModificar() {
    if(controlCargaPreviaModificar() == true){
        var params = {
            "id": $("#idModificar").val(),
            "fecha": $("#fechaRegistroModificar").val(),
            "tipo": $("#tipoModificar").val(),
            "nroDocumento": $("#nroDocumentoModificar").val(),
            "monto": $("#montoRegistroModificar").val().replace(/\./g,''),
            "detalle": $("#detalleRegistroModificar").val(),
            "maquina": $("#maquinaRegistroModificar").val(),
            "centroDeCosto": $("#centroRegistroModificar").val(),
            "proveedor": $("#proveedorRegistroModificar").val()
        };
        $.ajax({
            url: "../api_adm_nortrans/gestionarRendicion/funAgregarItemRendicion.php",
            method: "POST",
            cache: false,
            data: JSON.stringify(params),
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                if (response['mensaje'] === "ok") {
                    swal({
                        type: "success",
                        title: "Registro cargado con exito",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    }).then((value) => {
                        obtenerDatosParaModificar($("#idModificar").val());
                    });
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
    }else{
        mensajeError("El monto ingresado supera la disponibilidad del saldo inicial.");
    }    

    

}

function controlCargaPreviaModificar(){
  var cont = 0;
  var total = 0;
  $('#tablaRendicionModificar tr').each(function(){ 
      if(cont > 0){
        var valor = $(this).find("td").eq(3).html().replace(/\./g,''); 
        total = total + parseInt(valor);
      }
      cont++;   
  });
  
  var saldoInicial = parseInt($("#saldoInicialModificar").val().replace(/\./g,''));
  var saldoFinal = parseInt($("#montoRegistroModificar").val().replace(/\./g,'')) + total;
  if(saldoFinal > saldoInicial){
    return false;
  }else{
    return true;
  }
}

function eliminarItem(valor) {
    var params = {
        "idDetalle": valor,
        "id": $("#idModificar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funEliminarItem.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro eliminado con exito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    obtenerDatosParaModificar($("#idModificar").val());
                });
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

function obtenerMontoRendicion() {
    var params = {
        "id": $("#idUsuario").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/asignacionDeFondos/funMontoRendicion.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#saldoInicialAgregar").val(number_format(response[i].monto,0));
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

