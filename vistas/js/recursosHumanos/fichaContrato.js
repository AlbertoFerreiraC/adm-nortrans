var ip = "127.0.0.1";
//var ip = "186.16.32.139";
$(document).ready(() => {
    cargarDatosSolicitudes();

    cargarFichaContrato();

    empresaAgregar();

    $('#btnGrabarFicha').click(function () {
        if ($("#empresaModSelec").val() != "" &&
            $("#fechainicioSelec").val() != "" &&
            $("#sueldoLiquidoSelec").val() != "") {
            modificarDatos();
        } else {
            swal({
                type: "error",
                title: "Favor completar debidamente los campos requeridos.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    $('#btnActualizarDocumentoContrato').click(function () {
        if( $("#documentoContrato")[0].files[0] != undefined ){
            actualizarDocumentoContrato();
          }else{
            swal({
                type: "error",
                title: "No ha seleccionado ningún archivo",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
          }
    });

    $('#btnCargarRequisito').click(function () {
        if( $("#documentoRequisito")[0].files[0] != undefined && 
            $("#seleccionRequisito").val() != "-" && 
            $("#comentarioRequisito").val() != ""){
                cargarRequisito();
          }else{
            swal({
                type: "error",
                title: "Debe ingresar todos los campos requeridos para la carga de un requisito.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
          }
    });

    $('#btnCargarRAnexo').click(function () {
        if( $("#documentoAnexo")[0].files[0] != undefined && 
            $("#seleccionAnexo").val() != "-" && 
            $("#fechaAnexo").val() != ""){
                cargarAnexo();
          }else{
            swal({
                type: "error",
                title: "Debe ingresar todos los campos requeridos para la carga de un anexo.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
          }
    });

    

    $('#filtradoDinamicoSolicitudesActivas').keyup(function (){
    
        var busqueda = document.getElementById('filtradoDinamicoSolicitudesActivas');
        var table = document.getElementById("listaSolicitud").tBodies[0];
        buscaTabla = function(){
          texto = busqueda.value.toLowerCase();
          var r=0;
          while(row = table.rows[r++])  
          {
            if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
              row.style.display = null;
            else
              row.style.display = 'none';
          }
        }
        busqueda.addEventListener('keyup', buscaTabla);
    
      });

      $('#filtradoDinamicoContratos').keyup(function (){
    
        var busqueda = document.getElementById('filtradoDinamicoContratos');
        var table = document.getElementById("fichaContrato").tBodies[0];
        buscaTabla = function(){
          texto = busqueda.value.toLowerCase();
          var r=0;
          while(row = table.rows[r++])  
          {
            if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
              row.style.display = null;
            else
              row.style.display = 'none';
          }
        }
        busqueda.addEventListener('keyup', buscaTabla);
    
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

})

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

function cargarDatosSolicitudes() {
    $("#listaSolicitud tbody").empty()
    var fila = ""
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListarSolicitudes.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                fila =
                    fila +
                    "<tr><td>" +
                    response[i].idcontratacion +
                    "</td>" +
                    "<td>" +
                    response[i].empresa +
                    "</td>" +
                    "<td>" +
                    response[i].fecha_requerida +
                    "</td>" +
                    "<td>" +
                    response[i].usuario +
                    "</td>" +
                    "<td>" +
                    response[i].division +
                    "</td>" +
                    "<td>" +
                    response[i].cargo +
                    "</td>" +
                    "<td>" +
                    response[i].cantidad_solicitada +
                    "</td>" +
                    "<td>" +
                    response[i].cantidad_contratada +
                    "</td>" +
                    "<td>" +
                    '<button title="Ver Mas" class="btn btn-warning btnVerMas" id="' +
                    response[i].idcontratacion +
                    '" data-toggle="modal" data-target="#modalVerMas"> Ver Mas...</button>' +
                    "</td>" +
                    "</tr>"
            }
            $("#listaSolicitud tbody").append(fila)


            $(".btnVerMas").click(function () {
                obtenerdatosparaVerMas(this.id)
            })
        },
    });
}


function modificarDatos() {
    var datos = new FormData();
    datos.append("idFicha", $("#numeroFichaSelec").val());
    datos.append("empresa", $("#empresaModSelec").val());
    datos.append("fechaInicio", $("#fechainicioSelec").val());
    datos.append("sueldo", $("#sueldoLiquidoSelec").val().replace(/\./g,''));
    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funActualizarDatosFichaContrato.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            if (response["mensaje"] === "ok") {
                swal({
                    type: "success",
                    title: "Registro actualizado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                }).then((value) => {
                    location.reload();
                })
            } else if (response["mensaje"] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la actualización",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                })
            }
        },
    }).fail(() => {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la actualización",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}

function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    }
    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                $("#rutAgregar").val(response[i].rut);
                $("#nomSelec").val(response[i].nombre_completo);
                $("#telSelec").val(response[i].telefono_propio);

                $("#numeroFichaSelec").val(response[i].idficha_contrato);
                $("#idSolicitudSelec").val(response[i].contratacion);
                $("#EmpresaSelec").val(response[i].empresa);
                $("#divisionSelec").val(response[i].division);
                $("#CargoSelec").val(response[i].cargo);
                $("#tipocontratoSelec").val(response[i].tipo_contrato);
                $("#tipoTurnoSelec").val(response[i].turno);

                empresaModificar(response[i].id_empresa);
                $("#fechainicioSelec").val(response[i].fecha_inicio);
                $("#sueldoLiquidoSelec").val(number_format(response[i].sueldo_liquido,0));
                if(response[i].documento_contrato != "vacio"){
                    $("#bntDescargarArchivo").removeAttr('disabled');
                    $('#bntDescargarArchivo').prop('href','http://'+ip+'/nortrans-apps/adm-nortrans/vistas/img/contrato/'+response[i].idficha_contrato+'_contrato'+response[i].tipo_documento_contrato);
                }else{
                    $("#bntDescargarArchivo").attr('disabled','disabled');
                }
                listarDatosTablaRequisito(response[i].idficha_contrato);
                listarDatosTablaAnexo(response[i].idficha_contrato);
            }

            $("#modalEditar").modal("show")
        },
    });
}

function funcionImprimir(id) {
    var contenido = ""
    var fila = $('button[data-id="' + id + '"]').closest("tr")

    fila.find("td").each(function () {
        contenido += $(this).text() + "\n"
    })

    var ventanaImpresion = window.open("", "", "height=600,width=800")
    ventanaImpresion.document.write("<pre>" + contenido + "</pre>")
    ventanaImpresion.document.close()
    ventanaImpresion.print()
}

function empresaAgregar() {
    $("#empresaAgregar").empty();
    var listaEmpresa = ""
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                listaEmpresa =
                    listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + "</option>"
            }
            $("#empresaAgregar").append(listaEmpresa)
        },
    })
}

function cargarFichaContrato() {
    $("#fichaContrato tbody").empty()
    var fila = ""

    $("#fichaContrato").off("click", ".btnTerminar")

    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funListarContratado.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                fila =
                    fila +
                    "<tr><td>" +
                    response[i].idficha_contrato +
                    "</td>" +
                    "<td>" +
                    response[i].empresa +
                    "</td>" +
                    "<td>" +
                    response[i].usuario +
                    "</td>" +
                    "<td>" +
                    response[i].fecha_inicio_laboral +
                    "</td>" +
                    "<td>" +
                    response[i].tipo_contrato +
                    "</td>" +
                    "<td>" +
                    response[i].turnos_laborales +
                    "</td>" +
                    "</td>" +
                    "<td>" +
                    '<button type="button" title="Editar" class="btn btn-warning btnEditar" data-toggle="modal" data-target="#modalEditar" id="' +
                    response[i].idficha_contrato +
                    '"> Editar</button>' +
                    "</td>" +
                    "<td>" +
                    '<button title="Terminar" class="btn btn-danger btnTerminar" id="' +
                    response[i].idficha_contrato +
                    '">Terminar</button>' +
                    "</td>" +
                    "<td>" +
                    '<button title="Imprimir" class="btn btn-info btnImprimir" data-id="' +
                    response[i].idcontratacion +
                    '">' +
                    '<i class="fa fa-print"></i></button>' +
                    "</td>" +
                    "</tr>"
            }
            $("#fichaContrato tbody").append(fila)

            $(".btnTerminar").click(function () {
                configurarEventoTerminar(this.id);
            })

            $(".btnEditar").click(function () {
                obtenerDatosParaModificar(this.id);
                requisitosDeSeleccion();
                anexosDeSeleccion();
            });

            $(".btnImprimir").click(function () {
                var id = $(this).data("id");
                var tab = window.open('https://nortrans-go.com/nortrans-apps/adm-nortrans/extensiones/tcpdf/pdf/solicitudDeContratacion.php?id='+id,'_blank');
            })
        },
    });
}

function configurarEventoTerminar(id) {
    $("#fichaContrato").on("click", ".btnTerminar", () => {
        var idContrato = id
        swal({
            title: "¿Está seguro?",
            text: "¿Desea terminar este contrato? Esta acción cambiará su estado a inactivo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, terminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                inactivarContrato(idContrato);
            }
        })
    })
}

function inactivarContrato(idcontratacion) {

    var datos = {
        idcontratacion: idcontratacion,
    }

    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funCambiarEstadoContrato.php",
        method: "POST",
        data: JSON.stringify(datos),
        contentType: "application/json",
        dataType: "json",
        success: (response) => {

            if (response["mensaje"] === "ok") {
                swal({
                    type: "success",
                    title: "Contrato finalizado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                }).then((value) => {
                    location.reload();
                })
            } else if (response["mensaje"] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la finalización del contrato",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                })
            }
        },
    }).fail((jqXHR, textStatus, errorThrown) => {
        console.error("Error AJAX:", textStatus, errorThrown)

        swal({
            type: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con el servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}

function empresaModificar(id) {
    $("#empresaModSelec").empty()
    var fila = ""
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + "</option>"
            }
            $("#empresaModSelec").append(fila)
            $("#empresaModSelec option[value='" + id + "']").attr("selected", true)
        },
    })
}

//------------------------
function obtenerdatosparaVerMas(valor) {

    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListarDatosDeContratosPorConfirmar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#motivoModificar").val(response[i].motivo);
                $("#divisionModificar").val(response[i].division);
                $("#cargoModificar").val(response[i].cargo);
                $("#empresaModificar").val(response[i].empresa);
                $("#centroDecostoModificar").val(response[i].centro);
                $("#cantidadModificar").val(response[i].cantidad_solicitada);
                $("#licenciaModificar").val(response[i].licencia_de_conducir);
                $("#tipoturnoModificar").val(response[i].turno);
                $("#tipocontratoModificar").val(response[i].tipo_contrato);
                $("#fecharequeridaModificar").val(response[i].fecha_requerida);
                $("#fechaterminoModificar").val(response[i].fecha_termino);
                $("#remuneracionModificar").val(number_format(response[i].remuneracion,0));
                $("#comentarioGeneral").val(response[i].comentario_general);
                $("#preapruebaComentarioMod").val(response[i].observacion_pre_aprobacion);
                $("#apruebaComentarioMod").val(response[i].observacion_aprobacion);
                $("#equipoModificar").val(response[i].tipo_bus);
                $("#estadoContratacion").val(response[i].estado.toUpperCase());
            }

        }
    });

}


// Actualizar Docuemnto de Contrato
function actualizarDocumentoContrato(){
    var datos = new FormData();
    datos.append("id", $("#numeroFichaSelec").val());
    datos.append("documento", $("#documentoContrato")[0].files[0] );  
$.ajax({
    url:"../api_adm_nortrans/fichaContrato/funcargarDocumentoContrato.php",
    method:"POST",
    cache: false,
    data: datos,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {
        if(response['mensaje'] === "ok"){
          swal({
           type: "success",
           title: "Documento de Contrato Cargado con éxito.",
           showConfirmButton: true,
           confirmButtonText: "Aceptar"
          }).then((value) => {
            location.reload();
          });
        }

        if(response['mensaje'] === "nok"){
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación.",
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

// Carga de Requisitos

function requisitosDeSeleccion(){
    $('#seleccionRequisito').empty();
    $('#seleccionRequisito').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/requisitosSeleccion/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
            }
            $('#seleccionRequisito').append(listaEmpresa);
        }        
    });
}

function cargarRequisito(){
    var datos = new FormData();
    datos.append("ficha", $("#numeroFichaSelec").val());
    datos.append("requisito", $("#seleccionRequisito").val());
    datos.append("comentario", $("#comentarioRequisito").val());
    datos.append("documento", $("#documentoRequisito")[0].files[0] );  
 $.ajax({
    url:"../api_adm_nortrans/fichaContrato/funCargarRequisito.php",
    method:"POST",
    cache: false,
    data: datos,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {
        if(response['mensaje'] === "ok"){
          swal({
           type: "success",
           title: "Requisito Cargado con éxito.",
           showConfirmButton: true,
           confirmButtonText: "Aceptar"
          }).then((value) => {
            listarDatosTablaRequisito($("#numeroFichaSelec").val());
            $("#comentarioRequisito").val('');
            requisitosDeSeleccion();
          });
        }

        if(response['mensaje'] === "nok"){
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga.",
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


function listarDatosTablaRequisito(valor){
    $("#tablaRequisitos tbody").empty();
    var params = {
        "id": valor
    };
    var fila = "";
    $.ajax({
        url:"../api_adm_nortrans/fichaContrato/funListaDeRequisitos.php",
        method:"POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){
                fila = fila + '<tr>'+
                  '<td>'+response[i].requisito+'</td>'+
                  '<td>'+response[i].observacion+'</td>'+
                  '<td>'+

                              '<a title="Descargar" type="button" class="btn btn-success" target="_blank" href="http://'+ip+'/nortrans-apps/adm-nortrans/vistas/img/requisitos/'+response[i].id_ficha+'_'+response[i].id_requisito+'_requisto'+response[i].tipo_adjunto+'" ><i class="fa fa-download"></i></a>'+

                              '<button title="Eliminar" type="button" class="btn btn-danger btnEliminar" id="'+response[i].id_detalle+'"><i class="fa fa-times"></i></button>'+                      
                        '</div>'+
                  '</td>'+
                +'</tr>';             
            }
            $('#tablaRequisitos').append(fila);

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
                        eliminarRequistos(id_registro);                        
                    }                        
                });                    
            });

        }        
    });

}

function eliminarRequistos(valor){
    var params = {
                      "id": valor
                 };
    $.ajax({
        url:"../api_adm_nortrans/fichaContrato/funEliminarRequisito.php",
        method:"POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if(response['mensaje'] === "ok"){
              swal({
               type: "success",
               title: "Registro eliminado con exito!!!",
               showConfirmButton: true,
               confirmButtonText: "Aceptar"
              }).then((value) => {
                listarDatosTablaRequisito($("#numeroFichaSelec").val());
              });
            }

            if(response['mensaje'] === "nok"){
              swal({
                type: "error",
                title: "Ha ocurrido un error al procesar la eliminación!!!",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
              });
            }

        }        
    });

}

// Carga de Anexos

function anexosDeSeleccion(){
    $('#seleccionAnexo').empty();
    $('#seleccionAnexo').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/tipoAnexo/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
            }
            $('#seleccionAnexo').append(listaEmpresa);
        }        
    });
}

function cargarAnexo(){
    var datos = new FormData();
    datos.append("ficha", $("#numeroFichaSelec").val());
    datos.append("anexo", $("#seleccionAnexo").val());
    datos.append("fecha", $("#fechaAnexo").val());
    datos.append("comentario", $("#comentarioAnexo").val());
    datos.append("documento", $("#documentoAnexo")[0].files[0] );  
 $.ajax({
    url:"../api_adm_nortrans/fichaContrato/funCargarAnexo.php",
    method:"POST",
    cache: false,
    data: datos,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {
        if(response['mensaje'] === "ok"){
          swal({
           type: "success",
           title: "Anexo Cargado con éxito.",
           showConfirmButton: true,
           confirmButtonText: "Aceptar"
          }).then((value) => {
            listarDatosTablaAnexo($("#numeroFichaSelec").val());
            $("#comentarioAnexo").val('');
            $("#fecha").val('');
            anexosDeSeleccion();
          });
        }

        if(response['mensaje'] === "nok"){
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga.",
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

function listarDatosTablaAnexo(valor){
    $("#tablaAnexos tbody").empty();
    var params = {
        "id": valor
    };
    var fila = "";
    $.ajax({
        url:"../api_adm_nortrans/fichaContrato/funListaDeAnexos.php",
        method:"POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){
                fila = fila + '<tr>'+
                  '<td>'+response[i].descripcion_anexo+'</td>'+
                  '<td>'+response[i].fecha+'</td>'+
                  '<td>'+response[i].observacion+'</td>'+
                  '<td>'+

                              '<a title="Descargar" type="button" class="btn btn-success" target="_blank" href="http://'+ip+'/nortrans-apps/adm-nortrans/vistas/img/anexos/'+response[i].id_ficha+'_'+response[i].idtipo_anexo+'_anexo'+response[i].tipo_adjunto+'" ><i class="fa fa-download"></i></a>'+

                              '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarAnexo" id="'+response[i].id_detalle+'"><i class="fa fa-times"></i></button>'+                      
                        '</div>'+
                  '</td>'+
                +'</tr>';             
            }
            $('#tablaAnexos').append(fila);

            $('.btnEliminarAnexo').click(function() {
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
                        eliminarAnexos(id_registro);                        
                    }                        
                });                    
            });

        }        
    });

}

function eliminarAnexos(valor){
    var params = {
                      "id": valor
                 };
    $.ajax({
        url:"../api_adm_nortrans/fichaContrato/funEliminarAnexo.php",
        method:"POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if(response['mensaje'] === "ok"){
              swal({
               type: "success",
               title: "Registro eliminado con exito!!!",
               showConfirmButton: true,
               confirmButtonText: "Aceptar"
              }).then((value) => {
                listarDatosTablaAnexo($("#numeroFichaSelec").val());
              });
            }

            if(response['mensaje'] === "nok"){
              swal({
                type: "error",
                title: "Ha ocurrido un error al procesar la eliminación!!!",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
              });
            }

        }        
    });

}