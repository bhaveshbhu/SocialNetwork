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
        <form action="upFlEv.php" method="post"
enctype="multipart/form-data">
<label for="file">College Pic:</label>
<input type="file" name="file" id="file" />
<br />
<?php echo "<input type='text' value=".$_POST['eid']." style='display:none;' />"; ?>
<input type="submit" name="submit" value="Submit" />
</form>
        <?php
        // put your code here
        ?>
    </body>
</html>
