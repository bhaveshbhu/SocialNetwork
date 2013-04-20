<body style="background-color:pink;height:1200">
<div style="width:100%;height:15%;back;background-color:blue;position:absolute;left:0%;top:0%;color:white"><h1 align="center">zip power</h1>

</div>
<div style="width:100%;height:18%;back;background-color:white;position:absolute;left:0%;top:15%;color:red">
<h2>response from the server</h2>
<?php
include 'connect_to_mysql.php'; // Connect to the database
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["password"]);
$email = mysql_real_escape_string($_POST["email"]);
$phone = mysql_real_escape_string($_POST["phone"]);
$hostel = mysql_real_escape_string($_POST["hostel"]);
$room = mysql_real_escape_string($_POST["room"]);

$query = "SELECT * FROM client";
$result = mysql_query($query) or die(mysql_error()); // Get an array with the clients
while($row = mysql_fetch_array($result)){ // For each instance, check the username
	if($row['username'] == $username){
		$usernameTaken = true;
		break;
	}else{$usernameTaken = false;}
}

// If the username is invalid, tell the user.
// Or else if the password is invalid, tell the user.
// Or else if the email or PayPal address is invalid, tell the user.
// Else, if everything is ok, insert the data into the database and tell
   // the user they’ve successfully signed up.

if($usernameTaken)
{
	echo "That username has been taken.";
	echo "</br><a href='try.htm'>back</a>";
}
else if(!preg_match('/^[a-zA-Z0-9]+$/', $username)) // If our username is invalid
{
     echo "The username can only contain letters or numbers.";
	 // Tell the user
	echo "</br><a href='try.htm'>back</a>";
	 }
else if(!preg_match('/^[a-zA-Z0-9]+$/', $password)) // If our password is invalid
{
     echo "The password can only contain letters or numbers."; 	echo "</br><a href='try.htm'>back</a>";// Tell the user
}
// If our email or PayPal addresses are invalid
else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $email))
{
     echo "The email or PayPal address you entered is invalid."; 	echo "</br><a href='try.htm'>back</a>";// Tell the user
}
else if(!preg_match('/^[0-9]+/', $phone)) // If our password is invalid
{
   echo "not a valid phone num";	echo "</br><a href='try.htm'>back</a>"; // Tell the user
}
else if(!preg_match('/^[a-zA-Z]/', $hostel)) // If our username is invalid
{
     echo "hostel does not exist.";	echo "</br><a href='try.htm'>back</a>"; // Tell the user
}
else if(!preg_match('/^[0-9]+/', $room)) // If our username is invalid
{


     echo "no such room is possible.";	echo "</br><a href='try.htm'>back</a>"; // Tell the user
}
else
{
MYSQL_QUERY(
		 "INSERT INTO client (username, password, email, phone, hostel, room)".
		 "VALUES ('$username', '$password', '$email', '$phone', '$hostel', '$room')"
		 );
		$cdquery="select * from client";
	$cdresult=mysql_query($cdquery);
	$r=mysql_num_rows($cdresult);
		 
echo "Thanks for creating zip account--no. of reg=$r";
echo "</br>";
echo "<a href='database.php' target='new'>see mor</a>";

echo "</br><a href='try.php'>click here to login now</a>";

}
?> </div>