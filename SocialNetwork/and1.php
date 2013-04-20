<?php session_start(); ?>
<html>
<head>
<script type="text/javascript">
var time = null
function move() {
window.location = 'and2.php'
}</script>
</head>
</html>
<?php
$dyn_www = $_SERVER['HTTP_HOST']; 
// echo $dyn_www;
if (isset ($_POST['email1']))
	{
         $_SESSION['email1'] = $_POST['email1'];
}$from = ""; // Initialize the email from variable
// This code runs only if the username is posted
if (isset ($_POST['fname'])){
$username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['fname']); // filter everything but letters and numbers
 $lname = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['lname']); // filter everything but letters and numbers
	 $gender = preg_replace('#[^a-z]#i', '', $_POST['sex']); // filter everything but lowercase letters
 $b_m = preg_replace('#[^0-9]#i', '', $_POST['birth_month']); // filter everything but numbers
     $b_d = preg_replace('#[^0-9]#i', '', $_POST['birth_day']); // filter everything but numbers
	 $b_y = preg_replace('#[^0-9]#i', '', $_POST['birth_year']); // filter everything but numbers
     $email1 = $_POST['email1'];
     $email2 = $_POST['email2'];
     $pass1 = $_POST['password'];
     $pass2 = $_POST['re'];
     $email1 = stripslashes($email1); 
     $pass1 = stripslashes($pass1); 
     $email2 = stripslashes($email2);
     $pass2 = stripslashes($pass2); 
     $email1 = strip_tags($email1);
     $pass1 = strip_tags($pass1);
     $email2 = strip_tags($email2);
     $pass2 = strip_tags($pass2);
// Connect to database
     include_once "scripts/connect_to_mysql.php";
     $emailCHecker = mysql_real_escape_string($email1);
	 $emailCHecker = str_replace("`", "", $emailCHecker);
	 // Database duplicate username check setup for use below in the error handling if else conditionals
//	 $sql_uname_check = mysql_query("SELECT username FROM myMembers WHERE username='$username'"); 
  //   $uname_check = mysql_num_rows($sql_uname_check);
     // Database duplicate e-mail check setup for use below in the error handling if else conditionals
     $sql_email_check = mysql_query("SELECT email FROM myMembers WHERE email='$emailCHecker'");
     $email_check = mysql_num_rows($sql_email_check);
//Error handling for missing data
     if ((!$username) || (!$gender) || (!$b_m) || (!$b_d) || (!$b_y) || (!$email1) || (!$email2) || (!$pass1) || (!$pass2)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
  
     if(!$username){ 
       $errorMsg .= ' * User Name<br />';
     } 
     if(!$gender){ 
       $errorMsg .= ' * Gender: Confirm your sex.<br />';
     } 	
	 if(!$b_m){ 
       $errorMsg .= ' * Birth Month<br />';      
     }
	 if(!$b_d){ 
       $errorMsg .= ' * Birth Day<br />';        
     } 
	 if(!$b_y){ 
       $errorMsg .= ' * Birth year<br />';        
     } 		
	 if(!$email1){ 
       $errorMsg .= ' * Email Address<br />';      
     }
	 if(!$email2){ 
       $errorMsg .= ' * Confirm Email Address<br />';        
     } 	
	 if(!$pass1){ 
       $errorMsg .= ' * Login Password<br />';      
     }
	 if(!$pass2){ 
       $errorMsg .= ' * Confirm Login Password<br />';        
     } 	
	
     } else if ($email1 != $email2) {
              $errorMsg = 'ERROR: Your Email fields below do not match<br />';
     } else if ($pass1 != $pass2) {
              $errorMsg = 'ERROR: Your Password fields below do not match<br />';
     	 
     } else if (strlen($username) < 4) {
	           $errorMsg = "<u>ERROR:</u><br />Your User Name is too short. 4 - 20 characters please.<br />"; 
     } else if (strlen($username) > 20) {
	           $errorMsg = "<u>ERROR:</u><br />Your User Name is too long. 4 - 20 characters please.<br />"; 
     } 
	// else if ($uname_check > 0){ 
  //            $errorMsg = "<u>ERROR:</u><br />Your User Name is already in use inside of our system. Please try another.<br />"; 
//     }
	 else if ($email_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br />Your Email address is already in use inside of our system. Please use another.<br />"; 
     } else { // Error handling is ended, process the data and add member to database
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
     $email1 = mysql_real_escape_string($email1);
     $pass1 = mysql_real_escape_string($pass1);
	 
     // Add MD5 Hash to the password variable
     $db_password = md5($pass1); 
	  $_SESSION['db_password'] = $db_password;
	  	 $_SESSION['pass1'] = $pass1;
	 // Convert Birthday to a DATE field type format(YYYY-MM-DD) out of the month, day, and year supplied 
	 $full_birthday = "$b_y-$b_m-$b_d";

     // GET USER IP ADDRESS
     $ipaddress = getenv('REMOTE_ADDR');

     // Add user info into the database table for the main site table
     $sql = mysql_query("INSERT INTO myMembers (username,lastname, gender, birthday, email, password, ipaddress, sign_up_date) 
     VALUES('$username','$lname','$gender','$full_birthday','$email1','$db_password', '$ipaddress', now())")  
     or die (mysql_error());
 
     $id = mysql_insert_id();
	// echo $id;
	 $_SESSION['id'] = $id;
	 	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)		
     mkdir("members/$id", 0755);

//$_SESSION['step']=2;
echo '<script type="text/javascript">'
   , 'move();'
   , '</script>';



   } // Close else after duplication checks

} else { // if the form is not posted with variables, place default empty variables so no warnings or errors show
	  
	  $errorMsg = "";
      $username = "";
	  $gender = "";
	  $b_m = "";
	  $b_d = "";
	  $b_y = "";
	  $email1 = "";
	  $email2 = "";
	  $pass1 = "";
	  $pass2 = "";
}

?>
<!-- 
		Document   : index
		Created on : 7 Aug, 2011, 3:33:07 PM
		Author     : Sumit and Kaustubh
	-->
	<!DOCTYPE html>
	<html>
		<head><script src="js/jquery-1.4.2.js" type="text/javascript"></script>
	<script type="text/javascript">
	function validateform()
	{
	{
	var x=document.forms["form1"]["fname"].value;
	if (x==null || x=="")
	  {
	  alert("First name must be filled out");
	  return false;
	  }
	  }
	if(!document.form1.lname.value)
	{
	  alert("Please Fill Last name")
	 return false;
	}
	if(!document.form1.password.value)
	{
	  alert("Please Fill Password")
	 return false;
	}
   if(document.form1.password.value!=document.form1.re.value)
    {
	 alert("Password does not match.Please confirm password")
	return false;
	}
	if(!document.form1.email1.value)
	{
	
	   alert("Please Enter Email-address")
	    return false;
	   }
	    else
	    {
	    var x=document.forms["form1"]["email1"].value;
          var atpos=x.indexOf("@");
          var dotpos=x.lastIndexOf(".");
           if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
            {
           alert("Not a valid e-mail address");
             return false;
             }
      }
	
	//if(document.form1.sex.value == male || document.form1.sex.value == female)
	//{
 	       
     //      return true;
    // }
	// else
	// {
	// alert("Select ur gender")
	// return false;
	// }
	 
	if(!document.form1.day.value || !document.form1.month.value || !document.form1.year.value)
	{
	  alert("enter Birthday")
	  return false;
	}

}

	function checkuser()
	{
	var user = document.getElementById('user').value;
    var element = document.getElementById('labelUser');
	if(user.length<1)
	{
	element.innerHTML = "*";
	element.style.color="red";
	}
	else
	{

	}
}
	$(document).ready(function() {
	$("#username").blur(function() {
		$("#nameresponse").removeClass().text('Checking Username...').fadeIn(1000);
		$.post("scripts/check_signup_name.php",{ username:$(this).val() } ,function(data) {
		  	$("#nameresponse").fadeTo(200,0.1,function() { 
			  $(this).html(data).fadeTo(900,1);	
			});
        });
	});
});
function toggleSlideBox(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(300);
		} else {
			$('#'+x).slideUp(300);
		}
}
</script>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>Welcome to fribler!<?php echo $dyn_www; ?></title>
		   <style type="text/css">
				body
				{
					
					background-image: url(img/copy1.png);
					background-repeat:repeat-x,y;
					margin-top: 0px;
					margin-left: 0px;
					margin-right: 0px;
					border:0px;
					font-family:century gothic, arial;
				}
				 #aa
				{
				top:2px;
				right:650px;
				}
				
				
				input.user
				{
					background-color: white;
					border: 1px solid lightgrey;
					width:210px;
					height:40px;
					padding:5px 5px 5px 10px;
					border:none;
					font-size:16px;
					font-family:tahoma,verdana, arial;
					-moz-border-radius:4px;
					-webkit-border-radius:4px;
					border-radius:4px;
				}
				
				#ldr
				{
				margin-top:0px;
				right:650px;
				}
				
				 input.next
				{
					background-color:transparent;
					border-color: black;
					color: black;
					margin-top:10px;
					font-size:20px;
					padding:5px 5px 5px 10px;
					font-weight:bold;
					height:35px;
					width:80px;  
				}
				#content1
            {
            position: absolute;
            top: 35px;
            width:200px;
            left: 1000px;
            z-index: 1;
				div {
		position: relative;
		left: -100px;
		top: -300px;
					}
					td.border
					{
					border:1px;
					}
					table {
					
					  
					}
					
			</style>
		</head>
		<body onLoad="init()">

		<table>
		
	    <tr>
            <td colspan="2"><font color="#FF0000"><?php print "$errorMsg"; ?></font></td>
          </tr>
	</table>	
<center><div id="loading" style="position:absolute; width:100%; text-align:center; top:200px; left:30px;" >
<img src="images/loading1.gif" border=0></div><script type="text/javascript">
	 var ld=(document.all);
  var ns4=document.layers;
 var ns6=document.getElementById&&!document.all;
 var ie4=document.all;
  if (ns4)
 	ld=document.loading;
 else if (ns6)
 	ld=document.getElementById("loading").style;
 else if (ie4)
 	ld=document.all.loading.style;
  function init()
 {
 if(ns4){ld.visibility="hidden";}
 else if (ns6||ie4) ld.display="none";
 }
</script><table  align="center" style="padding-top : 20px ; font-size: 18px; font-family: tahoma,verdana" >
		
			<form name="form1" action="and1.php" onsubmit="return validateform()" method="post" style=" width: 500px; " >
			<br />
			
	<img src="img/ll1.png" alt="background image" id="aa" align="center";>
	<hr style="margin-top: 50px; ">
	<img src="img/l1.png" alt="background image" id="ldr" align="center";>
		
		<div><tr><td>First Name:</td><td> <label id='labeluser'></label><input type="text" id='user' onblur='checkuser();' name="fname" class="user"/></td></tr>
		<tr><td>Last Name:</td><td> <input type="text" name="lname" class="user"/></td></tr>
		<tr><td>Password:  </td><td><input type="password" name="password" class="user" AUTOCOMPLETE=OFF/></td></tr>
		<tr><td>Re-Password:</td><td> <input type="password" name="re" class="user" AUTOCOMPLETE=OFF/></td></tr>
		<tr><td>Email:</td><td ><input  class="user" name="email1" type="text" class="formFields" id="email1"  value="<?php print "$email1"; ?>" AUTOCOMPLETE=OFF /></td></tr>
		<tr><td>Confirm Email:</td><td ><input class="user" name="email2" type="text" class="formFields" id="email2" value="<?php print "$email2"; ?>" AUTOCOMPLETE=OFF/></td></tr><br/>
		<tr><td>Gender:</td><td><input type="radio" name="sex" value="male" checked="checked"/>Male 
		<input type="radio" name="sex" value="female"/>Female </td></tr>
		<tr><td>Birthday:</td><td> 
				<select name="birth_month" class="formFields" id="birth_month" class="user">
<option value="<?php print "$b_m"; ?>"><?php print "$b_m"; ?></option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select> 
<select name="birth_day" class="formFields"  class="user" id="birth_day">
<option value="<?php print "$b_d"; ?>"><?php print "$b_d"; ?></option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> 
<select name="birth_year"  class="user" class="formFields" id="birth_year">
<option value="<?php print "$b_y"; ?>"><?php print "$b_y"; ?></option>

<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>

</select></td></tr><tr><td></td><td><input type="image" src="img/nxt.png" value="Next" class="next"/>
</td></tr>		 </div>
	</form></center></table>	 </body>
	</html>