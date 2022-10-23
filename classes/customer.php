<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/database.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    class customer {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data) {
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            if($name == "" || $zipcode == "" || $address == "" || $email == "" || $password == "" ) {
                $alert = "<span class='notok'>Bạn vui lòng điền đầy đủ thông tin !</span>";
                return $alert;
            }else{
                $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span class='notok'>Email này đã đăng ký rồi, mời bạn dùng email khác</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer(name,email,address,zipcode,password)values('$name','$email','$address','$zipcode','$password')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Thêm thông tin thành công ! Mời bạn <a href='login.php'>đăng nhập</a></span>";
                        return $alert;
                    }else{
                        $alert = "<span class='notok'>Thất bại !</span>";
                        return $alert;
                    }
                }
            }
        }

        public function insert_customer_order($data) {
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            if($name == "" || $zipcode == "" || $address == "" || $email == "" || $password == "" ) {
                $alert = "<span class='notok'>Bạn vui lòng điền đầy đủ thông tin !</span>";
                return $alert;
            }else{
                $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span class='notok'>Email này đã đăng ký rồi, mời bạn dùng email khác</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer(name,email,address,zipcode,password)values('$name','$email','$address','$zipcode','$password')";
                    $result = $this->db->insert($query);
                    if($result){
                        $query_check = "SELECT * FROM tbl_customer WHERE email='$email' AND zipcode = '$zipcode' LIMIT 1";
                        $result_check = $this->db->select($query_check);
                        if($result_check){
                        $value = $result_check -> fetch_assoc();
                        Session::set('customer_login',true);
                        Session::set('customer_id',$value['id']);
                        Session::set('customer_name',$value['name']);
                        }else{
                            $alert = "<span class='notok'>Thất bại !</span>";
                            return $alert;
                        }
                    }
                }
            }
        }

        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
            if($email == "" || $password == "" ) {
                $alert = "<span class='notok'>Mời bạn điền đầy đủ thông tin !</span>";
                return $alert;
            }else{
                $check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password = '$password' LIMIT 1";
                $result_check = $this->db->select($check_login);
                if($result_check){
                    $value = $result_check -> fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('location:giohang.html');
                }else{
                    $alert = "<span class='notok'>Email và password không đúng !</span>";
                    return $alert;
                }
            }
        }

        public function show_customer($id) {
            $query = "SELECT * FROM tbl_customer WHERE id = '$id' LIMIT 1 ";
            $result = $this->db->select($query);
            return $result ;
        }

        public function update_Customers($data,$id) {
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            // $phone = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            if($name == "" || $address == "" || $phone = "" || $email == "") {
                $alert = "<span class='notok'>Mời bạn sửa lại thông tin</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_customer SET name = '$name' , address = '$address' , zipcode = '$zipcode' , email = '$email' WHERE id = '$id' ";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='ok'>Cập nhật thông tin thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='notok'>Thất bại</span>";
                    return $alert;
                }
            }
        }

        public function check_phone_customer($data){
            $check_phone = mysqli_real_escape_string($this->db->link, $data['phone_login']);
            $query = "SELECT * FROM tbl_customer WHERE zipcode = '$check_phone' LIMIT 1 ";
            $result = $this->db->select($query);
            if($result) {
                $result_check = $result -> fetch_assoc();
                $get_id = $result_check['id'];
                $mahoa_id = md5($get_id);
                $get_name = $result_check['name'];
                echo "<span class='success'>Xin chào bạn $get_name <br>Mời bạn đổi password <a href='restorepass.php?id=$mahoa_id'>tại đây</a></span>";
            }else{
                $alert = "<span class='notok'>Số điện thoại không khớp, mời bạn kiểu tra lại !</span>";
                return $alert ;
            }
        }

        public function restore_Pass($data,$id) {
            $restorepass = mysqli_real_escape_string($this->db->link, $data['passwordrestore']);
            $query = "UPDATE tbl_customer SET password = '$restorepass'
            WHERE md5(id)='$id' ";
            $result = $this->db->update($query);
            if($result) {
                $alert = "<span class='ok'>Đổi mật khẩu thành công</span>";
                echo "<meta http-equiv='refresh' content='3;url=login.html'>";
                return $alert;
            }else{
                $alert = "<span class='notok'>Không thành công</span>";
                return $alert ;
            }
        }

        public function insert_contact($data) {
            $yourname = mysqli_real_escape_string($this->db->link, $data['yourname']);
            $tel = mysqli_real_escape_string($this->db->link, $data['tel']);
            $youremail = mysqli_real_escape_string($this->db->link, $data['youremail']);
            $message = mysqli_real_escape_string($this->db->link, $data['message']);
            if($yourname == "" || $tel == "" || $youremail == "" || $message == "" ) {
                $alert = "<span class='notok'>Bạn vui lòng điền đầy đủ thông tin !</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_contact(yourname,tel,youremail,message) values ('$yourname','$tel','$youremail','$message')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Thêm thông tin thành công!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='notok'>Lỗi hệ thống, bạn vui lòng đợi một chút !</span>";
                    return $alert;
                }
            }
        }
    }
?>