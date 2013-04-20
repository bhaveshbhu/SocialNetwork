<?php
session_start();
include_once("scripts/checkuserlog.php");
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<?php
$id = "";
$email="";
if (isset($_GET['id'])) {
	 $id = preg_replace('#[^0-9]#i', '', $_GET['id']); // filter everything but numbers
} else if (isset($_SESSION['idx'])) {
	 $id = $logOptions_id;
}else {
   header("location: index1.php");
   exit();
}
$_SESSION['id'] = $id;
$_SESSION['email']= $email ;
// echo $email;

function genRandomString() {
    $length = 32;
//define("$characters",’0123456789abcdefghijklmnopqrstuvwxyz’);
    $characters = ’0123456789abcdefghijklmnopqrstuvwxyz’;
    $string = ”;    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}
$campus="";
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
    $user_pic = "<img src=\"$check_pic\" width=\"60px\" height=\"60px\" />"; 
	} 
	else
	    {
	$user_pic = "<img src=\"$default_pic\" width=\"60px\" height=\"60px\" />"; 
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
	$campus = $row["CampID"];
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
	
	$date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
$time= date("g:i A");

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fribler</title>
	
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
height: 600px;
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
margin-left: 10px; /*Set margin to that of -(MainContainerWidth)*/
background: Transparent;
margin-top:0px;
height: 100%;
z-index:2;
margin-left:201px;
}
b:hover
{
text-decoration: underline;
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
	text-align:center;
"
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
     /
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
<body >
<div id="maincontainer">

<div id="topsection"><div class="innertube1"> <a href="home.php"> <img src="./images/hlogo.png" style=" margin-left: 30px;"></a>
<a href="#"><img border="0" class="ad1" src="images/icons/home.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/friend.png" /></a>
      &nbsp;&nbsp;&nbsp;<?php if($campus == 0){ echo "<a href='page/list.php?id=".$_SESSION['id']."'>";} else { $_SESSION['clg'] = $campus; echo "<a href='page/main1.php?cid=".$_SESSION['clg']."'>"; } ?><img border="0" class="ad1" src="images/icons/faculty.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/pics.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/doc.png" /></a>
 <table style="float:right;">
	  <tr><td><a  id="lout" style="color:white;" ><?php echo $time ;?></a> </td></tr>
	  <tr><td><a href="logout.php" id="lout" class="lout" style="width:50px;">Log out</a> </td></tr>
	  </table> 

</div></div>

<div id="contentwrapper">
<div id="leftcolumn">
<div class="innertube"><center>
              <br><div><a style=" float:left; width: 80px; text-shadow: 2px 2px grey;"><?php echo $user_pic; ?><div><span class="upic" style="background: transparent; color:#3b5998;"><a style="color:#3b5998;" href="profile.php?id=<?php echo "$id" ?>"><?php echo "$username"; echo " "; echo "$lastname"; ?></a></b></span></div></div><br></br><br><br><br><br>
			  
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
<span id="1" class="accordionButton" style="background-color: transparent; display:block; border-bottom: solid 1px lightblue; width: 170px; text-align:left;">

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

            <div class="accordionContent" style="height:450px; overflow-y:auto; overflow-x:hidden; font-weight:normal;" >
			
			
			<div >
					
			<?php include_once "list.php"; ?>
			</div>
			</div>

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

</div>
<div id="content">
<div style="float:left; width:550px; z-index:2">

<!--/* write here for main content*/ !-->
		       
</div>

</tr>
<div id="rcentercolumn">
<div class="innertube"><b>Right center: <em>190px</em></b> <script type="text/javascript">filltext(15)</script></div>
</div>

</div>
<div id="rightcolumn">
<div class="innertube"><b> Right column</b></div>
</div>
</div>

<div id="footer"><a href="http://www.fribler.com/">Fribler Corporation</a></div>

</div>
</body>
</html>
