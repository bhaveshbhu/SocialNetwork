<?php
        session_start();
        if ((($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/gif")) && ($_FILES["file"]["size"] < 5000000))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                //echo "Error: " . $_FILES["file"]["error"] . "<br />";
            }
            else
            {
                //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                 $_SESSION['mime'] = $_FILES["file"]["type"];
                 //echo $_FILES["file"]["type"];
                //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                //echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br />";
                //if (file_exists("upload/" . $_FILES["file"]["name"]))
                //{
                //    echo $_FILES["file"]["name"] . " already exists. ";
                //}
                //else
                //{
                include("connect.php");
                        //$qer = "SELECT CampID FROM details ORDER BY UploadDate LIMIT 1";
                        //echo $qer;
                        //$rez1 = mysql_query($qer) or die(mysql_error());
                        //$ro = mysql_fetch_array($rez1);
                        //$r = (string)$ro['imageid'] + 1;
                        //echo $r."<br />";
                        $u = (int)$_SESSION['clg'];
                        //echo $u."<br />";
                        $encNm = md5($_FILES["file"]["name"].$u);
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
                        $abc = "upload/". $encNm;
                /*if(is_string($_FILES["file"]["name"]))
                    echo "String";*/
                //$abc = "upload/".$_FILES["file"]["name"];
                        move_uploaded_file($_FILES["file"]["tmp_name"], $abc);
                        
                        $_SESSION['floc'] = $abc;
                        //echo $abc;
                //}
            }
        }
        else
        {
            //echo "Invalid file";
        }
        include("connect.php");
             //mysql_select_db("fribler01", $con);
             $que = "UPDATE details SET pic = '".$abc."' WHERE CampID = ".$u;
             //echo $que;
             //$qr = "UPDATE images SET UploadDate=NOW() WHERE imageid = ";
             $result1 = mysql_query($que) or die(mysql_error());
             //echo "Picture Uploaded";
             //$num_results = mysql_num_rows($result1);
             header("Location: not.php");
         //}
         ?>