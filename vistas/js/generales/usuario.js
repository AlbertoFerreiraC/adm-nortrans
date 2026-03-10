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

$(document).ready(function (){
  //***********CONTROLES DE GESTIÓN****************************
  $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
  });

  $('.solo-ruc').keyup(function (){
        this.value = (this.value + '').replace(/[^-0-9]/g, '');
  });

//*******************CONDICIONES PRINCIPALES*********************
  cargarDatosTabla();

  $('#cargarVentanaAgregar').click(function() {
      cargarRoles();
      // Limpiar todos los checkboxes de módulos
      $('#solicitudContratacionAprueba').prop('checked', false);
      $('#solicitudContratacionPreAprueba').prop('checked', false);
      $('#fondoFijoAprueba').prop('checked', false);
      $('#fondoFijoPreAprueba').prop('checked', false);
      $('#generarOCAprueba').prop('checked', false);
      $('#generarOCPreAprueba').prop('checked', false);
      $('#generarSMSAprueba').prop('checked', false);
      $('#generarSMSPreAprueba').prop('checked', false);
  });

  $('#btnGuardar').click(function() {
    if($("#cedulaAgregar").val() != "" && $("#nombreAgregar").val() != "" && 
       $("#nicAgregar").val() != "0" && $("#telefonoAgregar").val() != "" && 
       $("#correoAgregar").val() != ""){
          agregarDatos();
    }else{
      swal({
        type: "error",
        title: "Debe completar todos los campos obligatorios!!!",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
      
  });

  $('#btnModificar').click(function() {
      if($("#cedulaModificar").val() != "" && $("#nombreModificar").val() != "" && 
       $("#nicModificar").val() != "" && $("#telefonModificar").val() != "" && 
       $("#correoModificar").val() != ""){
        modificarDatos();
      }else{
        swal({
          type: "error",
          title: "Debe completar todos los campos obligatorios",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }
  });

  $('#filtradoDinamico').keyup(function (){
    
    var busqueda = document.getElementById('filtradoDinamico');
    var table = document.getElementById("tabla").tBodies[0];
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
  

});  


function cargarDatosTabla(){
      var fila = "";
      $("#tabla tbody").empty();
      $.ajax({
          url:"../api_adm_nortrans/usuario/funListar.php",
          method:"GET",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
            
             for (var i in response){       
                  fila = fila + '<tr>'+
                  '<td>'+(parseInt(i)+1)+'</td>'+
                  '<td>'+response[i].cedula+'</td>'+
                  '<td>'+response[i].nombre+'</td>'+
                  '<td>'+response[i].nic+'</td>'+
                  '<td>'+response[i].telefono+'</td>'+
                  '<td>'+response[i].correo+'</td>'+
                    '<td>'+
                      '<center>'+ 
                          '<div class="btn-group" style="display: flex; justify-content: center;">'+                         
                                '<button title="Modificar Usuario" class="btn btn-warning btnModificar" id="'+response[i].idusuario+'" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>'+

                                '<button title="Baja de Usuario" class="btn btn-danger btnEliminar" id="'+response[i].idusuario+'"><i class="fa fa-times"></i></button>'+

                                '<button title="Resetear Contraseña" class="btn btn-info btnResetear" id="'+response[i].idusuario+'"><i class="fa fa-key"></i></button>'+
                          '</div>'+
                      '</center>'+
                    '</td>'+

                  +'</tr>';             
              }
              $('#tabla').append(fila);

              $('.btnModificar').click(function() {
                  obtenerDatosParaModificar(this.id); 
              });

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
                    confirmButtonText: 'Si, anular registro'
                }).then(function(result){
                    if(result.value){
                        eliminarDatos(id_registro); 
                    }                        
                });                    
            });

            $('.btnResetear').click(function() {
              var id_registro = this.id;
              swal({
                title: '¿Está seguro de resetear la contraseña del usuario?',
                text: "¡Si no lo está puede cancelar la accíón!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'Cancelar',
                  confirmButtonText: 'Si, resetear contraseña'
              }).then(function(result){
                  if(result.value){
                    resetearPass(id_registro); 
                  }                        
              });                    
          });

          }        
      });

}

function eliminarDatos(valor){
  var params = {
                    "id": valor
               };
  $.ajax({
      url:"../api_adm_nortrans/usuario/funEliminar.php",
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
             title: "Registro dado de baja con éxito",
             showConfirmButton: true,
             confirmButtonText: "Aceptar"
            }).then((value) => {
              location.reload();
            });
          }

          if(response['mensaje'] === "nok"){
            swal({
              type: "error",
              title: "Ha ocurrido un error al procesar la baja",
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
            });
          }

      }        
  }).fail( function() {
      swal({
        type: "error",
        title: "Ha ocurrido un error al procesar la baja",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
  });

}

function resetearPass(valor){
  var params = {
                    "id": valor
               };
  $.ajax({
      url:"../api_adm_nortrans/usuario/funResetearPass.php",
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
             title: "Reseteo de contraseña realizado con éxito",
             showConfirmButton: true,
             confirmButtonText: "Aceptar"
            }).then((value) => {
              location.reload();
            });
          }

          if(response['mensaje'] === "nok"){
            swal({
              type: "error",
              title: "Ha ocurrido un error al procesar el reseteo de contraseña",
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
            });
          }

      }        
  }).fail( function() {
      swal({
        type: "error",
        title: "Ha ocurrido un error al procesar el reseteo de contraseña",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
  });

}

function agregarDatos(){
      // Solicitud de Contratación
      var solicitudContratacionAprueba = "no";
      var solicitudContratacionPreAprueba = "no";
      if($('#solicitudContratacionAprueba').is(':checked')) { solicitudContratacionAprueba = "si"; }
      if($('#solicitudContratacionPreAprueba').is(':checked')) { solicitudContratacionPreAprueba = "si"; }

      // Asignación de Fondo Fijo
      var fondoFijoAprueba = "no";
      var fondoFijoPreAprueba = "no";
      if($('#fondoFijoAprueba').is(':checked')) { fondoFijoAprueba = "si"; }
      if($('#fondoFijoPreAprueba').is(':checked')) { fondoFijoPreAprueba = "si"; }

      // Generar OC
      var generarOCAprueba = "no";
      var generarOCPreAprueba = "no";
      if($('#generarOCAprueba').is(':checked')) { generarOCAprueba = "si"; }
      if($('#generarOCPreAprueba').is(':checked')) { generarOCPreAprueba = "si"; }

      // Generar SMS
      var generarSMSAprueba = "no";
      var generarSMSPreAprueba = "no";
      if($('#generarSMSAprueba').is(':checked')) { generarSMSAprueba = "si"; }
      if($('#generarSMSPreAprueba').is(':checked')) { generarSMSPreAprueba = "si"; }

      var params = {
          "rol": $("#rolAgregar").val(),
          "cedula": $("#cedulaAgregar").val(),
          "nombre": $("#nombreAgregar").val(),
          "nic": $("#nicAgregar").val(),
          "telefono": $("#telefonoAgregar").val(),                        
          "correo": $("#correoAgregar").val(),
          // Nuevos permisos por módulo
          "solicitudContratacionAprueba": solicitudContratacionAprueba,
          "solicitudContratacionPreAprueba": solicitudContratacionPreAprueba,
          "fondoFijoAprueba": fondoFijoAprueba,
          "fondoFijoPreAprueba": fondoFijoPreAprueba,
          "generarOCAprueba": generarOCAprueba,
          "generarOCPreAprueba": generarOCPreAprueba,
          "generarSMSAprueba": generarSMSAprueba,
          "generarSMSPreAprueba": generarSMSPreAprueba
      };
      $.ajax({
        url:"../api_adm_nortrans/usuario/funAgregar.php",
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
                 title: "Registro cargado con exito",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la carga, verifique los datos",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "registro_existente"){
                swal({
                  type: "error",
                  title: "El RUT o Nic de este usuario ya existe dentro de sistema como activo, favor verifique",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function obtenerDatosParaModificar(valor){
      $('#solicitudContratacionApruebaModificar').prop('checked', false);
      $('#solicitudContratacionPreApruebaModificar').prop('checked', false);
      $('#fondoFijoApruebaModificar').prop('checked', false);
      $('#fondoFijoPreApruebaModificar').prop('checked', false);
      $('#generarOCApruebaModificar').prop('checked', false);
      $('#generarOCPreApruebaModificar').prop('checked', false);
      $('#generarSMSApruebaModificar').prop('checked', false);
      $('#generarSMSPreApruebaModificar').prop('checked', false);
      var params = {
                        "id": valor
                   };
      $.ajax({
          url:"../api_adm_nortrans/usuario/funDatosParaModificar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              for (var i in response){
                    cargarRolesModificar(response[i].idroles);
                    $("#cedulaModificar").val(response[i].cedula);
                    $("#nombreModificar").val(response[i].nombre);
                    $("#nicModificar").val(response[i].nic);
                    $("#telefonoModificar").val(response[i].telefono);
                    $("#correoModificar").val(response[i].correo);               
                    $("#idModificar").val(response[i].id);
                    
                    //****************************************************************
                    // Solicitud de Contratación
                    if(response[i].apruebaSolContratacion == "si"){ 
                        $("#solicitudContratacionApruebaModificar").prop('checked', true); 
                    }
                    if(response[i].preApruebaSolContratacion == "si"){ 
                        $("#solicitudContratacionPreApruebaModificar").prop('checked', true); 
                    }
                    
                    // Asignación de Fondo Fijo
                    if(response[i].apruebaAsigFondoFijo == "si"){ 
                        $("#fondoFijoApruebaModificar").prop('checked', true); 
                    }
                    if(response[i].preApruebaAsigFondoFijo == "si"){ 
                        $("#fondoFijoPreApruebaModificar").prop('checked', true); 
                    }
                    
                    // Generar OC
                    if(response[i].apruebaGenerarOc == "si"){ 
                        $("#generarOCApruebaModificar").prop('checked', true); 
                    }
                    if(response[i].preApruebaGenerarOc == "si"){ 
                        $("#generarOCPreApruebaModificar").prop('checked', true); 
                    }
                    
                    // Generar SMS
                    if(response[i].apruebaGenerarSms == "si"){ 
                        $("#generarSMSApruebaModificar").prop('checked', true); 
                    }
                    if(response[i].preApruebaGenerarSms == "si"){ 
                        $("#generarSMSPreApruebaModificar").prop('checked', true); 
                    }
              } 
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function modificarDatos(){
      // Solicitud de Contratación
      var solicitudContratacionAprueba = "no";
      var solicitudContratacionPreAprueba = "no";
      if($('#solicitudContratacionApruebaModificar').is(':checked')) { solicitudContratacionAprueba = "si"; }
      if($('#solicitudContratacionPreApruebaModificar').is(':checked')) { solicitudContratacionPreAprueba = "si"; }

      // Asignación de Fondo Fijo
      var fondoFijoAprueba = "no";
      var fondoFijoPreAprueba = "no";
      if($('#fondoFijoApruebaModificar').is(':checked')) { fondoFijoAprueba = "si"; }
      if($('#fondoFijoPreApruebaModificar').is(':checked')) { fondoFijoPreAprueba = "si"; }

      // Generar OC
      var generarOCAprueba = "no";
      var generarOCPreAprueba = "no";
      if($('#generarOCApruebaModificar').is(':checked')) { generarOCAprueba = "si"; }
      if($('#generarOCPreApruebaModificar').is(':checked')) { generarOCPreAprueba = "si"; }

      // Generar SMS
      var generarSMSAprueba = "no";
      var generarSMSPreAprueba = "no";
      if($('#generarSMSApruebaModificar').is(':checked')) { generarSMSAprueba = "si"; }
      if($('#generarSMSPreApruebaModificar').is(':checked')) { generarSMSPreAprueba = "si"; }

      var params = {
          "id": $("#idModificar").val(),
          "rol": $("#rolModificar").val(),
          "cedula": $("#cedulaModificar").val(),
          "nombre": $("#nombreModificar").val(),
          "nic": $("#nicModificar").val(),
          "telefono": $("#telefonoModificar").val(),                        
          "correo": $("#correoModificar").val(),
          // Nuevos permisos por módulo
          "solicitudContratacionAprueba": solicitudContratacionAprueba,
          "solicitudContratacionPreAprueba": solicitudContratacionPreAprueba,
          "fondoFijoAprueba": fondoFijoAprueba,
          "fondoFijoPreAprueba": fondoFijoPreAprueba,
          "generarOCAprueba": generarOCAprueba,
          "generarOCPreAprueba": generarOCPreAprueba,
          "generarSMSAprueba": generarSMSAprueba,
          "generarSMSPreAprueba": generarSMSPreAprueba
      };
      $.ajax({
          url:"../api_adm_nortrans/usuario/funModificar.php",
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
                 title: "Registro modificado con exito",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la modificación",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "repetido"){
                swal({
                  type: "error",
                  title: "El RUT o NIC de este usuario ya existe dentro de sistema como activo, favor verifique",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function cargarRoles(){
  $('#rolAgregar').empty();
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/roles/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].idroles+'">'+response[i].descripcionRol+'</option>';                
          }
          $('#rolAgregar').append(listaEmpresa);
      }        
  });

}

function cargarRolesModificar(idRolSeleccionado){

  $('#rolModificar').empty();

  $.ajax({
      url:"../api_adm_nortrans/roles/funListar.php",
      method:"GET",
      dataType: "json",
      success: function(response) {

          let listaEmpresa = "";

          for (var i in response){        
              listaEmpresa += '<option value="'+response[i].idroles+'">'+response[i].descripcionRol+'</option>';                
          }

          $('#rolModificar').append(listaEmpresa);

          // 🔥 seleccionar correctamente
          $('#rolModificar').val(idRolSeleccionado);

      }        
  });

}
