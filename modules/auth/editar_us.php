<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
if (!$_GET['flag']){ir('dashboard.php?data=usuarios');}  
?>

<script type="text/javascript">
  function espejo_gerencia(){
    var myarr, ubi, a,b,c;
    ubi = document.getElementById('gerencia').value;
    myarr = ubi.split(" - ");
    a = myarr[2];
    b = myarr[0];
    c = myarr[1];
    document.getElementById('visor_gerencia').innerHTML = '<b>Codigo: </b> '+a+'<br /><b>Gerencia: </b>'+b+'<br /><b>Ubicacion: </b>'+c;
  }
</script>

<style>
		.field{
				width: 100%;
		}

div.selector {
	width:85%;
}

div.selector span {
  width:78%;
}
select {
		width:100%;
}
</style>



<div id="contentHeader">
	<h2>Modificar Usuario/Empleado</h2>
</div> <!-- #contentHeader -->	

<?php 

if (isset($_POST['Submit'])) {
  
	decode_get2($_SERVER["REQUEST_URI"],2);
		
	$id = _antinyeccionSQL($_GET['id']);

	$cedula=$_POST["cedula"];
	$nombre=$_POST["fname"];
	$apellido=$_POST["lname"];
	$correo_principal=$_POST["correo_principal"];
	$correo_corporativo=$_POST["correo_corporativo"];
	$telefono=$_POST["telefono"];
	$gerencia=$_POST["gerencia"];
	$usuario_int=$_POST["usuario_int"];	
	$perfil=$_POST["perfil"];

  _bienvenido_mysql();
  
	if (!empty($_POST["password1"])){
    
    /*ACTUALIZO CONTRASEÑA*/
		$password=md5($_POST["password1"].$cedula);	
		$sql="UPDATE autenticacion SET clave = '".$password."' WHERE cedula = ".$cedula;
    $result = mysql_query ($sql);
    if(!$result){
     if ($SQL_debug=='1'){ die('Error en Modificar Contraseña - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Modificar Registro');}
    }	
    
    /*ACTUALIZO PERFIL*/
    $sql="UPDATE autenticacion SET perfil = '".$perfil."' WHERE cedula = ".$cedula;
    $result = mysql_query ($sql);
    if(!$result){
     if ($SQL_debug=='1'){ die('Error en Modificar Perfil - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Modificar Registro');}
    }	
    
    /*ACTUALIZO LOS DEMAS DATOS*/
		$sql="UPDATE usuario_bkp SET usuario = '".$cedula."', nombre = '".$nombre."', apellido = '".$apellido."', usuario_int = '".$usuario_int."', correo_corporativo = '".$correo_corporativo."', correo_principal = '".$correo_principal."', telefono  = '".$telefono."', ubicacion_laboral = '".$gerencia."' WHERE id_usuario = ".$id;
    $result = mysql_query ($sql);
    if(!$result){
     if ($SQL_debug=='1'){ die('Error en Modificar Registro - 02 - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Modificar Registro');}
    }	
    notificar("Usuario/Empleado Y Contraseña modificados con exito", "dashboard.php?data=usuarios", "notify-success");
  }
	else {
      
    /*ACTUALIZO PERFIL*/
    $sql="UPDATE autenticacion SET perfil = '".$perfil."' WHERE cedula = ".$cedula;
    $result = mysql_query ($sql);
    if(!$result){
     if ($SQL_debug=='1'){ die('Error en Modificar Perfil - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Modificar Registro');}
    }	
    /*ACTUALIZO LOS DEMAS DATOS*/
		$sql="UPDATE usuario_bkp SET usuario = '".$cedula."', nombre = '".$nombre."', apellido = '".$apellido."', usuario_int = '".$usuario_int."', correo_corporativo = '".$correo_corporativo."', correo_principal = '".$correo_principal."', telefono  = '".$telefono."', ubicacion_laboral = '".$gerencia."' WHERE id_usuario = ".$id;
    $result = mysql_query ($sql);
    if(!$result){
     if ($SQL_debug=='1'){ die('Error en Modificar Registro - 01 - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Modificar Registro');}
    }	
    notificar("Usuario/Empleado Y Contraseña modificados con exito", "dashboard.php?data=usuarios", "notify-success");
	}
	
/*****************************************************************/
} else { 
/*****************************************************************/

	decode_get2($_SERVER["REQUEST_URI"],2);
	
	$id = _antinyeccionSQL($_GET['id']);
	
	_bienvenido_mysql();
  
  $sql ="SELECT ";
  $sql.="usuario_bkp.id_usuario, ";
  $sql.="usuario_bkp.nombre, ";
  $sql.="usuario_bkp.apellido, ";
  $sql.="usuario_bkp.usuario, ";
  $sql.="autenticacion.clave, ";
  $sql.="usuario_bkp.correo_corporativo, ";
  $sql.="usuario_bkp.correo_principal, ";
  $sql.="usuario_bkp.telefono, ";
  $sql.="usuario_bkp.habilitado, ";
  $sql.="usuario_bkp.usuario_int, ";
  $sql.="'disponible', ";
  $sql.="autenticacion.perfil, ";
  $sql.="perfiles.perfil AS perfil_nom, ";
  $sql.="perfiles.role AS role, ";
  $sql.="usuario_bkp.ubicacion_laboral ";
  $sql.="FROM ";
  $sql.="usuario_bkp ";
  $sql.="LEFT JOIN autenticacion ON autenticacion.cedula = usuario_bkp.usuario ";
  $sql.="LEFT JOIN perfiles ON autenticacion.perfil = perfiles.id ";
  $sql.="WHERE usuario_bkp.id_usuario=$id;";  
  
  
  
	$perfil_qry = mysql_query ($sql);
	
	if($perfil_qry){
		$reg=mysql_fetch_array($perfil_qry);
		$num_rows = mysql_num_rows($perfil_qry);
		if ($num_rows==1) {		

			$cedula=$reg[3];
			$nombre=$reg[1];
			$apellido=$reg[2];
			$correo_principal=$reg[6];
			$correo_corporativo=$reg[5];
			$telefono=$reg[7];
			$gerencia=$reg[10];
			$usuario_int=$reg[9];	
			$perfil=$reg[12];
			$idperfil=$reg[11];
			$id_gerencia=$reg[10];
		
		}		
		else {
			// SI NO ENCUENTRA REGISTROS SENCILLAMENTE ALGO PASO DEMACIADO RARO!
		}	
		_adios_mysql();
	}
	else {
		if ($SQL_debug=='1'){ die('Error en Visualizar para Modificar Registro - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Modificar Registro');}
	}	
 
?>
<div class="container">
  <div class="row">
    <form class="form uniformForm validateForm" id="from_envio_pe" name="from_envio_pe" method="post" action="#" >
      <div class="grid-16">
        <div class="widget">
           <div class="widget-content">
			   <div class="field-group">								
				   <label>Cedula:</label>
				   <div class="field">
					   <input readonly value="<?php echo $cedula; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="cedula" id="cedula" size="25" class="validate[required],maxSize[9]" />	
				   </div>
			   </div> <!-- .field-group -->				 
				 
			   <div class="field-group">
				   <label>Nombre y Apellido:</label>
				   <div class="field">
					   <input readonly value="<?php echo $nombre; ?>" onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122" type="text" name="fname" id="fname" size="25" class="" />			
					   <label for="fname">Primer Nombre</label>
				   </div>
				   <div class="field">
					   <input readonly value="<?php echo $apellido; ?>" onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122" type="text" name="lname" id="lname" size="25" class="" />			
					   <label for="lname">Primer Apellido</label>
				   </div>
			   </div> <!-- .field-group -->
 				
			   <div class="field-group">
				   <label>Usuario:</label>
				   <div class="field">
					   <input  value="<?php echo $usuario_int; ?>" onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 46" type="text" name="usuario_int" id="usuario_int" size="32" class="validate[required]" />	
					   <label for="lname">Recuerde que debe de ser NOMBRE.APELLIDO</label>
				   </div>
			   </div> <!-- .field-group -->

			   <div class="field-group">
				   <label>Contraseña:</label>
				   <div class="field">
					   <input type="password" name="password1" id="password1" size="35" class="validate[minSize[8]]" value="" />	
				   </div>
			   </div> <!-- .field-group -->

			   <div class="field-group">
				   <label>Contraseña Nuevamente:</label>
				   <div class="field">
					   <input type="password" name="password2" id="password2" size="35" class="validate[equals[password1]]" value="" />	
				   </div>
			   </div> <!-- .field-group -->             
            
			   <div class="field-group">
				   <label>Correo Principal:</label>
				   <div class="field">
					   <input value="<?php echo $correo_principal; ?>" onChange="javascript:this.value=this.value.toLowerrCase();" type="text" name="correo_principal" id="correo_principal" size="45" class="validate[custom[email]" />	
				   </div>
			   </div> <!-- .field-group -->
			   
			   <div class="field-group">
				   <label>Correo Corporativo:</label>
				   <div class="field">
					   <input readonly value="<?php echo $correo_corporativo; ?>" onChange="javascript:this.value=this.value.toUpperCase();" type="text" name="correo_corporativo" id="correo_corporativo" size="45" class="validate[custom[email]" />	
				   </div>
			   </div> <!-- .field-group -->
			   
			   <div class="field-group">
                <label>Telefono:</label>
                <div class="field">
                  <input value="<?php echo $telefono; ?>" type="text" name="telefono" id="telefono" size="32" class="validate[required]" />	
                </div>
              </div> <!-- .field-group -->
             
			   <div class="field-group">		
				   <label>Gerencia a que Pertenece:</label>
				   <div class="field">
					   <select name="gerencia" id="gerencia" onchange="espejo_gerencia()">
						   <?php 
										_bienvenido_mysql();
                    $sql="SELECT ubicacion_laboral FROM usuario_bkp WHERE id_usuario=".$id;
										$consulta=mysql_query($sql);
										while($registro=mysql_fetch_row($consulta))	{
												echo "<option value='".$registro[0]."'>".$registro[0].")</option>";
										}
										$consulta=mysql_query("SELECT ubicacion_laboral FROM usuario_bkp GROUP BY ubicacion_laboral ORDER BY ubicacion_laboral");
										while($registro=mysql_fetch_row($consulta))	{
												echo "<option value='".$registro[0]."'>".$registro[0].")</option>";
										}
										echo "</select>";
										_adios_mysql();
						   ?>
					   </select>
             <label id="visor_gerencia"></label>
				   </div>		
			   </div> <!-- .field-group -->
			   <div class="field-group">		
				   <label>Perfil de Usuario:</label>
				   <div class="field">
					   <select name="perfil" id="perfil">
								<?php 
								_bienvenido_mysql(); 
								$perfil_qry=mysql_query("SELECT id, perfil FROM perfiles WHERE id = ". $idperfil);
								if($perfil_qry) {
									$reg=mysql_fetch_array($perfil_qry);
									$num_rows = mysql_num_rows($perfil_qry);
									if ($num_rows==1) { ?>
										<option value="<?php echo $reg[0]; ?>"><?php echo $reg[1]; ?></option>
									<?php }		
								}
								$consulta=mysql_query("SELECT id, perfil FROM perfiles");
								while($reg=mysql_fetch_row($consulta))	{ ?>
									<option value="<?php echo $reg[0]; ?>"><?php echo $reg[1]; ?></option>
								<?php } ?>
								</select>
								<?php _adios_mysql(); ?>
					   <label>Definicion de Accesos</label>
				   </div>		
			   </div> <!-- .field-group -->
              <div class="actions" style="text-aling:right">
                <button name="Submit" type="submit" class="btn btn-error">Modificar Usuario/Empleado</button>
                <input type="button" name="Atras" onclick="javascript:window.history.back();" class="btn btn-error" value="Regresar" />
              </div> <!-- .actions -->
           </div> <!-- .widget-content -->
          </div> <!-- .widget -->	
        </div><!-- .grid -->	
		<div class="grid-8">
			<div id="gettingStarted" class="box">
				<h3>Estimado, <?php echo $usuario_datos['nombre']." ".$usuario_datos['apellido']; ?></h3>
				<p>En esta seccion podra Modificar los usuarios/empleados para el sistema</p>
			</div>
		</div>
		</div> <!-- .grid -->	
      </form>
  </div><!-- .row -->
</div> <!-- .container -->
<?php } ?>

<script type="text/javascript">
	window.onload=function() {
		espejo_gerencia();
	}
</script>