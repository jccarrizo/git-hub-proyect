CONTENT 					DASHBOARD
	<------------------------->
							MODULOS
	CONTAINER
		GRID
			WIDGET
				WIDGET HEADER
				WIDGET CONTENT
				
<--------------------------------------------------------------------------------------------------->
		
pagina en el root


		
		
pagina en el modulo

		
		
pagina independiente
		
		
<-------------------------------------------------------al 26/06------------------------------------------>
<?

id_usuario
$usuario_datos[0]
		
nombre
$usuario_datos[1]
		
apellido
$usuario_datos[2]
		
usuario (cedula)
$usuario_datos[3]
		
clave
$usuario_datos[4]
		
correo_corporativo
$usuario_datos[5]
		
correo_principal
$usuario_datos[6]
		
telefono
$usuario_datos[7]
		
habilitado
$usuario_datos[8]
		
usuario_int
$usuario_datos[9]
		
***disponible***
$usuario_datos[10]
		
perfil
$usuario_datos[11]
		
perfil_nom
$usuario_datos[12]
		
role
$usuario_datos[13]
		
ubicacion laboral
$usuario_datos[14]
<--------------------------------------------------------------------------------------------------->
_wm($usuario_datos[9],'Creacion planilla ARC','S/I');
_wm($usuario_datos[9],'Acceso Autorizado en la Intranet','S/I');
_wm('S/I','Acceso Denegado en la Intranet','S/I');
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__)),'S/I');
_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__)),'S/I');
_wm($reg[3],'Recordando la Contraseña de Acceso','S/I');
_wm('null','Usuario no recuerda ni su correo','S/I');
_wm($usuario_datos[9],'Cambio de contraseña','S/I');
_wm($usuario_datos[9],'El Usuario no Posee Correo Electronico en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
_wm($usuario_datos[9],'A el usuario se le notifico el envio de correo electronico del cambio de contraseña en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
_wm($usuario_datos[9],'A el usuario se le notifico que no se pudo enviar el correo electronico del cambio de contraseña en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
_wm($usuario_datos[9],'Contraseña Actual Invalida en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
_wm($usuario_datos[9],'Registro en Plan Vacacional 2014','S/I');		
_wm($usuario_datos[9],'Cambio de contraseña cambiada a:'.$cedula,'S/I');
_wm($usuario_datos[9],'Error en cambio de contraseña cambiada a:'.$cedula,'S/I');
		
		
		
		
		
		
		
		
		
		
		
		
		
		
?>

	<?	
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

	<?
decode_get2($_SERVER["REQUEST_URI"],2);
?>	

	<?
$parametros ="tn=".$reg['tip_proc']."&fp=".$reg['fre_pag']."&ff=".$reg['fec_fin']; 
$parametros = _desordenar($parametros); 
?>
<a href="dashboard.php?data=listines&flag=1&<?php echo $parametros; ?>" target=""><button class="btn btn-small btn-primary">Ver listin</button></a>

	<?	
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");} 
?>

	<?
if ($SQL_debug=='1'){ die('Error en Query - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Query');}
?>

	<?
if(!$result){
	if ($SQL_debug=='1'){ die('Error en Query - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Query');}	
}
?>



	?>
	
<--------------------------------------------------------------------------------------------------->
	
	
proteccion
	
<?php 
	if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
?>
	
	

NOTIFICACIONES   <-------------------------><-------------------------><------------------------->

<? notificar($mensaje, $url, $tipo) ?>
<?php include('notificador.php'); ?>

BASE DE DATOS    <-------------------------><-------------------------><------------------------->

<?php
	
	_bienvenido_mysql();

	$result = mysql_query ("DELETE FROM metroinforma WHERE id = ". $idmi) or die('Error Eliminando Metro informa - ' . mysql_error());
	
	if($result){ ?>
			
		<?php notificar("Metro informa eliminado con exito", "dashboard.php?data=admin-mi", "notify-error"); ?>
			
	<?php }	else { ?>
		
		<?php die(mysql_error()); ?>
	
	<?php }	_adios_mysql(); 
	
?>

IF EN BASE HTML SOBRE PHP    <-------------------------><-------------------------><------------------------->
	
		
	<?php if() { ?>
			
		
	<?php }	else { ?>
		

	<?php }	?>

PARAMETROS GET <-------------------------><-------------------------><------------------------->

<!------------------------------------------------------------------------------------------------------------>
<?php if (@isset($_GET['ff'])) { ?> 																		<!--------- PROCESO LISTINES --------->
<!------------------------------------------------------------------------------------------------------------>
		
		
<!----------------------------------------------------------------------------------------------------------->
<?php } else { ?>                                         	 		   			<!------------ VER LISTINES ---------->
<!----------------------------------------------------------------------------------------------------------->	
					
<!----------------------------------------------------------------------------------------------------------->
<? } ?>

<-------------------------><-------------------------><-------------------------><------------------------->
	
	
	
	
$usuario_datos[3]-usuario_int de Expedientes	
	
<?php if (in_array ('Actualizacion', $usuario_permisos)) { ?><li><a href="dashboard.php?data=actualizar">Datos Personales</a></li><?php } ?>

<?php
// fecha_a es la primera fecha
$fecha_a= "1980/10/28";
// fecha_b en este caso es la fecha actual
$fecha_b= date("Y/m/d");

function dias_transcurridos($fecha_i,$fecha_f)
{
$dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
$dias = abs($dias); $dias = floor($dias);
return $dias;
}
?>
<p>Días transcurridos <?=dias_transcurridos($fecha_a,$fecha_b);?></p>

 //calculo entre fechas
 
 $sql=mysql_query("SELECT *
FROM egreso
WHERE fecha_egr >= '$fecha_egr'
AND fecha_egr <= '$fecha_er'");
//RANGO DE FECHAS
     echo '<option select="select"></option>';
//Combo para que la primera línea te salga en blanco
Comando para calcular numero de dias trasncurridos meses u años
SELECT TIMESTAMPDIFF(DAY , '2014-10-09', '2014-10-28');
query.
SELECT * FROM ingreso WHERE fecha_ing >= '$fecha_ing' AND fecha_ing <= '$fecha_er' AND codigo_ar LIKE '%$codigo1%' AND entrego LIKE '%$ent%' AND recibido LIKE '%$rec%';

//Codigo para agregar me gusta y no me gusta.
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&layout=standard&show_faces=false&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:25px"></iframe> 

<script type="text/javascript">

<!-- Google +1 -->
window.___gcfg = {lang: 'es'};
(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();

<!-- Twitter +1 -->
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

</script>

<iframe src="http://www.facebook.com/plugins/like.php?href=www.aquí_va_su_web.com&layout=box_count&show_faces=true&width=75&action=like&font=trebuchet+ms&colorscheme=light&height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:75px; height:65px;"></iframe>  

Hora
//solo si esta bien la hora del servidor   
                                          <?php
date_default_timezone_set("America/Quito" ) ;
$hora = date('h:i a',time() );

?> 

//da la hora actual de la pc donde se este abriendo el sistema por hidden(campo invisible)
<html>
<head>
<title>Reloj con Javascript</title>
<script language="JavaScript">
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}
</script>
</head>

<body onload="mueveReloj()">

Vemos aquí el reloj funcionando...

<form name="form_reloj">
    <input type="hidden" name="reloj" size="10">
</form>

</body>
</html> 


insertar Hora
    
<script>
$(function () { 
	$( "#datepicker" ).datepicker();
	$( "#datepicker_inline" ).datepicker();
	$('#colorpickerHolder').ColorPicker({flat: true});
	$('#timepicker').timepicker ({ 
		showPeriod: true 
		, showNowButton: true
		, showCloseButton: true
	});
	
	$('#timepicker_inline_div').timepicker({
	   defaultTime: '9:20'
	});		
		
	$('#colorSelector').ColorPicker({
		color: '#FF9900',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onSubmit: function (hsb, hex, rgb, el) {
			$(el).ColorPickerHide ();	
		},
		onChange: function (hsb, hex, rgb) {
			$('#colorSelector div').css({ 'background-color': '#' + hex });
			$('#colorpickerField1').val ('#' + hex);
		}
	});
	
	$('#colorpickerField1').live ('keyup', function (e) {
		var val = $(this).val ();
		val = val.replace ('#', '');
		$('#colorSelector div').css({ 'background-color': '#' + val });
		$('#colorSelector').ColorPickerSetColor(val);
	});

});

</script>



echo '';