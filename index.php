<?php session_start();

    include "Model/account.php";
    include "Model/room.php";
    include "Model/booking.php";
    include "Model/payment.php";
    $account = new Account;
    $room = new Room;
    $booking = new Booking;
    $payment = new Payment;

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else{
        $controller = '';
    }

    switch($controller){
        case 'auth':{
            include "isset/inc/header.php";
            require_once('Controller/AuthController.php');
            break;
        }
        case 'admin':{
            include('./View/admin/inc/header.php');
            require_once('Controller/AdminController.php');
            break;
        }
        case 'staff':{
            include('./View/staff/inc/header.php');
            require_once('Controller/StaffController.php');
            break;
        }
        case 'user':{
            include "isset/inc/header.php";
            require_once('Controller/UserController.php');
            break;
        }
        case '':{
            include "isset/inc/header.php";
            require_once('Controller/UserController.php');
            break;
        }
    }
?>
