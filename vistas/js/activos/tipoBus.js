$(document).ready(function () {

    TipoBusAsiento1();

    TipoBusAsiento2();

    cargarDatosTabla();

    $('#btnGrabarFicha').click(function () {
        agregarDatos();
    });

    $('#btnModificar').click(function () {
        modificarDatos();
    });

});

function agregarDatos() {
    var params = {
      "numeroPiso": $("#descripcionAgregar").val()
    };
    $.ajax({
      url: "../api_adm_nortrans/claseMaquina/funAgregar.php",
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


function TipoBusAsiento1() {
    $('#clasePiso1').empty();
    $('#clasePiso1').append('<option value ="-">Seleccionar...</option>');
    var listarBus = "";

    $.ajax({
        url: "../api_adm_nortrans/claseMaquina/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarBus += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#clasePiso1').append(listarBus);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}

function TipoBusAsiento2() {
    $('#clasePiso2').empty();
    $('#clasePiso2').append('<option value ="-">Seleccionar...</option>');
    var listarBus = "";

    $.ajax({
        url: "../api_adm_nortrans/claseMaquina/funListar.php",
        method: "GET",
        cache: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                listarBus += '<option value="' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#clasePiso2').append(listarBus);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar tipo de documentos: ", error);
        }
    });
}