<?php
//header ("Content-Type:text/html;charset=UTF-8");
include('mysql_connect.php');
include('session.php');

ini_set('error_reporting', E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT));
//ini_set('error_reporting', E_ALL );
ini_set('display_errors', 'off'); // Set to Off in any production environment!

//ini_set('error_reporting', E_ALL | E_STRICT);
//ini_set('display_errors', 'Off'); // Set to Off in any production environment!



//$db = db::getInstance("localhost","root","","c17sew"); //LOCAL
//$db = db::getInstance("localhost","c17filedom","bd.net20","c17sew"); //TEST
//$db = db::getInstance("localhost","c17filedom","bd.net20","c17digital_filedomLF"); //PROD

//$con = $db -> conectar();

require_once ('_lib/FileMaker.php') ;
include('db/KoNectdB.php');

?>