<?php   

	$title = "Thông tin của bạn";
    include 'inc/header.php'; 
    include 'inc/sale.php';

    $login_check = Session::get('customer_login');
	if($login_check ==false) {
		header('Location:login.php');
	}
?>

<section>
  <div class="main-breac">
    <div class="container">
      <span><a href="./" class="clblack">Trang chủ</a></span>
      <span style="margin: 0 7px;">
        <img src="./img/back.png" alt="" style="transform: rotate(180deg);" width="18">
      </span>
      <span class="clpink">Thông tin khách hàng</span>
      <div class="clear20"></div>
      <table class="table table-hover profile-tabel">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Danh sách</th>
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
            <td colspan="3" align="center">
              <a href="editprofile.php">
                <button class="custom-btn btn-7"><span>Chỉnh sửa</span></button>
              </a>
            </td>
          </tr>
          <?php }} ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="main-wraper">
    <div class="clear20"></div>
    <div class="container">
    </div>
  </div>
</section>


<?php include 'inc/footer.php' ;?>