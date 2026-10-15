<?php
session_start();

if (!isset($_SESSION['step1']) || !isset($_SESSION['step2'])) {
    header("Location: step1.php");
    exit;
}

$timeout = 10;

if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity'];
    if ($inactive_time > $timeout) {
        session_destroy();
        header("Location: step1.php");
        exit;
    }
}
$_SESSION['last_activity'] = time();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['final_step'])) {
    session_destroy();
    header("Location: step1.php");
    exit;
}

$name = $_SESSION['step1']['name'];
$email = $_SESSION['step1']['email'];
$address = $_SESSION['step2']['address'];
$phone = $_SESSION['step2']['phone'];
?>

<h2>Final Step: Review Your Information</h2>

<p><strong>Name:</strong> <?php echo $name; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Address:</strong> <?php echo $address; ?></p>
<p><strong>Phone:</strong> <?php echo $phone; ?></p>

<br>

<form action="" method="POST">
    <button type="submit" name="final_step">Confirm & Submit</button>
</form>
