<?php
session_start();
include("connect.php");
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='mystyle.css' />";
echo "</head>";
echo "<div id='Layer1'>";
$i = $_SESSION['id'];
echo $i;
$qw = "SELECT username from login WHERE uid =".$i;
echo $qw;
$re = mysql_query($qw) or die(mysql_error());
$row = mysql_fetch_array($re);
$un = $row['username'];
echo "<h2>".$un."</h2>";
echo "</div>";
?>