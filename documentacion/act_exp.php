<?php 
decode_get2($_SERVER["REQUEST_URI"],2);
$id_curs = _antinyeccionSQL($_GET['id_curs']);
$id_exp = _antinyeccionSQL($_GET['id_exp']);
$id_ref = _antinyeccionSQL($_GET['id_ref']);
$sw = _antinyeccionSQL($_GET['sw']);
include("coneccion.php");

switch ($sw) {
case 1:
?>


<div id="contentHeader">
<h2>Editar Actividad Académica</h2>
</div>
<div class="container">
<div class="row">
<div class="grid-24">
<div class="widget">      
<form class="form uniformForm validateForm" action="dashboarde.php?data=proc-edit-exp" method="post" onsubmit="return validate()">               
<div class="widget widget-table">
<div class="widget-header"> <span class="icon-cog"></span>
<h3 class="icon chart">Actividad Académica</h3>
</div>
<div class="widget-content">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th width="80 ">Curso</th>
<th width="80 ">Duración</th>
<th width="80">Descripción</th>
<th width="80">Lugar </th>
</tr>
</thead>
<tbody>
<?php
mysql_query("set names utf8");
$sqlcurs=mysql_query("SELECT cursos_cv.id_cursos_cv, cursos_cv.id_user_cv, cursos_cv.curso_realizado, cursos_cv.duracion_curso, 
cursos_cv.descripcion_curso, cursos_cv.lugar_curso FROM cursos_cv WHERE cursos_cv.id_cursos_cv=$id_curs");
while($rowcurs=mysql_fetch_array($sqlcurs)){ ?>
<tr class="gradeA">
<td><input type="text" id="curso" name="curso" value="<?php echo $rowcurs["curso_realizado"] ?>" size="25" /></td>
<td><input type="text" id="duracion" name="duracion" value="<?php echo $rowcurs["duracion_curso"] ?>" size="15" /></td>
<td><input type="text" id="descrip" name="descrip" value="<?php echo $rowcurs["descripcion_curso"] ?>" size="25" /></td>
<td><input type="text" id="lugar" name="lugar" value="<?php echo $rowcurs["lugar_curso"] ?>" size="15" />
<input type="hidden" id="id_curso" name="id_curso" value="<?php echo $rowcurs["id_cursos_cv"] ?>" />
<input type="hidden" id="sw" name="sw" value="1" />
</td>
</tr>
<?php
$i++;  }
?>
</tbody>
</table>
</div>
</div>
</br>
<div class="grid-24" align="center">
<table >
<tr>
<td align="center"><button type="submit" class="btn btn-primary">Guardar</button></td>
</tr>
</table>
</div>
</form>
</div>
</div>
</div>


<?php 
break;	
case 2:
?>

<div id="contentHeader">
<h2>Editar Experiencia Laboral</h2>
</div>
<div class="container">
<div class="row">
<div class="grid-24">
<div class="widget">      
<form class="form uniformForm validateForm" action="dashboarde.php?data=proc-edit-exp" method="post" onsubmit="return validate()">               
<div class="widget widget-table">
<div class="widget-header"> <span class="icon-cog"></span>
<h3 class="icon chart">Experiencia Laboral</h3>
</div>
<div class="widget-content">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th width="100 ">Lugar de Trabajo</th>
<th width="100 ">Cargo</th>
<th width="100">Tiempo de Servicio</th>
<th width="100">Motivo de Retiro </th>
</tr>
</thead>
<tbody>
<?php
mysql_query("set names utf8");
$sqlexp=mysql_query("SELECT experiencia_lab_cv.id_experiencia_lab, experiencia_lab_cv.id_user_cv, experiencia_lab_cv.lugar_trabajo, 
experiencia_lab_cv.cargo_desemp, experiencia_lab_cv.tiempo_servicio, experiencia_lab_cv.motivo_retiro 
FROM experiencia_lab_cv WHERE experiencia_lab_cv.id_experiencia_lab=$id_exp");
while($rowexp=mysql_fetch_array($sqlexp)){ ?>
<tr class="gradeA">
<td><input type="text" id="lugar_trabajo" name="lugar_trabajo" value="<?php echo $rowexp["lugar_trabajo"] ?>" size="25" /></td>
<td><input type="text" id="cargo_desemp" name="cargo_desemp" value="<?php echo $rowexp["cargo_desemp"] ?>" size="15" /></td>
<td><input type="text" id="tiempo_servicio" name="tiempo_servicio" value="<?php echo $rowexp["tiempo_servicio"] ?>" size="25" /></td>
<td><input type="text" id="motivo_retiro" name="motivo_retiro" value="<?php echo $rowexp["motivo_retiro"] ?>" size="15" />
<input type="hidden" id="id_experiencia" name="id_experiencia" value="<?php echo $rowexp["id_experiencia_lab"] ?>" />

<input type="hidden" id="sw" name="sw" value="2" />
</td>
</tr>
<?php
$i++;  }
?>
</tbody>
</table>
</div>
</div>
</br>
<div class="grid-24" align="center">
<table >
<tr>
<td align="center"><button type="submit" class="btn btn-primary">Guardar</button></td>
</tr>
</table>
</div>
</form>
</div>
</div>
</div>







<?php 
break;
case 3:
?>

<div id="contentHeader">
<h2>Editar Referencia Personal</h2>
</div>
<div class="container">
<div class="row">
<div class="grid-24">
<div class="widget">      
<form class="form uniformForm validateForm" action="dashboarde.php?data=proc-edit-exp" method="post" onsubmit="return validate()">               
<div class="widget widget-table">
<div class="widget-header"> <span class="icon-cog"></span>
<h3 class="icon chart">Referencia Personal</h3>
</div>
<div class="widget-content">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th width="100 ">Nombre</th>
<th width="100 ">Apellido</th>
<th width="100">Cédula</th>
<th width="100">Teléfono </th>
<th width="100">Dirección</th>

</tr>
</thead>
<tbody>
<?php
mysql_query("set names utf8");
$sqlref=mysql_query("SELECT refer_pers_cv.id_refer_pers, refer_pers_cv.id_user_cv, refer_pers_cv.nombre, refer_pers_cv.apellido, 
refer_pers_cv.cedula, refer_pers_cv.telefono, refer_pers_cv.direccion FROM refer_pers_cv WHERE refer_pers_cv.id_refer_pers=$id_ref");
while($rowref=mysql_fetch_array($sqlref)){ ?>
<tr class="gradeA">
<td><input type="text" id="nombre" name="nombre" value="<?php echo $rowref["nombre"] ?>" size="25" /></td>
<td><input type="text" id="apellido" name="apellido" value="<?php echo $rowref["apellido"] ?>" size="15" /></td>
<td><input type="text" id="cedula" name="cedula" value="<?php echo $rowref["cedula"] ?>" size="25" /></td>
<td><input type="text" id="telefono" name="telefono" value="<?php echo $rowref["telefono"] ?>" size="25" /></td>
<td><input type="text" id="direccion" name="direccion" value="<?php echo $rowref["direccion"] ?>" size="25" />
<input type="hidden" id="id_refer" name="id_refer" value="<?php echo $rowref["id_refer_pers"] ?>" />
<input type="hidden" id="sw" name="sw" value="3" />
</td>
</tr>
<?php
$i++;  }
?>
</tbody>
</table>
</div>
</div>
</br>
<div class="grid-24" align="center">
<table >
<tr>
<td align="center"><button type="submit" class="btn btn-primary">Guardar</button></td>
</tr>
</table>
</div>
</form>
</div>
</div>
</div>



<?php 
break;
}

?>