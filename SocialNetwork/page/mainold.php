<?php
session_start();
//echo $_SESSION['clg'];
include("connect.php");
$q = "SELECT * FROM details WHERE CampID = ".$_SESSION['clg'];
$res = mysql_query($q) or die(mysql_error());
$ro = mysql_fetch_array($res);
$ab = (string)$ro['pic'];
$file = (string)($ro['Campus'].".xml");
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
		echo "<marquee  behavior='scroll' direction='up'>";
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
		echo "</marquee>";
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
?>
<html>
<head>
<script type='text/javascript' src='yoxview/yoxview-init.js'>
</script>
    <script type="text/javascript">
			$(document).ready(function(){
				$(".yoxview").yoxview({
                    /*skin: "top_menu",*/
                    allowInternalLinks: true
				});
			});
		</script>
		
<link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body>
<div id='masthead'>
...masthead content goes here...
<a href="qwe.php">Edit CSS</a>
</div>
<div id='Main'>
<div id='image'>
<?php
echo "<img src=$ab width='100%' height='200px' />";
?>
</div>
<div id='body'>
<div id='sidebar_a'>
  <div id='new'>
	<div class='head'>
		<div class="thumbnails yoxview"><h3>What's New</h3><a href="#addWN"><img src="edit.png" alt="Add" height="20px" width="20px" align="right"/></a><a href="#delWN"><img src="del.png" alt="Del" height="20px" width="20px" /></a></div>
	</div>
	<?php
		display("new");
		?>
  </div>
  <div id='story'>
	<div class='head'>
		<div class="thumbnails yoxview"><h3>Story Board</h3><a href="#addSB"><img src="edit.png" alt="Add" height="20px" width="20px" align="right"/></a><a href="#delSB"><img src="del.png" alt="Del" height="20px" width="20px" /></a></div>
	</div>
	<?php display("story"); ?>
  </div>
</div>



<div id='sidebar_b'>
  <div id='info'>
  <h1>This is Info Section</h1>
  </div>
</div>




<div id='content' >
	<div id='Col3'>
		<div id='Faculty' class='bod'>
			<div class='head'><h4>Faculty</h4></div>
			<?php echo "<a href='abc.html'>".$ro['Faculty']." Registered</a>";?>
		</div>
		<div id='Students' class='bod'>
			<div class='head'><h4>Students</h4></div>
			<?php echo "<a href='abc.html'>".$ro['Student']." Registered</a>";?>
		</div>
		<div id='Dept' class='bod'>
			<div class='head'><h4>Departments</h4></div>
		</div>
		<div id='Alumni' class='bod'>
			<div class='head'><h4>Alumni</h4></div>
			<?php echo "<a href='abc.html'>".$ro['Alumni']." Registered</a>";?>
		</div>
	</div>
	<div id='Col2'>
		<div id='Events' class='bod1'>
			<div class='head'>
				<div class="thumbnails yoxview"><h3>Events</h3><a href="#addEv"><img src="edit.png" alt="Add" height="20px" width="20px" align="right"/></a><a href="#delEv"><img src="del.png" alt="Del" height="20px" width="20px" /></a></div>
			</div>
			<?php display("events"); ?>
		</div>
		<div id='Photos' class='bod1'>
			<div class='head'><h3>Photos</h3></div>
			<?php display("photos"); ?>
		</div>
		<div id='Others' class='bod1'>
			<div class='head'>
				<div class="thumbnails yoxview"><h3>Others</h3><a href="#addOt"><img src="edit.png" alt="Add" height="20px" width="20px" align="right"/></a><a href="#delOt"><img src="del.png" alt="Del" height="20px" width="20px" /></a></div>
			</div>
			<?php display("other"); ?>
		</div> 
	</div>
</div>

</div>
</div>

<div id="edit"style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form action="addWN.php" method="post">  
        <textarea name="content" cols="50" rows="15" > 
        
		<input type="submit" value="Save" />
        </textarea>
        </form>
</div>
<div id="addWN" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=new">  
        <input type="text" id="new" />
		<input type="submit" value="Add" />
</form>
</div>
<div id="addSB" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=story">  
        <input type="text" id="new" />
		<input type="submit" value="Add" />
</form>
</div>
<div id="addEv" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=events">  
        <input type="text" id="new" />
		<input type="submit" value="Add" />
</form>
</div>
<div id="addOt" style="display: none; width: 700px; height: 400px; background: White; overflow: auto; padding: 20px;">
<form method="get" action="addWN.php?type=other">  
        <input type="text" id="new" />
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
</body>
</html>