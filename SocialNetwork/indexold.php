<?php
// Start Session to enable creating the session variables below when they log in
session_start();

// Force script errors and warnings to show on page in case php.ini file is set to not display them
error_reporting(E_ALL);
ini_set('display_errors', '1');
//-----------------------------------------------------------------------------------------------------------------------------------
// Initialize some vars

$email = '';
$pass = '';
$remember = '';
if (isset($_POST['email'])) {
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	if (isset($_POST['remember'])) {
		$remember = $_POST['remember'];
	}
	$email = stripslashes($email);
	$pass = stripslashes($pass);
	$email = strip_tags($email);
	$pass = strip_tags($pass);
	
	// error handling conditional checks go here
	if ((!$email) || (!$pass)) { 

		$errorMsg = 'Please fill in both fields';

	} else { // Error handling is complete so process the info if no errors
		include 'scripts/connect_to_mysql.php'; // Connect to the database
		$email = mysql_real_escape_string($email); // After we connect, we secure the string before adding to query
	    //$pass = mysql_real_escape_string($pass); // After we connect, we secure the string before adding to query
		$pass = md5($pass); // Add MD5 Hash to the password variable they supplied after filtering it
		// Make the SQL query
        $sql = mysql_query("SELECT * FROM myMembers WHERE email='$email' AND password='$pass' AND email_activated='1'"); 
		$login_check = mysql_num_rows($sql);
        // If login check number is greater than 0 (meaning they do exist and are activated)
		if($login_check > 0){ 
    			while($row = mysql_fetch_array($sql)){
					
					// Pleae note: Adam removed all of the session_register() functions cuz they were deprecated and
					// he made the scripts to where they operate universally the same on all modern PHP versions(PHP 4.0  thru 5.3+)
					// Create session var for their raw id
					$id = $row["id"];  
$login =$row["login_first"];					
					$_SESSION['id'] = $id;
					// Create the idx session var
					$_SESSION['idx'] = base64_encode("g4p3h9xfn8sq03hs2234$id");
                    // Create session var for their username
					$username = $row["username"];
					$_SESSION['username'] = $username;
					// Create session var for their email
					$useremail = $row["email"];
					$_SESSION['useremail'] = $useremail;
					// Create session var for their password
					$userpass = $row["password"];
					$_SESSION['userpass'] = $userpass;

					mysql_query("UPDATE myMembers SET last_log_date=now() WHERE id='$id' LIMIT 1");
        
    			} // close while
	
    			// Remember Me Section
    			if($remember == "yes")
				{
                    $encryptedID = base64_encode("g4enm2c0c4y3dn3727553$id");
    			    setcookie("idCookie", $encryptedID, time()+60*60*24*100, "/"); // Cookie set to expire in about 30 days
			        setcookie("passCookie", $pass, time()+60*60*24*100, "/"); // Cookie set to expire in about 30 days
    			} 
    			// All good they are logged in, send them to homepage then exit script
				if($login==0)
				    {
						
					    header("location: addcollege_form/a-page.php?test=$id"); 
    			        exit();
	               }
			 else
				   {
				   header("location: dashboard.php?test=$id"); 
				   exit();
				   }
				   
	
		} 
		else 
		{ // Run this code if login_check is equal to 0 meaning they do not exist
		    echo 'Incorrect login data, please try again';
		}


    } // Close else after error checks

} //Close if (isset ($_POST['uname'])){

?> 


<!-- 
    Document   : index
    Created on : 7 Aug, 2011, 3:33:07 PM
    Author     : Sumit and Kaustubh
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to fribler!</title>
<link href="bk.css" rel="stylesheet" type="style/text" media="all" />
    </head>
    <body>
       
        <table border="0" cellspacing="0" cellpadding="0">
<tr>
                <td width="40%" valign="top">
               <img src="images/headerLogo.png" />                   
                </td>
                
                <td width="45%" nowrap style="font-size:13px;">
          <br/>
                   
                    Login <br/>
                    <form action="index.php" method="post" enctype="multipart/form-data" name="signinform" id="signinform">
                     Email: <input name="email" type="text" id="email" " /> &nbsp;
                     &nbsp;
                     &nbsp;
                     Password: <input name="pass" type="password" id="pass" maxlength="24" "/>
                    
                     <input type="submit" name="login" value="Log In" class="button" align="right" /> 
<tr>
      <td align="right">&nbsp;</td>
      <td><input name="remember" type="checkbox" id="remember" value="yes" checked="checked" />
        Remember Me</td>
    </tr>                  
				  </form>
                </td>
    <td width="15%"></td>
            </tr>
            <tr>
               <td>
                 
               </td>
               <td>
                    
               </td> 
               <td style="font-size:18px;font-weight:bold;">
                                      Sign UP <br/> <div style="text-align: right;margin-right: 125px;font-size:13px">using</div>
               </td> 
           </tr>
          
           <tr>
               <td></td>
               <td></td>
               
               <td class="otherSites">
                   <form action="and1.php" method="post">
                       <br/>
                      
                       <img src="images/fbicon.png" valign="center" />
                       <br/>
                       <br/>
                 
                       <img src="images/google.png" />
                       <br/>
                       <br/>
                     
                       &nbsp; &nbsp;<img src="images/fliber.png" />
                       <br/>
                       <br/>
                      
                       <br/>
                       <center><input type="submit" name="signup" value="Sign UP" class="signup"/></center>
                       <br/>
                      
                   </form>
               </td>
           </tr>
            
      </table>
    <center><img src="images/logo.png"/></center>
    
               </body>
</html>