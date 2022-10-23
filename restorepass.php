<?php
  $title = "Đổi mật khẩu";
	include 'inc/header.php';
	include 'inc/sale.php';
?>
<div id="form_login">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <section class="">
          <div class="px-4 py-5 px-md-5 text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
              <div class="row gx-lg-5 align-items-center text-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                  <h1 class="my-5 display-3 fw-bold ls-tight">
                    Giới Thiệu <br>
                    <span class="text-primary">Tiến Thịnh Phát</span>
                  </h1>
                  <p style="color: hsl(217, 10%, 50.8%)">
                    Công Ty SX TM XNK NGK TIẾN THỊNH PHÁT phát triển lĩnh vực sản xuất Yến sào, Bào ngư, Vi cá. Phát
                    triển hệ thống showroom bán hàng trong cả nước và quốc tế. Định hướng phát triển thị trường năm 2020
                    đến 2025 sản phẩm yến sào thương hiệu " SALANEST " được định hình mang tầm kinh tế giá trị cao và
                    phát triển tầm khu vực và quốc tế
                  </p>
                  <p><img src="img/ttp.png" alt=""></p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                  <div class="card">
                    <div class="clear20"></div>
                    <h5 class="color_login">Khôi phục mật khẩu</h5>
                    <div class="card-body py-5 px-md-5">
                      <?php 
                        if(isset($_GET['id']) && $_GET['id']!=NULL){
                          $id = $_GET['id'];
                        }
                            // đổi mật khẩu
                                if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restorepass'])) {
                                    $restorepass = $cs->restore_Pass($_POST,$id);
                            }
                        ?>
                      <?php
                        if(isset($restorepass)){
                          echo $restorepass;
                        }else{echo "<div class='clear20'></div>";}
                        ?>
                      <div class="information-wrapper">
                        <form action="" method="post">
                          <div class="form-label-group position-relative">
                            <input name="passwordrestore" type="password" id="inputPassword"
                              class="form-control toggle-pass-focus" placeholder="Password" required autofocus>
                            <div class="toggle-pass" onclick="togglePass()">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="eye eye-open"
                                id="open">
                                <path
                                  d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="eye eye-close"
                                id="close">
                                <path
                                  d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c5.2-11.8 8-24.8 8-38.5c0-53-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zm223.1 298L373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5z" />
                              </svg>
                            </div>
                            <label for="inputPassword">Mật khẩu mới</label>
                          </div>
                          <div class="form-label-group position-relative">
                            <input name="passwordrestore" type="password" id="inputPassword2"
                              class="form-control toggle-pass-focus" placeholder="Password" required>
                            <div class="toggle-pass" onclick="togglePass2()">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="eye eye-open"
                                id="open2">
                                <path
                                  d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="eye eye-close"
                                id="close2">
                                <path
                                  d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c5.2-11.8 8-24.8 8-38.5c0-53-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zm223.1 298L373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5z" />
                              </svg>
                            </div>
                            <label for="inputPassword2">Nhập Lại mật khẩu mới</label>
                            <span id="thongbao"></span>
                          </div>
                          <input name="restorepass" id="restorepass"
                            class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Xác nhận"
                            style="border-radius: 10px;">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<script>

</script>
<?php 	include 'inc/footer.php';?>