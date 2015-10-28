<?php 
	if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
?>

<div id="contentHeader">
	<h2>Sistema de Control de Expedientes Informa:</h2>
</div> <!-- #contentHeader -->	

<div class="container">
	<?php if (@$_SESSION['notificar'] == '1'){ ?>
	<div class="grid-24">
		<div class="notify <?php echo @$_SESSION['notificartipo']; ?>">
			<a href="javascript:;" class="close">&times;</a>
			<h3><?php echo @$_SESSION['notificarmensaje']; ?>.</h3>
		</div>
	</div>	
<?php $_SESSION['notificar'] = ''; } ?>
</div> <!-- .container -->

<script>
$(".close").click(function(mievento){
   mievento.preventDefault();
   setTimeout("location.href='dashboard.php'", 0);
});
</script>