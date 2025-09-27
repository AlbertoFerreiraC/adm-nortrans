$(document).ready(function () {

    cargarDatosTabla();

    $("#formularioAgregarOC").on("submit", function (e) {
        e.preventDefault();
        agregarDatos();
    });

    $('#btnModificar').click(function () {
        modificarDatos();
    });

    $('#btnNuevo').click(function () {
        empresaAgregar();
        proveedorAgregar();
        tipoOCAgregar();
        tipoDocProvAgregar();
        plazoPagoAgregar();
        formaPagoAgregar();
        PreapruebaAgregar();
    });

    $("#filtradoDinamico").on("keyup", function () {
        const texto = this.value.toLowerCase();
        const rows = $("#tablaOrdenesCompra tbody tr");
        rows.each(function () {
            const ok = $(this).text().toLowerCase().indexOf(texto) !== -1;
            $(this).toggle(ok);
        });
    });
});


function cargarDatosTabla() {
    $("#tablaOrdenesCompra tbody").empty();

    $.ajax({
        url: "../api_adm_nortrans/generarOC/funListar.php",
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
                        <td>${item.proveedor}</td>
                        <td>${item.fecha_creacion}</td>
                        <td>${item.total_general}</td>
                        <td>${item.estado}</td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button title="Modificar" 
                                            class="btn btn-warning btnModificar" 
                                            id="${item.id}" 
                                            data-toggle="modal" 
                                            data-target="#modalModificarOC">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    
                                    <button title="Eliminar" 
                                            class="btn btn-danger btnEliminar" 
                                            id="${item.id}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </center>
                        </td>
                    </tr>`;
            });

            $("#tablaOrdenesCompra").append(filas);

            $(".btnModificar").click(function () {
                obtenerDatosParaModificar(this.id);
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
    var params = {
        "empresa": $("#nuevaEmpresa").val(),
        "proveedor": $("#nuevoProveedor").val(),
        "solicitud_ms": $("#nuevotipoOC").val(),
        "doc_proveedor": $("#nuevotipoDocProv").val(),
        "num_doc_proveedor": $("#nuevoNumDocProveedor").val(),
        "plazo_oc": $("#nuevoPlazoPago").val(),
        "pago_oc": $("#nuevaFormaPago").val(),
        "plazo_entrega": $("#nuevoPlazoEntrega").val(),
        "tipo_doc_compra": $("#nuevoTipoDocCompra").val(),
        "pre_aprueba": $("#preapruebaAgregar").val(),
        "nro_oc": $("#nuevaSolicitudMI").val(),
        "fecha_creacion": new Date().toISOString().slice(0, 19).replace('T', ' ')
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funAgregar.php",
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
        url: "../api_adm_nortrans/generarOC/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#descripcionModificar").val(response[i].descripcion);
                $("#idModificar").val(response[i].id);
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

function modificarDatos() {
    var params = {
        "descripcion": $("#descripcionModificar").val(),
        "id": $("#idModificar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/generarOC/funModificar.php",
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

function tipoOCAgregar() {
    $('#nuevotipoOC').empty();
    $('#nuevotipoOC').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/solicitudMS/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#nuevotipoOC').append(listaEmpresa);
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
        }
    });
}