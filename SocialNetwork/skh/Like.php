<?php 
session_start();
include("connect.php");
 mysql_select_db("fribler01", $con);
     $imag = $_SESSION['img'];
    /* $que = "SELECT likes FROM images WHERE imageid = " . $imag;
     $result1 = mysql_query($que) or die(mysql_error());
     $row = mysql_fetch_array($result1);
     $l = $row['likes'] + 1;
     mysql_select_db("fribler01", $con);*/
     $que1 = "UPDATE images SET likes=likes+1  WHERE imageid='$imag'";
     $result2 = mysql_query($que1) or die(mysql_error());
     //$row1 = mysql_fetch_array($result2);
     //$_SESSION['like'] = $l;
     header("Location: photo.php");
//}
?>

