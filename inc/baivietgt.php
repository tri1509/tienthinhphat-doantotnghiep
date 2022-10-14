
<div class="col-xl-4 col-lg-4 col-md-12 order-lg-1 order-md-2 order-2">
   <div class="block-aside">
      <h4 class="tit-aside"><i class="far fa-edit"></i> BÀI VIẾT MỚI NHẤT</h4>
      <div class="ct-aside">
         <a href="baiviet1.php"><img src="./img/diamond.png"><span class="category-baiviet">Giới thiệu về công ty TNHH TM SX TIẾN THỊNH PHÁT.</span></a>
         <a href="baiviet2.php"><img src="./img/diamond.png"><span class="category-baiviet">Giới Thiệu Quá Trình Hình Thành và Phát Triển Công Ty SX TM XNK  NGK TIẾN THINH PHÁT </span></a>
         <a href="baiviet3.php"><img src="./img/diamond.png"><span class="category-baiviet">TOP NHỮNG TÁC DỤNG CỦA YẾN SÀO :</span></a>
         <a href="baiviet4.php"><img src="./img/diamond.png"><span class="category-baiviet">[CHÍNH SÁCH ĐƠN HÀNG & GIAO HÀNG]...</span></a>
         <a href="baiviet5.php"><img src="./img/diamond.png"><span class="category-baiviet">HÌNH THỨC THANH TOÁN & LIÊN KÊT THANH TOÁN ONLINE</span></a>
      </div>
   </div>
   <div class="block-aside">
      <h4 class="tit-aside"><i class="fas fa-list-ul"></i> DANH MỤC SẢN PHẨM</h4>
      <div class="ct-aside">

      <?php 
         $showCat = $cat -> show_category();
         if($showCat){
            while($result_showCat = $showCat -> fetch_assoc()){
      ?>
         <a href="productbycat.php?catid=<?php echo $result_showCat['category_id'] ?>" class=""><img src="./img/diamond.png"><span><?php echo $result_showCat['category_name'] ?></span></a>
      <?php }} ?>

      </div>
   </div>
   <div class="block-aside">
      <h4 class="tit-aside"><i class="fas fa-award"></i> THƯƠNG HIỆU</h4>
      <div class="ct-aside">
      <?php
         $show_brand = $brand->show_brand();
         if($show_brand){
            while($result = $show_brand->fetch_assoc()){
      ?>
         <a href="productbybrand.php?brandid=<?php echo $result['brand_id'] ?>"><img src="./img/diamond.png"><span><?php echo $result['brand_name'] ?></span></a>
      <?php }} ?>
      </div>
   </div>
   <div class="block-aside">
      <div class="center"><img src="img/quangcao.jpg"></div>
   </div>
</div>






<!-- demo -->
<div class="container">
      <!-- <div class="flex-bw hide991" id="navbar">
         <a href="./" class="logo"><img src="img/ttp.png" width="50" height="50"></a>
         <div class="right-header">
            <div class="right-header-bottom" id="right-header-bottom">
               <ul class="ul-main-menu">
                  <li><a href="index.html">Trang Chủ</a> </></li>
                  <li class="has-sub"><a href="gioithieu.html">Giới Thiệu</a></li>
                  <li class="header_menu"><a href="sanpham.html"> Sản phẩm</a>
                  

                  <!-- <li class="has-sub">
                     <a href="sanpham.html">Sản phẩm <i class="fas fa-sort-down"></i></a>
                     <ul class="ul-sub-menu menu-sanpham">
                        <?php
                           $showCat = $cat -> show_category();
                           if($showCat) {
                              while($result = $showCat ->fetch_assoc()) {
                        ?>
                           <li><a href="san-pham-theo-danh-muc/<?php echo $result['category_id'] ?>.html"><?php echo $result['category_name'] ?></a></li>
                        <?php }} ?>
                     </ul>
                  </li> -->
                     <!-- <li class="has-sub">
                        <a href="sanpham.html">Thương hiệu <i class="fas fa-sort-down"></i></a>
                        <ul class="ul-sub-menu thuonghieu">
                        <?php
                           $show_brand = $brand->show_brand();
                           if($show_brand){
                              while($result = $show_brand->fetch_assoc()){
                        ?>
                           <li class="position-relative li-sub-menu">
                              <a href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>.html"><?php echo $result['brand_name'] ?></a>
                              <ul class="ul-sub-menu-lv2">
                           <?php
                              $id_lv2 = $result['brand_id'];
                              $show_brand_lv2 = $brand->show_brand_lv2($id_lv2);
                              if($show_brand_lv2){
                                 while($result_lv2 = $show_brand_lv2->fetch_assoc()){
                           ?>
                                 <li class="li-sub-menu-lv2"><a class="link-sub-menu-lv2" href="san-pham-theo-thuong-hieu/<?php echo $result_lv2['brand_id'] ?>/<?php echo $result_lv2['brand_id_lv2'] ?>.html"><?php echo $result_lv2['brand_name_lv2']?></a></li>
                           <?php }} ?>
                              </ul>
                           </li>
                        <?php }} ?>
                        </ul>
                     </li> -->


                  <!-- <li class="has-sub position-relative">
                     <a href="giohang.html">
                        Giỏ hàng<i class="fa-solid fa-cart-shopping cart-icon"></i>
                     </a>

                     <?php
                        $check_cart = $ct -> check_cart();
                        if($check_cart){
                           $qty = session::get("qty");
                     ?>
                              <span class="giohang-span"><?php echo $qty; ?></span>
                     <?php } ?>
                  </li>

                  <?php 
                     $customer_id = Session::get('customer_id');
                     $check_order = $ct -> check_order($customer_id);
                     if($check_order) {
                  ?>
                     <li><a href="donhang.php">Đơn hàng</a></li>
                  <?php } ?>
                  
                  <?php
                     if(isset($_GET['customerid'])){
                        $delCart = $ct -> del_all_data_cart();
                        session::destroy();
                     }
                  ?>
                  <?php 
                     $login_check = Session::get('customer_login');
                     if($login_check) {
                  ?>
                  <li><a href="profile.php">Khách hàng</a></li>
                  <li><a href="?customerid=<?php echo Session::get('customer_id')?>" onclick="return confirm('Bạn có muốn đăng xuất không?')">Đăng Xuất</a></li>
               <?php }else{ ?>
                  <li><a href="login.html">Đăng Nhập</a></li>
               <?php } ?>
                  <form action="timkiem.php" method="POST">
                     <div class="search-toggle" id="search-toggle">
                        <input type="text"  placeholder="Bạn muốn mua gì?" name="search_product" id="search_product" required=""/>
                        <button class="btn search_button" name="search_button">
                           <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </form>

               </ul>
            </div>
         </div>
      </div> -->


      <div class="show991 sider-bar-tablet">
            <div class="flex-bw">
            <span style="cursor:pointer;display: inline-block;color: #00502b; height:80px" class="sp-sn"><i class="fas fa-bars fa-2x" onclick="openNav()"></i></span>
            <span style="cursor:pointer;display: inline-block;color: #00502b; height:80px" class="sp-cn"><i class="fas fa-times fa-2x" onclick="closeNav()"></i></span>
            <a href="giohang.html" class="cart">
               <i class="fa-solid fa-cart-shopping giohang-icon-tablet"></i>
               <?php
                  $check_cart = $ct -> check_cart();
                  if($check_cart){
                     $qty = session::get("qty");
               ?>
                  <span><?php echo $qty; ?></span>
               <?php } ?>
            </a>
         </div>
      <a href="./" class="logo"><img src="img/ttp.webp"></a>
         <div id="mySidenav" class="sidenav">
            <form action="timkiem.php" method="POST">
               <div class="search-toggle" style="margin-top:30px">
                  <input type="text"  placeholder="Bạn muốn mua gì?" name="search_product" id="search_product" required=""/>
                     <button class="btn search_button" name="search_button" id="search_button">
                        <i class="fa fa-search"></i>
                     </button>
               </div>
            </form>


            <ul class="menu-mobile" id="accordion">
               <li><a href="./">Trang chủ</a></li>
               <li><a href="gioithieu.html">Giới thiệu</a></li>
               <li class="hassub-mb panel">
                     <p class="phelp"><a href="sanpham.html">Sản phẩm</a><a data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" class="a-icon"><i class="fas fa-angle-down"></i></a></p>
                     <ul class="sub-menu-mb accordion-collapse panel-collapse collapse mobile-menu-list" id="flush-collapseOne" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                     <?php
                        $showCat = $cat -> show_category();
                        if($showCat) {
                           while($result = $showCat ->fetch_assoc()) {
                     ?>

                        <li><a href="san-pham-theo-danh-muc/<?php echo $result['category_id'] ?>.html"><?php echo $result['category_name'] ?></a></li>
                        <?php }} ?>
                     </ul>
               </li>
               <li class="hassub-mb panel">
                     <p class="phelp"><a href="sanpham.html">Thương hiệu</a><a data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" class="a-icon"><i class="fas fa-angle-down"></i></a></p>
                     <ul class="sub-menu-mb accordion-collapse panel-collapse collapse mobile-menu-list" id="flush-collapseTwo" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                     <?php
                        $show_brand = $brand->show_brand();
                        if($show_brand){
                           while($result = $show_brand->fetch_assoc()){
                     ?>
                        <li><a href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>.html"><?php echo $result['brand_name'] ?></a></li>
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
                  <li><a href="?customerid=<?php echo Session::get('customer_id')?>" onclick="return confirm('Bạn có muốn đăng xuất không?')">Đăng Xuất</a></li>
               <?php }else{ ?>
                  <li><a href="login.html">Đăng Nhập</a></li>
               <?php } ?>
            </ul>
         </div>
      </div>
   </div>