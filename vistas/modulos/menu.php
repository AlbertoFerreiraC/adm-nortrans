<input type="hidden" name="rol" id="rol" value="<?php echo $_SESSION['rol']; ?>">
<aside class="main-sidebar sidebar-open">

	<section class="sidebar">

		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $_SESSION["nombre"]; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> En Sesión</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" class="sidebar-form">
			<div class="input-group">
				<input type="text" id="buscadorPrincipal" class="form-control" placeholder="Buscador...">
				<span class="input-group-btn">
					<button type="button" id="btnBusquedaVentana" name="search" class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>

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
								<i class="fa fa-wrench"></i>
								<span>Mantenedor</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="nacionalidad"><i class="fa fa-cog"></i>Nacionalidad</a></li>
								<li><a href="comuna"><i class="fa fa-cog"></i>Comuna</a></li>
								<li><a href="afp"><i class="fa fa-cog"></i>AFP</a></li>
								<li><a href="salud"><i class="fa fa-cog"></i>Salud</a></li>
								<li><a href="turnosLaborales"><i class="fa fa-cog"></i>Turnos Laborales</a></li>
								<li><a href="empresa"><i class="fa fa-cog"></i>Empresa</a></li>
								<li><a href="documento"><i class="fa fa-cog"	></i>Documento</a></li>
								<li><a href="tipoEpp"><i class="fa fa-cog"></i>Tipo EPP</a></li>
								<li><a href="antecedentesMedicos"><i class="fa fa-cog"></i>Antecedentes Médicos</a></li>
								<li><a href="tipoequipo"><i class="fa fa-cog"></i>Tipo de equipo</a></li>
								<li><a href="cargo"><i class="fa fa-cog"></i>Cargos</a></li>
							</ul>
						</li>
						<li><a href="fichaEmpleado"><i class="fa fa-server"></i>Ficha Empleado</a></li>
						<li><a href="solicitudContratacion"><i class="fa fa-server"></i>Solicitud de Contratacion</a></li>
						<li><a href="preAprobacion"><i class="fa fa-server"></i>Pre Aprobación Solicitud</a></li>
						<li><a href="aprobacion"><i class="fa fa-server"></i>Aprobación Solicitud</a></li>
						<li><a href="fichaContrato"><i class="fa fa-server"></i>Ficha de Contrato</a></li>
						<li><a href="seleccionarFicha"><i class="fa fa-server"></i>Seleccionar Ficha</a></li>
					</ul>
				</li>

			<?php } ?>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-cog"></i>
					<span>Configuraciones</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="actualizacionDatos"><i class="fa fa-key"></i>Actualizar Mis datos</a></li>
					<li><a href="usuario"><i class="fa fa-bell-o"></i>Gestión de Usuarios</a></li>
					<li><a href="centroDeCosto"><i class="fa fa-bell-o"></i>Centro de Costo</a></li>
				</ul>
			</li>
			<li><a href="salir"><i class="fa fa-sign-out text-red"></i> <span>Cerrar Sesión</span></a></li>
		</ul>


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
</style>