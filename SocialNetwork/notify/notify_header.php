<?php
session_start();
include_once("../scripts/checkuserlog.php");
include('../scripts/connect_to_mysql.php');
?>
<?php
// DEAFAULT QUERY STRING
//$queryString = "WHERE email_activated='1' ORDER BY id ASC";
$sql = mysql_query("SELECT mem2 FROM notification WHERE view_status='0' && mem1='$logOptions_id'"); 
$n=mysql_num_rows($sql);
if($n!=0)
{
while($row1 = mysql_fetch_array($sql))
{
$id1 = $row1["mem2"];
$sql2 = mysql_query("SELECT username,lastname FROM myMembers WHERE email_activated='1' AND id='$id1' ORDER BY username ASC  LIMIT 5"); 
$outputList = '';
while($row = mysql_fetch_array($sql2))
{
$idlist =$id1;
	$username = $row["username"];
	$lastname = $row["lastname"];
	$check_pic = "members/$idlist/image01.jpg";
	$default_pic = "members/0/image01.jpg";
	if (file_exists($check_pic)) {
    $user_pic = "<img src=\"$check_pic\" width=\"40px\" border=\"0\" />"; // forces picture to be 120px wide and no more
	} else {
	$user_pic = "<img src=\"$default_pic\" width=\"40px\"  border=\"0\" />"; // forces default picture to be 120px wide and no more
	}
$outputList .= '
<div width="100%" height="30px" style=" border-bottom: 1px solid lightgrey;">
                  <div  style=" width=13%; float:left; height:40px; overflow:hidden;"><a href="profile.php?id=' . $idlist . '" target="_self">' . $user_pic . '</a></div>
<div id="name" style="width:73%; display:inline; line-height:40px;"><a href="profile.php?id=' . $idlist . '" target="_self">' . $username . '</a> <a href="profile.php?id=' . $idlist . '" target="_self">' . $lastname . '</a>  accepted your friend request </div>
</div>';
	
	}
	}
	}
	else
$outputList="You do no have any Updates this time";
mysql_close();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
#name{ background:transparent;}
#name:hover{ text-decoration: underline; font-weight:bold }
</style>
</head>
<body>
<div style="border-top: 1px solid black; border-bottom: 1px solid black;" >
 <div style="margin-left:5px; margin-right:5px;" >
 <?php echo "$outputList"; ?></td>
 </div></div>
  </body>
</html>
