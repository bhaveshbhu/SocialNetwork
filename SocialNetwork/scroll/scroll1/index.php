<html>
<head>
	<link rel="stylesheet" href="colorbox.css" />
	<link href="prof_img_scroller.css" rel="stylesheet" />
	<script src="../colorbox/jquery.min.js"></script>
     <script src="../colorbox/jquery.colorbox.js"></script>
	<script src="../colorbox/jquery-ui-1.8.13.custom.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".group2").colorbox({rel:'group2', transition:"fade",width:"75%", height:"75%"});
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
</script>
  <style type="text/css">
.dim
{
width: 150px;
height: 119px
}
</style>
</head>
<body>

<div id="tS2" class="jThumbnailScroller" style="width: 780px">
	<div class="jTscrollerContainer">
		<div class="jTscroller">
		    <a class="group2" href="../../../../scroll/scroll1/thumbs/img1.jpg"><img class="dim" src="http://fribler.com/scroll/scroll1/thumbs/img1.jpg" /></a>
		    <a class="group2" href="../../../../scroll/scroll1/thumbs/img2.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img2.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img3.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img3.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img4.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img4.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img5.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img5.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img6.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img6.jpg" /></a>
		    <a class="group2" href="../../../../scroll/scroll1/thumbs/img7.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img7.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img8.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img8.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img9.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img9.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img10.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img10.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img11.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img11.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img12.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img12.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img13.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img13.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img14.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img14.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img15.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img15.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img16.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img16.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img17.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img17.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img18.jpg"><img  class="dim" src="../../../../scroll/scroll1/thumbs/img18.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img19.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img19.jpg" /></a>
			<a class="group2" href="../../../../scroll/scroll1/thumbs/img20.jpg"><img class="dim" src="../../../../scroll/scroll1/thumbs/img20.jpg" /></a>
		</div>
		</div>
	<a href="#" class="jTscrollerPrevButton"></a>
	<a href="#" class="jTscrollerNextButton"></a>
</div>
<script>
(function($){
window.onload=function(){ 
	$("#tS2").thumbnailScroller({ 
		scrollerType:"clickButtons", 
		scrollerOrientation:"horizontal", 
		scrollSpeed:2, 
		scrollEasing:"easeOutCirc", 
		scrollEasingAmount:600, 
		acceleration:4, 
		scrollSpeed:800, 
		noScrollCenterSpace:10, 
		autoScrolling:0, 
		autoScrollingSpeed:2000, 
		autoScrollingEasing:"easeInOutQuad", 
		autoScrollingDelay:500 
	});
}
})(jQuery);
</script>
	<script src="../colorbox/jquery.thumbnailScroller.js"></script>
</body>
</html>
