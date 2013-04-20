<?php
session_start();
if(!isset($_SESSION['email1'])) { header("Location: index1.php"); }
include_once("scripts/connect_to_mysql.php");
//echo $_SESSION['email1'];
?>
<?php  
$interested_in = mysql_real_escape_string(implode(',', $_POST['interested_in']));
$email1 = $_SESSION['email1'];
	$sql = mysql_query("UPDATE myMembers SET bio='$_POST[bio]',interested_in='$interested_in',love='$_POST[love]',place='$_POST[place]'
	 WHERE email = '$email1'")
	      or die (mysql_error());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to fribler!</title>
       <style type="text/css">
            body
            {
                background-image: url(img/copy1.png);
                background-repeat:repeat-x,y;
                margin-top: 0px;
                margin-left: 0px;
                margin-right: 0px;
                border:0px;
                font-family:verdana, arial;
            }
            input.user
            {
                font-family:verdana;
				background:url(img/in.png) no-repeat;
				width:210px;
				height:38px;
				font-size:18px;
                color:black;
                border-color: transparent;
                
            }
			
			 #aa
				{
				top:5px;
				right:650px;
				}
			#ctr
			{	margin: auto;
				left:0; right:0;
				top:300px; bottom:0;
				position: absolute;
				width: 450px;
				height: auto;
				border: transparent;
				background: transparent;
				text-align: left;
				font-size: 20px
				
			}
             input.next
            {
                background-color:transparent;
                border-color: black;
                color:black;
                font-size:15px;
                font-weight:bold;
                height:30px;
                width:60px;  
            }
            input.skip
            {
                background-color:transparent;
                border-color: black;
                color:white;
                font-size:15px;
                font-weight:bold;
                height:30px;
                width:60px;  
            }
            div {
	position: relative;
	left: -100px;
	top: -300px;
                }
        </style>
    </head>
  <body onLoad="init()"><div id="loading" style="position:absolute; width:100%; text-align:center; top:200px; left:30px;" >
<img src="images/loading1.gif" border=0></div><script type="text/javascript">
	 var ld=(document.all);
  var ns4=document.layers;
 var ns6=document.getElementById&&!document.all;
 var ie4=document.all;
  if (ns4)
 	ld=document.loading;
 else if (ns6)
 	ld=document.getElementById("loading").style;
 else if (ie4)
 	ld=document.all.loading.style;
  function init()
 {
 if(ns4){ld.visibility="hidden";}
 else if (ns6||ie4) ld.display="none";
 }
</script>
        <form action="and4.php" method="post">
    <center>
	<img src="img/ll1.png" vspace="10" align="center"/>
	<hr style="margin-top: 30px; ">
	<img src="img/l2.png" vspace="0" align="center"/>
	<br>
        <div id = "ctr";style=" font-family: verdana; font-size: 30px; margin-top:260px ;">
            Fav. Food :  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="food" class="user"/><br> <br>
            Fav. Sports :   &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="text" name="sport" class="user"/><br> <br>
            Fav. Movies :    &nbsp; &nbsp; &nbsp;<input type="text" name="movie" class="user"/><br> 
			<br>
        <input type="image" src="img/nxt.png" value="Next" class="next"/>
        <form action="and4.php" method="post"> &nbsp;  &nbsp; <input type="image" src="img/skp.png" value="Skip" class="skip"/></form>
     </div></center>
</form>
 </body>
</html>