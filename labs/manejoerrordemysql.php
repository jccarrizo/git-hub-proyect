<?php

$cadena = "Sin León no hubiera España";
$buscar = "León";
$resultado = strpos($cadena, $buscar);

if($resultado !== FALSE){
    echo "La subcadena '$buscar' fue encontrada dentro de la cadena '$cadena' en la posición: '$resultado'";
}

?>