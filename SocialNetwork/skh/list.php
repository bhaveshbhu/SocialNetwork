<?php
include_once("connect.php");
$qu = "SELECT Campus FROM details WHERE 1";
echo $q;
$res = mysql_query($qu) or die(mysql_error());
?>
<html>
<head>
</head>
<body>
<form method="post" action="inter.php">
<select name="CampList">
<?php
while($row = mysql_fetch_array($res))
{
	echo "<option value='".$row['Campus']."'>".$row['Campus']."</option>";
	}
?>
<option value="Add New Campus">Add New Campus</option>
 </select>
<input type="Submit" Value="Next" />
</form>
</body>
</html>