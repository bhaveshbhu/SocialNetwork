<?php
session_start();
include("connect.php");
/*$q = "CREATE TABLE events
(eventID INT,
depID INT,
//mysql_query($q, $con);
/*$q = "ALTER TABLE details
CHANGE Faculty Faculty INT DEFAULT 0,
CHANGE Student Student INT DEFAULT 0,
//$q = "ALTER TABLE `dept` CHANGE `tl_year` `tl_year` INT( 11 ) NOT NULL DEFAULT '0'";
//$q = "ALTER TABLE details
 //ADD Area varchar(50)";
 $q = "ALTER TABLE events
 CHANGE eventID eventID INT NOT NULL AUTO_INCREMENT";
 $fname = "IIT-R";*/
 $q = "SELECT * FROM details WHERE CampID = 24";
 
//$q = "UPDATE details SET adminID = 51 WHERE CampID = 17";

//$q = "INSERT INTO dept VALUES(1, 17, 0, 0, 0, 'AKkjjijuhy', 'Mechanical Engineering', 'abc.jpg')";
$res = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($res);
echo $row['Campus']."<br />";
echo $row['adminID']."<br />";
//$b = rename($fname.".xml", $row['Campus'].".xml");
 //$count = mysql_num_rows($res);
//echo $count;
?>