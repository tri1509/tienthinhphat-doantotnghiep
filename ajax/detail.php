<?php
$qty = $_POST['qty'];
$price = $_POST['price'];
$sub_total = $qty * $price;
$data = array(
  'sub_total' => number_format($sub_total)." ₫",
);
echo json_encode($data);
?>