<?php
session_start();
include("../scripts/connect_to_mysql.php");
$q = "UPDATE myMembers SET CampID = ".$_SESSION['clg']." WHERE id = ".$_SESSION['id'];
$res = mysql_query($q);
header("Location: main1.php");
?>