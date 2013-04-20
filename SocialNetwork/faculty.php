
	<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>Welcome to fribler!</title>
		   <style type="text/css">
				body
				{
					background-image: url(images/box2.png);
					background-repeat:repeat-x,y;
					margin-top: 0px;
					margin-left: 0px;
					margin-right: 0px;
					border:0px;
					font-family:century gothic, arial;
				}
				input.user
				{
					font-family:century gothic;
					font-size:12px;
					color:blue;
					border-color: green;
					
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
				div {
		position: relative;
		left: -100px;
		top: -330px;
					}
			</style>
		</head>
		<body>
			<form name="form1" action="faculty_submit.php"  method="post" >
		<center><img src="images/new.png" vspace="60"/>
		<div>
		 <table border="0" cellspacing="0" cellpadding="1"><TBODY><TR><TD ALIGN="right">  Year of Joining:</TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<TD aLIGN="LEFT"><select name="year_of_join">
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
		   </select></TD></TR><TR>
		  <TD ALIGN="right"> Department:</TD><TD ALIGN="LEFT"> <input type="text"  name="department" class="user"/></TD></TR>
		  <TR><TD ALIGN="right"> Area of Interest:</TD><TD aLIGN="LEFT"> <textarea name="area_of_interest" cols="10" class="user" /></textarea></TD></TR>
		  <TR BORDER="1"><TD ALIGN="right"> Educational Details:</TD><TD ALIGN="LEFT">  <select name="educational_details">
		   <option value=""></option>
					<option value="Bachelor degree">Bachelor degree</option>
					<option value="Master Degree">Master Degree</option>
					<option value="Phd">Phd</option>
					</select></TD></TR>
		<TR><TD ALIGN="right">Mobile no:</TD><TD align="left"><input type="text" name="mobile_no" class="user" /></TD></TR>
	<TR><TD ALIGN="right">(not visible to others)</TD><TD Align="left"><input type="submit" value="Next" class="next"/></TD></TR>
			</TBODY></TABLE> </div></center>
	</form>
	 </body>
	</html>