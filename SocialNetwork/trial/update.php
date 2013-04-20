<?php require_once 'profile.php'; ?>
 <form action="status.php" method="post" name="status">
<input type="hidden" name="randnumber" id="randnumber" value="<?php echo $_SESSION['intcaptcha'];?>"/>
<table class="status">
<tr><td width="25%"><textarea rows="1" cols="30" name="status" placeholder="wht ru upto??" style="width:100%;font-size:22px;
-moz-border-radius: 10px;
font-family:bold 'Lucida Casual', 'Comic Sans MS';
-webkit-border-radius: 10px;color:red"></textarea></td>
<td width="15%"><input type="image" src="submit.jpg" onclick="document.status.submit()"></td>
</tr>
</table>
</form>