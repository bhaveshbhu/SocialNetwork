<?php
session_start();
include_once("scripts/checkuserlog.php");
$email=$_SESSION['useremail'];
$sql = mysql_query("UPDATE myMembers SET acc_type='$_POST[Type]'
      WHERE email = '$email'")
	       or die (mysql_error());
include("page/connect.php");
//$_SESSION['clg'] = 17;
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
if(strcmp($type, "Admin"))
{
	$q = "SELECT ".$type." FROM details WHERE CampID = ".$_SESSION['clg'];
	//echo $q;
	$res = mysql_query($q);
	$ro = mysql_fetch_array($res);
	$num = $ro[$type] + 1;
	$que = "UPDATE details SET ".$type." = ".$num." WHERE CampID = ".$_SESSION['clg'];
	//echo $que;
	$result = mysql_query($que);
	}
   if ($_POST['Type'] != "") 
   {
      header 
      ("Location: " . strtolower($_POST['Type']).".php");
   }
   else 
   {
   header ("Location: join_institute.php"); 
   }?> 