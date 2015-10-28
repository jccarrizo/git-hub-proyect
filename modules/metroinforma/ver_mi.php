<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

<div id="contentHeader">
	<h2>Metro Informa</h2>
</div> <!-- #contentHeader -->	

<div class="container">
	
	<?php include('notificador.php'); ?>
	
	<div class="grid-16">	
		<div class="widget widget-table">
			<div class="widget-header">
				<span class="icon-list"></span>
				<h3 class="icon chart">Registro de Metro Informa</h3>		
			</div>
			<div class="widget-content">
				<table class="table table-bordered table-striped data-table">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Fecha de Creacion</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						_bienvenido_mysql();
						mysql_query("set names utf8");
						$sql=mysql_query("SELECT * FROM metroinforma ORDER BY id DESC");
						while($row=mysql_fetch_array($sql)){
						?>
						<tr class="gradeA">

							
							<td><?php echo $row["titulo"]?></td>
							<td><?php echo $row["fecha"]?></td>
							<td class="center">
							
								
								
								<a href="dashboard.php?data=editar-mi&id=<?php echo $row["id"]?>" id="editar" title="Editar M.I." >
									<div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-pen-alt-fill"></span></div>
								</a>
								<a href="javascript:eliminar('<?php echo $row["id"]?>')" id="eliminar-mi" title="Eliminar M.I." >
									<div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-x-alt"></span></div>
								</a>

								
								
							</td>
						</tr>									
						<?php }  ?>
					</tbody>
				</table>
			</div> <!-- .widget-content -->
		</div>
	</div>
	
	<div class="grid-8">
		<div id="gettingStarted" class="box">
			<h3>Estimado, <?php echo $usuario_datos[1]; ?></h3>
			<p>Esta seccion es para agregar Articulos a Metro Informa</p>
		</div>
		<div class="box plain">
			<a href="dashboard.php?data=agregar-mi" class="btn btn-primary btn-large dashboard_add">Agregar un Articulo</a>
		</div>
	</div>
	
</div> 


		
</div> <!-- .container -->


<script type="text/javascript">
function eliminar(idmi){
		$.alert ({ 
			type: 'confirm'
			, title: 'Alerta'
			, text: '<h3>¿Desea eliminar el Metro Informa - ID: <u>'+ idmi +'</u> ?</h3>'
			, callback: function () { window.location="dashboard.php?data=eliminar-mi&id="+idmi }	
		});		
}
</script>


				
	
