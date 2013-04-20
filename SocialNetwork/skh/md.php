<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
    <body>
        <?php
        session_start();
        $qer = "SELECT imageid FROM images ORDER BY UploadDate LIMIT 1";
        //echo $qer;
        $rez1 = mysql_query($qer) or die(mysql_error());
        $ro = mysql_fetch_array($rez1);
        $r = $ro['imageid'];
        $u = (int)session_id();
        
        header("Location: upload_file.php");
        ?>
        
    </body>
</html>