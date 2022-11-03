<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php';?>
<?php
	$ps = new post();
  if(isset($_GET['postid']) && $_GET['postid']!=NULL){
        $id = $_GET['postid'];
    }
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$updatepost = $ps->update_post($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa sản phẩm</h2>
    <div class="block">
      <?php 
          if(isset($updatepost)){echo $updatepost ;}
      ?>
      <?php
          $get_post_by_id = $ps->getpostbyId($id);
          if($get_post_by_id){
              while($result_post = $get_post_by_id->fetch_assoc()){

      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Tên bài viết</label>
            </td>
            <td>
              <input type="text" placeholder="Tên bài viết" class="medium" name="baiviet_name"
                value="<?php echo $result_post['baiviet_name'] ?>" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Tiêu đề bài viết</label>
            </td>
            <td>
              <input type="text" placeholder="tiêu đề bài viết" class="medium" name="baiviet_title"
                value="<?php echo $result_post['baiviet_title'] ?>" />
            </td>
          </tr>


          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Nội dung</label>
            </td>
            <td>
              <textarea class="ckeditor" name="baiviet_noidung">
              <?php echo $result_post['baiviet_noidung'] ?>
              </textarea>
            </td>

          </tr>
          <tr>
            <td>
              <label>Ngày</label>
            </td>
            <td>
              <input type="date" placeholder="Ngày" class="medium" name="baiviet_date"
                value="<?php echo $result_post['baiviet_date'] ?>" />
            </td>
          </tr>

          <tr>
            <td>
              <label>URL</label>
            </td>
            <td>
              <input value="<?php echo $result_post['tbl_url'] ?>" type="text" placeholder="vi-du-gia-bao-duong-phen"
                class="medium" name="url" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Lượt xem</label>
            </td>
            <td>
              <input type="text" placeholder="Lượt xem" class="medium" name="baiviet_luotxem"
                value="<?php echo $result_post['baiviet_luotxem'] ?>" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Tải ảnh lên</label>
            </td>
            <td>
              <img src="../img/<?php echo $result_post['baiviet_img'] ?>" alt="" width='150' height='120'><br>
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
    </div>
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