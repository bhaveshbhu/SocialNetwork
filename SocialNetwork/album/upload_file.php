<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php 
 session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
      
        // put your code here
        if (($_FILES["file"]["type"] == "image/jpeg") && ($_FILES["file"]["size"] < 5000000))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Error: " . $_FILES["file"]["error"] . "<br />";
            }
            else
            {
                echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                 $_SESSION['mime'] = $_FILES["file"]["type"];
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                echo "Stored in: " . $_FILES["file"]["tmp_name"];
                if (file_exists("upload/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " already exists. ";
                }
                else
                {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                        "upload/" . $_FILES["file"]["name"]);
                        $abc = '"upload/'. $_FILES["file"]["name"].'"';
                        $_SESSION['floc'] = $abc;
                }
            }
        }
        else
        {
            echo "Invalid file";
        }
        $con = mysql_connect("localhost", "ank", "kakalala");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        else
        {
            //echo 'dbStore';
             mysql_select_db("new", $con);
             $que = "INSERT INTO images(uid, fileName) VALUES(".$_SESSION['id'].",'". $_SESSION['floc']."')";
             echo $que;
             $result1 = mysql_query($que) or die(mysql_error());
             echo "Picture Uploaded";
             //$num_results = mysql_num_rows($result1);
         }
         ?>
             
        <a href="dummy.php">Want to see image?</a>
    </body>
</html>
