<?php session_start();?>
 <?php $user_id=$_SESSION['user_id'];?>
<?php 
include 'connect_to_mysql.php'; // Connect to the database
 $review=$_POST["review"];
$name=$_SESSION['username'];
if($review!="")
{
		$uid=$_GET["id"] ;
 MYSQL_QUERY(
		 "INSERT INTO  message(to_id,from_id,content)".
		 "VALUES ('$uid','$user_id','$review')"
		 );
		 }
		   require_once 'publick.php';
		 ?>