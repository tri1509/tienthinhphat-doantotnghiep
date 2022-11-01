<?php
include '../lib/session.php';
Session::checkSession();
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Quản Trị Salanest-Tiến Thịnh Phát</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
     <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
</head>
<style>
    .notok {
        font-size: 15px;
        color: red;
        font-weight: 400;
        border-bottom: 1px solid #000;
    }
</style>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/salanest.png" alt="Logo" />
                </div>
                <div class="floatleft middle">
                    <h1>Tiến Thịnh Phát Group</h1>
                    <p>www.salanest.com</p>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" />
                    </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Xin Chào</li>
                            <?php
                            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                                Session::destroy();
                            }
                            ?>
                            <li><a href="?action=logout">Thoát</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-grid-tables"><a href="inbox.php"><span>Quản Lí Đơn Hàng</span></a></li>
                <li class="ic-grid-tables"><a href="catadd.php">Thêm danh mục</a> </li>
                <li class="ic-grid-tables"><a href="catlist.php">Sửa/Xóa danh mục</a> </li>
                <li class="ic-grid-tables"><a href="brandadd.php">Thêm thương hiệu</a> </li>
                <li class="ic-grid-tables"><a href="brandlist.php">Sửa/Xóa thương hiệu</a> </li>
                <li class="ic-grid-tables"><a href="productadd.php">Thêm sản phẩm</a> </li>
                <li class="ic-grid-tables"><a href="productlist.php">Sửa/Xóa sản phẩm</a> </li>
                <li class="ic-grid-tables"><a href="postadd.php">Thêm bài viết</a></li>
                <li class="ic-grid-tables"><a href="postlist.php">Sửa/Xóa bài viết</a></li>
            </ul>
        </div>
        <div class="clear">
        </div>