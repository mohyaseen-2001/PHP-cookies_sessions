<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['next_step2'])) {
    if (isset($_POST['address']) && isset($_POST['phone'])) {
        $_SESSION['step2'] = array(
            "address" => $_POST["address"],
            "phone" => $_POST["phone"]
        );
        header("Location: final.php");
        exit;
    }
}
?>

<h2>Step 2: Additional Details</h2>
<form action="" method="POST">
    <label>Address:</label>
    <input type="text" name="address" required><br><br>

    <label>Phone Number:</label>
    <input type="text" name="phone" required><br><br>

    <button type="submit" name="next_step2">Next Step</button>
</form>
