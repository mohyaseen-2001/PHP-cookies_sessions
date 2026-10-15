<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_to_cart'])) {
    $product = array(
        'name' => $_POST['prod_name'],
        'price' => $_POST['prod_price']
    );
    $_SESSION['cart'][] = $product;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['clear_cart'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

    <h2>Products</h2>
    <div style="display: flex; gap: 20px;">
        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 150px; text-align: center;">
            <h3>Phone</h3>
            <p>Price: $500</p>
            <form action="" method="POST">
                <input type="hidden" name="prod_name" value="Phone">
                <input type="hidden" name="prod_price" value="500">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>

        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 150px; text-align: center;">
            <h3>Laptop</h3>
            <p>Price: $1000</p>
            <form action="" method="POST">
                <input type="hidden" name="prod_name" value="Laptop">
                <input type="hidden" name="prod_price" value="1000">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>

        <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; width: 150px; text-align: center;">
            <h3>Watch</h3>
            <p>Price: $200</p>
            <form action="" method="POST">
                <input type="hidden" name="prod_name" value="Watch">
                <input type="hidden" name="prod_price" value="200">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
    </div>

    <br><hr><br>

    <h2>Your Shopping Cart</h2>
    <ul>
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                echo "<li>" . $item['name'] . " - $" . $item['price'] . "</li>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </ul>

    <br>
    <form action="" method="POST">
        <button type="submit" name="clear_cart">Clear Cart</button>
    </form>

</body>
</html>
