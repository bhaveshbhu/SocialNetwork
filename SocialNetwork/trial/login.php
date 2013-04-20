<?php 
// Connect to the database
include 'connect_to_mysql.php'; // Connect to the database

// Set username and password variables for this script
$user = mysql_real_escape_string($_POST["username"]);
$pass = mysql_real_escape_string($_POST["password"]); 
//echo $user;
//echo "</br>";
//echo $pass;
//echo "</br>";


// Make sure the username and password match, selecting all the client's
// data from the database if it does. Store the data into $clientdata
$clientdata = mysql_query("SELECT * FROM client WHERE username='$user' and password='$pass'")
 or die (mysql_error());
while($cdrow=mysql_fetch_array($clientdata) )

  {	
    $user_id=$cdrow[user_id]; 
		
	
}
 
// Put the $clientdata query into an array we can work with


// If the username and password matched, we should have one entry in our
// $clientdata array. If not, we should have 0. So, we can use a simple
// if/else statement
$r=mysql_num_rows($clientdata);
//echo $r;

if(mysql_num_rows($clientdata) == 1){
	// Start a new blank session. This will assign the user's server
	// with a session with an idividual ID
	session_start();

	// With our session started, we can assign variables for a logged
	// in user to use until they log out.
	$_SESSION['username'] = $user;
	$_SESSION['user_id'] = $user_id;
	header('Location: profile.php');
	echo $_SESSION['username'];
	echo $_SESSION['user_id'];
}
else
{

		   include 'try.php';
		   echo "<h3 style='color:red;position:absolute;top:100'>";
		   echo $user.$pass.mysql_num_rows($clientdata)."<br>";
		   echo "The username and password don't match. Please try again.</h3>;
           ";
			}