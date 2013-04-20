<?php
include("connect.php");
$q = "SELECT * FROM events";
$res = mysql_query($q);
$i = 0;
while($i < mysql_num_fields($res))
{
$meta = mysql_fetch_field($res, $i);
echo $meta->name."  ";
echo $meta->type."  ";
echo $meta->zerofill."  ";
echo $meta->primary_key."<br />";
$i++;
}
?>