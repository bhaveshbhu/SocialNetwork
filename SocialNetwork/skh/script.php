<?php
session_start();
include("connect.php");
$res = mysql_query("DELETE * FROM images");
/*while($row = mysql_fetch_array($res))
{
	//echo $row['fileName']."/t".$row['uid'];
}*/
?>