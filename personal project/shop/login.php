<?php
session_start();
include_once("config.php"); // your shop config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $_SESSION["error"] = "All fields are required.";
        header("Location: login_form.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION["success"] = "Login successful!";
        header("Location: products.php"); // redirect to shop
        exit();
    } else {
        $_SESSION["error"] = "Invalid email or password.";
        header("Location: login_form.php");
        exit();
    }
}
?>