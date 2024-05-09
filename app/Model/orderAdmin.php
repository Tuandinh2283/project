<?php
    require_once 'connect.php';
    class doctorModel extends Connect{
        function view(){
                // Thực hiện các truy vấn SQL ở đây, ví dụ:
            $result = $this->conn->query("SELECT * FROM khachhang");
    
                // Xử lý kết quả truy vấn...
            if ($result->num_rows > 0) {
            echo'<h2 style="border-bottom: 1px dashed #ccc;" >Thông tin khách đặt hàng</h2>';
                echo '<table class="doctor-table">';
                echo '<thead><tr><th>STT</th><th>Name</th><th>Giới tính</th><th>Tuổi</th><th>Số điện thoại</th><th>Địa chỉ</th><th>Lịch hẹn</th><th>Ghi chú</th><th>Dịch Vụ</th><th>Thao tác</th></tr></thead>';
                echo '<tbody>';
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' .$stt. '</td>';
                    echo '<td>' . $row["tenKhach"] . '</td>';
                    echo '<td>' . $row["sexKhach"] . '</td>';
                    echo '<td>' . $row["tuoi"] . '</td>';
                    echo '<td>' . $row["SDT"] . '</td>';
                    echo '<td>' . $row["diaChi"] . '</td>';
                    echo '<td>' . $row["timeCome"] . '</td>';
                    // echo '<td>' . $row["ngaySinh"] . '</td>';
                    echo '<td>' . $row["ghiChu"] . '</td>';
                    echo '<td>
                        <a style="padding:6px 16px ;color:white; display: inline; background-color: green; border-radius:6px;text-decoration: none;
                        "href="index.php?page=selectService&id='.$row['maKhach'].'">Dịch Vụ</a>
                    </td>';
                    echo '<td style="display:flex; justify-content: space-evenly;
                    align-items: center;";>
                            <a style="padding:6px 16px ;color:white; display: inline; background-color: green; border-radius:6px;text-decoration: none;
                            "href="index.php?page=updateKH&id='.$row['maKhach'].'">Sửa</a>
                            <a style="padding:6px 16px ;color:white; display: inline; background-color: red; border-radius:6px;text-decoration: none;
                            "href="index.php?page=deleteKH&id='. $row['maKhach'].'">Xóa</a>
                            </td>';
                    echo '</tr>';
                   $stt++;
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "Không có khách hàng nào.";
            }
    
            $this->conn->close();
        }
    }
    $dortor = new doctorModel();
    $dortor ->view();
?>
