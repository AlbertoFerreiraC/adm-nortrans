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
    //-------------------------
    cargarDatosTabla($("#filtroBusqueda").val());

    $('#filtroBusqueda').change(function () {
        cargarDatosTabla($("#filtroBusqueda").val());
    });    

    $('#btnGuardar').click(function () {
        if( $("#preApruebaAgregar").val() != "-"  && $("#apruebaAgregar").val() != "-" ){
            if( $("#montoSolicitadoAgregar").val() != "0" && $("#montoSolicitadoAgregar").val() != "" ){
                if(  $("#motivoAgregar").val() != "" ){
                    if(  $("#otorgarAgregar").val() != "-" ){
                        agregarDatos();    
                    }else{
                        mensajeError("Debe asignar al usuario a quien otorgaría el fondo.");
                    }   
                }else{
                    mensajeError("Debe ingresar un motivo para la asignación de fondos.");
                }  
            }else{
                mensajeError("Debe asignar un monto válido.");
            }   
        }else{
            mensajeError("Debe asignar a un responsable para la pre aprobación y aprobación respectivamente.");
        }        
    });

    $('#btnAnularSolicitud').click(function () {
        if( $("#observacionPorAnulacion").val() != "" ){
                swal({
                    title: '¿Está seguro/a que desea dar de baja la asignación?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, dar de baja la asignación'
                }).then(function (result) {
                    if (result.value) {
                        actualizarAsignacion("anulado");
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


function cargarDatosTabla(filtro) {
    $("#tabla tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/asignacionDeFondos/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length === 0) {
                fila = '<tr><td colspan="8" class="text-center">No hay datos disponibles</td></tr>';
            } else {
                for (var i in response) {
                    if(response[i].estado == filtro){
                        fila += '<tr>';
                            fila += '<td>' + (parseInt(i) + 1) + '</td>';
                            fila += '<td>' + response[i].id + '</td>';
                            fila += '<td>' + response[i].fecha_carga + '</td>';
                            fila += '<td>' + number_format(response[i].monto,0) + '</td>';
                            fila += '<td>' + response[i].otorgado_a.toUpperCase() + '</td>';
                            fila += '<td>' + response[i].pre_aprueba.toUpperCase() + '</td>';
                            fila += '<td>' + response[i].aprueba.toUpperCase() + '</td>';
                            fila += '<td>' + response[i].motivo + '</td>';
                            fila += '<td>' + response[i].estado.toUpperCase()+ '</td>';
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
            }

            $('#tabla tbody').append(fila);

            $('.btnVerMas').click(function () {
                obtenerDatosParaModificar(this.id);
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

function agregarDatos() {
    var params = {
        "idUsuario": $("#idUsuario").val(),
        "montoSolicitado": $("#montoSolicitadoAgregar").val().replace(/\./g,''),
        "otorgar": $("#otorgarAgregar").val(),
        "motivo": $("#motivoAgregar").val(),
        "preAprueba": $("#preApruebaAgregar").val(),
        "aprueba": $("#apruebaAgregar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/asignacionDeFondos/funAgregar.php",
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

            if (response['mensaje'] === "registro_existente") {
                swal({
                    type: "error",
                    title: "El usuario ya cuenta con un fondo asignado.",
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
        url: "../api_adm_nortrans/asignacionDeFondos/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#fechaCargaModificar").val(response[i].fecha_carga);
                $("#solicitadoPorModificar").val(response[i].realizado_por.toUpperCase());
                $("#otorgarModificar").val(response[i].otorgado_a.toUpperCase());
                $("#montoSolicitadoModificar").val(number_format(response[i].monto,0));
                $("#preApruebaModificar").val(response[i].pre_aprueba.toUpperCase());
                $("#apruebaModificar").val(response[i].aprueba.toUpperCase());
                $("#fechaPreApruebaModificar").val(response[i].fecha_pre_aprobacion);
                $("#fechaApruebaModificar").val(response[i].fecha_aprobacion);
                $("#estadoSolicitudModificar").val(response[i].estado.toUpperCase());
                $("#motivoAsignacionModificar").val(response[i].motivo);
                $("#observacionPreAprobacion").val(response[i].observacion_pre_aprobacion);
                $("#observacionAprobacion").val(response[i].observacion_aprobacion);
                $("#observacionPorAnulacion").val(response[i].motivo_baja);                
                $("#idModificar").val(response[i].id);

                if(response[i].estado == "anulado"){
                    $("#btnAnularSolicitud").prop('disabled',true);
                    $("#observacionPorAnulacion").prop('disabled',true);
                }else{
                    $("#btnAnularSolicitud").prop('disabled',false);
                    $("#observacionPorAnulacion").prop('disabled',false);
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
    $('#preApruebaAgregar').empty();
    $('#preApruebaAgregar').append('<option value ="-">Seleccionar...</opction>');
    //----------------------------------------------------------------------------
    $('#apruebaAgregar').empty();
    $('#apruebaAgregar').append('<option value ="-">Seleccionar...</opction>');
    //----------------------------------------------------------------------------
    $('#otorgarAgregar').empty();
    $('#otorgarAgregar').append('<option value ="-">Seleccionar...</opction>');
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
            $('#apruebaAgregar').append(listaEmpresa);
            $('#preApruebaAgregar').append(listaEmpresa);
            $('#otorgarAgregar').append(listaEmpresa);
        }        
    });
}

function actualizarAsignacion(estado) {
    var params = {
        "id": $("#idModificar").val(),
        "estado": estado,
        "comentario": $("#observacionPorAnulacion").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/asignacionDeFondos/funActualizarEstadoAsignacion.php",
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
                    title: "Operación realizada con éxito.",
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
            title: "Ha ocurrido un error al procesar la operación.",
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
