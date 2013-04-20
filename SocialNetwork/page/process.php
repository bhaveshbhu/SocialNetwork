<?php
session_start();
include("connect.php");
$q = "INSERT INTO details(Campus, ShortName, Website, Motto, Est, Location, type, Phone, Dean, Director, Email, Area, adminID, appr) VALUES('".$_POST['newCamp']."', '".$_POST['short']."', '".$_POST['site']."', ".$_POST['motto'].", '".$_POST['estd']."', '".$_POST['loc']."', '".$_POST['typ']."', ".$_POST['phone'].", '".$_POST['dean']."', '".$_POST['dir']."', '".$_POST['email']."', '".$_POST['area']."', ".$_SESSION['id'].", 'n')";
//echo $q;
$res = mysql_query($q) or die(mysql_error());
$que = "SELECT CampID FROM info WHERE FullName = '".$_POST['newCamp']."'";
$re = mysql_query($que);
$ro = mysql_fetch_array($re);
$_SESSION['clg'] = $ro['CampID'];
header("Location: upload.html");
?>