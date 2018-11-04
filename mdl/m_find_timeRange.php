<?php
$find = $fm -> newFindCommand('Web_Asistencia');
$find -> addFindCriterion('Rut',$rut);
$find -> addFindCriterion('FechaHoy', '>='.$fi);
$find -> addFindCriterion('FechaHoy', '<='.$ff);
$result2 = $find -> execute();

?>