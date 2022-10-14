<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
	$cat = new category();		
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$catName = $_POST['catName'];
		$insertCat = $cat->insert_category($catName);
	}
?>
<?php  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
                <?php 
                if(isset($insertCat)){echo $insertCat;};
                ?>
               <div class="block copyblock"> 
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Thêm danh mục" class="medium" name="catName" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
<!-- localhost/shopmvc/admin/catadd.php -->