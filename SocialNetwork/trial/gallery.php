<?php require_once 'profile.php'; ?>
 <?php $user_id=$_SESSION['user_id'];?>
 <div class="container"><h2>**my gallery</h2>
 <table width="100%" border="3px">
 <tr>
 <?php
include 'connect_to_mysql.php'; // Connect to the database
 
$i=0;
  $cdquery="select distinct src from images where user_id=$user_id  ORDER BY images_id DESC";
$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	$i+=1;
    $src=$cdrow[src]; 
	echo "<td align='center' width='33%'>";
	echo "<img id='image' src=$src style='position:relative' height='100' width:'60' border='10px' border-color='white'>";
	echo "</td>";
	if(($i%3)==0)
	{	echo "</tr>";
		echo "<tr>";
		}
	
	
}
 ?>
 </tr>
 </table>