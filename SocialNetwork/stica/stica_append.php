<?php
include('../scripts/connect_to_mysql.php');
//echo $logOptions_id;
//$id5=$_POST['id'];
//$id='45';
$index=$_POST['index'];
require_once 'function.php'; 
	$fid=$_SESSION['id'];
	$viewid=$id;
?>
<?php
if($viewid==$fid)
					{
					include 'connect.php';
					//include 'connectfribler.php' ;
				$toid=$fid;
				$cdquery="select * from stica where to_id=$toid ORDER BY time DESC ";
	$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error()); 
					}
					else 
					{
					include 'connect.php';
					
					$sent_from=$fid;
					$cdquery="select * from stica where from_id=$sent_from AND to_id=$viewid ORDER BY time DESC ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());        
					}
						//$fromid=2;
				         
while($cdrow=mysql_fetch_array($cdresult) )
  {	
  $noteid=$cdrow['stica_id'];
    $content=$cdrow['content']; 
	$time2=$cdrow['time'];
	$time3=date( "Y-M-d H:i:s", strtotime($time2) + 45600 );
	$time=$time3;
	$uid=$cdrow['from_id'];
	$from_id=$uid;
	$type=$cdrow['type'];
	include 'connectfribler.php' ;
	$sender=user($from_id);
	$senderpic=profilepic($uid);
	switch ($type)
	{
	case 1:
	  $color='#FFCCCC';
	  break;
	case 2:
	 $color='LIGHTGREEN';
	  break;
	default:
	  $color='#FCFAB0';
	}
echo "
			
	<div class=\"stica\" align='center' style=\"background-color:$color\" id=$noteid >
	<a style='font-size:11px; background:transparent;font-family:segoe print,tahoma, verdana, arial; width:15px; float:right; text-align:right; cursor:pointer; margin-right:5px; ' class=\"close\" name='$noteid' >X</a>
		<div><b style='display:block;'>$sender</b><img src='$senderpic' style='width:25px; float:left; background:white; margin-right:5px;padding:1px;'/><p style='font-size:11px; font-family: segoe print,tahoma, verdana, arial; text-align:left;margin:2px; margin-left:3px; background:transparent;word-wrap:break-word; width:155px;'> $content </p>
		</div>
		<p style='color:red;font-size:9px; margin-right:2px;margin-bottom:2px; text-align:right; margin-top:2px;'><abbr class='timeago' title='$time'></abbr></p>
		</div>";
	echo "</br>"; 
	}
	mysql_close();?>