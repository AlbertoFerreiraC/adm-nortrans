
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

    $('#modalEditarRegistro').on('hidden.bs.modal', function () {
        if ($('#modalAgregarOC').is(':visible')) {
            $('body').addClass('modal-open');
        }
    });

    $('#modalEditarRegistroModificar').on('hidden.bs.modal', function () {
        if ($('#modalModificarOC').is(':visible')) {
            $('body').addClass('modal-open');
        }
    });

    cargarDatosTabla();

    $('#btnGenerarOC').click(function () {
        // DESHABILITA EL BOTÓN
        $("#btnGenerarOC").prop("disabled", true).text("Procesando...");

        if($("#nuevaEmpresa").val()  != "-" && $("#nuevoProveedor").val()  != "-" && 
        $("#nuevotipoOC").val()  != "-" && $("#nuevotipoDocProv").val()  != "-" && 
        $("#nuevoNumDocProveedor").val()  != "" && $("#nuevoArchivo")[0].files[0] != undefined && 
        $("#nuevoPlazoPago").val()  != "-" && $("#nuevaFormaPago").val()  != "-" && 
        $("#nuevoPlazoEntrega").val()  != "-" && $("#nuevoTipoDocCompra").val()  != "-" && 
        $("#preapruebaAgregar").val()  != "-" && $("#preaprueba2Agregar").val()  != "-" && 
        $("#totalGeneralAgregar").val()  != "" && $("#totalGeneralAgregar").val()  != "0")
        {
            agregarDatos();
        }else{
            mensajeError("Debe completar todos los campos obligatorios.");
            $("#btnGenerarOC").prop("disabled", false).text("Generar OC"); // RE-HABILITA
        }      
    });

    $('#btnModificarOc').click(function () {
        if ($("#nuevaEmpresaModificar").val()  != "-" && 
                $("#nuevoProveedorModificar").val()  != "-" && 
                $("#nuevotipoOCModificar").val()  != "-" && 
                $("#nuevotipoDocProvModificar").val()  != "-" && 
                $("#nuevoNumDocProveedorModificar").val()  != "" && 
                $("#nuevoPlazoPagoModificar").val()  != "-" && 
                $("#nuevaFormaPagoModificar").val()  != "-" && 
                $("#nuevoPlazoEntregaModificar").val()  != "-" && 
                $("#nuevoTipoDocCompraModificar").val()  != "-" && 
                $("#preapruebaModificar").val()  != "-" && 
                $("#preaprueba2Modificar").val()  != "-" && 
                $("#totalGeneralModificar").val()  != "" && 
                $("#totalGeneralModificar").val()  != "0") {
                 modificarDatos(); 
            } else {
                mensajeError("Debe completar todos los campos obligatorios.");
            }      
    });

    $('#btnNuevo').click(function () {
        empresaAgregar();
        proveedorAgregar();
        tipoDocProvAgregar();
        plazoPagoAgregar();
        formaPagoAgregar();
        PreapruebaAgregar();
        solicitudesAprobadasAgregar();
        //---------------------------------------
        $("#nuevoPlazoEntrega option:first").prop("selected", true);
        $("#nuevotipoOC option:first").prop("selected", true);
        $("#nuevoNumDocProveedor").val('');
        $('#nuevoArchivo').val('');
        $("#nuevoPlazoEntrega option:first").prop("selected", true);
        $("#nuevoTipoDocCompra option:first").prop("selected", true);
    });

    $('#btnAsociarSolicitud').click(function () {
        if(controlRepeticionSmS() == true){
                detalleProductosModificar($("#nroSolicitudSms").val());
        }else{
            swal({
                type: "error",
                title: "El SMS seleccionado ya esta disponible en la tabla.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
        
    });    

    $("#filtradoDinamico").on("keyup", function () {
        const texto = this.value.toLowerCase();
        const rows = $("#tablaOrdenesCompra tbody tr");
        rows.each(function () {
            const ok = $(this).text().toLowerCase().indexOf(texto) !== -1;
            $(this).toggle(ok);
        });
    });


    $('#tipoDescuentoEditar').change(function () {
        if($("#tipoDescuentoEditar").val() == "Sin Descuento"){
                $('#montoDescuentoEditar').attr('disabled', true);
        }else{
                $('#montoDescuentoEditar').attr('disabled', false);
        }
    });

    $('#tipoDescuentoEditarParaModificacion').change(function () {
        if($("#tipoDescuentoEditarParaModificacion").val() == "Sin Descuento"){
                $('#montoDescuentoEditarParaModificacion').attr('disabled', true);
        }else{
                $('#montoDescuentoEditarParaModificacion').attr('disabled', false);
        }
    });  

    

    $('#btnEditarTabla').click(function () {
        if($("#estadoEditar").val()  == "ACTIVO"){
                if($("#cantidadRegistroEditar").val() > 0 && $("#cantidadRegistroEditar").val() != ""){
                    if($("#costoUnitarioEditar").val() != "0" && $("#costoUnitarioEditar").val() != ""){
                        if($("#glosaEditar").val() != ""){
                            if($("#tipoDescuentoEditar").val() == "Monto"){
                                if($("#montoDescuentoEditar").val() != "0" && $("#montoDescuentoEditar").val() != ""){
                                    if( parseInt($("#costoUnitarioEditar").val().replace(/\./g,'')) >= 
                                        parseInt($("#montoDescuentoEditar").val().replace(/\./g,'')) ){
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(7).html($("#costoUnitarioEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(9).html($("#montoDescuentoEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(2).html($("#glosaEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(8).html($("#tipoDescuentoEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(11).html($("#estadoEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(6).html($("#cantidadRegistroEditar").val());   
                                        var cantidad = parseInt($("#cantidadRegistroEditar").val().replace(/\./g,''));
                                        var importeUnitario = parseInt($("#costoUnitarioEditar").val().replace(/\./g,'')) - parseInt($("#montoDescuentoEditar").val().replace(/\./g,''));
                                        var importeTotal = cantidad * importeUnitario;
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(10).html(number_format(importeTotal,0));
                                        $('#modalEditarRegistro').modal('hide');  
                                        controlTotal();
                                    }else{
                                        swal({
                                            type: "error",
                                            title: "El descuento no puede ser superior al costo unitario",
                                            showConfirmButton: true,
                                            confirmButtonText: "Aceptar"
                                        });
                                    }    
                                
                                }else{
                                    swal({
                                        type: "error",
                                        title: "Debe ingresar un monto de descuento válido",
                                        showConfirmButton: true,
                                        confirmButtonText: "Aceptar"
                                    });
                                }                           
                            }

                            if($("#tipoDescuentoEditar").val() == "Porcentaje"){
                                if($("#montoDescuentoEditar").val() != "0" && $("#montoDescuentoEditar").val() != ""){

                                    if(parseInt($("#montoDescuentoEditar").val().replace(/\./g,'')) <= 100){
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(7).html($("#costoUnitarioEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(9).html($("#montoDescuentoEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(2).html($("#glosaEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(8).html($("#tipoDescuentoEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(11).html($("#estadoEditar").val());
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(6).html($("#cantidadRegistroEditar").val());   
                                        var cantidad = parseInt($("#cantidadRegistroEditar").val().replace(/\./g,''));
                                        var importeUnitario = (parseInt($("#costoUnitarioEditar").val().replace(/\./g,'')) * parseInt($("#montoDescuentoEditar").val().replace(/\./g,'')))/100;
                                        var importeTotal = cantidad * (parseInt($("#costoUnitarioEditar").val().replace(/\./g,'')) - importeUnitario);
                                        $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(10).html(number_format(importeTotal,0));
                                        $('#modalEditarRegistro').modal('hide');    
                                        controlTotal();      
                                    }else{
                                        swal({
                                            type: "error",
                                            title: "Debe ingresar un porcentje de descuento no puede ser superior al costo unitario",
                                            showConfirmButton: true,
                                            confirmButtonText: "Aceptar"
                                        });
                                    }                             
                                }else{
                                    swal({
                                        type: "error",
                                        title: "Debe ingresar un porcentaje de descuento válido",
                                        showConfirmButton: true,
                                        confirmButtonText: "Aceptar"
                                    });
                                }                           
                            }

                                if($("#tipoDescuentoEditar").val() == "Sin Descuento"){
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(7).html($("#costoUnitarioEditar").val());
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(9).html("0");
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(2).html($("#glosaEditar").val());
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(8).html("Sin Descuento");
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(11).html($("#estadoEditar").val());  
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(6).html($("#cantidadRegistroEditar").val());     
                                    var cantidad = parseInt($("#cantidadRegistroEditar").val().replace(/\./g,''));
                                    var importeUnitario = parseInt($("#costoUnitarioEditar").val().replace(/\./g,''));
                                    var importeTotal = cantidad * importeUnitario;
                                    $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(10).html(number_format(importeTotal,0)); 
                                    $('#modalEditarRegistro').modal('hide');    
                                    controlTotal();      
                                }
                            
                        }else{
                            swal({
                                type: "error",
                                title: "Debe ingresar una descripción válida",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            });
                        }
                    }else{
                        swal({
                            type: "error",
                            title: "Debe ingresar un precio unitario válido.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                    }    
                }else{
                    swal({
                        type: "error",
                        title: "Debe ingresar una cantidad válida.",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    });
                }
                
        }

        if($("#estadoEditar").val()  == "EXCLUIDO"){
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(7).html($("#costoUnitarioEditar").val());
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(9).html("0");
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(2).html($("#glosaEditar").val());
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(8).html("Sin Descuento");
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(11).html($("#estadoEditar").val());   
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(10).html("0");          
            $("#filaDetalle_"+$("#idDetalleRegistroEditar").val()).find("td").eq(6).html($("#cantidadRegistroEditar").val());   
            $('#modalEditarRegistro').modal('hide'); 
            controlTotal();
        }    
        
        
    });  

    $('#btnEditarTablaParaModificacion').click(function () {

        if($("#estadoEditarParaModificacion").val() == "ACTIVO") {

            if($("#cantidadRegistroEditarParaModificacion").val() > 0 && $("#cantidadRegistroEditarParaModificacion").val() != "") {

                if($("#costoUnitarioEditarParaModificacion").val() != "0" && $("#costoUnitarioEditarParaModificacion").val() != "") {

                    if($("#glosaEditarParaModificacion").val() != "") {

                        if($("#tipoDescuentoEditarParaModificacion").val() == "Monto") {

                            if($("#montoDescuentoEditarParaModificacion").val() != "0" && $("#montoDescuentoEditarParaModificacion").val() != "") {

                                if(parseInt($("#costoUnitarioEditarParaModificacion").val().replace(/\./g,'')) >= 
                                parseInt($("#montoDescuentoEditarParaModificacion").val().replace(/\./g,''))) {

                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(7).html($("#costoUnitarioEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(9).html($("#montoDescuentoEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(2).html($("#glosaEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(8).html($("#tipoDescuentoEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(11).html($("#estadoEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(6).html($("#cantidadRegistroEditarParaModificacion").val());   

                                    var cantidad = parseInt($("#cantidadRegistroEditarParaModificacion").val().replace(/\./g,''));
                                    var importeUnitario = parseInt($("#costoUnitarioEditarParaModificacion").val().replace(/\./g,'')) - parseInt($("#montoDescuentoEditarParaModificacion").val().replace(/\./g,''));
                                    var importeTotal = cantidad * importeUnitario;
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(10).html(number_format(importeTotal, 0));

                                    $('#modalEditarRegistroModificar').modal('hide');
                                    controlTotalModificacion();

                                } else {
                                    swal({
                                        type: "error",
                                        title: "El descuento no puede ser superior al costo unitario",
                                        showConfirmButton: true,
                                        confirmButtonText: "Aceptar"
                                    });
                                }

                            } else {
                                swal({
                                    type: "error",
                                    title: "Debe ingresar un monto de descuento válido",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                });
                            }

                        }

                        if($("#tipoDescuentoEditarParaModificacion").val() == "Porcentaje") {

                            if($("#montoDescuentoEditarParaModificacion").val() != "0" && $("#montoDescuentoEditarParaModificacion").val() != "") {

                                if(parseInt($("#montoDescuentoEditarParaModificacion").val().replace(/\./g,'')) <= 100) {

                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(7).html($("#costoUnitarioEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(9).html($("#montoDescuentoEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(2).html($("#glosaEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(8).html($("#tipoDescuentoEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(11).html($("#estadoEditarParaModificacion").val());
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(6).html($("#cantidadRegistroEditarParaModificacion").val());   

                                    var cantidad = parseInt($("#cantidadRegistroEditarParaModificacion").val().replace(/\./g,''));
                                    var importeUnitario = (parseInt($("#costoUnitarioEditarParaModificacion").val().replace(/\./g,'')) * parseInt($("#montoDescuentoEditarParaModificacion").val().replace(/\./g,''))) / 100;
                                    var importeTotal = cantidad * (parseInt($("#costoUnitarioEditarParaModificacion").val().replace(/\./g,'')) - importeUnitario);
                                    $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(10).html(number_format(importeTotal, 0));

                                    $('#modalEditarRegistroModificar').modal('hide');
                                    controlTotalModificacion();

                                } else {
                                    swal({
                                        type: "error",
                                        title: "Debe ingresar un porcentaje de descuento no superior a 100",
                                        showConfirmButton: true,
                                        confirmButtonText: "Aceptar"
                                    });
                                }

                            } else {
                                swal({
                                    type: "error",
                                    title: "Debe ingresar un porcentaje de descuento válido",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                });
                            }

                        }

                        if($("#tipoDescuentoEditarParaModificacion").val() == "Sin Descuento") {

                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(7).html($("#costoUnitarioEditarParaModificacion").val());
                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(9).html("0");
                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(2).html($("#glosaEditarParaModificacion").val());
                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(8).html("Sin Descuento");
                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(11).html($("#estadoEditarParaModificacion").val());
                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(6).html($("#cantidadRegistroEditarParaModificacion").val());  

                            var cantidad = parseInt($("#cantidadRegistroEditarParaModificacion").val().replace(/\./g,''));
                            var importeUnitario = parseInt($("#costoUnitarioEditarParaModificacion").val().replace(/\./g,''));
                            var importeTotal = cantidad * importeUnitario;
                            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(10).html(number_format(importeTotal,0));

                            $('#modalEditarRegistroModificar').modal('hide');
                            controlTotalModificacion();
                        }

                    } else {
                        swal({
                            type: "error",
                            title: "Debe ingresar una descripción válida",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                    }

                } else {
                    swal({
                        type: "error",
                        title: "Debe ingresar un precio unitario válido.",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    });
                }

            } else {
                swal({
                    type: "error",
                    title: "Debe ingresar una cantidad válida.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }

        if($("#estadoEditarParaModificacion").val() == "EXCLUIDO") {

            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(7).html($("#costoUnitarioEditarParaModificacion").val());
            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(9).html("0");
            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(2).html($("#glosaEditarParaModificacion").val());
            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(8).html("Sin Descuento");
            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(11).html($("#estadoEditarParaModificacion").val());
            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(10).html("0");
            $("#filaDetalleParaModificar_" + $("#idDetalleRegistroEditarParaModificacion").val()).find("td").eq(6).html($("#cantidadRegistroEditarParaModificacion").val());

            $('#modalEditarRegistroModificar').modal('hide');
            controlTotalModificacion();
        }

    });



});

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

function cargarDatosTabla() {
    $("#tablaOrdenesCompra tbody").empty();
     var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funListarOcActivas.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (response) {

            for (var i in response) {
                fila += '<tr>';
                        fila += '<td>' + response[i].id + '</td>';
                        fila += '<td>' + response[i].fecha_creacion + '</td>';
                        fila += '<td>' + response[i].proveedor + '</td>';
                        fila += '<td>' + response[i].empresa + '</td>';
                        fila += '<td>' + response[i].tipo_oc + '</td>';
                        fila += '<td>' + response[i].plazo_entrega + '</td>';
                        fila += '<td>' + number_format(response[i].total_general,0) + '</td>';
                        fila += '<td>';
                            fila += '<center>';
                                fila += '<div class="btn-group">';
                                    fila += '<button type="button" title="Editar Order der Compra" class="btn btn-warning btnEditarOC" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificarOC"><i class="fa fa-pencil"></i></button>';
                                    fila += '<a type="button" title="PDF" class="btn btn-success btnPdf" id="' + response[i].id + '"><i class="fa fa-file-pdf-o"></i></a>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
            }

            $("#tablaOrdenesCompra").append(fila);

            $(".btnEditarOC").click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnPdf').click(function() {
                 $(".btnPdf")
                  .prop('href', "/nortrans-apps/adm-nortrans/extensiones/tcpdf/pdf/ordenDeCompra.php?id=" + this.id)
                  .prop('target', '_blank');
            });

            $(".btnEliminar").click(function () {
                let id_registro = this.id;

                swal({
                    title: "¿Está seguro de anular el registro?",
                    text: "¡Si no lo está puede cancelar la acción!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, anular registro"
                }).then(function (result) {
                    if (result.value) {
                        eliminarDatos(id_registro);
                    }
                });
            });
        },

        error: function () {
            swal({
                type: "error",
                title: "Ha ocurrido un error al cargar la lista",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });
}

function agregarDatos() {

    var datos = new FormData();
    datos.append("empresa", $("#nuevaEmpresa").val());
    datos.append("proveedor", $("#nuevoProveedor").val());
    datos.append("tipoOc", $("#nuevotipoOC").val());
    datos.append("tipoDocumentoProveedor", $("#nuevotipoDocProv").val());
    datos.append("nroDocumentoProveedor", $("#nuevoNumDocProveedor").val());
    datos.append("documento", $("#nuevoArchivo")[0].files[0] ); 
    datos.append("plazo", $("#nuevoPlazoPago").val());
    datos.append("formaPago", $("#nuevaFormaPago").val());
    datos.append("plazoEntrega", $("#nuevoPlazoEntrega").val());
    datos.append("tipoDocumentoCompra", $("#nuevoTipoDocCompra").val());
    datos.append("preAprueba", $("#preapruebaAgregar").val()); 
    datos.append("preAprueba2", $("#preaprueba2Agregar").val()); 

    datos.append("subTotal", $("#subTotalAgregar").val().replace(/\./g,'')); 
    datos.append("descuento", $("#descuentoTotalAgregar").val().replace(/\./g,'')); 
    datos.append("exento", $("#exentoAgregar").val().replace(/\./g,'')); 
    datos.append("neto", $("#netoAgregar").val().replace(/\./g,'')); 
    datos.append("iva", $("#ivaTotal").val().replace(/\./g,'')); 
    datos.append("retencion", $("#retencionAgregar").val().replace(/\./g,'')); 
    datos.append("total", $("#totalGeneralAgregar").val().replace(/\./g,'')); 
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funAgregarCabecera.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] != "nok") {
                agregarDatosDetalle(response['mensaje']);
            } else {
                mensajeError("Ha ocurrido un error al procesar la carga.");
                $("#btnGenerarOC").prop("disabled", false).text("Generar OC");
            }
        }
        }).fail(function () {
            mensajeError("Ha ocurrido un error al procesar la carga.");
            $("#btnGenerarOC").prop("disabled", false).text("Generar OC");
        });

}

function agregarDatosDetalle(id) {
    var datos = '{"idOc":"'+id+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
      $('#tablaDetalleOC tbody tr').each(function(){ 
    datos_tabla = datos_tabla + 
    '{"nroSms":"'+$(this).find("td").eq(0).html()+
    '","nroSmsDetalle":"'+$(this).find("td").eq(12).html()+
    '","itemSms":"'+$(this).find("td").eq(1).html()+
    '","aplicacion":"'+$(this).find("td").eq(2).html()+
    '","tipoProducto":"'+$(this).find("td").eq(3).html()+
    '","glosa":"'+$(this).find("td").eq(4).html()+
    '","unidadDeMedida":"'+$(this).find("td").eq(5).html()+
    '","cantidad":"'+$(this).find("td").eq(6).html()+
    '","costoUnitario":"'+$(this).find("td").eq(7).html().replace(/\./g,'')+
    '","tipoDescuento":"'+$(this).find("td").eq(8).html()+
    '","valorDescuento":"'+$(this).find("td").eq(9).html().replace(/\./g,'')+
    '","subTotal":"'+$(this).find("td").eq(10).html().replace(/\./g,'')+
    '","estado":"'+$(this).find("td").eq(11).html()+'"},';
      });
    datos_tabla = datos_tabla.substr(0,datos_tabla.length-1);  
    datos_tabla = datos_tabla + ']';  
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funAgregarDetalle.php",
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
                    title: "Orden de Compra número "+id+" cargado con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    window.open(
                    "/nortrans-apps/adm-nortrans/extensiones/tcpdf/pdf/ordenDeCompra.php?id=" + id,
                    "_blank"
                );
                    location.reload();
                });    
            } 
            
            if (response['mensaje'] === "nok") {
                mensajeError("Ha ocurrido un error al procesar la carga.");
            }                
        }
    });

}

function agregarDatosDetalleModificacion(id) {
    var datos = '{"idOc":"'+id+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
      $('#tablaDetalleOCModificar tbody tr').each(function(){ 
    datos_tabla = datos_tabla + 
    '{"nroSms":"'+$(this).find("td").eq(0).html()+
    '","nroSmsDetalle":"'+$(this).find("td").eq(12).html()+
    '","itemSms":"'+$(this).find("td").eq(1).html()+
    '","aplicacion":"'+$(this).find("td").eq(2).html()+
    '","tipoProducto":"'+$(this).find("td").eq(3).html()+
    '","glosa":"'+$(this).find("td").eq(4).html()+
    '","unidadDeMedida":"'+$(this).find("td").eq(5).html()+
    '","cantidad":"'+$(this).find("td").eq(6).html()+
    '","costoUnitario":"'+$(this).find("td").eq(7).html().replace(/\./g,'')+
    '","tipoDescuento":"'+$(this).find("td").eq(8).html()+
    '","valorDescuento":"'+$(this).find("td").eq(9).html().replace(/\./g,'')+
    '","subTotal":"'+$(this).find("td").eq(10).html().replace(/\./g,'')+
    '","estado":"'+$(this).find("td").eq(11).html()+'"},';
      });
    datos_tabla = datos_tabla.substr(0,datos_tabla.length-1);  
    datos_tabla = datos_tabla + ']';  
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funAgregarDetalle.php",
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
                    title: "Orden de Compra número "+id+" cargado con éxito.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    location.reload();
                });
            } else {
                mensajeError("Ha ocurrido un error al procesar la carga.");
                $("#btnGenerarOC").prop("disabled", false).text("Generar OC");
            }
        }
        }).fail(function () {
            mensajeError("Ha ocurrido un error al procesar la carga.");
            $("#btnGenerarOC").prop("disabled", false).text("Generar OC");
        });

}

function modificarDatos() {

    var datos = new FormData();
    datos.append("idOc", $("#idOcModificar").val());
    datos.append("empresa", $("#nuevaEmpresaModificar").val());
    datos.append("proveedor", $("#nuevoProveedorModificar").val());
    datos.append("tipoOc", $("#nuevotipoOCModificar").val());
    datos.append("tipoDocumentoProveedor", $("#nuevotipoDocProvModificar").val());
    datos.append("nroDocumentoProveedor", $("#nuevoNumDocProveedorModificar").val());
    datos.append("documento", $("#nuevoArchivoModificar")[0].files[0]); 
    datos.append("plazo", $("#nuevoPlazoPagoModificar").val());
    datos.append("formaPago", $("#nuevaFormaPagoModificar").val());
    datos.append("plazoEntrega", $("#nuevoPlazoEntregaModificar").val());
    datos.append("tipoDocumentoCompra", $("#nuevoTipoDocCompraModificar").val());
    datos.append("preAprueba", $("#preapruebaModificar").val()); 
    datos.append("preAprueba2", $("#preaprueba2Modificar").val());
    // Campos de totales
    datos.append("subTotal", $("#subTotalModificar").val().replace(/\./g,'')); 
    datos.append("descuento", $("#descuentoTotalModificar").val().replace(/\./g,'')); 
    datos.append("exento", $("#exentoModificar").val().replace(/\./g,'')); 
    datos.append("neto", $("#netoModificar").val().replace(/\./g,'')); 
    datos.append("iva", $("#ivaTotalModificar").val().replace(/\./g,'')); 
    datos.append("retencion", $("#retencionModificar").val().replace(/\./g,'')); 
    datos.append("total", $("#totalGeneralModificar").val().replace(/\./g,'')); 
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funActualizarCabecera.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] != "nok") {
                agregarDatosDetalleModificacion(response['mensaje']);
            }

            if (response['mensaje'] == "nok") {
                mensajeError("Ha ocurrido un error al procesar la actualización.");
            }

        }
    }).fail(function () {
        mensajeError("Ha ocurrido un error al procesar la actualización.");
    });

}

function eliminarDatos(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funEliminar.php",
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
                    location.reload();
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

/*PARTE DE AGREGAR*/
function empresaAgregar() {
    $('#nuevaEmpresa').empty();
    $('#nuevaEmpresa').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevaEmpresa').append(listaEmpresa);
        }
    });
}

function proveedorAgregar() {
    $('#nuevoProveedor').empty();
    $('#nuevoProveedor').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/proveedor/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevoProveedor').append(listaEmpresa);
        }
    });
}


function tipoDocProvAgregar() {
    $('#nuevotipoDocProv').empty();
    $('#nuevotipoDocProv').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/docProveedor/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevotipoDocProv').append(listaEmpresa);
        }
    });
}

function plazoPagoAgregar() {
    $('#nuevoPlazoPago').empty();
    $('#nuevoPlazoPago').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/plazoOC/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevoPlazoPago').append(listaEmpresa);
        }
    });
}

function formaPagoAgregar() {
    $('#nuevaFormaPago').empty();
    $('#nuevaFormaPago').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/pagoOC/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevaFormaPago').append(listaEmpresa);
        }
    });
}

function PreapruebaAgregar() {
    $('#preapruebaAgregar').empty();
    $('#preapruebaAgregar').append('<option value ="-">Seleccionar...</opction>');
    $('#preaprueba2Agregar').empty();
    $('#preaprueba2Agregar').append('<option value ="-">Seleccionar...</opction>');
    var listaUsuario = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaUsuario = listaUsuario + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preapruebaAgregar').append(listaUsuario);
            $('#preaprueba2Agregar').append(listaUsuario);
        }
    });
}

function solicitudesAprobadasAgregar() {
    $('#nroSolicitudSms').empty();
    $('#nroSolicitudSms').append('<option value ="-">Seleccionar...</opction>');
    var listaUsuario = "";
    $.ajax({
        url: "../api_adm_nortrans/generarOC/listarSmsAprobadas.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaUsuario = listaUsuario + '<option value = "' + response[i].idsms + '">' + response[i].descripcion + '</option>';
            }
            $('#nroSolicitudSms').append(listaUsuario);
        }
    });
}

function detalleProductosModificar(id) {
    var fila = "";
    
    var params = {
        "id": id
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funListaDatosDetalleSmsApi.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            var contador = 0;
            for (var i in response) {
                contador++;
                var descripcion = "";
                if(response[i].tipo == "Repuesto"){
                    descripcion = response[i].descripcionRepuestos; 
                }else{
                    descripcion = response[i].descripcionInsumos;
                }
                fila += '<tr id="filaDetalle_'+response[i].idDetalle+'">';
                        fila += '<td>' + id + '</td>';
                        fila += '<td>' + contador + '</td>';
                        fila += '<td>' + response[i].aplicacion + '</td>';
                        fila += '<td>' + response[i].tipo + '</td>';
                        fila += '<td>' + descripcion + '</td>';
                        fila += '<td>' + response[i].unidad_de_medida + '</td>';
                        fila += '<td>' + response[i].cantidad + '</td>';
                        fila += '<td>' + "0" + '</td>';
                        fila += '<td>' + "Sin Descuento" + '</td>';
                        fila += '<td>' + "0" + '</td>';
                        fila += '<td>' + "0" + '</td>';
                        fila += '<td>' + "ACTIVO" + '</td>';
                        fila += '<td style="display: none;">' + response[i].idDetalle + '</td>';
                        fila += '<td>';
                            fila += '<center>';
                                fila += '<div class="btn-group">';
                                    fila += '<button type="button" title="Editar Registro" class="btn btn-warning btnEditarRegistrosAgregar" id="' + response[i].idDetalle + '" data-toggle="modal" data-target="#modalEditarRegistro"><i class="fa fa-pencil"></i></button>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
            }

            $('#tablaDetalleOC tbody').append(fila);

            $('.btnEditarRegistrosAgregar').click(function () {
                var idDetalle = this.id;
                $("#montoDescuentoEditar").val('');
                $('#montoDescuentoEditar').attr('disabled', true);        
                $('#tipoDescuentoEditar option:first').prop('selected', true);
                $('#estadoEditar option:first').prop('selected', true);
                $("#glosaEditar").val('');
                $("#costoUnitarioEditar").val('');
                $("#idDetalleRegistroEditar").val('');
                $("#cantidadRegistroEditar").val('');
                //-----------------------------------------------
                $("#idDetalleRegistroEditar").val(idDetalle); 
                $("#cantidadRegistroEditar").val($("#filaDetalle_"+idDetalle).find("td").eq(6).html()); 
                $("#costoUnitarioEditar").val( number_format($("#filaDetalle_"+idDetalle).find("td").eq(7).html().replace(/\./g,''),0) ); 
                $("#montoDescuentoEditar").val( number_format( $("#filaDetalle_"+idDetalle).find("td").eq(9).html().replace(/\./g,''),0 ) ); 
                $("#glosaEditar").val( $("#filaDetalle_"+idDetalle).find("td").eq(2).html() ); 

                let tipoDescuento = $("#filaDetalle_" + idDetalle).find("td").eq(8).text();
                $("#tipoDescuentoEditar").val(tipoDescuento).trigger("change");  

                let estado = $("#filaDetalle_" + idDetalle).find("td").eq(11).text();
                $("#estadoEditar").val(estado).trigger("change");        

            });

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

function controlRepeticionSmS(){
  var cont = 0;
  var respuesta = true;
  $('#tablaDetalleOC tr').each(function(){ 
      if(cont > 0){
        var fila = $(this).find("td").eq(0).html().replace(/\./g,'');
        var sms =  $("#nroSolicitudSms").val();
        if(fila == sms){
            respuesta = false;
            return respuesta;
        }
        
      }
      cont++;   
  });
  return respuesta;  
}


function controlTotal() {
    var cont = 0;
    var totalConDescuento = 0;
    var totalSinDescuento = 0;
    var subTotal = 0;
    var neto = 0;
    var totalDescuento = 0;
    var totalIVA = 0;
    var totalGeneral = 0;
    $('#tablaDetalleOC tr').each(function () {
        if (cont > 0) {
            if ($(this).find("td").eq(11).html() == "ACTIVO") {
                var cantidad = parseInt($(this).find("td").eq(6).html().replace(/\./g, ''));
                var costoUnitario = parseInt($(this).find("td").eq(7).html().replace(/\./g, ''));
                totalSinDescuento = totalSinDescuento + (cantidad * costoUnitario);
                totalConDescuento = totalConDescuento + parseInt($(this).find("td").eq(10).html().replace(/\./g, ''));
            }

        }
        cont++;
    });

    subTotal = totalSinDescuento;
    totalDescuento = totalSinDescuento - totalConDescuento;
    neto = totalConDescuento;
    totalIVA = Math.round(neto * 0.19);
    totalGeneral = neto + totalIVA;

    $('#subTotalAgregar').val(number_format(subTotal, 0));
    $('#descuentoTotalAgregar').val(number_format(totalDescuento, 0));
    $('#netoAgregar').val(number_format(neto, 0));
    $('#ivaTotal').val(number_format(totalIVA, 0));
    $('#totalGeneralAgregar').val(number_format(totalGeneral, 0));

}

function controlTotalModificacion() {
    var cont = 0;
    var totalConDescuento = 0;
    var totalSinDescuento = 0;
    var subTotal = 0;
    var neto = 0;
    var totalDescuento = 0;
    var totalIVA = 0;
    var totalGeneral = 0;
    $('#tablaDetalleOCModificar tr').each(function () {
        if (cont > 0) {
            if ($(this).find("td").eq(11).html() == "ACTIVO") {
                var cantidad = parseInt($(this).find("td").eq(6).html().replace(/\./g, ''));
                var costoUnitario = parseInt($(this).find("td").eq(7).html().replace(/\./g, ''));
                totalSinDescuento = totalSinDescuento + (cantidad * costoUnitario);
                totalConDescuento = totalConDescuento + parseInt($(this).find("td").eq(10).html().replace(/\./g, ''));
            }

        }
        cont++;
    });

    subTotal = totalSinDescuento;
    totalDescuento = totalSinDescuento - totalConDescuento;
    neto = totalConDescuento;
    totalIVA = Math.round(neto * 0.19);
    totalGeneral = neto + totalIVA;
    $('#subTotalModificar').val(number_format(subTotal, 0));
    $('#descuentoTotalModificar').val(number_format(totalDescuento, 0));
    $('#netoModificar').val(number_format(neto, 0));
    $('#ivaTotalModificar').val(number_format(totalIVA, 0));
    $('#totalGeneralModificar').val(number_format(totalGeneral, 0));
}

// PARTE DE MODIFICAR
function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idOcModificar").val(response[i].idgenerar_oc);
                empresaModificar(response[i].empresa);
                proveedorModificar(response[i].proveedor);
                tipoDocProvModificar(response[i].doc_proveedor);
                plazoPagoModificar(response[i].plazo_oc);
                formaPagoModificar(response[i].pago_oc);
                preapruebaModificar(response[i].pre_aprueba);
                preaprueba2Modificar(response[i].pre_aprueba2);

                $("#nuevotipoOCModificar").val(response[i].tipo_oc);
                $("#nuevoNumDocProveedorModificar").val(response[i].num_doc_proveedor);
                $("#nuevoPlazoEntregaModificar").val(response[i].plazo_entrega);
                $("#nuevoTipoDocCompraModificar").val(response[i].tipo_documento_compra);

                $("#subTotalModificar").val(number_format(response[i].sub_total,0));
                $("#descuentoTotalModificar").val(number_format(response[i].descuento_total,0));
                $("#exentoModificar").val(number_format(response[i].exento_total,0));
                $("#netoModificar").val(number_format(response[i].neto_total,0));
                $("#ivaTotalModificar").val(number_format(response[i].iva_total,0));
                $("#retencionModificar").val(number_format(response[i].retencion_total,0));
                $("#totalGeneralModificar").val(number_format(response[i].total_general,0));
                detalleProductosModificarOcEditar(response[i].idgenerar_oc);
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

function empresaModificar(id) {
    $('#nuevaEmpresaModificar').empty();
    $('#nuevaEmpresaModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevaEmpresaModificar').append(listaEmpresa);
            $("#nuevaEmpresaModificar option[value='"+ id +"']").attr("selected",true);
        }
    });
}

function proveedorModificar(id) {
    $('#nuevoProveedorModificar').empty().append('<option value="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/proveedor/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevoProveedorModificar').append(opciones);
            $("#nuevoProveedorModificar").val(id);
        }
    });
}

function tipoDocProvModificar(id) {
    $('#nuevotipoDocProvModificar').empty().append('<option value="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/docProveedor/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevotipoDocProvModificar').append(opciones);
            $("#nuevotipoDocProvModificar").val(id);
        }
    });
}

function plazoPagoModificar(id) {
    $('#nuevoPlazoPagoModificar').empty().append('<option value="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/plazoOC/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevoPlazoPagoModificar').append(opciones);
            $("#nuevoPlazoPagoModificar").val(id);
        }
    });
}

function formaPagoModificar(id) {
    $('#nuevaFormaPagoModificar').empty().append('<option value="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/pagoOC/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevaFormaPagoModificar').append(opciones);
            $("#nuevaFormaPagoModificar").val(id);
        }
    });
}

function preapruebaModificar(id) {
    $('#preapruebaModificar').empty().append('<option value="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preapruebaModificar').append(opciones);
            $("#preapruebaModificar").val(id);
        }
    });
}

function preaprueba2Modificar(id) {
    $('#preaprueba2Modificar').empty().append('<option value="-">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            var opciones = "";
            for (var i in response) {
                opciones += '<option value="' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preaprueba2Modificar').append(opciones);
            $("#preaprueba2Modificar").val(id);
        }
    });
}

function detalleProductosModificarOcEditar(id) {
    var fila = "";
    $("#tablaDetalleOCModificar tbody").empty();
    var params = {
        "id": id
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funDatosDetalleOc.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {   
                        fila += '<tr id="filaDetalleParaModificar_'+response[i].detalle_sms+'">';
                        fila += '<td>' + response[i].sms + '</td>';
                        fila += '<td>' + response[i].nro_item + '</td>';
                        fila += '<td>' + response[i].aplicacion + '</td>';
                        fila += '<td>' + response[i].tipo_producto + '</td>';
                        fila += '<td>' + response[i].glosa + '</td>';
                        fila += '<td>' + response[i].unidad_de_medida + '</td>';
                        fila += '<td>' + response[i].cantidad + '</td>';
                        fila += '<td>' + number_format(response[i].costo_unitario,0) + '</td>';
                        fila += '<td>' + response[i].tipo_descuento + '</td>';
                        fila += '<td>' + number_format(response[i].valor_descuento,0) + '</td>';
                        fila += '<td>' + number_format(response[i].sub_total,0)  + '</td>';
                        fila += '<td>' + response[i].estado  + '</td>';
                        fila += '<td style="display: none;">' + response[i].detalle_sms + '</td>';
                        fila += '<td>';
                            fila += '<center>';
                                fila += '<div class="btn-group">';
                                    fila += '<button type="button" title="Editar Registro" class="btn btn-warning btnEditarRegistrosModificar" id="' + response[i].detalle_sms + '" data-toggle="modal" data-target="#modalEditarRegistroModificar"><i class="fa fa-pencil"></i></button>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
            }

            $('#tablaDetalleOCModificar tbody').append(fila);

            $('.btnEditarRegistrosModificar').click(function () {
                var idDetalle = this.id;
                $("#montoDescuentoEditarParaModificacion").val('');
                $('#montoDescuentoEditarParaModificacion').attr('disabled', true);        
                $('#tipoDescuentoEditarParaModificacion option:first').prop('selected', true);
                $('#estadoEditarParaModificacion option:first').prop('selected', true);
                $("#glosaEditaParaModificacionr").val('');
                $("#costoUnitarioEditarParaModificacion").val('');
                $("#idDetalleRegistroEditarParaModificacion").val('');
                $("#cantidadRegistroEditarParaModificacion").val('');
                //-----------------------------------------------
                $("#idDetalleRegistroEditarParaModificacion").val(idDetalle); 
                $("#cantidadRegistroEditarParaModificacion").val($("#filaDetalleParaModificar_"+idDetalle).find("td").eq(6).html()); 
                $("#costoUnitarioEditarParaModificacion").val( number_format($("#filaDetalleParaModificar_"+idDetalle).find("td").eq(7).html().replace(/\./g,''),0) ); 
                $("#montoDescuentoEditarParaModificacion").val( number_format( $("#filaDetalleParaModificar_"+idDetalle).find("td").eq(9).html().replace(/\./g,''),0 ) ); 
                $("#glosaEditarParaModificacion").val( $("#filaDetalleParaModificar_"+idDetalle).find("td").eq(2).html() ); 

                let tipoDescuento = $("#filaDetalleParaModificar_" + idDetalle).find("td").eq(8).text();
                $("#tipoDescuentoEditarParaModificacion").val(tipoDescuento).trigger("change");  

                let estado = $("#filaDetalleParaModificar_" + idDetalle).find("td").eq(11).text();
                $("#estadoEditarParaModificacion").val(estado).trigger("change");      

            });

        }
    });

}


// Adicionales

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