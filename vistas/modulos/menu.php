<input type="hidden" name="rol" id="rol" value="<?php echo $_SESSION['rol']; ?>">
<aside class="main-sidebar sidebar-open">

	<section class="sidebar">

		<div class="user-panel">
			<div class="pull-left image">
				<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $_SESSION["nombre"]; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> En Sesión</a>
			</div>
		</div>

		<ul class="sidebar-menu">

			<?php if ($_SESSION['rol'] == "Administrador") { ?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-book"></i>
						<span>Recursos Humanos</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-user"></i>
								<span>Personal</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="fichaEmpleado"><i class="fa fa-server"></i>Ficha Empleado</a></li>
								<li><a href="solicitudContratacion"><i class="fa fa-server"></i>Solicitud de Contratación</a></li>
								<li><a href="preAprobacion"><i class="fa fa-server"></i>Pre Aprobación Solicitud</a></li>
								<li><a href="aprobacion"><i class="fa fa-server"></i>Aprobación Solicitud</a></li>
								<li><a href="fichaContrato"><i class="fa fa-server"></i>Ficha de Contrato</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-users"></i>
								<span>Estructura</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="cargoOrganizacional"><i class="fa fa-cog"></i>Cargo Organizacional</a></li>
								<li><a href="mantenedorAreaNegocio"><i class="fa fa-cog"></i>Mantenedor Área <br>de Negocio</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-search"></i>
								<span>Consulta</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="datosLaboralPorVencer"><i class="fa fa-cog"></i>Datos Laborales por Vencer</a></li>
								<li><a href="solicitudContrPendiente"><i class="fa fa-cog"></i>Solicitud Contr. Pendientes</a></li>
								<li><a href="solicitudDeContratacion"><i class="fa fa-cog"></i>Solicitud De Contratación</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-wrench"></i>
								<span>Mantenedor</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu mantenedor-scroll">
								<li><a href="nacionalidad"><i class="fa fa-cog"></i>Nacionalidad</a></li>
								<li><a href="comuna"><i class="fa fa-cog"></i>Comuna</a></li>
								<li><a href="afp"><i class="fa fa-cog"></i>AFP</a></li>
								<li><a href="salud"><i class="fa fa-cog"></i>Salud</a></li>
								<li><a href="turnosLaborales"><i class="fa fa-cog"></i>Turnos Laborales</a></li>
								<li><a href="empresa"><i class="fa fa-cog"></i>Empresa</a></li>
								<li><a href="documento"><i class="fa fa-cog"></i>Documento</a></li>
								<li><a href="tipoEpp"><i class="fa fa-cog"></i>Tipo EPP</a></li>
								<li><a href="antecedentesMedicos"><i class="fa fa-cog"></i>Antecedentes Médicos</a></li>
								<li><a href="cargo"><i class="fa fa-cog"></i>Cargos</a></li>
								<li><a href="tipoequipo"><i class="fa fa-cog"></i>Tipo Equipo</a></li>
								<li><a href="tipoAnexo"><i class="fa fa-cog"></i>Tipo anexo</a></li>
								<li><a href="tipoEstudio"><i class="fa fa-cog"></i>Tipo de Estudio</a></li>
								<li><a href="tipoTerminoContrato"><i class="fa fa-cog"></i>Tipo Termino de Contrato</a></li>
								<li><a href="contactoParentesco"><i class="fa fa-cog"></i>Contacto Parentesco</a></li>
								<li><a href="requisitosSeleccion"><i class="fa fa-cog"></i>Requisitos de Selccion</a></li>
							</ul>
						</li>


					</ul>
				</li>
			<?php } ?>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-diamond"></i>
					<span>Activos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="treeview">
						<a href="#">
							<i class="fa fa-search"></i>
							<span>Consulta</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu ">
							<li><a href="docInformeMaquina"><i class="fa fa-key"></i>Informe de documento<br> Maquina</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-wrench"></i>
							<span>Mantenedor</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu mantenedor-scroll">
							<li><a href="deMaquina"><i class="fa fa-cog"></i>De Maquina</a></li>
							<li><a href="claseMaquina"><i class="fa fa-cog"></i> Clase Maquina </a></li>
							<li><a href="tipoBus"><i class="fa fa-cog"></i> Tipo Bus </a></li>
							<li><a href="tipoMaquina"><i class="fa fa-cog"></i> Tipo Maquina </a></li>
							<li><a href="tipoDocumentoMaquina"><i class="fa fa-cog"></i> Tipo Documento Maquina </a></li>
							<li><a href="tipoEquipoMaquina"><i class="fa fa-cog"></i> Tipo Equipamiento Maquina </a></li>
							<li><a href="tipoPolizaSeguro"><i class="fa fa-cog"></i> Tipo Poliza de Seguro </a></li>
							<li><a href="marcaChasis"><i class="fa fa-cog"></i> Marca Chasis </a></li>
							<li><a href="modeloChasis"><i class="fa fa-cog"></i> Modelo Chasis </a></li>
							<li><a href="marcaCarroceria"><i class="fa fa-cog"></i> Marca Carroceria </a></li>
							<li><a href="modeloCarroceria"><i class="fa fa-cog"></i> Modelo Carroceria </a></li>
							<li><a href="proveedor"><i class="fa fa-cog"></i>Proveedores</a></li>
							<li><a href="aseguradora"><i class="fa fa-cog"></i>Aseguradora</a></li>

						</ul>
					</li>

				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-calculator"></i>
					<span>Contabilidad</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="treeview">
						<a href="#">
							<i class="fa fa-search"></i>
							<span>Consulta</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu ">
							<li><a href=""><i class="fa fa-key"></i>Caja Chica</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-wrench"></i>
							<span>Mantenedor</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu mantenedor-scroll">
							<li><a href="maestroProveedor"><i class="fa fa-cog"></i>Maestro Proveedor</a></li>
							<li><a href="condiciondepago"><i class="fa fa-cog"></i>Condicion de Pago</a></li>
							<li><a href="tipoProveedor"><i class="fa fa-cog"></i>Tipo de Proveedor</a></li>
							<li><a href="comuna"><i class="fa fa-cog"></i>Comuna</a></li>
							<li><a href="criticidad"><i class="fa fa-cog"></i>Criticidad</a></li>
							<li><a href="cliente"><i class="fa fa-cog"></i>Clientes</a></li>

						</ul>
					</li>

				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-cubes"></i>
					<span>Bodegas</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">

					<li class="treeview">
						<a href="#">
							<i class="fa fa-sign-out"></i>
							<span>Salidas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href=""><i class="fa fa-wrench"></i> Entrega repuesto OT</a></li>
							<li><a href=""><i class="fa fa-archive"></i> Entrega de Productos</a></li>
							<li><a href=""><i class="fa fa-retweet"></i> Generar traspaso bodega</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Solicitar anulación<br>de entrega SMS</a></li>
							<li><a href=""><i class="fa fa-check-circle"></i> Aprobar solicitud anulación<br>Entrega SMS</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-sign-in"></i>
							<span>Entradas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href=""><i class="fa fa-file-text"></i> Recepción orden compra</a></li>
							<li><a href=""><i class="fa fa-check-circle"></i> Recepción de traspaso</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-cubes"></i>
							<span>Inventario</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href=""><i class="fa fa-file-text"></i> Informe de Inventario</a></li>
							<li><a href=""><i class="fa fa-check-circle"></i> Kardex producto</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Ajuste de inventario</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Stock Bodega - Producto</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Quiebre de Stock</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-list-alt"></i>
							<span>Consulta</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu ">
							<li><a href=""><i class="fa fa-file-text"></i> Lista SMS Pendiente</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Lista de recepción de OC</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Lista de entrega de SMS</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Consulta Ajuste de inventario</a></li>
							<li><a href=""><i class="fa fa-file-text"></i> Informe de entrega SMS</a></li>
							<li><a href=""><i class="fa fa-check-circle"></i> Evaluación de proveedor</a></li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-wrench"></i>
							<span>Mantenedor</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu mantenedor-scroll">
							<li><a href="maestroProducto"><i class="fa fa-th"></i> Maestro de producto</a></li>
							<li><a href="familiaRepuesto"><i class="fa fa-cogs"></i> Familia Repuestos</a></li>
							<li><a href="subfamiliaRepuesto"><i class="fa fa-sitemap"></i> Sub Familia Repuestos</a></li>
							<li><a href="demarca"><i class="fa fa-tags"></i> De Marca</a></li>
							<li><a href="deModelo"><i class="fa fa-car"></i> De Modelo</a></li>
							<li><a href="sistemaAplicacion"><i class="fa fa-cogs"></i> Sistema de Aplicación</a></li>
							<li><a href="unidadMedida"><i class="fa fa-balance-scale"></i> Unidad de Medida</a></li>
							<li><a href="motivoAjuste"><i class="fa fa-warning"></i> Motivo Ajuste Inventario</a></li>
							<li><a href="tipodocAjusteInventario"><i class="fa fa-file-text"></i> Tipo Documento de Ajuste<br>Inventario</a></li>
							<li><a href="categoria"><i class="fa fa-th-large"></i> Categoría</a></li>
							<li><a href="subCategoria"><i class="fa fa-th"></i> Sub Categoría</a></li>
						</ul>
					</li>


				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-cog"></i>
					<span>Configuraciones</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="actualizacionDatos"><i class="fa fa-key"></i>Actualizar Mis Datos</a></li>
					<li><a href="usuario"><i class="fa fa-bell-o"></i>Gestión de Usuarios</a></li>
					<li><a href="centroDeCosto"><i class="fa fa-bell-o"></i>Centro de Costo</a></li>
				</ul>
			</li>
			<li><a href="salir"><i class="fa fa-sign-out text-red"></i> <span>Cerrar Sesión</span></a></li>
		</ul>

	</section>
</aside>


<script>
	$(document).ready(function() {
		listaAccesos();
	});

	function listaAccesos() {
		$("#buscadorPrincipal").empty();
		var resulNombres = "";
		resulNombres = 'Cambiar Mi Contraseña|' +
			'Nacionalidad|' +
			'Comuna|' +
			'AFP|' +
			'Salud|' +
			'Turnos Laborales|' +
			'Empresa|' +
			'Documentos|' +
			'Ficha Empleado|' +
			'Centro de Costo|' +
			'Usuario|' +
			'Antecedentes Médicos|' +
			'Tipo EPP|';
		var datosNombre = resulNombres.trim();
		var filasNombre = datosNombre.split("|");
		$("#buscadorPrincipal").autocomplete({
			max: 5,
			source: filasNombre,
			autoFill: true
		});

	}



	$('#btnBusquedaVentana').click(function() {
		var valor = $("#buscadorPrincipal").val();
		if (valor == "Cambiar Mi Contraseña") {
			window.location.href = "actualizacionDatos";
		}
		if (valor == "Nacionalidad") {
			window.location.href = "nacionalidad";
		}
		if (valor == "Comuna") {
			window.location.href = "comuna";
		}
		if (valor == "AFP") {
			window.location.href = "afp";
		}
		if (valor == "Salud") {
			window.location.href = "salud";
		}
		if (valor == "Turnos Laborales") {
			window.location.href = "turnosLaborales";
		}
		if (valor == "Empresa") {
			window.location.href = "empresa";
		}
		if (valor == "Documentos") {
			window.location.href = "docuemnto";
		}
		if (valor == "Tipo EPP") {
			window.location.href = "tipoEpp";
		}

		if (valor == "Ficha Empleado") {
			window.location.href = "fichaEmpleado";
		}
		if (valor == "Centro de Costo") {
			window.location.href = "centroDeCosto";
		}
		if (valor == "Antecedentes Médicos") {
			window.location.href = "antecedentesMedicos";
		}
		if (valor == "Usuario") {
			window.location.href = "usuario";
		}
	});
</script>

<style>
	.ui-autocomplete {
		height: 280px;
		overflow-y: scroll;
		overflow-x: hidden;
	}

	.ui-autocomplete {
		z-index: 2147483647;
	}

	.mantenedor-scroll {
		max-height: 300px;
		overflow-y: auto;
		scrollbar-width: thin;
		scrollbar-color: hsl(0, 0.60%, 35.10%);
	}

	.mantenedor-scroll {
		max-height: 300px;
		overflow-y: auto;
		scrollbar-width: none;
	}

	.mantenedor-scroll::-webkit-scrollbar {
		width: 0px;
		background: transparent;
	}
</style>