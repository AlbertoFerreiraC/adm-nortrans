<?php
header("Access-Control-Allow-Origin: *");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Borrar el cache -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.::NORTRANS::.</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="vistas/img/plantilla/iconoNor.png" type="image/x-icon">

  <!-- PLUGINS DE CSS -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/exportDataTable.css" />
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
  <link rel="stylesheet" href="vistas/plugins/iCheck/line/orange.css">
  <link rel="stylesheet" href="vistas/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
  <link rel="stylesheet" href="vistas/bower_components/input-file/fileinput-rtl.min.css">
  <link rel="stylesheet" href="vistas/bower_components/input-file/fileinput.min.css">
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-select/select2.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <!-- PLUGINS DE JS -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/exportDataTable.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
  <script src="vistas/bower_components/chart.js/Chart.min.js"></script>
  <script src="vistas/bower_components/input-file/fileinput.min.js"></script>
  <script src="vistas/bower_components/input-file/sortable.min.js"></script>
  <script src="vistas/bower_components/bootstrap-select/select2.min.js"></script>


</head>

<body class="hold-transition skin-black sidebar-mini fixed" style="background-color: #E2E8E2;">

  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    include "modulos/cabezote.php";
    include "modulos/menu.php";

    if (isset($_GET["ruta"])) {

      $ruta = $_GET["ruta"];

      // GENERAL
      $paginasGenerales = ["salir", "inicio", "actualizacionDatos"];

      // RECURSOS HUMANOS
      $paginasRRHH = [
        "nacionalidad",
        "comuna",
        "afp",
        "salud",
        "antecedentesMedicos",
        "turnosLaborales",
        "empresa",
        "documento",
        "tipoEpp",
        "fichaEmpleado",
        "solicitudContratacion",
        "tipoequipo",
        "cargo",
        "fichaContrato",
        "preAprobacion",
        "aprobacion",
        "seleccionarFicha",
        "datosLaboralPorVencer",
        "solicitudContrPendiente",
        "solicitudDeContratacion",
        "cargoOrganizacional",
        "mantenedorAreaNegocio",
        "tipoAnexo",
        "tipoAntecedenteMedico",
        "tipoEstudio",
        "tipoTerminoContrato",
        "contactoParentesco",
        "requisitosSeleccion"
      ];

      // ACTIVOS
      $paginasActivos = [
        "docInformeMaquina",
        "deMaquina",
        "claseMaquina",
        "tipoBus",
        "tipoMaquina",
        "tipoDocumentoMaquina",
        "tipoEquipoMaquina",
        "tipoPolizaSeguro",
        "marcaChasis",
        "modeloChasis",
        "marcaCarroceria",
        "modeloCarroceria",
        "proveedor",
        "aseguradora"
      ];

      // CONTABILIDAD
      $paginasContabilidad = [
        "maestroProveedor",
        "cajaChica",
        "condiciondepago",
        "tipoProveedor",
        "comuna",
        "criticidad",
        "cliente",
        "aprobacionDeFondos",
        "asignacionDeFondos",
        "gestionRendicion",
        "preAprobacionDeFondos",
        "rendicion"
      ];

      // Bodegas
      $paginasBodegas = [
        "familiaRepuesto",
        "subfamiliaRepuesto",
        "demarca",
        "deModelo",
        "sistemaAplicacion",
        "unidadMedida",
        "motivoAjuste",
        "categoria",
        "subCategoria",
        "tipodocAjusteInventario",
        "maestroProducto",
        "maestroRepuesto",
        "listaSmsPendientes",
        "listaRecepcionOC",
        "listaEntregaSms",
        "ajusteInventario",
        "informeEntregaSms",
        "evaluacionProveedor",
        "deBodega"
      ];

      $paginasCompras = [
        "plazoOC",
        "pagoOC",
        "entregaOC",
        "solicitudMS",
        "docProveedor",
        "docCajaChica",
        "consultaOrdenCompra",
        "ocPendienteRecepcion",
        "consultaListaOc",
        "generarOc",
        "generarSMS",
        "listaOc",
        "listaDetOc",
        "consultaSMS",
        "listaSMS",
        "listaDetSMS",
        "historialProveedor",
        "historialRepuesto",
        "aprobarOC",
        "preAprobarSMS",
        "aprobarSMS",
        "anularSMS",
        "generarSMS"
      ];

      // GENERALES
      $paginasModGenerales = ["usuario", "centroDeCosto"];

      if (in_array($ruta, $paginasGenerales)) {
        include "modulos/$ruta.php";
      } elseif (in_array($ruta, $paginasRRHH)) {
        include "modulos/recursosHumanos/$ruta.php";
      } elseif (in_array($ruta, $paginasActivos)) {
        include "modulos/activos/$ruta.php";
      } elseif (in_array($ruta, $paginasContabilidad)) {
        include "modulos/contabilidad/$ruta.php";
      } elseif (in_array($ruta, $paginasBodegas)) {
        include "modulos/bodegas/$ruta.php";
      } elseif (in_array($ruta, $paginasCompras)) {
        include "modulos/compras/$ruta.php";
      } elseif (in_array($ruta, $paginasModGenerales)) {
        include "modulos/generales/$ruta.php";
      } else {
        include "modulos/404.php";
      }
    }
  } else {
    include "modulos/login.php";
  }
  ?>

  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/login.js"></script>

  <style type="text/css">
    .cajatexto {
      border: 1px solid #F46717;
      font-family: calibri;
      color: #403f3f;
    }

    .cajatexto:focus {
      border: 1px solid black;
      font-family: calibri;
      color: #403f3f;
    }

    #contenedorViajes {
      display: inline-block;
      vertical-align: top;
    }

    .spanLista {
      color: white;
      font-size: 13px;
    }

    .camposCheck {
      margin-bottom: 10px;
    }
  </style>

</body>

</html>