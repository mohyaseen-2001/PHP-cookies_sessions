<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: seasion.php");
    exit;
}

if (isset($_POST['logout_btn'])) {
    session_destroy();
    header("Location: seasion.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Protected Page</title>
</head>
<body>

    <?php
    if (isset($_SESSION['success_flash'])) {
        echo "<h3 style='color: green;'>" . $_SESSION['success_flash'] . "</h3>";
        unset($_SESSION['success_flash']);
    }
    ?>

    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is a protected section only for logged-in users.</p>

    <form action="" method="POST">
        <button type="submit" name="logout_btn">Logout</button>
    </form>

</body>
</html>
