<table>

<tr>
<td id="tdRegLabel">
<label>Full Name:</label>
</td>
<td id="">
<input id="RegTextField" name="name" type="text" value="<?php if (isset($_POST['add_admin'])) { echo $name; }  ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Email:</label>
</td>
<td id="">
<input id="RegTextField" name="email" type="text" value="<?php if (isset($_POST['add_admin'])) { echo $email; }  ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>User Name:</label>
</td>
<td id="">
<input id="RegTextField" name="username" type="text" value="<?php if (isset($_POST['add_admin'])) { echo $username; }  ?>" />
</td>
</tr>


<tr>
<td id="tdRegLabel">
<label>Password:</label>
</td>
<td id="">
<input id="RegTextField" name="password" type="password" value="<?php if (isset($_POST['add_admin'])) { echo $password; }  ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Re-type Password:</label>
</td>
<td id="">
<input id="RegTextField" name="retype_password" type="password" 
                         value="<?php if (isset($_POST['add_admin'])) { echo $retype_password; }  ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Admin Type:</label>
</td>
<td id="">
<select name="type">
<option>Select-Type</option>
<option>Admin</option>
<option>Super-Admin</option>
</select>
</td>
</tr>

</table>

<input class="buttonReg" id="buttonProfileWidth" name="add_admin" type="submit" value="Add Admin" />