<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Best Rooms</title>
</head>
<body>
<div class="login-container">
        <form action="" class="form-login" method="POST">
            <ul class="login-nav">
                <li class="login-nav__item">
                    <a href="././index.php?controller=auth&action=login">Sign In</a>
                </li>
                <li class="login-nav__item  active">
                    <a href="././index.php?controller=auth&action=register">Sign Up</a>
                </li>
            </ul>
            <label for="login-input-user" class="login__label">
                Username
            </label>
            <input id="login-input-user" class="login__input" type="text" name="username" value="">
            <label for="login-input-password" class="login__label">
                Password
            </label>
            <input id="login-input-password" class="login__input" type="password" name="password" value="">
            <label for="login-input-email" class="login__label">
                Email
            </label>
            <input id="login-input-email" class="login__input" type="email" name="email" value="">
            <label for="login-input-address" class="login__label">
                Address
            </label>
            <input id="login-input-address" class="login__input" type="text" name="address" value="">
            <label for="login-input-phone" class="login__label">
                Phone
            </label>
            <input id="login-input-phone" class="login__input" type="text" name="phone" value="">
            <label for="login-input-gender" class="login__label">
                Gender
            </label>
            <input type="radio" name="gender" value="male" checked> Male
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="other"> Other
            
            <button class="login__submit" name="register">Sign up</button>
        </form>
    </div>
</body>
</html>