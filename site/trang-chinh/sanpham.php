<?php

require "../../dao/slider.php";
require "../../dao/loai.php";
require "../../dao/product.php";
require "../../global.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css" />
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
    <!-- sản phẩm -->
    <div class="box-container">
        <section class="container_sanpham">
            <div class="title">
                <h3>Sản phẩm</h3>
            </div>
            <div class="hot2">
                <?php
                $result_all_product = select_all_product();
                foreach ($result_all_product as $rows) {
                ?>
                    <div class="box-sanpham">
                        <a href="chitiet.php?id_product=<?php echo $rows['id_sp'] ?>">
                            <div class="box-item">
                                <div class="img">
                                    <img src="<?= $IMAGE_URL ?><?php echo $rows['hinh'] ?>" alt="" />
                                </div>
                                <div class="items">
                                    <span><?php echo $rows['ten_san_pham'] ?></span>
                                    <p><?php echo $rows['gia'] ?></p>
                                    <div class="btn">
                                        <a href="?add_to_cart=<?php echo $rows['id_sp'] ?>"><i class="fas fa-cart-plus"></i></a>
                                        <a href="?thanhtoan.php=<?php echo $rows['id_sp'] ?>" class="mua">Mua ngay</a>
                                    </div>    
                                </div>       
                            </div>
                        </a>
                    </div>
                <?php

                }

                ?>

            </div>
    </div>
    </div>

    </section>

    <!-- sản phẩm hot -->
    <section class="product-hot hot2">
        <div class="title">
            <h3>Sản phẩm bán chạy</h3>
        </div>
        <div class="list-hotproduct">
            <?php
            $seller =  seller_product();
            foreach ($seller  as $rows) {
            ?>
            <a href="chitiet.php?id_product=<?php echo $rows['id_sp'] ?>">
                <div class="box-item">
                    <div class="img">
                        <img src="<?= $CONTENT_URL ?> <?php echo $rows['hinh'] ?>" alt="" />
                    </div>
                    <div class="item">
                        <span><?php echo $rows['ten_san_pham'] ?></span>
                        <p><?php echo $rows['gia'] ?></p>
                    </div>
                </div>
            </a>
            <?php
            }
            ?>

        </div>
    </section>
    </div>

    <footer>
        <div class="fhead">
            <div class="contact">
                <h2>Liên hệ</h2>

                <span>NIIT - ICT HÀ NỘI</span><br>
                <span>Tầng 3, 25T2, N05, Nguyễn thập, Cầu Giấy, Hà Nội </span><br>
                <span>02435574074 - 0383180086</span><br>
                <span>hello@niithanoi.edu.vn</span><br>
                <span>niithanoi.edu.vn</span>
                <div class="boximg">
                    <img src="img/dmca_protected_16_120 1.png" alt="">
                    <img src="img/boCongThuong 1.png" alt="">
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
                    <li><a href=""><img src="<?= $CONTENT_URL ?>/img/fb_logo (2) 1.png" alt=""></a></li>
                    <li><a href=""><img src="<?= $CONTENT_URL ?>/img/zalo_logo (1) 1.png" alt=""></a></li>
                    <li><a href=""><img src="<?= $CONTENT_URL ?>/img/ytb_logo (1) 1.png" alt=""></a></li>
                    <li><a href=""><img src="<?= $CONTENT_URL ?>/img/insta_logo (1) 1.png" alt=""></a></li>
                    <li><a href=""><img src="<?= $CONTENT_URL ?>/img/sendo (1) 1.png" alt=""></a></li>
                    <li><a href=""><img src="<?= $CONTENT_URL ?>/img/shoppe (1) 1.png" alt=""></a></li>
                </ul>
            </div>
        </div>

        <div class="hr">

        </div>

        <div class="address">
            <span>Copyright @ 2002 NIIT - ICT HÀ NỘI. All rights reserved. <br>
                Địa chỉ: Tầng 3, 25T2, N05, Nguyễn Thị Thập, Cầu Giấy, Hà Nội. Email: hello@niithanoi.edu.vn. <br>
                Tel: 0243.557.4074Số Đăng ký: A-2277. cấp: Bộ Khoa Học và Công Nghệ</span>
        </div>
    </footer>
</body>

</html>