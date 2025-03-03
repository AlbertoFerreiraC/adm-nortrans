$(document).ready(function () {

    cargarDatosTabla();

    $('#btnNuevo').click(function () {
        cargoAgregar();
        empresaAgregar();
        equipoAgregar();
        turnoAgregar();
        CentroDeCostoAgregar();
        ApruebaAgregar();
        PreapruebaAgregar();
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
            $("#centroDecostoAgregar").val() != "-" &&
            $("#cantidadAgregar").val() != "-" &&
            $("#equipoAgregar").val() != "" &&
            $("#licenciaAgregar").val() != "-" &&
            $("#tipoturnoAgregar").val() != "-" &&
            $("#tipocontratoAgregar").val() != "-" &&
            $("#fecharequeridaAgregar").val() != "-" &&
            $("#remuneracionAgregar").val() != "-" &&
            $("#observacionAgregar").val() != "-" &&
            $("#preapruebaAgregar").val() != "-" &&
            $("#apruebaAgregar").val() != "-" &&
            $("#observacionEntrevistaPsicolaboral").val() != "-" &&
            $("#observacionEntrevistaTecnica").val() != "-" &&
            $("#observacionPruebaConduccion").val() != "-" &&
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
            $("#preapruebaModificar").val() != "-" &&
            $("#apruebaModificar").val() != "-" &&
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
                    '<button title="Ver mas" class="btn btn-info btnverMas" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalVermas"><i class="fa fa-eye"></i></button>' +

                    '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>' +

                    '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].idcontratacion + '"><i class="fa fa-times"></i></button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +
                    '<td>' + response[i].idcontratacion + '</td>' +
                    '<td>' + response[i].fecha_requerida + '</td>' + // si podes formateale la fecha en dia/mes/año
                    '<td>' + response[i].division + '</td>' +
                    '<td>' + response[i].cargo + '</td>' +
                    '<td>' + response[i].cantidad_solicitada + '</td>' +
                    '<td>' + response[i].estado + '</td>' // ponele en mayusculas
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
                    confirmButtonText: 'Si, anular registro!'
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
            title: "Ha ocurrido un error al cargar la lista!!!",
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
    datos.append("empresa", $("#empresaAgregar").val());
    datos.append("centroDeCosto", $("#centroDecostoAgregar").val());
    datos.append("cantidadSolicitada", $("#cantidadAgregar").val());
    datos.append("tipoBus", $("#equipoAgregar").val());
    datos.append("licenciaDeConducir", $("#licenciaAgregar").val());
    datos.append("turnosLaborales", $("#tipoturnoAgregar").val());
    datos.append("tipo_contrato", $("#tipocontratoAgregar").val());
    datos.append("fechaRequerida", $("#fecharequeridaAgregar").val());
    datos.append("fechaTermino", $("#fechaterminoAgregar").val());
    datos.append("remuneracion", $("#remuneracionAgregar").val());
    datos.append("observacionEntrevistaPsicolaboral", $("#observacionEntrevistaPsicolaboral").val());
    datos.append("observacionEntrevistaTecnica", $("#observacionEntrevistaTecnica").val());
    datos.append("observacionPruebaConduccion", $("#observacionPruebaConduccion").val());
    datos.append("comentarioGeneral", $("#comentarioAgregar").val());
    datos.append("preAprueba", $("#preapruebaAgregar").val());
    datos.append("aprueba", $("#apruebaAgregar").val());

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
        "id": valor
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
                $("#idModificar").val(response[i].idcontratacion);
                cargoModificar(response[i].cargo);
                empresaModificar(response[i].empresa);
                CentroDeCostoModificar(response[i].CentroDeCosto);
                equipoModificar(response[i].tipoBus);
                turnoModificar(response[i].turnos_laborales);
                CentroDeCostoModificarCargaInicial(response[i].centro_de_costo, response[i].empresa);
                apruebaModificar(response[i].aprueba);
                preapruebaModificar(response[i].preaprueba);


                $('#motivoModificar option[value="' + response[i].motivo + '"]').attr("selected", true);
                $('#requisitoseleccionModificar option[value="' + response[i].requisito_seleccion + '"]').attr("selected", true);
                $('#divisionModificar option[value="' + response[i].division + '"]').attr("selected", true);
                $("#cantidadModificar").val(response[i].cantidad_solicitada);
                $("#fecharequeridaModificar").val(response[i].fecha_requerida);
                $("#fechaterminoModificar").val(response[i].fecha_termino);
                $("#remuneracionModificar").val(response[i].remuneracion);
                $("#comentarioModificar").val(response[i].comentario_general);

                $("#observacionEntrevistaPsicolaboralMod").val(response[i].observacionEntrevistaPsicolaboral);
                $("#observacionEntrevistaTecnicaMod").val(response[i].observacionEntrevistaTecnica);
                $("#observacionPruebaConduccionMod").val(response[i].observacionPruebaConduccion);

                //--------------------------
                $('#licenciaModificar option[value="' + response[i].licenciaDeConducir + '"]').attr("selected", true);
                $('#tipocontratoModificar option[value="' + response[i].tipo_contrato + '"]').attr("selected", true);

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
        url: "../api_adm_nortrans/solicitudContratacion/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#divisionVer").val(response[i].division);
                cargoVerMas(response[i].cargo); //listo
                empresaVerMas(response[i].empresa); //listo
                CentroDeCostoVerMas(response[i].CentroDeCosto); // listo
                equipoVerMas(response[i].tipoBus); // listo
                turnoVerMas(response[i].turnos_laborales); //listo
                CentroDeCostoVerMas(response[i].centro_de_costo, response[i].empresa); //listo
                apruebaVerMas(response[i].aprueba); //verificar
                preapruebaVerMas(response[i].pre_aprueba); //verificar


                $('#motivoVer option[value="' + response[i].motivo + '"]').attr("selected", true); //listo
                $('#divisionVer option[value="' + response[i].division + '"]').attr("selected", true);//verificar
                $("#cantidadVer").val(response[i].cantidad_solicitada);
                $("#fecharequeridaVer").val(response[i].fecha_requerida);
                $("#fechaterminoVerMas").val(response[i].fecha_termino);
                $("#remuneracionVer").val(response[i].remuneracion);
                $("#comentarioVer").val(response[i].comentario_general);

                $("#observacionEntrevistaPsicolaboralVer").val(response[i].observacionEntrevistaPsicolaboral);
                $("#observacionEntrevistaTecnicaVer").val(response[i].observacionEntrevistaTecnica);
                $("#observacionPruebaConduccionVer").val(response[i].observacionPruebaConduccion);

                //--------------------------
                $('#licenciaVerMas option[value="' + response[i].licenciaDeConducir + '"]').attr("selected", true);
                $('#tipocontratoVerMas option[value="' + response[i].tipo_documento + '"]').attr("selected", true);


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
    datos.append("idcontratacion", $("#idModificar").val());
    datos.append("cargo", $("#cargoModificar").val());
    datos.append("empresa", $("#empresaModificar").val());
    datos.append("centroDeCosto", $("#centroDecostoModificar").val());
    datos.append("turnosLaborales", $("#tipoturnoModificar").val());
    datos.append("tipoBus", $("#equipoModificar").val());
    datos.append("preAprueba", $("#preapruebaModificar").val());
    datos.append("aprueba", $("#apruebaModificar").val());
    datos.append("division", $("#divisionModificar").val());
    datos.append("cantidadSolicitada", $("#cantidadModificar").val());
    datos.append("licenciaDeConducir", $("#licenciaModificar").val());
    datos.append("fechaRequerida", $("#fecharequeridaModificar").val());
    datos.append("fechaTermino", $("#fechaterminoModificar").val());
    datos.append("remuneracion", $("#remuneracionModificar").val());
    datos.append("comentarioGeneral", $("#comentarioModificar").val());
    datos.append("motivo", $("#motivoModificar").val());
    datos.append("tipoContrato", $("#tipocontratoModificar").val());
    datos.append("observacionEntrevistaPsicolaboral", $("#observacionEntrevistaPsicolaboralMod").val());
    datos.append("observacionEntrevistaTecnica", $("#observacionEntrevistaTecnicaMod").val());
    datos.append("observacionPruebaConduccion", $("#observacionPruebaConduccionMod").val());


    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funModificar.php",
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
                    title: "Registro modificado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            } else if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la modificación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            } else if (response['mensaje'] === "repetido") {
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
        url: "../api_adm_nortrans/solicitudContratacion/funEliminar.php",
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

function equipoAgregar() {
    $('#equipoAgregar').empty();
    $('#equipoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaEmpresa = "";
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#equipoAgregar').append(listaEmpresa);
        }
    });
}

function turnoAgregar() {
    $('#tipoturnoAgregar').empty();
    $('#tipoturnoAgregar').append('<option value ="-">Seleccionar...</opction>');
    var listaTurno = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listaTurno = listaTurno + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoturnoAgregar').append(listaTurno);
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
    $('#centroDecostoAgregar').empty();
    var params = {
        "empresa": $("#empresaAgregar").val()
    };
    var listaCentroCosto = "";
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
                listaCentroCosto = listaCentroCosto + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroDecostoAgregar').append(listaCentroCosto);
        }
    });
}

function ApruebaAgregar() {
    $('#apruebaAgregar').empty();
    $('#apruebaAgregar').append('<option value ="-">Seleccionar...</opction>');
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
            $('#apruebaAgregar').append(listaUsuario);
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
    $('#tipoturnoModificar').empty();
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
            $('#tipoturnoModificar').append(fila);
            $("#tipoturnoModificar option[value='" + id + "']").attr("selected", true);
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

function apruebaModificar(id) {
    $('#apruebaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#apruebaModificar').append(fila);
            $("#apruebaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function preapruebaModificar(id) {
    $('#preapruebaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preapruebaModificar').append(fila);
            $("#preapruebaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function CentroDeCostoModificarCargaInicial(id, empresa) {
    // alert(id);
    $('#centroDecostoModificar').empty();
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
            $('#centroDecostoModificar').append(fila);
            $("#centroDecostoModificar option[value='" + id + "']").attr("selected", true);
        }
    });

}

function CentroDeCostoModificar() {
    $('#centroDecostoModificar').empty();
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
            $('#centroDecostoModificar').append(fila);
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
            $('#cargoVer').append(fila);
            $("#cargoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function equipoVerMas(id) {
    $('#equipoVer').empty();
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
            $('#equipoVer').append(fila);
            $("#equipoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoVerMas(id) {
    $('#tipoturnoVer').empty();
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
            $('#tipoturnoVer').append(fila);
            $("#tipoturnoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function apruebaVerMas(id) {
    $('#apruebaVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#apruebaVer').append(fila);
            $("#apruebaVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function preapruebaVerMas(id) {
    $('#preapruebaVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preapruebaVer').append(fila);
            $("#preapruebaVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function empresaVerMas(id) {
    $('#razonVer').empty();
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
            $('#razonVer').append(fila);
            $("#razonVer option[value='" + id + "']").attr("selected", true);
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
    $('#centrocostoVer').empty();
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
            $('#centrocostoVer').append(fila);
            $("#centrocostoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}
// FIN CARGA SELECT "VER"