<?php 
session_start();
include_once("../scripts/connect_to_mysql.php");
include_once("../scripts/checkuserlog.php");
?>
<?php 
$ty=$_POST['tdy'];
$date = date_default_timezone_set('Asia/Kolkata');
//echo $ty;
//$h=date("H");
//$m=date("i");
//$s=date("s");
$h=substr($ty, 11,2);
$m=substr($ty, 14,2);
$s=substr($ty, 17,2);
$month=substr($ty, 5,2);
$date=substr($ty, 8,2);
$year=substr($ty, 0,4);
//$today = date("MjY");
//echo $today;
//echo " ".$date;
//echo "   ".$h."  ".$m." ".$s."  ".$month." ".$year." ".$date;
//echo $lo gOptions_id;
$sql2 = mysql_query("SELECT mem1,mem2,timedate FROM friends_requests WHERE mem2='$logOptions_id' && view_status='0'"); 
while($row = mysql_fetch_array($sql2)) 
{ 
$t=$row["timedate"];
$username = $row["mem1"];
$hr=substr($t, 11,2);
$min=substr($t, 14,2);
$sec=substr($t, 17,2);
$yr=substr($t, 0,4);
$mon=substr($t, 5,2);
$dat=substr($t, 8,2);
}
//echo " ".$yr."-".$mon."-".$dat;

if($yr==$year)
{
if($mon==$month)
{
if($dat>$date)
{
echo '
	<p><div id="BeeperBox" class="UIBeeper">
         <div class="UIBeeper_Full">
            <div class="Beeps">
               <div class="UIBeep UIBeep_Top UIBeep_Bottom UIBeep_Selected" style="opacity: 1; ">
                  <a class="UIBeep_NonIntentional" href="#">
                     <div class="UIBeep_Icon">
                    <!-- <i class="beeper_icon image2"></i>-->
                     </div>
                     <span class="beeper_x">&nbsp;</span>
                     <div class="UIBeep_Title">'.$username."wants to be friend with you".'</div>
                  </a>
               </div>
            </div>
         </div>
      </div></p>
	' ;
}
else if($dat==$date)
{

if($hr==$h)
{
if($min==$m)
{
if($sec>$s)
{
echo '
	<p><div id="BeeperBox" class="UIBeeper">
         <div class="UIBeeper_Full">
            <div class="Beeps">
               <div class="UIBeep UIBeep_Top UIBeep_Bottom UIBeep_Selected" style="opacity: 1; ">
                  <a class="UIBeep_NonIntentional" href="#">
                     <div class="UIBeep_Icon">
                    <!-- <i class="beeper_icon image2"></i>-->
                     </div>
                     <span class="beeper_x">&nbsp;</span>
                     <div class="UIBeep_Title">'.$username."wants to be friend with you".'</div>
                  </a>
               </div>
            </div>
         </div>
      </div></p>
	' ;
}
}
else if($min>$m)
{
echo '
<div id="BeeperBox" class="UIBeeper">
         <div class="UIBeeper_Full">
            <div class="Beeps">
               <div class="UIBeep UIBeep_Top UIBeep_Bottom UIBeep_Selected" style="opacity: 1; ">
                  <a class="UIBeep_NonIntentional" href="#">
                     <div class="UIBeep_Icon">
                    <!-- <i class="beeper_icon image2"></i>-->
                     </div>
                     <span class="beeper_x">&nbsp;</span>
                     <div class="UIBeep_Title">'.$username."Yuvraj wants to be friend with you".'</div>
                  </a>
               </div>
            </div>
         </div>
      </div>
	' ;
}
}
else if($hr>$h)
{
echo '<p>
<div id="BeeperBox" class="UIBeeper">
         <div class="UIBeeper_Full">
            <div class="Beeps">
               <div class="UIBeep UIBeep_Top UIBeep_Bottom UIBeep_Selected" style="opacity: 1; ">
                  <a class="UIBeep_NonIntentional" href="#">
                     <div class="UIBeep_Icon">
                    <!-- <i class="beeper_icon image2"></i>-->
                     </div>
                     <span class="beeper_x">&nbsp;</span>
                     <div class="UIBeep_Title">'.$username."wants to be friend with you".'</div>
                  </a>
               </div>
            </div>
         </div>
      </div>
	</p>' ;
}
else
echo "hiihhhh";
}
}
else if($mon>$month)
{
echo '
<div id="BeeperBox" class="UIBeeper">
         <div class="UIBeeper_Full">
            <div class="Beeps">
               <div class="UIBeep UIBeep_Top UIBeep_Bottom UIBeep_Selected" style="opacity: 1; ">
                  <a class="UIBeep_NonIntentional" href="#">
                     <div class="UIBeep_Icon">
                    <!-- <i class="beeper_icon image2"></i>-->
                     </div>
                     <span class="beeper_x">&nbsp;</span>
                     <div class="UIBeep_Title">'.$username."Yuvraj wants to be friend with you".'</div>
                  </a>
               </div>
            </div>
         </div>
      </div>
	' ;
}
}
else if($yr>$year)
{
echo '<p>
<div id="BeeperBox" class="UIBeeper">
         <div class="UIBeeper_Full">
            <div class="Beeps">
               <div class="UIBeep UIBeep_Top UIBeep_Bottom UIBeep_Selected" style="opacity: 1; ">
                  <a class="UIBeep_NonIntentional" href="#">
                     <div class="UIBeep_Icon">
                    <!-- <i class="beeper_icon image2"></i>-->
                     </div>
                     <span class="beeper_x">&nbsp;</span>
                     <div class="UIBeep_Title">'.$username."wants to be friend with you".'</div>
                  </a>
               </div>
            </div>
         </div>
      </div>
	</p>' ;
}
else
echo "hiihhhh";
//echo "$update_list";
?>



