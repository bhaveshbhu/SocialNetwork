<?php
session_start();
include("../scripts/connect_to_mysql.php");
//$id=49;
$id=$_SESSION['id'];
?>
<head>
<title> Log list </title>
</head>
<?php 

function time_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hr' => 3600,
        'min' => 60,
        'second' => 1);

    foreach ($periods as $key => $value) {
        if ($difference >= $value) {
            $time = floor($difference/$value);
            $difference %= $value;
            $retval .= ($retval ? ' ' : '').$time.' ';
            $retval .= (($time > 1) ? $key.'s' : $key);
            $granularity--;
        }
        if ($granularity == '0') { break; }
    }
	if (empty($retval))
         return ' few seconds ago';
		else
		return ' '.$retval.' ago';
}
//$date = date_default_timezone_set('Asia/Kolkata');
//$today = date("F j, Y, g:i A T");
//$tim= date("g:i A");
$logque="SELECT * FROM logtable WHERE userid=$id ORDER by time DESC limit 10;";
$logresult = mysql_query($logque) or die (mysql_error());
$logcount = mysql_num_rows($logresult);
if($logcount>0)
{
echo "<div><div style='width:100%; height:40px; background:#f4f4f4; margin-bottom:80px; border:1px solid lightgrey; border-radius:4px;'><center style='line-height:40px; font-size:11px; font-family:tahoma, verana, arial;'><b>Showing Last $logcount Records </b></center></div>";
while($logrow = mysql_fetch_array($logresult, MYSQL_ASSOC))
	{
	$logtime=$logrow['time'];
	$gloip=$logrow['globalip'];
	$browser=$logrow['browser'];
	$time=time_ago($logtime);
	$logist=$logrow['istime'];
	
	echo"<div style='width:100%; height:auto;'> <div style='width:99%; border-bottom:1px solid lightgrey; background:#f8f8f8;'>
	<table style='width:100%; font-family:tahoma,verdana,arial; font-size:11px;'>
	<tr style='height:30px;'><td style='width:250px;'>Last login : <b style='font-size:11px'>$logist<br/>($time)</b></td><td style='width:120px;'>Browser : <b>$browser</b></td><td>From IP : <b>$gloip</br></td></tr>
	</table>
	
	
	</div></div> </div>";
	
	}


}



?>

