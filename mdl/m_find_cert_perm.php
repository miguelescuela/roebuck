<?php
$find = $fm -> newFindCommand('Reportes_MES');
$find -> addFindCriterion('RM_mesano', $anio_actual.'*');
$result = $find -> execute();
?>