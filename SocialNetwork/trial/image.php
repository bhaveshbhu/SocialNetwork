<?php require_once 'profile.php'; ?>
 <form action="status.php" method="post"
enctype="multipart/form-data">
<table class="status">
<tr><td width="25%">
<input type="file" name="file" id="file" style="width:100%;font-size:22px;
-moz-border-radius: 10px;
font-family:bold 'Lucida Casual', 'Comic Sans MS';
-webkit-border-radius: 10px;color:red"></td>
<td width="15%"><input type="image" src="submit.jpg" onclick="document.status.submit()"></td>
</tr>
</table>
</form>