<?php
session_start();
// Force script errors and warnings to show on page in case php.ini file is set to not display them
error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie
if (isset($_COOKIE['idCookie'])) {
    setcookie("idCookie", '', time()-42000, '/');
	setcookie("passCookie", '', time()-42000, '/');
}
// Destroy the session variables
session_destroy();
// Check to see if their session is in fact destroyed
if(!isset($_SESSION['useremail']))
{ 
header("Location: index1.php"); 
} 
else {
print "<h2>Could not log you out, sorry the system encountered an error.</h2>";
exit();
} 
?> 