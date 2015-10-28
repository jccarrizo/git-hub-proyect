<?php 
if (array_pop(explode('/', $_SERVER['PHP_SELF']))!='dashboard.php') {header("Location: ../../dashboard.php");}
if (!in_array(ucwords(array_pop(explode('/', __dir__))), $usuario_permisos)) {
	notificar("Usted no tiene permisos para esta Seccion/Modulo", "dashboard.php?data=notificar", "notify-error");
	_wm($usuario_datos[3],'Acceso Denegado en: '.ucwords(array_pop(explode('/', __dir__))),'S/I');
} 
_wm($usuario_datos[3],'Registro de Egresos: '.ucwords(array_pop(explode('/', __dir__))),'Se ha registrado un Egreso con el codigo');
?>

<?php   
$user=$_GET['user'];
?>
<style type="text/css">
ul.baraja-container {
	width: 400px;
	height: 320px;
	margin: 0 auto 30px;
	position: relative;
	padding: 0;
	list-style-type: none;
	
}

ul.baraja-container li {
	width: 318px;
	height: 100%;
	margin: 0;
	position: absolute;
	top: 0;
	left: -18px;
	cursor: pointer;
	background: #fff;
	pointer-events: auto;
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	-ms-backface-visibility: hidden;
	-o-backface-visibility: hidden;
	backface-visibility: hidden;
	background-color: #FFFFFF;
	
}

.no-js ul.baraja-container {
	width: auto;
	height: auto;
	text-align: center;
}

.no-js ul.baraja-container li {
	position: relative;
	display: inline-block;
	width: 200px;
	height: 310px;
	margin: 10px;
}
.baraja-demo {
	width: 200px;
	margin: 30px auto;
	color: #aaa;
}

.no-js .baraja-demo {
	width: auto;
}

.baraja-demo h4 {
	color: #666;
	font-size: 14px;
	padding: 8px 10px 5px;
	margin: 20px 3px 5px;
	border-bottom: 1px solid #f0f0f0;
}

.baraja-demo p {
	font-size: 12px;
	font-weight: 700;
	padding: 0 10px;
	margin: 10px 3px 0;
}

.baraja-demo ul.baraja-container li {
	border-radius: 10px;
	padding: 5px;
	box-shadow: inset 0 0 0 1px rgba(0,0,0,0.08);
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.baraja-demo li img {
	display: block;
	margin: 0 auto;
	width: 100%;
	border-radius: 10px 10px 0 0;
}



.container {
	width: 100%;
	position: relative;
}



.actions {
	width: 100%;
	padding: 0 0 20px 0;
}

.actions span {
	box-shadow: 0 1px 1px rgba(0,0,0,0.2);
	background: #fff;
	color: #888;
	font-weight: 700;
	font-size: 12px;
	font-size: 1.2rem;
	text-align: center;
	display: inline-block;
	cursor: pointer;
	padding: 5px 10px;
	text-transform: uppercase;
	margin: 3px;
	border-radius: 3px;

}

.actions span:hover {
	background: #f7f7f7;
}

.actions span:active {
	background: #aaa;
	color: #fff;
	box-shadow: 0 1px 1px rgba(255,255,255,0.5);
}

.actions span.disabled {
	opacity: 0.8;
	color: #ddd;
}

#nav-prev, #nav-next {
	width: 30px;
	height: 30px;
	font-size: 18px;
	line-height: 20px;
}




</style>



<style type="text/css">
@charset "UTF-8";

.zebra caption{
	font-size:20px;
	font-weight:normal;
	background-repeat:no-repeat;
	background-position: 90px center;
	padding-top: 10px;
	height:30px;}

#container{
	padding-top:5px;
	width:780px;
	margin:0 auto;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
	width:90%;
	-webkit-box-shadow:  0px 2px 1px 5px rgba(242, 242, 242, 0.1);
    box-shadow:  0px 2px 1px 5px rgba(242, 242, 242, 0.1);
}

.zebra {
    border: 1px solid #555;
}

.zebra td {
    border-left: 1px solid #555;
    border-top: 1px solid #555;
    padding: 5px;
    text-align: center;    
}

.zebra th, .zebra th:hover {
    border-left: 1px solid #555;
	border-bottom: 1px solid #828282;
    padding: 5px;  
    background-color:#950000 !important;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#950000), to(#FF0000)) !important;
    background-image: -webkit-linear-gradient(top, #950000, #FF0000) !important;
    background-image:    -moz-linear-gradient(top, #950000, #FF0000) !important;
    background-image:     -ms-linear-gradient(top, #950000, #FF0000) !important;
    background-image:      -o-linear-gradient(top, #950000, #FF0000) !important;
    background-image:         linear-gradient(top, #950000, #FF0000) !important;
	color:#fff !important;
	font-weight:normal;
}
 
.zebra tbody tr:nth-child(even) {
    background: #FFFFFF !important;
	color:#000000;
}

.zebra tr:hover *{
    background: #B0B0B0;
	color:#000;
}

.zebra tr {
	background:#404040;
	color:#fff;
}
  </style>


		<script type="text/javascript" src="modules/clasificados/modernizr.custom.79639.js"></script>


<style> 
#div-idioma
{

display:inline;
}
.c{
	font-size:12px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.p {
	font-size:12px;
	color: #000000;
	border: 1;
	border-color: #000000;
	}
.t {
	font-size:12px;
	float:left;		
}
.d {
	font-size:15px;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	color: #000;
	padding-right:20px;
	}
.tit {
	font-size:10px;
	margin-bottom:0px;
	text-align:left;
	padding-left:10px;	
}

</style>
<form action="dashboard.php?data=abrirse" method="post" >

<!--<form action="inicio.php?op=141" method="get">-->
	<div id="contentHeader">
  <h2>Datos del Producto</h2>  
	</div>
	<div class="container">
	<div class="grid-24">
	<div class="widget">
    <div class="widget-header"> 
 <span class="icon-pin"></span>
								<h3>Producto Publicado</h3>
		</div>
		<div class="widget-content">
						<br />
				  
      	<?php 
		 
mysql_query("set names utf8");

$sql_inst_act=mysql_query(" SELECT *
FROM usuario_bkp
INNER JOIN clasificados_avisos
WHERE usuario_bkp.usuario_int = clasificados_avisos.usuario and (((clasificados_avisos.idaviso)=$user)); ");
    
while($row_inst_act=mysql_fetch_array($sql_inst_act)){
	$nombre=$row_inst_act["nombre"];
	$apellido=$row_inst_act["apellido"];
	$correo_principal=$row_inst_act['usuario_int'];
	$fecha_publicacion=$row_inst_act["fecha_publicacion"];
	$titulo=$row_inst_act["titulo"];
	$texto_aviso=$row_inst_act["texto_aviso"];
    $precio=$row_inst_act["precio"];
	$fotos=$row_inst_act["fotos"];
	$foto2=$row_inst_act["foto2"];
	$foto3=$row_inst_act["foto3"];
	
	
?>

   <?php 
	  
	  }
	  ?>
	  
	<div id="container">   

	<table class="zebra">
    <caption>Datos del Vendedor</caption>
		<thead>
        	<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Fecha publicaciòn</th>
				
            </tr>
		</thead>
        <tbody>  
        
            <tr>
           
            <tr>
            	<td><?php echo $nombre .' '. $apellido ;?></td>
                <td><?php echo $correo_principal.'@metrodemaracaibo.gob.ve'; ?></td>
                <td><?php echo $fecha_publicacion; ?></td>
                
            </tr>
            
        </tbody>
		
			</table>
</div>
    <div id="container">   

	<table class="zebra">
    <caption>Datos del Producto</caption>  
		<thead>

				<th>Titulo</th>
				<th>Precio</th>
				<th>Descripciòn</th>
				
            </tr>
		
    
    <tbody>
       
            <tr>
           
            <tr>
            	<td ><?php echo $titulo; ?></td>
                <td><?php echo $precio; ?></td>
                <td style="margin-bottom: 6px;"><?php echo $texto_aviso; ?></td>
                
            </tr>
            
        </tbody>
	</table>
</div>

	  
	  
	  <center>
	  <table style="color:#FF0000">
  </tr>
  <tr >
    <td></td>
    <td  align="center" height="89" class="p"><span class="d">
      <nav class="actions">
      <div align="center"><strong>
        <div class="baraja-demo">
          <ul id="baraja-el" class="baraja-container">
            <li><img style="width: 316px;
	height: 300px;" src="imagenes_clasificados/<?php echo $fotos;?>" alt="imagenes1"/> </li>
            <li><img style="width: 316px;
	height: 300px;" src="imagenes_clasificados/<?php echo $foto2;?>" alt="imagenes2"/></li>
            <li><img  src="imagenes_clasificados/<?php echo $foto3;?>" alt="imagenes3" style="width: 316px;
	height: 300px;"/> </li>
          </ul>
        </div>
        <center>
          <p>
            <nav class="actions light"> <span id="nav-prev">&lt;</span> <span id="nav-next">&gt;</span><br />
            </nav>
          </p>
          <p> <center>
           <B>Autorizar</B></p>
          <p>
            
  <B>SI</B>
  <input name="autorizar" type="radio" value="1" />
  <B>NO</B>
  <input name="autorizar" type="radio" value="2" />
  <input name="id" type="hidden" value="<?php echo $user;?>" />
  </br>
  </p>
          <p>
            <input type="submit" name="guardar"  class="btn btn-error" value="Procesar"/>            
                    </p>
           </center>
      </strong></div>
    </span></td>
  </tr>
</table> </center></center>



                    </div>
	</div>
</div>

</div>
</div>			
</form>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="modules/clasificados/jquery.baraja.js"></script>
        <script type="text/javascript">	
			$(function() {

				var $el = $( '#baraja-el' ),
					baraja = $el.baraja();

				// navigation
				$( '#nav-prev' ).on( 'click', function( event ) {

					baraja.previous();
				
				} );

				$( '#nav-next' ).on( 'click', function( event ) {

					baraja.next();
				
				} );

				// simple fan
				$( '#nav-fan' ).on( 'click', function( event ) {

					baraja.fan( {
						speed : 500,
						easing : 'ease-out',
						range : 90,
						direction : 'right',
						origin : { x : 25, y : 100 },
						center : true
					} );
				
				} );

				
			});
		</script>
		
