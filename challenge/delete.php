<?php
include_once("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: dashboard.php");
exit;
?>