<?php include '../funciones.php'; ?>
<ul class="notitab">
	<li class="current"><a href="#messages">Mensajes 
        <?php 
            include("../conectar.php");
            $link=Conectarse();
            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
            $sql="SELECT count(*) FROM mensajes ORDER BY 1 DESC LIMIT 0,5"; 
            $res=@mysql_query($sql,$link);
            $row1=@mysql_fetch_array($res);
            // echo $row1[0];
        ?>
        (<?=$row1[0]?>)</a></li>
<!--     <li><a href="#activities">Pedidos 
        <?php 
            // $rs=@mysql_query("set names utf8",$link);
            // $fila=@mysql_fetch_array($res);
            // $sql="SELECT count(*) FROM pedidos WHERE estado=1"; 
            // $res=@mysql_query($sql,$link);
            // $numpedidos = @mysql_num_rows($res);
            // // $row2=@mysql_fetch_array($res);
         ?>

        (<?=$numpedidos?>)</a></li> -->
</ul>
<div id="messages">
    <ul class="msglist">
        <?php 
            $rs=@mysql_query("set names utf8",$link);
            $fila=@mysql_fetch_array($res);
            $sql="SELECT * FROM mensajes ORDER BY 1 DESC LIMIT 0,5";
            $res=@mysql_query($sql,$link);
            while ($row3=@mysql_fetch_array($res)) { 
        ?>
        <li>
            <!-- <a href="messages.html"> -->

            <a href="#">
            	<span class="thumb"><img src="images/thumbs/avatar1.png" alt="" /></span>
                <span class="msgdetails">
                    <span class="name"><?=$row3[1]?></span>
                    <span class="msg"><?php echo extrae($row3[4], 35)." ...";?></span>
                    <span class="time">
                    <?php
                        $fec_liq = date("Y-m-d H:i:s");
                        echo interval_date($row3[3],$fec_liq);
                    ?>
                    </span>
                </span>
            </a>
        </li>
        <?php } ?>
<!--         <li>
            <a href="messages.html">
            	<span class="thumb"><img src="images/thumbs/avatar2.png" alt="" /></span>
                <span class="msgdetails">
                    <span class="name">Disidido Mohabal</span>
                    <span class="msg">adipisicing elit, sed do eiusmod tempor...</span>
                    <span class="time">Yesterday</span>
                </span>
            </a>
        </li>
        <li>
            <a href="messages.html">
            	<span class="thumb"><img src="images/thumbs/avatar3.png" alt="" /></span>
                <span class="msgdetails">
                    <span class="name">John Doe</span>
                    <span class="msg">Lorem ipsum dolor sit amet, consectetur...</span>
                    <span class="time">May 20</span>
                </span>
            </a>
        </li>
        <li>
            <a href="messages.html">
            	<span class="thumb"><img src="images/thumbs/avatar4.png" alt="" /></span>
                <span class="msgdetails">
                    <span class="name">Jane Phoebe</span>
                    <span class="msg">adipisicing elit, sed do eiusmod tempor...</span>
                    <span class="time">May 19</span>
                </span>
            </a>
        </li> -->
    </ul>

	<div class="msgbutton">
    	<a href="">Todos los mensajes</a>
        <a href="">Responder</a>
    </div><!--msgbutton-->
</div>

<!-- <div id="activities" class="activities" style="display: none"> -->
<!--     <ul class="actlist">
        <li class="user new">
            <div class="msg">
                <a href="">Justin Meller</a> added <a href="">John Doe</a> as Admin.
                <span>About an hour ago</span>
            </div>
        </li>
        <li class="call new">
            <div class="msg">
                You missed a call from <a href="">Porfirio</a>
                <span>Yesterday</span>
            </div>
        </li>
        <li class="calendar new">
            <div class="msg">
                <a href="">Katherine Kate</a> invited you in an event <a href="">Rock Party</a>.
                <span>Tuesday</span>
            </div>
        </li>
        <li class="settings">
            <div class="msg">
                <a href="">Jane Doe</a> updated her profile.
                <span>May 10</span>
            </div>
        </li>
        <li class="user">
            <div class="msg">
                <a href="">Jet Lee</a> is now following you.
                <span>May 9</span>
            </div>
        </li>
    </ul> -->
    <!-- <div class="msgbutton"><a href="">Ver todos los pedidos</a></div> -->
</div>