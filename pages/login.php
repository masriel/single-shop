<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<form class="form" method="POST" action="../scripts/auth.php">
    <h1 class="title">Log In</h1>

    <div class="group">
        <input class="input" type="text" name="login" placeholder=" ">
        <label class="label">Login</label>
    </div>

    <div class="group">
        <input class="input" type="password" name="password" placeholder=" ">
        <label class="label">Password</label>
    </div>

    <button class="loginbut" type="submit" name="login_button">Log in</button>
    <button class="signinbut" type="submit" name="signin_button">Sign in</button>
</form>
</body>
</html>