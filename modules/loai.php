<?php 
const ycNhap = "Vui lòng không để trống ";
const TABLE_NAMELOAI = "loai_hang";
const image_url = "duan1/content/img";
//Thêm
function loai_insert($ten_loai,$hinh)
{   $root_url = "/duan1";
    $content=$root_url."/content";
    $target_dir = $content . "/img";
    $target_file = $target_dir ."/". basename($_FILES["hinh"]["name"]); 
    if(isset($_POST['btn-add'])){
    $hinh = $_FILES['hinh']['name'];
    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
    $sql = "INSERT INTO " . TABLE_NAMELOAI . "(ten_loai,hinh) values(?,?)";
    pdo_execute($sql, $ten_loai, $hinh);
}
};
//Sửa
function loai_edit($id_loai, $ten_loai, $hinh)
{
    $sql = "UPDATE " . TABLE_NAMELOAI . " SET ten_loai=? hinh=? WHERE id_loai=?";
    pdo_execute($sql, $ten_loai, $hinh, $id_loai);
}
//Remove
function loai_remove($id_loai)
{
    $sql = "DELETE FROM " . TABLE_NAMELOAI . " WHERE id_loai=?";
    pdo_execute($sql, $id_loai);
}
//Truy vấn All
function loai_list()
{
    $sql = "SELECT * FROM " . TABLE_NAMELOAI . "";
    $loai_list = pdo_query($sql);
    foreach ($loai_list as $u) :
        echo "<tr>
            <td>{$u['id_loai']}</td>
            <td>{$u['ten_loai']}</td>
            <td><img src='/".image_url."/".$u['hinh']."' ></td>
            <td><a href='edit.php?id=" . $u['id_loai'] . "'><i class='bx bxs-edit'></i></a></td>
            <td><a href='delete.php?id=" . $u['id_loai'] . "' data-confirm='Are you sure to delete this item?'><i class='bx bxs-trash-alt' ></i></a></td>
        </tr>";
    endforeach;
}
// Truy vấn All 2
function loai_all()
{
    $sql = "SELECT * FROM " . TABLE_NAMELOAI . "";
    $stmt = pdo_get_connection()->prepare($sql);
    $stmt->execute();
    $loai_all = $stmt->fetchAll();
}
//Truy vấn 1
function loai_one()
{
    $sql = "SELECT * FROM " . TABLE_NAMELOAI . "";
    $stmt = pdo_get_connection()->prepare($sql);
    $stmt->execute();
    $loai_one = $stmt->fetch();
}
//lấy thông tin mã loại
function loai_getinfo($id_loai)
{
    $sql = "SELECT * FROM " . TABLE_NAMELOAI . " WHERE id_loai=?";
    return pdo_query_one($sql, $id_loai);
}
function loai_count($id_loai){
    $sql = "SELECT count(*) FROM loai WHERE id_loai=?";
    return;
}
function validate_loai(){
    $root_url = "/duan1";
    $content=$root_url."/content";
    $target_dir = $content . "/img";
    $target_file = $target_dir ."/". basename($_FILES["hinh"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageError = '';
    if (isset($_POST['ten_loai'])) {
        $ten_loai = $_POST['name'];
    }
    if (isset($_POST['hinh'])) {
        $hinh = $_FILES['hinh']['name'];
    }
    if (isset($_POST['btn-add'])) {
        if (!isset($_POST['ten_loai']) || (empty($_POST['ten_loai']))) {
            $nameError = ycNhap . "tên loại hàng";
        } else {
            $nameError = "";
        }
    if ($nameError == '' && $imageError==''){
        $ten_loai=$_POST['ten_loai'];
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
        loai_insert($ten_loai,$hinh);
    }
}
}
