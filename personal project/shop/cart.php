<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<nav class="navbar">
    <h2>MyShop</h2>

    <div>
        <a href="products.php">Shop</a>
        <a href="cart.php">Cart</a>

        <?php if(isset($_SESSION['user'])): ?>

            <span>Welcome, <?= $_SESSION['user']; ?></span>
            <a href="logout.php">Logout</a>

        <?php else: ?>

            <a href="login_form.php">Login</a>
            <a href="register_form.php">Register</a>

        <?php endif; ?>

    </div>
</nav>

<h1 class="title">Your Shopping Cart 🛒</h1>

<div class="cart-wrapper">
    <div class="cart-box">
        <div id="cart-items"></div>

        <div class="cart-summary">
            <h3 id="total">Total: $0.00</h3>
            <button onclick="clearCart()" class="danger">Empty Cart</button>
        </div>
    </div>
</div>

<script src="js/cart.js"></script>
</body>
</html>