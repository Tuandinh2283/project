<?php
require_once 'connect.php';
class taikhoanModel extends Connect
{
    function view()
    {
        // Thực hiện các truy vấn SQL ở đây, ví dụ:
        $result = $this->conn->query("SELECT * FROM usename");

        // Xử lý kết quả truy vấn...
        if ($result->num_rows > 0) {
            echo'<h2 style="border-bottom: 1px dashed #ccc;" >Thông tin tài khoản</h2>';
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>STT</th><th>Họ Và Tên</th><th>Số Điện Thoại</th><th>Mật Khẩu</th><th>Thao Tác</th></tr></thead>';
            echo '<tbody>';
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' .$stt. '</td>';
                echo '<td>' . $row["Hoten"] . '</td>';
                echo '<td>' . $row["Sodienthoai"] . '</td>';
                echo '<td>' . $row["Pass"] . '</td>';
                echo '<td style="display:flex; align-items: center;justify-content: space-evenly;  border:none;">
                            <a style="padding:6px 10px ;margin-right:6px;color:white; display: inline; background-color: green; border-radius:6px;text-decoration: none;
                            "href="index.php?page=updateTK&id='.$row['id'].'">Sửa</a>
                           
                            
                            <a style="padding:6px 10px ;color:white; display: inline; background-color: red; border-radius:6px;text-decoration: none;
                            "href="index.php?page=deleteTK&id='.$row['id'].'">Xóa Tài Khoản</a>
                            </td>';
                echo '</tr>';
                $stt++;
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '
            <div  style="text-align:center;">
            <h2>Không có Tài Khoản Nào. Vui lòng Mới Tài Khoản để hiển thị !</h2>
            <img src="../img/nodoctor.png" width= "100px">
            </div>';
        }

        $this->conn->close();
    }
}
$taikhoanModel = new taikhoanModel();
$taikhoanModel->view();
