<?php
session_start();
		      include("connect.php");
              mysql_select_db("fribler01", $con);
              $que = "SELECT * FROM login WHERE username = '".$_POST["uname"]."' And password = '".$_POST["pwd"]."'";
              $result1 = mysql_query($que) or die(mysql_error());
              $num_results = mysql_num_rows($result1);
			  //$_POST['uname'] = $_POST['uname'];
              if($num_results>0)
			  {
				$sql1 = "SELECT uid FROM login WHERE username = '".$_POST["uname"]."'";
				//echo $sql1;
				$result1 = mysql_query($sql1) or die(mysql_error());
				$num_results = mysql_num_rows($result1);
				$row1 = mysql_fetch_array($result1);
				$asd=$row1['uid'];
				//echo $asd;
//session_id($asd);
//session_start();
$_SESSION['user'] = $_POST["uname"];
$_SESSION['id'] = $asd;
//echo $_SESSION['id'];
header("Location: usrs.php");

			  }
					//header("Location: mid.php");
?>