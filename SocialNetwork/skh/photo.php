<?php session_start();
include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Album</title>
<style type="text/css">
<!--
@import url("styl.css");
#Layer3 {
	position:absolute;
	width:204px;
	height:354px;
	z-index:1;
}
.float{
    
    margin: 0 5 0 0;
}
-->
</style>
<script type="text/javascript" src="yoxview/yoxview-init.js">
function con()
{
    var r = confirm("Are You Sure?");
    if(r == true)
        window.location = "del.php";
}

</script>
</head>

<body>
    <?php
   //session_start();
    //$_SESSION['img'] = 37;
	//$usr=1;
    //include("connect.php");
        $imag = $_SESSION['img'];
        $usr = (int)$_SESSION['id'];
        $q = "SELECT fileName, imageid FROM images WHERE uid=".$usr." ORDER BY UploadDate";
        //echo $q." ".$imag." ".$usr;
        $result4 = mysql_query($q) or die(mysql_error());
		$ct = mysql_num_rows($result4);
		echo $ct;
		if($ct > 0)
		{
        //echo mysql_error($con);
        //$row0 = mysql_fetch_array($result4);
        $num_res = mysql_num_rows($result4);
        $que = "SELECT * FROM images WHERE imageid=".$imag;
        $result1 = mysql_query($que) or die(mysql_error());
        $row = mysql_fetch_array($result1);
        $lk = $row['likes'];
        //$que = "SELECT views FROM images WHERE imageid=".$imag;
        //$result2 = mysql_query($que) or die(mysql_error());
        //$row1 = mysql_fetch_array($result2);
        $vw = $row['views'];
        //$que = "SELECT comments FROM images WHERE imageid=".$imag;
        //$result3 = mysql_query($que) or die(mysql_error());
        //$row2 = mysql_fetch_array($result3);
        $com = $row['comments'];
        $ab = "upload/".$_SESSION['bigp'];
		//$thumb = "upload/thumb/".$row0['fileName'];
        //echo $_SESSION['bigp'];
        $q32 = "SELECT caption from images WHERE fileName = '".(string)$ab."'";
        //echo $q32;
        $rex = mysql_query($q32) or die(mysql_error());
        $num = mysql_num_rows($rex);
        $ro12 = mysql_fetch_array($rex);
        $cap = (string)$ro12['caption']; 
}
else
{
$ab = "dp.png";	
}	
    ?>
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
    <td><?php echo "<div class='yoxview'><a href=$ab><img src=$ab width='640' height='480' /></a></div>";?>
       <?php if(strlen($cap) != 0){echo $cap;}?> </td>
    <td><table cellspacing="5">
  <tr>
    <td><form id="visible" action="upload.php"><input type="submit" name="+1" value="+1"  /></form></td>
    <td><a href="dummy.php" ><input type="submit" name="X" value="X" /></a></td>
    <td><form action="Like.php"><input type="submit" name="Like" value="Like" /></form></td>
  </tr>
            <tr id="abc" class="he"><td colspan="3"><b><?php echo $lk." Like This"; ?></b></td></tr>
            <tr class="he"><td colspan="3"><b><?php echo $com." Comments"; ?></b></td></tr>
            <tr class="he"><td colspan="3"><b><?php echo $vw." Views"; ?></b></td></tr>
</table>
</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table>
        <?php
		echo $num_res;
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
            }
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
