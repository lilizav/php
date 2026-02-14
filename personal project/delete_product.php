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


$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
$result = $stmt->execute([$product_id]);

if ($result) {
    $_SESSION["success"] = "Product deleted successfully!";
} else {
    $_SESSION["error"] = "Failed to delete product.";
}


header("Location: dashboard.php");
exit();
?>
