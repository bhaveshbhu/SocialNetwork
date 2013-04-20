<?php
session_start();
include_once("scripts/checkuserlog.php");
?>
<?php
$id = $_SESSION['id'];
$email = $_SESSION['email'];
// echo $email;
function genRandomString() {
    $length = 10;
    $characters = ’0123456789abcdefghijklmnopqrstuvwxyz’;
    $string = ”;    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}
//$id = preg_replace('#[^0-9]#i', '', $id); // filter everything but numbers on the ID just in case
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
// ------- FILTER THE ID AND QUERY THE DATABASE --------
while($row = mysql_fetch_array($sql))
{ 
    $username = $row["username"];
	$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$country = $row["country"];	
	$state = $row["state"];
	$city = $row["city"];
	$acc_type=$row["acc_type"];
	$sex=$row["gender"];
	$interested_in=$row["interested_in"];
	///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
	$check_pic = "members/$id/image01.jpg";
	$default_pic = "members/0/image01.jpg";
	if (file_exists($check_pic))
	{
    $user_pic = "<img src=\"$check_pic\" width=\"218px\" />"; 
	} 
	else
	    {
	$user_pic = "<img src=\"$default_pic\" width=\"218px\" />"; 
	    }
	///////  Mechanism to Display Real Name Next to Username - real name(username) //////////////////////////
	if ($firstname != "" && $lastname != "") {
        $mainNameLine = "$firstname $lastname";
		$username = $firstname;
	} 
	else
	    {
		$mainNameLine = $username;
	    }    
}

if($acc_type=="student.php")
	{
	$sql = mysql_query("SELECT * FROM student WHERE email='$email' LIMIT 1");
	
        while($row = mysql_fetch_array($sql))
      { 
    $yj = $row["tl_year"];
	$yp = $row["year"];
	$s10= $row["school_name_10"];
	$s12= $row["school_name_12"];
	//$firstname = $row["firstname"];
	//$lastname = $row["lastname"];
//	$country = $row["country"];	
	//$state = $row["state"];
	//$city = $row["city"];
	//$acc_type=$row["acc_type"];
	  }
	}
	else if($acc_type=="admin.php")
	{
	   while($row = mysql_fetch_array($sql))
      { 
    $yj = $row["tl_year"];
	$yp = $row["10_pass_year"];
	$dep = $row["department"];
	$s10= $row["school_name_10"];
	$s12= $row["school_name_12"];
	//$firstname = $row["firstname"];
	//$lastname = $row["lastname"];
//	$country = $row["country"];	
	//$state = $row["state"];
	//$city = $row["city"];
	//$acc_type=$row["acc_type"];
	     }
	}
	else if($acc_type=="faculty.php")
	{
	}
	//else($acc_type=="alumni.php")
	//{
	//}

?>
<head>
<style>
 #td1{      position:fixed;
            nowrap;
            border:1px solid #cccccc;
            border-bottom:0px;
            border-right:0px;
			}
</style>
</head>
<body height="1500px">

<div id="td1" height="20" nowrap border="2px" colspan="10" style="margin-left:219px; height: 38px;"> 
      <a href=""><img border="0" class="ad1" src="images/icons/home.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/friend.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/faculty.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/pics.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/icons/doc.png" /></a>
<a href="logout.php"><img src="images/icons/lout.png" align="right" style="padding-top: 3px;padding-right: 3px;"/></a> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
<br><br>
</div>

</body>		