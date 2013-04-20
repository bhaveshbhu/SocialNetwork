<?php session_start();
include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Your Pictures</title>
<style type="text/css">
</style>

<link rel="stylesheet" href="../../page/scripts/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/init.js"></script>
<link rel="stylesheet" href="../../css_files/buttons.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="../../page/scripts/jquery.nyroModal.custom.js"></script>
<script type="text/javascript">
$(function() {
  $('.nyroModal').nyroModal();
	});

function con()
{
    var r = confirm("Are You Sure?");
    if(r == true)
        window.location = "del.php";
}
</script>
<?php
		$usr=49;
		
		//$id=$_SESSION['id']
		$imag=100;
		$aid=$_REQUEST['id'];
		$presult=$_REQUEST['pass'];
        //$imag = $_SESSION['img'];
        //$usr = (int)$_SESSION['id'];
        //$q = "SELECT fileName, imageid, albumname, caption, UploadDate FROM images WHERE uid=".$usr." ORDER BY UploadDate";
		$qpics = "SELECT imageid, uid, albumname, fileName, likes, comments, views, UploadDate, caption from images WHERE albumid='$aid' ORDER BY UploadDate";
        //echo $q." ".$imag." ".$usr;
       // $result4 = mysql_query($q) or die(mysql_error());
	   	$resultpics = mysql_query($qpics) or die (mysql_error());
		//$ct = mysql_num_rows($result4);
		$picscount = mysql_num_rows($resultpics);
		//$albums=mysql_num_rows($result5);
		//echo $albumcount;
		if($picscount > 0)
		{
        //echo mysql_error($con);
        //$row0 = mysql_fetch_array($result4);
		
		/*while($row = mysql_fetch_array($result5, MYSQL_ASSOC))
		{
		echo "{$row['albumname']}  </br>";
		echo "{$row['uid']}  </br>";
		echo "{$row['timestamp']}  </br>";
		}
		*/
		
		
        //$num_res = mysql_num_rows($result4);
        //$que = "SELECT * FROM images WHERE imageid=".$imag;
        //$result1 = mysql_query($que) or die(mysql_error());
        //$row = mysql_fetch_array($result1);
        //$lk = $row['likes'];
        //$que = "SELECT views FROM images WHERE imageid=".$imag;
        //$result2 = mysql_query($que) or die(mysql_error());
        //$row1 = mysql_fetch_array($result2);
        //$vw = $row['views'];
        //$que = "SELECT comments FROM images WHERE imageid=".$imag;
        //$result3 = mysql_query($que) or die(mysql_error());
        //$row2 = mysql_fetch_array($result3);
       // $com = $row['comments'];
        //$ab = "upload/".$_SESSION['bigp'];
		//$thumb = "upload/thumb/".$row0['fileName'];
        //echo $_SESSION['bigp'];
        //$q32 = "SELECT caption from images WHERE fileName = '".(string)$ab."'";
        //echo $q32;
        //$rex = mysql_query($q32) or die(mysql_error());
        //$num = mysql_num_rows($rex);
        //$ro12 = mysql_fetch_array($rex);
        //$cap = (string)$ro12['caption']; 
		mysql_close($con);
}
else
{
echo " No album found ";
}	
    ?>

</script>
<style type="text/css">
body{
 background: transparent;
 font-size: 11px;
 font-family: tahoma, verdana, arial;
 width: 100%;
 }
 
 #mainbox{
 background: transparent;
 width:100%;
 }
 #albumhead
 { 
 display:inline-block; 
 line-height:40px;
 font-size:14px; 
 font-weight:bold; 
 color:black; 
 font-family: tahoma, verdana, arial; 
 background-color: #4ECD1E; 
 height: 40px; 
 width:100%; 
 box-shadow:0px 2px 0px 0px lightgrey;
 }
 
 #albumbody
 {
 background-color: transparent;
 width:760px;;
 height:auto; 
 
 }
 #albumcont
 {
  background-color: transparent;
  width:170px;
  height:190px;
  display:inline-block;
  margin:5px;
  padding:2px;
  margin-top:50px;
  box-shadow: 1px 1px 1px 1px lightgrey;
    }
  #albumbox
  {
  background:tranparent;
  color:#4ECD1E;
  font-weight:bold;
  margin-left:10px;
  line-height:12px;
  width:155px;
  height:50px;
  overflow:hidden;
  margin-top:10px;
  
  }
  #imgcont{
  border: 1px solid lightgrey;
  
  width:150px;
  height: 120px;
  margin-left:8px;
  margin-top:5px;
  overflow:hidden;
  }
  #addmore
  {
	Float:right;
	margin:right:20px;
	margin-top:20px;
	
	
  }
</style>


</head>

<body>
    
	<div id=mainbox>
	
	<div id=albumhead> <span style="margin-left: 30px;">Your Pictures  [<?php echo $picscount; ?>]</span> </div>
	<div id=addmore> <span href="upic.php<?php echo "?id=$aid" ?>" class='nyroModal'><a class="btn add"> Add Pictures </a> </span></div>
	<div id="albumbody">
	
	
	<?php 
		while($rowpic = mysql_fetch_array($resultpics, MYSQL_ASSOC))
		{
		echo "<div id='albumcont'> <a href='upload/{$rowpic['fileName']}' class='nyroModal'><img src='upload/thumb/{$rowpic['fileName']}' id='imgcont'></img></a> <div id=albumbox> <a> {$rowpic['caption']} </a></div></div>";
		
		}
	?>
	
	</div>
	
		</div>
	
	
	
	
	
	
	
	
	<!--
	
<div id="masthead">
...masthead content goes here...
</div>
<div id="sidebar_a">
  <img src="dp.png" alt="Pic" height="150" width="150" />
		<p></p>
		<div id="Layer1"><b>Username</b></div>
                
                <p></p>
                <p></p>
                <p></p>
		<div id="Layer2">
		<table width="150" border="0" cellspacing="0" cellpadding="5" bgcolor="#00CC33">
  		<tr>
    		<td>Favorite Users</td>
  		</tr>
  		<tr>
    		<td>Faculty</td>
  		</tr>
  		<tr>
    		<td>College Buddies</td>
  		</tr>
		</table>
  </div>
</div>
<div id="sidebar_b">
  <ul>
    <li>Item one</li>
    <li>item two</li>
    <li>item three</li>
    <li>item four</li>
    <li>item five</li>
  </ul>
</div>
<div id="content">
<table cellspacing="5" cellpadding="5">
  <tr>
    <td><table cellspacing="5" cellpadding="5">
  <tr>
    <td><?php // echo "<div class='yoxview'><a href=$ab><img src=$ab width='640' height='480' /></a></div>";?>
       <?php// if(strlen($cap) != 0){echo $cap;}?> </td>
    <td><table cellspacing="5">
  <tr>
    <td><form id="visible" action="upload.php"><input type="submit" name="+1" value="+1"  /></form></td>
    <td><a href="dummy.php" ><input type="submit" name="X" value="X" /></a></td>
    <td><form action="Like.php"><input type="submit" name="Like" value="Like" /></form></td>
  </tr>
            <tr id="abc" class="he"><td colspan="3"><b><?php //echo $lk." Like This"; ?></b></td></tr>
            <tr class="he"><td colspan="3"><b><?php// echo $com." Comments"; ?></b></td></tr>
            <tr class="he"><td colspan="3"><b><?php //echo $vw." Views"; ?></b></td></tr>
</table>
</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table>
        <?php
		/*echo $num_res;
        $i = 0;
        while($row0 = mysql_fetch_array($result4))
          {
            
            if(($i == 0) || ($i%7 == 0))
            {
                echo "<tr>";
            }
            echo "<td>";
            
            $a = (string)("upload/thumb/".$row0['fileName']);?>
            <?php
            echo "<a href='refresh.php?i=".$row0['imageid']."'><img src=$a width='110' height='110' id=".$row0['imageid']." alt='".$row0['imageid']."'/></a>";
            echo $row0['imageid'];
            
            echo "</td>";
            if((($i%6 == 0) && ($i != 0)) || ($i == $num_res))
            {
                echo "</tr>";
            }
            $i++;
            } */
        ?>
		</table>
    </td>
  </tr>
</table>


</div>
   <!-- <div id="hid">
        <img src="dp.png" height="100%" width="100%" alt="Flynn" />
    </div>-->
</body>
</html>


