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
					width:120px;  
				}
				div {
		position: relative;
		left: -100px;
		top: -300px;
					}
			</style>
		</head>
		<body>
			<form name="form1" action="and2.php" method="post" >
		<center><img src="images/new.png" vspace="60"/>
		<div>
		Join a Campus: 
				<select name="day">
				<option value=""></option>
					<option value="IT BHU">IT BHU</option>
		  </select>
		  <br />
		  <br />
		
		   <br/><br/><input type="submit" value="Add a Campus" class="next"/>
		 </div></center>
	</form>
	 </body>
	</html>