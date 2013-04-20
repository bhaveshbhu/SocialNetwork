<?php
session_start();
include("connect.php");
$startDate = isset($_REQUEST["date3"]) ? $_REQUEST["date3"] : "";
$endDate = isset($_REQUEST["date4"]) ? $_REQUEST["date4"] : "";
$q = "INSERT INTO events(CampID, eventName, Start, End, phone, email, site, type) VALUES(".$_SESSION['clg'].", '".$_POST['name']."', ".$startDate.", ".$endDate.", ".$_POST['con'].", '".$_POST['email']."', '".$_POST['site']."', '".$_POST['type']."')";
$res = mysql_query($q) or die(mysql_error());
$que = "SELECT eventID FROM events WHERE eventName = '".$_POST['name']."'";
$re = mysql_query($que);
$row = mysql_fetch_array($re);
$_POST['eid'] = $row['eventID'];
header("Location: upEv.php");
?>