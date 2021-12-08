<?php session_start();
unset($_SESSION['username']);
unset($_SESSION['pass']);
unset($_SESSION['vaitro']);
header('location: index.php');
?>