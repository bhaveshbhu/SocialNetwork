<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="original/css_files/prof_img_scroller.css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="original/js/scroller/jquery-ui-1.8.13.custom.min.js"></script>
</head>
<body>
<div id="tS2" class="jThumbnailScroller">
	<div class="jTscrollerContainer">
		<div class="jTscroller">
			<a href="#"><img src="thumbs/img1.jpg" /></a>
			<a href="#"><img src="thumbs/img2.jpg" /></a>
			<a href="#"><img src="thumbs/img3.jpg" /></a>
			<a href="#"><img src="thumbs/img4.jpg" /></a>
			<a href="#"><img src="thumbs/img5.jpg" /></a>
			<a href="#"><img src="thumbs/img6.jpg" /></a>
			<a href="#"><img src="thumbs/img7.jpg" /></a>
			<a href="#"><img src="thumbs/img8.jpg" /></a>
			<a href="#"><img src="thumbs/img9.jpg" /></a>
			<a href="#"><img src="thumbs/img10.jpg" /></a>
			<a href="#"><img src="thumbs/img11.jpg" /></a>
			<a href="#"><img src="thumbs/img12.jpg" /></a>
			<a href="#"><img src="thumbs/img13.jpg" /></a>
			<a href="#"><img src="thumbs/img14.jpg" /></a>
			<a href="#"><img src="thumbs/img15.jpg" /></a>
			<a href="#"><img src="thumbs/img16.jpg" /></a>
			<a href="#"><img src="thumbs/img17.jpg" /></a>
			<a href="#"><img src="thumbs/img18.jpg" /></a>
			<a href="#"><img src="thumbs/img19.jpg" /></a>
			<a href="#"><img src="thumbs/img20.jpg" /></a>
		</div>
		</div>
	
	<a href="#" class="jTscrollerPrevButton"></a>
	<a href="#" class="jTscrollerNextButton"></a>
</div>
<script>
jQuery.noConflict(); 
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
<!-- thumbnailScroller script -->
<script src="original/js/scroller/jquery.thumbnailScroller.js"></script>
</body>
</html>
