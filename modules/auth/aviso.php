<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}

if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} _wm($usuario_datos[3],'Página Principal: '.ucwords(array_pop(explode('/', __dir__))),'S/I');

?>
<?php 

if (isset($_POST['Submit'])) {
  
	decode_get2($_SERVER["REQUEST_URI"],2);
		
	$id = _antinyeccionSQL($_GET['id']);

	$cedula=$_POST["cedula"];
	$nombre=$_POST["fname"];
	$apellido=$_POST["lname"];
	$correo_principal=$_POST["correo_principal"];
	$correo_corporativo=$_POST["correo_corporativo"];
	$telefono=$_POST["telefono"];
	$gerencia=$_POST["gerencia"];
	$usuario_int=$_POST["usuario_int"];	
	

  _bienvenido_mysql();
  
	
/*****************************************************************/

	decode_get2($_SERVER["REQUEST_URI"],2);
	
	$id = _antinyeccionSQL($_GET['id']);
	
	_bienvenido_mysql();
  
  $sql ="SELECT ";
  $sql.="usuario_bkp.id_usuario, ";
  $sql.="usuario_bkp.nombre, ";
  $sql.="usuario_bkp.apellido, ";
  $sql.="autenticacion.clave, ";
  $sql.="usuario_bkp.correo_corporativo, ";
  $sql.="usuario_bkp.telefono, ";
  $sql.="usuario_bkp.usuario_int, ";

  
?>



<div id="contentHeader">
	<h2>Sistema de Control de Expedientes</h2>
</div> <!-- #contentHeader -->	



<style type="text/css">
    
    .gabo01 {
        
        font-size: 14px;  
        width: 120px;
        height: 120px;
        float: left;
        margin: 15px;
        
    }
    
    .gabo02 {
        
        clear:  both;
        
    }
  
  
</style>
   
<div class="gap"></div>
    </div>
</div></div></section><section id="jm-bottom2-wrapper" 
                class=" " ><div class="container"><div class="row-fluid" id="bottom2">
<div id="jm-bottom6" class="span12">    <div class="jm-module jm-custom-suffix module ">
        <div class="mod-wrapper clearfix">		
                            <h3 class="header" style="margin-bottom: 10px;">
                    <span class="mod-title"><span class="color">Otros </span>Imágenes de <?php echo '$articulo' ?> </span>
                </h3>
                                            <div class="mod-content clearfix">	
                <div class="mod-inner clearfix">
                    
<div id="slideset-1-5446c24b7e9b4" class="wk-slideset wk-slideset-default" data-widgetkit="slideset" data-options='{"style":"default","width":980,"height":168,"effect":"zoom","index":0,"autoplay":1,"interval":4000,"items_per_set":4,"navigation":0,"buttons":1,"title":0,"duration":300}'>
	<div>
		<div class="sets">
							<ul class="set">
															<li>
						<article class="wk-content"><a href="http://www.metrodecaracas.com.ve/" target="_blank"><img style="border: 0;" src="/images/metros/metro-caracas.jpg" alt="" width="168" height="168" border="0" /></a></article>
											</li>


                
<div class="container">
    <div class="grid-24">  
        <div class="widget-content">
           
            
  <div><img src="modules/auth/logo.png" style="margin-top:10px;" /></div>	      
           
                        
        </div>
        <div id="contentHeader"><h2>Datos del Empleado</h2></div> <!-- #contentHeader -->	
	
<div class="container">
  <div class="grid-16">
	<div class="widget">
		<div class="widget-content">
			<div class="widget-header-in">
				<h3>Datos Personales</h3>
			</div> <!-- .widget-header -->
			<form class="form">
				<label>Fecha de Publicación:</label>	
                            <div class="field-group">
					<label>Nombres:</label>
					<div class="field">
						<input readonly value="<?php echo $nombre;?>" type="text" name="Nombres" id="Nombres" size="28" class="" />
						<label for="Nombres">Ej. Juan Pedro</label>
					</div>
				</div> <!-- .field-group -->
				<div class="field-group">
					<label>Apellidos:</label>
					<div class="field">
						<input readonly value="<?php echo $apellido;?>" type="text" name="Apellidos" id="Apellidos" size="28" class="" />
						<label for="Apellidos">Ej. Sanchez Perez</label>
					</div>
				</div> <!-- .field-group -->
				<!-- .field-group -->
                                  <div class="field-group">
				   <label>Correo Institucional:</label>
				   <div class="field">
					   <input readonly value="<?php echo $correo_corporativo; ?>" onChange="javascript:this.value=this.value.toUpperCase();" type="text" name="correo_corporativo" id="correo_corporativo" size="45" class="validate[custom[email]" />	
				   </div>
			   </div> <!-- .field-group -->
			   
                                
                                
				<div class="field-group">
					<label>Teléfono Móvil:</label>
					<div class="field">
						<input readonly value="<?php echo $celular;?>" type="text" name="tmov_n" id="tmov_n" size="35" class="" />
						<label for="tmov_n">Número</label>
					</div>
				</div> <!-- .field-group -->
				<div class="field-group">
					<label>Extensión Telefónica</label>
					<div class="field">
						<input readonly value="<?php echo $ext_telefonica;?>" type="text" name="ext_telefonica" id="ext_telefonica" size="10" class="" />
					</div>
				</div> 
                               <label>Fecha de Publicación:</label>
                                <div class="field-group">
					<label>Desde:</label>
					<div class="field">
						<input readonly value="<?php echo $nombre;?>" type="text" name="Nombres" id="Nombres" size="28" class="" />
						<label for="Nombres">Ej. Juan Pedro</label>
					</div>
				</div> <!-- .field-group -->
				<div class="field-group">
					<label>Hasta:</label>
					<div class="field">
						<input readonly value="<?php echo $apellido;?>" type="text" name="Apellidos" id="Apellidos" size="28" class="" />
						<label for="Apellidos">Ej. Sanchez Perez</label>
					</div>
				</div>
                                <!-- .field-group -->
      </form>
    </div> 
  </div>
</div>
					<script>
						$(function() {
							$(".meter > span").each(function() {
								$(this)
									.data("origWidth", $(this).width())
									.width(0)
									.animate({
										width: $(this).data("origWidth")
									}, 1200);
							});
						});
					</script>
					


    </div>					
</div>
</div>
