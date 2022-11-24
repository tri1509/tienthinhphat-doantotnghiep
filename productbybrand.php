<?php
	include_once 'lib/database.php';
	include_once 'helpers/format.php';
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	
	if(isset($_GET['brandid']) && $_GET['brandid']!=NULL){
		$id = $_GET['brandid'];
	}
	$brand = new brand();
	$namebybrand = $brand -> get_name_by_brand($id);
	if($namebybrand) {
		while($get_title = $namebybrand -> fetch_assoc()){
		$title = $get_title['brand_name'];
	}}

	include 'inc/header.php';
	include 'inc/sale.php';
?>
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
      <span class="clpink">Sản phẩm</span>
    </div>
  </div>

  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
      <div class="cart_background">
        <div class="row">
          <?php 
            include 'inc/danhmuc.php';
          ?>
          <div class="col-12">
            <?php
              $namebybrand = $brand -> get_name_by_brand($id);
              if($namebybrand) {
              $result_name = $namebybrand -> fetch_assoc();
            ?>
            <h4 class="nomargin text-uppercase clredt">Thương hiệu
              : <?php echo $result_name['brand_name'] ?>
            </h4><br><?php } ?>
            <div class="clear20"></div>
            <div class="row flex-wrap list-spc">
              <?php
                $productbybrand = $brand -> get_product_by_brand($id);
                if($productbybrand) {
                  while($result = $productbybrand -> fetch_assoc()) {
              ?>
              <div class="col-xl-4 col-md-4 col-sm-6 col-xs-6 col-6">
                <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>/<?php echo $result['sanpham_url'] ?>.html"
                  title="<?php echo $result['sanpham_name'] ?>">
                  <div class="item-pro">
                    <div class="home-product__item-img "
                      style="background-image:url(./img/<?php echo $result['hinh']; ?>);"></div>
                    <div class="ct-item-pro">
                      <p class="bold"><a href="chitietsp.php?proid=<?php echo $result['sanpham_id'] ?>"
                          class="clpink item-name"><?php echo $result['sanpham_name'] ?></a></p>
                      <div class="clear10"></div>
                      <div class="flex-bw">
                        <p class="old-pri"><?php echo number_format($result['sanpham_gia'])." đ" ; ?></p>
                        <p class="new-pri bold"><?php echo number_format($result['sanpham_giakhuyenmai'])." đ" ; ?></p>
                      </div>
                      <div class="clear10"></div>
                      <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>/<?php echo $result['sanpham_url'] ?>.html"
                        class="addtocart">Xem Sản Phẩm</a>
                    </div>
                  </div>
                </a>
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
<?php
	include 'inc/footer.php';
?>