<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Sample Login
    if ($username == "admin" && $password == "12345") {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Incorrect username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Student Grade Management System</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <div class="login-box">

        <div class="login-icon">
            🔒
        </div>

        <h2>Login</h2>

        <?php if($error != ""){ ?>

            <div class="error-message">

                <?php echo $error; ?>

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