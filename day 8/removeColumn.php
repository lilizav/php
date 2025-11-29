<?php 

$host = "localhost";
$db = "lizaphp";
$user = "root";
$pass = "";


try{
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user,$pass);


    $sql = "ALTER TABLE  users DROP COLUMN test";

    $pdo->exec($sql);
    echo("removed successfully");

}catch(Exception $e){
    echo "Error removing column" .$e->getMessage();
}


?>