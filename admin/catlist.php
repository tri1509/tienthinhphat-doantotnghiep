<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
	$cat = new category();
	if(isset($_GET['delid']) && $_GET['delid']!=NULL){
        $id = $_GET['delid'];
		$delCat = $cat->del_category($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Mục Sản Phẩm</h2>
                <div class="block">  
				<?php 
                if(isset($delCat)){echo $delCat ;}
                ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số Thứ Tự</th>
							<th>Tên Danh Mục</th>
							<th>Chỉnh Sửa/Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_cate = $cat->show_category();
							if($show_cate){
								$i=0;
								while($result = $show_cate->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['category_name'] ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['category_id'] ?>">Chỉnh Sửa</a> || <a href="?delid=<?php echo $result['category_id'] ?>" onclick="return confirm('bạn có muốn xoá không?')">Xóa</a></td>
						</tr>
						<?php }} ?>
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

