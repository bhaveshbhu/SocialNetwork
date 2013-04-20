


<?php

// Start_session, check if user is logged in or not, and connect to the database all in one included file
include_once("scripts/checkuserlog.php");
?>
<?php
$from = ""; // Initialize the email from variable
// This code runs only if the username is posted
if (isset ($_POST['fname'])){
	 
	$username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['fname']); // filter everything but letters and numbers
//	  $lname = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['lname']); // filter everything but letters and numbers
	 $gender = preg_replace('#[^a-z]#i', '', $_POST['sex']); // filter everything but lowercase letters
	 $b_m = preg_replace('#[^0-9]#i', '', $_POST['month']); // filter everything but numbers
     $b_d = preg_replace('#[^0-9]#i', '', $_POST['day']); // filter everything but numbers
	 $b_y = preg_replace('#[^0-9]#i', '', $_POST['year']); // filter everything but numbers
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
	 $sql_uname_check = mysql_query("SELECT username FROM myMembers WHERE username='$fname'"); 
     $uname_check = mysql_num_rows($sql_uname_check);
     // Database duplicate e-mail check setup for use below in the error handling if else conditionals
     $sql_email_check = mysql_query("SELECT email FROM myMembers WHERE email='$emailCHecker'");
     $email_check = mysql_num_rows($sql_email_check);
/ Error handling for missing data
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
     } else if ($humancheck != "") {
              $errorMsg = 'ERROR: The Human Check field must be cleared to be sure you are human<br />';		 
     } else if (strlen($username) < 4) {
	           $errorMsg = "<u>ERROR:</u><br />Your User Name is too short. 4 - 20 characters please.<br />"; 
     } else if (strlen($username) > 20) {
	           $errorMsg = "<u>ERROR:</u><br />Your User Name is too long. 4 - 20 characters please.<br />"; 
     } else if ($uname_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br />Your User Name is already in use inside of our system. Please try another.<br />"; 
     } else if ($email_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br />Your Email address is already in use inside of our system. Please use another.<br />"; 
     } else { // Error handling is ended, process the data and add member to database
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
     $email1 = mysql_real_escape_string($email1);
     $pass1 = mysql_real_escape_string($pass1);
	 
     // Add MD5 Hash to the password variable
     $db_password = md5($pass1); 
	 
	 // Convert Birthday to a DATE field type format(YYYY-MM-DD) out of the month, day, and year supplied 
	 $full_birthday = "$b_y-$b_m-$b_d";

     // GET USER IP ADDRESS
     $ipaddress = getenv('REMOTE_ADDR');

     // Add user info into the database table for the main site table
     $sql = mysql_query("INSERT INTO myMembers (username, gender, birthday, email, password, ipaddress, sign_up_date) 
     VALUES('$username','$gender','$full_birthday','$email1','$db_password', '$ipaddress', now())")  
     or die (mysql_error());
 
     $id = mysql_insert_id();
	 
	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)		
     mkdir("members/$id", 0755);	

    //!!!!!!!!!!!!!!!!!!!!!!!!!    Email User the activation link    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $to = "$email1";
										 
    $from = $dyn_www; // $adminEmail is established in [ scripts/connect_to_mysql.php ]
    $subject = 'Complete Your ' . $dyn_www . ' Registration';
    //Begin HTML Email Message
    $message = "Hi $username,

   Complete this step to activate your login identity at $dyn_www

   Click the line below to activate when ready

   http://$dyn_www/activation.php?id=$id&sequence=$db_password
   If the URL above is not an active link, please copy and paste it into your browser address bar

   Login after successful activation using your:  
   E-mail Address: $email1 
   Password: $pass1

   See you on the site!";
   //end of message
	$headers  = "From: $from\r\n";
    $headers .= "Content-type: text\r\n";

    mail($to, $subject, $message, $headers);
	
   $msgToUser = "<h2>One Last Step - Activate through Email</h2><h4>$username, there is one last step to verify your email identity:</h4><br />
   In a moment you will be sent an Activation link to your email address.<br /><br />
   <br />
   <strong><font color=\"#990000\">VERY IMPORTANT:</font></strong> 
   If you check your email with your host providers default email application, there may be issues with seeing the email contents.  If this happens to you and you cannot read the message to activate, download the file and open using a text editor.<br /><br />
   ";
   
   include_once 'msgToUser.php'; 
   exit();

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
					background-image: url(images/box2.png);
					background-repeat:repeat-x,y;
					margin-top: 0px;
					margin-left: 0px;
					margin-right: 0px;
					border:0px;
					font-family:century gothic, arial;
				}
				input.user
				{
					font-family:century gothic;
					font-size:12px;
					color:blue;
					border-color: green;
					
				}
				 input.next
				{
					background-color:#33CC33;
					border-color: black;
					color: black;
					font-size:15px;
					font-weight:bold;
					height:30px;
					width:60px;  
				}
				div {
		position: relative;
		left: -100px;
		top: -300px;
					}
			</style>
		</head>
		<body>
			<form name="form1" action="register.php" onsubmit="return validateform()" method="post" >
		<center><img src="images/1.png" vspace="60"/>
		<div>First Name: <label id='labeluser'></label><input type="text" id='user' onblur='checkuser();' name="fname" class="user"/><br/>
		Last name: <input type="text" name="lname" class="user"/> <br/>
		Password:  <input type="password" name="password" class="user"/><br />
		Re-Password: <input type="password" name="re" class="user"/><br />
		Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="email1" type="text" class="formFields" id="email1" value="<?php print "$email1"; ?>"  /><br/>
		Confirm Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="email2" type="text" class="formFields" id="email2" value="<?php print "$email2"; ?>" /><br/>
		gender: &nbsp;&nbsp;&nbsp; <input type="radio" name="sex" value="male" checked="checked"/>male 
		<input type="radio" name="sex" value="female"/>female <br/>
		Birthday: 
				<select name="day">
				<option value=""></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
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
		   <select name="month">
		    <option value=""></option>
			   <option value="january">January</option>
			   <option value="february">February</option>
			   <option value="january">March</option>
			   <option value="january">April</option>
			   <option value="january">May</option>
			   <option value="january">June</option>
			   <option value="january">July</option>
			   <option value="january">August</option>
			   <option value="january">September</option>
			   <option value="january">October</option>
			   <option value="january">November</option>
			   <option value="january">December</option>
		   </select>
		   <select name="year">
		   <option value=""></option>
					<option value="1975">1975</option>
					<option value="1976">1976</option>
					<option value="1977">1977</option>
					<option value="1978">1978</option>
					<option value="1979">1979</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992">1992</option>
					<option value="1993">1993</option>
					<option value="1994">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
		   </select>
		   <br/><br/><input type="submit" value="Next" class="next"/>
		 </div></center>
	</form><table>
	    <tr>
            <td colspan="2"><font color="#FF0000"><?php print "$errorMsg"; ?></font></td>
          </tr>
</table>	 </body>
	</html>