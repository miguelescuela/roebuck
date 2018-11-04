<?php

$newRecord=$fm->newAddCommand('Web_Asistencia');

$newRecord->setField('Rut',$rut);
$newRecord->setField('HoraEntrada',$curtime);
$newRecord->setField('Observaciones','Ingreso WEB');

$resultado=$newRecord->execute();

?>