<?php
$id = $_POST['id'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$sub_total = $qty * $price;
  $data = array(
    'sub_total' => number_format($sub_total)."đ",
  );
  echo json_encode($data);
?>