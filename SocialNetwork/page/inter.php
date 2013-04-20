<?php
session_start();
include("connect.php");
$que = "SELECT CampID FROM details WHERE Campus = '".$_POST["CampList"]."'";
$res = mysql_query($que);
$row = mysql_fetch_array($res);
$_SESSION['clg'] = $row['CampID'];
$q = "SELECT adminID FROM details WHERE CampID = ".$_SESSION['clg'];
//echo $q;
$rez = mysql_query($q) or die(mysql_error());
$ro = mysql_fetch_array($rez);
$admin = $ro['adminID'];
echo $admin;
if($_SESSION['id'] == $admin)
{
	$_SESSION['ad'] = "Yes";
}
header("Location: update.php");
?>