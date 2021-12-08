<?php
const ycNhap = "Vui lòng không để trống ";
const TABLE_NAMESLI = "slider";
const image_url = "duan1/content/img";
//Thêm
function slider_insert($ten_slider, $url, $hinh)
{   $root_url = "/duan1";
    $content=$root_url."/content";
    $target_dir = $content . "/img";
    $target_file = $target_dir ."/". basename($_FILES["hinh"]["name"]); 
    if(isset($_POST['btn-add'])){
    $hinh = $_FILES['hinh']['name'];
    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
    $sql = "INSERT INTO '".TABLE_NAMESLI."'(ten_slider, url_slider, hinh) values (?,?,?)";
    pdo_execute($sql, $ten_slider, $url, $hinh);
};}
//Sửa
function slider_edit($id_slider, $ten_slider_new, $hinh_new, $url_new)
{
    $sql = "UPDATE ".TABLE_NAMESLI." SET ten_slider=?,hinh=?,duongdan=? WHERE id_slider=?";
    pdo_execute($sql, $ten_slider_new, $hinh_new, $url_new, $id_slider);
}
//Remove
function slider_remove($id_slider)
{
    $sql = "DELETE FROM '".TABLE_NAMESLI."' WHERE id_slider=?";
    pdo_execute($sql, $id_slider);
}
//Truy vấn All
function slider_list()
{
    $sql = "SELECT * FROM ".TABLE_NAMESLI."";
    $slider_list= pdo_query($sql);
    foreach ($slider_list as $u) {
        $rs1=hang_getinfo($u['id_sp']);
        echo '<tr>';
        echo '<td>'.$u['id_slider'].'</td>';
        echo '<td>'.$u['ten_slider'].'</td>';
        echo '<td>'.$u['url_slider'].'</td>';
        echo "<td><img src='/".image_url."/".$u['hinh']."' ></td>";
        echo '<td>'.$rs1['ten_san_pham'].'</td>';
        echo "<td><a href='edit.php?id=".$u['id_slider']."'><i class='bx bxs-edit'></i></a></td>";
        echo '<td><a href="delete.php?id='.$u['id_slider'].'" data-confirm="Bạn muốn xóa bình luận này?"><i class="bx bxs-trash-alt" ></i></a></td>';
    };
}
//Truy vấn 1
function slider_one()
{
    $sql = "select * from '".TABLE_NAMESLI."'";
    $stmt = pdo_get_connection()->prepare($sql);
    $stmt->execute();
    $slider_one = $stmt->fetch();
}
