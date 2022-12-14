<?php
	include_once 'lib/database.php';
	include_once 'helpers/format.php';
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	
	if(isset($_GET['waterid']) && $_GET['waterid']!=NULL){
		$id = $_GET['waterid'];
	}
	$cat = new category();
	$namebycat = $cat -> get_name_by_cat($id);
	if($namebycat) {
		while($get_title = $namebycat -> fetch_assoc()){
		$title = $get_title['category_name'];
	}}else{
		$title = "Sản phẩm đang cập nhật";
	}
	
	include 'inc/header.php';
	include 'inc/sale.php';
?>
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
					$namebycat = $cat -> get_name_by_cat($id);
					if($namebycat) {
					$result_name = $namebycat -> fetch_assoc();
				?>
            <h4 class="nomargin text-uppercase clredt">NƯỚC GIẢI KHÁT
              : <?php echo $result_name['category_name'] ?>
            </h4><br><?php } ?>
            <div class="clear20"></div>
            <div class="row flex-wrap list-spc">
              <?php
						$productbycat = $cat -> get_product_by_cat($id);
						if($productbycat) {
							while($result = $productbycat -> fetch_assoc()) {
					?>
              <div class="col-xl-4 col-md-4 col-sm-6 col-xs-6 col-6">
                <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html"
                  title="<?php echo $result['sanpham_name'] ?>">
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
                      <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>.html" class="addtocart">Xem Sản Phẩm</a>
                    </div>
                  </div>
                </a>
              </div>
              <?php } }else{ ?>
              <h4 class="nomargin text-uppercase clredt text-center">sản phẩm đang cập nhật</h4>
              <div class="loader loader--style6" title="5">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="30px"
                  viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                  <rect x="0" y="13" width="4" height="5" fill="var(--red--nhat)">
                    <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0s" dur="0.6s"
                      repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0s" dur="0.6s"
                      repeatCount="indefinite" />
                  </rect>
                  <rect x="10" y="13" width="4" height="5" fill="var(--red--nhat)">
                    <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.15s" dur="0.6s"
                      repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.15s" dur="0.6s"
                      repeatCount="indefinite" />
                  </rect>
                  <rect x="20" y="13" width="4" height="5" fill="var(--red--nhat)">
                    <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.3s" dur="0.6s"
                      repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.3s" dur="0.6s"
                      repeatCount="indefinite" />
                  </rect>
                </svg>
              </div>
              <?php } ?>
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