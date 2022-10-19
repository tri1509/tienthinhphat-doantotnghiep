<?php
$title = "SALANEST-yến sào-gia bảo-salanest-heranest.";
include 'inc/header.php' ;?>
<?php include 'inc/sale.php' ;?>

<section>
  <div class="main-breac">
    <div class="container">
      <span><a href="./" class="clblack">Trang chủ</a></span>
      <span style="margin: 0 7px;">
        <img src="./img/back.png" alt="" style="transform: rotate(180deg);" width="18">
      </span>
      <span class="clpink">Sản phẩm</span>
    </div>
  </div>
  <div class="main-wraper ">
    <div class="clear20"></div>
    <div class="cart_background">
      <div class="row">
        <?php 
					// include 'inc/danhmuc.php';
				?>
        <div class="col-12">
          <h4 class="nomargin text-uppercase clredt">SẢN PHẨM</h4><br>
          <div class="clear20"></div>
          <div class="row flex-wrap list-spc">
            <?php
						$showProduct = $product -> get_all_product();
						if($showProduct) {
						while ($result = $showProduct ->fetch_assoc()) {
					?>
            <div class="col-xl-4 col-md-6 col-sm-6 col-xs-6 col-6">
              <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html" title="<?php echo $result['sanpham_name'] ?>">
                <div class="item-pro">
                  <div class="home-product__item-img"
                    style="background-image:url(./img/<?php echo $result['hinh']; ?>);"></div>
                  <div class="ct-item-pro">
                    <p class="bold"><a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html"
                        class="clpink item-name"><?php echo $result['sanpham_name'] ?></a></p>
                    <div class="clear10"></div>
                    <div class="flex-bw">
                      <p class="old-pri"><?php echo number_format($result['sanpham_gia'])." đ" ; ?></p>
                      <p class="new-pri bold"><?php echo number_format($result['sanpham_giakhuyenmai'])." đ" ; ?></p>
                    </div>
                    <div class="clear10"></div>
                    <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html" class="addtocart">Xem Sản Phẩm </a>
                  </div>
                </div>
              </a>
            </div>
            <?php } }?>
          </div>

          <div class="clear40"></div>

          <?php 
            $product_all = $product -> getproduct_main();
            $product_count = mysqli_num_rows($product_all);
            $product_button = $product_count / 9;
            if(!isset($_GET['trang'])) {
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
          ?>
          <ul class="pagination home-product__pagination">
            <li class="pagination-item">
              <?php
                if($trang >=2){
              ?>
              <a href="san-pham/trang<?php echo $trang - 1 ?>.html" class="pagination-item__link">
                <img class='' src='./img/left.svg' alt='' width='15'>
              </a>
              <?php } ?>
            </li>

            <?php
              for($i=1 ; $i <= ceil($product_button) ; $i++) {
            ?>

            <li class="pagination-item pagination-item__link-<?php if ($i == $trang) { echo "acctive"; } ?> ">
              <a href="san-pham/trang<?php echo $i ?>.html" class="pagination-item__link">
                <?php echo $i ; ?>
              </a>
            </li>

            <?php } ?>

            <li class="pagination-item">
              <?php
                if ($trang < ceil($product_button)){
              ?>
              <a href="san-pham/trang<?php echo $trang + 1 ?>.html" class="pagination-item__link">
                <img class='' src='./img/right.svg' alt='' width='15'>
              </a>
              <?php } ?>
            </li>
          </ul>
          <div class="clear40"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="advertisement container_writing">
    <div class="container ">
      <div class="row">
        <div class="col-xl-8">
          <h1 class="text-danger">Đăng ký nhận thông tin ưu đãi và khuyến mãi.</h1>
          <p>Thông tin của bạn sẽ được bảo mật tuyệt đối và bạn có thể đăng ký bất cứ lúc nào.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'inc/footer.php' ;?>