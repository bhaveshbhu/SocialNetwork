<?php 
// Connect to the database
$con = mysql_connect("fribler.db.8559473.hostedresource.com","fribler","K33pW0rk!ng");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

//mysql_select_db("fribler", $con);
  else
  {
     //echo 'dbStore';
      mysql_select_db("fribler", $con);
      $que = "SELECT * FROM login WHERE username = '".$_POST["uname"]."' And password = '".$_POST["pwd"]."'";
      //echo $que;
      $result1 = mysql_query($que) or die(mysql_error());
      //echo $que;
      //$row = mysql_fetch_array($result) or die(mysql_error());
      //echo 'Hello';
      $num_results = mysql_num_rows($result1);
      //echo "<table>";
      /*for($i = 0; $i < $num_results; $i++)
      {
          $row1 = mysql_fetch_array($result1);
          echo $row1['username'] . " " . $row1['password'];
          echo "<br />";
      }*/
      if($num_results > 0)
         // echo 'Login Successful';
      //$user = $_POST["uname"];
      //$prev = session_name($user);
      session_start();
      
     
            //mysql_select_db("new", $con);
            $sql1 = "SELECT uid FROM login WHERE username = '".$_POST["uname"]."'";
            $result1 = mysql_query($sql1) or die(mysql_error());
            $num_results = mysql_num_rows($result1);
            $row1 = mysql_fetch_array($result1);
            $asd=$row1["uid"];
            $_SESSION['id'] = $asd;
            //echo $id;
       
            
      //echo $_SESSION['user'];
      header("Location: usrs.php");
  }
        ?>
 