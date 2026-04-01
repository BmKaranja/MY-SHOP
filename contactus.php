<?php
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $issue = $_POST['issue'] ?? '';
    $message = trim($_POST['message'] ?? '');

    if (empty($name)) {
        $error = 'Name is required.';
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Valid email is required.';
    } elseif (empty($issue)) {
        $error = 'Please select an issue.';
    } elseif (empty($message)) {
        $error = 'Message is required.';
    } else {
        $success = 'Thank you! Your message has been sent.';
        // In real app, send email or save to DB
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo for Tenga and T.png" type="image/x-icon">
</head>
<body >
    <?php if (!empty($error)): ?>
        <p style="text-align: center; color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="text-align: center; color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <form class="c-form" action="contactus.php" method="post">
        <h1>
            Contact Us
        </h1>
        <hr>
        <label for="name" class="f-name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email" class="f-name">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="issue" class="f-name">Issue:</label>
        <select id="issue" name="issue">
            <option value="">--Please select an issue--</option>
            <option value="order">Order Issue</option>
            <option value="product">Product Inquiry</option>
            <option value="feedback">Feedback</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="message" class="f-name">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit">
        <br><br>
        <a href="index.html">Back to Home</a>
    </form>
    <?php if ($error): ?>
        <div style="color: red; text-align: center;"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div style="color: green; text-align: center;"><?php echo $success; ?></div>
    <?php endif; ?>
</body>
</html>
