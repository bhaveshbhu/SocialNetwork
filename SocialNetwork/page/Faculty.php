<?php
session_start();
include("connect.php");
echo "<html>
<head>
</head>
<body>
<form action='main1.php?clgid=".$_SESSION['clg']."' method='post'>
Year of Joining<select name='JoinYr'>";
  for($i = 1990; $i <= 2010; $i++)
	echo "<option value='".(string)$i."'>".$i."</option>";
echo "</select>
Department<select name='PassYr'>";
  for($i = 1990; $i <= 2010; $i++)
	echo "<option value='".(string)$i."'>".$i."</option>";
echo "</select>
<input type='Submit' value='Next' />
</form>
</body>
</html>";
?>