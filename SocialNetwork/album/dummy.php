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
        session_start();
        $fl =  $_SESSION['floc'];
        echo $fl;
        //$prt = htmlspecialchars("<img src=/"".$fl."/"></img>", ENT_QUOTES);
        //echo $prt;
        Print '<img src="' . $fl. '" alt="abc />';
        ?>
        <!--<img src="<?//php$prt;?>" ></img>-->
        <!--<img src="X.jpg" ></img>-->
        <IMG SRC="<?php echo $fl; ?>" WIDTH="268"/>
       
        
       
    </body>
</html>
