<?php
include 'lib/session.php';
Session::init();
ob_start();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function ($class) {
  include_once "classes/" . $class . ".php";
});
$db = new Database();
$fm = new Format();
$cs = new customer();
$ct = new cart();
$us = new user();
$cat = new category();
$brand = new brand();
$product = new product();
$ps = new post();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang='vi'>

<head>
  <base href="http://localhost/ttpnew/">
  <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta content='index,follow,all' name='robots' />
  <link rel="shortcut icon" href="./img/ttp.png" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/lightslider.css" />
  <link rel="stylesheet" href="./css/nivo-slider.css">
  <link rel="stylesheet" href="./css/style.css" />
  <title><?php echo $title; ?></title>
</head>

<body>
  <div class="hide991 header-pc">
    <div class="header-dc">
      <div class="wide-flex-left">
        Địa chỉ : 180 Nguyễn Thị Búp, Phường Tân Chánh Hiệp, Quận 12, Thành Phố Hồ Chí Minh
      </div>
      <div class="wide-flex-right">
        HOTLINE: (02).836.221.286 | Mở Cửa : 8:00 - 18:00 T2-T7
        <img src="img/la-co-viet-nam-vector-1.webp" alt="Quốc-Kỳ-Việt-Nam" title="VietNam" width="5%">
      </div>
    </div>
    <div class="header">
      <div class="header-top">
        <div class="logo">
          <img src="img/salanest.png" alt="logo-group-Tiến Thịnh Phát." title="logo-Tiến-Thịnh-Phát" width="100px">
        </div>
        <div class="header-contact">
          <div class="header-contact-item">
            <div class="header-contact-item-login">
              <?php 
                $login_check = Session::get('customer_login');
                  if($login_check) {
              ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18px" height="18px"
                style="margin-right: 5px; filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
                <path
                  d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" />
              </svg>
              <a title="Đăng xuất tài khoản" href="?customerid=<?php echo Session::get('customer_id')?>"
                onclick="return confirm('Bạn có muốn đăng xuất không?')">
                Đăng xuất
              </a>
              <?php } else { ?>
              <img src="./img/user.png" alt="" width='22'
                style="margin-right: 5px; filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
              <a href="login.html">
                Đăng nhập / Đăng ký
              </a>
              <?php } ?>
            </div>
            <div class="header-contact-item-cart">
              <img src="./img/basket.png" alt="" width='18'
                style="margin-right: 5px; filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
              <?php
                  $check_cart = $ct -> check_cart();
                  if($check_cart){
                      $qty = session::get("qty");
                ?>
              <span class="header-contact-item-cart-span"><?php echo $qty; ?></span>
              <?php } ?>
              <a href="giohang.html">Giỏ hàng</a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom" id="header-bottom">
        <div class="logo-header-bottom" id="logo-header-bottom">
          <img src="img/salanest.png" alt="logo-group-Tiến Thịnh Phát." title="logo-Tiến-Thịnh-Phát" width="50px">
        </div>
        <ul class="header-bottom-list">
          <li class="header-bottom-item"><a class="header-bottom-link" href="./">TRANG CHỦ</a></li>
          <li class="header-bottom-item"><a class="header-bottom-link" href="gioithieu.html">GIỚI THIỆU</a></li>
          <li class="header-bottom-item header-bottom-item-dropdown">
            <a class="header-bottom-link" href="sanpham.html">
              SẢN PHẨM
              <img src="./img/back.png" alt="" width='15'
                style="margin-left: 1px;margin-bottom: 3px; filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1); transform: rotate(-90deg);">
            </a>
            <div class="header-bottom-item-menu">
              <div class="header-bottom-item-menu-left">
                <div class="row">
                  <?php
                        $show_brand = $brand->show_brand();
                        if($show_brand){
                            while($result = $show_brand->fetch_assoc()){
                      ?>
                  <div class="col-4">
                    <h4 class="menu-left-brand">
                      <a href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>.html">
                        <?php echo $result['brand_name'] ?>
                      </a>
                    </h4>
                    <ul class="menu-left-list">
                      <?php
                            $id_lv2 = $result['brand_id'];
                            $show_brand_lv2 = $brand->show_brand_lv2($id_lv2);
                            if($show_brand_lv2){
                                while($result_lv2 = $show_brand_lv2->fetch_assoc()){
                          ?>
                      <li>
                        <a
                          href="san-pham-theo-thuong-hieu/<?php echo $result_lv2['brand_id'] ?>/<?php echo $result_lv2['brand_id_lv2'] ?>.html">
                          <?php echo $result_lv2['brand_name_lv2']?>
                        </a>
                      </li>
                      <?php } } ?>
                    </ul>
                  </div>
                  <?php } } ?>
                </div>
              </div>
              <div class="header-bottom-item-menu-right">
                <div class="grid">
                  <div class="grid-item">
                    <img src="./img/hera.png" alt="" />
                  </div>
                  <div class="grid-item">
                    <img src="./img/sala.png" alt="" />
                  </div>
                  <div class="grid-item">
                    <img src="./img/giabao.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="header-bottom-item"><a class="header-bottom-link" href="#tuvan"> LIÊN HỆ</a></li>
          <li class="header-bottom-item"><a class="header-bottom-link" href="#tuvan"> HỖ TRỢ</a></li>
        </ul>

        <form action="timkiem.php" method="POST">
          <div class="search-toggle" id="search-toggle">
            <input type="text" name="search_product" id="search_product" required="vui lòng nhập thông tin"
              placeholder="Tìm kiếm sản phẩm...">
            <button class="btn search_button" name="search_button">
              <img src="./img/search.png" alt="" width='18'
                style="margin-right: 5px; filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="show991 sider-bar-tablet">
    <div class="flex-bw">
      <span style="cursor:pointer;display: inline-block; height:80px" class="sp-sn">
        <img src="./img/menu.png" alt="" width='25' onclick="openNav()"
          style="filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
      </span>
      <span style="cursor:pointer;display: inline-block; height:80px" class="sp-cn">
        <img src="./img/close.png" alt="" width='20' onclick="closeNav()"
          style="filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
      </span>
      <span style="cursor:pointer;display: inline-block; height:80px; position: relative;" class="sp-cl">
        <a href="giohang.html">
          <img src="./img/basket.png" alt="hinh-gio-hang-san-pham" width='25'
            style="filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);">
          <?php
                $check_cart = $ct -> check_cart();
                if($check_cart){
                    $qty = session::get("qty");
              ?>
          <span><?php echo $qty; ?></span>
          <?php } ?>
        </a>
      </span>
    </div>
    <a href="./" class="logo"><img src="img/salanest.png" alt="anh-lo-go-tien-thinh-phat"></a>
    <div id="mySidenav" class="sidenav">
      <form action="timkiem.php" method="POST">
        <div class="search-toggle" style="margin-top:30px">
          <input type="text" placeholder="Bạn muốn mua gì?" name="search_product" id="search_product" required="" />
          <button class="btn search_button" name="search_button" id="search_button">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>


      <ul class="menu-mobile" id="accordion">
        <li><a href="./">Trang chủ</a></li>
        <li><a href="gioithieu.html">Giới thiệu</a></li>
        <li class="hassub-mb panel">
          <p class="phelp">
            <a href="sanpham.html">Sản phẩm</a>
            <a data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
              aria-controls="flush-collapseOne" class="a-icon">
              <i class="bi bi-caret-down-fill"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path
                  d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
              </svg>
            </a>
          </p>
          <ul class="sub-menu-mb accordion-collapse panel-collapse collapse mobile-menu-list" id="flush-collapseOne"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <?php
              $showCat = $cat -> show_category();
              if($showCat) {
                  while($result = $showCat ->fetch_assoc()) {
            ?>

            <li><a
                href="san-pham-theo-danh-muc/<?php echo $result['category_id'] ?>.html"><?php echo $result['category_name'] ?></a>
            </li>
            <?php }} ?>
          </ul>
        </li>
        <li class="hassub-mb panel">
          <p class="phelp">
            <a href="sanpham.html">Thương hiệu</a>
            <a data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
              aria-controls="flush-collapseTwo" class="a-icon">
              <i class="bi bi-caret-down-fill"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path
                  d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
              </svg>
            </a>
          </p>
          <ul class="sub-menu-mb accordion-collapse panel-collapse collapse mobile-menu-list" id="flush-collapseTwo"
            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <?php
              $show_brand = $brand->show_brand();
              if($show_brand){
                  while($result = $show_brand->fetch_assoc()){
            ?>
            <li><a
                href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>.html"><?php echo $result['brand_name'] ?></a>
            </li>
            <?php }} ?>
          </ul>
        </li>
        <?php
          if(isset($_GET['customerid'])){
              $delCart = $ct -> del_all_data_cart();
              session::destroy();
          }
        ?>
        <?php 
          $customer_id = Session::get('customer_id');
          $check_order = $ct -> check_order($customer_id);
          if($check_order) {
        ?>
        <li><a href='donhang.php'>Đơn hàng</a></li>
        <?php } ?>

        <?php 
          $login_check = Session::get('customer_login');
          if($login_check) {
          echo "<li><a href='profile.php'>Khách hàng</a></li>";
        ?>
        <li>
          <a href="?customerid=<?php echo Session::get('customer_id')?>"
            onclick="return confirm('Bạn có muốn đăng xuất không?')">Đăng Xuất</a>
        </li>
        <?php }else{ ?>
        <li><a href="login.html">Đăng Nhập</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>