<?php
session_start();
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        $_SESSION['userstatus'] = true;
        header("Location: index.html");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo for Tenga and T.png" type="image/x-icon">
</head>
<body>
    <section class="forms">
        <img src="signup.jpeg" alt="login-img" class="login-image">
        <div>
            <a href="index.html" class="back-link">← Back to Home</a>
            <?php if (!empty($error)): ?>
                <p style="text-align: center; color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="Signup.php" method="post" class="signup-form">
                <h2 style="text-decoration: underline;">Create Your Account</h2>
                <br>
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" required>
                <br><br>
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>
                <br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br><br>
                <label for="email">Email:  </label>
                <input type="email" id="email" name="email" required>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br><br>
                <button type="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </section>
</body>
</html>
