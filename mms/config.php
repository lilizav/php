<?php 
    $user="root";
    $pass="";
    $server="localhost";
    $dbname="mms";

    try{
        // lidhja me databaze me PDO connect //
        $conn= new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
        echo("Connected");

    }catch(PDOException $e){
        echo "Error" , $e->getMessage();

    }






?>