        <?php

// Desactivar toda notificación de error
error_reporting(0);
// Notificar solamente errores de ejecución
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Notificar E_NOTICE también puede ser bueno (para informar de variables
// no inicializadas o capturar errores en nombres de variables ...)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
// Notificar todos los errores excepto E_NOTICE
//error_reporting(E_ALL ^ E_NOTICE);
// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);
// Notificar todos los errores de PHP
//error_reporting(-1);
// Lo mismo que error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);
$intrasite='http://intranet.metrodemaracaibo.gob.ve';


$SQL_debug='0';// PARA ACTIVAR EL MANEJO DE ERRORES DE LOS QUERY
$mantenimiento='0'; 
$wachsam='1';
$validador_externo='0';
$limite_mensajes='3';

// CONEXION CENTRAL
$db0_host='localhost';
$db0_port='3306';
$db0_user='dmaldonado';  
$db0_pass='dmaldonado';
$db0_database='clasificados';   
      
// SEED
$ecret='QWERL1234KJHS9876';

// MAILER       

//https://accounts.google.com/b/0/DisplayUnlockCaptcha

$envio_from_nombre='Soporte TDI';
$envio_from_correo='intranet@writeme.com';
$envio_usuario='intranet@writeme.com';
$envio_clave='soportetdi13';
$envio_puerto='465';
$envio_servidor='smtp.mail.com';
$envio_debug='1';

//$envio_from_nombre='Soporte TDI';
//$envio_from_correo='soportetdi@gmail.com';
//$envio_usuario='soportetdi@gmail.com';
//$envio_clave='soportetdi13';
//$envio_puerto='465';
//$envio_servidor='smtp.gmail.com';
//$envio_debug='1';
   

// MENSAJES DE CORREO

$mensajedelcorreo_cambiodeclave = "Hola ".$usuario_datos[1]." ".$usuario_datos[2].",<br /><br />Su clave para acceder a la Intranet de la página www.metrodemaracaibo.gob.ve ha sido modificada satisfactoriamente.<br /><br />	Por favor, no responda a este correo, ya que se genera automáticamente y es a título informativo.<br /><br /><br />Si desconoce esta operación comuniquese con la Gerencia de Tecnología de Información.";





/*
 * http://us2.php.net/manual/es/function.ldap-bind.php
 * http://comenzando-a-programar.blogspot.com/2012/06/autenticacion-php-con-ldap-directorio.html
 * http://docs.php.net/manual/es/ldap.examples-basic.php
 * http://stackoverflow.com/questions/12258945/ldap-authentication-using-php
 * https://forums.alfresco.com/es/sincronizaci%C3%B3n-ldap-sin-cron-02082012-1120
 * http://goo.gl/0siBYf
 * 
 * 
 * 
// CONEXION CENTRAL
$db0_host='127.0.0.1';
$db0_port='3306';
$db0_user='metro_extranetu';
$db0_pass='RRhhm3tr0m4r4';
//SCHEMAS
$db0_database='metro_extranet';
$db1_database='metro_extranet';
$db2_database='jornadas';
*/


//SEMILLA PARA ENCRIPTACION


?>
