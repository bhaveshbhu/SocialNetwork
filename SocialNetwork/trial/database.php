<body style="background-color:pink;height:1200">
<div style="width:100%;height:15%;back;background-color:blue;position:absolute;left:0%;top:0%;color:white"><h1 align="center">zip power</h1>

</div>
<div style="width:100%;height:15%;back;background-color:white;position:absolute;left:0%;top:15%;color:red">
<h1>zip follower list</h1>
<?php
$con = mysql_connect("fribler.db.8559473.hostedresource.com","fribler","K33pW0rk!ng");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("fribler", $con);
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["password"]);
$email = mysql_real_escape_string($_POST["email"]);
$phone = mysql_real_escape_string($_POST["phone"]);
$hostel = mysql_real_escape_string($_POST["hostel"]);
$room = mysql_real_escape_string($_POST["room"]);
$result = mysql_query("SELECT * FROM client");
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "<table border='1'>
<tr>
<td>s.no.</td>
<td>username</td>
<td>hostel</td>
<td>phone</td>
<td>room</td>
<td>email</td>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['hostel'] . "</td>";
  echo "<td>" . $row['phone'] . "</td>";
  echo "<td>" . $row['room'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "</tr>";
  }
echo "</table>";



