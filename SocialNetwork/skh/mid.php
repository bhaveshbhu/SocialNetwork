<?php
session_start();
include("connect.php");
$sql1 = "SELECT uid FROM login WHERE username = '".$_POST["uname"]."'";
$result1 = mysql_query($sql1) or die(mysql_error());
$num_results = mysql_num_rows($result1);
$row1 = mysql_fetch_array($result1);
$asd=$row1['uid'];
session_id($asd);
//session_start();
$_SESSION['user'] = $_POST["uname"];
//$_SESSION['id'] = $asd;
header("Location: usrs.php");
?>