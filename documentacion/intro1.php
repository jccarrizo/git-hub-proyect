<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
  notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
  _wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[3],'Esta registrando un Ingreso: '.ucwords(array_pop(explode('/', __dir__))),'Se registro un Ingreso');
?>
<div id="contentHeader">
	<h2>Registro de Ingreso</h2>
</div>
<div class="container">
	<div class="grid-22">
		<br/>
		<div class="widget widget-table">
			<div class="widget-header">
				<span class="icon-cog"></span>
				<h3 class="icon chart">Ingreso</h3>
			</div>
			<tr>
				<div class="widget-content">
					<table class="table table-bordered ">
					<form action="#" method="post" name="ddd" id="ddd">
						<tr>
							<?php
if (isset($_POST['Submit'])) {
  $egreso = ($_POST["codigo_ar"]);
  $nombre = ($_POST["fecha_ing"]);
  $gerencia=($_POST["contratista"]);
$entrega = ($_POST["entrego"]);
$codigo = ($_POST["recibido"]);

   $sql="INSERT INTO ingreso(codigo_ar,fecha_ing,contratista,entrego,recibido) VALUES ('".$egreso."','".$nombre."','".$gerencia."','".$entrega."' , '".$codigo."')"; 
$result = mysql_query($sql);
  if($result){
     echo alerta("El nuevo ingreso a sido guardado con éxito");
  }
  else{
            echo alerta("ya estos datos fueron ingresados");
        }
}
?>
							<center>
							<label>Código del Expediente-Contratista:</label>
							<div>
								<select name="codigo_ar" id="codigo_ar" onchange="espejo_gerencia()">
									<?php 
                    _bienvenido_mysql();
                    $sql="SELECT codigo_ar FROM archivos WHERE id_arc=".$id;
                    $consulta=mysql_query($sql);
                    while($registro=mysql_fetch_row($consulta)) {
                        echo "<option value='".$registro[0]."'>
									".$registro[0]."</option>
									"; } $consulta=mysql_query("SELECT CONCAT( contratista, '/', codigo_ar ) AS codigo_ar FROM archivos order by codigo_ar "); while($registro=mysql_fetch_row($consulta)) { echo "
									<option value='".$registro[0]."'>".$registro[0]."</option>
									"; } echo "
								</select>
								"; _adios_mysql(); ?>
							</select>
							<label id="visor_codigo"></label>
						</div>
						<br>
						<br>
						<label>Fecha de Ingreso<br/>
						</label>
						<div>
							<input type="text" name="fecha_ing" id="datepicker" cl<ass="validate[required]" placeholder="fecha del documento egresado"/>
						</div>
						<br>
						<br>
						<label>Historial de Egreso:</label>
						<div>
							<select name="contratista" id="codigo_ar" onchange="espejo_gerencia()">
								<?php 
                    _bienvenido_mysql();
                    $sql="SELECT codigo_ar FROM egreso WHERE id_egreso=".$id;
                    $consulta=mysql_query($sql);
                    while($registro=mysql_fetch_row($consulta)) {
                        echo "<option value='".$registro[0]."'>
								".$registro[0]."</option>
								"; } $consulta=mysql_query("SELECT CONCAT( usario, ', ', codigo_ar, ', ', fecha_egr  ) AS codigo FROM egreso ORDER BY codigo_ar desc limit 40"); while($registro=mysql_fetch_row($consulta)) { echo "
								<option value='".$registro[0]."'>".$registro[0]."</option>
								"; } echo "
							</select>
							"; _adios_mysql(); ?>
						</select>
						<label id="visor_codigo"></label>
					</div>
					<br>
					<div>
						<label>Entrego<br>
						</label>
						<?php
$sql1 = "SELECT CONCAT( nombre, ' ', apellido ) AS nombre FROM datos_empleado_rrhh order by nombre";
$res = mysql_query($sql1);
$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($entrega = mysql_fetch_array($res)){
  array_push($arreglo_php, $entrega["nombre"]);
  }
}
?>
						<input type="text" id="buscar" size="42" name="entrego"/>
					</div>
					<br>
                                        <label for="required">Validar Ingreso<br/>
						</label>
						<div>
							<input type="radio" name="recibido" id="valide" class="validate[required]" value="<?php echo $usuario_datos['nombre']. ' ' . $usuario_datos['apellido']; ?>"  class="validate[required]" placeholder="fecha del documento egresado"/>
						</div>
                                      
				<br>
                                <tr>
					<center>
					<button name="Submit" type="submit" class="btn btn-error" value="<?php echo $s; ?>" >Guardar Ingreso</button>
					<input type="button" name="Atras" onclick="javascript:window.history.back(inicio);" class="btn btn-error" value="Atras"/>
					<br>
					<br>
					</center>
				</tr>
				</table>
				</center>
			</tr>
			<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
datetimeFormat: 'mm/dd/yy',
changeMonth: true,
changeYear: true,
yearRange: "2014:2020"
});
});
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
      }
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
$(function(){
    var autocompletar = new Array();
    <?php //Esto es un poco de php para obtener lo que necesitamos
     for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay ?>
       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
     <?php } ?>
     $("#buscar").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
       source: autocompletar //Le decimos que nuestra fuente es el arreglo
     });
  });
  
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
dateFormat: 'mm-dd-yy',
changeMonth: true,
changeYear: true,
yearRange: "2014:2020"
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
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);
  var ventimp=window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();ventimp.print();
  }
  
  function validate() {
var a = 0, rdbtn=document.getElementsByName("gender")
for(i=0;i<rdbtn.length;i++) {
if(rdbtn.item(i).checked == false) {
a++;
}
}
if(a == rdbtn.length) {
alert("Porfavor, valide el ingreso");
document.getElementById("recibido").style.border = "2px solid red";
return false;
} else {
document.getElementById("recibido").style.border = "";
}
}
 </script>
		</form>
		</table>
	</div>
</div>
</div>
</div>