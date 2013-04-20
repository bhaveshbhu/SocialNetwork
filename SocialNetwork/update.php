<?php
session_start();
 include_once "scripts/connect_to_mysql.php";
//Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$username = $_POST['username'];
$lastname = $_POST['lastname'];
$sex = $_POST['gender'];
$movie= $_POST['movie'];
$food= $_POST['food'];
$sport= $_POST['sport'];
$place= $_POST['place'];
$bio=$_POST['bio'];
$love=$_POST['love'];
$country = $_POST['country'];	
$state = $_POST['state'];
$city = $_POST['city'];


$s10= $_POST['school_name_10'];
$s12= $_POST['school_name_12'];

$dept=$_POST['department'];

$mobile=$_POST['mobile'];
//$enroll=$_POST['enroll_no'];

$id = $_SESSION['id'];
$email = $_SESSION['useremail'];

	$sql = mysql_query("UPDATE myMembers SET username='$username',lastname='$lastname',gender='$sex',food='$food',sport='$sport',movie='$movie',place='$place',bio='$bio',love='$love',country='$country',state='$state',city='$city'
	 WHERE id='$id'")
	      or die (mysql_error());

$sql1 = mysql_query("UPDATE student SET school_name_10='$s10',school_name_12='$s12',department='$dept',mobile='$mobile'
	 WHERE email='$email'")
	      or die (mysql_error());

echo '1';


?>
