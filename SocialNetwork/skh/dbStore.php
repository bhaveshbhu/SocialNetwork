<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo 'Hello';
$con = mysql_connect("localhost", "root", "hellosql");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
     echo 'dbStore';
  mysql_select_db("try", $con);

$sql="INSERT INTO login (username, password)
VALUES
('$_POST[fname]','$_POST[pwd]]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM login");

while($row = mysql_fetch_array($result))
  {
  echo $row['username'] . " " . $row['password'];
  echo "<br />";
  }

mysql_close($con);
?>
