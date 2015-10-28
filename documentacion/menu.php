<?php 

echo "Menu ";



?>




<div id="contentHeader">
  <h2>Registrar Curriculum Vitae  <?php  echo $_SESSION['correo'] ?></h2>
</div>
<!-- #contentHeader -->
<div class="container">
  <div class="row">
    <div class="grid-6">
      <div class="widget">
        <div class="widget-header"> <span class="icon-list"></span>
          <h3>Seleccione una Opción</h3>
        </div>
<div class="widget-content">


<ul class="bullet bullet-red">

<li><a href="dashboarde.php?data=carga-cv">Cargar Curriculum Vitae </a></li>
<li><a href="dashboarde.php?data=impr-cv">Imprimir Curriculum Vitae</a></li>
<li><a href="dashboarde.php?data=edit-cv">Editar Curriculum Vitae</a></li>
<li><a href="dashboarde.php?data=logout">Cerrar Sesión </a></li>

</ul>		
</div>
</div>
</div>
</div>
</div>
</div>

