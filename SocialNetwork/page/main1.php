<?php
session_start();
//echo $_SESSION['clg'];
include("connect.php");
$clgD = $_REQUEST['cid'];
$_SESSION['clg'] = $clgD;
$q = "SELECT * FROM details WHERE CampID = ".$_SESSION['clg'];
$res = mysql_query($q) or die(mysql_error());
$ro = mysql_fetch_array($res);
$ab = (string)$ro['pic'];
$file = (string)($ro['Campus'].".xml");
/*$q = "SELECT adminID FROM details WHERE CampID = ".$_SESSION['clg'];
$rez = mysql_query($q) or die(mysql_error());
$ro = mysql_fetch_array($rez);*/
$admin = $ro['adminID'];
//echo $admin;
if($_SESSION['id'] == $admin)
{
	$ad = 1;
	//echo "admin".$ad;	
}
else
{
	$ad = 0;
	//echo "Not Admin".$ad;
	
}
function display($type)
{
		global $file, $ro;
		$doc = new DOMDocument();
		$doc->load($file);
		$doc->formatOutput = true;
		$elements = $doc->getElementsByTagName($type);
		$no = (int)$ro["new"];
		//echo $no;
		switch($type)
				{
					case "new": $el = "n1";
								break;
					case "story": $el = "s1";
								break;
					case "events": $el = "e1";
								break;
					case "photos": $el = "p1";
								break;
					case "other": $el = "o1";
								break;
				}
		//echo "<marquee  behavior='scroll' direction='up'>";
		foreach($elements as $element)
		{
			for($i = 0; $i <= $no; $i++)
			{
				//echo $i;
				$names = $element->getElementsByTagName($el);
				$name = $names->item($i)->nodeValue;				
				echo "<a href=''><b>$name\n</b></a><p />";
			}			
		}
		//echo "</marquee>";
}
function delDisplay($type)
{
		global $file, $ro;
		//echo "In Function";
		$doc = new DOMDocument();
		$doc->load($file);
		$doc->formatOutput = true;
		$no = (int)$ro["new"];
		//echo $file;
		switch($type)
				{
					case "new": $el = "n1";
								break;
					case "story": $el = "s1";
								break;
					case "events": $el = "e1";
								break;
					case "photos": $el = "p1";
								break;
					case "other": $el = "o1";
								break;
				}
		$elements = $doc->getElementsByTagName($type);
		echo "<form method='post' action='delWN.php'>";  
        foreach($elements as $element)
		{
			for($i = 0; $i <= $no; $i++)
			{
				
				//echo $el;
				//echo $i;
				$names = $element->getElementsByTagName($el);
				$name = $names->item($i)->nodeValue;
				echo "<input type='checkbox' name='typ[]' value='".$name."' />".$name."<br />";			
			}			
		}
		echo "<input type='submit' value='Delete' />";
		echo "<input type='type' value=".$type." id = 'hid' />";
		echo "</form>";
		
}
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a T");
$time= date("g:i A");

/*$qin = "SELECT * FROM info WHERE CampID = ".$_SESSION['clg'];
//echo $qin;
$rein = mysql_query($qin) or die(mysql_error());
$count = mysql_num_rows($rein);
//echo $count;
$rowin = mysql_fetch_array($rein);*/
?>
<html>
<head>
<!--
<script type='text/javascript' src='yoxview/yoxview-init.js'>


</script> !-->
    <script type="text/javascript">
			$(document).ready(function(){
				$(".yoxview").yoxview({
                    /*skin: "top_menu",*/
                    allowInternalLinks: true
				});
			});
		</script>
		<script language="javascript">
<!--

var state = 'none';

function showhide(layer_ref) {

if (state == 'block') {
state = 'none';
}
else {
state = 'block';
}
if (document.all) { //IS IE 4 or 5 (or 6 beta)
eval( "document.all." + layer_ref + ".style.display = state");
}
if (document.layers) { //IS NETSCAPE 4 or below
document.layers[layer_ref].display = state;
}
if (document.getElementById &&!document.all) {
hza = document.getElementById(layer_ref);
hza.style.display = state;
}
}
//-->
</script>
		
<link rel='stylesheet' type='text/css' href='main1.css' />
<link rel="stylesheet" href="scripts/nyroModal.css" type="text/css" media="screen" />

<style type="text/css">
#lout{
font-family: Tahoma, verdana, arial;
font-size: 11px;
float:right;
font-weight:bold;
padding:1px;
text-align:center;

}

.lout:hover{
cursor:pointer;
font-weight: bold;
color: blue;
text-decoration:underline;
-moz-box-shadow: 0 1px 5px #333;
-webkit-box-shadow: 0 1px 5px #333;
}	
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nyroModal.custom.js"></script>
<script type="text/javascript">
$(function() {
  $('.nyroModal').nyroModal();
	});
</script>
</head>
<body>
<div id="maincontainer">

<div id="topsection"><div class="innertube1"> <a href="home.php"> <img src="../../images/hlogo.png" style=" margin-left: 30px;"></a>
<a href="#"><img border="0" class="ad1" src="../../images/icons/home.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="../../images/icons/friend.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href="main1.php"><img border="0" class="ad1" src="../../images/icons/faculty.png" /></a>
      &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="../../images/icons/pics.png" /></a>
	  &nbsp;&nbsp;&nbsp;<a href=""><img border="0" class="ad1" src="../../images/icons/doc.png" /></a>
	  <table style="float:right;">
	  <tr><td><a  id="lout" style="color:white;" ><?php echo $time ;?></a> </td></tr>
	  <tr><td><a href="../../logout.php" id="lout" class="lout" style="width:50px;">Log out</a> </td></tr>
	  </table>


</div></div>

<div id='image' >

<?
echo "<img src=$ab width='100%' height='200px' />" ;
?>

</div>
<div id='body'>
<div id='sidebar_a'>
  <div id='new'>
	<div class='head'>
		<div class="wtsncls" style="display:inline;">
			<h3>What's New
			<div id="ad" style="float:right;"> <a href="#addWN" ><?php if($ad){ echo "<img src='add_16.png' alt='Add' class='sh' />";} else{ echo "<img src='add_16.png' alt='Add'  class='hd' />";}?></a><a href="#delWN"><img src="del_16.png" alt="Del"  <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a></h3> </div>
		<?php display("new");?>
		</div>
	</div>
	<?php // display("new");?>
	
	<div id='story'>
	<div class='head'>
		<div class="wtsncls">
			<h3>Story Board</h3>
			<div id="ad"><a href="#addSB">
			<!--
			<img src="editBt.png" alt="Add" height="20px" width="20px" <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a><a href="#delSB"><img src="del.png" alt="Del" height="20px" width="20px" <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a></div> !-->
		<?php display("story"); ?>
		</div>
	</div>
  </div>
  
	
  </div>
</div>

 
<div id='sidebar_b'>
  <div id='info'>
  <div class='head'><h3 style="display:inline;">Info </h3><?php if($ad){ echo "<a href='change_info.php' class='nyroModal' display='inline' style='float:right;'><img src='edit_16.png' alt='Add' class='sh'  /></a>";} else{ echo "<img src='add_16.png' alt='Add'  class='hd' />";}?> </div>
  </div>
  <div id='Col3'>
		<div id='Faculty' class='bod' style="height:50px;float: left;width: 150px;">
			<div class='head1'><h4>Faculty</h4></div>
			<?php echo "<a href='abc.html'>".$ro['Faculty']." Registered</a>";?>
		</div>
		<div id='Students' class='bod' style="height:50px;float:right; width: 150px;">
			<div class='head1'><h4>Students</h4></div>
			<?php echo "<a href='abc.html'>".$ro['Student']." Registered</a>";?>
		</div>
		<div id='Dept' class='bod' style="height:50px;float:left;width: 150px;">
			<div class='head1'><h4><a href="dep.php">Departments</a></h4></div>
		</div>
		<div id='Alumni' class='bod' style="height:50px;float:right; width: 150px;">
			<div class='head1'><h4>Alumni</h4></div>
			<?php echo "<a href='abc.html'>".$ro['Alumni']." Registered</a>";?>
		</div>
		<div id='details' class='bod' style="float:left; width:300px">
		<div class='head1'> <h4>Name : <?php echo $ro['Campus']; ?></h4></div>
		<div class='head1'> <h4>Short Name : <?php echo $ro['ShortName']; ?></h4></div>
		<div class='head1'> <h4>Estd : <?php echo $ro['Est']; ?></h4></div>
		<div class='head1'> <h4>Motto : <?php echo $ro['Motto']; ?></h4></div>
		<div class='head1'> <h4>Location : <?php echo $ro['Location']; ?></h4></div>
		<div class='head1'> <h4>Type : <?php echo $ro['type']; ?></h4></div>
		<div class='head1'> <h4>Website : <?php echo $ro['Website']; ?></h4></div>
		<div class='head1'> <h4> email id: <?php echo $ro['Email']; ?></h4></div>
		<div class='head1'> <h4>Dean : <?php echo $ro['Dean']; ?></h4></div>
		<div class='head1'> <h4>Director : <?php echo $ro['Director']; ?></h4></div>
		<div class='head1'> <h4>Contact No.: <?php echo $ro['Phone']; ?></h4></div>
		<div class='head1'> <h4> Campus Area: <?php echo $ro['Area']; ?></h4></div>
		</div>
</div>
</div>




<div id='content' >
	
	<div id='Col2'>
		<div id='Events'>
		<div class='head'>
		<div class="wtsncls" style="overflow:auto;">
		<h3 class="wtsncls" style="Display:inline;">Events 
			<div id="ad" align="right" style="Display:inline; float:right;"><a href="addEv.php" class='nyroModal' alt='click hear to add a new event'><img src="add_16.png" alt="Add"  <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a><a href="#delEv"><img src="del_16.png" alt="Del"  <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a></h3></div>
		<?php display("events"); ?>
		</div>
	</div>
			
			
		</div>
		<div id='Photos' class='bod1'>
			<div class='head'><h3>Photos</h3></div>
			<?php display("photos"); ?>
		</div>
		<div id='Others' class='bod1'>
			<div class='head'>
				<div class="wtnscls">
					<h3 style="display:inline;">Others</h3>
					<div id="ad" style="float:right;"><a href="#addOt"><img src="add_16.png" alt="Add" <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a><a href="#delOt"><img src="del_16.png" alt="Del"  <?php if($ad){echo "class='sh'";} else{echo "class='hd'";}?>/></a></div>
				</div>
			</div>
			<?php display("other"); ?>
		</div> 
	</div>
</div>

</div>-


<div id="edit"style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form action="addWN.php" method="post">  
        <textarea name="content" cols="50" rows="15" > 
        
		<input type="submit" value="Save" />
        </textarea>
        </form>
</div>
<div id="addWN" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=new">  
        <input type="text" id="new" name="new"/>
		<input type="submit" value="Add" />
</form>
</div>
<div id="addSB" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=story">  
        <input type="text" id="new" name="new"/>
		<input type="submit" value="Add" />
</form>
</div>
<div id="addEv" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=events">  
        <input type="text" id="new" name="new"/>
		<input type="submit" value="Add" />
</form>
</div>
<div id="addOt" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=other">  
        <input type="text" id="new" name="new"/>
		<input type="submit" value="Add" />
</form>
</div>
<div id="delWN" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
	<?php delDisplay("new");?>
</div>
<div id="delSB" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
	<?php delDisplay("story");?>
</div>
<div id="delEv" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
	<?php delDisplay("events");?>
</div>
<div id="delOt" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
	<?php delDisplay("other");?>
</div>
</div>
</body>
</html>