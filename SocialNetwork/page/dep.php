<?php
session_start();
include("connect.php");
$q = "SELECT depName FROM dept WHERE CampID = ".$_SESSION['clg'];
$res = mysql_query($q);
?>
<html>
<head>
</head>
<body>
<form action="depPro" method="post">
<select name="CampList">
				<?php
while($row = mysql_fetch_array($res))
{
	echo "<option value='".$row['depName']."' >".$row['depName']."</option>";
	}
?>
		  </select>
		  </form>
</body>
</html>