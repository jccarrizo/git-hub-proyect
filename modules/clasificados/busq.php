<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');


// Reporte Diario..


if(isset($_POST['enviado'])){ ?>
<?php echo $fecha_ing=$_POST['fecha_ing']?>



<div id="contentHeader">
  <h2>Reportes de Ingreso </h2>
</div>


<div class="container">
<div class="grid-24">
<div class="widget">
<div class="widget-header">
<span class="icon-info"></span>
<h3>Búsqueda Por Fechas</h3>
</div>
	 
     
<table class="table table-striped table-bordered">
<thead>
<tr>
<th width="100">Número de egreso</th>
<th width="70">Entrego</th>
<th width="70">Historial</th>
<th width="50">Fecha de Ingreso</th>
<th width="100">Recibido Por</th>


</tr>
</thead>
<tbody >
<?php
_bienvenido_mysql();
$sql=mysql_query("SELECT *  FROM  ingreso WHERE fecha_ing like '%$fecha_ing%'");
while($row_cont=mysql_fetch_array($sql)){
?>
<tr class="gradeA">
<td><?php echo $row_cont["numero_egre"]?></td>
<td><?php echo $row_cont["entrego"]?></td>
<td><?php echo $row_cont["contratista"]?></td>
<td><?php echo $row_cont["fecha_ing"]?></td>
<td><?php echo $row_cont["recibido"]?></td>
</tr>
<?php  }  ?>             
<tr>
</tr>
     
</table>
 </tbody>    
     <center><input type="button" name="Atras" onclick="javascript:window.history.back(inicio);" class="btn btn-error" value="Atras"/> 
 <button type="submit" class="btn btn-primary"  onclick='window.print();' >Imprimir Reporte</button>
     </center>   
          <br>		                

</div> 
</div> 			   
</div>












<?php } else { ?>

 <div id="contentHeader">
  <h2>Reportes de Ingresos por fecha</h2>
</div>
<div class="container">
  <div class="grid-24">
     <br />
      <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Búsqueda De Ingresos</h3>
      </div>
      <tr>
<div class="widget-content">
					
						                
		                
<form class="form validateForm" action="dashboard.php?data=buscar" method="post"  onsubmit="return validate()" >
		             
<center>
	<br>
<label for="required"><h2>Reporte por fecha de ingreso</h2></label>
<?php  echo $fecha_ing=$_POST['fecha_ing']; ?>
<div class="widget-content">

<input type="text" name="fecha_ing" id="datepicker" size="15" class="validate[required]" placeholder="Reporte de Fecha"/>
<br>
<input type="hidden" name="enviado" id="enviado" />
	</center>	   
           
           


<center>
<table >
  <tr>
 
    <td align="center"><button type="submit" class="btn btn-primary">Buscar</button></td>
  <br>
  </tr>
</center>
</table>

</div>

</div>
</div>
</form>
<br>


                   
		        </div> <!-- .widget -->

<div class="container">
  <div class="grid-24">
     <br />
      <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Búsqueda De Egresos</h3>
      </div>
      <tr>
<div class="widget-content">
					
						                
		                
<form class="form validateForm" action="dashboard.php?data=busca-codigo" method="post"  onsubmit="return validate()" >
		             
<center>
	<br>
<label for="required"><h2>Reporte por Codigo</h2></label>
<?php  echo $codigo=$_POST['id_egreso']; ?>
<div class="widget-content">

<input type="text" name="id_egreso" id="id_egreso" size="15"  placeholder="Ingrese el código que desea buscar"/>
<br>
<input type="hidden" name="enviad" id="enviad" />
	</center>	   
           
           


<center>
<table >
  <tr>
 
    <td align="center"><button type="submit" class="btn btn-primary">Buscar</button></td>
  <br>
  </tr>
</center>
</table>

</div>

</div>
</div>
</form>					
				</div> <!-- .grid -->
	

				</div> <!-- .grid -->
				

                   
		        </div> <!-- .widget -->
					
				</div> <!-- .grid -->
				
				
				
				</div> 
		


    
</div>
</div>
</div>
</div>
</div>  


<?php }  ?>


<script>

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }



$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
dateFormat: 'mm/dd/yy',
changeMonth: true,
changeYear: true,
yearRange: "1900:2020"
});
});


function conMayusculas(field) {
field.value = field.value.toUpperCase()
}
 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }

  |

</script> 