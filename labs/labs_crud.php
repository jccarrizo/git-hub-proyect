<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>LABS!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content=""> 
</head>
<body>
<?php
  include('xcrud/xcrud/xcrud.php');
  $xcrud = Xcrud::get_instance();
  $xcrud->connection('rrhh','RRhhm3tr0m4r4','metro_inextranet','localhost','ascii');
  $xcrud->table('labs');
  

//Xcrud_config::$some_parameter = 'some value'; 
  
  echo $xcrud->render(); 
 ?>

  
</body>
</html>

