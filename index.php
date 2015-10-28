<?php
/* PROTECTOR DE SESION*********** */
require("conexiones_config.php");
session_start();
session_regenerate_id(true);
if (isset($_SESSION[MD5('usuario_datos' . $ecret)])) {
  header("Location: ./dashboard.php");
}
/* * ***************************** */
$disabledSubmit = 2;
$autoRevert = 1;
$autoSubmit = 2;
$js = 'disabledSubmit:false,autoRevert:true,autoSubmit:false';
require("variables_config.php");
if ($mantenimiento == '1') {
  echo'<img src="img/aplicacion_mantenimiento.png" style="width: 580px;" />';
} else {
  if (isset($_GET['o'])) {
    if (@isset($_POST['form_token'])) {
      if (@$_POST['form_token'] == @$_SESSION['form_token_mg']) {
        _bienvenido_mysql();
        $num_rows = 0;
        $email = $_POST['email'];
        $fecha_hora = date("Y/m/d H:i:s");
        $sql = "SELECT * FROM usuario_bkp where correo_principal ='" . $email . "';";
        $result = mysql_query($sql);
        if (!$result) {
          if ($SQL_debug == '1') {
            die('Error en Query - Respuesta del Motor: ' . mysql_error());
          } else {
            die('Error en Query');
          }
        }
        $reg = mysql_fetch_array($result);
        $num_rows = mysql_num_rows($result);
        if ($num_rows == 1) {
          $claved = generapass();
          $clave = md5($claved . $reg[3]);
          $sql = "UPDATE autenticacion SET clave = '".$clave."' WHERE cedula = '" . $reg[3] . "'";
          $result = mysql_query($sql);
          if (!$result) {
            if ($SQL_debug == '1') {
              die('Error en Query - Respuesta del Motor: ' . mysql_error());
            } else {
              die('Error en Query');
            }
          }
          _wm($reg[3], 'Recordando la Contraseña de Acceso', 'S/I');

          $mensajedelcorreo .= "<h3>HOLA, " . $reg[1] . " " . $reg[2] . "</h3>" . "<br />";
          $mensajedelcorreo .= "<h4>La regeneracion de su contraseña a sido un Exito!</h4>" . "<br />";
          $mensajedelcorreo .= "<br />";
          $mensajedelcorreo .= "Su nueva contraseña es: <b>" . $claved . "</b><br />";
          $mensajedelcorreo .= "<p>Para mayor informacion comuniquese con la Gerencia de Tecnologia de Información, División de Sistemas</p>" . "<br />";

          _enviarmail($mensajedelcorreo, $reg[1] . ' ' . $reg[2], $email, 'Recuperacion de Contraseña realizado con exito');

          alerta("Contraseña Generada y Enviada exitosamente a su correo corporativo (Principal)");
          ir("index.php");
        } else {
          _wm('null', 'Usuario no recuerda ni su correo', 'S/I');
          alerta("Correo no registrado en el sistema, verifiquelo e intente nuevamente o dirijase a Recursos Humanos");
          ir("index.php?o = 1");
        }
        mysql_close($conn_usuarios);
      } else {
        alerta("ERROR - Este Usuario NO está Registrado en el Sistema");
        ir('index.php');
      }
      unset($_SESSION['user_token_mg']); //PILAS! IMPORTANTE AL RENDERIZAR SE DEBE DE APAGAR LA VARIABLE DE SESION DE SEGURIDAD
    } else {
      ?>

      <!-- ----------------------------------------------------------------------- -->

      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns = "http://www.w3.org/1999/xhtml">
        <head>
          <meta charset = "utf-8">
            <title>Sistema de Control De Expedeintes</title>
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
              <meta name = "description" content = "">
                <meta name = "author" content = "">
                  <link rel = "shortcut icon" href = "src/images/favicon.ico">
                    <link href = "src/stylesheets/bootstrap3.min.css" rel = "stylesheet">
                      <link href = "src/stylesheets/bootstrap3.css" rel = "stylesheet">
                        <link href = "src/stylesheets/miresponsive.css" rel = "stylesheet">
                          <link rel = "stylesheet" href = "src/stylesheets/QapTcha.jquery.css" type = "text/css" />
                          <!--[if lt IE 9]>
                          <script src = "//html5shim.googlecode.com/svn/trunk/html5.js"></script>
                          <![endif]-->
                          <script src="src/javascripts/jquery-1.9.1.min.js"></script>
                          <script type="text/javascript" src="src/javascripts/jquery.js"></script>
                          <script type="text/javascript" src="src/javascripts/jquery-ui.js"></script>
                          <script type="text/javascript" src="src/javascripts/jquery.ui.touch.js"></script>
                          <script type="text/javascript" src="src/javascripts/QapTcha.jquery.js"></script>
                            <script type="text/javascript" src="src/javascripts/funciones.js"></script>
                          </head>
                          <body>
                            <div style="text-align:center;margin-bottom:30px;margin-left:10px;margin-top:70px"><img onclick="javascript:document.getElementById('usuario').value = 'JUAN.NAVA'; document.getElementById('clave').focus(); " style="width:280px;" src="src/images/logo678.png"></div>
                            <div class="container">
                              <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                  <div class="login-panel panel panel-default">
                                    <div class="panel-heading">
                                      <h3 class="panel-title" style="text-align:center;">AUTENTICACIÓN</h3>
                                    </div>
                                    <div class="panel-body">
                                      <form role="form" id="form_access" name="form_access" method="POST" action="#">
                                        <fieldset>
                                          <div class="form-group">
                                            <p>Recuperación de contraseña</p>
                                            <input autocomplete="off" class="form-control required" placeholder="Ej. joseperez@servidor.com" name="email" id="email" value="" autofocus>
                                              <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token_mg']; ?>" />
                                          </div>
                                          <div class="form-group">
                                            <div class="QapTcha" ></div>		
                                          </div>
                                        </fieldset>
                                        <input style="display:none; width:100%" id="go" class="btn btn-danger" type="submit" value="Enviar Correo de Recuperacion" />									
                                      </form>
                                    </div>	
                                  </div>
                                </div>
                              </div>
                            </div>
                            <script type="text/javascript" src="src/javascripts/QapTcha.jquery.js?<?php echo $anticache; ?>"></script>
                            <script type="text/javascript">
                                //agregar funcion para que cumpla con el qaptcha
                              $(document).ready(function(){
                                $('.QapTcha').QapTcha({<?php echo @$js;?>});
                              });
                            </script>
                          </body>
                          </html>

                          <!-- ----------------------------------------------------------------------- -->

                          <?php } } else { ?>
      <?php $_SESSION["form_token_mg"] = md5(rand(time(), true)); ?>

                          <!-- ----------------------------------------------------------------------- -->

                          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                          <html xmlns="http://www.w3.org/1999/xhtml">
                            <head>
                              <meta charset="utf-8">
                                <title>SCE MetroMaracaibo</title>
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                  <meta name="description" content="">
                                    <meta name="author" content="">
                                      <link rel="shortcut icon" href="src/images/favicon.ico">
                                        <link href="src/stylesheets/bootstrap3.min.css" rel="stylesheet">  
                                          <link href="src/stylesheets/bootstrap3.css" rel="stylesheet">			
                                            <link href="src/stylesheets/miresponsive.css" rel="stylesheet">			
                                              <link rel="stylesheet" href="src/stylesheets/QapTcha.jquery.css" type="text/css" />
                                              <!--[if lt IE 9]>
                                              <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
                                              <![endif]-->
                                              <script src="src/javascripts/jquery-1.9.1.min.js"></script>
                                              <script type="text/javascript" src="src/javascripts/jquery.js"></script>
                                              <script type="text/javascript" src="src/javascripts/jquery-ui.js"></script>
                                              <script type="text/javascript" src="src/javascripts/jquery.ui.touch.js"></script>
                                              <script type="text/javascript" src="src/javascripts/QapTcha.jquery.js"></script>
                                               <script type="text/javascript" src="src/javascripts/funciones.js"></script>
                                              </head>
                                              <body>
                                                <div style="text-align:center;margin-bottom:30px;margin-left:10px;margin-top:70px"><img onclick="javascript:document.getElementById('usuario').value = 'JUAN.NAVA'; document.getElementById('clave').focus(); " style="width:280px;" src="src/images/logo678.png"></div>
                                                <div class="container">
                                                  <div class="row">
                                                    <div class="col-md-4 col-md-offset-4">
                                                      <div class="login-panel panel panel-default">
                                                        <div class="panel-heading">
                                                          <h3 class="panel-title" style="text-align:center;">AUTENTICACIÓN</h3>
                                                        </div>
                                                          <div class="panel-body">
                                                          <form role="form" id="form_access" name="form_access" method="POST" action="bypass.php">
                                                            <fieldset>
                                                              <div class="form-group">
                                                                <input onkeypress="return esusuario(event)" autocomplete="off" class="form-control required" placeholder="Usuario" name="usuario" id="usuario" value="" autofocus />
                                                              </div>
                                                              <div class="form-group">
                                                                <input autocomplete="off" class="form-control required" placeholder="Contraseña" name="clave" id="clave" type="password" value="">
                                                              </div> 
                                                          
                                                              <div class="form-group">
                                                                <div class="QapTcha" ></div>		
                                                              </div>
                                                            </fieldset>
                                                            <input style="display:none; width:100%" id="go" class="btn btn-danger" type="submit" value="Aceptar" />									
                                                          </form>
                                                        </div>	
                                                      </div>
                                                    </div>
                                                  </div>
                                                
                                                  
                                                </div>
                                               
                                                <script type="text/javascript">
                                                    //agregar funcion java script para que cumpla con el Qaptcha
												  $(document).ready(function(){
													$('.QapTcha').QapTcha({disabledSubmit:true,autoRevert:true,autoSubmit:false});
												  });
												</script>

                                              </body>
                                              </html>

                                              <!-- ----------------------------------------------------------------------- -->

    <?php }
  }
  ?>
