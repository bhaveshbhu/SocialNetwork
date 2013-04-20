<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Connect</h1>    
<?php
echo "Hello";
    $con = mysql_connect("fribler01.db.8559473.hostedresource.com", "fribler01", "Fr!bl3rw0rk");
echo "Second Line";
    if (!$con)
    {
echo "in if";
        die('Could not connect: ' . mysql_error());
echo mysql_error();
    }
else
{
echo "Connected to Database";
    mysql_select_db("fribler01", $con);
}
echo "Outside condition";
    ?>
</body>
</html>
