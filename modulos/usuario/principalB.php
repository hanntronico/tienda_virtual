<?php
session_start();
?>

<title>Ferreter&iacute;a NIETO S.A.C.</title>

<link rel="stylesheet" type="text/css" href="../../includes/templates/theme446/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="../../includes/templates/theme446/css/stylesheet_boxes.css" />
<link rel="stylesheet" type="text/css" href="../../includes/templates/theme446/css/stylesheet_css_buttons.css" />
<link rel="stylesheet" type="text/css" href="../../includes/templates/theme446/css/stylesheet_darkbox.css" />
<link rel="stylesheet" type="text/css" href="../../includes/templates/theme446/css/stylesheet_main.css" />
<link rel="stylesheet" type="text/css" href="../../includes/templates/theme446/css/stylesheet_tm.css" />
<link rel="stylesheet" type="text/css" media="print" href="../../includes/templates/theme446/css/print_stylesheet.css" />

<script type="text/javascript" src="../../includes/templates/theme446/jscript/jscript_jquery-1.4.min.js"></script>
<script type="text/javascript" src="../../includes/templates/theme446/jscript/jscript_jquery-ui.min.js"></script>
<script type="text/javascript" src="../../includes/templates/theme446/jscript/jscript_xdarkbox.js"></script>
<script type="text/javascript" src="../../includes/templates/theme446/jscript/jscript_zcarousel.js"></script>

<?php require("../../librerias/funciones.php");?>

<style type="text/css">
	#content, h1, h2, .product-col, .prod-info, .box, .tie, .tie2, .tie3, .image, .stock{ behavior:url(../../includes/templates/theme446/PIE.php)}
</style>



<!--[if lt IE 7]>
<div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative; z-index:5000' id="forie6"> 
	<div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'>
		<a href="#" onclick="document.getElementById('forie6').style['display'] = 'none'"><img src='../../includes/templates/theme446/ie6/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a>
	</div> 
	<div style='width: 740px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'> 
		<div style='width: 75px; float: left;'><img src='../../includes/templates/theme446/ie6/ie6nomore-warning.jpg' alt='Warning!'/></div> 
		<div style='width: 275px; float: left; font-family: Arial, sans-serif; color:#000'> 
			<div style='font-size: 14px; font-weight: bold; margin-top: 12px; color:#000'>You are using an outdated browser</div> 
			<div style='font-size: 12px; margin-top: 6px; line-height: 12px; color:#000'>For a better experience using this site, please upgrade to a modern web browser.</div> 
		</div>
		<div style='width: 75px; float: left;'>
			<a href='http://www.firefox.com/' target='_blank'><img src='../../includes/templates/theme446/ie6/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a>
		</div>
		<div style='width: 75px; float: left;'>
			<a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='../../includes/templates/theme446/ie6/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a>
		</div> 
		<div style='width: 73px; float: left;'>
			<a href='http://www.apple.com/safari/download/' target='_blank'><img src='../../includes/templates/theme446/ie6/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a>
		</div> 
		<div style='float: left; width: 73px;'>
			<a href='http://www.google.com/chrome' target='_blank'><img src='../../includes/templates/theme446/ie6/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a>
		</div>
		<div style='float: left;'>
			<a href='http://www.opera.com/' target='_blank'><img src='../../includes/templates/theme446/ie6/ie6nomore-opera.jpg' style='border: none;' alt='Opera'/></a>
		</div> 
	</div>
</div>
<![endif]-->



<!-- ========== IMAGE BORDER TOP ========== -->

<div class="main-width">

<!-- ====================================== -->


<!-- ========== HEADER ========== -->



    <div id="header">
		<div class="header-top">
			<div class="header-top-left">
				<div class="header-top-right">
					<div class="wrapper">
						<div class="logo">
							<!-- ========== LOGO ========== -->
								<a href="#"><img src="../../images/logo.gif" alt="" width="270" height="129" /></a>
							<!-- ========================== -->
						</div>
						<div class="alignright fright">
							<div class="search">
								<!-- ========== SEARCH ========== -->
												
                                <div>&nbsp;</div>
				
							  <!-- ============================ -->
							</div>

					  <div class="currencies">
								<!-- ========== CURRENCIES ========= -->
								<div>
										&nbsp;
								
								</div>
								
							<!-- ====================================== -->
							</div>
							<div class="clear"></div>
							<div class="nav-links">
								<!-- ========== NAVIGATION LINKS ========== -->
									<a href="../../index.php"><b><span class="nav-links-left-corner">Home</span></b></a>
								    <a href="../cerrarsesion.php"><span class="nav-links-right-corner">Log Out</span></a>  
								  
								<!-- ====================================== -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="cart">
				<!-- ========== SHOPPING CART ========== -->
								Mi carrito <br /><a href="#">0 items</a> 
				<!-- =================================== -->
			</div>
			<!-- ========== MENU ========== -->
			<div class="menu">									
        	    <div id="navEZPagesTop">
				<?php echo "<table border=1 width=780>
				             <tr>
							   <td>&nbsp;</td>
							   <td>&nbsp;</td>
							 </tr>
							 <tr>
							   <td>&nbsp;</td>
							   <td>Usuario en Sesion:<b>&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION["nom"]."</b></td>
							 </tr>
							 <tr>
							   <td>&nbsp;</td>
							   <td>Fecha de Acceso:<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION["facceso"]."</b></td>
							 </tr>
							 </table>";?>
				</div>

			</div>
			<!-- ========================== -->
		</div>
		<div class="header-bot">
			<div class="header-bot-left">
				<div class="header-bot-right">&nbsp;
									   
					<!-- ========== CATEGORIES TABS ========= -->
											<!-- ==================================== -->
				</div>
			</div>
		</div>
	</div>
    
<!-- ============================ -->


<div id="content">

<table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
	<tr>
    
				
            <td id="column-left" style="width:230px;">
				<div style="width:230px;">

<!--// bof: categories //-->
              <?php echo crearmenuzaso2("Operaciones Basicas");?>
              <?php //echo crearmenusito("Operaciones");?>
              
<!--// eof: categories //-->

<!--// bof: bannerbox //-->
        <div class="box" id="bannerbox" style="width:230px;">

            <div class="box-border">
				<div class="box-head">
					Sponsors				</div>
	
				<div class="box-body">
					<div id="bannerboxContent" class="sideBoxContent centeredContent">
                    <a href="#"><img src="../../images/banner5.jpg" alt="Free Shipping" title=" Free Shipping " width="230" height="250" /></a>
                    </div>				
                </div> 
			</div>
            
        </div>
<!--// eof: bannerbox //-->
                </div>
            </td>
            
			
		
            <td id="column-center" valign="top">
            
                <div class="cnolumn-center-padding">
                
                    <!--content_center-->
                
                
                        <!-- bof breadcrumb -->
                                                <!-- eof breadcrumb -->
                    
    
                        <!-- bof upload alerts -->
                                                <!-- eof upload alerts -->
    
                    
						<div class="centerColumn" id="loginDefault">

<h1 id="loginDefaultHeading">Sistema de Gestion de Pedidos - Ferreter&iacute;a NIETO S.A.C.</h1>

<div class="tie">
	<div class="tie-indent">
        <iframe src="../conteno.html" name="contenido" width="100%" height="500" frameborder=0></iframe> 
	    <div class="clear"></div>
	</div>
</div>

</div>                    
                
                	<div class="clear"></div>
                    
                    <!--eof content_center-->
                
                </div>

            </td>
			
		        
    </tr>
</table>
</div>


<!-- ========== FOOTER ========== -->


	<div id="footer">
		<!-- BOF- BANNER #5 display -->
				<!-- EOF- BANNER #5 display -->

		<div class="wrapper">
			<div class="fright">
				<!-- ========== COPYRIGHT ========== -->
				Copyright &copy; 2011 <a href="#" target="_blank">Tools Store</a>. Powered by 
                <a href="#" target="_blank">Hannsoft</a>
                <a href="#">Privacy Notice</a>
		
								<!-- =============================== -->
			</div>
			<div class="menu">
				<!-- ========== MENU ========== -->
								
							
								<!-- ========================== -->
			</div>
		</div>
		<!-- {%FOOTER_LINK} -->
	</div>	
				
<!-- ============================ -->



<!--bof- parse time display -->
<!--eof- parse time display -->



<!-- BOF- BANNER #6 display -->
<!-- EOF- BANNER #6 display -->




<!-- ========== IMAGE BORDER BOTTOM ========== -->

    </div>

<!-- ========================================= -->

<!--osc3.template-help.com -->


