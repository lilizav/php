<?php
 include_once("config.php");

 if(isset($_POST['submit']))
 {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempPass = $_POST['password'];
    $password = password_hash($tempPass,PASSWORD_DEFAULT);

    if(empty($name) || empty($surname) || empty($email) || empty($username) || empty($password)){
        echo "You need to fill all the fields.";
    }
    else
    {
        $sql = "SELECT username FROM users WHERE username=:username";

        $tempSQL =$conn->prepare($sql);
        $tempSQL->bindParam(':username',$username);
        $tempSQL->execute();

        if($tempSQL->rowCount()>0)
       {
        echo"username exists";

        header("refresh:2; url=signup.php");
       }else{
        $sql= "INSERT into users(name,surname,username,email,password) VALUES(:name,:surname,:username,:email,:password)";

        $insertSQL =$conn->prepare($sql);
        $insertSQL->bindParam(':name',$name);
        $insertSQL->bindParam(':surname',$surname);
        $insertSQL->bindParam(':username',$username);
        $insertSQL->bindParam(':email',$email);
        $insertSQL->bindParam(':password',$password);

        $insertSQL->execute();

        echo("You have registered successfully");
        header("refresh:2; url=login.php");
       }
        
    
    }




 }






?>