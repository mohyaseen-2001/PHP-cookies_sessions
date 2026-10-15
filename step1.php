<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['next_step1'])) {
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $_SESSION['step1'] = array(
            "name" => $_POST["name"],
            "email" => $_POST["email"]
        );
        header("Location: step2.php");
        exit;
    }
}
?>

<h2>Step 1: Basic Information</h2>
<form action="" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="next_step1">Next Step</button>
</form>
