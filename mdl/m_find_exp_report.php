<?php
//if($ingr == 1 || $ingr == 2){
	$find = $fm -> newFindCommand('Web_Reportes_Expedientes');
	if($anio != '' && $fecha_inicio =='' && $fecha_final ==''){
		//echo "busq anio</br>";
		//$find -> addFindCriterion('TCo_Fecha_Ingreso', $anio);
		$find -> addFindCriterion('TCo_Fecha_Ingreso', '10-01-2016 ... 12-30-2016'); //867 results
		//$find -> addFindCriterion('Tramite_Solicitudes::TRA_Fecha_Creacion', '06-01-2016 ... 12-30-2016'); //867 results
	}else {
		//echo "busq fechas</br>";
		$find -> addFindCriterion('Tramite_Solicitudes::TRA_Fecha_Creacion', $fecha_inicio.'...'.$fecha_final);
	}
	/*if($depto == 2){
		//echo "2</br>";
		$find -> addFindCriterion('Tramite_Solicitudes::_TRA_Solicitud_Depto', 'VIVIENDA');
		$find -> addFindCriterion('Tramite_Solicitudes::_TRA_Solicitud_Depto', 'ALTURA');
	}else if($depto == 3){
		//echo "3</br>";
		$find -> addFindCriterion('Tramite_Solicitudes::_TRA_Solicitud_Depto', 'RECEPCIONES');
	}else if($depto == 4){
		//echo "4</br>";
		$find -> addFindCriterion('Tramite_Solicitudes::_TRA_Solicitud_Depto', 'URBANIZACION');
	}*/
	$result = $find -> execute();
/*}else if($ingr == 2){
	echo "1</br>";
	//$compoundFind = $fm->newCompoundFindCommand('Web_Reportes_Expedientes');

	$find1 = $fm->newFindRequest('Web_Reportes_Expedientes'); // Get all
	$find1 -> addFindCriterion('TCo_Fecha_Ingreso', $anio);

	$find2 = $fm->newFindRequest('Web_Reportes_Expedientes'); // Get all
	$find2 -> addFindCriterion('usuario', '==WEB2');
	$find2 -> setOmit(true);
	
	if($cert == 2){
		$find3 = $fm->newFindRequest('Web_Reportes_Expedientes'); // Get all
		$find3 -> addFindCriterion('tipo', 'AUP');
		echo "2</br>";
	}else if($cert == 3){
		$find3 = $fm->newFindRequest('Web_Reportes_Expedientes'); // Get all
		$find3 -> addFindCriterion('tipo', 'CIP');
		echo "3</br>";
	}else if($cert == 4){
		$find3 = $fm->newFindRequest('Web_Reportes_Expedientes'); // Get all
		$find3 -> addFindCriterion('tipo', 'NUM');
		echo "4</br>";
	}else if($cert == 5){
		$find3 = $fm->newFindRequest('Web_Reportes_Expedientes'); // Get all
		$find3 -> addFindCriterion('tipo', 'INFUS');
		echo "5</br>";
	}
	$compoundFind = $fm->newCompoundFindCommand('Web_Reportes_Expedientes');
	$compoundFind->add(1,$find1);
	$compoundFind->add(2,$find2);
	if($cert == 2 || $cert == 3 || $cert == 4 || $cert == 5){
		$compoundFind->add(3,$find3);
		echo "6</br>";
	}

	$result = $compoundFind->execute();
	echo "7</br>";
	
}else if($ingr == 3){
	$find = $fm -> newFindCommand('Web_Reportes_Expedientes');
	//$find -> addFindCriterion('TCo_Fecha_Ingreso', $anio);
	//$find -> addFindCriterion('TCo_Fecha_Ingreso', '>='.$fecha_inicio);
	if($anio != '' && $fecha_inicio =='' && $fecha_final =='')
		$find -> addFindCriterion('TCo_Fecha_Ingreso', $anio);
	else 
		$find -> addFindCriterion('TCo_Fecha_Ingreso', $fecha_inicio.'...'.$fecha_final);
	$find -> addFindCriterion('usuario', 'WEB2');
	if($cert == 2){
		$find -> addFindCriterion('tipo', 'AUP');
	}else if($cert == 3){
		$find -> addFindCriterion('tipo', 'CIP');
	}else if($cert == 4){
		$find -> addFindCriterion('tipo', 'NUM');
	}else if($cert == 5){
		$find -> addFindCriterion('tipo', 'INFUS');
	}
	$result = $find -> execute();
}*/
?>