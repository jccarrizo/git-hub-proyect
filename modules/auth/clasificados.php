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
								<h3>Ultimos Avisos Clasificados</h3>
							</div>
					<div class="widget-content">
						<br />
            
            <?php
            _bienvenido_mysql();
            mysql_query("set names utf8");
            $sql="SELECT * FROM clasificados_categorias WHERE idcategorias IN (SELECT categoria FROM clasificados_avisos WHERE disponibilidad = 'D') ORDER BY categorias ASC";
            $result=mysql_query($sql);
            
            
            $token_cla = 'tokentokentokentokentoken';
           
            
            $a = 0;
            while($row=mysql_fetch_array($result)){ 
            $a++; 
            ?>
              <div class="grid-12 ">
                <h3><a href="clasificadoscat.php?cat=<?php echo $row[0]; ?>&token=<?php echo $token_cla; ?>"><?php echo strtoupper($row[1]); ?></a></h3>
                <ul class="bullet bullet-black">
                  <?php  
                  $sql2="SELECT * FROM clasificados_avisos WHERE categoria = '$row[0]' ORDER BY categoria ASC LIMIT 4";
                  $result2=mysql_query($sql2);
                  while($row2=mysql_fetch_array($result2)){ ?>
                    <li><a style="color: black;" href='clasificadosavi.php?avi=<?php echo $row2[0]; ?>'><?php echo $row2[4]; ?></a></li>
                  <?php } ?> 
                </ul>		
              </div>
            <?php
            if ($a==2) { $a=0; echo '<div class="clear"></div>'; } } ?> 
          </div> <!-- .widget-content -->
				</div> <!-- .widget -->  
			</div> <!-- .grid -->

      
      
      
      
      <div class="grid-7"> 
				<a href="dashboard.php?data=aviso" class="btn btn-primary btn-xlarge block">Otros Productos</a>
								<br>
				<div class="box">
					 <h3>Estimado, <?php echo $usuario_datos[1] . ' ' . $usuario_datos[2]; ?></h3>
                <p>En esta sección podrá ver y comprar cualquier Producto que guste, siempre y cuando este disponible.</p>
					
					
					
				</div> <!-- .box -->
				
			</div><!-- .grid -->
				
				
			
			
		</div> <!-- .container --> 
 