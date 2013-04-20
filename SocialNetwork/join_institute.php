




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
		left: -80px;
		top: -300px;
					}
			</style>
		</head>
		<body>
			<form name="form1" action="choice.php" onsubmit="return validateform()" method="post" >
		<center><img src="images/1.png" vspace="60"/>
		<div> <align ="left">Joining a Institute: <br />
		You are a:<br />
		<input name="Type" type="radio" value="Student" onchange="type.php"/> Student
	<input name="Type" type="radio" value="Faculty" onchange="type.php"/> Faculty
	<input name="Type" type="radio" value="Admin" onchange="type.php"/>  Administrative Staff
	<input name="Type" type="radio" value="Alumni" onchange="type.php"/> Alumni
			 <!--<input type="radio" name="choice" value="faculty.php" />Faculty<input type="radio" name="choice" value="student.php" />Student
		 <input type="radio" name="choice" value="admin.php" />Administrative Staff<input type="radio" name="choice" value="alumni.php" />Alumni-->
		   <br/><br/><input name="submit" type="submit" value="Next" class="next"/>
		 </div></center>
	</form>
	 </body>
	</html>