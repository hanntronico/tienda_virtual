    <div class="topheader">
        <div class="left">
            <h1 class="logo">SISTEMA DE <span>MERCADO VIRTUAL</span></h1>
            <!-- <span class="slogan">admin template</span> -->
            
<!--             <div class="search">
            	<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>
                </form>
            </div> --><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<div class="notification">
                <a class="count" href="ajax/noti.php"><span>
                    <?php 
                        include("conectar.php");
                        $link=Conectarse();
                        $rs=@mysql_query("set names utf8",$link);
                        $fila=@mysql_fetch_array($res);
                        $sql="SELECT count(*) FROM mensajes"; 
                        $res=@mysql_query($sql,$link);
                        $row1=@mysql_fetch_array($res);
                        echo $row1[0];
                     ?>
                </span></a>
        	</div>
            <div class="userinfo">
            	<img src="images/thumbs/admin.png" alt="" />
                <span>Administrador</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="images/thumbs/adminbig.png" alt="" /></a>
                </div><!--avatar-->
                <div class="userdata">
                	<h4>Administrador</h4>
                    <span class="email">ventas@grupochiappe.com</span>
                    <ul>
                    	<li><a href="editprofile.html">Editar cuenta</a></li>
                        <li><a href="accountsettings.html">Configuración</a></li>
                        <li><a href="salir.php">Salir</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
