$(document).ready(function () {

    cargarDatosTabla();

    $('#btnGrabarFicha').click(function () {
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
    $("#lista tbody").empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/instituciones/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<tr><td>' + (parseInt(i) + 1) + '</td><td>' + response[i].tipo_institucion + '</td>' +
                    '<td>' +
                    '<td>' + response[i].idinstitucion + '</td>' +
                    '<td>' + response[i].descripcion + '</td>' +
                    '<td>' + response[i].codigo_externo + '</td>' +
                    '<td>' + response[i].estado + '</td>' +
                    '<center>' +
                    '<div class="btn-group">' +
                    '<button title="Editar" class="btn btn-danger btnModificar" id="' + response[i].idinstitucion + '"><i class="fa fa-times"></i></button>' +
                    '</div>' +
                    '</center>' +
                    '</td>' +
                    +'</tr>';
            }
            $('#tabla').append(fila);

            $('.btnModificar').click(function () {
                obtenerDatosParaModificar(this.idinstitucion);
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
    var params = {
        "tipo_institucion": $("#tipoInstitucion").val(),
        "descripcion": $("#descripcion").val(),
        "codigo_externo": $("#codigoExterno").val()
    };
    $.ajax({
        url: "../api_adm_nortrans/instituciones/funAgregar.php",
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