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

    switch($action){
        case '':{ 
            $dataRoom = $room->getAllData();
            $dataRoomPls = $room->getAllDataPls();      
            require_once('View/home/index.php');
            break;
        }
        case 'booking':{  
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $dataID = $room->getDataID($id);
            }               
            require_once('View/home/booking.php');
            break;
        }
        case 'xulybook':{  
            if(isset($_SESSION['user']) && isset($_GET['id']) && isset($_POST['check_in']) && isset($_POST['check_out']) && isset($_POST['price'])){                
                $id_account = $_SESSION['user']['id'];
                $id_room = $_GET['id'];
                $check_in = $_POST['check_in'];
                $check_out = $_POST['check_out'];
                $sec = abs(strtotime($check_out) - strtotime($check_in));  
                $total_day = floor($sec/(60*60*24));
                $price = $_POST['price'];
                $total = $total_day * $price;

                if($booking->insertData($id_account,$id_room,$check_in,$check_out,$total_day,$price,$total)){
                    $room->updateStatusByID($id_room);
                    echo '<script>alert("Booking success")</script>';
                    echo '<script>window.location.href = "index.php?Controller=user&action="</script>';
                }
            }
            // require_once('View/home/booking.php');
            break;
        }
        case 'showbook':{
            if(isset($_SESSION['user'])){
                $id = $_SESSION['user']['id'];
                $dataBooking = $booking->getAllDataBook($id);
                
            }
           
            require_once('View/home/showbook.php');
            break;
        }
        case 'delete_booking':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $id_r=$booking->idRoomBook($id);
                $date = $booking->getDateBook($id);
                $ngayhientai =  date('Y/m/d');
                if (strtotime($ngayhientai) >= strtotime($date['check_in'])){
                    echo '<script>alert("Không thể hủy")</script>';
                    echo '<script>window.location.href = "index.php?controller=user&action=showbook"</script>';
                }else{
                    if($booking->deleteData($id)){
                        $room->returnStatusByID($id_r['id_room']);
                        $dataBooking = $booking->getAllData();
                        header('location: index.php?controller=user&action=showbook');
                    }

                }
               
                
            }    
            else{
                header('location: index.php?controller=user&action=showbook');
            }
            // require_once('View/admin/accounts/delete_account.php');
            break;
        }
        case 'edit_booking':{
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $dataBooking = $booking->getAllData();
            }   
            require_once('View/home/edit_booking.php');
            break;
        }
    }
?>