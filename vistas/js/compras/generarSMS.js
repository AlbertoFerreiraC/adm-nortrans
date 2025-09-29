$(document).ready(function () {

     $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^.0-9]/g, '');
    });

    cargarDatosTabla();

    $('#btnNuevoSMS').click(function () {
        empresaAgregar();
        maquinaAgregar();
        preApruebaAgregar();
        bodegaAgregar();
        cargaCentroDeCostoAgregar();
    });

    $('#btnAgregarItemSMS').click(function () {
        if( $("#idProducto").val() != "" ){
            if( $("#cantidadAgregar").val() != "" && $("#cantidadAgregar").val() != "0" ){
                if( $("#centroCostoAgregar").val() != "-"){
                    agregarItem();
                }else{
                    mensajeError("Centro de Costo inválido.");
                }    
            }else{
                mensajeError("Cantidad inválida.");
            }
        }else{
            mensajeError("No ha seleccionado ningún producto, servicio, insumo, etc.");
        }
    });  
    
    $('#btnAgregarItemSMSModificar').click(function () {
        if( $("#idProductoModificar").val() != "" ){
            if( $("#cantidadModificar").val() != "" && $("#cantidadModificar").val() != "0" ){
                if( $("#centroCostoModificar").val() != "-"){
                    agregarItemModificar($("#idSmsModificar").val(),
                                         $("#idProductoModificar").val(),
                                         $("#tipoProductoModificar").val(),
                                         $("#unidadMedidaModificar").val(),
                                         $("#centroCostoModificar").val(),
                                         $("#cantidadModificar").val(),
                                         $("#aplicacionModificar").val());
                }else{
                    mensajeError("Centro de Costo inválido.");
                }    
            }else{
                mensajeError("Cantidad inválida.");
            }
        }else{
            mensajeError("No ha seleccionado ningún producto, servicio, insumo, etc.");
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

    $('#tipoProductoAgrega').change(function () {
        if($("#tipoProductoAgrega").val() == "Repuesto"){
            $("#tituloRepuesto").html($("#tipoProductoAgrega").val());
            listarRepuestos();
                $("#idProducto").val("");
                $("#cantidadXumAgregar").val("");
                $("#unidadMedidaAgregar").val("");
                $("#stockBodegaAgregar").val("");
                $("#cantidadAgregar").val("");
                $("#aplicacionAgregar").val("");
                cargaCentroDeCostoAgregar();
        }

        if($("#tipoProductoAgrega").val() == "Servicios"){
            $("#tituloRepuesto").html($("#tipoProductoAgrega").val());
            listarServicios();
                $("#idProducto").val("");
                $("#cantidadXumAgregar").val("");
                $("#unidadMedidaAgregar").val("");
                $("#stockBodegaAgregar").val("");
                $("#cantidadAgregar").val("");
                $("#aplicacionAgregar").val("");
                cargaCentroDeCostoAgregar();
        }

        if($("#tipoProductoAgrega").val() == "Insumos"){
            $("#tituloRepuesto").html($("#tipoProductoAgrega").val());
            listarInsumos();
                $("#idProducto").val("");
                $("#cantidadXumAgregar").val("");
                $("#unidadMedidaAgregar").val("");
                $("#stockBodegaAgregar").val("");
                $("#cantidadAgregar").val("");
                $("#aplicacionAgregar").val("");
                cargaCentroDeCostoAgregar();
        }

        if($("#tipoProductoAgrega").val() == "EPP"){
            $("#tituloRepuesto").html($("#tipoProductoAgrega").val());
            listarEpp();
                $("#idProducto").val("");
                $("#cantidadXumAgregar").val("");
                $("#unidadMedidaAgregar").val("");
                $("#stockBodegaAgregar").val("");
                $("#cantidadAgregar").val("");
                $("#aplicacionAgregar").val("");
                cargaCentroDeCostoAgregar();
        }
    });

    $('#productoAgregar').change(function () {
        obtenerDatosEspecifico($("#tipoProductoAgrega").val(), $("#productoAgregar").val());
    });

    $('#btnGenerarSMS').click(function () {
        if( $("#bodegaAgregar").val() != "-" ){
            if( $("#empresaAgregar").val() != "-"){
                if( $("#tipoSolicitudAgregar").val() != "-"){
                    if( $("#preapruebaSMS").val() != "-"){
                        if( contadorDeFilas() > 0){
                            agregarDatos();
                        }else{
                            mensajeError("No ha asignado ningún item a la solicitud.");
                        }
                    }else{
                        mensajeError("Debe seleccionar a un responsable para la pre aprobación");
                    } 
                }else{
                    mensajeError("Debe seleccionar un tipo de solicitud válido");
                }    
            }else{
                mensajeError("Debe seleccionar una empresa válida.");
            }
        }else{
            mensajeError("Debe seleccionar una bodega válida.");
        }
    }); 

    $('#btnModificarSMS').click(function () {
        if( $("#bodegaModificar").val() != "-" ){
            if( $("#empresaModificar").val() != "-"){
                if( $("#tipoSolicitudModificar").val() != "-"){
                    if( $("#preapruebaSMSModificar").val() != "-"){
                        actualizarDatosCabecera($("#idSmsModificar").val(),
                                                $("#bodegaModificar").val(),
                                                $("#empresaModificar").val(),
                                                $("#tipoSolicitudModificar").val(),
                                                $("#maquinaModificar").val(),
                                                $("#preapruebaSMSModificar").val(),
                                                $("#observacionModificar").val() );
                    }else{
                        mensajeError("Debe seleccionar a un responsable para la pre aprobación");
                    } 
                }else{
                    mensajeError("Debe seleccionar un tipo de solicitud válido");
                }    
            }else{
                mensajeError("Debe seleccionar una empresa válida.");
            }
        }else{
            mensajeError("Debe seleccionar una bodega válida.");
        }
    });

    $('#tipoProductoModificar').change(function () {
        if($("#tipoProductoModificar").val() == "Repuesto"){
            $("#tituloRepuestoModificar").html($("#tipoProductoModificar").val());
            listarRepuestosModificar();
                $("#idProductoModificar").val("");
                $("#cantidadXumModificar").val("");
                $("#unidadMedidaModificar").val("");
                $("#stockBodegaModificar").val("");
                $("#cantidadModificar").val("");
                $("#aplicacionModificar").val("");
                cargaCentroDeCostoModificar();
        }

        if($("#tipoProductoModificar").val() == "Servicios"){
            $("#tituloRepuestoModificar").html($("#tipoProductoModificar").val());
            listarServiciosModificar();
                $("#idProductoModificar").val("");
                $("#cantidadXumModificar").val("");
                $("#unidadMedidaModificar").val("");
                $("#stockBodegaModificar").val("");
                $("#cantidadModificar").val("");
                $("#aplicacionModificar").val("");
                cargaCentroDeCostoModificar();
        }

        if($("#tipoProductoModificar").val() == "Insumos"){
            $("#tituloRepuestoModificar").html($("#tipoProductoModificar").val());
            listarInsumosModificar();
                $("#idProductoModificar").val("");
                $("#cantidadXumModificar").val("");
                $("#unidadMedidaModificar").val("");
                $("#stockBodegaModificar").val("");
                $("#cantidadModificar").val("");
                $("#aplicacionModificar").val("");
                cargaCentroDeCostoModificar();
        }

        if($("#tipoProductoModificar").val() == "EPP"){
            $("#tituloRepuestoModificar").html($("#tipoProductoModificar").val());
            listarEppModificar();
                $("#idProductoModificar").val("");
                $("#cantidadXumModificar").val("");
                $("#unidadMedidaModificar").val("");
                $("#stockBodegaModificar").val("");
                $("#cantidadModificar").val("");
                $("#aplicacionModificar").val("");
                cargaCentroDeCostoModificar();
        }
    });

    $('#productoModificar').change(function () {
        obtenerDatosEspecificoModificar($("#tipoProductoModificar").val(), $("#productoModificar").val());
    });

});


function cargarDatosTabla() {
    $("#tablaSMS tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funListarSolicitudesActivas.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (response) {
            let filas = "";
            $.each(response, function (i, item) {
                filas += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.empresa}</td>
                        <td>${item.bodega}</td>
                        <td>${item.tipo}</td>
                        <td>${item.preAprueba}</td>
                        <td>${item.fecha}</td>
                        <td>${item.observacion}</td>
                        <td>${item.realizadoPor}</td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button title="Modificar" 
                                            type="button" 
                                            class="btn btn-warning btnModificar" 
                                            id="${item.id}" 
                                            data-toggle="modal" 
                                            data-target="#modalModificarSMS">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </center>
                        </td>
                    </tr>`;
            });

            $("#tablaSMS").append(filas);

            $(".btnModificar").click(function () {
                obtenerDatosSMS(this.id);
            });
        }
    });
}

/*PARTE DE AGREGAR*/
function empresaAgregar() {
    $('#empresaAgregar').empty();
    $('#empresaAgregar').append('<option value ="-">Seleccionar...</opction>');
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
            $('#empresaAgregar').append(listaEmpresa);
        }
    });
}

function empresaModificar(id){
    $('#empresaModificar').empty();
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';               
            }
            $('#empresaModificar').append(listaEmpresa);
            $("#empresaModificar option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function maquinaAgregar() {
    $('#maquinaAgregar').empty();
    $('#maquinaAgregar').append('<option value ="null">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/deMaquina/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].idmaquina + '">' +"Nro. Interno: "+ response[i].numero_interno_maquina+" / patente: "+response[i].patente + '</option>';
            }
            $('#maquinaAgregar').append(listaEmpresa);
        }
    });
}

function maquinaModificar(id){
    $('#maquinaModificar').empty();
    if(id == null){
        $('#maquinaModificar').append('<option value ="null">Seleccionar...</opction>');
    }    
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/deMaquina/funListar.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "' + response[i].idmaquina + '">' +"Nro. Interno: "+ response[i].numero_interno_maquina+" / patente: "+response[i].patente + '</option>';              
            }
            $('#maquinaModificar').append(listaEmpresa);
            $("#maquinaModificar option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function preApruebaAgregar(){
    $('#preapruebaSMS').empty();
    $('#preapruebaSMS').append('<option value ="-">Seleccionar...</opction>');
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
            $('#preapruebaSMS').append(listaEmpresa);
        }        
    });
}

function preApruebaModificar(id){
    $('#preapruebaSMSModificar').empty();
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
            $('#preapruebaSMSModificar').append(listaEmpresa);
            $("#preapruebaSMSModificar option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function bodegaAgregar(){
    $('#bodegaAgregar').empty();
    $('#bodegaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarBodegas.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#bodegaAgregar').append(listaEmpresa);
        }        
    });
}

function bodegaModificar(id){
    $('#bodegaModificar').empty();
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarBodegas.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#bodegaModificar').append(listaEmpresa);
            $("#bodegaModificar option[value='"+ id +"']").attr("selected",true);
        }        
    });
}

function cargaCentroDeCostoAgregar(){
    $('#centroCostoAgregar').empty();
    $('#centroCostoAgregar').append('<option value ="-">Seleccionar...</opction>');
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
            $('#centroCostoAgregar').append(listaEmpresa);
        }        
    });
}

function cargaCentroDeCostoModificar(){
    $('#centroCostoModificar').empty();
    $('#centroCostoModificar').append('<option value ="-">Seleccionar...</opction>');
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
            $('#centroCostoModificar').append(listaEmpresa);
        }        
    });
}

function listarServicios(){
    $('#productoAgregar').empty();
    $('#productoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarServicios.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoAgregar').append(listaEmpresa);
        }        
    });
}

function listarServiciosModificar(){
    $('#productoModificar').empty();
    $('#productoModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarServicios.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoModificar').append(listaEmpresa);
        }        
    });
}

function listarEpp(){
    $('#productoAgregar').empty();
    $('#productoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarEpp.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoAgregar').append(listaEmpresa);
        }        
    });
}

function listarEppModificar(){
    $('#productoModificar').empty();
    $('#productoModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarEpp.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoModificar').append(listaEmpresa);
        }        
    });
}

function listarInsumos(){
    $('#productoAgregar').empty();
    $('#productoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarInsumos.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoAgregar').append(listaEmpresa);
        }        
    });
}

function listarInsumosModificar(){
    $('#productoModificar').empty();
    $('#productoModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarInsumos.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoModificar').append(listaEmpresa);
        }        
    });
}

function listarRepuestos(){
    $('#productoAgregar').empty();
    $('#productoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarRepuestos.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoAgregar').append(listaEmpresa);
        }        
    });
}

function listarRepuestosModificar(){
    $('#productoModificar').empty();
    $('#productoModificar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url:"../api_adm_nortrans/gestionarSms/funListarRepuestos.php",
        method:"GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
           for (var i in response){        
            listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion.toUpperCase()+'</option>';                
            }
            $('#productoModificar').append(listaEmpresa);
        }        
    });
}

function obtenerDatosEspecifico(tipo,valor) {
    var params = {
        "tipo": tipo,
        "valor": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funDatosEspecificos.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idProducto").val(response[i].id);
                $("#cantidadXumAgregar").val(response[i].cantidad_por_unidad);
                $("#unidadMedidaAgregar").val(response[i].unidad_de_medida);
                $("#stockBodegaAgregar").val(response[i].cantidad_en_bodega);
                $("#cantidadAgregar").val("");
                $("#aplicacionAgregar").val("");
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

function obtenerDatosEspecificoModificar(tipo,valor) {
    var params = {
        "tipo": tipo,
        "valor": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funDatosEspecificos.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idProductoModificar").val(response[i].id);
                $("#cantidadXumModificar").val(response[i].cantidad_por_unidad);
                $("#unidadMedidaModificar").val(response[i].unidad_de_medida);
                $("#stockBodegaModificar").val(response[i].cantidad_en_bodega);
                $("#cantidadModificar").val("");
                $("#aplicacionModificar").val("");                
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

function detalleProductosModificar(id) {
    var fila = "";
    $("#tablaDetalleSMSModificar tbody").empty();
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
            for (var i in response) {
                var descripcion = "";
                if(response[i].tipo == "Repuesto"){
                    descripcion = response[i].descripcionRepuestos; 
                }else{
                    descripcion = response[i].descripcionInsumos;
                }
                fila += '<tr>';
                        fila += '<td>' + descripcion + '</td>';
                        fila += '<td>' + response[i].tipo + '</td>';
                        fila += '<td>' + response[i].unidad_de_medida + '</td>';
                        fila += '<td>' + response[i].nombreCentrDeCosto + '</td>';
                        fila += '<td style = "width:120px;">'+    
                                    '<div class="input-group input-group-sm">'+
                                        '<input type="text" class="form-control input-sm"  id="cantidad_'+response[i].idDetalle+'" value="'+response[i].cantidad+'" style="text-align: center;">'+
                                        '<div class="input-group-btn" >'+
                                        '<button type="button" id="'+response[i].idDetalle+'" class="btn btn-success btnActualizarCantidad"> <i class="fa fa-refresh" aria-hidden="true" > </i>'+
                                        '</div>'+
                                    '</div>'+ 
                                '</td>';
                        fila += '<td>' + response[i].aplicacion + '</td>';;
                        fila += '<td>';
                            fila += '<center>';
                                fila += '<div class="btn-group">';
                                    fila += '<button type="button" title="Eliminar Registro" class="btn btn-danger btnEliminar" id="' + response[i].idDetalle + '" data-toggle="modal" data-target="#modalVerMas"><i class="fa fa-trash"></i></button>';
                                fila += '</div>';
                            fila += '</center>';
                        fila += '</td>';
                    fila += '</tr>';
            }

            $('#tablaDetalleSMSModificar tbody').append(fila);

            $('.btnEliminar').click(function () {
                var idDetalle = this.id;
                    swal({
                    title: '¿Está seguro de eliminar el producto?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, eliminar producto!'
                    }).then(function(result){
                        if(result.value){
                            eliminarProducto($("#idSmsModificar").val(),idDetalle);
                        }                        
                    });
            });

            $('.btnActualizarCantidad').click(function () {
                var valorCantidad =  $("#cantidad_"+this.id).val();
                var idDetalle = this.id;
                if(valorCantidad != ""){
                    swal({
                    title: '¿Está seguro de actualizar la cantidad?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, actualizar cantidad!'
                    }).then(function(result){
                        if(result.value){
                            actualizarCantidad($("#idSmsModificar").val(),idDetalle,valorCantidad);
                        }                        
                    });
                }else{
                    mensajeError("El valor introducido es inválido");
                }
                //obtenerDatosParaVerMas(this.id);
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

function agregarItem(){
        var fila = "";
        fila = '<tr id ="fila_'+contadorDeFilas()+'">'+
                        '<td>'+ $("#productoAgregar").find(':selected').text() +'</td>'+
                        '<td>'+ $("#tipoProductoAgrega").val() +'</td>'+
                        '<td>'+ $("#unidadMedidaAgregar").val() +'</td>'+
                        '<td>'+ $("#centroCostoAgregar").find(':selected').text() +'</td>'+
                        '<td>'+ $("#cantidadAgregar").val() +'</td>'+
                        '<td>'+ $("#aplicacionAgregar").val() +'</td>'+
                        '<td style="display:none;">'+ $("#idProducto").val() +'</td>'+
                        '<td style="display:none;">'+ $("#centroCostoAgregar").val() +'</td>'+
                        '<td>'+
                            '<button title="Eliminar" type="button" class="btn btn-danger btnEliminar" id="'+contadorDeFilas()+'"><i class="fa fa-times"></i></button>'+                      
                        '</td>'+
                    +'</tr>'; 
        $('#tablaDetalleSMS').append(fila);   
            $("#idProducto").val("");
            $("#cantidadXumAgregar").val("");
            $("#unidadMedidaAgregar").val("");
            $("#stockBodegaAgregar").val("");
            $("#cantidadAgregar").val("");
            $("#aplicacionAgregar").val("");
            cargaCentroDeCostoAgregar();

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
                        $("#fila_"+id_registro).remove();
                    }                        
                }); 
            });        
}

function contadorDeFilas(){
  var cont = 0;
  $('#tablaDetalleSMS tbody tr').each(function(){ 
     cont++;      
 });
  return (cont+1);
}

function agregarDatos() {
    var datos = '{"usuario":"'+$("#idUsuario").val()+
    '","bodega":"'+$("#bodegaAgregar").val()+
    '","empresa":"'+$("#empresaAgregar").val()+
    '", "tipoSolicitud":"'+$("#tipoSolicitudAgregar").val()+
    '", "maquina":"'+$("#maquinaAgregar").val()+
    '", "preAprueba":"'+$("#preapruebaSMS").val()+
    '", "observacion": "'+$("#observacionAgregar").val()+'", ';
    //************************************************************************
    var datos_tabla = '"tabla":[';
      $('#tablaDetalleSMS tbody tr').each(function(){ 
    datos_tabla = datos_tabla + 
    '{"producto":"'+$(this).find("td").eq(6).html()+
    '","tipo":"'+$(this).find("td").eq(1).html()+
    '","unidadDeMedida":"'+$(this).find("td").eq(2).html()+
    '","centroDeCosto":"'+$(this).find("td").eq(7).html()+
    '","cantidad":"'+$(this).find("td").eq(4).html()+
    '","aplicacion":"'+$(this).find("td").eq(5).html()+'"},';
      });
    datos_tabla = datos_tabla.substr(0,datos_tabla.length-1);  
    datos_tabla = datos_tabla + ']';  
    //************************************************************************
    datos = datos + datos_tabla + "}";
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funGenerarSolicitud.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if(response['mensaje'] === "ok"){
                swal({
                    type: "success",
                    title: "Solicitud cargada con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la solicitud.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la solicitud.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function obtenerDatosSMS(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funListaDatosSmsApi.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idSmsModificar").val(response[i].id);
                empresaModificar(response[i].empresa);
                bodegaModificar(response[i].bodega);
                $("#tipoSolicitudModificar option[value="+ response[i].tipo +"]").attr("selected",true);
                maquinaModificar(response[i].maquina);
                preApruebaModificar(response[i].preAprueba);
                $("#observacionModificar").val(response[i].observacion);
                cargaCentroDeCostoModificar();
                detalleProductosModificar(response[i].id);

                //-----------------
                $("#idProductoModificar").val("");
                $("#cantidadXumModificar").val("");
                $("#unidadMedidaModificar").val("");
                $("#stockBodegaModificar").val("");
                $("#cantidadModificar").val("");
                $("#aplicacionModificar").val("");

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

function actualizarCantidad(idSolicitud,idDetalle,cantidad) {
    var params = {
        "idDetalle": idDetalle,
        "cantidad": cantidad
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funActualizarCantidad.php",
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
                    title: "Registro actualizado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    detalleProductosModificar(idSolicitud);
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

function eliminarProducto(idSolicitud,idDetalle) {
    var params = {
        "idDetalle": idDetalle
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funEliminarProducto.php",
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
                    title: "Registro eliminado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    detalleProductosModificar(idSolicitud);
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

function agregarItemModificar(idSms,producto,tipo,unidadDeMedida,centroDeCosto,cantidad,aplicacion) {

    var params = {
        "idSms": idSms,
        "producto": producto,
        "tipo": tipo,
        "unidadDeMedida": unidadDeMedida,
        "centroDeCosto": centroDeCosto,
        "cantidad": cantidad,
        "aplicacion": aplicacion
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funAgregarItem.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if(response['mensaje'] === "ok"){
                swal({
                    type: "success",
                    title: "Item cargado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    detalleProductosModificar(idSms);
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al cargar el item",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar el item",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function actualizarDatosCabecera(id,bodega,empresa,tipoSolicitud,maquina,preAprueba,observacion) {
    var params = {
        "idSolicitud": id,
        "bodega": bodega,
        "empresa": empresa,
        "tipoSolicitud": tipoSolicitud,
        "maquina": maquina,
        "preAprueba": preAprueba,
        "observacion": observacion
    };
    $.ajax({
        url: "../api_adm_nortrans/gestionarSms/funActualizarSolicitud.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if(response['mensaje'] === "ok"){
                swal({
                    type: "success",
                    title: "Solicitud actualizada con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al actualizar la solicitud.",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al actualizar la solicitud.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

//---------------------

function mensajeError(mensaje){
    swal({
      type: "error",
      title: mensaje,
      showConfirmButton: true,
      confirmButtonText: "Aceptar"
    });
}

