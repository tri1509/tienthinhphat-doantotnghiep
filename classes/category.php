<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/database.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    class category {

        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($category_name){
            $category_name = $this->fm->validation($category_name);
            $category_name = mysqli_real_escape_string($this->db->link,$category_name);
            if(empty($category_name)) {
                $alert = "<span class='notok'>Bạn hãy nhập danh mục vào</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_category(category_name) VALUES('$category_name')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Thêm danh mục thành công</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Thất bại</span>";
                    return $alert;
                }
            }
        }

        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY category_id ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($category_name,$id) {
            $category_name = $this->fm->validation($category_name);
            $category_name = mysqli_real_escape_string($this->db->link,$category_name);
            $id = mysqli_real_escape_string($this->db->link,$id);
            if(empty($category_name)) {
                $alert = "<span class='notok'>Sửa thất bại</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert= "<span class='success'>Đã cập nhật</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Cập nhật thất bại</span>";
                    return $alert;

                }
            }
        }

        public function getcatbyId($id){
            $query = "SELECT * FROM tbl_category WHERE category_id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_category($id) {
            $query = "DELETE FROM tbl_category WHERE category_id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success'>Đã xoá</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'Xoá thất bại</span>";
                return $alert;
            }
        }

        public function get_product_by_cat($id) {
            $query = "SELECT * FROM tbl_sanpham WHERE category_id = '$id' ORDER BY category_id ASC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_name_by_cat($id) {
            $query = 
            "SELECT tbl_sanpham.*,tbl_category.category_name, tbl_category.category_id
            FROM tbl_sanpham,tbl_category
            WHERE tbl_sanpham.category_id = tbl_category.category_id
            AND tbl_sanpham.category_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
            
        public function lay_category($id) {
            $query = "SELECT * FROM tbl_category WHERE category_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>