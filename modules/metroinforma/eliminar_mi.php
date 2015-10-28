<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
if (!$_GET["flag"]){ir('dashboard.php?data=admin-mi');}
?>

<?php decode_get2($_SERVER["REQUEST_URI"],1); ?>

<script language="JavaScript" type="text/javascript" src="src/javascripts/ajax.js"></script>

<div id="contentHeader">
<h2>Eliminar Metro Informa - <?php echo 'ID: ' . _antiXSS($_GET["id"]); ?></h2>
</div> <!-- #contentHeader -->	

<?php 

if($_GET["id"]){
	
	@$idmi=_antinyeccionSQL(_antiXSS($_GET["id"]));	

	_bienvenido_mysql();

	$result = mysql_query ("DELETE FROM metroinforma WHERE id = ". $idmi) or die('Error Eliminando Metro informa - ' . mysql_error());
	
	if($result){
		notificar("Metro informa eliminado con exito", "dashboard.php?data=admin-mi", "notify-error");
	}
	
	else {
		die(mysql_error());
	}			
}
else { ?>


<?php } ?>
