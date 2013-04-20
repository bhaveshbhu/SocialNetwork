<?php
session_start();
include("connect.php");
$q = "SELECT * FROM details WHERE appr = 'n'";
$res = mysql_query($q);

?>
<html>
<head>
</head>
<body>
<form method="post" action="proapp.php">
Pending Approvals<br />
<?php
echo "<table border='2'>";
while($row = mysql_fetch_array($res))
{
	echo "<tr>";
	echo "<td>".$row['Campus']."</td><td>".$row['ShortName']."</td><td>".$row['Website']."</td><td>".$row['Motto']."</td><td>".$row['Est']."</td><td>".$row['Location']."</td><td>".$row['type']."</td><td>".$row['Dean']."</td><td>".$row['Director']."</td><td>".$row['Email']."</td>";
	echo "<td>Yes<input type='radio' value='yes' name='".$row['CampID']."' />No<input type='radio' value='no' name='".$row['CampID']."' />Later<input type='radio' value='later' name='".$row['CampID']."' /></td>";
	echo "</tr>";
	echo "<br />";	
}
?>
</table>
<input type="submit" value="Done" />
</form>
</body>
</html>