<?php

require_once('connect.php');

class Add extends Connect
{

    public function themDoctor()
    {
        if (isset($_POST['add_doctor']) && $_POST['add_doctor']) {
            $name_doctor = $_POST['tenDoctor'];
            $congTac = $_POST['congTac'];
            $totNghiep = $_POST['totNghiep'];
            $chuyenNganh = $_POST['chuyenNganh'];
            $TTtin1 = $_POST['TTin1'];

            if ($_FILES["image"]["name"] != "") {
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $img = basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $uploadOk = 1;
                if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
            } else {
                $img = "";
            }

            if ($img == "") {
                $img = "avt_nodoctor.png";
                $sql = "INSERT INTO doctor (tenDoctor, congTac, totNghiep, chuyenNganh, thongTin1,
                image) VALUES('$name_doctor', '$congTac', '$totNghiep', '$chuyenNganh', '$TTtin1', '$img') ";
            } else {
                $sql = "INSERT INTO doctor (tenDoctor, congTac, totNghiep, chuyenNganh, thongTin1,
                image) VALUES('$name_doctor', '$congTac', '$totNghiep', '$chuyenNganh', '$TTtin1', '$img') ";
            }
            $qr = mysqli_query($this->conn, $sql);
        }
    }
    public function themOrder()
    {
        if (isset($_POST['sbm_order']) && $_POST['sbm_order']) {
            $name_khach = $_POST['name_khach'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $number = $_POST['number'];
            $diachi = $_POST['diachi'];
            $date_order = $_POST['date_order'];
            $ghi_chu = $_POST['ghi_chu'];
            $sex = $_POST['sex'];
            $tuoi = floor((time() - strtotime($ngay_sinh)) / 31556926);
            $sql = "INSERT INTO khachhang (tenKhach,sexKhach,date,tuoi,SDT,diaChi,timeCome, ghiChu) VALUES('$name_khach', '$sex', '$ngay_sinh','$tuoi', '$number', '$diachi', '$date_order', ' $ghi_chu') ";
             $qr= mysqli_query($this->conn, $sql);
        }
    }
    public function themThuoc()
    {
        if (isset($_POST['add_thuoc']) && $_POST['add_thuoc']) {
            $tenThuoc = $_POST['tenThuoc'];
            $mavach = $_POST['mavach'];
            $giaban = $_POST['giaban'];
            $soluong = $_POST['soluong'];
            $congtysx = $_POST['congtysx'];
            $ngaySx = $_POST['ngaySx'];
            $hanSd = $_POST['hanSd'];
            $moTa = $_POST['moTa'];

            if ($_FILES["image"]["name"] != "") {
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $img = basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $uploadOk = 1;
                if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
            } else {
                $img = "";
            }

            if ($img == "") {
                $img = "no_update_thuoc.png";
                $sql = "INSERT INTO thuoc (ten_thuoc,ma_vach,gia_ban,so_luong,cong_ty_san_xuat,ngay_san_xuat, han_su_dung,mo_ta,hinh_anh)
                VALUES('$tenThuoc', '$mavach',  '$giaban', '$soluong', '$congtysx', ' $ngaySx', ' $hanSd', ' $moTa', '$img') ";
            } else {
                $sql = "INSERT INTO thuoc (ten_thuoc,ma_vach,gia_ban,so_luong,cong_ty_san_xuat,ngay_san_xuat, han_su_dung,mo_ta,hinh_anh)
                VALUES('$tenThuoc', '$mavach',  '$giaban', '$soluong', '$congtysx', ' $ngaySx', '$hanSd', '$moTa', '$img') ";
            }
             $qr= mysqli_query($this->conn, $sql);
        }
    }
    public function themdonhang(){
        if(isset($_POST['btnthanhtoan']) && $_POST['btnthanhtoan']) {
            $total_amount = $_POST['total_amount'];
            $customer_name = $_POST['customer_name'];
            $customer_sdt = $_POST['customer_sdt'];
            $date_order = date("Y-m-d H:i");
            $sql = "INSERT INTO don_hang (Ngaydat,Tenkhdat,SDT,total_amount) VALUES('$date_order', '$customer_name', '$customer_sdt','$total_amount') ";
             $qr= mysqli_query($this->conn, $sql);
             if($qr){
            echo'<div style="display: flex; align-items: center;flex-direction: column; width: 200px;justify-content: center; margin: 0 auto; height: 200px;">
            <h2 style="padding:0;">Tạo Đơn Hàng Thành Công</h2>
            <img src="../uploads/success.png" style="width: 100%;"></div>';
            }
        }
    }
    public function themService()
    {
        if (isset($_POST['sbm_service']) && $_POST['sbm_service']) {
            $name_service = $_POST['name_service'];
            $Gia = $_POST['Gia'];
            $don_vi = $_POST['don_vi'];
            $bao_hanh = $_POST['bao_hanh'];

            $sql = "INSERT INTO service (tenDV,giaDV,donVi,baoHanh) VALUES('$name_service', '$Gia', '$don_vi', '$bao_hanh') ";
            $qr= mysqli_query($this->conn, $sql);
        }
    }
    public function themNguoiDungAdmin()
    {
        if (isset($_POST['add_user']) && $_POST['add_user']) {
            $ten_user = $_POST['ten_user'];
            $sdt_user = $_POST['sdt_user'];
            $pass = $_POST['pass'];
            $sql = "INSERT INTO usename (Hoten,Sodienthoai,Pass) VALUES('$ten_user', '$sdt_user', '$pass') ";
            $qr= mysqli_query($this->conn, $sql);
        }
    }
    
    
}

?>