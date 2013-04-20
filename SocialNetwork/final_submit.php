<?php
session_start();
if(!isset($_SESSION['email1']))
{
header("Location: index1.php");
}
include_once("scripts/connect_to_mysql.php");
$email1 = $_SESSION['email1'];
$id = $_SESSION['id'];
$db_password = $_SESSION['db_password'];
$pass1 = $_SESSION['pass1']; 
$dyn_www = $_SERVER['HTTP_HOST']; 
$username = $_SESSION['username'];
$to = "$email1";									 
$from =$dyn_www;
$subject = 'Complete Your ' . $dyn_www . ' Registration';
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

    mail($to, $subject, $message,$headers);
$msgToUser = "<strong><font color=\"#990000\"><h2>One Last Step - Activate through Email</h2></font></strong><h4>$username, there is one last step to verify your email identity:</h4><br />
   In a moment you will be sent an Activation link to your email address.<br /><br />
   <br />
   ";
 include_once 'msgToUser.php'; 
session_destroy();
   exit();
?>