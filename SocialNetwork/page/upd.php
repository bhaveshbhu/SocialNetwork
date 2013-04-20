<?php
session_start();
include("connect.php");
$q = "SELECT CampID from details WHERE Campus = '".$_POST['CampList']."'";
$res = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($res);
include("../scripts/connect_to_mysql.php");
$q1 = "UPDATE myMembers SET CampID = ".$row['CampID']." WHERE id = ".$_SESSION['id'];
$_SESSION['clg'] = $row['CampID'];
$re = mysql_query($q1) or die(mysql_error());
header("Location: main1.php?cid=".$_SESSION['clg']);
?>