<?php
require_once "pdo.php";
function order_selectall(){
    $sql= "SELECT * FROM gio_hang";
    return pdo_query($sql);
}
