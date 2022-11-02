<?php 
    $title = "SALANEST-Đơn hàng ";
    include 'inc/header.php' ;
    include 'inc/sale.php' ;

    $ct = new cart();
    if(isset($_GET['comfirmid'])){
		$id = $_GET['comfirmid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shifted_comfirm = $ct -> shifted_comfirm($id,$time,$price);
	}

    if(isset($_GET['huydon'])){
		$id = $_GET['huydon'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$huydon = $ct -> huydon($id,$time,$price);
	}
?>
<section>
  <div class="main-breac">
    <div class="container">
      <span><a href="./" class="clblack">Trang chủ</a></span>
      <span style="margin: 0 7px;"><i class="fas fa-angle-right"></i></span>
      <span class="clpink">Đơn hàng của bạn</span>
    </div>
  </div>
  <?php
    if($check_order) {
    ?>
  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
      <div class="bang-giohang">
        <h3 class="nomargin bold clred">Đơn hàng</h3>
        <div class='clear20'></div>
        <form action="" method="POST">
          <table>
            <tr class="hide480">
              <th>STT</th>
              <th width='200'>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Giá tổng</th>
              <th>Ngày đặt</th>
              <th>Tình trạng</th>
              <th>Huỷ đơn</th>
            </tr>
            <?php
						$customer_id = Session::get('customer_id');
                        $get_cart_ordered = $ct -> get_cart_ordered($customer_id);
                        if($get_cart_ordered){
                            $i = 0;
                        while($result = $get_cart_ordered -> fetch_assoc()){
                            $i ++ ;
                            $total = $result['price'] * $result['quantity'];
						?>
            <tr>
              <td><?php echo $i ?></td>
              <td>
                <p><?php echo $result['productName'] ?></p>
              </td>
              <td data-label="số lượng :"><?php echo $result['quantity'] ?></td>
              <td data-label="Giá :">
                <p><?php echo number_format($result['price'])."đ"  ?></p>
              </td>
              <td data-label="giá tổng :">
                <p><?php echo number_format($total)."đ"; ?></p>
              </td>
              <td data-label="ngày:"><?php echo $result['date_order'] ?></td>
              <td data-label="tình trạng :">
                <?php if($result['status'] == 0){ ?>
                Đang chờ duyệt
                <div class="dots-loading">
                  <div style="--delay: 1s"></div>
                  <div style="--delay: 2s"></div>
                  <div style="--delay: 3s"></div>
                  <div style="--delay: 4s"></div>
                </div>
                <?php }elseif($result['status'] == 1){ ?>
                Đang vận chuyển hàng
                <div class="dots-loading">
                  <div style="--delay: 1s"></div>
                  <div style="--delay: 2s"></div>
                  <div style="--delay: 3s"></div>
                  <div style="--delay: 4s"></div>
                </div>
                <hr>
                <a
                  href="donhang.html?comfirmid=<?php echo $customer_id?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Tôi
                  đã nhận được hàng</a>
                <?php }else{ echo "Cảm ơn Quý Khách"; } ?>
              </td>
              <td>
                <?php if($result['status'] == 1 || $result['status'] == 2){ ?>
                <p class="kohuyhon">Huỷ đơn</p>
              </td>
              <?php }elseif($result['status'] == 3){ ?>
              Đang chờ huỷ...
              <?php }else { ?>
              <a href="donhang.html?huydon=<?php echo $customer_id?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>"
                onclick="return confirm('Bạn có muốn huỷ đơn hàng này không?')" class="clred">Huỷ đơn</a></td>
              <?php } ?>
            </tr>
            <?php }} ?>
          </table>
        </form>
        <div class="clear40"></div>
        <div class="shopping">
          <div class="shopleft">
            <a href="sanpham.html">
              <button class="btn btn-warning shopleft-btn">
                Quay lại cửa hàng
              </button>
            </a>
          </div>
        </div>
        <div class="clear40"></div>
      </div>
    </div>
  </div>

  <?php }else{ ?>

  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
      Bạn chưa đặt hàng, mời bạn về trang chủ để mua sản phẩm.
      <div class="clear40"></div>
      <div class="shopping">
        <div class="shopleft">
          <a href="sanpham.html"><button class="btn btn-warning shopleft-btn">Quay lại cửa hàng</button></a>
        </div>
      </div>
      <div class="clear40"></div>
    </div>
  </div>
  <?php } ?>
</section>
<?php include 'inc/footer.php' ;?>
<style>
.kohuyhon {
  color: #ccc;
}

.dots-loading {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0 2px;
}

.dots-loading div {
  width: 4px;
  height: 4px;
  border-radius: 100rem;
  background-color: #000000;
  animation: stagger 0.5s infinite cubic-bezier(0.25, 0.46, 0.45, 0.94) alternate;
  animation-delay: calc(-1 * (0.5 / 4) * var(--delay));
}

@keyframes stagger {
  0% {
    transform: translateY(0);
  }

  50%,
  100% {
    transform: translateY(5px);
  }
}
</style>