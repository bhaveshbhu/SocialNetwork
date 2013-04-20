<?php
       session_start();
       //echo $_SESSION['ii'];
       $_SESSION[img] = $_GET['i'];
       include("connect.php");
       $qer = "SELECT fileName FROM images WHERE imageid = ".$_SESSION['img'];
       $rez1 = mysql_query($qer) or die(mysql_error());
        $ro = mysql_fetch_array($rez1);
        $_SESSION['bigp'] = $ro['fileName'];
        //echo $_SESSION['bigp'];
        header("Location: photo.php");
       ?>
  