<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin</title>
  <link rel="stylesheet" href="http://localhost/InternBAP/BookingOOP/View/admin/assets/style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
<div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <span class="nav-item">WELLCOME ADMIN<br><?= isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : '' ?></span>
        </a></li>
        <li><a href="index.php?controller=admin&action=list_account">
          <i class="fas fa-user"></i>
          <span class="nav-item">Account</span>
        </a></li>
        <li><a href="index.php?controller=admin&action=list_room">
          <i class="fas fa-bed"></i>
          <span class="nav-item">Room</span>
        </a></li>
        <li><a href="index.php?controller=admin&action=list_booking">
          <i class="fas fa-mobile-alt"></i>
          <span class="nav-item">Booking</span>
        </a></li>
        <li><a href="index.php?controller=admin&action=re_payment">
          <i class="fas fa-money-check-alt"></i>
          <span class="nav-item">Request Payment</span>
        </a></li>

        <li><a href="././logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>