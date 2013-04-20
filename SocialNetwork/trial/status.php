<?php session_start();?>
 <?php $user_id=$_SESSION['user_id'];?>
<?php 
include 'connect_to_mysql.php'; // Connect to the database
if (isset($_POST))
{ $status=$_POST["status"];
if($status!="")
{
 MYSQL_QUERY(
		 "INSERT INTO  status(user_id,content)".
		 "VALUES ('$user_id','$status')"
		 );
		 }
	}	

$link=$_POST["link"];
if($link!="")
{
 MYSQL_QUERY(
		 "INSERT INTO  links(user_id,content)".
		 "VALUES ('$user_id','$link')"
		 );
		 }
		 
		 
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
		 
		 
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg"))
&& ($_FILES["file"]["size"] < 2000000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

      move_uploaded_file($_FILES["file"]["tmp_name"],
      "image/" . $_FILES["file"]["name"]);
	  $image="image/".$_FILES["file"]["name"];
	  MYSQL_QUERY(
		 "INSERT INTO  images(user_id,src)".
		 "VALUES ('$user_id','$image')"
		 );
	  }
	}
 ?>
 <?php require_once 'profile.php'; ?>