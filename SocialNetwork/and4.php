<?php
session_start();
if(!isset($_SESSION['email1']))
{
header("Location: index1.php");
}
include_once("scripts/connect_to_mysql.php"); ?>
<?php  
if(isset($_POST['food']))
{
$email1 = $_SESSION['email1'];
$sql = mysql_query("UPDATE myMembers SET food='$_POST[food]',sport='$_POST[sport]',movie='$_POST[movie]'
WHERE email = '$email1'")
or die (mysql_error());}?><?php
$email1 = $_SESSION['email1'];
$id= $_SESSION['id'];
echo $id;
//$sql_default = mysql_query("SELECT id FROM myMembers WHERE email = '$email1'")
	  //or die (mysql_error());
	 //$id=$sql_default;
  // $id = $_SESSION['id'];
	//  echo $id;
	$user_pic = "";
	if (isset($_POST['upload']))
	{
	if ($_POST['parse_var'] == "pic")
	{
		
		// If a file is posted with the form
		if ($_FILES['fileField']['tmp_name'] != "") 
		{ 
				$maxfilesize = 2048000; // 51200 bytes equals 2500kb
				if($_FILES['fileField']['size'] > $maxfilesize ) 
				{ 
                             
							echo $error_msg = '<font color="#FF0000"  >ERROR: Your image was too large, please try again.</font>';
							unlink($_FILES['fileField']['tmp_name']); 

				} 
				else if (!preg_match("/\.(gif|jpg|png)$/i", $_FILES['fileField']['name'] ) ) 
				{

							$error_msg = '<font color="#FF0000">ERROR: Your image was not one of the accepted formats, please try again.</font>';
							unlink($_FILES['fileField']['tmp_name']); 

				} 
		         else 
		         { 
	                      //$name=$_FILES['fileField']['name'];                 
						   $newname = "image01.jpg";
						   //$location="members/$id/$name";
							$place_file = move_uploaded_file( $_FILES['fileField']['tmp_name'], "members/$id/".$newname);
	                     // mysql_query("UPDATE myMembers SET imagelocation='$location'  WHERE email = '$email1'")   ;    
						  
						  echo 'up success';
                   }
				 
		} 

		
	}
		
}
?>
<!-- 
    Document   : index
    Created on : 7 Aug, 2011, 3:33:07 PM
    Author     : Sumit and Kaustubh
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to fribler!</title>
		
		<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
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
                font-family:century gothic;
                font-size:12px;
                color:blue;
                border-color: green;
                
            }
			#ctr
			{	margin: auto;
				left:0; right:0;
				top:300px; bottom:0;
				position: absolute;
				width: 450px;
				height: 120px;
				border: transparent;
				background: transparent;
				text-align: left;
				font-size: 20px;
				}
				
             input.next
            {
                margin:auto;
				background-color:transparent;
                border-color: transparent;
                color:black;
                font-size:15px;
                font-weight:bold;
                height:30px;
                width:60px;  
            }
            input.skip
            {
                background-color:#333333;
                border-color: black;
                color:white;
                font-size:15px;
                font-weight:bold;
                height:30px;
                width:60px;  
            }
            #div {
	position: relative;
	left: -100px;
	top: -300px;
                } 

			.scrollArea {
			width: 425px; 
			height: 120px;
			padding-left: 5px;
			padding-right: 5px; 
			border-color: Black;
			border-width: 2px; 
			border-style: solid;
			float: left; 
			background-color:white;
			overflow: auto;
						}
				
				<!--
.brightRed {	color: #F00;}
.textSize_9px {	font-size: 9px;}
h1 { display:inline;	}
h2 { display:inline; }
h3 { display:inline;	}
.boxHeader {
	
}

.boxHeader a:link {
position: relative;
	left: 100px;
	top: 290px;
	color: #060;
	text-decoration:none;
}
.boxHeader a:hover { position: relative;
	left: 100px;

	color: #000;
	text-decoration:none;
}
.editBox {position: relative;
	left: 100px;
	top:-7px;
	display:none;
}
-->
        </style>
		<script language="javascript" type="text/javascript"> 
function toggleSlideBox(x) {
		if ($('#'+x).is(":hidden")) {
			$(".editBox").slideUp(200);
			$('#'+x).slideDown(300);
		} else {
			$('#'+x).slideUp(300);
		}
}
</script>
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
<center>
<img src="img/ll1.png" vspace="10" align="center"/>
<hr style="margin-top: 30px; ">
<img src="img/l4.png" vspace="0" align="center"/>
       <table width=480 border=0 align=center summary="" style="position:relative;left:100px;top:0px;" > 
	   <div id = "ctr" style=" font-family: verdana; font-size: 20px; font-weight:bold ;margin-top:5px ;align"center"> 
	   <form action="and4.php" method="post" enctype="multipart/form-data">Upload Your Picture <br> <table><tr><td><input name="fileField" type="file" class="formFields" id="fileField" size="42" /></td><td><input name="upload" type="submit" id="updateBtn1" value="Upload" />
       <input name="parse_var" type="hidden" value="pic" /></td></tr></table></form>	</div> 
<br></br></br></br>
<table>
<tr>
<td>
  <span class="scrollarea">
		<p>
			<strong>Welcome to the Fribler, please go through the Following Terms and Condition for batter understanding your relationship to Fribler</strong></p>
		<ol>
			<li>
				<strong>Accepting&nbsp; Terms &amp; conditions</strong></li>
		</ol>
		<ul>
			<li>
				If you are creating account on fribler.com then it means that you are accepting terms and conditions, without accepting terms and conditions you can&rsquo;t create account on Fribler.</li>
			<li>
				Your account on fribler is subjected to fulfilment of conditions of fribler.com and universal laws of using internet and a website.</li>
		</ul>
		<p style="margin-left: 72pt;">
			&nbsp;</p>
		<p>
			<strong>2. Use of the Services by you</strong></p>
		<p>
			&nbsp;</p>
		<ul>
			<li>
				In order to access certain Services, you may be required to provide information about yourself (such as identification or contact details) as part of the registration process for the Service, or as part of your continued use of the Services. You agree that any registration information you give to Fribler will always be accurate, correct and up to date.</li>
			<li>
				You agree to use the Services only for purposes that are permitted by (a) the Terms and (b) any applicable law, regulation or generally accepted practices or guidelines in the relevant jurisdictions (including any laws regarding the export of data or software to and from the United States or other relevant countries).</li>
			<li>
				You agree not to access (or attempt to access) any of the Services by any means other than through the interface that is provided by Fribler, unless you have been specifically allowed to do so in a separate agreement with Fribler. You specifically agree not to access (or attempt to access) any of the Services through any automated means (including use of scripts or web crawlers) and shall ensure that you comply with the instructions set out in any robots.txt file present on the Services.</li>
			<li>
				You agree that you will not engage in any activity that interferes with or disrupts the Services (or the servers and networks which are connected to the Services).</li>
			<li>
				Unless you have been specifically permitted to do so in a separate agreement with Fribler, you agree that you will not reproduce, duplicate, copy, sell, trade or resell the Services for any purpose.</li>
			<li value="3">
				You agree that you are solely responsible for (and that Fribler has no responsibility to you or to any third party for) any breach of your obligations under the Terms and for the consequences (including any loss or damage which Fribler may suffer) of any such breach.</li>
		</ul>
		<ol>
			<li value="3">
				<strong>Password and Account security</strong></li>
		</ol>
		<ul>
			<li>
				Fribler is not responsible for any password theft of your account, you should maintain your password confidential and update regularly.</li>
			<li>
				User of each account will be solely responsible for all activities under his account and if you found unauthorised use of your account then immediately report to fribler support.</li>
		</ul>
		<p>
			<strong>4.&nbsp;&nbsp;&nbsp;&nbsp; Privacy and your personal information</strong></p>
		<ul>
			<li>
				Your personal information and personal data will not be disclosed to anybody outside the Fribler&rsquo;s team and only can shared by yourself to others depending upon privacy options provided to you on website.</li>
			<li>
				You agree to the use of your data in accordance with Fribler&rsquo;s privacy policies.</li>
			<li>
				<!--  -->(A) you have breached any provision of the Terms (or have acted in manner which clearly shows that you do not intend to, or are unable to comply with the provisions of the Terms); or</li>
			<li>
				(B) Fribler is required to do so by law (for example, where the provision of the Services to you is, or becomes, unlawful);or</li>
			<li>
				(C) the partner with whom Fribler offered the Services to you has terminated its relationship with Fribler or ceased to offer the Services to you; or</li>
			<li>
				&nbsp;Nothing in this Section shall affect Fribler&rsquo;s rights regarding provision of Services under Section 4 of the Terms.</li>
		</ul>
		<p>
			&nbsp;<strong>5. Claims for Warranty and Data Loss</strong></p>
		<ul>
			<li>
				Fribler is not responsible for any data loss occurred by user mistakes and server failures,In any case Fribler will not refund anything to any user.</li>
			<li value="7">
				Fribler can terminate your account and stop using its services at any point without any prior notification and information to anyone.</li>
		</ul>
		<p>
			<strong>6.&nbsp;&nbsp; Copyright Policy</strong></p>
		<ul>
			<li>
				User will only share information and documents belong to &nbsp;user himself, if found using any copyright item, then it could result in account termination or deletion of that item.</li>
			<li>
				Any user is not allowed to copy any content belong to Fribler for his personal use or for any other means, all data belong to fribler &nbsp;Corporation only.</li>
		</ul>
		<p>
			&nbsp;</p>
		<p>
			Jan 2012</p>
		<p>
			Thank You.</p>
		<p>
			&nbsp;</p>
			</span>
</td>
<td align="center">	
<form action="final_submit.php" method="post">
        <input type="checkbox" name="tandc" value="tandc"/>I Agree to Terms and Conditions<br /><br /><input type="image" src="img/done.png" value="Finish" class="next"/></form></td></tr></table>
     </center>
</form>
 </body>
</html>