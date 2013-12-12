<?php session_start(); ?> 
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

if ($_GET['msn']=='d1') { 
    $strcarga = "cargare('productos.php?msn=d1')";
}

if ($_GET['msn']=='pr1') { 
    $strcarga = "cargare('proveedores.php?msn=pr1')";
}
if ($_GET['msn']=='epr1') { 
    $strcarga = "cargare('proveedores.php?msn=epr1')";
}

if ($_GET['msn']=='d1') { 
    $strcarga = "cargare('proveedores.php?msn=d1')";
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

if ($_GET['msn']=='m1') { 
    $strcarga = "cargare('marca.php?msn=m1')";
}
if ($_GET['msn']=='em1') { 
    $strcarga = "cargare('marca.php?msn=em1')";
}
if ($_GET['msn']=='em2') { 
    $strcarga = "cargare('marca.php?msn=em2')";
}

if ($_GET['msn']=='at1') { 
    $strcarga = "cargare('pedidos.php?msn=at1')";
}

if ($_GET['msn']=='dp1') { 
    $strcarga = "cargare('despacho.php?msn=dp1')";
}

if ($_GET['msn']=='et1') { 
    $strcarga = "cargare('facturacion.php?msn=et1')";
}

if ($_GET['msn']=='an1') { 
    $strcarga = "cargare('facturacion.php?msn=an1')";
}

if ($_GET['msn']=='rc1') { 
    $strcarga = "cargare('reg_compras.php?msn=rc1')";
}

if ($_GET['msn']=='rce1') { 
    $strcarga = "cargare('reg_compras.php?msn=rce1')";
}

if ($_GET['msn']=='u1') { 
    $strcarga = "cargare('usuarios.php?msn=u1')";
}
if ($_GET['msn']=='ue1') { 
    $strcarga = "cargare('usuarios.php?msn=ue1')";
}
if ($_GET['msn']=='ud1') { 
    $strcarga = "cargare('usuarios.php?msn=ud1')";
}

if ($_GET['msn']=='dpr1') { 
    $strcarga = "cargare('product2.php?msn=dpr1')";
}

if ($_GET['msn']=='dpr2') { 
    $strcarga = "cargare('product2.php?msn=dpr2')";
}

if ($_GET['msn']=='igv1') { 
    $strcarga = "cargare('productigv.php?msn=igv1')";
}

if ($_GET['msn']=='igv2') { 
    $strcarga = "cargare('productigv.php?msn=igv2')";
}

if ($_GET['msn']=='lq1') { 
    $strcarga = "cargare('liquidacion.php?msn=lq1')";
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
