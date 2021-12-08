<?php

require_once "pdo.php";

function select_all_product(){
    $sql = "select * from san_pham ";
    return pdo_query($sql);
}
function sale_product(){
    $sql = "select * from san_pham order by sale desc limit 5";
    return pdo_query($sql);
}

function seller_product_home(){
    $sql = "select * from san_pham order by sale desc limit 16";
    return pdo_query($sql);
}

function seller_product(){
    $sql = "select * from san_pham order by sale desc limit 5";
   return pdo_query($sql);
}

function show_product($id_product){
    $sql = "select * from san_pham inner join loai_hang on san_pham.id_loai = loai_hang.id_loai where id_sp = ?";
    return pdo_query_one($sql,$id_product);
}

?>