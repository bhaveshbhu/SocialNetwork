<html>
<head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/init.js" type="text/javascript"></script>
<script type="text/javascript">
var myValue;
$.post("time_get.php",{ } ,function(d) {
myValue=d;
//$("#load_t").html(u).fadeIn(2000);
});
var auto_refresh = setInterval(
function ()
{   $("#load_t").html(window.myValue).fadeIn(2000);
$.post("notify/notify_update.php",{ tdy:window.myValue } ,function(data) {
	   $("#latest").html(data).fadeIn(2000);
	  //$("#latest").fadeOut(4000);
    });
  $.post("time_get.php",{ } ,function(d) {
myValue=d;
//$("#load_t").html(u).fadeIn(2000);
});
//$("#load_t").html(window.myValue).fadeIn(2000);
},10000);
</script>
</head>
<body>
<form>
<input type="button" value="Click me!"  />
</form>
<div id="load_t"></div>
<center><div id="latest"></div></center>
</body>
</html>