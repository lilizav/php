<?php 

$host = "localhost";
$db = "lizaphp";
$user = "root";
$pass = "";


try{
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user,$pass);

    $username = "hoxha";
    $password ="123456";

    $sql = "INSERT INTO users VALUES (2,'$username','$password')";

    $pdo->exec($sql);
    echo("inserted successfully");

}catch(Exception $e){
    echo "Error inserting data" .$e->getMessage();
}


?>