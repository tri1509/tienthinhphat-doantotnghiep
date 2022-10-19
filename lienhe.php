<?php
  $title = "liên hệ công ty TNHH TM XNK Tiến Thịnh Phát";
	include 'inc/header.php';
  include 'inc/sale.php';
  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $insertContact = $cs->insert_contact($_POST);
}
?>
<div class="container">
  <div class="row">
    <div class="col-xl-12">
      <div class="google-map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.1660097448207!2d106.6261242136276!3d10.874975092254711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a01f797a58f%3A0x42b26d6117f01ee1!2zMTgwIE5ndXnhu4VuIFRo4buLIELDunAsIFTDom4gQ2jDoW5oIEhp4buHcCwgUXXhuq1uIDEyLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1666078613559!5m2!1svi!2s"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="col-xl-5">
      <div class="register-wrap">
        <div class="register-form" id="dang-ky-ngay">
          <h3>Gởi Thông Tin Hổ Trợ</h3>
          <?php
            if ($insertContact){
                echo $insertContact;
            }
            ?>
          <form action="" method="post">
            <div class="form-group">
              <input type="text" name="yourname" class="form-control" placeholder="Họ và tên: ">
            </div>
            <div class="form-group">
              <input type="text" name="tel" class="form-control" placeholder="Điện thoại:">
            </div>
            <div class="form-group">
              <input type="email" name="youremail" class="form-control" placeholder="Email:">

            </div>
            <div class="form-group">
              <textarea id="txtmessage" name="message" class="form-control" placeholder="Nội dung:"></textarea>
            </div>
            <div class="btn-register-wrap">
              <input type="submit" class="btn-regsiter-now" id="dangky" title="Gởi Thông Tin Hổ Trợ"
                value="Gởi Thông Tin" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-7">
      <div class="information-salanest">
        <p>
          <a href="inde.html"></a>
          <img src="img/salanest2.png" alt="hình anh logo salanest" width="50%">
        </p>

        <p><strong>Địa chỉ:</strong> 180 Nguyễn Thị Búp, Phường Tân Chánh Hiệp, Quận 12, Thành Phố Hồ Chí Minh.</p>
        <p><strong>Email:</strong> ttpsalanest@gmail.com.</p>
        <p>(08)76.88.39.39</p>
      </div>
      <div class="clear40"></div>
    </div>
  </div>
</div>
<?php include 'inc/footer.php';?>