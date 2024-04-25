<?php
session_start(); 
$_SESSION = [];

unset($_SESSION['user']);
unset($_SESSION['error']);
header("Location: /index.php");
exit;
?>
