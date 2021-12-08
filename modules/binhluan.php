<?php
const TABLE_NAMEBL = "binh_luan";
const TABLE_NAME1 = "san_pham";
const TABLE_NAME2 = "tai_khoan";
//Remove
function binhluan_remove($ma_bl)
{
    $sql = "DELETE FROM ".TABLE_NAMEBL." WHERE id_binh_luan=?";
    pdo_execute($sql, $ma_bl);
}
//Truy vấn All
function binhluan_list()
{
    
    $sql = "SELECT * FROM ".TABLE_NAMEBL."";
    $binhluan_list= pdo_query($sql);
    foreach ($binhluan_list as $u) {
        $rs1=hang_getinfo($u['id_sp']);
        $rs2=khach_getinfo($u['id_account']);
        // var_dump($rs2);
        echo '<tr>';
        echo '<td>'.$u['id_binh_luan'].'</td>';
        echo '<td>'.$rs1['ten_san_pham'].'</td>';
        echo '<td>'.$rs2['username'].'</td>';
        echo '<td>'.$u['noi_dung'].'</td>';
        echo '<td>'.$u['thoi_gian_binh_luan'].'</td>';
        echo '<td><a href="delete.php?id='.$u['id_binh_luan'].'" data-confirm="Bạn muốn xóa bình luận này?"><i class="bx bxs-trash-alt" ></i></a></td>';
    };
    
}
?>