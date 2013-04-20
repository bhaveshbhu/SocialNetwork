<?php
session_start();
include_once("scripts/checkuserlog.php");
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<?php
$id=$_REQUEST['id'];
//$id = $_SESSION['id'];
//$email = $_SESSION['email'];
// echo $email;
$act=0;
function genRandomString() {
    $length = 10;
    $characters = ’0123456789abcdefghijklmnopqrstuvwxyz’;
    $string = ”;    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
// ------- FILTER THE ID AND QUERY THE DATABASE --------
while($row = mysql_fetch_array($sql))
{
$act=$row["email_activated"];
}
if($act==1){

//$id = preg_replace('#[^0-9]#i', '', $id); // filter everything but numbers on the ID just in case
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
// ------- FILTER THE ID AND QUERY THE DATABASE --------
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
	$campus = $row["CampID"];
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
	///////  Mechanism to Display Real Name Next to Username - real name(username) //////////////////////////
	if ($firstname != "" && $lastname != "") {
        $mainNameLine = "$firstname $lastname";
		$username = $firstname;
	} 
	else
	    {
		$mainNameLine = $username;
	    }    
}

if($acc_type=="Student")
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
//	$country = $row["country"];	
	//$state = $row["state"];
	//$city = $row["city"];
	//$acc_type=$row["acc_type"];
	  }
	}
	else if($acc_type=="Admin")
	{
	   while($row = mysql_fetch_array($sql))
      { 
    $yj = $row["tl_year"];
	$yp = $row["10_pass_year"];
	$dep = $row["department"];
	$s10= $row["school_name_10"];
	$s12= $row["school_name_12"];
	//$firstname = $row["firstname"];
	//$lastname = $row["lastname"];
//	$country = $row["country"];	
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
}
else
{

$id = $_SESSION['id'];
//$id = preg_replace('#[^0-9]#i', '', $id); // filter everything but numbers on the ID just in case
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
// ------- FILTER THE ID AND QUERY THE DATABASE --------
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
	$campus = $row["CampID"];
	$act=$row["email_activated"];
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
	///////  Mechanism to Display Real Name Next to Username - real name(username) //////////////////////////
	if ($firstname != "" && $lastname != "") {
        $mainNameLine = "$firstname $lastname";
		$username = $firstname;
	} 
	else
	    {
		$mainNameLine = $username;
	    }    
}

if($acc_type=="Student")
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
//	$country = $row["country"];	
	//$state = $row["state"];
	//$city = $row["city"];
	//$acc_type=$row["acc_type"];
	  }
	}
	else if($acc_type=="Admin")
	{
	   while($row = mysql_fetch_array($sql))
      { 
    $yj = $row["tl_year"];
	$yp = $row["10_pass_year"];
	$dep = $row["department"];
	$s10= $row["school_name_10"];
	$s12= $row["school_name_12"];
	//$firstname = $row["firstname"];
	//$lastname = $row["lastname"];
//	$country = $row["country"];	
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

}
	$date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
$time= date("g:i A");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $username ?> profile</title>
	<link href="../css_files/buttons.css" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type='text/css' />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/init.js" type="text/javascript"></script>
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
<!-- 
<script type="text/javascript" >
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
position:fixed;
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
margin-right: 10px; /*Set left margin to -(RightColumnWidth)*/
background: transparent;
margin-top: 0px;
border-left:1px solid lightGrey;
height: 100%;
position:fixed;
margin-left:1020px;
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
</style>
<script>
 
$(document).ready(function() { 


  $(document).ready(function(){  
    /*$("#new").click(function(){  
	    $("#sub_body").html("<center><img src='../../images/loading1.gif' /></center>");  
      $("#sub_body").load("acc_update.php");  
    });  */
	$("#new1").click(function(){  
	    $("#sub_body").html("<center><img src='../../images/loading1.gif' /></center>");  
      $("#sub_body").load("user_info.php?id=<?php echo "$id" ?>");  
    });  
  }); 
 
 //alert("this is a alert");

    //select all the a tag with name equal to modal
    $('.complete_details').click(function() {
        //Cancel the link behavior
     //   e.preventDefault();
        //Get the A tag
        var id = $(this).attr('name');//fetching d id's which need 2 be shown in popup 
		//alert(id);
                //alert($(id).height()/2);
//var id1=$("#footer_image td img").width();
		//alert(id1);
		//var id2=$(window).width();
		//var id3=$(window).height();
		//alert(id2+' '+id3);
     //document.write(id);
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
     
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
         
        //transition effect     
       // $('#mask').fadeIn(1000);    
        $('#mask').fadeTo("slow",0.5);  
     
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();
               
        //Set the popup window to center
        $(id).css('top',  winH/2-$(id).height()/2);
        $(id).css('left', winW/2-$(id).width()/2);
     
        //transition effect
        $(id).fadeIn(2000); 
     
    });
     
    //if close button is clicked
    $('.window .close').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        $('#mask, .window').hide();
    });     
     
    //if mask is clicked
    $('#mask').click(function () {
        $(this).hide();
        $('#dialog').hide();
    });         
	//to change opacity of college's logo
	/*$("img").mouseover(function(){
  
   $(this).animate({opacity:1},"slow");
    
  });
    
	$("img").mouseout(function(){
  
   $(this).animate({opacity:.3},"slow");
   });*/
     
});
var state = 'none';

function showhide(layer_ref) {

if (state == 'block') {
state = 'none';
}
else {
state = 'block';
}
if (document.all) { //IS IE 4 or 5 (or 6 beta)
eval( "document.all." + layer_ref + ".style.display = state");
}
if (document.layers) { //IS NETSCAPE 4 or below
document.layers[layer_ref].display = state;
}
if (document.getElementById &&!document.all) {
hza = document.getElementById(layer_ref);
hza.style.display = state;
}
}
//--> 
</script>
    </head>
<body >
<div id="maincontainer">
<?php
include("../skh/connect.php");
$qer = "SELECT fileName, imageid FROM images ORDER BY UploadDate LIMIT 1";
    $rez1 = mysql_query($qer) or die(mysql_error());
    $ro = mysql_fetch_array($rez1);
    $_SESSION['bigp'] = (string)$ro['fileName'];
	echo $_SESSION['bigp'];
    $_SESSION['img'] = $ro['imageid'];
	echo $_SESSION['img'];
?>
<div id="topsection"><div class="innertube1"> <a href="home.php"><img src="./images/hlogo.png" style=" margin-left: 30px;"></a>
<a href="home.php"><img border="0" class="ad1" src="images/icons/home.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/friend.png" /></a>
      &nbsp;&nbsp;&nbsp; <?php if($campus == 0){ echo "<a href='page/list.php?id=".$_SESSION['id']."'>";} else { $_SESSION['clg'] = $campus; echo "<a href='page/main1.php?cid=".$_SESSION['clg']."'>"; } ?><img border="0" class="ad1" src="images/icons/faculty.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href="photo.php"><img border="0" class="ad1" src="images/icons/pics.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/doc.png" /></a>
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
					$('.status').text('+');
					if($(this).next().is(':hidden') == true) {
						$(this).addClass('on');
						$(this).next().show();
						$(this).find('.status').text('-');
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


<div>
<!-- accordion info 1 -->
<table>
<span id="1" class="accordionButton" style=" background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left;">

                <a href="#" id="1" class="scroll accordionButton">

                	<span class="status" ></span> <img src="../images/icons/star_16.png" style=" margin-right: 10px; margin-left:10px; " >   Fav. Users

                </a>

            </span>

            <span class="accordionContent">
			<p>Content 1 -- THis place is for content</p>
            </span>

            <span id="2" class="accordionButton" style="background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left;">

                <a href="#" id="2" class="scroll accordionButton">

                	<span class="status"></span> <img src="../images/icons/cbuddies_16.png" style=" margin-right: 10px; margin-left:10px;" > College Buddies

                </a>

            </span>

            <span class="accordionContent">

                <p> <?php include_once "list.php"; ?></p>
            </span>

            <span id="3" class="accordionButton" style="background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left; ">

                <a href="#" id="3" class="scroll accordionButton">

                	<span class="status"></span> <img src="../images/icons/faculty_16.png" style=" margin-right: 10px; margin-left:10px;" >  Faculty

                </a>

            </span>

            <span class="accordionContent">
			This place is for Faculty users
            </span>
			</table>
</div>
		 </center></div> 
		 
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

 <td class="td1" nowrap colspan="2"><div id="qq"><h1><?php echo "$username"; echo"  "; echo "$lastname"; ?></h1> </div></td> 
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
                  <br><center><?php include 'scroller.html'; ?></center></a><br>
              </td>
			
		  </div>
		  </tr>
		 </table>
</div>
		  <!-- The overlay and the box -->
        <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box">
            <a class="boxclose" id="boxclose"></a>
            <h1>More info </h1>
<div>
			hello 

			<!--
			<?php echo $user_pic?> 
			<b> User Name :</b>	<?php echo $username?> <br>
			<b> First Name : </b><?php echo $firstname?> <br>
			<b> 