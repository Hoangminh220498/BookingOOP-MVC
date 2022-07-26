<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Rooms</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">BEST ROOMS</a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">About One</a></li>
                                    <li><a href="#">About Two</a></li>
                                    <li><a href="#">About Three</a></li>
                                    <li><a href="#">About Four</a></li>
                                    <li><a href="#">About Five</a></li>
                                    <li><a href="#">About Six</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="?controller=user&action=showbook"><span class="glyphicon glyphicon-user"></span> <?= isset($_SESSION['user']) ? $_SESSION['user']['username'] : 'Profile' ?></a></li>
                            <li>
                                <?php
                                    if(isset($_SESSION['user'])){
                                        echo '<a href="././logout.php"><span class="glyphicon glyphicon-log-in"></a>';
                                    } else {
                                        echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"></span> Login / Sign Up <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="././index.php?controller=auth&action=login">Login</a></li>
                                            <li><a href="././index.php?controller=auth&action=register">Sign Up</a></li>
                                        </ul>
                                    </li>';
                                    }
                                //         </span> Login / Sign Up <span class="caret"></span></a>
                                // <ul class="dropdown-menu">
                                //     <li><a href="././index.php?controller=auth&action=login">Login</a></li>
                                //     <li><a href="././index.php?controller=auth&action=register">Sign Up</a></li>
                                // </ul>
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>