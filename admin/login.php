<?php
include '../classes/adminlogin.php';
?>
<?php
	$class = new adminlogin();		
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$adminUser = $_POST['adminUser'];
		$adminPass = md5($_POST['adminPass']);
		$login_check = $class->login_admin($adminUser,$adminPass);
	}
?>
<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
  <div class="container">
    <section id="content">
      <form action="login.php" method="post">
        <h1>Xin Chào Quản Trị Viên</h1>
        <span><?php
				if(isset($login_check)) {
					echo $login_check;
				}
			?></span>
        <div>
          <input type="text" placeholder="Username" name="adminUser">
        </div>
        <div>
          <input type="password" placeholder="Password" name="adminPass">
        </div>
        <div>
          <input type="submit" value="Log in" />
        </div>
      </form><!-- form -->
      <div class="button">
        <a href="#">Ngày mới vui vẻ, đạt hiệu quả công việc .</a>
      </div><!-- button -->
    </section><!-- content -->
  </div><!-- container -->
</body>

</html>