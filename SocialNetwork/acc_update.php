<?php
session_start();
include_once("scripts/checkuserlog.php");
//$id=$_REQUEST['id'];
$id = $_SESSION['id'];
//$email = $_SESSION['email'];

$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
// ------- FILTER THE ID AND QUERY THE DATABASE --------
while($row = mysql_fetch_array($sql))
{ 
    $username = $row["username"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$food = $row["food"];	
	$sport = $row["sport"];
	$movie = $row["movie"];
	$acc_type=$row["acc_type"];
	$sex=$row["gender"];
	$interested_in=$row["interested_in"];
	$gender=$row["gender"];
	$bio=$row["bio"];
	$love=$row["love"];
	$birthday=$row["birthday"];
	$place=$row["place"];
	$country = $row["country"];	
	$state = $row["state"];
	$city = $row["city"];
	//$campus = $row["CampID"];
$email=$row["email"];
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

$yearlist=array("1975","1976","1977","1978","1979","1980","1981","1982","1983","1984","1985","1986","1987","1988","1989","1990","1991","1992","1993","1994","1995","1995","1996","1997","1998","1999", "2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012",);
$yearlistp=array("1975","1976","1977","1978","1979","1980","1981","1982","1983","1984","1985","1986","1987","1988","1989","1990","1991","1992","1993","1994","1995","1995","1996","1997","1998","1999", "2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016",);
 
 // loop for slecting love status
 $s1="";
 $s2="";
 $s3="";
 $s4="";
 $s5="";
 $s6="";
if ($love=="Searching for love")
{
$s1="Selected='Selected'";
}
else if ($love=="Already found")
{
$s2="Selected='Selected'";
}
else if($love=="Just brokeup")
{
$s3="Selected='Selected'";
}
else if($love=="am good as single")
{
$s4="Selected='Selected'"; 
}
else if($love=="Married")
{
$s5="Selected='Selected'"; 
}
else if($love=="one sided love")
{
$s6="Selected='Selected'"; 
}
else 
{
 $s1="";
 $s2="";
 $s3="";
 $s4="";
 $s5="";
}

?>
<html>
<head>
<script type="text/javascript" src="js/jquery.js" ></script>
<link href="css_files/buttons.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
$(document).ready(function(){
$("#close").click(function(){  
	    $("#all").html("<center><img src='../../images/loading1.gif' /></center>");  
      $("body").load("#sub_body");  
	  });
$('#submit_btn').click(function () {	
    

//var username = $('input[name=username]');
var lastname = $('input[name=lastname]');
var sex = $('input[name=sex]');
var sport = $('input[name=sport]'); var movie = $('input[name=movie]'); var food = $('input[name=food]'); 
var mobile = $('input[name=mobile]'); var place = $('input[name=place]');  var country = $('input[name=country]'); var city = $('input[name=city]'); var state = $('input[name=state]');
var data = 'username=' + $('#fname').val() +'&lastname=' + lastname.val() +'&sex=' + sex.val() +'&movie=' + movie.val() +'&food=' + food.val() +'&sport=' + sport.val() +  '&bio=' + $('#bio').val() + '&love=' + $('#love').val() +'&country=' + country.val() + '&city=' + city.val() + '&state=' + state.val() +'&department='+$('#department').val() + '&mobile=' + $('#phone').val() +'&school_name_10=' + $('#s10').val() + '&school_name_12=' + $('#s12').val() + '&place=' + $('#place')
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
				$("#message").html("Account Updated");
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
 #ff{
 width: 100%;
            background-color: Transparent;
			margin-left:20px;
			font-family: tahoma, verdana, arial;
			border-color: Grey;
			font-weight:bold;
            }
#public {display:none }
					
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
		font-size:11px;
		font-weight:bold;
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

#all{ background-color: transparent;}

</style>
</head>
<body>
<div id=all>
<div id="ff">
 <table width="100%">
<tr  class="td5">
<td nowrap ><a id="per" style="border:transparent;"><font color="#0099ff" >Profile </font></a>
<a id="close" style="float:right;" onmouseover=" shadow='2px black "><img src="../../images/icons/close_16.png"></a></td>
</tr>
</div>
</table>


<div class="done">
<b>Thank you !</b> We have received your message. 
</div>


<div id="form_content" class="loading">

<div id="dd"  >
<div id="personal" >
  <form name="contact" method="post" action="" >
 <table>
  <div class="td6h">General info</div>
<tr><td class="td6">First Name</td><td><input type="text" name="username" id="fname" size="30" value="<?php print "$username"?>" class="text-input" /></td></tr>
 <tr><td class="td6">Second Name</td><td><input type="text" name="lastname" id="lname" size="30" value="<?php print "$lastname"?>" class="text-input" /></td></tr>
<tr><td class="td6">Gender:</td><td size="30"><input type="radio" name="sex" value="male" checked="checked"/>male 
		<input type="radio" name="sex" value="female"/>female </td></tr>
 <tr><td class="td6">Born on :</td><td><input name="birthday" type="text" id="datepicker" size="30"></td></tr>
  <tr><td class="td6">Love Status:</td><td size="30"><select name="love" id="love" >
           
		   <option value="Searching for love" <?php echo $s1 ?>>Searching for love</option>
           <option value="Already found" <?php echo $s2 ?>>Already found</option>
           <option value="Just brokeup" <?php echo $s3 ?>>Just brokeup</option>
           <option value="am good as single"<?php echo $s4 ?>>am good as single</option>
           <option value="Married" <?php echo $s5 ?>>Married</option>
           <option value="one sided love"<?php echo $s6 ?>>one sided love</option>
       </select></td></tr>
	
 <table style="padding-top:20px; padding-bottom:20px;">

<div class="td6h">  Educational  Details </div>
<TR><td class="td6">Year of Joining:</TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<TD aLIGN="LEFT"><select name="year_of_join" id="user" >

<?php
$ylist=" ";
foreach ( $yearlist as $ylist ):
    $sle = "";
    if ( $ylist == $yj )
        $sle = "selected";
?>
<option value="<?php echo $ylist; ?>" 
        <?php echo $sle; ?>>
        <?php echo $ylist; ?>
</option>
<?php
endforeach; ?>

		   </select></TD><td></td></TR>
		   <TR><td class="td6"> Tentative year of passing:</TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<TD aLIGN="LEFT"><select name="year_of_pass" onBlur='checkuser();' id="users">
		    <?php
$ylist=" ";
foreach ( $yearlistp as $ylist ):
    $sle = "";
    if ( $ylist == $yp )
        $sle = "selected";
?>
<option value="<?php echo $ylist; ?>" 
        <?php echo $sle; ?>>
        <?php echo $ylist; ?>
</option>
<?php
endforeach; ?>
		   
		   </select></TD><td></td></TR><tr><div id="elementsToOperateOn"><td class="td6">Current year:</td><td><input type="text" id="labeluser" value="" disabled="disabled"/></td></div><td><input type="button" value="Edit" id="edit" onclick="toggleStatus()" /></td></tr><TR>
		  <td class="td6"> Department:</TD><TD ALIGN="LEFT"> <input type="text" id='department' value="<?php print "$dept" ?>" name="department" class="user"/></TD></TR>
		  <TR BORDER="1"><td class="td6"> Educational Details:</TD><TD ALIGN="LEFT">  <select name="degree">
		   			<option value="Bachelor degree">B. Tech</option>
					<option value="Master Degree">M.Tech</option>
					<option value="Dual Degree">Dual Degree</option>
						<option value="Phd">Phd</option>
					</select></TD></TR>
					<TR><td class="td6">Educational info:</TD><td class="td6">School Name</td><td class="td6">year</td/></tr><tr><TD align="right" class="td6">10<sup>th</sup> class:</td><TD ALIGN="LEFT"><input type="text" name="school_name_10" id="s10" value="<?php print "$s10" ?>" class="user" /></td><TD aLIGN="left"><select name="school_name_10"  id="users">
				<?php
				$ylist=" ";
				foreach ( $yearlist as $ylist ):
				$sle = "";
				if ( $ylist == $y10 )
				$sle = "selected";
				?>
				<option value="<?php echo $ylist; ?>" 
				<?php echo $sle; ?>>
				<?php echo $ylist; ?>
				</option>
				<?php
				endforeach; ?>

		  
		   </select></TD></TR><tr><TD align="right" class="td6">12<sup>th</sup> class:</td><TD ALIGN="LEFT"><input type="text" name="school_name_12" id="s12" value="<?php print "$s12" ?>" class="user" /></td><TD aLIGN="left"><select name="school_name_12">
		   
		   <?php
				$ylist=" ";
				foreach ( $yearlist as $ylist ):
				$sle = "";
				if ( $ylist == $y12 )
				$sle = "selected";
				?>
				<option value="<?php echo $ylist; ?>" 
				<?php echo $sle; ?>>
				<?php echo $ylist; ?>
				</option>
				<?php
				endforeach; ?>
		   
		   </select></TD></TR>
		   </table>
		   
<div style="padding-top:20px; padding-bottom:20px;">
  
  <div class="td6h"> Contact Details </div>		   

	<div style="width:400px;"><td class="td6">Mobile No. :   </td><td><input type="text" name="mobile" id="phone" size="30" value="<?php print "$mobile" ?>"class="text-input" /></td></div>
    <div style="with:120px;"><td class="td6">Belong to :</td><td> City :<input type="text" name="city" id="phone" style="width:125px;" size="30" value="<?php print "$city" ?>"class="text-input" /></td><td> State:<input type="text" style="width:125px;" name="state" id="phone" size="30" value="<?php print "$state" ?>"class="text-input" /></td><br /><td> Country:<input type="text" name="country" id="phone" style="width:125px;" size="30" value="<?php print "$country" ?>"class="text-input" /></td></div>
	   
	 </div> 
	 
	  <table style="padding-top:20px; padding-bottom:20px;">
     <div class="td6h"> Interest of <?php print "$username"?></div>
  
   <tr><td class="td6">Interested In</td><td><input type="checkbox" name="interested_in[]" id="interested_in[]" value="men"/>Men<input type="checkbox" name="interested_in[]" id="interested_in[]" value="women"/>Women</td></tr>
   <tr><td class="td6">About Me : </td><td><textarea name="bio" id="bio" value="<?php print "$bio" ?>" cols="24" class="user"/></textarea></td></tr>
 <tr><td class="td6">Fav. place to hangout: </td><td><input type="text" name="place" id="name" size="30" value="<?php print "$place" ?>" class="text-input" /></td></tr>
 <tr><td class="td6">Fav. Sports:</td><td><input type="text" name="sport" id="sport" size="30" value="<?php print "$sport"?>" class="text-input" /></td></tr>
 <tr><td class="td6">Fav. Movies:</td><td><input type="text" name="movie" id="movie" size="30" value="<?php print "$movie"?>" class="text-input" /></td></tr>
 <tr><td class="td6">Fav. food:</td><td><input type="text" name="food" id="food" size="30" value="<?php print "$food"?>" class="text-input" /></td></tr>
<table>
<tr><td></td><td align="center"> <input type="submit" name="submit" class="button" id="submit_btn" value="Save" /></td></tr>
 </table>
</form>
</div>
<br />
</div>
  </div>
  </div>
  </body>
</html>