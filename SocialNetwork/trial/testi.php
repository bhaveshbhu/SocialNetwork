<?php require_once 'profile.php'; ?>
 <?php $user_id=$_SESSION['user_id'];?>
 <?php require_once 'function.php'; ?>

 <div class="container" style="text-align:left"><h2>**public wall</h2>
 <?php
include 'connect_to_mysql.php'; // Connect to the database 
$i=0;
  $cdquery="select * from testi where to_id=$user_id ORDER BY testi_id  desc limit 20";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	$from_id=$cdrow[from_id];
    $content=$cdrow[content];
	$time=$cdrow[time];	
	$name=user($from_id);
	$profilepic=profilepic($from_id);
	echo "<a href='publick.php?id=$from_id'><p style='color:red'><img src=$profilepic height='50'> from  ".$name."</p></a>";
	echo "<p><h5 align='left'>".$content."</br><a href='#' style='text-decoration:underline'>reply</a><a style='text-decoration:underline' href='##'>   delate</a></h5><h5 align='right'>".$time."</br></h5></p>";
	echo "<hr>";
}
 ?>

