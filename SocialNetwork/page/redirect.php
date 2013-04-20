<?php
session_start();
//echo $_SESSION['clg'];
include("connect.php");
$tp = (string)$_POST["Type"];
if($tp === "Student")
	$type = "Student";
else if($tp === "Faculty")
	$type = "Faculty";
else if($tp === "AdminStaff")
	$type = "AdminStaff";
else if($tp === "Alumni")
	$type = "Alumni";
	//echo $type;
if(strcmp($type, "AdminStaff"))
{
	$q = "SELECT ".$type." FROM details WHERE CampID = ".$_SESSION['clg'];
	//echo $q;
	$res = mysql_query($q);
	$ro = mysql_fetch_array($res);
	$num = $ro[$type] + 1;
	$que = "UPDATE details SET ".$type." = ".$num." WHERE CampID = ".$_SESSION['clg'];
	//echo $que;
	$result = mysql_query($que);
	header("Location: ".$type.".php");
}
?>