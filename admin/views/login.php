<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Quản Trị</title>
    <link rel="icon" href="https://nhakhoakim.com/wp-content/uploads/2019/05/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../public/Css/login.css">
</head>
<body>
    <div class="container" id="container">
  
        <div class="form-container sign-in-container">
            <form action="../../app/Model/LoginModel.php" method="post">
                <h1>Đăng Nhập</h1>

                <span>Bạn hãy điển thông tin</span>
                <input type="phone" name="number_dn" placeholder="Số Điện Thoại" />
                <input type="password" name="password_dn" placeholder="Mật Khẩu" />
                <input type="submit" class="color_button" name="btndn" value="Đăng Nhập">
                <p style="font-size: 13px; color: red;"><?php if(isset($_SESSION['error'])) { echo $_SESSION['error']; unset($_SESSION['error']); } ?></p>
            </form>
        </div>
        <div class="overlay-container">     
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Xin chào!</h1>
                    <p>Chào Mừng Bạn Đã Đến Trang Quản Trị Của Nha Khoa, Bạn Vui Lòng Đăng Nhập Để Được Vào Hệ Thống Của Chúng Tôi! </p>
                    <div style="display: flex; align-items: center;flex-direction: column; width: 200px;justify-content: center; margin: 0 auto; height: 200px;">
                   <img src="../../uploads/success.png" style="width: 100%;"></div>
                    <button class="ghost" id="signUp">kết Nối</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>