<?php 
    include ("inc_seguridad.php");
    include("../conectar.php");
    $link=Conectarse();
    // $_SESSION["s_cod"]='Usuario actual'; 
    $usr=$_SESSION["s_cod"];  
    $solonom=$_SESSION["s_solonom"];
    $nomusu=$_SESSION["s_nombreC"];
 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>MERCADO VIRTUAL</title>
        <meta name="description" content="Sitio web de compras online">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
<!--    <link rel="stylesheet" href="css/main.css"> -->
        <link rel="stylesheet" href="../../css/estilos.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
         <script>window.jQuery || document.write('<script src="../../js/jquery-1.8.2.min.js">\x3C/script>')</script> 
        <script src="../../js/jquery.noconflict.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js" type="text/javascript"></script> 


        <script type="text/javascript">

            function enviar(producto)
            {
                if (confirm("Desea agregar el producto seleccionado a su canasta de compras?" ))
                {
                    location.href="addcarrito.php?id="+producto+"&sw=2";
                }
                return false;
            }

            function ver()
            {
                var posicion=document.getElementById('cbocateg').options.selectedIndex; //posicion
                var cod =document.getElementById('cbocateg').options[posicion].value;
                
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod.php?cod="+cod);
            }

            function ver_prod (scat) {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod.php?cod="+scat);
            }
            
            function ver_cat()
            {
                var posicion=document.getElementById('cbocateg').options.selectedIndex; //posicion
                var cod =document.getElementById('cbocateg').options[posicion].value;
                
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_subcat.php?cod="+cod);
            }


            function vertodos(id)
            {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_subcat.php?cod="+id);
            }

            function verpag(id,pag)
            {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_subcat.php?cod="+id+"&pag="+pag);
            }


            function salir()
            {
                if (confirm("Desea cerrar sesión?" ))
                {
                    location.href="salir.php";
                }
                return false;
            }

            function vercarrito() {
                var content = jQuery("#land");
                content.fadeIn('slow').load("vercarrito.php");
            }

            // jquery(document).ready(function(){
            //     //div donde se mostrará calendario debe estar oculto                       
            //     jquery('#calendario').hide();
            // });

            function update_calendar(){
                var month = jQuery('#calendar_mes').attr('value');
                var year = jQuery('#calendar_anio').attr('value');

                var valores='month='+month+'&year='+year;

                jQuery.ajax({
                    url: 'setvalue.php',
                    type: "GET",
                    data: valores,
                    success: function(datos){
                        jQuery("#calendario_dias").html(datos);
                    }
                });
            }
                
            function set_date(date){
                //input text donde debe aparecer la fecha
                jQuery('#fecha').attr('value',date);
                show_calendar();
            }

            function show_calendar(){
                //div donde se mostrará calendario
                jQuery("#calendario").toggle(); 
                // alert("Hola mundo");
            }


        </script>       
        
<!--    <script src="js/vendor/modernizr-2.6.2.min.js"></script> -->
    </head>