<?php
session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Left Pane</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:1280px;
	height:397px;
	z-index:1;
	background-color:#00CC00
}
-->
</style>
</head>

<body>
<div id="Layer1">
<?php

//print_r($_SESSION);
$un = $_SESSION['id'];
echo "<h1>".$un."</h1>";
$con = mysql_connect("fribler.db.8559473.hostedresource.com","fribler","K33pW0rk!ng");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

//mysql_select_db("social", $con);
  else
  {
     //echo 'dbStore';
      mysql_select_db("fribler", $con);

	  $sql="select username from login where uid='$un' ";
	  $result1 = mysql_query($sql) or die(mysql_error());
	              $row1 = mysql_fetch_array($result1);
            $user=$row1["username"];

//$un = "Hello";
echo "<h2>".$un.' '.$user."</h2>";
}
?>
</div>
</body>
</html>
