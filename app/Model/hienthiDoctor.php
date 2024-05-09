<?php
 require_once(__DIR__ . '/connect.php');
    class doctorShow extends Connect{
        public function view(){
                // Thực hiện các truy vấn SQL ở đây, ví dụ:
            $result = $this->conn->query("SELECT * FROM doctor");
                // Xử lý kết quả truy vấn...
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="doctor-bottom-container-child">';
                        echo '<div class="doctor-bottom-container-child-left">';
                            echo '<h3>'. $row["tenDoctor"] .'</h3>';
                            echo '<ul>';
                                echo '<li>' . $row["congTac"] .'</li>';
                                echo '<li>' . $row["totNghiep"] . '</li>';
                                echo '<li>' . $row["chuyenNganh"] . '</li>';
                                echo '<li>' . $row["thongTin1"] . '</li>';
                            echo '</ul>';
                        echo '</div>';
                        echo '<div style="width: 200px; height: 260px; overflow: hidden; border-radius: 6px;">';
                            echo '<img style="width: 100%;" src="./uploads/'.$row["image"].'" alt="Doctor Image" ">';
                        echo '</div>';
                    echo '</div>'; 
                }   
            $this->conn->close();
        }
    }
    $doctorShow = new doctorShow();
    $doctorShow -> view();
?>