<?php
require_once 'connect.php';
class thuocModel extends Connect
{
    function view()
    {
        // Thực hiện các truy vấn SQL ở đây, ví dụ:
        $result = $this->conn->query("SELECT * FROM thuoc");

        // Xử lý kết quả truy vấn...
        if ($result->num_rows > 0) {
            echo'<h2 style="border-bottom: 1px dashed #ccc;" >Thông tin về thuốc</h2>';
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>STT</th><th>Tên Thuốc</th><th>Mã Vạch</th><th>Giá Bán</th><th>Số Lượng</th><th>Công Ty SX</th><th>Ngày Sản Xuất</th><th>Hạn Sử Dụng</th><th>Mô Tả</th><th>Hình</th><th>Thao Tác</th></tr></thead>';
            echo '<tbody>';
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' .$stt. '</td>';
                echo '<td>' . $row["ten_thuoc"] . '</td>';
                echo '<td>' . $row["ma_vach"] . '</td>';
                echo '<td>' . number_format($row["gia_ban"], 0, '', ','). ' </td>';
                echo '<td>' . $row["so_luong"] . '</td>';
                echo '<td>' . $row["cong_ty_san_xuat"] . '</td>';
                echo '<td>' . $row["ngay_san_xuat"].'</td>';
                echo '<td>' . $row["han_su_dung"] . '</td>';
                echo '<td>' . $row["mo_ta"] . '</td>';
                echo '<td ><div style="width:100px; height:100px;  overflow: hidden;"><img src="http://localhost/BTL_PHP/uploads/' . $row["hinh_anh"] . '" alt="Doctor Image" style="width:100%; height:auto; display: block; "></div></td>';
                echo '<td style="display:flex; align-items: center;justify-content: space-between; height: 116px; border:none;">
                            <a style="padding:6px 10px ;margin-right:6px;color:white; display: inline; background-color: green; border-radius:6px;text-decoration: none;
                            "href="index.php?page=updateThuoc&id='.$row['id'].'">Sửa</a>
                           
                            
                            <a style="padding:6px 10px ;color:white; display: inline; background-color: red; border-radius:6px;text-decoration: none;
                            "href="index.php?page=deleteThuoc&id='.$row['id'].'">Xóa</a>
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

        $this->conn->close();
    }
}
$thuoc = new thuocModel();
$thuoc->view();
