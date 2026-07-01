<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Student Grade System</h1>
            <p>Manage student grades efficiently</p>
        </header>
        <div class="hero">
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
    </div>
    <!-- added index changes -->
</body>
</html>
