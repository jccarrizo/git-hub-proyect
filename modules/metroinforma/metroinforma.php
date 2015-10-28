<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
?>

<div id="contentHeader">
	<h2>Metro Informa</h2>
</div> <!-- #contentHeader -->	

<div class="container">
	<?php _bienvenido_mysql(); ?> 
	<?php
    $sql="SELECT * FROM metroinforma WHERE estatus = 1 ORDER BY id DESC;";
    $query_metroinforma=mysql_query($sql);
		while($row_noticias=mysql_fetch_array($query_metroinforma)){ 
	?>
		<div class="grid-24">				
			<div class="widget">			
				<div class="widget-header">
					<span class="icon-chat"></span>
					<h3><?php echo $row_noticias[1];?> (<?php echo $row_noticias[3]; ?>)</h3>
				</div>
				<div class="widget-content">
            <?php echo stripslashes($row_noticias[2]); ?>
				</div>
      </div>					 
		</div> <!-- .grid --> 
	<?php } _adios_mysql(); ?>
</div> <!-- .container -->
