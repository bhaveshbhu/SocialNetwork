<?php
include("../scripts/connect_to_mysql.php");
/*$sql = "CREATE TABLE info
(
CampID int NOT NULL,
PRIMARY KEY(CampID),
FullName varchar(50),
ShortName varchar(15),
Website varchar(20),
Motto varchar(50),
Est int,
Location varchar(25),
type varchar(25),
Phone int,
Dean varchar(30),
Director varchar(30),
Email varchar(25),
Area int
)";*/
$sql = "CREATE TABLE mod
(
admin varchar(20),
pass varchar(20)
)";

// Execute query
mysql_query($sql,$con);
?> 