<?php
session_start();
include("connect.php");
echo "<h1>This is the main frame.</h1>";
//include("connect.php"); 
    if(isset ($_SESSION['user']))
    {
    $qer = "SELECT fileName, imageid FROM images ORDER BY UploadDate LIMIT 1";
    $rez1 = mysql_query($qer) or die(mysql_error());
    $ro = mysql_fetch_array($rez1);
    $_SESSION['bigp'] = (string)$ro['fileName'];
	echo $_SESSION['bigp'];
    $_SESSION['img'] = $ro['imageid'];
	echo $_SESSION['img'];
    }
 else {
    header("Location: login.php");
}
    echo "<a href='photo.php' target='_top'>Photo Album</a>";
?>