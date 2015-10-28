<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[3],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
// Reporte Diario..

if(isset($_POST['enviado'])){ 
?>
<?php 
echo $cat=$_POST['categorias'];
echo $tit=$_POST['titulo'];
  
 ?>
   
<div id="contentHeader">
	<h2>Resultados de la Búsqueda  </h2>
</div>
<div class="container">
	<div class="grid-24">
		<div class="widget">
			<div class="widget-header">
				<span class="icon-info"></span>
				<h3>Resultados de Productos</h3>
			</div>
			<div id='muestra'>
				<table class="table table-striped table-bordered">
				<thead>
				<tr>
                                    
					<th width="100">
						Categorias
					</th>
					<th width="100">
						¿Que estas Buscando?
					</th>
					<th width="100">
					Ver
					</th>
                                        <th width="100">
						Fecha de Publicación
					</th>
					<th width="100">
						¿Que estas Buscando?
					</th>
					<th width="100">
					Disponibilidad
					</th>
					
									
				</tr>
				</thead>
					<?php
_bienvenido_mysql();
$sql=mysql_query("SELECT *
FROM clasificados_avisos
WHERE categoria LIKE '%$cat%' AND titulo LIKE '%$tit%'");

while($row_cont=mysql_fetch_array($sql)){
?>
				<tr class="gradeA">  
						<td>
<?php echo $row_cont["categoria"]?>
					</td>
					<td>
<?php echo $row_cont["fotos"]?>
					</td>
                                        <td>
<?php echo $row_cont["fecha_publicacion"]?>
					</td>
					<td>
<?php echo $row_cont["titulo"]?>
					</td>
                                        
					<td>
<?php echo $row_cont["disponibilidad"]?>
					</td>
                                        <td>
<button type="submit" class="btn btn-primary" >Ver</button>
			
					</td>
				</tr>
				<?php  }  ?>
				<tr>
				</tr>
				</table>
			</div>
			</tbody>
			<center><input type="button" name="Atras" onclick="javascript:window.history.back(inicio);" class="btn btn-error" value="Atras"/>
						</center>
			<br>
		</div>
	</div>
</div>
<?php } else { ?>
<div id="contentHeader">
	<h2>Productos </h2>
</div>
<div class="container">
	<div class="grid-24">
		<br/>
		<div class="widget widget-table">
			<div class="widget-header">
				<span class="icon-cog"></span>
				<h3 class="icon chart">Búsqueda De Productos </h3>
			</div>
			<tr>
				<div class="widget-content">
					<form class="form validateForm" action="dashboard.php?data=bus" method="post" onsubmit="return validate()">
						<center>
						<br>
						<label for="required">
						<h2>Productos</h2>
						
                                                        <label>Categorias de Productos</label>
						<div>
							<select name="id_categorias" id="id_categorias" title="Seleccione la categoria que desea Buscar" onchange="espejo_codigo()">
								<?php 
                    _bienvenido_mysql();
                    $sql="SELECT `categorias` 
FROM `clasificados_categorias`
WHERE `idcategorias`  =".$id;
                    $consult=mysql_query($sql);
                        echo '<option select="select"></option>';
                    while($registr=mysql_fetch_row($consulta)) {
                        echo "<option  value='".$registr[0]."'>
								".$registr[0]."</option>
			"; } $consult=mysql_query("SELECT `categorias` FROM `clasificados_categorias` ORDER BY `idcategorias` "); while($registr=mysql_fetch_row($consult)) { echo "
								<option value='".$registr[0]."'>".$registr[0]."</option>
								"; } echo "
							</select>
							"; _adios_mysql(); ?>
						</select>
						<label id="visor_codigo"></label>
					</div>

							<input type="hidden" name="enviado" id="enviado"/>
                                                         <?php  echo $cat=$_POST['categoria']  ?>
                                                        <br><br>
                                          <label>Tiulo:</label><br><input type="text" name="fecha"  size="30"  value=""/>
						
							<input type="hidden" name="enviado" id="enviado"/>
                                                        
                                                      <br><br>
                                                        <?php  echo $tit=$_POST['titulo']  ?>            
							</center>
							<center>
							<table>
							<tr>
								<td align="center">
									<button type="submit" class="btn btn-primary">Buscar</button>
								</td>
								<br>
							</tr>
							</center>
							</table>
						</div>
					</div>
	


<!-- .widget -->

   
            
		

               
</div>
   
	</div>
			
		</div>
</div>
