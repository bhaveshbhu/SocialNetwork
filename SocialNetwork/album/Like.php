<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
session_start();
$con = mysql_connect("localhost", "root", "hellosql");
if (!$con)
{
     die('Could not connect: ' . mysql_error());
}
else
{
     mysql_select_db("try", $con);
     $imag = $_SESSION['img'];
     $que = "SELECT likes FROM images WHERE imageid = " . $imag;
     $result1 = mysql_query($que) or die(mysql_error());
     $row = mysql_fetch_array($result1);
     $l = $row['likes'] + 1;
     mysql_select_db("try", $con);
     $que1 = "UPDATE images SET likes = ".$l." WHERE imageid = ".$imag;
     $result2 = mysql_query($que1) or die(mysql_error());
     $row1 = mysql_fetch_array($result2);
     $_SESSION['like'] = $row1['likes'] = 1;
}
?>
</body>
</html>
