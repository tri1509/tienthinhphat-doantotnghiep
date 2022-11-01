<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });
    $ps = new post();
    if(isset($_GET['postid']) && $_GET['postid']!=NULL){
        $id = $_GET['postid'];
    }
    $get_post = $ps -> get_post($id);
    if($get_post){
        while($get_title = $get_post -> fetch_assoc()){
            $title = $get_title['baiviet_name'];
    }}
    include 'inc/header.php';
    include 'inc/sale.php';
?>
<div class="container">
  <div class="cart_background">
    <div class="row">
      <?php 
      $get_post = $ps -> get_post($id);
        if($get_post){
          while($result = $get_post -> fetch_assoc()){
      ?>
      <div class="col-12">
        <div class="mota_baiviet">
          <div class="ten_baiviet text-center"><?php echo $result['baiviet_name'] ; ?></div>
          <div class="clear20"></div>
          <div class="info_tintuc text-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:12px;">
              <path
                d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
            </svg>
            <span class="ngaytao">
              <?php echo $result['baiviet_date'] ; ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width:15px;">
                <path
                  d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
              </svg>
              <?php echo $result['baiviet_luotxem'] ; ?>
            </span>
          </div>
          <div class="clear20"></div>
          <div class="mota"></div>
        </div>
        <div class="content_text">
          <?php 
          echo $result['baiviet_noidung'] ; 
          ?>
        </div>
      </div>
      <?php }} ?>
    </div>
  </div>
  <div class="clear40"></div>
  <h2 class="cactinkhac">Tin liên quan :</h2>
  <ul>
    <li>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-return-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
      </svg>
      <a href="gioithieu.html" title="Giới Thiệu Công Ty SX TM XNK  NGK TIẾN THINH PHÁT  ">
        Giới Thiệu Công Ty SX TM XNK NGK TIẾN THINH PHÁT
        <span>(29/6/2022)</span>
      </a>
    </li>
    <li>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-return-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
      </svg>
      <a href="gioithieu.html" title="CHÍNH SÁCH CHO ĐẠI LÝ BÁN HÀNG">
        CHÍNH SÁCH MUA HÀNG & THANH TOÁN
        <span>(26/07/2022)</span>
      </a>
    </li>
  </ul>
</div>
<?php include 'inc/footer.php';?>