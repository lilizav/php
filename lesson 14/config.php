<?php

session_start();


$user = "root";
$pass = "";
$server = "localhost";
$db = "dbeldonper";

try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
