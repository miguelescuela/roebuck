<?php
$find = $fm -> newFindCommand('Web_Asistencia');
$find -> addFindCriterion('Rut',$rut);
$find -> addFindCriterion('FechaHoy',$curdate);
$result2 = $find -> execute();

?>