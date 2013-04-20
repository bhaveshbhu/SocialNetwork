<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
<?php require_once 'function.php'; 
	include 'connect.php'
?>

<script>
$(document).ready(function(){
 $("#submit").click(function(){
	var x=document.form1.message.value;
	var y=document.form1.type.value;
	 $("#loading").show();
	//alert(x);
	//alert("stica2.php?type="+y);
	//alert(y);
	//window.redirect("story.php?status="+ x);
	 //$(".clear").attr('href','story.php?id='+x);
	// .attr('class', $(this).attr('class') + ' divclearable')    $("#charges-gsm-faq").hide().html(html).fadeIn();
	//document.cancel.href.value=story.php?status="+x;
    $('#sidebar').hide().load('stica2.php?type='+y, { message:x },function(){ $("#loading").hide(); }).fadeIn("slow");
	
	//alert("snkj");
 });
 $(".close").mouseover(function(){
// alert("hdj");
 $(this).animate({opacity:.2},"slow");
 });
 $(".close").mouseout(function(){
// alert("hdj");
 $(this).animate({opacity:1},"slow");
 });
 
 
 $(".close").click(function(){
var element = $(this);
var I = element.attr("name");
alert(I+'stica');
$(I+'stica').hide();

 });
 
 
 
});




$(document).ready(function()
{
$(".stica").draggable();

$("#tweet").keyup(function()
{
var box=$(this).val();
var main = box.length *100;
var value= (main / 60);
var count= 60 - box.length;

if(box.length <= 60)
{
$('#count').html(count);
$('#bar').animate(
{
"width": value+'%',
}, 1);
}
else
{
alert('Character Limit Exceeded!');

;
}
return false;
});

});
</script>

<style>
.stica{
position:relative;
width:110px;
height:auto;
border:1px solid maroon;
padding-left:10px;
padding-right:00px;
padding-top:0px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
}
.stica hr{
	position:relative;
	width:80%;
	}
	#stica span{
	font-size:small;
	}
#form{
	position:absolute;
	left:100;
	top:100;
	width:200;
	height:150;
	border:1px solid red;
	}
#table{
		width:auto;
		height:100%;
		}
#bar
{
background-color:#5fbbde;
width:0px;
height:16px;
}
#barbox
{
float:left;
height:16px;
background-color:#FFFFFF;
width:100px;
border:solid 2px #000;
margin-right:3px;
-webkit-border-radius:5px;-moz-border-radius:5px;
}
#count
{
float:left;
margin-left:8px;
font-family:'Georgia', Times New Roman, Times, serif;
font-size:16px;
font-weight:bold;
color:#666666
}		
#sidebar{
position:absolute;
top:0px;
right:0px;
width:140px;
height:auto;
border:2px solid green;
wrap:no-wrap;
padding-left:20px;
padding-top:30px;
}
#loading{
display:none;
}

#loading{
display:none;
}
.close{
color:red;
}

	
	</style>
	</head>




<body>
		<table border="2px">
			<tr height="60%">
				<form  method="post" name="form1" action="">
			<td width="70%">
				<textarea name="message" placeholder="send a message" rows="3" cols="40" id="tweet" ></textarea>
			</td>	
			<td width="30%">    
				<select name="type">
				<option value="0">timepass</option>
				<option value="1">urgent</option>
				<option value="2">soft</option>
				</select>
				<input type="button" name="submit" value="send" id="submit"/>
				</form>
		    </td>
			</tr>
			<tr height="40%">
			<td>
				<div align="left" id="character-count"><!--Start Character Count-->
				<div id="barbox"><div id="bar"></div></div>
				<div id="count">60</div>
				</div><!--End Character Count-->
				<img id="loading" src="loading1.gif" width="120px" height="15px">
			</td>
			</tr>
		</table>
		
		<div id="sidebar">
				<?php	$toid=2;
						$fromid=2;
				$cdquery="select * from stica where to_id=$toid ORDER BY stica_id DESC limit 4 ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());                 
while($cdrow=mysql_fetch_array($cdresult) )

  {	$id=$cdrow[stica_id];
    $content=$cdrow[content]; 
	$time=$cdrow[time];
	$uid=$cdrow[from_id];
	$type=$cdrow[type];
	$sender=user($uid);
	
	
	switch ($type)
	{
	case 1:
	  $color='#FFCCCC';
	  break;
	case 2:
	 $color='#D6FFC2';
	  break;
	default:
	  $color='#FFFFC2';
	}
	
		//echo "<li>";
	//echo "<div id=\"stica\">
	echo "<div class=\"stica\" align='center' style=\"background-color:$color\" id=$idstica >
		<span style='font-size:small'>$sender says<span class=\"close\" name=#$id style='float:right'>X</span></span>
		<hr>
		<span>$content
		</span>
		<p style=\"color:red;font-size:small\">$time</p>
		</div>";
	echo "</br>";
	}
	
	?>
		
	</div>
		
		
</body>	