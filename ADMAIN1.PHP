<?php
session_start();
if (!isset($_SESSION["role"]) && $_SESSION["role"]!=="ahmed"){
 echo "<h1>Access Denied: You do not have permission to view this page.</h1>";
    exit;
}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>

    <h1>Welcome to the editor Page!</h1>
    <h3>Role: <?php echo $_SESSION['role']; ?></h3>
    <h3>Hi Mr. <?php echo $_SESSION['username']; ?></h3>

    <br>
    <a href="login.php">Go Back to Login</a>

</body>
</html>
