<?php 

$host = "localhost";
$db = "lizaphp";
$user = "root";
$pass = "";


try{
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user,$pass);

    $sql = "CREATE TABLE users(id INT(6) NOT NULL PRIMARY KEY,
    surname varchar(30) NOT NULL,
    password varchar(30) NOT NULL)";

    $pdo->exec($sql);
    echo("table created successfully");

}catch(Exception $e){
    echo "Error creating table" .$e->getMessage();
}


?>