$(document).ready(function () {

    listarRepuestos();

    function listarRepuestos() {
        $.ajax({
            url: "../api_adm_nortrans/repuestos/funListarRepuestos.php",
            type: "GET",
            dataType: "json",
            cache: false,
            success: function (response) {
                if (response.status === "ok" && response.data.length > 0) {
                    llenarTabla(response.data);
                } else {
                    $("#tablaRepuestos tbody").html(
                        '<tr><td colspan="12" class="text-center">No hay repuestos registrados.</td></tr>'
                    );
                }
            },
            error: function (xhr) {
                console.error("Error AJAX:", xhr.responseText);
                swal("Error", "No se pudo obtener los repuestos.", "error");
            }
        });
    }

    function llenarTabla(data) {
        let filas = "";
        data.forEach((r, i) => {
            filas += `
                <tr>
                    <td>${i + 1}</td>
                    <td>${r.familia_repuesto}</td>
                    <td>${r.sub_familia_repuesto}</td>
                    <td>${r.marca_repuesto}</td>
                    <td>${r.modelo_repuesto}</td>
                    <td>${r.descripcion}</td>
                    <td>${r.aplicacion}</td>
                    <td>${r.stock_minimo}</td>
                    <td>${r.stock_maximo}</td>
                    <td>${r.ubicacion_x ?? '-'} / ${r.ubicacion_y ?? '-'}</td>
                    <td>
                        <span class="${r.estado === 'Activo' ? 'estado-activo' : 'estado-inactivo'}">
                            ${r.estado}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm btnVerRepuesto" data-id="${r.idrepuestos}">
                            <i class="fa fa-eye"></i> Ver
                        </button>
                    </td>
                </tr>
            `;
        });
        $("#tablaRepuestos tbody").html(filas);
    }

    // Ver detalle
    $(document).on("click", ".btnVerRepuesto", function () {
        const idRepuesto = $(this).data("id");
        $.ajax({
            url: "../api_adm_nortrans/repuestos/funVerRepuesto.php",
            type: "POST",
            dataType: "json",
            data: { idRepuesto: idRepuesto },
            success: function (res) {
                if (res.status === "ok") {
                    mostrarDetalle(res.data);
                    $("#modalVerRepuesto").modal("show");
                } else {
                    swal("Aviso", "No se encontraron datos del repuesto.", "info");
                }
            },
            error: function (xhr) {
                console.error("Error AJAX:", xhr.responseText);
                swal("Error", "No se pudo cargar el detalle.", "error");
            }
        });
    });

    function mostrarDetalle(data) {
        $("#verFamilia").text(data.familia_repuesto);
        $("#verSubFamilia").text(data.sub_familia_repuesto);
        $("#verMarca").text(data.marca_repuesto);
        $("#verModelo").text(data.modelo_repuesto);
        $("#verSistema").text(data.sistema_de_aplicacion);
        $("#verCodigo").text(data.codigo_de_lectura);
        $("#verDescripcion").text(data.descripcion);
        $("#verAplicacion").text(data.aplicacion);
        $("#verAnhoDesde").text(data.anho_desde);
        $("#verAnhoHasta").text(data.anho_hasta);
        $("#verStockMinimo").text(data.stock_minimo);
        $("#verStockMaximo").text(data.stock_maximo);
        $("#verStockReposicion").text(data.stock_reposicion);
        $("#verUbicacionX").text(data.ubicacion_x);
        $("#verUbicacionY").text(data.ubicacion_y);
        $("#verEstado").text(data.estado);
    }

});