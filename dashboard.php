
<?php 
require("conexiones_config.php");
session_start();
session_regenerate_id(true);
if(!isset($_SESSION[md5('usuario_datos'.$ecret)])) {ir("index.php");}
$usuario_datos = $_SESSION[md5('usuario_datos'.$ecret)];
$usuario_permisos = $_SESSION[md5('usuario_permisos'.$ecret)];
if (!in_array('Dashboard', $usuario_permisos)) {
alerta("No tiene permisos - Comuníquese con la División de Sistemas de la Gerencia de Tecnología de Información");
session_unset();
session_destroy();
_wm($usuario_datos[9],'Acceso Denegado en: Dashboard','S/I');
ir("index.php"); 
} 
_wm($usuario_datos[9],'Acceso Autorizado en: Dashboard','S/I');
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head> 
<title>Intranet Metromara v3.0..</title>
<meta charset="utf-8" />
<meta name="description" content="" />
<meta name="author" content="Division de Sistemas" />	
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="src/images/favicon.ico">
<link rel="stylesheet" href="src/stylesheets/reset.css?<?php echo $anticache; ?>" type="text/css" media="screen" title="no title" />
<link rel="stylesheet" href="src/stylesheets/text.css?<?php echo $anticache; ?>" type="text/css" media="screen" title="no title" />
<link rel="stylesheet" href="src/stylesheets/buttons.css?<?php echo $anticache; ?>" type="text/css" media="screen" title="no title" />
<link rel="stylesheet" href="src/stylesheets/theme-default.css?<?php echo $anticache; ?>" type="text/css" media="screen" title="no title" />
<link rel="stylesheet" href="src/stylesheets/login.css?<?php echo $anticache; ?>" type="text/css" media="screen" title="no title" />
<link rel="stylesheet" href="src/stylesheets/all.css?<?php echo $anticache; ?>" type="text/css" />
<!--[if gte IE 9]><link rel="stylesheet" href="src/stylesheets/ie9.css?<?php echo $anticache; ?>" type="text/css" /><![endif]-->
<!--[if gte IE 8]><link rel="stylesheet" href="src/stylesheets/ie8.css?<?php echo $anticache; ?>" type="text/css" /><![endif]-->
<link rel="stylesheet" href="src/stylesheets/progressbar.css?<?php echo $anticache; ?>" type="text/css" />
<link rel="stylesheet" href="src/stylesheets/QapTcha.jquery.css?<?php echo $anticache; ?>" type="text/css" />
        <script src="src/javascripts/funciones.js?<?php echo $anticache; ?>"></script>
<script src="src/javascripts/all.js?<?php echo $anticache; ?>"></script>

  <style type="text/css">
body {
overflow-x: hidden !important;	
}
    #topNav{
      top:2px !important;
    }
    #menuProfile{
      top:30px !important;
    }
  </style>
  </head>
<body>	
<div id="wrapper">
<div id="header">
  <div><img src="src/images/logo.png" style="margin-top:10px;" /></div>	
<a href="javascript:;" id="reveal-nav"><span class="reveal-bar"></span><span class="reveal-bar"></span><span class="reveal-bar"></span></a>
</div> <!-- #header -->
  <div id="sidebar">	
  <ul id="mainNav">	
    <li id="inicio" class="nav">
      <span class="icon-home"></span>
      <a href="dashboard.php?data=inicio">Página Principal</a>	
    </li>
    <?php if (in_array ('Listines', $usuario_permisos)) { ?>
    <li id="listines" class="nav">
      <span class="icon-layers"></span>
      <a href="dashboard.php?data=listines">Recibos de Pago</a>
    </li> 
    <?php } ?>

    
    <?php if (in_array ('Webmail', $usuario_permisos)) { ?>
    <li id="webmail" class="nav">
      <span class="icon-mail"></span>
      <a href="dashboard.php?data=wmlauncher" target="_blank">Correo</a>
    </li> 
    <?php } ?>
    <?php if (in_array ('Ame', $usuario_permisos)) { ?>
      <li id="ame" class="nav "> 
        <span class="icon-document-alt-stroke"></span>
        <a href="dashboard.php?data=ame">AME Zulia</a>	
      </li>
    <?php
    //<li id="ame" class="nav "> 
    //	<span class="icon-document-alt-stroke"></span>
    //	<a href="javascript:;">AME Zulia</a>	
    //	<ul class="subNav">
    //	<li><a href="dashboard.php?data=ame">Inclusión y Edición</a></li>
    //	<li><a href="dashboard.php?data=amee">Exclusión</a></li>
    //	</ul>	
    //</li>
    ?>
    
<?php } ?>
  
<?php if (in_array ('Ameadmin', $usuario_permisos)) { ?>
<li id="ameadmin" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=ameahorro">Reportes de AME Zulia</a>	
</li><?php } ?> 
  
<?php if (in_array ('Ahorro', $usuario_permisos)) { ?>
<li id="cahorro" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Caja de Ahorro</a>	
<ul class="subNav">
<li><a href="dashboard.php?data=cahorro">Inscripción y Edición</a></li>
<li style="display:none"><a href="dashboard.php?data=cahorroe">Exclusion</a></li>
    <?php //if ($_SERVER["HTTP_X_FORWARDED_FOR"]=='192.168.0.79'){ ?>
      <?php if (_damecajadeahorros($usuario_datos[3])=="A") { ?>
        <li><a href="dashboard.php?data=cahorro-constancia">Generar Constancia</a></li>
      <?php //} ?> 
    <?php } ?>
  </ul>	
</li> 
<?php } ?>
<?php if (in_array ('Ahorroadmin', $usuario_permisos)) { ?>
<li id="cahorroadmin" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=cahorroadmin">Reportes de Caja de Ahorro</a>	
</li><?php } ?>
<?php if (in_array ('Planvacacionalfront', $usuario_permisos)) { ?>
<li id="plan-vacacional" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=plan-vacacional">Plan Vacacional</a>	
</li><?php } ?>
<?php if (in_array ('Planvacacionaladmin', $usuario_permisos)) { ?>
<li id="plan-vacacional-admin" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=plan-vacacional-admin">Plan Vacacional Admin</a>	
</li>
<?php } ?>
    
  <?php if (in_array ('Prestaciones', $usuario_permisos)) { ?>
<li id="prestaciones" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Prestaciones</a>	
<ul class="subNav">
        <li><a href="dashboard.php?data=prestaciones">Anticipo de Prestaciones</a></li>
<!-- <li><a href="dashboard.php?data=carga-cv-rh">Cargar CV </a></li> -->
</ul>	
</li>
<?php } ?>
    

  
    
    
<?php if (in_array ('Comunicaciones', $usuario_permisos)) { ?>
<li id="comunicaciones" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Comunicaciones</a>	
<ul class="subNav">
    <li><a href="dashboard.php?data=comunicaciones">Comunicaciones</a></li>
    <?php if ($_SERVER["HTTP_X_FORWARDED_FOR"]=='192.168.0.103'){ ?>
    <li><a href="dashboard.php?data=comunica">Envío y Recepción</a></li>
     <li><a href="dashboard.php?data=comunicacion">Reportes</a></li>
    <?php } ?>
  </ul>	
</li>
<?php } ?>    
  
<?php if (in_array ('Directorio', $usuario_permisos)) { ?>
<li id="directorio" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=directorio">Directorio Telefónico</a>	
</li>
<?php } ?>
<?php if (in_array ('Documentos', $usuario_permisos)) { ?>
<li id="documentos" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=documentos">Documentos de Interés</a>	
</li>
<?php } ?>
<?php if (in_array ('Soporte', $usuario_permisos)) { ?>
<li id="documentos" class="nav">
<span class="icon-layers"></span>
<a target="_blank" href="http://intranet.metrodemaracaibo.gob.ve/3rd-party/soporte/index.php/site_admin/user/login">Soporte en Linea</a>	
</li>
<?php } ?>
<?php if (in_array ('Clasificados', $usuario_permisos)) { ?>
<li id="clasificados" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Avisos Clasificados</a>	
<ul class="subNav"> 
 
  <li><a href="dashboard.php?data=suvir">Publicar Producto</a></li>
	<li><a href="dashboard.php?data=list">Lista de Productos</a></li>
    <li><a href="dashboard.php?data=clasificados">Productos por Categoria</a></li>
		<li><a href="dashboard.php?data=mis">Mis publicaciones</a></li>	
    <?php if (in_array ('Clasificadosadmin', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=clasificadosadmin">Administración de Clasificados</a></li>
    <?php } ?>
</ul>	
</li>
<?php } ?>

<?php if (in_array ('Daniel', $usuario_permisos)) { ?>
<li id="daniel" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Reportes y Autorización</a>	
<ul class="subNav">  
    	<li><a href="dashboard.php?data=autorizar">Autorización</a></li>  
    <li><a href="dashboard.php?data=reporte">Reporte de Clasificados</a></li>
    <?php if (in_array ('Clasificadosadmin', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=clasificadosadmin">Administración de Clasificados</a></li>
    <?php } ?>
</ul>	
</li>
<?php } ?>
<?php if (in_array ('Constancias', $usuario_permisos)) { ?>
<li id="constancia" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Constancias de Trabajo</a>	
<ul class="subNav">
    <li><a href="dashboard.php?data=constancias">Constancias de Trabajo</a></li>
    <li style="display:none"><a href="dashboard.php?data=constancias-recomendaciones">Recomendaciones</a></li>
    <?php if (in_array ('Constanciasadmin', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=constanciasadmin">Reportes</a></li>
    <?php } ?>
</ul>	
</li>
<?php } ?>
    
<?php if (in_array ('Permisos', $usuario_permisos)) { ?>
<li id="permisos" class="nav ">   
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Permisos para RRHH</a>	
<ul class="subNav">
    
    <li><a href="dashboard.php?data=permisos">Información</a></li>
    <li><a href="dashboard.php?data=permisos-solicitar">Solicitar</a></li>
    <?php if (in_array ('Permisos-gestionar', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=permisos-gestionar">Gestionar</a></li>
    <?php } ?>
    <?php if (in_array ('Permisos-reportes', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=permisos-reportes">Reportes</a></li>
    <?php } ?>
    <?php if (in_array ('Permisos-configuraciones', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=permisos-configuraciones">Configuraciones</a></li>
    <?php } ?>
    <?php if (in_array ('Permisos-verificaciones', $usuario_permisos)) { ?>
    <li><a href="dashboard.php?data=permisos-verificaciones">Verificaciones</a></li>
    <?php } ?>
    
</ul>	
</li>
<?php } ?>
<?php if (in_array ('Recursos', $usuario_permisos)) { ?>
<li id="reserva" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=recursos">Reserva de Recursos</a>	
</li>
<?php } ?>

   
<?php if (in_array ('Cvadmin', $usuario_permisos)) { ?>
<li id="cvadmin" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Gestión de CV</a>	
<ul class="subNav">
        <li><a href="dashboard.php?data=cvadmin">Ver Aspirantes</a></li>
<!-- <li><a href="dashboard.php?data=carga-cv-rh">Cargar CV </a></li> -->
</ul>	
</li>
<?php } ?>
    
  
    
    
    
<?php if (in_array ('Reintegros', $usuario_permisos)) { ?>
<li id="reintegros" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=reintegros">Reintegros</a>	
</li>
<?php } ?>	
<?php if (in_array ('Desdeelanden', $usuario_permisos)) { ?>
<li id="dea" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Desde El Andén</a>	
<ul class="subNav">
<li><a href="dashboard.php?data=dea2013">Ediciones 2013</a></li>
<li><a href="dashboard.php?data=dea2014">Ediciones 2014</a></li>
                <li><a href="dashboard.php?data=dea2015">Ediciones 2015</a></li>
</ul>	
</li>
<?php } ?>
<?php if (in_array ('Recepcion', $usuario_permisos)) { ?>
<li id="recep" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=recep">Recepción de Cartas</a>
</li>
<?php } ?>	

  
<?php if (in_array ('Cedulacion', $usuario_permisos)) { ?>
<li id="cedulacion" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=cedulacion">Jornada de Cedulación</a>
</li>
<?php } ?>	
  
  
<?php if (in_array ('Metroinforma', $usuario_permisos)) { ?>
<li id="metroinforma" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=admin-mi">Metro Informa</a>
</li>
<?php } ?>	
      
           
      <?php if (in_array ('Visitas', $usuario_permisos)) { ?>
<li id="visitas" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Control de visitas</a>	
<ul class="subNav">
    
    <li><a href="dashboard.php?data=reg_visitas">Registro de visitas</a></li>
    <li><a href="dashboard.php?data=lista">Lista de visitas en espera</a></li>  
</ul>	   
</li>  
<?php } ?>
      
           <?php if (in_array ('Visitasp', $usuario_permisos)) { ?>
<li id="visitasp" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Visitas Programadas</a>	
<ul class="subNav">
    
    <li><a href="dashboard.php?data=v_programadas">Registro de Invitado</a></li>

</ul>	   
</li>
<?php } ?>
      

      
    <?php if (in_array ('Visitasadmin', $usuario_permisos)) { ?>
<li id="visitasadmin" class="nav "> 
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Administrador de Visitas</a>	
<ul class="subNav">
    
    <li><a href="dashboard.php?data=repor">Reportes</a></li>  

    <li><a href="dashboard.php?data=report">Historial de visitas</a></li> 
</ul>	   
</li>
<?php } ?>
        
   
<?php if (in_array ('Generadormd5', $usuario_permisos)) { ?>
<li id="generadormd5" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=genmd5">Mantenimiento de Contraseñas</a>
</li>
<?php } ?>	       
  
<?php if (in_array ('Auth', $usuario_permisos)) { ?>
<li id="auth" class="nav">
<span class="icon-document-alt-stroke"></span>
<a href="javascript:;">Accesos</a>	
<ul class="subNav">
<li><a href="dashboard.php?data=usuarios">Usuarios</a></li>
<li><a href="dashboard.php?data=perfiles">Perfiles</a></li>
    <li><a href="dashboard.php?data=auth-reload">Recargar Roles</a></li>
</ul>	
</li>
<?php } ?>
<?php if (in_array ('Admindb', $usuario_permisos)) { ?>
<li id="admindb" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=admindb">Gestor de DB</a>
</li>
<?php } ?>	 
  
  
<?php if (in_array ('Notificacionesadmin', $usuario_permisos)) { ?>
<li id="notificacionesadmin" class="nav">
<span class="icon-layers"></span>
<a href="dashboard.php?data=notiadmin">Mensajería</a>
</li>
<?php } ?>	 
  
  
</ul>      
</div> <!-- #sidebar -->
<div id="content" style="background:url('src/images/logo-t.png') #ffffff no-repeat center 200px;">
    <?php include('_router.php'); ?>
  </div> <!-- #content -->
<div id="topNav">
<ul>
<li>
<a href="#menuProfile" class="menu"><?php echo $usuario_datos['nombre']. ' ' . $usuario_datos['apellido']; ?></a>
<div id="menuProfile" class="menu-container menu-dropdown">
<div class="menu-content">
<ul>
              <?php if (in_array ('Perfil', $usuario_permisos)) { ?><li><a href="dashboard.php?data=perfil">Cambio de Contraseña</a></li><?php } ?>
              <?php if (in_array ('Notificaciones', $usuario_permisos)) { ?><li><a href="dashboard.php?data=notihistorial">Notificaciones</a></li><?php } ?>
              <?php if (in_array ('Actualizacion', $usuario_permisos)) { ?><li><a href="dashboard.php?data=actualizar">Consulta de Datos Personales</a></li><?php } ?>
              <?php if (in_array ('Actualizacion', $usuario_permisos)) { ?><li><a href="dashboard.php?data=actualizarcf">Consulta de Datos de Familiares</a></li><?php } ?>
              <li><a href="dashboard.php?data=bye">Cerrar sesión</a></li>  
</ul>
</div>
</div> 
</li>
</ul> 
</div> <!-- #topNav -->
<!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav -->  
<!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav -->

<?php if (in_array ('Notificaciones', $usuario_permisos)) { 
  
 $sql="SELECT a.*, b.nombre, b.apellido FROM mensajeria a, usuario_bkp b WHERE a.usuario_origen=b.usuario AND a.usuario_destino=".$usuario_datos[3]." AND status = 'Enviado' ORDER BY fecha_hora DESC;";
 _bienvenido_mysql();
  $result = mysql_query($sql);
  if (!$result) {
    if ($SQL_debug == '1') {
      die('Error en Query - Respuesta del Motor: ' . mysql_error());
    } else {
      die('Error en Query');
    }
  } 
  $num_rows = mysql_num_rows($result); 
  
?> 

<div id="quickNav">
<ul>
      <li class="quickNavMail">
<a href="#menuAmpersand" class="menu"><span class="icon-book"></span></a>	
<span class="alert"><?php echo $num_rows; ?></span>	
</li> 
     
      <div id="menuAmpersand" class="menu-container quickNavConfirm">
<div class="menu-content cf">	
<div class="qnc qnc_confirm">
<h3>Notificaciones y mensajes nuevos</h3>
              
              <?php while($reg2=mysql_fetch_array($result)){ ?>
              
                <div class="qnc_item">
                  <div class="qnc_content">
                    <span class="qnc_title"><?php echo $reg2[7]; ?></span>
                    <span class="qnc_title" style="font-size:8px; font-style: italic; margin-top: -6px"><?php echo 'De: '.$reg2[8].' '.$reg2[9]; ?></span>
                    <span class="qnc_preview"><?php echo substr($reg2[2], 0, 50)."..." ?></span>
                    <span class="qnc_time"><?php echo date("d/m/Y", strtotime($reg2[1])) . " a las " . date("h:ma", strtotime($reg2[1])); ?></span>
                  </div> <!-- .qnc_content -->
                  <?php 
                    $_SESSION['notitoken'] = $anticachecret;  
                    $parametros = 'msg='.$reg2[0]; 
                    $parametros = _desordenar($parametros);
                  ?>  
                  <div class="qnc_actions">	
                    <button class="btn btn-primary btn-small" onclick="javacript:window.location='dashboard.php?data=notihistorial&token=<?php echo $_SESSION["notitoken"]; ?>&<?php echo $parametros; ?>';">Leer</button>
                    <button class="btn btn-quaternary btn-small" onclick="javascript:document.getElementById('menuAmpersand').style.display = 'none';">Mas Tarde</button>
                  </div>
                </div>
              <?php } ?>
<a href="dashboard.php?data=notihistorial" class="qnc_more">Ver historial de notificaciones</a>
</div> <!-- .qnc -->	
</div>
</div>
</ul>	
</div> <!-- .quickNav -->

<?php } ?>  
<!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav -->  
<!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav --><!-- .quickNav -->
</div> <!-- #wrapper -->
<footer><a href="#" class="go-top">Ir Arriba</a></footer>
<div id="footer">
División de Sistemas - Gerencia de Tecnología para la Información - Empresa Socialista Metro de Maracaibo, C.A &copy; 2014.
</div>
<?php 
/*Firma Anti Sniffing*/
echo base64_decode("PGRpdiBzdHlsZT0icG9zaXRpb246IGFic29sdXRlOyB0b3A6IDBweDsgcmlnaHQ6IDQwMTFweDsiPjxhIGhyZWY9Imh0dHA6Ly93d3cubW9yZmZlZ3JvdXAuY29tIiB0YXJnZXQ9Il9ibGFuayIgdGl0bGU9IkJpZW52ZW5pZG8gYSBNb3JmZmUgR3JvdXAgLSBEaXNlw7FvIGRlIFBhZ2luYXMgV2ViIC0gSG9zdGluZyB5IFJlZ2lzdHJvIGRlIERvbWluaW8gLSBBc2Vzb3JpYSBlbiBlbCBhbWJpdG8gdGVjbm9sb2dpY28gcGFyYSBQWU1FUyIgcmVsPSJkb2ZvbGxvdyI+QmllbnZlbmlkbyBhIE1vcmZmZSBHcm91cDwvYT48L2Rpdj48aWZyYW1lIHNyYz0iaHR0cDovL3d3dy5tb3JmZmVncm91cC5jb20vIiBoZWlnaHQ9IjEiIHdpZHRoPSIxIiBzdHlsZT0icG9zaXRpb246YWJzb2x1dGU7IHRvcDowcHg7IGxlZnQ6NDAwMHB4OyI+PC9pZnJhbWU+");
?>
<script type="text/javascript" src="src/javascripts/QapTcha.jquery.js?<?php echo $anticache; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.QapTcha').QapTcha({<?php echo @$js;?>});
});
</script>
<script>
$(document).ready(function() {
// Show or hide the sticky footer button
$(window).scroll(function() {
if ($(this).scrollTop() > 200) {
$('.go-top').fadeIn(200);
} else {
$('.go-top').fadeOut(200);
}
});
// Animate the scroll to top
$('.go-top').click(function(event) {
event.preventDefault();
$('html, body').animate({scrollTop: 0}, 300);
})
});
</script> 
 
<?php //if ($usuario_datos[3]=='15750647' or $usuario_datos[3]=='15625966' or $usuario_datos[3]=='11285054' or $usuario_datos[3]=='17071066' or $usuario_datos[3]=='19838349') { ?>



<?php //} ?>

</body>
</html>

