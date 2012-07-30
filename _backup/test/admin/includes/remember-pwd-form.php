<div class="registration_install" id="rememberPwd_height">&nbsp;

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<fieldset class="registrationForm_install" id="rememberPwdForm_height">&nbsp;
<table id="tableReg">

<tr>
<td id="tdRegLabel">
<label>Email:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="text" value="<?php if (isset($_POST['submit'])) { echo $email; }  ?>" name="email" />
</td>
</tr>

</table>

<div id="regFormFooter">
<input class="buttonReg" id="buttonRegWidth" name="submit" type="submit" value="Get It" />
</div>

</fieldset>  
            
</form>

</div>

<div class="loginBelow_link_block"><a class="loginBelow_link" href="login">Log In</a></div>