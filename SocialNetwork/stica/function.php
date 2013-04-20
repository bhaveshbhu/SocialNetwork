 <?php
include 'connectfribler.php';
 //$username='you';
 function user($from_id)
	 {	
		$cdquery="select username from myMembers  where id='$from_id' ";
	 
	 $cdresult=mysql_query($cdquery) or die ("Query to get data from first table of username failed: ".mysql_error());                 
	while($cdrow=mysql_fetch_array($cdresult) )
	{
	$username=$cdrow['username'];
	 }
	return $username;
	 }
	 function profilepic($uid)
	 
	  {
		$default_picnote ='../../members/0/image01.jpg';
		$check_picnote ="members/$uid/image01.jpg"; 
		if (file_exists($check_picnote))
		{
					$user_picnote = $check_picnote; 
				} 
					else
				{
					$user_picnote = $default_picnote; 
				}
		/*$cdquery="select * from client  where user_id='$from_id' ";
	 
	 $cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
	while($cdrow=mysql_fetch_array($cdresult) ) 
	{
	$profilepic=$cdrow[profilepic];
	 }*/
	 return $user_picnote;
	 }
	 
	 function profilepics2($uid)
	 
	  {
		$default_picnote2 ='../../members/0/image01.jpg';
		$check_picnote2 ="../members/$uid/image01.jpg"; 
		if (file_exists($check_picnote2))
		{
					$user_picnote2 = $check_picnote2; 
				} 
					else
				{
					$user_picnote2 = $default_picnote2; 
				}
		/*$cdquery="select * from client  where user_id='$from_id' ";
	 
	 $cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
	while($cdrow=mysql_fetch_array($cdresult) ) 
	{
	$profilepic=$cdrow[profilepic];
	 }*/
	 return $user_picnote2;
	 }
	mysql_close();
	 ?>