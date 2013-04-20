<?php
session_start();
include("connect.php");
/*$q = "INSERT INTO details VALUES('".$_POST["CampList"]."', 0, 0, 0, 0)";
//echo $q;
$result = mysql_query($q) or die(mysql_error());*/
$query = "SELECT CampID FROM details WHERE Campus = '".$_POST["CampList"]."'";
//echo $query;
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$_SESSION['clg'] = $row['CampID'];
//echo $_SESSION['clg'];
header("Location: Page2.html");
?>