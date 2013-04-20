<?php
session_start();
include_once("../scripts/checkuserlog.php");
include("../scripts/connect_to_mysql.php");
$sql2=mysql_query("SELECT id, username,lastname FROM myMembers WHERE email_activated='1' AND loggedin='1' AND id!='$logOptions_id' AND lastactivity > '".(time()-60)."'; ");

$outputList = '';
while($row = mysql_fetch_array($sql2)) { 

	$idlist = $row["id"];
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
                    
                    <div id="name" style="width:73%; display:inline; line-height:40px;"><a href="profile.php?id=' . $idlist . '" target="_self">' . $username . '</a> <a href="profile.php?id=' . $idlist . '" target="_self">' . $lastname . '</a> </div>
                  
                  </div>
				  
';
	
	
}
echo $outputList;


?>