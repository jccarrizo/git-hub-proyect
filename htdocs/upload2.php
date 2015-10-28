
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Intranet Metromara v3.0..</title>
<meta name ="author" content ="Norfi Carrodeguas">
<style type="text/css" media="screen">

</style>
</head>
<body>
<style>
.logi {
    position: absolute;
    top: 10px;
    margin-left: -4px;
    height: 35px;
    width: 100px;
}
div.mainHeaderLight {
    margin-bottom: 5px;
    border-bottom: 1px solid #ccc;
    height: 55px;
    overflow: visible;
}
.mainHeaderLight .nav {
    float: right;
    margin-top: 32px;
    margin-right: 3px;
}
.last {
    padding-top: 10px;
}
</style>
<div class="mainHeaderLight">

    <h1>
        <a href="http://www.metrodemaracaibo.gob.ve/" class="logi"></a>
    </h1>

   
</div>

<div class="ch-wizard">
    <div class="ch-box-container" style="margin: 0; padding: 0">
    <ol class="ch-wizard-breadcrumb ch-steps-five"><li class="ch-wizard-current ">Sube las fotos</li></ol>
    <div class="formContent">
        <fieldset>
            <legend>Fotos</legend>

            <div id="uploader">
                <div id="picsTable" class="ContFotosAgregar">
                    <p class="required">La foto debe ser JPG, JPEG, PNG o GIF (sin animaci&oacute;n) y debe pesar menos de 5 MB.</p>

                    <div id="PicMsgStatus">
                        <span class="picUploadError" id="itemPicsErrImg"></span> <span
                            class="picUploadError" id="itemPicsErrTxt"></span>
                    </div>
                    

                    
<div id="AgregarFoto1">
	<div class="fileLoading 1">
		<div class="dimmer"></div>
		<img src="imagenes/100.png"/>
		<input id="is_process_1" type=hidden
			name="is_process_1" value="false">
	</div>
	<div id="PicLoadedBorde1" class="picBorderOff">
		<img src="" id="imagePreview0" name="imagePreview0" class="imgPrev car angle" alt="Agregar foto" height="111" width="107" /> <a href="#">
			Imagen principal
		</a>
	</div>
	<div id="delete1" style="display: none;" class="deleteImg">
		
		<a href="javascript: performAction(0, 'picDelete')"
			title="Borrar foto 1" class="deleteThis">Borrar</a>
		
			<a id="aMoveF1"
				href="javascript: performAction(0, 'picMoveRight')"
				title="Mover a la derecha" style="display: none">
				> </a>
		
	</div>
<html>
	
	</div>
 
<div id="AgregarFoto2">
	<div class="fileLoading 2">
		<div class="dimmer"></div>
		<img src="imagenes/logi.jpg">
		<input id="is_process_2" type=hidden
			name="is_process_2" value="false">
	</div>
	<div id="PicLoadedBorde2" class="picBorderOff">
		<img src="imagenes/logi.png" id="imagePreview1" name="imagePreview1" class="imgPrev car angle" alt="Agregar foto" height="111" width="107" /> <a href="">
			Agregar foto
		</a>
	</div>
	<div id="delete2" style="display: none;" class="deleteImg">
		

			<a id="aMoveB2"
				href="javascript: performAction(1, 'picMoveLeft')"
				title="Mover a la izquierda"> < </a>
		
		<a href="javascript: performAction(1, 'picDelete')"
			title="Borrar foto 2" class="deleteThis">Borrar</a>
		
			<a id="aMoveF2"
				href="javascript: performAction(1, 'picMoveRight')"
				title="Mover a la derecha" style="display: none">
				> </a>
		
	</div>
</div>


<br></br>


<form enctype='multipart/form-data' action='jj.php' method='post'>
<input name='uploadedfile' type='file'><br>
<input type='submit' value='Subir archivo'>
</form>


 