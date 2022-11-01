<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
	$pd = new product();		
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$insertProduct = $pd->insert_product($_POST,$_FILES);
	}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Thêm sản phẩm</h2>
    <div class="block">
      <?php 
        if(isset($insertProduct)){echo $insertProduct ;}
      ?>
      <form action="productadd.php" method="post" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Tên sản phẩm</label>
            </td>
            <td>
              <input type="text" placeholder="Tên sản phẩm" class="medium" name="productName" />
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
                <option value="<?php echo $result['category_id'] ?>">
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
                <option value="<?php echo $result['brand_id'] ?>">
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
                <option value="9">Yến tinh chế</option>
                <option value="10">Yến rút lông</option>
                <option value="11">Yến thô</option>
                <option value="12">Chân yến tinh chế</option>
                <option value="13">Chân yến thô</option>
                <option value="14">Hồng yến thô</option>
                <option value="15">Ông long</option>
                <option value="16">Nước suối</option>
                <option value="17">Nước yến</option>
                <option value="18">Nước tăng lực</option>
                <option value="19">Nha đam</option>

              </select>
            </td>
          </tr>

          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Chi tiết</label>
            </td>
            <td>
              <textarea class="ckeditor" name="product_desc"></textarea>
            </td>
          </tr>

          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Mô tả</label>
            </td>
            <td>
              <textarea class="ckeditor" name="product_mota"></textarea>
            </td>
          </tr>

          <tr>
            <td>
              <label>URL</label>
            </td>
            <td>
              <input type="text" placeholder="gia-bao-duong-phen" class="medium" name="url" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Giá cũ</label>
            </td>
            <td>
              <input type="text" placeholder="Giá cũ" class="medium" name="price_old" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Giá mới</label>
            </td>
            <td>
              <input type="text" placeholder="Giá mới" class="medium" name="price_new" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Số lượng</label>
            </td>
            <td>
              <input type="text" class="medium" name="quantity" placeholder="Số lượng" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Tải ảnh lên</label>
            </td>
            <td>
              <input type="file" name="img" />
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input type="submit" name="submit" Value="Thêm vào" />
            </td>
          </tr>

        </table>
      </form>
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