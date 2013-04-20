<?php
include('connectfribler.php');
if($_POST)
{
$q=$_POST['searchword'];
//$q="yuv";
$cdquery="select * from myMembers  where username like '%$q%' LIMIT 6 ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());                 
while($row=mysql_fetch_array($cdresult))
{
$fname=$row['username'];
$lname=$row['lastname'];
//$img=$row['img'];
//$country=$row['country'];
$userid=$row['id'];
$re_fname='<b>'.$q.'</b>';
$re_lname='<b>'.$q.'</b>';
$final_fname = str_ireplace($q, $re_fname, $fname);
$final_lname = str_ireplace($q, $re_lname, $lname);
$default_pic ="../../members/0/image01.jpg";
	$check_pic ="members/$userid/image01.jpg"; 
	if (file_exists($check_pic))
	{
    $user_pic = $check_pic; 
	} 
	else
	    {
	$user_pic = $default_pic; 
	    }
?>
<div class="display_box" align="left">
<img src="user_img/<?php echo $user_pic; ?>" style="width:25px; float:left; margin-right:6px" /><?php echo $final_fname;  ?>&nbsp;<?$userid; ?><br/>
</div>
<?php
}
}
else
{

}
?>
