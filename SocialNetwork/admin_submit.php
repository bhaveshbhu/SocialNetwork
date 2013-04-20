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
$admin_related = mysql_real_escape_string(implode(',', $_POST['admin_related']));

$date = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
$sql = "INSERT INTO admin(admin_post,date_of_join,admin_related,employee_code_no) VALUES 
    ('$_POST[admin_post]', '$date','$admin_related','$_POST[employee_code_no]')";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
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
