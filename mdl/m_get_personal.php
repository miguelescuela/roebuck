<?php

$find = $fm -> newFindCommand('Personal_WEB');

$find -> addFindCriterion('Activo','==SI');

$result = $find -> execute();

?>