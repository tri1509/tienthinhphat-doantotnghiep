<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/database.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    class post {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_post($id){
            $query = "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_all_post(){
            $query = "SELECT * FROM tbl_baiviet ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_post(){
            $so_baiviet_trang = 5 ;
            if(!isset($_GET['trang'])) {
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $so_trang = ($trang-1)*$so_baiviet_trang ;
            $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC LIMIT $so_trang,$so_baiviet_trang" ;
            $result = $this->db->select($query);
            return $result;
        }

        public function show_post_admin(){
            $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC" ;
            $result = $this->db->select($query);
            return $result;
        }

        public function show_post_new(){
            $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result;
        }

        public function del_post($id) {
            $query = "DELETE FROM tbl_baiviet WHERE baiviet_id='$id' " ;
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success'>Đã xoá bài viết</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'>lỗi</span>";
                return $alert;
            }
        }

        public function getpostbyId($id){
            $query = "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id' " ;
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_post($data,$files){
            $baiviet_name = mysqli_real_escape_string($this->db->link, $data['baiviet_name']);
            $baiviet_title = mysqli_real_escape_string($this->db->link,$data['baiviet_title']);
            $baiviet_noidung = mysqli_real_escape_string($this->db->link,$data['baiviet_noidung']);
            $baiviet_date = mysqli_real_escape_string($this->db->link,$data['baiviet_date']);
            $baiviet_luotxem = mysqli_real_escape_string($this->db->link,$data['baiviet_luotxem']);
            $permited = array('jpg','jpeg','png','gif');
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_temp = $_FILES['img']['tmp_name'];
                $div = explode('.',$file_name );
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                $uploaded_image = "../img/".$unique_image;
            if($baiviet_name == "" || $baiviet_title == "" || $baiviet_noidung == "" || $baiviet_date == "" || $baiviet_luotxem == "" || $file_name == "" ) {
                $alert = "<span class='notok'>không được để trống</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_baiviet(baiviet_name,baiviet_title,baiviet_noidung,baiviet_date,baiviet_luotxem,baiviet_img) VALUES('$baiviet_name','$baiviet_title','$baiviet_noidung','$baiviet_date','$baiviet_luotxem','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Thất bại</span>";
                    return $alert;
                }
            }
            if(empty($baiviet_name)) {
                $alert = "<span class='notok'>Thêm tên bài viết</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_baiviet(baiviet_name) VALUES('$baiviet_name')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Them thanh cong</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>That bai</span>";
                    return $alert;

                }
            }
        }

        public function update_post($data,$files,$id) {
            $baiviet_name = mysqli_real_escape_string($this->db->link, $data['baiviet_name']);
            $baiviet_title = mysqli_real_escape_string($this->db->link,$data['baiviet_title']);
            $baiviet_noidung = mysqli_real_escape_string($this->db->link,$data['baiviet_noidung']);
            $baiviet_date = mysqli_real_escape_string($this->db->link,$data['baiviet_date']);
            $baiviet_luotxem = mysqli_real_escape_string($this->db->link,$data['baiviet_luotxem']);
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
                // unlink($unique_image);
                $query = "UPDATE tbl_baiviet SET 
                baiviet_img = '$unique_image' ,
                baiviet_name = '$baiviet_name' ,
                baiviet_title = '$baiviet_title' ,
                baiviet_noidung = '$baiviet_noidung' ,
                baiviet_date = '$baiviet_date' ,
                baiviet_luotxem = '$baiviet_luotxem'
                WHERE baiviet_id='$id' ";
            }else{
                // Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_baiviet SET 
                baiviet_title = '$baiviet_title' ,
                baiviet_name = '$baiviet_name' ,
                baiviet_noidung = '$baiviet_noidung' ,
                baiviet_date = '$baiviet_date' ,
                baiviet_luotxem = '$baiviet_luotxem'
                WHERE baiviet_id='$id' ";
            }

            $result = $this->db->update($query);
            if($result){
                $alert= "<span class='success'>Sửa thành công</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'>That bai</span>";
                return $alert;
            }
            
            if(empty($baiviet_name)) {
                $alert = "<span class='notok'>Mời bạn sửa tên đầy đủ</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_baiviet SET baiviet_name = '$baiviet_name' WHERE baiviet_id='$id' ";
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
    }