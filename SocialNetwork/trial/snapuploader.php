<?php session_start();?>
 <?php $user_id=$_SESSION['user_id'];?>
<?php 
include 'connect_to_mysql.php'; // Connect to the database
  		 
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
	 $result = mysql_query("UPDATE client SET profilepic='$image' WHERE user_id='$user_id'") 
or die(mysql_error());  
	  }
	}
 ?>
 <?php require_once 'profile.php'; ?>