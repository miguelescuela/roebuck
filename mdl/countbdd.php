<?php 
function insertar($rut_busq) {
	//$db = db::getInstance("localhost","root","","c17sew"); //LOCAL
	//$db = db::getInstance("localhost","c17filedom","bd.net20","c17sew"); //TEST
	$db = db::getInstance("localhost","c17filedom","bd.net20","c17digital_filedomLF"); //PROD
	$con = $db -> conectar();
	
	$ip = $_SERVER[REMOTE_ADDR]; 
	$fecha_hora = date('Y-m-d H:i:s');
	$query = "INSERT INTO `login_log` (`id`, `ip`, `fecha_hora`, `rut_login`) VALUES ('', '$ip', '$fecha_hora', '$rut_busq');"; 
	//echo "QUERY: ".$query."</br>";
	$result = $db -> ejecutar($query);
}
?> 