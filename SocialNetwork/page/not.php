<?php
session_start();
echo $_SESSION['id'];
?>
<html>
<head>
</head>
<body>
<h1>Your Request Is Awaiting Admin Approval</h1>
<h2><?php echo "<a href='../profile.php?id =".$_SESSION['id']." > Go To Profile</a>"; ?></h2>
</body>
</html>