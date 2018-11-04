<?php

$RecordID = $resultado->getRecordId();
$editRecord = $fm -> newEditCommand("Web_Asistencia", $RecordID);

$editRecord -> setField('HoraSalida',$curtime);

$resultado = $editRecord -> execute();

?>