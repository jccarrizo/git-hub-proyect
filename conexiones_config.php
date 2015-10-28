<?php  	

require("variables_config.php"); 

/*****/
$anticache=md5(date('U'));
$anticachecret=md5(date('U').$ecret);
/*****/

/************************************/
/*  DESCONEXION GEN					*/
/************************************/

function _adios_mysql()	{
	require("variables_config.php");
	@mysql_close($bienvenido_mysql);
}

/************************************/
/*CONEXION GENERICA					*/
/************************************/

function _bienvenido_mysql() {
	require("variables_config.php");
	$bienvenido_mysql= mysql_connect($db0_host,$db0_user,$db0_pass) ;
	if($bienvenido_mysql){
		$db_bienvenido_mysql = mysql_select_db($db0_database,$bienvenido_mysql) or die(mysql_error()); 	
		mysql_query("set names utf8");
	}
	else{
		if ($SQL_debug=='1'){ die('Error en Conexion - Respuesta del Motor: ' . mysql_error());} else {die('Error en Conexion');}	
	}				
}


/************************************/
/*FUNCION DE AUDITORIA				*/
/************************************/

function _wm($usu,$msg,$obs) {
	require("variables_config.php");
	if($wachsam=='1'){
		_bienvenido_mysql();
		$publica= @$_SERVER['REMOTE_ADDR']; if ($privada=='') $privada = 'S/I';
		$privada= @$_SERVER['HTTP_X_FORWARDED_FOR']; if ($publica=='') $publica = 'S/I';
		if ($obs=='') $obs = 'S/I';
		$sql ="INSERT INTO auditoria (usuario, ip_wan, ip_proxy, operacion, observaciones)";
		$sql .="VALUES('".$usu."','".$publica."','".$privada."','".$msg."','".$obs."');";
		$result = mysql_query($sql);
		if(!$result){
			if ($SQL_debug=='1'){ die('Error Auditando - Respuesta del Motor: ' . mysql_error());} else {die('Error Auditando');}	
		}
	}
}	

/************************************/
/*FUNCION DE ENVIO DE MAIL					*/
/************************************/

function _enviarmail($mensaje,$nombre_de_destino,$destino,$asunto) {

		require("variables_config.php");		
		date_default_timezone_set('America/Caracas');
		require_once('src/classes/phpmailer/class.phpmailer.php');
		$fecha_hora = date("Y/m/d H:i:s");

		$mail = new PHPMailer();
		//indico a la clase que use SMTP
		$mail->IsSMTP();
		//permite modo debug para ver mensajes de las cosas que van ocurriendo
		$mail->SMTPDebug = 0;
		//Debo de hacer autenticación SMTP
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		//indico el servidor de Gmail para SMTP
		$mail->Host = "smtp.mail.com";
		//indico el puerto que usa Gmail
		$mail->Port = 465;
		//indico un usuario / clave de un usuario de gmail
		$mail->Username = "intranet@writeme.com";
		$mail->Password = "soportetdi13";
		$mail->SetFrom('intranet@writeme.com', 'Metro de Maracaibo');
		$mail->AddReplyTo("intranet@writeme.com","Metro de Maracaibo");
		$mail->Subject = $asunto;
		$mail->MsgHTML($mensaje);
		//indico destinatario
		$address = $destino;
		$mail->AddAddress($destino, $nombre_de_destino);
		if(!$mail->Send()) {
			return 0; //"Error al enviar: " . $mail->ErrorInfo;
		} else {
          $file=fopen("correos.html","a");
          if(file){
            fputs($file,"Para: " . $nombre_de_destino . "<" . $destino . ">");fputs($file,"<br />");
            fputs($file,"Fecha: " . date("Y/m/d H:i:s")); fputs($file,"<br />");
            fputs($file,"Asunto: " . $asunto);fputs($file,"<br />");
            fputs($file,"<p>Mensaje:</p>"); fputs($file,"<br />");
            fputs($file,"<hr />");  
            fputs($file,$mensaje);
            fputs($file,"<hr />");
            fputs($file,"<br />");fputs($file,"<br />");
            fclose($file);
          }
          return 1;
		}
}	

/************************************/
/*FUNCION DE DAME CEDULA 			*/
/************************************/

function _damecedula($usu) {
	require("variables_config.php");
	_bienvenido_mysql();
	$result = mysql_query("SELECT * FROM usuario_bkp WHERE usuario_int = '".$usu."'");
	$reg=mysql_fetch_array($result);
	if($result) {		
		return $reg['usuario'];
	}		
	else {
		return '0';
	}	
}		

/************************************/
/*FUNCION DE ENCRIPTACION           */
/************************************/

function _desordenar($string) {
	require("variables_config.php");
	$key = $ecret;            
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}

function _ordenar($string) {
	require("variables_config.php");
	$key = $ecret;    
	$result = '';
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

function decode_get2($string, $cantidaddeparametros) {
	$cad = split("[&]",$string); //separo la url desde el ?
	$string = $cad[$cantidaddeparametros]; //capturo la url desde el separador ? en adelante
	$string = _ordenar($string); //decodifico la cadena
	//procedo a dejar cada variable en el $_GET
	$cad_get = split("[&]",$string); //separo la url por &
	foreach($cad_get as $value) {
		$val_get = split("[=]",$value); //asigno los valosres al GET
		$_GET[$val_get[0]]=utf8_decode($val_get[1]);
	}
}

function _desordenarperfil($string, $key) {
	require("variables_config.php"); 
	$key = $key . $ecret;
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}

function _ordenarperfil($string, $key) {
	require("variables_config.php");
	$key = $key . $ecret;
	$result = '';
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

/************************************/
/*FUNCION DE ALERTA		 			*/
/************************************/

function alerta($mensaje) {
	echo '<script type="text/javascript">alert("'.$mensaje.'");</script>';
}

function alertadev($mensaje) {
	echo '<script type="text/javascript">prompt("'.$mensaje.'", "'.$mensaje.'");</script>';
}

/************************************/
/*FUNCION DE REDIRECCION 			*/
/************************************/

function ir($url) {
	echo '<script type="text/javascript">window.location.href = "'.$url.'";</script>';
}	

function irb($url) {
	echo '<script type="text/javascript">window.location.href = "'.$url.'"; target="_blank";</script>';
}	


function irpopup($url, $w, $h) {
	echo '<script type="text/javascript">window.open ("'.$url.'", "reporte","location=1,status=1,scrollbars=1, width='.$w.',height='.$h.'");</script>';
}	






/************************************/
/*FUNCION DE NOTIFICACION			*/
/************************************/

function notificar($mensaje, $url, $tipo) { // notify-success: = gris | notify-warning: = amarillo 
	$_SESSION['notificar'] = '1';           // notify-error: = rojo | notify-info: = azul |  notify: gris
	$_SESSION['notificartipo'] = $tipo;
	$_SESSION['notificarmensaje'] = $mensaje;
	if ($url!='') {
		echo '<script type="text/javascript">window.location.href = "'.$url.'";</script>';	
	}
}
/* <?php include('notificador.php'); ?> */

/************************************/
/*FUNCION DE GENERAR PASS			*/
/************************************/

function generapass(){
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$longitudCadena=strlen($cadena);
	$pass = "";
	$longitudPass=10;
	for($i=1 ; $i<=$longitudPass ; $i++){
		$pos=rand(0,$longitudCadena-1);
		$pass .= substr($cadena,$pos,1);
	}
	return $pass;
}

/************************************/
/*FUNCION DE LISTAR DIRECTORIOS 	*/
/************************************/	

function listarmodulos(){

	$directorio = opendir("./modules");
	while ($archivo = readdir($directorio)) {
		$nombreArch = ucwords($archivo);
		if ($nombreArch!="." && $nombreArch!=".."){

			$listarmodulos[] = $nombreArch; 

		}
	} 
	return $listarmodulos;
	closedir($directorio); 
}

function _antinyeccionSQL($valor) {
	$valor = str_ireplace("INSERT","",$valor);
	$valor = str_ireplace("DELETE","",$valor);
	$valor = str_ireplace("UPDATE","",$valor);
	$valor = str_ireplace("SELECT","",$valor);
	$valor = str_ireplace("COPY","",$valor);
	$valor = str_ireplace("DELETE","",$valor);
	$valor = str_ireplace("DROP","",$valor);
	$valor = str_ireplace("DUMP","",$valor);
	$valor = str_ireplace(" OR ","",$valor);
	$valor = str_ireplace("%","",$valor);
	$valor = str_ireplace("LIKE","",$valor);
	$valor = str_ireplace("--","",$valor);
	$valor = str_ireplace("^","",$valor);
	$valor = str_ireplace("[","",$valor);
	$valor = str_ireplace("]","",$valor);
	$valor = str_ireplace("\\","",$valor);
	$valor = str_ireplace("!","",$valor);
	$valor = str_ireplace("¡","",$valor);
	$valor = str_ireplace("?","",$valor);
	$valor = str_ireplace("=","",$valor);
	$valor = str_ireplace("&","",$valor);
	return $valor;
}

function _antiXSS($data)
{
        // Fix &entity\n;
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do
        {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

        // we are done...
        return $data;
}

?>
