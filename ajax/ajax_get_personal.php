<?php
include('../ctrl/start_ajax.php');
$output = array();
$output['found'] = false;
include('../mdl/m_get_personal.php');
include('../ctrl/error2.php');
if( $errorCode == 0 ){	//y el error es cero
	$record = ($result -> getRecords());
	$output['found'] = true;
	foreach ($record as $rec) {
		$output['rut_personal'][] = $rec->getField('RUT1 2')."-".$rec->getField('RUT_DV');
	}
}
echo json_encode($output);

?>