<?php
require_once 'connect.php';
class LichsudonhangModel extends Connect
{
    function view()
    {
        // Thực hiện các truy vấn SQL ở đây, ví dụ:
        $result = $this->conn->query("SELECT * FROM don_hang");

        // Xử lý kết quả truy vấn...
        if ($result->num_rows > 0) {
            echo'<h2>Lịch Sử Đơn Thuốc</h2>';
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>STT</th><th>Tên Khách Đặt Hàng</th><th>Số Điện Thoại</th><th>Tổng tiền đơn hàng</th><th>Thao Tác</th></tr></thead>';
            echo '<tbody>';
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' .$stt. '</td>';
                echo '<td>' . $row["Tenkhdat"] . '</td>';
                echo '<td>' . $row["SDT"] . '</td>';
                echo '<td>' .  number_format($row["total_amount"], 0, '', ','). ' đ</td>';
                echo '<td>                            <a title="xem chi tiết đơn hàng" style="padding:6px 10px ; display: inline;  border-radius:6px;
                            "href="#">xem chi tiết</a>
                            </td>';
                echo '</tr>';
                $stt++;
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '
            <div  style="text-align:center;">
            <h2>Không có thông tin thuốc. Vui lòng thêm thuốc để hiển thị !</h2>
            <img src="../img/nodoctor.png" width= "100px">
            </div>';
        }
        
    }
    function viewService(){
        // Thực hiện các truy vấn SQL ở đây, ví dụ:
        $sql = "SELECT * FROM (lichsukhambenh inner join khachhang on lichsukhambenh.maKhach = khachhang.maKhach)
        inner join service on lichsukhambenh.maDV = service.maDV
        inner join doctor on lichsukhambenh.maDoctor = doctor.maDoctor
        ";
        $query =mysqli_query($this->conn, $sql);

            // Xử lý kết quả truy vấn...
        if ($query->num_rows > 0) {
            echo'<h2 style="margin-top: 80px">Lịch Sử Dịch Vụ</h2>';
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>STT</th><th>Tên Khách hàng</th><th>Giới tính</th><th>Ngày Sinh</th><th>Dịch Vụ</th><th>Bác Sĩ</th><th>Ngày Đặt lịch</th><th>Hóa Đơn</th></tr></thead>';
            echo '<tbody>';
            $i =1;
            while ($row = $query->fetch_assoc()) {
               
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row["tenKhach"] . '</td>';
                echo '<td>' . $row["sexKhach"] . '</td>';
                echo '<td>' . $row["date"] . '</td>';
                echo '<td>' . $row["tenDV"] . '</td>';
                echo '<td>' . $row["tenDoctor"] . '</td>';
                echo '<td>' . $row["timeCome"] . '</td>';
                echo '<td>' .number_format( $row["giaDV"] , 0, '',','). '</td>';
                
                echo '</tr>';
                $i++;
            }
            echo '</tbody>';
            echo '</table>';
            
                        } else {
            echo "Không có bác sĩ nào.";
            
        }

        $this->conn->close();
    }

}
$LichsudonhangModel = new LichsudonhangModel();
$LichsudonhangModel->view();
$LichsudonhangModel-> viewService();
