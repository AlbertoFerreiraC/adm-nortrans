$(document).ready(function () {

    cargarDatosTabla();

    $('#btnGuardar').click(function () {
        agregarDatos();
    });

    $('#btnActualizar').click(function () {
        modificarDatos();
    });

    // Filtrado dinámico sin crear múltiples listeners
    $('#filtradoDinamico').on('keyup', function () {
        const texto = $(this).val().toLowerCase();
        $("#tabla tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(texto) > -1);
        });
    });
});


function cargarDatosTabla() {
    $("#tabla tbody").empty();
    $.ajax({
        url: "../api_adm_nortrans/personalTecnico/funListar.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            let fila = "";
            for (let i = 0; i < response.length; i++) {
                const item = response[i];
                fila += `
                    <tr>
                        <td class="text-center">${i + 1}</td>
                        <td class="text-center">${item.rut || ''}</td>
                        <td class="text-center">${item.nombre || ''}</td>
                        <td class="text-center">${item.telefono || ''}</td>
                        <td class="text-center">${item.correo || ''}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button 
                                    title="Modificar" 
                                    class="btn btn-warning btnEditar"
                                    data-id="${item.id}"
                                    data-rut="${item.rut}"
                                    data-nombre="${item.nombre}"
                                    data-telefono="${item.telefono}"
                                    data-correo="${item.correo}"
                                    data-toggle="modal" 
                                    data-target="#modalEditar">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button 
                                    title="Eliminar" 
                                    class="btn btn-danger btnEliminar"
                                    data-id="${item.id}">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>`;
            }
            $("#tabla tbody").append(fila);

            $(".btnEditar").click(function () {
                const id = $(this).data("id");
                $("#idModificar").val(id);
                $("#rutEditar").val($(this).data("rut"));
                $("#nombreEditar").val($(this).data("nombre"));
                $("#telefonoEditar").val($(this).data("telefono"));
                $("#correoEditar").val($(this).data("correo"));
            });

            $(".btnEliminar").click(function () {
                const id = $(this).data("id");
                swal({
                    title: '¿Está seguro de eliminar este registro?',
                    text: "¡Esta acción no se puede deshacer!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.value) eliminarDatos(id);
                });
            });
        },
        error: function () {
            swal({
                type: "error",
                title: "Error al cargar los datos",
                text: "No se pudo obtener la información desde el servidor.",
                showConfirmButton: true
            });
        }
    });
}


function agregarDatos() {
    const params = {
        rut: $("#rutAgregar").val(),
        nombre: $("#nuevoNombre").val(),
        telefono: $("#telefonoAgregar").val(),
        correo: $("#correoAgregar").val()
    };

    $.ajax({
        url: "../api_adm_nortrans/personalTecnico/funAgregar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=UTF-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Registro cargado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else if (response.mensaje === "registro_existente") {
                swal({ type: "error", title: "El registro ya existe" });
            } else {
                swal({ type: "error", title: "Error al procesar la carga" });
            }
        },
        error: function () {
            swal({ type: "error", title: "No se pudo conectar con el servidor" });
        }
    });
}


function modificarDatos() {
    const params = {
        id: $("#idModificar").val(),
        rut: $("#rutEditar").val(),
        nombre: $("#nombreEditar").val(),
        telefono: $("#telefonoEditar").val(),
        correo: $("#correoEditar").val()
    };

    $.ajax({
        url: "../api_adm_nortrans/personalTecnico/funModificar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=UTF-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Registro modificado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else if (response.mensaje === "repetido") {
                swal({ type: "error", title: "El registro ya existe" });
            } else {
                swal({ type: "error", title: "Error al modificar el registro" });
            }
        },
        error: function () {
            swal({ type: "error", title: "No se pudo conectar con el servidor" });
        }
    });
}


function eliminarDatos(id) {
    const params = { id: id };
    $.ajax({
        url: "../api_adm_nortrans/personalTecnico/funEliminar.php",
        method: "POST",
        data: JSON.stringify(params),
        contentType: "application/json; charset=UTF-8",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response.mensaje === "ok") {
                swal({
                    type: "success",
                    title: "Registro eliminado con éxito",
                    confirmButtonText: "Aceptar"
                }).then(() => location.reload());
            } else {
                swal({ type: "error", title: "Error al eliminar el registro" });
            }
        },
        error: function () {
            swal({ type: "error", title: "No se pudo conectar con el servidor" });
        }
    });
}
