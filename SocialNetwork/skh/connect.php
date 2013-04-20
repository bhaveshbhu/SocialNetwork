<?php
    $con = mysql_connect("fribler01.db.8559473.hostedresource.com", "fribler01", "Fr!bl3rw0rk");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
 else {
    // echo "Connected";
}
    mysql_select_db("fribler01", $con);
    ?>