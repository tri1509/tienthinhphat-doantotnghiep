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
  <!-- Google Tag Manager -->
  <script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-PSKPTHQ');
  </script>
  <!-- End Google Tag Manager -->
  <base href="http://localhost/ttppro/">
  <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta content='index,follow,all' name='robots' />
  <meta property="og:image" content="https://salanest.com/img/salanest.png" />

  <link rel="shortcut icon" href="./img/ttp.webp" />
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
        ?????a ch??? : 180 Nguy???n Th??? B??p, Ph?????ng T??n Ch??nh Hi???p, Qu???n 12, Th??nh Ph??? H??? Ch?? Minh
      </div>
      <div class="wide-flex-right">
        HOTLINE: 0876.88.39.39 | M??? C???a : 8:00 - 18:00 T2-T7

      </div>
    </div>
    <div class="header">
      <div class="header-top">
        <div class="logo">
          <img src="img/salanest.png" alt="logo-group-Ti???n Th???nh Ph??t" title="logo-Ti???n-Th???nh-Ph??t" width="100"
            height="auto">
        </div>
        <div class="header-contact">
          <div class="header-contact-item">
            <?php 
                $login_check = Session::get('customer_login');
                  if($login_check) {
              ?>

            <div class="header-contact-item-login">
              <a href='profile.html'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-person-circle"
                  viewBox="0 0 16 16" style="margin-right:5px">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <?php echo Session::get('customer_name') ?>
              </a>
            </div>
            <div class="header-contact-item-login">
              <a title="????ng xu???t t??i kho???n" href="?customerid=<?php echo Session::get('customer_id')?>"
                onclick="return confirm('B???n c?? mu???n ????ng xu???t kh??ng?')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18"
                  style="margin-right:5px" fill="#ffff">
                  <path
                    d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" />
                </svg>
                ????ng xu???t
              </a>
            </div>
            <?php } else { ?>
            <div class="header-contact-item-login">
              <a href="login.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-person-circle"
                  viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                ????ng nh???p / ????ng k??
              </a>
            </div>
            <?php } ?>
            <div class="header-contact-item-cart">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-basket3-fill"
                viewBox="0 0 16 16">
                <path
                  d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z" />
              </svg>
              <?php
              $check_cart = $ct->check_cart();
              if ($check_cart) {
                $qty = session::get("qty");
              ?>
              <span class="header-contact-item-cart-span"><?php echo $qty; ?></span>
              <?php } ?>
              <a href="giohang.html" title="gi??? h??ng">Gi??? h??ng</a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom" id="header-bottom">
        <div class="logo-header-bottom" id="logo-header-bottom">
          <img src="img/salanest.png" alt="logo-group-Ti???n Th???nh Ph??t" title="logo-Ti???n-Th???nh-Ph??t" width="50"
            height="50">
        </div>
        <ul class="header-bottom-list">
          <li class="header-bottom-item"><a class="header-bottom-link" href="./" title="Trang ch???">TRANG CH???</a></li>
          <li class="header-bottom-item"><a class="header-bottom-link" href="gioithieusalanest.html"
              title="Gi???i Thi???u">GI???I THI???U</a></li>
          <li class="header-bottom-item header-bottom-item-dropdown">
            <a class="header-bottom-link" href="sanpham.html" title="S???n Ph???m">
              Y???N S??O
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-down" viewBox="0 0 16 16" style="margin-bottom:3px;">
                <path fill-rule="evenodd"
                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
              </svg>
            </a>
            <!-- 
            <div class="header-bottom-item-menu">
              <div class="header-bottom-item-menu-left">
                <div class="bottom-product">
                  <div class="row">
                    <?php
                      if(isset($_GET['brandid']) && $_GET['brandid']!=NULL){
                        $idbrand = $_GET['brandid'];
                      }else{
                          $idbrand ="";
                      }
                      $show_brand = $brand->show_brand();
                      if ($show_brand) {
                        while ($result = $show_brand->fetch_assoc()) {
                    ?>
                    <div class="col-3 border-right">
                       <a href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>-<?php echo $result['brand_url'] ?>.html"
                        class="bottom-link
                      <?php if($idbrand == $result['brand_id']){echo "active";}?>">
                        <?php echo $result['brand_name'] ?>
                      </a>
                      <div class="bottom-child">
                        <ul class="bottom-list-child">
                          <?php 
                      $id_lv2 = $result['brand_id'];
                      $show_brand_lv2 = $brand->show_brand_lv2($id_lv2);
                      if ($show_brand_lv2) {
                        while ($result_lv2 = $show_brand_lv2->fetch_assoc()) {
                      ?>
                          <li class="bottom-item-child">
                           <a href="san-pham-theo-thuong-hieu/<?php echo $result_lv2['brand_id'] ?>/<?php echo $result_lv2['brand_id_lv2'] ?>-<?php echo $result_lv2['url'] ?>.html">
                              <?php echo $result_lv2['brand_name_lv2'] ?>
                            </a>
                          </li>
                          <?php } } ?>
                        </ul>
                      </div>
                    </div>
                    <?php } } ?>
                  </div>
                </div>
              </div>
              <div class="header-bottom-item-menu-right">
                <div class="grid">
                  <div class="grid-item">
                    <img src="./img/heranest_2-compressed.webp" alt="???nh heranest" />
                  </div>
                  <div class="grid-item">
                    <img src="./img/salanest_2-compressed.webp" alt="???nh salanest" />
                  </div>
                  <div class="grid-item">
                    <img src="./img/giabao_2.webp" alt="???nh gia bao" />
                  </div>
                </div>
              </div>
            </div>
 -->
          </li>
          <li class="header-bottom-item header-bottom-item-country">
            <a class="header-bottom-link" href="water.html" title="S???n Ph???m">
              N?????C GI???I KH??T
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-down" viewBox="0 0 16 16" style="margin-bottom:3px;">
                <path fill-rule="evenodd"
                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
              </svg>
            </a>
            <!--  
            <div class="header-bottom-item-menu-contry">
              <div class="header-bottom-item-menu-left">
                <div class="bottom-product">
                  <div class="row">
                    <?php
                      if(isset($_GET['waterid']) && $_GET['waterid']!=NULL){
                        $idwater = $_GET['waterid'];
                      }else{
                          $idwater ="";
                      }
                      $show_water = $brand->show_water();
                      if ($show_water) {
                        while ($result_water = $show_water->fetch_assoc()) {
                          if($result_water['category_id'] > 14){
                    ?>
                    <div class="col-2 border-right">
                      <a href="nuoc-giai-khat/<?php echo $result_water['category_id'] ?>.html" class="bottom-link 
                      <?php if($idwater == $result_water['category_id']){echo "active";}?>">
                        <?php echo $result_water['category_name'] ?>
                      </a>
                    </div>
                    <?php } } } ?>
                  </div>
                </div>
              </div>
              <div class="header-bottom-item-menu-right">
                <div class="grid">
                  <div class="grid-item">
                    <img src="./img/ngktraxanhhuongdau.jpg" alt="???nh heranest" />
                  </div>
                  <div class="grid-item">
                    <img src="./img/ngknuocsuoi.jpg" alt="???nh salanest" />
                  </div>
                  <div class="grid-item">
                    <img src="./img/ngklinhchi.jpg" alt="???nh gia bao" />
                  </div>
                </div>
              </div>
            </div>
            -->
          </li>
          <li class="header-bottom-item"><a class="header-bottom-link" href="tintucsukien.html">TIN T???C</a></li>
          <li class="header-bottom-item"><a class="header-bottom-link" href="lienhe.html">LI??N H???</a></li>
        </ul>

        <form action="timkiem.html" method="POST">
          <div class="search-toggle hide1294" id="search-toggle">
            <input type="text" name="search_product" id="search_product" required placeholder="T??m ki???m s???n ph???m...">
            <button class="btn search_button" name="search_button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffff" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="show991 sider-bar-tablet">
    <div class="flex-bw">
      <span class="sp-sn">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" class="bi bi-list" viewBox="0 0 16 16"
          onclick="openNav()">
          <path fill-rule="evenodd"
            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </span>
      <span class="sp-cn">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-x-lg" viewBox="0 0 16 16"
          onclick="closeNav()">
          <path
            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </span>
      <span class="sp-cl">
        <a href="giohang.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-basket3-fill" viewBox="0 0 16 16">
            <path
              d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z" />
          </svg>
          <?php
          $check_cart = $ct->check_cart();
          if ($check_cart) {
            $qty = session::get("qty");
          ?>
          <span><?php echo $qty; ?></span>
          <?php } ?>
        </a>
      </span>
    </div>
    <a href="./" class="logo"><img src="img/salanest.png" alt="anh-lo-go-tien-thinh-phat"></a>
    <div id="mySidenav" class="sidenav">

      <form action="timkiem.html" method="POST">
        <div class="search-toggle" style="margin-top:30px">
          <input type="text" placeholder="B???n mu???n mua g???" name="search_product" id="search_product" required="" />
          <button class="btn search_button" name="search_button" id="search_button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--red--nhat)" class="bi bi-search"
              viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
        </div>
      </form>

      <ul class="menu-mobile" id="accordion">
        <li><a href="./" title="trang ch???">Trang ch???</a></li>
        <li><a href="gioithieusalanest.html" title="gi???i thi???u">Gi???i thi???u</a></li>
        <li class="hassub-mb panel">
          <p class="phelp"><a href="sanpham.html">Th????ng hi???u</a><a data-bs-toggle="collapse"
              data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"
              class="a-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
              </svg>
            </a></p>
          <ul class="sub-menu-mb accordion-collapse panel-collapse collapse mobile-menu-list" id="flush-collapseTwo"
            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <?php
            $show_brand = $brand->show_brand();
            if ($show_brand) {
              while ($result = $show_brand->fetch_assoc()) {
            ?>
            <li>
              <a href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>.html">
                <?php echo $result['brand_name'] ?>
              </a>
            </li>
            <?php } } ?>
          </ul>
        </li>
        <li class="hassub-mb panel">
          <p class="phelp"><a href="sanpham.html">S???n ph???m</a><a data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"
              class="a-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
              </svg>
            </a></p>
          <ul class="sub-menu-mb accordion-collapse panel-collapse collapse mobile-menu-list" id="flush-collapseOne"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <?php
            $showCat = $cat->show_category();
            if ($showCat) {
              while ($result = $showCat->fetch_assoc()) {
            ?>
            <li>
              <a href="san-pham-theo-danh-muc/<?php echo $result['category_id'] ?>.html">
                <?php echo $result['category_name'] ?>
              </a>
            </li>
            <?php } } ?>
          </ul>
        </li>
        <?php
        if (isset($_GET['customerid'])) {
          $delCart = $ct->del_all_data_cart();
          session::destroy();
        }
        $customer_id = Session::get('customer_id');
        $check_order = $ct->check_order($customer_id);
        if ($check_order) {
        ?>
        <li><a href='donhang.php' title="????n h??ng">????n h??ng</a></li>
        <?php } ?>
        <?php
        $login_check = Session::get('customer_login');
        if ($login_check) {
          echo "<li><a href='profile.php'>Kh??ch h??ng</a></li>";
        ?>
        <li><a href="?customerid=<?php echo Session::get('customer_id') ?>"
            onclick="return confirm('B???n c?? mu???n ????ng xu???t kh??ng?')">????ng Xu???t</a></li>
        <?php } else { ?>
        <li><a href="login.html" title="????ng nh???p">????ng Nh???p</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>