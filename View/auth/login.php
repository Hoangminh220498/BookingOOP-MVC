
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
        <form action="" method="post" class="form-login">
            <ul class="login-nav">
                <li class="login-nav__item active">
                    <a href="././index.php?controller=auth&action=login">Sign In</a>
                </li>
                <li class="login-nav__item">
                    <a href="././index.php?controller=auth&action=register">Sign Up</a>
                </li>
            </ul>
            <label for="login-input-user" class="login__label">
                Email
            </label>
            <input id="login-input-user" class="login__input" type="text" name="email" value="">
            <label for="login-input-password" class="login__label">
                Password
            </label>
            <input id="login-input-password" class="login__input" type="password" name="password" value="">
            <label for="login-sign-up" class="login__label--checkbox">
                <input id="login-sign-up" type="checkbox" class="login__input--checkbox" />
                Keep me Signed in
            </label>
            <button class="login__submit" name="login">Sign in</button>
        </form>
        <a href="#" class="login__forgot">Forgot Password?</a>
    </div>
</body>
</html>