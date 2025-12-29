<?php	
// Desactivar toda notificación de error
error_reporting(0);

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

$idRendicion = $_GET["id"];

	$idsms      = "";
	$empresa    = "";
	$fecha                 = "";
	$tipo           = "";
	$observacion           = "";

	$datosTareas = "";

			$consultaDatos = "select sm.idsms, em.descripcion empresa, date_format(sm.fecha_carga,'%d/%m/%Y %H:%i') fecha, sm.observacion,sm.tipo
				from sms sm, empresa em
				where sm.idsms = '".$idRendicion."' and sm.empresa =em.idempresa";
			if ($resultadoDatos= $mysqli->query($consultaDatos)) {
				while ($fila = $resultadoDatos->fetch_assoc()) {
					$idsms     = $fila['idsms'];
					$empresa   = $fila['empresa'];
					$fecha                = $fila['fecha'];
					$tipo          = $fila['tipo'];
					$observacion          = $fila['observacion'];
			    }
				$resultadoDatos->free();
			}
			
	$consultaTareas = "select 
		cen.descripcion centro_de_costo,
		det.aplicacion,
		det.tipo,
		if(isnull(det.insumos),(select repu.idrepuestos from repuestos repu where repu.idrepuestos = det.repuestos),
		(select pro.idproducto  from producto pro where pro.idproducto = det.insumos)) codigo,
		if(isnull(det.insumos),(select repu.descripcion from repuestos repu where repu.idrepuestos = det.repuestos),
		(select pro.descripcion  from producto pro where pro.idproducto = det.insumos)) descripcion,
		det.unidad_de_medida,
		det.cantidad
		from detalle_sms det, centro_de_costo cen
		where det.sms = '".$idRendicion."' and det.centro_de_costo = cen.idcentro_de_costo";
if ($resultado = $mysqli->query($consultaTareas)) {
	$contador = 0;
    while ($fila = $resultado->fetch_assoc()) {
		$contador++;
        $datosTareas .= '<tr>'.
            '<td style="width:30px; font-size:7.5px;" class="estliFuente">'.
                $contador.
            '</td>'.

            '<td style="width:70px; font-size:7px; text-align: center;" class="estliFuente">'.
                $fila['centro_de_costo'].
            '</td>'.

            '<td style="width:120px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['aplicacion'].
            '</td>'.

            '<td style="width:60px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['tipo'].
            '</td>'.

            '<td style="width:40px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['codigo'].
            '</td>'.

			'<td style="width:130px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['descripcion'].
            '</td>'.

			'<td style="width:50px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['unidad_de_medida'].
            '</td>'.

			'<td style="width:40px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['cantidad'].
            '</td>';
            
            
        $datosTareas .= '</tr>';
    }
    $resultado->free();
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


					 <td style="width:250px; font-size:8px; font-weight: bolt; font-style: italic; text-align: left;" class= "estliFuente" >
						SOCIEDAD DE TRANSPORTE NORTRANS SPA
						<br>
						76681140-K
						<br>
						Giro:  Serv. Transporte de Trabajadores, Transporte de carga por Carretera, Alquiler de Equipos sin
						operarios y otras actividades de dotación de Recursos Humanos
						<br>
						Av. Las Parcelas 2902 , ALTO HOSPICIO - +56 9 62298836
						<br>
						E-mail: logistica@nortrans.cl

					</td>
				</tr>
			</tbody> 
		</table>
		
		<br><br>
		<table border="0.5" cellpadding="3">
			<tbody>

				<!-- TÍTULO -->
				<tr>
				<td colspan="4"
					style="background-color:#EF6B00;
							color:white;
							width:540px;
							text-align:center;
							font-style:italic;
							font-size:14px;
							font-weight:bold;">
					SOLICITUD MATERIALES Y SERVICIOS
				</td>
				</tr>

				<!-- DATOS -->

				<tr>
					<td style="background-color:#EF6B00;
								color:white;
								width:100px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Fecha Carga
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$fecha
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Nro. SMS
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$idsms
					</td>
				</tr>

				<tr>
					<td style="background-color:#EF6B00;
								color:white;
								width:100px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Empresa
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$empresa 
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						TIpo Solicitud
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$tipo 
					</td>
				</tr>

				<tr>
					<td style="background-color:#EF6B00;
								color:white;
								width:100px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Observación
					</td>

					<td style="width:440px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$observacion 
					</td>					
				</tr>

				

			</tbody>
			</table>
		<br><br>
		<table border="0.5"  style="text-align: center;" cellpadding="1" cellspacing="0">
			<tbody>
				<tr>
					<td style="width:30px; line-height:15px; font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Item 
					</td>

					<td style="width:70px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Centro De Costo
					</td>

					<td style="width:120px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Aplicación
					</td>

					<td style="width:60px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Tipo
					</td>

					<td style="width:40px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Código
					</td>

					<td style="width:130px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Descripción
					</td>

					<td style="width:50px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						U.M.
					</td>

					<td style="width:40px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Cantidad
					</td>
				</tr>
				$datosTareas
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

$pdf->SetTitle('SMS - '.$idRendicion);

$pdf->AddPage();

$pdf->writeHTML($hoja1, false, false, false, false, '');


$pdf->Output('sms_'.$idRendicion.'.pdf', 'I'); 

}else{
echo "Parámetros inválidos";
}// FIN FACTURA

?>

