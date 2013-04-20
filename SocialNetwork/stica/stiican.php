<?php require_once 'stica/function.php'; 
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

;
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
                    $('#box').animate({'top':'-200px'},500,function(){
                        $('#overlay').fadeOut('fast');
                    });
                });

            });

		
</script>

		
	
