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

    cargarDatosTabla();

    $('#estadoBusqueda').change(function () {
        cargarDatosTabla();
    });   
    
    $('#btnAprobar').click(function () {
                 swal({
                    title: '¿Está seguro/a de realizar la aprobación de la rendición?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, aprobar rendición'
                }).then(function (result) {
                    if (result.value) {
                        actualizarRendicon("procesado");
                    }
                });
    }); 
    
    $('#btnEnRevision').click(function () {
        if( $("#comentarioRevisionVer").val() != "" ){
                swal({
                    title: '¿Está seguro/a de enviar a revisión la rendición?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, enviar a revisión'
                }).then(function (result) {
                    if (result.value) {
                        actualizarRendicon("en revision");
                    }
                });
        }else{
            mensajeError("Debe asignar un motivo.");
        }                 
    });

    $('#btnRechazar').click(function () {
        if( $("#comentarioRevisionVer").val() != "" ){
                swal({
                    title: '¿Está seguro/a de rechazar la rendición?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, rechazar la rendición'
                }).then(function (result) {
                    if (result.value) {
                        actualizarRendicon("rechazado");
                    }
                });
        }else{
            mensajeError("Debe asignar un motivo.");
        }                 
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
        "estado": $("#estadoBusqueda").val(),
        "usuario": $("#idUsuario").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funListarRendiciones.php",
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
                        fila += '<td>' + (parseInt(i) + 1) + '</td>';
                        fila += '<td>' + response[i].id + '</td>';
                        fila += '<td>' + response[i].usuario + '</td>';
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
                                    fila += '<button title="Ver Mas..." class="btn btn-info btnVerMas" id="' + response[i].id + '" data-toggle="modal" data-target="#modalVerMas"><i class="fa fa-eye"></i></button>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
                }
            }

            $('#tabla tbody').append(fila);


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
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro cargado con exito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
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
                $("#saldoVer").val(response[i].saldo);
                $("#comentarioVer").val(response[i].comentario_adicional);
                $("#comentarioRevisionVer").val(response[i].comentario_revision);
                $("#estadoVer").val("Estado: "+response[i].estado);      
                $("#idRendicion").val(response[i].id);    
                
                if(response[i].contiene_adjunto == 'si'){
                    $('#descargarDocumentoVer').prop('href',"http://"+ip+"/nortrans-apps/adm-nortrans/vistas/img/general/"+response[i].id+"__documentoRendicion"+response[i].tipo_adjunto);
                    $("#descargarDocumentoVer").attr("disabled", false);
                }else{
                    $('#descargarDocumentoVer').prop('href',"");
                    $("#descargarDocumentoVer").attr("disabled", true);
                }
                        
                //-------------------
                cargarDatosTablaParaVerMas(response[i].id);
                if(response[i].estado == "PROCESADO"){
                    $("#btnAprobar").prop('disabled',true);
                    $("#btnEnRevision").prop('disabled',true);
                    $("#btnRechazar").prop('disabled',true);
                }

                if(response[i].estado == "RECHAZADO"){
                    $("#btnAprobar").prop('disabled',true);
                    $("#btnEnRevision").prop('disabled',true);
                    $("#btnRechazar").prop('disabled',true);
                }

                if(response[i].estado == "EN REVISION"){
                    $("#btnAprobar").prop('disabled',false);
                    $("#btnEnRevision").prop('disabled',true);
                    $("#btnRechazar").prop('disabled',false);
                }

                if(response[i].estado == "PENDIENTE"){
                    $("#btnAprobar").prop('disabled',false);
                    $("#btnEnRevision").prop('disabled',false);
                    $("#btnRechazar").prop('disabled',false);
                }
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

function actualizarRendicon(estado) {
    var params = {
        "id": $("#idRendicion").val(),
        "estado": estado,
        "comentario": $("#comentarioRevisionVer").val(),
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarRendicion/funActualizarEstado.php",
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
                    title: "Operación realizada con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la operación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}
