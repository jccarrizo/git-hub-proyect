<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[9],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[9],'Acceso Autorizado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
//if (!$_GET["flag"]){ir("dashboard.php?data=admin-mi");}
?>

<!-- Load TinyMCE -->
<script type="text/javascript" src="src/javascripts/tinymce/js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinymce.init({
selector: "textarea",
plugins: [
	"advlist autolink lists link image charmap print preview anchor",
	"searchreplace visualblocks code fullscreen",
	"insertdatetime media table contextmenu paste moxiemanager"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<div id="contentHeader">
	
<?php //decode_get2($_SERVER["REQUEST_URI"],1); ?>
	
<h2>Modificar Metro Informa - <?php echo 'ID: '.$_GET["id"]; ?></h2>
</div> <!-- #contentHeader -->	

<?php 

if (@$_POST['titulo']){
	
	@$idmi=$_POST["idmi"];
	@$titulo=$_POST["titulo"];
	@$fecha=$_POST["fecha"];
	@$noticia=addslashes($_POST["noticia"]);	
	 
	_bienvenido_mysql();
	
	$result = mysql_query ("UPDATE metroinforma SET titulo='".$titulo."', fecha='".$fecha."', noticia='".$noticia."' WHERE id = ". $idmi) or die(mysql_error());
	
	if($result){
		notificar("Metro informa editado con exito", "dashboard.php?data=admin-mi", "notify-success");
	}
	
	else {
		die(mysql_error());
		echo $noticia;
	}
  
} else {
    $idmi = $_GET["id"];	
		_bienvenido_mysql();	
		$result = mysql_query ("SELECT * FROM metroinforma WHERE id = ". $idmi);
		$reg=mysql_fetch_array($result);
		
		$num_rows = mysql_num_rows($result);
		
		if ($num_rows==1) {		
			$titulo=$reg['titulo'];
			$fecha=$reg['fecha'];
			$noticia=$reg['noticia'];
		}
		else {
			notificar("No Existen Registros", "dashboard.php?data=admin-mi", "notify-error");
    }
}
?>

<div class="container">
	<div class="grid-24">
		<div class="widget">
			<div class="widget-content">
				
				<form class="form uniformForm validateForm" name="from_envio_mi" method="post" action="#" >
					
					<div class="field-group">
						<label for="email">Titulo:</label>
						<div class="field">
							<input type="text" name="titulo" id="titulo" size="32" class="validate[required]" value="<?php echo $titulo; ?>" autofocus />	
						</div>
					</div> <!-- .field-group -->
					
					<div class="field-group">
						<label for="date">Fecha actual:</label>
						<div class="field">
							<input type="text" name="fecha" id="fecha" size="15" class="" value="<?php echo $fecha; ?>" readonly />
							<label for="date">Fecha y Ahora actuales.</label>	
						</div>
					</div> <!-- .field-group -->
					
					<div class="field-group">
						<label for="url">Noticia:</label>
						<div class="field">
							<textarea id="noticia" name="noticia" rows="15" cols="80" style="width: 80%" class="tinymce"><?php echo $noticia; ?></textarea>
							<label for="url"></label>
						</div>
					</div> <!-- .field-group -->
				
					<input type="hidden" name="idmi" value="<?php echo _antiXSS($_GET['id']); ?>" />
					
					<div class="actions" style="text-aling:right">
						<button name="Send" type="submit" class="btn btn-error">Modificar Registro</button>
					</div> <!-- .actions -->
				</form>
				
				
			</div> <!-- .widget-content -->
			
		</div> <!-- .widget -->	
	</div>
</div> <!-- .container -->

