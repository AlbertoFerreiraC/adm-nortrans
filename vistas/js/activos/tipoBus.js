$(document).ready(function () {

  cargarDatosTabla();

  clasePiso1();
  clasePiso2();

  $('#btnGuardar').click(function () {
    agregarDatos();
  });

  $('#btnModificar').click(function () {
    modificarDatos();
  });

});


function cargarDatosTabla() {
  $("#tablaDocumentos tbody").empty();

  var fila = "";

  $.ajax({
    url: "../api_adm_nortrans/tipoPisoBus/funListar.php",
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
          fila += '<td>' + response[i].nro_piso + '</td>';
          fila += '<td>' + response[i].clase_piso + '</td>';
          fila += '<td>' + response[i].asiento_1 + '</td>';
          fila += '<td>' + response[i].clase_piso_2 + '</td>';
          fila += '<td>' + response[i].asiento_2 + '</td>';
          fila += '<td>' + response[i].estado + '</td>';
          fila += '<td>';
          fila += '<center>';
          fila += '<div class="btn-group">';
          fila += '<button title="Modificar" class="btn btn-warning btnModificar" id="' + response[i].id + '" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button> ';
          fila += '<button title="Eliminar" class="btn btn-danger btnEliminar" id="' + response[i].id + '"><i class="fa fa-times"></i></button>';
          fila += '</div>';
          fila += '</center>';
          fila += '</td>';
          fila += '</tr>';
        }
      }

      $('#tablaDocumentos tbody').append(fila);

      $('.btnModificar').click(function () {
        obtenerDatosParaModificar(this.id);
      });

      $('.btnEliminar').click(function () {
        var id_registro = this.id;
        swal({
          title: '¿Está seguro de anular el registro?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Sí, anular registro'
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
    "nro_piso": $("#numeroPisoAgregar").val(),
    "clase_piso": $("#clasePiso1Agregar").val(),
    "asiento_1": $("#asientoPisoUnoAgregar").val(),
    "clase_piso_2": $("#clasePiso2Agregar").val(),
    "asiento_2": $("#asientoPisoDosAgregar").val()
  };
  $.ajax({
    url: "../api_adm_nortrans/tipoPisoBus/funAgregar.php",
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
    "idtipo_piso_bus": valor
  };
  $.ajax({
    url: "../api_adm_nortrans/tipoPisoBus/funDatosParaModificar.php",
    method: "POST",
    cache: false,
    data: JSON.stringify(params),
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        $("#numeroPisoModificar").val(response[i].nro_piso);
        clasePiso1Modificar(response[i].clase_piso);
        $("#asientoPisoUnoModificar").val(response[i].asiento_1);
        clasePiso2Modificar(response[i].clase_piso_2);
        $("#asientoPisoDosModificar").val(response[i].asiento_2);
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
    "nro_piso": $("#numeroPisoModificar").val(),
    "clase_piso": $("#clasePiso1Modificar").val(),
    "asiento_1": $("#asientoPisoUnoModificar").val(),
    "clase_piso_2": $("#clasePiso2Modificar").val(),
    "asiento_2": $("#asientoPisoDosModificar").val(),
    "id": $("#idModificar").val()
  };
  $.ajax({
    url: "../api_adm_nortrans/tipoPisoBus/funModificar.php",
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
    url: "../api_adm_nortrans/tipoPisoBus/funEliminar.php",
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

//momento de carga
function clasePiso1() {
  $('#clasePiso1Agregar').empty();
  $('#clasePiso1Agregar').append('<option value ="-">Seleccionar...</option>');
  var listartipoPoliza = "";

  $.ajax({
    url: "../api_adm_nortrans/claseMaquina/funListar.php",
    method: "GET",
    cache: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listartipoPoliza += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#clasePiso1Agregar').append(listartipoPoliza);
    },
    error: function (xhr, status, error) {
      console.error("Error al cargar tipo de documentos: ", error);
    }
  });
}

function clasePiso2() {
  $('#clasePiso2Agregar').empty();
  $('#clasePiso2Agregar').append('<option value ="-">Seleccionar...</option>');
  var listartipoPoliza = "";

  $.ajax({
    url: "../api_adm_nortrans/claseMaquina/funListar.php",
    method: "GET",
    cache: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        listartipoPoliza += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#clasePiso2Agregar').append(listartipoPoliza);
    },
    error: function (xhr, status, error) {
      console.error("Error al cargar tipo de documentos: ", error);
    }
  });
}

//momento de modificacion 
function clasePiso1Modificar(id) {
  $('#clasePiso1Modificar').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/claseMaquina/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#clasePiso1Modificar').append(fila);
      $("#clasePiso1Modificar option[value='" + id + "']").attr("selected", true);
    }
  });
}

function clasePiso2Modificar(id) {
  $('#clasePiso2Modificar').empty();
  var fila = "";
  $.ajax({
    url: "../api_adm_nortrans/claseMaquina/funListar.php",
    method: "GET",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      for (var i in response) {
        fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
      }
      $('#clasePiso2Modificar').append(fila);
      $("#clasePiso2Modificar option[value='" + id + "']").attr("selected", true);
    }
  });
}