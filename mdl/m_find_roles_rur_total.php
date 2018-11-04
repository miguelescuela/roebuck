<?php
$find = $fm -> newFindCommand('Web_Propiedad_Report');
$find -> addFindCriterion('Pro_Propie_Ubicacion', 'RURAL');
$result = $find -> execute();

?>