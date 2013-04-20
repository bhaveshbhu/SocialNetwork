<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$email = '';
$pass = '';
$remember = '';
$incorrect=0;
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
	if ((!$email) || (!$pass)) { 
$errorMsg = 'Please fill in both fields';
} else { 
		include 'scripts/connect_to_mysql.php'; 
		$email = mysql_real_escape_string($email); 
	    //$pass = mysql_real_escape_string($pass); // After we connect, we secure the string before adding to query
		$pass = md5($pass); // Add MD5 Hash to the password variable they supplied after filtering it
		// Make the SQL query
    $sql = mysql_query("SELECT * FROM myMembers WHERE email='$email' AND password='$pass' AND email_activated='1'"); 
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
    			while($row = mysql_fetch_array($sql)){
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
				   header("location: home.php?id=$id"); 
				   exit();
				   }
				   } 
		else 
		{ // Run this code if login_check is equal to 0 meaning they do not exist
		    $incorrect=1;
		   // echo 'Incorrect login data, please try again';
		}} // Close else after error checks
} //Close if (isset ($_POST['uname'])){

?> 
<!-- 
    welcome to www.fribler.com
-->
<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to fribler</title>
       <style type="text/css">
            body
            {
                background: url(img/copy1.png);
                background-repeat:repeat;
                font-family:tahoma,verdana, arial;
            }
			#maincontainer{
				width: 1024px; /*Width of main container*/
				margin: 0 auto; /*Center container on page*/
				background: #00CC00;
}
            #content1
            {
				position: absolute;
				top: 35px;
				width:200px;
				left: 1000px;
				z-index: 1;
            }
            #aa
            {
				position: absolute;
				top:20px;
				right:900px;
            }
            #content2
            {
				position: absolute;
				top:180px;
				width: 450px;
				right:760px;
				z-index: 1;
            }
            #content3
            {
				position: absolute;
				top:190px;
				width: 200px;
				left: 999px;
				z-index: 1;
            }
            #asd
            {
				position: absolute;
				top: 195px;
				left: 15%;
            }
            input.user
            {
				background-color: white;
				width:191px;
				height:28px;
				padding:5px 5px 5px 10px;
				border:none;
				border: 1px solid lightgrey;
				font-size:16px;
				font-family:tahoma,verdana, arial;
				-moz-border-radius:4px;
				-webkit-border-radius:4px;
				border-radius:4px;
            }
			
            a{
				text-decoration:none;
				color:black;
            }
			#topsection{
background: Transparent;
height: 80px; /*Height of top section*/
width : auto;
text-align: center;
}
#leftcolumn{
float: left;
width: 530px; /*Width of left column in pixel*/
margin-left: 100px; /*Set margin to that of -(MainContainerWidth)*/
background: Transparent;
}
#rightcolumn{
float: right;
width: 190px; /*Width of right column*/
margin-left: -190px; /*Set left margin to -(RightColumnWidth)*/
margin-right: 20px;
background: Transparent;
}

.innertube{
margin: 10px; /*Margins for inner DIV inside each column (to provide padding)*/
margin-top: 0;
background: Transparent;
}
  
        </style>
        </head>
    <body>
	<div id="maincontainer">

<div id="topsection"><div id="leftcolumn" > <img src="./img/ll1.png" style=" float:left;" alt="Fribler Corporation"></div>
            <div id="rightcolumn">
                <h1 align="center">I Want to</h1>
                <form action="signup.php" method="post">
				<input type="image" src="img/box1.png" value="Sign UP" class="signup" name="image"><input type="radio" name="group2" value="student">Student
<input type="radio" name="group2" value="faculty">Faculty<br></form>
            </div>
			</div>
			</div>
			
            <!-- <img src="img/cc1.png" alt="background image" width="70%" id="asd"> !-->
            <br><br><br><hr <hr style="margin-top: 20px;"> 
<div id="maincontainer" style= "background: url(img/cc1.png);height:450px; margin-top:20px;" >
            <div id="leftcolumn">
                <h1 align="left" style=" Color:white; text-shadow: 0.1em 0.1em 0.2em black;" >Welcome to the world's first<br>
                official Social Network</h1>
            </div>
            <div id="rightcolumn">
                <form action="index1.php" method="post" enctype="multipart/form-data" name="signinform" id="signinform" style="width:200px;">
                    <input type="text" name="email" id="email" placeholder="Email id"  class="user" "><br>
					</br>
                    <input input name="pass" type="password" id="pass" placeholder="Password"  class="user" maxlength="24" "><br>
					<a style=" color:red; font-size:12px; display:block; font-weight:bold;">
					<?php 
					
					if($incorrect==1)
					{
					echo ' Incorrect login Credientials ' ;
					
					}
					
					?> </a>
					
					<input type="checkbox" name="rem" id="remember" value="yes"><strong><font size="1">Remember Me</font></strong>
                    <a href=""><strong><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;Forgot Password</font></strong></a><br><br>
					<input type="image" src="img/li.png" value="Log In" class="Log in" name="login"></form>
                    </form>
        </div>
    
                            
		</div>
               </body>
</html>