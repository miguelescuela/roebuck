<?php
$rut = $_GET['rut'];
include('../ctrl/start_ajax.php');
$output = array();
$output['found'] = false;
include('../mdl/m_find_rut_a.php');
include('../ctrl/error2.php');
if( $errorCode == 0 ){	//y el error es cero
	$record = current($result -> getRecords());
	$output['found'] = true;
	$nombre = $record->getField('Nombre');
	$rut = $record->getField('RUT1 2');
	$dv = $record->getField('RUT_DV');
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$curdate = date('m/d/Y');
	$curtime = date('H:i:s');
	$output['saved'] = false;
	include('../mdl/m_save_hour_in.php');
	include('../ctrl/error2.php');
	if( $errorCode == 0 ) {
		$output['saved'] = true;
		$output['horain'] = $curtime;
	} else { // If the creation of the record fails
		$output['horain'] = "";
	}


}

echo json_encode($output);

?>