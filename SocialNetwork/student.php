	<!DOCTYPE html>
	<html>
		<head><script type="text/javascript">
		function checkuser()
	{
	var user = document.getElementById('user').value;
	var users = document.getElementById('users').value;
	var element = document.getElementById('labelUser');
	var x = users-user;
	
        // element.innerHTML = x;
		document.getElementById('labeluser').value = x;
//	document.form1.labeluser.value ="*";
//	element.style.color="red";
	

	}
function toggleStatus()
	{
	var x = document.getElementById('edit').value;
	if(x == "edit");
	{
      var m = document.getElementById("labeluser").removeAttribute("disabled");
     form1.edit.value = "Done";
    }
//else
//{ 
  // document6+.form1.labeluser.blur()
//document.form1.txta.disabled=true
//}
	 
    }
	</script>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>Welcome to fribler!</title>
		   <style type="text/css">
				body
				{background-image: url(img/copy1.png);
					background-repeat:repeat-x,y;
					margin-top: 0px;
					margin-left: 0px;
					margin-right: 0px;
					border:0px;
					font-family:tahoma, verdana,century gothic, arial;
				}
				.btn {
display:inline-block;
height:30px;
line-height:30px;
padding:0 10px 0 10px;
background:url(../images/white.jpg) repeat-x;
color:#999;
font-weight:bold;
font-size:16px;
text-shadow:0 1px 0 #fff;
position:relative;
border:1px solid #DFDFDF;
margin:0 2px 10px 0;
-moz-border-radius:4px;
-webkit-border-radius:4px;
border-radius:4px;
}
.btn:hover {
border-color:#cacaca;
background:lightgrey;
-moz-box-shadow: 0 1px 3px #999;
-webkit-box-shadow: 0 1px 3px #999;
cursor:pointer;
color:black;
}
.btn span {
display:block;
position:absolute;
top:2px;
left:2px;
right:2px;
width:auto;
height:25px;
background-repeat:no-repeat;
background-position:center;
}
				input.user
				{
					float:left; 
					font-family:tahoma, verdana, arial;
					font-size:13px;
					font-weight:bold;
					background-color: white;
					border:1px solid lightGrey ;
					-moz-border-radius:2px 2px 2px 2px;
					-webkit-border-radius:2px 2px 2px 2px;
					border-radius:2px 2px 2px 2px;
				}
				 input.next
				{
					background-color:#33CC33;
					border-color: black;
					color: black;
					font-size:15px;
					font-weight:bold;
					height:30px;
					width:60px;  
				}
				#dform {
				align:left;
		position: relative;
		left: 0px;
		top: 60px;
		font-family: tahoma, verdana, arial;
		font-size: 12px;
					}
			.td6h {
		font-family:tahoma, verdana, arial;
		font-size:14px;
		font-weight:bold;
		padding: 3px 3px 3px 5px;
		background-color: lightgrey;
		border:1px solid 'lightGrey';
		-moz-border-radius:2px 2px 2px 2px;
		-webkit-border-radius:2px 2px 2px 2px;
		border-radius:2px 2px 2px 2px;
		
		}
		.td6a {
		
		font-family:tahoma, verdana, arial;
		
		}
		
			</style>
		</head>
		
		<body onLoad='checkuser()'>
		<center><img src="img/ll1.png" vspace="30" align="center"/>
		<hr>
			<form name="form1" action="student_submit.php" method="post" >
		
		<div id="form">
		<div style=" border: 1px solid lightgrey; background-color:lightgrey;-moz-border-radius:2px 2px 2px 2px;
		-webkit-border-radius:2px 2px 2px 2px;
		border-radius:2px 2px 2px 2px; width: 500px;"> Please provide Us information Regarding your Education </div>
		 <table border="0" cellspacing="0" cellpadding="1"><TBODY><TR><TD ALIGN="left" >  Year of Joining:</TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<TD aLIGN="LEFT" class="td6a"><select name="year_of_join" id="user" >
		   <option value="" id="user" ></option>
					<option value="1975">1975</option>
					<option value="1976">1976</option>
					<option value="1977">1977</option>
					<option value="1978">1978</option>
					<option value="1979">1979</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992">1992</option>
					<option value="1993">1993</option>
					<option value="1994">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2005">2006</option>
					<option value="2005">2007</option>
					<option value="2005">2008</option>
					<option value="2005">2009</option>
					<option value="2005">2010</option>
					<option value="2005">2011</option>
					<option value="2005">2012</option>
					
		   </select></TD><td></td></TR>
		   <TR><TD ALIGN="left">  Tentative year of passing:</TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<TD aLIGN="LEFT" class="td6a"><select name="year_of_pass" onBlur='checkuser();' id="users">
		   <option value="" ></option>
					<option value="1975">1975</option>
					<option value="1976">1976</option>
					<option value="1977">1977</option>
					<option value="1978">1978</option>
					<option value="1979">1979</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992">1992</option>
					<option value="1993">1993</option>
					<option value="1994">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2005">2006</option>
					<option value="2005">2007</option>
					<option value="2005">2008</option>
					<option value="2005">2009</option>
					<option value="2005">2010</option>
					<option value="2005">2011</option>
					<option value="2005">2012</option>
		   </select></TD><td></td></TR><tr><div id="elementsToOperateOn"><td align="left">Current year:</td><td class="td6a"><input type="text" id="labeluser" value="" disabled="disabled"/></td></div><td><input type="button" value="Edit" id="edit" onclick="toggleStatus()" /></td></tr><TR>
		  <TD ALIGN="left"> Department:</TD><TD ALIGN="LEFT" class="td6a"> <input type="text" id='user'  name="department" class="user"/></TD></TR>
		  <TR BORDER="1"><TD ALIGN="left"> Course Details:</TD><TD ALIGN="LEFT" class="td6a">  <select name="educational_details">
		   <option value=""></option>
					<option value="Bachelor degree">B. Tech</option>
					<option value="Master Degree">M.Tech</option>
					<option value="Dual Degree">Dual Degree</option>
						<option value="Phd">Phd</option>
					</select></TD></TR>
					<TR class="td6h"><TD ALIGN="left">Educational info:</TD><td align="center">School Name</td><td align="center">year</td/></tr><tr><TD align="left">10<sup>th</sup> class:</td><TD ALIGN="LEFT"><input type="text" name="school_name_10" class="user" /></td><TD aLIGN="left"><select name="year"  id="users">
		   <option value=""></option>
					<option value="1975">1975</option>
					<option value="1976">1976</option>
					<option value="1977">1977</option>
					<option value="1978">1978</option>
					<option value="1979">1979</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992">1992</option>
					<option value="1993">1993</option>
					<option value="1994">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2005">2006</option>
					<option value="2005">2007</option>
					<option value="2005">2008</option>
					<option value="2005">2009</option>
					<option value="2005">2010</option>
					<option value="2005">2011</option>
					<option value="2005">2012</option>
		   </select></TD></TR><tr><TD align="lef">12<sup>th</sup> class:</td><TD ALIGN="LEFT"><input type="text" name="school_name_12" class="user" /></td><TD aLIGN="left"><select name="tl_year">
		   <option value=""></option>
					<option value="1975">1975</option>
					<option value="1976">1976</option>
					<option value="1977">1977</option>
					<option value="1978">1978</option>
					<option value="1979">1979</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992">1992</option>
					<option value="1993">1993</option>
					<option value="1994">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2005">2006</option>
					<option value="2005">2007</option>
					<option value="2005">2008</option>
					<option value="2005">2009</option>
					<option value="2005">2010</option>
					<option value="2005">2011</option>
					<option value="2005">2012</option>
		   </select></TD></TR>
		<TR><TD ALIGN="left">Mobile no:</TD><TD align="left"><input type="text" name="mobile" class="user" /></TD></TR>
		<TR><TD ALIGN="left">Enroll or class Roll:</TD><TD align="left"><input type="text" name="enroll_no" placeholder="Not Visible to others" class="user" /></TD></TR>
	
	
	
			</TBODY></TABLE> 
			<br>
			<br>
			<div style=" ALIGN:center " vspace="20";><input type="submit" value="Next" class="btn"/></div></center>
	</form>
	 </body>
	</html>