<?php

session_start();

if (!isset($_SESSION['id']) && !isset($_SESSION['name']) && !isset($_SESSION['auth_keys'])) 
{
	if (isset($_COOKIE['id']) && isset($_COOKIE['name']) && isset($_SESSION['auth_keys'])) 
	{
      $_SESSION['id'] = $_COOKIE['id'];
      $_SESSION['name'] = $_COOKIE['name'];
	  $_SESSION['auth_keys'] = $_COOKIE['auth_keys'];
    }
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login';
    header('Location: ' . $home_url);
}

?>