<?php
	session_cache_limiter('private, must-revalidate');
	$cache_limiter = session_cache_limiter();
	session_cache_expire(1440); //900/60 =15 horas
	$cache_expire = session_cache_expire();
	session_start();
	$_SESSION['tiempo_sesion'] = session_cache_expire() *60; // tiempo de sesion en segundos
	
	$tiempo_sesion= $_SESSION['tiempo_sesion']; //tiempo en segundos
	if(isset($_SESSION['tiempo'])){
		$vida_session= time() - $_SESSION['tiempo'];
		if($vida_session > $tiempo_sesion){
			//echo "EL TIEMPO DE LA SESION HA EXPIRADO";
			session_destroy();
			header("Location: index.php?p=pr&pr=2");
			//echo"<script language="javascript">window.location="ejem07d.php"</script>;"
		}
	}
	$_SESSION['tiempo']= time();
?>