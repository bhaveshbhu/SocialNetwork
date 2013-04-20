 <?php
 
 function user($from_id)
	 {	
		$cdquery="select * from client  where user_id='$from_id' ";
	 
	 $cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
	while($cdrow=mysql_fetch_array($cdresult) )
	{
	$username=$cdrow[username];
	 }
	return $username;
	 }
	 function profilepic($from_id)
	 {	
		$cdquery="select * from client  where user_id='$from_id' ";
	 
	 $cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
	while($cdrow=mysql_fetch_array($cdresult) )
	{
	$profilepic=$cdrow[profilepic];
	 }
	 return $profilepic;
	 }
	 ?>