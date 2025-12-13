<?php
   session_start();



    $user="root";
    $pass="";
    $server="localhost";
    $db="lizaphp";



    try{
        $conn = new PDO("mysql:host=$server;dbname=$db",$user,$pass);



    }catch(PDOException $e){
        echo "error;" . $e->getMessage();
    }


  if(isset($_POST['submit'])){
       $name = $_POST['name'];
       $surname = $_POST['surname'];
       $email = $_POST['email'];



       $sql ="INSERT INTO user(name,surname,email) values(:name,:surname,:email)";


       $sqlQuery= $conn->prepare($sql);


       $sqlQuery->bindParam(':name',$name);
       $sqlQuery->bindParam(':surname',$surname);
       $sqlQuery->bindParam(':email',$email);


       $sqlQuery->execute();


       echo "Data saved successfully.....";



  }


?>