<?php 

if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<style type="text/css">
ul.baraja-container {
	width: 400px;
	height: 320px;
	margin: 0 auto 30px;
	position: relative;
	padding: 0;
	list-style-type: none;
	
}

ul.baraja-container li {
	width: 318px;
	height: 100%;
	margin: 0;
	position: absolute;
	top: -32px;
	left: -37px;
	cursor: pointer;
	background: #fff;
	pointer-events: auto;
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	-ms-backface-visibility: hidden;
	-o-backface-visibility: hidden;
	backface-visibility: hidden;
	background-color: #FFFFFF;
	
}

.no-js ul.baraja-container {
	width: auto;
	height: auto;
	text-align: center;
}

.no-js ul.baraja-container li {
	position: relative;
	display: inline-block;
	width: 200px;
	height: 310px;
	margin: 10px;
}
.baraja-demo {
	width: 200px;
	margin: 30px auto;
	color: #aaa;
}

.no-js .baraja-demo {
	width: auto;
}

.baraja-demo h4 {
	color: #666;
	font-size: 14px;
	padding: 8px 10px 5px;
	margin: 20px 3px 5px;
	border-bottom: 1px solid #f0f0f0;
}

.baraja-demo p {
	font-size: 12px;
	font-weight: 700;
	padding: 0 10px;
	margin: 10px 3px 0;
}

.baraja-demo ul.baraja-container li {
	border-radius: 10px;
	padding: 5px;
	box-shadow: inset 0 0 0 1px rgba(0,0,0,0.08);
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.baraja-demo li img {
	display: block;
	margin: 0 auto;
	width: 100%;
	border-radius: 10px 10px 0 0;
}



.container {
	width: 100%;
	position: relative;
}



.actions {
	width: 100%;
	padding: 0 0 20px 0;
}

.actions span {
	box-shadow: 0 1px 1px rgba(0,0,0,0.2);
	background: #fff;
	color: #888;
	font-weight: 700;
	font-size: 12px;
	font-size: 1.2rem;
	text-align: center;
	display: inline-block;
	cursor: pointer;
	padding: 5px 10px;
	text-transform: uppercase;
	margin: 3px;
	border-radius: 3px;

}

.actions span:hover {
	background: #f7f7f7;
}

.actions span:active {
	background: #aaa;
	color: #fff;
	box-shadow: 0 1px 1px rgba(255,255,255,0.5);
}

.actions span.disabled {
	opacity: 0.8;
	color: #ddd;
}

#nav-prev, #nav-next {
	width: 30px;
	height: 30px;
	font-size: 18px;
	line-height: 20px;
}


</style>


		<script type="text/javascript" src="modules/clasificados/modernizr.custom.79639.js"></script>

	</head>
<div id="contentHeader">
  <h2>Datos del Producto</h2>  
</div>
<div class="container">
	<div class="grid-20">
	<div class="widget">
    <div class="widget-header"> 
 <span class="icon-pin"></span>
								<h3>Producto Publicado</h3>
							</div>
					<div class="widget-content">
						<br />
<?php

		include("conexion.php");

		        $producto = $_POST['producto'];
			    $titulo = $_POST['titu'];
				$precio = $_POST['pre'];
				
				$tipo_prod = $_POST['tipo_prod'];
				$tex_prod = $_POST['tex_prod'];
				$telefono =$_POST['telefono'];
				$cantidad =$_POST['cantidad'];
				$u=$usuario_datos[9];
			    $categoria =$_POST['tipo_prod'];
		        $fecha_publicacion=$_POST['fecha_publicacion'];
				$fecha_despublicacion=$_POST['fecha_de_despublicacion'];
				$id =$_FILES['imagen']['name'];
				$if =$_FILES['imagen2']['name'];
				$ii =$_FILES['imagen3']['name'];
				
			if ($_FILES["imagen"]["error"] > 0){
	       echo "ha ocurrido un error";
           } else {
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 16384;
	    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
	$ruta = "imagenes_clasificados/" . $_FILES['imagen']['name'];
	     if (!file_exists($ruta)){
	$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
	$id =$_FILES['imagen']['name'];
	
	$consulta="insert into clasificados_avisos 						     "
                . " (usuario,fecha_publicacion,titulo,producto,texto_aviso,cantidad,fotos,foto2,foto3,precio,categoria) "
                . "values ('$u','$fecha_publicacion','$titulo','$producto','$tex_prod','$cantidad','$id','$if','$ii','$precio','$tipo_prod')";	
	$insert=mysql_query($consulta,$conectar) or die(mysql_error());
	 
	
	   }
	   }
	   } 
       }		
	   
	if ($_FILES["imagen2"]["error"] > 0){
	       echo "ha ocurrido un error";
           } else {
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 16384;
	    if (in_array($_FILES['imagen2']['type'], $permitidos) && $_FILES['imagen2']['size'] <= $limite_kb * 1024){
	$rutaa = "imagenes_clasificados/" . $_FILES['imagen2']['name'];
	     if (!file_exists($rutaa)){
	$resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"], $rutaa);
			if ($resultado){
	$if =$_FILES['imagen2']['name'];
	
	}
	}
	}
	}
	
	if ($_FILES["imagen3"]["error"] > 0){
	       echo "ha ocurrido un error";
           } else {
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 16384;
	    if (in_array($_FILES['imagen3']['type'], $permitidos) && $_FILES['imagen3']['size'] <= $limite_kb * 1024){
	$rutaaa = "imagenes_clasificados/" . $_FILES['imagen3']['name'];
	     if (!file_exists($rutaaa)){
	$resultado = @move_uploaded_file($_FILES["imagen3"]["tmp_name"], $rutaaa);
			if ($resultado){
	$ii =$_FILES['imagen3']['name'];
	
	}
	}
	}
	}
	
			
		?> 

                                                <div class='error'><center> Tu publicaciòn fue exitosa, esta solicitud sera evaluda.</center></div>


				<nav class="actions">
            <div align="center"><strong><?php echo $titulo;?>
              <div class="baraja-demo">
					<ul id="baraja-el" class="baraja-container">
						<li><img style="width: 316px;
	height: 300px;" src="<?php echo $ruta;?>" alt="imagenes1"/>
					  <h4><?php echo $producto;?></h4><p>PVP:<?php echo $precio;?></p></li>
						<li><img style="width: 316px;
	height: 300px;" src="<?php echo $rutaa;?>" alt="imagenes2"/><h4><?php echo $producto;?></h4><p>PVP:<?php echo $precio;?></p></li>
						<li><img  src="<?php echo $rutaaa;?>" alt="imagenes3" style="width: 316px;
	height: 300px;"/>
					  <h4><?php echo $producto;?></h4><p>PVP:<?php echo $precio;?></p></li>
					
					
					<center</ul>
			  </div><nav class="actions light">
					<span id="nav-prev">&lt;</span>
					<span id="nav-next">&gt;</span>
					
				</nav><br/></section></center>


  
			
			 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="modules/clasificados/jquery.baraja.js"></script>
        <script type="text/javascript">	
			$(function() {

				var $el = $( '#baraja-el' ),
					baraja = $el.baraja();

				// navigation
				$( '#nav-prev' ).on( 'click', function( event ) {

					baraja.previous();
				
				} );

				$( '#nav-next' ).on( 'click', function( event ) {

					baraja.next();
				
				} );

				// simple fan
				$( '#nav-fan' ).on( 'click', function( event ) {

					baraja.fan( {
						speed : 500,
						easing : 'ease-out',
						range : 90,
						direction : 'right',
						origin : { x : 25, y : 100 },
						center : true
					} );
				
				} );
	} );
				
		</script>
		
		


		
</div> <!-- .widget-content -->
				</div> <!-- .widget -->  
			</div> <!-- .grid -->
			</div>
			</div>
			
