$(document).ready(function () {

    cargarDatosTabla();
    
    categoria();
    Subcategoria();
    unidadMedida();

    $('#btnGuardar').click(function () {
        agregarDatos();
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

    $.ajax({
        url: "../api_adm_nortrans/maestroProducto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length === 0) {
                fila = '<tr><td colspan="3" class="text-center">No hay datos disponibles</td></tr>';
            } else {
                for (var i in response) {
                    fila += '<tr>';
                    fila += '<td>' + (parseInt(i) + 1) + '</td>';
                    fila += '<td>' + response[i].tipo_producto + '</td>';
                    fila += '<td>' + response[i].categoria + '</td>';
                    fila += '<td>' + response[i].sub_categoria + '</td>';
                    fila += '<td>' + response[i].idproducto + '</td>';
                    fila += '<td>' + response[i].descripcion + '</td>';
                    fila += '<td>' + response[i].unidad_de_medida + '</td>';
                    fila += '<td>' + response[i].unidad_medida + '</td>';
                    fila += '<td>' + response[i].estado + '</td>';
                    fila += '<td>';
                    fila += '<center>';
                    fila += '<div class="btn-group">';
                    fila += '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>';
                    fila += ' ';
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

            $('.btnEliminar').click(function () {
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
                }).then(function (result) {
                    if (result.value) {
                        eliminarDatos(id_registro);
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


function agregarDatos() {
    var params = {
        "categoria": $("#categoriaAgregar").val(),
        "sub_categoria": $("#subCategoriaAgregar").val(),
        "unidad_de_medida": $("#unidadMedidaAgregar").val(),
        "descripcion": $("#descripcionAgregar").val(),
        "stock_minimo": $("#stokMinimoAgregar").val(),
        "tipo_producto": $("#tipoProductoAgregar").val(),
        "unidad_medida": $("#porUnidadAgregar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/maestroProducto/funAgregar.php",
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
                    title: "El registro que quiere cargar ya existe en la base de datos",
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
        url: "../api_adm_nortrans/maestroProducto/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {

                comunaMod(response[i].comuna);
                condicionDePagoMod(response[i].condicion_de_pago);
                tipoProveedorMod(response[i].tipo_de_proveedor);
                criticidadMod(response[i].criticidad);

                $("#descripcionModificar").val(response[i].descripcion);
                $("#rutModificar").val(response[i].rut);
                $("#telefonoModificar").val(response[i].telefono_contacto);
                $("#correoModificar").val(response[i].correo_contacto);
                $("#direccionModificar").val(response[i].direccion);
                $("#idModificar").val(response[i].id);
            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos oslicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function modificarDatos() {
    var params = {
        "comuna": $("#comunaModificar").val(),
        "condicion_de_pago": $("#condiciondepagoModificar").val(),
        "tipo_de_proveedor": $("#tipoProveedorModificar").val(),
        "descripcion": $("#descripcionModificar").val(),
        "rut": $("#rutModificar").val(),
        "telefono_contacto": $("#telefonoModificar").val(),
        "correo_contacto": $("#correoModificar").val(),
        "direccion": $("#direccionModificar").val(),
        "criticidad": $("#criticidadModificar").val(),
        "id": $("#idModificar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/maestroProducto/funModificar.php",
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

            if (response['mensaje'] === "repetido") {
                swal({
                    type: "error",
                    title: "El registro que quiere modificar ya existe en otro registro en la base de datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function eliminarDatos(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/maestroProducto/funEliminar.php",
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

/*AREA PARA AGREGAR*/

function categoria() {
    $('#categoriaAgregar').empty();
    $('#categoriaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/categoria/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#categoriaAgregar').append(listaEmpresa);
        }
    });
}

function Subcategoria() {
    $('#subCategoriaAgregar').empty();
    $('#subCategoriaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/subCategoria/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#subCategoriaAgregar').append(listaEmpresa);
        }
    });
}

function unidadMedida() {
    $('#unidadMedidaAgregar').empty();
    $('#unidadMedidaAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/unidadMedida/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#unidadMedidaAgregar').append(listaEmpresa);
        }
    });
}

/*AREA PARA Modificar*/
function comunaMod() {
    $('#comunaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/comuna/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#comunaModificar').append(fila);
            $("#comunaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function condicionDePagoMod() {
    $('#condiciondepagoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/condiciondepago/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#condiciondepagoModificar').append(fila);
            $("#condiciondepagoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function tipoProveedorMod() {
    $('#tipoProveedorModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/tipoProveedor/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoProveedorModificar').append(fila);
            $("#tipoProveedorModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}
