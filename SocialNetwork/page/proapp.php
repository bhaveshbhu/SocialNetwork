<?php
session_start();
include("connect.php");
$q = "SELECT * FROM details WHERE appr = 'n'";
$res = mysql_query($q) or die(mysql_error());
while($row = mysql_fetch_array($res))
{
	if($_POST[$row['CampID']] == "yes")
	{
		$qid = "UPDATE details SET appr = 'y' WHERE CampID = ".$row['CampID'];
		$resid = mysql_query($qid) or die(mysql_error());
	}
	else if($_POST[$row['CampID']] == "no")
	{
		$qid = "DELETE FROM details WHERE CampID = ".$row['CampID'];
		$resid = mysql_query($qid) or die(mysql_error());
	}
	else
	{
	}
}
header("Location: ../index1.php");
?>