<?php

//$find = $fm -> newFindCommand('Web_Reportes_Certificados');
//$find -> addFindCriterion('TRACER_E_Fecha_Emision', '8-*-2016');

//echo "...buscando por fecha: ".$i."-*-2016</br>";
//$find -> addFindCriterion('TRA_Fecha_Creacion', '=='.$anio_actual);
//$find -> addFindCriterion('zz_Ingreso_Funci', 'WEB2');
//$find -> addFindCriterion('_TRACER_ID', '==201621484');


//$find -> addFindCriterion('TRACER_E_Fecha_Emision_Anio', '==2016');

$find = $fm -> newFindCommand('Reportes_MES');
$find -> addFindCriterion('RM_mesano', $anio_actual.'*');
$result = $find -> execute();

?>