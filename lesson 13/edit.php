<?php 

include_once("config.php");

$id = $_GET['id'];

$sql = "SELECT*FROM USER WHERE id = :id";

$prep=$conn->prepare($sql);

$prep->bindParam(':id',$id);

$prep->execute();

$data = $prep->fetch();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>EDIT</title>
    </head>
<body>
 
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"></input> <br>
    <input type="text" name="name" value="<?php echo $data['name'] ?>"></input> <br>
    <input type="text" name="surname" value="<?php echo $data['surname'] ?>"></input> <br>
    <input type="email" name="email" value="<?php echo $data['email'] ?>"></input> <br>



    <br>
    <button type="submit" name="update">UPDATE</button>
 

</form>

</body>
</html>