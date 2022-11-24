<?php 
  $title = "Kiểm tra giỏ hàng";
  include 'inc/header.php' ;
  include 'inc/sale.php' ;

  if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
  $customer_id = Session::get('customer_id');
    $insertOrder = $ct -> insertOrder($customer_id);
  $delCart = $ct -> del_all_data_cart();
  header('Location:success.html');
  }
?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xl-8 phanchia">
        <div class="clear20"></div>
        <h2>Kiểm tra giỏ hàng</h2>
        <div class="clear20"></div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Giá</th>
              <th scope="col">SL</th>
              <th scope="col">Tổng</th>
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
            <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $result['productName'] ?></td>
              <td><?php echo number_format($result['price'])." ₫"  ?></td>
              <td><?php echo $result['quantity'] ?></td>
              <td><?php echo number_format($total)." ₫"; ?></td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
        <table style="float:right;text-align:right;" width="40%">
          <tr>
            <div class="clear40"></div>
            <h3 class="nomargin bold clredt">Tổng tiền thanh toán</h3>
            <div class="clear20"></div>
            <h4 class="nomargin bold clred">
              <?php 
							echo number_format($gtotal).' ₫';
						?>
            </h4>
            <div class="clear20"></div>
        </table>
      </div>

      <div class="col-xl-4">
        <div class="clear20"></div>
        <h2>Thông tin khách hàng</h2>
        <div class="clear20"></div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Khách hàng</th>
              <th scope="col">Thông tin</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  $id = Session::get('customer_id');
                  $get_customer = $cs -> show_customer($id);
                  if($get_customer) {
                        while($result = $get_customer -> fetch_assoc()){
            ?>
            <tr>
              <th scope="row">1</th>
              <td>Tên khách hàng</td>
              <td colspan="2"><?php echo $result['name'] ?></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Địa chỉ</td>
              <td colspan="2"><?php echo $result['address'] ?></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Số điện thoại</td>
              <td colspan="2"><?php echo $result['zipcode'] ; ?></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Email</td>
              <td colspan="2"><?php echo $result['email'] ?></td>
            </tr>
            <tr>
              <td colspan="3" align="center"><a href="editprofile.php" class="dhn">Chỉnh sửa</a></td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
      <div class="clear40"></div>
      <div class="order"><a href="offline.html?orderid=order"><button class="custom-btn btn-7"><span>Đặt hàng
              ngay</span></button></a></div>
      <div class="clear40"></div>
    </div>
  </div>
</section>
<?php include 'inc/footer.php' ;?>