<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/database.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    class product {

        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data,$files){
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $product_mota = mysqli_real_escape_string($this->db->link,$data['product_mota']);
            $price_old = mysqli_real_escape_string($this->db->link,$data['price_old']);
            $price_new = mysqli_real_escape_string($this->db->link,$data['price_new']);
            $quantity = mysqli_real_escape_string($this->db->link,$data['quantity']);
            $quantityfm = $this->fm->validation($quantity);
            $brand_lv2 = $brand * 10 + $type;
            $permited = array('jpg','jpeg','png','gif');
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_temp = $_FILES['img']['tmp_name'];

                $div = explode('.',$file_name );
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                $uploaded_image = "../img/".$unique_image;
            if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $product_mota == "" ||$price_old == "" || $price_new == "" || $quantity = "" || $file_name == "" ) {
                $alert = "<span class='notok'>không được để trống</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_sanpham(category_id,brand_id,brand_id_lv2,sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,hinh) VALUES('$category','$brand','$brand_lv2','$productName','$product_desc','$product_mota','$price_old','$price_new', '$quantityfm','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Thất bại</span>" ;
                    return $alert;
                }
            }
            if(empty($productName)) {
                $alert = "<span class='notok'>Thêm tên sản phẩm</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_product(productName) VALUES('$productName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Thất bại</span>";
                    return $alert;

                }
            }
        }

        public function show_product(){
            $query = "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id) {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $product_mota = mysqli_real_escape_string($this->db->link,$data['product_mota']);
            $price_old = mysqli_real_escape_string($this->db->link,$data['price_old']);
            $price_new = mysqli_real_escape_string($this->db->link,$data['price_new']);
            $quantity = mysqli_real_escape_string($this->db->link,$data['quantity']);
            $quantityfm = $this->fm->validation($quantity);
            $brand_lv2 = $brand * 10 + $type;
            $permited = array('jpg','jpeg','png','gif');
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_temp = $_FILES['img']['tmp_name'];

                $div = explode('.',$file_name );
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                $uploaded_image = "../img/".$unique_image;

            if(!empty($file_name)){
                // Nếu người dùng chọn ảnh
                if($file_size > 1048576) {
                    $alert= "<span class='notok'>Bạn không thể upload file quá 2MB!</span>";
                    return $alert;
                }elseif(in_array($file_ext,$permited)===false){
                    $alert= "<span class='notok'>Bạn chỉ có thể upload file cho phép:-".implode(',', $permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);
                unlink($unique_image);
                $query = "UPDATE tbl_sanpham SET 
                hinh = '$unique_image' ,
                sanpham_name = '$productName' ,
                brand_id = '$brand' ,
                brand_id_lv2 = '$brand_lv2' ,
                category_id = '$category' ,
                sanpham_gia = '$price_old' ,
                sanpham_giakhuyenmai = '$price_new' ,
                sanpham_chitiet = '$product_desc',
                sanpham_mota = '$product_mota',
                sanpham_soluong = '$quantityfm'
                WHERE sanpham_id='$id' ";
            }else{
                // Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_sanpham SET 
                sanpham_name = '$productName' ,
                brand_id = '$brand' ,
                brand_id_lv2 = '$brand_lv2' ,
                category_id = '$category' ,
                sanpham_gia = '$price_old' ,
                sanpham_giakhuyenmai = '$price_new' ,
                sanpham_chitiet = '$product_desc',
                sanpham_mota = '$product_mota',
                sanpham_soluong = '$quantityfm'
                WHERE sanpham_id='$id' ";
            }

            $result = $this->db->update($query);
            if($result){
                $alert= "<span class='success'>Sửa thành công</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'>That bai</span>";
                return $alert;
            }
        }

        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_product($id) {
            $query = "DELETE FROM tbl_sanpham WHERE sanpham_id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success'>Đã xoá</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'>lỗi</span>";
                return $alert;
            }
        }
        // end backend

        // start fontend
        public function getproduct_feathered_6(){
            $query = "SELECT * FROM tbl_sanpham ORDER BY rand() LIMIT 6";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_main(){
            $query = "SELECT * FROM tbl_sanpham";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_all_product(){
            $so_sp_trang = 12 ;
            if(!isset($_GET['trang'])) {
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $so_trang = ($trang-1)*$so_sp_trang ;
            $query = "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC LIMIT $so_trang,$so_sp_trang";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query =
            "SELECT tbl_sanpham.*, tbl_category.category_name, tbl_brand.brand_name 
            FROM tbl_sanpham 
            INNER JOIN tbl_category ON tbl_sanpham.category_id = tbl_category.category_id
            INNER JOIN tbl_brand ON tbl_sanpham.brand_id = tbl_brand.brand_id 
            WHERE tbl_sanpham.sanpham_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function getinformation($id) {
            $query ="SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function samekind($cate_id){
            $cate_id = $this->fm->validation($cate_id);
            $query ="SELECT * FROM tbl_sanpham WHERE category_id = '$cate_id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function timkiem($tukhoa){
            $tukhoa = $this->fm->validation($tukhoa);
            if(empty($tukhoa) || $tukhoa == '') {
                echo "<p class='nomargin text-uppercase clredt'>Mời bạn nhập đầy đủ</p>";
            }else{
            // $query = "SELECT * FROM tbl_sanpham WHERE sanpham_name OR sanpham_mota OR sanpham_chitiet LIKE '%$tukhoa%' ";
            $query = "SELECT * FROM tbl_sanpham WHERE MATCH(sanpham_name) AGAINST ('%$tukhoa%')";
            $result = $this->db->select($query);
            return $result;
            }

        }
    }
?>