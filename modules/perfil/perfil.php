<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

	<div id="contentHeader">
		<h2>Perfil de Usuario</h2>
	</div> <!-- #contentHeader -->	

<?php 

if (@$_POST['ClaveNueva']){
	
	$claveN=MD5($_POST['ClaveNueva'].$usuario_datos['usuario']);
	$claveA=MD5($_POST['ClaveActual'].$usuario_datos['usuario']);
	$usuario=$usuario_datos[9];
	$correoP = $usuario_datos[6];
	$correoC = $usuario_datos[5];

	_bienvenido_mysql();
	
  $sql ="SELECT ";
  $sql.="usuario_bkp.*, ";
  $sql.="autenticacion.* ";
  $sql.="FROM ";
  $sql.="usuario_bkp ";
  $sql.="LEFT JOIN autenticacion ON autenticacion.cedula = usuario_bkp.usuario ";
  $sql.="WHERE usuario_bkp.usuario_int ='".$usuario."' and autenticacion.clave ='".$claveA."';";
  
	$result = mysql_query ($sql);	
	if($result){
		$num_rows = mysql_num_rows($result);
		if ($num_rows==1) {
			$sql = "UPDATE autenticacion SET clave ='".$claveN."' where cedula = '".$usuario_datos[3]."';";
			$up = mysql_query($sql);
			
			if($up){
				_wm($usuario_datos[9],'Cambio de contraseña','S/I');
				$mensajedelcorreo = $mensajedelcorreo_cambiodeclave;

				if (($correoP == "" AND $correoC == "")) {
					_wm($usuario_datos[9],'El Usuario no posee correo electronico en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
					notificar("Ud no posee correo electronico, Por favor actualice sus datos <a href='dashboard.php?data=actualizar' target='_blank'>Aqui</a>", "dashboard.php?data=perfil", "notify-warning");
				}

				if ($correoC != ""){	
					if(_enviarmail($mensajedelcorreo,$usuario_datos['nombre']." ".$usuario_datos['apellido'],$correoC,'Cambio de Contraseña realizado con exito')) {
						_wm($usuario_datos[9],'A el usuario se le notifico el envio de correo electronico del cambio de contraseña en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
						notificar("Contraseña enviada a su correo electronico Corporativo","dashboard.php?data=perfil", "notify-success");
					} else {
						_wm($usuario_datos[9],'A el usuario se le notifico que no se pudo enviar el correo electronico del cambio de contraseña en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
						notificar("La contraseña no se pudo enviar a su correo electronico Corporativo","dashboard.php?data=perfil", "notify-warning");
					}
				}

				if($correoP != ""){
					if(_enviarmail($mensajedelcorreo,$usuario_datos['nombre']." ".$usuario_datos['apellido'],$correoP,'Cambio de Contraseña realizado con exito')) {
							_wm($usuario_datos[9],'A el usuario se le notifico el envio de correo electronico del cambio de contraseña en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
							notificar("Contraseña enviada a su correo electronico Personal","dashboard.php?data=perfil", "notify-success");
					} else {
							_wm($usuario_datos[9],'A el usuario se le notifico que no se pudo envia el correo electronico del cambio de contraseña en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
							notificar("La contraseña no se pudo enviar a su correo electronico Personal","dashboard.php?data=perfil", "notify-warning");
					}
				}

			} else {
				if ($SQL_debug=='1'){ die('Error en Query (Clave Anterior) - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Query (Clave Anterior)');}
			}	
		} else {
				_wm($usuario_datos[9],'Contraseña Actual Invalida en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
				notificar("Contraseña Actual Invalida","dashboard.php?data=perfil",'notify-warning' );
		}	
	} else {
		if ($SQL_debug=='1'){ die('Error en Query (Clave Anterior) - Respuesta del Motor: ' . mysql_error()); } else {die('Error en Query (Clave Anterior)');}

	/******************************************************************************/
	/******************************************************************************/
	/******************************************************************************/
			
	} } else { ?>
	<div class="container">
			<?php include('notificador.php'); ?>
			<div class="grid-24">				
				<div class="widget">
					<div class="widget-header">
						<span class="icon-article"></span>
						<h3>Cambio de contraseña</h3>
					</div> <!-- .widget-header -->
					<div class="widget-content">
						<form class="form uniformForm validateForm" method="post" action="#">
							<div class="field-group">
								<label for="password1">Contraseña actual:</label>
								<div class="field">
									<input type="password" name="ClaveActual" id="ClaveActual" size="25" class="validate[required,maxSize[12]]" value="" />	
								</div>
							</div> <!-- .field-group -->								
							<div class="field-group">
								<label for="password1">Contraseña nueva:</label>
								<div class="field">
									<input type="password" name="ClaveNueva" id="ClaveNueva" size="25" class="validate[required,minSize[6],maxSize[12]]" value="" />	
								</div>
							</div> <!-- .field-group -->
							<div class="field-group">
								<label for="password2">Repertir contraseña nueva :</label>
								<div class="field">
									<input type="password" name="ClaveNuevaR" id="ClaveNuevaR" size="25" class="validate[required,minSize[6],maxSize[12],equals[ClaveNueva]]" value="" />	
								</div>
							</div> <!-- .field-group -->
							<div class="actions">						
								<button type="submit" class="btn btn-error">Cambiar Clave</button>
								<button onclick="javascript:window.location.href = 'dashboard.php';" class="btn btn-error">Cancelar</button>
								
							</div> <!-- .actions -->
						</form>
					</div> <!-- .widget-content -->
					
				</div> <!-- .widget -->	
			</div> <!-- .grid -->
	</div> <!-- .container -->

<?php } ?>
