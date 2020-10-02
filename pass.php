<?php 

$pass = "123456";
$hash = password_hash($pass, PASSWORD_DEFAULT);

echo $hash;




?>