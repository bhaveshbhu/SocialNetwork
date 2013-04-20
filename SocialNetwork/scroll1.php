<!DOCTYPE html>
<?php

mysql_connect("localhost","admin","bha2232308") or die (mysql_error());
mysql_select_db("fribler") or die (mysql_error());
$id=45;
?>
<?php

$sql1 = mysql_query("SELECT friend_array FROM myMembers WHERE id='$id' LIMIT 1"); 
while($row = mysql_fetch_array($sql1)){ 
    $friend_array = $row["friend_array"];
	}
	if ($friend_array  != "") 
{ 
	$friendArray = explode(",", $friend_array);
	$nof = count($friendArray);
	}
?>
<html>
<head>
  <style>
  body
  {
  
  scrollbar-face-color: #000000;
    scrollbar-highlight-color: #000000;
    scrollbar-shadow-color: #000000;
    scrollbar-3dlight-color: #000000;
    scrollbar-arrow-color: #000000;
    scrollbar-track-color: #000000;
    scrollbar-darkshadow-color: #000000;
  }
  .accordionButton {      
   width: auto;
   float: left;
   border-bottom: 1px solid #FFFFFF;
   cursor: pointer;
   height:30px;
   padding:6px 0 0 5px;
   text-align: left;
   }
.accordionContent {     
   width: 178px;
   float: left;
   background: #FFFFFF;
   border-bottom:1px solid lightblue;
   border-left:1px solid lightblue;
   padding: 1px 0 1px 1px;
   text-align:left;
  
}
table
{
position:fixed;
top:20px;
border: 1px solid black;
}
</style>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.js"> </script>
<script type="text/javascript">
			$(document).ready(function() {
	var p=4;
$('#accordionContent').scroll(function() {
var scrolltop=$('.accordionContent').attr('scrollTop');
var scrollheight=$('.accordionContent').attr('scrollHeight');
var windowheight=$('.accordionContent').attr('clientHeight');
$("#scroll").text( "scrollTop:" + scrolltop+" "+scrollheight+ "  " +windowheight);
var id = "<?= $id ?>";
$("#scroll").text(p);
var to= "<?= $nof ?>";
alert(to);
if (p<to)
{
			$('div#loader3').html('<img src="img/loading6.gif">');
$.post("listappend.php",{id:id,index:p } ,function(data) 
{
//alert(data);
	$('#content').append(data);
    });
	if((p+4)<=to)
p=p+4;	
else
p=to;
}
});
$('.status').text('+');
				$('.accordionButton').click(function() {
				$('.accordionButton').removeClass('on');
					$('.accordionContent').slideUp();
				$(this).find('.status').text('+');
				$('#status1').text('close');
				
					if($(this).next().is(':hidden') == true) 
					{
						$(this).addClass('on');
						$(this).next().show();
						$(this).find('.status').text('-');
						$('#status1').text('open');
						scrollalert();
				
					} 
		});
				$('.accordionContent').hide();
				$(".scroll").click(function(event){
					$('.accordionContent').hide();
					event.preventDefault();
					var trgt = $(this).attr("id");
					var target_offset = $("#"+trgt).offset();
					var target_top = target_offset.top;
					$('html, body').animate({scrollTop:target_top}, 500);
				});
			});
	
			</script>
			
</head>
<body>
<div id="scroll1"></div>
<table id="o">
<span id="1" class="accordionButton" style=" background-color: Transparent; display:block; border-bottom: solid 1px lightblue; width: 170px;text-align:left;">
 <a href="#" id="1" class="scrollaccordionButton">
                	<span class="status" ></span> <img src="../images/icons/star_16.png" style=" margin-right: 10px; margin-left:10px; " >   Fav. Users
</a>
</span>
<div class="accordionContent" id="accordionContent" style="height:230px; overflow-y:auto; overflow-x:hidden; font-weight:normal;" >
		<?php include('scroll_list.php'); ?>
				
</div>
</table>
<div id="scroll"></div>
</body>
</html>
