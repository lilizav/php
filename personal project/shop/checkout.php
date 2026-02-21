<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartData = json_decode($_POST["cart_data"], true);

    $total = 0;
    foreach ($cartData as $item) {
        $total += $item["price"] * $item["quantity"];
    }

    $stmt = $conn->prepare("INSERT INTO orders (total) VALUES (?)");
    $stmt->execute([$total]);
    $order_id = $conn->lastInsertId();

    foreach ($cartData as $item) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order_id, $item["name"], $item["price"], $item["quantity"]]);
    }

    echo "<h2>Order Placed Successfully!</h2>";
    echo "<a href='products.php'>Back to Shop</a>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<h1 class="title">Checkout</h1>

<div class="cart-wrapper">
    <div class="cart-box">
        <form method="POST" onsubmit="prepareCheckout()">
            <input type="hidden" name="cart_data" id="cart_data">
            <button type="submit">Place Order</button>
        </form>
    </div>
</div>

<script src="js/cart.js"></script>
<script>
function prepareCheckout() {
    document.getElementById("cart_data").value =
        localStorage.getItem("cart");
    localStorage.removeItem("cart");
}
</script>

</body>
</html>