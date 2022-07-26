<?php
    class DB{
        public $hostname = 'localhost';
        public $username = 'root';
        public $password = '';
        public $dbname = 'bookingOOP';

        public $result = NULL;
    
        public function connect(){
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            if(!$this->conn){
                echo "Kết nối thất bại";
                exit();
            }
            else{
                mysqli_set_charset($this->conn,'utf8');
            }
            return $this->conn;
        }
        
        public $conn;

            public function __construct()
            {
                $this->conn = $this->connect();
            }

        // public function execute($sql){
        //     $this->result = $this->conn->query($sql);
        //     return $this->result;  
        // }

        // public function getData(){
        //     if($this->result){
        //         $data = mysqli_fetch_array($this->result);
        //     }
        //     else{
        //         $data = 0;
        //     }
        //     return $data;
        // }

        // public function getAllData($table){
        //     $sql = "SELECT * FROM $table";
        //     $this->execute($sql);
        //     if($this->numRows()==0){
        //         $data = 0;
        //     }
        //     else{
        //         while($datas = $this->getData()){
        //             $data[] = $datas;
        //         }
        //     }
        //     return $data;
        // }

        // public function numRows(){
        //     if($this->result){
        //         $num = mysqli_num_rows($this->result);
        //     }
        //     else{
        //         $num = 0;
        //     }
        //     return $num;
        // }

        // public function insertData($username,$password,$email,$phone,$address,$gender,$role){
        //     $sql = "INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `phone`,`address`,`gender`,`role`)  
        //             VALUES (NULL,'$username','$password', '$email', '$phone', '$address', '$gender','$role')";
        //     return $this->execute($sql);
        // }

        // public function updateData($id,$username,$password,$email,$phone,$address,$gender,$role){
        //     $sql = "UPDATE `accounts` SET `username`='$username',`password`='$password',`email`='$email',`phone`='$phone',`address`='$address',`gender`='$gender',`role`='$role'
        //             WHERE id = $id";
        //     return $this->execute($sql);
        // }

        // public function deleteData($id){
        //     $sql = "DELETE FROM `accounts` WHERE id = $id";
        //     return $this->execute($sql);
        // }
    }
?>