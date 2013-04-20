<html>
<head>
<script language="javascript" type="text/javascript" src="tinymce/jscripts/tiny_mce/plugins/imagemanager/js/mcimagemanager.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
// General options
mode : "textareas",
theme : "advanced",
plugins : "nonbreaking,xhtmlxtras,template",

// Theme options
theme_advanced_buttons1 : "justifyfull",
theme_advanced_buttons2 : "cut,copy,pastesearch,replace",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,

// Example content CSS (should be your site CSS)
//content_css : "css/content.css",

// Drop lists for link/image/media/template dialogs
template_external_list_url : "lists/template_list.js",
external_link_list_url : "lists/link_list.js",
external_image_list_url : "lists/image_list.js",
media_external_list_url : "lists/media_list.js",

// Replace values for the template plugin
//template_replace_values : {
//username : "Some User",
//staffid : "991234",
//file_browser_callback : "mcImageManager.filebrowserCallBack"
}
});
</script>
</head>
<!-- /TinyMCE -->
<?php
$files = "main.css";
?>
<body>
<form method="post" action="sho1.php">
<textarea rows="50" cols="70" id="filecontent" name="filecontent"><?php echo file_get_contents($files);?></textarea>
<input type="Submit" value="Save" />
</form>
</body>
</html>