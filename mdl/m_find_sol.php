<?php
$compoundFind = $fm->newCompoundFindCommand('Web_Reportes_Solicitudes');

$find1 = $fm->newFindRequest('Web_Reportes_Solicitudes'); // Get all
$find1 -> addFindCriterion('zz_Fecha_Creacion_TS', $i.'-*-'.$anio_actual);
//$find -> addFindCriterion('_TRA_ID', '>=201600000');

$find2 = $fm->newFindRequest('Web_Reportes_Solicitudes'); // Get all
$find2 -> addFindCriterion('TRA_Estado', '==0');
$find2 -> setOmit(true);

$compoundFind->add(1,$find1);
$compoundFind->add(2,$find2);

$result = $compoundFind->execute();
?>