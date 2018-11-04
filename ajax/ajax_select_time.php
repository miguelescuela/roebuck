<?php
$rut = $_GET['rut'];
$date = $_GET['date'];
include('../ctrl/start_ajax.php');
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
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$curdate = date('m/d/Y');
	$curdate = date_format(new DateTime($date), 'm-d-Y');
	include('../mdl/m_find_time.php');
	include('../ctrl/error3.php');
	if ($errorCode == 0 ) {
		$output['foundTime'] = true;
		$records = current($result2 -> getRecords());
		$output['fechahoy'] = $records->getField('FechaHoy');
		$output['horain'] = $records->getField('HoraEntrada');
		$output['horaout'] = $records->getField('HoraSalida');
	}
	$output['horain'] = (isset($output['horain'])) ? $output['horain'] : "";
	$output['horaout'] = (isset($output['horaout'])) ? $output['horaout'] : "";

}
echo json_encode($output);

?>