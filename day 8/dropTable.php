<?php 

$host = "localhost";
$db = "lizaphp";
$user = "root";
$pass = "";


try{
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user,$pass);


    $sql = "DROP TABLE users";

    $pdo->exec($sql);
    echo("table removed successfully");

}catch(Exception $e){
    echo "Error removing table" .$e->getMessage();
}


?>