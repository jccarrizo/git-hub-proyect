<?php   

 header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=ReporteMercadoMetro.xls");
header("Pragma: no-cache");
header("Expires: 0");

  



 $inicio=$_POST['fecha_ini'];
  
 $fin=$_POST['fecha_fin'];
  
 $usuario=$_POST['usuario'];
 ?>

<div class="widget widget-table">
					
						<div class="widget-header">
						 
						</div>
                         
						<div class="widget-content">  
                     
							<br />
							<img src="http://192.168.0.20/clasificados/modules/clasificados/logo.png" width="180" height="100" />
        <h3 align="center" class="icon chart" style="color:#00F">Reporte MercadoMetro</h3>
        <table width="927" class="table table-bordered table-striped data-table">
		  <thead>
							<tr>
                           	  <th width="30" style="background-color:#900;font-weight:bold;color:#FFF" align="center" ><div align="left">Nro.</div></th>
								<th width="235" style="background-color:#900;font-weight:bold;color:#FFF" align="center" ><div align="left">Nombre del Usuario</div></th>
								<th width="175" style="background-color:#900;font-weight:bold;color:#FFF" align="center"><div align="left">Fecha Inicio</div></th>
							  <th width="136" style="background-color:#900;font-weight:bold;color:#FFF" align="center"><div align="left">Categoria</div></th>
								<th width="110" style="background-color:#900;font-weight:bold;color:#FFF" align="center"><div align="left">Precio</div></th>
                        <th width="197" style="background-color:#900;font-weight:bold;color:#FFF" align="center"><div align="left">Producto</div></th>
						  </tr>
		  </thead>
						<tbody>
<?php 
$i=1;
include("conexion.php");	
 mysql_query("set names utf8");
$sql_report=mysql_query("SELECT * FROM clasificados_avisos 
WHERE usuario='$usuario' AND fecha_publicacion BETWEEN '$inicio' AND '$fin' ");

while($row_report=mysql_fetch_array($sql_report)){
	
	$usuario=$row_report["usuario"];
	$fecha_publicacion=$row_report["fecha_publicacion"];
	$categoria=$row_report["categoria"];
	$precio=$row_report["precio"];
	$producto=$row_report["producto"];
	
	
?>
							<tr class="gradeA">
                            <td><div align="left"><?php echo $i; ?></div></td>
								<td><div align="left"><?php echo $usuario ;?></div></td>
								 <td width="175"><?php echo $fecha_publicacion ;?>&nbsp;</td>
							  <td width="136"><?php echo $categoria ;?>&nbsp;</td>
                                
                                <td><div align="left"><?php echo $precio ;?></div></td>
                                <td width="197"><?php echo $producto ;?>&nbsp;</td>
                              
                              
                              
						  </tr>
                           <?php $i++; }?> 
						</tbody>
					</table>
</div> <!-- .widget-content -->					
</div> <!-- .widget -->
</div> <!-- .grid -->
</div> <!-- .container -->
</div> 
<br />
	<!-- #content -->