
<?php 
session_start();
include("coneccion.php");
$id_user_cv=$_SESSION['id_user_cv'];
if (empty($_POST['nivel_instr'])){
	$nivel_instr="Sin Datos";
	}else {
		$nivel_instr=$_POST["nivel_instr"];
		  }		  
if (empty($_POST['carrera'])){
	$carrera="Sin Datos";
	}else {
		$carrera=$_POST["carrera"];
		  }	  
if (empty($_POST['universidad'])){
	$universidad="Sin Datos";
	}else {
		$universidad=$_POST["universidad"];
		  }		  
if (empty($_POST['fecha_ini'])){
	$fecha_ini="00/00/0000";
	}else {
		$fecha_ini=$_POST["fecha_ini"];
		  }		  
if (empty($_POST['fecha_fin'])){
	$fecha_fin="00/00/0000";
	}else {
		$fecha_fin=$_POST["fecha_fin"];
		  };
if (empty($_POST['datos_int'])) {
            $datos_int ='Sin Datos';
        } else {
			$datos_int=$_POST["datos_int"];
			}  
$pc=1;

mysql_query("set names utf8");
mysql_query("INSERT INTO datos_acad_cv(id_user_cv,nivel_instruc,carrera,universidad,fecha_ini_carr,fecha_fin_carr,datos_int,pc)values('".$id_user_cv."','".$nivel_instr."','".$carrera."','".$universidad."','".$fecha_ini."','".$fecha_fin."','".$datos_int."','".$pc."')");


if (empty($_POST["idioma"])){}else  {
	
	
$j="0";	
$ni_idio=$_POST["ni_idio"];
$idioma=$_POST["idioma"];

foreach ($idioma as $idioma=>$value[$j]) {
mysql_query("set names utf8");           	
mysql_query("INSERT INTO idiomas_cv(id_user_cv,idioma,nivel)values('".$id_user_cv."','".$value[$j]."','".$ni_idio[$j]."')");
	$j++;	 

 		}
	}


//echo '--------------------------------------------------------------------------------------------------'.'<br>';
//echo $_POST['cursr'];


if (empty($_POST["cursr"])){
$cursos_realizados="Sin Datos";
$lugar_curso="Sin Datos";
$descrip_curso="Sin Datos";
$duracion_del_curso="Sin Datos";	
mysql_query("set names utf8");
mysql_query("INSERT INTO cursos_cv(id_user_cv,curso_realizado,duracion_curso,descripcion_curso,lugar_curso)values('".$id_user_cv."','".$cursos_realizados."','".$duracion_del_curso."','".$descrip_curso."','".$lugar_curso."')");
	}else  {
$cursos_realizados=$_POST["cursr"];
$lugar_curso=$_POST["lugar"];
$descrip_curso=$_POST["desc"];
$duracion_del_curso=$_POST["durac"];
$i="0";
foreach ($cursos_realizados as $cursos_realizados=>$value[$i]) {
mysql_query("set names utf8");	
mysql_query("INSERT INTO cursos_cv(id_user_cv,curso_realizado,duracion_curso,descripcion_curso,lugar_curso)values('".$id_user_cv."','".$value[$i]."','".$duracion_del_curso[$i]."','".$descrip_curso[$i]."','".$lugar_curso[$i]."')");
	$i++;}	 
		 }
	}
	
	
	
	
//echo '--------------------------------------------------------------------------------------------------'.'<br>';



if (empty($_POST["empr"])){
$lugar_trabajo="Sin Datos";
$cargo_trabajo="Sin Datos";
$tiempo_servicio="Sin Datos";
$motivo_retiro="Sin Datos";
mysql_query("set names utf8");
mysql_query("INSERT INTO experiencia_lab_cv(id_user_cv,lugar_trabajo,cargo_desemp,tiempo_servicio,motivo_retiro)values('".$id_user_cv."','".$lugar_trabajo."','".$cargo_trabajo."','".$tiempo_servicio."','".$motivo_retiro."')");
	}else  {
$lugar_trabajo=$_POST["empr"];
$cargo_trabajo=$_POST["carg"];
$tiempo_servicio=$_POST["temps"];
$motivo_retiro=$_POST["mtvr"];
$n="0";
foreach ($lugar_trabajo as $lugar_trabajo=>$value[$n]) {
mysql_query("set names utf8");          		
mysql_query("INSERT INTO experiencia_lab_cv(id_user_cv,lugar_trabajo,cargo_desemp,tiempo_servicio,motivo_retiro)values('".$id_user_cv."','".$value[$n]."','".$cargo_trabajo[$n]."','".$tiempo_servicio[$n]."','".$motivo_retiro[$n]."')");
		$n++;	 
 }
	}

//echo '--------------------------------------------------------------------------------------------------'.'<br>';

if (empty($_POST["rfp_nom"])){
$rfp_nombre="Sin Datos";
$rfp_apellido="Sin Datos";
$rfp_cedula="Sin Datos";
$rfp_telef="Sin Datos";
$rfp_direccion="Sin Datos";
mysql_query("set names utf8");
mysql_query("INSERT INTO refer_pers_cv(id_user_cv,nombre,apellido,cedula,telefono,direccion)values('".$id_user_cv."','".$rfp_nombre."','".$rfp_apellido."','".$rfp_cedula."','".$rfp_telef."','".$rfp_direccion."')");
	}else  {
$rfp_nombre=$_POST["rfp_nom"];
$rfp_apellido=$_POST["rfp_ape"];
$rfp_cedula=$_POST["rfp_ced"];
$rfp_telef=$_POST["rfp_telf"];
$rfp_direccion=$_POST["rfp_dir"];
$y="0";
foreach ($rfp_nombre as $rfp_nombre=>$value[$y]) {  
mysql_query("set names utf8");         
mysql_query("INSERT INTO refer_pers_cv(id_user_cv,nombre,apellido,cedula,telefono,direccion)values('".$id_user_cv."','".$value[$y]."','".$rfp_apellido[$y]."','".$rfp_cedula[$y]."','".$rfp_telef[$y]."','".$rfp_direccion[$y]."')");
$y++;	 
 }
	}
	
//echo '--------------------------------------------------------------------------------------------------'.'<br>';

ir('dashboarde.php?data=impr-cv');


?>













