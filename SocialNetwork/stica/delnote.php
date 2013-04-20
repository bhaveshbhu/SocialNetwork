<?php
session_start();
include("connect.php");
    $delnote=$_POST['noteid'];
	//echo $delnote;
   
    $qerdel = "DELETE FROM stica WHERE stica_id=$delnote ";
	//echo $qerdel;
	$result = mysql_query($qerdel);
if(! $result )
{
  die('Error in deleting' . mysql_error());
}
else
$deleted=1;
//echo $deleted;
		
	//header("Location: album1.php");
    
    ?>