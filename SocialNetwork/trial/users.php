<?php require_once 'profile.php'; ?>
 <?php $user_id=$_SESSION['user_id'];?>

 <div class="container"><h2>**all users</h2>
 <table width="100%" border="3px">
 <tr>
 <?php
include 'connect_to_mysql.php'; // Connect to the database
  $cdquery="select * from client ORDER BY user_id DESC";
$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	$uid=$cdrow[user_id];
    $username=$cdrow[username]; 
	$hostel=$cdrow[hostel]; 
	$profilepic=$cdrow[profilepic]; 
	echo "<tr>";
	echo "<td align='center' width='33%'>";
	echo "<a href='publick.php?id=$uid'><img src=$profilepic id='image' height='100'></a> ";
	echo "</td>";
	echo "<td align='center' width='67%'>";
	echo "username: ".$username;
	echo "</br>";
	echo "hostel: ".$hostel;
	echo "</td>";
	echo "</tr>";
	
}
 ?>
 </table>
 </div>