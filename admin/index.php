<?php
session_start();
ob_start();
if ((isset($_SESSION['username']) && ($_SESSION['username'])!="")) {

    include('./views/headerAdmin.php');
    include('./views/bodyAdmin.php');
    include('../app/Model/logs.php');

    $page = isset($_GET['page']) ? $_GET['page'] : 'index';
    switch ($page) {
            //Phần bác sĩ
        case 'bacsi':
            include './views/Modal_doctorAdmin.php';
            break;
        case 'addBS':
            include '../app/Model/AddModel.php';
            $doctor = new add();
            $doctor->themDoctor();
            include './views/Modal_doctorAdmin.php';
            break;
        case 'deleteBS':
            include '../app/Model/deleteModel.php';
            $delete = new delete();
            $delete->deleteDoctor();
            include './views/Modal_doctorAdmin.php';
            break;
        case 'updateBS':
            include '../app/Model/updateModel.php';
            $update = new update();
            $update->updateDoctor();
            include './views/Modal_doctorAdmin.php';
            break;

            //Phần Khách hàng
        case 'khachhang':
            include './views/Modal_KhachhangAdmin.php';
            break;
        case 'addKH':
            include '../app/Model/AddModel.php';
            $order = new add();
            $order->themOrder();
            include './views/Modal_KhachhangAdmin.php';
            break;
        case 'deleteKH':
            include '../app/Model/deleteModel.php';
            $deleteOrde = new delete();
            $deleteOrde->deleteOrder();
            include './views/Modal_KhachhangAdmin.php';
            break;
        case 'updateKH':
            include '../app/Model/updateModel.php';
            $update = new update();
            $update->updateOrder();
            include './views/Modal_KhachhangAdmin.php';
            break;
        case 'thuoc':
            include './views/Modal_thuocAdmin.php';
            break;
        case 'addthuoc':
            include '../app/Model/AddModel.php';
            $order = new add();
            $order->themThuoc();
            include './views/Modal_thuocAdmin.php';
            break;
        case 'deleteThuoc':
            include '../app/Model/deleteModel.php';
            $deleteThuoc = new delete();
            $deleteThuoc->deleteThuoc();
            include './views/Modal_thuocAdmin.php';
            break;
        case 'updateThuoc':
            include '../app/Model/updateModel.php';
            $update = new update();
            $update->updateThuoc();
            include './views/Modal_thuocAdmin.php';
            break;
        case 'thanhtoan':
            include '../app/Model/AddModel.php';
            $order = new add();
            $order->themdonhang();
            break;
        case 'donhang':
            include './views/Modal_historyAdmin.php';
            break;
            // dịch vụ
        case 'service':
            include './views/Modal_serviceAdmin.php';
            break;
        case 'addService':
            include '../app/Model/AddModel.php';
            $service = new add();
            $service->themService();
            include './views/Modal_serviceAdmin.php';
            break;
        case 'deleteService':
            include '../app/Model/deleteModel.php';
            $deleteOrde = new delete();
            $deleteOrde->deleteService();
            include './views/Modal_serviceAdmin.php';
            break;
        case 'updateService':
            include '../app/Model/updateModel.php';
            $update = new update();
            $update->updateService();
            include './views/Modal_serviceAdmin.php';
            break;
        case 'selectDV':
            include '../app/Model/selectService.php';
            $selectService = new selectService();
            $selectService->selectService();
            break;
        case 'selectService':
            include '../app/Model/selectService.php';
            $selectService = new selectService();
            $selectService->selectService();
            include './views/Modal_KhachhangAdmin.php';
            break;
        case 'thongke':
            include './views/Modal_thongkeAdmin.php';
            break;
        case 'taikhoan':
            include './views/Modal_taikhoanAdmin.php';
            break;
        case 'updateTK':
            include '../app/Model/updateModel.php';
            $update = new update();
            $update->updateTaiKhoan();
            include './views/Modal_taikhoanAdmin.php';
            break;
        case 'addUser':
            include '../app/Model/AddModel.php';
            $adduser = new add();
            $adduser->themNguoiDungAdmin();
            include './views/Modal_taikhoanAdmin.php';
            break;
        case 'deleteTK':
            include '../app/Model/deleteModel.php';
            $deletetk = new delete();
            $deletetk->deleteUser();
            include './views/Modal_taikhoanAdmin.php';
            break;

        case 'logout':
            session_unset();
            session_destroy();
            header('location:index.php');
            break;
    }
    include('./views/footerAdmin.php');
} else {
    echo '<div style="display:flex ; justify-content: center; align-items: center; height:100vh;"><H2 style="text-align: center; margin: 0 auto;">Bạn Chưa Đăng Nhập Vui Lòng <a style="text-decoration: none;" href="./views/login.php">Đăng Nhập</a> lại để truy cập!</H2><div>';
}
?>
