var ip = "127.0.0.1";
//var ip = "186.16.32.139";
function esEmailValido(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

$(document).ready(function () {

  cargarDatosTabla();

  $('#btnNuevo').click(function () {
    nacionalidadAgregar();
    comunaAgregar();
    afpAgregar();
    saludAgregar();
    turnoAgregar();
    empresaAgregar();
  });

  $('#empresaAgregar').change(function () {
    CentroDeCostoAgregar();
  });

  $('#empresaModificar').change(function () {
    CentroDeCostoModificar();
  });

  $('#asignacionEmpresaModificar').change(function () {
    cargarCentroDeCostoEnModificacion();
  });

  $('#btnGuardar').click(function () {

    var emailEmpresa = $("#emailEmpresaAgregar").val();
    var emailPersonal = $("#emailPersonalAgregar").val();

    if (!esEmailValido(emailEmpresa)) {
      swal({
        type: "error",
        title: "Email de empresa inválido",
        text: "Ingrese un correo válido (ejemplo@empresa.com)",
        confirmButtonText: "Aceptar"
      });
      return;
    }

    if (emailPersonal !== "" && !esEmailValido(emailPersonal)) {
      swal({
        type: "error",
        title: "Email personal inválido",
        text: "Ingrese un correo válido (ejemplo@gmail.com)",
        confirmButtonText: "Aceptar"
      });
      return;
    }

    if (
      $("#rutAgregar").val() != "" && $("#rutAgregar").val() != "0" &&
      $("#fechaNacimientoAgregar").val() != "" &&
      $("#nombreAgregar").val() != "" &&
      $("#apellidoAgregar").val() != "" &&
      $("#nacionalidadAgregar").val() != "-" &&
      $("#comunaAgregar").val() != "-" &&
      $("#emailEmpresaAgregar").val() != "" &&
      $("#afpAgregar").val() != "-" &&
      $("#saludAgregar").val() != "-" &&
      $("#empresaAgregar").val() != "-" &&
      $("#centroAgregar").val() != "-" &&
      $("#turnoAgregar").val() != "-"
    ) {
      agregarDatos();
    } else {
      swal({
        type: "error",
        title: "Favor completar debidamente los campos requeridos.",
        confirmButtonText: "Aceptar"
      });
    }
  });


  $('#btnModificar').click(function () {
    if ($("#rutModificar").val() != "" && $("#rutModificar").val() != "0" &&
      $("#fechaNacimientoModificar").val() != "" &&
      $("#nombreModificar").val() != "" &&
      $("#apellidoModificar").val() != "" &&
      $("#nacionalidadModificar").val() != "-" &&
      $("#comunaModificar").val() != "-" &&
      $("#emailEmpresaModificar").val() != "" &&
      $("#afpModificar").val() != "-" &&
      $("#saludModificar").val() != "-" &&
      $("#empresaModificar").val() != "-" &&
      $("#centroModificar").val() != "-" &&
      $("#turnoModificar").val() != "-") {
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

  //---------------------------Modificaciones Adicionales

  $('#btnAgregarAsignacion').click(function () {
    if ($("#asignacionDivisionModificar").val() != "-" &&
      $("#asignacionEmpresaModificar").val() != "-" &&
      $("#asignacionCostoModificar").val() != "") {
      cargarAsignacionLaboral();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar todos los campos requeridos.",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });

  $('#btnAsinacionDocumentolaboral').click(function () {
    if ($("#tipoDocumentoLaboralAsignacionModificar").val() != "-" &&
      $("#idDocumentoAsignacionModificar").val() != "" &&
      $("#fechaExpiracionAsignacionModificar").val() != "" &&
      $("#documentoAsignacionModificar")[0].files[0] != undefined) {
      cargarDocumentoLaboral();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar y completar todos los campos requeridos.",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });

  $('#btnCargarEstudio').click(function () {
    if ($("#tipoEstudioModificar").val() != "-" &&
      $("#estadoEstudioModificar").val() != "-" &&
      $("#documentoEstudioModificar")[0].files[0] != undefined) {
      cargarEstudiosCursados();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar todos los campos requeridos.",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });

  $('#btnCargarTalla').click(function () {
    if ($("#tipoEppModificar").val() != "-" &&
      $("#numTallaModificar").val() != "") {
      cargarTalla();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar todos los campos requeridos.",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });

  $('#btnCargarContactoEmergencia').click(function () {
    if ($("#parentescoEmergenciaModificar").val() != "-" &&
      $("#nombreEmergenciaModificar").val() != "" &&
      $("#fonoEmergenciaModificar").val() != "") {
      cargarContactoEmergencia();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar y completar todos los campos requeridos.",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });

  $('#btnCargarAntecedente').click(function () {
    if ($("#tipoAntecedenteModificar").val() != "-" &&
      $("#detalleAntecedenteModificar").val() != "") {
      cargarAntecedentes();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar y completar todos los campos requeridos.",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });

  $('#btnVicularSolicitudDeContratacion').click(function () {
    if ($("#solicitudContratacion").val() != "-") {
      actualizarSolicitudDeContratacion();
    } else {
      swal({
        type: "error",
        title: "Debe seleccionar una solicitud de contratación válida",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
  });


});


function cargarDatosTabla() {
  $("#tabla tbody").empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListar.php",
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
          '<td>' + '<img class="img-thumbnail" src="' + response[i].imagen + '">' + '</td>' +
          '<td>' + response[i].rut + '</td>' +
          '<td>' + response[i].nombre + '</td>' +
          '<td>' + response[i].telefono_empresa + '</td>' +
          '<td>' + response[i].email_empresa + '</td>'

          + '</tr>';
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
  // var idusuario = $("#idUsuario").val();
  datos.append("rut", $("#rutAgregar").val());
  datos.append("fechaNacimiento", $("#fechaNacimientoAgregar").val());
  datos.append("genero", $("#generoAgregar").val());
  datos.append("nombre", $("#nombreAgregar").val());
  datos.append("apellido", $("#apellidoAgregar").val());
  datos.append("nacionalidad", $("#nacionalidadAgregar").val());
  datos.append("estadoCivil", $("#estadoCivilAgregar").val());
  datos.append("comuna", $("#comunaAgregar").val());
  datos.append("direccion", $("#direccionAgregar").val());
  datos.append("telefonoEmpresa", $("#telefonoEmpresaAgregar").val());
  datos.append("emailEmpresa", $("#emailEmpresaAgregar").val());
  datos.append("telefonoPropio", $("#telefonoPropioAgregar").val());
  datos.append("emailPersonal", $("#emailPersonalAgregar").val());
  datos.append("afp", $("#afpAgregar").val());
  datos.append("salud", $("#saludAgregar").val());
  datos.append("empresa", $("#empresaAgregar").val());
  datos.append("centro", $("#centroAgregar").val());
  datos.append("turno", $("#turnoAgregar").val());
  datos.append("imagen", $("#imagenAgregar")[0].files[0]);
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funAgregar.php",
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
          title: "Registro cargado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          location.reload();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

      if (response['mensaje'] === "registro_existente") {
        swal({
          type: "error",
          title: "El registro que quiere cargar ya existe en la base de datos!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }
    }
  }).fail(function () {
    swal({
      type: "error",
      title: "Ha ocurrido un error al procesar la carga!!!",
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
    url: "../api_adm_nortrans/fichaEmpleado/funDatosParaModificar.php",
    method: "POST",
    cache: false,
    data: JSON.stringify(params),
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        $("#idModificar").val(response[i].id);
        nacionalidadModificar(response[i].nacionalidad);
        comunaModificar(response[i].comuna);
        afpModificar(response[i].afp);
        saludModificar(response[i].salud);
        turnoModificar(response[i].turnos_laborales);
        empresaModificar(response[i].empresa);
        CentroDeCostoModificarCargaInicial(response[i].centro_de_costo, response[i].empresa);

        $("#rutModificar").val(response[i].rut);
        $("#fechaNacimientoModificar").val(response[i].fecha_nacimiento);
        $('#generoModificar option[value="' + response[i].genero + '"]').attr("selected", true);
        $("#nombreModificar").val(response[i].nombre);
        $("#apellidoModificar").val(response[i].apellido);
        $('#estadoCivilModificar option[value="' + response[i].estado_civil + '"]').attr("selected", true);
        $("#direccionModificar").val(response[i].direccion);
        $("#telefonoEmpresaModificar").val(response[i].telefono_empresa);
        $("#emailEmpresaModificar").val(response[i].email_empresa);
        $("#telefonoPropioModificar").val(response[i].telefono_propio);
        $("#emailPersonalModificar").val(response[i].email);

        $("#nuevaImagenModificar").html('<img class="img-thumbnail" src="' + response[i].imagen + '"  >');

        // para asignación laboral
        cargarEmpresaEnAsignacionLaboral();
        cargarCentroDeCostoEnModificacion();
        listarAsignacioneslaborales(response[i].id);

        //Para documento laboral
        cargarTipoDocumentoLaboral();
        listarDatosTablaDocumentoslaborales(response[i].id);

        // para tipo estudio
        cargarTipoEstudio();
        listarEstudiosCursados(response[i].id);

        // para tipo EPP
        cargarTipoEpp();
        listarTallas(response[i].id);

        // Contactos de Emergencia
        listarContactosDeEmergencia(response[i].id);

        // Antecedentes Medicos
        cargarAntecedenteMedico();
        listarAntecedentesMedicos(response[i].id);

        // Viculación Solicitud
        cargarSolicitudes(response[i].id_contratacion);

      }

    }
  }).fail(function () {
    swal({
      type: "error",
      title: "Ha ocurrido un error al traer los datos oslicitados!!!",
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
    url: "../api_adm_nortrans/fichaEmpleado/funDatosParaModificar.php",
    method: "POST",
    cache: false,
    data: JSON.stringify(params),
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        $("#rutVer").val(response[i].rut);
        nacionalidadVerMas(response[i].nacionalidad);
        comunaVerMas(response[i].comuna);
        afpVerMas(response[i].afp);
        saludVerMas(response[i].salud);
        turnoVerMas(response[i].turnos_laborales);
        empresaVerMas(response[i].empresa);
        CentroDeCostoModificarCargaInicial(response[i].centro_de_costo, response[i].empresa);
        CentroDeCostoVerMas(response[i].centro_de_costo, response[i].empresa);
        $("#fechaNacimientoVer").val(response[i].fecha_nacimiento);
        $('#generoVer option[value="' + response[i].genero + '"]').attr("selected", true);
        $("#nombreVer").val(response[i].nombre);
        $("#apellidoVer").val(response[i].apellido);
        $('#estadoCivilVer option[value="' + response[i].estado_civil + '"]').attr("selected", true);
        $("#comunaVer option[value=" + response[i].comuna + "]").attr("selected", true);
        $("#direccionVer").val(response[i].direccion);
        $("#telefonoEmpresaVer").val(response[i].telefono_empresa);
        $("#emailEmpresaVer").val(response[i].email_empresa);
        $("#telefonoPropioVer").val(response[i].telefono_propio);
        $("#emailPersonalVer").val(response[i].email);
        $("#nuevaImagenVer").html('<img class="img-thumbnail" src="' + response[i].imagen + '"  >');

      }

    }
  }).fail(function () {
    swal({
      type: "error",
      title: "Ha ocurrido un error al traer los datos oslicitados!!!",
      showConfirmButton: true,
      confirmButtonText: "Aceptar"
    });
  });

}

function modificarDatos() {
  var datos = new FormData();
  datos.append("id", $("#idModificar").val());
  datos.append("rut", $("#rutModificar").val());
  datos.append("fechaNacimiento", $("#fechaNacimientoModificar").val());
  datos.append("genero", $("#generoModificar").val());
  datos.append("nombre", $("#nombreModificar").val());
  datos.append("apellido", $("#apellidoModificar").val());
  datos.append("nacionalidad", $("#nacionalidadModificar").val());
  datos.append("estadoCivil", $("#estadoCivilModificar").val());
  datos.append("comuna", $("#comunaModificar").val());
  datos.append("direccion", $("#direccionModificar").val());
  datos.append("telefonoEmpresa", $("#telefonoEmpresaModificar").val());
  datos.append("emailEmpresa", $("#emailEmpresaModificar").val());
  datos.append("telefonoPropio", $("#telefonoPropioModificar").val());
  datos.append("emailPersonal", $("#emailPersonalModificar").val());
  datos.append("afp", $("#afpModificar").val());
  datos.append("salud", $("#saludModificar").val());
  datos.append("empresa", $("#empresaModificar").val());
  datos.append("centro", $("#centroModificar").val());
  datos.append("turno", $("#turnoModificar").val());
  datos.append("imagen", $("#imagenModificar")[0].files[0]);
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funModificar.php",
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
          title: "Registro modificado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          location.reload();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la modificación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

      if (response['mensaje'] === "repetido") {
        swal({
          type: "error",
          title: "El registro que quiere modificar ya existe en otro registro en la base de datos!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }
    }
  }).fail(function () {
    swal({
      type: "error",
      title: "Ha ocurrido un error al procesar la modificación!!!",
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
    url: "../api_adm_nortrans/fichaEmpleado/funEliminar.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          location.reload();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  }).fail(function () {
    swal({
      type: "error",
      title: "Ha ocurrido un error al procesar la eliminación!!!",
      showConfirmButton: true,
      confirmButtonText: "Aceptar"
    });
  });

}


// INCIO CARGA SELECT "AGREGAR"
function nacionalidadAgregar() {
  $('#nacionalidadAgregar').empty();
  $('#nacionalidadAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/nacionalidad/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#nacionalidadAgregar').append(listaEmpresa);
    }
  });
}

function comunaAgregar() {
  $('#comunaAgregar').empty();
  $('#comunaAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/comuna/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#comunaAgregar').append(listaEmpresa);
    }
  });
}

function afpAgregar() {
  $('#afpAgregar').empty();
  $('#afpAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/afp/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#afpAgregar').append(listaEmpresa);
    }
  });
}

function saludAgregar() {
  $('#saludAgregar').empty();
  $('#saludAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/salud/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#saludAgregar').append(listaEmpresa);
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
function nacionalidadModificar(id) {
  $('#nacionalidadModificar').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/nacionalidad/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#nacionalidadModificar').append(fila);
      $("#nacionalidadModificar option[value='" + id + "']").attr("selected", true);
    }
  });
}

function comunaModificar(id) {
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

function afpModificar(id) {
  $('#afpModificar').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/afp/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#afpModificar').append(fila);
      $("#afpModificar option[value='" + id + "']").attr("selected", true);
    }
  });
}

function saludModificar(id) {
  $('#saludModificar').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/salud/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#saludModificar').append(fila);
      $("#saludModificar option[value='" + id + "']").attr("selected", true);
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
function nacionalidadVerMas(id) {
  $('#nacionalidadVer').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/nacionalidad/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#nacionalidadVer').append(fila);
      $("#nacionalidadVer option[value='" + id + "']").attr("selected", true);
    }
  });
}

function comunaVerMas(id) {
  $('#comunaVer').empty();
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
      $('#comunaVer').append(fila);
      $("#comunaVer option[value='" + id + "']").attr("selected", true);
    }
  });
}

function afpVerMas(id) {
  $('#afpVer').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/afp/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#afpVer').append(fila);
      $("#afpVer option[value='" + id + "']").attr("selected", true);
    }
  });
}

function saludVerMas(id) {
  $('#saludVer').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/salud/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#saludVer').append(fila);
      $("#saludVer option[value='" + id + "']").attr("selected", true);
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

function CentroDeCostoVerMas(id, empresa) {
  // alert(id);
  $('#centroVer').empty();
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
      $('#centroVer').append(fila);
      $("#centroVer option[value='" + id + "']").attr("selected", true);
    }
  });

}
// FIN CARGA SELECT "VER"


//Cargas en Asignación Laboral

function cargarEmpresaEnAsignacionLaboral() {
  $('#asignacionEmpresaModificar').empty();
  $('#asignacionEmpresaModificar').append('<option value ="-">Seleccionar...</opction>');
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
      $('#asignacionEmpresaModificar').append(listaEmpresa);
    }
  });
}

function cargarCentroDeCostoEnModificacion() {
  $('#asignacionCostoModificar').empty();
  var params = {
    "empresa": $("#asignacionEmpresaModificar").val()
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
      $('#asignacionCostoModificar').append(listaCentroCosto);
    }
  });
}

function cargarAsignacionLaboral() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("division", $("#asignacionDivisionModificar").val());
  datos.append("empresa", $("#asignacionEmpresaModificar").val());
  datos.append("centroDeCosto", $("#asignacionCostoModificar").val());
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funCargarAsignacionLaboral.php",
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
          title: "Requisito Cargado con éxito.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarAsignacioneslaborales($("#idModificar").val());
          $("#centroDeCosto").val('');
          cargarEmpresaEnAsignacionLaboral();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

function listarAsignacioneslaborales(valor) {
  $("#tablaAsignacionesLaborales tbody").empty();
  var params = {
    "id": valor
  };
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarAsignacionesLaborales.php",
    method: "POST",
    data: JSON.stringify(params),
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<tr>' +
          '<td>' + response[i].division + '</td>' +
          '<td>' + response[i].empresa + '</td>' +
          '<td>' + response[i].centro_de_costo + '</td>' +
          '<td>' +
          '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarAsignaciones" id="' + response[i].idasignacion_laboral + '"><i class="fa fa-times"></i></button>' +
          '</td>' +
          +'</tr>';
      }
      $('#tablaAsignacionesLaborales').append(fila);

      $('.btnEliminarAsignaciones').click(function () {
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
        }).then(function (result) {
          if (result.value) {
            eliminarAsignacioneslaborales(id_registro);
          }
        });
      });

    }
  });

}

function eliminarAsignacioneslaborales(valor) {
  var params = {
    "id": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funEliminarAsignacionLaboral.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarAsignacioneslaborales($("#idModificar").val());
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

// Carga en Documentos Laborales

function cargarTipoDocumentoLaboral() {
  $('#tipoDocumentoLaboralAsignacionModificar').empty();
  $('#tipoDocumentoLaboralAsignacionModificar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/documento/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#tipoDocumentoLaboralAsignacionModificar').append(listaEmpresa);
    }
  });
}

function cargarDocumentoLaboral() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("documentoLaboral", $("#tipoDocumentoLaboralAsignacionModificar").val());
  datos.append("idDocumento", $("#idDocumentoAsignacionModificar").val());
  datos.append("fechaExpiracion", $("#fechaExpiracionAsignacionModificar").val());
  datos.append("documento", $("#documentoAsignacionModificar")[0].files[0]);
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funCargarDocumentoLaboral.php",
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
          title: "Registro Cargado con éxito.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarDatosTablaDocumentoslaborales($("#idModificar").val());
          $("#idDocumento").val('');
          $("#fechaExpiracion").val('');
          cargarTipoDocumentoLaboral();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

      if (response['mensaje'] === "vacio") {
        swal({
          type: "error",
          title: "No hay documento para procesar.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

      if (response['mensaje'] === "invalido") {
        swal({
          type: "error",
          title: "El archivo seleccionado no es posible cargar al sistema.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

function listarDatosTablaDocumentoslaborales(valor) {
  $("#tablaDocumentolaboral tbody").empty();
  var params = {
    "id": valor
  };
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarDocumentosLaborales.php",
    method: "POST",
    data: JSON.stringify(params),
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<tr>' +
          '<td>' + response[i].descripcion_documento + '</td>' +
          '<td>' + response[i].fecha_vencimiento + '</td>' +
          '<td>' + response[i].id_docu + '</td>' +
          '<td>' +
          '<a title="Descargar" type="button" class="btn btn-success" target="_blank" href="http://' + ip + '/nortrans-apps/adm-nortrans/vistas/img/documentoLaboral/' + response[i].id_personal + '_' + response[i].id_documento + '_documentoLaboral' + response[i].tipo_adjunto + '" ><i class="fa fa-download"></i></a>' +

          '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarDocumentoLaboral" id="' + response[i].iddocumentos_laborales + '"><i class="fa fa-times"></i></button>' +
          '</td>' +
          +'</tr>';
      }
      $('#tablaDocumentolaboral').append(fila);

      $('.btnEliminarDocumentoLaboral').click(function () {
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
        }).then(function (result) {
          if (result.value) {
            eliminarDocumentoLaboral(id_registro);
          }
        });
      });

    }
  });

}

function eliminarDocumentoLaboral(valor) {
  var params = {
    "id": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funEliminarDocumentosLaborales.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarDatosTablaDocumentoslaborales($("#idModificar").val());
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

//Cargar estudios cursados

function cargarTipoEstudio() {
  $('#tipoEstudioModificar').empty();
  $('#tipoEstudioModificar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/tipoEstudio/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#tipoEstudioModificar').append(listaEmpresa);
    }
  });
}

function cargarEstudiosCursados() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("tipoEstudio", $("#tipoEstudioModificar").val());
  datos.append("estadoEstudio", $("#estadoEstudioModificar").val());
  datos.append("documento", $("#documentoEstudioModificar")[0].files[0]);
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funCargarEstudiosCursados.php",
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
          title: "Registro Cargado con éxito.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarEstudiosCursados($("#idModificar").val());
          cargarTipoEstudio();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

      if (response['mensaje'] === "vacio") {
        swal({
          type: "error",
          title: "No hay documento para procesar.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

      if (response['mensaje'] === "invalido") {
        swal({
          type: "error",
          title: "El archivo seleccionado no es posible cargar al sistema.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

function listarEstudiosCursados(valor) {
  $("#tablaEstudios tbody").empty();
  var params = {
    "id": valor
  };
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarEstudiosCursados.php",
    method: "POST",
    data: JSON.stringify(params),
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<tr>' +
          '<td>' + response[i].descripcion_tipo_estudio + '</td>' +
          '<td>' + response[i].estado_estudio + '</td>' +
          '<td>' +
          '<a title="Descargar" type="button" class="btn btn-success" target="_blank" href="http://' + ip + '/nortrans-apps/adm-nortrans/vistas/img/estudiosCursados/' + response[i].id_personal + '_' + response[i].id_tipo_estudio + '_estudioCursado' + response[i].tipo_adjunto + '" ><i class="fa fa-download"></i></a>' +

          '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarEstu" id="' + response[i].idestudios + '"><i class="fa fa-times"></i></button>' +
          '</td>' +
          +'</tr>';
      }
      $('#tablaEstudios').append(fila);

      $('.btnEliminarEstu').click(function () {
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
        }).then(function (result) {
          if (result.value) {
            eliminarEstudiosCursados(id_registro);
          }
        });
      });

    }
  });

}

function eliminarEstudiosCursados(valor) {
  var params = {
    "id": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funEliminarEstudiosCursados.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarEstudiosCursados($("#idModificar").val());
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

// Carga Talla

function cargarTipoEpp() {
  $('#tipoEppModificar').empty();
  $('#tipoEppModificar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/tipoEpp/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#tipoEppModificar').append(listaEmpresa);
    }
  });
}

function cargarTalla() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("tipoEpp", $("#tipoEppModificar").val());
  datos.append("nroTalla", $("#numTallaModificar").val());
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funCargarTalla.php",
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
          title: "Registro Cargado con éxito.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarTallas($("#idModificar").val());
          cargarTipoEpp();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

function listarTallas(valor) {
  $("#tablaTalla tbody").empty();
  var params = {
    "id": valor
  };
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarTallas.php",
    method: "POST",
    data: JSON.stringify(params),
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<tr>' +
          '<td>' + response[i].tipo_epp + '</td>' +
          '<td>' + response[i].nro_talla + '</td>' +
          '<td>' +
          '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarTalla" id="' + response[i].idmedidas + '"><i class="fa fa-times"></i></button>' +
          '</td>' +
          +'</tr>';
      }
      $('#tablaTalla').append(fila);

      $('.btnEliminarTalla').click(function () {
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
        }).then(function (result) {
          if (result.value) {
            eliminarTalla(id_registro);
          }
        });
      });

    }
  });

}

function eliminarTalla(valor) {
  var params = {
    "id": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funEliminarTalla.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarTallas($("#idModificar").val());
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

//cargar Contacto de Emergencia

function cargarContactoEmergencia() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("nombre", $("#nombreEmergenciaModificar").val());
  datos.append("parentesco", $("#parentescoEmergenciaModificar").val());
  datos.append("telefono", $("#fonoEmergenciaModificar").val());
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funCargarContactoDeEmergencia.php",
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
          title: "Registro Cargado con éxito.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarContactosDeEmergencia($("#idModificar").val());
          $("#nombreEmergenciaModificar").val('');
          $("#fonoEmergenciaModificar").val('');
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

function listarContactosDeEmergencia(valor) {
  $("#tablaContactoEmergencia tbody").empty();
  var params = {
    "id": valor
  };
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarContactosDeEmergencia.php",
    method: "POST",
    data: JSON.stringify(params),
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<tr>' +
          '<td>' + response[i].nombre + '</td>' +
          '<td>' + response[i].parentezco + '</td>' +
          '<td>' + response[i].telefono + '</td>' +
          '<td>' +
          '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarTablaContacto" id="' + response[i].idcontacto_emergencia + '"><i class="fa fa-times"></i></button>' +
          '</td>' +
          +'</tr>';
      }
      $('#tablaContactoEmergencia').append(fila);

      $('.btnEliminarTablaContacto').click(function () {
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
        }).then(function (result) {
          if (result.value) {
            eliminarContactoDeEmergencia(id_registro);
          }
        });
      });

    }
  });

}

function eliminarContactoDeEmergencia(valor) {
  var params = {
    "id": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funEliminarContactoDeEmergencia.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarContactosDeEmergencia($("#idModificar").val());
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

//Antecedente Médico

function cargarAntecedenteMedico() {
  $('#tipoAntecedenteModificar').empty();
  $('#tipoAntecedenteModificar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/antecedentesMedicos/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#tipoAntecedenteModificar').append(listaEmpresa);
    }
  });
}

function cargarAntecedentes() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("antecedente", $("#tipoAntecedenteModificar").val());
  datos.append("descripcion", $("#detalleAntecedenteModificar").val());
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funcargarAntecedentesMedicos.php",
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
          title: "Registro Cargado con éxito.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarAntecedentesMedicos($("#idModificar").val());
          cargarAntecedenteMedico();
          $("#detalleAntecedenteModificar").val('');
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la carga.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

function listarAntecedentesMedicos(valor) {
  $("#tablaAntecedentesMedicos tbody").empty();
  var params = {
    "id": valor
  };
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarAntecedentes.php",
    method: "POST",
    data: JSON.stringify(params),
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<tr>' +
          '<td>' + response[i].descripcion + '</td>' +
          '<td>' + response[i].detalle + '</td>' +
          '<td>' +
          '<button title="Eliminar" type="button" class="btn btn-danger btnEliminarTablaAntecedentesMe" id="' + response[i].idantecedentes + '"><i class="fa fa-times"></i></button>' +
          '</td>' +
          +'</tr>';
      }
      $('#tablaAntecedentesMedicos').append(fila);

      $('.btnEliminarTablaAntecedentesMe').click(function () {
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
        }).then(function (result) {
          if (result.value) {
            eliminarAntecedentesMedicos(id_registro);
          }
        });
      });

    }
  });

}

function eliminarAntecedentesMedicos(valor) {
  var params = {
    "id": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funEliminarContactoDeEmergencia.php",
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
          title: "Registro eliminado con exito!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          listarAntecedentesMedicos($("#idModificar").val());
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la eliminación!!!",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}

// Viculación

function cargarSolicitudes(valor) {
  $('#solicitudContratacion').empty();
  if (valor == "") {
    $('#solicitudContratacion').append('<option value ="-">Seleccionar...</opction>');
  }
  var listaEmpresa = "";
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funListarSolicitudesDeContrato.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listaEmpresa = listaEmpresa + '<option value = "' + response[i].idcontratacion + '">' + "Nro: " + response[i].idcontratacion + " / Cargo: " + response[i].cargo + " / Centro de C.: " + response[i].centro + " / Requerido: " + response[i].requerido + '</option>';
      }
      $('#solicitudContratacion').append(listaEmpresa);
      if (valor != "") {
        $("#solicitudContratacion option[value='" + valor + "']").attr("selected", true);
      }

    }
  });
}

function actualizarSolicitudDeContratacion() {
  var datos = new FormData();
  datos.append("idEmpleado", $("#idModificar").val());
  datos.append("idContratacion", $("#solicitudContratacion").val());
  $.ajax({
    url: "../api_adm_nortrans/fichaEmpleado/funActualizarContrato.php",
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
          title: "Solicitud de contrato Actualizada",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        }).then((value) => {
          location.reload();
        });
      }

      if (response['mensaje'] === "nok") {
        swal({
          type: "error",
          title: "Ha ocurrido un error al procesar la actualización.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }

    }
  });

}