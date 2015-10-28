<?php //TIPO PJPEG para IE
 if ($_FILES['userfile']['type']=="image/jpeg" || ($_FILES['userfile']['type']=="image/pjpeg") ){
if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
 echo "El archivo ". $_FILES['userfile']['name'] ." ha sido subido con exito\n";
//Con time podran subir archivos con mismo nombre
//$nombre_fichero=time().'__'.$_FILES['userfile']['name'];
$nombre_fichero='Descargas/'.$_FILES['userfile']['name'];
if(move_uploaded_file($_FILES['userfile']['tmp_name'], $nombre_fichero)){
echo "Imagen correcta"; }
else {
echo "No se ha podido subir la imagen"; print_r($_FILES); } }
echo "Mostrando la imagen<br>"; echo '<img src="'. $nombre_fichero .'">'; }
//En caso de que no sea un jpg, no permitir el envio
else echo "El tipo de fichero no es valido"; ?>
