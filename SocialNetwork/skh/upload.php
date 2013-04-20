<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="../../css_files/buttons.css" rel="stylesheet" type="text/css" />
		<!-- <script type="text/javascript" src="../../../js/jquery.js"></script>
		<script type="text/javascript" src="../../../js/init.js"></script>
		<link rel="stylesheet" href="../../css_files/buttons.css" type="text/css" media="screen" /> 
		!-->
<style type="text/css">
body {
	font-size:11px;
	font-family: tahoma, verdana, arial;
	}
	
	#form1{
	font-size:12px;
	width:120;
	font-weight:bold;
	font-family: tahoma, verdana, arial;
	}
</style>
        <title></title>
    </head>
    <body>
	<a style="display:inline-block; line-height:40px; font-size:14px; font-weight:bold; color:black; font-family: tahoma, verdana, arial; background-color: #4ECD1E; height: 40px; width:100%; box-shadow:0px 2px 0px 0px lightgrey;"> <span style="margin-left: 30px;"> Upload Pictures </span> </a>
		
	<form action="upload_file.php?id=<?php echo $_REQUEST['id'] ?>" method="post" enctype="multipart/form-data">
	
	<table style="margin-left:20px; font-size:11px; ">
	<tr> <td> Album Name : </td> <td><input type="text" width="150px" name="albumname"  id="albumname" /> </td></tr>
<tr><td><label for="file">Filename:</label></td><td><input type="file" name="file" id="file" /></td></tr>
<tr> <td> Say Something about picture </td><td> <input type="text" name="caption" id="caption" /> </td> </tr> 
<tr><td><a class="btn upload" style="padding-left:5px;"><img src= " ../../images/icons/arrow_up_16.png" style=" margin-top:3px;"><input type="submit"  name="submit" value="Upload"  style=" background:transparent; cursor:pointer; border:none;"/> </a></td></tr>
</table>
</form>
        <?php
        // put your code here
        ?>
    </body>
</html>
