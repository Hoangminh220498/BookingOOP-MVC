<?php
    require_once ('config.php');

    class Booking extends DB{
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
            $sql = "SELECT * FROM bookings";
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
        public function getAllDataBook($id){
            $sql = "SELECT * FROM bookings WHERE id_account=$id";
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
            $sql = "SELECT * FROM bookings WHERE id_account = $id";
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

        public function insertData($id_account,$id_room,$check_in,$check_out,$total_day,$price,$total){
            $sql = "INSERT INTO `bookings` (`id`, `id_account`, `id_room`, `check_in`, `check_out`,`total_day`,`price`,`total`)  
                    VALUES (NULL,'$id_account','$id_room', '$check_in', '$check_out', '$total_day', '$price','$total')";
            return $this->execute($sql);
        }

        public function registerData($username,$password,$email,$phone,$address,$gender){
            $sql = "INSERT INTO `bookings` (`id`, `username`, `password`, `email`, `phone`,`address`,`gender`)  
                    VALUES (NULL,'$username','$password', '$email', '$phone', '$address', '$gender')";
            return $this->execute($sql);
        }

        public function updateData($id,$username,$password,$email,$phone,$address,$gender,$role){
            $sql = "UPDATE `bookings` SET `username`='$username',`password`='$password',`email`='$email',`phone`='$phone',`address`='$address',`gender`='$gender',`role`='$role'
                    WHERE id = $id";
            return $this->execute($sql);
        }

        public function deleteData($id){
            $sql = "DELETE FROM bookings WHERE id = $id";
            return $this->execute($sql);
        }

        
        public function getID($id){
            $sql = "SELECT `id` FROM `bookings` WHERE id_account = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }
        public function updateStatusBooking($id){
            $sql = "UPDATE bookings SET bookings.status = 'Đã Thanh Toán' WHERE id = $id";
            return $this->execute($sql);
        }
        public function idRoomBook($id){
            $sql = "SELECT `id_room` FROM `bookings` WHERE id = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }
        public function showBook($id){
            $sql = "SELECT * FROM `bookings` WHERE id_account = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }
        public function getDateBook($id){
            $sql = "SELECT `check_in` FROM `bookings` WHERE id = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }
    }
?>