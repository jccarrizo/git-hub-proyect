<?php 
	if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
?>

<?php if (@$_SESSION['notificar'] == '1'){ ?>
	<div class="grid-24">
		<div class="notify <?php echo @$_SESSION['notificartipo']; ?>">
			<a href="javascript:;" class="close">&times;</a>
			<h3><?php echo @$_SESSION['notificarmensaje']; ?>.</h3>
		</div>
	</div>	
<?php $_SESSION['notificar'] = ''; } ?>
