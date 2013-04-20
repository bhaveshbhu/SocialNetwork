<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Test MySql</title>
    </head>
    <body>
        <?php
        // put your code here
        $host-"localhost";
        $username-"";
        $password-"";
        mysql_connect($host,$user,$password);
        $sql=”show status”;
        $result = mysql_query($sql);
        if ($result == 0)
            echo '<b>Error ' . mysql_errno() . ': '. mysql_error() . “</b>”;
        else
        {
        ?>
    </body>
</html>
