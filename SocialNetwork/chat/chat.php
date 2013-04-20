<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="chat/styles.css" />
<script src="js/jquery.js" type="text/javascript"></script>

<script type="text/javascript" >
$(document).ready(function(){
var count = $('.chat .onlineWidget .count');
	var panel = $('.chat .onlineWidget .panel');
	var timeout;
	
	// Loading the number of users online into the count div:
	count.load('chat/online.php');
	
	var auto_refresh = setInterval(
function ()
{   //$("#load_t").html(window.myValue).fadeIn(2000);
	count.load('chat/online.php');
},3000);
	$('.onlineWidget').hover(
		function(){
			// Setting a custom 'open' event on the sliding panel:
			
			clearTimeout(timeout);
			timeout = setTimeout(function(){panel.trigger('open');},500);
		},
		function(){
			// Custom 'close' event:
			
			clearTimeout(timeout);
			timeout = setTimeout(function(){panel.trigger('close');},500);
		}
	);
	
	var loaded=false;	// A flag which prevents multiple ajax calls to geodata.php;
	
	// Binding functions to custom events:
	
	panel.bind('open',function(){
		panel.slideDown(function(){
			if(!loaded)
			{
				// Loading the countries and the flags once the sliding panel is shown:
				panel.load('chat/list_online.php');
				loaded=true;
			}
		});
	}).bind('close',function(){
		panel.slideUp();
	});
		
});
</script>
</head>
<body>
<div id="chat" class="chat">
<div class="onlineWidget">
	<div class="panel"><img class="preloader" src="chat/img/preloader.gif" alt="Loading.." width="22" height="22" /></div>
	<div class="count"></div>
    <div class="label">online</div>
    <div class="arrow"></div>
</div>
</div>
</body>
</html>
