<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<html>

<head>

   <title>Registro</title>
     
<div id="contentHeader">
  <h2>Registro de Usuarios</h2>
  
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="grid-18">
    <form class="form uniformForm" action="#" method="post">
      <br>
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Usuarios</h3>
      </div>
      <div class="widget-content">
       <center>
        <table class="table table-bordered table-striped ">
          </center>
          <thead>
            <tr>
               
             
            </tr>
          </thead>

 <form action="" method="post" name="" id=""> 

<?php

if (isset($_POST['Submit'])) {
	$nombre = ($_POST["nombre"]);
	$cedula = ($_POST["usuario"]);
        $apellido = ($_POST["apellido"]);
	$correo_principal = ($_POST["correo_principal"]);
	 $ubicacion_laboral = ($_POST["ubicacion_laboral"]);
$sql="INSERT INTO usuario_bkp(usuario,nombre,apellido,correo_principal,ubicacion_laboral) VALUES ('".$nombre."', '".$apellido."','".$correo_principal."','".$ubicacion_laboral."')"; 

$result = mysql_query ($sql);
	if($result){
		notificar("Archivo guardado con exito", "dashboard.php?data=exp-cons", "notify-success");
	}
  
}

?>         

 <tr>
<label for="cedula">Cédula<br></label>
    <div>
    <input type="text" id="cedula" name="cedula" class="validate[required]" />
    </div>
    <br><br>
    
 <label for="contratista">Nombres<br></label>
    <div>
        <input type="text" id="nombre" name="nombre" class="validate[required]"/>
    </div>
    <br><br>
    </tr>
    <tr>
    <label for="codigo_exp">Apellidos<br></label>
    <div>
    <input type="text" id="apellido" name="apellido" class="validate[required]"/>
    </div>
    <br><br>
    <label for="correo_princial">Correo Principal<br></label>
    <div>
    <input type="text" id="correo_principal" name="correo_principal" class="validate[required]" />
    </div>
    <br> <br> 
    <label for="ubicacion_laboral">Gerencia<br></label>
    <div>
    <input type="text" id="ubicacion_laboral" name="ubicacion_laboral" class="validate[required]" />
    </div>
    <br><br>
    </tr>       
<tr>
	<center>
       <button name="Submit" type="submit" class="btn btn-error">Guardar usuario</button>
            <br><br>
     </center>            
</tr>               
     </table>

</form>
 </thead>
</body>
</div>
    </div>
     </div>
    </div>

</html>

