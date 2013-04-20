<?php 
session_start();
include_once("scripts/checkuserlog.php");
include("scripts/connect_to_mysql.php");
$sq1=mysql_query("UPDATE myMembers SET lastactivity = '".time()."' WHERE id='".$logOptions_id."';");
$sq2=mysql_query("SELECT id FROM myMembers WHERE loggedin='1' AND id!='$logOptions_id' AND lastactivity > '".(time()-60)."'; ");
$numloggedin = mysql_affected_rows(); 
$i='0';
if($numloggedin>0)
{
$outputList = '';
while($row = mysql_fetch_array($sq2)) { 
$i=$i+1;
$idlist = $row["id"];
$outputList .= $idlist.',';
}
}
else
{
$i= '0';
}
echo "hii";
?>