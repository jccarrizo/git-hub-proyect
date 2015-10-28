<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {ir("../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Sección/Módulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<div id="contentHeader">
  <h2>Productos</h2>  
</div>
<div class="container">
  <div class="grid-24">
    <form class="form uniformForm" action="#" method="post">
     <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
      
          <h3 class="icon chart">Lista de Productos</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
                 
                <th width="100">Titulo</th>
                  <th width="50">Precio</th>
				  <th width="50">Cantidad</th>  
                  <th width="50">Fotos</th>
               <th width="50">Fecha de Publicación </th>
                <th width="50">Opciones</th> 
                           </tr>
          </thead>
          <tbody>   
            <?php
_bienvenido_mysql();
$fecha=date('d/m/Y');
$sql=mysql_query("SELECT *
FROM usuario_bkp
INNER JOIN clasificados_avisos
WHERE usuario_bkp.usuario_int = clasificados_avisos.usuario AND autorizacion=1 AND fecha_despublicacion >='$fecha'");
while($row_cont=mysql_fetch_array($sql)){

    $id_aviso=$row_cont['idaviso'];



?>
            <tr class="gradeA">
                <td><?php echo $row_cont["titulo"]?></td>
                <td><?php echo $row_cont["precio"]?></td>
               <td><?php echo $row_cont["cantidad"]?></td>
                <td style="cursor: pointer"><center><img class="imagenPequena" src="imagenes_clasificados/<?php echo $row_cont["fotos"]?>"  onclick="zoom('visible', this.src)" width="50" height="50" border="1" style="border-color:red"/>
				

<div id="zoom"><a class="cerrar" href="javascript: zoom('hidden', '')">
  <input name="button" type="button" class="btn btn-error" value="Cerrar"/>
</a><img src='' name="imagenGrande" id="imagenGrande""></div>


                </center></td>
                <td><?php echo $row_cont["fecha_publicacion"]?></td>
               
                  <td><center>
						<?php 
							if ($ruta)
						?>  
								<a href="dashboard.php?data=aviso&user=<?php echo $id_aviso;?>" id="editar" >
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

 {cursor: pointer}
.cerrar {
position: absolute;
top:0px;
right: 0px;
}

.imagenPequena {
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

            


            
            
