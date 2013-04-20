<?php
include_once("scripts/checkuserlog.php");
?>
<?php
// DEAFAULT QUERY STRING
$queryString = "WHERE email_activated='1' ORDER BY id ASC";
$sql = mysql_query("SELECT id, username, lastname FROM myMembers WHERE email_activated='1' ORDER BY username ASC"); 
//////////////////////////////////// Adam's Pagination Logic ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($sql); // Get total of Num rows from the database query
$sql2 = mysql_query("SELECT id, username,lastname FROM myMembers WHERE email_activated='1' ORDER BY username ASC "); 
//////////////////////////////// END Adam's Pagination Logic ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Adam's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is not equal to 1, if it is only 1 page we require no paginated links to displa
///////////////////////////////////// END Adam's Pagination Display Setup ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Build the Output Section Here
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Description" content="Member Browsing" />
<meta name="Keywords" content="" />
<meta name="rating" content="General" />
<meta name="ROBOTS" content="All" /> 
<title>Browse Members</title>!-->
<style type="text/css">
#name{ background:transparent;}
#name:hover{ text-decoration: underline; font-weight:bold }
</style>
</head>
<body>
	
<div  id="myTable" width="100%" border="0" style="background-color: tranaparent; " align="center" cellpadding="0" cellspacing="0">
    <div style="margin-left:5px; margin-right:5px;">
       <?php echo "$outputList"; ?></td>
       </div>
    </div>
<br />
    <br />


</body>
</html>
