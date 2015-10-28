<?php 
	require("conexiones_config.php");
	session_start();
	session_regenerate_id(true);
	if(!isset($_SESSION[md5('usuario_datos'.$ecret)])) {ir("index.php");}
	$usuario_datos = $_SESSION[md5('usuario_datos'.$ecret)];
	$usuario_permisos = $_SESSION[md5('usuario_permisos'.$ecret)];
	if (!in_array('Dashboard', $usuario_permisos)) {
		alerta("No tiene permisos - Comuniquese con la Division de Sistemas de la Gerencia de Tecnología de Información");
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
	<title>GMVV Metromara v3.0..</title>
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
	<link rel="stylesheet" href="src/stylesheets/QapTcha.jquery.css?<?php echo $anticache; ?>" type="text/css" />
	<link rel="stylesheet" href="src/stylesheets/progressbar.css?<?php echo $anticache; ?>" type="text/css" />
	<script src="src/javascripts/funciones.js?<?php echo $anticache; ?>"></script>
	<script src="src/javascripts/all.js?<?php echo $anticache; ?>"></script>
</head>
<body>	
<div id="wrapper">
	<div id="header">
  <div><img src="src/images/logo.png" style="margin-top:10px;" /></div>	
		<a href="javascript:;" id="reveal-nav"><span class="reveal-bar"></span><span class="reveal-bar"></span><span class="reveal-bar"></span></a>
	</div> <!-- #header -->
	<div id="search" style="display:none">
		<form>
			<input type="text" name="search" placeholder="Buscar..." id="searchField" />
		</form>		
	</div> <!-- #search -->
	
	<div id="sidebar">		
		
      
<ul id="mainNav">			
	<li id="inicio" class="nav">
		<span class="icon-home"></span>
		<a href="dashboard.php?data=inicio">Pagina Principal</a>				
	</li>

      
        
<?php if (in_array ('Auth', $usuario_permisos)) { ?>
<li id="auth" class="nav">
	<span class="icon-document-alt-stroke"></span>
		<a href="javascript:;">Accesos</a>				
		<ul class="subNav">
		<li><a href="dashboard.php?data=usuarios">Usuarios</a></li>
		<li><a href="dashboard.php?data=perfiles">Perfiles</a></li>
	</ul>						
</li>
<?php } ?>
		

  
<?php if (in_array ('Notificacionesadmin', $usuario_permisos)) { ?>
<li id="notificacionesadmin" class="nav">
		<span class="icon-layers"></span>
		<a href="dashboard.php?data=notiadmin">Mensajeria</a>
</li>
<?php } ?>	 
  
  
 


<?php if (in_array ('Generadormd5', $usuario_permisos)) { ?>
<li id="generadormd5" class="nav">
	<span class="icon-layers"></span>
	<a href="dashboard.php?data=genmd5">Generador MD5</a>
</li>
<?php } ?>	
 
  
  
  <?php if (in_array ('Expedientes', $usuario_permisos)) { ?>
<li id="expedientes" class="nav">
	<span class="icon-document-alt-stroke"></span>
		<a href="javascript:;">Expedientes</a>				
		<ul class="subNav">
		<li><a href="dashboard.php?data=exp-egr">Egresos</a></li>
		<li><a href="dashboard.php?data=exp-ing">Ingresos</a></li>
                <li><a href="dashboard.php?data=exp_cons">Consultas</a></li>

                
	</ul>						
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
		 		<div id="menuProfile" class="menu-container menu-dropdown" style="top:45px !important;">
					<div class="menu-content">
						<ul>
                          <?php if (in_array ('Perfil', $usuario_permisos)) { ?><li><a href="dashboard.php?data=perfil">Cambio de Contraseña</a></li><?php } ?>
                          <?php if (in_array ('Notificaciones', $usuario_permisos)) { ?><li><a href="dashboard.php?data=notihistorial">Notificaciones</a></li><?php } ?>
                          
                          
                          <li><a href="dashboard.php?data=bye">Cerrar sesión</a></li>
						</ul>
					</div>
				</div>
	 		</li>
		 	
		 </ul>
	</div> <!-- #topNav -->
	

	
</div> <!-- #wrapper -->

<footer><a href="#" class="go-top">Ir Arriba</a></footer>

<div id="footer">
	Division de Sistemas - Gerencia de Tecnología para la Información - Empresa Socialista Metro de Maracaibo, C.A &copy; 2014.
</div>

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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52631632-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
