<?php session_start();
require '../modules/pdo.php';
pdo_get_connection();
require '../modules/taikhoan.php';
$user= khach_getinfo($_SESSION['username']);
if($user['username']==$_SESSION['username']){
    if ($user['pass'] == $_SESSION['pass'] && $user['vaitro'] == 1) {
        header('location: ../admin/index.php');
    } else if ($user['páss'] == $_SESSION['pass'] && $user['vaitro'] !=1) {
        header('location: ../index.php');
    } else {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['vaitro']);
        header('location: dangnhap.php');
    }
}   else {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['vaitro']);
    header('location: ../index.php');
}
?>