<?php
require "../../dao/product.php";
require "../../global.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <section class="head">
        <div class="headtop">
            <div class="logo">
                <a href="index.php"><img src="<?= $CONTENT_URL ?>/img/Logo4-1 1.png" alt="" /></a>
            </div>

            <div class="search">
                <input type="text" class="search-text" placeholder="Tìm kiếm sản phẩm" />
                <a href=""><i class="fas fa-search"></i></a>
            </div>

            <div class="extend">
                <div class="cart">
                    <a href=""><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="user">
                    <a href=""><i class="fas fa-user-alt"></i></a>
                </div>
            </div>
        </div>

        <div class="nav">
            <div class="table">
                <ul>
                    <li>
                        <a href="">Danh mục sản phẩm</a>
                    </li>
                </ul>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="sanpham.php">Sản phẩm</a></li>
                    <li><a href="">Chính sách bảo hành</a></li>
                    <li><a href="">24h công nghệ</a></li>
                </ul>
            </div>
        </div>
    </section>
    <?php

    if (isset($_REQUEST['id_product'])) {
        $product = show_product($_REQUEST['id_product']);
    }

    ?>
    <div class="details-sanpham">
        <div class="boxs-sanpham">
            <div class="img">
                <a href=""><img src="<?=$CONTENT_URL ?>/<?php echo $product['hinh'] ?>" alt="" /></a>
            </div>
            <div class="box-content-sanpham">
                <div class="detal">
                    <div class="">
                        <h3><?php echo $product['ten_san_pham'] ?></h3>
                    </div>
                    <div class="span">
                        <span><?php echo $product['mo_ta'] ?></span>
                    </div>
                    <div class="gia">Giá : <span id="gia"><?php echo $product['gia'] ?></span> </div>
                </div>
                <hr />
                <div class="tonggia">
                    <div class="sl">
                        <p>Số lượng</p>
                        <span class="tru">-</span> <input type="text" id='quantity' placeholder="0" value="1" /><span class="cong">+</span>
                    </div>
                    <div class="tonggia-sp">
                        <span>Tổng giá :</span>
                        <p id='tong'></p>
                    </div>
                </div>
                <script>
                    var gia = parseInt($("#gia").text());
                    var soluong = parseInt($("#quantity").val());

                    function tongtien() {
                        gia = parseInt($("#gia").text());
                        soluong = parseInt($("#quantity").val());
                        console.log(gia, soluong);
                        $("#tong").text(gia * soluong)
                    }
                    tongtien();
                    console.log($(".tru"))
                    var count = 1;
                    $(".tru").click(function() {
                        count--;
                        if (count <= 1) {
                            count = 1;
                        }
                        $("#quantity").val(count)
                        tongtien()
                    })
                    $(".cong").click(function() {
                        count++;
                        if (count >= 99) {
                            count = 99;
                        }
                        $("#quantity").val(count)
                        tongtien()
                    })
                </script
                <hr />
                <div class="btn-detal">
                    <a href="?add_to_cart=<?php echo $rows['id_sp'] ?>" class="them">Thêm vào giỏ</a>
                    <a href="?thanhtoan=<?php echo $rows['id_sp'] ?>" class="mua">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>

    <section class="binhluan">
        <div class="title">
            <h3>Đánh giá phía khách hàng</h3>
            <hr />
        </div>
        <div class="conment">
            <div class="danhgiasp">
                <div class="item-bl">
                    <span>Sản phẩm rất tiện lợi</span>
                    <p>16/12/2021</p>
                </div>

                <div class="item-bl">
                    <span>Sản phẩm rất tiện lợi</span>
                    <p>16/12/2021</p>
                </div>

                <div class="item-bl">
                    <span>Sản phẩm rất tiện lợi</span>
                    <p>16/12/2021</p>
                </div>


            </div>
            <div class="btn_comment">
                <input type="text" placeholder="Ý kiến của bạn về sản phẩm" />
                <a href="">Gửi đi</a>
            </div>
        </div>
    </section>
    <footer>
        <div class="fhead">
            <div class="contact">
                <h2>Liên hệ</h2>

                <span>NIIT - ICT HÀ NỘI</span><br />
                <span>Tầng 3, 25T2, N05, Nguyễn thập, Cầu Giấy, Hà Nội </span><br />
                <span>02435574074 - 0383180086</span><br />
                <span>hello@niithanoi.edu.vn</span><br />
                <span>niithanoi.edu.vn</span>
                <div class="boximg">
                    <img src="img/dmca_protected_16_120 1.png" alt="" />
                    <img src="img/boCongThuong 1.png" alt="" />
                </div>
            </div>

            <div class="policy">
                <h2>Chính sách</h2>

                <ul>
                    <li><a href="">Chính sách bảo mật</a></li>
                    <li><a href="">Chính sách vận chuyển</a></li>
                    <li><a href="">Chính sách đổi trả</a></li>
                </ul>
            </div>

            <div class="communications">
                <h2>Kênh thông tin</h2>

                <ul>
                    <li>
                        <a href=""><img src="img/fb_logo (2) 1.png" alt="" /></a>
                    </li>
                    <li>
                        <a href=""><img src="img/zalo_logo (1) 1.png" alt="" /></a>
                    </li>
                    <li>
                        <a href=""><img src="img/ytb_logo (1) 1.png" alt="" /></a>
                    </li>
                    <li>
                        <a href=""><img src="img/insta_logo (1) 1.png" alt="" /></a>
                    </li>
                    <li>
                        <a href=""><img src="img/sendo (1) 1.png" alt="" /></a>
                    </li>
                    <li>
                        <a href=""><img src="img/shoppe (1) 1.png" alt="" /></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="hr"></div>

        <div class="address">
            <span>Copyright @ 2002 NIIT - ICT HÀ NỘI. All rights reserved. <br />
                Địa chỉ: Tầng 3, 25T2, N05, Nguyễn Thị Thập, Cầu Giấy, Hà Nội. Email:
                hello@niithanoi.edu.vn. <br />
                Tel: 0243.557.4074Số Đăng ký: A-2277. cấp: Bộ Khoa Học và Công
                Nghệ</span>
        </div>
    </footer>
</body>

</html>