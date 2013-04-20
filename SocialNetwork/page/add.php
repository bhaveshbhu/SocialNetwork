<?php
session_start();
include("connect.php");
include("addNew.php");
$q = "SELECT * FROM info WHERE appr = 'y'";
$res = mysql_query($q);
while($row = mysql_fetch_array($res))
{
	$cid = $row['CampID'];
	$pres = 1;
	$que = "SELECT * FROM details WHERE 1";
	$resq = mysql_query($que);
	while($rowq = mysql_fetch_array($resq))
	{
		if($row['CampID'] == $cid)
		{
			$pres = 0;
			break;
		}
	}
	if($pres == 1)
	{
		$q1 = "SELECT FullName FROM info WHERE CampID = ".$cid;
		$res1 = mysql_query($q1);
		$row1 = mysql_fetch_array($res1);
		$q2 = "INSERT INTO details(Campus) VALUES('".$row1['FullName']."')";
		$res2 = mysql_query($q2);
		add($row1['FullName']);
	}
}
/*$q = "INSERT INTO details(Campus) VALUES('".$_POST['newCamp']."')";
//echo $q;
$res = mysql_query($q) or die(mysql_error());
$que = "SELECT CampID FROM details WHERE Campus = '".$_POST['newCamp']."'";
//echo $que;
$re = mysql_query($que) or die(mysql_error());
$row = mysql_fetch_array($re);
$_SESSION['clg'] = $row['CampID'];*/
?>