<style type="text/css">


input.file {
height:100px;
margin-top:5px;
width:399px;
position: absolute;
text-align: right;
-moz-opacity:0 ;
opacity: 0;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
z-index: 2;}
input.file1 {
height:100px;
margin-top:5px;
width:399px;
position: absolute;
text-align: right;
-moz-opacity:0 ;
opacity: 0;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
z-index: 2;}
input.submit {
height:100px;
margin-top:5px;
width:399px;
position: absolute;
text-align: right;
-moz-opacity:0 ;
opacity: 0;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
z-index: 2;}

input.file1 {
	height:159px;
	margin-top:5px;
	width:102px;
	position: absolute;
	text-align: right;
-moz-opacity:0 ;
	opacity: 0;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
	z-index: 2;
	left: -77px;
	top: 617px;
}



</style>
			<div id="contentHeader">
			<h2>Avisos Clasificados</h2>
			</div> <!-- #contentHeader -->	
			<div class="container">  
			<div class="grid-17">
			<div class="widget">
      		<div class="widget-header"> 
			<span class="icon-user"></span>
			<h3>Publicar Producto</h3>
			</div>
			<div class="widget-content">
			<br />
 
<form enctype="multipart/form-data" name="formulario"  onsubmit="javascript:return validarForm(this);" action="dashboard.php?data=public" method="POST">
<center>
<center><B>Producto</B></center>
<input type="text" size="25"  placeholder="Nombre del Producto" name="producto" id="producto"/></br>

<center><B>T&iacute;tulo de publicaci&oacute;n</B></center>
<input type="text" size="25" name="titu"
onkeypress="return upperacase(e)" id="titu" placeholder="Titulo" onkeyup = "this.value=this.value.toUpperCase()"/></br>  

<center><B>Precio</B></center>
<input name="pre" type="text" id="pre"  size="25" placeholder="EJ: 1000"  onkeydown="return validarNumeros(event)"/></br>

<center><B>Cantidad</B></center>
<input name="cantidad" id="catidad" type="text" placeholder="EJ:1,2,3..."  onkeydown="return validarNumeros(event)" size="25"/></br>

<center><B>Tipo de Categor&iacute;a</B></center>
<select  id="tipo_prod" name="tipo_prod">
    <option value=""> </option>
    <option value="1">Inmuebles</option>
    <option value="2">Electronicos</option>
    <option value="3">Ropa, Calzado y Accesorios</option>
    <option value="4">Joyas</option>
    <option value="5">Gastronom&iacute;a</option>
    <option value="6">Reparaci&oacute;n e Instalaciones</option>
    <option value="7">Herramientas</option>
    <option value="8">Fiestas y Eventos</option>
    <option value="9">Belleza e Higiene Personal</option>
    <option value="10">Traslados y Env&iacute;os</option>
    <option value="11">Veh&iacute;culos</option>
    <option value="12">Construcci&oacute;n</option>
    <option value="14">Deportes y Fitness</option>
    <option value="13">Juegos y Juguetes</option>
    <option value="27">otros</option>
    </select></br>

<?php $fecha=date('j-m-Y'); ?>

<input name="fecha_publicacion" type="hidden" size="14" value="<?php echo $fecha;?>" reandoly />
 
<B><CENTER>Especificaci&oacute;n de tu Producto</CENTER></B>
<textarea id="tex_prod" name="tex_prod" id="text_prod" rows="10" cols="40"   class="tinymce"></textarea>
</CENTER>
<style> 
{font-weight: bold; color:red;} .mensaje {color:#030;} .listadoImagenes img {float:left;border:1px solid #ccc; padding:2px;margin:2px;} 
</style> 


<div class='error'> <center> El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</center></div>
<hr size="3px" width="40%" align="center" color="red"/>
<center>
  <h2>Seleccionar  im&aacute;genes</h2> 
</center>


 <input name="imagen" type="file"  id="imagen"style="margin-left:100px" />
 </br>
 <input name="imagen2" type="file"   id="imagen2"style="margin-left:100px" />
 </br>
 <input name="imagen3"  type="file"   id="imagen3" style="margin-left:100px" />


	</br>
	</center>
	<center>
    <div class="grid-17">
	  <input  type="submit"  class="btn btn-error"  onclick="javascript:check();" name="Publicar" id="publicar" value="Publicar" style="
    top: 30px;
    left: 30px; 
" />
</div></center>
    </p>
</form>
  </div> 
			<!-- .widget-content -->
			  </div> <!-- .widget -->  
		  </div> <!-- .grid -->
			
			<div class="grid-7">
		
			<div class="box">
					 <h3>Estimado, <?php echo $usuario_datos[1] . ' ' . $usuario_datos[2]; ?></h3>
                <p> En esta secci&oacute;n podras publicar  cualquier producto que te guste, para que otros usuarios puedan apreciar,ver y comunicarse con el vendedor.</p>
                <p>Todo Producto tendr&aacute; un plazo de tiempo de 15 d&iacute;as publicado. </p>
			</div><!-- .grid -->
			</div>
			</div>



<script type="text/javascript">
  google.load("jquery", "1");
  <!--validar solo numero-->
  function validarNumeros(e) { 
		tecla = (document.all) ? e.keyCode : e.which; 
		if (tecla==8) return true; 
		if (tecla==109) return true; 
    if (tecla==110) return true; 
		if (tecla==189) return true;
		if (e.ctrlKey && tecla==86) { return true}; 
		if (e.ctrlKey && tecla==67) { return true}; 
		if (e.ctrlKey && tecla==88) { return true}; 
		if (tecla>=96 && tecla<=105) { return true;} 
 
		patron = /[0-9]/;
 
		te = String.fromCharCode(tecla); 
		return patron.test(te); 
	}
	<!--codigo para solo mayuscula-->
	<!--onkeyup = "this.value=this.value.toUpperCase()"-->
</script>

<!-- Load TinyMCE -->
  <script language="javascript" type="text/javascript" src="/tinymce/jscripts/tiny_mce/tiny_mce.js"> </script>
  
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,",
		theme_advanced_buttons2 : "undo,redo,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,tablecontrols,|,hr,removeformat,|,sub,sup,|,charmap,advhr,|,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,
		// Example content CSS (should be your site CSS)
		content_css : "tinymce/css/content.css",
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "tinymce/lists/template_list.js",
		external_link_list_url : "tinymce/lists/link_list.js",
		external_image_list_url : "tinymce/lists/image_list.js",
		media_external_list_url : "tinymce/lists/media_list.js",
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],
		// Replace values for the template plugin		
	});
</script>
<!-- /TinyMCE -->




<script> 
Revisor=document.getElementById("imagen"); 
ContenedorNombre=document.getElementById("NombreArchivo"); 
Revisor.onchange=function() { 
ContenedorNombre.value=Revisor.value.replace(/fakepath/gi,"..");}
</script>

<script>
Revisor1=document.getElementById("imagen2"); 
ContenedorNombre1=document.getElementById("NombreArchivoo"); 

Revisor1.onchange=function() { 
ContenedorNombre1.value=Revisor1.value.replace(/fakepath/gi,"..");}
</script>

<script>
Revisor11=document.getElementById("imagen3"); 
ContenedorNombre11=document.getElementById("NombreArchivooo"); 
Revisor11.onchange=function() { 
ContenedorNombre11.value=Revisor11.value.replace(/fakepath/gi,"..");}
</script> 

<script> 
$(function() {
  $( "#datepicker" ).datepicker({  minDate: 0, 
  dateFormat: 'dd/mm/y',
  changeMonth: true,
   changeYear: true,
  
  });
});


</script>

<script>
function validarForm(formulario) {

  if(formulario.producto.value.length==0) { //¿Tiene 0 caracteres?
    formulario.producto.focus();    // Damos el foco al control
    alert('Debe ingresar el nombre de un producto'); //Mostramos el mensaje
    return false; //devolvemos el foco
  }

  if(formulario.titu.value.length==0) { //¿Tiene 0 caracteres?
    formulario.titu.focus();    // Damos el foco al control
    alert('Debe ingresar un titulo para su producto'); //Mostramos el mensaje
    return false; //devolvemos el foco
  }
 
  if(formulario.pre.value.length==0) { //¿Tiene 0 caracteres?
    formulario.pre.focus();    // Damos el foco al control
    alert('Ingrese el precio de su producto'); //Mostramos el mensaje
    return false; //devolvemos el foco
  }
  if(formulario.cantidad.value.length==0) { //¿Tiene 0 caracteres?
    formulario.cantidad.focus();    // Damos el foco al control
    alert('debe ingresar la cantidad de productos'); //Mostramos el mensaje
    return false; //devolvemos el foco
  }
  if(formulario.tipo_prod.value.length==0) { //¿Tiene 0 caracteres?
    formulario.tipo_prod.focus();    // Damos el foco al control
    alert('Debe ingresar una categoria'); //Mostramos el mensaje
    return false; //devolvemos el foco
  }
if(formulario.text_prod.value.length==0) { //¿Tiene 0 caracteres?
    formulario.text_prod.focus();    // Damos el foco al control
    alert('Debe describir su producto'); //Mostramos el mensaje
    return false; //devolvemos el foco
  }

else {
    return true;
  }
}


</script>
<script>
function check()
	  {
	     if (document.formulario.imagen.value == '')
                {
		 alert('Debe ingresar como minimo 3 imágenes');	
	  return false;	} 
 if (document.formulario.imagen2.value == '')
                {
		 alert('Debe ingresar como minimo 3 imágenes');	
	  return false;	} 
 if (document.formulario.imagen3.value == '')
                {
		 alert('Debe ingresar como minimo 3 imágenes');	
	  return false;	} 
	  else{
return true;}
	  }
</script>

        
