<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../classes/customer.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    $cs = new customer();
    if(isset($_GET['customerid']) && $_GET['customerid']!=NULL){
        $id = $_GET['customerid'];
    }
?>
<?php  ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa danh mục</h2>
    <div class="block copyblock">
      <?php
          $get_customer = $cs ->show_customer($id);
          if($get_customer){
              while($result = $get_customer->fetch_assoc()){

      ?>
      <form action="" method="post">
        <table class="form">
          <tr>
            <td>Tên</td>
            <td>:</td>
            <td>
              <input type="text" readonly="readonly" placeholder="" class="medium" name="catName"
                value="<?php echo $result['name'] ?>" />
            </td>
          </tr>

          <tr>
            <td>Địa chỉ</td>
            <td>:</td>
            <td>
              <input type="text" readonly="readonly" placeholder="" class="medium" name="catName"
                value="<?php echo $result['address'] ?>" />
            </td>
          </tr>

          <tr>
            <td>Số điện thoại</td>
            <td>:</td>
            <td>
              <input type="text" readonly="readonly" placeholder="" class="medium" name="catName"
                value="<?php echo $result['zipcode'] ?>" />
            </td>
          </tr>

          <tr>
            <td>Email</td>
            <td>:</td>
            <td>
              <input type="text" readonly="readonly" placeholder="" class="medium" name="catName"
                value="<?php echo $result['email'] ?>" />
            </td>
          </tr>

        </table>
      </form>
      <?php }}?>
    </div>
  </div>
</div>
<?php include 'inc/footer.php';?>