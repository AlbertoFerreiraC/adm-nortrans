$(document).ready(function () {

    cargarDatosTabla();

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

    $.ajax({
        url: "../api_adm_nortrans/campania/funListar.php",
        method: "GET",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function (response) {
            let filas = "";

            response.forEach((item, index) => {
                filas += `
      <tr>
        <td>${index + 1}</td>
        <td>${item.fecha_creacion}</td>
        <td>${item.tipo_campaha}</td>
        <td>${item.tipo_frecuencia}</td>
        <td>${item.frecuencia}</td>
        <td>${item.comentario}</td>
        <td>${item.fecha_desde}</td>
        <td>${item.fecha_hasta}</td>
        <td>
          <center>
            <div class="btn-group">
              <button 
                title="Modificar" 
                class="btn btn-warning btnModificar" 
                id="${item.idcampanha}" 
                data-toggle="modal" 
                data-target="#modalModificar">
                <i class="fa fa-pencil"></i>
              </button>

              <button 
                title="Eliminar" 
                class="btn btn-danger btnEliminar" 
                id="${item.idcampanha}">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </center>
        </td>
      </tr>
    `;

            });

            $("#tabla tbody").append(filas);

            $(".btnModificar").on("click", function () {
                obtenerDatosParaModificar(this.id);
            });

            $(".btnEliminar").on("click", function () {
                const id_registro = this.id;

                swal({
                    title: "¿Está seguro de anular el registro?",
                    text: "¡Si no lo está puede cancelar la acción!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, anular registro"
                }).then(result => {
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
        "fecha_creacion": $("#creacionAgregar").val(),
        "tipo_campaha": $("#tipoCampañaAgregar").val(),
        "descripcion": $("#descripcionAgregar").val(),
        "tipo_frecuencia": $("#tipoFrecuenciaAgregar").val(),
        "frecuencia": $("#frecuenciaAgregar").val(),
        "comentario": $("#comentarioAgregar").val(),
        "fecha_desde": $("#desdeAgregar").val(),
        "fecha_hasta": $("#hastaAgregar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/campania/funAgregar.php",
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
        url: "../api_adm_nortrans/campania/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#creacionModificar").val(response[i].fecha_creacion);
                $("#tipoCampañaModificar").val(response[i].tipo_campaha);
                $("#descripcionModificar").val(response[i].descripcion);
                $("#tipoFrecuenciaModificar").val(response[i].tipo_frecuencia);
                $("#frecuenciaModificar").val(response[i].frecuencia);
                $("#comentarioModificar").val(response[i].comentario);
                $("#desdeModificar").val(response[i].fecha_desde);
                $("#hastaModificar").val(response[i].fecha_hasta);
                $("#idModificar").val(response[i].idcampanha);

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
        "fecha_creacion": $("#creacionModificar").val(),
        "tipo_campaha": $("#tipoCampañaModificar").val(),
        "descripcion": $("#descripcionModificar").val(),
        "tipo_frecuencia": $("#tipoFrecuenciaModificar").val(),
        "frecuencia": $("#frecuenciaModificar").val(),
        "comentario": $("#comentarioModificar").val(),
        "fecha_desde": $("#desdeModificar").val(),
        "fecha_hasta": $("#hastaModificar").val(),
        "idcampanha": $("#idModificar").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/campania/funModificar.php",
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
        url: "../api_adm_nortrans/campania/funEliminar.php",
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