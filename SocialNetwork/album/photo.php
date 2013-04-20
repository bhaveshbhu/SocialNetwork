<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
<script language="javascript">
function swapform() {
    var visable;
    var hidden;
    visable = document.getElementById("visible").innerHTML;
    hidden = document.getElementById("theform").innerHTML;
    document.getElementById("visible").innerHTML = hidden;
}
</script>
</head>

<body>
    <?php
    $_SESSION['img'] = 24;
    $con = mysql_connect("fribler.db.8559473.hostedresource.com","fribler","K33pW0rk!ng");
    
    
        mysql_select_db("fribler", $con);
        $imag = $_SESSION['img'];
        $usr = $_SESSION['id'];
        $que = "SELECT fileName FROM images1 WHERE uid ='$usr'";
        //echo $que;
        $result4 = mysql_query($que) or die(mysql_error());
        $row0 = mysql_fetch_array($result4);
		$src=$row0[fileName]; 
		echo "<h1>".$row0[fileName]."</h1>";
        $num_res = mysql_num_rows($result4);
        for($i = 0; $i < $num_res; $i++)
        {
            ;
        }
        $que = "SELECT likes FROM images1 WHERE image_id = " . $imag;
        //echo $que;
        $result1 = mysql_query($que) or die(mysql_error());
        $row = mysql_fetch_array($result1);
        $lk = $row['likes'];
        $que = "SELECT views FROM images1 WHERE image_id = " . $imag;
        //echo $que;
        $result2 = mysql_query($que) or die(mysql_error());
        $row1 = mysql_fetch_array($result2);
        $vw = $row1['views'];
        $que = "SELECT comments FROM images1 WHERE image_id = " . $imag;
        //echo $que;
        $result3 = mysql_query($que) or die(mysql_error());
        $row2 = mysql_fetch_array($result3);
        $com = $row['comments'];
     
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
  
    <td><div id="visible" onclick="swapform()" ><a href="" target="_top"><img src=<?php echo $src ?> height="480" width="640" alt= <?php echo $row0['fileName'] ?>></a></div></td>
    <td><table cellspacing="5">
  <tr>
    <td><div id="visible"><input type="button" name="+1" value="+1" onclick="swapform()" /></div></td>
    <td><form action="del.php"><input type="button" name="X" value="X" onclick="javascript:return confirm('Are You Sure')" /></form></td>
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
        for($i = 0; $i < $num_res; $i++)
        {
            if(($i == 0) || ($i%5 == 0))
            {	if($i!=0)
				{	echo "</tr>";
				}
                echo "<tr>";
            }
            echo "<td>";
            ?>
            <a href="refresh.php"><img src="<?php echo $row0['fileName']?>" height="101" width="101" alt="image" /></a>
            
            <?php
            echo "</td>";
        }
        ?>
		</table>
    </td>
  </tr>
</table>


</div>
    <div id="theform" style="visibility: hidden">
    <form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Upload" />
</form>
</div>
</body>
</html>
