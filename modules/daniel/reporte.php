<?php 

if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

		<div id="contentHeader">
			<h2>Reportes</h2>
		</div> <!-- #contentHeader -->	
		<div class="container">  
			<div class="grid-17">
				<div class="widget">
      	<div class="widget-header"> 
							<span class="icon-pin"></span>  
								<h3>Reportes Clasificados</h3>
							</div>
					<div class="widget-content">
						
	
		  <form class="form validateForm" action="http://192.168.0.20/clasificados/modules/daniel/repor.php" method="post"  onsubmit="return validate()" >
    
            
            <div class="field-group">
            <label for="datepicker">Por favor introduzca los siguientes datos:</label>
              <div class="field">
                <label for="proyecto">usuario:</label>
                <input type="text" name="usuario" id="usuario" size="20" class="validate[required]" placeholder="usuario" onChange="conMinuscula(this)"/>
               
              </div>
	          
              <div class="field">
                <label for="fecha_ini">Fecha Inicio</label>
                <input type="text" name="fecha_ini" id="datepicker" size="10" placeholder="Fecha Inicio"/>
              </div>
              <div class="field">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="text" name="fecha_fin" id="datepicker2" size="10" placeholder="Fecha Fin"/>
                <input type="hidden" name="switch" id="switch" size="10" value="2"/>
              </div>
              
            </div>
          
            <div class="grid-24" align="center">
          <table >
            <tr>
      <td align="center"><input type="button" name="Atrás" onclick="javascript:window.history.back(inicio);" class="btn btn-error" value="Atr&aacute;s"/>
              <td align="center"><button type="submit" class="btn btn-primary">Generar reporte</button></td>
            </tr>
          </table>
        </div>
      </form>
            
			
              
          </div> <!-- .widget-content -->
				</div> <!-- .widget -->  
			</div> <!-- .grid -->

      
     <div class="grid-7"> 
				<div class="box">
					 <h3>Estimado, <?php echo $usuario_datos[1] . ' ' . $usuario_datos[2]; ?></h3>
                <p>En esta secci&oacute;n podr&aacute; realizar su reporte mediante la fecha .</p>
					
					
					</div>
				</div> <!-- .box -->
				  
			
				
				
			
			
		</div> <!-- .container --> 
		
		
		<script>
		
		
$(function() {
  $( "#datepicker" ).datepicker({  maxDate: 0, 
  dateFormat: 'dd/mm/y',
  changeMonth: true,
   changeYear: true,
  
  });
});

$(function() {
  $( "#datepicker2" ).datepicker({  maxDate: 0, 
  dateFormat: 'dd/mm/y',
  changeMonth: true,
   changeYear: true,
  
  });
});



 </script>