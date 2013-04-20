<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:1315px;
	height:600px;
	z-index:1;
	background-color:#00CC00
}
#Layer2 {
	position:absolute;
	width:1311px;
	height:138px;
	z-index:2;
	left: -13px;	
}
#Layer3 {
	position:absolute;
	width:206px;
	height:138px;
	z-index:3;
	left: -351px;
	top: -283px;
	background-color:#FFFFFF
}
#Layer4 {
	position:absolute;
	width:1098px;
	height:135px;
	z-index:4;
	left: 219px;
}
.style1 {
	font-size: 50px;
	font-weight: bold;
	color: #FF0000;
}
.style2 {color: #FF0000}
#Layer5 {
	position:absolute;
	width:1297px;
	height:432px;
	z-index:3;
	top: 145px;
}
#Layer6 {
	position:absolute;
	width:266px;
	height:70px;
	z-index:1;
}
-->
</style>
</head>

<body>
<div id="Layer1">
<div id="Layer2">
<div id="Layer3"><img src="fribLogo.jpg" alt="Logo" height="138" width="206"/></div>
<div id="Layer4"><table width="1094" border="0" cellspacing="10" cellpadding="5">
  <tr>
    <td width="1064"> <h1 align="center" class="style1">Welcome To Fribler </h1></td>
  </tr>
  </table>
  </div>
  </div>
<div id="Layer5">
    <form id="form1" name="form1" method="post" action="logChk.php"><table width="200" border="0" cellspacing="10" cellpadding="5">
  <tr>
    <th scope="row">Username</th>
    <td><input name="uname" type="text" /></td>
  </tr>
  <tr>
    <th scope="row">Password</th>
    <td><input name="pwd" type="password" /></td>
  </tr>
</table>
       
  <div id="Layer6">
    
      <input type="submit" name="Submit" value="Submit" align="middle" />
    </form>
    </div>
</div>
</div>
</body>
</html>
