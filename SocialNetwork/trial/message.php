<?php require_once 'profile.php'; ?>
<?php require_once 'function.php'; ?>
 <?php $user_id=$_SESSION['user_id'];?>
 <div class="container"><h2>**messages</h2>
 <table width="100%" border="3px">
 <tr>
 <?php
include 'connect_to_mysql.php'; // Connect to the database

	$i=0; 
  $cdquery="select * from message  where to_id='$user_id' ORDER BY msg_id DESC";
$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $from_id=$cdrow[from_id];
	$content=$cdrow[content]; 
	$username=user($from_id);
	$profilepic=profilepic($from_id);
	echo "<tr>";
	echo "<td align='center' width='23%'>";
	echo "<a href='publick.php?id=$from_id'><img src=$profilepic id='image' height='50'></a> ";
	echo "</td>";
	echo "<td align='left' width='67%'>";
	echo "<p>FROM: ".$username;
	echo "</br>";
	echo "--> ".$content;
	echo "</br><a href='#review' style='text-decoration:underline' onclick=\"document.getElementById('review.$i').style.display='block'\">reply</a><a href='##' style='text-decoration:underline'>     delate</a>";
	echo "</td>";
	echo "</tr>";
	echo "</br></div>";
	echo "
	<div class=\"status\" style=\"display:none;left:18%;top:0\" id=\"review.$i\"><form action=\"private.php?id=$from_id \" method=\"post\">";
	echo " 
	
<textarea rows=\"3\" cols=\"30\" name=\"review\" placeholder=\"hi...was up??\" style=\"width:100%;font-size:22px;
-moz-border-radius: 10px;
font-family:bold 'Lucida Casual', 'Comic Sans MS';
-webkit-border-radius: 10px;color:red\"></textarea>
<input type=\"submit\" value=\"send\" onclick=\"document.getElementById('review.$i').style.display='none'\">

</form>
</div>";
$i++;	
}
 ?>
 </table>
 