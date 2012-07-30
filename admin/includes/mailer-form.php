<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<table id="tableReg">

<tr>
<td id="tdRegLabel"><label>Contact ID:</label></td>
<td><input id="mailerTextField" class="mailerTextFieldID" readonly="true" type="text" value="<?php echo $mailto_id; ?>" name="mailto_id" /></td>
</tr>

<tr>
<td id="tdRegLabel"><label>Name:</label></td>
<td><input id="mailerTextField" class="mailerTextFieldName" readonly="true" type="text" value="<?php echo $mailto_name; ?>" name="mailto_name"/></td>
</tr>

<tr>
<td id="tdRegLabel"><label>Mail To:</label></td>
<td><input id="mailerTextField" class="mailerTextFieldName" readonly="true" type="text" value="<?php echo $mailto_email; ?>" name="mailto_email"/></td>
</tr>

<tr>
<td id="tdRegLabel"><label>Subject:</label></td>
<td><input id="mailerTextField" class="mailerTextFieldSubject" type="text" value="<?php if (isset($_POST['send'])) { echo $subject; }  ?>" name="subject"/></td>
</tr>

<tr>
<td id="tdRegLabel"><label>Message:</label></td>
<td><textarea name="body" cols="99" rows="30"><?php if (isset($_POST['send'])) { echo $body; }  ?></textarea></td>
</tr>

</table>

<hr color="#aebed6" width="80%" align="center" />

<input class="buttonMailer" name="send" type="submit" value="Send" />

</form>