$(document).ready(function () {

    cargarDatosTabla();

    $('#btnNuevo').click(function () {
        cargoAgregar();
        equipoAgregar();
        turnoAgregar();
        empresaAgregar();
    });

    $('#empresaAgregar').change(function () {
        CentroDeCostoAgregar();
    });

    $('#empresaModificar').change(function () {
        CentroDeCostoModificar();
    });



    $('#btnGuardar').click(function () {
        if ($("#motivoAgregar").val() != "" &&
            $("#divisionAgregar").val() != "" &&
            $("#cargoAgregar").val() != "" &&
            $("#razonAgregar").val() != "" &&
            $("#centrocostoAgregar").val() != "-" &&
            $("#cantidadAgregar").val() != "-" &&
            $("#equipoAgregar").val() != "" &&
            $("#licenciaAgregar").val() != "-" &&
            $("#tipoturnoAgregar").val() != "-" &&
            $("#tipocontratoAgregar").val() != "-" &&
            $("#fecharequeridaAgregar").val() != "-" &&
            $("#remuneracionAgregar").val() != "-" &&
            $("#requisitoseleccionAgregar").val() != "-" &&
            $("#observacionAgregar").val() != "-" &&
            $("#comentarioAgregar").val() != "-") {
            agregarDatos();
        } else {
            swal({
                type: "error",
                title: "Favor completar debidamente los campos requeridos.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

    $('#btnModificar').click(function () {
        if ($("#motivoModificar").val() != "" &&
            $("#divisionModificar").val() != "" &&
            $("#cargoModificar").val() != "" &&
            $("#razonModificar").val() != "" &&
            $("#centrocostoModificar").val() != "-" &&
            $("#cantidadModificar").val() != "-" &&
            $("#equipoModificar").val() != "" &&
            $("#licenciaModificar").val() != "-" &&
            $("#tipoturnoModificar").val() != "-" &&
            $("#tipocontratoModificar").val() != "-" &&
            $("#fecharequeridaModificar").val() != "-" &&
            $("#remuneracionModificar").val() != "-" &&
            $("#requisitoseleccionModificar").val() != "-" &&
            $("#observacionModificar").val() != "-" &&
            $("#comentarioModificar").val() != "-") {
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
                    '<button title="Ver mas" class="btn btn-info btnverMas" id="' + response[i].id + '" data-toggle="modal" data-target="#modalVermas"><i class="fa fa-eye"></i></button>' +

                    '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>' +

                    '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].id + '"><i class="fa fa-times"></i></button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +
                    '<td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].fecha_requerida + '</td>' +
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].estado + '</td>'

                    +
                    '</tr>';
            }
            $('#tabla').append(fila);

            $('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.id);
            });

            $('.btnverMas').click(function () {
                obtenerDatosParaVerMas(this.id);
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
    var datos = new FormData();
    datos.append("motivo", $("#motivoAgregar").val());
    datos.append("division", $("#divisionAgregar").val());
    datos.append("cargo", $("#cargoAgregar").val());
    datos.append("empresa", $("#razonAgregar").val());
    datos.append("centroDeCosto", $("#centrocostoAgregar").val());
    datos.append("cantidadSolicitada", $("#cantidadAgregar").val());
    datos.append("tipoBus", $("#equipoAgregar").val());
    datos.append("licenciaDeConducir", $("#licenciaAgregar").val());
    datos.append("turnosLaborales", $("#tipoturnoAgregar").val());
    datos.append("tipoDocumento", $("#tipocontratoAgregar").val());
    datos.append("fechaRequerida", $("#fecharequeridaAgregar").val());
    datos.append("fechaTermino", $("#fechaterminoAgregar").val());
    datos.append("remuneracion", $("#remuneracionAgregar").val());
    datos.append("tipoDocumento", $("#requisitoseleccionAgregar").val());
    datos.append("comentarioGeneral", $("#observacionAgregar").val());
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funAgregar.php",
        method: "POST",
        cache: false,
        data: datos,
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
        "idcontratacion": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idModificar").val(response[i].id);
                divisionModificar(response[i].division);
                cargoModificar(response[i].cargo);
                empresaModificar(response[i].empresa);
                CentroDeCostoModificar(response[i].CentroDeCosto);
                equipoModificar(response[i].tipoBus);
                turnoModificar(response[i].turnos_laborales);
                requisitoseleccionModificar(response[i].requisitoDeSeleccion);
                CentroDeCostoModificarCargaInicial(response[i].centro_de_costo, response[i].empresa);

                $("#motivoModificar").val(response[i].motivo);
                $("#fecharequeridaModificar").val(response[i].fecha_requerida);
                $("#fechaterminoModificar").val(response[i].fecha_termino);
                $('#remuneracionModificar option[value="' + response[i].remuneracion);
                $("#observacionModificar").val(response[i].comentario_general);
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

function obtenerDatosParaVerMas(valor) {

    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/solicitudContrato/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#divisionVer").val(response[i].division);
                divisionVerMas(response[i].division);
                cargoVerMas(response[i].cargo);
                empresaVerMas(response[i].empresa);
                CentroDeCostoVerMas(response[i].CentroDeCosto); //en proceso
                equipoVerMas(response[i].tipoBus); // en proceso
                turnoVerMas(response[i].turnos_laborales);
                requisitoseleccionVerMas(response[i].requisitoDeSeleccion); // en proceso
                CentroDeCostoVerMas(response[i].centro_de_costo, response[i].empresa);

                $("#motivoVer").val(response[i].motivo);
                $("#fecharequeridaVer").val(response[i].fecha_requerida);
                $("#fechaterminoVer").val(response[i].fecha_termino);
                $('#remuneracionVer option[value="' + response[i].remuneracion);
                $("#observacionVer").val(response[i].comentario_general);

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
    var datos = new FormData();
    datos.append("id", $("#idModificar").val());
    datos.append("motivo", $("#motivoModificar").val());
    datos.append("division", $("#divisionModificar").val());
    datos.append("cargo", $("#cargoModificar").val());
    datos.append("empresa", $("#razonModificar").val());
    datos.append("centroDeCosto", $("#centrocostoModificar").val());
    datos.append("cantidadSolicitada", $("#cantidadModificar").val());
    datos.append("tipoBus", $("#equipoModificar").val());
    datos.append("licenciaDeConducir", $("#licenciaModificar").val());
    datos.append("turnosLaborales", $("#tipoturnoModificar").val());
    datos.append("tipoContrato", $("#tipocontratoModificar").val());
    datos.append("fechaRequerida", $("#fecharequeridaModificar").val());
    datos.append("fechaTermino", $("#fechaterminoModificar").val());
    datos.append("remuneracion", $("#remuneracionModificar").val());
    datos.append("tipoDocumento", $("#requisitoseleccionModificar").val());
    datos.append("comentarioGeneral", $("#observacionModificar").val());;
    $.ajax({
        url: "../api_adm_nortrans/solicitudContrato/funModificar.php",
        method: "POST",
        cache: false,
        data: datos,
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
        url: "../api_adm_nortrans/solicitudContrato/funEliminar.php",
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


// INCIO CARGA SELECT "AGREGAR"
function cargoAgregar() {
    $('#cargoAgregar').empty();
    $('#cargoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#cargoAgregar').append(listaEmpresa);
        }
    });
}

function equipoAgregar(id) {
    $('#equipoAgregar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#equipoModificar').append(fila);
            $("#equipoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoAgregar() {
    $('#turnoAgregar').empty();
    $('#turnoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#turnoAgregar').append(listaEmpresa);
        }
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

function CentroDeCostoAgregar() {
    $('#centroAgregar').empty();
    var params = {
        "empresa": $("#empresaAgregar").val()
    };
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroAgregar').append(listaEmpresa);
        }
    });
}
// FIN CARGA SELECT "AGREGAR"


// INCIO CARGA SELECT "MODIFICAR"
function cargoModificar(id) {
    $('#cargoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#cargoModificar').append(fila);
            $("#cargoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function equipoModificar(id) {
    $('#equipoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#equipoModificar').append(fila);
            $("#equipoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoModificar(id) {
    $('#turnoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#turnoModificar').append(fila);
            $("#turnoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function empresaModificar(id) {
    $('#empresaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#empresaModificar').append(fila);
            $("#empresaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function centroCostoModificar(id) {
    $('#centroCostoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroCostoModificar').append(fila);
            $("#centroCostoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function CentroDeCostoModificarCargaInicial(id, empresa) {
    // alert(id);
    $('#centroModificar').empty();
    var params = {
        "empresa": empresa
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroModificar').append(fila);
            $("#centroModificar option[value='" + id + "']").attr("selected", true);
        }
    });

}

function CentroDeCostoModificar() {
    // alert(id);
    $('#centroModificar').empty();
    var params = {
        "empresa": $("#empresaModificar").val()
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroModificar').append(fila);
            //  $("#centroModificar option[value='"+ id +"']").attr("selected",true);
        }
    });

}

// FIN CARGA SELECT "MODIFICAR"


// INCIO CARGA SELECT "VER"
function cargoVerMas(id) {
    $('#cargoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#cargoVer').append(fila);
            $("#cargoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function equipoVerMas(id) {
    $('#equipoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#equipoVer').append(fila);
            $("#equipoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoVerMas(id) {
    $('#turnoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#turnoVer').append(fila);
            $("#turnoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function empresaVerMas(id) {
    $('#empresaVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#empresaVer').append(fila);
            $("#empresaVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function centroCostoVerMas(id) {
    $('#centroCostoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroCostoVer').append(fila);
            $("#centroCostoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function CentroDeCostoVerMas(id) {
    $('#turnoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#turnoVer').append(fila);
            $("#turnoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}
// FIN CARGA SELECT "VER"