<?php
session_start();
include_once("scripts/checkuserlog.php");

$id=$_REQUEST['id'];
$ids = $_SESSION['id'];
//$email = $_SESSION['email'];

if ($id==$ids)
{
$disp="run-in";
}
else
{ 
$disp="none";
}

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
	//$campus = $row["CampID"];
	$gender=$row["gender"];
	$food=$row["food"];
	$movie=$row["movie"];
	$sport=$row["sport"];
	$bio=$row["bio"];
	$interested=$row["interested_in"];
	$love=$row["love"];
	$birthday=$row["birthday"];
	$place=$row["place"];
	$email=$row["email"];

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
	$yj=$row["year_of_join"];
	$yp = $row["year_of_pass"];
	$s10= $row["school_name_10"];
	$s12= $row["school_name_12"];
	$y10=$row["year"];
	$y12 = $row["tl_year"];
	$dept=$row["department"];
	$dgre=$row["degree"];
	$mobile=$row["mobile"];
	$enroll=$row["enroll_no"];
	
	  }
	}


?>
<html>
<head>
<script type="text/javascript" src="js/jquery.js" ></script>
<link href="css_files/buttons.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
$(document).ready(function(){

$("#close").click(function(){  
	    $("#main").html("<center><img src='../../images/loading1.gif' /></center>");  
      $("body").load("#sub_body");  
	  });
 $("#editpro").click(function(){  
	    $("#main").html("<center><img src='../../images/loading1.gif' /></center>");  
      $("#main").load("acc_update.php");  
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
<style type="text/css">
#dd{
 width: 100%;
            background-color: Transparent;
			margin-left:0px;
			height: 90%
			font-family: tahoma, verdana, arial;
			border-color: Grey;
			font-weight:bold;
			border-right: 1px solid lightgrey;
			border-bottom: 1px solid lightgrey;
            }
input.button					{ padding:3px 6px;
                         margin:20px 0px 0px 0px; ; 
												font-family:tahoma,Verdana, Arial, Helvetica, sans-serif;
												background:url(../images/white.jpg) repeat-x;;color:#545454;
										Display: inline-block;
										line-height:18px;
										font-weight:bold;
										font-size:11px;
										text-shadow:0 1px 0 #fff;
										position:relative;
										border:1px solid #DFDFDF;
										margin:0 10px 10px 0;
										-moz-border-radius:4px;
										-webkit-border-radius:4px;
										border-radius:4px;}
												
input.button:hover		

{ border-color:#cacaca;
background:#c8c8c8;
cursor: pointer; }

#form_content {
}
#main{
width:100%;
bakcground-color: Transparent;
}
 #ff{
 width: 100%;
            background-color: Transparent;
			margin-left:0px;
			font-family: tahoma, verdana, arial;
			border-color: Grey;
			font-weight:bold;
            }
#public {display:none }

th {border-color: lightgrey;}
					
.td5{       
cursor:pointer;
background: url(../images/white.jpg);
border-width:1px; border-style:solid; border-color:Grey;
padding: 10px 10px 10px 10px;
width:100%;
border:1px solid 'lightGrey';
border-spacing:20px;
-moz-border-radius:2px 2px 2px 2px;
-webkit-border-radius:2px 2px 2px 2px;
border-radius:2px 2px 2px 2px;
	}

	.td6 {
		float:left; 
		width:150px;
		font-family:tahoma, verdana, arial;
		font-size:13px;
		font-weight:bold;
		}
	.td6a {
		font-family:tahoma, verdana, arial;
		font-size:13px;
		}
		
	.td6h {
		float:left; 
		width: 98.7%;
		font-family:tahoma, verdana, arial;
		font-size:14px;
		font-weight:bold;
		padding: 3px 3px 3px 5px;
		background-color: lightgrey;
		border:1px solid 'lightGrey';
		-moz-border-radius:2px 2px 2px 2px;
		-webkit-border-radius:2px 2px 2px 2px;
		border-radius:2px 2px 2px 2px;
		
		}
#close{
float:right;
cursor:pointer;
a:hover { color : #c00; } 
}
.done {


	display:none
}

</style>
</head>
<body>
<div id="main">
<div id="ff">
 <table width="100%">
<tr  class="td5">
<td nowrap style="cursor: auto;"><a id="per" style="border:transparent; "><div color="#0099ff" style=" padding-top:5px; float:left; font-weight:bold;" >Profile  </div></a>
 <a id="close" style="float:right; display: block; padding-top:5px;">&nbsp;&nbsp;&nbsp;<font color="#0099ff" onmouseover="this.style.color='#c00'" style="float:right;" onmouseout="this.style.color='#0099ff'"><img src="../../images/icons/close_16.png"></font></a>  

  <a href="#" style="text-align:right; float:right; padding-left:5px; padding-right:5px; margin:1px; display:<?php echo "$disp" ?>;" id="editpro" class="btn edit"onmouseover="this.style.color='#c00'"><img src="../../images/icons/edit_16.png" style=" display:inline-block; line-height:3px;">Edit</a> 
 </td>


</tr>
</div>
</table>

<div id="form_content" class="loading">

<div id="dd"  >
<div id="personal" >
  <form name="contact" method="post" action="" >
 <table style="padding-top:20px; padding-bottom:20px;">
 
 <div class="td6h">General info</div>
 <tr><td class="td6">First Name</td><td class="td6a"><?php print "$username"?></td></tr>
 <tr><td class="td6">Second Name</td><td class="td6a"><?php print "$lastname"?></td></tr>
 <tr><td class="td6">Gender:</td><td class="td6a"><?php print "$gender"?></td></tr>
 <tr><td class="td6">Born on:</td><td class="td6a"><?php print "$birthday"?></td></tr>
  <tr><td class="td6">Love Status:</td><td class="td6a"><?php print "$love"; ?></td></tr>
   </table>
 
 <table style="padding-top:20px; padding-bottom:20px;">

<div class="td6h">  Educational  Details </div>
 <tr><td class="td6">Passed highschool (10th) from :</td><td class="td6a"><?php print "$s10"; ?>  in  <?php print "$y10"?></td> </tr>
  <tr><td class="td6">Paased Senior Secondry (12th) :</td><td class="td6a"><?php print "$s12"; ?>  in  <?php print "$y12"?></td></tr>
  <tr><td class="td6">Course Doing :</td><td class="td6a"><?php print "$dgre"; ?></td></tr>
   <tr><td class="td6">Branch : </td><td class="td6a"><?php print "$dept"; ?></td> <td class="td6a" style="font-weight:bold"> joined in    </td> <td class="td6a"> <?php print "$yj"; ?>, </td>  <td class="td6a" style="font-weight:bold"> Passing in   </td> <td class="td6a"><?php print "$yp"; ?> </tr>
  </table>
 
 <table style="padding-top:20px; padding-bottom:20px;">
  
  <div class="td6h"> Contact Details </div>
   <tr><td class="td6">Belong to :</td><td class="td6a"><?php print "$city"; ?>, <?php print "$state"; ?>, <?php print "$country"; ?></td></tr> 
   <tr><td class="td6">Email:</td><td class="td6a"><?php print "$email"; ?></td></tr>
   <tr><td class="td6">Mobile No. :</td><td class="td6a"><?php print "$mobile"; ?></td></tr>
   </table>

 <table style="padding-top:20px; padding-bottom:20px;">
   
  <div class="td6h"> Interest of <?php print "$username"?></div>
  <tr><td class="td6">Interested In:</td><td class="td6a"><?php print "$interested"; ?></td></tr>
 <tr><td class="td6">Fav. place to hangout: </td><td Class="td6a"><?php print "$place"?></td></tr>
 <tr><td class="td6">Fav. Sports:</td><td class="td6a"><?php print "$sport"?></td></tr>
 <tr><td class="td6">Fav. Movies:</td><td class="td6a"><?php print "$movie"?></td></tr>
  <tr><td class="td6">Fav. Movies:</td><td class="td6a"><?php print "$food"?></td></tr>
  <tr><td class="td6">About Me :</td><td class="td6a"><?php print "$bio"?></td></tr>
  

 </table>
</form>
</div>
<br />
</div>
  </div>
  </div>
  </body>
</html>