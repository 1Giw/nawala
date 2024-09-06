<?php
$password = '12345678';

// Hash password menggunakan PASSWORD_BCRYPT
$hash = password_hash($password, PASSWORD_BCRYPT);

echo "Hash dari password '12345678' adalah: " . $hash;

echo "\n";
?>