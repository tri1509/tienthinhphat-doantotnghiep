<?php
  $title = "Đăng ký tài khoản salanest.";
	include 'inc/header.php';
  include 'inc/sale.php';
?>
<?php
// đăng ký
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $error = array();
    $alert = array();
    if(empty($_POST['name'])) {
      $error['name'] = "Không được để trống tên đăng nhập";
    }else{
      $name = $_POST['name'];
    }
    if(empty($_POST['zipcode'])) {
      $error['phone'] = "Không được để trống số điện thoại";
    }else{
      $phone = $_POST['zipcode'];
    }
    if(empty($_POST['address'])) {
      $error['address'] = "Bạn vui lòng điền địa chỉ";
    }else{
      $address = $_POST['address'];
    }
    if(empty($_POST['password'])) {
      $error['password'] = "Không được để trống mật khẩu";
    }else{
      $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';
      if(!preg_match($pattern,$_POST['password'])){
        $error['password'] = "Bạn vui lòng đặt mật khẩu phức tạp hơn";
      }else{
        $password = md5($_POST['password']);
      }
    }
    if(empty($_POST['email'])) {
      $error['email'] = "Không được để trống email";
    }else{
      $pattern = '/^[A-Za-z0-9_.]{2,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
      if(!preg_match($pattern,$_POST['email'])){
        $error['email'] = "email không đúng định dạng";
      }else{
        $email = $_POST['email'];
      }
    }
    if(empty($error)){
      $data = array(
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'address' => $address,
        'phone' => $phone,
      );
      $insertCustomer = $cs->insert_customer($data);
    }
  }
?>
<div id="form_login">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <section class="">
          <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
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
                  <p><img src="img/ttp.png" alt="logo" class="fullwidth"></p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                  <div class="card text-center">
                    <div class='clear20'></div>
                    <h5 class="color_login">Đăng Ký</h5>
                    <div class="card-body py-5 px-md-5">
                      <?php
                        if(isset($insertCustomer)){echo $insertCustomer;}
                        else{echo "<div class='clear20'></div>";} 
                      ?>
                      <div class="information-wrapper">
                        <form action="" method="post">
                          <div class="form-label-group">
                            <label for="inputUserame">Tên Đăng Nhập & Tài Khoản</label>
                            <input value="<?php if(!empty($name)){echo $name;}?>" name="name" type="text"
                              id="inputUserame" class="form-control" placeholder="Tên Đăng Nhập & Tài Khoản" autofocus>
                            <span style="color:red;font-size:12px">
                              <?php
                                if(!empty($error['name'])) {
                                  echo $error['name'];
                                }else{echo "<div class='clear20'></div>";} 
                              ?>
                            </span>
                          </div>

                          <div class="form-label-group">
                            <label for="inputEmail">Email</label>
                            <input value="<?php if(!empty($email)){echo $email;}?>" name="email" type="email"
                              id="inputEmail" class="form-control" placeholder="Email">
                            <span style="color:red;font-size:12px">
                              <?php
                                if(!empty($error['email'])) {
                                  echo $error['email'];
                                }else{echo "<div class='clear20'></div>";} 
                              ?>
                            </span>
                          </div>

                          <div class="form-label-group">
                            <label for="inputEmail">Số điện thoại</label>
                            <input name="zipcode" type="text" id="inputEmail" class="form-control" placeholder="sdt"
                              value="<?php if(!empty($phone)){echo $phone;}?>">
                            <span style="color:red;font-size:12px">
                              <?php
                                if(!empty($error['phone'])) {
                                  echo $error['phone'];
                                }else{echo "<div class='clear20'></div>";} 
                              ?>
                            </span>
                          </div>

                          <div class="form-label-group">
                            <label for="inputEmail">Địa Chỉ Đặt Hàng & Giao Hàng</label>
                            <input value="<?php if(!empty($address)){echo $address;}?>" type="text" class="form-control"
                              placeholder="Địa chỉ" name="address">
                            <span style="color:red;font-size:12px">
                              <?php
                                if(!empty($error['address'])) {
                                  echo $error['address'];
                                }else{echo "<div class='clear20'></div>";} 
                              ?>
                              <i class="i_color"># Bạn ghi rõ thành phố, quận/ huyện để shop tiện giao hàng nhé !!!
                                Tránh
                                trường hợp giao hàng sai địa chỉ !!!</i>
                            </span>
                          </div>

                          <div class="form-label-group position-relative">
                            <label for="inputPassword">Password</label>
                            <input name="password" type="password" id="inputPassword"
                              class="form-control toggle-pass-focus" placeholder="Password">
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
                          </div>

                          <div class="form-label-group position-relative">
                            <label for="inputPassword2">Nhập Lại password</label>
                            <input type="password" id="inputPassword2" class="form-control toggle-pass-focus"
                              placeholder="Password">
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
                            <span style="color:red;font-size:12px">
                              <?php
                                if(!empty($error['password'])) {
                                  echo $error['password'];
                                }else{echo "<div class='clear20'></div>";} 
                              ?>
                            </span>
                            <span id="thongbao"></span>
                          </div>
                          <input disabled name="submit" id="dangky"
                            class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Đăng Ký"
                            style="	border-radius: 10px;">
                          <a class="d-block text-center mt-2 small" href="login.html" style="font-size:20px">Đăng
                            Nhập</a>
                          <hr class="my-4">
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
<?php include 'inc/footer.php';?>