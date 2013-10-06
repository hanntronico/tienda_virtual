
<?php include 'head.php'; ?>

<!-- <body class="withvernav" onload="cargare('productos.php?msn=p1');"> -->

<?php 
$strcarga = "";
if ($_GET['msn']=='p1') { 
    $strcarga = "cargare('productos.php?msn=p1')";
}
if ($_GET['msn']=='e1') { 
    $strcarga = "cargare('productos.php?msn=e1')";
}

if ($_GET['msn']=='s1') { 
    $strcarga = "cargare('subcategorias.php?msn=s1')";
}
if ($_GET['msn']=='es1') { 
    $strcarga = "cargare('subcategorias.php?msn=es1')";
}
if ($_GET['msn']=='e2') { 
    $strcarga = "cargare('subcategorias.php?msn=e2')";
}

if ($_GET['msn']=='c1') { 
    $strcarga = "cargare('categoria.php?msn=c1')";
}
if ($_GET['msn']=='ec1') { 
    $strcarga = "cargare('categoria.php?msn=ec1')";
}
if ($_GET['msn']=='ec2') { 
    $strcarga = "cargare('categoria.php?msn=ec2')";
}

?>


<body class="withvernav" onload="<?=$strcarga?>">

	<div class="bodywrapper">
		    
    <?php include 'topheader.php'; ?>
    <?php include 'header.php'; ?>
    <?php include 'menu_izq.php'; ?>
        
    <div class="centercontent">
      <div id="conte">

        <div class="pageheader">
          <h1 class="pagetitle">Panel de Administrador</h1>  
          <span class="pagedesc">Este es el panel de administración del sistema</span>
               
          <div id="logo" style="margin: 0px auto; text-align:center;">
            <img src="images/logo2.png" alt="">
          </div>
          <br><br><br><br>
        </div>

      </div><br>
    </div>
	</div>

</body>
</html>
