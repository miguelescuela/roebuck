<?php
	include('ctrl/start.php');
	include('ctrl/session.php');
	if( isset( $_REQUEST['p'] ) && $_REQUEST['p']  != '' ) {
		switch( $_REQUEST['p'] ) {
			
			case('user_find'):
				$username = $_POST['username'];
				$password = $_POST['password'];
				include('mdl/m_find_user.php');
				include('ctrl/error2.php');
				if ($errorCode == 0){
					$_SESSION['rut_user'] = $username;
					include('vws/v_top.php');
					include('vws/v_panel_asistencia.php');
					include('vws/v_bottom.php');
				}else{
					include('vws/v_log_top.php');
					?>
					<br>
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
						<b> ADVERTENCIA:</b> 
						Contrase&ntilde;a y/o nombre de usuario incorrecto.
					</div>
					<a href="index.php" class="btn btn-lg btn-primary btn-block btn-start">
						<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> 
						Inicio
					</a>
					<?php
					include('vws/v_bottom.php');	
					die();
				}
			break;
			
			case('close_session'):
				if ( isset($_SESSION['rut_user']) && $_SESSION['rut_user'] != ''){
				  session_start();
				  unset($_SESSION["rut_user"]); 
				  unset($_SESSION["rutdv_user"]);
				  unset($_SESSION["tiempo"]);
				  unset($_SESSION['tiempo_sesion']);
				  
				  unset($pr); 
				  
				  session_destroy();
				  header("Location: index.php?p=pr&pr=1");
				  exit;
				  
				//include('vws/v_default.php');
				}else {
					include('vws/v_log_top.php');
					?>
					<br>
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
						<b> ADVERTENCIA:</b> 
						Usted debe iniciar sesi&oacute;n en el sistema para acceder a esta secci&oacute;n
					</div>
					<a href="index.php" class="btn btn-lg btn-primary btn-block btn-start">
						<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> 
						Inicio
					</a>
					<?php
					include('vws/v_bottom.php');	
					die();
				}
			break;
			
			case('pr'):
				$pr= $_GET['pr'];
				include('vws/v_log_top.php' );
				include('vws/v_default.php' );
				include('vws/v_bottom.php' );
			break;
		}//end switch

	}else{
		if ( isset($_SESSION['rut_user']) && $_SESSION['rut_user'] != ''){
			include('vws/v_top.php');
			include('vws/v_panel_asistencia.php');
			include('vws/v_bottom.php');
		}else{
			include('vws/v_log_top.php' );
			include('vws/v_default.php' );
			include('vws/v_bottom.php' );
		}
		
	}
?>