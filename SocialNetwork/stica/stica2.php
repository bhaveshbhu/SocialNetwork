<?php  session_start();
	$fid=$_SESSION['id'];
require_once 'function.php';	
//include 'connectfribler.php' ;
include 'connect.php';

if (isset($_POST))
{ 	
	//$fid=$_REQUEST['sid'];
	$message=$_POST["message"];
//$message="hello 123";
	$type=$_GET["type"];
	$sto=$_GET["sto"];
	//$type='2';
	$to_id=$sto;
	$from_id=$fid;
	$viewdis=$_GET["viewid"];

if($message!="")
{
 MYSQL_QUERY(
		 "INSERT INTO  stica(from_id,to_id,content,type)".
		 "VALUES ('$from_id','$to_id','$message','$type')"
		 );
		 }
	}
?>
<head>
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> !-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script type="text/javascript" src="../../stica/jquery.timeago.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() { jQuery("abbr.timeago").timeago();});
$(document).ready(function(){
$(".close2").mouseover(function(){
// alert("hdj");
 $(this).animate({opacity:.2},"slow");
 });
 $(".close2").mouseout(function(){
// alert("hdj");
 $(this).animate({opacity:1},"slow");
 });
 
 $(document).ready(function(){
 $(".close2").click(function(){
var element = $(this).parent();
var I = $(this).attr("name");
var string = 'noteid='+ I ;

$.ajax({
	
   type: "POST",
   url: ("stica/delnote.php"),
   data: string,
   cache: (false),
   success: function(){
	element.slideUp('slow', function() {$(this).remove();});
	 }
   
 }); 

 });
 });
 });
 
 </script>
<style>
.stica{
position:relative;
width:160px;
height:auto;
border:1px solid grey;
padding-left:10px;
padding-right:00px;
padding-top:0px;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
-moz-box-shadow: 0 1px 2px #333;
-webkit-box-shadow: 0 1px 2px #333;
}
.stica hr{
	position:relative;
	width:80%;
	}
	#stica span{
	font-size:small;
	}
#form{
	position:absolute;
	left:100;
	top:100;
	width:200;
	height:150;
	border:1px solid red;
	}
#table{
		width:auto;
		height:100%;
		}
#bar
{
background-color:#5fbbde;
width:0px;
height:16px;
}
#barbox
{
float:left;
height:16px;
background-color:#FFFFFF;
width:100px;
border:solid 2px #000;
margin-right:3px;
-webkit-border-radius:2px;
-moz-border-radius:2px;
}
#count
{
float:left;
margin-left:8px;
font-family:'Georgia', Times New Roman, Times, serif;
font-size:16px;
font-weight:bold;
color:#666666
}		
#sidebar{
position:absolute;
top:0px;
right:0px;
width:180px;
height:auto;
wrap:no-wrap;
padding-left:3px;
padding-top:35px;
margin-top:2px;
}
#loading{
display:none;
}

#loading{
display:none;
}
.close2{
color:red;
}
a.close2:hover{
font-weight:bold;
font-size:12px;
}

	
	</style>
	</head>
	<body>
<div id="sidebar">
				<?php	if($viewid==$fid)
					{
					
				$toid=$fid;
				$cdquery="select * from stica where to_id=$toid ORDER BY time DESC ";
	$cdresult=mysql_query($cdquery) or die ("Query to get data failed in begining: ".mysql_error()); 
					}
					else 
					{
					$sent_from=$fid;
					$cdquery="select * from stica where from_id=$sent_from AND to_id=$viewdis ORDER BY time DESC ";
$cdresult=mysql_query($cdquery) or die ("Query for data failed in the end: ".mysql_error());        
					}           
while($cdrow=mysql_fetch_array($cdresult) )

  {	$noteid=$cdrow[stica_id];
    $content=$cdrow[content]; 
	$time2=$cdrow['time'];
	$time3=date( "Y-M-d H:i:s", strtotime($time2) + 45600 );
	$time=$time3;
	$uid=$cdrow[from_id];
	$type=$cdrow[type];
	include 'connectfribler.php' ;
	$sender=user($uid);
	$senderpic=profilepics2($uid);
	
	
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
	
		//echo "<li>";
	//echo "<div id=\"stica\">
	echo "		
	<div class=\"stica\" align='center' style=\"background-color:$color\" id=$noteid >
	<a style='font-size:11px; background:transparent;font-family: segoe print,tahoma, verdana, arial; width:15px; float:right; text-align:right; cursor:pointer; margin-right:5px; ' class=\"close2\" name='$noteid' >X</a>
		<div><b style='display:block;'>$sender</b><img src='$senderpic' style='width:25px; float:left; background:white; margin-right:5px;padding:1px;'/><p style='font-size:11px; font-family: segoe print,tahoma, verdana, arial; text-align:left;margin:2px; margin-left:3px; background:transparent;word-wrap:brea-word; width:155px;'>$content </p>
		</div>
		<p style='color:red;font-size:9px;margin-right:2px; margin-bottom:2px; text-align:right; margin-top:2px;'><abbr class='timeago' title='$time'></p>
		</div>";
	echo "</br>";
	}
	
	mysql_close();?>
	
		
	</div>
		
</body>