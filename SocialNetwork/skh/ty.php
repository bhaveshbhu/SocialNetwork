<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$usr = 1;//$_SESSION['uid'];
include("connect.php");
$q = "SELECT fileName FROM images WHERE uid = " . $usr;
$result4 = mysql_query($q) or die(mysql_error());
$row0 = mysql_fetch_array($result4);
$num_res = mysql_num_rows($result4);
echo $q."\n";
echo $row0['fileName'];

?> 


</body>
</html>
