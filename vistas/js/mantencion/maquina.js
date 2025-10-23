$(document).ready(function () {

    cargarDatosTabla();
    centroDeCostoAgregar();
    tipoMaquinaAgregar();

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
        url: "../api_adm_nortrans/maquina/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<tr><td>' + (parseInt(i) + 1) + '</td><td>' + response[i].descripcion + '</td>' +
                    '<td>' +
                    '<center>' +
                    '<div class="btn-group">' +
                    '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>' +

                    '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].id + '"><i class="fa fa-times"></i></button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +

                    +'</tr>';
            }
            $('#tabla').append(fila);

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
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function agregarDatos() {
    var centroCosto = $("#centroCostoAgregar").val();
    var tipoMaquina = $("#tipoMaquinaAgregar").val();
    var descripcion = $("#descripcionAgregar").val();
    var kmNuevo = $("#kmNuevoAgregar").val();
    var fechaKm = $("#fechaKmAgregar").val();

    if (!centroCosto || !tipoMaquina || !descripcion || !kmNuevo || !fechaKm) {
        swal({
            type: "error",
            title: "Debe completar todos los campos obligatorios",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    var params = {
        "centro_de_costo": centroCosto,
        "tipo_bus": tipoMaquina,
        "descripcion": descripcion,
        "km_actual": kmNuevo,
        "fecha_km": fechaKm
    };

    $.ajax({
        url: "../api_adm_nortrans/maquina/funAgregar.php",
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
                    title: "Registro cargado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            } else if (response['mensaje'] === "registro_existente") {
                swal({
                    type: "error",
                    title: "El registro ya existe en la base de datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            } else {
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


function obtenerDatosParaModificar(idmaquina) {
    var params = { "idmaquina": idmaquina };

    centroDeCostoModificar();
    tipoMaquinaModificar();

    $.ajax({
        url: "../api_adm_nortrans/maquina/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.length > 0) {
                var item = response[0];
                $("#idModificar").val(item.idmaquina);
                $("#descripcionModificar").val(item.descripcion);
                $("#kmModificar").val(item.km_actual);
                $("#fechaKmModificar").val(item.fecha_km);

                setTimeout(() => {
                    $("#centroCostoModificar").val(item.centro_de_costo);
                    $("#tipoMaquinaModificar").val(item.tipo_bus);
                }, 200);
            }
        },
        error: function () {
            swal({
                type: "error",
                title: "Error al cargar los datos para modificar",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });
}

function modificarDatos() {
    var params = {
        "idmaquina": $("#idModificar").val(),
        "centro_de_costo": $("#centroCostoModificar").val(),
        "tipo_bus": $("#tipoMaquinaModificar").val(),
        "descripcion": $("#descripcionModificar").val(),
        "km_actual": $("#kmModificar").val(),
        "fecha_km": $("#fechaKmModificar").val()
    };

    $.ajax({
        url: "../api_adm_nortrans/maquina/funModificar.php",
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
                    title: "Registro modificado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else {
                swal({
                    type: "error",
                    title: "Error al modificar el registro",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        },
        error: function () {
            swal({
                type: "error",
                title: "Error de conexión al modificar el registro",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });
}


function eliminarDatos(valor) {
    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/maquina/funEliminar.php",
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

// ================================ //
// =========  SELECT  ============= //
// ================================ //
function centroDeCostoAgregar() {
    $('#centroCostoAgregar').empty().append('<option value ="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#centroCostoAgregar').append(lista);
        }
    });
}

function tipoMaquinaAgregar() {
    $('#tipoMaquinaAgregar').empty().append('<option value ="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (var i in response) {
                lista += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#tipoMaquinaAgregar').append(lista);
        }
    });
}

// ================================ //
// =========MODIFICAR ============= //
// ================================ //
function centroDeCostoModificar() {
    $('#centroCostoModificar').empty().append('<option value="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (let i in response) {
                lista += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#centroCostoModificar').append(lista);
        }
    });
}

function tipoMaquinaModificar() {
    $('#tipoMaquinaModificar').empty().append('<option value="">Seleccionar...</option>');
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let lista = "";
            for (let i in response) {
                lista += `<option value="${response[i].id}">${response[i].descripcion}</option>`;
            }
            $('#tipoMaquinaModificar').append(lista);
        }
    });
}
