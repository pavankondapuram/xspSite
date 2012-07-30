<div class="registration_install" id="registration_install_height">&nbsp;

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<fieldset class="registrationForm_install" id="registrationForm_install_height">&nbsp;
<table id="tableReg">

<tr>
<td id="tdRegLabel">
<label>Full name:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="text" value="<?php if (isset($_POST['register'])) { echo $name; }  ?>" name="name" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>E-mail:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField"  type="text" value="<?php if (isset($_POST['register'])) { echo $email; } ?>" name="email" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>User Name:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="text" value="<?php if (isset($_POST['register'])) { echo $username; } ?>" name="username" />
</td>
</tr>

<tr>                   
<td id="tdRegLabel">
<label>Password:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="password" value="<?php if (isset($_POST['register'])) { echo $password; } ?>" name="password" />
</td>
</tr>

<tr>                   
<td id="tdRegLabel">
<label>Re-Password:</label>
</td>
<td id="tdRegTextField">
<input id="RegTextField" type="password" value="<?php if (isset($_POST['register'])) { echo $retype_password; } ?>" name="retype_password" />
</td>
</tr>

</table>

<input type="hidden" value="1" name="priority" />

<input type="hidden"  value="Super Admin" name="type" />

<div id="regFormFooter">
<input class="buttonReg" id="buttonRegWidth" name="register" type="submit" value="Register" />
</div>

</fieldset>  
            
</form>

</div>