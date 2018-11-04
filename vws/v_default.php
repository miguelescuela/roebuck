<?php
	if( isset( $pr ) && $pr  != '' ){
		if($pr == 1){ //cierre sesion
			?>
			<br>
			<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Su sesi&oacute;n ha sido cerrada con &eacute;xito</div>
			<?php	
		}else if($pr == 2){ //tiempo de sesion caducado
			?>
			<br>
			<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Su sesi&oacute;n ha superado el tiempo de espera</div>
			<?php	
		}
	}
?>					
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><br>
		<div class="card card-container"><br><br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
			<img id="profile-img" class="profile-img-card" src="images/photo.jpg"/>
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" role="form" name="find" action="index.php" method="post" id="myform">
				<input type="hidden" name="p" value="user_find"/>
				<div>
					<h4>Control de Asistencias</h4>
					<h6 class="form-signin-heading">Escriba el Usuario y Contraseña, luego presione "Ingresar"</h6>
				</div>
				<input name="username" id="username" maxlength="12" type="text" size="15" class="form-control required username" placeholder="Usuario" required autofocus>
				<input name="password" id="password" maxlength="20" type="password" size="20" class="form-control required" placeholder="Contrase&ntilde;a" />
				<!--<div id="remember" class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Recordar
					</label>
				</div>-->
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="action" id="action"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar</button><br>
				<div id="links_users" style="display: none;">
					<a href="index.php?p=registrar_usuario">Registrarse</a>
					|
					<a href="index.php?p=solicitar_password">¿Olvid&oacute; su contrase&ntilde;a?</a>
					|
					<a href="index.php?p=solicitar_nueva_confirmacion">Solicitar nuevo correo de Confirmaci&oacute;n</a>
				</div>
			</form>
			<!--<a href="#" class="forgot-password">
				Forgot the password?
			</a>-->
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>
