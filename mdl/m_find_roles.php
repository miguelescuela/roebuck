<?php
$find = $fm -> newFindCommand('Web_Propiedad_Report');
$find -> addFindCriterion('Pro_Valida','SI');
$find -> addFindCriterion('Pro_Propie_ROL', '*');
$result = $find -> execute();

?>