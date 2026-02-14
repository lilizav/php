<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Register</button>
    </form>

    <?php
    if (isset($_SESSION["error"])) {
        echo '<p class="message">' . $_SESSION["error"] . '</p>';
        unset($_SESSION["error"]);
    }

    if (isset($_SESSION["success"])) {
        echo '<p class="success">' . $_SESSION["success"] . '</p>';
        unset($_SESSION["success"]);
    }
    ?>
</div>

</body>
</html>
