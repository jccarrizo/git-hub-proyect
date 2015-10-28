<form method="post" action="<?php $_SERVER["PHP_SELF"];?>">
 <!--Campo oculto para limitar el tamanyo -->
 <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
 <!-- tamaño en bytes 1kB=1024 1MB=1.048.576 -->
Elige imagen: <input name="userfile" type="file"> <input type="submit" value="aceptar" name="button">
</form>

