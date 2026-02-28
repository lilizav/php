<?php
require 'config.php';

$stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Products</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<nav class="navbar">
    <h2>MyShop</h2>
    <div>
        <a href="products.php">Shop</a>
        <a href="cart.php">Cart 🛒 <span id="cart-count">0</span></a>
    </div>
</nav>

<h1 class="title">Our Products</h1>

<div class="product-container">

<?php if (!empty($products)): ?>

    <?php foreach ($products as $product): ?>
        <div class="card">

            <!-- Product Image -->
            <img 
                src="images/<?= htmlspecialchars($product['image']); ?>" 
                alt="<?= htmlspecialchars($product['name']); ?>" 
                class="product-image"
            >

            <!-- Product Info -->
            <h2><?= htmlspecialchars($product['name']); ?></h2>
            <p class="price">$<?= number_format($product['price'], 2); ?></p>
            <p><?= htmlspecialchars($product['description']); ?></p>

            <!-- Add To Cart Button -->
            <button 
                onclick="addToCart('<?= htmlspecialchars($product['name']); ?>', <?= $product['price']; ?>)">
                Add to Cart
            </button>

        </div>
    <?php endforeach; ?>

<?php else: ?>
    <p style="text-align:center;">No products available.</p>
<?php endif; ?>

</div>

<script src="js/cart.js"></script>
</body>
</html>