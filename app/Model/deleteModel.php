<?php
    include 'connect.php';
    class delete extends Connect{
        public function deleteDoctor(){
            if(isset($_GET['id'])){
                $id_to_delete = $_GET['id'];
                $sql = "DELETE FROM doctor WHERE maDoctor= $id_to_delete ";
                $query = mysqli_query($this->conn, $sql);
            }
        }
        public function deleteOrder(){
            if(isset($_GET['id'])){
                $id_to_delete = $_GET['id'];
                $sql = "DELETE FROM khachhang WHERE maKhach = $id_to_delete ";
                $query = mysqli_query($this->conn, $sql);
            }
        }
        public function deleteThuoc(){
            if(isset($_GET['id'])){
                $id_to_delete = $_GET['id'];
                $sql = "DELETE FROM thuoc WHERE id = $id_to_delete ";
                $query = mysqli_query($this->conn, $sql);
            }
        }
        public function deleteService(){
            if(isset($_GET['id'])){
                $id_to_delete = $_GET['id'];
                $sql = "DELETE FROM service WHERE maDV = $id_to_delete ";
                $query = mysqli_query($this->conn, $sql);
            }
        }
        public function deleteUser(){
            if(isset($_GET['id'])){
                $id_to_delete = $_GET['id'];
                $sql = "DELETE FROM usename WHERE id = $id_to_delete ";
                $query = mysqli_query($this->conn, $sql);
            }
        }
        
    }
?>
