<?php
session_start();
include("connect.php");
/*if(isset($_SESSION['useremail']))
 {

 echo 'you are logged in as : '.$_SESSION['email'].' <br />';
 echo '<a href="../logout.php">LOG OUT</a> <br />';
 echo $_SESSION['username'];
 }
 else
 {
	if (isset($_SESSION['id']))
	{
		echo 'could not log you in .<br />';
	}
	else
	{
		header("Location: ../index1.php");
	}
 }*/
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
	  <link rel="STYLESHEET" type="text/css" href="popup-contact.css">
</head>

<!--<table align="CENTER" border="0" ><tr>
<td VSPACE="20">-->
<?php
//include("connect.php");
//include_once("updclg.php");
//$q = "SELECT * FROM info WHERE info.appr = 'y'";
//$res = mysql_query($q);

$qu = "SELECT Campus FROM details WHERE appr = 'y'";
//echo $q;
$res = mysql_query($qu) or die(mysql_error());
if($_REQUEST['id'])
{
	echo "<form name='form1' action='../page/upd.php' method='post'>";
	echo "Join a Campus:</td><td>
				<select name='CampList'>";
while($row = mysql_fetch_array($res))
{
	echo "<option value='".$row['Campus']."' >".$row['Campus']."</option>";
}
	echo "</select><input type='submit' value='next' class='next'/ ><br />OR
		</form><form action='NewPage.html' method='post'><input type='submit' value='Request New Campus' /></form>";
}
else
{
	echo "<form method='post' action='app.php'><input type='submit' value='View Pending Approvals' /></form>";
}
?>
</P><p>
</body>
</html>