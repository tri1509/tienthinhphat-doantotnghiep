<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$fm = new Format();
	$cs = new customer();
	$show_contact = $cs -> show_contact();
	if(isset($_GET['postid'])){
		$id = $_GET['postid'];
		$delpost = $ps->del_post($id);
	}
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Hỗ trợ khách hàng</h2>
    <div class="block">
      <?php // if(isset($delpost)){echo $delpost ;} ?>
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên khách hàng</th>
            <th>Số dt</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Chỉnh/Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php 
					if($show_contact) {
						$i=0;
						while($resule = $show_contact -> fetch_assoc()){
							$i++;
				?>
          <tr class="odd gradeX">
            <td><?php echo $i ?> </td>
            <td><?php echo $resule['yourname'] ?></td>
            <td><?php echo $resule['tel'] ?></td>
            <td><?php echo $resule['youremail'] ?></td>
            <td><?php
            $htmlspecialchars = $fm -> textShorten($resule['message'],500) ;
            echo htmlspecialchars($htmlspecialchars);
            ?></td>
            <td><a href="postedit.php?postid=<?php echo $resule['baiviet_id'] ?>">Chỉnh Sửa</a> || <a
                href="?postid=<?php echo $resule['baiviet_id'] ?>"
                onclick="return confirm('Bạn có muốn xoá không?')">Xóa</a></td>
          </tr>
          <?php } } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
$(document).ready(function() {
  setupLeftMenu();
  $('.datatable').dataTable();
  setSidebarHeight();
}); -->
</script>
<?php include 'inc/footer.php';?>