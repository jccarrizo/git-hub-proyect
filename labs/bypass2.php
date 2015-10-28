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
      $cedula = $_POST["usuario"]; //_damecedula($usuario);
			$clave=md5($_POST['clave'].$cedula);
      $nuevaclave=md5($cedula.$cedula);
			$fecha_hora = date("Y/m/d H:i:s");

      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      
      //VERIFICO SI LE DOY DE BAJA
      //darle de baja    en caso que exista en autenticacion pero no en usuarios_bkp(NOMINA)

      $sql="";
      $sql.="SELECT a.usuario_int, b.cedula ";
      $sql.="FROM autenticacion b ";
      $sql.="LEFT JOIN usuario_bkp a ON b.cedula = a.usuario ";
      $sql.="WHERE b.cedula =".$usuario.";";
      $sql.=" AND b.habilitado = 1";
      $result = mysql_query ($sql);
      if(!$result){
				if ($SQL_debug=='1'){ die('Error en Consulta SAM1 - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Consulta SAM1');}
			}
      $num_rows = mysql_num_rows($result);
      $reg=mysql_fetch_array($result);
      if ($num_rows == 1) {
        if (($reg[0]==null) AND ($reg[1]!=null)) {
          $sql="UPDATE autenticacion SET habilitado = '0' WHERE cedula = $cedula";
          $result_baja = mysql_query ($sql);
          alerta('Su Usuario a sido dado de baja por favor comuniquese al departameto de Recursos Humanos del Metro de Maracaibo'); ir('http://intranet.metrodemaracaibo.gob.ve');
        }
      }
      
      //VERIFICO SI LE DOY DE ALTA 
      //darle de alta creando la contraseña por defecto como su cedula en caso que exista en usuario_bkp(nomina) pero no en autenticacion
      $sql="";
      $sql.="SELECT a.usuario_int, b.cedula ";
      $sql.="FROM usuario_bkp a ";
      $sql.="LEFT JOIN autenticacion b ON b.cedula = a.usuario ";
      $sql.="WHERE a.usuario_int =".$usuario.";";
      $sql.=" AND a.habilitado = 1";
      $result = mysql_query ($sql);
      if(!$result){
				if ($SQL_debug=='1'){ die('Error en Consulta SAM2 - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Consulta SAM2');}
			}
      $num_rows = mysql_num_rows($result);
      $reg=mysql_fetch_array($result);
      if ($num_rows == 1) {
        if (($reg[1]==null) AND ($reg[0]!=null)) {
          $result_baja = mysql_query ("INSERT INTO autenticacion (cedula,perfil,clave,habilitado) VALUE ('".$cedula."','19','".$nuevaclave."','1');");
          alerta('Usuario dado de alta, por favor intente nuevamente con su cedula como clave.'); ir('http://intranet.metrodemaracaibo.gob.ve/dashboard.php?data=bye');
        }
      }      
      
      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////
      
      
      $sql="";
      $sql ="SELECT ";
      $sql.="usuario_bkp.id_usuario, ";
      $sql.="usuario_bkp.nombre, ";
      $sql.="usuario_bkp.apellido, ";
      $sql.="usuario_bkp.usuario, ";
      $sql.="autenticacion.clave, ";
      $sql.="usuario_bkp.correo_corporativo, ";
      $sql.="usuario_bkp.correo_principal, ";
      $sql.="usuario_bkp.telefono, ";
      $sql.="usuario_bkp.habilitado, ";
      $sql.="usuario_bkp.usuario_int, ";
      $sql.="'disponible', ";
      $sql.="autenticacion.perfil, ";
      $sql.="perfiles.perfil AS perfil_nom, ";
      $sql.="perfiles.role AS role, ";
      $sql.="usuario_bkp.ubicacion_laboral ";
      $sql.="FROM ";
      $sql.="usuario_bkp ";
      $sql.="LEFT JOIN autenticacion ON autenticacion.cedula = usuario_bkp.usuario ";
      $sql.="LEFT JOIN perfiles ON autenticacion.perfil = perfiles.id ";
      $sql.="WHERE usuario_int ='".$usuario."' AND clave ='".$clave."'";
      $sql.=" AND usuario_bkp.habilitado=1;";
                                
      //alertadev($sql);

			$result = mysql_query ($sql);

			if(!$result){
				if ($SQL_debug=='1'){ die('Error en Agregar Registro - Respuesta del Motor: ' . mysql_error());	} else {die('Error en Agregar Registro');}
			}
      
			$reg=mysql_fetch_array($result);
			$num_rows = mysql_num_rows($result);
			if ($num_rows==1) {		
				$_SESSION[md5('usuario_datos'.$ecret)]=$reg;
        $_SESSION[md5('usuario_permisos'.$ecret)]=unserialize($reg['role']);
				_wm($usuario_datos[9],'Acceso Autorizado en la Intranet','S/I');
				alerta("ENTRE!");
			}		
			else {
				_wm('S/I','Acceso Denegado en la Intranet','S/I');
				alerta("Usuario o Clave Incorrectos, por favor verifique sus datos."); ir("index.php");
			}	
			_adios_mysql();
		}
		else{
			ir("index.php");
		}
	}
?>

