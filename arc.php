<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<div id="contentHeader">
	<h2>Archivos</h2>
</div>
<!-- #contentHeader -->
<div class="container">
	<div class="grid-18">
		<form class="form uniformForm" action="#" method="post">
			<button name="ing-conv" onclick="http://192.168.0.20/expediente/dashboard.php?data=exp-cons" class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Archivo</button>
			<br/>
		</form>
		<div class="widget widget-table">
			<div class="widget-header">
				<span class="icon-cog"></span>
				<h3 class="icon chart">Usuarios</h3>
			</div>
			<div class="widget-content">
				<table class="table table-bordered table-striped data-table">
				<thead>
				<tr>
					<th width="40">
						Contratista
					</th>
					<th width="50">
						Código de Expediente
					</th>
					<th width="50">
						Año del Expediente
					</th>
					<th width="50">
						Opciones
					</th>
				</tr>
				</thead>
				<tbody>
				<?php
_bienvenido_mysql();
$i=1;
$sql=mysql_query("SELECT *  FROM archivos;");
while($row_cont=mysql_fetch_array($sql)){
$id_convenio=$row_cont["id_archivos"]
?>
				<tr class="gradeA">
					<td>
<?php echo $row_cont["contratista"]?>
					</td>
					<td>
<?php echo $row_cont["codigo_exp"]?>
					</td>
					<td>
<?php echo $row_cont["fecha_exp"]?>
					</td>
					<td class="center">
<?php  $parametros = 'cod_usua='.$row_cont["id_archivos"];
$parametros = _desordenar($parametros); ?>
						<a href="dashboard.php?data=proc-egr&flag=1&<?php echo $parametros; ?>" id="editar" title="Asignación Expediente" >
						<div class="icons-holder" style="float:left;margin-left:15px">
							<span class="icon-check"></span>
						</div>
						</a>
					</td>
				</tr>
				<?php
          $i++;  }
           ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
