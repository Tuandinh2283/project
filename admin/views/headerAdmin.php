
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://nhakhoakim.com/wp-content/uploads/2019/05/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/Css/style.css">
    <link rel="stylesheet" href="../public/Css/orderAdmin.css">
    <link rel="stylesheet" href="../public/Css/viewUpdate.css">
    <link rel="stylesheet" href="../public/Css/addOrder.css">
    <link rel="stylesheet" href="../public/Css/orderThuoc.css">
    <link rel="stylesheet" href="../public/Css/order.css">
    <title>Quản Trị Viên</title>
    <script>
        // Hàm xử lý sự kiện khi chọn file
        function handleFileSelection() {
            var fileInput = document.getElementById('fileInput');
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('image__doctor-update').src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</head>
<style>
    /* Ẩn nút mặc định */
    input[type="file"] {
        display: none;
    }

    /* Tạo nút tùy chỉnh thay thế */
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background-color: #7366ff;
        border-radius: 4px;
        color: #e9e9e9;
        font-size: 1.1rem;
    }

    /* Hover effect */
    .custom-file-upload:hover {
        opacity: 0.8;
    }
</style>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="container_logo-name">
                <img class="header_img-logo"
                    src="https://nhakhoakim.com/wp-content/themes/kimdental-child/assets/images/logo.svg" alt="Logo">
                <p class="header_text-desc">Trang Quản Trị</p>
            </div>

            <div class="container_notice-search">
                <div class="search"><i class="fa-solid fa-magnifying-glass"></i></div>
                <div class="notice"><i class="fa-regular fa-bell"></i></div>
                <div class="detail">
                    <span>Chào, <?php  if(isset($_SESSION['username'])) echo $_SESSION['username'];?></span>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navigation">
                <div id="mySidenav" class="navigation_menu">
                    <ul class="navigation_menu-list">
                        <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=bacsi" id="bac-si-link"><i class="fas fa-user-md"></i>bác sĩ</a>
                        </li>
                        <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=khachhang" id="khach-hang-link"><i class="fas fa-users"></i>khách
                                hàng</a></li>
                        <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=thuoc"><i class="fas fa-pills"></i>Thuốc</a></li>
                        <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=service"><i class="fas fa-calendar-plus"></i>dịch vụ</a></li>
                        <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=donhang"><i class="fa-solid fa-clock-rotate-left"></i>Lịch sử</a>
                        </li>
                        <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=thongke"><i class="fas fa-chart-pie"></i>thống kê</a></li>
                         <li class="navigation_menu-list-item"><a class="navigation_menu-links"
                                href="index.php?page=taikhoan"><i class="fa-solid fa-user-nurse"></i>Tài khoản</a></li>
                    </ul>
                </div>
                <div class="navigation_img">
                    <a href="#" class="navigation_img-link"><img
                            src="http://tabib-v2.inaikas.com/assets/images/appointement.svg" alt="image side">
                        <p>Đặt Lịch Hẹn</p>
                    </a>
                </div>
                <div class="navigation_setting-logout">
                    <a class="navigation_setting-logout-links " href="#"><i class="fa-solid fa-gear"></i>Settings</a>
                    <a class="navigation_setting-logout-links" href="index.php?page=logout"><i
                            class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </div>
            </div>