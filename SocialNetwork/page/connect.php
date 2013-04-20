<?php
    $con = mysql_connect("frdoc.db.8559473.hostedresource.com", "frdoc", "Fr!bl3rw0rk");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
     mysql_select_db("frdoc", $con);
?>