<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo for Tenga and T.png" type="image/x-icon">
</head>
<body>
    <section class="forms">
        <img src="login-img.jpeg" alt="login-img"class="login-image">
        <div>
            <a href="index.html" class="back-link">← Back to Home</a>
            <form action="login.php" method="post" class="form">
                <h2 style="text-decoration: underline;">Welcome Back</h2>
                <br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <div class="mybtns">
                <a href="index.html" id="loginbtn">
                    Login
                </a>
                <a href="index.html" id="reset">
                    Reset
                </a>
                </div>
                <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
            </form>
        </div>
    </section>
    <?php
    
    ?>
    <script src="script.js"></script>
</body>
</html>