<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Personal Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">MyProject</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="shop/products.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="shop/cart.php">Cart</a></li>

                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item"><span class="nav-link">Welcome, <?= $_SESSION['user']; ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="shop/logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="shop/login_form.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop/register_form.php">Register</a></li>
                <?php endif; ?>

                <li class="nav-item"><a class="nav-link" href="admin/dashboard.php">Admin Dashboard</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container text-center my-5">
    <h1 class="display-4">Welcome to My Personal Project</h1>
    <p class="lead">Explore the shop, manage products in the dashboard, or create your account to start shopping.</p>
    
    <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
        <a href="shop/products.php" class="btn btn-primary btn-lg">Shop Now</a>
        <a href="shop/cart.php" class="btn btn-success btn-lg">View Cart</a>
        <a href="admin/dashboard.php" class="btn btn-dark btn-lg">Admin Panel</a>
    </div>
</div>

<!-- Optional Footer -->
<footer class="bg-light text-center py-4 mt-auto">
    &copy; <?= date('Y'); ?> My Personal Project. All rights reserved.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>