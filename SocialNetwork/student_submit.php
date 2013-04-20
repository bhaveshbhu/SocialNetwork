<?php  
session_start();
include_once("scripts/checkuserlog.php");
$email=$_SESSION['useremail'];
$q = "SELECT id FROM myMembers WHERE email = '".$_SESSION['useremail']."'";
$res = mysql_query($q);
$row = mysql_fetch_array($res);
$id = $row['id'];
//$admin_related = mysql_real_escape_string(implode(',', $_POST['admin_related']));
//$date = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
$sql = "INSERT INTO 
student(student_id,year_of_join,year_of_pass,school_name_10,year,tl_year,school_name_12,mobile,enroll_no,email) VALUES
    ('$id',
	'$_POST[year_of_join]',
	'$_POST[year_of_pass]',
	'$_POST[school_name_10]',
	'$_POST[year]',
	'$_POST[tl_year]',
	'$_POST[school_name_12]',
	'$_POST[mobile]',
	'$_POST[enroll_no]',
	'$email')";
mysql_query("UPDATE myMembers SET login_first='1' WHERE email='$email' LIMIT 1");	
	// session_start();
	 //{
	// $_SESSION['email_address'] = $_POST['email_address'];
//}
if(mysql_query($sql))
header("location: dashboard.php");
	// print "Done";?>