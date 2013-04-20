<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:1271px;
	height:733px;
	z-index:1;
	background-color:#00CC00
}
-->
</style>
</head>

<body>
<div id="Layer1">
  <form id="form1" name="form1" action="wer.php" method="post" >
    <p>First Name
      <input name="fname" type="text" id="fname" />
  </p>
    <p>
      <label>Last Name
      <input name="lname" type="text" id="lname" />
      </label>
</p>
    <p>
      <label>Password
      <input name="pwd" type="password" id="pwd" />
      </label>
    </p>
    <p>
      <label>Confirm Password
      <input name="conPwd" type="password" id="conPwd" />
      </label>
    </p>
     <p> 
       Gender<form><input name="Gender" type="radio" value="Male" /> Male  <input name="Gender" type="radio" value="Female" /> Female			
	</form>
  </p>
  <p>
       <input name="Submit" type="submit" />
</p>
  </form>
</div>
<script language="javascript1.2">
	function chkPw(rePwd)
	{
		//document.write("In Function");
		//alert(rePwd);
		var pwd = document.form1.pwd.value;
		if(rePwd == pwd)
		{
			alert('ok here');
			
			return true;
		}
		else
		{
			//document.form1.pwd.value = "";
			//document.form1.conPwd.value = "";
			//pwd.focus();
			alert('Passwords do not match');
			return false;
		}
	}
</script>
</body>
</html>
