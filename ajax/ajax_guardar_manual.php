<?php
$rut = $_GET['rut'];
$fi = $_GET['fi'];
$fa = $_GET['fa'];
$he = $_GET['he'];
$hs = $_GET['hs'];
$obs = $_GET['obs'];
include('../ctrl/start_ajax.php');
$fx = new DateTime($fi);
$fi = date_format($fx, 'm-d-Y');
$fi2 = date_format($fx, 'd-m-Y');
$fa = new DateTime($fa);
$fa = date_format($fa, 'm-d-Y');

$obs = str_replace ('|','',$obs);
if ($obs == "") $obs = "Sin observaciones por parte del personal";
$observaciones = "Ingreso Manual WEB: ".PHP_EOL."Observaciones: | ".$obs." |".PHP_EOL;
if ($hs == "") $observaciones = $observaciones . "Se ha realizado el ingreso de la Entrada de forma manual.";
else $observaciones = $observaciones . "Se ha realizado el ingreso de la Entrada y la Salida de forma manual.";
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
	$curtime = date('H:i:s');
	$observaciones = $observaciones . PHP_EOL . "Fecha de Creacion: " . $fi2 . " " . $curtime;
	$curdate = $fa;
	//find entrada of today
	include('../mdl/m_find_entrada.php');
	include('../ctrl/error3.php');
	if( $errorCode == 0 ) {
		$output['entradafound'] = true;
		$resultado = current($result2 -> getRecords());
		$observa = $resultado->getField('Observaciones');
		$hasdelimiter = strpos($observa,'|');
		if($hasdelimiter !== false){
			$arr_obs = explode('|', $observa);
			$hasdelimiter2 = strpos($arr_obs[1],'_.');
			if ($hasdelimiter2 !== false) {
				$arr_obs_detail = explode("_.", $arr_obs[1]);
				$arr_obs[1] = "";
				unset($arr_obs_detail[0]);
				foreach ($arr_obs_detail as $det) {
					$segm = explode(":", $det);
					$arr_obs[1] = $arr_obs[1]."_.".$segm[0].":".$segm[1];
					$numberof = trim($segm[0]);
				}
				$arr_obs[1] = $arr_obs[1] . '_.' . strval(intval($numberof) +1) . ': '.$obs;
				$observaciones = $arr_obs[0].'| '.$arr_obs[1].' |'.$arr_obs[2]. PHP_EOL . "Fecha de Actualización: " . $fi2 . " " . $curtime;
			}else{
				$obs = '_.1: '.$arr_obs[1].'_.2: '.$obs;
				$observaciones = $arr_obs[0].'| '.$obs.' |'.$arr_obs[2]. PHP_EOL . "Fecha de Actualización: " . $fi2 . " " . $curtime;
			}
		}
		$obs_regexplit = preg_split('/\\r\\n|\\r|\\n/', $observaciones);
		var_dump($obs_regexplit);
		if ($hs == "") $obs_regexplit[2] = "Se ha realizado el ingreso de la Entrada de forma manual.";
		else $obs_regexplit[2] = "Se ha realizado el ingreso de la Entrada y la Salida de forma manual.";
		$observaciones = implode(PHP_EOL,$obs_regexplit);
		die();
		include('../mdl/m_save_manual_update.php'); // update existing entry
		include('../ctrl/error.php');
		if( $errorCode == 0 ) {
			$output['saved'] = true;
		} else { // If the updating of the record fails
			$output['saved'] = false;
		}
	}else{
		$output['entradafound'] = false;
		include('../mdl/m_save_manual.php'); // create new entry
		include('../ctrl/error.php');
		if( $errorCode == 0 ) {
			$output['saved'] = true;
		} else { // If the updating of the record fails
			$output['saved'] = false;
		}
	}
}

echo json_encode($output);

?>