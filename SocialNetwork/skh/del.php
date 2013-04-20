<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete</title>
<script language="javascript">
    /*function load()
    {
        var r = confirm("Do You Really Want To Delete?");
        if(r == false)
            {
                window.location = "photo.php";
            }
            php:abc();
    }*/
</script>
</head>

<body>
    <?php
    //function abc()
    //{
    
    mysql_select_db("fribler01", $con);
    $qer = "SELECT imageid FROM images ORDER BY UploadDate LIMIT 2";
    $re1 = mysql_query($qer) or die(mysql_error());
    $ro1 = mysql_fetch_array($re1);
    echo $_SESSION['img']."\n\n";
    if($ro1['imageid'] == $_SESSION['img'])
    {
        //set imageid to next one
        $in = (int)$ro1['imageid'];        
    }
    else
     {
        //show prev image
        $qer = "SELECT UploadDate FROM images WHERE imageid = ".$_SESSION['img'];
        $rez2 = mysql_query($qer) or die(mysql_error());
        $ro2 = mysql_fetch_array($rez2);
        $comp = $ro2['UploadDate'];
        $qer = "SELECT imageid, UploadDate FROM images ORDER BY UploadDate";
        $rez1 = mysql_query($qer) or die(mysql_error());
        while($ro = mysql_fetch_array($rez1))
        {
            if($comp > $ro['UploadDate'])
            {
                $in = (int)$ro['imageid'];
            }
            else 
            {
                break;
            }
                
}
        }
    $que11 = "DELETE FROM images WHERE imageid = ".$_SESSION['img'];
    //echo $que11;
    $result12 = mysql_query($que11) or die(mysql_error());
    //$r = mysql_fetch_array($result12);
    $_SESSION['img'] = $in;
    //echo $_SESSION['img'];
    $qer = "SELECT fileName FROM images WHERE imageid = ".$_SESSION['img'];
    $rez5 = mysql_query($qer) or die(mysql_error());
    $ro5 = mysql_fetch_array($rez5);
    $_SESSION['bigp'] = (string)$ro5['fileName'];
    echo $_SESSION['bigp'];
    header("Location: photo.php");
    //$_SESSION['bigp'] = $
    //header("Location: refresh.php");
    //}
    ?>
    
</body>
</html>
