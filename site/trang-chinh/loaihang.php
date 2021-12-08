<div class="title">
  <h3>Danh mục loại hàng</h3>
</div>
<div class="list-product">
  <?php

  $loai = loai_selectall();
  foreach ($loai as $rows) {
  ?>
    <div class="product">
      <div class="img">
      <img src="<?= $IMAGE_URL ?><?php echo $rows['hinh'] ?>" alt="" />
      </div>
      <div class="content">
        <span><?php echo $rows['ten_loai'] ?></span>
      </div>
    </div>
  <?php
  }
  ?>
</div>