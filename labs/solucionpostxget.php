<?php
include("../conexiones_config.php");

if (isset($_POST["eliminar"])){
	echo "Elimino: " . $_POST['id'];
}




elseif (isset($_POST["editar"])) {
	echo "Edito: " . $_POST['id'];
}




else {
	
echo "<table>";
_bienvenido_mysql();
$sql=mysql_query("SELECT * FROM historico_bkp");
while($row=mysql_fetch_array($sql)){
?>
<tr>
	<td><?php echo $row["usuario"]?></td>
	<td class="center">
		<form action="#" method="POST">
		
			<a href="" id="editar" title="editar" >
			<input type="submit" name="eliminar" value="eliminar" />
		</a>
		
			
			<a href="" id="eliminar" title="eliminar" >
			<input type="submit" name="editar" value="editar" />
		</a>
		
			
			<input type="hidden" name="id" value="<?php echo $row["id_historico"]?>" />
		
		
		
		</form>
	</td>
</tr>									
<?php }

echo "</table>";
}
