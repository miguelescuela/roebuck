<?php
$find = $fm -> newFindCommand('Usuario_WEB');
$find -> addFindCriterion('nombre_Usuario_WEB','=='.$username);
$find -> addFindCriterion('password','=='.$password);
$result = $find -> execute();
?>