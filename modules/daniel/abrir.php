
<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {ir("../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Sección/Módulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<?php 

$autorizar=$_POST['autorizar'];

$id=$_POST['id'];
$fecha = date('j-m-Y');
$nuevafecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
$nuevafecha1 = date ( 'j-m-Y' , $nuevafecha );
mysql_query("UPDATE clasificados_avisos SET autorizacion =$autorizar, fecha_publicacion='$fecha',fecha_despublicacion='$nuevafecha1' WHERE idaviso =$id"); 

notificar("lkjooll", "dashboard.php?data=autorizar", "notify-success");

?>      



