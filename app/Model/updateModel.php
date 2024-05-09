<?php
include 'connect.php';
class update extends Connect
{
    public function updateDoctor()
    {
        if (isset($_GET['id'])) {
            $maDoctor = $_GET['id'];
            $sql = "SELECT * FROM doctor WHERE maDoctor = $maDoctor";
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($query);
            $ketqua = '
                <div class="content_addbtn"> 
                    <div id="myModal" class="update"> 
                        <div class="update-content"> 
                            <a href="index.php?page=bacsi"><span class="close" id="closeModalBtn">&times;</span></a> 
                            <div class="update-form-container"> 
                                <h2 class="modal-content_title">Sửa Bác Sĩ</h2> 
                                <form class="form_add-doctor" action="index.php?page=updateBS" method="POST" enctype="multipart/form-data"> 

                                <div style="display: flex; justify-content: center; flex-direction: column;align-items: center;margin-bottom: 20px;">
                                <div style=" width:100px; height:100px;overflow:hidden;border-radius:100% ; margin-bottom: 6px">
                                   <img src="../uploads/'.$row['image'].'" width="100%" id="image__doctor-update">
                                 </div>
                                <label class="custom-file-upload" for="fileInput">Sửa hình ảnh</label>
                                <input type="file" id="fileInput" name="image" onchange="handleFileSelection()" accept="image/gif,image/jpeg, image/png,image/webp" > 
                                </div>

                                    <input type="hidden" name="maDoctor" value="' . $row['maDoctor'] . '"> 
                                    <label for="tenDoctor">Tên Bác Sĩ</label> 
                                    <input type="text" id="tenDoctor" name="name_Doctor" value="' . $row['tenDoctor'] . '" required > 

                                    <label for="congTac">Công Tác</label> 
                                    <input type="text" id="congTac" name="congTac" value="' . $row['congTac'] . '" required> 

                                    <label for="totNghiep">Tốt Nghiệp</label> 
                                    <input type="text" id="totNghiep" name="totNghiep" value="' . $row['totNghiep'] . '" required> 

                                    <label for="chuyenNganh">Chuyên Ngành</label> 
                                    <input type="text" id="chuyenNganh" name="chuyenNganh" value="' . $row['chuyenNganh'] . '" required> 

                                    <label for="TTin1">Thông tin </label> 
                                    <input type="text" id="TTin1" name="TTin1" value="' . $row['thongTin1'] . '" required> 
                                    <input type="submit" class="btnAddoctor" name="btn_doctor" value="Cập nhật"><span class="Form_Success">Success</span> 
                                </form> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                ';
            echo $ketqua;
        }
        if (isset($_POST['btn_doctor'])) {
            $name_doctor = $congTac = $totNghiep = $chuyenNganh = $TTin1 = "";

            $name_doctor = $_POST['name_Doctor'];
            $congTac = $_POST['congTac'];
            $maDoctor = $_POST['maDoctor'];
            $totNghiep = $_POST['totNghiep'];
            $chuyenNganh = $_POST['chuyenNganh'];
            $TTin1 = $_POST['TTin1'];


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
                $sql = "UPDATE doctor SET tenDoctor = '$name_doctor', congTac = '$congTac', totNghiep ='$totNghiep' , chuyenNganh = '$chuyenNganh',
                thongTin1 ='$TTin1' WHERE maDoctor  = $maDoctor";
            } else {
                $sql = "UPDATE doctor SET tenDoctor = '$name_doctor', congTac = '$congTac', totNghiep ='$totNghiep' , chuyenNganh = '$chuyenNganh',
                thongTin1 ='$TTin1', image = '$img' WHERE maDoctor  = $maDoctor";
            }
            $qr = mysqli_query($this->conn, $sql);
        }
    }

    public function updateOrder()
    {
        if (isset($_GET['id']) && ($_GET['id']>=0) ) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM khachhang WHERE maKhach = $id";
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($query);
         
            $ketqua = '
                <div class="content_addbtn"> 
                    <div id="myModal" class="update"> 
                        <div class="update-content"> 
                            <a href="index.php?page=khachhang"><span class="close" id="closeModalBtn">&times;</span></a> 
                            <div class="update-form-container"> 
                                <h2 class="modal-content_title">Cập nhật thông tin khách hàng</h2> 
                                <form class="form_add-doctor" action="index.php?page=updateKH" method="POST" enctype="multipart/form-data"> 
                                    <input type="hidden" name="maKhach" value="' . $row['maKhach'] . '"> 
                                    <label for="tenDoctor">Tên Khách Hàng</label> 
                                    <input type="text" id="name_khach" name="name_khach" value="' . $row['tenKhach'] . '" required> 
                                    <div style="display:flex; justify-content: space-between; align-items:center; ">
                            <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column;margin-bottom: 2rem; ;">
                                <label for="sex" style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Giới tính</label>
                                <select name="sex" id="sex" style="padding: 6px 12px;  outline:none; border: 1px solid #8dcafd; background-color: #e4f3fb;border-radius: 6px;" >';
                              // Hiển thị Giới tính lên form 
                            $gioiTinhOptions = ["Nam", "Nữ", "Other"];
                            foreach($gioiTinhOptions as $item){
                                $seleted = ($item ==  $row['sexKhach'])?'selected':'';
                                $ketqua.='<option value="'.$item.'" '.$seleted.'>'.$item.'</option>';
                            }
                      $ketqua .= '
                             </select>
                       </div>
                      <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column; margin-bottom: 2rem;">
                                <label for="ngay_sinh"style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Ngày sinh</label>
                                <input type="date" style="padding: 6px 12px;  outline:none; border: 1px solid #8dcafd; background-color: #e4f3fb;border-radius: 6px;" id="ngay_sinh" name="ngay_sinh" value="'.$row['date'].'" required>
                            </div>

                            <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column; margin-bottom: 2rem;">
                                <label for="number"style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Số điện thoại</label>
                                <input type="tel" style="padding: 6px 12px;  outline:none; border: 1px solid #8dcafd; background-color: #e4f3fb;border-radius: 6px;" id="number" name="number" value="'.$row['SDT'].'" required>    
                            </div>
                        </div>
                                    <label for="chuyenNganh">Địa chỉ</label> 
                                    <input type="text" id="diachi" name="diachi" value="'.$row['diaChi'].'" required> 

                                    <label for="chuyenNganh">Lịch hẹn</label> 
                                    <input type="datetime-local" id="date_order" name="date_order" value="'.$row['timeCome'].'" required> 

                                    <label for="chuyenNganh">Ghi chú</label> 
                                    <input type="text" id="ghi_chu" name="ghi_chu" value="' . $row['ghiChu'] . '" required> 

                                    <input type="submit" class="btnAddoctor" name="btn_order" value="Cập nhật"><span class="Form_Success">Success</span> 
                                </form> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                ';
            echo $ketqua;
        }

        if (isset($_POST['btn_order'])) {
            $name_khach = $sex = $ngay_sinh = $number = $diachi = $date_order = $ghi_chu = "";

            $name_khach = $_POST['name_khach'];
            $sex = $_POST['sex'];
            $maKhach = $_POST['maKhach'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $number = $_POST['number'];
            $diachi = $_POST['diachi'];
            $date_order = $_POST['date_order'];
            $ghi_chu = $_POST['ghi_chu'];
            $tuoi = floor((time() - strtotime($ngay_sinh)) / 31556926);
            if (!empty($name_khach) && !empty($sex) && !empty($ngay_sinh)
                && !empty($number) && !empty($diachi) && !empty($date_order) || !empty($ghi_chu)
            ) {
                $sql = " UPDATE khachhang SET tenKhach = '$name_khach', sexKhach = '$sex', date='$ngay_sinh', tuoi='$tuoi', SDT = '$number', diachi = '$diachi',
                timeCome = '$date_order', ghiChu = '$ghi_chu' WHERE  maKhach =  $maKhach";

                if ($this->conn->query($sql) === TRUE) {
                    echo "ok";
                } else {
                    echo "lỗi {$sql}" . $this->conn->error;
                }
            } else {
                echo "Bạn cần nhập đủ thông tin";
            }
        }
    }
    public function updateThuoc()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM thuoc WHERE id = $id";
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($query);
            $giaban = number_format($row['gia_ban'], 0, '', ',');
            $ketqua = '
            <div class="content_addbtn"> 
            <div id="myModal" class="update"> 
                <div class="update-content"> 
                <a href="index.php?page=thuoc"> <span class="close" id="closeModalBtn">&times;</span></a>
                    <div class="doctor-form-container">
                        <h2 class="modal-content_title">Thêm Thông Tin Thuốc</h2>
                        <form class="form_add-doctor" action="index.php?page=updateThuoc" method="POST" enctype="multipart/form-data">
                            <div style="display: flex; justify-content: center; flex-direction: column;align-items: center;margin-bottom: 20px;">
                                    <div style=" width:100px; height:100px;overflow:hidden;border-radius:100% ; margin-bottom: 6px">
                                       <img src="../uploads/'.$row['hinh_anh'].'" width="100%" id="image__doctor-update" title="image"  >
                                     </div>
                                    <label class="custom-file-upload" for="fileInput">Tải ảnh lên</label>
                                    <input type="file" id="fileInput" name="image" onchange="handleFileSelection()" accept="image/gif,image/jpeg, image/png,image/webp" > 
                            </div>
                            <div style="display: flex;justify-content: space-between;align-items: center;font-size: 1.2rem;color: #7366ff;">
                            <div style="margin-right:1rem;">
                            <input type="hidden" name="idthuoc" value="'. $row['id'].'"> 
                            <label for="tenthuoc">Tên Thuốc</label>
                            <input type="text" id="tenthuoc" name="tenThuoc" value="'.$row['ten_thuoc'].'" required>
    
                            <label for="mavach">Mã Vạch</label>
                            <input type="text" id="mavach" name="mavach" value="'.$row['ma_vach'].'" required>
    
                            <label for="giaban">Giá Bán</label>
                            <input type="text" id="giaban" name="giaban" value="'.$giaban.'" required>
    
                            <label for="soluong">Số Lượng</label>
                            <input type="text" id="soluong" name="soluong" value="'.$row['so_luong'].'" required>
                            </div>
                           <div>
                           <label for="congtysx">Công ty Sản Xuất </label>
                            <input type="text" id="congtysx" name="congtysx" value="'.$row['cong_ty_san_xuat'].'" required>
    
                            <label for="ngaySx">Ngày Sản Xuất</label>
                            <input type="date" id="ngaySx" name="ngaySx" value="'.$row['ngay_san_xuat'].'" required>
    
                            <label for="hanSd">Hạn Sử Dụng</label>
                            <input type="date" id="hanSd" name="hanSd" value="'.$row['han_su_dung'].'" required>
    
                            <label for="moTa">Mô Tả</label>
                            <input type="text" id="moTa" name="moTa" value="'.$row['mo_ta'].'" required>
                           </div>
                            </div>
                            <input type="submit" class="btnAddoctor" name="add_thuoc" value="Cập nhật"><span class="Form_Success">Success</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
            echo $ketqua;
        }
        if (isset($_POST['add_thuoc'])) {
            $tenThuoc = $mavach = $giaban = $soluong = $congtysx =$ngaySx =$hanSd =$moTa = "";
            $idthuoc = $_POST['idthuoc'];
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
                $sql = "UPDATE thuoc SET ten_thuoc = '$tenThuoc', ma_vach = '$mavach', gia_ban ='$giaban' , so_luong = '$soluong',
                cong_ty_san_xuat ='$congtysx',  ngay_san_xuat ='$ngaySx', han_su_dung ='$hanSd', mo_ta ='$moTa' WHERE id  = $idthuoc";
            } else {
                $sql = "UPDATE thuoc SET ten_thuoc = '$tenThuoc', ma_vach = '$mavach', gia_ban ='$giaban' , so_luong = '$soluong',
                cong_ty_san_xuat ='$congtysx',  ngay_san_xuat ='$ngaySx', han_su_dung ='$hanSd', mo_ta ='$moTa',hinh_anh='$img'  WHERE id  = $idthuoc";
            }
            $qr = mysqli_query($this->conn, $sql);
        }
    }
    public function updateService()
    {
        if (isset($_GET['id']) && ($_GET['id']>=0) ) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM service WHERE maDV = $id";
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($query);
         
            $ketqua = '
                <div class="content_addbtn"> 
                    <div id="myModal" class="update"> 
                        <div class="update-content"> 
                            <a href="index.php?page=khachhang"><span class="close" id="closeModalBtn">&times;</span></a> 
                            <div class="update-form-container"> 
                                <h2 class="modal-content_title">Cập nhật thông tin Dịch Vụ</h2> 
                                <form class="form_add-doctor" action="index.php?page=updateService" method="POST" enctype="multipart/form-data"> 
                                    <input type="hidden" name="maDV" value="' . $row['maDV'] . '"> 
                                    <label for="tenDoctor">Tên Dịch Vụ</label> 
                                    <input type="text" id="name_khach" name="name_khach" value="' . $row['tenDV'] . '" required> 

                                    <label for="chuyenNganh">Giá</label> 
                                    <input type="text" id="diachi" name="diachi" value="'.$row['giaDV'].'" required> 

                                    <label for="chuyenNganh">Đơn vị</label> 
                                    <input type="text" id="date_order" name="date_order" value="'.$row['donVi'].'" required> 

                                    <label for="chuyenNganh">Bảo Hành</label> 
                                    <input type="text" id="ghi_chu" name="ghi_chu" value="' . $row['baoHanh'] . '" required> 

                                    <input type="submit" class="btnAddoctor" name="btn_order" value="Cập nhật"><span class="Form_Success">Success</span> 
                                </form> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                ';
            echo $ketqua;
        }

        if (isset($_POST['btn_order'])) {
            $name_khach =  $diachi = $date_order = $ghi_chu = "";

            $name_khach = $_POST['name_khach'];
            $maKhach = $_POST['maDV'];
            $diachi = $_POST['diachi'];
            $date_order = $_POST['date_order'];
            $ghi_chu = $_POST['ghi_chu'];
            if (!empty($name_khach) && !empty($diachi) && !empty($date_order) || !empty($ghi_chu)
            ) {
                $sql = " UPDATE service SET tenDV = '$name_khach', giaDV = '$diachi',
                donVi = '$date_order', baoHanh = '$ghi_chu' WHERE  maDV =  $maKhach";

                if ($this->conn->query($sql) === TRUE) {
                    echo "ok";
                }
            }
        }
    }
    public function updateTaiKhoan(){
        if (isset($_GET['id']) && ($_GET['id']>=0) ) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM usename WHERE id = $id";
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($query);
         
            $ketqua = '
                <div class="content_addbtn"> 
                    <div id="myModal" class="update"> 
                        <div class="update-content"> 
                            <a href="index.php?page=taikhoan"><span class="close" id="closeModalBtn">&times;</span></a> 
                            <div class="update-form-container"> 
                                <h2 class="modal-content_title">Cập nhật Tài Khoản</h2> 
                                <form class="form_add-doctor" action="index.php?page=updateTK" method="POST" enctype="multipart/form-data"> 
                                    <input type="hidden" name="id" value="' . $row['id'] . '"> 
                                    <label for="tenDoctor">Tên Người Dùng</label> 
                                    <input type="text" id="name_khach" name="name_user" value="' . $row['Hoten'] . '" required> 

                                    <label for="chuyenNganh">Số Điện Thoại</label> 
                                    <input type="text" id="diachi" name="phone_user" value="'.$row['Sodienthoai'].'" required> 

                                    <label for="chuyenNganh">Mật Khẩu</label> 
                                    <input type="text" id="date_order" name="pass_user" value="'.$row['Pass'].'" required> 

                                    <input type="submit" class="btnAddoctor" name="btn_order" value="Cập nhật tài khoản"><span class="Form_Success">Success</span> 
                                </form> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                ';
            echo $ketqua;
        }

        if (isset($_POST['btn_order'])) {
            $name_user =  $phone_user = $pass_user = "";
            $id =$_POST['id'];
            $name_user = $_POST['name_user'];
            $phone_user = $_POST['phone_user'];
            $pass_user = $_POST['pass_user'];
            if (!empty($name_user) && !empty($phone_user) && !empty($pass_user) ) {
                $sql = " UPDATE usename SET Hoten = '$name_user', Sodienthoai = '$phone_user',
                Pass = '$pass_user' WHERE  id =  $id";
                 if ($this->conn->query($sql) === TRUE) {
                    echo "ok";
                }
            }

        }
    }
}

?>