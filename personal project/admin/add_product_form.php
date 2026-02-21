<?php
session_start();
require 'config.php';


if (!isset($_SESSION["user_id"])) {
    $_SESSION["error"] = "You must log in first.";
    header("Location: login_form.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $price = trim($_POST["price"]);
    $description = trim($_POST["description"]);

    if (empty($name) || empty($price)) {
        $message = "Please fill in all required fields.";
    } else {
        $stmt = $conn->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $description]);

        $_SESSION["success"] = "Product added successfully!";
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Add New Product</h2>

    <?php if (isset($message)) echo '<p class="message">' . $message . '</p>'; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" step="0.01" name="price" placeholder="Price ($)" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">Add Product</button>
    </form>

    <a href="dashboard.php" class="button" style="margin-top:10px;">Back to Dashboard</a>
</div>
</body>
</html>
