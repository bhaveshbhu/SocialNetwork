<?php
session_start();
include("connect.php");
$qu = "SELECT Campus FROM details WHERE 1";
echo $q;
$res = mysql_query($qu) or die(mysql_error());
//$row = mysql_fetch_array($res);
?>
<html>
<head>
<script language="javascript">
<!--

var state = 'none';

function showhide(layer_ref) {

if (state == 'block') {
state = 'none';
}
else {
state = 'block';
}
if (document.all) { //IS IE 4 or 5 (or 6 beta)
eval( "document.all." + layer_ref + ".style.display = state");
}
if (document.layers) { //IS NETSCAPE 4 or below
document.layers[layer_ref].display = state;
}
if (document.getElementById &&!document.all) {
hza = document.getElementById(layer_ref);
hza.style.display = state;
}
}
//-->
</script>
</head>
<body>
Join A Campus
<form method="post" action="join.php">
<select name="CampList">
<?php
while($row = mysql_fetch_array($res))
{
	echo "<option value='".$row['Campus']."'>".$row['Campus']."</option>";
	}
?>
 </select>
<input type="Submit" Value="Next" />
</form>
OR
<form method="post" action="NewPage.html">
<input type="Submit" Value="Add New Campus" />
</form>
<?php
mysql_connect("fribler.db.8559473.hostedresource.com","fribler","K33pW0rk!ng") or die (mysql_error());
mysql_select_db("fribler") or die (mysql_error());
$q = "SELECT * FROM mod WHERE id = '".$_SESSION['email']."'";
$res12 = mysql_query($q);
$count = mysql_num_rows($res12);
if(count > 0)
{
	echo "showhide('div1');";
	echo "<div id='div1' style='display: none;'>
	<form action='app.php' method='post' id='abc'>
	<input type='sumbit' value='VIEW PENDING APPROVAL' />
	</form></div>";
}
?>
</body>
</html>