<?php
	require("conexiones_config.php");
	
	session_start();
	if(isset($_SESSION[MD5('usuario_datos'.$ecret)])) {
		ir("dashboard.php");
	}
	else{
		if($_POST["usuario"] or $_POST["clave"]){
			_bienvenido_mysql();
			$num_rows = 0;
			$usuario=$_POST['usuario'];
     		 //$cedula = $_POST["usuario"]; //_damecedula($usuario);
			$clave=md5($_POST['clave'].$cedula);
      $nuevaclave=md5($cedula.$cedula);
			$fecha_hora = date("Y/m/d H:i:s");

      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      
      //VERIFICO SI LE DOY DE BAJA
      //darle de baja    en caso que exista en autenticacion pero no en usuarios_bkp(NOMINA)

     
      
      //VERIFICO SI LE DOY DE ALTA 
      //darle de alta creando la contraseña por defecto como su cedula en caso que exista en usuario_bkp(nomina) pero no en autenticacion
     
      
      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      
      
      
      $sql="";
      $sql ="SELECT ";
     $sql.="u.*, ";
      $sql.="p.* ";
      $sql.="FROM usuarios u ";
	  $sql.="LEFT JOIN perfiles p ON u.id_perfil=p.id_perfil ";
      $sql.="WHERE u.correo='".$usuario."' ";
      $sql.="AND u.clave='".$clave."';";
   

     

			$result = mysql_query ($sql);

			if(!$result){
				if ($SQL_debug=='1'){ die('Error en Agregar Registro - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Agregar Registro');}
			}
      
			$reg=mysql_fetch_array($result);
			$num_rows = mysql_num_rows($result);
			if ($num_rows==1) {		
				$_SESSION[md5('usuario_datos'.$ecret)]=$reg;
        $_SESSION[md5('usuario_permisos'.$ecret)]=unserialize($reg['role']);
        
        
        
				_wm($reg[3],'Acceso Autorizado Al SCE','S/I');
				ir("dashboard.php");
			}		
			else {
				_wm('S/I','Acceso Denegado Al SCE','S/I');
				alerta("Usuario o Clave Incorrectos, por favor verifique sus datos."); ir("index.php");
			}	
			_adios_mysql();
		}
		else{
			ir("index.php");
		}
	}
?>