<?php
$rut = $_GET['rut'];
$fi = $_GET['fi'];
$ff = $_GET['ff'];
$fi =  date('m/d/Y',strtotime($fi));
$ff =  date('m/d/Y',strtotime($ff));
$rutt = explode("-", $rut);
$rut = $rutt[0];
include('../ctrl/start_ajax.php');
$data ['found'] = false;
include('../mdl/m_find_timeRange.php');
include('../ctrl/error3.php');
if($errorCode == 0) {
	$data ['found'] = ture;
	$records = $result2 -> getRecords();
	$i = 0;
	foreach ($records as $record) {
		$data
		['fechas']
		[date('Y',strtotime($record->getField('FechaHoy')))]
		[date('m',strtotime($record->getField('FechaHoy')))]
		[date('d',strtotime($record->getField('FechaHoy')))]
		['dia'] = explode(',',obtenerFechaEnLetra(date('d-m-Y',strtotime($record->getField('FechaHoy')))))[0];
		$data
		['fechas']
		[date('Y',strtotime($record->getField('FechaHoy')))]
		[date('m',strtotime($record->getField('FechaHoy')))]
		[date('d',strtotime($record->getField('FechaHoy')))]
		['horain'] = $record->getField('HoraEntrada');
		$data
		['fechas']
		[date('Y',strtotime($record->getField('FechaHoy')))]
		[date('m',strtotime($record->getField('FechaHoy')))]
		[date('d',strtotime($record->getField('FechaHoy')))]
		['horaout'] = $record->getField('HoraSalida');;
		$i++;
	}
}

if (isset($data['fechas'])){
	foreach ($data['fechas'] as $year => $month_data) {
		foreach ($month_data as $month => $day_data) {
			$dim = cal_days_in_month(CAL_GREGORIAN, $month, $year);
			for ($day=1; $day <= $dim ; $day++) { 
				if($day<10) $day_i = "0".strval($day);
				else $day_i = strval($day);
				if (isset($day_data[$day_i])) $output[$year][$month][$day_i] = $day_data[$day_i];
				else {
					$day_set_text = explode(',',obtenerFechaEnLetra(date('d-m-Y',strtotime($day_i."-".$month."-".$year))))[0];
					$output[$year][$month][$day_i] = array('dia' => $day_set_text,'horain' => '','horaout' => '');
				}
			}
		}
	}
}

$columna = array();
$fila = array();
$horas_semana = '00:00:00';
$dia_semana = 1;
$numfila = 0;

foreach ($output as $anio => $mes_dato){
	foreach ($mes_dato as $mes => $dia_dato) {
		foreach ($dia_dato as $dia => $dato) {
			if ($dia_semana == 1) {
				$numfila++;
				$columna[] = $numfila;
			}
			if ($dato['horain'] != '' && $dato['horaout'] != ''){
				$horas_dia = RestarHoras($dato['horain'],$dato['horaout']);
				$horas_semana = SumarHoras($horas_semana,$horas_dia);
			}else{
				$horas_dia = "no se puede calcular";
			}
			
			if ($dia == "01" && $numfila == 1){
				switch ($dato['dia']) {
					case 'Lunes':
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 1;
						break;
					case 'Martes': 
					$columna[] = '---';
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 2;
						break;
					case 'Miércoles': 
					$columna[] = '---';
					$columna[] = '---';
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 3;
						break;
					case 'Jueves': 
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 4;
						break;
					case 'Viernes': 
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 5;
						break;
					case 'Sábado': 
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 6;
						break;
					case 'Domingo': 
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					$columna[] = '---';
					if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
					else
					$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
					$dia_semana = 7;
						break;
				}
			}else{
				if ($dato['horain'] == "") $columna[] = 'No se ha registrado asistencia.';
				else
				$columna[] = 'Entrada: '.$dato['horain'].'<br>Salida: '.$dato['horaout'].'<br>Horas Trabajadas: '.$horas_dia;
				$dia_semana++;
			}
			
			if($dato['dia'] == 'Domingo'){
				$columna[] = $horas_semana;
				$horas_semana = '00:00:00';
				$fila[] = $columna;
				unset($columna);
				$columna = array();
				$dia_semana = 1;
			}
		}
	}
}

$salida = array( "data" => $fila);

echo json_encode($salida);

?>