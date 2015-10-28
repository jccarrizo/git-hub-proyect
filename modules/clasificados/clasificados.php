<script type='text/javascript'>
if (document.images){
(function(){
var cos, a = /Apple/.test(navigator.vendor), times = a? 20 : 40, speed = a? 40 : 20;
var expConIm = function(im){
im = im || window.event;
if (!expConIm.r.test (im.className))
im = im.target || im.srcElement || null;
if (!im || !expConIm.r.test (im.className))
return;
var e = expConIm,
widthHeight = function(dim){
return dim[0] * cos + dim[1] + 'px';
},
resize = function(){
cos = (1 - Math.cos((e.ims[i].jump / times) * Math.PI)) / 2;
im.style.width = widthHeight (e.ims[i].w);
im.style.height = widthHeight (e.ims[i].h);
if (e.ims[i].d && times > e.ims[i].jump){
++e.ims[i].jump;
e.ims[i].timer = setTimeout(resize, speed);
} else if (!e.ims[i].d && e.ims[i].jump > 0){
--e.ims[i].jump;
e.ims[i].timer = setTimeout(resize, speed);
}
}, d = document.images, i = d.length - 1;
for (i; i > -1; --i)
if(d[i] == im) break;
i = i + im.src;
if (!e.ims[i]){
im.title = '';
e.ims[i] = {im : new Image(), jump : 0};
e.ims[i].im.onload = function(){
e.ims[i].w = [e.ims[i].im.width - im.width, im.width];
e.ims[i].h = [e.ims[i].im.height - im.height, im.height];
e (im);
};
e.ims[i].im.src = im.src;
return;
}
if (e.ims[i].timer) clearTimeout(e.ims[i].timer);
e.ims[i].d = !e.ims[i].d;
resize ();
};

expConIm.ims = {};

expConIm.r = new RegExp('\\bexpando\\b');

if (document.addEventListener){
document.addEventListener('mouseover', expConIm, false);
document.addEventListener('mouseout', expConIm, false);
}
else if (document.attachEvent){
document.attachEvent('onmouseover', expConIm);
document.attachEvent('onmouseout', expConIm);
}
})();
}
//]]>
</script>
<script type='text/javascript'>

  var nW,nH,oH,oW;
  function zoomToggle(iWideSmall,iHighSmall,iWideLarge,iHighLarge,whichImage){
    oW=whichImage.style.width;oH=whichImage.style.height;
    if((oW==iWideLarge)||(oH==iHighLarge)){
      nW=iWideSmall;nH=iHighSmall;
    }else{
      nW=iWideLarge;nH=iHighLarge;
    }
    whichImage.style.width=nW;whichImage.style.height=nH;
  }

</script>

<style>
img.expando{
margin:10px;
vertical-align: top; 
}
</style>
<!--class="expando" esto es para que imagene al pasar el mouse se aumente-->
<?php 

if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

		<div id="contentHeader">
			<h2>Avisos Clasificados</h2>
		</div> <!-- #contentHeader -->	
		<div class="container">  
			<div class="grid-17">
				<div class="widget">
      	<div class="widget-header"> 
							<span class="icon-pin"></span>
								<h3>Ùltimos Avisos Clasificados</h3>
							</div>
					<div class="widget-content">
						<br />   
            
            <?php
            _bienvenido_mysql();
            mysql_query("set names utf8");
            $sql="SELECT * FROM clasificados_categorias WHERE idcategorias IN (SELECT categoria  FROM clasificados_avisos  ) ORDER BY categorias ASC";
            $result=mysql_query($sql);
            
            
         
            
            $a = 0;
            while($row=mysql_fetch_array($result)){  
            $a++; 
            ?>
              <div class="grid-12 ">
                <h3><a href="dashboard.php?data=cat&cat=<?php echo $row[0]; ?>"><?php echo strtoupper($row[1]); ?></a></h3>
                <ul class="bullet bullet-black">
                  <?php  
                  $sql2="SELECT * FROM clasificados_avisos WHERE categoria  = '$row[0]'  and autorizacion=1 ORDER BY categoria ASC LIMIT 4";
                  $result2=mysql_query($sql2);
                  while($row2=mysql_fetch_array($result2)){
				   ?>
                    <li><img src="imagenes_clasificados/<?php echo $row2["fotos"]?>"  width="30" height="30" hspace="10"
					/> 
					<a style="color: black;" href="dashboard.php?data=aviso&user=<?php echo $row2[0]; ?>"><?php echo $row2[4]; ?></a></li>
                    <?php } ?> 
                </ul>		
              </div>
            <?php
            if ($a==2) { $a=0; echo '<div class="clear"></div>'; } } ?> 
          </div> <!-- .widget-content -->
				</div> <!-- .widget -->  
			</div> <!-- .grid -->

      
      
      
      
      <div class="grid-7"> 
				<a href="dashboard.php?data=suvir" class="btn btn-primary btn-xlarge block">Publicar</a>
								<br>
				<div class="box">
					 <h3>Estimado, <?php echo $usuario_datos[1] . ' ' . $usuario_datos[2]; ?></h3>
                <p>En esta sección podrá ver y comprar cualquier Producto que guste, siempre y cuando este disponible.<br/>
				Todo Producto tendran un plazo de tiempo de 15 dias publicado. </p>
					
					
					
				</div> <!-- .box -->
				
			</div><!-- .grid -->
				
				
			
			
		</div> <!-- .container --> 
 