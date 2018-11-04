<?php
$rut = $_GET['rut'];
$fecha = $_GET['fecha'];
$rutt = explode("-", $rut);
$rut = $rutt[0];
include('../ctrl/start_ajax.php');
include('../mpdf_min/mpdf.php');
$output = array();
$output['found'] = false;
$output['foundTime'] = false;
include('../mdl/m_find_rut_a.php');
include('../ctrl/error2.php');
if( $errorCode == 0 ){	//y el error es cero
	$record = current($result -> getRecords());
	$output['found'] = true;
	$output['nombre'] = $record->getField('Nombre');
	$output['rutcompl'] = $record->getField('RUT1 2')."-".$record->getField('RUT_DV');
	$base64 = trim($record->getField('FotoB64'));
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$curdate = date('m/d/Y',strtotime($fecha));
	include('../mdl/m_find_time.php');
	include('../ctrl/error3.php');
	if ($errorCode == 0 ) {
		$output['foundTime'] = true;
		$records = current($result2 -> getRecords());
		$output['fechahoy'] = $records->getField('FechaHoy');
		$output['horain'] = $records->getField('HoraEntrada');
		$output['horaout'] = $records->getField('HoraSalida');
		$output['observaciones'] = $records->getField('observaciones');
		if ($output['horaout'] == '') $output['horaout'] = 'No se ha registrado hora de salida.';
		if ($output['observaciones'] == '') $output['observaciones'] = 'No se han registraron observaciones.';
		$profileimg = base64_to_jpeg($base64,'../images/ficha.jpeg');
		$pdf_body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<body style="font-family: Arial, Helvetica, sans-serif; padding-bottom: 20px;">
		<div style="position:fixed; left: 0; right: 0; bottom: 0; top: 0;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td bgcolor="#f0f0f0" style="padding: 20px 0 30px 0;">
						<table align="center" bordercolor="#CCCCCC" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
										<tr>
											<td align="center" bgcolor="#FFFFFF" style="padding: 40px 0 30px 0;">
												<table>
													<tr>
														<td style="padding: 5px 5px 5px 5px;" width="40%" align="center">
															<img src="../images/logos.png" alt="logo_solnet" width="136" height="36" style="display: block;" />
														</td>
														<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;" width="60%">
															<b>SOLNET S.A.</b><br/>
															<small>Ficha de Asistencia</small>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff">
												<hr style=" display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; ">
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td style="color: #153643; padding: 0 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 24px; line-height: 20px;">
															<img src="'.$profileimg.'" alt="profileimg" width="50" height="50" style="display: block;" /> <b>'.$output['nombre'].'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															RUT del Personal Asistente: <b>'.mb_strtoupper($output['rutcompl']).'</b><br/>
															Fecha de Asistencia: <b>'.obtenerFechaEnLetra($output['fechahoy']).'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															Hora de Entrada: <b>'.$output['horain'].'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															Hora de Salida: <b>'.$output['horaout'].'</b>
														</td>
													</tr>
													<tr>
														<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
															Observaciones: <br/><b>'.$output['observaciones'].'</b>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td bgcolor="#173644" style="padding: 30px 30px 30px 30px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="100%" style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
															Solnet S.A.<br/>
															La Concepción 81, of. 709, 1002 y 1003, Providencia, Santiago, Chile.<br/>
															<a href="www.solnet.cl" style="color: #ffffff;"><font color="#ffffff">www.solnet.cl</font></a>, Email: 
															<a href="mailto:solnet@solnet.cl" style="color: #ffffff;"><font color="#ffffff">solnet@solnet.cl</font></a>
															<br/>
															Mesa central: (+56 2) 22642026, Operaciones: (+56 2) 22649016
														</td>
													</tr>
												</table>
											</td>
										</tr>	
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
		';

		$footer = '
		<table style="width:100%;font-size:10px;">
			<tr>
				<td colspan=2 style="text-align:center;"> - {PAGENO} - </td>
			</tr>
		</table>
		';

		$mpdf = new mPDF('UTF-8',array(215.9,279.4)); #Set PDF format and Page Dimensions

		$mpdf->SetHTMLFooter($footer);
		//$mpdf->SetWatermarkText('Documento Informativo');
		//$mpdf->watermark_font = 'DejaVuSansCondensed';
		//$mpdf->showWatermarkText = true;
		$mpdf->WriteHTML($pdf_body);
		//$mpdf->showWatermarkText = true;
		$_pdf = "../fichas/ficha_".$rut.'_'.trim(str_replace('/','',$output['fechahoy'])).".pdf";
		$_pdf_js = "./fichas/ficha_".$rut.'_'.trim(str_replace('/','',$output['fechahoy'])).".pdf";
		$dest = "f";
		$mpdf->Output($_pdf,$dest);
		$output['pdf'] = $_pdf_js;
	}
	$output['horain'] = (isset($output['horain'])) ? $output['horain'] : "";
	$output['horaout'] = (isset($output['horaout'])) ? $output['horaout'] : "";

}
echo json_encode($output);

?>