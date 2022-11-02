<?php
$title = "Tin Tức & Sự Kiện - TIẾN THỊNH PHÁT group";
include 'inc/header.php';include 'inc/sale.php';?>
<section>
  <div class="container">
    <span><a href="./" class="clblack">Trang chủ</a></span>
    <span style="margin: 0 7px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-chevron-right"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
      </svg>
    </span>
    <span class="clpink">Tin Tức & Sự Kiện</span>
    <div class="clear20"></div>
  </div>
  <div class="main-wraper ">
    <div class="cart_background">
      <div class="row">
        <?php  include 'inc/danhmuc.php';?>
        <div class="col-12">
          <div id="right">
            <h1 class="text-center">Tin Tức & Sự Kiện</h1>
            <div class="clear20"></div>
            <div class="wap_box_new clear">
              <?php
                $get_post = $ps -> show_post();
                if($get_post){
                  while($result = $get_post -> fetch_assoc()){
              ?>
              <div class="box_news clear">
                <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                    <a href="bai-viet/<?php echo $result['baiviet_id'] ; ?>-<?php echo $result['tbl_url'] ; ?>.html"
                      title="<?php echo $result['baiviet_name'] ; ?>"><img
                        src="img/<?php echo $result['baiviet_img'] ; ?>"
                        alt="<?php echo $result['baiviet_name'] ; ?>" /></a>
                  </div>

                  <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="clear20"></div>
                    <h3><a href="bai-viet/<?php echo $result['baiviet_id'] ?>-<?php echo $result['tbl_url'] ; ?>.html"
                        title="<?php echo $result['baiviet_name'] ; ?>"><?php echo $result['baiviet_name']?></a></h3>
                    <p class="new_ngaydang">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:12px;">
                        <path
                          d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                      </svg>
                      <?php echo $result['baiviet_date'] ; ?>
                    </p>
                    <div class="clear20"></div>
                    <div class="mota">
                      <?php echo $fm -> textShorten($result['baiviet_title'],300) ; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box_news clear"></div>
              <?php }} ?>

              <?php 
                $post_all = $ps -> show_all_post();
                $post_count = mysqli_num_rows($post_all);
                $post_button = $post_count / 5;
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
                  <a href="bai-viet/trang<?php echo $trang - 1 ?>.html" class="pagination-item__link">
                    <img class='' src='./img/left.svg' alt='' width='15'>
                  </a>
                  <?php } ?>
                </li>

                <?php
                  for($i=1 ; $i <= ceil($post_button) ; $i++) {
                ?>

                <li class="pagination-item pagination-item__link-<?php if ($i == $trang) { echo "acctive"; } ?> ">
                  <a href="bai-viet/trang<?php echo $i ?>.html" class="pagination-item__link">
                    <?php echo $i ; ?>
                  </a>
                </li>

                <?php } ?>

                <li class="pagination-item">
                  <?php
                    if ($trang < ceil($post_button)){
                  ?>
                  <a href="bai-viet/trang<?php echo $trang + 1 ?>.html" class="pagination-item__link">
                    <img class='' src='./img/right.svg' alt='' width='15'>
                  </a>
                  <?php } ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="pro-relative">
        <div class="tit-pr">
          <h1 class="bold clred nomargin text-uppercase">Sản phẩm bán chạy</h1>
        </div>
        <div class="clear20"></div>
        <div class="img-slider">
          <?php
              $sp_rand = $product->getproduct_feathered_10();
              if ($sp_rand) {
                while ($result_rand= $sp_rand->fetch_assoc()) {
              ?>
          <div class="img-item border-item">
            <div class="home-product__item-img"
              style="background-image:url(./img/<?php echo $result_rand['hinh']; ?>);"></div>
            <div class="ct-item-pro">
              <p class="bold item-name"><?php echo $result_rand['sanpham_name']; ?></p>
              <div class="clear10"></div>
              <div class="flex-bw">
                <p class="old-pri">
                  <?php echo number_format($result_rand['sanpham_gia']) . " đ"; ?></p>
                <p class="new-pri bold">
                  <?php echo number_format($result_rand['sanpham_giakhuyenmai']) . " đ"; ?>
                </p>
              </div>
              <div class="clear10"></div>
              <a href="chi-tiet/<?php echo $result_rand['sanpham_id'] ?>/<?php echo $result_rand['sanpham_url'] ?>.html"
                class="addtocart">
                xem sản phẩm
              </a>
            </div>
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'inc/footer.php';?>