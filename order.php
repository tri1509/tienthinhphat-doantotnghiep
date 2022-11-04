<?php
	$title = "Thanh toán";
	include 'inc/header.php';
	include 'inc/sale.php' ;
?>
<?php
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
    if(!empty($_POST['password'])) {
      $password = $_POST['password'];
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
      $insertCustomer = $cs->insert_customer_order($_POST);
      $customer_id = Session::get('customer_id');
      $insertOrder = $ct -> insertOrder_offline($customer_id);
      $delCart = $ct -> del_all_data_cart();
      header('Location:success.html');
    }
	}
	
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct -> insertOrder($customer_id);
		$delCart = $ct -> del_all_data_cart();
		header('Location:success.html');
	}

  $get_product_cart = $ct -> get_product_cart();
  $subTotal = 0;
  $total = 0;
  $gtotal = 0;
  $qty = 0;
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
      <span class="clpink">Thanh toán</span>
    </div>
  </div>
  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
      <div id="wrapper" class="wp-inner clearfix">
        <?php 
        $login_check = Session::get('customer_login');
        if($login_check) {
      ?>
        <div class="section" id="customer-info-wp">
          <div class="section-head">
            <h1 class="section-title">Thông tin khách hàng</h1>
          </div>
          <form method="POST" action="" name="form-checkout">
            <div class="section-detail">
              <?php 
						$id = Session::get('customer_id');
						$get_customer = $cs -> show_customer($id);
						if($get_customer) {
							while($result = $get_customer -> fetch_assoc()){
						?>
              <div class="form-label-group">
                <label for="fullname">Họ tên</label>
                <input class="form-control" readonly="readonly" type="text" name="name" id="fullname"
                  value="<?php echo $result['name'] ?>">
              </div>
              <div class="form-label-group">
                <label for="email">Email</label>
                <input class="form-control" readonly="readonly" type="email" name="email" id="email"
                  value="<?php echo $result['email'] ?>">
              </div>
              <div class="form-row clearfix">
                <div class="form-label-group">
                  <label for="address">Địa chỉ</label>
                  <input class="form-control" readonly="readonly" type="text" name="address" id="address"
                    value="<?php echo $result['address'] ?>">
                </div>
                <div class="form-label-group">
                  <label for="phone">Số điện thoại</label>
                  <input class="form-control" readonly="readonly" type="tel" name="zipcode" id="phone"
                    value="<?php echo $result['zipcode'] ?>">
                </div>
              </div>
              <a href="profile.php" style="margin-left:30px; color:chocolate;">Chỉnh sửa thông tin</a>
              <?php } } ?>
            </div>
        </div>
        <div class="section" id="order-review-wp">
          <div class="section-head">
            <h1 class="section-title">Thông tin đơn hàng</h1>
          </div>
          <div class="section-detail">
            <table class="shop-table">
              <thead>
                <tr>
                  <td>Sản phẩm</td>
                  <td>Tổng</td>
                </tr>
              </thead>
              <tbody>
                <?php
								if($get_product_cart){
								$i = 0;
								while($result = $get_product_cart -> fetch_assoc()){
									$total = $result['price'] * $result['quantity'];
									$qty = $qty + $result['quantity'];
									$subTotal += $total ;
									$gtotal = $subTotal;
								$i++;
							?>
                <tr class="cart-item">
                  <td class="product-name"><?php echo $result['productName'] ?><strong class="product-quantity">x
                      <?php echo $result['quantity'] ?></strong></td>
                  <td class="product-total"><?php echo number_format($total)." ₫"; ?></td>
                </tr>
                <?php }} ?>
              </tbody>
              <tfoot>
                <tr class="order-total">
                  <td>Tổng đơn hàng:</td>
                  <td><strong class="total-price"><?php echo number_format($gtotal).' ₫'; ?></strong></td>
                </tr>
              </tfoot>
            </table>
            <div class="place-order-wp clearfix">
              <a href="order.html?orderid=order">
                <button class="btn btn-danger" type="button">
                  Đặt hàng
                </button>
              </a>
            </div>
            <div class="clear40"></div>
            </form>
          </div>
        </div>
        <?php }else{ ?>
        <div class="section" id="customer-info-wp">
          <div class="section-head">
            <h1 class="section-title">Thông tin khách hàng</h1>
          </div>
          <?php
						if(isset($insertCustomer))
						{echo $insertCustomer;}
					else{
						echo "<div class='clear20'></div>";
						} ?>
          <div class="section-detail">
            <form method="POST" action="" name="form-checkout">
              <div class="form-label-group">
                <label for="fullname">Họ tên</label>
                <input value="<?php if(!empty($name)){echo $name;}?>" class="form-control" type="text" name="name"
                  id="fullname">
                <span style="color:red;font-size:12px">
                  <?php
                      if(!empty($error['name'])) {
                        echo $error['name'];
                      }else{echo "<div class='clear10'></div>";} 
                    ?>
                </span>
              </div>
              <div class="form-label-group">
                <label for="email">Email</label>
                <input value="<?php if(!empty($email)){echo $email;}?>" class="form-control" type="email" name="email"
                  id="email">
                <span style="color:red;font-size:12px">
                  <?php
                      if(!empty($error['email'])) {
                        echo $error['email'];
                      }else{echo "<div class='clear10'></div>";} 
                    ?>
                </span>
              </div>
              <div class="form-label-group">
                <label for="address">Địa chỉ</label>
                <input value="<?php if(!empty($address)){echo $address;}?>" class="form-control" type="text"
                  name="address" id="address">
                <span style="color:red;font-size:12px">
                  <?php
                      if(!empty($error['address'])) {
                        echo $error['address'];
                      }else{echo "<div class='clear10'></div>";} 
                    ?>
                  <i class="i_color"># Bạn ghi rõ thành phố, quận/ huyện để shop tiện giao hàng nhé !!!
                    Tránh
                    trường hợp giao hàng sai địa chỉ !!!</i>
                </span>
              </div>
              <div class="form-label-group">
                <label for="phone">Số điện thoại</label>
                <input value="<?php if(!empty($phone)){echo $phone;}?>" class="form-control" type="tel" name="zipcode"
                  id="phone">
                <span style="color:red;font-size:12px">
                  <?php
                      if(!empty($error['phone'])) {
                        echo $error['phone'];
                      }else{echo "<div class='clear10'></div>";} 
                    ?>
                </span>
              </div>
              <div class="form-label-group">
                <div class="form-label-group">
                  <label for="notes">Ghi chú</label>
                  <textarea class="form-control" name="password"></textarea>
                </div>
              </div>
          </div>
        </div>
        <div class="section" id="order-review-wp">
          <div class="section-head">
            <h1 class="section-title">Thông tin đơn hàng</h1>
          </div>
          <div class="section-detail">
            <table class="shop-table">
              <thead>
                <tr class="bold">
                  <td>Sản phẩm</td>
                  <td>Tổng</td>
                </tr>
              </thead>
              <tbody>
                <?php
								if($get_product_cart){
								$i = 0;
								while($result = $get_product_cart -> fetch_assoc()){
									$total = $result['price'] * $result['quantity'];
									$qty = $qty + $result['quantity'];
									$subTotal += $total ;
									$gtotal = $subTotal;
								$i++;
							?>
                <tr class="cart-item">
                  <td class="product-name"><?php echo $result['productName'] ?><strong class="product-quantity">x
                      <?php echo $result['quantity'] ?></strong></td>
                  <td class="product-total"><?php echo number_format($total)." ₫"; ?></td>
                </tr>
                <?php }} ?>
              </tbody>
              <tfoot>
                <tr class="order-total">
                  <td><span class="bold">Tổng đơn hàng:</span></td>
                  <td>
                    <strong class="total-price">
                      <span class="bold">
                        <?php echo number_format($gtotal).' ₫'; ?>
                      </span>
                    </strong>
                  </td>
                </tr>
              </tfoot>
            </table>
            <div class="place-order-wp clearfix">
              <input type="submit" id="order-now" value="Đặt hàng" name="submit" class="btn btn-danger">
            </div>
            </form>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php include 'inc/footer.php' ;?>