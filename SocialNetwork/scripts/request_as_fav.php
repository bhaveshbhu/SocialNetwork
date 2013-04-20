<?php
session_start();
$thisWipit = $_POST['thisWipit'];
$sessWipit = base64_decode($_SESSION['wipit']);
//
if (!isset($_SESSION['wipit']) || !isset($_SESSION['idx'])) {
	echo  'Error: Your session expired from inactivity. Please refresh your browser and continue.';
    exit();
}
//
if ($sessWipit != $thisWipit) {
	echo  'Error: Forged submission';
    exit();
}
//
if ($thisWipit == "") {
	echo  'Error: Missing Data';
    exit();
}
include_once "connect_to_mysql.php"; // <<---- Connect to database here
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST["request"] == "requestFav") {
	
    $mem1 = preg_replace('#[^0-9]#i', '', $_POST['mem1']); 
    $mem2 = preg_replace('#[^0-9]#i', '', $_POST['mem2']); 
	//
	if (!$mem1 || !$mem2 || !$thisWipit) {
		echo  'Error: Missing data';
    	exit(); 
	}
	//
	if ($mem1 == $mem2) {
    	echo  'Error: You cannot add yourself as a friend';
    	exit(); 
	} 
	
	$sql_frnd_arry_mem1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$mem1' LIMIT 1"); 
	while($row=mysql_fetch_array($sql_frnd_arry_mem1)) { $frnd_arry_mem1 = $row["friend_array"]; }
	$frndArryMem1 = explode(",", $frnd_arry_mem1);
    if (in_array($mem2, $frndArryMem1)) { echo  'This member is already in your Favourite List'; exit(); }

else if(mysql_num_rows(mysql_query("SELECT * FROM friends_requests WHERE mem2='$mem2'"))!==0) 
{

echo 'Fauvourite request already sent.' ;
   exit();
}
else{
	$sql = mysql_query("INSERT INTO friends_requests (mem1, mem2, timedate) VALUES('$mem1','$mem2',now())") or die (mysql_error("Fav Request Insertion Error"));
	//$sql = mysql_query("INSERT INTO pms (to, from, time, sub, msg) VALUES('$mem2','XXXXX',now(),'New Friend Request','You have a new Friend Request waiting for approval.<br /><br />Navigate to your profile and check your friend requests. <br /><br />Thank you.')") or die (mysql_error("Friend Request PM Insertion Error"));
    //$id = mysql_insert_id();
	echo 'Favourite request sent successfully. This member must approve the request.';
	
    exit(); 
}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST["request"] == "acceptFav") {
	$reqID = preg_replace('#[^0-9]#i', '', $_POST['reqID']);
	$sql = "SELECT * FROM friends_requests WHERE id='$reqID' LIMIT 1";
	$query = mysql_query($sql) or die ("Sorry we had a mysql error!");
	$num_rows = mysql_num_rows($query); 
	if ($num_rows < 1) {
		echo 'An error occured';
		exit();
	}
    while ($row = mysql_fetch_array($query)) { 
		$mem1 = $row["mem1"];
		$mem2 = $row["mem2"];
    }
	$sql_frnd_arry_mem1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$mem1' LIMIT 1"); 
	$sql_frnd_arry_mem2 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$mem2' LIMIT 1"); 
	while($row=mysql_fetch_array($sql_frnd_arry_mem1)) { $frnd_arry_mem1 = $row["friend_array"]; }
	while($row=mysql_fetch_array($sql_frnd_arry_mem2)) { $frnd_arry_mem2 = $row["friend_array"]; }
	$frndArryMem1 = explode(",", $frnd_arry_mem1);
	$frndArryMem2 = explode(",", $frnd_arry_mem2);
    if (in_array($mem2, $frndArryMem1)) { echo  'This member is already your Favourite list'; exit(); }
	if (in_array($mem1, $frndArryMem2)) { echo  'This member is already your Favourite list'; exit(); }
	if ($frnd_arry_mem1 != "") { $frnd_arry_mem1 = "$frnd_arry_mem1,$mem2"; } else { $frnd_arry_mem1 = "$mem2"; }
	if ($frnd_arry_mem2 != "") { $frnd_arry_mem2 = "$frnd_arry_mem2,$mem1"; } else { $frnd_arry_mem2 = "$mem1"; }
    $UpdateArrayMem1 = mysql_query("UPDATE myMembers SET friend_array='$frnd_arry_mem1' WHERE id='$mem1'") or die (mysql_error());
    $UpdateArrayMem2 = mysql_query("UPDATE myMembers SET friend_array='$frnd_arry_mem2' WHERE id='$mem2'") or die (mysql_error());
	$updatenotify = mysql_query("INSERT INTO notification (mem1, mem2, timedate) VALUES('$mem1','$mem2',now())") or die (mysql_error(" Error"));
	$deleteThisPendingRequest = mysql_query("DELETE FROM friends_requests WHERE id='$reqID' LIMIT 1"); 
    echo "This member is now in your favourite list!";
	exit();
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST["request"] == "denyFav") {
	$reqID = preg_replace('#[^0-9]#i', '', $_POST['reqID']);
	$deleteThisPendingRequest = mysql_query("DELETE FROM friends_requests WHERE id='$reqID' LIMIT 1"); 
    echo "Request Denied";
	exit();
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_POST["request"] == "removeFav") {
	
	$mem1 = preg_replace('#[^0-9]#i', '', $_POST['mem1']); // Person doing the friendship remove
    $mem2 = preg_replace('#[^0-9]#i', '', $_POST['mem2']);  // Person being removed
	//
	if (!$mem1 || !$mem2 || !$thisWipit) {
		echo  'Error: Missing data';
    	exit(); 
	}
	//
	$decryptedID = base64_decode($_SESSION['idx']);
	$id_array = explode("p3h9xfn8sq03hs2234", $decryptedID);
	$mem1SessIDX = $id_array[1];
	if ($mem1SessIDX != $mem1) {
    	exit();
	}
    // Query mem1 and mem2 friend_array out of DB
	$sql_frnd_arry_mem1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$mem1' LIMIT 1"); 
	$sql_frnd_arry_mem2 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$mem2' LIMIT 1"); 
	while($row=mysql_fetch_array($sql_frnd_arry_mem1)) { $frnd_arry_mem1 = $row["friend_array"]; }
	while($row=mysql_fetch_array($sql_frnd_arry_mem2)) { $frnd_arry_mem2 = $row["friend_array"]; }
	// Check to see they are in fact each other's friends
	$frndArryMem1 = explode(",", $frnd_arry_mem1);
	$frndArryMem2 = explode(",", $frnd_arry_mem2);
    if (!in_array($mem2, $frndArryMem1)) { echo  'This member is not in your list'; exit(); }
	if (!in_array($mem1, $frndArryMem2)) { echo  'This member is not in your list'; exit(); }
	
	// Here we remove them from each other's arrays using "unset" on the key where the value is found
	foreach ($frndArryMem1 as $key => $value) {
			  if ($value == $mem2) {
			      unset($frndArryMem1[$key]);
			  } 
    }
	foreach ($frndArryMem2 as $key => $value) {
			  if ($value == $mem1) {
			      unset($frndArryMem2[$key]);
			  } 
    } 
	// Now implode the adjusted arrays to make them strings again before going into the database
	$newStringForMem1 = implode(",", $frndArryMem1);
    $newStringForMem2 =  implode(",", $frndArryMem2);
	// And now update their database fields
	$sql = mysql_query("UPDATE myMembers SET friend_array='$newStringForMem1' WHERE id='$mem1'");
	$sql = mysql_query("UPDATE myMembers SET friend_array='$newStringForMem2' WHERE id='$mem2'");
	echo 'This member is no longer in your favourite list';
    exit(); 
}
?>