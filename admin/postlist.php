<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$fm = new Format();
	$ps = new post();
	$show_post = $ps -> show_post_admin();
	if(isset($_GET['postid'])){
		$id = $_GET['postid'];
		$delpost = $ps->del_post($id);
	}
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Liệt kê bài viết</h2>
    <div class="block">
      <?php if(isset($delpost)){echo $delpost ;} ?>
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên BV</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <!-- <th>Ngày</th> -->
            <th>Lượt xem</th>
            <th>Hình ảnh</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
					if($show_post) {
						$i=0;
						while($resule = $show_post -> fetch_assoc()){
							$i++;
				?>
          <tr class="odd gradeX">
            <td><?php echo $i ?> </td>
            <td><?php echo $resule['baiviet_name'] ?></td>
            <td><?php echo $resule['baiviet_title'] ?></td>
            <td><?php echo $fm -> textShorten($resule['baiviet_noidung'],100) ; ?></td>
            <!-- <td><?php echo $fm -> formatDate($result['baiviet_date']) ?></td> -->
            <td><?php echo $resule['baiviet_luotxem'] ?></td>
            <td><img src="../img/<?php echo $resule['baiviet_img'] ?>" alt="" width='100' height='100'></td>
            <td><a href="postedit.php?postid=<?php echo $resule['baiviet_id'] ?>">Edit</a> || <a
                href="?postid=<?php echo $resule['baiviet_id'] ?>"
                onclick="return confirm('Bạn có muốn xoá không?')">Delete</a></td>
          </tr>
          <?php } } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  setupLeftMenu();
  $('.datatable').dataTable();
  setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>