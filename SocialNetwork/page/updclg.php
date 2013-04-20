<?php
session_start();
include("connect.php");
$que = "SELECT CampID FROM details WHERE Campus = '".$_POST["CampList"]."'";
$res = mysql_query($que);
$row = mysql_fetch_array($res);
//$_SESSION['clg'] = $row['CampID'];
include("../scripts/connect_to_mysql.php");
$q1 = "UPDATE myMembers SET CampID = ".$row['CampID']." WHERE id = ".$_SESSION['id'];
$_SESSION['clg'] = $row['CampID'];
$re = mysql_query($q1) or die(mysql_error());
header("Location: main1.php");
?>