<?php
$find = $fm -> newFindCommand('Personal');
$find -> addFindCriterion('RUT1 2',$rut);
$result = $find -> execute();

?>