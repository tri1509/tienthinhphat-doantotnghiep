<?php
$title = "Giỏ hàng-quản lý đơn hàng.";
include 'inc/header-sp.php' ;?>
<?php include 'inc/sale.php' ;?>

<?php
	if(!isset($_GET['id'])) {
	// echo "<meta http-equiv='refresh' content='0;URL=giohang.html?id=live'>";
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['capnhat'])) {
		$cartId = $_POST['cartId'];
		$quantity = $_POST['quantity'];
		$update_quantity_cart = $ct -> update_quantity_cart($quantity,$cartId);
		echo "<meta http-equiv='refresh' content='0;URL=giohang.html?id=live'>";
	}
	if(isset($_GET['cartid']) && $_GET['cartid']!=NULL){
    $cartDel = $_GET['cartid'];
		$cartDel = $ct->del_cart($cartDel);
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
      <span class="clpink">Giỏ hàng</span>
    </div>
  </div>
  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
      <div class="bang-giohang">
        <h3 class="nomargin bold clred text-center">Giỏ hàng của bạn</h3>
        <?php 
					if(isset($update_quantity_cart)){ 
						echo $update_quantity_cart ; 
					}elseif(isset($cartDel)){
						echo $cartDel;
					}else{
						echo "<div class='clear40'></div>";
					}
				?>
        <?php
					$check_cart = $ct -> check_cart();
					if($check_cart){
				?>
        <form action="" method="POST">
          <table>
            <tr class="hide480">
              <th style="width: 10%;">STT</th>
              <th style="width: 20%;">Hình ảnh</th>
              <th style="width: 30%">Tên sản phẩm</th>
              <th style="width: 25%;">Số lượng</th>
              <th style="width: 20%;">Giá</th>
              <th style="width: 30%;">Giá tổng</th>
              <th style="width: 10%;">Xóa</th>
            </tr>
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
              <td><?php echo $i ?></td>
              <td><img src="./img/<?php echo $result['img'] ?>" width="120" height="120"></td>
              <td>
                <p class="bold"><?php echo $result['productName'] ?></p>
              </td>
              <td data-label="số lượng :">
                <form action="" method="post">
                  <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
                  <input type="hidden" name="price" id="price-<?php echo $result['cartId'] ?>"
                    value="<?php echo $result['price'] ?>" />
                  <input data-id="<?php echo $result['cartId'] ?>" class="cart-sl" type="number" name="quantity"
                    value="<?php echo $result['quantity'] ?>" min="1" />
                  <input class="btn btn-warning cart-up" type="submit" name="capnhat" value="Cập nhật" />
                </form>
              </td>
              <td data-label="Giá :">
                <p class="bold"><?php echo number_format($result['price'])."đ"  ?></p>
              </td>
              <td data-label="giá tổng :">
                <p id="sub-total-<?php echo $result['cartId'] ?>" class="bold">
                  <?php echo number_format($total)."đ"; ?>
                </p>
              </td>
              <td>
                <a href="giohang.html?cartid=<?php echo $result['cartId'] ?>"
                  onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" class="clred">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash"
                    viewBox="0 0 16 16">
                    <path
                      d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg>
                </a>
              </td>
            </tr>
            <?php }} ?>
          </table>
        </form>
        <table style="float:right;text-align:left;" width="40%">
          <tr>
            <div class="clear40"></div>
            <h3 class="nomargin bold clredt">Tổng tiền thanh toán</h3>
            <div class="clear20"></div>
            <h4 id="total-price" class="nomargin bold clred">
              <?php 
							echo number_format($gtotal).'vnđ';
							session::set('qty',$qty);
						?>
            </h4>
            <div class="clear20"></div>
        </table>
        <?php }else{ ?>
        <div class="container">
          <div class="row">
            <div class="col-xl-6">
              <img src="img/empty-cart.webp" alt="giỏ hàng trống" title="giỏ hàng trống" width="350">
            </div>
            <div class="col-xl-6">
              <h1 class="text-success">[Thành viên mới] Tôi có thể mua hàng Salanest mà không cần tài khoản Salanest
                không?</h1>
              .<p><strong>* Không</strong> Hiện tại, <a href="gioithieu.php" title="giới thiệu về salanest">Salanest</a>
                không hỗ trợ khách hàng đặt hàng và thanh toán cho đơn hàng <a href="gioithieu.php"
                  title="giới thiệu về công ty salanest">Salanest</a> mà không cần sử dụng tài khoản Salanest.</p>
              <p><strong>* Bạn cần</strong> <a href="dangky.php" title="Đăng ký tài khoản mua hàng">đăng ký một tài
                  khoản Salanest</a> và sử dụng để mua sắm và thanh toán đơn hàng trên Salanest. Điều này sẽ giúp
                Salanest nhận được những thông tin chính xác liên quan đến đơn hàng của bạn, ví dụ như địa chỉ nhận hàng
                hoặc phương thức thanh toán,... </p>
              <div class="clear60"></div>
              <hr>
            </div>
          </div>
        </div>
        <?php echo "<span>*Cập nhật giỏ hàng để lưu đơn hàng & xem thông tin đơn hàng.</span>";}?>
      </div>
      <div class="clear40"></div>
      <div class="shopping">
        <div class="shopleft">
          <a href="sanpham.html"><button class="btn btn-warning shopleft-btn"><span>Quay lại cửa
                hàng</span></button></a>
        </div>
        <?php if($check_cart){ ?>
        <div class="shopright">
          <a href="order.html"><button type="button" class="check-out-btn">Thanh toán</button></a>
        </div>
        <?php } ?>
      </div>
      <div class="clear40"></div>
      <?php if($check_cart){ ?>
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <h1 class="text-success">[Thành viên mới] Tôi có thể mua hàng Salanest mà không cần tài khoản Salanest
              không?</h1>
            .<p><strong>* Không</strong> Hiện tại, <a href="gioithieu.html" title="giới thiệu về salanest">Salanest</a>
              không hỗ trợ khách hàng đặt hàng và thanh toán cho đơn hàng <a href="gioithieu.html"
                title="giới thiệu về công ty salanest">Salanest</a> mà không cần sử dụng tài khoản Salanest.</p>
            <p><strong>* Bạn cần</strong> <a href="dangky.html" title="Đăng ký tài khoản mua hàng">đăng ký một tài khoản
                Salanest</a> và sử dụng để mua sắm và thanh toán đơn hàng trên Salanest. Điều này sẽ giúp Salanest nhận
              được những thông tin chính xác liên quan đến đơn hàng của bạn, ví dụ như địa chỉ nhận hàng hoặc phương
              thức thanh toán,... </p>
            <div class="clear60"></div>
            <hr>
          </div>
        </div>
      </div>
      <?php } ?>
</section>

<?php include 'inc/footer.php' ;?>