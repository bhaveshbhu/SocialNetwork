<?php
session_start();
?>
<?php
?>
<html>
<head>
<script language="javascript" src="calendar/calendar.js"></script>
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
<a style="display:inline-block; line-height:40px; font-size:14px; font-weight:bold; color:black; font-family: tahoma, verdana, arial; background-color: #4ECD1E; height: 40px; width:450px; box-shadow:0px 2px 0px 0px lightgrey;"> <span style="margin-left: 30px;"> Add a new event to your campus </span> </a>
<form action="ev_pro.php" method="post">

<table style="margin-left:20px; font-size:11px; ">
<tr><td id="form1" > Event Name: </td><td> <input type="text" style="width:200px;" name="name" /> </td></tr>
<tr><td id="form1" > Start on : <td> <?php
require_once('calendar/classes/tc_calendar.php');
$date3_default = "";
$date4_default = "";

	  $myCalendar = new tc_calendar("date3", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d', strtotime($date3_default))
            , date('m', strtotime($date3_default))
            , date('Y', strtotime($date3_default)));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2012, 2015);
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setDatePair('date3', 'date4', $date4_default);
	  $myCalendar->writeScript();	?> </td></tr>
<tr><td id="form1" > End on : </td><td><?php 
	  
	  $myCalendar = new tc_calendar("date4", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d', strtotime($date4_default))
           , date('m', strtotime($date4_default))
           , date('Y', strtotime($date4_default)));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2012, 2015);
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setDatePair('date3', 'date4', $date3_default);
	  //$myCalendar->writeScript();	  


//instantiate class and set properties
/*$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(1, 1, 2000);*/
 $myCalendar->writeScript(); ?> </td> </tr>
 <tr><td id="form1" >Description: </td><td> <textarea style=" max-width: 300px ; max-height:90px;" name="desc" rows="5" cols="30"></textarea></td></tr>
 <tr><td id="form1" >Contact No.: </td><td><input type="text" style="width:200px;" name="con" /></td></tr>
 <tr><td id="form1" >Email: </td><td><input type="text" style="width:200px;" name="mail" /></td></tr>
 <tr><td id="form1" >website: </td><td> <input type="text" style="width:200px;" name="site" /></td></tr>
 <tr><td id="form1" > Type: </td><td> <select name="type">
 <option value="Festival">Festival</option>
 <option value="Seminar">Seminar</option>
 <option value="Workshop">Workshop</option>
 <option value="Competition">Competition</option>
 </select></td></tr>
 </table>
 </br></br>
  <a style="cursor;pointer"><input type="submit" class="btn" style="padding-left:10px; margin-left:150px; cursor:pointer;" value="Continue" /> </a>
 </form>
 </body>
 </html>