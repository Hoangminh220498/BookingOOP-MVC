<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    // include "Model/account.php";
    // $db = new DB;
    // $db->connect();

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $now = date("d-m-Y H:i:s");

    if(isset($_GET['action'])){
        $action  = $_GET['action'];
    }
    else{
        $action = '';
    }

    $thanhcong = array();

    switch($action){
        case 'login':{
            if (isset($_POST['email']) && isset($_POST['password']) ) {
                // var_dump($_POST);
                if ($account->checkLogin($_POST['email'], $_POST['password'])) {
                    $row = $account->checkLogin($_POST['email'],$_POST['password']);
                   
                    if ($row['role'] == 2) {
                        $_SESSION['admin'] = $row;
                        $emailsend = $row['email'];
                        $id = $row['id'];
                        $role = $account->sendMail($id,$emailsend);
                        // header('Location: index.php?controller=admin&action=list');
                        echo "<script>window.location.href ='index.php?controller=auth&action=xulylogin'</script> ";
                    }else if($row['role'] == 1){
                        $_SESSION['staff'] = $row;
                        echo "<script>window.location.href ='index.php?controller=staff&action=list_account'</script> ";
                    }else{
                        $_SESSION['user'] = $row;
                        echo "<script>window.location.href ='index.php?controller='</script> ";
                    }
                }
            }
            require_once('View/auth/login.php');
            break;
        }
        case 'xulylogin':{
            if(isset($_SESSION['admin'])){
                $id =  $_SESSION['admin']['id']; 
                
                if($account->checkAdmin($id)){
                    $row = $account->checkAdmin($id);
                    if(isset($_POST['code']) == $row['code']){
                        $account->deleteCode($id);
                        echo '<script>alert("Xác thực thành công")</script>';
                        echo '<script>window.location.href = "?controller=admin&action=list_account"</script>';
                    }
                    // elseif(isset($_POST['code']) != $row['code']){
                    //     echo '<script>alert("Mã xác thực sai, vui lòng kiểm tra lại")</script>';
                    //     echo '<script>window.location.href = "?controller=auth&action=xulylogin"</script>';
                    // }else{
                    //     echo '<script>alert("Vui lòng nhập mã xác thực")</script>';
                    //     echo '<script>window.location.href = "?controller=auth&action=xulylogin"</script>';
                    // }        
                }     
            }
            require_once('View/auth/xacthuclogin.php');
            break;
        }
        case 'register':{
            if(isset($_POST['register'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $gender = $_POST['gender'];

                if($account->registerData($username,$password,$email,$phone,$address,$gender)){
                        
                    }
                }
            
            require_once('View/auth/register.php');
            break;
        }
        default:{
            require_once('View/auth/login.php');
            break;
        }
    }
?>