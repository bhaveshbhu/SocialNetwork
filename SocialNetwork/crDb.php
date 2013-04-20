<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $con = mysql_connect("localhost", "root", "hellosql");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        else
        {
            if (mysql_query("CREATE DATABASE try",$con))
            {
                echo "Database created";
             }
            else
            {
                echo "Error creating database: " . mysql_error();
             }
             mysql_select_db("try", $con);
             $sql = "CREATE TABLE login
            (
                username varchar(20),
                password varchar(15),
            )";

            // Execute query
            mysql_query($sql,$con);
            echo 'Table Login created';

            mysql_close($con);
        }
        ?>
    </body>
</html>
