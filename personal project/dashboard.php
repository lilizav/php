<?php
session_start();
require 'config.php';


if (!isset($_SESSION["user_id"])) {
    $_SESSION["error"] = "You must log in first.";
    header("Location: login_form.php");
    exit();
}


$stmt = $conn->prepare("SELECT * FROM products ORDER BY created_at DESC");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
       
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        a.button {
            display: inline-block;
            padding: 6px 12px;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5px;
        }

        a.button:hover {
            background-color: #555;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .message {
            margin-top: 10px;
            color: red;
            text-align: center;
        }

        .success {
            margin-top: 10px;
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="top-bar">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
        <a href="logout.php" class="button">Logout</a>
    </div>

  
    <?php
    if (isset($_SESSION["success"])) {
        echo '<p class="success">' . $_SESSION["success"] . '</p>';
        unset($_SESSION["success"]);
    }
    if (isset($_SESSION["error"])) {
        echo '<p class="message">' . $_SESSION["error"] . '</p>';
        unset($_SESSION["error"]);
    }
    ?>

    <a href="add_product_form.php" class="button">Add New Product</a>

 
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product["id"]; ?></td>
                    <td><?php echo htmlspecialchars($product["name"]); ?></td>
                    <td><?php echo number_format($product["price"], 2); ?></td>
                    <td><?php echo htmlspecialchars($product["description"]); ?></td>
                    <td>
                        <a href="edit_product_form.php?id=<?php echo $product["id"]; ?>" class="button">Edit</a>
                        <a href="delete_product.php?id=<?php echo $product["id"]; ?>" class="button" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">No products found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>
