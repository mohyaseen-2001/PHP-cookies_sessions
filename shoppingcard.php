<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_to_cart'])) {
    setcookie('savewihlist', $_POST['add_to_cart'], time() + 8400, '/');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$savewhishlist = '';
if (isset($_COOKIE['savewihlist'])) {
    $savewhishlist = $_COOKIE['savewihlist'];
    echo "Items in Cart: " . $savewhishlist . "<br>";
} else {
    echo "Cart is empty<br>";
}
if (!isset($_COOKIE['fav_fruit']) && !isset($_POST['delete_btn'])) {
    setcookie('fav_fruit', 'Apple', time() + 86400, '/');
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_btn'])) {
    setcookie('fav_fruit', '', time() - 3600, '/'); // سطر الحذف الذكي
    header("Location: " . $_SERVER['PHP_SELF'] . "?deleted=true");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["sharing_message"])) {
    setcookie("share_msg", "hi", time() + 8400, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;


}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Simulation</title>
</head>
<body>

    <h2>Products</h2>
    <div style="display: flex; gap: 20px;">
        
        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 150px; text-align: center;">
            <h3>Phone</h3>
            <form action="" method="POST">
                <button type="submit" name="add_to_cart" value="Phone">Add to Cart</button>
            </form>
        </div>

        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 150px; text-align: center;">
            <h3>Laptop</h3>
            <form action="" method="POST">
                <button type="submit" name="add_to_cart" value="Laptop">Add to Cart</button>
            </form>
        </div>

        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 150px; text-align: center;">
            <h3>Watch</h3>
            <form action="" method="POST">
                <button type="submit" name="add_to_cart" value="Watch">Add to Cart</button>
            </form>
        </div>

    </div>
    <form action="" method="POST">
    <button type="submit" name="delete_btn">Delete Cookie</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["sharing_message"])) {
    setcookie("share_msg", "hi", time() + 8400, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<form action="" method="POST">
    <button type="submit" name="sharing_message">Set Cookie for Page 2</button>
</form>

</body>
</html>
