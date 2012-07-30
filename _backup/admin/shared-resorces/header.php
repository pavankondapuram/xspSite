<div class="panelHeader">
<div class="panelHeaderIn">
<h1 class="panelText">XSP<br />AdminPanel</h1>
<?php
if (isset($_SESSION['id'])) {
    echo "<h3 class=\"panelMessage\">Welcome " .$_SESSION['name']."<br/>";
}
?>
<a class="logInLink" href="myAccount">My Account</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a class="logInLink" href="logout">LogOut</a></h3>
</div>
</div>