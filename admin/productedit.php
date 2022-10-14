<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
	$pd = new product();	
    if(isset($_GET['productid']) && $_GET['productid']!=NULL){
        $id = $_GET['productid'];
    }
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$updateProduct = $pd->update_product($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa sản phẩm</h2>
    <div class="block">
      <?php 
          if(isset($updateProduct)){echo $updateProduct ;}
      ?>
      <?php
          $get_product_by_id = $pd->getproductbyId($id);
          if($get_product_by_id){
              while($result_product = $get_product_by_id->fetch_assoc()){

      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Tên sản phẩm</label>
            </td>
            <td>
              <input type="text" value="<?php echo $result_product['sanpham_name'] ?>" class="medium"
                name="productName" />
            </td>
          </tr>
          <tr>
            <td>
              <label>Danh mục</label>
            </td>
            <td>
              <select id="select" name="category">
                <option>-----Chọn danh mục-----</option>
                <?php 
                    $cat = new category();
                    $catList = $cat -> show_category();
                    if($catList){
                        while($result = $catList ->fetch_assoc() ){
                    
                ?>
                <option <?php 
                  if($result['category_id'] == $result_product['category_id']) {
                      echo "selected";
                  }
                ?> value="<?php echo $result['category_id'] ?>">
                  <?php echo $result['category_name'] ?>
                </option>
                <?php } } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label>Thương hiệu</label>
            </td>
            <td>
              <select id="select" name="brand">
                <option>-----Chọn thương hiệu-----</option>
                <?php 
                    $brand = new brand();
                    $brandList = $brand -> show_brand();
                    if($brandList){
                        while($result = $brandList ->fetch_assoc() ){
                    
                ?>
                <option <?php 
                            if($result['brand_id'] == $result_product['brand_id']) {
                                echo "selected";
                            }
                        ?> value="<?php echo $result['brand_id'] ?>">
                  <?php echo $result['brand_name'] ?>
                </option>
                <?php } } ?>
              </select>
            </td>
          </tr>

          <tr>
            <td>
              <label>Loại</label>
            </td>
            <td>
              <select id="select" name="type">
                <option>-----Chọn loại-----</option>

                <option value="1">Đường phèn</option>
                <option value="2">Nhân sâm</option>
                <option value="3">Đông trùng</option>
                <option value="4">Hạt chia</option>
                <option value="5">Không đường</option>
                <option value="6">Táo đỏ</option>
                <option value="7">Saffron</option>
                <option value="8">KIDS</option>
              </select>
            </td>
          </tr>

          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Mô tả</label>
            </td>
            <td>
              <textarea class="tinymce" name="product_desc"><?php echo $result_product['sanpham_chitiet'] ?></textarea>
            </td>
          </tr>

          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Mô tả</label>
            </td>
            <td>
              <textarea class="tinymce" name="product_mota"><?php echo $result_product['sanpham_mota'] ?></textarea>
            </td>
          </tr>

          <tr>
            <td>
              <label>Giá cũ</label>
            </td>
            <td>
              <input type="text" value="<?php echo $result_product['sanpham_gia'] ?>" class="medium" name="price_old" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Giá mới</label>
            </td>
            <td>
              <input type="text" value="<?php echo $result_product['sanpham_giakhuyenmai'] ?>" class="medium"
                name="price_new" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Sô lượng</label>
            </td>
            <td>
              <input type="text" value="<?php echo $result_product['sanpham_soluong'] ?>" class="medium"
                name="quantity" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Tải ảnh lên</label>
            </td>
            <td>
              <img src="../img/<?php echo $result_product['hinh'] ?>" alt="" width='150' height='120'><br>
              <input type="file" name="img" />
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input type="submit" name="submit" Value="Cập nhật" />
            </td>
          </tr>
        </table>
      </form>
      <?php } } ?>
    </div>
  </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  setupTinyMCE();
  setDatePicker('date-picker');
  $('input[type="checkbox"]').fancybutton();
  $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>