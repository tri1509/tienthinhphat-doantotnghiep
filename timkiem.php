<?php 
  $title = "Tìm kiếm sản phẩm. ";
  include 'inc/header.php' ;
  include 'inc/sale.php' ;
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_button'])) {
  $tukhoa = $_POST['search_product'];
  $title_timkiem = $tukhoa;
}
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
      <span class="clpink">Tìm kiếm</span>
      <div class="clear20"></div>
      <div class="row flex-wrap list-spc">
      </div>
    </div>

    <div class="clear20"></div>
    <div class="container">
      <div class="cart_background">
        <div class="row">
          <?php include('inc/danhmuc.php'); ?>
          <div class="col-12">
            <h4 class="nomargin text-uppercase clredt">Kết quả tìm kiếm : <?php echo $title_timkiem ?></h4>
            <div class="row">
              <?php
                $timkiem = $product -> timkiem($tukhoa);
                if($timkiem) {
                    while($result = $timkiem -> fetch_assoc()){
              ?>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                <a href="chitietsp.php?proid=<?php echo $result['sanpham_id'] ?>">
                  <div class="item-pro">
                    <div class="home-product__item-img"
                      style="background-image:url(./img/<?php echo $result['hinh']; ?>);"></div>
                    <div class="ct-item-pro">
                      <p class="bold">
                        <a href="" class="clpink item-name">
                          <?php echo $result['sanpham_name'] ?>
                        </a>
                      </p>
                      <div class="clear10"></div>
                      <div class="flex-bw">
                        <p class="old-pri"><?php echo number_format($result['sanpham_gia'])." đ" ; ?></p>
                        <p class="new-pri bold"><?php echo number_format($result['sanpham_giakhuyenmai'])." đ" ; ?>
                        </p>
                      </div>
                      <div class="clear10"></div>
                      <a href="chitietsp.php?proid=<?php echo $result['sanpham_id'] ?>" class="addtocart">
                        xem sản phẩm
                      </a>
                    </div>
                  </div>
                </a>
              </div>
              <?php
                }}else{
                  echo "<p class='nomargin text-uppercase clredt'>Không tìm thấy sản phẩm</p>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php include 'inc/footer.php' ;?>