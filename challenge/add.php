<?php
session_start();
include_once("config.php");

/* PROTECT PAGE */
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

/* HANDLE FORM SUBMISSION */
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (title, description, quantity, price) 
            VALUES (:title, :description, :quantity, :price)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':description' => $description,
        ':quantity' => $quantity,
        ':price' => $price
    ]);

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-size: .875rem;
            background-color: #f4f6f9;
        }
        .form-card {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="form-card">
    <h3 class="mb-4">Add New Product</h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter product title" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Enter product description" required></textarea>
        </div>

        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" required>
        </div>

        <div class="form-group">
            <label>Price (€)</label>
            <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter price" required>
        </div>

        <button type="submit" name="submit" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Product
        </button>
        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
