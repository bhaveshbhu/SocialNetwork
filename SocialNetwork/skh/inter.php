<?php
session_start();

$que = "SELECT CampID FROM details WHERE Campus = '".$_POST["CampList"]."'";
$res = mysql_query($que);
$row = mysql_fetch_array($res);
$_SESSION['clg'] = $row['CampID'];
$q = "SELECT adminID FROM details WHERE CampID = ".$_SESSION['clg'];
$rez = mysql_query($q);
$ro = mysql_fetch_array($rez);
$admin = $ro['adminID'];
if($_SESSION['id'] == 
?>