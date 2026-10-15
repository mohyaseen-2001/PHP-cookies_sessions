<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login_btn'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if ($user === "ahmed" && $pass === "123") {
        $_SESSION['username'] = $user;
        $_SESSION['role'] = "admin";
        header("Location: ADMAIN1.php");
        exit;
    } elseif ($user === "sami" && $pass === "456") {
        $_SESSION['username'] = $user;
        $_SESSION['role'] = "editor";
        header("Location: editor.php");
        exit;
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Role-Based Login</h2>
    <form action="" method="POST">
        <label>Username:</label>
        <input type="text" name="user" required><br><br>
        <label>Password:</label>
        <input type="password" name="pass" required><br><br>
        <button type="submit" name="login_btn">Login</button>
    </form>
</body>
</html>
