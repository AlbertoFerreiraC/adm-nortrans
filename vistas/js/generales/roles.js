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
      $("#descripcionRol").val('');

      var $tablaCheckboxesRRHH = $("#tablaRecursosHumanosAgregar input[type='checkbox']");
      $tablaCheckboxesRRHH.prop('checked', false);
      $tablaCheckboxesRRHH.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoRrhhAgregar';
          $(this).prop('disabled', !esMaestro);
      });

      var $tablaCheckboxesActivos = $("#tabladatosActivosAgregar input[type='checkbox']");
      $tablaCheckboxesActivos.prop('checked', false);
      $tablaCheckboxesActivos.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoActivosAgregar';
          $(this).prop('disabled', !esMaestro);
      });

      // Contabilidad
      var $tablaCheckboxesContabilidad = $("#tabladatosContabilidadAgregar input[type='checkbox']");
      $tablaCheckboxesContabilidad.prop('checked', false);
      $tablaCheckboxesContabilidad.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoContabilidadAgregar';
          $(this).prop('disabled', !esMaestro);
      });

      // Bodega
      var $tablaCheckboxesBodega = $("#tabladatosBodegaAgregar input[type='checkbox']");
      $tablaCheckboxesBodega.prop('checked', false);
      $tablaCheckboxesBodega.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoBodegasAgregar';
          $(this).prop('disabled', !esMaestro);
      });

      // Compras
      var $tablaCheckboxesCompras = $("#tabladatosComprasAgregar input[type='checkbox']");
      $tablaCheckboxesCompras.prop('checked', false);
      $tablaCheckboxesCompras.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoComprasAgregar';
          $(this).prop('disabled', !esMaestro);
      });

      // Mantención
      var $tablaCheckboxesMantencion = $("#tabladatosMantencionAgregar input[type='checkbox']");
      $tablaCheckboxesMantencion.prop('checked', false);
      $tablaCheckboxesMantencion.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoMantencionAgregar';
          $(this).prop('disabled', !esMaestro);
      });

      // Configuración
      var $tablaCheckboxesConfiguracion = $("#tabladatosConfiguracionAgregar input[type='checkbox']");
      $tablaCheckboxesConfiguracion.prop('checked', false);
      $tablaCheckboxesConfiguracion.each(function() {
          var esMaestro = $(this).attr('id') === 'accesoConfiguracionAgregar';
          $(this).prop('disabled', !esMaestro);
      });
  });

  $('#accesoRrhhAgregar').change(function() {
        var habilitar = $(this).is(':checked');        
        $('#tablaRecursosHumanosAgregar input[type="checkbox"]')
            .not(this)
            .prop('checked', false)
            .prop('disabled', !habilitar);
  }).trigger('change'); 

  $('#accesoActivosAgregar').change(function() {
        var habilitar = $(this).is(':checked');        
        $('#tabladatosActivosAgregar input[type="checkbox"]')
            .not(this)
            .prop('checked', false)
            .prop('disabled', !habilitar);
  }).trigger('change');

  // Contabilidad
  $('#accesoContabilidadAgregar').change(function() {
      var habilitar = $(this).is(':checked');        
      $('#tabladatosContabilidadAgregar input[type="checkbox"]')
          .not(this)
          .prop('checked', false)
          .prop('disabled', !habilitar);
  }).trigger('change');

  // Bodega
  $('#accesoBodegasAgregar').change(function() {
      var habilitar = $(this).is(':checked');        
      $('#tabladatosBodegaAgregar input[type="checkbox"]')
          .not(this)
          .prop('checked', false)
          .prop('disabled', !habilitar);
  }).trigger('change');

  // Compras
  $('#accesoComprasAgregar').change(function() {
      var habilitar = $(this).is(':checked');        
      $('#tabladatosComprasAgregar input[type="checkbox"]')
          .not(this)
          .prop('checked', false)
          .prop('disabled', !habilitar);
  }).trigger('change');

  // Mantención
  $('#accesoMantencionAgregar').change(function() {
      var habilitar = $(this).is(':checked');        
      $('#tabladatosMantencionAgregar input[type="checkbox"]')
          .not(this)
          .prop('checked', false)
          .prop('disabled', !habilitar);
  }).trigger('change');

  // Configuración
  $('#accesoConfiguracionAgregar').change(function() {
      var habilitar = $(this).is(':checked');        
      $('#tabladatosConfiguracionAgregar input[type="checkbox"]')
          .not(this)
          .prop('checked', false)
          .prop('disabled', !habilitar);
  }).trigger('change');

  //******************************************************************


  $('#accesoRrhhModificar').change(function() {
        var isChecked = $(this).is(':checked');
        var $checkboxesRH = $('#tablaRecursosHumanosModificar input[type="checkbox"]').not('#accesoRrhhModificar');        
        if (isChecked) {
            $checkboxesRH.prop('disabled', false);
        } else {
            $checkboxesRH.prop('checked', false).prop('disabled', true);
        }
  });

  $('#accesoActivosModificar').change(function() {
        var isChecked = $(this).is(':checked');
        var $checkboxesRH = $('#tabladatosActivosModificar input[type="checkbox"]').not('#accesoActivosModificar');        
        if (isChecked) {
            $checkboxesRH.prop('disabled', false);
        } else {
            $checkboxesRH.prop('checked', false).prop('disabled', true);
        }
  });

  // Contabilidad
  $('#accesoContabilidadModificar').change(function() {
      var isChecked = $(this).is(':checked');
      var $checkboxesContabilidad = $('#tabladatosContabilidadModificar input[type="checkbox"]').not('#accesoContabilidadModificar');
      if (isChecked) {
          $checkboxesContabilidad.prop('disabled', false);
      } else {
          $checkboxesContabilidad.prop('checked', false).prop('disabled', true);
      }
  });

  // Bodega
  $('#accesoBodegasModificar').change(function() {
      var isChecked = $(this).is(':checked');
      var $checkboxesBodega = $('#tabladatosBodegaModificar input[type="checkbox"]').not('#accesoBodegasModificar');
      if (isChecked) {
          $checkboxesBodega.prop('disabled', false);
      } else {
          $checkboxesBodega.prop('checked', false).prop('disabled', true);
      }
  });

  // Compras
  $('#accesoComprasModificar').change(function() {
      var isChecked = $(this).is(':checked');
      var $checkboxesCompras = $('#tabladatosComprasModificar input[type="checkbox"]').not('#accesoComprasModificar');
      if (isChecked) {
          $checkboxesCompras.prop('disabled', false);
      } else {
          $checkboxesCompras.prop('checked', false).prop('disabled', true);
      }
  });

  // Mantención
  $('#accesoMantencionModificar').change(function() {
      var isChecked = $(this).is(':checked');
      var $checkboxesMantencion = $('#tabladatosMantencionModificar input[type="checkbox"]').not('#accesoMantencionModificar');
      if (isChecked) {
          $checkboxesMantencion.prop('disabled', false);
      } else {
          $checkboxesMantencion.prop('checked', false).prop('disabled', true);
      }
  });

  // Configuración
  $('#accesoConfiguracionModificar').change(function() {
      var isChecked = $(this).is(':checked');
      var $checkboxesConfiguracion = $('#tabladatosConfiguracionModificar input[type="checkbox"]').not('#accesoConfiguracionModificar');
      if (isChecked) {
          $checkboxesConfiguracion.prop('disabled', false);
      } else {
          $checkboxesConfiguracion.prop('checked', false).prop('disabled', true);
      }
  });



  $('#btnGuardar').click(function() {
    if($("#descripcionRol").val() != ""){
          agregarDatos();
    }else{
      swal({
        type: "error",
        title: "Debe agregar una descripción al rol.",
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
          url:"../api_adm_nortrans/roles/funListar.php",
          method:"GET",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
            
             for (var i in response){       
                  fila = fila + '<tr>'+
                  '<td>'+(parseInt(i)+1)+'</td>'+
                  '<td>'+response[i].descripcionRol+'</td>'+
                    '<td>'+
                      '<center>'+ 
                          '<div class="btn-group" style="display: flex; justify-content: center;">'+                         
                                '<button title="Modificar Usuario" class="btn btn-warning btnModificar" id="'+response[i].idroles+'" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>'+

                                '<button title="Baja de Usuario" class="btn btn-danger btnEliminar" id="'+response[i].idroles+'"><i class="fa fa-times"></i></button>'+
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

          }        
      });

}

function eliminarDatos(valor){
  var params = {
                    "id": valor
               };
  $.ajax({
      url:"../api_adm_nortrans/roles/funEliminar.php",
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

function agregarDatos(){
      var params = {
          "descripcionRol": $("#descripcionRol").val(),
          "accedeRrhh": $('#accesoRrhhAgregar').is(':checked') ? "si" : "no",
          "fichaEmpleado": $('#fichaEmpleado').is(':checked') ? "si" : "no",
          "solicitudContratacion": $('#solicitudContratacion').is(':checked') ? "si" : "no",
          "preAprobacionDeSolicitud": $('#preAprobacionSolicitud').is(':checked') ? "si" : "no",
          "aprobacionDeSolicitud": $('#aprobacionSolicitud').is(':checked') ? "si" : "no",
          "fichaDeContrato": $('#fichaContrato').is(':checked') ? "si" : "no",
          "cargoOrganizacional": $('#cargoOrganizacional').is(':checked') ? "si" : "no",
          "mantenedorAreaDeNegocio": $('#mantenedorAreaNegocio').is(':checked') ? "si" : "no",
          "datosLaboralesPorVencer": $('#datosLaboralesVencer').is(':checked') ? "si" : "no",
          "solicitudContrPendiente": $('#solicitudContrPendiente').is(':checked') ? "si" : "no",
          "solicitudContratacion2": $('#solicitudContratacion2').is(':checked') ? "si" : "no",
          "nacionalidad": $('#nacionalidad').is(':checked') ? "si" : "no",
          "comuna": $('#comuna').is(':checked') ? "si" : "no",
          "afp": $('#afp').is(':checked') ? "si" : "no",
          "salud": $('#salud').is(':checked') ? "si" : "no",
          "turnosLaborales": $('#turnosLaborales').is(':checked') ? "si" : "no",
          "empresas": $('#empresas').is(':checked') ? "si" : "no",
          "documento": $('#documento').is(':checked') ? "si" : "no",
          "tipoEpp": $('#tipoEpp').is(':checked') ? "si" : "no",
          "antecedentesMedicos": $('#antecedentesMedicos').is(':checked') ? "si" : "no",
          "cargos": $('#cargos').is(':checked') ? "si" : "no",
          "tipoEquipo": $('#tipoEquipo').is(':checked') ? "si" : "no",
          "tipoAnexo": $('#tipoAnexo').is(':checked') ? "si" : "no",
          "tipoEstudio": $('#tipoEstudio').is(':checked') ? "si" : "no",
          "tipoTerminoDeContrato": $('#tipoTerminoContrato').is(':checked') ? "si" : "no",
          "contactoParentesco": $('#contactoParentesco').is(':checked') ? "si" : "no",
          "requisitosDeSeleccion": $('#requisitosSeleccion').is(':checked') ? "si" : "no",
          
          // Parámetros de Máquinas (Activos)
          "accedeActivos": $('#accesoActivosAgregar').is(':checked') ? "si" : "no",
          "informeDocumentoMaquina": $('#informeDocumentoMaquina').is(':checked') ? "si" : "no",
          "deMaquina": $('#deMaquina').is(':checked') ? "si" : "no",
          "claseMaquina": $('#claseMaquina').is(':checked') ? "si" : "no",
          "tipoBus": $('#tipoBus').is(':checked') ? "si" : "no",
          "tipoMaquina": $('#tipoMaquina').is(':checked') ? "si" : "no",
          "tipoDocumentoMaquina": $('#tipoDocumentoMaquina').is(':checked') ? "si" : "no",
          "tipoEquipamientoMaquina": $('#tipoEquipamientoMaquina').is(':checked') ? "si" : "no",
          "tipoPolizaSeguro": $('#tipoPolizaSeguro').is(':checked') ? "si" : "no",
          "marcaChasis": $('#marcaChasis').is(':checked') ? "si" : "no",
          "modeloChasis": $('#modeloChasis').is(':checked') ? "si" : "no",
          "marcaCarroceria": $('#marcaCarroceria').is(':checked') ? "si" : "no",
          "modeloCarroceria": $('#modeloCarroceria').is(':checked') ? "si" : "no",
          "proveedores": $('#proveedores').is(':checked') ? "si" : "no",
          "aseguradora": $('#aseguradora').is(':checked') ? "si" : "no",
          
          // Parámetros de Contabilidad
          "accedeContabilidad": $('#accesoContabilidadAgregar').is(':checked') ? "si" : "no",
          "misRendiciones": $('#misRendiciones').is(':checked') ? "si" : "no",
          "gestionarRendiciones": $('#gestionarRendiciones').is(':checked') ? "si" : "no",
          "asignacionFdoRendicion": $('#asignacionFdoRendicion').is(':checked') ? "si" : "no",
          "preAprobacionFdoRendicion": $('#preAprobacionFdoRendicion').is(':checked') ? "si" : "no",
          "aprobacionFdoRendicion": $('#aprobacionFdoRendicion').is(':checked') ? "si" : "no",
          "maestroProveedor": $('#maestroProveedor').is(':checked') ? "si" : "no",
          "condicionPago": $('#condicionPago').is(':checked') ? "si" : "no",
          "tipoProveedor": $('#tipoProveedor').is(':checked') ? "si" : "no",
          "comunaContabilidad": $('#comunaContabilidad').is(':checked') ? "si" : "no",
          "criticidad": $('#criticidad').is(':checked') ? "si" : "no",
          "clientes": $('#clientes').is(':checked') ? "si" : "no",
          
          // Parámetros de Bodega
          "accedeBodegas": $('#accesoBodegasAgregar').is(':checked') ? "si" : "no",
          "entregaRepuestoOt": $('#entregaRepuestoOt').is(':checked') ? "si" : "no",
          "entregaProducto": $('#entregaProducto').is(':checked') ? "si" : "no",
          "generarTraspasoBodega": $('#generarTraspasoBodega').is(':checked') ? "si" : "no",
          "solicitarAnulacionEntregaSms": $('#solicitarAnulacionEntregaSms').is(':checked') ? "si" : "no",
          "aprobarSolicitudAnulacionEntregaSms": $('#aprobarSolicitudAnulacionEntregaSms').is(':checked') ? "si" : "no",
          "recepcionOrdenCompra": $('#recepcionOrdenCompra').is(':checked') ? "si" : "no",
          "recepcionTraspaso": $('#recepcionTraspaso').is(':checked') ? "si" : "no",
          "informeInventario": $('#informeInventario').is(':checked') ? "si" : "no",
          "kardexProducto": $('#kardexProducto').is(':checked') ? "si" : "no",
          "ajusteInventario": $('#ajusteInventario').is(':checked') ? "si" : "no",
          "stockBodegaProducto": $('#stockBodegaProducto').is(':checked') ? "si" : "no",
          "quiebreStock": $('#quiebreStock').is(':checked') ? "si" : "no",
          "listaSmsPendiente": $('#listaSmsPendiente').is(':checked') ? "si" : "no",
          "listaRecepcionOc": $('#listaRecepcionOc').is(':checked') ? "si" : "no",
          "listaEntregaSms": $('#listaEntregaSms').is(':checked') ? "si" : "no",
          "consultaAjusteInventario": $('#consultaAjusteInventario').is(':checked') ? "si" : "no",
          "informeEntregaSms": $('#informeEntregaSms').is(':checked') ? "si" : "no",
          "evaluacionProveedor": $('#evaluacionProveedor').is(':checked') ? "si" : "no",
          "maestroProducto": $('#maestroProducto').is(':checked') ? "si" : "no",
          "maestroRepuesto": $('#maestroRepuesto').is(':checked') ? "si" : "no",
          "familiaRepuesto": $('#familiaRepuesto').is(':checked') ? "si" : "no",
          "subfamiliaRepuesto": $('#subfamiliaRepuesto').is(':checked') ? "si" : "no",
          "deMarca": $('#deMarca').is(':checked') ? "si" : "no",
          "deModelo": $('#deModelo').is(':checked') ? "si" : "no",
          "sistemaAplicacion": $('#sistemaAplicacion').is(':checked') ? "si" : "no",
          "unidadMedida": $('#unidadMedida').is(':checked') ? "si" : "no",
          "motivoAjusteInventario": $('#motivoAjusteInventario').is(':checked') ? "si" : "no",
          "tipoDocumentoAjusteInventario": $('#tipoDocumentoAjusteInventario').is(':checked') ? "si" : "no",
          "categoria": $('#categoria').is(':checked') ? "si" : "no",
          "subCategoria": $('#subCategoria').is(':checked') ? "si" : "no",
          "deBodega": $('#deBodega').is(':checked') ? "si" : "no",
          
          // Parámetros de Compras
          "accedeCompras": $('#accesoComprasAgregar').is(':checked') ? "si" : "no",
          "generarOc": $('#generarOc').is(':checked') ? "si" : "no",
          "aprobarOc": $('#aprobarOc').is(':checked') ? "si" : "no",
          "generaSms": $('#generaSms').is(':checked') ? "si" : "no",
          "preAprobarSms": $('#preAprobarSms').is(':checked') ? "si" : "no",
          "aprobarSms": $('#aprobarSms').is(':checked') ? "si" : "no",
          "anularSms": $('#anularSms').is(':checked') ? "si" : "no",
          "consultaOrdenCompra": $('#consultaOrdenCompra').is(':checked') ? "si" : "no",
          "ocPendienteRecepcion": $('#ocPendienteRecepcion').is(':checked') ? "si" : "no",
          "consultaListaOc": $('#consultaListaOc').is(':checked') ? "si" : "no",
          "consultaListaDetalleOc": $('#consultaListaDetalleOc').is(':checked') ? "si" : "no",
          "consultaSolicitudMaterialServicio": $('#consultaSolicitudMaterialServicio').is(':checked') ? "si" : "no",
          "consultaListaSms": $('#consultaListaSms').is(':checked') ? "si" : "no",
          "consultaListaDetalleSms": $('#consultaListaDetalleSms').is(':checked') ? "si" : "no",
          "historialOcProveedor": $('#historialOcProveedor').is(':checked') ? "si" : "no",
          "historialOcRepuesto": $('#historialOcRepuesto').is(':checked') ? "si" : "no",
          "plazoOrdenCompra": $('#plazoOrdenCompra').is(':checked') ? "si" : "no",
          "formaPagoOrdenCompra": $('#formaPagoOrdenCompra').is(':checked') ? "si" : "no",
          "plazoEntregaOrdenCompra": $('#plazoEntregaOrdenCompra').is(':checked') ? "si" : "no",
          "tipoSolicitudMaterialServicio": $('#tipoSolicitudMaterialServicio').is(':checked') ? "si" : "no",
          "tipoDocumentoProveedor": $('#tipoDocumentoProveedor').is(':checked') ? "si" : "no",
          "tipoDocumentoCajaChica": $('#tipoDocumentoCajaChica').is(':checked') ? "si" : "no",
          
          // Parámetros de Mantención
          "accedeMantencion": $('#accesoMantencionAgregar').is(':checked') ? "si" : "no",
          "reporteFalla": $('#reporteFalla').is(':checked') ? "si" : "no",
          "preventivaOt": $('#preventivaOt').is(':checked') ? "si" : "no",
          "otInterna": $('#otInterna').is(':checked') ? "si" : "no",
          "servicioExternoOt": $('#servicioExternoOt').is(':checked') ? "si" : "no",
          "asignarTareasPendientes": $('#asignarTareasPendientes').is(':checked') ? "si" : "no",
          "editarOt": $('#editarOt').is(':checked') ? "si" : "no",
          "terminarTareaOt": $('#terminarTareaOt').is(':checked') ? "si" : "no",
          "registroKm": $('#registroKm').is(':checked') ? "si" : "no",
          "editarKmMaquina": $('#editarKmMaquina').is(':checked') ? "si" : "no",
          "ordenTrabajo": $('#ordenTrabajo').is(':checked') ? "si" : "no",
          "repuestos": $('#repuestos').is(':checked') ? "si" : "no",
          "listaOts": $('#listaOts').is(':checked') ? "si" : "no",
          "tareasAsignadas": $('#tareasAsignadas').is(':checked') ? "si" : "no",
          "campana": $('#campana').is(':checked') ? "si" : "no",
          "pautaMantencion": $('#pautaMantencion').is(':checked') ? "si" : "no",
          "sistemaMaquina": $('#sistemaMaquina').is(':checked') ? "si" : "no",
          "subsistemaMaquina": $('#subsistemaMaquina').is(':checked') ? "si" : "no",
          "tipoTareaMantencion": $('#tipoTareaMantencion').is(':checked') ? "si" : "no",
          "nivelCriticidad": $('#nivelCriticidad').is(':checked') ? "si" : "no",
          "secuenciaPauta": $('#secuenciaPauta').is(':checked') ? "si" : "no",
          "detencionProgramada": $('#detencionProgramada').is(':checked') ? "si" : "no",
          "modificacionDetencion": $('#modificacionDetencion').is(':checked') ? "si" : "no",
          "categoriaPautaInspeccion": $('#categoriaPautaInspeccion').is(':checked') ? "si" : "no",
          "conductores": $('#conductores').is(':checked') ? "si" : "no",
          
          // Parámetros de Configuración
          "accedeConfiguracion": $('#accesoConfiguracionAgregar').is(':checked') ? "si" : "no",
          "roles": $('#roles').is(':checked') ? "si" : "no",
          "usuarios": $('#usuarios').is(':checked') ? "si" : "no",
          "configuracionGeneral": $('#configuracionGeneral').is(':checked') ? "si" : "no",
          "logsSistema": $('#logsSistema').is(':checked') ? "si" : "no",
          "backupRestauracion": $('#backupRestauracion').is(':checked') ? "si" : "no"
      };
      $.ajax({
        url:"../api_adm_nortrans/roles/funAgregar.php",
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

function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    };
    
    $.ajax({
        url: "../api_adm_nortrans/roles/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json", // Corregido para enviar JSON correctamente
        processData: false,
        dataType: "json",
        success: function(response) {
            for (var i in response) {
              $("#descripcionRolModificar").val(response[i].descripcionRol);
              $("#idModificar").val(response[i].id);
              
              // Lógica para Recursos Humanos
              var accedeRrhh = response[i].accedeRrhh === "si";
              $("#accesoRrhhModificar").prop('checked', accedeRrhh);                
              var $checkboxesRH = $('#tablaRecursosHumanosModificar input[type="checkbox"]').not('#accesoRrhhModificar');                
              if (accedeRrhh) {
                  $checkboxesRH.prop('disabled', false);
                  $("#fichaEmpleadoModificar").prop('checked', response[i].fichaEmpleado === "si");
                  $("#solicitudContratacionModificar").prop('checked', response[i].solicitudContratacion === "si");
                  $("#preAprobacionSolicitudModificar").prop('checked', response[i].preAprobacionDeSolicitud === "si");
                  $("#aprobacionSolicitudModificar").prop('checked', response[i].aprobacionDeSolicitud === "si");
                  $("#fichaContratoModificar").prop('checked', response[i].fichaDeContrato === "si");
                  $("#cargoOrganizacionalModificar").prop('checked', response[i].cargoOrganizacional === "si");
                  $("#mantenedorAreaNegocioModificar").prop('checked', response[i].mantenedorAreaDeNegocio === "si");
                  $("#datosLaboralesVencerModificar").prop('checked', response[i].datosLaboralesPorVencer === "si");
                  $("#solicitudContrPendienteModificar").prop('checked', response[i].solicitudContrPendiente === "si");
                  $("#solicitudContratacion2Modificar").prop('checked', response[i].solicitudContratacion2 === "si");
                  $("#nacionalidadModificar").prop('checked', response[i].nacionalidad === "si");
                  $("#comunaModificar").prop('checked', response[i].comuna === "si");
                  $("#afpModificar").prop('checked', response[i].afp === "si");
                  $("#saludModificar").prop('checked', response[i].salud === "si");
                  $("#turnosLaboralesModificar").prop('checked', response[i].turnosLaborales === "si");
                  $("#empresasModificar").prop('checked', response[i].empresas === "si");
                  $("#documentoModificar").prop('checked', response[i].documento === "si");
                  $("#tipoEppModificar").prop('checked', response[i].tipoEpp === "si");
                  $("#antecedentesMedicosModificar").prop('checked', response[i].antecedentesMedicos === "si");
                  $("#cargosModificar").prop('checked', response[i].cargos === "si");
                  $("#tipoEquipoModificar").prop('checked', response[i].tipoEquipo === "si");
                  $("#tipoAnexoModificar").prop('checked', response[i].tipoAnexo === "si");
                  $("#tipoEstudioModificar").prop('checked', response[i].tipoEstudio === "si");
                  $("#tipoTerminoContratoModificar").prop('checked', response[i].tipoTerminoDeContrato === "si");
                  $("#contactoParentescoModificar").prop('checked', response[i].contactoParentesco === "si");
                  $("#requisitosSeleccionModificar").prop('checked', response[i].requisitosDeSeleccion === "si");                    
              } else {
                  $checkboxesRH.prop('checked', false).prop('disabled', true);
              }
              
              // Lógica para Activos (Máquinas)
              var accedeActivos = response[i].accedeActivos === "si";
              $("#accesoActivosModificar").prop('checked', accedeActivos);
              var $checkboxesActivos = $('#tabladatosActivosModificar input[type="checkbox"]').not('#accesoActivosModificar');
              
              if (accedeActivos) {
                  $checkboxesActivos.prop('disabled', false);
                  $("#informeDocumentoMaquinaModificar").prop('checked', response[i].informeDocumentoMaquina === "si");
                  $("#deMaquinaModificar").prop('checked', response[i].deMaquina === "si");
                  $("#claseMaquinaModificar").prop('checked', response[i].claseMaquina === "si");
                  $("#tipoBusModificar").prop('checked', response[i].tipoBus === "si");
                  $("#tipoMaquinaModificar").prop('checked', response[i].tipoMaquina === "si");
                  $("#tipoDocumentoMaquinaModificar").prop('checked', response[i].tipoDocumentoMaquina === "si");
                  $("#tipoEquipamientoMaquinaModificar").prop('checked', response[i].tipoEquipamientoMaquina === "si");
                  $("#tipoPolizaSeguroModificar").prop('checked', response[i].tipoPolizaSeguro === "si");
                  $("#marcaChasisModificar").prop('checked', response[i].marcaChasis === "si");
                  $("#modeloChasisModificar").prop('checked', response[i].modeloChasis === "si");
                  $("#marcaCarroceriaModificar").prop('checked', response[i].marcaCarroceria === "si");
                  $("#modeloCarroceriaModificar").prop('checked', response[i].modeloCarroceria === "si");
                  $("#proveedoresModificar").prop('checked', response[i].proveedores === "si");
                  $("#aseguradoraModificar").prop('checked', response[i].aseguradora === "si");
              } else {
                  $checkboxesActivos.prop('checked', false).prop('disabled', true);
              }
              
              // Lógica para Contabilidad
              var accedeContabilidad = response[i].accedeContabilidad === "si";
              $("#accesoContabilidadModificar").prop('checked', accedeContabilidad);
              var $checkboxesContabilidad = $('#tabladatosContabilidadModificar input[type="checkbox"]').not('#accesoContabilidadModificar');
              
              if (accedeContabilidad) {
                  $checkboxesContabilidad.prop('disabled', false);
                  $("#misRendicionesModificar").prop('checked', response[i].misRendiciones === "si");
                  $("#gestionarRendicionesModificar").prop('checked', response[i].gestionarRendiciones === "si");
                  $("#asignacionFdoRendicionModificar").prop('checked', response[i].asignacionFdoRendicion === "si");
                  $("#preAprobacionFdoRendicionModificar").prop('checked', response[i].preAprobacionFdoRendicion === "si");
                  $("#aprobacionFdoRendicionModificar").prop('checked', response[i].aprobacionFdoRendicion === "si");
                  $("#maestroProveedorModificar").prop('checked', response[i].maestroProveedor === "si");
                  $("#condicionPagoModificar").prop('checked', response[i].condicionPago === "si");
                  $("#tipoProveedorModificar").prop('checked', response[i].tipoProveedor === "si");
                  $("#comunaContabilidadModificar").prop('checked', response[i].comunaContabilidad === "si");
                  $("#criticidadModificar").prop('checked', response[i].criticidad === "si");
                  $("#clientesModificar").prop('checked', response[i].clientes === "si");
              } else {
                  $checkboxesContabilidad.prop('checked', false).prop('disabled', true);
              }
              
              // Lógica para Bodega
              var accedeBodegas = response[i].accedeBodegas === "si";
              $("#accesoBodegasModificar").prop('checked', accedeBodegas);
              var $checkboxesBodega = $('#tabladatosBodegaModificar input[type="checkbox"]').not('#accesoBodegasModificar');
              
              if (accedeBodegas) {
                  $checkboxesBodega.prop('disabled', false);
                  $("#entregaRepuestoOtModificar").prop('checked', response[i].entregaRepuestoOt === "si");
                  $("#entregaProductoModificar").prop('checked', response[i].entregaProducto === "si");
                  $("#generarTraspasoBodegaModificar").prop('checked', response[i].generarTraspasoBodega === "si");
                  $("#solicitarAnulacionEntregaSmsModificar").prop('checked', response[i].solicitarAnulacionEntregaSms === "si");
                  $("#aprobarSolicitudAnulacionEntregaSmsModificar").prop('checked', response[i].aprobarSolicitudAnulacionEntregaSms === "si");
                  $("#recepcionOrdenCompraModificar").prop('checked', response[i].recepcionOrdenCompra === "si");
                  $("#recepcionTraspasoModificar").prop('checked', response[i].recepcionTraspaso === "si");
                  $("#informeInventarioModificar").prop('checked', response[i].informeInventario === "si");
                  $("#kardexProductoModificar").prop('checked', response[i].kardexProducto === "si");
                  $("#ajusteInventarioModificar").prop('checked', response[i].ajusteInventario === "si");
                  $("#stockBodegaProductoModificar").prop('checked', response[i].stockBodegaProducto === "si");
                  $("#quiebreStockModificar").prop('checked', response[i].quiebreStock === "si");
                  $("#listaSmsPendienteModificar").prop('checked', response[i].listaSmsPendiente === "si");
                  $("#listaRecepcionOcModificar").prop('checked', response[i].listaRecepcionOc === "si");
                  $("#listaEntregaSmsModificar").prop('checked', response[i].listaEntregaSms === "si");
                  $("#consultaAjusteInventarioModificar").prop('checked', response[i].consultaAjusteInventario === "si");
                  $("#informeEntregaSmsModificar").prop('checked', response[i].informeEntregaSms === "si");
                  $("#evaluacionProveedorModificar").prop('checked', response[i].evaluacionProveedor === "si");
                  $("#maestroProductoModificar").prop('checked', response[i].maestroProducto === "si");
                  $("#maestroRepuestoModificar").prop('checked', response[i].maestroRepuesto === "si");
                  $("#familiaRepuestoModificar").prop('checked', response[i].familiaRepuesto === "si");
                  $("#subfamiliaRepuestoModificar").prop('checked', response[i].subfamiliaRepuesto === "si");
                  $("#deMarcaModificar").prop('checked', response[i].deMarca === "si");
                  $("#deModeloModificar").prop('checked', response[i].deModelo === "si");
                  $("#sistemaAplicacionModificar").prop('checked', response[i].sistemaAplicacion === "si");
                  $("#unidadMedidaModificar").prop('checked', response[i].unidadMedida === "si");
                  $("#motivoAjusteInventarioModificar").prop('checked', response[i].motivoAjusteInventario === "si");
                  $("#tipoDocumentoAjusteInventarioModificar").prop('checked', response[i].tipoDocumentoAjusteInventario === "si");
                  $("#categoriaModificar").prop('checked', response[i].categoria === "si");
                  $("#subCategoriaModificar").prop('checked', response[i].subCategoria === "si");
                  $("#deBodegaModificar").prop('checked', response[i].deBodega === "si");
              } else {
                  $checkboxesBodega.prop('checked', false).prop('disabled', true);
              }
              
              // Lógica para Compras
              var accedeCompras = response[i].accedeCompras === "si";
              $("#accesoComprasModificar").prop('checked', accedeCompras);
              var $checkboxesCompras = $('#tabladatosComprasModificar input[type="checkbox"]').not('#accesoComprasModificar');
              
              if (accedeCompras) {
                  $checkboxesCompras.prop('disabled', false);
                  $("#generarOcModificar").prop('checked', response[i].generarOc === "si");
                  $("#aprobarOcModificar").prop('checked', response[i].aprobarOc === "si");
                  $("#generaSmsModificar").prop('checked', response[i].generaSms === "si");
                  $("#preAprobarSmsModificar").prop('checked', response[i].preAprobarSms === "si");
                  $("#aprobarSmsModificar").prop('checked', response[i].aprobarSms === "si");
                  $("#anularSmsModificar").prop('checked', response[i].anularSms === "si");
                  $("#consultaOrdenCompraModificar").prop('checked', response[i].consultaOrdenCompra === "si");
                  $("#ocPendienteRecepcionModificar").prop('checked', response[i].ocPendienteRecepcion === "si");
                  $("#consultaListaOcModificar").prop('checked', response[i].consultaListaOc === "si");
                  $("#consultaListaDetalleOcModificar").prop('checked', response[i].consultaListaDetalleOc === "si");
                  $("#consultaSolicitudMaterialServicioModificar").prop('checked', response[i].consultaSolicitudMaterialServicio === "si");
                  $("#consultaListaSmsModificar").prop('checked', response[i].consultaListaSms === "si");
                  $("#consultaListaDetalleSmsModificar").prop('checked', response[i].consultaListaDetalleSms === "si");
                  $("#historialOcProveedorModificar").prop('checked', response[i].historialOcProveedor === "si");
                  $("#historialOcRepuestoModificar").prop('checked', response[i].historialOcRepuesto === "si");
                  $("#plazoOrdenCompraModificar").prop('checked', response[i].plazoOrdenCompra === "si");
                  $("#formaPagoOrdenCompraModificar").prop('checked', response[i].formaPagoOrdenCompra === "si");
                  $("#plazoEntregaOrdenCompraModificar").prop('checked', response[i].plazoEntregaOrdenCompra === "si");
                  $("#tipoSolicitudMaterialServicioModificar").prop('checked', response[i].tipoSolicitudMaterialServicio === "si");
                  $("#tipoDocumentoProveedorModificar").prop('checked', response[i].tipoDocumentoProveedor === "si");
                  $("#tipoDocumentoCajaChicaModificar").prop('checked', response[i].tipoDocumentoCajaChica === "si");
              } else {
                  $checkboxesCompras.prop('checked', false).prop('disabled', true);
              }
              
              // Lógica para Mantención
              var accedeMantencion = response[i].accedeMantencion === "si";
              $("#accesoMantencionModificar").prop('checked', accedeMantencion);
              var $checkboxesMantencion = $('#tabladatosMantencionModificar input[type="checkbox"]').not('#accesoMantencionModificar');
              
              if (accedeMantencion) {
                  $checkboxesMantencion.prop('disabled', false);
                  $("#reporteFallaModificar").prop('checked', response[i].reporteFalla === "si");
                  $("#preventivaOtModificar").prop('checked', response[i].preventivaOt === "si");
                  $("#otInternaModificar").prop('checked', response[i].otInterna === "si");
                  $("#servicioExternoOtModificar").prop('checked', response[i].servicioExternoOt === "si");
                  $("#asignarTareasPendientesModificar").prop('checked', response[i].asignarTareasPendientes === "si");
                  $("#editarOtModificar").prop('checked', response[i].editarOt === "si");
                  $("#terminarTareaOtModificar").prop('checked', response[i].terminarTareaOt === "si");
                  $("#registroKmModificar").prop('checked', response[i].registroKm === "si");
                  $("#editarKmMaquinaModificar").prop('checked', response[i].editarKmMaquina === "si");
                  $("#ordenTrabajoModificar").prop('checked', response[i].ordenTrabajo === "si");
                  $("#repuestosModificar").prop('checked', response[i].repuestos === "si");
                  $("#listaOtsModificar").prop('checked', response[i].listaOts === "si");
                  $("#tareasAsignadasModificar").prop('checked', response[i].tareasAsignadas === "si");
                  $("#campanaModificar").prop('checked', response[i].campana === "si");
                  $("#pautaMantencionModificar").prop('checked', response[i].pautaMantencion === "si");
                  $("#sistemaMaquinaModificar").prop('checked', response[i].sistemaMaquina === "si");
                  $("#subsistemaMaquinaModificar").prop('checked', response[i].subsistemaMaquina === "si");
                  $("#tipoTareaMantencionModificar").prop('checked', response[i].tipoTareaMantencion === "si");
                  $("#nivelCriticidadModificar").prop('checked', response[i].nivelCriticidad === "si");
                  $("#secuenciaPautaModificar").prop('checked', response[i].secuenciaPauta === "si");
                  $("#detencionProgramadaModificar").prop('checked', response[i].detencionProgramada === "si");
                  $("#modificacionDetencionModificar").prop('checked', response[i].modificacionDetencion === "si");
                  $("#categoriaPautaInspeccionModificar").prop('checked', response[i].categoriaPautaInspeccion === "si");
                  $("#conductoresModificar").prop('checked', response[i].conductores === "si");
              } else {
                  $checkboxesMantencion.prop('checked', false).prop('disabled', true);
              }
              
              // Lógica para Configuración
              var accedeConfiguracion = response[i].accedeConfiguracion === "si";
              $("#accesoConfiguracionModificar").prop('checked', accedeConfiguracion);
              var $checkboxesConfiguracion = $('#tabladatosConfiguracionModificar input[type="checkbox"]').not('#accesoConfiguracionModificar');
              
              if (accedeConfiguracion) {
                  $checkboxesConfiguracion.prop('disabled', false);
                  $("#rolesModificar").prop('checked', response[i].roles === "si");
                  $("#usuariosModificar").prop('checked', response[i].usuarios === "si");
                  $("#configuracionGeneralModificar").prop('checked', response[i].configuracionGeneral === "si");
                  $("#logsSistemaModificar").prop('checked', response[i].logsSistema === "si");
                  $("#backupRestauracionModificar").prop('checked', response[i].backupRestauracion === "si");
              } else {
                  $checkboxesConfiguracion.prop('checked', false).prop('disabled', true);
              }
          }         
            $('#modalModificarRol').modal('show');
        },
        error: function() {
            swal({
                type: "error",
                title: "Ha ocurrido un error al traer los datos solicitados",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });
}

function modificarDatos() {
    var params = {
        "id": $("#idModificar").val(),
        "descripcionRol": $("#descripcionRolModificar").val(),
        "accedeRrhh": $('#accesoRrhhModificar').is(':checked') ? "si" : "no",
        "fichaEmpleado": $('#fichaEmpleadoModificar').is(':checked') ? "si" : "no",
        "solicitudContratacion": $('#solicitudContratacionModificar').is(':checked') ? "si" : "no",
        "preAprobacionDeSolicitud": $('#preAprobacionSolicitudModificar').is(':checked') ? "si" : "no",
        "aprobacionDeSolicitud": $('#aprobacionSolicitudModificar').is(':checked') ? "si" : "no",
        "fichaDeContrato": $('#fichaContratoModificar').is(':checked') ? "si" : "no",
        "cargoOrganizacional": $('#cargoOrganizacionalModificar').is(':checked') ? "si" : "no",
        "mantenedorAreaDeNegocio": $('#mantenedorAreaNegocioModificar').is(':checked') ? "si" : "no",
        "datosLaboralesPorVencer": $('#datosLaboralesVencerModificar').is(':checked') ? "si" : "no",
        "solicitudContrPendiente": $('#solicitudContrPendienteModificar').is(':checked') ? "si" : "no",
        "solicitudContratacion2": $('#solicitudContratacion2Modificar').is(':checked') ? "si" : "no",
        "nacionalidad": $('#nacionalidadModificar').is(':checked') ? "si" : "no",
        "comuna": $('#comunaModificar').is(':checked') ? "si" : "no",
        "afp": $('#afpModificar').is(':checked') ? "si" : "no",
        "salud": $('#saludModificar').is(':checked') ? "si" : "no",
        "turnosLaborales": $('#turnosLaboralesModificar').is(':checked') ? "si" : "no",
        "empresas": $('#empresasModificar').is(':checked') ? "si" : "no",
        "documento": $('#documentoModificar').is(':checked') ? "si" : "no",
        "tipoEpp": $('#tipoEppModificar').is(':checked') ? "si" : "no",
        "antecedentesMedicos": $('#antecedentesMedicosModificar').is(':checked') ? "si" : "no",
        "cargos": $('#cargosModificar').is(':checked') ? "si" : "no",
        "tipoEquipo": $('#tipoEquipoModificar').is(':checked') ? "si" : "no",
        "tipoAnexo": $('#tipoAnexoModificar').is(':checked') ? "si" : "no",
        "tipoEstudio": $('#tipoEstudioModificar').is(':checked') ? "si" : "no",
        "tipoTerminoDeContrato": $('#tipoTerminoContratoModificar').is(':checked') ? "si" : "no",
        "contactoParentesco": $('#contactoParentescoModificar').is(':checked') ? "si" : "no",
        "requisitosDeSeleccion": $('#requisitosSeleccionModificar').is(':checked') ? "si" : "no",
        
        // Parámetros de Módulo Activos
        "accedeActivos": $('#accesoActivosModificar').is(':checked') ? "si" : "no",
        "informeDocumentoMaquina": $('#informeDocumentoMaquinaModificar').is(':checked') ? "si" : "no",
        "deMaquina": $('#deMaquinaModificar').is(':checked') ? "si" : "no",
        "claseMaquina": $('#claseMaquinaModificar').is(':checked') ? "si" : "no",
        "tipoBus": $('#tipoBusModificar').is(':checked') ? "si" : "no",
        "tipoMaquina": $('#tipoMaquinaModificar').is(':checked') ? "si" : "no",
        "tipoDocumentoMaquina": $('#tipoDocumentoMaquinaModificar').is(':checked') ? "si" : "no",
        "tipoEquipamientoMaquina": $('#tipoEquipamientoMaquinaModificar').is(':checked') ? "si" : "no",
        "tipoPolizaSeguro": $('#tipoPolizaSeguroModificar').is(':checked') ? "si" : "no",
        "marcaChasis": $('#marcaChasisModificar').is(':checked') ? "si" : "no",
        "modeloChasis": $('#modeloChasisModificar').is(':checked') ? "si" : "no",
        "marcaCarroceria": $('#marcaCarroceriaModificar').is(':checked') ? "si" : "no",
        "modeloCarroceria": $('#modeloCarroceriaModificar').is(':checked') ? "si" : "no",
        "proveedores": $('#proveedoresModificar').is(':checked') ? "si" : "no",
        "aseguradora": $('#aseguradoraModificar').is(':checked') ? "si" : "no",
        
        // Parámetros de Contabilidad
        "accedeContabilidad": $('#accesoContabilidadModificar').is(':checked') ? "si" : "no",
        "misRendiciones": $('#misRendicionesModificar').is(':checked') ? "si" : "no",
        "gestionarRendiciones": $('#gestionarRendicionesModificar').is(':checked') ? "si" : "no",
        "asignacionFdoRendicion": $('#asignacionFdoRendicionModificar').is(':checked') ? "si" : "no",
        "preAprobacionFdoRendicion": $('#preAprobacionFdoRendicionModificar').is(':checked') ? "si" : "no",
        "aprobacionFdoRendicion": $('#aprobacionFdoRendicionModificar').is(':checked') ? "si" : "no",
        "maestroProveedor": $('#maestroProveedorModificar').is(':checked') ? "si" : "no",
        "condicionPago": $('#condicionPagoModificar').is(':checked') ? "si" : "no",
        "tipoProveedor": $('#tipoProveedorModificar').is(':checked') ? "si" : "no",
        "comunaContabilidad": $('#comunaContabilidadModificar').is(':checked') ? "si" : "no",
        "criticidad": $('#criticidadModificar').is(':checked') ? "si" : "no",
        "clientes": $('#clientesModificar').is(':checked') ? "si" : "no",
        
        // Parámetros de Bodega
        "accedeBodegas": $('#accesoBodegasModificar').is(':checked') ? "si" : "no",
        "entregaRepuestoOt": $('#entregaRepuestoOtModificar').is(':checked') ? "si" : "no",
        "entregaProducto": $('#entregaProductoModificar').is(':checked') ? "si" : "no",
        "generarTraspasoBodega": $('#generarTraspasoBodegaModificar').is(':checked') ? "si" : "no",
        "solicitarAnulacionEntregaSms": $('#solicitarAnulacionEntregaSmsModificar').is(':checked') ? "si" : "no",
        "aprobarSolicitudAnulacionEntregaSms": $('#aprobarSolicitudAnulacionEntregaSmsModificar').is(':checked') ? "si" : "no",
        "recepcionOrdenCompra": $('#recepcionOrdenCompraModificar').is(':checked') ? "si" : "no",
        "recepcionTraspaso": $('#recepcionTraspasoModificar').is(':checked') ? "si" : "no",
        "informeInventario": $('#informeInventarioModificar').is(':checked') ? "si" : "no",
        "kardexProducto": $('#kardexProductoModificar').is(':checked') ? "si" : "no",
        "ajusteInventario": $('#ajusteInventarioModificar').is(':checked') ? "si" : "no",
        "stockBodegaProducto": $('#stockBodegaProductoModificar').is(':checked') ? "si" : "no",
        "quiebreStock": $('#quiebreStockModificar').is(':checked') ? "si" : "no",
        "listaSmsPendiente": $('#listaSmsPendienteModificar').is(':checked') ? "si" : "no",
        "listaRecepcionOc": $('#listaRecepcionOcModificar').is(':checked') ? "si" : "no",
        "listaEntregaSms": $('#listaEntregaSmsModificar').is(':checked') ? "si" : "no",
        "consultaAjusteInventario": $('#consultaAjusteInventarioModificar').is(':checked') ? "si" : "no",
        "informeEntregaSms": $('#informeEntregaSmsModificar').is(':checked') ? "si" : "no",
        "evaluacionProveedor": $('#evaluacionProveedorModificar').is(':checked') ? "si" : "no",
        "maestroProducto": $('#maestroProductoModificar').is(':checked') ? "si" : "no",
        "maestroRepuesto": $('#maestroRepuestoModificar').is(':checked') ? "si" : "no",
        "familiaRepuesto": $('#familiaRepuestoModificar').is(':checked') ? "si" : "no",
        "subfamiliaRepuesto": $('#subfamiliaRepuestoModificar').is(':checked') ? "si" : "no",
        "deMarca": $('#deMarcaModificar').is(':checked') ? "si" : "no",
        "deModelo": $('#deModeloModificar').is(':checked') ? "si" : "no",
        "sistemaAplicacion": $('#sistemaAplicacionModificar').is(':checked') ? "si" : "no",
        "unidadMedida": $('#unidadMedidaModificar').is(':checked') ? "si" : "no",
        "motivoAjusteInventario": $('#motivoAjusteInventarioModificar').is(':checked') ? "si" : "no",
        "tipoDocumentoAjusteInventario": $('#tipoDocumentoAjusteInventarioModificar').is(':checked') ? "si" : "no",
        "categoria": $('#categoriaModificar').is(':checked') ? "si" : "no",
        "subCategoria": $('#subCategoriaModificar').is(':checked') ? "si" : "no",
        "deBodega": $('#deBodegaModificar').is(':checked') ? "si" : "no",
        
        // Parámetros de Compras
        "accedeCompras": $('#accesoComprasModificar').is(':checked') ? "si" : "no",
        "generarOc": $('#generarOcModificar').is(':checked') ? "si" : "no",
        "aprobarOc": $('#aprobarOcModificar').is(':checked') ? "si" : "no",
        "generaSms": $('#generaSmsModificar').is(':checked') ? "si" : "no",
        "preAprobarSms": $('#preAprobarSmsModificar').is(':checked') ? "si" : "no",
        "aprobarSms": $('#aprobarSmsModificar').is(':checked') ? "si" : "no",
        "anularSms": $('#anularSmsModificar').is(':checked') ? "si" : "no",
        "consultaOrdenCompra": $('#consultaOrdenCompraModificar').is(':checked') ? "si" : "no",
        "ocPendienteRecepcion": $('#ocPendienteRecepcionModificar').is(':checked') ? "si" : "no",
        "consultaListaOc": $('#consultaListaOcModificar').is(':checked') ? "si" : "no",
        "consultaListaDetalleOc": $('#consultaListaDetalleOcModificar').is(':checked') ? "si" : "no",
        "consultaSolicitudMaterialServicio": $('#consultaSolicitudMaterialServicioModificar').is(':checked') ? "si" : "no",
        "consultaListaSms": $('#consultaListaSmsModificar').is(':checked') ? "si" : "no",
        "consultaListaDetalleSms": $('#consultaListaDetalleSmsModificar').is(':checked') ? "si" : "no",
        "historialOcProveedor": $('#historialOcProveedorModificar').is(':checked') ? "si" : "no",
        "historialOcRepuesto": $('#historialOcRepuestoModificar').is(':checked') ? "si" : "no",
        "plazoOrdenCompra": $('#plazoOrdenCompraModificar').is(':checked') ? "si" : "no",
        "formaPagoOrdenCompra": $('#formaPagoOrdenCompraModificar').is(':checked') ? "si" : "no",
        "plazoEntregaOrdenCompra": $('#plazoEntregaOrdenCompraModificar').is(':checked') ? "si" : "no",
        "tipoSolicitudMaterialServicio": $('#tipoSolicitudMaterialServicioModificar').is(':checked') ? "si" : "no",
        "tipoDocumentoProveedor": $('#tipoDocumentoProveedorModificar').is(':checked') ? "si" : "no",
        "tipoDocumentoCajaChica": $('#tipoDocumentoCajaChicaModificar').is(':checked') ? "si" : "no",
        
        // Parámetros de Mantención
        "accedeMantencion": $('#accesoMantencionModificar').is(':checked') ? "si" : "no",
        "reporteFalla": $('#reporteFallaModificar').is(':checked') ? "si" : "no",
        "preventivaOt": $('#preventivaOtModificar').is(':checked') ? "si" : "no",
        "otInterna": $('#otInternaModificar').is(':checked') ? "si" : "no",
        "servicioExternoOt": $('#servicioExternoOtModificar').is(':checked') ? "si" : "no",
        "asignarTareasPendientes": $('#asignarTareasPendientesModificar').is(':checked') ? "si" : "no",
        "editarOt": $('#editarOtModificar').is(':checked') ? "si" : "no",
        "terminarTareaOt": $('#terminarTareaOtModificar').is(':checked') ? "si" : "no",
        "registroKm": $('#registroKmModificar').is(':checked') ? "si" : "no",
        "editarKmMaquina": $('#editarKmMaquinaModificar').is(':checked') ? "si" : "no",
        "ordenTrabajo": $('#ordenTrabajoModificar').is(':checked') ? "si" : "no",
        "repuestos": $('#repuestosModificar').is(':checked') ? "si" : "no",
        "listaOts": $('#listaOtsModificar').is(':checked') ? "si" : "no",
        "tareasAsignadas": $('#tareasAsignadasModificar').is(':checked') ? "si" : "no",
        "campana": $('#campanaModificar').is(':checked') ? "si" : "no",
        "pautaMantencion": $('#pautaMantencionModificar').is(':checked') ? "si" : "no",
        "sistemaMaquina": $('#sistemaMaquinaModificar').is(':checked') ? "si" : "no",
        "subsistemaMaquina": $('#subsistemaMaquinaModificar').is(':checked') ? "si" : "no",
        "tipoTareaMantencion": $('#tipoTareaMantencionModificar').is(':checked') ? "si" : "no",
        "nivelCriticidad": $('#nivelCriticidadModificar').is(':checked') ? "si" : "no",
        "secuenciaPauta": $('#secuenciaPautaModificar').is(':checked') ? "si" : "no",
        "detencionProgramada": $('#detencionProgramadaModificar').is(':checked') ? "si" : "no",
        "modificacionDetencion": $('#modificacionDetencionModificar').is(':checked') ? "si" : "no",
        "categoriaPautaInspeccion": $('#categoriaPautaInspeccionModificar').is(':checked') ? "si" : "no",
        "conductores": $('#conductoresModificar').is(':checked') ? "si" : "no",
        
        // Parámetros de Configuración
        "accedeConfiguracion": $('#accesoConfiguracionModificar').is(':checked') ? "si" : "no",
        "roles": $('#rolesModificar').is(':checked') ? "si" : "no",
        "usuarios": $('#usuariosModificar').is(':checked') ? "si" : "no",
        "configuracionGeneral": $('#configuracionGeneralModificar').is(':checked') ? "si" : "no",
        "logsSistema": $('#logsSistemaModificar').is(':checked') ? "si" : "no",
        "backupRestauracion": $('#backupRestauracionModificar').is(':checked') ? "si" : "no"
    };
    
    $.ajax({
        url: "../api_adm_nortrans/roles/funModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json", // Corregido para enviar JSON correctamente
        processData: false,
        dataType: "json",
        success: function(response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro modificado con exito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la modificación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

            if (response['mensaje'] === "registro_existente") {
                swal({
                    type: "error",
                    title: "La descripción de este rol ya existe en el sistema",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function() {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}


