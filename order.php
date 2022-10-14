<?php
	$title = "Thanh toán";
	include 'inc/header.php';
	include 'inc/sale.php' ;
?>
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$insertCustomer = $cs->insert_customer_order($_POST);
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct -> insertOrder_offline($customer_id);
		$delCart = $ct -> del_all_data_cart();
		header('Location:success.html');
	}
	
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct -> insertOrder($customer_id);
		$delCart = $ct -> del_all_data_cart();
		header('Location:success.html');
	}
?>
<section>
  <div class="main-breac">
    <div class="container">
      <span><a href="./" class="clblack">Trang chủ</a></span>
      <span style="margin: 0 7px;">
        <img src="./img/back.png" alt="" style="transform: rotate(180deg);" width="18">
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
              <div class="form-row clearfix">
                <div class="form-col fl-left">
                  <label for="fullname">Họ tên</label>
                  <input readonly="readonly" type="text" name="name" id="fullname"
                    value="<?php echo $result['name'] ?>">
                </div>
                <div class="form-col fl-right">
                  <label for="email">Email</label>
                  <input readonly="readonly" type="email" name="email" id="email"
                    value="<?php echo $result['email'] ?>">
                </div>
              </div>
              <div class="form-row clearfix">
                <div class="form-col fl-left">
                  <label for="address">Địa chỉ</label>
                  <input readonly="readonly" type="text" name="address" id="address"
                    value="<?php echo $result['address'] ?>">
                </div>
                <div class="form-col fl-right">
                  <label for="phone">Số điện thoại</label>
                  <input readonly="readonly" type="tel" name="zipcode" id="phone"
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
								$get_product_cart = $ct -> get_product_cart();
								$subTotal = 0;
								$total = 0;
								$gtotal = 0;
								$qty = 0;
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
              <a href="order.html?orderid=order"><button class="custom-btn btn-7" type="button"><span>Đặt
                    hàng</span></button></a>
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
						} 
                        ?>
          <div class="section-detail">
            <form method="POST" action="" name="form-checkout">
              <div class="form-row clearfix">
                <div class="form-col fl-left">
                  <label for="fullname">Họ tên</label>
                  <input type="text" name="name" id="fullname" required>
                </div>
                <div class="form-col fl-right">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" required>
                </div>
              </div>
              <div class="form-row clearfix">
                <div class="form-col fl-left">
                  <label for="address">Địa chỉ</label>
                  <input type="text" name="address" id="address" required>
                  <i class="i_color"># Bạn ghi rõ thành phố, quận/ huyện để shop tiện giao hàng nhé !!! Tránh trường hợp
                    giao hàng sai địa chỉ !!!</i>
                </div>
                <div class="form-col fl-right">
                  <label for="phone">Số điện thoại</label>
                  <input type="tel" name="zipcode" id="phone" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-col">
                  <label for="notes">Ghi chú</label>
                  <textarea name="password" required></textarea>
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
                <tr>
                  <td>Sản phẩm</td>
                  <td>Tổng</td>
                </tr>
              </thead>
              <tbody>
                <?php
								$get_product_cart = $ct -> get_product_cart();
								$subTotal = 0;
								$total = 0;
								$gtotal = 0;
								$qty = 0;
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
              <input type="submit" id="order-now" value="Đặt hàng" name="submit">
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