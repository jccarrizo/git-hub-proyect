<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}

if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} _wm($usuario_datos[3],'Página Principal: '.ucwords(array_pop(explode('/', __dir__))),'S/I');

?><head>
<title>Registro</title>

<div id="contentHeader">
	<h2>Productos clasificados</h2>
</div>   
<!-- #contentHeader -->
<div class="container">
	<div class="grid-22">  
		<br>
	</form>
	<div class="widget widget-table">
		<div class="widget-header">
			<span class="icon-cog"></span>
			<h3 class="icon chart">Clasificados</h3>
		</div>
		<div class="widget-content">
			<center>
			<table class="table table-bordered table-striped ">
			</center>
			<thead>
			<tr>
			</tr>
			</thead>
			<form action="#" method="post" name="formu" id="formu">
			    <?php 

if (isset($_POST['Submit'])) {
  
	 $user=$_GET['user']; 
	
  $sql="SELECT *
FROM usuario_bkp
INNER JOIN clasificados_avisos
WHERE usuario_bkp.usuario_int = clasificados_avisos.usuario and idaviso='$user'";

while($prod=mysql_fetch_array($sql)){
	
	$nombre=$prod['nombre'];
	$apellido=$prod['apellido'];
	$gerencia=$prod[(explode(" - ",'ubicacion_laboral'))];
	$gerencia[0];
        $fecha=$prod['fecha_publicacion'];
        $fecha_fin=$prod['fecha_despublicacion'];
        $titulo=$prod['titulo'];
        $descripcion=$prod['texto_aviso'];
        $fotos=$prod['fotos,foto2,foto3'];
        $categoria=$prod['categoria'];
        $cantidad=$prod['cantidad'];
	$usuario=$prod['usuario_int'];	
        
}
?>
<div id="contentHeader">
	<h2>Clasificados</h2>     
</div> <!-- #contentHeader -->	
             
     
        
        <div id="contentHeader"><h2>Datos del Vendedor</h2></div> <!-- #contentHeader -->	
	
<div class="container">
  <div class="grid-16">
	<div class="widget">
		<div class="widget-content">
			<div class="widget-header-in">
				<h3>Datos Personales</h3>
			</div> <!-- .widget-header -->
			<form class="form">
			
                            <div class="field-group">
					<label>Nombres:</label>
					<div class="field">
						<input readonly value="<?php echo $nombre;?>" type="text" name="desde" id="Nombres" size="28" class="" />
						
					</div>
				</div> <!-- .field-group -->
				<div class="field-group">
					<label>Apellidos:</label>
					<div class="field">
						<input readonly value="<?php echo $apellido;?>" type="text" name="hasta" id="Apellidos" size="28" class="" />
						
					</div>
				</div> <!-- .field-group -->
				<!-- .field-group -->
                                 <div class="field-group">
				   <label>Correo Corporativo:</label>
				   <div class="field">
             <?php
             if (_correo_existe($usuario_int."@metrodemaracaibo.gob.ve")=='SI'){
               $poseecorreo=$usuario_int."@metrodemaracaibo.gob.ve";
             }
             else {
               $poseecorreo="*** No Posee Correo ***";
             }
             ?>  
					   <input style="background-color:lightgray" readonly value="<?php echo $poseecorreo; //echo $correo_corporativo; ?>" onChange="javascript:this.value=this.value.toUpperCase();" type="text" name="correo_corporativo" id="correo_corporativo" size="45" class="validate[custom[email]" />	
				   </div>
			   </div> 
			   
                             
                      						<div class="field-group">
					<label>Teléfono Personal</label>
					<div class="field">
						<input readonly value="<?php echo $telefono;?>" type="text" name="telefono" id="telefono" size="10" class="" />
					</div>
				</div> 
                                <div class="field-group">
					<label>Producto:</label>
					<div class="field">
						<input readonly value="<?php echo $titulo;?>" type="text" name="titulo" id="ext_telefonica" size="10" class="" />
					</div>
				</div> 
                                
                                   <div class="field-group">
					<label>Descripción:</label>
					<div class="field">
						<textarea  readonly value="<?php echo $descripcion;?>"  name="texto_aviso" id="ext_telefonica"  rows="5" cols="50"  >
</textarea>
					</div>
				</div> 
                               <label>Fecha de Publicación:</label>
                                <div class="field-group">
					<label>Desde:</label>
					<div class="field">
						<input readonly value="<?php echo $desde;?>" type="text" name="fecha_publicacion" id="Nombres" size="28" class="" />
					
					</div>
				</div> <!-- .field-group -->
				<div class="field-group">
					<label>Hasta:</label>
					<div class="field">
						<input readonly value="<?php echo $hasta;?>" type="text" name="fecha_despublicacion" id="Apellidos" size="28" class="" />
					
					</div>
                                        </div>
                                <!-- .field-group -->
                                <center>
                                                    <button name="Submit" type="submit" class="btn btn-error"  >Comprar</button>
						<input type="button" name="Regresar" onclick="javascript:window.history.back(inicio);" class="btn btn-error" value="Regresar"/>
						<br>
						<br>
						</center>
      </form>
    </div> 
  </div>
</div>
				
    
    
    <?php 
if (isset($_GET['user'])){ ;
	$user_visita=$_GET['user'];

mysql_query("set names utf8");
$sql_idio=mysql_query("SELECT user_visitas.id_user_visita, user_visitas.cedula, user_visitas.nombre, user_visitas.apellido, user_visitas.foto
FROM user_visitas WHERE (((user_visitas.id_user_visita)=$user_visita));");

while($row_idio=mysql_fetch_array($sql_idio)){
	
	$nombre=$row_idio['nombre'];
	$apellido=$row_idio['apellido'];
	$cedula=$row_idio['cedula'];
	
		}
?>
<div id="contentHeader">
  <h2>Nueva Visita</h2>  
</div>
<div class="container">
				<div class="widget-content">
<div class="grid-24" style="text-align:center">				
    <div class="widget widget-table">
        <div class="widget-header">
            
            <h3>Datos del Visitante</h3>
            </div>
            <div class="widget-content">
          
            <p>
<form class="form validateForm" role="form" action="dashboard.php?data=guarda" method="post" onsubmit="return validate()">           
<?php 
date('h:m:s');
date('d/m/Y');
$hora = date("g:i:s - a");  
?> 

<div class="grid-8">
<div class="field">
<label for="required">Cédula</br></label>
<input type="text" name="horav" id="horav" size="15" value="<?php  echo $cedula ?>" readonly/>	
<a class="tooltip" title="Cédula del Visitante - Campo de Solo Lectura"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>
</div>
</div>



    
<div class="grid-8">
<div class="field">
<label for="required">Nombres</br></label>
<input type="text" name="horav" id="horav" size="15" value="<?php  echo $nombre ?>" readonly/>
<a class="tooltip" title="Nombre del Visitante - Campo de Solo Lectura"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>	
</div>
</div>


<div class="grid-8">
<div class="field">
<label for="required">Apellidos</br></label>
<input type="text" name="horav" id="horav" size="15" value="<?php  echo $apellido ?>" readonly/>
<a class="tooltip" title="Apellido del Visitante - Campo de Solo Lectura"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>	
</div>
</div>


<div class="grid-8">
<div class="field">
<label for="required">Persona a Visitar </br></label>
<?php
$sql1 = "SELECT CONCAT( nombre, ' ', apellido ) AS nombre FROM datos_empleado_rrhh order by nombre";
$res = mysql_query($sql1);
$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($gerencia = mysql_fetch_array($res)){
  array_push($arreglo_php, $gerencia["nombre"]);
  }
}
?>
													
<input type="text" name="pers_a_vis" id="buscar" size="15" class="validate[required]" placeholder="Persona a Visitar" onChange="conMayusculas(this)"/>	
<a class="tooltip" title="Persona a Visitar en la Empresa"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>
</div>
</div>

 
<div class="grid-8">
<div class="field">
<label for="required">Hora de Visita</br></label>
<input type="text" name="horav" id="horav" size="15" value="<?php  echo $hora = date("h:i:s -a");?>" readonly/>	
<a class="tooltip" title="Hora de Ingreso del visitante a las Instalaciones, Este campo NÓ se puede Editar"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>
</div>
</div>


<div class="grid-8">
<div class="field">
<label for="required">Fecha de Visita</br></label>
<input type="text" name="fechav" id="fechav" size="15" value="<?php  echo $hoy = date("d/m/Y");?>" readonly/>	
<a class="tooltip" title="Fecha de Ingreso del visitante a las Instalaciones, Este campo NÓ se puede Editar"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>
</div>
</div>


<div class="grid-8">
<div class="field">
<label>Gerencia:</label>
							<div>
								<select name="id_geren" id="gerencia" title="Seleccione la gerencia a la que pertenece el Solicitante" style="width:200px" onchange="espejo_gerencia()" <br>
									> <?php 
                    _bienvenido_mysql();
                    $sql="SELECT gerencia FROM datos_empleado_rrhh WHERE cedula=".$id;
                    $consulta=mysql_query($sql);
                    while($registro=mysql_fetch_row($consulta)) {
                        echo "<option value='".$registro[0]."'>
									".$registro[0]."</option>
									"; } $consulta=mysql_query("SELECT gerencia FROM `datos_empleado_rrhh` group by gerencia");     echo '<option select="select"></option>'; while($registro=mysql_fetch_row($consulta)) { echo "
									<option value='".$registro[0]."'>".$registro[0]."</option>
									"; } echo "
								</select>
								"; _adios_mysql(); ?>
							</select>
							<label id="visor_codigo"></label>
                                                        <a class="tooltip" title="Gerencia a la que el Empleado a Visitar"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>

						</div>

<input type="hidden" name="autorizado_por" id="autorizado_por" size="15" value="<?php echo $usuario_datos['nombre']. ' ' . $usuario_datos['apellido']; ?>" class="validate[required]" placeholder="Autorizado Por" onChange="conMayusculas(this)"/>	

</div>
</div>


<div class="grid-8">
<div class="field">
<label for="required">N° de Carnet</br></label>
<select name="nro_carnet" id="nro_carnet"  style="width:50px" >
<option value="0">0</option>
<?php
$sql=mysql_query("select * from carnet");
while($row=mysql_fetch_array($sql)){
?>
<option value="<?php echo $row["id_carnet"]?>"> <?php echo $row["carnet"]?> </option>
<?php
}
?>
</select>

<a class="tooltip" title="Nro de Carnet entregado al Visitante"><img src="iconos/arrow-modificar-viejos-deshacer-icono-5083-16.png"/></a>
</div>
</div>
         
<div class="grid-8">
<div class="field">

<input type="hidden" id="id_user" name="id_user"  value="<?php echo $user_visita?>"/>
<button type="submit" class="btn btn-primary">Continuar</button>
</div>   </div>    </div>      
                       
            
            </p>
        </div>    
    </div>		
    </form>			
    </div>    
    </div>		    
    </div>		
    </div>
    
    
    <?php } else {
		
		
echo '
<div class="notify notify-error">
<a href="javascript:;" class="close">&times;</a>
<h3>Al Parecer Hubo un Error </h3>
<p> Intente de Nuevo </p>
</div>';

echo'<html>
	<head>
		<meta http-equiv="REFRESH" content="1;url=dashboard.php?data=nv"
	</head>
</html>';

		
		
		
		
		}
	?>
	
    
    
    
    
    
    <script>
    
function valida_cedula(f) { 
if (f.cedula.value   == '') { alert ('Por favor Ingrese un Numero de Cédula Valido');  
f.cedula.focus(); return false; } 
return true; } 
    

document.onreadystatechange = function(){
   
}


function conMayusculas(field) {
field.value = field.value.toUpperCase()
}

function isNumberKey(evt)
  {
	 var charCode = (evt.which) ? evt.which : event.keyCode
	 if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	 	return true;
  }


function validate() {

var combo1 = document.getElementById("nro_carnet")
if(combo1.value == null || combo1.value == "0" || combo1.value == "") {
alert("Porfavor Seleccione el Numero Identificador del Carnet");

return false;
} else {}
	/*var combo2 = document.getElementById("id_geren")
if(combo2.value == null || combo2.value == "0" || combo2.value == "") {
alert("Porfavor Seleccione una Gerencia");*/

return false;
} else {
	return true;
	
	}
	return true;
	
	}




</script>
<script>
$(function(){
    var autocompletar = new Array();
    <?php //Esto es un poco de php para obtener lo que necesitamos
     for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay ?>
       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
     <?php } ?>
     $("#buscar").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
       source: autocompletar //Le decimos que nuestra fuente es el arreglo
     });
  });

</script>
