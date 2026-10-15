<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['set_theme'])) {
    setcookie('user_color', $_POST['theme_color'], time() + 8400, '/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    setcookie('saved_username', $_POST['user_name'], time() + 8400, '/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['start_temp'])) {
    setcookie('temp_cookie', 'mohammadyasin', time() + 60, '/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$bg_color = "white"; 
if (isset($_COOKIE['user_color'])) {
    $bg_color = $_COOKIE['user_color'];
}

if (isset($_COOKIE['counter'])) {
    $newvalue = $_COOKIE['counter'] + 1;
    setcookie('counter', $newvalue, time() + 8400, '/');
    echo "the number of visits = " . $newvalue . "<br>";
} 
else {
    setcookie('counter', 1, time() + 8400, '/');
    echo "the number of visits = 1<br>";
}

$saved_user = "";
if (isset($_COOKIE['saved_username'])) {
    $saved_user = $_COOKIE['saved_username'];
}

if (isset($_COOKIE['temp_cookie'])) {
    echo "Temporary Cookie Value = " . $_COOKIE['temp_cookie'] . "<br>";
} else {
    echo "Temporary Cookie is empty or expired!<br>";
}

if (isset($_COOKIE['share_msg'])) {
    echo "Message received from Page 1: " . $_COOKIE['share_msg'];
} else {
    echo "No cookie found! Please visit page1.php and click the button first.";
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Exercise</title>
</head>
<body style="background-color: <?php echo $bg_color; ?>;">

    <form action="" method="POST">
        <label>Choose Background Color:</label>
        <select name="theme_color" required>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
        </select>
        <br><br>
        <button type="submit" name="set_theme">Apply Color</button>
    </form>

    <hr>

    <form action="" method="POST">
        <label>Username:</label>
        <input type="text" name="user_name" value="<?php echo $saved_user; ?>" required>
        <br><br>
        <button type="submit" name="login">Login</button>
    </form>

    <hr>

    <form action="" method="POST">
        <button type="submit" name="start_temp">Start 1 Minute Cookie Test</button>
    </form>

</body>
</html>
