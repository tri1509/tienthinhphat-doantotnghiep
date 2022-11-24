<?php
	include_once 'lib/database.php';
	include_once 'helpers/format.php';
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	
	if(isset($_GET['brandid']) && 
		isset($_GET['brandidlv2']) && 
		$_GET['brandid']!=NULL && 
		$_GET['brandidlv2']!=NULL) {
			$id = $_GET['brandid'];
			$idlv2 = $_GET['brandidlv2'];
	}

	$brand = new brand();
	$namebybrand = $brand -> get_name_by_brand($id);
	if($namebybrand) {
		while($get_title = $namebybrand -> fetch_assoc()){
		$title = $get_title['brand_name'];
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
          <div class="col-12">
            <?php
              $namebybrand = $brand -> get_name_by_brand($id);
              $namebybrandlv2 = $brand -> get_name_by_brand_lv2($id,$idlv2);
              if ($namebybrand){
                $result_name = $namebybrand -> fetch_assoc();
              }
              if ($namebybrandlv2){ 				
                $result_name_lv2 = $namebybrandlv2 -> fetch_assoc();
            ?>
            <h4 class="nomargin text-uppercase clredt">Thương hiệu
              : <?php echo $result_name['brand_name'] ." - ". $result_name_lv2['brand_name_lv2'] ?>
            </h4><br>
            <?php } ?>
            <div class="clear20"></div>
            <div class="row flex-wrap list-spc">
              <?php
                $productbybrandlv2 = $brand -> get_product_by_brand_lv2($id,$idlv2);
                if($productbybrandlv2) {
                  while($result = $productbybrandlv2 -> fetch_assoc()) {
              ?>
              <div class="col-xl-4 col-md-4 col-sm-6 col-xs-6 col-6">
                <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>/<?php echo $result['sanpham_url'] ?>.html"
                  title="<?php echo $result['sanpham_name'] ?>">
                  <div class="item-pro">
                    <div class="home-product__item-img"
                      style="background-image:url(./img/<?php echo $result['hinh']; ?>);"></div>
                    <div class="ct-item-pro">
                      <p class="bold">
                        <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>/<?php echo $result['sanpham_url'] ?>.html"
                          class="clpink item-name">
                          <?php echo $result['sanpham_name'] ?>
                        </a>
                      </p>
                      <div class="clear10"></div>
                      <div class="flex-bw">
                        <p class="old-pri"><?php echo number_format($result['sanpham_gia'])." đ" ; ?></p>
                        <p class="new-pri bold"><?php echo number_format($result['sanpham_giakhuyenmai'])." đ" ; ?></p>
                      </div>
                      <div class="clear10"></div>
                      <a href="chi-tiet/<?php echo $result['sanpham_id'] ?>/<?php echo $result['sanpham_url'] ?>.html"
                        class="addtocart">
                        Xem Sản Phẩm
                      </a>
                    </div>
                  </div>
                </a>
              </div>
              <?php } }else{ ?>
              <h4 class="text-uppercase clredt text-center">sản phẩm đang cập nhật</h4>
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