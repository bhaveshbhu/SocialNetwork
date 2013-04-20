<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete</title>
</head>

<body>
    <?php
    //echo "hello";
    $con = mysql_connect("localhost", "root", "hellosql");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    else
    {
         //echo 'dbStore';
        mysql_select_db("try", $con);
        //for($img = 2; $img < 7; $img++){
         
         $que = "DELETE FROM images WHERE imageid = " . $img;
         //echo $que;
         $result1 = mysql_query($que) or die(mysql_error());
         //echo "Picture Removed";}
             //$num_results = mysql_num_rows($result1);*/
     }
    ?>
    <a href="photo.php"></a>
</body>
</html>
