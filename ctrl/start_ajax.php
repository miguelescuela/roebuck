<?php
ini_set('error_reporting', E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT));
ini_set('display_errors', 'off'); // Set to Off in any production environment!

require_once ('../_lib/FileMaker.php') ;
include('../db/KoNectdB.php');

function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}

function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}

function base64_to_jpeg($base64_string, $output_file) {
    $ifp = fopen( $output_file, 'wb' ); 
    $data = explode( ',', $base64_string );
    fwrite( $ifp, base64_decode( $base64_string ) );
    fclose( $ifp ); 
    return $output_file; 
}

function RestarHoras($horaini,$horafin)
{
    $horai=substr($horaini,0,2);
    $mini=substr($horaini,3,2);
    $segi=substr($horaini,6,2);
 
    $horaf=substr($horafin,0,2);
    $minf=substr($horafin,3,2);
    $segf=substr($horafin,6,2);
 
    $ini=((($horai*60)*60)+($mini*60)+$segi);
    $fin=((($horaf*60)*60)+($minf*60)+$segf);
 
    $dif=$fin-$ini;
 
    $difh=floor($dif/3600);
    $difm=floor(($dif-($difh*3600))/60);
    $difs=$dif-($difm*60)-($difh*3600);
    return date("H:i:s",mktime($difh,$difm,$difs));
}

function SumarHoras($h1,$h2)
{
    $h2h = date('H', strtotime($h2));
    $h2m = date('i', strtotime($h2));
    $h2s = date('s', strtotime($h2));
    $hora2 =$h2h." hour ". $h2m ." min ".$h2s ." second";
     
    $horas_sumadas= $h1." + ". $hora2;
    return date('H:i:s', strtotime($horas_sumadas)) ;
}

?>