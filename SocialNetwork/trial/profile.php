<?php session_start();?>

<?php $user_id=$_SESSION['user_id'];?>
<?php if($user_id=="")
	{	header('Location:try.htm');
	}
	 require_once 'function.php';
	include 'connect_to_mysql.php'; // Connect to the database 
	$cdquery="select* from client where user_id=$user_id ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $src=$cdrow[profilepic]; 
	
	
}?>
<html>
<head>
<title><?php echo "welcome ".$_SESSION['username']?></title>
<link rel="stylesheet" href="result.css" type="text/css" media="screen" />
</head>
<body id="body" height="1200">
<div id="header">
	<div id="logo"><img src="<?php echo $src?>">
	</div>
	<div id="greeting"> <?php echo "welcome ".$_SESSION['username']."  ...hiiii"?></div>
<div id="headerimage">
	</div>
	<div id="menu">
	<ul>
	<a href="profile.php"><li onMouseOver="document.getElementById('magic1').style.display='block'"onmouseout="document.getElementById('magic1').style.display='none'">home</li></a>
	<li><img src="devider.jpg" align="absmiddle" /></li>
	<a href="message.php"><li onMouseOver="document.getElementById('magic2').style.display='block'"onmouseout="document.getElementById('magic2').style.display='none'">message</li></a>
	<li ><img src="devider.jpg" align="absmiddle" /></li>
	<a href="users.php"><li onMouseOver="document.getElementById('magic3').style.display='block'"onmouseout="document.getElementById('magic3').style.display='none'"> users</li></a>
	<li><img src="devider.jpg" align="absmiddle" /></li>
	<a href="gallery.php"><li onMouseOver="document.getElementById('magic4').style.display='block'"onmouseout="document.getElementById('magic4').style.display='none'">gallery</li></a>
	<li><img src="devider.jpg" align="absmiddle" /></li>
	<a href="testi.php"><li onMouseOver="document.getElementById('magic5').style.display='block'"onmouseout="document.getElementById('magic5').style.display='none'">wire</li></a>
	</ul>
	</div>
		<div class="magic" id="magic1" style="position:absolute;left:453"></div>
		<div class="magic" id="magic2"style="position:absolute;left:626"></div>
		<div class="magic" id="magic3"style="position:absolute;left:813"></div>
		<div class="magic"id="magic4" style="position:absolute;left:988"></div>
		<div class="magic" id="magic5"style="position:absolute;left:1152"></div>
		

</div>
<div id="sidebar1">

<div class="updates">
<div class="division">updates</div>
<?php
include 'connect_to_mysql.php'; // Connect to the database

  $cdquery="select distinct content from status where user_id=$user_id  ORDER BY status_id DESC limit 5";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $status=$cdrow[content]; 
	$time=$cdrow[time];
		echo "<li>";
	echo $status;
	echo "<hr>";
	
}
 

?></div>
</ol>
</br>
</br>
<div class="updates">
<div class="division">fav links</div>
<?php
include 'connect_to_mysql.php'; // Connect to the database 

  $cdquery="select distinct content from links where user_id=$user_id  ORDER BY links_id DESC limit 5";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $link=$cdrow[content]; 
	$time=$cdrow[content];
		echo "<li>";
	echo $time ;
	echo "<hr>";
	
}
 

?></div>
</ol>

</div>
<div id="sidebar2">

<div class="updates">
<div class="division">friend request</div>
<?php
include 'connect_to_mysql.php'; // Connect to the database  

  $cdquery="select distinct content from status where user_id=$user_id  ORDER BY status_id DESC limit 5";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $status=$cdrow[content]; 
	$time=$cdrow[time];
		echo "<li>";
	echo $status;
	echo "<hr>";
	
}
 

?></div>
</ol>
</br>
</br>
<div class="updates">
<div class="division">notifications</div>
<?php
include 'connect_to_mysql.php'; // Connect to the database

  $cdquery="select distinct content from links where user_id=$user_id  ORDER BY links_id DESC limit 5";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $link=$cdrow[content]; 
	$time=$cdrow[content];
		echo "<li>";
	echo $time ;
	echo "<hr>";
	
}
 

?></div>
</ol>

</div>
<div class="share">
<ul>
<li><a href="update.php">update status</a></li>
<li><a href="link.php">share link</a></li>
<li><a href="image.php">upload image</a></li>
<li><a href="snap.php">change snap</a></li>
<li><a href="publick.php?id=<?php echo $user_id?>">visit profile</a></li>

</ul>
</div>
<div class="joint1" style="left:1025"></div>
<div class="joint1" style="left:1025;top:1140"></div>
<div class="joint1"></div>
<div class="joint1" style="top:1140">&copy ankur</br>http://www.fribler.com</br>ankur@fribler.com</div>
<div class="container" style="text-align:left">thanx for signing in my social network....hope u continue ...i will try my best to give new stuffs here...</br></br></br></br></br></div>



</form>
</div>
<div
<div style="position:absolute;right:60;top:40">
<a class="share" href="logout.php">logout</a></div>
<div id="suggession">
<div class="updates" style="top:0;height:100%">
<div class="division" style="height:25">people you may know</div>
<table width="100%" height="80%" border="1px">
<tr height="100%">
<?php
$i=0;
$cdquery="select * from client";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$max=mysql_num_rows($cdresult);  
               
while($i<4)
{	$r=rand(1,1+$max);
	$profilepic=profilepic($r);
	$user=user($r);
	echo "<td id'sugestion' width='25%' align='center' style='color:red'><a href='publick.php?id=$r'><img src=$profilepic height='50' title=$user></a> <a href='#' style='color:red'>   add</a></td>";
$i++;
}
?>
</tr>
</table>
</div>
</div>

</body>
</html>
