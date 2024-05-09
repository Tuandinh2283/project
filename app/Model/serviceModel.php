<?php
    require_once 'connect.php';
    class doctorModel extends Connect{
        function view(){
                // Thực hiện các truy vấn SQL ở đây, ví dụ:
            $result = $this->conn->query("SELECT * FROM service");
    
                // Xử lý kết quả truy vấn...
            if ($result->num_rows > 0) {
            echo'<h2 style="border-bottom: 1px dashed #ccc;" >Thông tin dịch vụ</h2>';
                echo '<table class="doctor-table">';
                echo '<thead><tr><th>STT</th><th>Tên dịch vụ</th><th>Giá</th><th>Đơn vị</th><th>Bảo Hành</th><th>Thao tác</th></tr></thead>';
                echo '<tbody>';
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' .$stt. '</td>';
                    echo '<td>' . $row["tenDV"] . '</td>';
                    echo '<td>' . number_format($row["giaDV"], 0, '',',').' đ</td>';
                    echo '<td>' . $row["donVi"] . '</td>';
                    echo '<td>' . $row["baoHanh"] . '</td>';
                    echo '<td style="display:flex; justify-content: space-evenly;
                    align-items: center;";>
                            <a style="padding:6px 16px ;color:white; display: inline; background-color: green; border-radius:6px;text-decoration: none;
                            "href="index.php?page=updateService&id='.$row['maDV'].'">Sửa</a>
                            <a style="padding:6px 16px ;color:white; display: inline; background-color: red; border-radius:6px;text-decoration: none;
                            "href="index.php?page=deleteService&id='. $row['maDV'].'">Xóa</a>
                            </td>';
                    echo '</tr>';
                   $stt++;
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "Không có dịch vụ nào.";
            }
    
            $this->conn->close();
        }
    }
    $dortor = new doctorModel();
    $dortor ->view();
?>
