<?php

$password_length = 9;
function make_seed() 
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
$alfa = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
$random_password = "";
for($i = 0; $i < $password_length; $i ++) {
$random_password .= $alfa[rand(0, strlen($alfa))];
} 

?>