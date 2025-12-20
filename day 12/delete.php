<?php 

include_once("config.php");

$id = $_GET["id"];

$sql ="DELETE FROM user where id = :id";

$deleteUser = $conn->prepare($sql);
$deleteUser->bindParam(':id',$id);

$deleteUser->execute();

header('Locatiosn:dashboard.php')


?>