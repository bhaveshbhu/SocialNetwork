
<?php
//echo $logOptions_id;
$sql1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$id' LIMIT 1"); 
while($row = mysql_fetch_array($sql1)){ 
    $friend_array = $row["friend_array"];
	}
$friendList = "";
$friendPopBoxList = "";
if ($friend_array  != "") { 
	$friendArray = explode(",", $friend_array);
	$friendCount = count($friendArray);
    $friendArray6 = array_slice($friendArray, 0, 4);
    $i = 0; // create a varible that will tell us how many items we looped over 
	foreach ($friendArray6 as $key => $value) { 
        $i++; // increment $i by one each loop pass 
		$check_pic = 'members/' . $value . '/image01.jpg';
		    if (file_exists($check_pic)) {
				$frnd_pic = '<a href="profile.php?id=' . $value . '"><img src="' . $check_pic . '" width="40px" border="0px"/></a>';
		    } else {
				$frnd_pic = '<a href="profile.php?id=' . $value . '"><img src="members/0/image01.jpg" width="40px" border="0px"/></a> &nbsp;';
		    }
			$sqlName = mysql_query("SELECT username, firstname, lastname FROM myMembers WHERE id='$value' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $friendUserName = substr($row["username"],0,12); $friendFirstName = substr($row["firstname"],0,12);$friendlname = substr($row["lastname"],0,12);}
			if (!$friendUserName) {$friendUserName = $friendFirstName;} // If username is blank use the firstname... programming changes in v1.32 call for this
		
				$friendList .= '<p><div width="100%" height="30px" style=" border-bottom: 1px solid lightgrey;">
                  <div  style=" width=13%; float:left; height:40px; overflow:hidden;"><a href="profile.php?id=' . $value . '" target="_self">' . $frnd_pic . '</a></div>
                    <div id="name" style="width:73%; display:inline; line-height:40px;"><a href="profile.php?id=' . $value . '" target="_self">' . $friendUserName. '</a> <a href="profile.php?id=' . $value . '" target="_self">' . $friendlname . '</a> </div>
                </div><p>';  
			
    }
} 
mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
#name{ background:transparent;}
#name:hover{ text-decoration: underline; font-weight:bold }
</style>
</head>
<body>
<div  id="myTable" width="100%" border="0" style="background-color: tranaparent; " align="center" cellpadding="0" cellspacing="0">
    <div style="margin-left:5px; margin-right:5px;">
       <?php echo "$friendList"; ?>
       </div>
    </div>
<br />
    <br />


</body>
</html>
