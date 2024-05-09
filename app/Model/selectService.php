<?php
include 'connect.php';
class selectService extends Connect
{
    public function selectService()
    {
        if (isset($_GET['id']) && ($_GET['id']>=0) ) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM khachhang WHERE maKhach = $id";
            $query = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($query);

            $sql_danhmuc= "SELECT * FROM service";
            $query_danhmuc= mysqli_query($this->conn, $sql_danhmuc);

            $sql_danhmucDortor= "SELECT * FROM doctor";
            $query_danhmucDortor= mysqli_query($this->conn, $sql_danhmucDortor);
         
            $ketqua = '
                <div class="content_addbtn"> 
                    <div id="myModal" class="update"> 
                        <div class="update-content"> 
                            <a href="index.php?page=khachhang"><span class="close" id="closeModalBtn">&times;</span></a> 
                            <div class="update-form-container"> 
                                <h2 class="modal-content_title">Thêm thông tin Dịch Vụ</h2> 
                                <form class="form_add-doctor" action="index.php?page=selectDV" method="POST" enctype="multipart/form-data"> 
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
                                    <div style=" display: flex;justify-content: flex-start;align-items: flex-start; margin-bottom: 2rem;">
                                    <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column; margin-bottom: 2rem;margin-right: 1rem;">
                                    <label for="sex" style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Dịch Vụ</label>
                                    <select style="padding: 6px 12px;outline: none;border: 1px solid #8dcafd;background-color: #e4f3fb;border-radius: 6px;" class="form-control" id="" name="id">';
                                            while($row_danhmuc= mysqli_fetch_assoc($query_danhmuc)){
                                                $ketqua .= '<option value ="'.$row_danhmuc['maDV'].'">'.$row_danhmuc['tenDV'].'</option>';
                                            }
                                        $ketqua .= ' </select>
                                    </div>
                                    <div style=" display: flex;justify-content: center;align-items: flex-start;flex-direction: column; margin-bottom: 2rem;">
                                    <label for="sex" style="font-size: 1.2rem; font-weight: 600;color: #309cf5;letter-spacing: 0.4px;margin-left: 6px;">Tên Bác Sĩ</label>
                                    <select style="padding: 6px 12px; outline: none;border: 1px solid #8dcafd;background-color: #e4f3fb;border-radius: 6px;" class="form-control" id="" name="id_docter">';
                                            while($row_danhmucDortor= mysqli_fetch_assoc($query_danhmucDortor)){
                                                $ketqua .= '<option value ="'.$row_danhmucDortor['maDoctor'].'">'.$row_danhmucDortor['tenDoctor'].'</option>';
                                            }
                                        $ketqua .= ' </select>
                                    </div>
                                    </div>

                                    <input type="submit" class="btnAddoctor" name="btnSelectDV" value="Chọn Dịch Vụ"><span class="Form_Success">Success</span> 
                                </form> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                ';
            echo $ketqua;
        }
        if (isset($_POST['btnSelectDV'])) {
            $id = $_POST['id'];
            $maKhach = $_POST['maKhach'];
            $id_docter = $_POST['id_docter'];
        
            $sql = "INSERT INTO lichsukhambenh (maKhach, 
            maDV, maDoctor) VALUES ('$maKhach', '$id', '$id_docter')";

            $query= mysqli_query($this->conn, $sql);
            if($query){ 
                echo '<div style="display: flex; align-items: center;flex-direction: column; width: 200px;justify-content: center; margin: 0 auto; height: 200px;">
                <h2 style="padding:0;">Chúc mừng bạn Đã Đặt Dịch Vụ Thành Công</h2>
                <img src="../uploads/success.png" style="width: 100%;"></div>';
            exit(); 
            }else{
            echo "Lỗi khi thêm sản phẩm: " . mysqli_error($this->conn);
            }
        }
    }

}

?>