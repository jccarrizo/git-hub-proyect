
<?php 

include("coneccion.php");
$correo=$_SESSION['correo'];


mysql_query("set names utf8");
$sql_val=mysql_query("SELECT datos_pers_cv.id_datos_pers_cv, datos_pers_cv.correo
FROM datos_pers_cv WHERE (((datos_pers_cv.correo)='$correo'));
");
while($row_val=mysql_fetch_array($sql_val)){	


$id_user_cv=$row_val["id_datos_pers_cv"];

	}

if (@$id_user_cv>='0')    {

$id_user_cv=$_SESSION['id_user_cv'];

$sql_user_cv=mysql_query("SELECT datos_pers_cv.id_datos_pers_cv, datos_pers_cv.primer_nombre, datos_pers_cv.segundo_nombre, datos_pers_cv.primer_apellido, datos_pers_cv.segundo_apellido, datos_pers_cv.cedula, datos_pers_cv.nacionalidad, datos_pers_cv.correo, datos_pers_cv.fecha_nac, datos_pers_cv.sexo, datos_pers_cv.estado_civil, datos_pers_cv.telf_cel, datos_pers_cv.telf_hab, datos_pers_cv.id_estado, datos_pers_cv.id_municipio, datos_pers_cv.id_parroquia, datos_pers_cv.direccion_hab, datos_pers_cv.fecha_creacion, datos_pers_cv.licencia
FROM datos_pers_cv WHERE (((datos_pers_cv.id_datos_pers_cv)=$id_user_cv));


");

while($row_user_cv=mysql_fetch_array($sql_user_cv)){
	
$primer_nombre=$row_user_cv["primer_nombre"];
$segundo_nombre=$row_user_cv["segundo_nombre"];
$primer_apellido=$row_user_cv["primer_apellido"];
$segundo_apellido=$row_user_cv["segundo_apellido"];
$nacionalidad=$row_user_cv["nacionalidad"];
$cedula=$row_user_cv["cedula"];
$correo1=$row_user_cv["correo"];
$fecha_nac=$row_user_cv["fecha_nac"];
$sexo=$row_user_cv["sexo"];
$direccion_hab=$row_user_cv["direccion_hab"];
$id_estado=$row_user_cv["id_estado"];
$id_municipio=$row_user_cv["id_municipio"];
$id_parroquia=$row_user_cv["id_parroquia"];
$telf_cel=$row_user_cv["telf_cel"];
$telf_hab=$row_user_cv["telf_hab"];
$estado_civil=$row_user_cv["estado_civil"];
$licencia=$row_user_cv["licencia"];
//$direccion_hab=$row_user_cv["direccion_hab"];
	
	}

?>


<?php
mysql_query("set names utf8");
$sql_educ=mysql_query("SELECT datos_acad_cv.id_datos_acad_cv, datos_acad_cv.id_user_cv, datos_acad_cv.nivel_instruc, datos_acad_cv.carrera, datos_acad_cv.universidad, datos_acad_cv.fecha_ini_carr, datos_acad_cv.fecha_fin_carr, datos_acad_cv.datos_int FROM datos_acad_cv WHERE (((datos_acad_cv.id_user_cv)=$id_user_cv));");

while($row_educ=mysql_fetch_array($sql_educ)){
	
	$id_datos_acad_cv=$row_educ["id_datos_acad_cv"];
	$nivel_instruc=$row_educ["nivel_instruc"];
	$carrera= $row_educ["carrera"];
	$universidad= $row_educ["universidad"];
	$fecha_ini= $row_educ["fecha_ini_carr"];
	$fecha_fin=$row_educ["fecha_fin_carr"];
	$datos_int=$row_educ["datos_int"];

	}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////// estado/////////////////////////////////

mysql_query("set names utf8");
$sql_est=mysql_query("SELECT estados.id_estado, estados.estado
FROM estados
WHERE (((estados.id_estado)=$id_estado));");

while($row_est=mysql_fetch_array($sql_est))

{
$estado=$row_est["estado"];
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

mysql_query("set names utf8");
$sql_nac=mysql_query("SELECT nacionalidad.nacionalidad, nacionalidad.id_nacion
FROM nacionalidad WHERE (((nacionalidad.nacionalidad)='$nacionalidad'));

");

while($row_nac=mysql_fetch_array($sql_nac))

{
$nacional=$row_nac["nacionalidad"];

}


?>


<div id="contentHeader">
<h2> Editar Curriculum Vitae </h2>
</div>
<!-- #contentHeader -->
<div class="container">
<div class="row">
<div class="grid-24">

                                     
<div class="widget-content">


<div class="widget">

<div class="box plain">
<table class="table table-striped">
<thead>
<tr>
<th style="font-size:20px;">Editar Curriculum Vitae</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>

<form class="form validateForm" action="dashboarde.php?data=proc-edit-cv" method="post"  onsubmit="return validate()" enctype="multipart/form-data">

<div class="grid-6">
<div class="field">						
<label for="primer_nombre">Primer Nombre</label>
<br />
<input type="text" name="primer_nombre" id="primer_nombre" class="validate[required]" value="<?php echo $primer_nombre ?>" onChange="conMayusculas(this)"/>	

</div>
</div>
							
<div class="grid-6">
<div class="field">	
<label for="segundo_nombre">Segundo Nombre<br />
</label>
<input type="text" name="segundo_nombre" id="segundo_nombre" class="validate[required]" value="<?php echo $segundo_nombre ?>" onChange="conMayusculas(this)"/>
</div>
</div>

<div class="grid-6">
<div class="field">	
<label for="primer_apellido">Primer Apellido</label>
<br />
<input type="text" name="primer_apellido" id="primer_apellido" class="validate[required]" value="<?php echo $primer_apellido ?>" onChange="conMayusculas(this)"/>
</div>
</div>

<div class="grid-6">
<div class="field">	
<label for="segundo_apellido">Segundo Apellido</label>
<br />
<input type="text" name="segundo_apellido" id="segundo_apellido" class="validate[required]" value="<?php echo $segundo_apellido ?>" onChange="conMayusculas(this)"/>
</div>
</div>




<div class="grid-6">
<div class="field">	
<label for="required"> Nacionalidad - Cédula:<br></label>
<select name="nacionalidad" id="nacionalidad">
<option value="<?php echo $nacional ?>"><?php echo $nacional ?></option>
<?php
$sql_nac=mysql_query("select * from nacionalidad");
while($row_nac=mysql_fetch_array($sql_nac)){
?>
<option value="<?php echo $row_nac["nacionalidad"]?>"> <?php echo $row_nac["nacionalidad"]?> </option>
<?php
}
?>
</select>
<input type="text" name="cedula" id="cedula" size="12" class="validate[required]" value="<?php echo $cedula ?>" onkeypress="return isNumberKey(event)"/>	

</div>
</div>




<div class="grid-6">           
<div class="field">                           
<label for="required">Foto Tipo Carnet</br></label>
<input type="file" name="file_img" id="file_img" style="width:160px;"/>

</div>	
</div>




<div class="grid-6">
<div class="field">	
<label for="fecha_nac">Fecha de Nacimiento<br />
</label>
<input type="text" name="fecha_nac" id="datepicker" class="validate[required]" value="<?php echo $fecha_nac ?>"/>
</div>
</div>



<div class="grid-6">
<div class="field">	
<label for="telf_cel">Celular<br />
</label>
<input type="text" name="telf_cel" id="telf_cel" class="validate[required]" value="<?php echo $telf_cel ?>" onkeypress="return isNumberKey(event)"/>
</div>
</div>


<div class="grid-6">
<div class="field">	
<label for="telf_hab">Telefóno de Habitación<br />
</label>
<input type="text" name="telf_hab" id="telf_hab" class="validate[required]" value="<?php echo $telf_hab ?>" onkeypress="return isNumberKey(event)"/>
</div>
</div>


<div class="grid-6">
<div class="field">	
<label for="universidad">Instituto de Estudios<br />
</label>
<input type="text" name="universidad" id="universidad" class="validate[required]" value="<?php echo $universidad ?>"/>
</div>
</div>







<div class="grid-6">
<div class="field">
<label>Sexo<br></label>	
<?php     
if ($sexo=='M'){$masculino='checked';}else{$masculino="";};
if ($sexo=='F'){$femenino='checked';}else{$femenino="";};
?>

<input type="radio" name="sexo" id="sexo" value="M" <?php echo $masculino; ?> />
<label for="radio1">Masculino</label>
<input type="radio" name="sexo" id="sexo" value="F" <?php echo $femenino?>/>
<label for="radio2">Femenino</label>
</div>
</div>  









<div class="grid-6"> 
<div class="field">
<label>Nivel de Instrucción:<br /></label>      
<select name="nivel_instr" id="nivel_instr" style="width:160px;">
<option value="<?php echo $nivel_instruc ?>"> <?php echo $nivel_instruc ?></option>
<?php
mysql_query("set names utf8");
$sql_par=mysql_query("SELECT nivel_instruccion.id_nivel_instruccion, nivel_instruccion.nivel_instruccion
FROM nivel_instruccion;
");
while($row=mysql_fetch_array($sql_par)){
?>
<option value="<?php echo $row["nivel_instruccion"]?>">
<?php echo $row["nivel_instruccion"]?>
</option>
<?php }?>   
</select>
</div>	
</div>

    
<div class="grid-6">
<div class="field">	    
<label for="textarea">Carrera<br/></label>
<select name="carrera" id="carrera" style="width:160px;">
<option value="<?php echo $carrera?>"> <?php echo $carrera ?> </option>
<?php
mysql_query("set names utf8");
$sql_ins=mysql_query("SELECT carrera.id_carrera, carrera.carrera FROM carrera;");
while($row_ins=mysql_fetch_array($sql_ins)){
?>
<option value="<?php echo $row_ins["carrera"]?>"> <?php echo $row_ins["carrera"]?></option>
<?php }?>
</select>
</div>
</div>

   


<div class="grid-6">
<div class="field">  
<label for="licencia">Licencia:<br />
</label>
<select name="licencia" id="licencia" style="width:160px;">
<option value="<?php echo $licencia ?>"><?php echo $licencia ?></option>
<?php
mysql_query("set names utf8");
$sql_lc=mysql_query("SELECT licencia.id_licencia, licencia.licencia
FROM licencia;");
while($row_lc=mysql_fetch_array($sql_lc)){
?>
<option value="<?php echo $row_lc["licencia"]?>">
<?php echo $row_lc["licencia"]?>
</option>
<?php }?>   
</select>
</div>
</div>

<div class="grid-12">
<div class="field">	
  <p>
  <label for="direccion_hab">Dirección de Habitación</br></label>

  <input type="text" size="50"name="direccion_hab" id="direccion_hab" value="<?php echo $direccion_hab ?>" />
   </div> </div>




<div class="grid-12">
<div class="field">	
<p>
<label for="datos_int">Otros Datos de Interés</br></label>
<textarea name="datos_int" id="datos_int" cols="50" rows="5">
<?php echo $datos_int ?>
</textarea>

</p>


<button class="btn btn-primary" >Actualizar </button>


</div>
</div>
</form>
</div>

<table class="table table-striped" >
  <tr>
    <td colspan="5" ><div align="center">
      <h3><strong>Cursos Realizados</strong></h3>
    </div></td>
    </tr>
  <tr>
    <td width="139" ><strong>Curso Realizados </strong></td>
    <td width="137" ><strong>Duración </strong></td>
    <td width="154" ><strong>Descripción </strong></td>
    <td width="114" ><strong>Lugar </strong></td>
    <td width="43" >Editar</td>
  </tr>
  
  <?php

mysql_query("set names utf8");
$sql_curs=mysql_query("SELECT cursos_cv.id_cursos_cv, cursos_cv.id_user_cv, cursos_cv.curso_realizado, cursos_cv.duracion_curso, cursos_cv.descripcion_curso, cursos_cv.lugar_curso FROM cursos_cv WHERE (((cursos_cv.id_user_cv)='$id_user_cv'));

");
while($row_curs=mysql_fetch_array($sql_curs)){
$id_cursos_cv=$row_curs['id_cursos_cv'];

?>
  <tr>
    <td><?php echo $row_curs["curso_realizado"]?></td>
    <td><?php echo $row_curs["duracion_curso"]?></td>
    <td><?php echo $row_curs["descripcion_curso"]?></td>
    <td><?php echo $row_curs["lugar_curso"]?></td>
    <td> 
	
	
	
<?php 
$sw=1;
$parametros = 'id_curs='.$id_cursos_cv.'&sw='.$sw; 
$parametros = _desordenar($parametros); ?>     

<a href="dashboarde.php?data=act-exp&flag=1&<?php echo $parametros; ?>" id="editar" title="Editar" >
<div class="icon-arrow-right" style="float:left;margin-left:15px"></div> </a>




</td>
    </tr>
  <?php 
}
  ?>
 
</table>
<br />


<table class="table table-striped" >
  <tr>
    <td colspan="5" ><div align="center">
      <h3><strong>Experiencia laboral</strong></h3>
    </div></td>
    </tr>
  <tr>
    <td width="123" ><strong>Lugar de Trabajo </strong></td>
    <td width="151" ><strong>Cargo Desempañado </strong></td>
    <td width="140" ><strong>Tiempo Servicio </strong></td>
    <td width="122" ><strong>Motivo de Retiro </strong></td>
    <td width="48" >Editar</td>
  </tr>
  
  <?php
mysql_query("set names utf8");
$sql_exp=mysql_query("SELECT experiencia_lab_cv.id_experiencia_lab, experiencia_lab_cv.id_user_cv, experiencia_lab_cv.lugar_trabajo, experiencia_lab_cv.cargo_desemp, experiencia_lab_cv.tiempo_servicio, experiencia_lab_cv.motivo_retiro
FROM experiencia_lab_cv WHERE (((experiencia_lab_cv.id_user_cv)='$id_user_cv'));");
while($row_exp=mysql_fetch_array($sql_exp)){
$id_exp_lab=$row_exp["id_experiencia_lab"];	
	
?>
  <tr>
    <td><?php echo $row_exp["lugar_trabajo"]?></td>
    <td><?php echo $row_exp["cargo_desemp"]?></td>
    <td><?php echo $row_exp["tiempo_servicio"]?></td>
    <td><?php echo $row_exp["motivo_retiro"]?></td>
    <td>  
    <?php  
	$sw=2;
$parametros = 'id_exp='.$id_exp_lab.'&sw='.$sw; 
$parametros = _desordenar($parametros); ?>  
    
    
    <a href="dashboarde.php?data=act-exp&flag=1&<?php echo $parametros; ?>" id="Editar" title="Editar" >
<div class="icon-arrow-right" style="float:left;margin-left:15px"> </div></a>

</td>
    </tr>
  <?php 
}
  ?>
 
</table>


<br />
<table class="table table-striped" >
  <tr>
    <td colspan="5" ><div align="center">
      <h3><strong>Referencias Personales</strong></h3>
    </div></td>
    </tr>
  <tr>
    <td width="134" ><strong>Nombre </strong></td>
    <td width="107" ><strong>Apellido </strong></td>
    <td width="119" ><strong>Cédula </strong></td>
    <td width="167" ><strong>Dirección </strong></td>
    <td width="54" >Editar</td>
  </tr>
  
  <?php
mysql_query("set names utf8");
$sql_refp=mysql_query("SELECT refer_pers_cv.id_refer_pers, refer_pers_cv.id_user_cv, refer_pers_cv.nombre, refer_pers_cv.apellido, refer_pers_cv.cedula, refer_pers_cv.telefono, refer_pers_cv.direccion FROM refer_pers_cv WHERE (((refer_pers_cv.id_user_cv)='$id_user_cv'))");

while($row_refp=mysql_fetch_array($sql_refp)){
$id_refer_pers=$row_refp['id_refer_pers'];	
	
?>
  <tr>
    <td><?php echo $row_refp['nombre']?></td>
    <td><?php echo $row_refp['apellido']?></td>
    <td><?php echo $row_refp['telefono']?></td>
    <td><?php echo $row_refp['direccion']?></td>
    <td>
    
        <?php  
	$sw=3;
$parametros = 'id_ref='.$id_refer_pers.'&sw='.$sw; 
$parametros = _desordenar($parametros); ?>  
    
    
    <a href="dashboarde.php?data=act-exp&flag=1&<?php echo $parametros; ?>" id="Editar" title="Editar" >
<div class="icon-arrow-right" style="float:left;margin-left:15px"> </div></a>
    
    
    </td>
    </tr>
  <?php 
}
  ?>
 
</table>

</div>
</div></div>
</div></div>
</div>


<script>
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
	
	
var a = 0, rdbtn=document.getElementsByName("sexo")
for(i=0;i<rdbtn.length;i++) {
if(rdbtn.item(i).checked == false) {
a++;
}
}
if(a == rdbtn.length) {
alert("Porfavor, seleccione su Sexo");

return false;
} else {

}

var combo1 = document.getElementById("estado_civil")
if(combo1.value == null || combo1.value == "0" || combo1.value == "") {
alert("Porfavor, Seleccione su Estado Civil");

return false;
} else {}

var combo2 = document.getElementById("id_estado")
if(combo2.value == null || combo2.value == "0" || combo2.value == "") {
alert("Porfavor, Seleccione su Estado Municipio y Parroquia");

return false;
} else {}

var combo2 = document.getElementById("id_nacion")
if(combo2.value == null || combo2.value == "0" || combo2.value == "") {
alert("Porfavor,Indique su Nacionalidad e  Ingrese su Nro de cedula o Pasaporte");

return false;
} else {}

var combo3 = document.getElementById("id_municipio")
if(combo3.value == null || combo3.value == "0" || combo3.value == "") {
alert("Porfavor, Seleccione su Municipio y Parroquia");

return false;
} else {}

var combo4 = document.getElementById("id_parroquia")
if(combo4.value == null || combo4.value == "0") {
alert("Porfavor, Seleccione su  Parroquia");

return false;
} else {
	return true;
	
	}
}

$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true,
yearRange: "1950:2014"
});
});

function ir_municipio(id_estado){
	$("div#cargador").fadeIn();
	$("div#div_municipio").load("modulos/editar_select_municipio.php?id_estado="+ id_estado);
    $("div#cargador").fadeOut();
          
}


function ir_parroquia(id_municipio){
	$("div#cargador_2").fadeIn();
	$("div#cargar_parroquia").load("modulos/editar_cargar_parroquia.php?id_municipio="+ id_municipio);
    $("div#cargador_2").fadeOut();
          
}
function carga_campo(){
	//$("div#print2").show();  /*cambiar a show para acivar vista de boton*/
	//$("div#cargador2").fadeIn();
	
	$("div#carga_campo").load("modulos/carga_campo.php");
	
	//$("div#cargador2").fadeOut();
	}



</script>





<script>
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
var a = 0, rdbtn=document.getElementsByName("sexo")
for(i=0;i<rdbtn.length;i++) {
if(rdbtn.item(i).checked == false) {
a++;
}
}
if(a == rdbtn.length) {
alert("Porfavor, seleccione su Sexo");

return false;
} else {

}

var combo1 = document.getElementById("estado_civil")
if(combo1.value == null || combo1.value == "0" || combo1.value == "") {
alert("Porfavor, Seleccione su Estado Civil");

return false;
} else {}

var combo2 = document.getElementById("id_estado")
if(combo2.value == null || combo2.value == "0" || combo2.value == "") {
alert("Porfavor, Seleccione su Estado Municipio y Parroquia");

return false;
} else {}

var combo2 = document.getElementById("id_nacion")
if(combo2.value == null || combo2.value == "0" || combo2.value == "") {
alert("Porfavor,Indique su Nacionalidad e  Ingrese su Nro de cedula o Pasaporte");

return false;
} else {}

var combo3 = document.getElementById("id_municipio")
if(combo3.value == null || combo3.value == "0" || combo3.value == "") {
alert("Porfavor, Seleccione su Municipio y Parroquia");

return false;
} else {}

var combo4 = document.getElementById("id_parroquia")
if(combo4.value == null || combo4.value == "0") {
alert("Porfavor, Seleccione su  Parroquia");

return false;
} else {
	return true;
	
	}
}

$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
dateFormat: 'dd/mm/yy',
changeMonth: true,
changeYear: true,
yearRange: "1950:2014"
});
});

function ir_municipio(id_estado){
	$("div#cargador").fadeIn();
	$("div#div_municipio").load("modulos/select_municipio.php?id_estado="+ id_estado);
    $("div#cargador").fadeOut();
          
}
function ir_parroquia(id_municipio){
	$("div#cargador_2").fadeIn();
	$("div#cargar_parroquia").load("modulos/cargar_parroquia.php?id_municipio="+ id_municipio);
    $("div#cargador_2").fadeOut();
          
}
function carga_campo(){
	//$("div#print2").show();  /*cambiar a show para acivar vista de boton*/
	//$("div#cargador2").fadeIn();
	$("div#carga_campo").load("modulos/carga_campo.php");
	//$("div#cargador2").fadeOut();
	}
</script>
















<?php 

}else  echo "<script type='text/javascript'> setTimeout('imprimir_cv()', 10);// se ejecuta después de 10 milisegundos.</script>";



?>