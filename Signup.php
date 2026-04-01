<?php
session_start();
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($firstname)) $errors[] = 'First name is required.';
    if (empty($lastname)) $errors[] = 'Last name is required.';
    if (empty($username)) $errors[] = 'Username is required.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
    if (empty($password) || strlen($password) < 6) $errors[] = 'Password must be at least 6 characters.';

    if (empty($errors)) {
        // Simple signup simulation - hash password, save to DB in real app
        $_SESSION['user'] = $username;
        $_SESSION['loggedin'] = true;
        $success = 'Account created successfully! Logged in.';
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo for Tenga and T.png" type="image/x-icon">
</head>
<body>
    <section class="forms">
        <img src="signup.jpeg" alt="login-img" class="login-image">
        <div>
            <a href="index.html" class="back-link">← Back to Home</a>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="signup-form">
                <h2 style="text-decoration: underline;">Create Your Account</h2>
                <br>
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname">
                <br><br>
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname">
                <br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <br><br>
                <button type="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
            <?php if (!empty($errors)): ?>
                <div style="color: red;">
                    <?php foreach ($errors as $err): ?>
                        <p><?php echo $err; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div style="color: green;"><?php echo $success; ?></div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
