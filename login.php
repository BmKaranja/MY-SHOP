<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (empty($username)) {
        $error = 'Username is required.';
    } elseif (empty($password)) {
        $error = 'Password is required.';
    } else {
        // Simple login simulation
        $_SESSION['user'] = $username;
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    }
}
?>
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
        <img src="login-img.jpeg" alt="login-img" class="login-image">
        <div>
            <a href="index.html" class="back-link">← Back to Home</a>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                <h2 style="text-decoration: underline;">Welcome Back</h2>
                <br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <br><br>
                <div class="mybtns">
                    <button type="submit" id="loginbtn">Login</button>
                    <a href="index.html" id="reset">Reset</a>
                </div>
                <p>Don't have an account? <a href="Signup.php">Sign Up</a></p>
            </form>
            <?php if ($error): ?>
                <div style="color: red; text-align: center;"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>
