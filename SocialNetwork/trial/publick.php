<?php session_start();?>
<?php require_once 'function.php'; ?>
<?php $user_id=$_SESSION['user_id'];?>
<?php if($user_id=="")
	{	header('Location:try.htm');
	}
	  $uid=$_GET["id"] ;
	include 'connect_to_mysql.php'; // Connect to the database
   
	$cdquery="select* from client where user_id=$uid ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	
    $src=$cdrow[profilepic]; 
	$username=$cdrow[username]; 
	
}?>
<html>
<head>
<title><?php echo $username?></title>
<link rel="stylesheet" href="result.css" type="text/css" media="screen" />
</head>
<body id="body" height="1200">
<div id="header">
	<div id="logo"><img src="<?php echo $src?>">
	</div>
	<div id="greeting"> <?php echo $username ?></div>
		

</div>
<div id="sidebar1">

<div class="updates">
<div class="division">updates</div>
<?php


  $cdquery="select distinct content from status where user_id=$uid  ORDER BY status_id DESC limit 5";
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


  $cdquery="select distinct content from links where user_id=$uid  ORDER BY links_id DESC limit 5";
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
<div class="division">updates</div>
<?php
 

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
<div class="joint1" style="left:1025"></div>
<div class="joint1" style="left:1025;top:1140"></div>
<div class="joint1"></div>
<div class="joint1" style="top:1140">&copy ankur</br>http://www.fribler.com</br>ankur@fribler.com<a href="#review"><h1 title="reviews" onclick="document.getElementById('review').style.display='block'" style="color:red;font-size:50px">+</h1></a></div>
<div class="container" style="text-align:left">To start a conversation with me give me a message or send me a friend request to find any possible bug in network.........</br></br></br>
<hr style="color:red"><hr style="color:red">
<h2 align="right">**publick wall</h2>
<?php 
  $cdquery="select * from testi where to_id=$uid ORDER BY testi_id  desc limit 20";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	$from_id=$cdrow[from_id];
    $content=$cdrow[content];
	$time=$cdrow[time];	
	$name=user($from_id);
	$profilepic=profilepic($from_id);
	echo "<a href='publick.php?id=$from_id'><p style='color:red'><img src=$profilepic height='50'> from  ".$name."</p></a>";
	echo "<p><h5 align='left'>".$content."</br></h5></p>";
	echo "<hr>";
}
 ?>


</div>
<div style="display:none;position:absolute;left:18%;top:186%;width:15%" id="review"><form action="wall.php?id=<?php echo $uid ?>" method="post">
<textarea rows="3" cols="30" name="review" placeholder="POST ON WALL" style="width:100%;font-size:22px;
-moz-border-radius: 10px;
font-family:bold 'Lucida Casual', 'Comic Sans MS';
-webkit-border-radius: 10px;color:red"></textarea>
<input type="submit" value="send" onclick="document.getElementById('review').style.display='none'">

</form>
</div>
<?php 
function request()
{
header("location:profile.php");
}

echo "
<div class='request' style='right:45%'><a href='profile.php'>home</a>
</div>
<div class='request' ><a href='#'onclick='request()'>add friend</a>
</div>
<div class='request' style='right:15%'><a href='#' onclick=\"document.getElementById('review2').style.display='block'\">send message</a>
</div>
<div class='request' style='right:0%'><a href='#'>poke</a>
</div>
<div class=\"status\" style=\"display:none;left:32%;top:32%\" id=\"review2\"><form action=\"privatefromprofile.php?id=$uid \" method=\"post\">
<textarea rows=\"3\" cols=\"30\" name=\"review\" placeholder=\"hi...was up??\" style=\"width:100%;font-size:22px;
-moz-border-radius: 10px;
font-family:bold 'Lucida Casual', 'Comic Sans MS';
-webkit-border-radius: 10px;color:red\"></textarea>
<input type=\"submit\" value=\"send\" onclick=\"document.getElementById('review').style.display='none'\">

</form>
</div>";

?>
</body>
</html>
