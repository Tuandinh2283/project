<?php
    require_once './connect.php';
 class loginUse extends Connect {
     public function LoginUse() {
        if(isset($_POST['btndn'])&&($_POST['btndn'])){
            $Dienthoai = $_POST['number_dn'];
             $Pass = $_POST['password_dn'];
        $sql = "select * from usename where Sodienthoai='$Dienthoai' and Pass='$Pass'";
        $result = mysqli_query($this->conn,$sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['username'] =  $row['Hoten'];
            unset($_SESSION['error']);
            header("location:../../admin/index.php"); 
        } else {
            // Đăng nhập thất bại
            session_start();
            $_SESSION['error'] ="Tên đăng nhập hoặc mật khẩu không đúng.";
            header("location:../../admin/views/login.php"); 
        }
     }
}
 }
     
    $doctor = new loginUse();
    $doctor->LoginUse();
?>