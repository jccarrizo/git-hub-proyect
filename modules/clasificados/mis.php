<?php 

if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>

		<div id="contentHeader">
			<h2>Mis publicaciones</h2>
		</div> <!-- #contentHeader -->	
		<div class="container">  
	<div class="grid-24">
	 <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
      
          <h3 class="icon chart">Lista de mis productos</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
                
                <th width="50">Titulo</th>
                  <th width="50">Precio</th>
				  <th width="50">Cantidad</th>  
                  <th width="50">Fotos</th>
               <th width="50">Fecha de Publicaci&oacute;n </th>
			   <th width="50">Autorizado </th>
                <th width="50">Opciones</th> 
           
                           </tr>
          </thead>
          <tbody>
            <?php
_bienvenido_mysql();

$sql=mysql_query("SELECT * FROM clasificados_avisos 
WHERE usuario='$usuario_datos[3]'");
while($row_cont=mysql_fetch_array($sql)){

    $id_aviso=$row_cont['idaviso'];



?>
            <tr class="gradeA">
			
                <td><?php echo $row_cont["titulo"]?></td>
                <td><?php echo $row_cont["precio"]?></td>
               <td><?php echo $row_cont["cantidad"]?></td>
                <td style="cursor: pointer"><center><img class="imagenPeque�a" src="imagenes_clasificados/<?php echo $row_cont["fotos"]?>" onclick="zoom('visible', this.src)" width="50" height="50" border="1" style="border-color:red"/>
				

<div id="zoom"><a class="cerrar" href="javascript: zoom('hidden', '')"><input type="button" class="btn btn-error" value="Cerrar"/></a><img id="imagenGrande" src=''"></div>


                </center></td>
                <td><?php echo $row_cont["fecha_publicacion"]?></td>
               <td><?php if( $row_cont["autorizacion"]==0){ ?>
               <center><img src="/clasificados/modules/clasificados/esper.png" title="Solicitud en Espera" ></center> 
			   <?php }?>
			   <?php if( $row_cont["autorizacion"]==1){ ?>
               <center><img src="/clasificados/modules/clasificados/si.png"title="Solicitud Aprobada" ></center><?php }?>
			   <?php if( $row_cont["autorizacion"]==2){ ?>
			   <center><img src="/clasificados/modules/clasificados/x.png" title="Solicitud Negada" ></center></td> <?php }?>
                  <td><center>
						<?php 
							if ($ruta)
						?>  
								<a href="dashboard.php?data=aviso&user=<?php echo $id_aviso;?>" id="editar" title="Ver" >
									<div style="float:left;margin-left:12px"> 
								<input type="button" class="btn btn-error" value="Ver"/></div></a>
                                                               
			
							</center></td>
						</tr>									
						<?php } ?>  </tbody>
           
        </table>
         <br> <br>

         
      </div>
    </div>
  
 </div>
    </div>
          
     </div>
    </div>
 
  <style type="text/css">
#zoom {
visibility: hidden;
position: absolute;
top: 20%;
left: 35%;
width: 300px;
height: 300px;
}

.cerrar {
position: absolute;
top:0px;
right: 0px;
}

.imagenPeque�a {
width: 60px;
}

#imagenGrande {
position: relative;
top: 50px;
}


</style>


<script language="javascript">
function zoom(visibilidad, imagen) {

document.getElementById('zoom').style.visibility = visibilidad;
document.getElementById('imagenGrande').src = imagen;

}
</script>