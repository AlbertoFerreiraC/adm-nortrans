$(document).ready(function () {
    cargarDatosSolicitudes();

    cargarFichaContrato();

    empresaAgregar();

});

function cargarFichaContrato() {
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
                fila = fila + '<tr><td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].empresa + '</td>' +
                    '<td>' + response[i].fecha_requerida + '</td>' +
                    '<td>' + response[i].usuario + '</td>' +
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].cantidad_contratada + '</td>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Seleccionar" class="btn btn-success btnSeleccionar" id="' + response[i].seleccionar +
                    '" onclick="window.location.href=\'seleccionarFicha' + '\'">' +
                    '<i class="fa fa-check"></i></button>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Imprimir" class="btn btn-info btnImprimir" id="' + response[i].Imprimir + '"><i class="fa fa-print"></i></button>' +

                    '</td>'
                '</tr>';
            }
            $('#listaSolicitud').append(fila);

            /*$('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });*/

            $('.btnImprimir').on('click', '.btnImprimir', function () {
                var id = $(this).data('id');
                funcionImprimir(id);
            });


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

function funcionImprimir(id) {
    var contenido = '';
    var fila = $('button[data-id="' + id + '"]').closest('tr'); e

    fila.find('td').each(function () {
        contenido += $(this).text() + '\n';
    });

    var ventanaImpresion = window.open('', '', 'height=600,width=800');
    ventanaImpresion.document.write('<pre>' + contenido + '</pre>');
    ventanaImpresion.document.close();
    ventanaImpresion.print();
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

function cargarDatosSolicitudes() {
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
                fila = fila + '<tr><td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].empresa + '</td>' +
                    '<td>' + response[i].rut + '</td>' +
                    '<td>' + response[i].usuario + '</td>' +
                    '<td>' + response[i].fecha_inicio_laboral + '</td>' +
                    '<td>' + response[i].tipo_contrato + '</td>' +
                    '<td>' + response[i].turnos_laborales + '</td>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Seleccionar" class="btn btn-success btnSeleccionar" id="' + response[i].seleccionar +
                    '" onclick="window.location.href=\'seleccionarFicha' + '\'">' +
                    '<i class="fa fa-check"></i></button>' +
                    '</td>' +
                    '<td>' +
                    '<button title="Imprimir" class="btn btn-info btnImprimir" id="' + response[i].Imprimir + '"><i class="fa fa-print"></i></button>' +

                    '</td>'
                '</tr>';
            }
            $('#fichaContrato').append(fila);

            /*$('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });*/

            $('.btnImprimir').on('click', '.btnImprimir', function () {
                var id = $(this).data('id');
                funcionImprimir(id);
            });


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