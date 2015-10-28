<?php 
 

include("coneccion.php");
//$id_user_cv=$_SESSION['id_user_cv'];

$correo=$_SESSION['correo'];
mysql_query("set names utf8");
$sql_val=mysql_query("SELECT datos_pers_cv.id_datos_pers_cv, datos_pers_cv.correo
FROM datos_pers_cv WHERE (((datos_pers_cv.correo)='$correo'));
");
while($row_val=mysql_fetch_array($sql_val)){	
$id_user_cv=$row_val["id_datos_pers_cv"];

	}

if (@$id_user_cv>0)    {



?>


<div id="contentHeader">
<h2> Vista Preliminar </h2>
</div>
<!-- #contentHeader -->
<div class="container">
<div class="row">
<div class="grid-24">

                                     
<div class="widget-content">


<form action="#" >
	


<div class="row">
<div class="grid-16">	



<div class="widget">
<div class="widget-content">
<div class="widget-content">
  <div align="center">

  </div>
</div> <!-- .widget-content --></p>
</div>

 
<style> 
#div-idioma
{

display:inline;

}
.c{
	font-size:12px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;

}
.p {
	font-size:10px;
	color: #666;
	
}
.t {
	font-size:12px;
	float:left;
		
}
.d {
	font-size:10px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	color: #000;
	padding-right:20px;

	
}
.tit {
	font-size:10px;
	margin-bottom:0px;
	text-align:left;
	padding-left:10px;
	
}

</style>

<img src="src/images/logo.png" title="" alt="" height="400" width="250">
</h4>

      	<?php 
		
$id_user_cv=$_SESSION["id_user_cv"];		
$correo_cv=$_SESSION["correo"];
mysql_query("set names utf8");
$sql_inst_act=mysql_query("SELECT datos_pers_cv.correo, datos_pers_cv.id_datos_pers_cv, datos_pers_cv.primer_nombre, datos_pers_cv.segundo_nombre, datos_pers_cv.primer_apellido, datos_pers_cv.segundo_apellido,datos_pers_cv.nacionalidad, datos_pers_cv.cedula, datos_pers_cv.fecha_nac, datos_pers_cv.sexo, datos_pers_cv. estado_civil, datos_pers_cv.telf_cel, datos_pers_cv.telf_hab, datos_pers_cv.id_estado, datos_pers_cv.id_municipio, datos_pers_cv.id_parroquia, datos_pers_cv.direccion_hab,datos_pers_cv.licencia
FROM datos_pers_cv
WHERE (((datos_pers_cv.correo)='$correo_cv'));

");
while($row_inst_act=mysql_fetch_array($sql_inst_act)){
	$id_user_cv=$row_inst_act["id_datos_pers_cv"];
	$primer_nombre=$row_inst_act["primer_nombre"];
	$segundo_nombre=$row_inst_act["segundo_nombre"];
	$primer_apellido=$row_inst_act["primer_apellido"];
	$segundo_apellido=$row_inst_act["segundo_apellido"];
	$cedula=$row_inst_act["cedula"];
	$nacionalidad=$row_inst_act["nacionalidad"];
		$licencia=$row_inst_act["licencia"];
	/////////////////////////////////////////
	
	$correo=$row_inst_act["correo"];
	$fecha_nac=$row_inst_act["fecha_nac"];
	$sexo=$row_inst_act["sexo"];
	$estado_civil=$row_inst_act["estado_civil"];
	$telf_cel=$row_inst_act["telf_cel"];
	$telf_hab=$row_inst_act["telf_hab"];

	$id_estado=$row_inst_act["id_estado"];
	$id_municipio=$row_inst_act["id_municipio"];
	$id_parroquia=$row_inst_act["id_parroquia"];
	$direccion_hab=$row_inst_act["direccion_hab"];
	

	


	

$nacimiento=$fecha_nac;
$aFecha = explode( '/', $nacimiento);
$edad = floor(( (date("Y") - $aFecha[2] ) * 372 + ( date("m") - $aFecha[1] ) * 31 + date("d" ) - $aFecha[0] )/372) ;

?>


<table width="100%"  cellspacing="0" style="padding-left:10px;">
  <tr>
     <td width="10%"  >   
							              <?php
      $sql_img=mysql_query("SELECT imagen_cv.id_usuario_cv, imagen_cv.imagen
FROM imagen_cv WHERE (((imagen_cv.id_usuario_cv)='$id_user_cv'));");
	$avat=mysql_num_rows($sql_img);
	if($avat==0){
		$imagen="default_avatar.jpg";
	}else{
	
while($row_img=mysql_fetch_array($sql_img)){	


$imagen=$row_img["imagen"];
}}
  




    
?>      
       
<img src="foto_cv/<?php echo $imagen ?>" >
            </td>
     <td width="90%"  ><div align="center" >
<h4>Datos Personales<br />
</h4>
</div></td>
							    
  </tr>
</table>

<table width="100%" cellspacing="2" style="padding-left:10px;">
							    <tr>
							     
      <td colspan="2"  class="d">Primer Nombre</td>
        <td width="19%"  class="d">Segundo Nombre</td>
        <td width="19%"  class="d">Primer Apellido</td>
        <td width="17%"  class="d">Segundo Apellido</td>
        <td width="20%"  class="d">Cédula</td>
      </tr>
      <tr >
        <td colspan="2" class="p"><?php echo $primer_nombre; ?></td>
        <td class="p"><?php echo $segundo_nombre; ?></td>
        <td class="p"><?php echo $primer_apellido; ?></td>
        <td class="p"><?php echo $segundo_apellido; ?></td>
        <td class="p"><?php echo $nacionalidad.'-'. $cedula; ?></td>
        
        
      <?php 
	  
	  }
	  ?>  
      </tr>
        <tr>
      
        <td width="15%" class="d">Fecha Nac.</td>
        <td width="10%" class="d">Edad</td>
       
        <td class="d">Sexo</td>
        <td class="d">Celular</td>
        <td class="d">Telf. Habitación</td>
        <td class="d">Edo. Civil</td>
        
    </tr>
     <tr>
        
        <td class="p"><?php echo $fecha_nac; ?></td>
        <td class="p">
 <?php 
   
function calculaedad($fechanacimiento){
list($ano,$mes,$dia) = explode("-",$fechanacimiento);
$ano_diferencia = date("Y") - $ano;
$mes_diferencia = date("m") - $mes;
$dia_diferencia = date("d") - $dia;
if ($dia_diferencia < 0 || $mes_diferencia < 0)
$ano_diferencia--;
return $ano_diferencia;
}
 echo calculaedad ($fecha_nac);
 
 ?>
        
        
        </td>
       
        <td class="p"><?php if ($sexo=='F') {echo "Femenino";}else if($sexo=='M'){echo 'Masculino';} ?></td>
        <td class="p"><?php echo $telf_cel; ?></td>
        <td class="p"><?php echo $telf_hab; ?></td>
         <td class="p"><?php echo $estado_civil; ?></td>
      
    </tr>
       <?php	

?>       

 <tr>
       <td height="10" colspan="3" class="d">Dirección</td>
      <td colspan="3" class="d">Correo</td>
    </tr>
 <tr>
   <td colspan="3"  class="p"><?php echo $direccion_hab; ?></td>
   <td height="3" colspan="3" class="p"><?php echo $correo; ?></td>
   </tr>
 <tr>
   <td height="21" colspan="3" class="d">Idiomas</td>
   </tr>

 <tr>
   <td colspan="2" class="d">Licencia</td>
   <td class="p">&nbsp;</td>
   <td colspan="4" class="p"><?php    mysql_query("set names utf8");
$sql_idio=mysql_query("SELECT idiomas_cv.idioma, idiomas_cv.id_user_cv
FROM idiomas_cv WHERE (((idiomas_cv.id_user_cv)='$id_user_cv')); ");
echo '<div id="div-idioma">';

$cont=mysql_num_rows($sql_idio);
if($cont==0){}else{
while($row_idio=mysql_fetch_array($sql_idio)){	


$idioma=$row_idio["idioma"];

  @$idiomas=$idiomas . $idioma.', ';
  
 }
 
$idiomas = substr($idiomas, 0, -2);
echo $idiomas . '.</div>';}	 
	?></td>
   </tr>
 <tr>
   <td colspan="2" class="p"><?php echo $licencia; ?></td>
   <td class="p"colspan="2"></td>
   <td class="p"colspan="3">&nbsp;</td>
 </tr>
 <tr>
         <td colspan="2">&nbsp;</td>
         <td colspan="2"></td>
         <td colspan="3">&nbsp;</td>
    </tr>     
  </table>
  <div align="left" class="tit">
    <h4>Estudios Realizados</h4></div>
						   
        <table width="100%" cellspacing="0" style="padding-left:10px;" >
					
					<thead>
						<tr align="left">
						  <th width="25%" class="d">Título</th>
						  <th width="25%" class="d">Carrera</th>
						  <th width="25%" class="d">Lugar de Egreso</th>
						  <th width="25%" class="d">Fecha de Egreso</th>
					    </tr>
					</thead>	
<?php mysql_query("set names utf8");
$sql_inst=mysql_query("SELECT datos_acad_cv.id_user_cv, datos_acad_cv.nivel_instruc, datos_acad_cv.carrera, datos_acad_cv.universidad, datos_acad_cv.fecha_ini_carr, datos_acad_cv.fecha_fin_carr, datos_acad_cv.datos_int
FROM datos_acad_cv WHERE (((datos_acad_cv.id_user_cv)=$id_user_cv));

");
while($row_inst=mysql_fetch_array($sql_inst)){	


$nivel_inst=$row_inst["nivel_instruc"];
$carrera=$row_inst["carrera"];
$universidad=$row_inst["universidad"];
$fecha_fin_carr=$row_inst["fecha_fin_carr"];

	}	if (@$nivel_inst==""){
		$nivel_inst='Ninguno';
		$carrera='Ninguno';
		$universidad='Ninguno';
		$fecha_fin_carr='Ninguno';
		
		}
	?>
					<tbody>
						<tr>
							<td class="p"><?php echo $nivel_inst ?></td>			
							<td class="p"><?php echo $carrera ?></td>
							<td class="p"><?php echo $universidad ?></td>
							<td class="p"><?php echo $fecha_fin_carr ?></td>
						</tr>
					</tbody>
</table>
                        <br />
                        
                        
  <div align="left" class="tit">
    <h4>Cursos u Otras Actividades Académicas  Realizadas</h4></div>
		<table width="100%" cellspacing="0" style="padding-left:10px;">
					<thead>
						<tr align="left">
							<th width="32%" class="d">Formación</th>
							<th width="21%" class="d">Duración</th>
							<th width="32%" class="d">Descripción</th>
						  <th width="15%" class="d">Lugar</th>
					    </tr>
					</thead>
                    <?php mysql_query("set names utf8");
$sql_curs=mysql_query("SELECT cursos_cv.id_user_cv, cursos_cv.curso_realizado, cursos_cv.duracion_curso, cursos_cv.descripcion_curso, cursos_cv.lugar_curso FROM cursos_cv WHERE (((cursos_cv.id_user_cv)='$id_user_cv'));");
while($row_curs=mysql_fetch_array($sql_curs)){	


$curso_realizado=$row_curs["curso_realizado"];
$duracion_curso=$row_curs["duracion_curso"];
$descripcion_curso=$row_curs["descripcion_curso"];
$lugar_curso=$row_curs["lugar_curso"];

		
		
		
		
	?>	
					<tbody>
						<tr>
							<td class="p"><?php echo $curso_realizado ?></td>			
							<td class="p"><?php echo $duracion_curso ?></td>
							<td class="p"><?php echo $descripcion_curso ?></td>
							<td class="p"><?php echo $lugar_curso ?></td>
						</tr>
					</tbody>
                    	<?php } ?>
		</table>
		<br />
                
                
                
                
                
  <div align="left" class="tit">
    <h4>Experiencia Laboral</h4></div>
		<table width="100%" cellspacing="0" style="padding-left:10px;">
					<thead>
						<tr align="left">
							<th width="25%" class="d">Lugar de Trabajo</th>
							<th width="25%" class="d">Cargo Desempeñado</th>
							<th width="25%" class="d">Tiempo de Servicio</th>
						  <th width="25%" class="d">Motivo del Retiro</th>
					    </tr>
					</thead>
                    <?php mysql_query("set names utf8");
$sql_exp=mysql_query("SELECT experiencia_lab_cv.id_user_cv, experiencia_lab_cv.lugar_trabajo, experiencia_lab_cv.cargo_desemp, experiencia_lab_cv.tiempo_servicio, experiencia_lab_cv.motivo_retiro
FROM experiencia_lab_cv WHERE (((experiencia_lab_cv.id_user_cv)='$id_user_cv'));
");
while($row_exp=mysql_fetch_array($sql_exp)){	


$lugar_exp=$row_exp["lugar_trabajo"];
$cargo_exp=$row_exp["cargo_desemp"];
$tiempo_exp=$row_exp["tiempo_servicio"];
$retiro_exp=$row_exp["motivo_retiro"];

		
	?>	
					<tbody>
						<tr>
							<td class="p"><?php echo $lugar_exp ?></td>			
							<td class="p"><?php echo $cargo_exp ?></td>
							<td class="p"><?php echo $tiempo_exp ?></td>
							<td class="p"><?php echo $retiro_exp ?></td>
						</tr>
					</tbody>
                   <?php } ?>
		</table>
					<br />
                
                
                
  <div align="left" class="tit">
    <h4>Referencias Personales </h4></div>
					<table width="100%" cellspacing="0" style="padding-left:10px;">
					<thead>
						<tr align="left">
						  <th width="20%" class="d">Nombre</th>
						  <th width="20%" class="d">Apellido</th>
						  <th width="20%" class="d">Cédula</th>
						  <th width="20%" class="d">Teléfono</th>
                          <th width="20%" class="d">Dirección</th>
					    </tr>
					</thead>
                    <?php mysql_query("set names utf8");
$sql_refp=mysql_query("SELECT refer_pers_cv.id_user_cv, refer_pers_cv.nombre, refer_pers_cv.apellido, refer_pers_cv.cedula, refer_pers_cv.telefono, refer_pers_cv.direccion
FROM refer_pers_cv WHERE (((refer_pers_cv.id_user_cv)='$id_user_cv'));

");
while($row_refp=mysql_fetch_array($sql_refp)){	


$nombre_refp=$row_refp["nombre"];
$apellido_refp=$row_refp["apellido"];
$cedula_refp=$row_refp["cedula"];
$telefono_refp=$row_refp["telefono"];
$direccion_refp=$row_refp["direccion"];

	?>	
					<tbody>
						<tr>
						  <td class="p"><?php echo $nombre_refp ?></td>
						  <td class="p"><?php echo $apellido_refp ?></td>
						  <td class="p"><?php echo $cedula_refp ?></td>
						  <td class="p"><?php echo $telefono_refp ?></td>
						  <td class="p"><?php echo $direccion_refp ?></td>
					  </tr>
						<?php } ?>
					  </tbody>
                  
				</table>
                
                        
                        
                   
					
					
				
</br>

	</div>			
	
<div align="center"><br>



  

<!-- 

Ruta Absoluta en el Server 
<a href="javascript:ventanaSecundaria('http://mextranet.tk//cv_online/modulos/pdf_listo.php')"> Imprimir</a> -->

</div>
</div>
</div>

		
</form>	


 
 <div align="center">
 <form class="form uniformForm" action="dashboarde.php?data=print-cv" target="_blank" method="post">
     <div class="grid-18" align="center">
              <table >
                <tr>
                  <td align="center"><button type="submit" class="btn btn-primary">Imprimir</button>
                  <input type="hidden" name="id_user_cv" id="id_user_cv" value="<?php echo $_SESSION["id_user_cv"]; ?>"/>
                  
                  </td>
                </tr>
              </table>
            </div>
      <br />
    </form>
</div> 


</div>
</div>	
</div> 

<?php 

}else {
	
	ir('dashboarde.php?data=carga-cv');
	
	}



?>