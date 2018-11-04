<?php
if($ingr == 1 || $ingr == 2){
	$find = $fm -> newFindCommand('Tramite_Certificados_ano');
	if($anio != '' && $fecha_inicio =='' && $fecha_final =='')
		$find -> addFindCriterion('emision', $anio);
	else 
		$find -> addFindCriterion('emision', $fecha_inicio.'...'.$fecha_final);
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
}/*else if($ingr == 2){
	echo "1</br>";
	//$compoundFind = $fm->newCompoundFindCommand('Tramite_Certificados_ano');

	$find1 = $fm->newFindRequest('Tramite_Certificados_ano'); // Get all
	$find1 -> addFindCriterion('emision', $anio);

	$find2 = $fm->newFindRequest('Tramite_Certificados_ano'); // Get all
	$find2 -> addFindCriterion('usuario', '==WEB2');
	$find2 -> setOmit(true);
	
	if($cert == 2){
		$find3 = $fm->newFindRequest('Tramite_Certificados_ano'); // Get all
		$find3 -> addFindCriterion('tipo', 'AUP');
		echo "2</br>";
	}else if($cert == 3){
		$find3 = $fm->newFindRequest('Tramite_Certificados_ano'); // Get all
		$find3 -> addFindCriterion('tipo', 'CIP');
		echo "3</br>";
	}else if($cert == 4){
		$find3 = $fm->newFindRequest('Tramite_Certificados_ano'); // Get all
		$find3 -> addFindCriterion('tipo', 'NUM');
		echo "4</br>";
	}else if($cert == 5){
		$find3 = $fm->newFindRequest('Tramite_Certificados_ano'); // Get all
		$find3 -> addFindCriterion('tipo', 'INFUS');
		echo "5</br>";
	}
	$compoundFind = $fm->newCompoundFindCommand('Tramite_Certificados_ano');
	$compoundFind->add(1,$find1);
	$compoundFind->add(2,$find2);
	if($cert == 2 || $cert == 3 || $cert == 4 || $cert == 5){
		$compoundFind->add(3,$find3);
		echo "6</br>";
	}

	$result = $compoundFind->execute();
	echo "7</br>";
	
}*/else if($ingr == 3){
	$find = $fm -> newFindCommand('Tramite_Certificados_ano');
	//$find -> addFindCriterion('emision', $anio);
	//$find -> addFindCriterion('emision', '>='.$fecha_inicio);
	if($anio != '' && $fecha_inicio =='' && $fecha_final =='')
		$find -> addFindCriterion('emision', $anio);
	else 
		$find -> addFindCriterion('emision', $fecha_inicio.'...'.$fecha_final);
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
}
?>