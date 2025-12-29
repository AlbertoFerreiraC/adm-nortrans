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

$idRendicion = $_GET["id"];

	$fecha_creacion      = "";
	$nro_orden_compra    = "";
	$sms                 = "";
	$proveedor           = "";
	$rut                 = "";
	$direccion_contacto  = "";
	$telefono_contacto   = "";
	$tipo_documento      = "";
	$estado              = "";
	$plazo               = "";
	$num_doc_proveedor   = "";
	$plazo_entrega       = "";

	$sub_total           = 0;
	$descuento_total     = 0;
	$exento_total        = 0;
	$neto_total          = 0;
	$iva_total           = 0;
	$total_general       = 0;

	$pre_aprueba         = "";
	$aprueba             = "";
	$fecha_pre_aprueba   = "";
	$fecha_aprueba       = "";
	$datosTareas = "";

			$consultaDatos = "select 
		date_format(gen.fecha_creacion,'%d/%m/%Y') fecha_creacion,
		gen.idgenerar_oc nro_orden_de_compra,
		(select sms from detalle_oc where generar_oc = gen.idgenerar_oc and estado ='ACTIVO' limit 1) sms,
		prov.descripcion proveedor,
		prov.rut,
		prov.direccion direccion_contacto,
		prov.telefono_contacto telefono_contacto,
		gen.tipo_documento_compra tipo_documento,
		gen.estado,
		pla.descripcion forma_de_pago,
		gen.num_doc_proveedor,
		gen.plazo_entrega,
		gen.sub_total,
		gen.descuento_total,
		gen.exento_total,
		gen.neto_total,
		gen.iva_total,
		gen.total_general,
		pre_aprueba.nombre pre_aprueba,
		aprueba.nombre aprueba,
		if(isnull(gen.fecha_pre_aprobacion),'',gen.fecha_pre_aprobacion) fecha_pre_aprueba,
		if(isnull(gen.fecha_aprobacion),'',gen.fecha_aprobacion) fecha_aprueba
		from generar_oc gen, proveedor prov, plazo_oc pla, usuario pre_aprueba, usuario aprueba
		where gen.idgenerar_oc = '".$idRendicion."' and gen.proveedor = prov.idproveedor and 
		gen.plazo_oc = pla.idplazo_oc and gen.pre_aprueba = pre_aprueba.idusuario and 
		gen.pre_aprueba2 = aprueba.idusuario";
			if ($resultadoDatos= $mysqli->query($consultaDatos)) {
				while ($fila = $resultadoDatos->fetch_assoc()) {
					$fecha_creacion     = $fila['fecha_creacion'];
					$nro_orden_compra   = $fila['nro_orden_de_compra'];
					$sms                = $fila['sms'];
					$proveedor          = $fila['proveedor'];
					$rut                = $fila['rut'];
					$direccion_contacto = $fila['direccion_contacto'];
					$telefono_contacto  = $fila['telefono_contacto'];
					$tipo_documento     = $fila['tipo_documento'];
					$estado             = $fila['estado'];
					$plazo              = $fila['forma_de_pago'];
					$num_doc_proveedor  = $fila['num_doc_proveedor'];
					$plazo_entrega      = $fila['plazo_entrega'];

					// Montos formateados para PDF
					$sub_total          = "$ ".number_format($fila['sub_total'], 0, ',', '.');
					$descuento_total    = "$ ".number_format($fila['descuento_total'], 0, ',', '.');
					$exento_total       = "$ ".number_format($fila['exento_total'], 0, ',', '.');
					$neto_total         = "$ ".number_format($fila['neto_total'], 0, ',', '.');
					$iva_total          = "$ ".number_format($fila['iva_total'], 0, ',', '.');
					$total_general      = "$ ".number_format($fila['total_general'], 0, ',', '.');

					$pre_aprueba        = $fila['pre_aprueba'];
					$aprueba            = $fila['aprueba'];
					$fecha_pre_aprueba  = $fila['fecha_pre_aprueba'];
					$fecha_aprueba      = $fila['fecha_aprueba'];
			    }
				$resultadoDatos->free();
			}
			
	$consultaTareas = "select 
(select cen.descripcion from detalle_sms deta, centro_de_costo cen where deta.centro_de_costo = cen.idcentro_de_costo and 
deta.iddetalle_sms = det.detalle_sms) centro_de_costo,
(select if(isnull(deta.repuestos),deta.insumos,deta.repuestos) from detalle_sms deta where deta.iddetalle_sms = det.detalle_sms) id_producto,
det.aplicacion,
det.unidad_de_medida,
det.cantidad,
det.costo_unitario,
det.valor_descuento,
det.sub_total
from detalle_oc det 
where det.generar_oc = '".$idRendicion."'";
if ($resultado = $mysqli->query($consultaTareas)) {
    while ($fila = $resultado->fetch_assoc()) {
        $datosTareas .= '<tr>'.
            '<td style="width:75px; font-size:7.5px;" class="estliFuente">'.
                $fila['centro_de_costo'].
            '</td>'.

            '<td style="width:50px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['id_producto'].
            '</td>'.

            '<td style="width:145px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['aplicacion'].
            '</td>'.

            '<td style="width:50px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['unidad_de_medida'].
            '</td>'.

            '<td style="width:50px; font-size:8px; text-align: center;" class="estliFuente">'.
                $fila['cantidad'].
            '</td>'.

			'<td style="width:50px; font-size:8px; text-align: center;" class="estliFuente">'.
                number_format($fila['costo_unitario'], 0, ',', '.').
            '</td>'.

			'<td style="width:60px; font-size:8px; text-align: center;" class="estliFuente">'.
                number_format($fila['valor_descuento'], 0, ',', '.').
            '</td>'.

            '<td style="width:60px; font-size:8px; text-align: center;" class="estliFuente">'.
                number_format($fila['sub_total'], 0, ',', '.').
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
					Orden de compra
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
						Nro. Orden de Compra
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$nro_orden_compra
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
						$sms
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
						Fecha
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$fecha_creacion 
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						RUT
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$rut 
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
						Razón Social
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$proveedor
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Forma de Pago
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$plazo
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
						Dirección
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$direccion_contacto
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Teléfono
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$telefono_contacto
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
						Tipo Documento
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$tipo_documento
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Nro. Documento
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$num_doc_proveedor
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
						Estado Actual
					</td>

					<td style="width:280px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$estado 
					</td>

					<td style="background-color:#EF6B00;
								color:white;
								width:70px;
								font-weight:bold;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						Plazo Entrega
					</td>

					<td style="width:90px;
								font-size:9px;
								font-style:italic;"
						class="estliFuente">
						$plazo_entrega
					</td>
				</tr>

			</tbody>
			</table>
		<br><br>
		<table border="0.5"  style="text-align: center;" cellpadding="1" cellspacing="0">
			<tbody>
				<tr>
					<td style="width:75px; line-height:15px; font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Centro de Costo
					</td>

					<td style="width:50px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						ID Producto
					</td>

					<td style="width:145px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Descripción
					</td>

					<td style="width:50px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						U.M.
					</td>

					<td style="width:50px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Cantidad
					</td>

					<td style="width:50px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Costo Unit.
					</td>

					<td style="width:60px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Descuento
					</td>

					<td style="width:60px; line-height:15px;  font-size:9px; background-color: #EF6B00;" class= "estliFuente">
						Costo
					</td>
				</tr>
				$datosTareas
			</tbody> 
		</table>
		<br><br>
		<table border="0.5" >
			<tbody>

				<tr>
				<td style="width:180px; font-size:9px; text-align:center;">
					V°B° Gerencia
				</td>

				<td style="width:180px; font-size:9px; text-align:center;">
					V°B° Adquisiciones
				</td>

				<td style="background-color:#EF6B00;color:white;width:80px;
							font-weight:bold;font-size:9px;font-style:italic;"
					class="estliFuente">
					Sub Total
				</td>

				<td style="width:100px;font-size:9px;font-style:italic;" class="estliFuente">
					$sub_total
				</td>
				</tr>

				<tr>
				<!-- ROWSPAN AQUÍ -->
				<td rowspan="5" style="width:180px; font-size:9px; text-align:center; vertical-align:bottom;">
					<br><br><br>
					Aprobado por: $aprueba<br>
					Fecha hora: $fecha_aprueba
				</td>

				<td rowspan="5" style="width:180px; font-size:9px; text-align:center; vertical-align:bottom;">
					<br><br><br>
					Aprobado por: $pre_aprueba<br>
					Fecha hora: $fecha_pre_aprueba
				</td>

				<td style="background-color:#EF6B00;color:white;width:80px;
							font-weight:bold;font-size:9px;font-style:italic;"
					class="estliFuente">
					Descuento Total
				</td>

				<td style="width:100px;font-size:9px;font-style:italic;" class="estliFuente">
					$descuento_total
				</td>
				</tr>

				<tr>
				<td style="background-color:#EF6B00;color:white;width:80px;
							font-weight:bold;font-size:9px;font-style:italic;"
					class="estliFuente">
					Exento
				</td>

				<td style="width:100px;font-size:9px;font-style:italic;" class="estliFuente">
					$exento_total
				</td>
				</tr>

				<tr>
				<td style="background-color:#EF6B00;color:white;width:80px;
							font-weight:bold;font-size:9px;font-style:italic;"
					class="estliFuente">
					Neto
				</td>

				<td style="width:100px;font-size:9px;font-style:italic;" class="estliFuente">
					$neto_total
				</td>
				</tr>

				<tr>
				<td style="background-color:#EF6B00;color:white;width:80px;
							font-weight:bold;font-size:9px;font-style:italic;"
					class="estliFuente">
					IVA
				</td>

				<td style="width:100px;font-size:9px;font-style:italic;" class="estliFuente">
					$iva_total
				</td>
				</tr>

				<tr>
				<td style="background-color:#EF6B00;color:white;width:80px;
							font-weight:bold;font-size:9px;font-style:italic;"
					class="estliFuente">
					Total
				</td>

				<td style="width:100px;font-size:9px;font-style:italic;" class="estliFuente">
					$total_general
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

$pdf->SetTitle('Orden de Compra - '.$idRendicion);

$pdf->AddPage();

$pdf->writeHTML($hoja1, false, false, false, false, '');


$pdf->Output('orden_de_compra_'.$idRendicion.'.pdf', 'I'); 

}else{
echo "Parámetros inválidos";
}// FIN FACTURA

?>

