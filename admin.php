<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
?>
<?php $_SESSION['tokenmod01'] = $anticachecret; ?>
<?php
if(isset($_POST['ing-conv'])){
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////// FORMULARIO INGRESAR C  //////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<div id="contentHeader">
  <h2>Ingresar Convenio</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <div class="widget">
        <div class="widget-header"> <span class="icon-layers"></span>
          <h3>Ingresar Convenio</h3>
        </div>
        <div class="widget-content">
          <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
            <div class="grid-6">
              <div class="field">
                <label for="required">Año</br>
                </label>
                <input type="text" name="anio" id="anio" size="10" class="validate[required]" placeholder="Año" onChange="conMinuscula(this)" onkeypress="return isNumberKey(event)"/>
                <!--<a class="tooltip" title="Primer Nombre - Campo Requerido"><span class="icon-star"/></span></a>
--></div>
            </div>
            <div class="grid-12">
              <div class="field">
                <label for="required">Descripcion</br>
                </label>
                <input type="text" name="descrip" id="descrip" size="40"  class="validate[required]"  placeholder="Descripcion" onChange="conMinuscula(this)"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
            <div class="grid-6">
              <div class="field">
                <label for="required">Representante</br>
                </label>
                <input type="text" name="repres" id="repres" size="20" class="validate[required]" placeholder="Representante" onChange="conMinuscula(this)"/>
                <input type="hidden" name="switch" id="switch" size="10" value="1"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                
                <!--<a class="tooltip" title="Primer Apellido - Campo Requerido"><span class="icon-star"/></a>
--></div>
            </div>
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
    <!-- .grid --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->

<?php }

elseif(isset($_POST['ing-proy'])){
?>
<div id="contentHeader">
  <h2>Ingresar Proyecto</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
        <div class="widget">
          <div class="widget-header"> <span class="icon-layers"></span>
            <h3>Ingresar Proyecto</h3>
          </div>
          <div class="widget-content">
            
            <div class="field-group">
            <label for="datepicker">Por favor introduzca los datos del Proyecto:</label>
              <div class="field">
                <label for="proyecto">Proyecto:</label>
                <input type="text" name="proyecto" id="proyecto" size="20" class="validate[required]" placeholder="Proyecto" onChange="conMinuscula(this)"/>
                <!--<a class="tooltip" title="Primer Nombre - Campo Requerido"><span class="icon-star"/></span></a>--> 
              </div>
	          <div class="field">
                <label for="descrip">Descripcion:</label>
                <input type="text" name="descrip" id="descrip" size="40"  placeholder="Descripcion" onChange="conMinuscula(this)" class="validate[required]"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>--> 
              </div>
              <div class="field">
                <label for="fecha_ini">Fecha Inicio</label>
                <input type="text" name="fecha_ini" id="datepicker1" size="10" class="validate[required]" placeholder="Fecha Inicio"/>
              </div>
              <div class="field">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="text" name="fecha_fin" id="datepicker2" size="10"class="validate[required]" placeholder="Fecha Fin"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                <input type="hidden" name="switch" id="switch" size="10" value="2"/>
              </div>
              
            </div>
            <!--<a class="tooltip" title="Por Favor Use el Selector para Indicar la Fecha de Nacimiento - Campo Requerido"><span class="icon-star"/></a>-->
	     </div>
        </div>
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
<!-- .grid -->
</div>
<!-- .row -->
</div>
<!-- .container -->

<?php }

elseif(isset($_POST['ing-tip'])){
?>
<div id="contentHeader">
  <h2>Ingresar Tipologia</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <div class="widget">
        <div class="widget-header"> <span class="icon-layers"></span>
          <h3>Ingresar Tipologia</h3>
        </div>
        <div class="widget-content">
          <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
            <div class="grid-6">
              <div class="field">
                <label for="required">Tipologia:</br>
                </label>
                <input type="text" name="tipologia" id="tipologia" size="25" class="validate[required]" placeholder="Tipologia" onChange="conMinuscula(this)"/>
                <!--<a class="tooltip" title="Primer Nombre - Campo Requerido"><span class="icon-star"/></span></a>
--></div>
            </div>
            <div class="grid-12">
              <div class="field">
                <label for="required">Descripcion:</br>
                </label>
                <input type="text" name="descrip" id="descrip" size="45"  placeholder="Descripcion" onChange="conMinuscula(this)" class="validate[required]"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
            <div class="grid-6">
              <div class="field">
                <label for="datepicker">Viv/Apts:</br>
                </label>
                <input type="text" name="apts" id="apts" size="10" class="validate[required]" placeholder="Viviendas o Apts" onkeypress="return isNumberKey(event)"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                <input type="hidden" name="switch" id="switch" value="3"/>
                <!--<a class="tooltip" title="Por Favor Use el Selector para Indicar la Fecha de Nacimiento - Campo Requerido"><span class="icon-star"/></a>
--></div>
            </div>
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
    <!-- .grid --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->

<?php }elseif(isset($_POST['ing-cat'])){
?>
<div id="contentHeader">
  <h2>Ingresar Categoria</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <div class="widget">
        <div class="widget-header"> <span class="icon-layers"></span>
          <h3>Ingresar Categoria</h3>
        </div>
        <div class="widget-content">
          <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
            <div class="grid-6">
              <div class="field">
                <label for="required">Categoria:</br>
                </label>
                <input type="text" name="categoria" id="categoria" size="20" class="validate[required]" placeholder="Categoria" onChange="conMinuscula(this)"/>
                <!--<a class="tooltip" title="Primer Nombre - Campo Requerido"><span class="icon-star"/></span></a>
--></div>
            </div>
            <div class="grid-12">
              <div class="field">
                <label for="required">Descripcion:</br>
                </label>
                <input type="text" name="descrip" id="descrip" size="40"  placeholder="Descripcion" onChange="conMinuscula(this)" class="validate[required]"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
            <div class="grid-6">
              <div class="field">
                <label for="datepicker">Minimo  |  Maximo:</br>
                </label>
                <input type="text" name="min" id="min" size="2" class="validate[required]" placeholder="Min" onkeypress="return isNumberKey(event)"/>
                <input type="text" name="max" id="max" size="2" class="validate[required]" placeholder="Max" onkeypress="return isNumberKey(event)"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                <input type="hidden" name="switch" id="switch" size="10" value="4"/>
                <!--<a class="tooltip" title="Por Favor Use el Selector para Indicar la Fecha de Nacimiento - Campo Requerido"><span class="icon-star"/></a>
--></div>
            </div>
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
    <!-- .grid --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->

<?php } elseif(isset($_POST['ing-fas'])){ ?>
<div id="contentHeader">
  <h2>Ingresar Fase</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <div class="widget">
        <div class="widget-header"> <span class="icon-layers"></span>
          <h3>Ingresar Fase</h3>
        </div>
        <div class="widget-content">
          <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
            <div class="grid-6">
              <div class="field">
                <label for="required">Codigo:</br>
                </label>
                <input type="text" name="fase" id="fase" size="10" class="validate[required]" placeholder="Nombre" onChange="conMinuscula(this)"/>
                <!--<a class="tooltip" title="Primer Nombre - Campo Requerido"><span class="icon-star"/></span></a>
--></div>
            </div>
            <div class="grid-6">
              <div class="field">
                <label for="required">Descripcion:</br>
                </label>
                <input type="text" name="descrip" id="descrip" size="25"  placeholder="Descripcion" onChange="conMinuscula(this)" class="validate[required]"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
            <div class="grid-12">
              <div class="field">
                <label for="required">Nombre:</br>
                </label>
                <input type="text" name="nombre" id="nombre" size="25"  placeholder="Nombre" onChange="conMinuscula(this)" class="validate[required]"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                <input type="hidden" name="switch" id="switch" value="5"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
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
    <!-- .grid --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->

<?php } elseif(isset($_POST['ing-act'])){ ?>
<div id="contentHeader">
  <h2>Ingresar Actividad</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <div class="widget">
        <div class="widget-header"> <span class="icon-layers"></span>
          <h3>Ingresar Actividad</h3>
        </div>
        <div class="widget-content">
          <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
            <div class="grid-6">
              <div class="field">
                <label for="required">Actividad:</br>
                </label>
                <input type="text" name="actividad" id="actividad" size="20" class="validate[required]" placeholder="Nombre" onChange="conMayusculas(this)"/>
                <!--<a class="tooltip" title="Primer Nombre - Campo Requerido"><span class="icon-star"/></span></a>
--></div>
            </div>
            <div class="grid-12">
              <div class="field">
                <label for="required">Descripcion:</br>
                </label>
                <input type="text" name="descrip" id="descrip" size="45"  placeholder="Descripcion" onChange="conMayusculas(this)" class="validate[required]"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                <input type="hidden" name="switch" id="switch"  value="6"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
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
    <!-- .grid --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->

<?php } elseif(isset($_POST['ing-mat'])){ ?>
<div id="contentHeader">
  <h2>Ingresar Material</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-24">
      <div class="widget">
        <div class="widget-header"> <span class="icon-layers"></span>
          <h3>Ingresar Material</h3>
        </div>
        <div class="widget-content">
          <form class="form validateForm" action="modules/gmvv_Admin/mod_conf.php" method="post"  onsubmit="return validate()" >
            
            <div class="grid-12">
              <div class="field">
                <label for="required">Material:</br>
                </label>
                <input type="text" name="descrip" id="descrip" size="45"  placeholder="Descripcion" onChange="conMayusculas(this)" class="validate[required]"/>
                <input type="hidden" name="token" id="token" size="10" value="<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>"/>
                <input type="hidden" name="switch" id="switch"  value="7"/>
                <!--<a class="tooltip" title="Segundo Nombre - No Requerido"><span class="icon-star"/></a>
--></div>
            </div>
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
    <!-- .grid --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->




<?php  }  else


{
	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////// FORMULARIO INICIAL  /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<div id="contentHeader">
  <h2>Configurar Parametros</h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="grid-24">
    <form class="form uniformForm" action="#" method="post">
      <button name="ing-conv" class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Convenio</button>
      <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Convenio</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Año</th>
              <th>Descripcion</th>
              <th>Representante</th>
              <th width="100"  >Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
_bienvenido_mysql();
$i=1;
$sql=mysql_query("SELECT gmv_convenio.id_convenio, gmv_convenio.anio, gmv_convenio.descripcion, gmv_convenio.representante FROM gmv_convenio;");
while($row_cont=mysql_fetch_array($sql)){
?>
            <tr class="gradeA">
              <td><?php echo $i ?></td>
              <td><?php echo $row_cont["anio"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
              <td><?php echo $row_cont["representante"]?></td>
              <td class="center"><?php  $parametros = 'conv='.$row_cont["id_convenio"];
$parametros = _desordenar($parametros); ?>
                <a href="dashboard.php?data=gmvv-conf&flag=1&<?php echo $parametros; ?>" id="editar" title="Editar" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-pen-alt-fill"></span></div>
                </a> <a href="dashboard.php?data=gmvv-conf&token=<?php echo  $_SESSION['tokenmod01'] = $anticachecret; ?>" id="editar" title="Editar Convenio" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-cog-alt"></span></div>
                </a></td>
            </tr>
            <?php
          $i++;  }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget -->
    
    <form class="form uniformForm" action="#" method="post">
      <button name="ing-proy" class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Proyecto</button>
      <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Proyecto</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Fecha Inicio</th>
              <th>Fecha fin</th>
              <th width="100"  >Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$a=1;
            $sql=mysql_query("SELECT gmv_proyecto.id_proyecto, gmv_proyecto.nombre, gmv_proyecto.descripcion, gmv_proyecto.fecha_inicio, gmv_proyecto.fecha_fin, gmv_proyecto.estatus FROM gmv_proyecto;");
            while($row_cont=mysql_fetch_array($sql)){
            ?>
            <tr class="gradeA">
              <td><?php echo $a ?></td>
              <td><?php echo $row_cont["nombre"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
              <td><?php echo $row_cont["fecha_inicio"]?></td>
              <td><?php echo $row_cont["fecha_fin"]?></td>
              
              <?php  $parametros = 'id_proy='.$row_cont["id_proyecto"]; $parametros = _desordenar($parametros); ?>
              
              <td class="center"><a href="dashboard.php?data=cat-tip&flag=1&<?php echo $parametros; ?>" id="editar" title="Editar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-cog-alt"></span></div>
                </a> 
                
                <a href="javascript:eliminar('<?php echo $row_cont["id_proyecto"]?>','<?php echo strtoupper($row_cont["titulo"])?>')" id="editar" title="Eliminar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-x-alt"></span></div>
                </a></td>
            </tr>
            <?php
            $a++; }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget -->
    
    <form class="form uniformForm" action="#" method="post">
      <button name="ing-tip" class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Tipologia</button>
      <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Tipologia</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Viv o Apts</th>
              <th width="100"  >Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql=mysql_query("SELECT gmv_tipologia.id_tipologia, gmv_tipologia.nombre, gmv_tipologia.descripcion, gmv_tipologia.cantidad_viviendas
FROM gmv_tipologia;");
            while($row_cont=mysql_fetch_array($sql)){
            ?>
            <tr class="gradeA">
              <td><?php echo $row_cont["id_tipologia"] ?></td>
              <td><?php echo $row_cont["nombre"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
              <td><?php echo $row_cont["cantidad_viviendas"]?></td>
              <?php  $parametros = 'id_tip='.$row_cont["id_tipologia"]; $parametros = _desordenar($parametros); ?>
              
              <td class="center"><a href="dashboard.php?data=tip-fas&flag=1&<?php echo $parametros; ?>" id="editar" title="Editar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-cog-alt"></span></div>
                </a> <a href="javascript:eliminar('<?php echo $row_cont["id_tipologia"]?>','<?php echo strtoupper($row_cont["titulo"])?>')" id="editar" title="Eliminar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-x-alt"></span></div>
                </a></td>
            </tr>
            <?php
  }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget -->
    
    <form class="form uniformForm" action="#" method="post">
      <button name="ing-cat" class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Categoria</button>
      <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Categoria</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Min</th>
              <th>Max</th>
              <th width="100"  >Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql=mysql_query("SELECT gmv_categoria.id_categoria, gmv_categoria.nombre, gmv_categoria.descripcion, gmv_categoria.min, gmv_categoria.max FROM gmv_categoria;");
            while($row_cont=mysql_fetch_array($sql)){
            ?>
            <tr class="gradeA">
              <td><?php echo $row_cont["id_categoria"] ?></td>
              <td><?php echo $row_cont["nombre"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
              <td><?php echo $row_cont["min"]?></td>
              <td><?php echo $row_cont["max"]?></td>
              <td class="center"><a href="inicio.php?op=46&id_cat=<?php echo $row_cont["id_categoria"]?>" id="editar categoria" title="Editar Categoria" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-cog-alt"></span></div>
                </a></td>
            </tr>
            <?php
   			 }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget -->
    
    <form class="form uniformForm" action="#" method="post">
      <button name="ing-fas"  class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Fase</button>
      <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Fase</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th width="100"  >Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql=mysql_query("SELECT gmv_fase.id_fase, gmv_fase.descripcion, gmv_fase.nombre, gmv_fase.codigo FROM gmv_fase; ");
            while($row_cont=mysql_fetch_array($sql)){
            ?>
            <tr class="gradeA">
              <td><?php echo $row_cont["id_fase"] ?></td>
              <td><?php echo $row_cont["codigo"]?></td>
              <td><?php echo $row_cont["nombre"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
              <td class="center"><a href="inicio.php?op=20&c=<?php echo $row_cont["cod_opcion"]?>" id="editar" title="Editar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-cog-alt"></span></div>
                </a> <a href="javascript:eliminar('<?php echo $row_cont["cod_opcion"]?>','<?php echo strtoupper($row_cont["titulo"])?>')" id="editar" title="Eliminar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-x-alt"></span></div>
                </a></td>
            </tr>
            <?php
			  }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget -->
    
    <form class="form uniformForm" action="#" method="post">
      <button  name="ing-act" class="btn btn-small btn-quaternary"><span class="icon-move-alt2"></span>Ingresar Actividad</button>
      <br />
    </form>
    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Actividad</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Actividad</th>
              <th>Descripcion</th>
              <th width="100"  >Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql=mysql_query("SELECT gmv_actividad.id_actividad, gmv_actividad.nombre, gmv_actividad.descripcion FROM gmv_actividad;");
            while($row_cont=mysql_fetch_array($sql)){
            ?>
            <tr class="gradeA">
              <td><?php echo $row_cont["id_actividad"]?></td>
              <td><?php echo $row_cont["nombre"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
              <td class="center"><a href="inicio.php?op=20&c=<?php echo $row_cont["id_actividad"]?>" id="editar" title="Editar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-cog-alt"></span></div>
                </a> <a href="javascript:eliminar('<?php echo $row_cont["id_actividad"]?>','<?php echo strtoupper($row_cont["titulo"])?>')" id="editar" title="Eliminar Contenido" >
                <div class="icons-holder" style="float:left;margin-left:15px"><span class="icon-x-alt"></span></div>
                </a></td>
            </tr>
            <?php
            }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget --> 


  <?php
  ///////////////////////////////////////////////////////////////Materiales /////////////////////////////////////////////////////
         
           ?>



    <div class="widget widget-table">
      <div class="widget-header"> <span class="icon-cog"></span>
        <h3 class="icon chart">Material</h3>
      </div>
      <div class="widget-content">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Material </th>
             
             
            </tr>
          </thead>
          <tbody>
            <?php

            $sql=mysql_query("SELECT alm_material.id_material, alm_material.descripcion, alm_material.id_unidad_material, 
			alm_material.id_categoria_material FROM alm_material; ");
            while($row_cont=mysql_fetch_array($sql)){
            ?>
            <tr class="gradeA">
              <td><?php echo $row_cont["id_material"]?></td>
              <td><?php echo $row_cont["descripcion"]?></td>
          
             
            </tr>
            <?php
            }
           ?>
          </tbody>
        </table>
      </div>
      <!-- .widget-content --> 
    </div>
    <!-- .widget --> 
    
  </div>
</div>
</div>
<!-- .grid -->
</div>
<!-- .container -->
















<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////// FORMULARIO INICIAL  /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
}
?>
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
$("#datepicker1").datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true,
yearRange: "1900:2020"
});
});


$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker2").datepicker({
dateFormat: 'yy-mm-dd',
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


</script> 
