<?php
require_once 'connect.php';
class doctorModel extends Connect
{
    function view()
    {
        // Thực hiện các truy vấn SQL ở đây, ví dụ:
        $result = $this->conn->query("SELECT * FROM doctor");

        // Xử lý kết quả truy vấn...
        if ($result->num_rows > 0) {
            echo'<h2 style="border-bottom: 1px dashed #ccc;" >Thông tin bác sĩ</h2>';
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>STT</th><th>Tên Bác sĩ</th><th>Công tác</th><th>Tốt nghiệp</th><th>Chuyên Ngành</th><th>Thông Tin</th><th>Ảnh</th><th>Thao Tác</th></tr></thead>';
            echo '<tbody>';
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' .$stt. '</td>';
                echo '<td>' . $row["tenDoctor"] . '</td>';
                echo '<td>' . $row["congTac"] . '</td>';
                echo '<td>' . $row["totNghiep"] . '</td>';
                echo '<td>' . $row["chuyenNganh"] . '</td>';
                echo '<td>' . $row["thongTin1"] . '</td>';
                echo '<td ><div style="width:100px; height:100px;  overflow: hidden;"><img src="http://localhost/BTL_PHP/uploads/' . $row["image"] . '" alt="Doctor Image" style="width:100%; height:auto; display: block; "></div></td>';
                echo '<td style="display:flex; align-items: center;justify-content: space-between; height: 116px; border:none;
                }";>
                            <a style="padding:6px 10px ;margin-right:6px;color:white; display: inline; background-color: green; border-radius:6px;text-decoration: none;
                            "href="index.php?page=updateBS&id='.$row['maDoctor'].'">Sửa</a>
                           
                            
                            <a style="padding:6px 10px ;color:white; display: inline; background-color: red; border-radius:6px;text-decoration: none;
                            "href="index.php?page=deleteBS&id='.$row['maDoctor'].'">Xóa</a>
                            </td>';
                echo '</tr>';
                $stt++;
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '
            <div  style="text-align:center;">
            <h2>Không có bác sĩ nào. Vui lòng thêm bác sĩ để hiển thị!</h2>
            <img src="../img/nodoctor.png" width= "100px">
            </div>';
        }

        $this->conn->close();
    }
}
$dortor = new doctorModel();
$dortor->view();
