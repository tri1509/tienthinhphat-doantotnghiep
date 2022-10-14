<?php 
	$title = "Đặt hàng";
    include 'inc/header.php' ;
    include 'inc/sale.php';

    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
        $insertOrder = $ct -> insertOrder($customer_id);
		$delCart = $ct -> del_all_data_cart();
		header('Location:success.html');
    }
?>

<?php
	$customer_id = Session::get('customer_id');
    $get_amount = $ct -> getAmountPrice($customer_id);
    if($get_amount) {
        $amount = 0;
        while($result = $get_amount -> fetch_assoc()) {
        $price =  $result['price'] * $result['quantity'];
        $amount += $price;
        $date = $result ['date_order'];
        }
    }
    
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
            <div class="clear20"></div>
            
        </div>
    </div>
</section>
<div class="container">
	<div class="row flex-order">
		<div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-xs-12 order-lg-2 order-md-1 order-1">
			<h4 class="nomargin text-uppercase clredt text-success">Đặt Hàng Thành Công</h4><br>
            <div class="clear20"></div>
			<div class="shopping">
				<div class="shopleft">
					<a href="donhang.html"><button class="custom-btn btn-7"><span>Xem đơn hàng</span></button></a>
				</div>
			</div>
			<div class="clear20"></div>
            <p>* Đơn hàng của bạn sẽ được giao trong thời gian sớm nhất</p>
			<div class="clear20"></div>
            <div class="m-8 row_buy">
                <table class="table table-bordered table-light ">
                    <thead>
                        <tr>
                            <th>Giá</th>
                            <th>Thời Gian</th>
                            <th><a href="index.html" title="Về Trang Chủ">Trở Về</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo number_format($amount) ." đồng"  ; ?></td>
                            <td><?php  echo $date; ?></td>
                            <td> <h2 class="text-success">Đang cập nhật và xử lý ...</h2></td>
                        </tr>
                    </tbody>
                </table>
   
            </div> 
            <div id="wraper">
               <div class="tabs">
                  <ul class="nav-tabs">
                     <li class="active"><a href="#menu_1">HƯỚNG DẪN ĐƠN HÀNG  & THANH TOÁN</a></li>
                     <li><a href="#menu_2">LỊCH SỬ MUA HÀNG.</a></li>
                  </ul>
                  <div class="tab-content">
                     <div id="menu_1" class="tab-content-item">
                        <h2 class="text-success" >[Đơn hàng] Tôi phải làm gì nếu đơn hàng bị cập nhật sai trạng thái/chưa nhận được hàng?</h2>
                        <p>* Sau khi kiểm tra tình trạng đơn hàng, nếu đơn hàng của bạn gặp phải 1 trong các tình huống sau:</p>
                        <p>* Các trường hợp thường gặp: Shipper không liên hệ nhưng cập nhật người mua hẹn lại ngày giao; hoặc cập nhật trạng thái là Không liên hệ được; hoặc không liên hệ nhưng lại cập nhật đơn hàng bị sai địa chỉ nhận hàng/sai số điện thoại người nhận,...
                        <p>* Nếu đơn hàng đã được cập nhật chuyển hoàn cho Người bán: rất tiếc đơn hàng sẽ không thể tiếp tục giao lại, bạn vui lòng thao tác đặt lại đơn hàng mới.</p>
                        </p>
                        <p>Bạn không cần cung cấp bằng chứng đối với yêu cầu Trả hàng/Hoàn tiền có lý do Chưa nhận được hàng</p>
                        <p>*SaLaNest sẽ cập nhật tiến trình xử lý qua email hoặc qua mục Thông báo , Cập nhật đơn hàng trên Website:<a href="index.php" title="salanest"> SaLaNest.com</a> </p>
                        <P>*Nếu vẫn còn trong khoảng thời gian 24 giờ tính từ lúc trạng thái đơn hàng bị cập nhật sai, bạn vui lòng tiếp tục chờ để đơn vị vận chuyển giao đến bạn</P>
                        <P>Khi gặp phải các trường hợp này: bạn vui lòng đợi cuộc gọi tiếp theo từ Shipper. Shipper sẽ có 3 lần liên hệ với bạn để giao đơn hàng theo</P>
                     </div>

                     <div id="menu_2" class="tab-content-item">
                     <!-- <h2 class="nomargin text-uppercase clredt text-success">Các sản phẩm bạn đã mua</h2> -->
                        <div class="clear20"></div>
                        <table class="table table-chitiet">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">SL</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><img src="./img/<?php echo $result['img'] ?>" alt="" width='200' height='200'></td>
                                    <td><?php echo $result['productName'] ?></td>
                                    <td><?php echo number_format($result['price'])." ₫"  ?></td>
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><?php echo number_format($total)." ₫"; ?></td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                     </div>
                  </div>
               </div>

            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ;?>  
