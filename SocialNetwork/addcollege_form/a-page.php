<?php
session_start();
	
	if(isset($_SESSION['useremail']))
 {

 echo 'you are logged in as : '.$_SESSION['useremail'].' <br />';
 echo '<a href="../logout.php">LOG OUT</a> <br />';
 echo $_SESSION['username'];
 }
 else
 {
 if (isset($userid))
 {
 echo 'could not log you in .<br />';
 }
 else
 {
 header("Location: ../index1.php");
 }
 }
 ?>
<?PHP
require_once('popup-contactform.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
	   <style type="text/css">
     		body
				{
					background-image: url(images/back.png);
					
					margin-top: 0px;
					margin-left: 0px;
					margin-right: 0px;
					border:0px;
					font-family:century gothic, arial;
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


			</style>
      <link rel="STYLESHEET" type="text/css" href="popup-contact.css">
</head>
<body onload="javascript:fg_hideform('fg_formContainer','fg_backgroundpopup');">
<P><BR /><BR /><BR /><BR /><BR /><BR />
<form name="form1" action="../page/upd.php" method="post">
<table align="CENTER" border="0" ><tr>
<td VSPACE="20">
<?php
include_once("../page/connect.php");
//$q = "SELECT * FROM info WHERE info.appr = 'y'";
//$res = mysql_query($q);

$qu = "SELECT Campus FROM details WHERE 1";
//echo $q;
$res = mysql_query($qu) or die(mysql_error());
?>
Join a Campus:</td><td>
				<select name="CampList">
				<?php
while($row = mysql_fetch_array($res))
{
	echo "<option value='".$row['Campus']."' >".$row['Campus']."</option>";
	}
?>
		  </select></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><BR />
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr><td></td><td><input type="submit" value="next" class="next"/ ></td></tr><tr><td></td><td><br />OR</td></tr></table>
		</form><form action="../join_institute.php" method="post"><input type="submit" value="Skip" /></form>
</P><p>
<a href='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");'
><img border='0' src='contact-us-button.png' width='130' height='25' hspace="500" vspace="40"/></a>
</p>	

<?PHP
//3. php include contactform-code.php at the end of the page

require_once('contactform-code.php');
?>

</body>
</html>