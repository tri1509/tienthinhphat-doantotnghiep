<?php
    $title = "Chỉnh sửa thông tin";
    include 'inc/header.php'; 
    include 'inc/sale.php';

  $login_check = Session::get('customer_login');
	if($login_check == false) {
		header('Location:login.php');
	}

  $id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
		$updateCustomers = $cs -> update_Customers($_POST,$id);
	}
?>

<section>
  <div class="main-breac">
    <div class="container">
      <span><a href="./" class="clblack">Trang chủ</a></span>
      <span style="margin: 0 7px;">
        <img src="./img/back.png" alt="" style="transform: rotate(180deg);" width="18">
      </span>
      <span class="clpink">Thông tin khách hàng</span><br>
      <?php if(isset($updateCustomers)) { ?>
      <div class="modal-thanhtoan" id="close-modal">
        <div class="hinhthuc-thanhtoan">
          <div class="close-act" id="close-modal"></div>
          <?php echo $updateCustomers ?>
          <p class="message_box">
            <a href="profile.php">
              <button type="button" class="btn btn-info message_box-btn bold">
                trở về
              </button>
            </a>
          </p>
        </div>
      </div>
      <?php }else{ echo "<div class='clear20'></div>"; }?>
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
          <form action="" method="post">
            <tr>
              <th scope="row">1</th>
              <td>Tên khách hàng</td>
              <td><input type="text" name="name" id="" value="<?php echo $result['name'] ?>" class="editprofile"></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Địa chỉ</td>
              <td><input type="text" name="address" id="" value="<?php echo $result['address'] ?>" class="editprofile">
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Số điện thoại</td>
              <td><input type="text" name="zipcode" id="" value="<?php echo $result['zipcode'] ?>" class="editprofile">
              </td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Email</td>
              <td><input type="text" name="email" id="" value="<?php echo $result['email'] ?>" class="editprofile"></td>
            </tr>
            <tr>
              <td colspan="3" align="center">
                <a href="profile.php" style="margin-right:20px" class="btn btn-warning shopleft-btn">Trở về</a>
                <input type="submit" value="Cập nhật" name="save" class="btn btn-warning shopleft-btn"><br>
              </td>
            </tr>
          </form>
          <?php }} ?>
        </tbody>
      </table>
    </div>
  </div>
</section>


<?php include 'inc/footer.php' ;?>