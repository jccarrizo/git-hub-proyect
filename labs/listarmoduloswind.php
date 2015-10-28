<?php


function listarmoduloswind(){




	$directorio = opendir("../modules");
	
	while ($archivo = readdir($directorio)) {
		$nombreArch = ucwords($archivo);
		if ($nombreArch!="." && $nombreArch!=".."){

			$listarmodulos[] = $nombreArch; 

		}
	} 
	return $listarmodulos;
	closedir($directorio); 
}



print_r(listarmoduloswind());

echo "</br>";
echo $so= php_uname() . "\n";
echo "</br>";
echo substr("$so",-0,4);




?>