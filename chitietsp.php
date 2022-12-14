<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function ($class) {
  include_once "classes/" . $class . ".php";
});
$product = new product();
if (isset($_GET['proid']) && $_GET['proid'] != NULL) {
  $id = $_GET['proid'];
} else {
  header('Location:404.php');
}
$get_product_details = $product->get_details($id);
if ($get_product_details) {
  while ($get_title = $get_product_details->fetch_assoc()) {
    $title = $get_title['sanpham_name'];
  }
}

include 'inc/header-sp.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $quantity = $_POST['quantity'];
  $addtoCart = $ct->add_to_cart($quantity, $id);
}

include 'inc/sale.php'; 

if (isset($addtoCart)) { ?>
<div class="modal-thanhtoan" id="close-modal">
  <div class="hinhthuc-thanhtoan">
    <div class="close-act" id="close-modal"></div>
    <?php echo $addtoCart ;?>
    <p class="message_box">
      <a href="giohang.html">
        <button type="button" class="btn btn-info message_box-btn">
          xem giỏ hàng
        </button>
      </a>
    </p>
  </div>
</div>
<?php } ?>

<section>
  <div class="main-breac">
    <div class="container">
      <span><a href="./" class="clblack">Trang chủ</a></span>
      <span style="margin: 0 7px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-chevron-right"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </span>
      <span class="clpink">Chi tiết sản phẩm</span>
      <span style="margin: 0 7px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-chevron-right"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </span>
      <span class="clpink"><?php echo $title ?></span>
    </div>
  </div>
  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
      <div class="row flex-order">
        <div class="col-12">
          <?php
            $get_product_details = $product->get_details($id);
            if ($get_product_details) {
              while ($result_detils = $get_product_details->fetch_assoc()) {
                $cate_id = $result_detils['category_id'];
                $img_id = $result_detils['sanpham_id'];
          ?>
          <div class="row">
            <div class="col-xl-4 col-md-6 col-sm-12 col-12">
              <div class="block-gal-img">
                <div class="block-gal-img">
                  <?php
                    $get_product_img = $product->get_img($img_id);
                    if ($get_product_img) {
                      $t = 0 ;
                      while ($result_img = $get_product_img->fetch_assoc()) {
                        $t ++;
                  ?>
                  <div class="mySlides tabcontent" id="<?php echo $t ?>">
                    <div class="home-product__item-img"
                      style="background-image:url(./img/<?php echo $result_img['hinh'] ;?>);">
                    </div>
                  </div>
                  <?php } ?>
                  <a class="mySlidesprev" onclick="plusSlides(-1)">❮</a>
                  <a class="mySlidesnext" onclick="plusSlides(1)">❯</a>
                  <?php }else{ ?>
                  <div class="home-product__item-img"
                    style="background-image:url(./img/<?php echo $result_detils['hinh'] ;?>);">
                  </div>
                  <?php } ?>
                  <div class="slider-detail">
                    <?php
                      $get_product_img = $product->get_img($img_id);
                      if ($get_product_img) {
                        $i = 0;
                        while ($result_img = $get_product_img->fetch_assoc()){
                          $i++;
                    ?>
                    <div class="demo">
                      <div onmouseover="openImg(event, '<?php echo $i ?>')" class="home-product__item-img tablinks"
                        style="background-image:url(./img/<?php echo $result_img['hinh'] ;?>);">
                      </div>
                    </div>
                    <?php }} ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear20 show767"></div>
            <div class="col-md-6 col-sm-12 col-12 detail">
              <h3 class="nomargin bold clred"><?php echo $result_detils['sanpham_name'] ?></h3>
              <div class="clear10"></div>
              <p><span>Thương hiệu:</span>
                <span class="bold">
                  <?php echo $result_detils['brand_name'] ?>
                </span> | <span>Tình trạng: </span>
                <span class="bold">
                  <?php 
                    $tinhtrang = $result_detils['sanpham_soluong'];
                    if ($tinhtrang > 0) { echo "Còn hàng";} else { echo "Đã bán hết";}; 
                  ?>
                </span>
              </p>
              <div class="clear10"></div>
              <div class="area_order">
                <div class="flex">
                  <form action="" method="post">
                    <h3 class="nomargin bold clred gia-sp" id="gia-sp">
                      <?php echo number_format($result_detils['sanpham_giakhuyenmai']) . " ₫"; ?>
                    </h3>
                  </form>
                  <p class="old-pri"><?php echo number_format($result_detils['sanpham_gia']) . " ₫"; ?></p>
                </div>
                <div class="clear20"></div>
                <div class="area_promotion zero">
                  <div class="prohead bold">Ưu đãi Khuyến mãi</div>
                  <div class="infopr">
                    <p>Freeship đơn hàng từ 200.000 đ</p>
                  </div>
                </div>
                <form action="" method="post">
                  <div class="thanhtoan">
                    <div class="soluong bold">
                      <span>Số lượng:</span>
                      <input data-id="<?php echo $result_detils['sanpham_giakhuyenmai'] ?>" type="number" class="center"
                        name="quantity" min="1" value="1" max="<?php echo $result_detils['sanpham_soluong'] ?>">
                    </div>
                    <div class="clear20"></div>
                    <div class="soluong bold">
                      <span>Thanh toán:</span>
                      <strong class="bold clred gia-sp" id="thanh-toan">
                        <?php echo number_format($result_detils['sanpham_giakhuyenmai']) . " ₫"; ?>
                      </strong>
                    </div>
                    <div class="muahang but-buy">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="bi bi-basket3-fill"
                        viewBox="0 0 16 16" fill="#ffff">
                        <path
                          d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z" />
                      </svg>
                      <input type="submit" name="submit" value="Mua hàng">
                    </div>
                  </div>
                </form>
                <div class="clear20"></div>
                <div class="p-tuvan">
                  <p class="bold flex">
                    <img src="img/tuvan.png">
                    Tư vấn & đặt hàng: <span class="clred">(028)36 221 286</span>
                  </p>
                </div>
              </div>
              <div class="clear20"></div>
            </div>
          </div>
          <div class="container sanpham_chitiet">
            <h1 class="text-danger">Thông tin sản phẩm</h1>
            <?php echo $result_detils['sanpham_chitiet'] ?>
            <?php echo $result_detils['sanpham_mota'] ?>
          </div>
          <?php }} else { header('Location:404.php');} ?>

          <div class="clear20"></div>
          <!-- <p class="tag-p">
            <span><i class="fas fa-tag"></i> Tag: </span>
            <a href="#">Tag 1,</a>
            <a href="#">Tag 2,</a>
            <a href="#">Tag 3,</a>
            <a href="#">Tag 4,</a>
            <a href="#">Tag 5</a>
          </p> -->
          <div class="clear40"></div>
          <div class="pro-relative">
            <div class="tit-pr">
              <h3 class="bold clred nomargin text-uppercase">Sản phẩm cùng loại</h3>
            </div>
            <div class="clear40"></div>

            <div class="img-slider">
              <?php
              $sp_samekind = $product->samekind($cate_id);
              if ($sp_samekind) {
                while ($result_samekind = $sp_samekind->fetch_assoc()) {
              ?>
              <div class="img-item">
                <div class="home-product__item-img"
                  style="background-image:url(./img/<?php echo $result_samekind['hinh']; ?>);"></div>
                <div class="ct-item-pro">
                  <p class="bold item-name"><?php echo $result_samekind['sanpham_name']; ?></p>
                  <div class="clear10"></div>
                  <div class="flex-bw">
                    <p class="old-pri">
                      <?php echo number_format($result_samekind['sanpham_gia']) . " đ"; ?></p>
                    <p class="new-pri bold">
                      <?php echo number_format($result_samekind['sanpham_giakhuyenmai']) . " đ"; ?>
                    </p>
                  </div>
                  <div class="clear10"></div>
                  <a href="chi-tiet/<?php echo $result_samekind['sanpham_id'] ?>/<?php echo $result_samekind['sanpham_url'] ?>.html"
                    class="addtocart">
                    xem sản phẩm
                  </a>
                </div>
              </div>
              <?php } } ?>
            </div>
            <div class="clear20"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'inc/footer.php'; ?>