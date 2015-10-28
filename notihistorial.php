<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array('Notificaciones', $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

<style>
th, tr, td {
  font-size:90%;
}
.table thead th {
  font-size:90%;
}
</style>

<div id="contentHeader">
  <h2>Historial de Notificaciones y Mensajeria</h2>
</div> <!-- #contentHeader -->	


<?php 



if (@$_GET['token']){ 

  
  

  
  if ($_SESSION['notitoken'] != $_GET['token']) {
    alerta('Autenticacion de token de seguridad fallido, se procedera a recargar la pagina, Disculpen las molestias causadas');
    ir('dashboard.php?data=notihistorial');
  }
  //unset($_SESSION['notitoken']);
  if (!$_GET['msg']) {
    ir('dashboard.php?data=notihistorial');
  }
  
  decode_get2($_SERVER["REQUEST_URI"],2);
  $id = _antinyeccionSQL($_GET['msg']);
  $sql="SELECT * FROM mensajeria WHERE idmensajeria=".$id;
} else {
  $sql="SELECT * FROM mensajeria ORDER BY fecha_hora DESC;";
}
  _bienvenido_mysql();
  $result = mysql_query($sql);
  if (!$result) {
    if ($SQL_debug == '1') {
      die('Error en Query - Respuesta del Motor: ' . mysql_error());
    } else {
      die('Error en Query');
    }
  } 
  $num_rows = mysql_num_rows($result); 
 ?> 
<div class="container">
  <?php include('notificador.php'); ?>
      <?php if ($num_rows==1) { /*********** VER EL MENSAJE ************/ ?> 
				<div class="grid-18">	
          <div class="widget">			
            <div class="widget-header">
            <span class="icon-layers"></span>
              <h3>Mensajes y Notificaciones</h3>
            </div>
            <div class="widget-content">
              <p><?php echo "UN MENSAJEEEEEEEEEEE       <pre>"; print_r($_REQUEST); echo "</pre>"; ?></p>
            </div>
          </div>					
        </div> <!-- .grid -->
      <?php } else { /*********** VER TODOS LOS MENSAJES ***********/ ?>
    <div class="grid-18">	
       <div class="widget widget-table">
						<div class="widget-header">
							<span class="icon-list"></span>
							<h3 class="icon chart">Mensajes y Notificaciones</h3>		
						</div>
						<div class="widget-content">
               <table class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <th style="width:8%">ID</th>
                    <th style="width:20%">Fecha y Hora</th>
                    <th style="width:25%">Asunto</th>
                    <th style="width:35%">Mensaje</th>
                    <th style="width:12%">Estatus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($reg2=mysql_fetch_array($result)){ ?>
                    <tr class="gradeA">
                      <td><?php echo $reg2[0]; ?></td>
                      <td><?php echo $reg2[1]; ?></td>
                      <td><?php echo $reg2[7]; ?></td>
                      <td  style="word-wrap: break-word"><?php echo $reg2[2]; ?></td>
                      <td><?php echo $reg2[3]; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
						</div> <!-- .widget-content -->
				</div> <!-- .widget --->
      </div> <!-- .grid -->
      <?php }	?>
      <div class="grid-6">				
        <div class="widget">			

          <div class="widget-header">
          <span class="icon-layers"></span>
            <h3>Panel de Control</h3>
          </div>

          <div class="widget-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
          </div>

        </div>					
      </div> <!-- .grid -->	

</div> <!-- .container -->

<?php _adios_mysql(); ?>