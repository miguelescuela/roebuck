<?php

$RecordID = $resultado->getRecordId();
$editRecord = $fm -> newEditCommand("Web_Asistencia", $RecordID);

$editRecord -> setField('HoraEntrada',$he);
$editRecord -> setField('HoraSalida',$hs);
$editRecord -> setField('Observaciones',$observaciones);

$resultado = $editRecord -> execute();

?>