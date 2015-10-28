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
  <h2>Registro de Expedientes</h2>
  
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="grid-18">
    <form class="form uniformForm" action="#" method="post">
      <br>
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Archivos</h3>
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
	$nombre = ($_POST["contratista"]);
	$apellido = ($_POST["codigo_exp"]);
	$correo_principal = ($_POST["fecha_exp"]);
	 
$sql="INSERT INTO archivos(contratista,codigo_exp,fecha_exp) VALUES ('".$nombre."', '".$apellido."','".$correo_principal."')"; 

$result = mysql_query ($sql);
	if($result){
		notificar("Archivo guardado con exito", "dashboard.php?data=exp-cons", "notify-success");
	}
  
}

?>         

 <tr>
	<label for="contratista">Contratista<br></label>
    <div>
        <input type="text" id="contratista" name="codigo_exp" class="validate[required]"/>
    </div>
    <br><br>
    </tr>
    <tr>
    <label for="codigo_exp">Código de Expediente<br></label>
    <div>
    <input type="text" id="codigo_exp" name="contratista" class="validate[required]"/>
    </div>
    <br><br>
    </tr>
    <tr>
    <label for="correo_princial">Año del Expediente<br></label>
    <div>
    <input type="text" id="correo_principal" name="fecha_exp" class="validate[required]" />
    </div>
    <br> <br> 
    </tr>
    
<tr>
	<center>
       <button name="Submit" type="submit" class="btn btn-error">Guardar Archivos</button>
       <input type="button" name="Atras" onclick="javascript:window.history.back();" class="btn btn-error" value="Atras" />
        
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
