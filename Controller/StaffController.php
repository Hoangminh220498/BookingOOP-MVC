<?php
    // include "Model/account.php";
    // $db = new DB;
    // $db->connect();

    if(isset($_GET['action'])){
        $action  = $_GET['action'];
    }
    else{
        $action = '';
    }


    switch($action){
        case 'add_account':{
            if(isset($_SESSION['staff'])){
                if(isset($_POST['add_account'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $role = $_POST['role'];
                    $id_staff_add = $_SESSION['staff']['id'];

                    if($account->insertDatabyStaff($username,$password,$email,$phone,$address,$gender,$role,$id_staff_add)){
                        echo '<script>alert("Một Account đã được thêm mới")</script>';
                        echo '<script>window.location.href = "?controller=staff&action=list_account"</script>';
                    }
                }
            }    
            require_once('View/staff/accounts/add_account.php');
            break;
        }
        case 'edit_account':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $dataID = $account->getDataID($id);

                if(isset($_POST['update'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $role = $_POST['role'];

                    if($account->updateData($id,$username,$password,$email,$phone,$address,$gender,$role)){
                        header('location: ?controller=staff&action=list_account');
                    }
                }
            }
            require_once('View/staff/accounts/edit_account.php');
            break;
        }
        case 'delete_account':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                if($account->deleteData($id)){
                    header('location: index.php?controller=staff&action=list_account');
                }
            }    
            else{
                header('location: index.php?controller=staff&action=list_account');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'list_account':{
            $dataAccount =  $account->getAllData();
            require_once('View/staff/accounts/list_account.php');
            break;
        }
        case 'add_room':{
            if(isset($_POST['add_room'])){
                $room_number = $_POST['room_number'];
                $img = $_POST['img'];
                $price = $_POST['price'];

                if($room->insertData($room_number,$img,$price)){
                    echo '<script>alert("Một Room đã được thêm mới")</script>';
                    echo '<script>window.location.href = "?controller=staff&action=list_room"</script>';
                }
            }
            require_once('View/staff/rooms/add_room.php');
            break;
        }
        case 'edit_room':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $dataID = $room->getDataID($id);

                if(isset($_POST['update'])){
                    $room_number = $_POST['room_number'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];

                    if($room->updateData($id,$room_number,$img,$price)){
                        echo '<script>alert("Thông tin phòng đã được thay đổi")</script>';
                        echo '<script>window.location.href = "?controller=staff&action=list_room"</script>';
                    }
                }
            }
            require_once('View/staff/rooms/edit_room.php');
            break;
        }
        case 'delete_room':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                if($room->deleteData($id)){
                    header('location: index.php?controller=staff&action=list_room');
                }
            }    
            else{
                header('location: index.php?controller=staff&action=list_room');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'list_room':{
            $dataRoom = $room->getAllData();
            require_once('View/staff/rooms/list_room.php');
            break;
        }
        case 'delete_booking':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                if($booking->deleteData($id)){
                    header('location: index.php?controller=staff&action=list_booking');
                }
            }    
            else{
                header('location: index.php?controller=staff&action=list_booking');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'list_booking':{
            $dataBooking = $booking->getAllData();
            require_once('View/staff/bookings/list_booking.php');
            break;
        }
        case 'staff_request':{
            if($_SESSION['staff']){
                $id = $_SESSION['staff']['id'];

                $money = $account->getMoney($id);
            }

            require_once('View/staff/staff_request.php');
            break;
        }

        case 'send_request':{
            if(isset($_SESSION['staff']) && !empty($_POST['send_request']) && !empty($_POST['withdraw'])){
                $id_staff = $_SESSION['staff']['id'];
                $money = $_POST['withdraw'];
                $moneystaff=$account->getMoney($id_staff);
                $moneyLeft = $moneystaff['money'] - $money;
                

                $now = date('m');
                $day_request= $payment->checkrequest($id_staff);
                // var_dump($day_request);
                // exit();
                

                if($_POST['withdraw'] < $_SESSION['staff']['money']){
                    if(($now != $day_request['month']) || ($day_request['status'] == "Reject")){
                        if($payment->insertDataSendRequest($id_staff,$money)){
                            $payment->updateMoney( $id_staff,$moneyLeft);
                            echo '<script>alert("Yêu cầu đã được gửi đi")</script>';
                            echo '<script>window.location.href = "?controller=staff&action=list_account"</script>';
                        }
                    }else{
                        echo '<script>alert("Một tháng chỉ được request một lần")</script>';
                        echo '<script>window.location.href = "?controller=staff&action=staff_request"</script>';                      
                    }
                }else{
                    echo '<script>alert("Vượt quá số tiền bạn có")</script>';
                    echo '<script>window.location.href = "?controller=staff&action=staff_request"</script>';
                }
        

                
                // if($_POST['withdraw'] > $_SESSION['staff']['money']){
                //     echo '<script>alert("Vượt quá số tiền bạn có")</script>';
                //     echo '<script>window.location.href = "?controller=staff&action=staff_request"</script>';
                // } else 
                //     if($payment->insertDataSendRequest($id_staff,$money)){
                //         $payment->updateMoney( $id_staff,$moneyLeft);
                //         echo '<script>alert("Yêu cầu đã được gửi đi")</script>';
                //         echo '<script>window.location.href = "?controller=staff&action=list_account"</script>';
                //     }
            }
            // require_once('View/admin/accounts/add_account.php');
            break;
        }
        // default:{
        //     require_once('View/admin/accounts/list_account.php');
        //     break;
        // }
    }
?>