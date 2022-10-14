<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php';?>
<?php
	$ps = new post();		
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$insertPost = $ps ->insert_post($_POST,$_FILES);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm bài viết</h2>
        <div class="block">    
            <?php 
                if(isset($insertPost)){echo $insertPost ;}
            ?>           
        <form action="postadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Tên bài viết</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Tên bài viết" class="medium" name="baiviet_name" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Tiêu đề bài viết</label>
                    </td>
                    <td>
                        <input type="text" placeholder="tiêu đề bài viết" class="medium" name="baiviet_title" />
                    </td>
                </tr>

				
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Nội dung</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="baiviet_noidung"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Ngày</label>
                    </td>
                    <td>
                        <input type="date" placeholder="Ngày" class="medium" name="baiviet_date" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Lượt xem</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Lượt xem" class="medium" name="baiviet_luotxem" />
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
                        <input type="submit" name="submit" Value="Thêm post" />
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
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


