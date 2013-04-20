<head>
<link href="../../css_files/buttons.css" rel="stylesheet" type="text/css"/>
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> !-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script type="text/javascript" src="../../js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="../../stica/jquery.watermarkinput.js"></script>
	<script type="text/javascript" src="../../stica/jquery.timeago.js"></script>
	
  
<?php 
	require_once 'function.php'; 
	$fid=$_SESSION['id'];
	$viewid=$id;
	//$fid=49;
	function time_fcn($date,$granularity=2) {
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
			$retval="";
            $time = floor($difference/$value);
            $difference %= $value;
            $retval .= ($retval ? ' ' : '').$time.' ';
            $retval .= (($time > 1) ? $key.'s' : $key);
            $granularity--;
        }
        if ($granularity == '0') { break; }
    }
    return ' Sent : '.$retval.' ago';  
			}
	?>

<script type="text/javascript">

jQuery(document).ready(function() { jQuery("abbr.timeago").timeago();});
$(document).ready(function(){
$(".close").mouseover(function(){
// alert("hdj");
 $(this).animate({opacity:.2},"slow");
 });
 $(".close").mouseout(function(){
// alert("hdj");
 $(this).animate({opacity:1},"slow");
 });
 
 $(document).ready(function(){
 $(".close").click(function(){
  $('#load').fadeIn();
var element = $(this).parent();
var I = $(this).attr("name");
var string = 'noteid='+ I ;

$.ajax({
	
   type: "POST",
   url: ("stica/delnote.php"),
   data: string,
   cache: (false),
   success: function(){
	element.slideUp('slow', function() {$(this).remove();});
	$('#load').fadeOut();
  }
   
 }); 

 });
 });



 $("#sendnote").click(function(){
 
	var x1=document.send_note.message.value;
	
	var y1=document.send_note.type.value;
		
	var z1=document.send_note.sendto.value;
	var viewdis=<?php echo "$viewid"; ?>
	
	 
	//alert(x);
	//alert("stica2.php?type="+y);
	//alert(y);
	//window.redirect("story.php?status="+ x);
	 //$(".clear").attr('href','story.php?id='+x);
	// .attr('class', $(this).attr('class') + ' divclearable')    $("#charges-gsm-faq").hide().html(html).fadeIn();
	//document.cancel.href.value=story.php?status="+x;
	if(x1 === undefined || x1 == null || x1.length <= 0){
	alert("Blank Message");
	}
	else
	{
		$("#loading").show();
	    
	}
	$('#sidebar').hide().load('stica/stica2.php?sto='+z1+'&type='+y1+'&viewid='+viewdis,{ message:x1 },function(){ $("#loading").hide(); }).fadeIn("slow");
	alert("Sucessfully Sent");
	document.getElementById('#tweet').value="";
 });
 
  
/*
$(".close").click(function() {
alert("0");
$('#load').fadeIn();
alert("1");
var commentContainer = $(this).parent();
var noteid = $(this).attr("name");
var string = 'noteid='+ noteid ;
alert("2");
	
$.ajax({
   type: "POST",
   url: "stica/delete.php",
   data: string,
   alert("3");
   cache: false,
   success: function(){
	commentContainer.slideUp('slow', function() {$(this).remove();});
	$('#load').fadeOut();
  }
   
 });

return false;
	});
	
	*/

 
});
 
$(document).ready(function(){
$(".sendtolist").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{}
else
{
$.ajax({
type: "POST",
url: "stica/search.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}return false; 
});
});

jQuery(function($){
$("#sendto").Watermark("Type a username name");
});


/*
$(document).ready(function() {
var refreshId = setInterval(function()
{
     $('#sidebar').fadeOut("100").load('stica2.php').fadeIn("100");
}, 30000);
});
*/
$(document).ready(function()
{

$("#tweet").keyup(function()
{
var box=$(this).val();
var main = box.length *100;
var value= (main / 80);
var count= 80 - box.length;

if(box.length <= 80)
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
var maxln=80;
function textLimit(field, maxlen) {
alert('your input has been truncated!');
if (box.value.length > maxlen)
box.value = box.value.substring(0, maxlen);
};
}
return false;
});

});



$(function() {
                $('#activator').click(function(){
                    $('#overlay').fadeIn('fast',function(){
                        $('#box').animate({'top':'160px'},500);
                    });
                });
                $('#boxclose').click(function(){
                    $('#box').animate({'top':'-3000px'},500,function(){
                        $('#overlay').fadeOut('fast');
                    });
                });

            });
			
 $(document).ready(function() {
  
    $("html").niceScroll();  // The document page (body)
    
    $("#rightcolumn").niceScroll();
$("#myTable").niceScroll(); 	// First scrollable DIV
	});				

</script>

<style>
.stica{
position:relative;
width:160px;
height:auto;
border:1px solid grey;
padding-left:10px;
padding-right:00px;
padding-top:0px;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
-moz-box-shadow: 0 1px 2px #333;
-webkit-box-shadow: 0 1px 2px #333;
}
.stica hr{
	position:relative;
	width:90%;
	}
	#stica span{
	font-size:11px;
	font-family: tahoma, verdana, arial;
	width:155px;
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
width:150px;
border:solid 2px #000;
margin-right:3px;
-webkit-border-radius:5px;-moz-border-radius:5px;
}
#count
{
float:left;
margin-left:8px;
font-family:'Tahoma', Times New Roman, Times, serif;
font-size:12px;
font-weight:bold;
color:#666666

}		
#sidebar{
position:absolute;
top:40px;
left:0px;
width:180px;
height:auto;
border:none;
wrap:no-wrap;
padding-left:3px;
padding-top:5px;

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

body{
           
            font-family:Tahoma, verdana,arial;
            
        }
        .header
        {
            width:600px;
            height:56px;
            position:absolute;
            top:0px;
            left:25%;
            background:#fff url(title.png) no-repeat top left;
        }
        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#fff url(codrops_back.png) no-repeat top left;
            z-index:1;
            cursor:pointer;
        }
        a.activator{
            width:153px;
            height:40px;
          
			float:right;
			margin-right:10px;
            top:0px;
            left:0px;
            background:#fff url(clickme.png) no-repeat top left;
            z-index:1;
            cursor:pointer;
        }
        /* Style for overlay and box */
        .overlay{
            background:transparent url(../../stica/images/overlay.png) repeat top left;
            position:fixed;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            z-index:100;
        }
        .box{
            position:fixed;
            top:-300px;
            left:30%;
            right:30%;
			width:500px;
            background-color:#fff;
            color: Black;
            padding:20px;
            border:2px solid #ccc;
            -moz-border-radius: 4px;
            -webkit-border-radius:4px;
            -khtml-border-radius:4px;
            -moz-box-shadow: 0 1px 5px #333;
            -webkit-box-shadow: 0 1px 5px #333;
            z-index:101;
        }
        .box h1{
            border-bottom: 1px dashed #7F7F7F;
            margin:-20px -20px 0px -20px;
            padding:10px;
            background-color: Lightgrey;
            color:Black;
            -moz-border-radius:4px 4px 0px 0px;
            -webkit-border-top-left-radius: 4px;
            -webkit-border-top-right-radius: 4px;
            -khtml-border-top-left-radius: 4px;
            -khtml-border-top-right-radius: 4px;
        }
        a.boxclose{
            float:right;
            width:26px;
            height:26px;
            background:transparent url(../../stica/images/cancel.png) repeat top left;
            margin-top:-30px;
            margin-right:-30px;
            cursor:pointer;
        }

#searchbox
{
width:250px;
border:solid 1px #000;
padding:3px;
}
#display
{
width:250px;
display:none;
float:right; margin-right:30px;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
}

.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
#shade
{
background-color:#00CCFF;

}
#load {
	position:absolute;
	left:5px;
	Background:white;
	background-position:center;
	background-repeat:no-repeat;
	width:159px;
	color:#999;
	font-size:18px;
	font-family:Arial, Helvetica, sans-serif;
	height:40px;
	font-weight:300;
	padding-top:14px;
	top: 23px;
}
a.close:hover{
font-weight:bold;
font-size:12px;
}
	
	</style>
	</head>




<body>
		
		        <div class="content" style="display:block; position:fixed; z-index:12; width:175px;height:40px; background:white;">
            <!-- The activator -->
            <a class="btn" id="activator" style=" padding-left:10px;width:100px; margin-right:20px; "><span style="background:transparent; padding-top:0px;" > <img src="../../images/icons/note.png" /> </span><span style="display:inline-block; background:transparent; width:80px;padding:0px; margin-left:35px; top:0px;">Sticky Note</span></a>
        </div>
		
		 <!-- The overlay and the box -->
        <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box">
            <a class="boxclose" id="boxclose"></a>
            <h1 style="font-size:12px; font-weight:bold;"> Send a Sticky note</h1>
            
				<div id="display"></div>
				<form  method="post" name="send_note" action="">
				<table>
			<tr><td width="80px;">Send To</td><td><input type="text" name="sendto" width="150px"  class="sendtolist" id="sendto" />  </td></tr>
			</table>
			<table border="0px solid " width="525px">
			<tr height="60%">
			<td width="70%" style=" border:0px">

				<textarea name="message" placeholder="Type Message here" size="81" rows="3" cols="50" style=" width:400px; max-width:425px;" id="tweet" ></textarea>
			</td>	
			<td width="30%" style=" border:0px">    
				<select name="type">
				<option value="0">Casual</option>
				<option value="1">urgent</option>
				<option value="2">soft</option>
				</select>
				<input type="button" name="submit" value="send" id="sendnote" />
				</form>
		    </td>
			</tr>
			<tr height="40%" style=" border:0px">
			<td>
				<div align="left" id="character-count"><!--Start Character Count-->
				<div id="barbox"><div id="bar"></div></div>
				<div id="count">80</div>
				</div><!--End Character Count-->
				<img style="margin-left:10px;" id="loading" src="../../images/loading1.gif" width="20" height="20px"></img>
			</td>
			</tr>
		</table>
        </div>
		
		
        
		<div id="sidebar" >
		<div id="load" align="center"><img src="../../images/loading1.gif" width="25" height="25" align="absmiddle"/> Loading...</div>
				<?php

					
					if($viewid==$fid)
					{
					include 'connect.php';
					//include 'connectfribler.php' ;
				$toid=$fid;
				$cdquery="select * from stica where to_id=$toid ORDER BY time DESC ";
	$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error()); 
					}
					else 
					{
					include 'connect.php';
					
					$sent_from=$fid;
					$cdquery="select * from stica where from_id=$sent_from AND to_id=$viewid ORDER BY time DESC ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());        
					}
						//$fromid=2;
				         
while($cdrow=mysql_fetch_array($cdresult) )
  {	
  $noteid=$cdrow['stica_id'];
    $content=$cdrow['content']; 
	$time2=$cdrow['time'];
	$time3=date( "Y-M-d H:i:s", strtotime($time2) + 45600 );
	$time=$time3;
	$uid=$cdrow['from_id'];
	$from_id=$uid;
	$type=$cdrow['type'];
	include 'connectfribler.php' ;
	$sender=user($from_id);
	$senderpic=profilepic($uid);
	
	
	switch ($type)
	{
	case 1:
	  $color='#FFCCCC';
	  break;
	case 2:
	 $color='LIGHTGREEN';
	  break;
	default:
	  $color='#FCFAB0';
	}
	
		//echo "<li>";
	//echo "<div id=\"stica\">
	echo "
			
	<div class=\"stica\" align='center' style=\"background-color:$color\" id=$noteid >
	<a style='font-size:11px; background:transparent;font-family:segoe print,tahoma, verdana, arial; width:15px; float:right; text-align:right; cursor:pointer; margin-right:5px; ' class=\"close\" name='$noteid' >X</a>
		<div><b style='display:block;'>$sender</b><img src='$senderpic' style='width:25px; float:left; background:white; margin-right:5px;padding:1px;'/><p style='font-size:11px; font-family: segoe print,tahoma, verdana, arial; text-align:left;margin:2px; margin-left:3px; background:transparent;word-wrap:break-word; width:155px;'> $content </p>
		</div>
		<p style='color:red;font-size:9px; margin-right:2px;margin-bottom:2px; text-align:right; margin-top:2px;'><abbr class='timeago' title='$time'></abbr></p>
		</div>";
	echo "</br>"; 
	}
	
	mysql_close();?>
		
	</div>
		
		
</body>	