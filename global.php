<?php
session_start();
$ROOT_URL = "/duan1";
$CONTENT_URL = "$ROOT_URL/content";
$admin_url = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";
$IMAGE_URL = "$CONTENT_URL/img/";

//kiểm tra sự tồn tại
function exit_agram($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}
//biến toàn cục chia sẻ giữa controller và view
$VIEW = "index.php";
$MESSAGE = "";
//upload file
function upload_file($fieldname, $target_dir)
{
    $file_upload =  $_FILES[$fieldname];
    $file_name = basename($file_upload['name']);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_upload['tmp_name'], $target_path);
    return $file_name;
}
//check login
function check_login()
{
    global $SITE_URL;
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SESSION['REQUEST_URL'], '/admin/') == false) {
            return;
        }
    }
    $_SESSION['request_url'] == $_SESSION['REQUEST_URL'];
    header('location:$SITE_URL/login.php');
}




if (isset($_REQUEST['add_to_cart'] )) {
    if (isset($_SESSION['username'])) {
    } else {
        header('location: login.php');
    }
}
if (isset($_REQUEST['thanhtoan'] )) {
    if (isset($_SESSION['username'])) {
    } else {
        header('location: login.php');
    }
}
