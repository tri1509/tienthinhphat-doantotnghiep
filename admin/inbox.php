<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../classes/cart.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    $ct = new cart();
	if(isset($_GET['shiftid'])){
		$id = $_GET['shiftid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shifted = $ct -> shifted($id,$time,$price);
	}
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$del_shifted = $ct -> del_shifted($id,$time,$price);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
					<?php
						if(isset($shifted)) {
							echo $shifted;
						}
						if(isset($del_shifted)) {
							echo $del_shifted;
						}
					?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Thời gian đặt</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Mã KH</th>
							<th>Địa chỉ</th>
							<th>Quản lý</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart = $ct -> get_inbox_cart();
						if ($get_inbox_cart) {
							$i = 0;
							while ($result = $get_inbox_cart -> fetch_assoc()){
								$i ++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $fm -> formatDate($result['date_order']) ?></td>
							<td><?php echo $result['productName'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo number_format($result['price']) ."đ"  ?></td>
							<td><?php echo $result['customer_id'] ?></td>
							<td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">Xem</a></td>
							<td>
								<?php if($result['status'] == 0){ ?>	
									<a href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Pending</a>
								<?php }elseif($result['status'] == 1){ ?>
									Shifted...
								<?php }else{ ?>
									<a href="?delid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Remove</a>
								<?php } ?>
								
							</td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
