<?php
$title = "Salanest group - Trang Chủ - Tiến Thịnh Phát - Yến Sào";
include 'inc/header.php';
?>

<section>
  <div class="row cart_hot">
    <div class="col-xl-12 col-12">
      <div class="main-banner">
        <div class="slider-wrapper">
          <div id="mainSlider" class="nivoSlider">
            <a href="javascript:void(0);"><img src="img/banner_web2.webp" alt="banner" class="fullwidth" /></a>
            <a href="javascript:void(0);"><img src="img/banner1.webp" alt="banner" class="fullwidth" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'inc/sale.php'; ?>
  <div class="main-sanphamchinh">
    <img src="img/mobile_banner2.png" alt="hình ảnh tổ yến" title="hình anh tổ yến" width="100%" height="auto">
    <div class="container">
      <div class="wide-700 sanpham-noibat">
        <?php
          $showProduct = $product->getproduct_feathered_6();
          if ($showProduct) {
            while ($result = $showProduct->fetch_assoc()) {
        ?>
        <div class="sanpham-noibat-item">
          <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html" title="<?php echo $result['sanpham_name'] ?>">
            <div class="home-product__item-img" style="background-image:url(./img/<?php echo $result['hinh'] ?>);">
            </div>
            <div class="ct-item-pro">
              <p class="bold item-name"><?php echo $result['sanpham_name'] ?></p>
              <div class="clear10"></div>
              <div class="flex-bw">
                <p class="old-pri"><?php echo number_format($result['sanpham_gia']) . " đ"; ?></p>
                <p class="new-pri bold"><?php echo number_format($result['sanpham_giakhuyenmai']) . " đ"; ?></p>
              </div>
              <div class="clear10"></div>
              <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html" class="addtocart"
                title="<?php echo $result['sanpham_name'] ?>">Xem ngay</a>
            </div>
          </a>
        </div>
        <?php } } ?>
      </div>
      <div class="clear20"></div>
    </div>
    <div class="clear40"></div>
  </div>
  <div class="main-news-home">
    <div class="clear40"></div>
    <div class="main-baiviet">
      <div class="container parallax">
        <h3 class="tit-pub">BÀI VIẾT MỚI</h3>
        <p class="center">Thông tin cần biết - Tư vấn - Hướng dẫn sử dụng</p>
        <div class="clear40"></div>
        <div class="row">
          <?php
          $get_post_new = $ps -> show_post_new();
          if($get_post_new){
            $i = 0;
            while($result = $get_post_new -> fetch_assoc()){
              $i++;
        ?>
          <div class="col-md-6 zoomshow delay-<?php echo $i ?>">
            <div class="block-news-home">
              <div class="flex-nh">
                <a href="bai-viet/<?php echo $result['baiviet_id'] ; ?>.html" class="img-nh"
                  title="<?php echo $result['baiviet_name'] ; ?>">
                  <img src="img/<?php echo $result['baiviet_img'] ; ?>" class="fullwidth" style="display:block;">
                </a>
                <div class="ct-nh">
                  <p class="tit-nh">
                    <a href="bai-viet/<?php echo $result['baiviet_id'] ; ?>.html" class="clblack">
                      <?php echo $result['baiviet_name'] ; ?>
                    </a>
                  </p>
                  <p class="des-nh">
                    <?php echo $fm -> textShorten($result['baiviet_title'],350) ; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php } } ?>
          <div class="clear40"></div>
        </div>
      </div>
      <div class="clear40"></div>
    </div>
    <div class="clear40"></div>
  </div>
</section>

<?php include 'inc/footer.php'; ?>