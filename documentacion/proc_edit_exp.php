<?php 
$sw=$_POST['sw'];
include("coneccion.php");

switch ($sw) {
case 1:


$id_curso=$_POST['id_curso'];
$curso=$_POST['curso'];
$duracion=$_POST['duracion'];
$descrip=$_POST['descrip'];
$lugar=$_POST['lugar'];

mysql_query("set names utf8");
mysql_query("UPDATE cursos_cv SET curso_realizado='$curso', duracion_curso='$duracion', descripcion_curso='$descrip', lugar_curso='$lugar' WHERE id_cursos_cv='$id_curso'");


ir("dashboarde.php?data=edit-cv");


break;	
case 2:

$lugar_trabajo=$_POST['lugar_trabajo'];
$cargo_desemp=$_POST['cargo_desemp'];
$tiempo_servicio=$_POST['tiempo_servicio'];
$motivo_retiro=$_POST['motivo_retiro'];
$id_experiencia=$_POST['id_experiencia'];

mysql_query("set names utf8");
mysql_query("UPDATE experiencia_lab_cv SET lugar_trabajo='$lugar_trabajo', cargo_desemp='$cargo_desemp', tiempo_servicio='$tiempo_servicio', motivo_retiro='$motivo_retiro' WHERE id_experiencia_lab='$id_experiencia'");

ir("dashboarde.php?data=edit-cv");


break;
case 3:


$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cedula=$_POST['cedula'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$id_refer=$_POST['id_refer'];

mysql_query("set names utf8");
mysql_query("UPDATE refer_pers_cv SET nombre='$nombre', apellido='$apellido', cedula='$cedula', telefono='$telefono', direccion='$direccion' WHERE id_refer_pers='$id_refer'");


ir("dashboarde.php?data=edit-cv");



break;
}


?>