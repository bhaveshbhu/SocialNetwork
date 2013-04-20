<?php
session_start();
include_once("scripts/checkuserlog.php");	
?>	
<?php
mysql_connect("localhost","admin","bha2232308") or die (mysql_error());
mysql_select_db("fribler") or die (mysql_error());
$id=45;
?>
<?php

$sql1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$id' LIMIT 1"); 
while($row = mysql_fetch_array($sql1)){ 
    $friend_array = $row["friend_array"];
	}
	if ($friend_array  != "") 
{ 
$friendArray = explode(",", $friend_array);
$nof = count($friendArray);
	}
$sql2 = mysql_query("SELECT id, username,lastname FROM myMembers WHERE email_activated='1' AND acc_type='Student' ORDER BY username ASC ");
$nob=0;
while($row = mysql_fetch_array($sql2))
{
$nob=$nob+1;
}
?>
<?php
$id = "";
$username = ""; 
$firstname = "";
$lastname = "";
$mainNameLine = "";
$country = "";	
$state = "";
$user_pic = "";
$cacheBuster = rand(999999999,9999999999999);
if (isset($_GET['id'])) {
	 $id = preg_replace('#[^0-9]#i', '', $_GET['id']); // filter everything but numbers
} else if (isset($_SESSION['idx'])) {
	 $id = $logOptions_id;
} else {
   header("location: index1.php");
   exit();
}
// ------- FILTER THE ID AND QUERY THE DATABASE --------
$id = preg_replace('#[^0-9]#i', '', $id); // filter everything but numbers on the ID just in case
$act=1;
include("scripts/connect_to_mysql.php");
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
if($act==1){


while($row = mysql_fetch_array($sql))
{ 
    $username = $row["username"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$country = $row["country"];	
	$state = $row["state"];
	$city = $row["city"];
	$acc_type=$row["acc_type"];
	$email=$row["email"];
	$sex=$row["gender"];
	$interested_in=$row["interested_in"];
	
	$acc_type = $row["acc_type"];
	//$act=$row["email_activated"];
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "members/$id/image01.jpg"; 
	$default_pic = "members/0/image01.jpg";
	if (file_exists($check_pic))
	{
    $user_pic = "<img src=\"$check_pic\" width=\"120px\ height=\"120px\" />"; 
	} 
	else
	    {
	$user_pic = "<img src=\"$default_pic\" width=\"120px\ height=\"120px\" />"; 
	    }
		if ($firstname != "" && $lastname != "")
	{
        $mainNameLine = "$firstname $lastname";
		$username = $firstname;
	} else 
	{
		$mainNameLine = $username;
	}
  }
}
if($acc_type == "Student")
	{
	$sql = mysql_query("SELECT * FROM student WHERE email='$email' LIMIT 1");
	 while($row = mysql_fetch_array($sql))
      { 
    $yj = $row["tl_year"];
	$yp = $row["year"];

	$s10= $row["school_name_10"];

	$s12= $row["school_name_12"];
	//$firstname = $row["firstname"];
	//$lastname = $row["lastname"];
//$country = $row["country"];	
	//$state = $row["state"];
	//$city = $row["city"];
	//$acc_type=$row["acc_type"];
	  }
	}
	else if($acc_type=="Faculty")
	{
	}
	//else($acc_type=="alumni.php")
	//{
	//}

else
{
}
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
$time= date("g:i A");


$thisRandNum = rand(9999999999999,999999999999999999);
$_SESSION['wipit'] = base64_encode($thisRandNum); 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $username ?> profile</title>
	<link href="../css_files/buttons.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/init.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="notify/style.css" />
   <script src="notify/jquery.facebookBeeper.js" type="text/javascript"></script>
<script>
	/*
		 $(document).ready(function(){
			$(".group2").colorbox({rel:'group2', transition:"fade",width:"75%", height:"75%"});
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		}); */
		
	</script>
	<script type="text/javascript" >
var thisRandNum = "<?php echo $thisRandNum; ?>";
var friendRequestURL = "scripts/request_as_fav.php";
function addAsFav(a,b) 
{
$("#add_fav_loader").show();
	$.post(friendRequestURL,{ request: "requestFav", mem1: a, mem2: b, thisWipit: thisRandNum } ,function(data) {
	    $("#add_friend").html(data).show().fadeOut(12000);
    });	
}
function acceptFavRequest (x)
 {
	$.post(friendRequestURL,{ request: "acceptFav", reqID: x, thisWipit: thisRandNum } ,function(data) {
            $("#req"+x).html(data).show();
			$("#hiderequest").html(data).show().fadeOut(12000);
    });
}
function denyFavRequest (x) {
	$.post(friendRequestURL,{ request: "denyFav", reqID: x, thisWipit: thisRandNum } ,function(data) {
           $("#req"+x).html(data).show();
		   $("#hiderequest").html(data).show().fadeOut(12000);
    });
}
function removeAsFav(a,b) {
	$("#remove_friend_loader").show();
	$.post(friendRequestURL,{ request: "removeFav", mem1: a, mem2: b, thisWipit: thisRandNum } ,function(data) {
	    $("#remove_friend").html(data).show().fadeOut(12000);
    });	
}

 </script>
<!-- 
<script type="text/javascript" >
var thisRandNum = "<?php echo $thisRandNum; ?>";
var favRequestURL = "request_as_fav.php";
function addAsFav(a,b) {
	$.post(favRequestURL,{ request: "requestFav", mem1: a, mem2: b, thisWipit: thisRandNum },function(data) {

	    if(data==1) {
alert("ghhhhh");
}
	    
    });	
}
$(document).ready(function(){
$("#pub").click(function(){
$("#public").fadeIn();
$("#personal").hide();
});
$("#per").click(function(){
$("#personal").fadeIn();
$("#public").hide();
});
$('#submit_btn').click(function () {	

var fname = $('input[name=fname]');
var data = 'fname=' + fname.val()

//$('.loading').show();

	$("#form_content").html("<center><img src='../../images/loading1.gif'  /></center>");
	
	
		//start the ajax
		$.ajax({
			//this is the php file that processes the data and send mail
			url: "update.php",	
			
			//GET method is used
			type: "POST",

			//pass the data			
			data: data,		
			
			//Do not cache the page
			cache: false,
			
			//success
			success: function (html) {				
				//if process.php returned 1/true (send mail success)
				if (html==1) {					
					//hide the form		
					
					$("#sub_body").load("acc_update.php");  
					//show the success message
					//$("#message").html("Account Updated");
					//$("#message").fadeIn('slow');
					//$('.done').fadeIn('slow');
				//if process.php returned 0/false (send mail failed)
				} 				
			}		
		});
		
		//cancel the submit button default behaviours
		return false;
	
	
	});
});
</script>
!-->
	 <style type="text/css">
	 body{
margin:0;
padding:0;
line-height: 1.5em;
font-size:11px;
font-family: tahoma, verdana, arial;
background: url(images/hbar.jpg);
background-repeat:repeat-x;
background-attachment:fixed;

}

.helper
{ background-color: transparent;
  padding: 0px;
  width:20px;
  height:20px;
 }
.as{
            margin-top: 0px;
            margin-left: 0px;
            position:absolute;
            top: 0px;
            left: 0px;
            }
            .pp{
            top: 120px;
            max-height:40px;
            max-width:40px;
            }
            .ad1{
            max-height:30px;
            max-width:37px;
            position:relative;
            top: 0px;
            left: 35px;
            }
            .ad2a{
            max-height:100px;
            max-width:100px;
            position:relative;
            }
             body
            {
                background-image: url(images/hbar.jpg);
                background-repeat:repeat-x;
                margin-top: 0px;
                margin-left: 0px;
                margin-right: 0px;
                border:0px;
                font-weight:bold;
            }
			#maincontainer1{
				width: 1280px; /*Width of main container*/
				margin: 0 auto; /*Center container on page*/
				
				background-repeat:repeat-x;
							}
            #td1{
            nowrap;
            border:1px solid #cccccc;
            border-bottom:0px;
            border-right:0px;
			}
			.td1{
            nowrap;
            border:1px solid 'lightGrey';
            border-bottom: 1px solid 'lightGrey';
            border-right:1px solid 'lightGrey';
						
			}
			.dim
{
width: 150px;
height: 119px
}
			.td2{
            nowrap;
            border:1px solid #cccccc;
            border-bottom:0px;
            border-right:0px;
			border-color: transparent;
            }

            span{
            background-color: lightblue;
            padding:5px;
            }
            .upic
            {
            padding-left:38px;
            padding-right:38px;
			height:40px;
			weight:40px:
            }
            .d1{
            nowrap;
            border:1px solid #CCCCCC;
            border-bottom:0px;
            border-left: 0px;
            border-right: 0px;
            }
            a{
            text-decoration:none;
            color:black;
            }
            #am{
            margin-left: 0px;
            background-color:#e0e0e0;
			border-color: solid white;
			border:1px;
			font-family: tahoma, verdana, arial;
			font-size:11px;
			font-weight:bold;
			
               }
            #qq{
            text-indent:16px;
            color: #3B5998;
            }
            #ff{
            background-color: #e1e2e1;
			font-family: tahoma, verdana, arial;
			border-color: Grey;
			font-weight:bold;
            }
            #de
			{
            text-align:left;
			float:right;
            }
            li {
            background-color:#00CC00;
            float: left;
            padding-right: 30px;
            padding-left: 30px;
            border-right:2px solid white;
            }
            ul {
            position:absolute;
            list-style-type: none;
            margin:0px; 
            padding:0px;
            width:850px;
            }
			.clear { /* generic container (i.e. div) for floating buttons */
					overflow: hidden;
					width: 100%;
					}

			a.button {
					background: transparent url('images/button.png') no-repeat scroll top right;
					color: #444;
					display: block;
					float: right;
					font: normal 12px arial, sans-serif;
					height: 24px;
					margin-right: 6px;
					padding-right: 16px; /* sliding doors padding */
					text-decoration: none;
					}
			a.button span {
					background: transparent url('images/button.png') no-repeat;
					border-style:solid;
					border-width:1px;
					border-color:black;
					display: block;
					line-height: 14px;
					padding: 5px 0 5px 18px;
					} 
					a.button:hover {
					background-position: 0 -52px;
					} 
				a.button:active {
					background-position: bottom right;
					color: #000;
					outline: none; /* hide dotted outline in Firefox */
					}
					a.button:active span {
					background-position: bottom left;
					padding: 6px 0 4px 18px; /* push text down 1px */
					} 

					
		#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:black;
  display:none;
}				
                       #dialog{
					   position:absolute;
			            background-color:white;
			            display:none;
                        order:5px solid red;
                        height:200px;
                        width:200px;
                        z-index:9999;
						 -webkit-box-shadow: 0 2px 4px green, green 0px 0px 10px inset;
                         -moz-box-shadow: 0 2px 4px green, green 0px 0px 10px inset;

			}

b{font-size: 110%;}
em{color: red;}

#maincontainer{
width: 1240px; /*Width of main container*/
margin: 0 auto; /*Center container on page*/


}

#topsection{

height: 39px; /*Height of top section*/
background-image: url(images/hbar.jpg);
width:1240px;
position:fixed;
z-index:5;
}

#topsection h1{
margin: 0;
padding-top: 10px;
width:1024px;

}

#contentwrapper{
float: left;
width: 100%;
margin-top:40px;
}

#contentcolumn{
margin: 0 190px 0 180px; /*Margins for content column. Should be "0 RightColumnWidth 0 LeftColumnWidth*/
float: left;
width:810px; /*Width of left column in pixel*/

background: Transparent;

border-right:1px solid grey;
height: 100%;
}

#leftcolumn{
float: left;
width: 190px; /*Width of left column in pixel*/
margin-left: 10px; /*Set margin to that of -(MainContainerWidth)*/
background: Transparent;
margin-top:0px;
border-right:1px solid lightGrey;
height: 100%;
position:absolute;
}
#content{
float: left;
width: 810px; /*Width of left column in pixel*/
margin-left: 210px; /*Set margin to that of -(MainContainerWidth)*/
background: Transparent;
margin-top:0px;
height: 100%;
border-right: 1px solid lightgrey;
z-index:2;
}

#rcentercolumn{
float: right;
width: 250px; /*Width of right column*/
margin-right: 10px; /*Set left margin to -(RightColumnWidth)*/
background: transparent;
margin-top:0px;
height: auto;
z-index: -1;

}
#rightcolumn{
float: right;
width: 205px; /*Width of right column*/
background: transparent;
margin-top: 0px;

height: 100%;
position:fixed;
margin-left:1020px;
max-height:800px;
overflow-y:auto;
overflow-x:hidden;
}
}
#footer{
clear: left;
width: 100%;
background: lightGrey;
color: #FFF;
text-align: center;
padding: 4px 0;
}

#footer a{
color: #FFFF80;
}

.innertube{
margin: 10px; /*Margins for inner DIV inside each column (to provide padding)*/
margin-top: 0;
}
.innertube1{
margin: 0px; /*Margins for inner DIV inside each column (to provide padding)*/
margin-top: 0;
height:38px;
}
#add_fav_loader {
	display:none;
}

<!--/* Accodion menu css*/ !-->
.accordionButton {      
   width: auto;
   float: left;
   border-bottom: 1px solid #FFFFFF;
   cursor: pointer;
   height:30px;
   padding:6px 0 0 5px;
   text-align: left;
   
}

.accordionContent {     
   width: 178px;
   float: left;
   background: #FFFFFF;
   border-bottom:1px solid lightblue;
   border-left:1px solid lightblue;
   padding: 1px 0 1px 1px;
   text-align:left;
}
  
  .on {
   font-weight:bold;
}

.status {
   float:left; 
   padding-right:10px;  
   padding-top: 0px;
    padding-left: 0px;
    padding-bottom: 0px;
    padding-right: 0px;
    width: 16px;
	text-align: center;
"
}

<!-- for popup box !-->

.overlay{
    background:transparent url(images/overlay.png) repeat top left;
    position:fixed;
    top:0px;
    bottom:0px;
    left:0px;
    right:0px;
    z-index:1000;
}
.box{
            position:fixed;
            top:-200px;
            left:30%;
            right:30%;
            background-color:#fff;
            color:#7F7F7F;
            padding:20px;
            border:2px solid #ccc;
            -moz-border-radius: 2px;
            -webkit-border-radius:2px;
            -khtml-border-radius:2px;
            -moz-box-shadow: 0 1px 5px #333;
            -webkit-box-shadow: 0 1px 5px #333;
            z-index:101;
	}

a.boxclose{
            float:right;
            width:26px;
            height:26px;
            background:transparent url(images/cancel.png) repeat top left;
            margin-top:-30px;
            margin-right:-30px;
            cursor:pointer;
        }

.box h1{
            border-bottom: 1px dashed #7F7F7F;
            margin:-20px -20px 0px -20px;
            padding:10px;
            background-color:#FFEFEF;
            color:#EF7777;
            -moz-border-radius:2px 2px 0px 0px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-top-right-radius: 2px;
            -khtml-border-top-left-radius: 2px;
            -khtml-border-top-right-radius: 2px;
        }	

#lout{
font-family: Tahoma, verdana, arial;
font-size: 11px;
float:right;
font-weight:bold;
padding:1px;
text-align:center;

}

.lout:hover{
cursor:pointer;
font-weight: bold;
color: blue;
text-decoration:underline;
-moz-box-shadow: 0 1px 5px #333;
-webkit-box-shadow: 0 1px 5px #333;
}		
#listtable
{
width:100%;

}

#listrow
{	width:100%;
	height:40px;
}
#listbuddies
{
height: 20px;
    padding: 5px;
    text-align: center;
    line-height: 20px;
	font-size:12px;
	font-family:tahoma,vardana, arial;
	border:1px solid lightgrey;
	border-radius:2px;
	
}
.listbuddies
	{
	background: #f4f4f4;
	}
#listbuddies:hover
{
Background: lightgrey;
cursor:pointer;
}
#liststory
{
height: 20px;
    padding: 5px;
    text-align: center;
    line-height: 20px;
	font-size:12px;
	font-family:tahoma,vardana, arial;
	background:#f4f4f4;
	border:1px solid lightgrey;
	border-radius:2px;
	
}
#liststory:hover
{
Background: lightgrey;
}
#listdoc{
height: 20px;
    padding: 5px;
    text-align: center;
    line-height: 20px;
	font-size:12px;
	font-family:tahoma,vardana, arial;
	border:1px solid lightgrey;
	border-radius:2px;
	}
#listdoc:hover
{
Background: lightgrey;
cursor:pointer;
}
.listdoc{background:#f4f4f4;}

#listphoto
{
height: 20px;
    padding: 5px;
    text-align: center;
    line-height: 20px;
	font-size:12px;
	font-family:tahoma,vardana, arial;
	border:1px solid lightgrey;
	border-radius:2px;
	}
	.listphoto
	{
	background:#f4f4f4;
	}
#listphoto:hover
{
Background: lightgrey;
cursor:pointer;
}

#listlog
{
height: 20px;
    padding: 5px;
    text-align: center;
    line-height: 20px;
	font-size:12px;
	font-family:tahoma,vardana, arial;
	border:1px solid lightgrey;
	border-radius:2px;
	
}
.listlog{background:#f4f4f4;}
#listlog:hover
{
Background: lightgrey;
cursor:pointer;
}
#notifications
{
height: 20px;
    padding: 5px;
    text-align: center;
    line-height: 20px;
	font-size:12px;
	font-family:tahoma,vardana, arial;
	background:#f4f4f4;
	border:1px solid lightgrey;
	border-radius:2px;
	
}
#notifications:hover
{
Background: lightgrey;
}



#listcontent
{width:100%;
	height:400px;
}
.diselect{
background:#f4f4f4;
Color:Black;
}
.slectedopt{
background: #4EcD1E;
	Color: White;
	font-weight:bold;}
	
	.wid{
	background-color:#F9F9F9;
	border:2px solid #000000;
	height:auto;
	padding:4px 8px;
	position:fixed;
	width:auto;
	cursor:pointer;
		left:280px;
		top:50px;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	-moz-box-shadow:0 0 3px #CCCCCC;
	-webkit-box-shadow:0 0 3px #CCCCCC;
	box-shadow:0 0 3px #CCCCCC;
	text-shadow:0 2px 0 white;
	display:none;
}
	

</style>
<script>

$(document).ready(function(){  
$("#add").click(function(){
 if($(".interactContainers").is(":hidden")) {
            $(".interactContainers").slideDown(200);
        }
		else {
            $(".interactContainers").slideUp(200);
        }
});
$("#remove").click(function(){
 if($(".interactContainers1").is(":hidden")) {
            $(".interactContainers1").slideDown(200);
        }
		else {
            $(".interactContainers1").slideUp(200);
        }
});

    /*$("#new").click(function(){  
	    $("#sub_body").html("<center><img src='../../images/loading1.gif' /></center>");  
      $("#sub_body").load("acc_update.php");  
    });  */
	$("#new1").click(function()
	{  
	    $("#sub_body").html("<center style='margin-top:40px;'><div style='widht:100%; height:60px;'><img src='../../images/loading1.gif' /></div></center>");  
      $("#sub_body").load("user_info.php?id=<?php echo "$id" ?>");  
    });  
  }); 
  
//--> 
</script>
</head>
<body >
<div class="wid">
<img class="preloader" src="chat/img/preloader.gif" alt="Loading.." width="22" height="22" />
</div>

<div id="maincontainer">
<?php
/*include("../skh/connect.php");
$qer = "SELECT fileName, imageid FROM images ORDER BY UploadDate LIMIT 1";
    $rez1 = mysql_query($qer) or die(mysql_error());
    $ro = mysql_fetch_array($rez1);
    $_SESSION['bigp'] = (string)$ro['fileName'];
	echo $_SESSION['bigp'];
    $_SESSION['img'] = $ro['imageid'];
	echo $_SESSION['img'];*/
?>
<div id="topsection"><div class="innertube1"> <a href="home.php"><img src="./images/hlogo.png" style=" margin-left: 30px;"></a>
<a href="home.php"><img border="0" class="ad1" src="images/icons/home.png" /></a>
&nbsp;&nbsp;&nbsp;<a href="#"><img  class="ad1"  id="btn_notify" src="images/icons/home.png" /></a>

	  <table style="float:right;">
	  <tr><td><a  id="lout" style="color:white;" ><?php echo $time ;?></a> </td></tr>
	  <tr><td><a href="logout.php" id="lout" class="lout" style="width:50px;">Log out</a> </td></tr>
	  </table>
</div></div>
<div id="contentwrapper">
<div id="leftcolumn">
<div class="innertube"><center>
              <br><br><br><?php echo $user_pic; ?> <br><span class="upic"><?php echo "$username"; ?></span><br> </br>
			  <!-- <a href="#" id="new" class="btnblank" >Edit Profile</a><br> !--><br>
			  <script type="text/javascript" src="/scripts/box/jquery-1.4.2.js"> </script>
			   <script type="text/javascript">
			$(document).ready(function() {
			
				$('.status').text('+');
				$('.accordionButton').click(function() {
				$('.accordionButton').removeClass('on');
					$('.accordionContent').slideUp();
				$(this).find('.status').text('+');
				$('#status1').text('close');
				
					if($(this).next().is(':hidden') == true) 
					{
						$(this).addClass('on');
						$(this).next().show();
						$(this).find('.status').text('-');
						$('#status1').text('open');
						scrollalert();
				
					} 
		});
				$('.accordionContent').hide();
				$(".scroll").click(function(event){
					$('.accordionContent').hide();
					event.preventDefault();
					var trgt = $(this).attr("id");
					var target_offset = $("#"+trgt).offset();
					var target_top = target_offset.top;
					$('html, body').animate({scrollTop:target_top}, 500);
				});
			});
			</script>
			<script type="text/javascript">
$('document').ready(function(){
	
	var p=4;
$('#accordionContent').scroll(function() {
var id = "<?= $id ?>";
var to= "<?= $nof ?>";
if (p<to)
{
$('div#content1').html('<img src="img/loading6.gif">');
$.post("listappend.php",{id:id,index:p } ,function(data) 
{
//alert(data);
$('div#content1').hide();
	$('#listing').append(data).fadeIn();
	
    });
	if((p+4)<=to)
p=p+4;	
else
p=to;
}
});
});
</script>


<script type="text/javascript" >

 $(document).ready(function(){
	 $('#btn_notify').click(function() {
   $('.wid').slideToggle('fast', function() {
   
   });
 });

	var panel2 = $('#btn_notify');
var panel3 = $('.wid');
	var loaded=false;	// A flag which prevents multiple ajax calls to geodata.php;
	
panel2.click(function(){
if(!loaded)
{
		panel3.slideDown(function(){
	
	$.post("notify/notify_header.php",{id:45,index:4 } ,function(data) 
{
alert(data);

    });
  $.post("notify/notify_header.php",{} ,function(data) 
{
alert(data);
	panel3.html(data).fadeIn();
	
    });
		});
		loaded=true;
		}
		else
		panel3.slideUp(function(){
	loaded=false;
		});
	})
 });


</script>
<div id="rt"></div>
<div id="st"></div>
<div id="stt"></div>		
<p><span id="status" ></span></p>
<p><span id="status1" ></span></p>
<div>
<!-- accordion info 1 -->
<table>
<span id="1" class="accordionButton" style=" background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left;">
 <a href="#" id="1" class="scrollaccordionButton">
                	<span class="status" ></span> <img src="../images/icons/star_16.png" style=" margin-right: 10px; margin-left:10px; " >   Fav. Users
</a>
</span>
<div class="accordionContent" id="accordionContent" style="height:202px; overflow-y:auto; overflow-x:hidden; font-weight:normal;" >

		<div id="listing">
				<?php include('fav_list.php'); ?>
				<div id="content1"></div>
				</div>

		
			</div>
<span id="2" class="accordionButton" style="background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left;">

                <a href="#" id="2" class="scrollaccordionButton">

                	<span class="status"></span> <img src="../images/icons/cbuddies_16.png" style=" margin-right: 10px; margin-left:10px;" > College Buddies

                </a>

            </span>
<div class="accordionContent" style="height:450px; overflow-y:auto; overflow-x:hidden; font-weight:normal;" >
			
			
			<div >
				<?php include('list1.php'); ?>	
			</div>
			</div>
			  
			<span id="3" class="accordionButton" style="background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left; ">
<a href="#" id="3" class="scrollaccordionButton">
<span class="status"></span> <img s rc="../images/icons/faculty_16.png" style=" margin-right: 10px; margin-left:10px;" > <?php echo $logOptions_id; ?> Faculty
</a>
</span>
<div class="accordionContent" style="height:450px; overflow-y:auto; overflow-x:hidden; font-weight:normal;" >
			
			
			<div >
				<?php include('faculty_list.php'); ?>
			</div>
			</div>
			</table>
</div>
		 </center></div> 
	<div id="online"></div>	 
<!-- function for popup !-->		 
<script type="text/javascript">
            $(function() {
                $('#activator').click(function(){
                    $('#overlay').fadeIn('fast',function(){
                        $('#box').animate({'top':'160px'},500);
                    });
                });
                $('#boxclose').click(function(){
                    $('#box').animate({'top':'-200px'},500,function(){
                        $('#overlay').fadeOut('fast');
                    });
                });

            });
</script>
		 </div>
<div id="content">
<div style="float:left; width:550px; z-index:2">

 <td class="td1" nowrap colspan="2"><div id="qq"><h1><?php echo "$mainNameLine"; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($id!==$logOptions_id) { echo'<a href="#" id="add"><font size="2px" >ADD TO FAVOURITE</font></a>&nbsp;<a href="#" id="remove" ><font size="2px" >REMOVE FROM FAVOURITE</font></a>'; } ?></h1> 

                <div class="interactContainers" id="add_friend" style="display:none; ">
                Add <?php echo "$mainNameLine"; ?> to favourite? &nbsp;
                <a href="#" onclick="return false" onmousedown="javascript:addAsFav(<?php echo $logOptions_id; ?>, <?php echo $id; ?>);">Yes</a>
                <span id="add_fav_loader"><img src="images/loading1.gif" width="28" height="10" alt="Loading" /></span>
          </div>
		  <div class="interactContainers1" id="remove_friend" style="display:none; ">
		       Remove <?php echo "$username"; ?> from your favourite list? &nbsp;
                <a href="#" onclick="return false" onmousedown="javascript:removeAsFav(<?php echo $logOptions_id; ?>, <?php echo $id; ?>);">Yes</a>
               </div>
</div></td> 
 <div  id='sub_body'>
 <table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
              <div><td nowrap class="td1" style="border-color:lightgrey;"><div id="ff" >Basic Info</div></td>
              <td nowrap class="td1" style="border-color: lightgrey;" ><div id="ff">Educational Info </div></td>
          </tr>
		  <tr>
              <td nowrap class="td1" valign="top"><div id="qq"><font color="black"><table><tr><td>Sex:</td><td><?php echo "$sex"; ?></td></tr><tr><td>Interested In:</td><td><?php echo "$interested_in"; ?></td></tr></table> </font></div></td>
              <td nowrap class="td1" valign="top">
                  <div id="qq"><font color="black"><table><tr><td>12th</td><td><?php echo "$s12"; ?></td><td><?php echo "$yj"; ?></td></tr><tr><td>10th</td><td><?php echo "$s10"; ?></td><td><?php echo "$yp"; ?></td></tr></table></font></div>
                  <div id="de">
				  <a id="new1" class="btn useri" style=" cursor:pointer;">More info</a>
				  <!--
				  <a style="padding-right: 0px;font-weight:bold; font-family: Verdana; "  class="button" href="#"><span style="padding-left: 5px;padding-right: 5px;cursor:pointer" class='complete_details' name="#dialog">More- Info </span></a> </div> !-->
              </td>
          </tr>
		   <tr>
           <td class="td1" nowrap colspan="2" valign="top" style="550px;">
                  <br><center><?php //include 'scroller.php'; ?></center></a><br>
              </td>
			</tr>
			
			
			<tr>
			<td class="td1" id="hiderequest" nowrap colspan="2" valign="top" style="550px;">
					
<?php 
if($id==$logOptions_id)
{	
		include("scripts/connect_to_mysql.php");
	
    $sql = "SELECT * FROM friends_requests WHERE mem2='$id' ORDER BY id ASC LIMIT 50";
	$query = mysql_query($sql) or die ("Sorry we had a mysql error!");
	$num_rows = mysql_num_rows($query); 
	if ($num_rows < 1) {
		echo 'You have no Favourite Requests at this time.';
	} else {
        while ($row = mysql_fetch_array($query)) 
		{ 
		    $requestID = $row["id"];
		    $mem1 = $row["mem1"];
	        $sqlName = mysql_query("SELECT username FROM myMembers WHERE id='$mem1' LIMIT 1") or die ("Sorry we had a mysql error!");
		    while ($row = mysql_fetch_array($sqlName)) { $requesterUserName = $row["username"]; }
		    ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
		    $check_pic = 'members/' . $mem1 . '/image01.jpg';
		    if (file_exists($check_pic)) {
				$lil_pic = '<a href="profile.php?id=' . $mem1 . '"><img src="' . $check_pic . '" width="50px" border="0"/></a>';
		    } else {
				$lil_pic = '<a href="profile.php?id=' . $mem1 . '"><img src="members/0/image01.jpg" width="50px" border="0"/></a>';
		    }
		    echo	'<hr/>
<table width="100%" cellpadding="5"><tr><td width="17%" align="left"><div style="overflow:hidden; height:50px;"> ' . $lil_pic . '</div></td>
                        <td width="83%"><a href="profile.php?id=' . $mem1 . '">' . $requesterUserName . '</a> wants to be your Fav!<br /><br />
					    <span id="req' . $requestID . '">
					    <a href="#" onclick="return false" onmousedown="javascript:acceptFavRequest(' . $requestID . ');" >Accept</a>
					    &nbsp; &nbsp; OR &nbsp; &nbsp;
					    <a href="#" onclick="return false" onmousedown="javascript:denyFavRequest(' . $requestID . ');" >Deny</a>
					    </span></td>
                        </tr>
                       </table>';
        }	 
	}
	}
    ?>
			</td></tr>
			
		  </div>
		  
		 </table>
		
		<table style="width:100%">
		<tr><td><div id="listcontent"> Hello  </div></td></tr>
		</table>
</div>
		 		
</div>
<!--
<div align="center" class="main">
        <a href="#" class="control" id="control">DISPLAY notification</a>
      </div>
	  -->
</div>

<div id="rightcolumn">
<div class="innertube"></div>
</div>
</body>	
<div id="load_t">
</div>
<?php include("notify/notify_update.php"); ?>
<?php include("chat/chat.php"); ?>
</html>		
			