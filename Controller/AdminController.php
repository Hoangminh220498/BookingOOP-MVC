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
            if(isset($_POST['add_account'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $gender = $_POST['gender'];
                $role = $_POST['role'];

                if($account->insertData($username,$password,$email,$phone,$address,$gender,$role)){
                    echo '<script>alert("Một Account đã được thêm mới")</script>';
                    echo '<script>window.location.href = "?controller=admin&action=list_account"</script>';
                }
            }
            require_once('View/admin/accounts/add_account.php');
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
                        header('location: ?controller=admin&action=list_account');
                    }
                }
            }
            require_once('View/admin/accounts/edit_account.php');
            break;
        }
        case 'delete_account':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                if($account->deleteData($id)){
                    header('location: index.php?controller=admin&action=list_account');
                }
            }    
            else{
                header('location: index.php?controller=admin&action=list_account');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'list_account':{
            $dataAccount =  $account->getAllData();
            // var_dump($dataAccount);
            // exit();
            require_once('View/admin/accounts/list_account.php');
            break;
        }
        case 'add_room':{
            if(isset($_POST['add_room'])){
                $room_number = $_POST['room_number'];
                $img = $_POST['img'];
                $price = $_POST['price'];

                if($room->insertData($room_number,$img,$price)){
                    echo '<script>alert("Một Room đã được thêm mới")</script>';
                    echo '<script>window.location.href = "?controller=admin&action=list_room"</script>';
                }
            }
            require_once('View/admin/rooms/add_room.php');
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
                        echo '<script>window.location.href = "?controller=admin&action=list_room"</script>';
                    }
                }
            }
            require_once('View/admin/rooms/edit_room.php');
            break;
        }
        case 'delete_room':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                if($room->deleteData($id)){
                    header('location: index.php?controller=admin&action=list_room');
                }
            }    
            else{
                header('location: index.php?controller=admin&action=list_room');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'list_room':{
            $dataRoom = $room->getAllData();
            require_once('View/admin/rooms/list_room.php');
            break;
        }
        case 'delete_booking':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $id_r=$booking->idRoomBook($id);
                if($booking->deleteData($id)){
                    $room->returnStatusByID($id_r['id_room']);
                    $dataBooking = $booking->getAllData();
                    header('location: index.php?controller=admin&action=list_booking');
                }
            }    
            else{
                header('location: index.php?controller=admin&action=list_booking');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'list_booking':{
            $dataBooking = $booking->getAllData();
             
            require_once('View/admin/bookings/list_booking.php');
            break;
        }
        case 'confirm':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                
                $dataBooking = $booking->getAllData();
                $i=$booking->getID($id);
                if($booking->updateStatusBooking($i['id'])){  
                    $staff=$account->getIdStaff($id);
                    $moneyStaff=$account->getStaffMoney($staff['id_staff_add']);
                    $total = $payment->getTotal($id);                       
                    $money = $moneyStaff['money'] + $total['total']*(5/100);
                    $account->updateMoney( $staff['id_staff_add'],$money);
                    echo '<script>alert("Đã Thanh Toán")</script>';
                    echo '<script>window.location.href = "?controller=admin&action=list_booking"</script>';
                }
            }    
            require_once('View/admin/bookings/list_booking.php');
            break;
        }
        case 're_payment':{
            $dataPayment = $payment->getAllData();
            require_once('View/admin/re_payment.php');
            break;
        }
        case 'approve':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $day = date('Y-m-d' );

                $account->approve($id,$day);
                echo '<script>alert("Đã Thanh Toán")</script>';
                echo '<script>window.location.href = "?controller=admin&action=re_payment"</script>';
            }
          
            break;
        }
        case 'reject':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $staff = $payment->getIdStaff($id);
                $money_staff= $account->getMoney($staff['id_staff']);
                // var_dump( $money_staff);
                // exit();
                $money = $staff['money'] + $money_staff['money'];
                $account->reject($id);
                $account->updateMoney($staff['id_staff'],$money);
                echo '<script>alert("Yêu cầu không được thực hiện")</script>';
                echo '<script>window.location.href = "?controller=admin&action=re_payment"</script>';
            }
            
            break;
        }

        // case'test':{
           
        //         $id = 2;
        //         $data = $payment->commission($id);
        //         foreach($data as $values){
        //             var_dump($values['total']); 
        //         }
                
        //         exit();
        //     require_once('View/test.php');
        //     break;
        // }

        // default:{
        //     require_once('View/admin/accounts/list_account.php');
        //     break;
        // }
    }
?>