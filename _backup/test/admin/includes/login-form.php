<div class="registration_install" id="login_height">&nbsp;

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<fieldset class="registrationForm_install" id="loginForm_height">&nbsp;
<table id="tableReg">

<tr>
<td id="tdRegLabel">
<label>User Name:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="text" value="<?php if (!empty($username)) echo $username; ?>" name="username" />
</td>
</tr>

<tr>                   
<td id="tdRegLabel">
<label>Password:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="password" name="password" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Remember me:</label>
</td>
<td id="tdRegTextField">
<input name="remember" type="checkbox" value="yes" />
</td>
</tr>

</table>

<div id="regFormFooter">
<input class="buttonReg" id="buttonRegWidth" name="submit" type="submit" value="Log In" />
</div>

</fieldset>  
            
</form>

</div>

<div class="loginBelow_link_block"><a class="loginBelow_link" href="remember-pwd">Lost Your Password?</a></div>