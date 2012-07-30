<table>

<tr>
<td id="tdRegLabel">
<label>User ID:</label>
</td>
<td id="">
<input id="RegTextField" name="id" type="text" readonly="true" value="<?php echo $row['id']; ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Registered Date:</label>
</td>
<td id="">
<input id="RegTextField" name="registered_date" type="text" readonly="true" value="<?php echo $row['date']; ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Admin Type:</label>
</td>
<td id="">
<input id="RegTextField" name="type" type="text" readonly="true" value="<?php echo $row['type']; ?>" />
</td>
</tr>


<tr>
<td id="tdRegLabel">
<label>User Name:</label>
</td>
<td id="">
<input id="RegTextField" name="username" type="text" readonly="true" value="<?php echo $row['username']; ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Full Name:</label>
</td>
<td id="">
<input id="RegTextField" name="name" type="text" value="<?php echo $row['name']; ?>" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Email:</label>
</td>
<td id="">
<input id="RegTextField" name="email" type="text" value="<?php echo $row['email']; ?>" />
</td>
</tr>


<tr>
<td id="" colspan="2" >
<p style="text-align:center"><font size="-2" face="Comic Sans MS, cursive">
If you would like to change the password type a new one. Otherwise leave this blank.
</font></p>
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>New Password:</label>
</td>
<td id="">
<input id="RegTextField" name="new_password" type="password" />
</td>
</tr>

<tr>
<td id="tdRegLabel">
<label>Re-type Password:</label>
</td>
<td id="">
<input id="RegTextField" name="retype_password" type="password" />
</td>
</tr>
</table>

<input class="buttonReg" id="buttonProfileWidth" name="update_profile" type="submit" value="Update Profile" />