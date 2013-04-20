<html>
<body>
<?php
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$time_now=date('h:i:s A',$time_now);
?>
Time: <input type="text" name="dat1" value="<?php echo $time_now; ?>">
<?php echo $today;?>
</body>
</html>