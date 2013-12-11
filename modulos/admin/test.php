<!DOCTYPE html>
  <html>
  <head>
      
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title></title>
      <link rel="stylesheet" href="">
<!--       // <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
      // <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
      // <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script> -->
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script>
      function recibe(){
          jQuery("form[name='frmhann']" ).submit(function( event ) {
            event.preventDefault();
          });       
          // alert("hanntronico");

        }
      function validame () {
          if (document.frmhann.datos.value=="") {
            alert("llena el text");
            return false;
          }
          return  true;
        }    
    </script>
  </head>
  <body onload="recibe();" style="font-family:Verdana, Geneva, sans-serif; font-size:24px;"> 
    <a href="#" onclick="recibe(); return false;">FUCK</a>
    <form action="grab_compra.php" name="frmhann" method="post" onsubmit="return validame(this)"> 
      <fieldset style="width:60%;">
        <!-- <form action="test_submit" name="frmhann2" method="post" accept-charset="utf-8"> -->
          <input type="text" id="datos" size="45" name="datos" > 
        <!-- </form> -->
        
        <input type="button" onClick="recibe();" value="Enviar Datos" > 
        
        <div id="cuerpo"></div> 

      </fieldset>
    </form> 
  </body> 
</html>