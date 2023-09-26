<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/signin.css">
</head>
<body>
<form class="form" method="POST" action="../scripts/registrate.php">
    <h1 class="title">Sign In</h1>

    <div class="group">
        <input class="input" type="text" name="username" placeholder=" ">
        <label class="label">Username</label>
    </div>

    <div class="group">
        <input class="input" type="text" name="login" placeholder=" ">
        <label class="label">Login</label>
    </div>

    <div class="group">
        <input class="input" type="password" name="password" placeholder=" ">
        <label class="label">Password</label>
    </div>

    <button class="signinbut" type="submit" name="signin_button">Sign in</button>
    <button class="loginbut" type="submit" name="login_button">Log in</button>
</form>
</body>
</html>