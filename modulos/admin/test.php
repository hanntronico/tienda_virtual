<html> 
    <head> 
    <script>
    var xmlhttp;
    function ajax(datos, ruta)
    {
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    // xmlhttp.onreadystatechange=function()
    //   {
    //   if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //     {
    //     document.getElementById("cuerpo").innerHTML=xmlhttp.responseText;
    //     }
    //   }
    xmlhttp.open("GET",ruta+datos,true);
    xmlhttp.send(null);
    }
   
    function recibe(){
            var dato = document.getElementById('datos').value;
            ajax("valor="+dato,"recibe.php?");
        }
    </script>
    </head> 
  
  <body style="font-family:Verdana, Geneva, sans-serif; font-size:24px;"> 
    <form method="post"> 
      <fieldset style="width:60%;">
      
        <input type="text" id="datos" size="45" name="datos" > 
        <input type="button" onClick="recibe();" value="Enviar Datos" > 
        <div id="cuerpo"></div> 

      </fieldset>
    </form> 
  </body> 
</html> 