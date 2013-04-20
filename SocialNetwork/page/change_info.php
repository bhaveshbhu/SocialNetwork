<?php
session_start();
include("connect.php");
$q = "SELECT * FROM details WHERE CampID = ".$_SESSION['clg'];
$res = mysql_query($q);
$row = mysql_fetch_array($res);

?>
<html>
<head>
<link href="../../css_files/buttons.css" rel="stylesheet" type="text/css" />
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
</head>
<body>

<a style="display:inline-block; line-height:40px; font-size:14px; font-weight:bold; color:black; font-family: tahoma, verdana, arial; background-color: #4ECD1E; height: 40px; width:450px; box-shadow:0px 2px 0px 0px lightgrey;"> <span style="margin-left: 30px;"> Update Campus Information </span> </a>


<form action="upd_info.php" method="post">
<table style="margin-left:20px; font-size:11px; ">

<tr><td id="form1" > Name:  </td> <td> <input type="text" name="camp" length="100" <?php echo "value=".$row['Campus']."" ?> /></td></tr> 

<tr><td id="form1" >  Short Name: </td><td><input type='text' name='short' <?php echo "value=".$row['ShortName']."" ?> /></td></tr>

<tr><td id="form1">  Website: </td><td><input type='text' name='site' <?php echo "value=".$row['Website']."" ?> /></td></tr>

<tr><td id="form1" > Year Established: </td><td><input type='text' name='est' <?php echo "value=".$row['Est']."" ?> /> </td></tr>

<tr><td id="form1" > Motto: </td><td><input type='text' name='mot' <?php echo "value=".$row['Motto']."" ?> /> </td></tr>

<tr><td id="form1" > Location:</td><td> <input type='text' name='loc' <?php echo "value=".$row['Location'].""  ?>/> </td></tr>

<tr><td id="form1" > Dean: </td><td> <input type='text' name='dean' <?php echo "value=".$row['Dean']."" ?> /> </td></tr> 

<tr><td id="form1" > Director: </td><td> <input type='text' name='dir' <?php echo "value=".$row['Director']."" ?> /> </td></tr> 

<tr><td id="form1" > Type of Colege: </td><td> <input type='text' name='typ' <?php echo "value=".$row['type']."" ?> /> </td></tr> 

<tr><td id="form1" > Contact No.: </td><td><input type='text' name='phone' <?php echo "value=".$row['Phone']."" ?> /> </td></tr>

<tr><td id="form1" > Email: </td><td> <input type='text' name='mail' <?php echo "value=".$row['Email']."" ?>/> </td></tr>


</table>
</br>
</br>
 <a style="cursor;pointer"><input type="submit" class="btn" style="padding-left:10px; margin-left:150px; cursor:pointer;" value="Save" /> </a>
</form>
</body>
</html>