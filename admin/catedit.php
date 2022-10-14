<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new category();
    if(isset($_GET['catid']) && $_GET['catid']!=NULL){
        $id = $_GET['catid'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$category_name = $_POST['catName'];
		$updateCat = $cat->update_category($category_name,$id);
	}
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
                <?php 
                if(isset($updateCat)){echo $updateCat ;}
                ?>
                <?php
                    $get_cate_name = $cat->getcatbyId($id);
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Sửa danh mục" class="medium" name="catName" value="<?php echo $result['category_name'] ?>" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Cap nhat" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>