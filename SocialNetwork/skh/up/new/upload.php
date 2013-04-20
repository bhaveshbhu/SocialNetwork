<?php
foreach ($_FILES as $fieldName => $file) {
	move_uploaded_file($file['tmp_name'], "New/" . $file['name']);
}
echo '<?xml version="1.0" encoding="utf-8" ?>';
?>
<rsp stat="ok" ticketid="<?php echo rand(999, 999999);?>"></rsp>