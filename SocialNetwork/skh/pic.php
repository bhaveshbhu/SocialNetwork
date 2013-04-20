   <?php
    //session_start();
    //$usr = 1;//$_SESSION['uid'];
    //include("connect.php");
    //$q = "SELECT fileName FROM images WHERE uid = " . $usr;
    //$result4 = mysql_query($q) or die(mysql_error());
    //$row0 = mysql_fetch_array($result4);
    //$num_res = mysql_num_rows($result4);
    //echo $que."\n";
    //echo $row0[0];
    //$imgheight=imagesy($image);
    //allocate color for image caption (red)
    //$color=imagecolorallocate($image, 255, 255, 255);
    //Add text at the bottom of the image
    //imagestring(image, font size, left, top, string, color);
    //imagestring($image, 5, 50, $imgheight-50, "September 2005", $color);
    //for($k = 0; $k < $num_res; $k++)
    //{
       
$imagepath= "upload/chair.1.jpg";
$image=imagecreatefromjpeg($imagepath);
header('Content-Type: image/jpeg');
imagejpeg($image);
?>