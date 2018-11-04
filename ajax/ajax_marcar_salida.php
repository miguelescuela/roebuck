<?php
$rut = $_GET['rut'];
include('../ctrl/start_ajax.php');
$output = array();
$output['saved'] = false;
$output['rutfound'] = false;
$output['entradafound'] = false;
include('../mdl/m_find_rut_a.php');
include('../ctrl/error2.php');
if( $errorCode == 0 ){	//y el error es cero
	$record = current($result -> getRecords());
	$output['rutfound'] = true;
	$nombre = $record->getField('Nombre');
	$rut = $record->getField('RUT1 2');
	$dv = $record->getField('RUT_DV');
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$curdate = date('m/d/Y');
	$curtime = date('H:i:s');
	//find entrada of today
	include('../mdl/m_find_entrada.php');
	include('../ctrl/error3.php');
	if( $errorCode == 0 ) {
		$output['entradafound'] = true;
		$resultado = current($result2 -> getRecords());
		include('../mdl/m_save_hour_out.php');
		include('../ctrl/error.php');
		if( $errorCode == 0 ) {
			$output['saved'] = true;
			$output['horaout'] = $curtime;
		} else { // If the updating of the record fails
			$output['saved'] = false;
			$output['horaout'] = "";
		}
	}else{
		$output['entradafound'] = false;
	}
}

echo json_encode($output);

?>