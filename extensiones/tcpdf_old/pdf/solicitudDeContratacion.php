<?php	
// Desactivar toda notificación de error
//error_reporting(0);

header('Content-type: text/html; charset=utf-8');

if(isset($_GET['id'])){

require_once('tcpdf_include.php');

//*********************************************************************************
//CONEXIÓN DIRECTA // 
$mysqli = new mysqli("186.16.32.139", "root", "root@uli123.", "adm_nortrans");
/* comprobar la conexión */
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

$nroSolicitud = "";
$fechaSolicitud = "";
$nombre = "";
$cargo = "";

$razonSocial = "";
$motivoSolicitud = "";
$detalleMotivo = "";
$cargoSilicitado = "";
$cantidadSolicitada = "";
$tipoEquipo = "";
$licenciaMunicipal = "";
$centroDeCosto = "";
$jefatura = "";

$tipoJornada = "";
$tipoContrato = "";
$fechaRequerida = "";
$fechaCeseContrato = "";
$remuneracion = "";
$aprueba = "";
$fechaAprueba = "";
$preAprueba = "";
$fechaPreAprueba = "";



$idRendicion = $_GET["id"];
			$consultaDatos = "SELECT con.idcontratacion AS nroSolicitud,
				date_format(con.fecha_requerida,'%d/%m/%Y') AS fechaSolicitud,
				concat(per.nombre,' ',per.apellido)  AS nombre,
				car.descripcion AS cargoSolicitante,
				con.motivo AS motivoSolicitud,
				car.descripcion AS cargoSolicitado,
				con.cantidad_solicitada AS cantidad,
				tib.descripcion AS tipoequipo,
				con.licencia_de_conducir AS licencia,
				emp.descripcion AS razonSocial,
				con.cargo AS verjefatura,
				tl.descripcion AS tipoJornada,
				con.tipo_contrato AS contrato,
				date_format(con.fecha_requerida,'%d/%m/%Y')AS fechaRequerida,
				con.fecha_termino AS fechaTermino,
				con.remuneracion AS remuneracion,
				(select nombre from usuario where idusuario = con.pre_aprueba) AS preaprueba,
				(select nombre from usuario where idusuario = con.aprueba)  AS aprueba,
				con.fecha_pre_aperobacion AS fecha_pre_aprobacion,
				con.fecha_aprobacion AS fecha_aprobacion,
				cdc.descripcion AS centro_de_costo
				FROM contratacion con
				JOIN ficha_contrato fic ON fic.contratacion = con.idcontratacion
				JOIN personal per ON per.idpersonal = fic.personal
				JOIN cargo car ON car.idcargo = con.cargo
				JOIN tipo_bus tib ON tib.idtipo_bus = con.tipo_bus
				JOIN empresa emp ON emp.idempresa = con.empresa
				JOIN turnos_laborales tl ON tl.idturnos_laborales = con.turnos_laborales
				JOIN centro_de_costo cdc ON cdc.idcentro_de_costo = con.centro_de_costo 
				where con.idcontratacion = '".$idRendicion."'";
			if ($resultadoDatos= $mysqli->query($consultaDatos)) {
				while ($fila = $resultadoDatos->fetch_assoc()) {
					$nroSolicitud = $fila['nroSolicitud']; 
					$fechaSolicitud = $fila['fechaSolicitud']; 
					$nombre = $fila['nombre']; 
					$cargo = $fila['cargoSolicitante']; 

					$razonSocial = $fila['razonSocial']; 
					$motivoSolicitud = $fila['motivoSolicitud']; 
					$detalleMotivo = ""; // NO HAY
					$cargoSilicitado = $fila['cargoSolicitante']; 
					$cantidadSolicitada = $fila['cantidad']; 
					$tipoEquipo = $fila['tipoequipo']; 
					$licenciaMunicipal = $fila['licencia']; 
					$centroDeCosto = $fila['centro_de_costo']; 
					$jefatura = ""; // NO HAY

					$tipoJornada = $fila['tipoJornada']; 
					$tipoContrato = $fila['contrato']; 
					$fechaRequerida = $fila['fechaRequerida']; 
					$fechaCeseContrato = $fila['fechaTermino']; 
					$remuneracion = "$".number_format($fila['remuneracion'], 0, ',', '.');
					$aprueba = $fila['aprueba']; 
					$fechaAprueba = $fila['fecha_aprobacion']; 
					$preAprueba = $fila['preaprueba']; 
					$fechaPreAprueba = $fila['fecha_pre_aprobacion']; 
			    }
				$resultadoDatos->free();
			}	


//***************************************************************** */	

$footer = <<<EOF
<table border="0" style="text-align: center; ">
<tbody>
	<tr>	
		<td style="width:540px; text-align: justify; font-size:8px;">
			
		 </td>
	</tr>
</tbody> 
</table>


EOF;



$hoja1 = <<<EOF

	<style>
		.estliFuente{
			font-family: times;
		}
	</style>
	
		<br><br>

		<table border="0" >
			<tbody>
				<tr>		
					<td style="width:40px;" style="text-align: center;">
					<div style="font-size:16px;">&nbsp;</div>
						<img  src="nortrans.png"/> 
					 </td>

					 <td style="width:110px;">
					 </td>


					 <td style="width:300px; font-size:12px; font-weight: bolt; font-style: italic; text-align: left;" class= "estliFuente" >
						Sistema de Gestión de Calidad
						<br>
						R.PSGC.005.01
						<br>
						Rev 0.0
						<br>
						Julio 2022
						<br>
						Registro de Solicitud de Contratación de personal

					</td>
				</tr>
			</tbody> 
		</table>
		
		<br><br>
		<table border="0.5" cellpadding="3">
			<tbody>
				<tr>
					<td style="background-color: #EF6B00; color: white; width:540px; text-align: center; font-style: italic; font-size:11x; font-weight: bolt;">
						REGISTRO DE SOLICITUD DE CONTRATACIÓN DE PERSONAL
					</td>
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:540px; text-align: center; font-style: italic; font-size:11px;">
						Antecedentes del Solicitante
					</td>
				</tr>



				<tr>
					<td style="background-color: #EF6B00; color: white; width:90px; font-size:10px; font-style: italic;" class= "estliFuente" >
						 N° Solicitud
					</td>

					<td style="font-size:450px; font-size:10px; font-style: italic;" class= "estliFuente" >
				        $nroSolicitud
						<div style="font-size:3px;">&nbsp;</div>
					</td>				
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:90px; font-size:10px; font-style: italic;" class= "estliFuente" >
						 Fecha de Solicitud
					</td>

					<td style="font-size:450px; font-size:10px; font-style: italic;" class= "estliFuente" >
				        $fechaSolicitud
						<div style="font-size:3px;">&nbsp;</div>
					</td>				
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:90px; font-size:10px; font-style: italic;" class= "estliFuente" >
						 Nombre
					</td>

					<td style="font-size:450px; font-size:10px; font-style: italic;" class= "estliFuente" >
				        $nombre
						<div style="font-size:3px;">&nbsp;</div>
					</td>				
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:90px; font-size:10px; font-style: italic;" class= "estliFuente" >
						 Cargo
					</td>

					<td style="font-size:450px; font-size:10px; font-style: italic;" class= "estliFuente" >
				        $cargo
						<div style="font-size:3px;">&nbsp;</div>
					</td>				
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:540px; text-align: center; font-style: italic; font-size:11px;">
						 Antecedentes Generales del Cargo Solicitado
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   1
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Razón social
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$razonSocial
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   2
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Motivo de la solicitud
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$motivoSolicitud
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   3
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Detalle del motivo
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$detalleMotivo
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   4
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Cargo solicitado
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$cargoSilicitado
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   5
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Cantidad solicitada
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$cantidadSolicitada 
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   6
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						    En caso de conductores, tipo de equipo a asignar
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$tipoEquip0	
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   7
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Licencia municipal requerida
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$licenciaMunicipal
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   8
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Centro de costo asociado
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$centroDeCosto
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>				

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   9
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Jefatura directa responsable
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$jefatura
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:540px; text-align: center; font-style: italic; font-size:11px;">
						  Requisitos Contractuales
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   10
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Tipo de Jornada
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$tipoJornada 
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   11
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Tipo de contrato (plazo)
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$tipoContrato
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   12
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Fecha requerida (a disposición)
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$fechaRequerida
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   13
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Fecha de cese de contrato (en caso de obra o plazo fijo)
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$fechaCeseContrato
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   14
					</td>

					<td style="width:200px; font-size:10px; font-style: normal;" >
						   Remuneración líquida pactada
					</td>	
					
					<td style="width:300px; font-size:10px; font-style: normal;" >
						$remuneracion 
						<div style="font-size:3px;">&nbsp;</div>
					</td>
				</tr>

				<tr>
					<td style="background-color: #EF6B00; color: white; width:540px; text-align: center; font-style: italic; font-size:11px;">
						  Requisitos de Selección
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >

					</td>

					<td style="width:150px; font-size:10px; font-style: normal;" >
						    Requisito
					</td>	

					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   Si
					</td>

					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   No
					</td>

					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   N/A
					</td>
					
					<td style="width:230px; font-size:10px; font-style: normal;"  >
						   Observación
					</td>
				</tr>

				<tr>
					<td style="width:40px; font-size:10px; font-style: normal;"  >
							  15
					</td>

					<td style="width:150px; font-size:10px; font-style: normal;" >
						    Candidato recomendado
					</td>	

					<td style="width:40px; font-size:10px; font-style: normal;"  >
						   
					</td>

					<td style="width:40px; font-size:10px; font-style: normal;"  >
						  
					</td>

					<td style="width:40px; font-size:10px; font-style: normal;"  >
						  
					</td>
					
					<td style="width:230px; font-size:10px; font-style: normal;"  >
						   
					</td>
				</tr>

			</tbody> 
		</table>
		<br><br>
		<table border="0.5" >
			<tbody>
				<tr>		
					<td style="width:220px; font-size:9px; text-align: center;">
 						V°B° Gerencia
					 </td>

					 <td rowspan="2" style="width:100px;" >
					 <div style="font-size:3px;">&nbsp;</div>
					 </td>

					 <td style="width:220px; font-size:9px; text-align: center;">
						V°B° Pre aprobación
					 </td>
				</tr>

				<tr>		
					<td style="width:220px; font-size:9px; text-align: center;">
							<br><br><br>
							Aprobado por: $aprueba
							<br>
							Fecha hora: $fechaAprueba
					 </td>


					 <td style="width:220px; font-size:9px; text-align: center;">
					 		<br><br><br>
							Aprobado por: $preAprueba
							<br>
							Fecha hora: $fechaPreAprueba
					 </td>
				</tr>
			</tbody> 
		</table>
EOF;



class MYPDF extends TCPDF {

   public function Footer(){
	$this->SetY(-30);
	$this->RoundedRect(10, 280, 190, 0, 0.50, '0000'); // Imagen	
	$this->writeHTML($GLOBALS['footer'], false, false, false, false, '');
   }
 
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetAutoPageBreak(true,30);

$pdf->setTopMargin(2);

$pdf->SetTitle('Solicitud de Contratación - '.$idRendicion);

$pdf->AddPage();

$pdf->writeHTML($hoja1, false, false, false, false, '');


$pdf->Output('solicitud_de_contratacion_'.$idRendicion.'.pdf', 'I'); 

}else{
echo "Parámetros inválidos";
}// FIN FACTURA

?>

