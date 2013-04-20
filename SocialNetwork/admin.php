
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
		left: -50px;
		top: -310px;
					}
			</style>
		</head>
		<body>
			<form name="form1" action="admin_submit.php" onsubmit="return validateform()" method="post" >
		<center><img src="images/new.png" vspace="60"/>
		<div>
		 <table border="0" cellspacing="0" cellpadding="1"><TBODY>
		 <tr><td>Currently at the post of:</td><TD align="left"><input type="text" name="admin_post" class="user" /></TD></TR>
		 <TR><TD ALIGN="right">  Year of Joining:</TD><TD aLIGN="LEFT">	<select name="day">
				<option value="day"></option>
				<?php
				for($i = 1; $i <= 31; $i++)
				{
					echo "<option value='".$i."'>".$i."</option>";
				}
				?>
				<!--	<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>-->
		   </select></td><TD aLIGN="LEFT">	
		   <select name="month">
		    <option value="month"></option>
			   <option value="january">January</option>
			   <option value="february">February</option>
			   <option value="january">March</option>
			   <option value="january">April</option>
			   <option value="january">May</option>
			   <option value="january">June</option>
			   <option value="january">July</option>
			   <option value="january">August</option>
			   <option value="january">September</option>
			   <option value="january">October</option>
			   <option value="january">November</option>
			   <option value="january">December</option>
		   </select></td><TD aLIGN="LEFT">	
		   <select name="year">
		   <option value="year"></option>
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
		   </select></TD></TR>
		    <TR BORDER="1"><TD ALIGN="right">You are related to:</TD></tr><tr><td align="right">
					<input type="checkbox" name="admin_related[]" value="Student affairs" /></td><td>Student affairs</td></tr><tr><td align="right"><input type="checkbox" name="admin_related[]" value="Office Affairs"></td><td>Office Affairs</td></tr><tr><td align="right"><input type="checkbox" name="admin_related[]" value="Faculty Affairs"></td><td>c</td></tr>
					
		<TR><TD ALIGN="right">Employee Code no(if any):</TD><TD align="left"><input type="text" name="employee_code_no" class="user" /></TD></TR>
	<TR><TD ALIGN="right"></TD><TD Align="left"><input type="submit" value="Next" class="next"/></TD></TR>
			</TBODY></TABLE> </div></center>
	</form>
	 </body>
	</html>