$(document).ready(function () {
    cargarDatosTabla();
    cargarFichaContrato();

    //carga la empresa
    empresaAgregar();

});

function cargarDatosTabla() {
    $("#listaSolicitud tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<tr><td>' + (parseInt(i) + 1) + '</td>' +

                    '<td>' +
                    '<center>' +
                    '<div class="btn-group" style ="align-items: center; justify-content: center; display:flex;">' +
                    '<button title="Ver mas" class="btn btn-info btnverMas" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalVermas"><i class="fa fa-eye"></i></button>' +

                    '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>' +

                    '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].idcontratacion + '"><i class="fa fa-times"></i></button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +
                    '<td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].rut + '</td>' +
                    '<td>' + response[i].fecha_solicitud + '</td>' +
                    '<td>' + response[i].solicitante + '</td>' +
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].cantidad_contratada + '</td>' +
                    '<td>' +
                    '<button title="Seleccionar" class="btn btn-danger btnSeleccionar" id="' + Seleccionar + '"><i class="fa fa-times"></i></button>' +
                    '</center>' +
                    '</td>' +
                    '<td>' + response[i].seleccionar + '</td>' + on
                '<td>' + response[i].impresion + '</td>' //debe ser un boton
                    +
                    '</tr>';
            }
            $('#listaSolicitud').append(fila);

            /*$('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnverMas').click(function () {
                obtenerDatosParaVerMas(this.id);
            });*/


            /*$('.btnEliminar').click(function () {
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
                }).then(function (result) {
                    if (result.value) {
                        eliminarDatos(id_registro);
                    }
                });
            });*/

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

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

function cargarFichaContrato() {
    $("#fichaContrato tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<tr><td>' + (parseInt(i) + 1) + '</td>' +

                    '<td>' +
                    '<center>' +
                    '<div class="btn-group" style ="align-items: center; justify-content: center; display:flex;">' +
                    '<button title="Ver mas" class="btn btn-info btnverMas" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalVermas"><i class="fa fa-eye"></i></button>' +

                    '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>' +

                    '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].idcontratacion + '"><i class="fa fa-times"></i></button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' + 
                    '<td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].rut + '</td>' +
                    '<td>' + response[i].fecha_solicitud + '</td>' +
                    '<td>' + response[i].solicitante + '</td>' +
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].cantidad_contratada + '</td>' +
                    '<td>' +
                    '<button title="Seleccionar" class="btn btn-danger btnSeleccionar" id="' + Seleccionar + '"><i class="fa fa-times"></i></button>' +
                    '</center>' +
                    '</td>' +
                    '<td>' + response[i].seleccionar + '</td>' + 
                '<td>' + response[i].impresion + '</td>' //debe ser un boton
                    +
                    '</tr>';
            }
            $('#fichaContrato').append(fila);

            /*$('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnverMas').click(function () {
                obtenerDatosParaVerMas(this.id);
            });*/


            /*$('.btnEliminar').click(function () {
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
                }).then(function (result) {
                    if (result.value) {
                        eliminarDatos(id_registro);
                    }
                });
            });*/

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}