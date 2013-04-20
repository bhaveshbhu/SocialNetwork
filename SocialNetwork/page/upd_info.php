<?php
session_start();
include("connect.php");
$re = mysql_query("SELECT * FROM details WHERE CampID = ".$_SESSION['clg']);
$ro = mysql_fetch_array($re);
$fname = $ro['Campus'];
$bo = rename($fname.".xml", $_POST['camp'].".xml");
$q = "UPDATE details SET Campus = '".$_POST['camp']."', ShortName = '".$_POST['short']."', Website = '".$_POST['site']."', Motto = '".$_POST['mot']."', Est = ".$_POST['est'].", Location = '".$_POST['loc']."', Dean = '".$_POST['dean']."', Director = '".$_POST['dir']."', type = '".$_POST['typ']."', Phone = ".$_POST['phone'].", Email = '".$_POST['mail']."' WHERE CampID = ".$_SESSION['clg'];
//echo $q;
//echo $_SESSION['clg'];
$res = mysql_query($q) or die(mysql_error());
header("Location: main1.php?cid=".$_SESSION['clg']);
?>