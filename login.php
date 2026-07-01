<?php
session_start();

$error = "";

if (!isset($_SESSION["login_attempts"])) {
    $_SESSION["login_attempts"] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Sample Login
    if ($username == "admin" && $password == "12345") {

        $_SESSION["login_attempts"] = 0;

        header("Location: dashboard.php");
        exit();

    } else {

        $_SESSION["login_attempts"]++;

        $error = "Incorrect username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Grade Management System - Login</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <div class="login-box">

        <div class="login-icon">
            🔒
        </div>

        <h2>Student Login Portal</h2>

        <?php if (!empty($error)) { ?>

            <div class="error-message">
                ❌ <strong>Login Failed!</strong><br>
                <?php echo htmlspecialchars($error); ?>
            </div>

            <div class="attempt-message">
                Login Attempts:
                <strong><?php echo $_SESSION["login_attempts"]; ?></strong>
            </div>

        <?php } ?>

        <form method="POST">

            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter Username"
                required
            >

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter Password"
                required
                onkeyup="checkStrength()"
            >

            <small id="strength"></small>

            <button
                type="button"
                class="show-btn"
                onclick="togglePassword()"
            >
                Show Password
            </button>

            <div class="remember">

                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                >

                <label for="remember">
                    Remember Me
                </label>

            </div>

            <button type="submit">
                Login
            </button>

        </form>

        <div class="forgot">
            <a href="#">
                Forgot Password?
            </a>
        </div>

    </div>

</div>

<script src="js/app.js"></script>

</body>
</html>