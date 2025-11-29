<?php 

$host = "localhost";
$db = "lizaphp";
$user = "root";
$pass = "";


try{
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user,$pass);


    $sql = "ALTER TABLE     users ADD test varchar(30)";

    $pdo->exec($sql);
    echo("added successfully");

}catch(Exception $e){
    echo "Error adding column" .$e->getMessage();
}


?>