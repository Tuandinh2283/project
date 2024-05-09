<?php
    require_once 'connect.php';
   class logs extends Connect{
        function log(){
        // Lấy thông tin IP Address của khách hàng
         $ipAddress = $_SERVER['REMOTE_ADDR'];
     // Lấy thông tin User Agent của khách hàng
          $userAgent = $_SERVER['HTTP_USER_AGENT'];
     // Lấy thời gian truy cập
     $timestamp = date('Y-m-d H:i:s');
     $ipAddress = $_SERVER['REMOTE_ADDR'];
     $userAgent = $_SERVER['HTTP_USER_AGENT'];
     // Thực hiện truy vấn để chèn thông tin logs vào bảng logs
     $sql = "INSERT INTO logs (timestamp,ip_address, user_agent) VALUES ('$timestamp','$ipAddress', '$userAgent')";
      $this->conn->query($sql);
        }
     
   }
   $logs = new logs();
   $logs->log();
?>