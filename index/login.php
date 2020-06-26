<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <div class="box">
        <h2>Login</h2>
        <form action="login_check.php" method="post">
            <div class="input">
                <input type="email" name="email">
                <label>Email</label>
            </div>
            <div class="input">
                <input type="password" name="pass">
                <label>Password</label>
            </div>

            <input type="submit" name="login-check" value="Login">

            <a href="register.php" class="block">
                <button type="button">Sign Up</button>
            </a>
    </div>
</body>

</html>
