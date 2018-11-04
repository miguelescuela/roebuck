<?php

$newRecord=$fm->newAddCommand('Web_Asistencia');

$newRecord->setField('Rut',$rut);
$newRecord->setField('FechaHoy',$fa);
$newRecord->setField('HoraEntrada',$he);
$newRecord->setField('HoraSalida',$hs);
$newRecord->setField('Observaciones',$observaciones);

$resultado=$newRecord->execute();

?>