<?php
session_start();
include_once("scripts/checkuserlog.php");
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<?php
$id = $_SESSION['id'];
$email = $_SESSION['email'];
// echo $email;
function genRandomString() {
    $length = 10;
    $characters = ’0123456789abcdefghijklmnopqrstuvwxyz’;
    $string = ”;    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}
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
	$sex=$row["gender"];
	$interested_in=$row["interested_in"];
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "members/$id/image01.jpg";
	$default_pic = "members/0/image01.jpg";
	if (file_exists($check_pic))
	{
    $user_pic = "<img src=\"$check_pic\" width=\"218px\" />"; 
	} 
	else
	    {
	$user_pic = "<img src=\"$default_pic\" width=\"218px\" />"; 
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

if($acc_type=="student.php")
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
	else if($acc_type=="admin.php")
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
	else if($acc_type=="faculty.php")
	{
	}
	//else($acc_type=="alumni.php")
	//{
	//}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $username ?> profile</title>
		<!-- <link rel="stylesheet" href="scroll/scroll1/colorbox.css" />
	<link href="scroll/scroll1/prof_img_scroller.css" rel="stylesheet" />
	<script src="scroll/colorbox/jquery.min.js"></script>
     <script src="scroll/colorbox/jquery.colorbox.js"></script>
	<script src="scroll/colorbox/jquery-ui-1.8.13.custom.min.js"></script>
	!-->
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
        <style type="text/css">
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
            max-height:39px;
            max-width:39px;
            position:relative;
            top: 2px;
            left: 30px;
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
            border:1px solid #cccccc;
            border-bottom:0px;
            border-right:0px;
						
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
            background-color:#00CC00;
            padding:5px;
            }
            .upic
            {
            padding-left:38px;
            padding-right:38px;
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
			font-family: verdana, arial;
			font-size:13px;
			
               }
            #qq{
            text-indent:20px;
            color: #33CC00;
            }
            #ff{
            background-color:#ccffcc;
			font-family: verdana, arial;
			border-color:#ccffcc
            }
            #de
			{
            text-align:left;
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
						float:left;
                        order:5px solid red;
                        height:200px;
                        width:200px;
                        z-index:9999;
						 -webkit-box-shadow: 0 2px 4px green, green 0px 0px 10px inset;
                         -moz-box-shadow: 0 2px 4px green, green 0px 0px 10px inset;

			}
		

        </style>
<script>
 
$(document).ready(function() {  
 //alert("dghjd");

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
 
</script>
    </head>
    <body>  
	<div id="maincontainer">
    <div id="mask"></div>
		<div id="dialog">
		arfdfdcgfcghcgh
		
		
		
		</div>
		
        <table border="0" cellspacing="0" cellpadding="0" width="100%" border="3px">
            <tr>
                <td class="d1" rowspan="10" width="168" nowrap valign="top">
      <img class="as" src="images/hlogo.png" style="margin-left: 45px;"/>
          <center>
              <br><br><br><br><br><br><?php echo $user_pic; ?><br><span class="upic"><?php echo "$username"; ?></span><br><br><br>
              <a href=""><div id="am">Favourite Users</div></a><a href=""><div id="am">Faculty</div></a><a href=""><div id="am">College Buddies</div></a>
          </center>
      </td>     
      <div id="td1" height="20" nowrap border="2px" colspan="10" style="margin-left:219px; height: 38px;"> 
      <a href=""><img border="0" class="ad1" src="images/icons/home.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/friend.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/faculty.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/pics.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/doc.png" /></a>
<a href="logout.php"><img src="images/icons/lout.png" align="right" style="padding-top: 3px;padding-right: 3px;"/></a> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
<br><br>
</div>

  <tr>
          <tr>
              <td class="td1" nowrap colspan="2"><div id="qq"><h1><?php echo "$username"; ?></h1></div></td>
              <td class="td2" width="20%" rowspan="10" nowrap>dcfefref</td>
              <td class="td1" width="20%" rowspan="10" nowrap>dd</td>              
          </tr>
          <tr>
              <td nowrap class="td1" style="border-color:#ccffcc;"><div id="ff" >Basic Info</div></td>
              <td nowrap class="td1" style="border-color:#ccffcc;" ><div id="ff">Educational Info </div></td>
          </tr>
          <tr>
              <td nowrap class="td1" valign="top"><div id="qq"><font color="black"><table><tr><td>Sex:</td><td><?php echo "$sex"; ?></td></tr><tr><td>Interested In:</td><td><?php echo "$interested_in"; ?></td></tr></table> </font></div></td>
              <td nowrap class="td1" valign="top">
                  <div id="qq"><font color="black"><table><tr><td>12th</td><td><?php echo "$s12"; ?></td><td><?php echo "$yj"; ?></td></tr><tr><td>10th</td><td><?php echo "$s10"; ?></td><td><?php echo "$yp"; ?></td></tr></table></font></div>
                  <div id="de"><a style="padding-right: 0px;font-weight:bold; font-family: Verdana; "  class="button" href="#"><span style="padding-left: 5px;padding-right: 5px;cursor:pointer" class='complete_details' name="#dialog">More- Info </span></a> </div>
              </td>
          </tr>
          <tr>
              <td class="td1" nowrap colspan="2" valign="top">
                  <br><center><?php include 'scroll/scroll1/index.php'; ?><center></a><br>
              </td>
			  <script>
(function($){
window.onload=function(){ 
	$("#tS2").thumbnailScroller({ 
		scrollerType:"clickButtons", 
		scrollerOrientation:"horizontal", 
		scrollSpeed:2, 
		scrollEasing:"easeOutCirc", 
		scrollEasingAmount:600, 
		acceleration:4, 
		scrollSpeed:800, 
		noScrollCenterSpace:10, 
		autoScrolling:0, 
		autoScrollingSpeed:2000, 
		autoScrollingEasing:"easeInOutQuad", 
		autoScrollingDelay:500 
	});
}
})(jQuery);
</script>
	<script src="../../../../scroll/colorbox/jquery.thumbnailScroller.js"></script>
          </tr>
          <tr>
              <td class="td1" nowrap height="193" colspan="2" valign="top">
                  <center>scoller</center>
                      <ul>
                          <li style="background-color:#ccffcc;"> <a href="#">Story</a></li>
                          <li style="background-color:#ccffcc;"><a href="#">Buddies</a></li>
                          <li style="background-color:#ccffcc;"><a href="#">Documents</a></li>
                          <li style="background-color:#ccffcc;"><a href="#">Photos</a></li> 
                          <li style="background-color:#ccffcc;"><a href="#">Videos</a></li>
                          <li style="background-color:#ccffcc;"><a href="#">Log</a></li>
                     </ul>
              </td>
          </tr>
  </tr>
  </tr>
  </table>
  </div>
    </body>
</html>									