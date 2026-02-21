<?php
session_start();
require 'config.php';


if (!isset($_SESSION["user_id"])) {
    $_SESSION["error"] = "You must log in first.";
    header("Location: login_form.php");
    exit();
}


if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION["error"] = "No product ID specified.";
    header("Location: dashboard.php");
    exit();
}

$product_id = $_GET['id'];


$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    $_SESSION["error"] = "Product not found.";
    header("Location: dashboard.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $price = trim($_POST["price"]);
    $description = trim($_POST["description"]);

    if (empty($name) || empty($price)) {
        $message = "Please fill in all required fields.";
    } else {
        $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $price, $description, $product_id]);

        $_SESSION["success"] = "Product updated successfully!";
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Edit Product</h2>

    <?php if (isset($message)) echo '<p class="message">' . $message . '</p>'; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <input type="number" step="0.01" name="price" placeholder="Price ($)" value="<?php echo $product['price']; ?>" required>
        <textarea name="description" placeholder="Description"><?php echo htmlspecialchars($product['description']); ?></textarea>
        <button type="submit">Update Product</button>
    </form>

    <a href="dashboard.php" class="button" style="margin-top:10px;">Back to Dashboard</a>
</div>
</body>
</html>
