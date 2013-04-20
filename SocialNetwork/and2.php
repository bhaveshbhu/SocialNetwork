<?php 
session_start();
include_once("scripts/connect_to_mysql.php");
if(!isset($_SESSION['email1'])) 
{
header("Location: index1.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to fribler</title>
       <style type="text/css">
            body
            {
                background-image: url(img/copy1.png);
                background-repeat:repeat-x,y;
                margin-top: 50px;
                margin-left: 0px;
                margin-right: 0px;
                border:0px;
                font-family:century gothic, arial;
            }
            input.user
            {
                font-family:verdana;
				background:url(img/in.png) no-repeat;
				width:208px;
				height:36px;
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
				top:0; bottom:0;
				position: absolute;
				width: 450px;
				height: auto;
				border: transparent;
				background: transparent;
				text-align: left;
			}
             input.next
            {
                background-color:transparent;
                border-color: black;
                color:black;
                font-size:15px;
				padding:5px 5px 5px 10px;
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
				padding:5px 5px 5px 10px;
                font-weight:bold;
                height:30px;
                width:60px;  
            }
            div {
	position: relative;
	left: 0px;
	top: 30px;
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
        <form action="and3.php" method="post">
    
	
	<center>
		<img src="img/ll1.png" vspace="10" align="center"/>
		<hr style="margin-top: 30px; ">
		<img src="img/l2.png" vspace="0" align="center"/>
        <div id = "ctr"; style=" font-family: verdana;font-size: 20px; margin-top: 260px;" >
		
		<br>
		<br>
		<br>
		<td><td>Your Interests:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="bio" class="user" style=" font-family:verdana; font-size:18px; margin-top: 0px; margin-bottom: 0px; height: 40px; margin-left: 2px; margin-right: 2px; width: 437px; "></textarea> <br> <br>
        Interested in:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="interested_in[]" id="interested_in[]" value="men"/>Men<input type="checkbox" name="interested_in[]" id="interested_in[]" value="women"/>Women <br> <br>
        Love Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="love" style="background-image: url(img/in.png); width:200px; height:30px;padding:5px 5px 5px 10px; font-size:16px; font-family: verdana;">
              <option value=""></option>
		   <option value="Searching for love">Searching for love</option>
           <option value="Already found" style="font-size:18px;">Already found</option>
           <option value="Just brokeup"style="font-size:18px;">Just brokeup</option>
           <option value="am good as single"style="font-size:18px;">am good as single</option>
           <option value="Married"style="font-size:18px;">Married</option>
           <option value="one sided"style="font-size:18px;">one sided love</option>
       </select>
	   <br> <br>
       Fav. place to hangout:  <input type="text" name="place" class="user"/><br/><br/>
        <input type="image" src="img/nxt.png" value="Next" class="next"/>
        <form action="and3.php" method="post"><input type="image" src="img/skp.png" value="Skip" class="skip"/></form>
     </div></center>
	 
</form>
 </body>
</html>