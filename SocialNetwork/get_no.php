<?php
include('scripts/connect_to_mysql.php');
?>
<?php
//echo $logOptions_id;
$id=$_POST['id'];
$sql1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$id' LIMIT 1"); 
while($row = mysql_fetch_array($sql1)){ 
    $friend_array = $row["friend_array"];
	}
	if ($friend_array  != "") 
{ 
	$friendArray = explode(",", $friend_array);
	$friendCount = count($friendArray);
	echo $friendCount; 
	}
	else
	echo "0";
?>
