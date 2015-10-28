	   
<script type="text/javascript">

$(document).ready(function() {

    $("#enviar-btn").click(function() {

        var name = $("input#name").val();
        var comment = $("textarea#comment").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

        var dataString = 'name=' + name + '&comment=' + comment;

        $.ajax({
            type: "POST",
            url: "addcomment.php",
            data: dataString,
            success: function() {
                $('#newmessage').append('<div><div><img width="48" height="48" src="images/user.png" /></div><div><strong>'+name+'</strong> dice:<br/><small>'+date_show+'</small></div><div>'+comment+'</div></div>');
            }
        });
        return false;
    });
});
</script>


<div id="contentHeader">
  <h2>Productos</h2>  
</div>
<div class="container">
  <div class="grid-24">
    <form class="deporte y juegos" action="#" method="post">
     <br />
    </form>
    <div class="widget widget-table">
      </div>  


<form method="post" action="">
    Nombre:<br/>
    <input type="text" id="name" name="name" size="40" /><br/><br/>
    Comentario:<br/>
    <textarea name="comment" id="comment" rows="6" cols="65"></textarea>
    <br/><br/>
    <div style="margin-left: 480px;"><input name="submit" type="submit" value="enviar" id="enviar-btn" /></div>
</form>



 </div>
    </div>
          
     </div>
    </div>
 


<link type="text/css" href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script> 
<script src="modules/daniel/JavaScript/functions.js" type="text/javascript"></script>