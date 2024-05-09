<?php
  class Connect {
        private $host;
        private $user;
        private $pass;
        private $dbname;
        public $conn;

        // Hàm khởi tạo (constructor)
        public function __construct($host='localhost', $user ='root', $pass = '', $dbname ='qlsuckhoe') {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->dbname = $dbname;

            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

            // Kiểm tra kết nối
            if ($this->conn->connect_error) {
                die("Kết nối thất bại: " . $this->conn->connect_error);
            }
        }
        
    }
    $conn = new Connect();
?>
