<?php
// Directorio del cuál vamos a extraer las imágenes
 $path = $_SERVER["DOCUMENT_ROOT"]."/src/images/";
 // Extracción de imágenes. Ver http://www.php.net/readdir
 $dh = opendir($path); 
 $archivos = array();
 while (($file = readdir($dh)) !== false) { 
 	if($file != "." && $file != "..") { 
   		if(substr($file, -4) == '.JPG') $archivos[] = $file;
   	} 
 } 
 closedir($dh); 
 sort($archivos); 
 
 //parte 1:  
 $total_imagenes=count($archivos);
 $image_a_mostrar=20;
 //estos valores los recibo por GET
 if(isset($_GET['pag'])){
 	$imagen_a_empezar=($_GET['pag']-1)*$image_a_mostrar;
 	$imagen_a_terminar=$imagen_a_empezar+$image_a_mostrar;
 	$pag_act=$_GET['pag'];
 	//caso contrario los iniciamos
 }else{
 	$imagen_a_empezar=0;
   	$imagen_a_terminar=$imagen_a_empezar+$image_a_mostrar;
   	$pag_act=1;
 }
 
 //parte 2: determinar numero de paginas
 $pag_ant=$pag_act-1;
 $pag_sig=$pag_act+1;
 $pag_ult=$total_imagenes/$image_a_mostrar;
 $residuo=$total_imagenes%$image_a_mostrar;
 if($residuo>0) $pag_ult=floor($pag_ult)+1; 
 //parte 3: navegacion
 echo "<a href=\"./\" onclick=\"Pagina('1')\">Primero</a> ";
 if($pag_act>1) echo "<a href=\"?pag=".$pag_ant."\" onclick=\"Pagina('$pag_ant')\">Anterior</a> ";
 echo "<strong>Pagina ".$pag_act."/".$pag_ult ."</strong>";
 if($pag_act<$pag_ult) echo " <a href=\"?pag=".$pag_sig."\" onclick=\"Pagina('$pag_sig')\">Siguiente</a> ";
 echo "<a href=\"?pag=". $pag_ult."\" onclick=\"Pagina('$pag_ult')\">Ultimo</a>";
 ?>
 <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
 <script type="text/javascript">
 	//<![CDATA[
 		$(function() {
 			$('.slideshow a').lightBox();
 		});
 	//]]> 
 </script>
 
 <body>
 <div class="slideshow">
 <?php 
 while($imagen_a_empezar<=$imagen_a_terminar){
 	//si se pasa de total de imagenes salir de bucle
 	if($imagen_a_empezar>=$total_imagenes) break;
 	?>
 	<a href="images/<?php echo $archivos[$imagen_a_empezar]?>"><img src="images/<?php echo $archivos[$imagen_a_empezar]?>" alt="" /></a>
 	<?php
 	$imagen_a_empezar++;
 }
 ?>
 </div>
 </body>