<?php
	if(isset($_GET['catid']) && $_GET['catid']!=NULL){
		$idcat = $_GET['catid'];
	}elseif(isset($_GET['brandid']) && $_GET['brandid']!=NULL){
		$idbrand = $_GET['brandid'];
	}else{
      $idcat ="";
      $idbrand ="";
}
?>
<!-- 
<div class="col-xl-4 col-lg-4 col-md-12 order-lg-1 order-md-2 order-2">
  <div class="block-aside">
    <h4 class="tit-aside"><i class="fas fa-list-ul"></i> DANH MỤC SẢN PHẨM</h4>
    <div class="ct-aside">
      <?php 
        $showCat = $cat -> show_category();
        if($showCat){
          while($result_showCat = $showCat -> fetch_assoc()){
      ?>
      <a href="san-pham-theo-danh-muc/<?php echo $result_showCat['category_id'] ?>.html" class="
						<?php 
							if($idcat == $result_showCat['category_id']){
								echo "active";
							}
						?>"><img src="./img/diamond.png"><span><?php echo $result_showCat['category_name'] ?></span></a>
      <?php }} ?>
    </div>
  </div>
  <div class="block-aside">
    <h4 class="tit-aside"><i class="fas fa-award"></i> THƯƠNG HIỆU</h4>
    <div class="ct-aside">
      <?php
        $show_brand = $brand->show_brand();
        if($show_brand){
          while($result_showBrand = $show_brand->fetch_assoc()){
      ?>
      <a href="san-pham-theo-thuong-hieu/<?php echo $result_showBrand['brand_id'] ?>.html"
        class="<?php if($idbrand == $result_showBrand['brand_id']){ echo "active";}?>"><img
          src="./img/diamond.png"><span><?php echo $result_showBrand['brand_name'] ?></span>
      </a>
      <?php } } ?>
    </div>
  </div>
  <div class="block-aside">
    <div class="center"><img src="img/hinh4.png"></div>
  </div>
  <div class="block-aside">
    <h4 class="tit-aside"><i class="far fa-edit"></i> BÀI VIẾT MỚI NHẤT</h4>
    <?php
            $get_post = $ps -> show_post();
            if($get_post){
              while($result = $get_post -> fetch_assoc()){
      ?>
    <div class="ct-aside">
      <a href="bai-viet/<?php echo $result['baiviet_id'] ; ?>.html"><img src="./img/diamond.png"><span
          class="category-baiviet"><?php echo $result['baiviet_name'] ; ?></span></a>
    </div>
    <?php }} ?>
  </div>
</div> 

-->