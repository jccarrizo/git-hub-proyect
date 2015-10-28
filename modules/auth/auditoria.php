<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[3],'Revision de Auditoría: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<div id="contentHeader">
	<h2>Auditoría</h2>
</div>
<!-- #contentHeader -->
<div class="container">
	<div class="grid-24">
		<form class="form uniformForm" action="#" method="post">
			
                     </a> 	
		</form>
		<div class="widget widget-table">
			<div class="widget-header">
				<span class="icon-cog"></span>
				<h3 class="icon chart">Revisión</h3>
			</div>
			<div class="widget-content">
				<table class="table table-bordered table-striped data-table">
				<thead>
				<tr>
					<th width="40">
						Hora y Fecha
					</th>
					<th width="50">
						Usuario
					</th>
					<th width="50">
						Operación
					</th>
                                        <th width="50">
						Observación
					</th>
					
				</tr>
				</thead>
				<tbody>
				<?php
_bienvenido_mysql();
$i=1;
$sql=mysql_query("SELECT *  FROM auditoria ;");
while($row_cont=mysql_fetch_array($sql)){
$id_convenio=$row_cont["id_archivos"]
?>
				<tr class="gradeA">
					<td>
<?php echo $row_cont["hora_fecha"]?>
					</td>
					<td>
<?php echo $row_cont["usuario"]?>
					</td>
					
                                        <td>
<?php echo $row_cont["operacion"]?>
					</td>
					<td>
<?php echo $row_cont["observaciones"]?>
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

