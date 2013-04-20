<?php session_start();?>
<?php
$id=49;
//$id=$_REQUEST['id'];
$aid=$_REQUEST['id'];
        if ((($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/gif")) && ($_FILES["file"]["size"] < 5000000))
        {
            if ($_FILES["file"]["error"] > 0)
            {
               // echo "Error: " . $_FILES["file"]["error"] . "<br />";
            }
            else
            {
              //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                 $_SESSION['mime'] = $_FILES["file"]["type"];
               //  echo $_FILES["file"]["type"];
                //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
              //  echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br />";
                //if (file_exists("upload/" . $_FILES["file"]["name"]))
                //{
                //    echo $_FILES["file"]["name"] . " already exists. ";
                //}
                //else
                //{
                include("connect.php");
                        $qer = "SELECT imageid FROM images ORDER BY UploadDate LIMIT 1";
                        //echo $qer;
                        $rez1 = mysql_query($qer) or die(mysql_error());
                        $ro = mysql_fetch_array($rez1);
                        $r = (string)$ro['imageid'] + 1;
                       // echo $r."<br />";
                        $u = (int)$_SESSION['id'];
                       // echo $u."<br />";
                        $encNm = md5($_FILES["file"]["name"].$r.$u);
                        if($_FILES["file"]["type"] = "image/jpeg")
                        {
                            $encNm = $encNm.".jpg";
                        }
                        else if($_FILES["file"]["type"] = "image/png")
                        {
                            $encNm = $encNm.".png";
                        }
                        else if($_FILES["file"]["type"] = "image/gif")
                        {
                            $encNm = $encNm.".gif";
                        }
                        //echo $encNm."<br />";
                        $abc = $encNm;
						$thumbnail="upload/thumb/". $encNm;
                /*if(is_string($_FILES["file"]["name"]))
                    echo "String";
                $abc = "upload/".$_FILES["file"]["name"];*/
                        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$abc);
						//copy($abc,$thumbnail); 
                        $fname=$abc;
                        //$_SESSION['floc'] = $abc;
                        //echo $abc;
						
						
	// Final script for Image resize sot				
	// The file
$filename = "upload/".$abc;

$max_width=1024;
$max_height=768;
// Get new dimensions
list($width, $height) = getimagesize($filename);

$ratio= $width/$height;

if($ratio>=1 and $width>=$max_width)
{
 $new_width = $max_width;
$new_height = $max_width/$ratio;


}
else if ($ratio<1 and $height>=$max_height)
		{
		$new_height = $max_height;
		$new_width = $max_height*$ratio;
		
		}
		else 
			{
			$new_height=$height;
			$new_width=$width;
			}
if ($_FILES["file"]["type"] == "image/jpeg") 
			{
$thumb = imagecreatetruecolor($new_width, $new_height);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
imagejpeg($thumb, $abc);

// thumbnail generator

$thumb_width=140;
$thumb_height=140;
$thumb_pic = imagecreatetruecolor($thumb_width, $thumb_height);

// Resize
imagecopyresized($thumb_pic, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height); 
imagejpeg($thumb_pic, $thumbnail);
       }else if ($_FILES["file"]["type"] == "image/jpg") 
				{
				
$thumb = imagecreatetruecolor($new_width, $new_height);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
imagejpeg($thumb, $abc);

// thumbnail generator

$thumb_width=140;
$thumb_height=140;
$thumb_pic = imagecreatetruecolor($thumb_width, $thumb_height);

// Resize
imagecopyresized($thumb_pic, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height); 
imagejpeg($thumb_pic, $thumbnail);

				}else if ($_FILES["file"]["type"] == "image/png") 
				{
				
$thumb = imagecreatetruecolor($new_width, $new_height);
$source = imagecreatefrompng($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
imagepng($thumb, $abc);

// thumbnail generator

$thumb_width=140;
$thumb_height=140;
$thumb_pic = imagecreatetruecolor($thumb_width, $thumb_height);

// Resize
imagecopyresized($thumb_pic, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height); 
imagepng($thumb_pic, $thumbnail);

				}else if ($_FILES["file"]["type"] == "image/gif") 
				{
				
$thumb = imagecreatetruecolor($new_width, $new_height);
$source = imagecreatefromgif($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
imagegif($thumb, $abc);

// thumbnail generator

$thumb_width=140;
$thumb_height=140;
$thumb_pic = imagecreatetruecolor($thumb_width, $thumb_height);

// Resize
imagecopyresized($thumb_pic, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height); 
imagegif($thumb_pic, $thumbnail);

				}
            }
        
		include("connect.php");
             mysql_select_db("fribler01", $con);
			//$sqlnew = mysql_query("SELECT * FROM album WHERE albumname='$aname' LIMIT 1");
			 $qresult = mysql_query("SELECT albumname FROM album WHERE uid=$aid LIMIT 1");
			// echo $qresult;
			 $row = mysql_fetch_array($qresult);
             //$qr = "UPDATE images SET UploadDate=NOW() WHERE imageid = ";
			 $albname= $row['albumname'];
            $newid= $aid;
			// echo $newid;
			 $qfile ="INSERT INTO images(uid, fileName ,caption, albumname, albumid, UploadDate) VALUES ('$id', '$fname', '$_POST[caption]', '$albname', '$newid ', NOW())";
			$result2 = mysql_query($qfile) or die(mysql_error());
			 //echo "result for images";
			// echo $result2;
          // echo "Picture Uploaded";
             //$num_results = mysql_num_rows($result1);
            // header("Location: photo.php");
			// <!--<a href="dummy.php">Want to see image?</a>-->
         
			$presult=1;
		}
        else
        {
            $presult=2;
			//echo "Invalid file";
        }
		
		//header("Location: pics.php?id='$albumid'&pass='$presult'");
		exit;
        ?>
					 
