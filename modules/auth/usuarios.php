<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[3],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

<div id="contentHeader">
	<h2>Lista de Usuarios</h2>
</div> <!-- #contentHeader -->	

<div class="container">
	<?php include('notificador.php'); ?>
	<div class="grid-24">	
		<div class="widget widget-table">
			<div class="widget-header">
				<span class="icon-list"></span>
				<h3 class="icon chart">Usuarios Autorizados</h3>		
				
				</div>
			<div class="widget-content">
				<table class="table table-bordered table-striped data-table">
					<thead>
						<tr>
							<th style="width:15%">Nombre</th>
							<th style="width:23%">Apellido</th>
							<th style="width:35%">Usuario</th>
							<th style="width:15%">Perfil</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
							_bienvenido_mysql();
							mysql_query("set names utf8");

$sqlcode = "SELECT usuarios.cod_usuario, usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.clave, usuarios.fecha_creacion, usuarios.hora_creacion, usuarios.telefono, usuarios.id_perfil, perfiles.perfil, perfiles.dperfil, perfiles.role
FROM usuarios JOIN perfiles ON usuarios.id_perfil = perfiles.id_perfil";                                                        
              $sql=mysql_query($sqlcode);
							while($row=mysql_fetch_array($sql)){
						?>
						<tr class="gradeA">
							<td><?php echo $row['nombre']?></td>
							<td><?php echo $row['apellido'] ?></td>
							<td><?php echo $row['correo']?></td>
							<td><?php echo $row['perfil']?></td>
							
						
						</tr>									
						<?php } ?>
					</tbody>
				</table>
			</div> <!-- .widget-content -->
		</div>
	</div> <!-- .grid -->
</div> <!-- .container -->
<script type="text/javascript">
function eliminar(perfil, param){
		$.alert ({ 
			type: 'confirm'
			, title: 'Alerta'
			, text: '<h3>¿Desea eliminar el perfil: <u>'+perfil+'</u> ?</h3>'
			, callback: function () {window.location=param;}	
		});		
}
</script>