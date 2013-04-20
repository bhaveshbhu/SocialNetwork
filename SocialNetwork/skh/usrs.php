<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Frameset</title>
</head>
<frameset cols="30%, 70%">
<frame src="usrs1.php" name="usrs1" id="usrs1" />
<frame src="main.php" name="main" id="main" />
<noframes>

<body>
<p>This document uses frames.
Please follow this link to a
<a href="noframes.html">no frames</a>
version.</p>
</body>
</noframes>
</frameset>
</html>
