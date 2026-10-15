<?php
session_start();

$correct_user = "admin";
$correct_pass = "12345";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login_btn'])) {
    if ($_POST['user'] === $correct_user && $_POST['pass'] === $correct_pass) {
        $_SESSION['username'] = $_POST['user'];
        $_SESSION['success_flash'] = "Login successful! Welcome back.";
        header("Location: protected.php");
        exit;
    } else {
        $_SESSION['error_flash'] = "Invalid username or password!";
        header("Location: seasion.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

    <h2>Login Form</h2>

    <?php
    if (isset($_SESSION['error_flash'])) {
        echo "<h4 style='color: red;'>" . $_SESSION['error_flash'] . "</h4>";
        unset($_SESSION['error_flash']);
    }
    ?>

    <form action="" method="POST">
        <label>Username:</label>
        <input type="text" name="user" required><br><br>

        <label>Password:</label>
        <input type="password" name="pass" required><br><br>

        <button type="submit" name="login_btn">Login</button>
    </form>

</body>
</html>
