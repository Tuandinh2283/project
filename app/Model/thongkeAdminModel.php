<?php
require_once 'connect.php';
class thongkeModel extends Connect
{
    function view()
    {
        // Thực hiện các truy vấn SQL ở đây, ví dụ:
        $result = $this->conn->query("SELECT COUNT(*) AS total_orders FROM don_hang");

        // Xử lý kết quả truy vấn...
        if ($result->num_rows > 0) {
            echo'<h2 style="border-bottom: 1px dashed #ccc;" >Thống kê Website</h2>';
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>Tổng số đơn hàng</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["total_orders"] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }
    function viewdoanhthuthuoc()
    {
        $resultDoanhthuthuoc = $this->conn->query("SELECT SUM(total_amount) AS total_revenue FROM don_hang ");
        $resultDoanhthuthang = $this->conn->query("SELECT DATE_FORMAT(Ngaydat,'%m') AS month, SUM(total_amount) AS revenuethang FROM don_hang GROUP BY month");
        if ($resultDoanhthuthuoc->num_rows > 0) {
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>Tổng Doanh Thu Bán Thuốc</th><th>Tổng Doanh Thu Tháng</th></tr></thead>';
            echo '<tbody>';
            while ($row = $resultDoanhthuthuoc->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . number_format($row["total_revenue"], 0, '', ',') . ' đ</td>';
            }
           
            while ($row = $resultDoanhthuthang->fetch_assoc()) {
                echo '<td> Tháng: '. $row["month"] . ' - Doanh thu: ' .  number_format($row["revenuethang"], 0, '', ',') . ' VNĐ</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }
    function viewdoanhthukhamRang()
    {
        $resultDoanhthuthuoc = $this->conn->query("SELECT SUM(total_amount) AS total_revenue FROM don_hang ");
        if ($resultDoanhthuthuoc->num_rows > 0) {
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>Tổng Doanh Thu Theo Dịch vụ</th></tr></thead>';
            echo '<tbody>';
            while ($row = $resultDoanhthuthuoc->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . number_format($row["total_revenue"], 0, '', ',') . ' đ</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }
    function viewsanphambanchay()
    {
        $resultDoanhthuthuoc = $this->conn->query("SELECT * FROM thuoc where id= 1 ");
        if ($resultDoanhthuthuoc->num_rows > 0) {
            echo '<table class="doctor-table">';
            echo '<thead><tr><th>Sản Phẩm Bán chạy nhất</th></tr></thead>';
            echo '<tbody>';
            while ($row = $resultDoanhthuthuoc->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["ten_thuoc"] . ' <br>Số Lượng: 12</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
    }
    function vitrikhachhang()
    {
        // Dữ liệu mẫu địa lý (có thể được lấy từ Google Analytics)
        $geolocation_data = array(
            array("country" => "Hải Phòng", "visits" => 17),
            array("country" => "Hà Nội", "visits" => 29),
            array("country" => "Thành Phố Hồ Chí Minh", "visits" => 11),
            // Thêm dữ liệu cho các Thành phố khác nếu cần thiết
        );

        // Hiển thị dữ liệu
        echo "<h2 style='margin-top: 40px; padding:0;'>Phân phối lượt truy cập theo Thành Phố</h2>";
        echo "<table class='doctor-table'>";
        echo "<thead><tr><th>Thành Phố</th><th>Lượt truy cập</th></tr><thead>";
        echo '<tbody>';
        foreach ($geolocation_data as $data) {
            echo "<tr><td>" . $data['country'] . "</td><td>" . $data['visits'] . "</td></tr>";
        }
        echo '</tbody>';
        echo "</table>";
    }
    function thietbitruycap()
    {
        $resultthongkethietbi = $this->conn->query("SELECT user_agent, ip_address, COUNT(*) AS total_visits
        FROM logs
        GROUP BY user_agent, ip_address
        ORDER BY total_visits DESC");
        if ($resultthongkethietbi->num_rows > 0) {
            echo '<table class="doctor-table">';
            echo "<h2 style='margin-top: 40px; padding:0;'>Thiết bị Truy Cập Website</h2>";
            echo '<thead><tr><th>Tên Thiết Bị</th><th>Số Lượng Truy Cập</th><th>Địa chỉ IP</th> </tr></thead>';
            echo '<tbody>';
            while ($row = $resultthongkethietbi->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["user_agent"] . ' <br></td>';
                echo '<td>'. $row["total_visits"] .'</td>';
                echo '<td>'. $row["ip_address"] .'</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }
       
    }
    function viewService()
    {
     // Thực hiện các truy vấn SQL ở đây, ví dụ:
     $result = $this->conn->query("SELECT COUNT(*) AS total_service FROM lichsukhambenh");

     // Xử lý kết quả truy vấn...
     if ($result->num_rows > 0) {
        echo "<h2 style='margin-top: 40px; padding:0;'>Tổng Số Khách hàng Đặt Dịch Vụ</h2>";
         echo '<table class="doctor-table">';
         echo '<thead><tr><th>Tổng số khách hàng</th></tr></thead>';
         echo '<tbody>';
         while ($row = $result->fetch_assoc()) {
             echo '<tr>';
             echo '<td>' . $row["total_service"] . '</td>';
             echo '</tr>';
         }
         echo '</tbody>';
         echo '</table>';
     }
       
    }
}

$thongkeModel = new thongkeModel();
$thongkeModel->view();
$thongkeModel->viewdoanhthuthuoc();
$thongkeModel->viewdoanhthukhamRang();
$thongkeModel->viewsanphambanchay();
$thongkeModel->vitrikhachhang();
$thongkeModel->viewService();
$thongkeModel->thietbitruycap();

?>
