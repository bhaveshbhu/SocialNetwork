<?php
session_start();
include_once("scripts/checkuserlog.php");
error_reporting(E_ALL & ~E_NOTICE);

?>
<?php
$id = "";
if (isset($_GET['id'])) {
	 $id = preg_replace('#[^0-9]#i', '', $_GET['id']); // filter everything but numbers
} else if (isset($_SESSION['idx'])) {
	 $id = $logOptions_id;
}else {
   header("location: index1.php");
   exit();
}$_SESSION['id'] = $id;
function genRandomString() {
    $length = 32;
//define("$characters",’0123456789abcdefghijklmnopqrstuvwxyz’);
    $characters = ’0123456789abcdefghijklmnopqrstuvwxyz’;
    $string = ”;    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}echo $id;
// ------- FILTER THE ID AND QUERY THE DATABASE --------
$id = preg_replace('#[^0-9]#i', '', $id); // filter everything but numbers on the ID just in case
$sql = mysql_query("SELECT * FROM myMembers WHERE id='$id' LIMIT 1"); // query the member
// ------- FILTER THE ID AND QUERY THE DATABASE --------

// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
 if ($existCount == 0) { // evaluate the count
header("location: index.php?msg=user_does_not_exist");
     exit();
}
while($row = mysql_fetch_array($sql))
{ 
    $username = $row["username"];
	//$firstname = $row["firstname"];
	$lastname = $row["lastname"];
	$country = $row["country"];	
	$state = $row["state"];
	$city = $row["city"];
	$_SESSION['email']=$row["email"];
	
	
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
	 
}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome to Fribler!!!</title>
        <style type="text/css">
           .as{
            margin-top: 0px;
            margin-left: 0px;
            position:absolute;
            top: 0px;
            left: 0px;
            }
            .pp{
            top: 120px;
            max-height:40px;
            max-width:40px;
            }
            .ad1{
            max-height:40px;
            max-width:40px;
            position:relative;
            top: 20px;
            left: 20px;
            }
            .ad2a{
            max-height:100px;
            max-width:100px;
            position:relative;
            }
             body
            {
                background-image: url(images/line1.png);
                background-repeat:repeat-x;
                margin-top: 0px;
                margin-left: 0px;
                margin-right: 0px;
                border:0px;
                font-weight:bold;
            }
            .td1{
            nowrap;
            border:2px solid #33CC33;
            border-bottom:0px;
            border-right:0px;
            }
            span{
            background-color:#33CC33;
            padding:5px;
            }
            .upic
            {
            padding-left:38px;
            padding-right:38px;
            }
            .d1{
            nowrap;
            border:2px solid #33CC33;
            border-bottom:0px;
            border-left: 0px;
            border-right: 0px;
            }
            a{
            text-decoration:none;
            color:black;
            }
            div{
            margin-left: 0px;
            background-color:#33CC33;
            border:1px solid black;
            }
        </style>
    </head>
    <body>
        <table border="3" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td class="d1" rowspan="5" width="168" nowrap valign="top">
      <img class="as" src="images/headerLogo.png" /> <br />;
          <center>
              <br><br><br><br><br><br> <?php echo $user_pic; ?><br><span class="upic"><?php echo "$username"; ?></span><br><br><br>
              <a href=""><div>Favourite Users</div></a><a href=""><div>Faculty</div></a><a href=""><div>College Buddies</div></a>
          </center>
      </td>     
      <td class="td1"  height="54" nowrap>
      <a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a>

      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="images/headerLogo.png" /></a><br><br>
  </td>
<td></td>
<td class="td1"  height="54" nowrap align="right">
<a href="logout.php"><img src="images/icons/logout_icon.png" /></a></td>
 </tr>
          <tr>
             <td class="td1" nowrap height="320"></td>
              <td class="td1" width="20%" height="50" rowspan="5" nowrap>2</td>
              <td class="td1" width="20%" rowspan="5" nowrap>3</td>              
          </tr>
          <tr>
              <td nowrap class="td1" ><span>Dashboard</span><br>
                  <table align="center" cellspacing="30" border="3">
                      <tr>
                          <td><a href="profile.php?id=<?php echo genRandomString();?>" ><img border="0" class="ad2a" src="images/view.gif" /></a></td>
                          <td><a href="">2<img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                          <td><a href="">3<img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                          <td><a href="">4<img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                      </tr>
                      <tr>
                          <td><a href=""><img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                          <td><a href=""><img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                          <td><a href=""><img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                          <td><a href=""><img border="0" class="ad2a" src="images/headerLogo.png" /></a></td>
                      </tr>
                  </table>
              <br></td>
			  
          </tr>
          <tr>
              <td class="td1" nowrap>sw ,cn</br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br>bjsbx\bs\xbsh</br><br></br><br></br><br></br><br></br><br></br><br></br><br>jhskjhjkshkjsh</br><br></br><br></br><br></br><br>jshwhh</br><br></br><br></br><br></br><br></br><br>hkjshkj</td>
          </tr>

  </tr>
  </tr>
  </table>
    </body>
</html>