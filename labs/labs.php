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

  include('src/classes/xcrud/xcrud/xcrud.php');

  //http://propuestasmetro.tk/intranet/src/classes/xcrud/documentation/
  //http://propuestasmetro.tk/intranet/src/classes/xcrud/demos/
  //http://xcrud.com/demos/

  $xcrud = Xcrud::get_instance();
  $xcrud->connection('rrhh','RRhhm3tr0m4r4','rrhh','localhost','ascii');
  $xcrud->table('historico');

  //$xcrud->where('cedula =', $usuario_datos[3]);		
  //$xcrud->pass_var('cedula',$usuario_datos[3]);
  //$xcrud->columns('sexo,cedula,estado_civil,estudia,nivel_educativo,profesion,discapacitado,discapacidad,grado,hcm,id_familiar', true);
  //$xcrud->fields('sexo,cedula,estado_civil,estudia,nivel_educativo,profesion,discapacitado,discapacidad,grado,hcm,id_familiar', true);
  //$xcrud->change_type('parentesco','select','', array('values'=>'HERMANO, CONYUGUE, PADRE, MADRE, HIJO(A)'));
  //$xcrud->unset_view();
  //$xcrud->unset_csv();
  //$xcrud->unset_limitlist();
  //$xcrud->unset_numbers();
  //$xcrud->unset_pagination();
  //$xcrud->unset_print();
  //$xcrud->unset_search();

  echo $xcrud->render();

  
 ?>

</body>
</html>

