<?php
    require_once ('config.php');

    class Room extends DB{
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
            $sql = "SELECT * FROM rooms";
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

        public function getAllDataPls(){
            $sql = "SELECT * FROM `rooms` WHERE status = 0";
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
            $sql = "SELECT * FROM rooms WHERE id = $id";
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

        public function insertData($room_number,$img,$price){
            $sql = "INSERT INTO `rooms` (`id`,`room_number`,`img`,`price`)  
                    VALUES (NULL,'$room_number','$img','$price')";
            return $this->execute($sql);
        }

        public function updateData($id,$room_number,$img,$price){
            $sql = "UPDATE `rooms` SET `room_number`='$room_number',`img`='$img',`price`='$price'
                    WHERE id = $id";
            return $this->execute($sql);
        }

        public function deleteData($id){
            $sql = "DELETE FROM rooms WHERE id = $id";
            return $this->execute($sql);
        }

        public function updateStatusByID($id){
            $sql = "UPDATE rooms SET rooms.status = '1' WHERE id = $id";
            return $this->execute($sql);
        }

        public function returnStatusByID($id){
            $sql = "UPDATE rooms SET rooms.status = '0' WHERE id = $id";
            return $this->execute($sql);
        }
    }
?>