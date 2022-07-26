<?php
    require_once ('config.php');
    require_once ('./mail/sendmail.php');

    class Account extends DB{


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
            $sql = "SELECT * FROM accounts";
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
            $sql = "SELECT * FROM accounts WHERE id = $id";
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


        public function insertData($username,$password,$email,$phone,$address,$gender,$role){
            $sql = "INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `phone`,`address`,`gender`,`role`)  
                    VALUES (NULL,'$username','$password', '$email', '$phone', '$address', '$gender','$role')";
            return $this->execute($sql);
        }

        public function insertDatabyStaff($username,$password,$email,$phone,$address,$gender,$role,$id_staff_add){
            $sql = "INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `phone`,`address`,`gender`,`role`,`id_staff_add`)  
                    VALUES (NULL,'$username','$password', '$email', '$phone', '$address', '$gender','$role','$id_staff_add')";
            return $this->execute($sql);
        }

        public function registerData($username,$password,$email,$phone,$address,$gender){
            $sql = "INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `phone`,`address`,`gender`)  
                    VALUES (NULL,'$username','$password', '$email', '$phone', '$address', '$gender')";
            return $this->execute($sql);
        }

        public function updateData($id,$username,$password,$email,$phone,$address,$gender,$role){
            $sql = "UPDATE `accounts` SET `username`='$username',`password`='$password',`email`='$email',`phone`='$phone',`address`='$address',`gender`='$gender',`role`='$role'
                    WHERE id = $id";
            return $this->execute($sql);
        }
        public function updateMoney( $id_staff,$money){
            $sql = "UPDATE `accounts` SET `money`=$money
                    WHERE id = $id_staff";
            return $this->execute($sql);
        }
        public function getIdStaff( $id){
            $sql = "SELECT `id_staff_add` FROM `accounts` WHERE id=$id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }
        public function getStaffMoney( $id){
            $sql = "SELECT `money` FROM `accounts` WHERE id=$id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows; 
        }

        public function deleteData($id){
            $sql = "DELETE FROM accounts WHERE id = $id";
            return $this->execute($sql);
        }


        public function checkLogin($email, $password){
            $sql = "SELECT * FROM accounts where email='$email' AND accounts.password='$password'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                 $data = $result->fetch_assoc();
            }
            else{
                $data = 0;
            }
            return $data;
       }
        public function sendMail($role,$emailsend){
            $code = rand(100000,999999);
            $sql = "INSERT INTO `admins`(`id`, `admin_id`, `code`) VALUES (NULL,'$role','$code')";
            $this->execute($sql);
            $tieude = "MÃ XÁC THỰC 2 LỚP CỦA ADMIN";
            $noidung = "MÃ CODE LÀ: ".$code;
            $mail = new Mailer();
            $mail->sendMailUser($tieude, $noidung, $emailsend);
            
            return $role;
        }

        public function checkMail($email){
            $sql = "SELECT * FROM accounts WHERE email = $email";
            $this->execute($sql);
            if($this->numRows()!=0){
                $data = mysqli_fetch_assoc($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }

        
        public function checkAdmin($id){
            $sql = "SELECT * FROM `admins` WHERE admin_id = $id";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                 $data = $result->fetch_assoc();
            }
            else{
                $data = 0;
            }
            return $data;
        }

        public function deleteCode($id){
            $sql = "DELETE FROM `admins` WHERE admin_id = '$id'";
            return $this->execute($sql);
        }

        public function checkBooking($id){
            $sql = "SELECT username FROM `accounts`, `bookings` WHERE accounts.id = bookings.id_account AND id=$id";
            return $this->execute($sql);
            $sqli = "SELECT room_number FROM `rooms`, `bookings` WHERE rooms.id = bookings.id_account AND id=$id";
            return $this->execute($sqli);
        }

        public function getMoney($id){
            $sql = "SELECT `money` FROM `accounts` WHERE id = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows;      
        }

        public function approve($id, $payment_day){
            $sql = "UPDATE `request_payments` SET `status`= 'Approve', `payment_day`='$payment_day' WHERE id = $id";
            return $this->execute($sql);
        }
        public function reject($id){
            $sql = "UPDATE `request_payments` SET `status`= 'Reject' WHERE id = $id";
            return $this->execute($sql);
        }

        public function nameStaff($id){
            $sql = "SELECT `username` FROM `accounts` WHERE id = $id";
            $result = $this->conn->query($sql);
            $rows = mysqli_fetch_assoc($result);
            return $rows;     
        }
       


    }
?>