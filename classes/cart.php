<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/database.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    class cart {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_to_cart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $sId = session_id();

            $query = "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id' ";
            $result = $this -> db -> select($query) -> fetch_assoc();
            // echo '<pre>';
            // echo print_r($result) ;
            // echo '</pre>';
            $img = $result["hinh"];
            $price = $result["sanpham_giakhuyenmai"];
            $productName = $result["sanpham_name"];
            $query_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sessionId = '$sId' ";
            $check_cart =  $this->db->select($query_cart); 
            if($check_cart){
                $mgs = "<span class='success'>Bạn đã thêm sản phẩm này</span>";
                return $mgs;
            }else{
                $query_insert =
                "INSERT INTO tbl_cart(productId,quantity,sessionId,img,price,productName) 
                VALUES('$id','$quantity','$sId','$img','$price','$productName')";
                $result_insert = $this->db->insert($query_insert);
                if($result_insert){
                    $result_insert = "<span class='success'>Đã thêm sản phẩm vào giỏ hàng</span>";
                    return $result_insert;
                }else{
                    header('Location:404.php');
                }
            }
        }

        public function get_product_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId = '$sId' ORDER BY cartId DESC ";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($quantity,$cartId){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId='$cartId'";
            $result = $this->db->update($query);
            if($result){
                $mgs = "<span class='ok'>Cập nhật thành công !</span>";
                return $mgs;
            }else{
                $mgs = "<span class='notok'>Lỗi cập nhật, bạn vui lòng chờ</span>";
                return $mgs;
            }
        }

        public function del_cart($cartDel) {
            $cartDel = mysqli_real_escape_string($this->db->link, $cartDel);
            $query = "DELETE FROM tbl_cart WHERE cartID = '$cartDel'";
            $result = $this->db->delete($query);
            if($result){
                $mgs = "<span class='ok'>Xoá giỏ hàng thành công !</span>";
                return $mgs;
            }else{
                $mgs = "<span class='notok'>Lỗi, bạn vui lòng chờ</span>";
                return $mgs;
            }
        }

        public function check_cart() {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId = '$sId' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function check_order($customer_id) {
            $sId = session_id();
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_all_data_cart() {
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sessionId = '$sId' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function insertOrder($customer_id) {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId = '$sId' ";
            $get_product = $this->db->select($query);
            if($get_product) {
                while($result = $get_product -> fetch_assoc()) {
                    $productId = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $img = $result['img'];
                    $customer_id = $customer_id;
                    $query_order =
                    "INSERT INTO tbl_order(productId,productName,quantity,price,img,customer_id) 
                    VALUES('$productId','$productName','$quantity','$price','$img','$customer_id')";
                    $query_order = $this->db->insert($query_order);
                }
            }
        }

        public function insertOrder_offline($customer_id) {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionId = '$sId' ";
            $get_product = $this->db->select($query);
            if($get_product) {
                while($result = $get_product -> fetch_assoc()) {
                    $productId = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $img = $result['img'];
                    $customer_id = $customer_id;
                    $query_order =
                    "INSERT INTO tbl_order(productId,productName,quantity,price,img,customer_id) 
                    VALUES('$productId','$productName','$quantity','$price','$img','$customer_id')";
                    $query_order = $this->db->insert($query_order);
                }
            }
        }

        public function getAmountPrice($customer_id) {
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }

        public function get_cart_ordered($customer_id) {
            $customer_id = Session::get('customer_id');
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }

        public function get_inbox_cart() {
            $query = "SELECT * FROM tbl_order ORDER BY date_order ";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function shifted($id,$time,$price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET status = '1' WHERE id ='$id' AND date_order = '$time' AND price = '$price'  ";
            $result = $this->db->update($query);
            if($result){
                $mgs = "<span class='ok'>Đã check hàng</span>";
                echo "<meta http-equiv='refresh' content='0;url=inbox.php'>";
                return $mgs;
            }else{
                $mgs = "<span class='notok'>Chưa check được hàng</span>";
                return $mgs;
            }
        }

        public function del_shifted($id,$time,$price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order WHERE id ='$id' AND date_order = '$time' AND price = '$price'  ";
            $result = $this->db->delete($query);
            if($result){
                $mgs = "<span class='ok'>Đã giao</span>";
                return $mgs;
            }else{
                $mgs = "<span class='notok'>Lỗi hệ thống</span>";
                return $mgs;
            }
        }

        public function shifted_comfirm($id,$time,$price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET status = '2' WHERE customer_id ='$id' AND date_order = '$time' AND price = '$price' ";
            $result = $this->db->update($query);
            if($result){
                echo "<meta http-equiv='refresh' content='3;url=donhang.php'>";
            }else{
                $mgs = "<span class='notok'>Lỗi hệ thống</span>";
                return $mgs;
            }
        }

        public function huydon($id,$time,$price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order WHERE customer_id ='$id' AND date_order = '$time' AND price = '$price' ";
            $result = $this->db->delete($query);
            if($result){
                echo "<meta http-equiv='refresh' content='2;url=donhang.php'>";
                $mgs = "<span class='ok'>Đã huỷ đơn thành công</span>";
                return $mgs;
            }else{
                $mgs = "<span class='notok'>Lỗi hệ thống</span>";
                return $mgs;
            }
        }
    }
?>