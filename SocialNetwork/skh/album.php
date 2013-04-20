<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" charset="UTF-8">
        <title></title>
    </head>
    <!--<frameset rows="60%, 40%">
        <frame src="bigp.php" name="bigp" id="bigp" />
        <frame src="thumb.php" name="thumb" id="thumb" />
        <noframes>-->
    <body>
        <?php
        $im = "PhpProject1/upload/537002016.jpg";

    $imagepath= $im;

    $image=imagecreatefromjpeg($imagepath);

    header('Content-Type: image/jpeg');

    imagejpeg($image);

?>
       
    </body>
      <!--  </noframes>
    </frameset>-->
</html>
