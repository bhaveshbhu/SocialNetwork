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
        $con = mysql_connect("localhost", "root", "hellosql");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        else
        {
            mysql_select_db("try", $con);
            $sql = "INSERT INTO login(username, password) VALUES('abc', '123')";
            if (mysql_query($sql))
            {
                echo "Value Inserted";
             }
            else
            {
                echo "Error creating database: " . mysql_error();
             }
            //echo 'Inserted';
        }
        ?>
    </body>
</html>
