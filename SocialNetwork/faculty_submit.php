<?php  

define('DB_NAME', 'fribler_form');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
   
   
   $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

   if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  $db_selected = mysql_select_db(DB_NAME, $con);
  
  if(!$db_selected)
   {
     die('cant use ' . DB_NAME . ': ' . mysql_error());
   }
echo 'connected succesfully'; 
$sql = "INSERT INTO faculty(year_of_join,department,area_of_interest,educational_details,mobile_no) VALUES 
    ('$_POST[year_of_join]', '$_POST[department]','$_POST[area_of_interest]','$_POST[educational_details]','$_POST[mobile_no]')";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
	// session_start();
	 //{
	 
	// $_SESSION['email_address'] = $_POST['email_address'];

	 
	 //}
	if(!mysql_query($sql,$con))  
{
die('cant use: '. mysql_error());
} 
	 print "Done";
mysql_close($con);
?>
