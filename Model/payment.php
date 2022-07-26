<?php
    require_once ('config.php');

    class Payment extends DB{


        public function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;  
        }

        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }

        public function getAllData(){
            $sql = "SELECT * FROM request_payments";
            $this->execute($sql);
            if($this->numRows()==0){
                $data = 0;
            }
            else{
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }
        
        //lấy dữ liệu theo ID
        public function getDataID($id){
            $sql = "SELECT * FROM request_payments WHERE id = $id";
            $this->execute($sql);
            if($this->numRows()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }

        public function numRows(){
            if($this->result){
                $num = mysqli_num_rows($this->result);
            }
            else{
                $num = 0;
            }
            return $num;
        }

        public function insertDataSendRequest($id_staff,$money){
            $sql = "INSERT INTO `request_payments` (`id`, `id_staff`, `money`,`day_request`, `status`)  
                    VALUES (NULL,'$id_staff','$money',now(),'Processing')";
            return $this->execute($sql);
        }

        public function getTotal($id){
            // $sql = "SELECT  `username` FROM `accounts` WHERE `id_staff_add`=3;

            $sql = "SELECT `total` FROM `bookings` WHERE id_account=$id";
            // $sql = "SELECT `total` FROM `bookings` WHERE 1";
            // $result = $this->conn->query($sql);
            // $com = $result*(5/100);
            // $ins = "INSERT INTO `request_payments`(`id`, `id_account`, `money`)
            //          VALUES (NUll,'$id','$com')";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows;           
        } 
        
        public function updateMoney($id,$money){
            $sql = "UPDATE `accounts` SET `money`='$money' WHERE id = $id";
            return $this->execute($sql);
        }

        public function getIdStaff($id){
            $sql = "SELECT `id_staff`,`money` FROM `request_payments` WHERE id = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }

        public function checkRequest($id){
            $sql = "SELECT status, month(day_request) as month FROM `request_payments` WHERE id_staff = $id ORDER BY id desc";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
            
        }
        
    }
?>